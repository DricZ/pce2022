<?php
require_once 'phps/connect.php';
$_SESSION['page'] = 'info_checking_erdc';
require_once 'header.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>ERDC 2022 - Checking Session</title>
</head>

<script>
    function successCheckingERDC() {
        $.confirm({
            title: 'SUKSES MEMILIH JADWAL CHECKING SESSION',
            type: 'green',
            typeAnimated: true,
            icon: 'far fa-check-circle',
            theme: 'modern',
            draggable: false,
            backgroundDismissAnimation: 'random',
            onOpen: function() {
                setTimeout(() => {
                    var str = `
                  <div style="color: black; font-weight: 500; max-height: 360px;">
                     <p style="font-size: 14pt;">Terima kasih sudah memilih jadwal untuk <b><i>Checking Session</i></b> untuk lomba <b><i>Earthquake Resistant and Design Competition 2022</i></b>! Silakan datang bersama dengan anggota satu tim ke <b>link Zoom</b> berikut sesuai dengan jadwal yang sudah dipilih sebelumnya.</p>

                     <p style="font-size: 14pt;">
                        <a href="https://petra.id/CheckingERDC2022" style="text-decoration: none; font-weight: bold; color: brown;" target="_blank">petra.id/CheckingERDC2022</a>
                        <br>
                        Meeting ID: <b>824 6925 7392</b><br>
                        Passcode: <b>433777</b>
                     </p>
                     `;

                    str += `
                     <p class="mt-3" style="font-size: 14pt;"><b>Stay safe and God bless you!</b></p>
                  </div>
               `;
                    this.$content.html(str);
                }, 100);
            },
            closeAnimation: 'scale',
            columnClass: "col-md-7",
            buttons: {
                cancel: {
                    text: 'OK',
                    btnClass: 'btn-red',
                    action: function() {}
                }
            },
            content: ""
        });
    }
</script>

<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 6) {
        echo "<script>",
        "successCheckingERDC()",
        "</script>";
    } else if ($_GET['status'] == 4) {
        echo '<script>',
        '	Swal.fire({
                position: "center",
                icon: "error",
                title: "Terjadi Error di Server! <br>Silakan Coba Lagi",
                showConfirmButton: false,
                timer: 3000
                })',
        '</script>';
    } else if ($_GET['status'] == 1) {
        echo '<script>',
        '	Swal.fire({
                position: "center",
                icon: "success",
                title: "Sampai Jumpa Kembali!",
                showConfirmButton: false,
                timer: 3000
                })',
        '</script>';
    }
}
?>

<body>
    <style>
        body {
            font-weight: normal;
            margin: 0px;
            padding: 0px;
        }

        h2 {
            font-size: 7vh;
        }

        .info {
            min-height: 100vh;
            background: url(asset/image/CHECKING.png) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .faq {
            background-color: #c7b299;
            min-height: 120vh;
        }

        .question {
            cursor: pointer;
            text-align: justify;
        }

        @media screen and (max-width: 893px) {
            #outline-gedung {
                display: none;
            }

            #lower-curve {
                display: none;
            }

            #upper-curve {
                display: none;
            }
        }
    </style>


    <section class="info" id="info" style="margin-bottom: 20vh;">
        <!-- bg image -->
        <!-- <img class="bg" src="asset/image/CHECKING.png"> -->

        <!-- upper curve -->
        <svg id="upper-curve" style="position:absolute;" xmlns="http://www.w3.org/2000/svg" width="50vw" viewBox="0 0 580.32 497.07">
            <defs>
                <style>
                    .cls-1 {
                        fill: #fffcfa;
                    }
                </style>
            </defs>
            <g id="Layer_2" data-name="Layer 2">
                <g id="Layer_1-2" data-name="Layer 1">
                    <path class="cls-1" d="M.5,497.07s119-313,311-243S580.32,0,580.32,0L0,1.57Z" />
                </g>
            </g>
        </svg>

        <!-- lower curve -->
        <svg id="lower-curve" style="position:absolute; bottom:-20vh; right:0;" width="50vw" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 584 430.66">
            <defs>
                <style>
                    .cls-2 {
                        fill: #c7b299;
                    }
                </style>
            </defs>
            <g id="Layer_3" data-name="Layer 3">
                <g id="Layer_3-2" data-name="Layer 3">
                    <path class="cls-2" d="M584,14.66c-453-108-584,416-584,416H583.5Z" />
                </g>
            </g>
        </svg>

        <!-- logo erdc -->
        <img src="asset/image/pce_erdc.png" style="position:absolute; width:14vw; top:20vh; left:10vw;">

        <!-- outline gedung erdc -->
        <img id="outline-gedung" src="asset/svg/outline_gedung_erdc.svg" style="position:absolute; width:30vw; bottom:-1vh; right:0;">

        <div class="col-md-6 col-sm-8 col-12 mx-auto" style="padding-top:15vh; padding-bottom:10px; position:relative;z-index:10;">
            <h2 style="text-align:right;font-weight:bold;" class="pt-5 pb-3 mx-5">ERDC Checking Session</h2>

            <p style="text-align:justify;" class="mx-5">
                <b><i>Checking session</i></b> adalah waktu yang diberikan bagi para peserta lomba <i><b>Earthquake Resistant Design Competition 2022</b></i> untuk melakukan pengecekan terhadap maket yang telah dibuat. Setiap tim diberi kesempatan memilih maksimal 2 (dua) sesi <i>checking</i> sesuai jadwal yang dapat dipilih oleh peserta pada <i>website</i>.
                Setiap sesi mempunyai durasi maksimal 1 (satu) jam. <i>Checking session</i> akan menggunakan <i>link</i> Zoom yang akan diberikan setelah peserta memilih jadwal sesi pada <i>website</i>.
            </p>
            <p style="text-align:justify;" class="mx-5">
                Yang dapat dilakukan saat <i>checking</i>:<br>
            <ol class="mx-5 mb-5">
                <li>QnA kepada panitia mengenai ketentuan maket</li>
                <li>Pengecekan berat maket</li>
                <li>Pengecekan ukuran dimensi maket (panitia menggunakan penggaris segitiga <i>rotring orange</i>)</li>
            </ol>
            </p>
        </div>
    </section>
    
    <!-- <section class="faq" id="faq" class="mb-5">
        <div class="container pt-1">
            <h2 style="font-weight:bold;text-align:center;position:relative;z-index:20;" class="py-3 mt-5">Frequently Asked Questions</h2>
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h6 class="question" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Bagaimana cara <i>login</i> ke <i>web</i> ini?
                        </h6>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body mb-2">
                            <p>
                                Anda dapat pergi ke menu <b>Login</b> kemudian memasukkan <i>username</i> dan <i>password</i> dengan format sebagai berikut:
                            </p>
                            <p>
                            <ul type="none">
                                <li>
                                    <b>Username</b>: Nomor Kelompok
                                </li>
                                <li>
                                    <b>Password</b>: Nama Kelompok (ditulis dengan <b>huruf kecil</b> dan <b>tanpa menggunakan spasi</b>)
                                </li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h6 class="question" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Apa saja yang akan dilakukan pada saat <i>checking session</i>?
                        </h6>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <p style="text-align: justify;">
                                Untuk <i>checking session</i> kali ini, kami dari pihak panitia akan memeriksa apakah <b>maket</b> yang dibuat sudah mengikuti semua aturan dengan <b>TOR <i>(Terms Of Reference)</i></b> yang sudah diberikan sebelumnya yang nantinya maket tersebut akan dikirimkan kepada kami.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h6 class="question" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Mengapa <i>checking session</i> dibagi menjadi 4 (empat) sesi?
                        </h6>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <p style="text-align: justify;">
                                Untuk <i>checking session</i>, kami dari pihak panitia menyediakan <b>4 (empat)</b> sesi agar semua kelompok dapat memaksimalkan sesi <i>checking</i> ini dengan baik. Dengan adanya 4 (empat) sesi ini, maka masing-masing kelompok akan mendapatkan jatah <b>maksimal 2 (dua) kali</b> untuk <b>memilih jadwal <i>checking</i></b>. Keputusan tetap di tangan tiap kelompok untuk mau mengambil 1 (satu) kali atau 2 (dua) kali jadwal <i>checking</i>.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h6 class="question" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Apakah bisa mengganti atau membatalkan jadwal <i>checking session</i> apabila ada urusan yang mendadak?
                        </h6>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                        <div class="card-body">
                            <p style="text-align: justify;">
                                Apabila saat hari H pelaksanaan <i>checking session</i> ternyata terdapat salah satu anggota tim yang berhalangan, <i>checking session</i> dapat tetap dilaksanakan berdasarkan jadwal yang sudah dipilih sebelumnya. Namun, jika seluruh anggota tim berhalangan mengikuti <i>checking session</i> berdasarkan jadwal yang telah dipilih, maka tim tersebut perlu <b>menghubungi pihak panitia</b> melalui <i>contact person</i> yang telah tersedia.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h6 class="question" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Bagaimana apabila dalam <i>checking session</i> masih ada beberapa hal yang kurang jelas tetapi waktu sudah habis?
                        </h6>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                        <div class="card-body">
                            <p style="text-align: justify;">
                                Anda dapat menghubungi pihak panitia melalui:
                            </p>
                            <p style="text-align: justify;">
                            <ul type="none">
                                <li>E-mail: <a href="mailto:erdcukp@gmail.com" target="_blank" style="text-decoration: none; font-weight: bold; color: black;">erdcukp@gmail.com</a></li>
                                <li>LINE OA: <a href="https://line.me/ti/p/~@978opekz" target="_blank" style="text-decoration: none; font-weight: bold; color: black;">@978opekz</a></li>
                                <li>WhatsApp: <a href="https://wa.me/6281350365868" target="_blank" style="text-decoration: none; font-weight: bold; color: black;">081350365868</a></li>
                            </ul>
                            </p>
                            <p style="text-align: justify;">
                                Fasilitas ini dapat ditemukan di <a href="#contactus" style="color: black; text-decoration: none; font-weight: bold;">bagian bawah</a> situs kami. Pihak panitia akan dengan senang hati menjawab semua pertanyaan Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <section>
        <?php include 'footer.php' ?>
    </section>
</body>

</html>