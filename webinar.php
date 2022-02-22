<?php
    header("Location: webinar_register.php");
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <title>PCE 2021 - Under Maintenance</title>

    <!-- <link rel="stylesheet" href="style/style.css"> -->
    <link href="http://fonts.cdnfonts.com/css/monument-extended" rel="stylesheet">

    <!-- ICON -->
    <link rel="icon" href="assets/pce_icon.ico" type="image/x-icon">
</head>

<style>
* {
    padding: 0;
    margin: 0;
    font-family: 'Monument Extended', sans-serif;
}

body {
    /* background: #000; */
    margin: 0;
    padding: 0;
    height: 100%;
    overflow: hidden;
    background-color: #6e260a;
}

.container {
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
}

.container span {
    text-transform: uppercase;
    display: block;
}

.text1 {
    color: white;
    font-size: 60px;
    font-weight: 700;
    letter-spacing: 2px;
    margin-bottom: 20px;
    background: #6e260a;
    position: relative;
    animation: text 3s 1;
    text-shadow: 5px 5px black, 6px 6px black, 7px 7px black;
}

.text2 {
    font-size: 30px;
    color: white;
}

@keyframes text {
    0% {
        color: yellow;
        margin-bottom: -40px;
    }

    30% {
        letter-spacing: 25px;
        margin-bottom: -40px;
    }

    85% {
        letter-spacing: 6px;
        margin-bottom: -40px;
    }
}

section {
    width: 100%;
    height: 100vh;
    background-color: #6e260a;
    background-size: cover;
    background-attachment: fixed;
}

section .wave {
    position: absolute;
    width: 100%;
    height: 143px;
    bottom: 0;
    left: 0;
    background: url(openrec_pce_2021/assets/wave.png);
    animation: animate 10s linear infinite;
}

section .wave:before {
    content: '';
    width: 100%;
    height: 143px;
    background: url(openrec_pce_2021/assets/wave.png);
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0.4;
    animation: animate-reverse 10s linear infinite;
}

section .wave:after {
    content: '';
    width: 100%;
    height: 143px;
    background: url(openrec_pce_2021/assets/wave.png);
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0.4;
    animation-delay: -5s;
    animation: animate 20s linear infinite;
}

@keyframes animate {
    0% {
        background-position: 0;
    }

    100% {
        background-position: 1360px;
    }
}

@keyframes animate-reverse {
    0% {
        background-position: 1360px;
    }

    100% {
        background-position: 0;
    }
}

@media(max-width: 786px) {
    #logo-pce {
        max-width: 50% !important;
    }
}

#logo-pce {
    transition: 0.5s;
    max-width: 20%;
}

#logo-pce:hover {
    transition: 0.5s;
    transform: scale(1.1);
}
</style>

<body>
    <div class="container">
        <center><a href="http://pce.petra.ac.id/" target="_blank"><img src="assets/pce_logo monochrome.png" alt=""
                    id="logo-pce"></a></center><br><br>
        <span class="text1">Under Maintenance</span>
        <span class="text2">Registration Petra Civil Expo 2021</span>
        <center style="margin-top:20px;">
            <a href="https://www.instagram.com/petracivilexpo/" target="_blank"
                style="font-size: 20pt; color: yellow; padding-left: 3px; text-decoration: none;">@petracivilexpo</a>
        </center>
    </div>
    <!-- <section>
        <div class="wave" style="overflow: hidden;"></div>
    </section> -->


</body>

</html>