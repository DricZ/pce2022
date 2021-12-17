<?php
require_once 'phps/connect.php';
if (isset($_GET['id'])) {
    $sql = "SELECT * FROM pendaftar WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_GET['id']]);
    $result = $stmt->fetch();

    $kodesql = "SELECT * FROM kode_peserta WHERE id_pendaftar = ?";
    $kodestmt = $pdo->prepare($kodesql);
    $kodestmt->execute([$result['id']]);
    $kode = $kodestmt->fetch();
}

include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<style>
    .berkas {
        width: 50%;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    @media (max-width: 500px) {
        .berkas {
            width: 80%;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    }

    #particles-js {
        /*margin-top:100px;*/
        height: 100%;
        width: 100%;
        position: fixed;
        z-index: 0;
        top: 0px;
        left: 0px;
    }

    .back-to-top {
        position: fixed;
        bottom: 25px;
        right: 25px;
        display: none;
        z-index: 1000;
        width: 50px !important;
        min-height: 5vh;
        line-height: 2.5vh;
        -webkit-filter: drop-shadow(0px 0px 0px) !important;
        filter: drop-shadow(0px 0px 0px) !important;
        background: #A52A2A;
        border: 3px solid black;
        border-radius: 20px;
        font-size: 12pt;
        padding-right: 30px;
    }
</style>

<head>
    <title>Berkas <?= $result['nama_kelompok'] ?></title>
</head>

<main>
    <div id="particles-js"></div>

    <section id="formdaftar" class="formdaftar">

        <div class="container">
            <div class="row justify-content-center">
                <h3 class="title" style="font-weight: bold;">
                    VIEW DATA PENDAFTAR
                </h3>
            </div>

            <form action="phps/daftar.php" method="post" enctype="multipart/form-data" id="form_daftar">
                <div class="col-sm-12 col-md-8 offset-md-2">

                    <hr>
                    <br>

                    <div class="row justify-content-center">
                        <h3 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">Where Are You From?</h3>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <center><label for="jenjang_pendidikan" style="font-weight: bold;">Educational Stage</label></center>
                                <?php
                                if ($result['jenjang_pendidikan'] == 'Senior High School') {
                                ?>
                                    <input type="text" class="form-control" id="jenjang_pendidikan" name="jenjang_pendidikan" style="height:40px; font-size: 12pt; text-align: center;" value="Senior High School Student (SMA)" readonly>
                                <?php
                                } else if ($result['jenjang_pendidikan'] == 'College') {
                                ?>
                                    <input type="text" class="form-control" id="jenjang_pendidikan" name="jenjang_pendidikan" style="height:40px; font-size: 12pt; text-align: center;" value="University Student (Mahasiswa/i)" readonly>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <?php
                                if ($result['jenjang_pendidikan'] == 'Senior High School') {
                                ?>
                                    <center><label for="nama_sekolah" style="font-weight: bold;">School Name</label></center>
                                <?php
                                } else if ($result['jenjang_pendidikan'] == 'College') {
                                ?>
                                    <center><label for="nama_sekolah" style="font-weight: bold;">University Name</label></center>
                                <?php
                                }
                                ?>
                                <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" placeholder="Ex: Petra Christian University" style="height:40px; font-size: 12pt; text-align: center;" value="<?= $result['nama_sekolah'] ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <?php
                                if ($result['jenjang_pendidikan'] == 'Senior High School') {
                                ?>
                                    <center><label for="alamat_sekolah" style="font-weight: bold;">School Address</label></center>
                                <?php
                                } else if ($result['jenjang_pendidikan'] == 'College') {
                                ?>
                                    <center><label for="alamat_sekolah" style="font-weight: bold;">University Address</label></center>
                                <?php
                                }
                                ?>
                                <textarea type="text" class="form-control" id="alamat_sekolah" name="alamat_sekolah" placeholder="Ex: Jl. Siwalankerto No.121-131, Surabaya" style="font-size: 12pt;  text-align: center;" readonly><?= $result['alamat_sekolah'] ?></textarea>
                            </div>
                        </div>
                    </div>

                    <br>
                    <hr>
                    <br>

                    <div class="row justify-content-center">
                        <h3 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">The Next Petra Civil Expo Winner's Information</h3>
                    </div>
                    <div class="row justify-content-center">
                        <h4 style="font-weight: bold; font-size: 14pt; color: red;">(could be you!)</h4>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <center><label for="nama_kelompok" style="font-weight: bold;">Your Team's Name</label></center>
                                <input type="text" class="form-control" id="nama_kelompok" name="nama_kelompok" placeholder="Input your team's name" style="height:40px; font-size: 12pt; text-align: center;" value="<?= $result['nama_kelompok'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <center><label for="jumlah_anggota" style="font-weight: bold;">Number of Member(s)</label></center>
                                <input type="number" class="form-control" id="jumlah_anggota" name="jumlah_anggota" placeholder="Input your team's name" style="height:40px; font-size: 12pt; text-align: center;" value="<?= $result['jumlah_anggota'] ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <br>
                    <hr>
                    <br>

                    <?php
                    if ($result['jenjang_pendidikan'] == 'Senior High School') {
                    ?>
                        <div id="row-competition-shs">
                            <div class="row justify-content-center">
                                <h3 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">Competition for Senior High School Students</h3>
                            </div>
                            <br>
                            <div class="row justify-content-center">
                                <center> <img class="card-img-top" src="../assets/image/pce_bridge.png" alt="Card image cap" style="max-width: 30%;"></center>
                            </div>
                            <br>
                            <div class="row justify-content-center">
                                <h3 style="font-weight: bold; font-size: 18pt; color: black; text-align: center;">BRIDGE COMPETITION</h3>
                            </div>
                        </div>
                    <?php
                    } else if ($result['jenjang_pendidikan'] == 'College') {
                    ?>
                        <div class="row justify-content-center">
                            <h3 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">Which Competition(s) Does Your Team Want To Participate In?</h3>
                        </div>
                        <div class="row justify-content-center">
                            <h4 style="font-weight: bold; font-size: 14pt; color: red; text-align: center;">(select one or more)</h4>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <center>
                                        <?php
                                        if ($result['pilihan_lomba_1'] == '') {
                                        ?>
                                            <label><input type="checkbox" id="pilihan_lomba_1" name="pilihan_lomba_1" value="bc" disabled> Bridge Competition</label><br>
                                        <?php
                                        } else {
                                        ?>
                                            <label style="font-weight: bold;"><input type="checkbox" id="pilihan_lomba_1" name="pilihan_lomba_1" value="bc" checked disabled> Bridge Competition</label><br>
                                        <?php
                                        }
                                        ?>

                                        <?php
                                        if ($result['pilihan_lomba_2'] == '') {
                                        ?>
                                            <label><input type="checkbox" id="pilihan_lomba_2" name="pilihan_lomba_2" value="erdc" disabled> Earthquake Resistant Design Competition</label><br>
                                        <?php
                                        } else {
                                        ?>
                                            <label style="font-weight: bold;"><input type="checkbox" id="pilihan_lomba_2" name="pilihan_lomba_2" value="erdc" checked disabled> Earthquake Resistant Design Competition</label><br>
                                        <?php
                                        }
                                        ?>

                                        <?php
                                        if ($result['pilihan_lomba_3'] == '') {
                                        ?>
                                            <label><input type="checkbox" id="pilihan_lomba_3" name="pilihan_lomba_3" value="lktb" disabled> Lomba Kuat Tekan Beton</label><br>
                                        <?php
                                        } else {
                                        ?>
                                            <label style="font-weight: bold;"><input type="checkbox" id="pilihan_lomba_3" name="pilihan_lomba_3" value="lktb" checked disabled> Lomba Kuat Tekan Beton</label><br>
                                        <?php
                                        }
                                        ?>
                                    </center>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <br>
                    <hr>
                    <br>

                    <div id="member-1">
                        <div class="row justify-content-center">
                            <h3 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">First Member's Information</h3>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <center><label for="alamat_sekolah" style="font-weight: bold;">First Member's Participant Number</label></center>
                                    <?php
                                    if ($result['pilihan_lomba_1'] != '') {
                                        if ($result['jenjang_pendidikan'] == 'Senior High School') {
                                    ?>
                                            <center><label for="bc" style="font-weight: bold;">Bridge Competition<br>(Senior High School)</label></center>
                                            <?php
                                            ?>
                                            <input type="text" class="form-control" id="kode_peserta_1" name="kode_peserta_1" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $kode['bc_sma_1'] ?>" readonly><br>
                                        <?php
                                        } else if ($result['jenjang_pendidikan'] == 'College') {
                                        ?>
                                            <center><label for="bc" style="font-weight: bold;">Bridge Competition<br>(University)</label></center>
                                            <?php
                                            ?>
                                            <input type="text" class="form-control" id="kode_peserta_1" name="kode_peserta_1" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $kode['bc_univ_1'] ?>" readonly><br>
                                        <?php
                                        }
                                    }
                                    if ($result['pilihan_lomba_2'] != '') {
                                        ?>
                                        <center><label for="erdc" style="font-weight: bold;">Earthquake Resistant Design Competition</label></center>
                                        <?php
                                        ?>
                                        <input type="text" class="form-control" id="kode_peserta_2" name="kode_peserta_2" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $kode['erdc_1'] ?>" readonly><br>
                                    <?php
                                    }
                                    if ($result['pilihan_lomba_3'] != '') {
                                    ?>
                                        <center><label for="bc" style="font-weight: bold;">Lomba Kuat Tekan Beton</label></center>
                                        <?php
                                        ?>
                                        <input type="text" class="form-control" id="kode_peserta_3" name="kode_peserta_3" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $kode['lktb_1'] ?>" readonly><br>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="nama_peserta_1" style="font-weight: bold;">Full Name</label></center>
                                    <input type="text" class="form-control" id="nama_peserta_1" name="nama_peserta_1" placeholder="Input first member's full name" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $result['nama_peserta_1'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="hp_peserta_1" style="font-weight: bold;">Phone Number</label></center>
                                    <input type="number" class="form-control" id="hp_peserta_1" name="hp_peserta_1" placeholder="Ex: 08123456789" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $result['hp_peserta_1'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="line_peserta_1" style="font-weight: bold;">LINE ID</label></center>
                                    <center><a href="http://line.me/ti/p/~<?php echo $result['line_peserta_1'] ?>" target="_blank" style="min-width: 50%;" class="line btn btn-success"><?php echo $result['line_peserta_1']; ?></a></center>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="email_peserta_1" style="font-weight: bold;">E-mail</label></center>
                                    <input type="text" class="form-control" id="email_peserta_1" name="email_peserta_1" placeholder="Ex: name@gmail.com" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $result['email_peserta_1'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <?php if ($result['jenjang_pendidikan'] == 'College') { ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <center><label for="jurusan_peserta_1" style="font-weight: bold;">Major</label></center>
                                        <input type="text" class="form-control" id="jurusan_peserta_1" name="jurusan_peserta_1" placeholder="Ex: Civil Engineering (Teknik Sipil)" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $result['jurusan_peserta_1'] ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <center><label for="domisili_peserta_1" style="font-weight: bold;">Domicile</label></center>
                                    <input type="text" class="form-control" id="domisili_peserta_1" name="domisili_peserta_1" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $result['domisili_peserta_1'] ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>

                        <h4 style="text-align: center; font-weight: bold;">First Member's 3x4 Photo</h4>
                        <p style="text-align: center; font-weight: bold; color: red;">(click on image to enlarge)</p>
                        <center>
                            <a href="../uploads/3x4/<?php echo $result['3x4_peserta_1'] ?>" target="_blank">
                                <img class="berkas" src="../uploads/3x4/<?php echo $result['3x4_peserta_1'] ?>">
                            </a>
                        </center>

                        <br>
                        <br>

                        <h4 style="text-align: center; font-weight: bold;">First Member's Student ID</h4>
                        <p style="text-align: center; font-weight: bold; color: red;">(click on image to enlarge)</p>
                        <center>
                            <a href="../uploads/student_id/<?php echo $result['kartu_peserta_1'] ?>" target="_blank">
                                <img class="berkas" src="../uploads/student_id/<?php echo $result['kartu_peserta_1'] ?>">
                            </a>
                        </center>

                        <br>

                    </div>

                    <div id="member-2">
                        <br>
                        <hr>
                        <br>
                        <div class="row justify-content-center">
                            <h3 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">Second Member's Information</h3>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <center><label for="alamat_sekolah" style="font-weight: bold;">Second Member's Participant Number</label></center>
                                    <?php
                                    if ($result['pilihan_lomba_1'] != '') {
                                        if ($result['jenjang_pendidikan'] == 'Senior High School') {
                                    ?>
                                            <center><label for="bc" style="font-weight: bold;">Bridge Competition<br>(Senior High School)</label></center>
                                            <?php
                                            ?>
                                            <input type="text" class="form-control" id="kode_peserta_1" name="kode_peserta_1" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $kode['bc_sma_2'] ?>" readonly><br>
                                        <?php
                                        } else if ($result['jenjang_pendidikan'] == 'College') {
                                        ?>
                                            <center><label for="bc" style="font-weight: bold;">Bridge Competition<br>(University)</label></center>
                                            <?php
                                            ?>
                                            <input type="text" class="form-control" id="kode_peserta_1" name="kode_peserta_1" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $kode['bc_univ_2'] ?>" readonly><br>
                                        <?php
                                        }
                                    }
                                    if ($result['pilihan_lomba_2'] != '') {
                                        ?>
                                        <center><label for="erdc" style="font-weight: bold;">Earthquake Resistant Design Competition</label></center>
                                        <?php
                                        ?>
                                        <input type="text" class="form-control" id="kode_peserta_2" name="kode_peserta_2" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $kode['erdc_2'] ?>" readonly><br>
                                    <?php
                                    }
                                    if ($result['pilihan_lomba_3'] != '') {
                                    ?>
                                        <center><label for="bc" style="font-weight: bold;">Lomba Kuat Tekan Beton</label></center>
                                        <?php
                                        ?>
                                        <input type="text" class="form-control" id="kode_peserta_3" name="kode_peserta_3" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $kode['lktb_2'] ?>" readonly><br>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="nama_peserta_2" style="font-weight: bold;">Full Name</label></center>
                                    <input type="text" class="form-control" id="nama_peserta_2" name="nama_peserta_2" placeholder="Input first member's full name" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $result['nama_peserta_2'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="hp_peserta_2" style="font-weight: bold;">Phone Number</label></center>
                                    <input type="number" class="form-control" id="hp_peserta_2" name="hp_peserta_2" placeholder="Ex: 08123456789" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $result['hp_peserta_2'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="line_peserta_2" style="font-weight: bold;">LINE ID</label></center>
                                    <center><a href="http://line.me/ti/p/~<?php echo $result['line_peserta_2'] ?>" target="_blank" style="min-width: 50%;" class="line btn btn-success"><?php echo $result['line_peserta_2']; ?></a></center>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="email_peserta_2" style="font-weight: bold;">E-mail</label></center>
                                    <input type="text" class="form-control" id="email_peserta_2" name="email_peserta_2" placeholder="Ex: name@gmail.com" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $result['email_peserta_2'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <?php if ($result['jenjang_pendidikan'] == 'College') { ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <center><label for="jurusan_peserta_2" style="font-weight: bold;">Major</label></center>
                                        <input type="text" class="form-control" id="jurusan_peserta_2" name="jurusan_peserta_2" placeholder="Ex: Civil Engineering (Teknik Sipil)" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $result['jurusan_peserta_2'] ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <center><label for="domisili_peserta_2" style="font-weight: bold;">Domicile</label></center>
                                    <input type="text" class="form-control" id="domisili_peserta_2" name="domisili_peserta_2" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $result['domisili_peserta_2'] ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>

                        <h4 style="text-align: center; font-weight: bold;">Second Member's 3x4 Photo</h4>
                        <p style="text-align: center; font-weight: bold; color: red;">(click on image to enlarge)</p>
                        <center>
                            <a href="../uploads/3x4/<?php echo $result['3x4_peserta_2'] ?>" target="_blank">
                                <img class="berkas" src="../uploads/3x4/<?php echo $result['3x4_peserta_2'] ?>">
                            </a>
                        </center>

                        <br>
                        <br>

                        <h4 style="text-align: center; font-weight: bold;">Second Member's Student ID</h4>
                        <p style="text-align: center; font-weight: bold; color: red;">(click on image to enlarge)</p>
                        <center>
                            <a href="../uploads/student_id/<?php echo $result['kartu_peserta_2'] ?>" target="_blank">
                                <img class="berkas" src="../uploads/student_id/<?php echo $result['kartu_peserta_2'] ?>">
                            </a>
                        </center>

                        <br>

                    </div>

                    <div id="member-3">
                        <br>
                        <hr>
                        <br>
                        <div class="row justify-content-center">
                            <h3 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">Third Member's Information</h3>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <center><label for="alamat_sekolah" style="font-weight: bold;">Third Member's Participant Number</label></center>
                                    <?php
                                    if ($result['pilihan_lomba_1'] != '') {
                                        if ($result['jenjang_pendidikan'] == 'Senior High School') {
                                    ?>
                                            <center><label for="bc" style="font-weight: bold;">Bridge Competition<br>(Senior High School)</label></center>
                                            <?php
                                            ?>
                                            <input type="text" class="form-control" id="kode_peserta_1" name="kode_peserta_1" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $kode['bc_sma_3'] ?>" readonly><br>
                                        <?php
                                        } else if ($result['jenjang_pendidikan'] == 'College') {
                                        ?>
                                            <center><label for="bc" style="font-weight: bold;">Bridge Competition<br>(University)</label></center>
                                            <?php
                                            ?>
                                            <input type="text" class="form-control" id="kode_peserta_1" name="kode_peserta_1" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $kode['bc_univ_3'] ?>" readonly><br>
                                        <?php
                                        }
                                    }
                                    if ($result['pilihan_lomba_2'] != '') {
                                        ?>
                                        <center><label for="erdc" style="font-weight: bold;">Earthquake Resistant Design Competition</label></center>
                                        <?php
                                        ?>
                                        <input type="text" class="form-control" id="kode_peserta_2" name="kode_peserta_2" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $kode['erdc_3'] ?>" readonly><br>
                                    <?php
                                    }
                                    if ($result['pilihan_lomba_3'] != '') {
                                    ?>
                                        <center><label for="bc" style="font-weight: bold;">Lomba Kuat Tekan Beton</label></center>
                                        <?php
                                        ?>
                                        <input type="text" class="form-control" id="kode_peserta_3" name="kode_peserta_3" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $kode['lktb_3'] ?>" readonly><br>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="nama_peserta_3" style="font-weight: bold;">Full Name</label></center>
                                    <input type="text" class="form-control" id="nama_peserta_3" name="nama_peserta_3" placeholder="Input third member's full name" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $result['nama_peserta_3'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="hp_peserta_3" style="font-weight: bold;">Phone Number</label></center>
                                    <input type="number" class="form-control" id="hp_peserta_3" name="hp_peserta_3" placeholder="Ex: 08123456789" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $result['hp_peserta_3'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="line_peserta_3" style="font-weight: bold;">LINE ID</label></center>
                                    <center><a href="http://line.me/ti/p/~<?php echo $result['line_peserta_3'] ?>" target="_blank" style="min-width: 50%;" class="line btn btn-success"><?php echo $result['line_peserta_3']; ?></a></center>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="email_peserta_3" style="font-weight: bold;">E-mail</label></center>
                                    <input type="text" class="form-control" id="email_peserta_3" name="email_peserta_3" placeholder="Ex: name@gmail.com" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $result['email_peserta_3'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <?php if ($result['jenjang_pendidikan'] == 'College') { ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <center><label for="jurusan_peserta_3" style="font-weight: bold;">Major</label></center>
                                        <input type="text" class="form-control" id="jurusan_peserta_3" name="jurusan_peserta_3" placeholder="Ex: Civil Engineering (Teknik Sipil)" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $result['jurusan_peserta_3'] ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <center><label for="domisili_peserta_3" style="font-weight: bold;">Domicile</label></center>
                                    <input type="text" class="form-control" id="domisili_peserta_3" name="domisili_peserta_3" style="height:40px; font-size: 12pt; text-align: center;" value="<?php echo $result['domisili_peserta_3'] ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>

                        <h4 style="text-align: center; font-weight: bold;">Third Member's 3x4 Photo</h4>
                        <p style="text-align: center; font-weight: bold; color: red;">(click on image to enlarge)</p>
                        <center>
                            <a href="../uploads/3x4/<?php echo $result['3x4_peserta_3'] ?>" target="_blank">
                                <img class="berkas" src="../uploads/3x4/<?php echo $result['3x4_peserta_3'] ?>">
                            </a>
                        </center>

                        <br>
                        <br>

                        <h4 style="text-align: center; font-weight: bold;">Third Member's Student ID</h4>
                        <p style="text-align: center; font-weight: bold; color: red;">(click on image to enlarge)</p>
                        <center>
                            <a href="../uploads/student_id/<?php echo $result['kartu_peserta_3'] ?>" target="_blank">
                                <img class="berkas" src="../uploads/student_id/<?php echo $result['kartu_peserta_3'] ?>">
                            </a>
                        </center>

                        <br>

                    </div>

                    <br>
                    <hr>
                    <br>

                    <center>
                        <a style="border-radius: 5px; font-weight: bold; height:40px; font-size: 12pt;" href="list_pendaftar2.php" class="btn btn-warning" id="back">Back</a>
                    </center>

            </form>

        </div>

    </section>

    <a id="back-to-top" href="#" class="btn btn-danger btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>

    <script>
        $(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 250) {
                    $('#back-to-top').fadeIn();
                } else {
                    $('#back-to-top').fadeOut();
                }
            });
            // scroll body to 0px on click
            $('#back-to-top').click(function() {
                $('body,html').animate({
                    scrollTop: 0
                }, 400);
                return false;
            });

            if ($("#jumlah_anggota").val() == 1) {
                $('#member-2').prop('hidden', true);
                $('#member-3').prop('hidden', true);
            } else if ($("#jumlah_anggota").val() == 2) {
                $('#member-3').prop('hidden', true);
            }
        });
    </script>
    <script src="../assets/js/particles.js"></script>
    <script>
        /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
        particlesJS.load('particles-js', '../assets/js/particlesjs-config-admin.json', function() {
            console.log('callback - particles.js config loaded');
        });
    </script>

    <?php /*include 'footer.php'*/ ?>

</html>