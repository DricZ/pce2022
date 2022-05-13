<?php
    // require "phps/connect.php";

    // if (!isset($_SESSION['email_peserta'])) {
    //   header("Location: ../.");
    // }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Stand PCE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/021a36bbfc.js" crossorigin="anonymous"></script>

    <style>
    .stand {
        z-index: 1;
        width: 100vw;

    }

    .barang_stand_panjang {
        z-index: 2;
        position: absolute;
        width: 4.5vw;
        margin-left: 37.8vw;
        margin-top: 13.05vw;
        height: 15.3vw;
        cursor: pointer;
        transition: 0.3s ease-in-out;
    }

    .b1:hover {
        height: 16.3vw;
        width: 5.5vw;
        z-index: 3;
    }

    .gc1:hover {
        margin-left: 27.8vw;
        height: 16.3vw;
        width: 16.3vw;
        z-index: 3;
    }

    .barang_stand_barang {
        z-index: 2;
        position: absolute;
        width: 10.3vw;
        cursor: pointer;
        transition: 0.3s ease-in-out;
    }

    .b2,
    .gc2 {
        margin-left: 42.49vw;
        margin-top: 13.2vw;
        height: 5vw;
    }

    .ad2 {
        margin-left: 45.5vw;
    }

    .ad1,
    .ad2 {
        margin-top: 13.05vw;
        width: 7.7vw;
        height: 15vw;
    }

    .ad1:hover,
    .ad2:hover {
        width: 11vw;
        height: 16vw;
        z-index: 3;
    }

    .b2:hover {
        height: 6vw;
        width: 11.3vw;
        z-index: 3;
    }

    .gc2:hover,
    .gc3:hover,
    .gc4:hover,
    .gc5:hover,
    .gc6:hover {
        height: 11.3vw;
        width: 11.3vw;
        z-index: 3;
    }

    .b3,
    .gc3 {
        height: 5.6vw;
        margin-left: 53.5vw;
        margin-top: 13vw;
    }

    .b3:hover {
        height: 6.6vw;
        width: 11.3vw;
        z-index: 3;
    }

    .b4,
    .gc4 {
        margin-left: 53.5vw;
        margin-top: 18.59vw;
        height: 7.95vw;
    }

    .b4:hover {
        height: 8.95vw;
        width: 11.3vw;
        z-index: 3;
    }

    .b5,
    .gc5 {
        margin-left: 53.5vw;
        margin-top: 26.6vw;
        height: 6vw;
    }

    .b5:hover {
        height: 7vw;
        width: 11.3vw;
        z-index: 3;
    }

    .b6,
    .gc6 {
        margin-left: 53.5vw;
        margin-top: 32.5vw;
        height: 7.5vw;
    }

    .b6:hover {
        height: 8.5vw;
        width: 11.3vw;
        z-index: 3;
    }

    .b7 {
        margin-left: 64vw;
        margin-top: 1vw;
    }

    .custom_btn {
        font-size: 50px;
        z-index: 5;
        margin: 25px;
        position: relative;
        top: -50%;
        width: 150px;
    }

    .videomodal {
        height: 70%;
        width: -webkit-fill-available;
    }

    body {
        animation: animasi_fade ease 1s;
        animation-iteration-count: 1;
        animation-fill-mode: forwards;
        overflow: hidden;
        /* background-image: url('assets/booth fix.jpg');
        background-size: 100%;
        background-position: center; */
    }

    @keyframes animasi_fade {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .fa-chevron-left,
    .fa-chevron-right {
        height: 80px;
        width: 80px;
        outline: black;
        background-size: 100%, 100%;
        border-radius: 50%;
        border: 1px solid black;
        background-image: none;
        background-color: #4e73df;
    }

    .fa-chevron-right:after {
        content: "";
        font-size: 55px;
        color: black;
    }

    .fa-chevron-left:after {
        content: "";
        font-size: 55px;
        color: black;
    }

    .carousel-inner {
        overflow: visible
    }

    .modal-content {
        width: 125%;
    }

    .modal {
        left: -5%;
    }
    </style>
</head>

<body>
    <!-- BUTTONS -->
    <div id="button_container" style="position: absolute;">
        <button type="button" class="btn btn-danger custom_btn" onclick="pindah('index')">
            <i class="fa-solid fa-door-closed"></i><br>
            <p style="font-size: large;">Exit</p>
        </button>
        <button type="button" class="btn btn-success custom_btn" onclick="pindah('receptionist')">
            <i class="fa-solid fa-person-booth"></i>
            <p style="font-size: large;">Receptionist</p>
        </button>
    </div>

    <!-- CAROUSEL -->
    <div id="demo" class="carousel slide" data-ride="carousel" data-interval='false'>
        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/additon/BROSUR WS protect-01.jpeg" alt="" class="barang_stand_panjang ad1" id="panjang"
                    onclick="buka('additon')">
                <img src="assets/additon/BROSUR WS ULTIMATE-01.jpeg" alt="" class="barang_stand_barang ad2"
                    onclick="buka('additon')">
                <img src="assets/additon/all produk-01.jpeg" alt="" class="barang_stand_barang b3"
                    onclick="buka('additon')">
                <img src="assets/additon/all produk-01.jpeg" alt="" class="barang_stand_barang b4"
                    onclick="buka('additon')">
                <img src="assets/additon/bg 3-01.jpeg" alt="" class="barang_stand_barang b5" onclick="buka('additon')">
                <img src="assets/additon/bg 3-01.jpeg" alt="" class="barang_stand_barang b6" onclick="buka('additon')">
                <img src="assets/pce_logo color.png" alt="" class="barang_stand_barang b7">
                <img src="assets/additon.png" alt="" class="stand">
            </div>
            <div class="carousel-item">
                <img src="assets/gocement/post 07 04.jpeg" alt="" class="barang_stand_panjang gc1" id="panjang"
                    onclick="buka('gocement1')">
                <img src="assets/gocement/post 07 06.jpeg" alt="" class="barang_stand_barang gc2"
                    onclick="buka('gocement2')">
                <img src="assets/gocement/post 15 03.jpeg" alt="" class="barang_stand_barang gc3"
                    onclick="buka('gocement3')">
                <a href="https://www.instagram.com/gocement.id/" target="blank">
                    <img src="assets/gocement/post 20 15.jpeg" alt="" class="barang_stand_barang gc4">
                </a>
                <a href="https://www.instagram.com/gocement.id/" target="blank">
                    <img src="assets/gocement/post 26 2.jpeg" alt="" class="barang_stand_barang gc5">
                </a>
                <img src="assets/gocement/post 29 04 4.jpeg" alt="" class="barang_stand_barang gc6"
                    onclick="buka('gocement6')">
                <img src="assets/pce_logo color.png" alt="" class="barang_stand_barang b7">
                <img src="assets/gocement.png" alt="" class="stand">
            </div>
            <div class="carousel-item">
                <a href="https://www.wkc.co.id/grand-mercure-lampung/" target="blank">
                <img src="assets/wkc/1-wkc.png" alt="" class="barang_stand_panjang b1" id="panjang">
                </a>
                <a href=" https://www.wkc.co.id/about-wkc/" target="blank">
                <img src="assets/wkc/2-wkc.png" alt="" class="barang_stand_barang b2">
                </a>
                <img src="assets/wkc/3-wkc.png" alt="" class="barang_stand_barang b3" onclick="buka('wkc')">
                <a href="https://www.wkc.co.id/category/projects/" target="blank">
                <img src="assets/wkc/4-wkc.png" alt="" class="barang_stand_barang b4">
                </a>
                <a href="https://www.wkc.co.id/category/projects/recreation-museum/" target="blank">
                <img src="assets/wkc/5-wkc.png" alt="" class="barang_stand_barang b5">
                </a>
                <a href="https://www.wkc.co.id/careers/" target="blank">
                <img src="assets/wkc/6-wkc.png" alt="" class="barang_stand_barang b6">
                </a>
                <!-- <img src="assets/pce_logo color.png" alt="" class="barang_stand_barang b7"> -->
                <img src="assets/wkc/Logo Utama WKC.png" alt="" style="z-index: 2;position: absolute;width: 29vw;margin-left: 37vw;">
                <img src="assets/background interior1.jpeg" alt="" class="stand">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span><i class="fa-solid fa-chevron-left fa-2x"></i></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span><i class="fa-solid fa-chevron-right fa-2x"></i></span>
        </a>

        <!-- MODAL -->
        <div class="modal fade bd-example-modal-lg" id="modalbarang" tabindex="-1" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" id="titlemodal">
                        <!-- JUDUL MODAL -->
                    </div>
                    <div class="modal-body" id="bodymodal"
                        style="max-height: 70vh; max-width: 50vw; place-self: center;">
                        <!-- ISI MODAL -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
</body>

<script>
function pindah(ke_mana) {
    if (ke_mana == 'receptionist') {
        document.location.href = ke_mana + ".php";
    } else {
        document.location.href = ke_mana + ".html";
    }
}

function buka(isi) {
    $("#modalbarang").modal('show');
    if (isi == 'gocement1') {
        document.getElementById('titlemodal').innerHTML = `<h5 class='modal-title'>Introduction GoCement</h5>`;
        document.getElementById('bodymodal').innerHTML = `
      <video autoplay controls class='videomodal'>
        <source src="assets/gocement/gocement_iklan.mp4" type="video/mp4">
        Your browser doesn't support the video tag.
      </video>`;
    } else if (isi == 'gocement2') {
        document.getElementById('titlemodal').innerHTML = `<h5 class='modal-title'>Kelebihan GoCement</h5>`;
        document.getElementById('bodymodal').innerHTML = `
      <video autoplay controls class='videomodal'>
        <source src="assets/gocement/Kelebihan GoCement.mp4" type="video/mp4">
        Your browser doesn't support the video tag.
      </video>`;
    } else if (isi == 'gocement3') {
        document.getElementById('titlemodal').innerHTML = `<h5 class='modal-title'>Kelebihan GoCement</h5>`;
        document.getElementById('bodymodal').innerHTML = `
      <video autoplay controls class='videomodal'>
        <source src="assets/gocement/Kelebihan GoCement 2.mp4" type="video/mp4">
        Your browser doesn't support the video tag.
      </video>`;
    } else if (isi == 'gocement6') {
        document.getElementById('titlemodal').innerHTML = `<h5 class='modal-title'>Kelebihan GoCement</h5>`;
        document.getElementById('bodymodal').innerHTML = `
      <video autoplay controls class='videomodal'>
        <source src="assets/gocement/Kelebihan GoCement 3.mp4" type="video/mp4">
        Your browser doesn't support the video tag.
      </video>`;
    } else if (isi == 'additon') {
        document.getElementById('titlemodal').innerHTML = `<h5 class='modal-title'>Additon</h5>`;
        document.getElementById('bodymodal').innerHTML = `
      <video autoplay controls class='videomodal'>
        <source src="assets/additon/additon_iklan.mp4" type="video/mp4">
        Your browser doesn't support the video tag.
      </video>`;
    } else if (isi == 'wkc') {
        document.getElementById('titlemodal').innerHTML = `<h5 class='modal-title'>Wijaya Kusuma Contractors</h5>`;
        document.getElementById('bodymodal').innerHTML = `
      <video autoplay controls class='videomodal'>
        <source src="assets/wkc/wkc_iklan.mp4" type="video/mp4">
        Your browser doesn't support the video tag.
      </video>`;
    }
}

function tutup() {
    $("#modalbarang").modal('hide');
    for (let i = 0; i < document.getElementByClass('videomodal').length; i++) {
        document.getElementByClass('videomodal')[i].pause();
    }
}
</script>

</html>