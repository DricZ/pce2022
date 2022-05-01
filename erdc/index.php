<?php
// header("location: ../");

require_once 'phps/connect.php';
if (isset($_SESSION["username"])) {
    header("location: jadwal_checking_erdc.php");
}
require_once 'phps/include.php';

if (isset($_GET['stat'])) {
    if ($_GET['stat'] == 1) {
        echo "<script>alert('Silakan periksa Username dan Password Anda kembali.');</script>";
    } else if ($_GET['stat'] == 2) {
        echo "<script>alert('Silakan periksa kembali captcha Anda.');</script>";
    } else if ($_GET['stat'] == 4) {
        echo "<script>alert('Format Username Anda tidak sesuai.');</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- <script src="https://www.google.com/recaptcha/api.js"></script> -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-Control" content="no-store" />

    <!-- ICON -->
    <!-- <link rel="icon" href="../assets/pce_icon.ico" type="image/x-icon"> -->
    <link rel="apple-touch-icon" sizes="180x180" href="./icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./icons/favicon-16x16.png">
    <link rel="manifest" href="./icons/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>Earthquake Resistant Design Competition 2022</title>
    <!-- For apple devices -->

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">

    <!-- jquery cookie -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous"></script>
</head>
<style>
    #logo {
        /* display:none; */
        padding: 0;
    }

    #erdc-l {
        /* display:none; */
    }

    .wrapper {
        /* display: none; */
    }

    .welcome {
        display: none !important;
    }

    .rc-anchor-light {
        background: rgb(32, 31, 31) !important;
    }

    // Pen-specific styles
    /* html,
    body,
    section,
    div {
        height: 100%;
    } */

    body {
        margin: 0;
        padding: 0;
        font-family: "Industry";
        background-color: #efebe2;
        display: flex;
        align-items: center;
        height: 100%;
        justify-content: center;
    }

    h1 {
        font-size: 1.75rem;
        margin: 0 0 0.75rem 0;
    }

    // Pattern styles
    .container {
        display: table;
        height: 100%;
        width: 100%;
    }

    div {
        display: table-cell;
        text-align: center;
        vertical-align: middle;
        width: 50%;
        padding: 1rem;
    }

    .left-half {
        background: #faf8eb;
    }

    .right-half {
        background: #c7b299;
    }

    .contain {
        width: auto;
        margin: auto 60px;
        top: 10%;
        position: absolute;
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
        overflow-x: hidden;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: "Industry";
        background-color: #efebe2;
        /* display: flex; */
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
        color: #212529;
        margin-top: 30px;
        font-size: 45pt;
        background-size: 200% auto;
    }

    h2 {
        color: #123958;
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

    #logo-mobile {
        display: none;
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

        .contain {
            margin: 0 !important;
        }

    }

    @media only screen and (max-width: 1366px) {
        #erdc-l {
            display: none;
        }
    }

    @media only screen and (max-width: 960px) {
        .left-half {
            display: none;
        }

        .right-half {
            padding: 0 !important;
            margin: 5px;
        }

        #logo-mobile {
            display: block;
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
        background-color: #f2e1ce;
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
        background: #212529;

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
</style>

<body>
    <div class="contain">
        <div class="left-half" style="text-align:-webkit-center;">
            <div id="logo">
                <img src="../assets/pce_erdcmonochrome.png" style="width:384px; height:384px;" alt="erdc">
            </div>
            <div class="container justify-content-center text-center" id="erdc-l">
                <h1 class="font-weight-bold" style="text-align: center;">EARTHQUAKE RESISTANT DESIGN COMPETITION</h1>
                <h2 class="font-weight-normal" style="text-align: center;">PETRA CIVIL EXPO 2022</h2>
            </div>
        </div>
        <div class="right-half">
            <div class="container justify-content-center text-center" style="display:initial;">
                <center>
                    <img src="../assets/pce_erdcmonochrome.png" style="width:160px; height:155px;" alt="erdc" id="logo-mobile">
                </center>
                <div class="jumbotron my-auto" id="form">
                    <form class="animateBox" action="phps/loginattempt.php" method="post">
                        <input type="text" style="margin-top: 15px;" class="form-control" name="username" placeholder="Username" required>
                        <input type="password" class="form-control" name="password" placeholder="PASSWORD" style="text-transform: none;" required>
                        <div align="center">
                            <div class="g-recaptcha mt-4" data-theme="dark" data-sitekey="6LdKzOAZAAAAAGk1hq6OVEly8dHx3MPKqG9XkrRy" data-callback="callback"></div>
                        </div>
                        <input type="submit" value="LOGIN" id="login">
                    </form>
                    <div class="containerjustify-content-center text-center" style="display:contents; text-transform:uppercase;">
                        <a href="./info_checking.php#faq" class="font-weight-small" style="text-decoration: none; text-align: center; font-size: 12pt; color: white;">FREQUENTLY ASKED QUESTIONS</a>
                        <p style="text-decoration: none; text-align: center; font-size: 12pt;color:white;font-weight: bold;">&copy; IT Division Petra Civil Expo 2022</b></p>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>