<?php
    if (isset($_GET['stat'])) {
        if ($_GET['stat'] == 1) {
            echo "<script>alert('Data yang anda masukan tidak lengkap, silahkan periksa kembali.');</script>";
        } else if ($_GET['stat'] == 2) {
            echo "<script>alert('Nomor hp anda tidak valid, silahkan periksa kembali.');</script>";
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/021a36bbfc.js" crossorigin="anonymous"></script>

    <title>Receptionist PCE</title>

    <style>
    body {
        animation: animasi_fade ease 1s;
        animation-iteration-count: 1;
        animation-fill-mode: forwards;
        margin-top: 15vw;
        background-image: url(assets/background_receptionist.jpg);
        background-size: 100vw 100vh;
    }

    @keyframes animasi_fade {
        0% {
            opacity: 0;
            transform: scale(2);
        }

        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    .penampung,
    body {
        overflow: hidden;
        transition: 1.5s ease-in-out;
    }

    #gambar_gedung {
        width: 100vw;
        transition: 1s ease-out;
        position: absolute;
        top: 50%;
        transform: scale(1) translateY(-50%);
        z-index: -1;
        opacity: 1;
        max-height: 100vh;
    }

    #gambar_orang {
        position: absolute;
        transition: 1.5s ease-out;
        top: 50%;
        left: 10%;
        width: 30vw;
        z-index: -1;
    }

    #video_pce {
        position: absolute;
        top: 50%;
        transform: translateY(-55%);
        left: 21vw;
        width: 52.5vw;
        z-index: -2;
        opacity: 1;
        transition: 1s ease-out;
    }

    .custom_btn {
        margin: 50px;
        margin-bottom: 25px;
        margin-top: 0px;
        width: 125%;
        font-size: 50px;
        border-radius: 15px;
        z-index: 2;
    }

    .modal-backdrop {
        top: -100%;
        height: 150vh;
    }
    </style>
</head>

<body>
    <div class="penampung">
        <img src="assets/resepsionis-clear.png" id="gambar_gedung">
        <img src="assets/MPC PCE.gif" id="gambar_orang">
    </div>

    <video id="video_pce" autoplay muted>
        <source src="assets/ANIMASI BACKGROUND.mp4" type="video/mp4">
        Your browser doesn't support the video tag.
    </video>

    <div style="width: 10vw;">
        <button type="button" class="btn btn-danger custom_btn" onclick="pindah('index')">
            <i class="fa-solid fa-door-closed"></i><br>
            <!-- <i class="fa-solid fa-door-open"></i> -->
            <p style="font-size: large;">Exit</p>
        </button>
        <button type="button" class="btn btn-success custom_btn" onclick="pindah('stand')">
            <i class="fa-solid fa-store"></i>
            <!-- <i class="fa-solid fa-booth-curtain"></i> -->
            <p style="font-size: large;">Stands</p>
        </button>
    </div>

    <!-- MODAL -->
    <div class="modal fade" tabindex="-1" id="modal_stand" style="height: auto; top: -50%;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Mohon isi form berikut ini sebelum mengunjungi stand kami.</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <form action="phps/loginattempt.php" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="input_nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="input_nama" name="nama_lengkap">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label for="input_email" class="form-label">Alamat Email</label>
                                    <input type="email" class="form-control" id="input_email" name="email_peserta">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label for="input_hp" class="form-label">Nomor HP</label>
                                    <input type="text" class="form-control" id="input_hp" name="hp_peserta">
                                </div>
                            </div>
                            <div id="emailHelp" class="form-text mb-3">
                                <b>Alamat Email dan Nomor HP</b> tidak akan dibagikan kepada siapapun.
                                <br>
                                Nomor hp mohon menggunakan angka saja. (Contoh: 08xxxxxxxxxx)
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="input_instansi" class="form-label">Asal Instansi</label>
                            <input type="text" class="form-control" id="input_instansi" name="asal_instansi">
                            <div class="form-text">Contoh: Universitas Kristen Petra</div>
                        </div>
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Lanjutkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

<script>
function pindah(ke_mana) {
    if (ke_mana == "stand") {
        $("#modal_stand").modal('show');
        // pakai form action, panggil php utk cek apakah data valid, 
        // jika data baru di insert ke database
    } else {
        document.location.href = ke_mana + ".html";
    }
}
</script>

</html>