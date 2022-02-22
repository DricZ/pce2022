<?php
// session_start();
// header('Location: index.php');
// exit();
$_SESSION['page'] = 'webinar_daftar';
include 'header.php';

if (isset($_GET['status'])) {
    if ($_GET['status'] == 5) {
        echo "<script>alert('Sorry, the maximum image file size is 5 MB. Please re-upload.')</script>";
    } else if ($_GET['status'] == 6) {
        echo "<script>alert('Sorry, there was an error on the server. Please upload your file again.')</script>";
    } else if ($_GET['status'] == 7) {
        echo "<script>alert('Sorry, please upload only image files (.png, .jpg, .jpeg)!')</script>";
    } else if ($_GET['status'] == 0) {
        echo "<script>",
        "alert('Sorry, there was an error on the server. Please try again.')",
        "</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<<<<<<< HEAD
    <title>PCE 2022 - Webinar Registration</title>
=======
    <title>PCE 2022 - Talk Show Registration</title>
>>>>>>> 4d66d3bdd585a9f342bd2a8833a3e6089754d609
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

<body>
    <section id="formdaftar" class="formdaftar">
        <div class="container">
            <center><a href="https://www.instagram.com/petracivilexpo/" target="_blank"><img src="assets/pce_logo color.png" alt="" style="max-width: 50%;" id="logo-pce"></a></center><br><br>

            <div class="row justify-content-center mx-3">
                <h4 class="title" style="text-align: center;">
                    <b>PETRA CIVIL EXPO 2022</b>
                </h4>
            </div>
            <div class="row justify-content-center mx-3">
                <h4 class="title" style="text-align: center;">
                    <b>INTERNATIONAL TALKSHOW</b>
                </h4>
            </div>

            <div class="row justify-content-center mt-5 mx-3">
                <h3 class="title" style="text-align: center; text-shadow: 3px 3px white, 4px 4px white, 5px 5px white;">
                    <b>"INNOVATIVE CONSTRUCTION TECHNOLOGIES FOR AN IMPACTFUL BREAKTHROUGH"</b>
                </h3>
            </div>
            <div class="justify-content-center mt-3 mx-3">
                <h5 class="title" style="text-align: center;">
                    SAVE THE DATE
                </h5>
                <h5 class="title" style="text-align: center;">
                    <b><i class="fas fa-calendar-alt"></i> Friday, March 5th, 2022</b>
                </h5>
                <h5 class="title" style="text-align: center;">
                    <b><i class="far fa-clock"></i> 14:00 WIB (GMT+7)</b>
                </h5>
            </div>
            <div class="justify-content-center mt-5 mx-3">
                <h5 class="title" style="text-align: center;">
                    <b>SPEAKER</b>
                </h5>
                <center><img class="mt-2" id="foto-pak-iwan" src="assets/iwan_sunito.png" alt=""></center>
                <style>
                    #foto-pak-iwan {
                        width: 30%;
                    }

                    @media (max-width: 768px) {
                        #foto-pak-iwan {
                            width: 95%;
                        }
                    }
                </style>
                <h3 class="title mt-3" style="text-align: center;">
                    <b>Iwan Sunito</b>
                </h3>
                <hr style="width: 200px;">
                <h4 class="title mt-3" style="text-align: center;">
                    <b>CEO Crown Group</b>
                </h4>
                <h4 class="title" style="text-align: center;">
                    <b>"The King of Property Australia"</b>
                </h4>
            </div>

            <!-- Video Webinar -->
            <!-- <div class="justify-content-center mt-5 mx-3">
                <h5 class="title mb-3" style="text-align: center;">
                    <b>WATCH THE STORY</b>
                </h5>
                <center>
                    <iframe id="story" src="https://www.youtube.com/embed/WLUIc6PuuUs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </center>
                <style>
                    #story {
                        width: 50%;
                        height: 400px;
                    }

                    @media (max-width: 768px) {
                        #story {
                            width: 95%;
                        }
                    }
                </style>
            </div> -->
            
            <br>
            <br>

            <!-- BELUM FIX -->
            <!-- Gambar Poster -->
            <div class="row justify-content-center mt-4">
                <center>
                    <a href="assets/poster_webinar.jpg" target="_blank">
                        <img class="gambar-poster poster" src="assets/poster_webinar.jpg" alt="">
                    </a>
                </center>
            </div>
            <div class="row justify-content-center mt-3 mb-5">
                <h6><b>CLICK ON POSTER TO ENLARGE</b></h6>
            </div>

            <style>
                .poster {
                    transition: 0.5s;
                }

                .gambar-poster {
                    width: 40%;
                }

                .poster:hover {
                    transition: 0.5s;
                    transform: scale(1.05);
                }

                @media (max-width: 768px) {
                    .gambar-poster {
                        width: 85%;
                    }
                }
            </style>

            <form action="phps/daftar_webinar.php" method="post" enctype="multipart/form-data" onsubmit="pleaseWait()" id="form_daftar">
                <div class="col-sm-12 col-md-8 offset-md-2">
                    <hr class="mb-4">
                    <div class="row justify-content-center mx-3 mt-3">
                        <h3 class="title" style="text-align: center;">
                            <b>REGISTRATION PAGE</b>
                        </h3>
                    </div>

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
                                <center><label for="country" style="font-weight: bold;">I am an...</label></center>
                                <select class="form-control" id="country" name="country" style="height:40px; font-size: 12pt;" required>
                                    <option value="">Please select one...</option>
                                    <option value="Indonesian Student">Indonesian Student</option>
                                    <option value="International Student">International Student (outside Indonesia)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="row_nama_sekolah">
                        <div class="col-12">
                            <div class="form-group">
                                <center><label for="nama_sekolah" id="label_nama_sekolah" style="font-weight: bold;">University or School Name</label></center>
                                <input type="text" class="form-control" placeholder="Petra Christian University" id="nama_sekolah" name="nama_sekolah" style="height:40px; font-size: 12pt; text-align: center;" required>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="row_alamat_sekolah">
                        <div class="col-12">
                            <div class="form-group">
                                <center><label for="alamat_sekolah" id="label_alamat_sekolah" style="font-weight: bold;">University or School Address</label></center>
                                <textarea type="text" class="form-control" placeholder="Jl. Siwalankerto No. 121-131, Surabaya, Indonesia" id="alamat_sekolah" name="alamat_sekolah" style="font-size: 12pt; text-align: center;" rows="2" required></textarea>
                            </div>
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="row justify-content-center mx-3">
                        <h4 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">A T T E N T I O N</h4>
                        <h4 style="font-size: 12pt; color: red; text-align: center;">For participant who <b>DOES NOT</b> have a <b>Student ID (KTM or Student Card)</b>, <b>MISSING</b>, or has <b>EXCEEDED THE VALIDITY PERIOD</b> of the Student ID, then you <b><u>MUST</u></b> make <b>A Statement Letter</b> stating that you are currently studying at the University or School that you are attending, and <b>SIGNED</b> by the Head of Study Program (for University) or other parties for School (School Principal, School Administration, or Teacher).</h4>
                    </div>

                    <br>
                    <hr>
                    <br>

                    <div class="row justify-content-center">
                        <h3 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">Please Fill Your Information</h3>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <center><label for="nama" style="font-weight: bold;">Full Name</label></center>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Input your full name" style="height:40px; font-size: 12pt; text-align: center;" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <center><label for="no_hp" style="font-weight: bold;">Phone Number</label></center>
                                <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Ex: +628123456789" style="height:40px; font-size: 12pt; text-align: center;" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <center><label for="line" style="font-weight: bold;">LINE ID</label></center>
                                <input type="text" class="form-control" id="line" name="line" placeholder="Input your LINE ID" style="height:40px; font-size: 12pt; text-align: center;" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <center><label for="email" style="font-weight: bold;">E-mail</label></center>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Ex: petracivilexpo@gmail.com" style="height:40px; font-size: 12pt; text-align: center;" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <center><label for="domisili" style="font-weight: bold;">Domicile</label></center>
                                <input type="text" class="form-control" id="domisili" name="domisili" placeholder="Ex: Surabaya, Melbourne, Vancouver, etc." style="height:40px; font-size: 12pt; text-align: center;" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 offset-md-3">
                            <div class="form-group" align="center">
                                <label for="student_id" style="font-weight: bold;">Upload Your Student ID<br><span style="color: red;">(MAX 5 MB OF .jpg, .jpeg, OR .png)</span></label>
                                <input type="file" class="form-control-file fileUploadContainer" id="student_id" name="student_id" accept="image/*" required>
                            </div>
                        </div>
                    </div>

                    <hr class="my-5">

                    <div id="row-payment">

                    </div>

                    <div class="row justify-content-center mx-3">
                        <h3 style="font-weight: bold; font-size: 12pt; color: red; text-align: center;" id="warning">Please make sure all data is filled and correct before submitting!</h3>
                    </div>

                    <br>

                    <center>
                        <button onclick="checkFill()" style="border-radius: 5px; font-weight: bold; height:40px; font-size: 12pt;" type="submit" class="btn btn-warning" id="submit">Submit Data</button>
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

    </section>

    <?php include 'footer.php' ?>

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

        $("#country").change(function() {
            if ($("#country").val() == 'International Student' || $("#country").val() == '') {
                $('#row-payment').html('')
            } else if ($("#country").val() == 'Indonesian Student') {
                $('#row-payment').html(`
                    <div class="row justify-content-center">
                        <h3 style="font-weight: bold; font-size: 18pt; color: red; text-align: center;">Payment</h3>
                    </div>
                    <div class="row justify-content-center">
                        <img src="assets/webinar_bca.png" alt="bca 6124888888 a/n johan eric" style="width: 300px; height: 200px;">
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-12 col-md-6 offset-md-3">
                            <div class="form-group" align="center">
                                <h5 for="total_amount" style="font-weight: bold; color: red;">AMOUNT TO BE PAID</h5>
                                <h5 id="fees" style="font-weight: bold; font-size: 20pt;">Rp30.000,00</h5>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div id="row-pay-shs" class="mx-3">
                        <div class="row justify-content-center">
                            <h3 style="font-weight: bold; font-size: 12pt; color: red; text-align: center;">Please make a payment transfer to the BCA (Bank Central Asia) account above in accordance with the nominal given. Thank you and enjoy the INTERNATIONAL TALKSHOW!</h3><br>
                        </div>

                    </div>

                    <div class="row" id="row-bukti-transfer-bc">
                        <div class="col-12 col-md-6 offset-md-3">
                            <div class="form-group" align="center">
                                <label for="bukti_transfer" style="font-weight: bold;">Upload Your Proof of Payment<br><span style="color: red;">(MAX 5 MB OF .jpg, .jpeg, OR .png)</span></label>
                                <input type="file" class="form-control-file fileUploadContainer" id="bukti_transfer" name="bukti_transfer" accept="image/*" required>
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
                `);
            }
        });

        function pleaseWait() {
            $('#submit').prop('hidden', true);
            $("#uploading").removeAttr("hidden");
        }
    </script>