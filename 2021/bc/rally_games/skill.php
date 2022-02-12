<?php
include 'header.php';

$i = 1;
$output = '';

$_SESSION['page'] = 'skill';

$sqlTeam = "SELECT * FROM team WHERE username = ?";
$stmtTeam = $pdo->prepare($sqlTeam);
$stmtTeam->execute([$_SESSION['username']]);
$rowTeam = $stmtTeam->fetch();

$sql = "SELECT c.city_name FROM team_constructed_landmark a JOIN landmark b ON a.id_landmark = b.id JOIN city c ON b.id_city = c.id WHERE id_team = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$rowTeam['id']]);

while ($row = $stmt->fetch()) {
    $output .= '<div class="' . $row['city_name'] . ' inventory-item d-flex justify-content-between">
        <i class="mr-3"> <img src="assets/image/jakarta.svg" class="icons"> </i>
        <p class="nama_item"> ' . $row['city_name'] . ' </p>
        <p class="jumlah_item pr-2">Active</p>
    </div>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKILL</title>
</head>
<style>
    #containerAll {
        max-height: 100vh;
        height: 100vh;
        width: 100%;
        /* padding: 2%; */

        background-repeat: no-repeat;
        background-size: 100% 100%
    }

    #containerAll p {
        color: white;
        font-family: 'Spartan', sans-serif;
    }

    .content {
        height: 85vh;
    }

    .inventory-item {
        position: relative;
        height: 4vw;
        width: 100%;
        background-color: rgb(0, 0, 0, 0.3);
        margin-top: 1%;
        border-radius: 5px;
        padding: 0.5%;
        /* border-style: double; */
        top: 100vh;
    }

    .inventory-item i {
        width: 10%;
        top: 100vh;
    }

    .resource-name {
        font-size: 2vw;
        margin: 0;
    }

    .resource-quantity {
        font-size: 5vw;
    }

    .inventory-header {
        /* height: 15vh; */
        width: 100%;
        font-size: 50pt;
        font-weight: 800;
        text-transform: uppercase;
    }

    .icons {
        border-radius: 10px;
        width: 45%;
    }

    #itemlist {
        margin: 0;
        padding-left: 1vw;
        padding-right: 1vw;
    }

    #itemdesc {
        height: 100%;
        width: 0vw;
        background-color: rgb(0, 0, 0, 0.3);
        padding: 0.5%;
    }

    .desc-icons {
        width: 50%;
        border-radius: 5px;
    }

    .itemdesc-container {
        height: 70%;
        width: 100%;
        padding: 3%;
        background-color: rgb(0, 0, 0, 0.1);
        border-radius: 5px;
        overflow-y: auto;
        /* border-style: double; */
    }

    .itemdesc-description {
        width: 100%;
        border-top-style: solid;
    }

    /* .itemdesc-description {

        width: 100%;
        border-top-style: solid;
    } */

    .nama_item {
        font-size: 1.6vw;
        padding-top: 1%;
    }

    .jumlah_item {
        padding-left: 10%;
        font-size: 2vh;
        padding-top: 1%;
    }

    body {
        overflow: hidden;

    }

    #decor-skill {
        background-image: linear-gradient(to right, #ffdca2, #ff9190, #36d1dc, #5b86e5);
        background-size: 300% 100%;
        animation: changeColor 10s infinite;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        position: absolute;
        left: 20%;
        top: 1%;
        display: none;
    }

    @media (min-width: 1286px) {
        #decor-skill {
            display: block;
        }
    }

    @media screen and (max-width: 1200px) and (min-width:992px) {
        #decor-hidden-post {
            left: 10% !important;
        }
    }

    @media screen and (max-width: 992px) {
        #decor-hidden-post {
            display: none;
        }
    }
</style>

<body>
    <div id="containerAll">
        <div class="container">
            <div class="row col-12 justify-content-center">
                <div class="inventory-header pt-3">
                    <div id="decor">
                        <!-- svg logo -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -230 512 700" style="width: 85px;">
                            <g class="" transform="translate(40,-200)" style="">
                                <path d="M498.03 15.125l-87.06 34.72-164.5 164.5-34.657-32.095 31.156-28.844-223-133.594L176.155 164.5l-31.094 28.813 63.563 58.875-70.03 70.03c2.932 3.53 5.915 7.01 8.968 10.438l9.656 9.656 71.5-71.5 13.718 12.688-72 72 9.843 9.844c3.502 3.116 7.044 6.19 10.657 9.187l72-72 40.782 37.75-29 26.876 223 133.594-158.69-146.97 29-26.842-67.217-62.282 162.5-162.5 34.718-87.03zM430.69 68.813l13.218 13.218L280.28 245.657l-13.717-12.687L430.688 68.812zm-341 216.875L61.874 313.5 199.22 450.875l27.81-27.844c-56.283-34.674-103.014-81.617-137.343-137.342zm18.75 100.812l-81 81 17.75 17.75 81-81-17.75-17.75z" fill="rgb(32,31,31)" fill-opacity="1"></path>
                            </g>
                        </svg>
                    </div>
                    <p class="text-center pt-1">Skill</p>
                </div>
            </div>
        </div>
        <div class="content d-flex">

            <div id="itemlist" class="flex-grow-1">
                <?php
                if ($output == '') {
                ?>
                    <!-- Tampilan jika tidak ada skill (kosong) -->
                    <div id="no-content-msg-skill">
                        <img src="assets/image/nothing-to-say.svg" width="55%">
                        <h3>You have no skill... yet.</h3>
                    </div>
                    <!-- END -->
                <?php
                } else {
                    echo $output;
                }
                ?>

            </div>

            <div id="itemdesc">


                <!-- INIT -->

                <div class="itemdesc-container desc-init">

                    <div class="itemdesc-pic d-flex justify-content-center mb-3">

                    </div>

                    <div class="itemdesc-description">
                        <p class="text-center mb-0 mt-2" style="font-size: 1.5vw;"> Hover on a skill to see the description!</p>
                    </div>

                </div>

                <!-- INIT -->

                <!-- JAKARTA -->

                <div class="itemdesc-container desc-jakarta">

                    <div class="itemdesc-pic d-flex justify-content-center mb-3">
                        <img src="assets/image/monas.svg" class="desc-icons">
                    </div>
                    <p class="text-center" style="font-size: 3vw;">Monumen Nasional</p>
                    <div class="itemdesc-description">
                        <p class="text-center mb-0 mt-2" style="font-size: 1.5vw;"> bonus 2000 Bridge Point</p>
                        <p class="text-center mb-0 mt-2" style="font-size: 1.5vw;"> hanya ada 1 slot tiap sub-sesi (20 menit)</p>
                    </div>
                </div>

                <!-- JAKARTA -->

                <!-- JAYAPURA -->

                <div class="itemdesc-container desc-jayapura">

                    <div class="itemdesc-pic d-flex justify-content-center mb-3">
                        <img src="assets/image/minerals.svg" class="desc-icons">
                    </div>
                    <p class="text-center" style="font-size: 2.5vw;">Jembatan Hotel Kamp</p>
                    <div class="itemdesc-description">
                        <p class="text-center mb-0 mt-2" style="font-size: 1.5vw;"> menambah total Bridge Point 15% di akhir game</p>
                        <p class="text-center mb-0 mt-2" style="font-size: 1.5vw;"> hanya ada 1 slot tiap sub-sesi (20 menit)</p>
                    </div>

                </div>

                <!-- JAYAPURA -->

                <!-- JOGJAKARTA -->

                <div class="itemdesc-container desc-jogjakarta">

                    <div class="itemdesc-pic d-flex justify-content-center mb-3">
                        <img src="assets/image/borobodour.png" class="desc-icons">
                    </div>
                    <p class="text-center" style="font-size: 3vw;">Candi Borobudur</p>
                    <div class="itemdesc-description">
                        <p class="text-center mb-0 mt-2" style="font-size: 2vw;"> mengurangi 1 buah bahan bangunan pilihan setiap membangun bangunan</p>
                    </div>

                </div>

                <!-- JOGJAKARTA -->

                <!-- BALI -->

                <div class="itemdesc-container desc-bali">

                    <div class="itemdesc-pic d-flex justify-content-center mb-3">
                        <img src="assets/image/baliVector.png" class="desc-icons">
                    </div>
                    <p class="text-center" style="font-size: 3vw;">Tourism Paradise</p>
                    <div class="itemdesc-description">
                        <p class="text-center mb-0 mt-2" style="font-size: 1.5vw;"> mendapatkan 2000 Bridge Money setiap berpindah kota, mengurangi cooldown berpindah kota sebanyak 5 menit (menjadi 15 menit), dan akan terbebas dari tiket terbang</p>
                    </div>

                </div>

                <!-- BALI -->

                <!-- BANJARMASIN -->

                <div class="itemdesc-container desc-banjarmasin">

                    <div class="itemdesc-pic d-flex justify-content-center mb-3">
                        <img src="assets/image/banjar.svg" class="desc-icons">
                    </div>
                    <p class="text-center" style="font-size: 3vw;">Hutan</p>
                    <div class="itemdesc-description">
                        <p class="text-center mb-0 mt-2" style="font-size: 1.3vw;"> mendapatkan 2 bonus kayu setiap akhir sub-sesi (tiap 20 menit)</p>
                    </div>

                </div>

                <!-- BANJARMASIN -->

                <!-- LAMPUNG -->

                <div class="itemdesc-container desc-lampung">

                    <div class="itemdesc-pic d-flex justify-content-center mb-3">
                        <img src="assets/image/siger.svg" class="desc-icons">
                    </div>
                    <p class="text-center" style="font-size: 2vw;"> Menara Siger</p>
                    <div class="itemdesc-description">
                        <p class="text-center mb-0 mt-2" style="font-size: 1.3vw;"> mengurangi kebutuhan pekerja sebesar 1 (untuk bangunan dengan pekerja 2 atau lebih)</p>
                    </div>

                </div>

                <!-- LAMPUNG -->

            </div>

        </div>
    </div>
</body>

<script>
    $(".itemdesc-container").hide();
    $(".inventory-item").hide();
    $(".itemdesc-pic").hide();
    $(".itemdesc-description").hide();


    $(".inventory-item").toggleClass("d-flex");
    $(".desc-init").show();

    $(document).ready(function() {

        var time = 100;
        /* STARTUP ANIMATION */
        $("#itemdesc").hide();
        $(".inventory-item").each(function() {
            console.log("tes");
            $(this).show();
            $(this).toggleClass("d-flex");
            $(this).animate({
                top: '0'
            }, time += 70);


        });

        $("#itemdesc").show();
        $("#itemdesc").delay("fast").animate({
            width: '30vw'
        }, 200, function() {
            $(".inventory-item").css({
                width: '100%'

            }, function() {
                $('body').css({
                    overflow: 'auto'
                });
            });

            $(".itemdesc-pic").show();
            $(".itemdesc-description").show();
        });

        /* STARTUP ANIMATION */

        $(".Jakarta").hover(function() {
            $("#decor-skill").css("display", "none");
            $(".itemdesc-container").hide();
            $(".desc-jakarta").show();
            $("#containerAll").css({
                'background-image': 'url("assets/image/monas.jpg")'
            });
        });



        $(".Jayapura").hover(function() {
            $("#decor-skill").css("display", "none");
            $(".itemdesc-container").hide();
            $(".desc-jayapura").show();
            $("#itemdesc").fadeIn();
            $("#containerAll").css({
                'background-image': 'url("assets/image/jaya3.jpg")'
            });
        });



        $(".Yogyakarta").hover(function() {
            $("#decor-skill").css("display", "none");
            $(".itemdesc-container").hide();
            $(".desc-jogjakarta").show();
            $("#itemdesc").fadeIn();
            $("#containerAll").css({
                'background-image': 'url("assets/image/bg-jogja.png")'
            });
        });



        $(".Bali").hover(function() {
            $("#decor-skill").css("display", "none");
            $(".itemdesc-container").hide();
            $(".desc-bali").show();
            $("#itemdesc").fadeIn();
            $("#containerAll").css({
                'background-image': 'url("assets/image/bali.png")'
            });
        });



        $(".Banjarmasin").hover(function() {
            $("#decor-skill").css("display", "none");
            $(".itemdesc-container").hide();
            $(".desc-banjarmasin").show();
            $("#itemdesc").fadeIn();
            $("#containerAll").css({
                'background-image': 'url("assets/image/hutann.jpg")'
            });
        });



        $(".Lampung").hover(function() {
            $("#decor-skill").css("display", "none");
            $(".itemdesc-container").hide();
            $(".desc-lampung").show();
            $("#itemdesc").fadeIn();
            $("#containerAll").css({
                'background-image': 'url("assets/image/sigerrr.jpg")'
            });

        });


    });
</script>

</html>