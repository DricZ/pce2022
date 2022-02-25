<?php
//header('Location: ../');
require_once 'phps/connect.php';
if (isset($_SESSION["usernameAdmin"])) {
    header("location: give_money.php");
}
require_once 'phps/include.php';

if (isset($_GET['stat'])) {
    if ($_GET['stat'] == 1) {
        echo "<script>alert('NRP atau Password Anda salah.');</script>";
    } else if ($_GET['stat'] == 2) {
        echo "<script>alert('Silakan cek kembali captcha Anda.');</script>";
    } else if ($_GET['stat'] == 3) {
        echo "<script>alert('Kalau bukan admin gak boleh masuk, ya.');</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- <script src="https://www.google.com/recaptcha/api.js"></script> -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <link rel="icon" href="../../../assets/pce_icon.ico" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-Control" content="no-store" />

    <!-- ICON -->
    <link rel="icon" href="../../assets/pce_icon.ico" type="image/x-icon">

    <title>Admin Bridge Competition 2021</title>
    <!-- For apple devices -->

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">

    <!-- jquery cookie -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('.welcome').fadeIn("25000");
            $('.welcome').delay("5000");
            $('.welcome').fadeOut("5000");
            $('.wrapper').delay("6000");
            $('.wrapper').fadeIn("25000");
            // $.cookie('noShowWelcome', true);    

            // setTimeout(() => {
            //     var iframe = document.querySelector("iframe");
            //     var elmnt = iframe.contentWindow.document.querySelector(".rc-anchor-light");
            //     elmnt.style.background = "rgb(32,31,31)";

            // }, 2000);
        });
    </script>
</head>
<style type="text/css">
    .wrapper {
        display: none;
    }

    .welcome {
        display: none;
    }

    .rc-anchor-light {
        background: rgb(32, 31, 31) !important;
    }

    .dot {
        height: 280px;
        width: 280px;
        background: linear-gradient(to right, #ffdca2, #ff9190, #36d1dc, #5b86e5);
        animation: rotation 10s infinite linear;
        filter: drop-shadow(0 0 8px #000);
        position: absolute;
        /* background-size: 600px 600px; */
        z-index: -1;
        border-radius: 50%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .dot2 {
        height: 280px;
        width: 280px;
        background: linear-gradient(to right, #000, #fff, #000);
        animation: rotation 10s infinite linear;
        opacity: .4;
        position: absolute;
        /* background-size: 600px 600px; */
        z-index: 1000;
        border-radius: 50%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

    }

    @keyframes rotation {
        to {
            transform: translate(-50%, -50%) rotate(360deg);
        }
    }

    .welcome {
        display: grid;
        place-items: center;
        width: 100vw;
        height: 100vh;
    }

    .g-recaptcha>div {
        width: 100% !important;
    }

    .g-recaptcha>div>div {
        margin: 4px auto !important;
        /*text-align: center;*/
        width: auto !important;
        height: auto !important;
    }

    html {
        height: 100%;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: 'Oswald', sans-serif;
        background-color: rgb(32, 31, 31);
        display: flex;
        align-items: center;
        height: 100%;
        justify-content: center;
    }


    .jumbotron {
        background-color: transparent;
        margin: 15px 15px 15px 15px;
        padding: 25px 15px 25px 15px;
    }

    h1 {
        background: linear-gradient(to right, #ffdca2, #ff9190, #36d1dc, #5b86e5);
        animation: changeColor 10s infinite;
        color: #000;
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-top: 30px;
        font-size: 45pt;
        background-size: 200% auto;
    }

    h2 {
        color: white;
        text-transform: uppercase;
        margin-top: 20px;
        margin-bottom: 20px;
        font-size: 20pt;
    }

    h3 {
        margin-top: 50px;
        color: #412c27;
        text-transform: uppercase;
        font-weight: 500;
        font-size: 16px;
    }

    @media only screen and (max-device-width:768px) {
        h1 {
            font-size: 30px;
        }

        h2 {
            font-size: 20px;
        }

        h3 {
            font-size: 13px;
        }
    }

    input[type="text"],
    input[type="password"] {
        border: none;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        width: 400px;
        outline: none;
        color: white;
        transition: 0.2s;
        font-size: 16pt;
        text-transform: uppercase;
    }

    input[type="text"]:hover,
    input[type="password"]:hover {
        background-color: #babbbd;
    }

    input[type="submit"] {
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        width: 400px;
        border: none;
        padding: 5px 130px;
        outline: none;
        color: white;
        font-size: 2em;
        transition: 0.2s;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background: #c57538;

    }

    ::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: white;
        opacity: 0.8;
        /* Firefox */
    }

    :-ms-input-placeholder {
        /* Internet Explorer 10-11 */
        color: white;
        opacity: 0.8;
    }

    ::-ms-input-placeholder {
        /* Microsoft Edge */
        color: white;
        opacity: 0.8;
    }

    /* ul li span
    {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: transparent;
        display: flex !important;
        transition: 0.5s;
        align-items: center;
        justify-content: center;
        color: rgb(207, 201, 201);
        font-size: 30px !important;
    } */
    /*ul li span:hover
    {
        box-shadow: -1px 1px 1px rgba(0,0,0,.1);
    }
    ul li:hover span:nth-child(5)
    {
        transform: translate(40px, -40px);
        opacity: 1;
    }
    ul li:hover span:nth-child(4)
    {
        transform: translate(30px, -30px);
        opacity: .8;
    }
    ul li:hover span:nth-child(3)
    {
        transform: translate(20px, -20px);
        opacity: .6;
    }
    ul li:hover span:nth-child(2)
    {
        transform: translate(10px, -10px);
        opacity: .4;
    }
    ul li:hover span:nth-child(1)
    {
        transform: translate(0px, 0px);
        opacity: .2;
    }*/
</style>

<body>
    <div class="welcome">
        <img src="../assets/pce_bridgemonochrome.png" style="width:256px; height:256px;" alt="bc">
        <div class=dot></div>
        <div class=dot2></div>
    </div>
    <!-- <div class="wrapper">
        <div class="container justify-content-center text-center" id="header">
            <h1 class="font-weight-bold" style="text-align: center; font-size: 72pt!important;">COMING SOON</h1>
        </div>
        <div class="container justify-content-center text-center mt-5" id="header">
            <h5 class="font-weight-normal" style="text-align: center; color: white;">&copy; IT DIVISION PETRA CIVIL EXPO 2021</h5>
        </div>
    </div> -->
    <div class="wrapper">
        <div class="container justify-content-center text-center" id="header">
            <h1 class="font-weight-bold" style="text-align: center;">RALLY GAMES<br>BRIDGE COMPETITION</h1>
            <h2 class="font-weight-normal" style="text-align: center;">PETRA CIVIL EXPO 2021</h2>
            <h2 class="font-weight-normal" style="text-align: center; color: red;">ADMIN SITE</h2>
        </div>
        <div class="container d-flex justify-content-center ">
            <div class="jumbotron my-auto" id="form">
                <form class="animateBox" action="phps/loginattempt.php" method="post">
                    <input type="text" style="margin-top: 15px; text-transform: none;" class="form-control" name="username" placeholder="USERNAME">
                    <input type="password" class="form-control" name="password" placeholder="PASSWORD" style="text-transform: none;">
                    <div align="center">
                        <div class="g-recaptcha mt-4" data-theme="dark" data-sitekey="6LdKzOAZAAAAAGk1hq6OVEly8dHx3MPKqG9XkrRy" data-callback="callback"></div>
                    </div>
                    <input type="submit" value="LOGIN" id="login">
                </form>
            </div>
        </div>
        <div class="container justify-content-center text-center" id="header">
            <h2 class="font-weight-small" style="text-align: center; font-size: 12pt;"><b>By IT Division Petra Civil Expo 2021</b></h2>
        </div>
    </div>
</body>

</html>