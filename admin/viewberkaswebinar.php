<?php
require_once 'phps/connect.php';
if (isset($_GET['id'])) {
    $sql = "SELECT * FROM webinar WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_GET['id']]);
    $res = $stmt->fetch();
}

include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<style>
    .berkas {
        width: 100%;
        margin-top: 10px;
        margin-bottom: 10px;
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

<main>
    <div id="particles-js"></div>

    <section id="formdaftar" class="formdaftar">

        <div class="container">

            <form action="phps/daftar.php" method="post" enctype="multipart/form-data" id="form_daftar">
                <div class="col-sm-12 col-md-8 offset-md-2">

                    <div class="row justify-content-center">
                        <h3 class="title" style="font-weight: bold;">
                            VIEW DATA PENDAFTAR WEBINAR
                        </h3>
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
                                <center><label for="country" style="font-weight: bold;">I am an...</label></center>
                                <input type="text" class="form-control" id="country" name="country" style="height:40px; font-size: 12pt; text-align: center;" placeholder="Ex: Petra Christian University" value="<?= $res['country']; ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="row_nama_sekolah">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <center><label for="nama_sekolah" id="label_nama_sekolah" style="font-weight: bold;">University or School Name</label></center>
                                <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" style="height:40px; font-size: 12pt; text-align: center;" placeholder="Ex: Petra Christian University" value="<?= $res['nama_sekolah']; ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="row_alamat_sekolah">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <center><label for="alamat_sekolah" id="label_alamat_sekolah" style="font-weight: bold;">University or School Address</label></center>
                                <textarea type="text" class="form-control" id="alamat_sekolah" name="alamat_sekolah" style="font-size: 12pt;  text-align: center;" placeholder="Ex: Jl. Siwalankerto No. 121-131, Siwalankerto, Surabaya, Indonesia" rows="2" disabled><?= $res['alamat_sekolah']; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <br>
                    <hr>
                    <br>

                    <div id="member-1">
                        <div class="row justify-content-center">
                            <h3 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">Participant's Information</h3>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="nama" style="font-weight: bold;">Full Name</label></center>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Input your full name" style="height:40px; font-size: 12pt; text-align: center;" value="<?= $res['nama']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="no_hp" style="font-weight: bold;">Phone Number</label></center>
                                    <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Ex: +628123456789" style="height:40px; font-size: 12pt; text-align: center;" value="<?= $res['no_hp']; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="line" style="font-weight: bold;">LINE ID</label></center>
                                    <center><a href="http://line.me/ti/p/~<?= $res['line']; ?>" target="_blank" style="min-width: 50%;" class="line btn btn-success"><?= $res['line']; ?></a></center>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <center><label for="email" style="font-weight: bold;">E-mail</label></center>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Ex: petracivilexpo@gmail.com" style="height:40px; font-size: 12pt; text-align: center;" value="<?= $res['email']; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <center><label for="domisili" style="font-weight: bold;">Domicile</label></center>
                                    <input type="text" class="form-control" id="domisili" name="domisili" placeholder="Ex: Surabaya, Melbourne, Vancouver, etc." style="height:40px; font-size: 12pt; text-align: center;" value="<?= $res['domisili']; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-md-6 offset-md-3">
                                <h4 style="text-align: center; font-weight: bold;">Participant's Student ID</h4>
                                <p style="text-align: center; font-weight: bold; color: red;">(click on image to enlarge)</p>
                                <center>
                                    <a href="../uploads/webinar_student_id/<?php echo $res['student_id']; ?>" target="_blank">
                                        <img class="berkas" src="../uploads/webinar_student_id/<?php echo $res['student_id']; ?>">
                                    </a>
                                </center>
                            </div>
                        </div>

                        <br>
                        <hr>
                        <br>

                        <center>
                            <a style="border-radius: 5px; font-weight: bold; height:40px; font-size: 12pt;" href="list_pendaftar_webinar.php" class="btn btn-warning" id="back">Back</a>
                        </center>

                    </div>

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