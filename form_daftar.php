<?php
// session_start();
// header('Location: index.php');
// exit();
$_SESSION['page'] = 'form_daftar';
include 'header.php';

if (isset($_GET['status'])) {
    if ($_GET['status'] == 5) {
        echo "<script>alert('Mohon maaf, ukuran file image maksimal 5 MB. Silakan lakukan upload ulang.')</script>";
    } else if ($_GET['status'] == 6) {
        echo "<script>alert('Mohon maaf, terjadi error di server. Silahkan upload file Anda kembali.')</script>";
    } else if ($_GET['status'] == 7) {
        echo "<script>alert('Mohon maaf, silakan upload hanya file image (.png, .jpg, .jpeg)!')</script>";
    } else if ($_GET['status'] == 0) {
        echo "<script>",
        "alert('Mohon maaf, terjadi error di server. Silakan ulangi kembali.')",
        "</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>PCE 2022 - Registration</title>
</head>

<style>
    .card {
        transition: 1s;
    }

    body {
        background-color: #7FFFD4;
    }

    .card:hover {
        transform: scale(1.05);
        transition: 1s;
    }

    #logo-pce {
        transition: 1s;
    }

    #logo-pce:hover {
        transition: 1s;
        transform: scale(1.1);
    }

    #logo-pce {
        margin-top: 10%;
    }

    @media(max-width: 1366px) {
        #logo-pce {
            margin-top: 15%;
        }
    }

    @media(max-width: 786px) {
        #logo-pce {
            margin-top: 35%;
        }
    }

    .back-to-top {
        position: fixed;
        bottom: 25px;
        right: 25px;
        display: none;
        z-index: 1000;
        width: 50px !important;
        max-height: 5vh;
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

<main>
    <section id="formdaftar" class="formdaftar">

        <div class="container">

            <center><a href="https://www.instagram.com/petracivilexpo/" target="_blank"><img src="assets/pce_logo color.png" alt="" style="max-width: 50%;" id="logo-pce"></a></center><br><br>
            <div class="row justify-content-center">
                <h3 class="title">
                    <b>REGISTRATION PAGE</b>
                </h3>
            </div>
            <div class="row justify-content-center">
                <h3 class="title" style="text-align: center;">
                    <b>PETRA CIVIL EXPO<br>2022</b>
                </h3>
            </div>

            <form action="phps/daftar.php" method="post" enctype="multipart/form-data" onsubmit="pleaseWait()" id="form_daftar">
                <div class="col-sm-12 col-md-8 offset-md-2">

                    <hr>

                    <div class="row justify-content-center py-2 mx-3">
                        <h3 style="font-weight: bold; font-size: 14pt; color: red; text-align: center;">Please register using a browser, not directly from LINE.</h3>
                    </div>

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
                                <select class="form-control" id="jenjang_pendidikan" name="jenjang_pendidikan" style="height:40px; font-size: 12pt;" required>
                                    <option value="">Select an educational stage...</option>
                                    <option value="Senior High School">Senior High School Student (SMA)</option>
                                    <option value="College">University Student (Mahasiswa/i)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="row_nama_sekolah" hidden>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <center><label for="nama_sekolah" id="label_nama_sekolah" style="font-weight: bold;"></label></center>
                                <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" style="height:40px; font-size: 12pt; text-align: center;">
                            </div>
                        </div>
                    </div>
                    <div class="row" id="row_alamat_sekolah" hidden>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <center><label for="alamat_sekolah" id="label_alamat_sekolah" style="font-weight: bold;"></label></center>
                                <textarea type="text" class="form-control" id="alamat_sekolah" name="alamat_sekolah" style="height:40px; font-size: 12pt;  text-align: center;"></textarea>
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
                                <input type="text" class="form-control" id="nama_kelompok" name="nama_kelompok" placeholder="Input your team's name" style="height:40px; font-size: 12pt; text-align: center;" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <center><label for="jumlah_anggota" style="font-weight: bold;">Number of Member(s)</label></center>
                                <select class="form-control" id="jumlah_anggota" name="jumlah_anggota" style="height:40px; font-size: 12pt;" required>
                                    <option value="">Select a number...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <br>
                    <hr id="competition">
                    <br>

                    <div id="row-competition-college" hidden>
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
                                        <label><input type="checkbox" id="pilihan_lomba_1" name="pilihan_lomba_1" value="bc"> <b>Bridge Competition</b></label><br>
                                        <label><input class="mt-3" type="checkbox" id="pilihan_lomba_2" name="pilihan_lomba_2" value="erdc"> <b>Earthquake Resistant Design Competition</b></label><br>
                                        <label><input class="mt-3" type="checkbox" id="pilihan_lomba_3" name="pilihan_lomba_3" value="lktb"> <b>Lomba Kuat Tekan Beton</b></label>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                    </div>

                    <div id="row-competition-shs" hidden>
                        <div class="row justify-content-center">
                            <h3 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">Competition for Senior High School Students</h3>
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <center> <img class="card-img-top" src="assets/image/pce_bridge.png" alt="Card image cap" style="max-width: 30%;"></center>
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <h3 style="font-weight: bold; font-size: 18pt; color: black; text-align: center;">BRIDGE COMPETITION</h3>
                        </div>
                        <br>
                        <hr>
                        <br>
                    </div>

                    <div class="row justify-content-center mx-3">
                        <h4 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">A T T E N T I O N</h4>
                        <h4 style="font-size: 12pt; color: red; text-align: center;">For participant who <b>DOES NOT</b> have a <b>Student ID (KTM or Student Card)</b>, <b>MISSING</b>, or has <b>EXCEEDED THE VALIDITY PERIOD</b> of the Student ID, then you <b><u>MUST</u></b> make <b>A Statement Letter</b> stating that you are currently studying at the University or School that you are attending, and <b>SIGNED</b> by the Head of Study Program (for University) or other parties for School (School Principal, School Administration, or Teacher).</h4>
                    </div>

                    <br>
                    <hr>
                    <br>

                    <div class="row justify-content-center mx-3">
                        <h4 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">P E R H A T I A N</h4>
                        <h4 style="font-size: 12pt; color: red; text-align: center;">Bagi pendaftar yang <b>BELUM</b> memiliki <b>Student ID (KTM atau Kartu Pelajar)</b>, <b>HILANG</b>, maupun telah <b>MELEBIHI MASA BERLAKUNYA</b> Kartu Pelajar, maka <b><u>WAJIB</u></b> membuat <b>Surat Pernyataan</b> sedang berkuliah atau sedang bersekolah di Universitas atau Sekolah pendaftar yang bersangkutan serta <b>DITANDA-TANGANI</b> oleh Kepala Prodi (untuk Universitas) atau Pihak Sekolah (Kepala Sekolah, Tata Usaha Sekolah, atau Guru).</h4>
                    </div>

                    <br>
                    <hr>
                    <br>

                    <div id="member-1">
                        <div class="row justify-content-center">
                            <h3 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">First Member's Information</h3>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="nama_peserta_1" style="font-weight: bold;">Full Name</label></center>
                                    <input type="text" class="form-control" id="nama_peserta_1" name="nama_peserta_1" placeholder="Input first member's full name" style="height:40px; font-size: 12pt; text-align: center;" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="hp_peserta_1" style="font-weight: bold;">Phone Number</label></center>
                                    <input type="number" class="form-control" id="hp_peserta_1" name="hp_peserta_1" placeholder="Ex: 08123456789" style="height:40px; font-size: 12pt; text-align: center;" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="line_peserta_1" style="font-weight: bold;">LINE ID</label></center>
                                    <input type="text" class="form-control" id="line_peserta_1" name="line_peserta_1" placeholder="Input first member's LINE ID" style="height:40px; font-size: 12pt; text-align: center;" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="email_peserta_1" style="font-weight: bold;">E-mail</label></center>
                                    <input type="email" class="form-control" id="email_peserta_1" name="email_peserta_1" placeholder="Ex: petracivilexpo@gmail.com" style="height:40px; font-size: 12pt; text-align: center;" required>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="row_jurusan_1" hidden>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <center><label for="jurusan_peserta_1" style="font-weight: bold;">Major</label></center>
                                    <input type="text" class="form-control" id="jurusan_peserta_1" name="jurusan_peserta_1" placeholder="Ex: Civil Engineering (Teknik Sipil)" style="height:40px; font-size: 12pt; text-align: center;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <center><label for="domisili_peserta_1" style="font-weight: bold;">Domicile</label></center>
                                    <input type="text" class="form-control" id="domisili_peserta_1" name="domisili_peserta_1" placeholder="Ex: Surabaya" style="height:40px; font-size: 12pt; text-align: center;" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 offset-md-3">
                                <div class="form-group" align="center">
                                    <label for="3x4_peserta_1" style="font-weight: bold;">Upload First Member's 3x4 Photo<br><span style="color: red;">(MAX 5 MB OF .jpg, .jpeg, OR .png)</span></label>
                                    <input type="file" class="form-control-file fileUploadContainer" id="3x4_peserta_1" name="3x4_peserta_1" accept="image/*" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 offset-md-3">
                                <div class="form-group" align="center">
                                    <label for="kartu_peserta_1" style="font-weight: bold;">Upload First Member's Student ID<br><span style="color: red;">(MAX 5 MB OF .jpg, .jpeg, OR .png)</span></label>
                                    <input type="file" class="form-control-file fileUploadContainer" id="kartu_peserta_1" name="kartu_peserta_1" accept="image/*" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="member-2" hidden>
                        <br>
                        <hr>
                        <br>
                        <div class="row justify-content-center">
                            <h3 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">Second Member's Information</h3>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="nama_peserta_2" style="font-weight: bold;">Full Name</label></center>
                                    <input type="text" class="form-control" id="nama_peserta_2" name="nama_peserta_2" placeholder="Input second member's full name" style="height:40px; font-size: 12pt; text-align: center;">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="hp_peserta_2" style="font-weight: bold;">Phone Number</label></center>
                                    <input type="number" class="form-control" id="hp_peserta_2" name="hp_peserta_2" placeholder="Ex: 08123456789" style="height:40px; font-size: 12pt; text-align: center;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="line_peserta_2" style="font-weight: bold;">LINE ID</label></center>
                                    <input type="text" class="form-control" id="line_peserta_2" name="line_peserta_2" placeholder="Input second member's LINE ID" style="height:40px; font-size: 12pt; text-align: center;">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="email_peserta_2" style="font-weight: bold;">E-mail</label></center>
                                    <input type="email" class="form-control" id="email_peserta_2" name="email_peserta_2" placeholder="Ex: petracivilexpo@gmail.com" style="height:40px; font-size: 12pt; text-align: center;">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="row_jurusan_2" hidden>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <center><label for="jurusan_peserta_2" style="font-weight: bold;">Major</label></center>
                                    <input type="text" class="form-control" id="jurusan_peserta_2" name="jurusan_peserta_2" placeholder="Ex: Civil Engineering (Teknik Sipil)" style="height:40px; font-size: 12pt; text-align: center;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <center><label for="domisili_peserta_2" style="font-weight: bold;">Domicile</label></center>
                                    <input type="text" class="form-control" id="domisili_peserta_2" name="domisili_peserta_2" placeholder="Ex: Surabaya" style="height:40px; font-size: 12pt; text-align: center;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 offset-md-3">
                                <div class="form-group" align="center">
                                    <label for="3x4_peserta_2" style="font-weight: bold;">Upload Second Member's 3x4 Photo<br><span style="color: red;">(MAX 5 MB OF .jpg, .jpeg, OR .png)</span></label>
                                    <input type="file" class="form-control-file fileUploadContainer" id="3x4_peserta_2" name="3x4_peserta_2" accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 offset-md-3">
                                <div class="form-group" align="center">
                                    <label for="kartu_peserta_2" style="font-weight: bold;">Upload Second Member's Student ID<br><span style="color: red;">(MAX 5 MB OF .jpg, .jpeg, OR .png)</span></label>
                                    <input type="file" class="form-control-file fileUploadContainer" id="kartu_peserta_2" name="kartu_peserta_2" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="member-3" hidden>
                        <br>
                        <hr>
                        <br>
                        <div class="row justify-content-center">
                            <h3 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">Third Member's Information</h3>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="nama_peserta_3" style="font-weight: bold;">Full Name</label></center>
                                    <input type="text" class="form-control" id="nama_peserta_3" name="nama_peserta_3" placeholder="Input third member's full name" style="height:40px; font-size: 12pt; text-align: center;">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="hp_peserta_3" style="font-weight: bold;">Phone Number</label></center>
                                    <input type="number" class="form-control" id="hp_peserta_3" name="hp_peserta_3" placeholder="Ex: 08123456789" style="height:40px; font-size: 12pt; text-align: center;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="line_peserta_3" style="font-weight: bold;">LINE ID</label></center>
                                    <input type="text" class="form-control" id="line_peserta_3" name="line_peserta_3" placeholder="Input third member's LINE ID" style="height:40px; font-size: 12pt; text-align: center;">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="email_peserta_3" style="font-weight: bold;">E-mail</label></center>
                                    <input type="email" class="form-control" id="email_peserta_3" name="email_peserta_3" placeholder="Ex: petracivilexpo@gmail.com" style="height:40px; font-size: 12pt; text-align: center;">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="row_jurusan_3" hidden>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <center><label for="jurusan_peserta_3" style="font-weight: bold;">Major</label></center>
                                    <input type="text" class="form-control" id="jurusan_peserta_3" name="jurusan_peserta_3" placeholder="Ex: Civil Engineering (Teknik Sipil)" style="height:40px; font-size: 12pt; text-align: center;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <center><label for="domisili_peserta_3" style="font-weight: bold;">Domicile</label></center>
                                    <input type="text" class="form-control" id="domisili_peserta_3" name="domisili_peserta_3" placeholder="Ex: Surabaya" style="height:40px; font-size: 12pt; text-align: center;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 offset-md-3">
                                <div class="form-group" align="center">
                                    <label for="3x4_peserta_3" style="font-weight: bold;">Upload Third Member's 3x4 Photo<br><span style="color: red;">(MAX 5 MB OF .jpg, .jpeg, OR .png)</span></label>
                                    <input type="file" class="form-control-file fileUploadContainer" id="3x4_peserta_3" name="3x4_peserta_3" accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 offset-md-3">
                                <div class="form-group" align="center">
                                    <label for="kartu_peserta_3" style="font-weight: bold;">Upload Third Member's Student ID<br><span style="color: red;">(MAX 5 MB OF .jpg, .jpeg, OR .png)</span></label>
                                    <input type="file" class="form-control-file fileUploadContainer" id="kartu_peserta_3" name="kartu_peserta_3" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <hr>
                    <br>

                    <div id="row-fees-shs" hidden>
                        <div class="row justify-content-center">
                            <h3 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">Registration Fee</h3>
                        </div>
                        <!-- <div class="row justify-content-center">
                            <h4 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">(EARLY BIRD)</h4>
                        </div> -->

                        <br>

                        <div class="row row-cols-1">
                            <div class="col-12 col-md-6 mx-auto">
                                <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                                    <center> <img class="card-img-top mt-3" src="assets/image/pce_bridge.png" alt="Card image cap" style="max-width: 50%;"></center>
                                    <div class="card-body" style="text-align: center;">
                                        <h5 class="card-title"><b>BRIDGE COMPETITION</b></h5>
                                        <hr style="width: 40%; height: 3px; background-color: red;">

                                        <p class="card-text">
                                            <b><i> “Unifying The Sleeping Tiger”</i></b>
                                        </p>
                                        <!-- <p class="card-text" style="font-weight: bold;">
                                            <b>&#128178; Rp260.000,00 <span style="color: brown;">(EARLY BIRD)</span></b>
                                        </p> -->
                                        <p class="card-text" style="font-weight: bold;">
                                            &#128178; Rp260.000,00
                                        </p>
                                        <p class="card-text" style="font-weight: bold;">
                                            <b>FOR SENIOR HIGH SCHOOL STUDENTS</b>
                                            <img src="assets/bc_sma_bca.png" style="max-width: 100%" alt="">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <img src="assets/dontmiss.png" alt="" style="width: 50%; height: 70%;">
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <h5 style="font-weight: bold; font-size: 18pt; color: black; text-align: center;"><span style="color: red;">FREE</span> <a href="webinar_regist.php" style="text-decoration: none; color: black;">INTERNATIONAL TALKSHOW</a> ACCESS<br>ONLY FOR A LIMITED TIME!</h5>
                        </div>

                        <br>
                        <hr>
                        <br>
                    </div>

                    <div id="row-fees-college" hidden>
                        <div class="row justify-content-center">
                            <h3 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">Registration Fees</h3>
                        </div>
                        <!-- <div class="row justify-content-center">
                            <h4 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">(EARLY BIRD)</h4>
                        </div> -->

                        <br>

                        <div class="row row-cols-sm-3 row-cols-xs-1">
                            <div class="col d-flex">
                                <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                                    <center> <img class="card-img-top mt-3" src="assets/image/pce_bridge.png" alt="Card image cap" style="max-width: 50%;"></center>
                                    <div class="card-body" style="text-align: center;">
                                        <div class="row justify-content-center">
                                            <h5 class="card-title" style="text-align: center;"><b>BRIDGE COMPETITION</b></h5>
                                            <hr style="width: 40%; height: 3px; background-color: red;">
                                        </div>
                                        <p class="card-text">
                                            <b><i> “Unifying The Sleeping Tiger”</i></b>
                                        </p>
                                        <!-- <p class="card-text" style="font-weight: bold;">
                                            <b>&#128178; Rp260.000,00 <span style="color: brown;">(EARLY BIRD)</span></b>
                                        </p> -->
                                        <p class="card-text" style="font-weight: bold;">
                                            <b>&#128178; Rp260.000,00</b>
                                        </p>
                                        <p class="card-text" style="font-weight: bold;" <b>FOR UNIVERSITY STUDENTS</b><br>
                                            <img src="assets/bc_univ_bca.png" style="max-width: 100%" alt="">
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                                    <center><img class="card-img-top mt-3" src="assets/image/pce_erdc.png" alt="Card image cap" style="max-width: 50%;"></center>
                                    <div class="card-body" style="text-align: center;">
                                        <div class="row">
                                            <h5 class="card-title" style="text-align: center;"><b>EARTHQUAKE RESISTANT DESIGN COMPETITION</b></h5>
                                            <hr style="width: 40%; height: 3px; background-color: red;">
                                        </div>
                                        <p class="card-text">
                                            <b><i>“The Undefined Disaster and Its Defined Counter”</i></b>
                                        </p>
                                        <!-- <p class="card-text" style="font-weight: bold;">
                                            <b>&#128178; Rp240.000,00 <span style="color: brown;">(EARLY BIRD)</span></b>
                                        </p> -->
                                        <p class="card-text" style="font-weight: bold;">
                                            <b>&#128178; Rp245.000,00</b>
                                        </p>
                                        <p class="card-text">
                                            <img src="assets/erdc_bca.png" style="max-width: 100%" alt="">
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                                    <center> <img class="card-img-top mt-3" src="assets/image/pce_lktb.png" alt="Card image cap" style="max-width: 50%;"></center>
                                    <div class="card-body" style="text-align: center;">
                                        <div class="row justify-content-center">
                                            <h5 class="card-title" style="text-align: center;"><b>LOMBA KUAT TEKAN BETON</b></h5>
                                            <hr style="width: 40%; height: 3px; background-color: red;">
                                        </div>
                                        <p class="card-text">
                                            <b><i>“Road to Skilled Concrete Technologist"</i></b>
                                        </p>
                                        <!-- <p class="card-text" style="font-weight: bold;">
                                            <b>&#128178; Rp215.000,00 <span style="color: brown;">(EARLY BIRD)</span></b>
                                        </p> -->
                                        <p class="card-text" style="font-weight: bold;">
                                            <b>&#128178; Rp210.000,00</b>
                                        </p>
                                        <p class="card-text">
                                            <img src="assets/lktb_bca.png" style="max-width: 100%" alt="">
                                        </p>
                                    </div>
                                    <!-- <img class="card-img-bottom" src="assets/lktb_bca.png" style="max-width: 70%"> -->
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <img src="assets/dontmiss.png" alt="" style="width: 50%;">
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <h5 style="font-weight: bold; font-size: 18pt; color: black; text-align: center;"><span style="color: red;">FREE</span> <a href="webinar_regist.php" style="text-decoration: none; color: black;">INTERNATIONAL TALKSHOW</a> ACCESS<br>ONLY FOR A LIMITED TIME!</h5>
                        </div>

                        <br>
                        <hr>
                        <br>
                    </div>

                    <div id="row-payment" hidden>
                        <div class="row justify-content-center">
                            <h3 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">Payment</h3>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-12 col-md-6 offset-md-3">
                                <div class="form-group" align="center">
                                    <h5 for="total_amount" style="font-weight: bold; color: red;">AMOUNT TO BE PAID</h5>
                                    <div id="bc-pay" hidden>
                                        <br>
                                        <h5 id="competition-fees" style="font-weight: bold; font-size: 16pt;">BRIDGE COMPETITION</h5>
                                        <h5 id="fees" style="font-weight: bold; font-size: 20pt;">Rp260.000,00</h5>
                                    </div>
                                    <div id="erdc-pay" hidden>
                                        <br>
                                        <h5 id="competition-fees" style="font-weight: bold; font-size: 16pt;">EARTHQUAKE RESISTANT DESIGN COMPETITION</h5>
                                        <h5 id="fees" style="font-weight: bold; font-size: 20pt;">Rp245.000,00</h5>
                                    </div>
                                    <div id="lktb-pay" hidden>
                                        <br>
                                        <h5 id="competition-fees" style="font-weight: bold; font-size: 16pt;">LOMBA KUAT TEKAN BETON</h5>
                                        <h5 id="fees" style="font-weight: bold; font-size: 20pt;">Rp210.000,00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div id="row-pay-college" class="mx-3" hidden>
                            <div class="row justify-content-center">
                                <h3 style="font-weight: bold; font-size: 12pt; color: red; text-align: center;">Please make a payment transfer <u>SEPARATELY</u> if you want to take part in more than 1 (one) competition to the BCA account above in accordance with the nominal given in each competition. Thank you and good luck competing in Petra Civil Expo 2021!</h3><br>
                            </div>


                            <div class="row justify-content-center">
                                <h3 style="font-weight: bold; font-size: 12pt; color: red; text-align: center;">Silakan melakukan transfer pembayaran <u>SECARA TERPISAH</u> apabila mengikuti lebih dari 1 (satu) lomba ke rekening BCA di atas sesuai dengan nominal yang sudah diberikan di setiap bidang lomba. Terima kasih dan semoga sukses berkompetisi di Petra Civil Expo 2021!</h3><br>
                            </div>
                        </div>

                        <div id="row-pay-shs" class="mx-3" hidden>
                            <div class="row justify-content-center">
                                <h3 style="font-weight: bold; font-size: 12pt; color: red; text-align: center;">Please make a payment transfer to the BCA account above in accordance with the nominal given in Bridge Competition. Thank you and good luck competing in Petra Civil Expo 2021!</h3><br>
                            </div>


                            <div class="row justify-content-center">
                                <h3 style="font-weight: bold; font-size: 12pt; color: red; text-align: center;">Silakan melakukan transfer pembayaran ke rekening BCA di atas sesuai dengan nominal yang sudah diberikan untuk bidang lomba Bridge Competition. Terima kasih dan semoga sukses berkompetisi di Petra Civil Expo 2021!</h3><br>
                            </div>
                        </div>

                        <div class="row" id="row-bukti-transfer-bc" hidden>
                            <div class="col-12 col-md-6 offset-md-3">
                                <div class="form-group" align="center">
                                    <label for="bukti_transfer_bc" style="font-weight: bold;">Upload Your Team's Proof of Payment for Bridge Competition<br><span style="color: red;">(MAX 5 MB OF .jpg, .jpeg, OR .png)</span></label>
                                    <input type="file" class="form-control-file fileUploadContainer" id="bukti_transfer_bc" name="bukti_transfer_bc" accept="image/*" required>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="row-bukti-transfer-erdc" hidden>
                            <div class="col-12 col-md-6 offset-md-3">
                                <div class="form-group" align="center">
                                    <label for="bukti_transfer_erdc" style="font-weight: bold;">Upload Your Team's Proof of Payment for Earthquake Resistant Design Competition<br><span style="color: red;">(MAX 5 MB OF .jpg, .jpeg, OR .png)</span></label>
                                    <input type="file" class="form-control-file fileUploadContainer" id="bukti_transfer_erdc" name="bukti_transfer_erdc" accept="image/*" required>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="row-bukti-transfer-lktb" hidden>
                            <div class="col-12 col-md-6 offset-md-3">
                                <div class="form-group" align="center">
                                    <label for="bukti_transfer_lktb" style="font-weight: bold;">Upload Your Team's Proof of Payment for Lomba Kuat Tekan Beton<br><span style="color: red;">(MAX 5 MB OF .jpg, .jpeg, OR .png)</span></label>
                                    <input type="file" class="form-control-file fileUploadContainer" id="bukti_transfer_lktb" name="bukti_transfer_lktb" accept="image/*" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <center><label for="norek_pentransfer" style="font-weight: bold;">Bank Account's Number</label></center>
                                    <input type="number" class="form-control" id="norek_pentransfer" name="norek_pentransfer" placeholder="Ex: 987654321" style="height:40px; font-size: 12pt; text-align: center;" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <center><label for="nama_pentransfer" style="font-weight: bold;">Bank Account's Owner Name</label></center>
                                    <input type="text" class="form-control" id="nama_pentransfer" name="nama_pentransfer" placeholder="Input bank account's owner name" style="height:40px; font-size: 12pt;  text-align: center;" required>
                                </div>
                            </div>
                        </div>

                        <br>
                        <hr>
                        <br>
                    </div>

                    <div class="row justify-content-center mx-3" id="warning">
                        <a href="#competition" style="text-decoration: none;">
                            <h3 style="font-weight: bold; font-size: 12pt; color: red; text-align: center;">Your team must choose at least 1 (one) competition to participate in!</h3>
                        </a>
                    </div>

                    <div class="row justify-content-center mx-3">
                        <h3 style="font-weight: bold; font-size: 12pt; color: red; text-align: center;" id="warning">Please make sure all data is filled and correct before submitting!</h3>
                    </div>

                    <br>

                    <center>
                        <button onclick="checkFill()" style="border-radius: 5px; font-weight: bold; height:40px; font-size: 12pt;" type="submit" class="btn btn-warning" id="submit" disabled>Submit Data</button>
                        <div id="uploading" hidden>
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <br>
                            <br>
                            <h3 style="color: red; font-size: 12pt; font-weight: bold;" id="uploading">Uploading... Please wait.</h3>
                            <h3 style="color: red; font-size: 12pt; font-weight: bold;" id="uploading">Large file sizes may took some time!</h3>
                        </div>
                    </center>

                </div>

            </form>

        </div>

        <br>

        <a id="back-to-top" href="#" class="btn btn-danger btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>

        <?php include 'footer.php' ?>

    </section>

    <script>
        //KALAU DI BACK LANGSUNG RELOAD JADI GAK BISA SUBMIT FORM LEBIH DARI 1X
        if (performance.navigation.type == 2) {
            location.reload(true);
        }

        $('body').on('change', function() {
            $("input[type='file']").on("change", function() {
                if ($(this).attr('accept') == 'image/*') {
                    var fileSize = this.files[0].size;
                    var fileType = this.files[0].name.split('.').pop().toLowerCase();

                    if (fileSize > 1048576 * 5) {
                        $.alert("<span style='color: red; font-weight: bold; text-align: center;'><center>Mohon maaf, ukuran file maksimal adalah 5 MB! Silakan upload ulang.</center></span>");
                        $(this).val(null);
                    }
                    if (fileType != 'jpg' && fileType != 'jpeg' && fileType != 'png') {
                        $.alert("<span style='color: red; font-weight: bold; text-align: center;'><center>Mohon maaf, silakan upload hanya file image (.jpg, .jpeg, atau .png)!</center></span>");
                        $(this).val(null);
                    }
                }
            });
        });

        $("input[type='file']").on("change", function() {
            if ($(this).attr('accept') == 'image/*') {
                var fileSize = this.files[0].size;
                var fileType = this.files[0].name.split('.').pop().toLowerCase();

                if (fileSize > 1048576 * 5) {
                    $.alert("<span style='color: red; font-weight: bold; text-align: center;'><center>Mohon maaf, ukuran file maksimal adalah 5 MB! Silakan upload ulang.</center></span>");
                    $(this).val(null);
                }
                if (fileType != 'jpg' && fileType != 'jpeg' && fileType != 'png') {
                    $.alert("<span style='color: red; font-weight: bold; text-align: center;'><center>Mohon maaf, silakan upload hanya file image (.jpg, .jpeg, atau .png)!</center></span>");
                    $(this).val(null);
                }
            }
        });

        $(document).ready(function() {
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
        });

        function pleaseWait() {
            $('#submit').prop('hidden', true);
            $("#uploading").removeAttr("hidden");
        }

        $("#jumlah_anggota").change(function() {
            if ($("#jumlah_anggota").val() == 1 || $("#jumlah_anggota").val() == '') {
                $('#member-2').prop('hidden', true);
                $("#nama_peserta_2").removeAttr("required");
                $("#hp_peserta_2").removeAttr("required");
                $("#line_peserta_2").removeAttr("required");
                $("#email_peserta_2").removeAttr("required");
                $("#3x4_peserta_2").removeAttr("required");
                $("#kartu_peserta_2").removeAttr("required");
                if ($("#jenjang_pendidikan").val() == 'College') {
                    $("#jurusan_peserta_2").removeAttr("required");
                }
                $("#domisili_peserta_2").removeAttr("required");

                $('#member-3').prop('hidden', true);
                $("#nama_peserta_3").removeAttr("required");
                $("#hp_peserta_3").removeAttr("required");
                $("#line_peserta_3").removeAttr("required");
                $("#email_peserta_3").removeAttr("required");
                $("#3x4_peserta_3").removeAttr("required");
                $("#kartu_peserta_3").removeAttr("required");
                if ($("#jenjang_pendidikan").val() == 'College') {
                    $("#jurusan_peserta_3").removeAttr("required");
                }
                $("#domisili_peserta_3").removeAttr("required");
            } else if ($("#jumlah_anggota").val() == 2) {
                $("#member-2").removeAttr("hidden");
                $("#nama_peserta_2").prop('required', true);
                $("#hp_peserta_2").prop('required', true);
                $("#line_peserta_2").prop('required', true);
                $("#email_peserta_2").prop('required', true);
                $("#3x4_peserta_2").prop('required', true);
                $("#kartu_peserta_2").prop('required', true);
                if ($("#jenjang_pendidikan").val() == 'College') {
                    $("#jurusan_peserta_2").prop('required', true);
                }
                $("#domisili_peserta_2").prop('required', true);

                $('#member-3').prop('hidden', true);
                $("#nama_peserta_3").removeAttr("required");
                $("#hp_peserta_3").removeAttr("required");
                $("#line_peserta_3").removeAttr("required");
                $("#email_peserta_3").removeAttr("required");
                $("#3x4_peserta_3").removeAttr("required");
                $("#kartu_peserta_3").removeAttr("required");
                if ($("#jenjang_pendidikan").val() == 'College') {
                    $("#jurusan_peserta_3").removeAttr("required");
                }
                $("#domisili_peserta_3").removeAttr("required");
            } else if ($("#jumlah_anggota").val() == 3) {
                $("#member-2").removeAttr("hidden");
                $("#nama_peserta_2").prop('required', true);
                $("#hp_peserta_2").prop('required', true);
                $("#line_peserta_2").prop('required', true);
                $("#email_peserta_2").prop('required', true);
                $("#3x4_peserta_2").prop('required', true);
                $("#kartu_peserta_2").prop('required', true);
                if ($("#jenjang_pendidikan").val() == 'College') {
                    $("#jurusan_peserta_2").prop('required', true);
                }
                $("#domisili_peserta_2").prop('required', true);

                $("#member-3").removeAttr("hidden");
                $("#nama_peserta_3").prop('required', true);
                $("#hp_peserta_3").prop('required', true);
                $("#line_peserta_3").prop('required', true);
                $("#email_peserta_3").prop('required', true);
                $("#3x4_peserta_3").prop('required', true);
                $("#kartu_peserta_3").prop('required', true);
                if ($("#jenjang_pendidikan").val() == 'College') {
                    $("#jurusan_peserta_3").prop('required', true);
                }
                $("#domisili_peserta_3").prop('required', true);
            }
        });

        $("#jenjang_pendidikan").change(function() {
            $("#row_nama_sekolah").removeAttr("hidden");
            $("#nama_sekolah").prop('required', true);
            $("#row_alamat_sekolah").removeAttr("hidden");
            $("#alamat_sekolah").prop('required', true);

            if ($("#jenjang_pendidikan").val() == 'Senior High School') {
                $("#label_nama_sekolah").html('School Name');
                $("#nama_sekolah").prop('placeholder', 'Ex: SMAK St. Louis 1 Surabaya');

                $("#label_alamat_sekolah").html('School Address');
                $("#alamat_sekolah").prop('placeholder', 'Ex: Jl. Polisi Istimewa No. 7');

                $('#row_jurusan_1').prop('hidden', true);
                $("#jurusan_peserta_1").removeAttr("required");
                $('#row_jurusan_2').prop('hidden', true);
                $("#jurusan_peserta_2").removeAttr("required");
                $('#row_jurusan_3').prop('hidden', true);
                $("#jurusan_peserta_3").removeAttr("required");

                $('#row-competition-shs').removeAttr("hidden");
                $('#row-competition-college').prop('hidden', true);

                $('#row-fees-college').prop('hidden', true);
                $('#row-fees-shs').removeAttr("hidden");

                $("#row-pay-shs").removeAttr("hidden");
                $('#row-pay-college').prop('hidden', true);

                $("#row-payment").removeAttr("hidden");
            } else if ($("#jenjang_pendidikan").val() == 'College') {
                $("#label_nama_sekolah").html('University Name');
                $("#nama_sekolah").prop('placeholder', 'Ex: Universitas Kristen Petra');

                $("#label_alamat_sekolah").html('University Address');
                $("#alamat_sekolah").prop('placeholder', 'Ex: Jl. Siwalankerto No. 121-131, Surabaya');

                $("#row_jurusan_1").removeAttr("hidden");
                $("#jurusan_peserta_1").prop('required', true);
                $("#row_jurusan_2").removeAttr("hidden");
                $("#jurusan_peserta_2").prop('required', true);
                $("#row_jurusan_3").removeAttr("hidden");
                $("#jurusan_peserta_3").prop('required', true);

                $('#row-competition-college').removeAttr("hidden");
                $('#row-competition-shs').prop('hidden', true);

                $('#row-fees-shs').prop('hidden', true);
                $('#row-fees-college').removeAttr("hidden");

                $('#row-pay-shs').prop('hidden', true);
            } else {
                $('#row_nama_sekolah').prop('hidden', true);
                $("#nama_sekolah").removeAttr("required");
                $('#row_alamat_sekolah').prop('hidden', true);
                $("#alamat_sekolah").removeAttr("required");

                $('#row_jurusan_1').prop('hidden', true);
                $("#jurusan_peserta_1").removeAttr("required");
                $('#row_jurusan_2').prop('hidden', true);
                $("#jurusan_peserta_2").removeAttr("required");
                $('#row_jurusan_3').prop('hidden', true);
                $("#jurusan_peserta_3").removeAttr("required");

                $('#row-competition-shs').prop('hidden', true);
                $('#row-competition-college').prop('hidden', true);

                $('#row-fees-shs').prop('hidden', true);
                $('#row-fees-college').prop('hidden', true);

                $('#row-pay-shs').prop('hidden', true);
                $('#row-pay-college').prop('hidden', true);

                $('#row-payment').prop('hidden', true);
            }
        });

        function checkFill() {
            if ($('#pilihan_lomba_1').is(":checked") || $('#pilihan_lomba_2').is(":checked") || $('#pilihan_lomba_3').is(":checked") || $("#jenjang_pendidikan").val() == 'Senior High School') {
                $("#submit").removeAttr("disabled");
                $('#warning').prop('hidden', true);
                if ($('#pilihan_lomba_1').is(":checked") || $('#pilihan_lomba_2').is(":checked") || $('#pilihan_lomba_3').is(":checked")) {
                    if ($("#jenjang_pendidikan").val() == 'College') {
                        $("#row-pay-college").removeAttr("hidden");
                        $("#row-payment").removeAttr("hidden");
                    }
                }
            } else {
                $('#submit').prop('disabled', true);
                $("#warning").removeAttr("hidden");
                $('#row-pay-college').prop('hidden', true);
                $('#row-payment').prop('hidden', true);
            }

            if ($('#pilihan_lomba_1').is(":checked") || $("#jenjang_pendidikan").val() == 'Senior High School') {
                $('#row-bukti-transfer-bc').prop('hidden', false);
                $('#bukti_transfer_bc').prop('required', true);
                $('#bc-pay').prop('hidden', false);
            } else {
                $('#row-bukti-transfer-bc').prop('hidden', true);
                $('#bukti_transfer_bc').prop('required', false);
                $('#bc-pay').prop('hidden', true);
            }
            if ($('#pilihan_lomba_2').is(":checked") && $("#jenjang_pendidikan").val() == 'College') {
                $('#row-bukti-transfer-erdc').prop('hidden', false);
                $('#bukti_transfer_erdc').prop('required', true);
                $('#erdc-pay').prop('hidden', false);
            } else {
                $('#row-bukti-transfer-erdc').prop('hidden', true);
                $('#bukti_transfer_erdc').prop('required', false);
                $('#erdc-pay').prop('hidden', true);
            }
            if ($('#pilihan_lomba_3').is(":checked") && $("#jenjang_pendidikan").val() == 'College') {
                $('#row-bukti-transfer-lktb').prop('hidden', false);
                $('#bukti_transfer_lktb').prop('required', true);
                $('#lktb-pay').prop('hidden', false);
            } else {
                $('#row-bukti-transfer-lktb').prop('hidden', true);
                $('#bukti_transfer_lktb').prop('required', false);
                $('#lktb-pay').prop('hidden', true);
            }

            // var feesInt = 0;
            // if ($('#pilihan_lomba_1').is(":checked") || $("#jenjang_pendidikan").val() == 'Senior High School') {
            //     feesInt += 260000;
            // }
            // if ($('#pilihan_lomba_2').is(":checked")) {
            //     feesInt += 240000;
            // }
            // if ($('#pilihan_lomba_3').is(":checked")) {
            //     feesInt += 215000;
            // }
            // var feesString = feesInt.toString();
            // feesString = "Rp" + feesString.slice(0, 3) + "." + feesString.slice(3) + ",00";
            // if (feesInt == 0) {
            //     $("#fees").html("Rp0,00");
            // } else {
            //     $("#fees").html(feesString);
            // }
        }

        window.setInterval(function() {
            checkFill();
        }, 0);
    </script>