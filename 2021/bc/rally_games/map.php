<!DOCTYPE html>
<html lang="en">

<?php
    require_once 'phps/connect.php';
    require_once 'header.php';

    $username = $_SESSION['username'];
    
    $sqlTeam = "SELECT * FROM team WHERE username = ?";
    $stmtTeam = $pdo->prepare($sqlTeam);
    $stmtTeam->execute([$_SESSION['username']]);
    $rowTeam = $stmtTeam->fetch();
    
    // require_once 'phps/include.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACTUAL MAP</title>

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- BOOTSTRAP 3 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="test_map.css">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .awan {
            z-index: 2;
            position: absolute;
        }

        .a1 {
            top: 6vh;
            left: 128vh;
            width: 20vh;
        }

        .a2 {
            top: 13vh;
            left: 136vh;
            width: 20vh;
        }

        .a3 {
            top: 23vh;
            left: 143vh;
            width: 20vh;
        }

        .a4 {
            top: 40vh;
            left: 125vh;
            width: 20vh;
        }

        .a5 {
            top: 51vh;
            left: 110vh;
            width: 20vh;
        }

        .a6 {
            top: 55vh;
            left: 120vh;
            width: 20vh;
        }

        .a7 {
            top: 22vh;
            left: 65vh;
            width: 20vh;
        }

        .a8 {
            top: 45vh;
            left: 50vh;
            width: 20vh;
        }

        .a9 {
            top: 50vh;
            left: 80vh;
            width: 15vh;
        }

        .a10 {
            top: 56vh;
            left: 78vh;
            width: 20vh;
        }

        .a11 {
            top: 33vh;
            left: 150vh;
            width: 20vh;
        }

        .a12 {
            top: 38vh;
            left: 150vh;
            width: 20vh;
        }

        .a13 {
            top: 58vh;
            left: 145vh;
            width: 18vh;
        }

        .a14 {
            top: 56vh;
            left: 130vh;
            width: 18vh;
        }

        .a15 {
            top: 48vh;
            left: 125vh;
            width: 20vh;
        }

        .a16 {
            top: 40vh;
            left: 140vh;
            width: 10vh;
        }

        .a17 {
            top: 58vh;
            left: 100vh;
            width: 20vh;
        }

        .a18 {
            top: 65vh;
            left: 115vh;
            width: 10vh;
        }

        .a19 {
            top: 63vh;
            left: 120vh;
            width: 15vh;
        }

        .a20 {
            top: 65vh;
            left: 130vh;
            width: 10vh;
        }

        .a21 {
            top: 65vh;
            left: 80vh;
            width: 20vh;
        }

        .a22 {
            top: 63vh;
            left: 87vh;
            width: 20vh;
        }

        .a23 {
            top: 75vh;
            left: 78vh;
            width: 20vh;
        }

        .a24 {
            top: 80vh;
            left: 78vh;
            width: 20vh;
        }

        .a25 {
            top: 73vh;
            left: 95vh;
            width: 20vh;
        }

        .a26 {
            top: 72vh;
            left: 98vh;
            width: 20vh;
        }

        .a27 {
            top: 58vh;
            left: 98vh;
            width: 20vh;
        }

        .a28 {
            top: 80vh;
            left: 98vh;
            width: 20vh;
        }

        .a29 {
            top: 83vh;
            left: 90vh;
            width: 20vh;
        }

        .a30 {
            top: 80vh;
            left: 115vh;
            width: 10vh;
        }

        .a31 {
            top: 84vh;
            left: 118vh;
            width: 10vh;
        }

        .a32 {
            top: 87vh;
            left: 120vh;
            width: 10vh;
        }

        .a33 {
            top: 89vh;
            left: 125vh;
            width: 10vh;
        }

        .a34 {
            top: 89vh;
            left: 128vh;
            width: 10vh;
        }

        .a35 {
            top: 89vh;
            left: 130vh;
            width: 10vh;
        }

        .a36 {
            top: 85vh;
            left: 136vh;
            width: 10vh;
        }

        .a37 {
            top: 83vh;
            left: 136vh;
            width: 10vh;
        }

        .a38 {
            top: 47vh;
            left: 80vh;
            width: 10vh;
        }

        .a39 {
            top: 37vh;
            left: 77vh;
            width: 10vh;
        }

        .a40 {
            top: 25vh;
            left: 86vh;
            width: 10vh;
        }

        .a41 {
            top: 25vh;
            left: 95vh;
            width: 10vh;
        }

        .a42 {
            top: 24vh;
            left: 115vh;
            width: 15vh;
        }

        .a43 {
            top: 46vh;
            left: 113vh;
            width: 8vh;
        }

        .a44{
            top: 0vh;
            left: 40vh;
            width: 45vh;
        }

        .a45{
            top: 0vh;
            left: 140vh;
            width: 50vh;
        }

        .a46{
            top: 0vh;
            left: 160vh;
            width: 50vh;
        }

        .a47{
            top: 0vh;
            left: 170vh;
            width: 40vh;
        }

        .a48{
            top: 0vh;
            left: 130vh;
            width: 20vh;
        }

        .a49{
            top: 0vh;
            left: 120vh;
            width: 20vh;
        }

        .a50{
            top: 0vh;
            left: 110vh;
            width: 15vh;
        }

        .a51{
            top: 0vh;
            left: 100vh;
            width: 15vh;
        }

        .a52{
            top: 5vh;
            left: 110vh;
            width: 15vh;
        }

        .a53{
            top: 0vh;
            left: 70vh;
            width: 30vh;
        }

        .a54{
            top: 20vh;
            left: 150vh;
            width: 50vh;
        }

        .a55{
            top: 20vh;
            left: 170vh;
            width: 50vh;
        }

        .a56{
            top: 10vh;
            left: 170vh;
            width: 50vh;
        }

        .a57{
            top: 0vh;
            left: 140vh;
            width: 50vh;
        }

        .a58{
            top: 0vh;
            left: 140vh;
            width: 50vh;
        }

        .a59{
            top: 0vh;
            left: 140vh;
            width: 50vh;
        }

        .a60{
            top: 0vh;
            left: 140vh;
            width: 50vh;
        }

        .default:hover {
            background: #e7e7e7;
            padding: 10px 32px;
            text-align: center;
        }

        .g_jembatan {
            width: 100%;
        }

        
    </style>
</head>

<body>
    <input id="session_username" type="hidden" value="<?php echo $_SESSION['username']; ?>">

    <div class="row wallet" hidden>
        <img src="assets/image/bridge coin.png" width="35px" class="mx-2 pt-1">
        <div class="uang pr-4"><?= number_format($rowTeam['money'],0,',','.'); ?></div>
    </div>

    <div id="msg-choose">
        <div id="choose-all">
            <h1>PILIH <b>PULAU</b> YANG AKAN DITARGET!</h1>
        </div>
        <div id="choose-small">
            <h1>PILIH <span style="color: #acff4d"><b>PULAU KECIL</b></span> YANG AKAN DITARGET!</h1>
        </div>
    </div>

    <!-- NAVIGATIONS -->
    <div class="demo_btn">
        <!-- ZOOM OUT -->
        <div id="nav-zoom-out" class="icon-navBar" style="max-width: 100px">
            <a onclick="_zoomOut()">
                <img class="icon-navBar" src="assets/logo_zoom_out.png" alt="" style="margin-bottom: 5px;">
            </a>
            <b>ZOOM OUT</b>
        </div>

        <!-- CANCEL -->
        <div id="nav-cancel" class="icon-navBar" style="max-width: 100px; display: none;">
            <a onclick="_cancelSkill()">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 305.002 305.002" style="enable-background:new 0 0 305.002 305.002;" xml:space="preserve">
                    <g>
                        <path d="M152.502,0.001C68.412,0.001,0,68.412,0,152.501s68.412,152.5,152.502,152.5c84.089,0,152.5-68.411,152.5-152.5 S236.591,0.001,152.502,0.001z M152.502,280.001C82.197,280.001,25,222.806,25,152.501c0-70.304,57.197-127.5,127.502-127.5 c70.304,0,127.5,57.196,127.5,127.5C280.002,222.806,222.806,280.001,152.502,280.001z"/>
                        <path d="M170.18,152.5l43.13-43.129c4.882-4.882,4.882-12.796,0-17.678c-4.881-4.882-12.796-4.881-17.678,0l-43.13,43.13 l-43.131-43.131c-4.882-4.881-12.796-4.881-17.678,0c-4.881,4.882-4.881,12.796,0,17.678l43.13,43.13l-43.131,43.131 c-4.881,4.882-4.881,12.796,0,17.679c2.441,2.44,5.64,3.66,8.839,3.66c3.199,0,6.398-1.221,8.839-3.66l43.131-43.132 l43.131,43.132c2.441,2.439,5.64,3.66,8.839,3.66s6.398-1.221,8.839-3.66c4.882-4.883,4.882-12.797,0-17.679L170.18,152.5z"/>
                    </g>
                </svg>
            </a>
            <b>CANCEL</b>
        </div>

        <!-- SKILL -->
        <div id="nav-skill" class="icon-navBar" style="min-width: 80px;">
            <a class="nav-link active exit" onclick="showSkill()">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <g class="" transform="translate(0,0)" style="">
                        <path
                            d="M498.03 15.125l-87.06 34.72-164.5 164.5-34.657-32.095 31.156-28.844-223-133.594L176.155 164.5l-31.094 28.813 63.563 58.875-70.03 70.03c2.932 3.53 5.915 7.01 8.968 10.438l9.656 9.656 71.5-71.5 13.718 12.688-72 72 9.843 9.844c3.502 3.116 7.044 6.19 10.657 9.187l72-72 40.782 37.75-29 26.876 223 133.594-158.69-146.97 29-26.842-67.217-62.282 162.5-162.5 34.718-87.03zM430.69 68.813l13.218 13.218L280.28 245.657l-13.717-12.687L430.688 68.812zm-341 216.875L61.874 313.5 199.22 450.875l27.81-27.844c-56.283-34.674-103.014-81.617-137.343-137.342zm18.75 100.812l-81 81 17.75 17.75 81-81-17.75-17.75z">
                        </path>
                    </g>
                </svg>
            </a>
            <b>SKILL</b>
        </div>

        <!-- GO BACK -->
        <div id="nav-back" class="icon-navBar" style="min-width: 80px;">
            <a class="nav-link active exit" onclick="goBack()">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <g class="" transform="translate(0,0)" style="">
                        <path
                            d="M217 28.098v455.804l142-42.597V70.697zm159.938 26.88l.062 2.327V87h16V55zM119 55v117.27h18V73h62V55zm258 50v16h16v-16zm0 34v236h16V139zm-240 58.727V233H41v46h96v35.273L195.273 256zM244 232c6.627 0 12 10.745 12 24s-5.373 24-12 24-12-10.745-12-24 5.373-24 12-24zM137 339.73h-18V448h18zM377 393v14h16v-14zm0 32v23h16v-23zM32 471v18h167v-18zm290.652 0l-60 18H480v-18z">
                        </path>
                    </g>
                </svg>
            </a>
            <b>EXIT</b>
        </div>

        <!-- TREASURE -->
        <img id="harta_karun" class="icon-navBar"
            style="display: none; animation: glowing_yellow 1.5s infinite, shake 1.5s infinite;"
            src="assets/treasure.png" alt="">
    </div>

    <!-- MAP & AWAN -->
    <div style="text-align: center;">
        <div id="ini_awan">
            <!-- <img class="awan a1" src="./assets/image/Artboard 3.png">
            <img class="awan a2" src="./assets/image/Artboard 3.png">
            <img class="awan a3" src="./assets/image/Artboard 3.png">
            <img class="awan a4" src="./assets/image/Artboard 3.png">
            <img class="awan a5" src="./assets/image/Artboard 3.png">
            <img class="awan a6" src="./assets/image/Artboard 3.png">
            <img class="awan a7" src="./assets/image/Artboard 3.png">
            <img class="awan a8" src="./assets/image/Artboard 3.png">
            <img class="awan a9" src="./assets/image/Artboard 3.png">
            <img class="awan a10" src="./assets/image/Artboard 3.png">
            <img class="awan a11" src="./assets/image/Artboard 3.png">
            <img class="awan a12" src="./assets/image/Artboard 3.png">
            <img class="awan a13" src="./assets/image/Artboard 3.png">
            <img class="awan a14" src="./assets/image/Artboard 3.png">
            <img class="awan a15" src="./assets/image/Artboard 3.png">
            <img class="awan a16" src="./assets/image/Artboard 3.png">
            <img class="awan a17" src="./assets/image/Artboard 3.png">
            <img class="awan a18" src="./assets/image/Artboard 3.png">
            <img class="awan a19" src="./assets/image/Artboard 3.png">
            <img class="awan a20" src="./assets/image/Artboard 3.png">
            <img class="awan a21" src="./assets/image/Artboard 3.png">
            <img class="awan a22" src="./assets/image/Artboard 3.png">
            <img class="awan a23" src="./assets/image/Artboard 3.png">
            <img class="awan a24" src="./assets/image/Artboard 3.png">
            <img class="awan a25" src="./assets/image/Artboard 3.png">
            <img class="awan a26" src="./assets/image/Artboard 3.png">
            <img class="awan a27" src="./assets/image/Artboard 3.png">
            <img class="awan a28" src="./assets/image/Artboard 3.png">
            <img class="awan a29" src="./assets/image/Artboard 3.png">
            <img class="awan a30" src="./assets/image/Artboard 3.png">
            <img class="awan a31" src="./assets/image/Artboard 3.png">
            <img class="awan a32" src="./assets/image/Artboard 3.png">
            <img class="awan a33" src="./assets/image/Artboard 3.png">
            <img class="awan a34" src="./assets/image/Artboard 3.png">
            <img class="awan a35" src="./assets/image/Artboard 3.png">
            <img class="awan a36" src="./assets/image/Artboard 3.png">
            <img class="awan a37" src="./assets/image/Artboard 3.png">
            <img class="awan a38" src="./assets/image/Artboard 3.png">
            <img class="awan a39" src="./assets/image/Artboard 3.png">
            <img class="awan a40" src="./assets/image/Artboard 3.png">
            <img class="awan a41" src="./assets/image/Artboard 3.png">
            <img class="awan a42" src="./assets/image/Artboard 3.png">
            <img class="awan a43" src="./assets/image/Artboard 3.png"> -->

            <!-- <img class="awan a44" src="./assets/image/Artboard 3.png">
            <img class="awan a45" src="./assets/image/Artboard 3.png">
            <img class="awan a46" src="./assets/image/Artboard 3.png">
            <img class="awan a47" src="./assets/image/Artboard 3.png">
            <img class="awan a48" src="./assets/image/Artboard 3.png">
            <img class="awan a49" src="./assets/image/Artboard 3.png">
            <img class="awan a50" src="./assets/image/Artboard 3.png">
            <img class="awan a51" src="./assets/image/Artboard 3.png">
            <img class="awan a52" src="./assets/image/Artboard 3.png">
            <img class="awan a53" src="./assets/image/Artboard 3.png">
            <img class="awan a54" src="./assets/image/Artboard 3.png">
            <img class="awan a55" src="./assets/image/Artboard 3.png">
            <img class="awan a56" src="./assets/image/Artboard 3.png">
            <img class="awan a57" src="./assets/image/Artboard 3.png">
            <img class="awan a58" src="./assets/image/Artboard 3.png">
            <img class="awan a59" src="./assets/image/Artboard 3.png">
            <img class="awan a60" src="./assets/image/Artboard 3.png"> -->
        </div>

        <svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#"
            xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg"
            xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
            xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" version="1.1" id="svg2" xml:space="preserve"
            width="1440" height="1440" viewBox="0 0 1440 1440" sodipodi:docname="pulau untuk IT.ai">
            <defs id="defs6">
                <clipPath clipPathUnits="userSpaceOnUse" id="clipPath18">
                    <path d="M 0,1080 H 1080 V 0 H 0 Z" id="path16" />
                </clipPath>
            </defs>
            <g id="g10" inkscape:groupmode="layer" inkscape:label="pulau untuk IT"
                transform="matrix(1.3333333,0,0,-1.3333333,0,1440)">
                <g id="g12">
                    <g id="g14" clip-path="url(#clipPath18)">
                        <g id="ini_jembatan">
                            <g id="g20" transform="translate(411.3672,920.2988)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 1.167,3.185 4.001,5.411 6.663,7.331 2.947,2.127 5.974,4.146 9.055,6.074 6.294,3.94 12.831,7.485 19.515,10.715 13.371,6.459 27.313,11.641 41.38,16.357 8.026,2.691 16.101,5.23 24.179,7.762 1.835,0.576 1.051,3.473 -0.798,2.893 C 85.317,46.531 70.632,41.907 56.269,36.387 42.05,30.922 28.108,24.586 15.13,16.572 11.561,14.368 8.049,12.052 4.666,9.571 1.475,7.231 -1.497,4.605 -2.893,0.797 -3.558,-1.018 -0.66,-1.801 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path22" />
                            </g>
                            <g id="g24" transform="translate(529.2969,962.2358)">
                                <path class="jembatan_ku"
                                    d="m 0,0 v -25.951 c 0,-1.93 3,-1.933 3,0 V 0 C 3,1.931 0,1.934 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path26" />
                            </g>
                            <g id="g28" transform="translate(776.1982,142.042)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 2.427,-4.451 4.342,-9.14 5.729,-14.017 0.527,-1.854 3.422,-1.066 2.892,0.797 C 7.166,-8.104 5.136,-3.155 2.59,1.515 1.666,3.21 -0.926,1.697 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path30" />
                            </g>
                            <g id="g32" transform="translate(274.8623,519.0811)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -8.162,-1.967 -16.458,-3.247 -24.834,-3.821 -1.916,-0.131 -1.93,-3.132 0,-3 8.638,0.592 17.214,1.9 25.631,3.927 C 2.673,-2.441 1.879,0.452 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path34" />
                            </g>
                            <g id="g36" transform="translate(266.3076,393.8848)">
                                <path class="jembatan_ku"
                                    d="M 0,0 C -13.649,-2.48 -28.044,0.211 -39.892,7.412 -41.546,8.417 -43.056,5.824 -41.406,4.821 -28.84,-2.816 -13.65,-5.519 0.797,-2.893 2.694,-2.548 1.891,0.344 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path38" />
                            </g>
                            <g id="g40" transform="translate(168.8652,657.5093)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -6.408,-10.91 -12.436,-22.04 -18.072,-33.368 -0.857,-1.723 1.73,-3.245 2.591,-1.514 5.635,11.328 11.663,22.458 18.071,33.368 C 3.57,0.154 0.978,1.666 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path42" />
                            </g>
                            <g id="g44" transform="translate(660.3076,257.7432)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -8.479,-1.008 -16.936,-2.193 -25.363,-3.56 -1.901,-0.308 -1.094,-3.2 0.798,-2.893 C -16.402,-5.129 -8.213,-3.977 0,-3 1.894,-2.774 1.916,0.228 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path46" />
                            </g>
                            <g id="g48" transform="translate(968.8945,377.0488)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -2.779,-12.867 -8.703,-24.935 -17.209,-34.985 -1.24,-1.466 0.872,-3.599 2.121,-2.122 8.838,10.443 15.09,22.925 17.981,36.309 C 3.299,1.085 0.407,1.889 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path50" />
                            </g>
                            <g id="g52" transform="translate(645.1738,563.4951)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -0.789,11.304 4.282,22.387 13.149,29.391 1.514,1.196 -0.622,3.306 -2.121,2.121 C 1.608,24.072 -3.837,11.994 -3,0 -2.866,-1.915 0.135,-1.93 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path54" />
                            </g>
                            <g id="g56" transform="translate(664.2119,500.3271)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 11.431,4.312 21.917,10.816 30.793,19.22 1.405,1.33 -0.719,3.449 -2.121,2.121 C 20.189,13.31 10.133,7.017 -0.798,2.893 -2.587,2.218 -1.812,-0.684 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path58" />
                            </g>
                            <g id="g60" transform="translate(660.9658,551.5254)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 5.46,-10.359 11.763,-20.251 18.838,-29.581 1.152,-1.519 3.758,-0.025 2.591,1.514 C 14.354,-18.737 8.05,-8.845 2.591,1.514 1.69,3.223 -0.899,1.708 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path62" />
                            </g>
                            <g id="g64" transform="translate(771.9004,164.2393)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 8.313,7.061 14.54,16.373 17.891,26.752 0.593,1.841 -2.302,2.63 -2.894,0.797 C 11.799,17.642 5.805,8.853 -2.121,2.121 -3.595,0.869 -1.464,-1.243 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path66" />
                            </g>
                            <g id="g68" transform="translate(826.0059,181.1865)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 3.511,-2.199 5.2,-6.307 6.997,-9.861 l 6.973,-13.802 c 4.648,-9.201 9.298,-18.402 13.946,-27.604 0.871,-1.723 3.46,-0.207 2.59,1.514 -4.798,9.498 -9.597,18.996 -14.396,28.494 -2.399,4.749 -4.797,9.499 -7.198,14.247 C 7.061,-3.349 5.096,0.347 1.514,2.591 -0.127,3.618 -1.635,1.024 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path70" />
                            </g>
                            <g id="g72" transform="translate(73.7261,344.8301)">
                                <path class="jembatan_ku"
                                    d="m 0,0 v -3.562 c 0,-0.522 0.46,-1.023 1,-1 0.542,0.025 1,0.44 1,1 V 0 C 2,0.522 1.54,1.023 1,1 0.458,0.976 0,0.561 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path74" />
                            </g>
                            <g id="g76" transform="translate(58.1265,320.7178)">
                                <path class="jembatan_ku" d="M 0,0 C 1.287,0 1.289,2 0,2 -1.287,2 -1.289,0 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path78" />
                            </g>
                            <g id="g80" transform="translate(93.8862,294.1934)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -1.781,1.172 -3.841,1.694 -5.742,2.619 -2.196,1.069 -3.732,2.984 -5.375,4.733 l -10.351,11.015 c -0.883,0.941 -2.295,-0.475 -1.414,-1.414 3.547,-3.775 7.094,-7.551 10.642,-11.326 1.578,-1.681 3.091,-3.492 5.168,-4.573 1.98,-1.032 4.185,-1.545 6.063,-2.782 C 0.069,-2.437 1.072,-0.705 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path82" />
                            </g>
                            <g id="g84" transform="translate(823.292,682.6143)">
                                <path class="jembatan_ku"
                                    d="M 0,0 C 2.121,1.814 4.478,3.336 6.983,4.563 7.469,4.801 7.601,5.49 7.343,5.932 7.053,6.427 6.461,6.529 5.975,6.291 3.313,4.987 0.837,3.34 -1.415,1.414 -1.825,1.062 -1.775,0.361 -1.415,0 -1.008,-0.407 -0.412,-0.353 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path86" />
                            </g>
                            <g id="g88" transform="translate(981.3701,508.3281)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 0.232,-6.142 0.284,-12.313 0.154,-18.457 -0.026,-1.288 1.974,-1.287 2,0 C 2.284,-12.313 2.232,-6.142 2,0 1.951,1.283 -0.049,1.289 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path90" />
                            </g>
                            <g id="g92" transform="translate(946.293,239.3916)">
                                <path class="jembatan_ku"
                                    d="M 0,0 C 0.041,-1.264 0.107,-2.527 0.269,-3.782 0.316,-4.155 0.362,-4.533 0.427,-4.904 0.456,-5.076 0.411,-4.646 0.415,-4.821 0.416,-4.877 0.43,-4.933 0.433,-4.988 0.437,-5.078 0.445,-5.167 0.444,-5.258 0.443,-5.349 0.426,-5.439 0.426,-5.529 0.427,-5.155 0.425,-5.492 0.396,-5.617 0.321,-5.939 0.218,-6.255 0.116,-6.569 c -0.428,-1.326 -0.883,-2.642 -1.311,-3.967 -0.398,-1.228 1.533,-1.754 1.928,-0.532 0.438,1.351 0.903,2.695 1.337,4.047 0.18,0.56 0.357,1.132 0.373,1.725 0.015,0.544 -0.117,1.094 -0.19,1.631 0.04,-0.293 -0.009,0.074 -0.015,0.128 -0.015,0.123 -0.029,0.246 -0.042,0.369 -0.027,0.26 -0.05,0.52 -0.071,0.78 C 2.062,-1.593 2.025,-0.797 2,0 1.959,1.284 -0.041,1.289 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path94" />
                            </g>
                            <g id="g96" transform="translate(864.0293,258.5254)">
                                <path class="jembatan_ku"
                                    d="m 0,0 v -16.023 c 0,-1.288 2,-1.289 2,0 V 0 C 2,1.287 0,1.289 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path98" />
                            </g>
                            <g id="g100" transform="translate(883.8379,211.5088)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 1.236,-1.01 2.694,-1.704 4.144,-2.352 1.951,-0.872 3.947,-1.639 5.952,-2.377 3.538,-1.305 7.196,-2.378 10.664,-3.864 1.171,-0.501 2.19,1.222 1.01,1.728 -3.387,1.45 -6.936,2.53 -10.397,3.791 -1.985,0.722 -3.97,1.461 -5.906,2.31 C 4.097,-0.162 2.585,0.458 1.414,1.414 0.425,2.222 -0.998,0.814 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path102" />
                            </g>
                            <g id="g104" transform="translate(783.6084,129.7363)">
                                <path class="jembatan_ku" d="M 0,0 C 1.287,0 1.289,2 0,2 -1.287,2 -1.289,0 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path106" />
                            </g>
                            <g id="g108" transform="translate(796.0332,128.2227)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 11.393,1.22 22.853,1.701 34.308,1.44 1.287,-0.029 1.287,1.971 0,2 C 22.853,3.701 11.393,3.22 0,2 -1.267,1.864 -1.28,-0.138 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path110" />
                            </g>
                            <g id="g112" transform="translate(792.7129,119.5176)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 7.208,-7.836 14.415,-15.673 21.623,-23.51 0.873,-0.949 2.284,0.468 1.414,1.414 C 15.829,-14.259 8.622,-6.422 1.414,1.415 0.541,2.364 -0.87,0.947 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path114" />
                            </g>
                            <g id="g116" transform="translate(781.376,116.5547)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -0.072,-5.587 0.32,-11.159 1.139,-16.685 0.187,-1.269 2.115,-0.729 1.928,0.532 C 2.275,-10.808 1.93,-5.403 2,0 2.017,1.287 0.017,1.288 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path118" />
                            </g>
                            <g id="g120" transform="translate(775.6768,127.5859)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -11.672,-1.337 -23.309,-2.966 -34.898,-4.889 -1.267,-0.211 -0.73,-2.138 0.531,-1.928 C -22.953,-4.924 -11.494,-3.316 0,-2 1.264,-1.855 1.278,0.146 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path122" />
                            </g>
                            <g id="g124" transform="translate(576.7393,812.9429)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 4.751,0.154 9.502,0.309 14.253,0.462 4.516,0.147 9.143,0.044 13.563,1.1 1.251,0.3 0.722,2.229 -0.531,1.929 C 22.89,2.441 18.252,2.592 13.761,2.447 L 0,2 C -1.283,1.958 -1.289,-0.042 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path126" />
                            </g>
                            <g id="g128" transform="translate(345.8721,607.6191)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 0.847,-2.86 1.514,-5.769 1.999,-8.712 0.087,-0.534 0.748,-0.831 1.23,-0.699 0.566,0.156 0.786,0.695 0.698,1.23 C 3.443,-5.237 2.775,-2.329 1.928,0.532 1.564,1.763 -0.367,1.239 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path130" />
                            </g>
                            <g id="g132" transform="translate(106.7588,285.623)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 4.942,-5.854 10.761,-10.921 17.2,-15.068 1.085,-0.7 2.089,1.031 1.009,1.727 C 11.909,-9.283 6.249,-4.312 1.414,1.414 0.583,2.398 -0.826,0.978 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path134" />
                            </g>
                            <g id="g136" transform="translate(135.6528,246.8379)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -1.256,-0.683 -1.247,-2.103 -1.25,-3.356 -0.004,-1.706 -0.008,-3.411 -0.012,-5.115 -0.009,-3.468 -0.016,-6.937 -0.025,-10.406 -0.003,-1.287 1.997,-1.289 2,0 0.007,2.998 0.015,5.997 0.021,8.995 l 0.011,4.409 C 0.747,-4.768 0.748,-4.062 0.75,-3.356 0.751,-2.975 0.6,-1.95 1.01,-1.727 2.141,-1.112 1.132,0.615 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path138" />
                            </g>
                            <g id="g140" transform="translate(517.7344,917.1631)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 2.269,-3.045 3.644,-6.569 4.412,-10.271 0.421,-2.029 0.658,-4.086 0.803,-6.152 0.068,-0.973 0.115,-1.949 0.15,-2.924 0.032,-0.859 -0.004,-1.678 0.436,-2.443 0.641,-1.115 2.37,-0.109 1.727,1.01 -0.435,0.756 -0.191,2.244 -0.236,3.104 -0.053,0.975 -0.121,1.948 -0.215,2.92 -0.189,1.952 -0.469,3.902 -0.911,5.813 C 5.34,-5.378 3.921,-1.936 1.727,1.009 0.967,2.03 -0.77,1.034 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path142" />
                            </g>
                            <g id="g144" transform="translate(469.2183,896.3452)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 8.154,-0.93 16.357,-1.316 24.562,-1.155 1.286,0.025 1.29,2.025 0,2 C 16.357,0.684 8.154,1.07 0,2 -1.277,2.146 -1.267,0.145 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path146" />
                            </g>
                            <g id="g148" transform="translate(539.8838,879.3496)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 2.898,-6.408 3.243,-13.546 3.563,-20.464 0.059,-1.282 2.059,-1.289 1.999,0 C 5.226,-13.16 4.783,-5.747 1.727,1.009 1.197,2.18 -0.527,1.165 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path150" />
                            </g>
                            <g id="g152" transform="translate(601.6787,907.2671)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 7.975,0.329 15.958,0.138 23.908,-0.572 1.281,-0.114 1.274,1.886 0,2 C 15.958,2.138 7.975,2.329 0,2 -1.282,1.947 -1.289,-0.053 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path154" />
                            </g>
                            <g id="g156" transform="translate(632.5928,899.4092)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 1.663,-3.345 2.984,-6.666 3.554,-10.377 0.552,-3.602 0.561,-7.267 0.583,-10.901 0.007,-1.287 2.007,-1.29 2,0 -0.023,3.82 -0.068,7.649 -0.655,11.432 C 4.881,-5.965 3.466,-2.487 1.728,1.009 1.154,2.162 -0.571,1.15 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path158" />
                            </g>
                            <g id="g160" transform="translate(584.3223,859.6274)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -6.38,-1.042 -12.663,-2.592 -18.795,-4.638 -1.215,-0.405 -0.694,-2.338 0.531,-1.929 6.133,2.046 12.415,3.596 18.795,4.638 C 1.799,-1.722 1.261,0.206 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path162" />
                            </g>
                            <g id="g164" transform="translate(358.7524,901.7739)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -8.052,-4.41 -16.12,-8.827 -23.756,-13.938 -6.396,-4.281 -13.246,-9.068 -16.157,-16.503 -0.47,-1.2 1.463,-1.719 1.928,-0.532 2.854,7.288 10.15,11.974 16.414,16.087 7.287,4.784 14.94,8.975 22.581,13.159 C 2.139,-1.108 1.131,0.619 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path166" />
                            </g>
                            <g id="g168" transform="translate(90.6729,156.3984)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 2.439,-4.992 4.91,-9.97 7.415,-14.931 1.193,-2.363 2.384,-4.729 3.604,-7.08 1.036,-1.995 2.194,-3.938 3.949,-5.386 0.986,-0.814 2.408,0.593 1.414,1.414 -1.737,1.433 -2.799,3.356 -3.816,5.331 -1.227,2.383 -2.438,4.775 -3.646,7.169 C 6.491,-8.668 4.094,-3.836 1.727,1.01 1.162,2.166 -0.563,1.153 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path170" />
                            </g>
                            <g id="g172" transform="translate(114.7979,143.1152)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 1.811,-0.604 3.866,-0.583 5.755,-0.661 2.153,-0.089 4.31,-0.083 6.462,0.017 4.24,0.199 8.457,0.771 12.604,1.672 1.257,0.273 0.725,2.201 -0.532,1.928 C 20.313,2.092 16.282,1.546 12.217,1.356 10.219,1.264 8.216,1.251 6.217,1.321 4.361,1.387 2.308,1.336 0.532,1.929 -0.692,2.338 -1.217,0.407 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path174" />
                            </g>
                            <g id="g176" transform="translate(126.8589,180.2334)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -8.92,3.938 -18.539,5.994 -28.292,6.01 -1.288,0.002 -1.29,-1.998 0,-2 9.38,-0.016 18.696,-1.947 27.283,-5.737 C 0.157,-2.242 1.176,-0.519 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path178" />
                            </g>
                            <g id="g180" transform="translate(135.1338,191.3857)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -0.66,4.323 3.299,7.539 6.591,9.469 1.11,0.65 0.105,2.379 -1.009,1.726 C 3.447,9.945 1.429,8.466 -0.063,6.47 -1.57,4.455 -2.31,1.968 -1.929,-0.531 -1.847,-1.065 -1.175,-1.36 -0.699,-1.229 -0.127,-1.073 0.082,-0.535 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path182" />
                            </g>
                            <g id="g184" transform="translate(151.2456,205.2939)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 13.167,0.518 26.352,0.301 39.495,-0.651 1.284,-0.093 1.278,1.907 0,2 C 26.352,2.301 13.167,2.518 0,2 -1.283,1.949 -1.29,-0.051 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path186" />
                            </g>
                            <g id="g188" transform="translate(149.7095,161.9561)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 10.738,2.729 21.68,4.562 32.722,5.465 1.274,0.104 1.285,2.105 0,2 C 21.504,6.547 10.377,4.701 -0.531,1.929 -1.778,1.611 -1.25,-0.317 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path190" />
                            </g>
                            <g id="g192" transform="translate(203.3154,161.1006)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 5.263,-3.018 10.49,-6.096 15.678,-9.24 2.558,-1.551 5.107,-3.117 7.646,-4.699 2.258,-1.407 5.274,-2.748 6.748,-5.055 0.691,-1.082 2.423,-0.08 1.727,1.009 -1.468,2.297 -3.98,3.593 -6.231,5.002 -2.673,1.672 -5.357,3.328 -8.051,4.965 C 12.057,-4.697 6.553,-1.451 1.01,1.728 -0.109,2.368 -1.117,0.641 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path194" />
                            </g>
                            <g id="g196" transform="translate(94.2139,215.6396)">
                                <path class="jembatan_ku"
                                    d="m 0,0 h 49.89 c 1.286,0 1.289,2 0,2 H 0 C -1.287,2 -1.289,0 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path198" />
                            </g>
                            <g id="g200" transform="translate(84.3242,208.2324)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -7.251,-4.269 -14.51,-8.524 -21.753,-12.807 -6.644,-3.927 -13.226,-8.009 -19.059,-13.095 -0.972,-0.848 0.447,-2.257 1.414,-1.414 5.818,5.072 12.419,9.101 19.045,13.013 7.116,4.201 14.242,8.385 21.362,12.576 C 2.118,-1.074 1.113,0.655 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path202" />
                            </g>
                            <g id="g204" transform="translate(33.4111,234.7764)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 15.157,-0.031 30.315,-0.062 45.472,-0.094 1.287,-0.002 1.289,1.998 0,2 C 30.315,1.937 15.157,1.969 0,2 -1.287,2.003 -1.289,0.003 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path206" />
                            </g>
                            <g id="g208" transform="translate(28.4805,253.6367)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -0.318,0.199 2.207,2.85 2.459,3.124 1.102,1.199 2.226,2.379 3.372,3.537 2.294,2.318 4.677,4.548 7.136,6.692 0.972,0.847 -0.447,2.256 -1.414,1.414 C 8.602,12.195 5.763,9.498 3.051,6.675 1.73,5.3 0.437,3.896 -0.821,2.462 -1.38,1.823 -1.978,1.12 -2.022,0.229 -2.063,-0.587 -1.699,-1.295 -1.009,-1.727 0.084,-2.412 1.089,-0.683 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path210" />
                            </g>
                            <g id="g212" transform="translate(50.0571,270.9287)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 3.354,-0.738 6.708,-1.477 10.061,-2.215 3.332,-0.733 6.712,-1.364 9.983,-2.347 5.972,-1.795 10.784,-5.974 16.666,-7.966 1.222,-0.414 1.746,1.516 0.532,1.928 -5.877,1.991 -10.681,6.167 -16.666,7.966 -3.193,0.96 -6.491,1.579 -9.744,2.295 C 7.398,0.417 3.965,1.173 0.532,1.929 -0.723,2.204 -1.258,0.276 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path214" />
                            </g>
                            <g id="g216" transform="translate(152.5376,245.3096)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 8.691,-10.144 21.826,-14.396 32.845,-21.319 3.181,-1.998 6.186,-4.244 8.853,-6.897 0.913,-0.909 2.328,0.504 1.414,1.414 C 33.651,-17.39 20.553,-13.401 9.733,-5.952 6.667,-3.841 3.84,-1.416 1.415,1.414 0.576,2.394 -0.833,0.973 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path218" />
                            </g>
                            <g id="g220" transform="translate(203.2339,217.0283)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 5.866,8.519 9.56,18.335 10.82,28.596 0.156,1.274 -1.845,1.263 -2,0 C 7.604,18.692 3.926,9.219 -1.727,1.01 -2.458,-0.053 -0.726,-1.055 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path222" />
                            </g>
                            <g id="g224" transform="translate(207.1006,293.0566)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 3.911,4.026 7.512,8.453 10.031,13.497 2.652,5.311 3.846,11.122 4.976,16.904 0.246,1.258 -1.681,1.796 -1.928,0.533 C 11.985,25.335 10.872,19.649 8.304,14.507 5.856,9.604 2.387,5.328 -1.415,1.414 -2.312,0.49 -0.899,-0.925 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path226" />
                            </g>
                            <g id="g228" transform="translate(554.1484,973.0244)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 23.957,-7.846 46.174,-20.911 64.632,-38.086 5.155,-4.797 10.009,-9.911 14.538,-15.302 1.243,-1.48 3.356,0.652 2.121,2.122 C 64.868,-31.719 44.073,-15.887 20.95,-5.083 14.4,-2.022 7.668,0.643 0.798,2.893 -1.041,3.495 -1.829,0.599 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path230" />
                            </g>
                            <g id="g232" transform="translate(75.9609,381.2197)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -6.238,-11.061 -14.521,-20.84 -24.353,-28.871 -0.998,-0.815 0.425,-2.222 1.414,-1.414 9.954,8.13 18.352,18.079 24.666,29.275 C 2.36,0.113 0.633,1.122 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path234" />
                            </g>
                            <g id="g236" transform="translate(81.6563,377.5342)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 0.798,-13.136 -2.516,-26.267 -9.405,-37.476 -0.677,-1.099 1.053,-2.105 1.726,-1.009 C -0.619,-27 2.817,-13.463 2,0 1.922,1.279 -0.078,1.288 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path238" />
                            </g>
                            <g id="g240" transform="translate(89.9795,373.1904)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 2.632,-7.098 6.017,-13.89 10.119,-20.253 0.695,-1.078 2.427,-0.076 1.727,1.01 C 7.838,-13.027 4.5,-6.404 1.929,0.532 1.485,1.729 -0.449,1.211 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path242" />
                            </g>
                            <g id="g244" transform="translate(38.3467,329.9756)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 6.97,-3.982 14.196,-7.484 21.628,-10.517 1.191,-0.485 1.709,1.449 0.532,1.929 C 14.89,-5.621 7.827,-2.168 1.01,1.727 -0.11,2.366 -1.119,0.639 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path246" />
                            </g>
                            <g id="g248" transform="translate(59.5776,316.6836)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -3.907,-6.379 -7.963,-12.665 -12.165,-18.854 -0.725,-1.067 1.007,-2.069 1.727,-1.009 4.202,6.188 8.258,12.474 12.165,18.853 C 2.401,0.091 0.672,1.097 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path250" />
                            </g>
                            <g id="g252" transform="translate(97.4546,346.6777)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -8.745,-4.626 -17.636,-8.969 -26.661,-13.023 -1.172,-0.527 -0.156,-2.251 1.01,-1.727 9.024,4.054 17.915,8.396 26.66,13.022 C 2.147,-1.125 1.138,0.602 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path254" />
                            </g>
                            <g id="g256" transform="translate(38.5273,464.5068)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 2.298,-4.857 4.942,-9.543 7.937,-14.005 1.438,-2.143 2.954,-4.235 4.543,-6.269 1.418,-1.815 2.991,-3.542 5.151,-4.459 1.172,-0.496 2.192,1.225 1.01,1.727 -2.135,0.905 -3.594,2.648 -4.977,4.444 -1.575,2.043 -3.07,4.149 -4.49,6.302 C 6.379,-8.019 3.898,-3.581 1.727,1.009 1.177,2.172 -0.548,1.158 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path258" />
                            </g>
                            <g id="g260" transform="translate(64.8271,430.8506)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 6.028,-6.5 12.906,-12.176 20.412,-16.892 1.093,-0.686 2.098,1.043 1.009,1.727 C 14.053,-10.535 7.332,-4.966 1.414,1.415 0.537,2.36 -0.875,0.943 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path262" />
                            </g>
                            <g id="g264" transform="translate(96.7046,405.5771)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 11.052,-3.013 22.427,-4.737 33.874,-5.15 1.288,-0.046 1.286,1.954 0,2 C 22.598,-2.743 11.417,-1.039 0.532,1.929 -0.712,2.268 -1.242,0.339 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path266" />
                            </g>
                            <g id="g268" transform="translate(146.3179,398.3437)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 20.757,-0.769 41.515,-1.537 62.272,-2.305 1.288,-0.048 1.286,1.952 0,2 C 41.515,0.463 20.757,1.231 0,2 -1.287,2.047 -1.285,0.047 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path270" />
                            </g>
                            <g id="g272" transform="translate(121.5176,559.3809)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 4.451,-7.525 8.763,-15.132 12.934,-22.816 0.614,-1.131 2.341,-0.123 1.727,1.009 C 10.49,-14.123 6.178,-6.516 1.727,1.01 1.072,2.117 -0.657,1.111 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path274" />
                            </g>
                            <g id="g276" transform="translate(87.4351,551.5444)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 10.235,-10.803 22.874,-18.843 35.367,-26.751 1.091,-0.691 2.096,1.039 1.01,1.726 C 24.021,-17.204 11.537,-9.271 1.414,1.414 0.527,2.351 -0.886,0.935 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path278" />
                            </g>
                            <g id="g280" transform="translate(93.9663,507.5566)">
                                <path class="jembatan_ku"
                                    d="M 0,0 C 10.74,0.761 21.326,3.011 31.43,6.735 32.627,7.177 32.109,9.11 30.898,8.663 20.963,5.002 10.563,2.748 0,2 -1.276,1.909 -1.286,-0.091 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path282" />
                            </g>
                            <g id="g284" transform="translate(145.6328,535.001)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 10.837,0.146 21.676,0.169 32.514,0.066 1.287,-0.011 1.288,1.989 0,2 C 21.676,2.169 10.837,2.146 0,2 -1.286,1.982 -1.29,-0.018 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path286" />
                            </g>
                            <g id="g288" transform="translate(132.2686,517.9678)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 7.089,-6.905 14.066,-13.924 20.929,-21.055 0.894,-0.928 2.307,0.487 1.414,1.415 C 15.48,-12.51 8.503,-5.49 1.414,1.414 0.491,2.313 -0.924,0.9 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path290" />
                            </g>
                            <g id="g292" transform="translate(189.5571,534.7627)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 18.816,-8.581 37.467,-17.522 55.939,-26.82 1.147,-0.577 2.161,1.147 1.01,1.727 C 38.477,-15.796 19.826,-6.854 1.009,1.727 -0.153,2.257 -1.171,0.533 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path294" />
                            </g>
                            <g id="g296" transform="translate(181.6562,487.6768)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 9.827,-10.967 24.07,-16.403 38.137,-19.464 4.491,-0.976 9.025,-1.744 13.564,-2.458 1.259,-0.197 1.801,1.73 0.531,1.929 C 34.019,-17.129 14.278,-12.942 1.414,1.415 0.553,2.375 -0.857,0.957 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path298" />
                            </g>
                            <g id="g300" transform="translate(235.6064,454.1982)">
                                <path class="jembatan_ku"
                                    d="M 0,0 C 8.913,1.85 17.683,4.312 26.254,7.376 27.458,7.807 26.939,9.739 25.723,9.305 17.151,6.241 8.381,3.778 -0.532,1.929 -1.792,1.668 -1.258,-0.261 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path302" />
                            </g>
                            <g id="g304" transform="translate(349.5854,496.5332)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 20.296,3.021 40.755,4.891 61.261,5.622 1.283,0.045 1.29,2.046 0,2 C 40.575,6.885 19.942,4.977 -0.532,1.928 -1.8,1.739 -1.261,-0.188 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path306" />
                            </g>
                            <g id="g308" transform="translate(378.9233,438.96)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 5.597,3.023 11.09,6.234 16.461,9.643 4.591,2.914 9.66,5.842 12.521,10.639 0.662,1.108 -1.066,2.114 -1.726,1.009 C 24.432,16.559 19.177,13.714 14.646,10.86 9.532,7.641 4.308,4.599 -1.01,1.728 -2.143,1.115 -1.134,-0.612 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path310" />
                            </g>
                            <g id="g312" transform="translate(444.0132,386.21)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -3.293,-9.841 -9.64,-18.535 -17.965,-24.727 -1.021,-0.759 -0.025,-2.496 1.009,-1.727 8.768,6.521 15.413,15.549 18.885,25.923 C 2.338,0.691 0.407,1.217 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path314" />
                            </g>
                            <g id="g316" transform="translate(545.7158,336.2207)">
                                <path class="jembatan_ku"
                                    d="m 0,0 v -20.099 c 0,-1.287 2,-1.289 2,0 V 0 C 2,1.287 0,1.289 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path318" />
                            </g>
                            <g id="g320" transform="translate(540.0991,308.1289)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -16.886,2.451 -33.909,3.905 -50.968,4.3 -4.837,0.112 -9.676,0.137 -14.513,0.085 -1.287,-0.015 -1.29,-2.015 0,-2 16.809,0.183 33.625,-0.626 50.336,-2.452 4.882,-0.535 9.753,-1.156 14.613,-1.862 C 0.728,-2.111 1.271,-0.185 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path322" />
                            </g>
                            <g id="g324" transform="translate(561.5869,298.2432)">
                                <path class="jembatan_ku"
                                    d="M 0,0 C 2.551,-7.604 5.101,-15.208 7.651,-22.812 8.059,-24.026 9.99,-23.506 9.58,-22.28 7.029,-14.677 4.479,-7.072 1.929,0.532 1.521,1.746 -0.411,1.226 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path326" />
                            </g>
                            <g id="g328" transform="translate(620.8613,301.166)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 3.662,-4.557 8.404,-8.015 13.078,-11.454 5.319,-3.913 10.653,-7.804 16.003,-11.674 1.045,-0.756 2.044,0.979 1.01,1.727 -5.218,3.775 -10.421,7.569 -15.609,11.384 C 9.81,-6.58 5.075,-3.141 1.414,1.414 0.608,2.417 -0.799,0.994 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path330" />
                            </g>
                            <g id="g332" transform="translate(635.0137,305.4785)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 12.79,-2.17 25.766,-2.599 38.707,-2.99 1.288,-0.039 1.286,1.961 0,2 C 25.948,-0.604 13.142,-0.21 0.531,1.929 -0.728,2.143 -1.269,0.216 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path334" />
                            </g>
                            <g id="g336" transform="translate(711.2979,316.2041)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -2.552,-8.573 -6.769,-16.59 -12.396,-23.545 -0.802,-0.992 0.604,-2.416 1.415,-1.414 5.851,7.231 10.254,15.506 12.91,24.427 C 2.297,0.704 0.367,1.232 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path338" />
                            </g>
                            <g id="g340" transform="translate(698.2666,270.0918)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -3.511,-10.717 -7.378,-21.805 -15.502,-29.976 -0.909,-0.914 0.505,-2.329 1.414,-1.414 8.373,8.421 12.398,19.81 16.017,30.859 C 2.33,0.694 0.399,1.22 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path342" />
                            </g>
                            <g id="g344" transform="translate(691.4678,219.1328)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -3.39,-5.614 -6.63,-11.355 -10.527,-16.642 -3.925,-5.322 -8.647,-9.924 -14.014,-13.784 -1.036,-0.744 -0.038,-2.479 1.01,-1.726 5.471,3.934 10.27,8.557 14.319,13.948 4.083,5.435 7.431,11.385 10.939,17.194 C 2.394,0.096 0.665,1.102 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path346" />
                            </g>
                            <g id="g348" transform="translate(912.0186,337.3984)">
                                <path class="jembatan_ku"
                                    d="m 0,0 -7.506,-13.635 c -0.621,-1.128 1.106,-2.138 1.727,-1.009 2.502,4.545 5.004,9.089 7.506,13.634 C 2.348,0.119 0.621,1.129 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path350" />
                            </g>
                            <g id="g352" transform="translate(898.2666,322.1504)">
                                <path class="jembatan_ku"
                                    d="M 0,0 C -1.195,7.945 -3.741,15.779 -7.956,22.649 -8.629,23.744 -10.359,22.741 -9.684,21.64 -5.552,14.906 -3.101,7.255 -1.929,-0.531 -1.737,-1.8 0.19,-1.261 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path354" />
                            </g>
                            <g id="g356" transform="translate(867.9443,319.3555)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 3.507,0.005 7.014,0.011 10.521,0.017 1.719,0.003 3.439,0.005 5.158,0.008 1.69,0.003 3.435,0.137 5.072,-0.357 1.235,-0.373 1.763,1.557 0.532,1.929 -1.556,0.469 -3.17,0.432 -4.779,0.429 C 14.647,2.023 12.791,2.021 10.934,2.018 L 0,2 C -1.287,1.997 -1.289,-0.003 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path358" />
                            </g>
                            <g id="g360" transform="translate(901.251,303.3574)">
                                <path class="jembatan_ku"
                                    d="M 0,0 C 0.693,4.614 1.388,9.228 2.082,13.842 2.163,14.38 1.946,14.91 1.384,15.072 0.912,15.207 0.233,14.907 0.153,14.374 -0.541,9.76 -1.234,5.146 -1.929,0.532 -2.01,-0.007 -1.794,-0.537 -1.23,-0.698 -0.76,-0.834 -0.08,-0.533 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path362" />
                            </g>
                            <g id="g364" transform="translate(908.2598,315.7412)">
                                <path class="jembatan_ku"
                                    d="m 0,0 23.974,-7.312 c 1.233,-0.377 1.761,1.552 0.531,1.927 C 16.515,-2.946 8.523,-0.509 0.532,1.929 -0.702,2.306 -1.229,0.375 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path366" />
                            </g>
                            <g id="g368" transform="translate(889.1865,293.1162)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 11.079,1.965 22.122,4.135 33.121,6.508 1.258,0.271 0.726,2.2 -0.531,1.929 C 21.59,6.062 10.548,3.894 -0.532,1.929 -1.797,1.705 -1.261,-0.223 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path370" />
                            </g>
                            <g id="g372" transform="translate(926.2158,340.626)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 0.617,-1.916 2.147,-3.215 3.611,-4.505 1.686,-1.483 3.44,-2.89 5.247,-4.222 3.632,-2.676 7.502,-5.011 11.548,-7.005 1.151,-0.567 2.165,1.157 1.009,1.727 -3.73,1.838 -7.312,3.966 -10.695,6.387 -1.689,1.208 -3.324,2.489 -4.901,3.84 -1.38,1.18 -3.311,2.508 -3.89,4.309 C 1.536,1.752 -0.396,1.229 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path374" />
                            </g>
                            <g id="g376" transform="translate(952.79,320.1035)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 6.385,-5.443 13.706,-9.639 21.622,-12.42 1.217,-0.428 1.739,1.504 0.531,1.929 C 14.58,-7.831 7.524,-3.795 1.414,1.414 0.44,2.245 -0.981,0.837 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path378" />
                            </g>
                            <g id="g380" transform="translate(956.7217,329.2822)">
                                <path class="jembatan_ku"
                                    d="M 0,0 C 10.235,1.417 20.274,3.991 29.926,7.684 31.116,8.139 30.6,10.073 29.395,9.612 19.743,5.92 9.704,3.345 -0.531,1.929 -1.801,1.753 -1.261,-0.174 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path382" />
                            </g>
                            <g id="g384" transform="translate(338.1104,667.8003)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -12.947,-5.325 -26.014,-10.354 -39.189,-15.086 -1.203,-0.432 -0.684,-2.365 0.531,-1.929 13.176,4.732 26.242,9.762 39.19,15.086 C 1.706,-1.446 1.191,0.49 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path386" />
                            </g>
                            <g id="g388" transform="translate(338.4668,658.3936)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 2.893,-9.577 5.972,-19.097 9.235,-28.554 0.417,-1.21 2.35,-0.69 1.929,0.532 C 7.901,-18.565 4.822,-9.045 1.928,0.532 1.557,1.76 -0.374,1.237 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path390" />
                            </g>
                            <g id="g392" transform="translate(344.5781,626.6851)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -12.701,-0.226 -25.406,-0.106 -38.101,0.357 -1.288,0.048 -1.286,-1.952 0,-2 C -25.406,-2.106 -12.701,-2.226 0,-2 1.286,-1.978 1.29,0.022 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path394" />
                            </g>
                            <g id="g396" transform="translate(392.2134,661.5366)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 8.105,-7.547 16.211,-15.094 24.317,-22.641 0.941,-0.876 2.359,0.535 1.414,1.414 C 17.625,-13.68 9.52,-6.133 1.414,1.414 0.473,2.291 -0.944,0.879 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path398" />
                            </g>
                            <g id="g400" transform="translate(388.9165,656.9326)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -9.736,-6.835 -20.388,-12.277 -31.637,-16.149 -1.21,-0.416 -0.69,-2.349 0.532,-1.929 11.41,3.928 22.237,9.417 32.114,16.351 C 2.055,-0.993 1.057,0.742 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path402" />
                            </g>
                            <g id="g404" transform="translate(355.2988,630.0264)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 9.04,-0.015 18.079,-0.03 27.119,-0.044 4.098,-0.007 8.221,0.109 12.315,-0.119 3.856,-0.215 7.703,-0.92 10.956,-3.115 1.069,-0.722 2.071,1.01 1.009,1.727 C 44.737,2.947 35.729,1.941 28.104,1.954 18.736,1.969 9.368,1.984 0,2 -1.287,2.002 -1.289,0.002 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path406" />
                            </g>
                            <g id="g408" transform="translate(348.459,560.2954)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 13.959,-0.122 27.91,-0.495 41.857,0.283 4.82,0.269 9.635,0.619 14.447,0.994 1.275,0.099 1.286,2.1 0,2 C 42.354,2.19 28.478,1.681 14.488,1.841 9.659,1.896 4.83,1.958 0,2 -1.287,2.011 -1.289,0.011 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path410" />
                            </g>
                            <g id="g412" transform="translate(178.3105,725.9336)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 3.901,-4.934 8.013,-9.698 12.321,-14.281 0.884,-0.939 2.296,0.477 1.415,1.415 C 9.427,-8.284 5.316,-3.52 1.414,1.414 1.077,1.841 0.354,1.761 0,1.414 -0.423,1 -0.333,0.421 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path414" />
                            </g>
                            <g id="g416" transform="translate(228.0908,670.2729)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 2.556,-3.412 5.288,-6.687 8.211,-9.791 1.451,-1.54 2.946,-3.039 4.483,-4.494 1.174,-1.111 2.958,-3.013 4.595,-1.526 0.954,0.868 -0.463,2.278 -1.414,1.414 0.129,0.118 -0.031,0.056 -0.176,0.143 -0.155,0.093 -0.29,0.184 -0.43,0.3 -0.331,0.274 -0.638,0.591 -0.951,0.886 -0.63,0.593 -1.254,1.194 -1.871,1.802 -1.3,1.284 -2.568,2.599 -3.803,3.945 C 6.203,-4.66 3.892,-1.88 1.727,1.01 0.964,2.027 -0.772,1.032 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path418" />
                            </g>
                            <g id="g420" transform="translate(152.6416,610.8267)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 1.186,-0.987 2.597,-1.139 4.086,-1.244 1.736,-0.121 3.477,-0.121 5.217,-0.116 3.549,0.008 7.112,0.033 10.562,-0.909 1.243,-0.339 1.774,1.589 0.532,1.929 C 17.25,0.519 13.99,0.64 10.745,0.642 9.124,0.643 7.501,0.621 5.88,0.669 4.558,0.709 2.501,0.51 1.415,1.414 0.432,2.232 -0.991,0.825 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path422" />
                            </g>
                            <g id="g424" transform="translate(178.6333,610.6074)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 7.466,-7.905 19.959,-11.017 24.776,-21.381 0.542,-1.166 2.266,-0.152 1.727,1.009 C 21.568,-9.753 9.029,-6.648 1.414,1.414 0.528,2.352 -0.884,0.936 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path426" />
                            </g>
                            <g id="g428" transform="translate(219.1523,753.4575)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 9.494,-7.354 21.701,-10.113 31.006,-17.728 0.988,-0.808 2.411,0.599 1.414,1.415 C 23.094,-8.682 10.905,-5.937 1.414,1.414 0.409,2.193 -1.017,0.787 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path430" />
                            </g>
                            <g id="g432" transform="translate(256.3218,783.9136)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 4.95,-8.181 10.147,-16.208 15.585,-24.073 0.727,-1.052 2.461,-0.052 1.727,1.01 C 11.875,-15.198 6.677,-7.171 1.727,1.009 1.062,2.109 -0.669,1.105 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path434" />
                            </g>
                            <g id="g436" transform="translate(305.2842,812.3423)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 0.149,-12.038 -0.851,-24.062 -3.01,-35.905 -0.229,-1.258 1.698,-1.798 1.929,-0.532 C 1.109,-24.418 2.151,-12.216 2,0 1.984,1.286 -0.016,1.29 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path438" />
                            </g>
                            <g id="g440" transform="translate(290.207,750.6753)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 6.914,-8.45 14.547,-16.712 19.773,-26.364 0.613,-1.133 2.341,-0.124 1.727,1.009 C 16.196,-15.558 8.432,-7.162 1.414,1.414 0.599,2.411 -0.809,0.989 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path442" />
                            </g>
                            <g id="g444" transform="translate(351.0937,744.3525)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 6.777,-8.164 13.736,-16.176 20.869,-24.031 0.867,-0.955 2.278,0.463 1.414,1.414 C 15.15,-14.762 8.191,-6.75 1.414,1.414 0.591,2.405 -0.817,0.984 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path446" />
                            </g>
                            <g id="g448" transform="translate(326.1729,721.6631)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 11.75,-4.557 24.822,-2.687 36.649,-6.933 1.214,-0.436 1.736,1.496 0.532,1.929 C 25.352,-0.757 12.278,-2.627 0.532,1.929 -0.669,2.395 -1.189,0.461 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path450" />
                            </g>
                            <g id="g452" transform="translate(374.189,711.0537)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 6.399,-1.272 12.916,-1.845 19.439,-1.684 1.285,0.031 1.29,2.032 0,2 C 13.092,0.16 6.759,0.691 0.532,1.929 -0.725,2.179 -1.263,0.251 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path454" />
                            </g>
                            <g id="g456" transform="translate(467.0898,736.8477)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 6.409,-5.984 12.5,-12.345 17.8,-19.344 4.922,-6.503 9.126,-13.512 12.662,-20.858 2.219,-4.609 4.177,-9.336 5.974,-14.125 0.447,-1.194 2.381,-0.676 1.928,0.532 -3.102,8.269 -6.691,16.371 -11.168,23.994 -4.242,7.222 -9.271,13.953 -14.87,20.178 C 8.865,-5.774 5.196,-2.118 1.414,1.415 0.474,2.292 -0.943,0.881 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path458" />
                            </g>
                            <g id="g460" transform="translate(488.8862,748.4155)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 14.227,1.23 28.576,0.235 42.489,-2.987 1.252,-0.29 1.787,1.638 0.532,1.929 C 28.94,2.202 14.4,3.245 0,2 -1.272,1.89 -1.284,-0.111 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path462" />
                            </g>
                            <g id="g464" transform="translate(516.2573,699.2544)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 4.704,0.129 9.395,0.503 14.059,1.124 0.54,0.071 0.994,0.408 1,1 0.005,0.485 -0.464,1.07 -1,1 C 9.395,2.503 4.704,2.129 0,2 -1.284,1.965 -1.29,-0.035 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path466" />
                            </g>
                            <g id="g468" transform="translate(573.5332,666.459)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 2.046,-13.208 -1.763,-28.403 7.642,-39.529 0.831,-0.984 2.24,0.437 1.414,1.415 C 0.069,-27.484 3.886,-12.105 1.929,0.532 1.732,1.8 -0.195,1.261 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path470" />
                            </g>
                            <g id="g472" transform="translate(587.2031,621.8721)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -0.58,-3.417 -2.225,-6.423 -4.013,-9.347 -1.78,-2.91 -3.655,-5.763 -5.611,-8.558 -3.961,-5.659 -8.281,-11.055 -12.905,-16.186 -0.861,-0.953 0.55,-2.372 1.414,-1.414 4.738,5.256 9.159,10.794 13.219,16.591 1.999,2.855 3.915,5.771 5.727,8.749 1.825,2.998 3.504,6.137 4.098,9.634 C 2.143,0.728 0.216,1.269 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path474" />
                            </g>
                            <g id="g476" transform="translate(562.749,578.5337)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -18.213,-6.192 -36.943,-10.836 -55.944,-13.848 -5.468,-0.866 -10.956,-1.592 -16.46,-2.188 -1.266,-0.136 -1.281,-2.138 0,-2 19.302,2.09 38.419,5.796 57.086,11.141 5.323,1.524 10.607,3.184 15.85,4.966 C 1.744,-1.517 1.224,0.416 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path478" />
                            </g>
                            <g id="g480" transform="translate(577.8047,482.1055)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 10.464,2.488 20.199,7.516 28.278,14.616 0.969,0.852 -0.45,2.261 -1.414,1.414 C 19.042,9.155 9.593,4.337 -0.532,1.928 -1.783,1.631 -1.254,-0.299 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path482" />
                            </g>
                            <g id="g484" transform="translate(940.9844,462.3457)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 8.949,1.305 17.793,3.23 26.475,5.765 1.233,0.36 0.708,2.291 -0.532,1.928 C 17.262,5.159 8.418,3.233 -0.531,1.929 -1.8,1.743 -1.261,-0.184 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path486" />
                            </g>
                            <g id="g488" transform="translate(968.3682,434.8301)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 1.928,0.271 3.221,2.58 4.196,4.058 1.239,1.876 2.254,3.885 3.127,5.954 1.75,4.141 2.898,8.495 4.017,12.84 0.32,1.247 -1.608,1.779 -1.929,0.531 C 8.41,19.497 7.395,15.601 5.931,11.858 5.204,10 4.351,8.189 3.341,6.469 2.846,5.624 2.312,4.802 1.736,4.009 1.168,3.225 0.501,2.073 -0.531,1.929 -1.801,1.751 -1.261,-0.176 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path490" />
                            </g>
                            <g id="g492" transform="translate(1014.6562,442.9658)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -3.98,1.493 -7.549,4.284 -11.107,6.561 -3.859,2.468 -7.717,4.936 -11.576,7.404 -1.087,0.695 -2.09,-1.035 -1.008,-1.727 3.986,-2.55 7.973,-5.1 11.96,-7.651 3.603,-2.305 7.169,-5.004 11.2,-6.515 C 0.675,-2.381 1.196,-0.448 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path494" />
                            </g>
                            <g id="g496" transform="translate(981.4727,482.7197)">
                                <path class="jembatan_ku"
                                    d="m 0,0 v -9.156 c 0,-1.287 2,-1.289 2,0 V 0 C 2,1.286 0,1.289 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path498" />
                            </g>
                            <g id="g500" transform="translate(982.8555,522.2344)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 18.884,-3.908 37.769,-7.815 56.652,-11.723 1.256,-0.259 1.793,1.668 0.533,1.929 C 38.3,-5.887 19.416,-1.979 0.531,1.928 -0.725,2.188 -1.262,0.261 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path502" />
                            </g>
                            <g id="g504" transform="translate(940.665,555.9858)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 5.276,-3.198 10.184,-6.949 14.646,-11.21 0.931,-0.889 2.347,0.523 1.415,1.415 C 11.479,-5.422 6.426,-1.556 1.01,1.727 -0.094,2.396 -1.1,0.667 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path506" />
                            </g>
                            <g id="g508" transform="translate(931.9609,576.2002)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 3.836,-4.721 7.098,-9.89 9.741,-15.368 0.559,-1.159 2.284,-0.146 1.727,1.01 C 8.747,-8.72 5.361,-3.443 1.414,1.414 0.603,2.414 -0.806,0.991 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path510" />
                            </g>
                            <g id="g512" transform="translate(1005.2041,595.2734)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 4.543,-1.21 9.506,0.289 13.864,1.582 4.616,1.369 9.448,3.378 14.332,3.362 1.287,-0.005 1.288,1.995 0,2 C 23.475,6.96 18.828,5.173 14.369,3.821 10.084,2.522 5.03,0.73 0.532,1.929 -0.713,2.261 -1.244,0.332 0,0"
                                    style="fill:#000000;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path514" />
                            </g>
                            <g id="g516" transform="translate(993.5459,568.0952)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 9.233,-5.765 19.27,-10.172 29.753,-13.099 1.242,-0.346 1.771,1.582 0.532,1.929 C 19.957,-8.288 10.105,-3.952 1.01,1.727 -0.085,2.411 -1.09,0.681 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path518" />
                            </g>
                            <g id="g520" transform="translate(882.8076,635.5015)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 10.446,-8.537 21.896,-15.768 34.104,-21.51 1.158,-0.545 2.174,1.179 1.009,1.727 C 23.067,-14.117 11.725,-7.011 1.415,1.414 0.426,2.222 -0.997,0.815 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path522" />
                            </g>
                            <g id="g524" transform="translate(912.1846,654.2324)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 0.426,-12.446 1.694,-24.85 3.779,-37.127 0.215,-1.266 2.143,-0.729 1.929,0.532 C 3.652,-24.494 2.419,-12.268 2,0 1.956,1.283 -0.044,1.29 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path526" />
                            </g>
                            <g id="g528" transform="translate(936.8076,664.5479)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -3.437,-11.731 -0.286,-24.227 2.21,-35.818 0.27,-1.258 2.199,-0.725 1.929,0.532 -2.42,11.237 -5.543,23.379 -2.21,34.754 C 2.292,0.706 0.362,1.234 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path530" />
                            </g>
                            <g id="g532" transform="translate(967.8623,680.3843)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -2,-2.273 -4.895,-3.447 -7.622,-4.603 -3.216,-1.361 -6.492,-2.573 -9.765,-3.788 -1.196,-0.444 -0.678,-2.379 0.532,-1.929 3.435,1.276 6.869,2.557 10.243,3.991 2.888,1.228 5.907,2.506 8.026,4.915 C 2.261,-0.451 0.852,0.969 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path534" />
                            </g>
                            <g id="g536" transform="translate(1002.3066,694.0791)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -4.741,-7.152 -12.382,-12.041 -20.793,-13.604 -1.264,-0.235 -0.728,-2.163 0.531,-1.928 8.923,1.658 16.974,6.957 21.989,14.523 C 2.44,0.066 0.709,1.069 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path538" />
                            </g>
                            <g id="g540" transform="translate(877.5811,674.5718)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -6.306,-3.583 -12.912,-6.587 -19.761,-8.975 -1.208,-0.421 -0.688,-2.353 0.532,-1.928 7.008,2.443 13.786,5.509 20.238,9.176 C 2.128,-1.091 1.121,0.638 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path542" />
                            </g>
                            <g id="g544" transform="translate(889.1611,672.6567)">
                                <path class="jembatan_ku"
                                    d="M 0,0 C 4.528,0.247 9.038,0.781 13.501,1.588 14.766,1.817 14.229,3.745 12.969,3.517 8.681,2.741 4.352,2.238 0,2 -1.28,1.93 -1.288,-0.071 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path546" />
                            </g>
                            <g id="g548" transform="translate(910.8369,675.1616)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 6.239,-0.26 12.485,-0.141 18.709,0.357 1.274,0.102 1.286,2.103 0,2 C 12.485,1.859 6.239,1.74 0,2 -1.287,2.054 -1.284,0.054 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path550" />
                            </g>
                            <g id="g552" transform="translate(908.9531,727.2363)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -6.731,-0.916 -13.309,-2.704 -19.575,-5.328 -1.17,-0.49 -0.656,-2.426 0.531,-1.928 6.267,2.624 12.844,4.411 19.576,5.327 C 1.802,-1.756 1.261,0.171 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path554" />
                            </g>
                            <g id="g556" transform="translate(887.2461,715.7236)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 2.542,-3.707 4.972,-7.489 7.272,-11.351 1.15,-1.929 2.267,-3.876 3.353,-5.841 1.018,-1.841 2.563,-3.907 2.338,-6.099 -0.132,-1.278 1.869,-1.269 2,0 0.224,2.174 -0.964,4.091 -1.963,5.927 -1.145,2.104 -2.326,4.187 -3.543,6.25 C 7.021,-6.985 4.438,-2.944 1.727,1.01 1.003,2.064 -0.73,1.065 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path558" />
                            </g>
                            <g id="g560" transform="translate(935.4053,715.6431)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -0.3,-8.864 -1.376,-17.672 -3.224,-26.346 -0.267,-1.256 1.661,-1.792 1.929,-0.532 C 0.589,-18.033 1.694,-9.039 2,0 2.044,1.287 0.044,1.286 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path562" />
                            </g>
                            <g id="g564" transform="translate(941.2051,713.4507)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 2.921,-4.205 5.841,-8.41 8.761,-12.615 2.265,-3.264 4.862,-8.451 9.639,-7.574 1.264,0.231 0.729,2.159 -0.532,1.928 -2.025,-0.372 -3.614,1.323 -4.693,2.797 -1.308,1.786 -2.534,3.637 -3.796,5.455 C 6.828,-6.336 4.277,-2.663 1.728,1.01 0.998,2.06 -0.736,1.061 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path566" />
                            </g>
                            <g id="g568" transform="translate(854.1084,750.9854)">
                                <path class="jembatan_ku"
                                    d="m 0,0 -4.263,-26.363 c -0.204,-1.259 1.724,-1.801 1.929,-0.532 1.421,8.788 2.842,17.576 4.262,26.364 C 2.132,0.728 0.205,1.27 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path570" />
                            </g>
                            <g id="g572" transform="translate(856.3057,769.2065)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 18.017,0.623 36.047,0.806 54.072,0.552 1.287,-0.019 1.288,1.981 0,2 C 36.047,2.806 18.017,2.623 0,2 -1.283,1.956 -1.29,-0.044 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path574" />
                            </g>
                            <g id="g576" transform="translate(924.3008,759.7036)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 8.706,0.878 16.929,5.076 22.554,11.815 0.819,0.982 -0.588,2.404 -1.414,1.414 C 15.867,6.913 8.191,2.826 0,2 -1.269,1.872 -1.282,-0.129 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path578" />
                            </g>
                            <g id="g580" transform="translate(841.9355,823.8149)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 8.746,0.139 17.493,0.096 26.238,-0.129 1.287,-0.034 1.286,1.966 0,2 C 17.493,2.096 8.746,2.139 0,2 -1.286,1.979 -1.29,-0.021 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path582" />
                            </g>
                            <g id="g584" transform="translate(835.3398,817.9463)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -2.935,-9.8 -5.222,-19.78 -6.848,-29.88 -0.203,-1.259 1.724,-1.801 1.929,-0.532 1.626,10.1 3.913,20.08 6.847,29.88 C 2.298,0.704 0.368,1.232 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path586" />
                            </g>
                            <g id="g588" transform="translate(805.9375,895.1514)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -6.885,-14.985 -13.771,-29.971 -20.655,-44.957 -0.534,-1.161 1.189,-2.178 1.726,-1.009 6.886,14.986 13.771,29.971 20.657,44.956 C 2.261,0.152 0.538,1.169 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path590" />
                            </g>
                            <g id="g592" transform="translate(634.5449,870.5537)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 5.082,-9.044 13.325,-15.619 19.417,-23.904 0.755,-1.026 2.491,-0.03 1.727,1.009 C 15.058,-14.617 6.8,-8.019 1.728,1.009 1.097,2.132 -0.632,1.125 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path594" />
                            </g>
                            <g id="g596" transform="translate(742.8701,901.8936)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -0.121,-6.268 -2.707,-12.138 -4.943,-17.889 -2.318,-5.959 -4.667,-11.905 -7.093,-17.821 -0.488,-1.19 1.445,-1.708 1.928,-0.532 2.488,6.068 4.896,12.167 7.272,18.28 C -0.586,-12.17 1.878,-6.307 2,0 2.024,1.288 0.024,1.288 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path598" />
                            </g>
                            <g id="g600" transform="translate(527.5381,836.6538)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 7.22,-8.884 13.859,-18.225 19.888,-27.957 0.676,-1.092 2.407,-0.089 1.726,1.009 C 15.496,-17.07 8.742,-7.603 1.414,1.415 0.602,2.414 -0.805,0.991 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path602" />
                            </g>
                            <g id="g604" transform="translate(581.6699,824.7363)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 6.107,10.707 12.216,21.413 18.323,32.119 0.639,1.12 -1.089,2.129 -1.726,1.009 C 10.488,22.422 4.381,11.716 -1.728,1.01 -2.366,-0.11 -0.639,-1.119 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path606" />
                            </g>
                            <g id="g608" transform="translate(562.2676,801.3228)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 2.438,-9.552 6.061,-18.771 10.751,-27.441 0.612,-1.133 2.34,-0.124 1.727,1.009 C 7.865,-17.906 4.327,-8.86 1.929,0.532 1.61,1.778 -0.319,1.25 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path610" />
                            </g>
                            <g id="g612" transform="translate(581.3281,773.6499)">
                                <path class="jembatan_ku"
                                    d="M 0,0 C 7.597,3.156 15.376,5.847 23.298,8.063 24.536,8.409 24.01,10.339 22.767,9.992 14.844,7.776 7.065,5.084 -0.532,1.928 -1.703,1.441 -1.189,-0.494 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path614" />
                            </g>
                            <g id="g616" transform="translate(609.1201,782.1704)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 14.781,-5.612 29.89,-10.334 45.234,-14.146 1.25,-0.31 1.783,1.619 0.533,1.929 C 30.421,-8.406 15.313,-3.683 0.531,1.928 -0.673,2.386 -1.194,0.453 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path618" />
                            </g>
                            <g id="g620" transform="translate(777.127,746.833)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 1.589,-8.772 3.178,-17.544 4.768,-26.316 0.228,-1.265 2.156,-0.729 1.928,0.531 C 5.106,-17.013 3.518,-8.241 1.929,0.531 1.699,1.796 -0.229,1.26 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path622" />
                            </g>
                            <g id="g624" transform="translate(791.8447,759.9248)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 2.856,-9.735 6.959,-19.074 12.19,-27.767 0.664,-1.102 2.393,-0.097 1.727,1.01 C 8.771,-18.205 4.739,-9.046 1.928,0.532 1.566,1.764 -0.364,1.24 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path626" />
                            </g>
                            <g id="g628" transform="translate(732.7959,722.6763)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 14.284,-11.356 29.135,-21.985 44.499,-31.832 1.086,-0.697 2.091,1.034 1.009,1.727 C 30.289,-20.351 15.564,-9.835 1.414,1.414 0.416,2.207 -1.008,0.801 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path630" />
                            </g>
                            <g id="g632" transform="translate(813.4141,717.8506)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -8.06,-0.204 -16.119,-0.407 -24.179,-0.61 -1.284,-0.032 -1.289,-2.033 0,-2 8.06,0.203 16.119,0.406 24.179,0.61 1.285,0.032 1.29,2.032 0,2"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path634" />
                            </g>
                            <g id="g636" transform="translate(800.9795,676.499)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -0.012,-0.535 -5.555,-0.802 -6.177,-0.858 -2.286,-0.206 -4.576,-0.374 -6.868,-0.503 -4.585,-0.257 -9.178,-0.354 -13.769,-0.305 -1.288,0.014 -1.289,-1.986 0,-2 5.576,-0.059 11.152,0.099 16.715,0.492 2.699,0.191 5.394,0.436 8.082,0.735 C -0.429,-2.263 1.954,-2.105 2,0 2.028,1.288 0.028,1.287 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path638" />
                            </g>
                            <g id="g640" transform="translate(807.9307,663.9912)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 10.436,-0.768 19.648,5.225 27.875,10.885 1.054,0.725 0.055,2.459 -1.01,1.727 C 18.926,7.149 10.081,1.258 0,2 -1.284,2.094 -1.278,0.094 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path642" />
                            </g>
                            <g id="g644" transform="translate(683.2705,637.9834)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -1.731,-6.414 -4.128,-12.616 -7.166,-18.524 -0.588,-1.143 1.138,-2.156 1.728,-1.01 3.114,6.057 5.591,12.426 7.367,19.002 C 2.265,0.712 0.336,1.243 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path646" />
                            </g>
                            <g id="g648" transform="translate(717.291,638.0469)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -3.176,-15.399 -12.665,-28.354 -21.809,-40.765 -0.764,-1.037 0.971,-2.036 1.727,-1.009 9.245,12.547 18.8,25.674 22.011,41.242 C 2.188,0.725 0.26,1.262 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path650" />
                            </g>
                            <g id="g652" transform="translate(674.8281,700.252)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -3.341,-5.642 -8.594,-9.802 -13.563,-13.94 -5.458,-4.543 -11.013,-8.967 -16.568,-13.391 -1.006,-0.801 0.417,-2.208 1.415,-1.414 5.68,4.524 11.362,9.049 16.939,13.701 4.988,4.161 10.15,8.371 13.504,14.035 C 2.384,0.101 0.655,1.108 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path654" />
                            </g>
                            <g id="g656" transform="translate(760.0254,665.9199)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -6.208,0.788 -12.388,-0.692 -18.602,-0.349 -6.187,0.341 -11.653,3.495 -17.669,4.638 -1.256,0.239 -1.795,-1.688 -0.531,-1.929 6.048,-1.149 11.529,-4.236 17.739,-4.68 C -12.697,-2.775 -6.361,-1.193 0,-2 1.273,-2.162 1.262,-0.16 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path658" />
                            </g>
                            <g id="g660" transform="translate(772.9492,639.2095)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c 5.711,-8.909 11.025,-18.065 15.927,-27.443 0.596,-1.141 2.323,-0.132 1.727,1.009 C 12.753,-17.055 7.438,-7.899 1.728,1.01 1.035,2.09 -0.697,1.088 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path662" />
                            </g>
                            <g id="g664" transform="translate(475.0151,813.4136)">
                                <path class="jembatan_ku"
                                    d="m 0,0 c -3.914,-9.335 -7.827,-18.669 -11.741,-28.004 -0.497,-1.186 1.437,-1.704 1.928,-0.532 3.914,9.335 7.828,18.669 11.742,28.004 C 2.426,0.654 0.491,1.171 0,0"
                                    style="fill:#a8bfc8;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path666" />
                            </g>
                        </g>

                        <g id="ini_pulau_kecil">
                            <g id="g1244" transform="translate(509.8076,994.5166)">
                                <path class="pulau_ku pulau_e"
                                    d="m 0,0 c 13.479,-2.311 27.188,-3.825 40.585,-6.398 24.774,-4.759 38.678,-3.977 38.911,-6.719 0.211,-2.463 -10.835,-5.233 -15.48,-6.398 -8.065,-2.022 -10.733,-1.437 -17.574,-3.519 -7,-2.13 -7.175,-3.647 -13.388,-6.078 -15.004,-5.874 -28.053,-3.851 -28.033,-4.159 0.009,-0.14 -0.032,-0.216 0,0 0.042,0.284 -5.611,1.11 -10.042,1.599 -8.75,0.965 -12.411,0.577 -13.389,2.239 -0.688,1.171 0.379,2.637 1.256,3.84 2.514,3.451 5.993,3.358 6.276,5.118 0.429,2.672 -6.912,7.076 -13.389,6.719 -1.676,-0.093 -2.705,-0.472 -4.184,0 -2.819,0.897 -4.771,4.082 -3.766,6.398 0.98,2.257 6.044,0.216 12.134,2.879 3.281,1.435 3.19,2.506 6.034,3.753 C -8.881,1.541 -2.894,0.496 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1246" />
                            </g>
                            <g id="g668" transform="translate(282.5981,897.2695)">
                                <path class="pulau_ku pulau_e"
                                    d="m 0,0 c -4.117,5.476 12.314,28.16 20.268,25.689 1.217,-0.378 1.899,-1.256 2.857,-2.543 6.201,-8.329 9.33,-16.369 10.654,-19.839 0,0 2.281,-5.979 7.276,-17.55 2.007,-4.651 3.677,-8.363 7.535,-10.174 2.653,-1.245 3.967,-0.477 7.015,-1.781 4.025,-1.721 6.075,-4.918 8.056,-7.884 3.47,-5.198 7.339,-10.131 10.913,-15.261 11.118,-15.961 14.08,-17.107 15.85,-17.55 2.201,-0.551 4.898,-0.602 6.756,-2.798 1.603,-1.894 2.368,-5.134 1.039,-6.867 -1.737,-2.267 -5.825,-0.355 -13.771,0 -5.961,0.266 -5.074,-0.747 -21.047,-2.289 -9.446,-0.912 -10.094,-0.591 -13.772,-1.526 -1.225,-0.312 -6.857,-1.798 -14.031,-6.105 -12.029,-7.22 -15.396,-14.566 -19.748,-13.226 -2.012,0.621 -2.901,2.688 -4.417,6.359 -3.437,8.326 -2.681,15.995 -2.339,19.839 2.118,23.777 3.693,30.403 0.26,32.556 -3.541,2.221 -9.544,-2.114 -11.953,0.763 -1.426,1.706 -0.383,4.5 -0.259,4.833 1.409,3.777 6.627,5.497 9.789,5.13 0,0 0.856,-0.098 0.864,-0.043 0.018,0.128 -8.359,-0.073 -10.134,3.561 -0.548,1.123 -0.309,2.294 0,3.815 0.63,3.089 2.488,5.128 3.118,5.85 1.976,2.264 9.451,10.829 7.796,14.243 C 7.333,-0.236 1.903,-2.531 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path670" />
                            </g>
                            <g id="g672" transform="translate(408.6206,853.522)">
                                <path class="pulau_ku pulau_e cek_harta"
                                    d="m 0,0 c 20.475,-14.249 12.794,-13.1 14.291,-18.059 3.507,-11.616 4.173,-26.591 3.897,-29.249 -0.812,-7.83 -2.505,-14.404 1.56,-18.567 1.356,-1.389 3.783,-2.95 5.716,-2.29 2.673,0.914 2.82,5.537 3.898,13.227 1.833,13.077 3.042,11.37 3.897,20.602 0.841,9.072 -0.554,8.267 0,20.093 0.548,11.668 1.921,12.759 1.3,20.856 -0.493,6.413 -0.806,10.498 -3.119,15.515 -2.509,5.445 -5.539,8.007 -4.417,9.92 0.621,1.057 2.149,1.301 10.914,1.017 10.003,-0.324 10.448,-0.72 14.291,-0.508 7.45,0.409 12.464,5.36 11.433,9.919 -0.464,2.047 -1.725,3.849 -10.134,9.665 -7.123,4.927 -10.684,7.39 -12.992,8.139 -7.549,2.449 -9.803,-0.872 -20.008,0 -2.624,0.224 -8.245,2.099 -19.488,5.85 -14.116,4.709 -17.531,6.539 -19.747,10.174 -1.471,2.41 -1.339,3.854 -3.378,5.596 -2.766,2.362 -5.607,1.927 -13.512,2.289 -11.893,0.543 -13.605,1.899 -17.67,0 -1.085,-0.508 -4.739,-2.274 -6.755,-6.105 -1.996,-3.79 -1.059,-7.076 0,-14.243 2.261,-15.312 0.101,-14.652 2.079,-18.059 3.789,-6.527 9.532,-5.182 19.228,-13.734 4.616,-4.072 5.784,-6.556 9.094,-10.428 C -24.506,15.634 -15.449,5.747 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path674" />
                            </g>
                            <g id="g676" transform="translate(620.2598,911.6401)">
                                <path class="pulau_ku pulau_d"
                                    d="M 0,0 C 0.278,1.662 0.983,4.257 3.118,6.104 5.969,8.57 8.6,7.307 16.76,9.157 c 2.573,0.583 6.059,1.396 10.134,3.433 1.608,0.804 2.098,1.194 5.846,3.434 0,0 4.303,2.571 8.574,4.96 6.362,3.557 16.45,2.768 24.166,2.289 26.318,-1.637 39.477,-2.455 44.433,-1.908 5.963,0.658 14.475,2.098 17.929,-2.289 2.064,-2.622 0.88,-5.494 3.897,-8.012 1.532,-1.277 4.159,-1.886 9.355,-3.052 5.014,-1.125 5.317,-0.822 6.236,-1.526 3.93,-3.015 3.821,-12.759 -1.17,-17.55 -2.177,-2.089 -4.79,-2.764 -10.913,-3.434 -10.317,-1.128 -29.214,-3.196 -30.791,1.908 -0.344,1.112 0.963,2.783 3.508,6.104 3.96,5.168 7.552,5.697 7.405,7.631 -0.181,2.411 -5.606,3.856 -9.744,4.959 -5.96,1.589 -11.033,1.771 -15.59,1.908 -6.964,0.21 -6.575,-0.519 -11.304,0 -3.362,0.369 -5.095,0.907 -7.405,0 C 68.557,6.924 68.65,5.207 65.87,3.434 63.789,2.107 62.205,2.093 55.736,1.526 49.464,0.977 46.327,0.702 44.433,0.382 39.128,-0.516 35.34,-2.155 31.571,-3.815 22.61,-7.762 23.06,-9.686 16.37,-12.208 c -3.306,-1.247 -13.417,-5.06 -17.539,-0.764 -2.636,2.747 -1.663,7.6 -1.169,9.538"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path678" />
                            </g>
                            <g id="g680" transform="translate(513.2383,781.2876)">
                                <path class="pulau_ku pulau_e"
                                    d="m 0,0 c 1.133,-0.074 1.23,1.125 3.541,5.978 1.664,3.496 2.169,2.893 3.507,5.913 2.284,5.154 0.738,6.743 2.534,10.11 1.924,3.607 5.522,5.204 10.133,7.249 3.907,1.733 4.44,1.18 11.304,3.434 3.07,1.008 7.002,2.299 11.108,4.387 4.83,2.457 7.092,4.589 10.913,7.44 15.809,11.793 12.463,6.413 17.149,10.301 0.681,0.564 2.073,1.752 2.923,1.335 0.402,-0.196 1.074,-0.941 -0.194,-8.966 -0.625,-3.956 -0.938,-5.934 -1.364,-6.867 -1.027,-2.245 -2.299,-3.315 -7.991,-8.203 -6.459,-5.547 -5.646,-4.937 -6.43,-5.531 -5.452,-4.131 -10.46,-7.924 -17.15,-8.775 -4.706,-0.599 -5.659,0.841 -13.252,0 -5.409,-0.6 -7.057,-1.567 -7.6,-1.908 C 15.552,13.648 16.458,11.249 12.505,6.168 10.963,4.187 8.229,1.986 2.761,-2.416 -1.698,-6.006 -2.543,-6.301 -2.891,-6.041 -3.58,-5.522 -2.59,-2.59 -1.656,-2.543 -1.156,-2.518 -0.475,0.031 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path682" />
                            </g>
                            <g id="g684" transform="translate(488.1313,899.3042)">
                                <path class="pulau_ku pulau_e"
                                    d="m 0,0 c 0.903,2.165 6.272,1.312 19.748,0.509 14.171,-0.844 21.403,-1.241 28.583,0 7.359,1.272 6.599,2.362 14.55,3.561 7.835,1.181 12.721,0.748 15.591,4.324 1.821,2.27 0.714,3.52 2.858,5.85 2.391,2.598 5.749,3.196 10.654,4.069 4.134,0.736 7.417,0.772 8.834,0.763 8.405,-0.054 12.607,-0.08 15.071,-3.052 3.062,-3.694 2.368,-10.489 -1.04,-13.734 -1.012,-0.964 -2.046,-1.408 -5.975,-2.544 -5.712,-1.652 -8.568,-2.477 -13.252,-3.307 C 83.36,-5.73 83.129,-4.46 79.771,-6.358 c -2.687,-1.519 -2.705,-2.426 -8.835,-7.122 -3.544,-2.715 -5.321,-4.066 -6.756,-4.832 -3.877,-2.074 -8.353,-2.428 -17.149,-3.053 -2.189,-0.155 -7.358,-0.481 -14.031,0 -6.906,0.498 -8.438,1.355 -9.095,2.544 -1.386,2.51 1.753,5.389 0,8.648 -1.014,1.886 -3.002,2.659 -3.378,2.797 C 17.186,-6.146 15.339,-8.75 10.134,-8.393 9.018,-8.316 7.168,-8.171 5.197,-7.122 2.133,-5.49 -0.794,-1.903 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path686" />
                            </g>
                            <g id="g688" transform="translate(318.9756,748.7314)">
                                <path class="pulau_ku pulau_e"
                                    d="m 0,0 c -3.895,-1.959 -6.713,-4.408 -9.159,-6.867 -4.955,-4.982 -8.119,-9.742 -9.549,-12.018 -3.836,-6.103 -5.813,-11.208 -7.211,-14.88 -3.89,-10.21 -1.312,-8.749 -4.872,-17.74 -0.811,-2.049 -1.569,-3.702 -0.779,-5.151 1.996,-3.662 11.654,-1.909 12.667,-1.717 4.507,0.857 7.485,2.712 11.108,4.96 7.173,4.451 13.294,8.249 15.2,14.88 0.991,3.447 0.01,4.761 1.754,8.202 2.112,4.165 4.417,3.951 6.042,7.631 1.1,2.491 0.275,3.114 0.389,11.064 0.107,7.425 0.849,8.389 -0.389,10.11 C 12.922,1.64 7.585,2.303 3.897,1.526 2.443,1.22 1.461,0.735 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path690" />
                            </g>
                            <g id="g692" transform="translate(502.7476,773.9116)">
                                <path class="pulau_ku pulau_e"
                                    d="m 0,0 c -3.09,0.61 -5.906,-3.348 -10.914,-8.393 -2.247,-2.265 -5.224,-5.265 -8.769,-7.821 -6.321,-4.559 -9.411,-4.077 -16.175,-8.012 -7.138,-4.154 -9.974,-6.362 -11.498,-9.348 -0.424,-0.83 -0.786,-1.767 -1.754,-3.052 -2.019,-2.681 -3.426,-2.561 -6.821,-5.723 -2.105,-1.96 -3.413,-3.212 -3.702,-5.15 -0.138,-0.923 0.039,-1.439 -0.39,-2.289 -0.676,-1.337 -1.768,-1.35 -3.508,-2.67 -0.817,-0.621 -2.477,-1.881 -3.118,-3.816 -0.694,-2.096 0.515,-2.845 -0.195,-4.197 -1.183,-2.252 -4.973,-1.001 -6.431,-3.242 -0.95,-1.462 -0.272,-3.429 0.585,-5.914 0.887,-2.574 1.899,-6.004 3.507,-6.104 2.037,-0.127 2.154,5.22 6.626,10.3 2.298,2.61 3.942,3.103 13.057,8.013 7.478,4.027 11.217,6.041 12.278,6.867 9.402,7.317 8.5,14.456 15.395,16.024 3.862,0.878 6.242,-0.885 9.939,1.335 1.867,1.121 1.58,1.763 5.457,4.769 2.403,1.864 3.375,2.285 5.067,4.006 0.439,0.446 2.16,2.197 3.118,4.006 2.172,4.101 -1.622,6.208 -0.585,12.018 0.591,3.31 2.207,5.314 0.975,7.058 C 1.409,-0.296 0.142,-0.028 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path694" />
                            </g>
                            <g id="g696" transform="translate(384.4551,640.1255)">
                                <path class="pulau_ku pulau_e"
                                    d="m 0,0 c -0.932,3.655 -2.038,8.888 -2.598,15.261 -0.526,5.981 -0.335,10.277 0,17.804 0.362,8.139 0.587,13.197 1.819,20.094 1.147,6.418 1.828,6.945 2.598,12.971 1.002,7.841 0.082,8.787 1.559,12.463 2.132,5.305 6.232,8.771 9.095,11.192 4.058,3.431 4.349,2.366 7.795,5.595 1.936,1.814 5.921,5.548 8.055,11.446 1.026,2.837 1.046,4.575 1.559,4.578 1.023,0.004 2.499,-6.898 2.078,-13.481 C 31.498,90.689 29.031,88.309 26.504,80.882 23.936,73.334 23.579,64.999 22.866,48.326 22.483,39.367 22.843,37.823 21.827,33.065 21.443,31.269 19.695,23.543 14.292,14.752 10.54,8.65 6.274,4.063 2.599,0.763"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path698" />
                            </g>
                            <g id="g700" transform="translate(287.0151,634.7842)">
                                <path class="pulau_ku pulau_e"
                                    d="m 0,0 c 0.104,8.788 1.7,15.717 3.118,20.348 0.426,1.39 2.103,5.336 5.457,13.226 0.128,0.302 3.245,7.518 9.094,15.515 1.137,1.554 2.091,2.747 2.858,2.543 1.605,-0.424 0.077,-6.336 1.3,-15.26 1.043,-7.609 3.527,-13.327 4.417,-15.261 1.976,-4.294 2.502,-3.867 3.638,-6.867 0.697,-1.84 2.101,-6.231 0.779,-17.042 -1.302,-10.653 -3.071,-9.697 -3.638,-18.312 -0.339,-5.171 0.135,-7.981 -1.559,-12.718 -1.036,-2.899 -2.194,-6.139 -5.196,-8.139 -3.507,-2.337 -6.298,-0.828 -14.032,-1.017 -11.1,-0.272 -14.372,-3.602 -16.889,-1.272 -2.391,2.213 -0.524,6.218 0.259,16.024 0.519,6.488 0.263,11.762 0,15.006"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path702" />
                            </g>
                            <g id="g704" transform="translate(166.9692,534.3174)">
                                <path class="pulau_ku pulau_e"
                                    d="m 0,0 c 0.097,1.906 0.715,6.718 9.354,16.024 6.833,7.36 8.218,6.259 9.744,9.919 2.69,6.453 -1.411,10.367 1.949,15.643 1.757,2.76 2.944,1.791 8.185,6.486 3.641,3.261 6.527,5.846 8.185,9.919 2.275,5.591 -0.268,7.83 2.338,11.446 2.766,3.835 8.948,5.918 12.083,3.815 1.667,-1.119 2.075,-3.154 2.339,-4.578 0.974,-5.259 -1.464,-9.159 -3.898,-14.88 C 46.707,45.4 48.674,46.082 45.602,39.297 42.055,31.465 39.308,30.278 34.688,22.128 31.107,15.809 28.947,11.862 28.062,6.486 c -2.241,-13.627 6.224,-22.715 2.339,-25.943 -2.172,-1.805 -7.082,-0.845 -8.964,1.526 -1.99,2.506 0.292,5.472 -1.559,7.248 -2.143,2.057 -5.873,-1.266 -12.083,0.382 C 6.39,-9.928 3.426,-9.098 1.559,-6.485 -0.169,-4.067 -0.069,-1.364 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path706" />
                            </g>
                            <g id="g708" transform="translate(133.4497,567.8911)">
                                <path class="pulau_ku pulau_e"
                                    d="m 0,0 v 0 c -1.387,-1.784 -3.343,-4.176 -5.846,-6.867 -4.703,-5.056 -7.1,-7.577 -9.355,-7.249 -2.966,0.431 -5.052,4.658 -5.456,8.012 -0.363,3.016 0.677,4.978 2.728,9.538 1.716,3.813 5.072,11.271 7.406,18.313 1.326,4.002 1.547,5.53 3.507,11.064 2.59,7.308 3.55,8.441 4.288,9.156 4.22,4.089 8.945,2.037 10.913,5.342 2.024,3.399 -2.393,6.549 -1.169,11.445 1.644,6.581 12.227,11.296 15.59,8.775 1.283,-0.961 0.837,-2.467 0,-12.59 C 21.631,43.142 21.878,40.838 19.878,36.626 18.538,33.804 17.176,30.936 14.032,28.996 10.534,26.838 7.916,27.731 4.677,25.562 4.008,25.114 -0.407,22.016 -0.39,17.932 -0.372,13.654 4.502,11.958 4.158,7.63 4.013,5.812 3.016,4.408 2.274,3.561"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path710" />
                            </g>
                            <g id="g712" transform="translate(188.7959,316.0889)">
                                <path class="pulau_ku pulau_b"
                                    d="m 0,0 c -0.487,-0.088 -1.075,-0.831 -1.364,-4.006 0.945,-1.713 2.198,-4.383 2.923,-7.821 0.868,-4.121 0.397,-7.394 0.39,-9.157 -0.053,-13.383 -4.219,-16.447 -3.118,-24.798 0.826,-6.274 3.97,-10.569 7.405,-15.261 6.609,-9.029 10.141,-7.348 17.539,-16.406 6.78,-8.301 8.084,-14.943 12.473,-14.879 2.248,0.032 4.475,1.811 5.456,3.815 2.934,5.992 -6.734,11.034 -9.744,23.655 -2.745,11.512 3.414,15.224 -1.169,25.561 -2.297,5.181 -4.04,4.69 -6.626,11.065 -3.403,8.386 -1.93,13.042 -5.846,15.641 -3.212,2.133 -5.181,-0.347 -10.134,1.908 C 2.187,-7.951 1.715,0.308 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path714" />
                            </g>
                            <g id="g716" transform="translate(129.1626,322.5742)">
                                <path class="pulau_ku pulau_b"
                                    d="m 0,0 c -1.925,-1.209 1.613,-6.316 2.338,-17.932 0.383,-6.121 0.819,-13.1 -2.338,-20.601 -2.637,-6.267 -5.405,-7.249 -7.016,-13.354 -0.536,-2.031 -1.883,-7.39 0,-13.352 4.251,-13.458 20.864,-16.777 22.996,-17.169 3.475,-0.64 7.783,-1.433 9.744,0.763 2.076,2.326 -0.943,6.489 -5.847,17.931 -4.613,10.767 -6.922,16.284 -7.015,22.892 -0.047,3.302 0.436,2.484 1.169,12.208 0.655,8.688 0.963,13.093 0,16.024 C 11.326,-4.352 2.407,1.513 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path718" />
                            </g>
                            <g id="g720" transform="translate(44.9741,304.6426)">
                                <path class="pulau_ku pulau_b"
                                    d="m 0,0 c -0.043,-0.293 -0.617,-3.881 -3.118,-5.723 -1.184,-0.871 -1.446,-0.356 -2.728,-1.144 -2.772,-1.705 -2.049,-4.428 -4.287,-6.486 -2.525,-2.32 -5.299,-0.563 -6.626,-2.289 -1.711,-2.223 2.266,-5.954 5.456,-14.498 2.46,-6.589 3.566,-13.667 3.898,-16.023 0.828,-5.872 0.471,-8.067 1.559,-8.394 2.325,-0.698 8.43,7.996 11.303,17.55 2.316,7.701 0.784,10.146 3.897,13.735 4.639,5.345 11.316,3.7 12.473,7.63 1.037,3.527 -3.281,8.446 -7.016,10.683 C 11.456,-2.95 9.908,-3.906 5.847,-1.145 3.169,0.677 1.288,2.829 0.39,2.289 -0.037,2.033 0.212,1.44 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path722" />
                            </g>
                            <g id="g724" transform="translate(12.6245,276.792)">
                                <path class="pulau_ku pulau_b"
                                    d="m 0,0 c -0.493,-0.745 -0.178,-1.725 0,-2.289 3.048,-9.677 -0.423,-4.231 3.118,-12.209 4.256,-9.587 5.325,-8.567 6.626,-12.972 1.178,-3.989 -0.223,-3.057 0,-16.786 0.173,-10.684 1.026,-11.546 0,-16.405 -0.579,-2.745 -1.209,-4.163 -0.39,-4.96 1.953,-1.901 10.593,1.246 14.421,7.63 2.768,4.616 2.18,9.521 1.949,11.446 -0.608,5.065 -2.482,5.114 -5.457,13.734 -2.029,5.88 -1.438,6.673 -3.508,11.065 -2.375,5.04 -3.539,4.813 -4.676,8.392 -1.966,6.183 0.847,8.933 -1.56,11.828 C 7.845,1.696 1.302,1.97 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path726" />
                            </g>
                            <g id="g728" transform="translate(76.8047,348.6445)">
                                <path class="pulau_ku pulau_b"
                                    d="m 0,0 c -3.309,1.941 -11.447,-5.072 -15.59,-10.174 -3.807,-4.686 -5.326,-9.094 -7.276,-14.752 -2.512,-7.29 -1.84,-9.424 -1.559,-10.174 1.661,-4.432 7.017,-6.856 11.433,-7.121 0.614,-0.037 7.148,-0.334 10.913,4.07 3.285,3.841 1.397,7.676 1.559,18.821 C -0.328,-6.207 2.438,-1.43 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path730" />
                            </g>
                            <g id="g732" transform="translate(360.29,612.1475)">
                                <path class="pulau_ku pulau_a"
                                    d="m 0,0 c -0.293,-0.407 -0.732,-1.011 -1.277,-1.732 -4.987,-6.601 -9.658,-10.916 -14.898,-15.627 -12.575,-11.305 -13.338,-11.312 -15.2,-14.498 -0.856,-1.462 -6,-10.526 -2.729,-14.307 2.75,-3.177 8.81,0.42 11.888,-2.861 2.012,-2.145 0.692,-5.035 -0.78,-14.689 -1.337,-8.771 -0.352,-7.066 -1.948,-18.694 -1.702,-12.39 -2.891,-14.833 -1.754,-15.451 3.073,-1.672 15.894,13.967 24.554,28.041 4.091,6.648 8.141,9.982 8.575,16.024 0.477,6.634 -5.609,8.355 -5.067,15.451 0.317,4.145 2.242,5.222 3.508,13.163 1.011,6.338 0.049,7.313 -0.39,7.63 -2.229,1.613 -7.701,-1.64 -10.718,-3.433 -2.415,-1.436 -4.634,-3.108 -4.677,-3.053 -0.096,0.124 11.058,8.534 14.616,16.024 0.697,1.469 1.193,3.092 1.169,4.96 -0.034,2.61 -1.07,4.628 -1.754,5.723"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path734" />
                            </g>
                            <g id="g736" transform="translate(619.3506,736.2686)">
                                <path class="pulau_ku pulau_a cek_harta"
                                    d="m 0,0 c -4.359,-1.84 -1.66,-12.502 -0.52,-38.152 0.704,-15.804 0.009,-19.184 3.119,-25.434 1.26,-2.536 6.554,-13.177 17.149,-16.279 8.983,-2.63 12.322,2.929 20.787,0 6.085,-2.105 5.958,-5.531 16.111,-14.752 1.877,-1.706 17.008,-15.448 20.787,-12.717 2.546,1.841 -1.046,10.467 -1.56,11.7 -3.589,8.616 -8.188,9.644 -14.031,18.821 -5.402,8.486 -2.703,9.545 -7.276,14.752 -4.85,5.525 -12.778,9.901 -21.306,10.683 -8.346,0.765 -11.259,-2.463 -14.551,0 -3.952,2.957 -0.323,8.034 -3.118,20.857 -2.198,10.084 -5.061,9.773 -5.717,18.313 C 9.599,-8.632 9.838,-5.151 7.275,-2.543 5.601,-0.839 2.271,0.958 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path738" />
                            </g>
                            <g id="g740" transform="translate(685.8701,539.6587)">
                                <path class="pulau_ku pulau_a"
                                    d="m 0,0 c -1.609,1.073 -3.08,1.405 -3.898,1.526 -3.027,0.451 -5.436,-0.745 -6.496,-1.272 -0.366,-0.181 -1.299,-0.666 -2.353,-1.509 -3.325,-2.662 -4.445,-6.163 -4.662,-6.884 -0.591,-1.961 -1.641,-5.444 0,-7.885 2.556,-3.804 8.361,-0.173 15.849,-4.069 4.958,-2.579 4.682,-5.35 10.134,-7.121 3.959,-1.287 7.905,-1.062 8.575,-1.018 2.279,0.149 3.417,0.223 4.417,0.763 4.749,2.567 4.18,11.733 3.898,16.278 -0.304,4.898 -0.456,7.347 -2.079,9.411 -3.281,4.173 -10.47,5.164 -18.189,3.052"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path742" />
                            </g>
                            <g id="g744" transform="translate(112.9619,158.9551)">
                                <path class="pulau_ku"
                                    d="m 0,0 c 0.717,-2.941 -1.16,-5.389 -4.067,-9.972 -3.532,-5.57 -5.02,-8.484 -6.626,-11.446 -4.149,-7.649 -1.535,-11.52 -5.456,-14.879 -2.782,-2.383 -4.628,-1.373 -6.237,-3.815 -1.636,-2.485 -0.961,-5.599 0.39,-11.827 0.946,-4.36 1.445,-6.553 2.728,-7.249 3.924,-2.125 11.747,5.743 13.252,7.249 2.191,2.193 8.971,8.979 10.329,19.076 0.517,3.839 -0.291,4.144 0.39,10.873 0.414,4.094 0.535,6.353 0.779,10.874 0.143,2.638 0.225,4.883 -1.169,6.867 C 3.596,-3.229 4.207,-2.988 3.972,-1.96 3.509,0.064 4.217,1.011 3.923,3.19 3.731,4.619 2.636,6.198 1.39,6.242 0.496,6.274 -0.363,5.514 -0.754,4.717 -1.523,3.149 -0.396,1.625 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path746" />
                            </g>
                            <g id="g748" transform="translate(125.2651,196.291)">
                                <path class="pulau_ku pulau_b"
                                    d="m 0,0 c 0.957,-3.469 -0.198,-5.979 -0.78,-8.774 -1.231,-5.918 0.507,-11.2 2.534,-17.36 2.129,-6.471 3.463,-5.949 5.067,-11.827 0.78,-2.861 0.602,-3.492 1.558,-13.544 0.472,-4.954 0.996,-9.855 1.95,-15.451 1.603,-9.41 2.718,-10.791 3.897,-11.637 2.607,-1.868 5.908,-1.386 11.498,-0.572 4.904,0.716 8.931,1.303 9.744,3.625 0.889,2.539 -3.17,4 -4.872,9.347 -1.572,4.936 1.081,6.229 0.974,14.498 -0.064,4.988 -1.085,8.828 -2.338,13.544 -1.204,4.529 -1.945,7.317 -3.703,10.682 -3.514,6.729 -5.902,5.823 -10.718,13.544 C 11.46,-8.555 9.785,-5.87 8.575,-1.907 7.642,1.145 7.311,3.717 5.067,4.96 2.984,6.113 -0.145,5.791 -0.975,4.388 -1.61,3.313 -0.587,2.128 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path750" />
                            </g>
                            <g id="g752" transform="translate(126.2393,240.9297)">
                                <path class="pulau_ku pulau_b"
                                    d="m 0,0 c -2.606,-1.832 -0.077,-9.149 0.584,-11.064 1.74,-5.033 3.205,-5.534 5.652,-10.873 1.052,-2.295 0.779,-2.197 3.898,-12.4 2.751,-9 3.657,-11.343 6.041,-13.735 1.144,-1.148 4.125,-4.137 7.211,-3.434 2.597,0.593 3.886,3.487 4.287,4.388 1.397,3.138 0.744,5.534 -0.974,13.926 -2.039,9.954 -3.059,14.931 -3.118,15.451 -0.565,4.927 -0.299,6.648 -1.949,8.393 -2.535,2.681 -5.125,0.696 -9.744,3.624 -3.355,2.127 -3.808,4.328 -7.6,5.533 C 2.876,0.257 1.148,0.807 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path754" />
                            </g>
                            <g id="g756" transform="translate(977.1504,319.3955)">
                                <path class="pulau_ku pulau_c cek_harta"
                                    d="m 0,0 c -2.38,-2.501 -5.035,-4.755 -7.275,-7.377 0,0 -3.661,-4.283 -8.316,-11.445 -0.284,-0.438 -1.091,-1.705 -0.649,-2.289 0.804,-1.062 4.706,1.507 6.106,0.255 1.115,-0.999 0.012,-3.857 -0.779,-5.851 -1.641,-4.133 -3.779,-6.94 -5.197,-8.774 -4.311,-5.578 -4.686,-5.81 -7.536,-9.539 0,0 -2.457,-3.214 -6.885,-11.318 -0.819,-1.497 -1.898,-3.538 -1.169,-4.324 0.869,-0.94 3.345,0.959 6.886,0 1.006,-0.273 2.31,-0.625 2.858,-1.653 1.102,-2.071 -1.656,-5.387 -4.158,-8.394 -2.592,-3.114 -3.888,-4.672 -6.106,-5.723 -2.914,-1.38 -5.759,-1.311 -6.886,-3.56 -0.22,-0.441 -0.489,-0.974 -0.26,-1.4 0.729,-1.355 5.156,0.909 11.563,0.891 5.017,-0.014 5.683,-1.411 9.744,-0.763 1.925,0.307 5.234,0.835 7.406,3.179 2.617,2.825 1.098,5.606 2.078,14.243 0.573,5.054 1.005,8.856 3.248,13.1 1.895,3.584 2.785,3.138 6.496,9.029 3.731,5.923 4.378,8.829 4.548,9.665 0.177,0.873 0.405,2.319 -0.13,8.521 C 4.562,-11.677 3.309,-12.115 3.248,-5.342 3.218,-2.015 3.492,1.166 2.339,1.525 1.647,1.741 0.794,0.834 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path758" />
                            </g>
                            <g id="g760" transform="translate(896.9893,311.3193)">
                                <path class="pulau_ku pulau_c"
                                    d="m 0,0 c -2.95,-0.326 -3.059,-4.607 -6.82,-9.538 -4.542,-5.953 -8.107,-6.259 -11.109,-10.301 -2.687,-3.619 -2.304,-4.735 -4.676,-7.057 -3.99,-3.908 -7.208,-1.743 -10.719,-4.96 -3.759,-3.447 -3.841,-8.877 -3.898,-12.591 -0.046,-3.027 -0.104,-6.947 2.534,-8.965 1.534,-1.174 3.52,-1.355 5.651,-1.145 8.415,0.828 13.535,7.186 28.647,20.22 4.87,4.2 8.385,7.03 7.601,8.966 -0.841,2.078 -6.338,2.399 -8.965,2.289 -2.349,-0.098 -3.524,-1.018 -3.897,-0.572 -0.697,0.833 4.219,3.882 7.406,9.729 0.371,0.682 4.852,9.099 1.558,12.59 C 3.25,-1.268 1.822,0.202 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path762" />
                            </g>
                            <g id="g764" transform="translate(669.7598,320.667)">
                                <path class="pulau_ku pulau_c cek_harta"
                                    d="m 0,0 c -3.418,-0.805 -3.832,-9.99 -3.897,-11.445 -0.134,-2.951 0.012,-7.746 2.858,-11.955 3.395,-5.024 7.315,-4.489 11.173,-9.411 2.889,-3.688 1.612,-5.401 3.897,-10.173 3.765,-7.863 10.862,-11.907 12.733,-12.972 5.108,-2.911 11.703,-3.337 24.684,-4.07 3.614,-0.203 5.94,-0.264 22.866,-0.508 23.558,-0.34 18.875,-0.221 20.268,-0.255 19.231,-0.476 21.128,-1.309 26.503,0.509 4.662,1.576 6.686,3.369 12.992,4.578 5.1,0.977 8.619,0.733 9.095,2.289 0.477,1.564 -2.492,3.728 -5.457,5.85 -5.213,3.73 -9.832,5.759 -12.992,7.122 -9.038,3.895 -13.596,5.756 -14.811,6.104 -11.977,3.425 -17.59,0.063 -42.353,0.509 -1.571,0.028 -4.287,-0.366 -7.796,0.254 -5.723,1.011 -6.235,3.014 -11.173,4.069 -5.913,1.264 -7.398,-1.134 -13.772,0 -4.079,0.727 -6.929,2.323 -9.094,3.562 C 10.534,-17.257 5.036,1.186 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path766" />
                            </g>
                            <g id="g768" transform="translate(769.3437,809.9653)">
                                <path class="pulau_ku pulau_d cek_harta"
                                    d="m 0,0 c -1.015,-2.422 -1.599,-4.53 -1.949,-6.104 -0.398,-1.785 -0.551,-3.129 -0.585,-3.434 -0.119,-1.078 -0.256,-2.858 -0.098,-5.5 0.197,-3.303 0.728,-5.807 0.878,-6.518 1.901,-9.003 2.921,-13.497 3.117,-15.642 0.699,-7.607 -0.904,-9.01 0,-15.07 0.875,-5.861 1.981,-10.255 5.262,-13.544 0.362,-0.363 2.948,-2.954 4.288,-2.289 1.8,0.892 -0.785,6.594 1.754,8.584 1.547,1.213 4.241,0.453 5.847,0 3.866,-1.091 4.757,-3.245 6.625,-2.861 1.909,0.391 3.28,3.112 3.507,5.341 0.5,4.867 -4.459,7.332 -8.574,12.781 -1.947,2.577 -4.092,11.256 -8.38,28.614 -1.067,4.318 -2.432,10.01 -7.211,15.261 -1.62,1.78 -3.197,3.031 -4.287,3.815"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path770" />
                            </g>
                            <g id="g772" transform="translate(801.7588,787.9009)">
                                <path class="pulau_ku pulau_d"
                                    d="m 0,0 c -0.175,-5.686 8.938,-6.622 15.85,-15.77 5.094,-6.742 2.491,-9.339 8.055,-15.769 5.159,-5.962 11.477,-8.441 14.032,-9.411 4.707,-1.786 6.241,-1.282 22.085,-2.034 15.047,-0.715 19.719,-1.458 25.465,1.78 1.321,0.744 6.301,3.55 5.976,6.613 -0.339,3.202 -6.109,3.209 -13.512,7.376 -12.241,6.891 -11.883,15.55 -21.826,17.804 -5.535,1.255 -6.667,-1.197 -11.433,0.763 C 38.134,-5.95 39.089,-0.818 32.22,3.815 26.437,7.715 20.243,7.8 14.031,7.885 5.771,7.998 3.274,5.754 2.598,5.087 2.053,4.549 0.079,2.602 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path774" />
                            </g>
                            <g id="g776" transform="translate(646.7637,720.499)">
                                <path class="pulau_ku pulau_d cek_harta"
                                    d="m 0,0 c 4.541,-5.972 8.5,-11.126 11.693,-15.261 10.713,-13.875 8.495,-10.709 10.134,-12.971 7.093,-9.798 9.492,-15.036 12.082,-14.498 1.487,0.309 1.715,2.249 3.508,5.723 2.138,4.14 4.543,6.575 9.354,11.445 4.698,4.756 9.96,7.696 30.792,19.076 10.136,5.538 15.882,8.663 20.267,15.643 2.274,3.619 4.368,8.572 3.118,9.537 C 99.282,19.98 93.187,13.033 84.578,8.012 76.01,3.014 67.731,2.191 54.956,0.381 47.838,-0.627 42.298,-0.908 37.417,-1.145 24.309,-1.779 17.71,-2.447 14.421,-1.145 12.914,-0.548 8.706,1.337 2.826,1.622 c -1.291,0.062 -2.349,0.032 -3.02,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path778" />
                            </g>
                            <g id="g780" transform="translate(803.0576,703.458)">
                                <path class="pulau_ku pulau_d"
                                    d="m 0,0 c -0.447,0.243 -1.639,0.869 -3.118,0.636 -1.811,-0.285 -2.871,-1.67 -3.248,-2.162 -0.886,-1.156 -1.705,-3.031 -1.169,-8.521 0.357,-3.671 0.776,-3.366 1.429,-7.885 0.612,-4.238 0.715,-7.773 0.779,-10.173 0.065,-2.464 0.098,-3.695 0,-4.579 -0.302,-2.728 -1.001,-4.011 -2.858,-9.919 -1.13,-3.598 -1.184,-4.118 -1.04,-4.833 0.16,-0.781 0.629,-2.162 4.938,-5.723 2.795,-2.31 3.456,-2.459 5.716,-4.196 4.021,-3.091 8.349,-6.418 8.315,-10.428 -0.011,-1.266 -0.454,-2.273 -0.13,-2.417 0.559,-0.249 2.757,2.358 3.638,5.087 0.977,3.029 0.021,5.253 -1.43,10.174 -2.12,7.193 -3.269,11.089 -3.637,16.024 -0.355,4.753 0.346,6.027 -0.78,9.665 -1.225,3.959 -2.415,3.612 -3.897,7.758 -1.045,2.923 -2.754,7.699 -1.429,12.844 0.464,1.802 1.271,3.538 0.52,5.596 C 2.426,-2.58 1.756,-0.954 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path782" />
                            </g>
                            <g id="g784" transform="translate(542.6982,614.4365)">
                                <path class="pulau_ku pulau_a"
                                    d="m 0,0 c -2.366,-1.214 0.385,-11.02 2.338,-16.405 1.903,-5.247 3.333,-7.075 6.626,-13.353 2.798,-5.332 2.501,-5.411 12.473,-26.707 4.257,-9.093 6.124,-12.947 8.964,-12.972 2.586,-0.021 4.868,3.141 5.846,5.342 2.826,6.351 -1.567,12.848 0,13.735 1.187,0.67 4.688,-2.488 7.405,-6.105 5.084,-6.764 4.511,-11.253 8.186,-17.931 0.436,-0.794 3.972,-7.08 10.134,-11.446 11.85,-8.398 29.868,-7.186 31.18,-3.052 0.623,1.962 -2.834,3.582 -11.693,11.064 -15.916,13.443 -24.245,20.478 -26.893,30.903 -2.251,8.861 1.398,13.11 -3.118,18.313 -3.885,4.477 -10.304,5.616 -15.201,6.486 -7.283,1.294 -12.432,-2.81 -15.2,0 -1.133,1.149 -0.538,1.941 -1.56,4.578 -1.344,3.476 -3.545,5.119 -9.353,9.92 C 1.601,-0.579 0.836,0.429 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path786" />
                            </g>
                            <g id="g788" transform="translate(762.5225,175.6895)">
                                <path class="pulau_ku pulau_c"
                                    d="m 0,0 c -1.746,-2.838 -0.855,-4.971 -0.779,-11.7 0.075,-6.647 -0.772,-6.588 0,-9.156 1.42,-4.731 4.799,-6.618 3.897,-8.394 -0.813,-1.603 -3.685,-0.303 -6.236,-2.543 -1.883,-1.654 -2.273,-4.078 -2.599,-6.104 -0.341,-2.123 -0.663,-4.127 0.521,-5.851 1.586,-2.31 4.795,-2.535 4.936,-2.543 4.451,-0.25 5.695,4.277 13.252,9.411 5.7,3.872 7.974,3.32 9.874,6.612 2.133,3.697 1.265,7.85 0.78,10.174 -1.504,7.197 -6.658,11.714 -7.536,12.463 -4.003,3.416 -6.392,2.96 -9.094,6.868 C 5.865,0.901 5.12,2.688 3.638,2.798 1.805,2.934 0.246,0.4 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path790" />
                            </g>
                            <g id="g792" transform="translate(858.9229,159.9199)">
                                <path class="pulau_ku pulau_c"
                                    d="m 0,0 c -1.494,-1.422 -3.808,-3.688 -6.496,-6.613 -5.781,-6.291 -6.503,-8.241 -10.134,-10.683 -3.744,-2.516 -4.181,-1.252 -10.393,-4.323 -3.85,-1.903 -8.088,-4.049 -11.953,-8.394 -1.339,-1.507 -4.879,-5.801 -5.716,-11.954 -0.356,-2.618 0.106,-3.152 0.259,-3.306 2.13,-2.15 9.839,2.945 18.709,6.867 11.854,5.24 17.053,1.315 23.126,6.867 1.032,0.943 4.521,4.134 5.716,9.156 0.43,1.804 0.41,3.203 0,10.429 -0.184,3.257 -0.362,6.165 -0.519,8.647"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path794" />
                            </g>
                            <g id="g796" transform="translate(125.395,447.8398)">
                                <path class="pulau_ku pulau_b cek_harta"
                                    d="M 0,0 C 0.942,-4.387 2.138,-11.09 2.598,-19.33 3.174,-29.638 2.091,-33.262 1.039,-51.632 0.558,-60.04 0.805,-67.496 1.299,-82.408 c 0.281,-8.487 0.695,-15.647 5.457,-18.313 1.52,-0.851 4.273,-1.686 6.236,-0.508 4.104,2.462 -0.914,10.333 2.339,20.347 2.44,7.517 6.587,7.145 10.913,17.295 1.717,4.03 2.3,6.992 3.378,12.463 2.408,12.229 4.105,20.844 -0.26,28.487 -1.583,2.773 -3.584,4.752 -6.237,7.376 -5.84,5.78 -7.98,5.26 -11.433,9.92 C 8.883,-1.549 8.588,1.105 5.976,1.78 3.791,2.346 1.549,1.12 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path798" />
                            </g>
                            <g id="g800" transform="translate(84.73,512.9521)">
                                <path class="pulau_ku pulau_b cek_harta"
                                    d="m 0,0 c -0.611,-2.338 -1.228,-4.332 -1.754,-5.913 -2.761,-8.298 -4.71,-10.284 -5.067,-15.643 -0.234,-3.517 0.556,-3.398 0,-5.532 -1.216,-4.663 -5.311,-6.438 -9.549,-10.11 -1.708,-1.479 -4.126,-4.865 -8.964,-11.636 -10.233,-14.316 -15.35,-21.475 -18.709,-28.995 -3.769,-8.438 -3.129,-10.41 -6.821,-14.498 -5.931,-6.569 -10.615,-4.836 -14.421,-10.683 -4.172,-6.409 0.608,-9.795 -4.092,-19.076 -1.847,-3.646 -3.68,-5.285 -5.652,-10.683 -1.43,-3.913 -2.416,-6.736 -1.169,-9.346 1.548,-3.239 5.608,-4.209 9.549,-5.151 8.189,-1.957 14.977,0.01 16.76,0.573 3.981,1.255 8.579,2.705 11.692,6.675 4.142,5.284 1.08,9.192 3.508,26.516 0.947,6.756 2.045,10.674 4.677,14.498 2.53,3.675 3.957,3.602 7.211,7.059 7.418,7.879 4.23,12.745 11.693,23.272 1.843,2.601 5.056,7.047 10.718,10.873 4.83,3.264 6.395,2.666 9.354,5.341 4.835,4.373 5.668,10.503 6.626,17.551 1.19,8.751 -1.075,8.328 -0.779,21.174 0.196,8.494 1.246,13.149 -1.559,15.07 -2.017,1.38 -5.003,0.648 -7.211,-0.191"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path802" />
                            </g>
                            <g id="g804" transform="translate(147.6763,504.1777)">
                                <path class="pulau_ku pulau_b"
                                    d="m 0,0 c -1.965,-1.423 -2.23,-4.072 -2.339,-5.342 -0.344,-4.02 1.238,-7.222 2.534,-9.728 4.146,-8.017 5.367,-8.917 7.015,-12.4 1.327,-2.803 1.2,-3.625 3.703,-19.839 1.656,-10.721 2.156,-13.239 4.483,-14.498 3.2,-1.73 7.846,0.01 10.523,2.099 4.815,3.759 5.294,10.238 5.651,15.07 0.684,9.25 -2.381,11.63 0,18.504 0.638,1.841 1.733,5.001 4.678,7.63 3.152,2.815 5.064,2.018 6.82,4.388 1.496,2.017 1.083,5.569 0.195,12.59 C 42.326,5.885 41.526,6.859 40.73,7.439 39.211,8.545 36.774,8.382 31.96,8.012 28.376,7.736 26.581,7.645 24.36,7.058 18.267,5.448 18.803,3.176 13.642,2.099 12.182,1.794 8.215,1.156 3.703,0.954 2.522,0.9 1.206,0.873 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path806" />
                            </g>
                            <g id="g808" transform="translate(721.9873,704.0937)">
                                <path class="pulau_ku pulau_d"
                                    d="m 0,0 c -3.488,-0.463 -2.313,-8.904 -8.185,-16.787 -5.536,-7.433 -10.561,-5.273 -14.42,-11.827 -5.339,-9.065 -0.208,-20.81 0.389,-22.128 2.907,-6.416 5.739,-6.029 12.862,-15.642 7.109,-9.596 8.192,-15.251 10.133,-14.88 2.174,0.416 2.161,7.76 3.118,30.14 0.241,5.597 0.173,11.217 0.781,16.787 1.665,15.277 5.161,22.46 0.779,29.759 C 4.979,-3.784 2.509,0.333 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path810" />
                            </g>
                            <g id="g812" transform="translate(880.4902,686.6709)">
                                <path class="pulau_ku pulau_d"
                                    d="m 0,0 c -0.308,0.845 -2.529,6.681 -7.796,7.885 -1.092,0.249 -2.795,0.638 -3.897,-0.255 -1.782,-1.442 -0.008,-4.619 0.779,-11.954 0.586,-5.449 0.878,-8.174 0.52,-11.954 -0.286,-3.013 -0.824,-5.11 0.52,-6.613 1.484,-1.661 3.438,-0.553 5.196,-1.78 2.916,-2.036 0.807,-7.364 1.04,-17.041 0.262,-10.871 3.154,-13.658 4.158,-14.498 0.383,-0.322 3.268,-2.682 5.456,-1.781 2.483,1.023 2.674,5.673 2.858,11.7 0.231,7.588 -0.985,8.5 0,12.717 1.277,5.466 3.569,4.992 4.678,9.92 0.942,4.192 -0.704,4.589 -2.079,16.024 -0.712,5.918 -0.401,6.89 -1.559,9.411 C 8.383,5.024 6.965,5.378 4.157,9.919 1.974,13.451 2.188,16.696 0,17.295 c -0.181,0.05 -1.345,0.349 -2.079,-0.254 -1.369,-1.124 0.323,-4.1 0.388,-9.021 0.023,-1.779 -0.173,-3.242 -0.347,-4.212"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path814" />
                            </g>
                            <g id="g816" transform="translate(928.041,691.249)">
                                <path class="pulau_ku pulau_d"
                                    d="m 0,0 c -0.134,1.666 -0.349,2.018 -0.521,2.035 -0.746,0.074 -2.993,-5.993 -2.337,-12.463 0.484,-4.783 1.896,-4.244 2.598,-9.665 0.54,-4.18 -0.139,-6.314 1.299,-10.683 0.905,-2.75 1.736,-3.61 2.599,-4.069 1.915,-1.021 4.762,-0.478 6.496,1.017 3.197,2.76 1.286,7.635 3.637,8.648 1.97,0.849 4.976,-1.856 5.457,-2.289 3.62,-3.259 2.731,-6.778 5.457,-7.885 1.983,-0.806 4.757,0.122 5.976,1.78 1.607,2.189 0.255,5.312 -1.3,8.903 -1.157,2.672 -2.432,5.62 -5.715,7.884 -2.852,1.967 -4.331,0.539 -7.277,2.544 -1.056,0.719 -1.112,1.035 -4.677,5.596 -2.33,2.981 -3.606,4.608 -5.197,6.358 C 4.586,-0.187 2.886,1.362 1.818,2.29"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path818" />
                            </g>
                            <g id="g820" transform="translate(1010.4102,480.5234)">
                                <path class="pulau_ku pulau_c"
                                    d="m 0,0 c 0.459,0.659 -0.674,2.77 -2.534,3.815 -2.322,1.306 -4.936,0.479 -5.456,1.717 -0.174,0.412 0.073,0.606 0,0.953 -0.435,2.053 -10.157,0.711 -20.072,2.481 -3.314,0.591 -7.155,1.307 -11.499,3.624 -6.235,3.325 -9.905,8.026 -12.083,10.874 -5.837,7.633 -6.527,13.214 -8.574,12.971 -2.039,-0.242 -3.376,-6.016 -3.118,-10.682 0.213,-3.865 1.834,-7.018 5.066,-13.163 3.64,-6.919 5.526,-10.407 8.77,-11.827 1.76,-0.77 4.227,-0.641 9.159,-0.381 7.282,0.382 11.688,1.857 17.965,0.619 0.824,-0.162 1.672,-0.369 1.913,-0.429 4.668,-1.146 7.17,-1.761 9.55,-3.433 0.546,-0.385 1.586,-1.176 3.21,-1.69 1.021,-0.323 1.728,-0.548 2.246,-0.219 1.203,0.766 -0.259,3.478 0.975,4.58 C -3.234,0.924 -0.561,-0.804 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path822" />
                            </g>
                            <g id="g824" transform="translate(904.3955,344.8301)">
                                <path class="pulau_ku pulau_c"
                                    d="m 0,0 c -2.007,-2.394 0.666,-7.179 0.779,-7.376 0.673,-1.175 1.129,-1.971 2.078,-2.544 1.899,-1.145 3.974,-0.32 9.874,1.526 2.468,0.772 5.024,1.533 10.134,3.052 5.121,1.524 5.587,1.555 7.276,2.289 3.049,1.326 7.912,3.441 7.796,6.105 C 37.866,4.661 35.981,6.39 34.039,6.612 31.233,6.935 30.35,3.885 25.464,1.525 23.745,0.695 20.259,-0.988 16.369,-0.255 12.849,0.409 12.677,2.36 9.094,2.543 6.773,2.661 4.649,1.954 2.598,1.271 1.181,0.8 0.463,0.553 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path826" />
                            </g>
                            <g id="g836" transform="translate(1025.082,528.6465)">
                                <path class="pulau_ku pulau_d"
                                    d="m 0,0 c 7.699,-4.605 9.951,-8.613 10.516,-11.507 0.198,-1.02 0.233,-2.137 0.793,-4.365 1.29,-5.13 2.91,-6.395 2.182,-7.936 -0.694,-1.472 -2.509,-1.033 -7.341,-2.778 -3.145,-1.136 -6.749,-2.9 -6.546,-3.769 0.223,-0.961 4.866,0.204 5.952,-1.786 0.856,-1.571 -1.029,-4.147 -1.191,-4.365 -1.856,-2.483 -4.328,-2.419 -4.365,-3.57 -0.042,-1.327 3.205,-2.474 5.754,-3.373 2.608,-0.921 3.995,-1.41 5.754,-1.389 1.195,0.015 4.063,0.284 8.332,3.968 6.94,5.989 5.02,10.163 10.317,13.689 3.623,2.412 4.859,0.683 12.102,3.77 1.873,0.798 9.552,4.07 9.127,6.15 -0.5,2.447 -12.047,2.443 -18.451,1.985 -5.952,-0.426 -9.942,-1.421 -10.119,-0.794 -0.23,0.817 6.278,3.478 9.722,4.761 6.202,2.311 9.587,2.8 9.523,3.572 -0.089,1.077 -6.794,1.431 -9.722,1.587 -8.022,0.424 -8.669,-0.6 -11.507,0.594 C 16.647,-3.793 16.4,-0.867 12.103,0.396 9.469,1.172 1.666,0.423 0,0"
                                    style="fill:#acff4d;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path838" />
                            </g>
                        </g>

                        <g id="ini_pulau_sedang">
                            <g id="g840" transform="translate(33.6714,199.0889)">
                                <path class="pulau_ku pulau_b"
                                    d="m 0,0 c -2.944,-2.639 -7.164,-7.044 -10.523,-13.479 -3.115,-5.965 -6.148,-11.775 -4.288,-17.551 1.372,-4.258 4.013,-4.183 12.472,-12.971 4.907,-5.098 7.36,-7.646 8.965,-10.683 4.529,-8.571 0.816,-12.779 5.457,-21.747 1.24,-2.397 4.784,-9.247 9.354,-9.156 5.209,0.103 8.714,9.164 9.744,11.827 2.574,6.656 1.569,9.831 1.948,25.18 0.369,14.911 1.422,16.123 0,22.129 -0.923,3.904 -2.564,7.689 -5.846,15.261 -1.997,4.607 -2.969,6.34 -4.677,8.011 -3.801,3.717 -8.747,4.675 -11.693,4.96"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path842" />
                            </g>
                            <g id="g844" transform="translate(106.9463,454.4531)">
                                <path class="pulau_ku pulau_b"
                                    d="m 0,0 c -2.848,0.56 -5.373,-3.745 -12.473,-12.718 -7.661,-9.682 -7.016,-7.571 -11.952,-14.243 -6.387,-8.632 -10.052,-13.586 -12.472,-21.365 -3.041,-9.771 -1.908,-16.905 -1.56,-18.821 0.758,-4.16 1.551,-8.512 5.197,-11.701 4.107,-3.59 9.397,-3.577 15.591,-3.56 8.628,0.022 13.549,0.035 16.11,3.052 6.356,7.49 -11.221,22.434 -5.197,36.626 3.745,8.823 12.687,8.105 14.551,17.804 1.089,5.663 -0.933,11.252 -3.118,17.295 C 3.008,-3.016 2.023,-0.398 0,0"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path846" />
                            </g>
                            <g id="g848" transform="translate(120.458,532.792)">
                                <path class="pulau_ku pulau_e pulau_b"
                                    d="m 0,0 c -5.908,-7.243 -6.878,-12.993 -6.756,-16.787 0.319,-9.917 8.313,-13.137 8.835,-25.435 0.271,-6.39 -1.631,-11.571 0,-12.209 1.25,-0.489 3.782,2.004 5.196,4.578 3.72,6.768 -1.562,11.759 -0.519,20.348 0.395,3.255 1.256,3.383 11.432,18.822 5.41,8.206 8.631,13.427 11.434,18.313 4.99,8.701 9.247,16.123 7.795,17.295 -0.819,0.661 -3.761,-0.416 -14.032,-9.665"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path850" />
                            </g>
                            <g id="g852" transform="translate(58.0962,358.3096)">
                                <path class="pulau_ku pulau_b"
                                    d="m 0,0 c -1.51,1.535 -4.861,-1.301 -18.189,-5.595 -10.999,-3.545 -14.007,-3.317 -16.11,-6.613 -1.718,-2.694 -0.176,-3.578 -0.519,-15.261 -0.222,-7.533 -0.945,-9.964 1.039,-12.209 2.027,-2.293 5.788,-3.156 8.835,-2.543 5.483,1.104 7.444,6.749 14.031,19.33 C -2.334,-6.505 1.801,-1.83 0,0"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path854" />
                            </g>
                            <g id="g856" transform="translate(114.8062,365.5586)">
                                <path class="pulau_ku pulau_b"
                                    d="m 0,0 c 0.442,1.584 1.205,2.146 0.975,2.417 -0.758,0.89 -9.609,-4.358 -17.15,-12.209 -3.426,-3.566 -6.606,-6.972 -5.716,-10.683 0.816,-3.408 4.774,-5.862 8.314,-6.104 6.7,-0.458 11.039,7.064 11.953,8.648 1.272,2.204 3.873,6.713 2.599,11.191 C 0.467,-4.958 -0.772,-2.766 0,0"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path858" />
                            </g>
                            <g id="g860" transform="translate(182.2998,227.0674)">
                                <path class="pulau_ku pulau_b cek_harta"
                                    d="m 0,0 c -3.496,-2.857 -0.489,-9.514 0,-18.312 0.565,-10.173 -2.979,-9.83 -5.716,-26.453 -1.624,-9.859 0.358,-5.517 -1.04,-30.521 -0.389,-6.965 -0.852,-12.844 3.118,-17.296 2.001,-2.244 5.526,-4.571 7.795,-3.561 2.635,1.172 1.098,5.735 3.118,11.191 2.434,6.573 7.155,6.679 15.591,14.753 6.274,6.004 9.647,11.673 12.992,17.295 5.127,8.617 7.721,12.977 7.275,18.822 -0.392,5.141 -2.905,8.404 -7.795,14.752 C 31.135,-13.874 22.031,-2.374 7.795,0.509 2.382,1.604 0.678,0.554 0,0"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path862" />
                            </g>
                            <g id="g864" transform="translate(644.8154,307.4404)">
                                <path class="pulau_ku pulau_a"
                                    d="m 0,0 c 0.084,-1.948 -8.423,-2.967 -26.504,-8.647 -16.832,-5.289 -16.341,-6.566 -24.425,-8.648 -16.446,-4.235 -19.136,0.885 -48.85,0.509 -18.968,-0.241 -40.015,-2.544 -40.015,-2.544 -12.98,-1.42 -22.44,-3.048 -22.866,-1.526 -0.366,1.308 6.017,4.687 12.472,6.613 16.691,4.978 30.05,-0.898 32.22,3.56 0.233,0.478 0.442,1.29 -2.078,6.614 -5.285,11.162 -9.146,13.802 -8.315,15.769 1.591,3.771 17.86,-1.007 38.456,-3.56 C -70.251,5.702 -68.953,8.055 -35.858,5.596 -18.891,4.335 -0.125,2.882 0,0"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path866" />
                            </g>
                            <g id="g868" transform="translate(783.5693,734.9966)">
                                <path class="pulau_ku pulau_d"
                                    d="m 0,0 v 0 c -0.208,-8.307 -2.77,-13.469 -5.456,-16.787 -3.425,-4.227 -6.254,-4.471 -11.693,-9.538 -5.583,-5.2 -8.515,-10.45 -10.524,-14.116 -2.03,-3.706 -6.665,-12.377 -7.405,-24.036 -0.098,-1.537 -0.016,-1.361 2.339,-22.127 1.281,-11.308 1.923,-16.988 1.948,-18.313 0.106,-5.481 1.338,-10.927 1.17,-16.406 -0.051,-1.644 -0.171,-3.806 0.779,-4.197 1.344,-0.552 4.065,2.757 7.016,6.868 6.237,8.691 9.746,13.58 12.862,21.746 0,0 5.15,13.498 4.953,28.987 0,0.005 -10e-4,0.024 -10e-4,0.026 -0.071,5.529 -0.761,7.818 -0.665,9.521 0.199,3.516 3.715,3.851 7.016,8.393 2.559,3.522 3.006,7.308 3.897,14.879 0.853,7.239 0.4,12.89 0,17.55 -0.472,5.518 -1.27,10.09 -1.948,13.354"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path870" />
                            </g>
                            <g id="g872" transform="translate(793.7031,739.1934)">
                                <path class="pulau_ku pulau_d"
                                    d="m 0,0 c -1.907,-2.365 5.016,-7.979 12.083,-22.128 4.324,-8.657 3.188,-9.468 8.574,-20.221 2.779,-5.544 2.904,-4.974 8.965,-16.024 7.316,-13.336 7.018,-13.953 9.355,-16.023 6.497,-5.757 10.258,-2.272 19.877,-8.394 8.377,-5.331 10.858,-11.37 14.811,-10.301 2.462,0.666 4.306,3.766 4.287,6.486 -0.03,4.496 -5.149,7.841 -14.421,13.735 -7.224,4.592 -9.795,5.152 -12.862,9.157 -2.677,3.494 -3.662,6.912 -4.287,9.156 -1.518,5.449 -1.032,9.938 0,18.694 0.71,6.025 1.09,9.062 2.338,10.301 3.745,3.718 8.557,-0.645 22.217,0 11.275,0.533 15.813,3.876 23.385,0.763 1.825,-0.75 3.868,-1.892 4.677,-1.144 1.315,1.217 -1.178,6.932 -5.066,10.682 -2.357,2.272 -5.756,4.337 -17.15,6.486 -7.454,1.406 -12.01,2.266 -18.709,2.289 -18.268,0.065 -23.482,-6.187 -33.13,-1.907 -3.693,1.639 -4.467,3.238 -10.523,5.723 C 11.113,-1.313 1.967,2.439 0,0"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path874" />
                            </g>
                            <g id="g876" transform="translate(940.6426,707.146)">
                                <path class="pulau_ku pulau_d cek_harta"
                                    d="m 0,0 c -3.507,-0.715 -4.979,4.981 -10.913,8.394 -3.975,2.285 -5.303,0.873 -19.878,3.433 -7.485,1.315 -8.616,1.947 -9.354,3.052 -2.209,3.309 1.748,6.896 3.507,16.406 1.292,6.975 0.573,12.657 0,17.168 -0.862,6.806 -2.544,11.743 -3.897,15.642 -1.605,4.625 -3.98,11.328 -8.964,18.695 -4.201,6.208 -5.201,5.418 -11.304,13.353 -5.404,7.028 -4.845,7.941 -11.302,17.168 -5.223,7.464 -8.544,12.209 -14.032,17.168 -8.39,7.584 4.349,-2.416 24.165,-16.405 3.497,-2.468 8.791,-6.278 13.252,-12.971 4.654,-6.983 2.855,-8.782 6.626,-13.735 6.51,-8.548 13.533,-5.374 24.165,-14.498 7.061,-6.058 10.451,-13.026 11.693,-15.642 3.65,-7.693 4.504,-14.804 4.677,-16.406 0.557,-5.126 -0.145,-6.318 0.78,-11.826 0.661,-3.942 1.12,-3.927 3.118,-11.828 C 4.574,8.326 4.767,5.273 3.118,2.67 2.591,1.838 1.639,0.334 0,0"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path878" />
                            </g>
                            <g id="g880" transform="translate(897.7695,701.8047)">
                                <path class="pulau_ku pulau_d"
                                    d="m 0,0 c -0.928,-0.352 -0.35,-3.196 0.39,-9.919 1.148,-10.458 0.541,-10.784 1.558,-15.261 0.64,-2.812 0.652,-1.681 4.287,-11.827 4.001,-11.162 4.553,-14.109 3.899,-17.55 -0.699,-3.679 -2.312,-5.48 -1.56,-6.105 1.292,-1.073 8.17,2.484 10.913,8.394 2.061,4.438 0.345,7.095 0,15.642 -0.217,5.411 0.375,9.712 1.56,18.313 1.892,13.744 4.372,19.345 1.558,21.365 C 20.742,4.391 17.513,3.468 15.59,2.289 8.571,-2.017 9.951,-15.281 8.574,-15.261 7.745,-15.249 7.907,-10.448 4.677,-4.96 3.448,-2.872 1.083,0.412 0,0"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path882" />
                            </g>
                            <g id="g884" transform="translate(622.9883,879.9741)">
                                <path class="pulau_ku pulau_d"
                                    d="m 0,0 c -6.754,0.06 -8,-1.44 -19.488,-3.815 -11.965,-2.474 -15.634,-1.884 -21.047,-5.723 -2.049,-1.454 -4.843,-3.493 -5.067,-6.486 -0.243,-3.248 2.648,-6.224 6.237,-9.919 2.159,-2.224 3.239,-3.336 4.287,-3.815 4.952,-2.266 8.572,2.267 18.318,3.815 7.739,1.229 8.364,-1.167 13.642,0.763 4.52,1.653 4.077,3.415 12.083,8.775 3.064,2.051 6.794,4.515 12.082,6.486 5.373,2.001 5.521,0.949 10.134,2.67 2.048,0.764 3.644,1.578 15.59,9.919 4.515,3.153 6.809,4.757 8.575,6.105 6.212,4.739 6.47,5.786 10.914,9.157 8.148,6.182 14.037,7.898 13.641,9.156 -0.463,1.473 -8.849,0.145 -9.744,0 C 62.443,25.837 55.618,23.238 39.756,14.879 33.922,11.805 27.88,9.09 22.217,5.723 18.223,3.349 14.404,0.859 8.575,0 5.116,-0.51 3.745,-0.033 0,0"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path886" />
                            </g>
                            <g id="g888" transform="translate(564.5244,864.332)">
                                <path class="pulau_ku pulau_e"
                                    d="m 0,0 c -9.94,2.76 -19.316,-0.876 -23.775,-2.671 -6.923,-2.787 -6.17,-4.205 -10.913,-5.341 -8.075,-1.933 -10.724,2.066 -21.437,2.671 -12.577,0.709 -16.691,0.322 -17.442,2.128 -0.353,0.849 -3.505,-1.684 -2.046,-1.747 3.425,-0.147 7.083,-11.082 4.287,-13.353 -1.44,-1.17 -3.409,0.917 -9.354,2.289 -8.175,1.886 -9.103,-0.989 -19.488,0.381 -4.695,0.62 -7.511,1.604 -8.965,0 -1.161,-1.28 -1.002,-3.712 0,-5.341 1.413,-2.294 3.924,-2.05 10.134,-3.815 8.094,-2.3 11.031,-4.761 12.082,-5.723 1.561,-1.427 4.062,-3.715 3.508,-5.723 -0.725,-2.628 -5.711,-1.228 -10.913,-4.959 -4.575,-3.283 -6.248,-8.335 -7.406,-11.827 -1.038,-3.136 -1.557,-4.704 -0.779,-5.723 2.575,-3.371 15.69,2.268 18.319,3.434 13.901,6.165 13.19,10.843 23.775,14.879 10.689,4.075 12.04,-0.457 24.945,4.196 8.574,3.093 8.758,5.374 19.877,9.157 4.814,1.637 9.566,3.452 14.422,4.96 6.257,1.942 8.731,2.442 10.523,4.96 2.21,3.105 2.25,7.691 0.39,11.064 C 7.532,-2.092 3.241,-0.9 0,0"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path890" />
                            </g>
                            <g id="g892" transform="translate(389.522,755.9805)">
                                <path class="pulau_ku pulau_e"
                                    d="m 0,0 c -4.821,-3.129 -4.677,-6.891 -8.575,-12.208 -1.853,-2.53 -5.393,-5.121 -12.472,-10.302 -9.604,-7.029 -11.047,-6.746 -12.862,-9.919 -2.664,-4.659 -0.399,-6.745 -1.949,-16.024 -0.547,-3.275 -1.695,-10.146 -5.846,-16.787 -5.994,-9.588 -11.901,-8.542 -13.252,-15.26 -1.139,-5.665 2.686,-8.266 1.169,-16.406 -0.934,-5.017 -2.97,-7.158 -2.338,-7.631 1.71,-1.277 16.966,14.157 30.011,31.667 5.047,6.773 7.57,10.16 10.524,15.642 5.322,9.876 7.874,18.8 11.693,32.429 1.745,6.23 1.123,9.899 3.897,15.261 C 3.354,-3.056 7.994,0.67 7.016,1.907 6.268,2.854 2.706,1.756 0,0"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path894" />
                            </g>
                            <g id="g896" transform="translate(345.0894,635.4204)">
                                <path class="pulau_ku pulau_e pulau_a"
                                    d="m 0,0 c -0.483,0.283 -4.843,2.743 -9.354,0.763 -2.676,-1.175 -5.666,-4.026 -5.067,-6.104 0.831,-2.884 7.719,-1.332 10.524,-5.723 1.589,-2.489 0.944,-5.442 0.779,-6.104 -0.928,-3.722 -4.171,-5.167 -10.913,-9.92 -6.498,-4.581 -10.14,-7.148 -9.744,-8.012 0.709,-1.545 15.433,-0.025 26.114,9.157 5.779,4.967 5.483,7.973 14.031,14.879 3.448,2.785 6.76,4.932 6.236,6.486 -0.865,2.566 -11.276,0.786 -11.692,2.67 -0.276,1.244 4.245,2.095 7.794,6.105 3.638,4.109 5.257,10.408 3.508,11.826 C 20.891,17.099 16.84,16.005 4.677,6.104"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path898" />
                            </g>
                            <g id="g900" transform="translate(573.8789,795.2769)">
                                <path class="pulau_ku pulau_a"
                                    d="m 0,0 c -4.7,-0.037 -8.829,-6.009 -10.134,-10.683 -1.3,-4.656 0.515,-6.91 -1.559,-11.827 -1.214,-2.877 -2.904,-4.637 -4.677,-6.486 -1.77,-1.843 -6.669,-6.83 -14.421,-9.156 -9.474,-2.842 -13.751,1.126 -17.929,-2.671 -3.52,-3.197 -3.51,-8.761 -3.508,-10.301 0.007,-4.08 1.57,-5.295 2.728,-11.445 0.562,-2.978 0.634,-5.038 0.78,-9.157 0.338,-9.578 -0.907,-10.654 -0.39,-17.931 0.417,-5.859 0.64,-9.002 2.728,-12.59 2.048,-3.518 3.523,-3.399 8.185,-9.157 4.107,-5.072 3.546,-5.885 6.236,-8.393 3.934,-3.668 5.917,-2.661 12.083,-6.104 8.841,-4.937 7.543,-8.559 14.421,-10.683 1.251,-0.386 0.226,0.063 12.473,-1.526 3.928,-0.51 5.018,-0.684 6.236,0 2.935,1.649 3.009,6.26 3.118,12.972 0.08,4.965 0.113,10.279 -2.339,16.786 -1.213,3.219 -2.555,5.435 -3.897,7.631 -4.217,6.898 -6.404,7.033 -10.913,13.353 -5.181,7.26 -6.186,12.457 -8.575,12.209 -1.283,-0.134 -1.85,-1.719 -3.508,-4.578 -4.385,-7.559 -5.45,-9.242 -7.406,-9.92 -2.305,-0.799 -4.669,0.354 -6.236,1.144 -9.378,4.731 -16.72,19.842 -11.693,26.707 1.387,1.893 2.122,0.985 19.098,5.723 5.67,1.582 7.836,2.311 10.913,1.526 3.995,-1.019 4.865,-3.398 9.745,-4.578 2.144,-0.519 6.287,-1.521 8.575,0.381 2.862,2.38 -0.039,6.927 0,16.405 0.035,8.775 2.542,9.638 2.338,19.458 -0.084,4.07 -0.192,7.616 -1.949,11.827 C 9.764,-9.243 5.888,0.046 0,0"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path902" />
                            </g>
                            <g id="g904" transform="translate(516.5977,949.3066)">
                                <path class="pulau_ku pulau_e"
                                    d="m 0,0 c -8.804,-2.873 -7.734,-14.497 -16.63,-25.435 -8.752,-10.761 -20.393,-12.55 -19.748,-14.243 0.793,-2.076 16.384,5.677 40.016,6.613 15.372,0.609 22.731,-2.119 38.975,1.526 11.425,2.563 15.581,5.662 18.19,8.648 5.622,6.437 8.624,17.594 3.637,24.417 C 59.071,8.873 46.774,8 41.574,7.63 27.826,6.654 23.298,-0.365 7.795,0 3.083,0.111 2.407,0.786 0,0"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path906" />
                            </g>
                            <g id="g908" transform="translate(593.8867,647.7559)">
                                <path class="pulau_ku pulau_a cek_harta"
                                    d="m 0,0 c -1.479,0.319 -3.625,0.624 -6.187,0.426 -1.5,-0.116 -7.198,-0.557 -11.483,-4.495 -4.337,-3.987 -4.903,-9.425 -5.196,-12.209 -0.785,-7.457 2.72,-9.22 2.598,-18.822 -0.072,-5.719 -1.356,-8.337 0,-9.156 1.933,-1.167 5.773,3.406 14.551,9.156 2.067,1.354 14.91,9.767 17.669,7.122 1.614,-1.547 -1.892,-5.279 0,-8.139 1.912,-2.889 6.672,-0.864 15.071,-3.052 3.745,-0.976 7.644,-1.991 10.914,-5.087 1.728,-1.637 2.3,-2.928 7.275,-14.752 2.916,-6.931 3.307,-7.883 4.677,-9.157 3.354,-3.116 7.362,-3.312 12.472,-4.069 6.896,-1.022 13.504,-3.422 20.268,-5.087 13.545,-3.335 20.317,-5.002 27.023,-8.139 9.248,-4.327 14.235,-5.869 16.11,-10.174 2.337,-5.363 -1.601,-8.232 -1.039,-17.804 0.314,-5.355 2.242,-16.327 7.795,-17.804 5.367,-1.429 11.884,6.604 17.669,13.734 4.631,5.708 6.947,8.562 7.795,13.226 1.485,8.157 -2.699,15.239 -5.716,20.348 -2.79,4.724 -3.019,3.292 -9.874,12.717 -5.279,7.258 -7.918,10.887 -9.874,14.244 -3.639,6.247 -4.633,9.478 -7.795,10.173 -3.237,0.712 -4.557,-2.153 -8.315,-2.034 -4.09,0.129 -6.79,3.659 -11.953,10.173 -8.099,10.22 -12.176,15.349 -13.512,16.279 -4.86,3.384 -11.381,3.613 -24.424,4.069 -17.663,0.618 -20.795,-1.905 -28.063,1.526 -4.774,2.254 -4.81,3.998 -13.512,10.174 -6.476,4.596 -12.227,7.726 -16.11,9.665"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path910" />
                            </g>
                            <g id="g912" transform="translate(881.2695,331.0947)">
                                <path class="pulau_ku pulau_c"
                                    d="m 0,0 c -1.589,-1.392 0.818,-4.825 3.118,-13.734 1.153,-4.467 1.318,-6.586 2.599,-6.868 1.881,-0.414 2.874,3.863 7.275,5.341 2.324,0.782 4.419,0.385 7.795,-0.254 4.229,-0.8 6.692,-2.452 6.602,-2.484 -3.574,-1.28 3.017,-0.833 2.984,-0.19 -0.048,0.912 0.66,1.812 3.147,4.455 2.523,2.681 2.721,8.162 0.259,10.427 -1.127,1.037 -2.243,0.88 -11.953,0.509 -7.404,-0.282 -7.92,-0.235 -8.834,0 C 10.037,-2.034 8.44,-0.718 4.157,0 1.831,0.391 0.654,0.573 0,0"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path914" />
                            </g>
                            <g id="g916" transform="translate(952.7256,351.6973)">
                                <path class="pulau_ku pulau_c"
                                    d="m 0,0 c -6.342,-2.828 -9.333,-6.214 -10.394,-9.665 -0.934,-3.041 0.221,-4.21 -1.04,-6.868 -2.265,-4.779 -7.188,-3.506 -11.692,-8.393 -2.762,-2.997 -0.646,-3.188 -5.196,-11.955 -1.547,-2.978 -3.458,-6.169 -4.678,-11.19 -0.916,-3.776 -0.521,-4.796 0,-5.342 1.676,-1.751 6.422,-0.434 9.614,1.526 4.496,2.761 3.669,5.422 8.315,9.665 2.301,2.102 2.541,1.483 10.914,6.359 6.06,3.53 9.117,5.332 10.393,7.122 0.881,1.236 1.168,2.086 2.858,13.734 1.259,8.675 1.543,11.26 -0.26,13.481 -1.387,1.71 -3.397,2.447 -4.937,2.797"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path918" />
                            </g>
                            <g id="g920" transform="translate(958.7021,470.2227)">
                                <path class="pulau_ku pulau_c"
                                    d="m 0,0 c 2.793,-2.398 2.211,-3.852 4.677,-6.867 1.542,-1.887 1.894,-1.472 7.535,-5.596 4.696,-3.434 7.059,-5.185 7.795,-6.868 1.007,-2.301 0.313,-3.375 1.819,-8.393 0.603,-2.008 1.235,-4.112 1.82,-4.07 1.479,0.107 1.24,13.87 2.857,13.989 1.065,0.079 0.978,-5.899 4.678,-7.63 2.7,-1.264 6.597,0.122 8.834,2.289 3.262,3.163 1.144,6.199 3.637,8.648 2.542,2.496 6.287,0.858 22.347,-0.254 4.175,-0.29 6.77,-0.376 9.874,0.763 4.433,1.627 8.731,5.322 8.055,7.122 -0.697,1.852 -6.71,1.345 -18.708,0.254 -14.306,-1.301 -17.801,-2.714 -21.568,0 -2.951,2.127 -2.918,4.516 -7.795,7.884 C 34.872,1.952 32.248,3.665 28.582,4.832 21.268,7.16 19.293,4.295 10.913,5.596 3.631,6.726 0.036,9.679 -2.339,7.63 -3.428,6.691 -3.983,4.939 -3.638,3.561 -3.239,1.965 -1.806,1.55 0,0"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path922" />
                            </g>
                            <g id="g924" transform="translate(953.5049,228.7207)">
                                <path class="pulau_ku pulau_c"
                                    d="m 0,0 c -6.324,1.382 -10.49,0.251 -12.862,-0.763 -1.323,-0.566 -2.909,-1.447 -10.913,-9.157 -7.305,-7.037 -6.958,-7.242 -8.575,-8.012 -7.051,-3.356 -12.203,1.241 -16.37,-2.289 -1.124,-0.951 -1.788,-4.067 -3.118,-10.3 -1.722,-8.072 -1.755,-11.906 -0.39,-15.643 0.539,-1.474 1.227,-3.358 2.338,-3.434 1.969,-0.132 3.1,5.553 7.016,12.59 2.852,5.123 4.475,8.039 7.406,10.302 7.86,6.065 16.055,0.426 24.945,5.723 2.823,1.681 6.371,4.856 8.964,11.445"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path926" />
                            </g>
                            <g id="g928" transform="translate(785.9082,136.0117)">
                                <path class="pulau_ku pulau_c"
                                    d="m 0,0 c -2.624,1.379 -7.184,-0.622 -9.614,-3.562 -2.299,-2.779 -2.326,-5.952 -2.339,-7.376 -0.016,-1.787 -0.042,-4.876 2.079,-6.867 0.464,-0.435 1.327,-1.095 7.016,-1.78 8.174,-0.983 10.173,-0.073 11.172,0.509 1.518,0.884 2.357,1.962 2.599,2.289 2.424,3.267 1.491,7.236 1.039,9.156 -0.405,1.726 -0.763,3.247 -1.818,3.561 C 8.521,-3.59 6.934,-6.419 5.196,-5.851 4.483,-5.616 4.414,-5.029 3.378,-3.562 2.724,-2.635 1.373,-0.722 0,0"
                                    style="fill:#28ae28;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path930" />
                            </g>
                        </g>

                        <g id="ini_pulau_besar">
                            <g id="g932" transform="translate(308.0625,786.502)">
                                <path class="pulau_ku p_besar pulau_e cek_harta"
                                    d="m 0,0 c -4.532,4.967 -13.624,5.692 -19.878,2.67 -2.997,-1.447 -1.391,-1.545 -7.405,-6.485 -4.615,-3.791 -6.486,-4.46 -13.642,-9.538 -0.575,-0.408 -3.916,-2.784 -8.185,-6.105 -6.224,-4.842 -7.317,-6.167 -8.185,-7.63 -1.528,-2.576 -0.992,-3.272 -3.118,-7.63 -1.695,-3.475 -2.543,-5.213 -3.898,-6.486 -4.173,-3.924 -8.685,-0.944 -15.98,-4.197 -2.466,-1.1 -2.662,-1.758 -8.574,-6.486 -7.749,-6.196 -8.731,-8.259 -12.863,-9.538 -4.251,-1.316 -4.782,0.264 -8.574,-1.144 -3.645,-1.354 -4.501,-3.313 -10.913,-10.301 -5.237,-5.707 -7.856,-8.561 -10.524,-10.683 -4.545,-3.614 -7.222,-4.594 -8.575,-8.012 -1.351,-3.413 1.576,-5.786 0,-8.012 -1.47,-2.076 -4.244,-1.018 -7.405,-2.67 -3.732,-1.951 -4.975,-6.095 -6.237,-10.301 -1.186,-3.956 -0.791,-9.378 0,-20.221 0.243,-3.316 0.378,-4.281 1.17,-5.341 3.477,-4.657 13.445,-2.88 16.76,-2.289 2.947,0.525 4.449,0.81 5.846,1.907 4.35,3.417 -0.737,12.096 2.728,14.498 1.256,0.871 1.938,-0.145 4.678,0.382 3.886,0.747 6.264,3.512 10.133,8.011 2.272,2.642 4.269,5.004 5.847,8.775 1.822,4.358 0.363,4.674 1.948,7.631 1.951,3.638 4.196,3.465 10.134,9.538 2.266,2.317 1.839,2.24 3.508,3.815 3.912,3.692 5.93,3.806 10.523,6.867 6.473,4.313 7.408,7.38 13.252,9.157 2.929,0.89 4.089,0.545 4.678,0 1.256,-1.164 0.82,-4.089 -0.39,-6.104 -2.525,-4.204 -7.353,-2.685 -13.642,-7.249 -2.237,-1.624 -3.469,-3.154 -5.846,-6.104 -0.909,-1.128 -3.339,-4.244 -7.406,-12.209 -4.215,-8.255 -3.513,-8.647 -5.846,-11.827 -3.255,-4.438 -5.557,-4.952 -9.744,-8.775 -3.824,-3.491 -3.448,-4.472 -11.693,-17.168 -10.057,-15.488 -11.156,-14.859 -12.472,-19.84 -1.199,-4.536 -1.106,-8.158 -4.288,-12.971 -1.693,-2.561 -2.932,-3.372 -6.236,-6.868 -5.606,-5.933 -8.554,-10.315 -9.354,-11.445 -3.935,-5.558 -6.949,-9.816 -5.846,-11.064 1.395,-1.579 9.31,1.737 15.2,6.867 7.977,6.948 11.344,16.441 12.473,20.221 2.127,7.124 1.151,10.18 4.677,14.879 2.273,3.029 4.767,4.54 9.354,7.249 16.97,10.019 16.592,9.267 19.098,11.064 10.902,7.817 6.717,13.937 20.268,28.232 7.063,7.451 8.298,5.892 14.031,12.972 6.298,7.778 7.226,12.647 14.032,16.787 5.073,3.086 7.028,1.882 10.913,4.578 6.42,4.456 3.344,10.685 8.964,20.22 3.126,5.303 3.772,3.245 10.914,12.209 4.371,5.488 6.942,9.891 12.082,18.695 2.774,4.751 4.614,8.234 5.846,12.971 1.264,4.858 1.088,7.963 0,10.683 C 2.09,-3.195 1.417,-1.554 0,0"
                                    style="fill:#557222;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path934" />
                            </g>
                            <g id="g936" transform="translate(433.9546,687.6885)">
                                <path class="pulau_ku p_besar pulau_a cek_harta"
                                    d="m 0,0 c -2.244,0.157 -5.918,-9.004 -7.405,-14.879 -1.073,-4.237 -1.135,-7.263 -3.898,-9.92 -2.143,-2.06 -3.739,-1.81 -7.015,-3.815 -4.086,-2.5 -6.27,-5.745 -7.796,-8.012 -2.548,-3.787 -2.736,-6.05 -5.846,-19.839 -1.694,-7.511 -2.561,-11.331 -3.508,-14.498 -2.49,-8.324 -3.971,-9.964 -5.846,-15.642 -1.076,-3.258 -4.482,-13.949 -2.728,-27.088 0.879,-6.592 2.455,-18.391 10.523,-22.891 1.994,-1.112 3.144,-1.087 4.677,-2.671 3.458,-3.574 2.527,-8.796 1.949,-17.55 -0.933,-14.131 -0.881,-14.913 -0.39,-17.549 0.961,-5.159 2.346,-6.615 1.559,-9.92 -1.119,-4.703 -4.817,-5.513 -8.185,-9.919 -1.725,-2.258 -2.339,-4.119 -4.287,-19.839 -2.177,-17.56 -2.019,-20.149 0,-22.51 2.933,-3.431 6.245,-1.664 12.082,-4.197 10.112,-4.387 14.316,-15.57 17.929,-25.18 4.894,-13.017 1.649,-14.238 7.406,-29.759 1.744,-4.703 4.777,-11.964 10.913,-19.457 3.095,-3.78 8.791,-10.736 11.693,-9.538 3.146,1.299 0.308,11.069 -1.169,28.995 0,0 -1.604,19.46 1.948,45.02 1.125,8.092 2.509,14.698 7.795,20.221 4.164,4.348 8.962,6.158 12.863,7.629 9.512,3.589 14.325,2.046 26.893,4.198 7.777,1.331 9.906,2.601 17.539,4.578 5.778,1.496 21.82,5.355 38.976,4.578 22.208,-1.007 36.137,-9.444 38.586,-5.342 1.296,2.171 -1.731,5.992 -2.728,7.249 -4.664,5.886 -11.954,4.128 -23.385,6.486 -4.836,0.998 -11.669,3.972 -25.335,9.919 -16.344,7.115 -18.686,8.116 -21.047,9.92 -3.117,2.382 -2.216,2.271 -13.641,12.972 -7.226,6.768 -8.139,7.329 -10.134,9.919 -0.971,1.261 -5.184,6.877 -7.796,16.024 -2.603,9.122 -1.79,15.366 -1.559,24.417 0.753,29.454 -6.034,34.904 0,46.927 4.676,9.315 10.74,6.213 14.811,15.261 4.667,10.371 -1.479,15.99 1.949,33.192 1.364,6.843 2.264,5.593 5.067,16.787 2.297,9.174 3.992,15.942 3.898,24.417 -0.14,12.606 -4.196,25.329 -6.626,25.181 -1.464,-0.09 -2.304,-4.847 -2.729,-7.249 -1.254,-7.101 0.559,-10.375 0,-16.024 -0.378,-3.828 -1.814,-6.621 -4.677,-12.208 -4.83,-9.428 -10.455,-15.686 -15.98,-21.748 -5.093,-5.587 -6.035,-5.62 -13.252,-12.971 -3.68,-3.75 -7.386,-7.475 -11.084,-11.208 -0.274,-0.276 -0.979,-0.986 -1.611,-2.112 0,0 -0.311,-0.555 -0.557,-1.178 -0.724,-1.838 -2.272,-9.388 -0.779,-9.919 2.063,-0.734 6.578,13.121 12.083,12.59 2.393,-0.231 3.897,-3.077 4.287,-3.815 3.277,-6.203 -1.315,-12.836 -4.677,-22.891 -3.133,-9.37 -0.575,-7.884 -4.288,-26.706 -3.051,-15.475 -4.704,-16.092 -6.626,-27.088 -1.786,-10.226 -0.474,-10.362 -1.558,-31.666 -1.253,-24.608 -1.88,-36.911 -5.847,-43.113 -1.676,-2.62 -5.671,-8.024 -6.626,-16.023 -0.315,-2.642 0.057,-2.581 0,-9.538 -0.079,-9.624 -0.155,-14.498 -1.949,-17.55 -2.408,-4.099 -4.386,-2.85 -8.185,-8.394 -3.036,-4.431 -3.742,-8.106 -5.456,-8.011 -1.375,0.075 -1.543,2.471 -4.678,5.341 -1.815,1.663 -2.944,1.943 -3.897,2.67 -4.691,3.581 -0.711,14.612 0.39,27.088 0.396,4.488 -0.158,2.625 -0.39,17.55 -0.297,19.11 -0.446,28.663 0.779,40.822 0.87,8.63 0.712,17.358 1.95,25.944 0.67,4.656 1.791,11.104 -1.95,14.88 -2.047,2.066 -4.132,1.9 -5.846,4.578 -1.253,1.957 -0.84,3.141 -1.169,9.537 -0.401,7.786 -1.128,8.284 -0.39,11.065 0.574,2.163 1.141,2.338 4.288,7.63 3.131,5.268 4.697,7.901 5.846,11.064 1.726,4.752 0.918,5.762 2.728,12.209 1.388,4.941 2.961,8.26 3.508,9.538 C 6.402,-38.987 4.541,-0.317 0,0"
                                    style="fill:#557222;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path938" />
                            </g>
                            <g id="g940" transform="translate(597.2646,786.8833)">
                                <path class="pulau_ku p_besar pulau_d"
                                    d="m 0,0 c 1.581,-5.851 1.721,-10.542 1.559,-13.734 -0.234,-4.6 -1.13,-6.83 -0.39,-11.446 0.269,-1.678 1.365,-8.51 4.677,-9.156 0.844,-0.165 1.835,0.072 4.677,2.289 4.924,3.839 7.387,5.759 8.575,8.775 2.466,6.261 -3.236,9.33 -0.78,15.642 1.403,3.606 3.359,2.849 6.237,8.393 1.828,3.524 2.577,6.792 3.118,9.156 1.38,6.031 0.296,6.594 1.169,8.394 3.833,7.899 25.13,-1.257 39.756,9.538 1.065,0.786 0.179,0.265 8.964,9.538 5.605,5.917 9.14,10.336 15.201,15.642 3.676,3.219 5.552,4.84 7.405,5.342 4.335,1.174 8.918,-0.337 17.149,-3.053 0.682,-0.224 3.357,-1.117 7.016,-1.907 3.27,-0.706 4.904,-1.059 5.847,-0.763 3.53,1.109 2.929,5.602 7.405,9.156 0.548,0.435 2.836,2.213 5.847,2.671 5.562,0.846 8.824,-3.536 15.2,-6.486 6.641,-3.073 7.649,-0.422 17.929,-2.671 5.031,-1.1 11.737,-4.309 24.945,-10.682 8.806,-4.249 9.113,-4.643 16.37,-8.012 9.231,-4.287 13.847,-6.43 17.929,-7.63 9.993,-2.94 12.161,-1.317 19.097,-4.96 0,0 0.841,-0.442 10.134,-6.104 -0.898,0.433 -1.934,1.089 -1.948,1.907 -0.027,1.632 4.042,2.22 4.287,4.197 0.151,1.224 -1.251,2.277 -2.729,3.433 -2.806,2.197 -5.234,4.86 -8.184,6.868 0,0 -4.907,3.339 -11.304,8.775 -7.721,6.562 -6.283,7.546 -12.471,12.208 -5.097,3.84 -6.37,3.396 -12.083,8.013 -3.683,2.975 -3.946,3.799 -7.795,6.867 -1.152,0.917 -6.332,5.047 -10.913,7.249 -6.985,3.357 -12.828,2.356 -20.268,2.289 -8.937,-0.081 -5.652,1.211 -28.452,4.197 -16.805,2.2 -19.932,1.876 -23.776,5.341 -5.062,4.561 -5.68,10.565 -9.744,10.682 -2.863,0.083 -5.747,-2.805 -7.015,-5.341 -1.779,-3.555 0.113,-5.43 -1.56,-7.631 -2.504,-3.295 -10.208,-3.643 -14.421,-0.381 -2.873,2.225 -2.874,5.161 -4.677,5.341 -2.286,0.229 -3.771,-4.328 -6.236,-8.011 C 81.607,77.751 74.543,74.979 60.412,69.437 49.67,65.223 49.869,66.59 42.094,62.951 33.474,58.917 33.463,57.347 24.555,53.413 16.07,49.667 13.996,50.17 9.354,46.545 7.274,44.921 2.418,41.027 0.779,34.718 -0.243,30.784 0.427,27.609 0.779,25.562 1.736,19.998 2.25,11.672 0,0"
                                    style="fill:#557222;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path942" />
                            </g>
                            <g id="g944" transform="translate(958.1816,705.7471)">
                                <path class="pulau_ku p_besar pulau_d cek_harta"
                                    d="m 0,0 c -2.197,-0.547 -2.915,-11.606 1.04,-21.874 2.987,-7.755 6.481,-9.453 14.031,-20.348 3.612,-5.211 8.368,-12.074 11.433,-19.839 4.931,-12.491 3.905,-23.324 2.599,-37.134 -1.566,-16.543 -4.288,-11.796 -8.315,-36.117 -1.492,-9.005 -2.074,-15.422 -7.276,-18.822 -2.274,-1.486 -6.539,-2.347 -15.071,-4.07 -7.956,-1.606 -10.601,-1.704 -10.913,-3.052 -0.547,-2.359 7.179,-3.703 14.032,-10.682 6.297,-6.414 5.105,-10.71 10.913,-18.822 4.831,-6.747 11.014,-6.064 15.59,-13.734 1.455,-2.439 2.319,-4.729 3.119,-4.578 1.134,0.213 -0.265,6.326 0.519,15.769 0.461,5.558 1.053,4.803 1.039,7.63 -0.052,11.118 -9.155,15.41 -7.275,21.874 1.066,3.668 4.044,2.444 8.834,8.139 2.691,3.2 2.988,5.056 7.796,17.804 4.381,11.618 4.34,10.62 5.196,13.735 1.765,6.415 2.085,11.182 2.599,18.822 0.775,11.529 0.193,20.276 0,22.891 -0.586,7.914 -0.997,13.46 -3.119,20.856 -1.028,3.586 -3.141,9.989 -7.275,17.296 -5.132,9.069 -11.125,15.549 -15.07,19.33 -8.075,7.736 -11.192,7.631 -17.15,15.261 C 2.638,-3.726 1.396,0.347 0,0"
                                    style="fill:#557222;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path946" />
                            </g>
                            <g id="g948" transform="translate(640.1377,278.6992)">
                                <path class="pulau_ku p_besar pulau_c"
                                    d="m 0,0 c -1.803,-4.955 2.434,-9.784 11.693,-21.364 16.967,-21.22 25.451,-31.83 31.181,-39.679 4.769,-6.531 7.133,-10.197 12.472,-14.497 1.906,-1.535 9.298,-7.263 21.827,-10.683 11.826,-3.228 13.461,-0.369 30.401,-2.289 17.618,-1.998 16.461,-5.16 31.96,-6.104 12.063,-0.736 15.916,0.988 23.386,-2.289 8.82,-3.871 8.603,-8.537 15.59,-9.92 6.592,-1.305 12.526,1.713 24.166,7.631 11.132,5.66 12.1,8.253 16.369,7.63 5.624,-0.821 6.828,-5.742 17.149,-9.919 2.795,-1.132 7.342,-2.973 8.576,-1.527 1.457,1.709 -3.223,6.245 -7.016,14.498 -1.65,3.59 -8.042,17.498 -3.118,22.128 4.744,4.46 10.778,-7.201 10.653,-9.474 -0.059,-1.059 9.607,8.111 7.405,9.029 -3.733,1.557 -6.941,4.573 -9.484,17.232 -1.726,8.592 -2.634,13.114 -6.235,16.024 -6.13,4.952 -16.249,1.873 -22.607,0 -7.509,-2.212 -12.526,-5.279 -21.826,-11.446 -23.151,-15.352 -23.242,-17.03 -29.622,-19.838 -4.308,-1.897 -14.885,-2.142 -35.858,-3.053 -21.473,-0.933 -26.385,-0.357 -31.96,1.526 -8.586,2.9 -14.182,7.359 -20.268,12.208 -9.263,7.382 -14.889,14.565 -22.606,24.418 C 34.303,-6.871 34.299,-6.867 34.299,-6.867 29.847,-0.359 24.774,2.972 21.827,4.579 18.528,6.376 15.611,7.917 11.693,7.631 6.757,7.271 1.493,4.105 0,0"
                                    style="fill:#557222;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path950" />
                            </g>
                            <g id="g952" transform="translate(247.7793,559.2437)">
                                <path class="pulau_ku p_besar pulau_b"
                                    d="m 0,0 c -2.618,-0.26 -2.614,-9.705 -5.716,-27.469 -2.129,-12.192 -3.853,-21.772 -8.315,-33.066 -3.935,-9.958 -4.917,-8.386 -9.354,-19.33 -6.131,-15.119 -4.125,-17.793 -9.874,-31.03 -3.113,-7.166 -3.345,-5.565 -11.433,-21.365 -5.771,-11.275 -8.682,-17.011 -9.874,-21.874 -2.372,-9.67 -1.17,-17.354 0.52,-27.469 0.801,-4.802 3.442,-19.089 11.952,-36.626 2.487,-5.126 7.548,-13.591 17.669,-30.521 7.637,-12.776 8.505,-13.765 9.874,-17.805 4.5,-13.281 2.25,-23.638 7.276,-25.435 2.16,-0.772 5.118,0.234 6.755,2.035 3.894,4.284 -1.095,11.507 -6.755,32.556 -2.612,9.712 -3.367,14.932 -3.638,19.84 -0.356,6.426 -0.585,10.563 1.039,15.769 2.696,8.643 7.205,9.67 7.276,16.278 0.045,4.216 -1.749,7.628 -4.158,12.209 -2.996,5.699 -5.411,5.978 -6.756,9.665 -2.092,5.737 0.913,11.329 2.599,15.261 2.081,4.854 2.6,15.275 3.638,36.117 1.016,20.419 -1.012,17.565 0,36.117 0.909,16.683 1.55,26.95 6.236,39.678 2.969,8.066 4.667,9.256 6.756,17.296 3.885,14.956 1.605,24.692 0,29.504 C 4.999,-7.515 2.411,0.239 0,0"
                                    style="fill:#557222;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path954" />
                            </g>
                            <g id="g956" transform="translate(92.1353,309.9844)">
                                <path class="pulau_ku p_besar pulau_b"
                                    d="m 0,0 c -2.957,-0.096 -4.991,-5.09 -9.354,-16.787 -3.328,-8.92 -4.992,-13.381 -5.457,-14.879 -2.342,-7.552 -5.187,-16.726 -6.236,-26.707 -1.124,-10.693 1.11,-9.979 1.949,-29.377 0.995,-23.02 -2.063,-26.075 2.338,-34.336 3.854,-7.234 8.276,-8.79 9.355,-16.405 0.631,-4.455 -0.235,-8.491 2.338,-14.498 0.965,-2.254 2.604,-6.08 4.677,-6.105 4.047,-0.048 7.268,14.417 7.795,16.787 3.122,14.021 1.244,20.861 0.78,47.69 -0.247,14.304 0.147,20.481 1.169,27.088 1.05,6.782 2.133,12.359 4.677,19.458 2.157,6.017 3.812,8.549 4.677,14.497 0.434,2.979 0.376,4.802 1.56,7.631 1.794,4.292 3.798,4.57 6.236,8.393 3.478,5.456 3.496,11.32 3.508,15.261 0.009,3.328 -0.513,5.779 -1.559,10.683 -1.607,7.529 -3.492,16.363 -5.847,16.405 -1.912,0.034 -3.3,-5.718 -5.067,-12.209 C 11.527,-9.504 8.853,-19.614 7.405,-19.458 6.307,-19.339 5.226,-13.215 5.067,-8.775 4.974,-6.167 5.186,-3.791 3.508,-1.908 3.266,-1.637 1.758,0.057 0,0"
                                    style="fill:#557222;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path958" />
                            </g>
                        </g>

                        <g id="ini_pulau_dekorasi">
                        <g id="g828" transform="translate(1028.3916,637.5356)">
                                <path class="pulau_ku" 
                                    d="m 0,0 c -1.777,-2.598 2.036,-7.866 2.381,-8.333 3.716,-5.032 8.034,-4.955 8.729,-8.332 0.448,-2.173 -1.068,-4.109 -2.777,-6.349 -4.477,-5.868 -12.322,-11.13 -12.04,-12.29 0.478,-1.961 4.318,-0.121 5.276,-2.909 0.547,-1.592 10.278,1.819 3.193,-5.037 -2.351,-2.275 -9.54,-9.233 -8.333,-11.111 1.078,-1.678 11.114,5.384 13.094,3.174 1.738,-1.938 -4.989,-8.303 -3.968,-17.855 0.18,-1.689 0.454,-3.967 1.984,-4.762 2.789,-1.449 8.135,2.868 11.11,6.745 0.978,1.273 3.651,5.041 5.159,15.476 1.69,11.693 -0.92,12.128 0.794,22.617 1.221,7.481 3.059,10.38 1.19,14.681 -0.726,1.669 -2.864,3.626 -7.143,7.54 C 11.366,-0.082 8.772,0.841 6.745,1.19 5.801,1.354 1.441,2.105 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path830" />
                            </g>
                            <g id="g832" transform="translate(1057.9795,558.1392)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -11.979,0.011 -20.194,0.452 -25.99,0.954 -1.441,0.125 -5.36,0.481 -9.685,-0.371 -1.384,-0.272 -7.492,-1.591 -7.775,-3.977 -0.136,-1.149 1.139,-2.049 1.389,-2.226 1.722,-1.22 4.049,-1.224 7.341,-2.015 2.328,-0.559 3.8,-1.222 6.745,-2.545 5.497,-2.469 4.85,-4.151 10.317,-8.058 6.99,-4.996 13.565,-6.189 15.277,-6.469 1.309,-0.213 6.289,-1.027 7.737,0 1.578,1.119 -1.879,3.819 -3.373,4.984 -1.374,1.073 -4.307,2.603 -10.118,5.62 -4.189,2.175 -4.796,2.488 -5.952,3.181 -2.802,1.679 -2.85,2.001 -5.952,3.923 -4.015,2.489 -5.51,2.928 -5.158,3.394 0.672,0.891 6.582,-0.129 16.666,0.211 5.114,0.173 10.698,0.392 11.705,1.909 0.59,0.888 -0.571,1.948 -1.785,2.757"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path834" />
                            </g>
                            <g id="g960" transform="translate(614.6084,579.9092)">
                                <path class="pulau_ku"
                                    d="m 0,0 c 4.506,-0.017 6.194,-8.87 11.693,-16.596 1.411,-1.983 7.715,-10.841 18.319,-13.735 2.686,-0.733 0.919,0.207 18.513,-0.19 5.034,-0.114 9.109,-0.28 10.329,1.907 0.89,1.595 -0.146,3.712 -0.584,4.578 -3.908,7.721 -13.948,6.154 -28.648,14.498 -2.582,1.465 -5.879,3.561 -14.031,8.203 C 10.294,1.68 6.757,3.602 2.729,2.671 -0.303,1.97 -3.089,-0.224 -2.923,-0.572 -2.809,-0.812 -1.374,0.005 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path962" />
                            </g>
                            <g id="g964" transform="translate(784.3486,904.7729)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -0.989,-4.202 -1.528,-9.659 1.56,-12.972 2.503,-2.687 5.513,-1.947 15.2,-3.815 8.094,-1.56 12.685,-2.445 17.539,-5.341 5.468,-3.262 3.805,-4.624 11.693,-10.301 5.172,-3.723 8.421,-4.962 14.421,-7.249 4.741,-1.807 6.168,-1.829 7.016,-1.145 2.487,2.008 -2.212,8.307 0.389,11.446 1.995,2.407 6.167,0.402 15.591,0.381 6.341,-0.014 11.315,-0.025 16.37,2.289 5.033,2.304 7.934,5.899 13.642,12.972 3.956,4.902 4.845,7.189 9.353,11.446 3.309,3.123 4.129,3.119 5.847,5.341 3.59,4.645 4.003,9.839 4.287,14.116 0.416,6.244 0.903,13.531 -3.897,19.076 -3.059,3.535 -6.872,4.752 -11.303,6.105 -6.865,2.095 -10.386,1.502 -24.555,1.526 C 76.165,43.903 72.494,44.771 65.091,42.349 61.999,41.337 58.407,40.218 54.566,37.389 48.925,33.233 49.613,30.547 44.433,27.088 38.104,22.861 34.021,24.829 31.961,20.983 30.467,18.195 31.995,16.008 29.622,11.445 29.047,10.339 28.316,8.935 26.894,7.63 25.341,6.207 23.004,4.94 13.252,4.197 10.87,4.015 7.685,3.837 3.898,3.815"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path966" />
                            </g>
                            <g id="g968" transform="translate(879.4502,849.1982)">
                                <path class="pulau_ku"
                                    d="m 0,0 c 1.338,-5.881 7.504,-9.429 9.874,-10.937 0.803,-0.511 5.992,-6.529 16.37,-18.567 8.426,-9.773 11.16,-15.467 36.638,-53.922 6.578,-9.928 12.37,-18.492 23.126,-25.943 1.941,-1.345 7.718,-5.198 16.109,-8.139 9.946,-3.485 23.065,-5.513 24.165,-2.798 0.234,0.577 0.185,2.005 -17.149,14.243 -13.894,9.811 -18.801,12.38 -24.165,19.077 -3.66,4.569 -5.455,8.523 -7.535,12.971 -3.717,7.947 -8.246,17.634 -6.496,29.25 0.499,3.309 0.93,7.242 3.637,11.191 2.828,4.126 4.997,3.847 8.575,8.139 3.612,4.333 4.843,8.746 6.237,13.735 0.763,2.736 2.104,7.695 1.818,14.243 -0.225,5.175 -0.339,7.763 -1.818,10.429 -3.91,7.043 -11.393,5.366 -18.969,14.243 -2.208,2.588 -3.358,4.823 -3.897,4.578 -0.961,-0.435 0.848,-8.36 4.157,-15.261 0.71,-1.481 1.991,-3.96 2.858,-7.63 0.745,-3.153 0.854,-5.778 0.52,-5.85 -0.643,-0.137 -1.056,9.61 -7.795,14.498 -2.548,1.848 -6.609,3.443 -8.316,2.034 -1.675,-1.382 0.53,-5.111 2.859,-12.971 2.135,-7.202 3.69,-12.453 3.378,-18.567 -0.3,-5.887 -2.04,-6.859 -4.417,-17.042 -1.668,-7.145 0.118,-13.119 -2.339,-13.988 -1.217,-0.431 -2.618,0.588 -2.859,0.763 -2.624,1.909 -2.322,6.125 -2.337,8.647 -0.03,4.58 -1.926,9.327 -5.717,18.822 -2.088,5.229 -5.849,14.647 -9.095,14.243 C 35,-0.809 33.706,-6.451 33.26,-8.394 32.219,-12.928 33.525,-16.391 33,-16.532 32.011,-16.798 30.421,-4.001 22.347,-0.509 19.931,0.537 20.051,-0.6 14.031,0.509 6.057,1.978 1.823,4.714 0.26,3.052 0.066,2.846 -0.487,2.146 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path970" />
                            </g>
                            <g id="g972" transform="translate(942.5918,916.6001)">
                                <path class="pulau_ku"
                                    d="m 0,0 c 0.066,-1.373 0.041,-3.233 0.401,-6.294 0.077,-0.645 0.174,-1.62 0.378,-2.672 0.42,-2.164 1.124,-4.113 2.534,-8.012 1.282,-3.547 1.923,-5.321 3.118,-7.63 1.187,-2.295 2.345,-4.534 4.482,-6.868 2.628,-2.87 5.397,-6.398 7.99,-5.722 1.434,0.373 2.48,1.922 2.729,3.242 0.194,1.035 -0.12,1.816 -1.949,5.724 -1.495,3.192 -1.967,4.131 -1.559,4.578 0.768,0.84 3.709,-1.104 4.287,-0.382 0.453,0.566 -1.054,2.139 -2.533,4.578 -1.999,3.295 -1.326,3.85 -3.118,7.25 -2.452,4.651 -3.959,4.083 -5.068,7.439 -1.099,3.331 0.298,4.157 -0.974,7.439 C 9.452,5.937 7.029,7.799 6.236,8.393 4.7,9.544 3.284,9.952 2.903,10.07 1.254,10.58 -0.65,11.17 -1.56,10.396 -2.937,9.224 -0.31,6.377 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path974" />
                            </g>
                            <g id="g976" transform="translate(976.8906,724.3145)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -2.261,-2.826 6.105,-9.655 15.59,-27.215 7.06,-13.071 10.591,-19.606 11.174,-24.672 0.161,-1.403 0.612,-6.489 4.157,-11.191 0.854,-1.134 1.566,-1.814 2.858,-3.052 5.647,-5.414 11.153,-7.878 12.992,-8.648 2.079,-0.869 3.551,-1.258 6.496,-2.035 4.748,-1.252 5.73,-1.007 6.236,-0.508 1.051,1.034 0.246,3.359 0,4.069 -2.107,6.092 -9.365,9.462 -13.772,11.446 -5.058,2.276 -6.229,1.855 -7.794,3.815 -1.364,1.706 -0.914,2.573 -3.378,9.411 -0.959,2.66 -1.463,3.739 -1.039,4.069 0.788,0.615 3.18,-2.616 8.054,-4.832 3.887,-1.767 4.421,-0.647 10.654,-2.544 5.502,-1.675 7.781,-3.368 9.094,-2.289 1.097,0.901 0.881,3.209 0.26,4.833 -2.239,5.856 -10.14,3.849 -17.929,10.936 -0.95,0.865 -3.058,3.544 -7.275,8.903 -2.801,3.557 -4.231,5.382 -5.717,7.63 -4.183,6.327 -3.162,7.125 -5.976,10.937 -4.889,6.622 -11.652,9.2 -13.772,9.919 C 7.777,0.047 1.691,2.113 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path978" />
                            </g>
                            <g id="g980" transform="translate(749.2705,805.9595)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -2.406,-0.682 -0.258,-7.201 -3.508,-15.643 -1.425,-3.702 -2.202,-3.393 -8.184,-12.589 -7.773,-11.947 -7.6,-14.218 -7.016,-15.643 1.706,-4.168 8.471,-4.868 9.354,-4.959 7.656,-0.793 15.583,4.339 17.929,11.063 1.625,4.656 0.274,9.211 -0.389,11.446 -1.855,6.249 -4.978,6.816 -5.068,11.446 -0.092,4.768 3.175,6.519 1.949,10.301 C 4.219,-1.964 1.602,0.454 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path982" />
                            </g>
                            <g id="g984" transform="translate(728.6133,792.9878)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -1.599,0.791 -4.824,-7.707 -13.642,-11.064 -2.969,-1.131 -5.266,-1.181 -16.759,0 -19.97,2.051 -22.2,3.142 -28.842,2.289 -5.739,-0.737 -11.492,-1.475 -16.76,-5.723 -8.532,-6.878 -9.81,-18.135 -10.523,-24.417 -0.475,-4.175 -0.837,-7.365 0.389,-11.446 2.845,-9.465 11.29,-13.915 13.252,-14.879 3.783,-1.859 13.24,-5.388 16.37,-1.907 4.571,5.084 -8.259,20.788 -4.677,23.654 1.53,1.223 5.646,-0.218 7.795,-2.671 3.35,-3.822 0.887,-8.919 3.898,-11.064 0.617,-0.44 2.331,-1.373 6.626,0 8.306,2.656 12.106,9.412 19.877,18.694 10.594,12.654 13.504,12.01 18.319,20.984 C -0.216,-9.237 1.539,-0.761 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path986" />
                            </g>
                            <g id="g988" transform="translate(898.5488,622.8301)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -1.329,-0.145 -1.876,0.833 -2.665,0.608 -2,-0.57 -1.462,-7.702 -1.232,-13.58 0.3,-7.701 0,-1.902 0,-16.405 0,0 0.337,-7.067 0.779,-19.457 0.414,-11.625 0.035,-10.766 0.389,-20.221 0.469,-12.504 0.745,-18.923 2.729,-27.088 2.334,-9.606 5.154,-14.228 6.626,-16.405 2.463,-3.643 7.922,-11.718 13.642,-10.682 3.212,0.581 6.555,4.045 6.626,7.629 0.127,6.534 -10.741,7.074 -15.981,17.932 -1.119,2.319 -1.785,6.506 -3.118,14.879 -1.325,8.327 -1.128,11.423 -0.779,13.735 0.588,3.905 1.148,7.611 3.897,10.682 2.215,2.476 4.471,2.996 16.76,6.486 9.573,2.72 12.892,3.736 12.862,4.96 -0.056,2.255 -11.414,2.318 -12.083,6.105 -0.402,2.278 3.523,3.309 7.016,8.393 2.021,2.942 2.055,4.559 4.288,12.59 2.851,10.261 4.316,15.404 6.235,16.024 2.962,0.956 5.456,-2.796 17.54,-11.064 2.183,-1.494 3.853,-4.335 7.016,-4.579 2.479,-0.19 5.534,0.973 6.235,3.053 0.617,1.827 -0.77,3.806 -2.338,5.722 C 69.066,-4.109 63.22,-0.289 59.633,2.289 52.771,7.221 49.568,9.981 47.551,12.59 c -2.869,3.711 -3.472,6.004 -6.626,7.631 -2.893,1.49 -7.316,2.105 -10.913,0.381 C 22.742,17.121 25.557,7.318 19.099,4.578 13.671,2.276 7.331,7.352 3.897,3.815 2.626,2.505 1.944,0.211 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path990" />
                            </g>
                            <g id="g992" transform="translate(454.0923,789.6812)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -3.952,-3.031 -3.137,-5.618 -8.834,-12.717 -3.51,-4.373 -4.28,-3.965 -6.237,-7.122 -3.241,-5.228 -5.168,-12.861 -2.598,-14.752 0.615,-0.452 1.986,-0.942 10.913,3.561 8.166,4.118 13.896,7.997 15.59,9.156 6.631,4.536 10.395,7.145 14.552,11.7 4.092,4.484 8.078,8.851 6.756,11.7 C 28.296,5.502 17.218,4.143 12.473,3.561 6.324,2.807 3.152,2.417 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path994" />
                            </g>
                            <g id="g996" transform="translate(352.2354,791.2075)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -6.466,-2.652 -8.266,-10.657 -9.874,-17.804 -1.333,-5.925 -1.22,-10.692 -1.04,-18.313 0.033,-1.383 0.16,-5.666 1.04,-11.192 1.061,-6.659 1.875,-11.771 4.157,-12.208 2.792,-0.535 6.286,6.213 6.756,7.121 3.252,6.28 1.291,8.638 3.638,14.244 2.685,6.414 6.081,5.308 10.913,13.226 2.649,4.341 5.606,9.186 4.158,14.752 -1.706,6.553 -8.305,9.443 -8.835,9.665 C 9.947,-0.104 4.906,2.013 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path998" />
                            </g>
                            <g id="g1000" transform="translate(260.9014,794.1323)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -5.399,-1.814 -8.902,-5 -10.913,-6.867 -4.888,-4.537 -4.657,-6.906 -8.965,-9.157 -4.045,-2.113 -6.914,-1.415 -7.405,-3.052 -0.636,-2.118 3.272,-6.273 7.405,-6.486 3.808,-0.195 5.028,3.097 11.303,7.249 2.248,1.487 2.326,1.22 15.591,6.867 11.364,4.839 13.694,6.051 13.641,7.631 C 20.568,-1.17 13.865,0.511 12.862,0.763 6.92,2.254 1.878,0.631 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1002" />
                            </g>
                            <g id="g1004" transform="translate(200.0986,760.1772)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -11.099,0.067 -14.158,-0.51 -15.59,-2.671 -1.326,-1.999 -1.169,-5.221 0.39,-7.248 0.952,-1.24 3.318,-3.192 22.216,-0.764 12.327,1.584 18.697,3.363 23.385,4.96 3.893,1.326 10.786,3.673 10.524,4.96 C 40.62,0.735 31.041,-1.297 13.642,-0.382 12.845,-0.34 7.346,-0.045 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1006" />
                            </g>
                            <g id="g1008" transform="translate(172.4258,733.8521)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -4.675,-2.482 -4.294,-6.242 -8.964,-11.064 -2.994,-3.091 -3.557,-1.965 -10.913,-6.867 -6.877,-4.582 -10.316,-6.873 -12.863,-11.064 -3.954,-6.508 -3.338,-12.898 -3.118,-14.88 0.331,-2.968 0.578,-5.19 1.949,-5.722 1.693,-0.657 4.364,1.546 15.59,15.261 8.293,10.129 8.563,11.038 11.693,13.734 4.426,3.812 8.407,5.848 16.37,9.919 9.09,4.648 17.15,8.013 17.15,8.013 9.274,3.871 13.254,4.826 13.641,7.63 0.345,2.494 -2.273,5.586 -5.067,6.104 C 32.006,11.707 30.813,7.927 24.555,4.96 21.59,3.554 17.122,2.878 8.185,1.526 1.908,0.577 1.551,0.824 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1010" />
                            </g>
                            <g id="g1012" transform="translate(249.5981,673.9536)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -6.766,-6.769 -10.612,-13.073 -12.862,-17.55 -3.425,-6.813 -2.231,-7.561 -6.626,-16.405 -3.584,-7.212 -6.11,-10.202 -4.677,-12.59 1.76,-2.934 7.991,-2.454 10.134,-2.289 2.349,0.18 5.654,0.435 8.185,2.67 1.118,0.988 2.786,2.981 3.508,10.301 1.117,11.337 -2.016,15.326 1.169,19.458 0.586,0.76 2.729,1.905 7.016,4.197 7.445,3.979 10.09,4.378 12.472,7.63 0.521,0.711 3.126,4.266 1.949,6.486 -1.39,2.618 -7.709,2.738 -15.98,0.381"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1014" />
                            </g>
                            <g id="g1016" transform="translate(260.7715,581.626)">
                                <path class="pulau_ku"
                                    d="M 0,0 C -0.322,-0.232 0.018,-1.169 0.094,-1.383 1.659,-5.748 -0.46,-4.455 2.598,-17.295 5.668,-30.184 7.532,-30.352 8.834,-38.661 9.654,-43.892 10.8,-51.204 8.315,-59.517 5.224,-69.855 -0.69,-72.398 1.04,-76.813 c 1.728,-4.413 7.981,-2.744 17.149,-9.665 5.69,-4.295 6.922,-7.687 8.834,-7.122 3.029,0.896 1.116,9.75 3.119,23.401 1.325,9.04 2.586,8.025 6.235,23.908 4.457,19.394 3.313,24.102 1.04,27.469 -3.066,4.542 -8.183,6.641 -9.355,7.122 -7.179,2.946 -10.179,-0.323 -16.629,2.544 C 4.618,-6.127 0.911,0.659 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1018" />
                            </g>
                            <g id="g1020" transform="translate(102.269,581.1172)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -3.875,2.776 -15.072,-6.43 -17.149,-8.139 -7.775,-6.393 -13.199,-10.853 -14.032,-17.804 -0.701,-5.854 2.617,-7.103 2.598,-17.804 -0.005,-3.404 -0.344,-5.279 1.04,-6.613 2.629,-2.534 9.428,-1.145 14.031,2.035 4.59,3.169 3.51,5.711 10.914,18.821 3.952,6.998 5.444,8.372 5.716,12.209 0.099,1.397 -0.453,4.831 -1.559,11.699 C 0.831,-1.069 0.643,-0.46 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1022" />
                            </g>
                            <g id="g1024" transform="translate(46.6631,510.918)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -1.575,-0.357 -4.379,-1.272 -17.149,-17.805 -6.906,-8.939 -8.402,-11.67 -9.354,-15.26 -1.373,-5.174 -1.145,-10.344 -1.04,-12.717 0.126,-2.834 0.457,-4.749 1.04,-6.614 0.894,-2.861 1.881,-6.019 4.157,-7.122 3.487,-1.688 8.598,2.128 12.472,5.087 3.299,2.521 7.166,6.043 14.032,15.261 6.41,8.608 9.652,13.04 11.433,19.331 1.439,5.086 2.949,10.415 0,14.752 C 12.424,-0.431 5.383,1.222 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1026" />
                            </g>
                            <g id="g1028" transform="translate(255.1416,481.7031)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -4.22,-5.928 -2.686,-13.111 -2.166,-15.551 1.645,-7.695 5.99,-9.267 5.197,-15.261 -0.521,-3.946 -2.645,-5.515 -1.558,-7.629 1.491,-2.901 6.313,-1.545 10.913,-4.07 4.496,-2.468 2.573,-6.447 7.795,-12.209 2.087,-2.302 5.209,-5.748 7.795,-5.087 2.916,0.745 3.716,6.951 5.197,19.33 1.008,8.432 1.503,12.75 1.039,17.805 -0.578,6.302 -1.077,11.738 -4.677,17.295 C 28.8,-4.241 20.558,8.105 9.787,6.323 3.916,5.353 0.508,0.714 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1030" />
                            </g>
                            <g id="g1032" transform="translate(248.8188,426.4746)">
                                <path class="pulau_ku"
                                    d="M 0,0 C -1.903,-2.387 -0.8,-5.474 1.04,-12.717 3.841,-23.752 5.231,-29.366 4.677,-34.082 3.974,-40.067 1.972,-39.179 0.52,-46.8 c -1.516,-7.95 -0.372,-14.347 0.52,-19.33 0.831,-4.647 2.147,-9.143 4.676,-13.734 1.855,-3.367 3.111,-5.647 4.678,-5.596 3.653,0.117 6.044,12.803 7.275,19.33 2.759,14.635 0.616,15.843 3.118,26.961 2.883,12.811 6.432,14.337 5.197,21.874 C 24.554,-8.57 18.573,-3.133 16.63,-1.526 14.68,0.086 11.881,2.336 7.795,2.544 7.051,2.582 2.252,2.826 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1034" />
                            </g>
                            <g id="g1036" transform="translate(293.5112,367.4668)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -6.343,-4.05 -5.308,-16.11 -4.157,-29.505 0.636,-7.415 1.302,-14.547 4.677,-23.399 1.993,-5.23 4.57,-10.11 8.314,-14.752 3.213,-3.984 7.674,-9.514 10.914,-8.649 3.175,0.849 3.523,7.85 4.157,19.331 0.35,6.328 -0.058,6.443 0,19.839 0.05,11.391 0.346,11.834 -0.519,13.735 -3.4,7.463 -10.506,6.192 -14.032,14.243 C 7.269,-4.394 8.085,-0.134 5.197,1.018 2.978,1.901 0.368,0.234 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1038" />
                            </g>
                            <g id="g1040" transform="translate(349.1172,356.2754)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -1.487,-1.159 -2.323,-3.58 2.079,-22.892 4.486,-19.686 5.696,-18.671 6.236,-26.452 0.877,-12.656 1.315,-18.984 0,-24.926 -0.603,-2.718 -1.403,-5.301 0,-7.629 2.261,-3.753 8.106,-3.294 17.149,-4.07 8.736,-0.75 3.637,-1.209 26.504,-4.579 16.915,-2.492 20.292,-2.328 22.866,0 4.493,4.065 3.279,11.774 3.118,12.718 -1.849,10.806 -12.134,10.807 -21.827,23.908 -9.917,13.406 -5.363,21.804 -15.07,27.47 -6.717,3.92 -12.314,1.895 -17.15,7.631 -3.756,4.454 -1.867,7.438 -5.717,12.208 C 13.343,-0.609 3.709,2.891 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1042" />
                            </g>
                            <g id="g1044" transform="translate(372.5024,378.6582)">
                                <path class="pulau_ku"
                                    d="m 0,0 c 1.897,-7.476 8.706,-11.889 15.071,-15.77 15.14,-9.233 22.71,-13.849 29.622,-16.278 16.343,-5.743 37.818,-8.884 39.495,-4.578 0.155,0.397 0.494,1.759 -4.677,6.612 -7.443,6.988 -14.57,10.195 -24.945,14.752 C 28.948,-4.006 28.789,-4.294 25.464,-2.035 24.999,-1.719 20.973,1.024 15.071,3.561 10.421,5.559 3.154,8.681 0.52,6.104 -1.104,4.515 -0.347,1.365 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1046" />
                            </g>
                            <g id="g1048" transform="translate(361.0698,468.1875)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -2.728,-12.214 -3.486,-21.782 -3.638,-28.486 -0.13,-5.708 0.168,-9.825 -2.079,-15.261 -1.564,-3.784 -3.425,-5.944 -6.236,-12.718 -3.042,-7.331 -2.447,-8.622 -2.078,-9.156 1.691,-2.449 6.495,-0.383 15.07,0 2.414,0.107 15.536,0.547 28.583,-4.578 7.081,-2.782 10.044,-5.593 12.472,-4.07 2.767,1.736 3.184,8.057 0.52,12.208 -4.015,6.256 -14.451,6.688 -24.945,7.123 -9.758,0.403 -16.863,-0.77 -17.149,0.508 -0.241,1.071 4.786,1.743 9.874,6.105 5.557,4.763 7.538,10.8 8.834,14.752 0.374,1.139 4.398,13.404 1.04,15.261 -3.059,1.689 -10.844,-6.022 -11.434,-6.614 -3.668,-3.679 -5.146,-6.868 -5.716,-6.613 -1.112,0.496 6.16,11.853 4.157,24.418 C 6.424,-1.78 4.111,2.428 2.079,5.342"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1050" />
                            </g>
                            <g id="g1052" transform="translate(355.6133,502.2695)">
                                <path class="pulau_ku"
                                    d="M 0,0 C 0.504,-0.46 0.883,-0.19 0.926,-0.313 0.967,-0.433 0.624,-0.525 0.073,-0.873 -2.454,-2.469 -0.425,-9.052 0,-13.988 c 0.478,-5.555 -1.152,-8.144 -2.599,-14.244 -4.544,-19.169 1.657,-35.347 -1.299,-36.118 -1.556,-0.404 -3.978,3.895 -4.937,5.596 -2.227,3.953 -2.314,6.525 -4.157,16.787 -0.874,4.867 -1.312,7.3 -2.079,10.683 -0.792,3.491 -1.279,5.137 -2.858,11.7 -1.739,7.228 -1.8,7.941 -1.819,8.647 -0.057,2.155 0.238,5.724 3.897,12.463 5.065,9.328 12.552,17.322 13.772,16.533 0.233,-0.151 0.277,-0.646 -3.378,-11.7 -1.489,-4.504 -2.314,-6.894 -1.559,-7.376 1.318,-0.84 6.47,4.762 7.276,4.07 C 0.717,2.659 -0.696,0.635 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1054" />
                            </g>
                            <g id="g1056" transform="translate(480.3364,384.2529)">
                                <path class="pulau_ku"
                                    d="m 0,0 c 0.327,0.245 0.802,0.605 1.361,1.056 1.342,1.082 6.819,5.622 11.111,12.933 5.413,9.221 5.463,16.928 6.496,16.787 0.394,-0.053 0.278,-1.13 0.52,-11.954 0.08,-3.6 0.148,-5.922 -1.3,-8.393 -1.064,-1.82 -2.557,-3.05 -2.338,-3.307 0.407,-0.476 5.223,4.151 7.016,3.052 2.242,-1.374 -1.059,-11.216 -1.819,-13.48 -1.463,-4.361 -2.594,-6.09 -1.819,-6.868 1.89,-1.895 11.523,5.474 12.472,4.324 0.219,-0.264 0.29,-1.362 -10.393,-12.462 -1.342,-1.395 -3.099,-4.429 -6.756,-6.868 -1.87,-1.247 -3.333,-2.194 -5.197,-2.035 -3.414,0.291 -6.319,4.136 -6.756,7.631 -0.18,1.445 0.216,1.597 1.559,7.63 1.151,5.17 1.1,6.135 0.52,6.867 -1.464,1.849 -5.395,1.08 -6.756,0.764"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1058" />
                            </g>
                            <g id="g1060" transform="translate(569.9814,437.1572)">
                                <path class="pulau_ku"
                                    d="m 0,0 v 0 c -9.31,-3.462 -14.839,-8.073 -18.189,-11.7 -4.794,-5.19 -6.026,-9.34 -12.992,-15.261 -5.199,-4.419 -8.66,-5.631 -8.315,-6.612 0.788,-2.24 18.401,5.264 42.094,3.56 6.149,-0.442 13.787,-1.049 22.866,-4.578 8.301,-3.225 9.471,-5.654 17.149,-8.139 10.786,-3.491 20.326,-2.535 23.906,-2.035 6.399,0.894 20.66,2.886 28.062,13.226 4.087,5.708 2.511,8.971 9.355,19.33 2.125,3.217 3.386,4.583 6.236,9.157 3.171,5.09 8.141,13.069 6.756,14.243 -1.29,1.095 -7.088,-4.562 -17.669,-11.7 -0.56,-0.377 -10.017,-6.7 -18.19,-10.682 -16.227,-7.908 -41.423,-13.421 -48.33,-4.579 -2.416,3.094 -1.445,6.474 -5.716,11.192 -3.054,3.374 -6.711,5.138 -9.354,6.104"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1062" />
                            </g>
                            <g id="g1064" transform="translate(653.1299,481.4141)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -2.716,-2.651 -7.018,-6.375 -12.992,-9.666 -11.748,-6.471 -20.716,-6.174 -20.787,-8.647 -0.077,-2.687 10.391,-6.96 20.787,-5.596 2.01,0.263 3.977,0.733 19.748,8.647 12.331,6.19 14.526,7.609 16.63,9.158 C 29.513,-1.592 37.129,5.697 35.857,7.63 31.879,13.684 7.578,-0.253 14.551,2.034"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1066" />
                            </g>
                            <g id="g1068" transform="translate(581.4141,523.6348)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -0.033,-0.092 -0.079,-0.365 -0.171,-0.913 -0.081,-0.484 -0.137,-0.884 -0.172,-1.151 0,0 -0.356,-2.765 -0.177,-5.566 0.586,-9.153 5.197,-14.752 5.197,-14.752 4.916,-5.823 8.675,-2.304 19.228,-9.157 4.69,-3.045 6.003,-5.074 13.512,-9.665 5.228,-3.195 7.165,-3.786 8.835,-4.069 6.564,-1.116 12.148,1.976 14.031,3.052 8.439,4.822 6.912,10.332 13.512,12.717 4.043,1.461 4.678,-0.585 15.59,0 9.997,0.536 11.486,2.361 11.953,3.052 1.951,2.893 0.888,8.047 -2.079,10.682 -3.999,3.554 -8.181,-0.374 -15.59,2.544 -6.821,2.686 -7.664,7.743 -12.992,7.63 -1.786,-0.037 -3.616,-1.042 -7.276,-3.051 -4.776,-2.623 -6.238,-4.51 -11.433,-7.631 -2.675,-1.607 -4.019,-2.399 -5.716,-3.052 -1.606,-0.617 -10.426,-3.807 -17.67,0 -3.405,1.79 -2.356,2.968 -8.314,7.122 -3.679,2.564 -4.455,2.378 -6.756,4.578 0,0 -3.177,2.894 -5.716,7.12 0,0.001 -0.001,0.001 -0.001,0.001 C 6.212,2.124 0.484,1.352 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1070" />
                            </g>
                            <g id="g1072" transform="translate(728.4834,492.0957)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -1.303,0.113 -3.23,0.152 -5.46,-0.324 -5.726,-1.223 -7.842,-4.645 -11.17,-3.745 -2.411,0.652 -2.962,2.898 -4.157,2.544 -1.524,-0.453 -2.57,-4.676 -1.039,-7.631 1.978,-3.82 6.68,-2.46 14.031,-6.105 5.69,-2.82 4.326,-4.356 12.472,-9.665 5.774,-3.761 9.676,-6.229 15.071,-6.103 4.391,0.101 8.033,1.882 9.355,2.543 2.151,1.077 4.439,2.221 6.235,4.578 2.858,3.75 3.557,9.365 1.559,13.734 -2.148,4.7 -6.916,6.867 -11.953,9.157 C 20.341,1.076 19.575,0.339 17.669,2.035 12.595,6.552 14.88,14.572 12.473,15.261 11.358,15.58 9.398,14.283 5.717,8.14"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1074" />
                            </g>
                            <g id="g1076" transform="translate(787.7266,488.5352)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -2.8,-4.669 1.56,-9.544 4.158,-18.312 2.811,-9.488 -0.271,-10.595 1.039,-34.592 0.821,-15.021 2.087,-15.66 2.599,-15.769 3.101,-0.663 9.503,11.551 11.433,23.4 1.451,8.906 0.153,16.246 -0.52,19.33 -1.522,6.967 -2.776,5.576 -6.756,17.804 C 9.617,-0.961 8.932,2.95 6.236,3.561 4.048,4.057 1.319,2.199 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1078" />
                            </g>
                            <g id="g1080" transform="translate(806.9551,424.4404)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -3.977,-0.674 -5.46,-9.633 -5.717,-14.244 -0.37,-6.656 1.404,-11.676 3.638,-17.804 3.955,-10.846 6.552,-11.512 8.835,-20.348 2.001,-7.742 1.24,-11.999 2.598,-12.208 2.131,-0.329 6.382,9.785 7.276,19.838 0.581,6.534 1.287,14.482 -3.638,20.348 -3.343,3.981 -6.954,4.235 -7.795,8.14 -0.917,4.252 2.826,6.469 1.559,10.682 C 5.812,-2.459 2.5,0.423 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1082" />
                            </g>
                            <g id="g1084" transform="translate(779.4121,386.2881)">
                                <path class="pulau_ku"
                                    d="m 0,0 c 1.325,5.532 0.699,9.658 -0.52,12.718 -1.432,3.594 -3.043,4.11 -6.755,10.174 -3.281,5.355 -5.816,9.603 -4.158,12.208 0.945,1.484 3.232,2.407 5.197,2.035 4.327,-0.82 4.7,-7.469 9.874,-17.296 4.672,-8.874 6.943,-8.348 9.354,-14.243 2.946,-7.204 -0.326,-9.405 0,-23.4 0.293,-12.606 2.812,-18.155 0,-19.84 -2.952,-1.767 -8.79,2.515 -12.992,5.596 -2.099,1.54 -3.127,2.549 -12.992,13.227 -5.712,6.182 -7.554,8.209 -9.874,11.699 -1.945,2.927 -3.442,5.21 -4.677,8.648 -1.075,2.993 -3.46,9.631 -0.519,15.77 0.762,1.592 1.92,4.011 4.157,4.578 3.149,0.799 7.484,-2.317 10.393,-8.14"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1086" />
                            </g>
                            <g id="g1088" transform="translate(726.9248,421.3877)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -0.068,-0.698 -0.16,-1.715 -0.251,-2.942 -0.447,-6.093 -0.361,-10.907 -0.27,-13.845 0.423,-13.469 1.941,-18.662 0.651,-19.075 -1.937,-0.621 -7.615,10.336 -8.186,11.445 -3.692,7.183 -3.911,10.507 -7.405,12.209 -3.914,1.905 -6.927,-0.665 -8.574,1.145 -2.453,2.691 1.629,11.224 7.405,16.786 6.004,5.781 14.137,8.638 15.2,7.249 0.756,-0.987 -2.386,-3.681 -7.405,-11.827 -1.94,-3.151 -3.371,-5.833 -4.287,-7.63"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1090" />
                            </g>
                            <g id="g1092" transform="translate(698.9912,371.4092)">
                                <path class="pulau_ku"
                                    d="m 0,0 c 3.693,-2.104 5.365,-9.227 3.118,-13.354 -1.47,-2.7 -3.843,-2.696 -4.287,-4.959 -0.699,-3.567 4.359,-7.822 8.575,-9.919 2.248,-1.12 4.753,-1.872 15.2,-2.289 10.718,-0.429 11.514,0.226 17.929,-0.382 6.975,-0.661 11.154,-1.057 15.981,-3.434 4.249,-2.093 7.307,-5.366 13.252,-11.827 7.186,-7.813 10.78,-11.719 9.744,-13.734 -1.436,-2.79 -9.009,0.06 -25.725,0.762 -8.758,0.368 -7.808,-0.367 -24.555,-0.382 -15.2,-0.012 -22.881,0.012 -26.893,1.527 -5.755,2.173 -6.561,4.192 -22.216,15.261 -6.488,4.586 -8.202,8.62 -12.862,8.775 -5.736,0.19 -9.338,-4.59 -13.642,-2.671 -1.88,0.838 -3.642,2.842 -3.897,4.96 -0.592,4.91 7.146,8.532 23.775,18.694 C -8.39,-1.902 -3.843,2.189 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1094" />
                            </g>
                            <g id="g1096" transform="translate(706.3975,375.2236)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -1.834,-1.846 -0.354,-5.77 0.779,-8.774 0.701,-1.86 2.37,-6.173 5.847,-9.92 9.575,-10.32 31.627,-15.003 35.857,-8.775 2.266,3.335 -1.172,8.926 -1.558,9.538 -4.371,6.927 -14.968,8.972 -21.827,8.775 -4.783,-0.138 -7.057,-1.345 -9.355,0.382 C 6.275,-6.168 7.701,-0.595 4.287,0.764 2.839,1.34 0.971,0.978 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1098" />
                            </g>
                            <g id="g1100" transform="translate(534.5127,340.8877)">
                                <path class="pulau_ku"
                                    d="m 0,0 c 3.32,7.062 -13.418,19.625 -11.692,21.746 1.076,1.323 7.713,-3.414 18.318,-7.63 5.06,-2.012 16.752,-6.66 31.181,-7.249 10.828,-0.442 13.378,1.802 20.267,-0.763 6.521,-2.427 6.478,-5.272 14.421,-10.683 13.413,-9.134 25.418,-9.117 25.335,-12.59 -0.063,-2.646 -7.082,-4.471 -8.965,-4.96 -20.475,-5.32 -29.246,7.153 -53.007,5.342 -5.739,-0.438 -10.603,-1.575 -17.539,0.382 -6.678,1.884 -7.628,4.477 -14.421,5.722 -4.537,0.831 -4.309,-0.29 -15.59,0 -8.188,0.21 -11.345,0.878 -14.032,3.052 -2.062,1.668 -4.268,4.563 -3.508,5.723 1.47,2.241 11.843,-5.315 22.996,-1.907 C -3.685,-3.036 -1.048,-2.23 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1102" />
                            </g>
                            <g id="g1104" transform="translate(427.3291,333.2568)">
                                <path class="pulau_ku"
                                    d="m 0,0 c 0.037,-0.001 0.082,-0.003 0.128,-0.005 10.207,-0.389 16.084,0.534 25.596,1.15 8.049,0.52 12.137,0.765 15.201,0 6.564,-1.64 12.605,-5.59 12.082,-7.63 -0.635,-2.481 -10.633,-0.838 -11.303,-3.434 -0.407,-1.578 2.976,-3.391 11.693,-9.538 9.621,-6.785 9.903,-7.683 9.744,-8.013 -0.376,-0.778 -3.905,0.182 -10.134,1.908 -14.738,4.084 -22.14,6.141 -23.775,6.868 -4.68,2.079 -11.282,5.635 -18.319,11.827"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1106" />
                            </g>
                            <g id="g1108" transform="translate(784.6094,626.8994)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -1.765,-1.172 -0.996,-3.513 -2.079,-9.156 -0.324,-1.689 -1.107,-5.768 -3.118,-9.665 -3.257,-6.311 -6.94,-6.729 -6.756,-9.666 0.247,-3.949 7.197,-7.783 13.512,-7.63 5.231,0.126 10.489,2.999 12.992,7.63 2.11,3.906 1.45,7.564 0.519,12.718 -0.781,4.327 -1.95,10.802 -7.275,14.243 C 7.493,-1.331 2.625,1.745 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1110" />
                            </g>
                            <g id="g1112" transform="translate(841.2539,631.9863)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -2.995,-1.621 -4.162,-6.491 -2.599,-10.173 1.822,-4.289 7.354,-6.988 11.434,-5.088 2.738,1.276 4.326,4.391 4.157,7.122 C 12.636,-2.378 4.417,2.389 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1114" />
                            </g>
                            <g id="g1116" transform="translate(829.8213,607.0605)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -2,-1.222 -1.884,-6.038 -1.884,-6.041 l -1.055,0.517 c -2.562,1.987 6.716,-7.494 9.695,-6.176 1.772,0.784 2.193,5.54 0,8.648 C 5.052,-0.638 1.623,0.992 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1118" />
                            </g>
                            <g id="g1120" transform="translate(868.9268,577.4292)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -2.218,0.055 -3.501,-4.598 -6.626,-11.573 -4.297,-9.589 -6.271,-10.616 -6.236,-15.387 0.029,-3.848 1.341,-6.924 2.079,-8.394 1.88,-3.746 4.44,-5.859 5.846,-6.994 2.781,-2.246 5.379,-4.344 7.276,-3.562 2.519,1.04 3.307,6.96 1.429,11.319 -1.594,3.699 -3.907,3.484 -5.716,7.885 -0.532,1.294 -1.86,4.52 -0.781,7.884 0.662,2.06 1.469,1.821 3.639,5.342 1.565,2.54 2.96,4.87 2.858,7.884 C 3.735,-4.634 3.642,-2.714 2.209,-1.271 1.88,-0.941 0.97,-0.023 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1122" />
                            </g>
                            <g id="g1124" transform="translate(782.6602,575.2671)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -0.733,-2.594 3.795,-4.597 7.795,-10.046 3.667,-4.996 1.827,-5.989 5.457,-12.209 3.246,-5.562 7.001,-8.681 12.473,-13.226 4.663,-3.874 7.932,-5.684 11.822,-6.104 3.092,-0.334 4.107,0.476 4.417,0.762 2.804,2.596 -0.789,9.93 -1.039,10.429 -1.351,2.693 -2.801,4.096 -8.705,9.411 -10.67,9.604 -10.226,8.885 -11.823,10.682 -2.942,3.31 -4.454,5.753 -8.705,9.411 C 8.59,1.78 6.493,2.976 4.157,2.671 2.722,2.483 0.462,1.634 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1126" />
                            </g>
                            <g id="g1128" transform="translate(934.2119,552.0581)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -0.044,0.097 -0.104,0.239 -0.17,0.412 -0.817,2.168 -0.427,4.242 -0.22,4.929 0.698,2.318 3.304,2.17 6.041,4.388 3.788,3.069 1.8,5.785 5.652,10.492 2.797,3.417 4.222,2.446 7.99,6.486 3.989,4.277 4.535,7.666 5.651,7.439 1.448,-0.293 2.666,-6.419 0.39,-11.636 C 23.732,18.839 20.443,15.714 16.954,12.399 14.191,9.774 12.256,8.374 12.667,7.249 13.322,5.458 19.121,6.57 19.488,5.151 19.771,4.055 16.576,2.378 14.227,1.145 11.863,-0.095 9.572,-1.271 6.236,-1.717 c -2.173,-0.29 -4.007,-0.166 -5.261,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1130" />
                            </g>
                            <g id="g1132" transform="translate(927.7812,474.9912)">
                                <path class="pulau_ku"
                                    d="m 0,0 c 0.216,-5.104 1.72,-8.491 3.117,-10.683 2.559,-4.01 5.829,-5.69 6.237,-9.919 0.263,-2.736 -0.882,-4.36 -0.195,-4.769 1.12,-0.667 5.71,2.743 7.016,7.439 1.34,4.821 -1.332,9.003 -1.949,9.92"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1134" />
                            </g>
                            <g id="g1136" transform="translate(942.9814,445.9961)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -0.793,-1.878 4.698,-3.827 9.159,-10.873 1.703,-2.69 1.942,-4.047 4.093,-6.105 0.567,-0.543 4.763,-4.557 7.601,-3.243 1.233,0.572 1.692,1.91 1.753,2.099 0.791,2.421 -1.208,4.977 -4.872,9.538 -1.683,2.095 -2.713,3.375 -4.482,4.959 C 10.612,-1.263 8.2,0.897 4.677,1.145 4.163,1.181 0.604,1.43 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1138" />
                            </g>
                            <g id="g1140" transform="translate(962.0801,446.7588)">
                                <path class="pulau_ku"
                                    d="m 0,0 c 0.589,-2.706 1.708,-6.149 3.897,-9.729 2.816,-4.603 6.058,-7.235 7.991,-8.775 3.603,-2.872 5.917,-4.715 8.769,-4.196 2.101,0.382 4.531,2.052 4.677,4.006 0.178,2.388 -3.146,4.036 -9.549,8.203 -3.04,1.976 -7.06,4.708 -11.693,8.202"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1142" />
                            </g>
                            <g id="g1144" transform="translate(1003.0049,442.7529)">
                                <path class="pulau_ku"
                                    d="m 0,0 c 0.391,1.583 3.021,1.682 12.667,3.815 7.742,1.713 7.927,2.065 9.354,1.717 5.58,-1.362 8.319,-8.108 10.914,-14.498 0.647,-1.596 2.962,-7.299 1.753,-8.012 -1.655,-0.975 -6.524,9.388 -15.005,9.92 -2.12,0.133 -3.706,-0.395 -8.186,0 C 7.261,-6.685 5.649,-5.944 4.871,-5.532 2.911,-4.493 -0.486,-1.966 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1146" />
                            </g>
                            <g id="g1148" transform="translate(1008.6562,412.041)">
                                <path class="pulau_ku"
                                    d="m 0,0 c 1.279,0.413 1.266,5.47 -0.195,9.919 -1.595,4.859 -4.01,6.236 -3.313,7.439 1.221,2.109 10.467,1.075 16.76,-4.005 2.323,-1.876 4.342,-5.066 8.38,-11.446 2.594,-4.098 3.146,-5.532 2.727,-5.913 -1.103,-1.005 -8.065,6.118 -9.938,4.769 -1.213,-0.873 1.14,-4.265 2.533,-11.827 1.182,-6.41 -0.109,-6.133 1.17,-12.782 0.913,-4.745 2.04,-7.325 0.584,-8.774 -1.472,-1.465 -4.484,-0.679 -4.872,-0.572 -4.09,1.12 -5.37,5.022 -9.549,11.827 -3.128,5.093 -5.25,8.547 -8.769,12.208 -5.695,5.923 -9.971,7.106 -10.33,11.446 -0.182,2.216 0.687,4.89 2.339,5.532 C -9.645,8.92 -4.564,4.055 -3.118,2.67 -1.225,0.857 -0.638,-0.206 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1150" />
                            </g>
                            <g id="g1152" transform="translate(965.5879,399.4502)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -2.485,-2.389 -2.039,-6.355 -1.754,-13.925 0.345,-9.161 0.002,-11.59 2.144,-13.163 1.312,-0.964 3.339,-1.445 4.872,-0.763 1.309,0.584 1.995,1.901 2.923,5.151 1.734,6.077 0.086,8.172 1.949,10.11 1.84,1.916 3.874,0.399 6.626,2.48 2.115,1.6 4.506,5.214 2.923,8.203 C 18.19,0.91 13.874,1.834 11.888,0.572 10.711,-0.175 10.841,-1.378 8.77,-3.242 7.591,-4.304 6.969,-4.863 6.235,-4.769 4.156,-4.5 4.062,0.665 1.948,0.954 1.128,1.066 0.403,0.389 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1154" />
                            </g>
                            <g id="g1156" transform="translate(991.5068,382.4727)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -0.868,-1.027 -2.004,-2.62 -2.729,-4.769 -1.001,-2.971 -0.514,-4.919 -0.389,-9.156 0.168,-5.716 0.302,-10.254 -1.56,-11.064 -2.328,-1.014 -5.956,4.598 -7.99,3.624 -1.544,-0.739 -0.854,-4.651 -0.39,-8.584 1.94,-16.389 -1.169,-23.4 3.314,-25.944 1.577,-0.894 3.211,-0.734 4.872,-0.572 5.416,0.531 9.913,4.785 11.692,9.156 2.779,6.828 -0.96,14.208 0,14.498 0.813,0.246 2.886,-5.214 3.898,-4.96 1.56,0.395 -2.376,13.632 1.364,15.643 2.051,1.103 4.552,-2.166 13.058,-5.341 4.253,-1.589 9.301,-3.473 10.913,-1.717 2.074,2.261 -2.632,9.385 -3.118,10.11 -4.129,6.154 -7.2,5.585 -16.175,14.307 -2.119,2.059 -4.312,4.046 -6.432,6.105 C 5.623,5.906 4.058,7.659 2.533,7.249 1.972,7.098 0.425,6.386 -0.195,1.336"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1158" />
                            </g>
                            <g id="g1160" transform="translate(824.4941,339.3613)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -1.609,4.916 6.288,11.626 8.77,13.734 4.401,3.741 9.969,8.471 18.709,9.538 11.571,1.415 20.668,-4.576 22.411,-5.722 5.9,-3.885 5.886,-6.643 11.108,-8.203 7.057,-2.11 12.749,1.234 14.615,-1.526 C 76.729,6.17 75.749,3.413 74.444,1.907 72.632,-0.186 69.85,-0.26 65.285,-0.382 60.789,-0.502 58.175,-0.571 55.151,0.954 50.962,3.067 52.064,5.767 48.33,8.202 45.24,10.218 40.684,9.801 31.57,8.966 23.622,8.237 22.261,7.199 21.632,6.104 20.338,3.854 22.252,1.563 20.463,-1.335 19.425,-3.017 17.835,-3.778 16.565,-4.388 12.993,-6.101 9.574,-5.557 7.016,-5.15 4.303,-4.72 3.222,-4.018 2.924,-3.815 1.099,-2.576 0.256,-0.781 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1162" />
                            </g>
                            <g id="g1164" transform="translate(817.8682,332.4941)">
                                <path class="pulau_ku"
                                    d="m 0,0 v 0 c -0.894,-0.006 -5.873,-0.106 -7.795,-3.243 -2.423,-3.954 1.871,-9.705 3.313,-11.637 4.47,-5.987 10.72,-8.197 15.59,-9.919 4.239,-1.499 12.663,-4.477 22.801,-2.671 6.861,1.223 10.747,3.967 12.278,2.289 1.478,-1.621 -1.369,-5.037 -2.338,-13.734 -0.422,-3.783 -0.719,-6.737 0.779,-7.631 1.927,-1.149 6.156,1.51 8.574,4.578 1.048,1.329 2.549,3.741 3.314,12.4 0.655,7.424 0.983,11.136 -0.196,15.833 C 55.277,-9.577 53.755,-3.512 48.136,0.381 44.603,2.829 38.118,5.34 33.909,2.861 32.201,1.855 32.754,1.138 27.283,-5.15 25.62,-7.062 24.34,-8.41 22.217,-9.348 c -1.032,-0.455 -2.778,-1.226 -4.872,-0.954 -2.571,0.335 -3.594,1.972 -7.406,4.77 -2.071,1.52 -3.883,2.589 -5.067,3.243"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1166" />
                            </g>
                            <g id="g1168" transform="translate(900.8877,142.4971)">
                                <path class="pulau_ku"
                                    d="m 0,0 c 0.277,0.23 -2.356,2.553 -3.459,5.999 -1.182,3.69 0.2,6.151 3.459,16.129 2.893,8.858 2.936,10.41 4.287,10.683 3.563,0.717 8.699,-8.127 10.913,-14.879 0.968,-2.953 3.963,-12.086 0,-21.747 -2.043,-4.982 -5.17,-8.236 -9.354,-12.59 -3.92,-4.079 -5.162,-3.782 -9.744,-8.394 -5.62,-5.655 -6.722,-8.784 -8.575,-8.393 -2.885,0.609 -3.564,8.906 -3.897,12.971 -0.172,2.097 -0.366,4.635 0,8.013 0.631,5.824 3.276,17.334 8.184,17.931 C -4.301,6.195 -0.408,-0.339 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1170" />
                            </g>
                            <g id="g1172" transform="translate(849.8291,97.0967)">
                                <path class="pulau_ku"
                                    d="M 0,0 C 5.577,10.925 10.21,18.87 11.692,18.312 13.096,17.785 10.857,9.943 12.082,9.538 14.373,8.779 23.864,35.651 27.673,34.718 30.196,34.1 29.225,21.521 28.842,17.932 28.511,14.828 27.972,12.684 26.894,8.394 25.792,4.012 25.266,3.083 24.555,2.289 23.541,1.156 22.544,0.734 16.369,-1.145 10.54,-2.919 8.321,-3.489 7.016,-3.815 -0.723,-5.749 -1.608,-5.426 -1.949,-4.96 -2.28,-4.508 -2.506,-3.366 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1174" />
                            </g>
                            <g id="g1176" transform="translate(779.6719,77.6387)">
                                <path class="pulau_ku"
                                    d="m 0,0 c 10.265,4.28 15.657,9.714 18.709,14.116 2.272,3.28 2.895,5.48 5.846,7.249 6.222,3.732 10.546,-1.8 19.098,0 3.139,0.661 9.368,5.274 21.826,14.498 3.883,2.874 6.071,4.577 7.406,3.816 2.113,-1.205 1.127,-8.022 -1.948,-12.972 C 69.97,25.15 67.927,22.379 61.582,18.694 50.113,12.035 46.938,15.373 40.146,9.92 34.969,5.764 34.569,2.025 28.452,-0.381 27.788,-0.643 25.411,-1.064 20.657,-1.907 10.196,-3.763 7.304,-3.863 4.287,-2.67 2.284,-1.878 0.854,-0.765 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1178" />
                            </g>
                            <g id="g1180" transform="translate(759.4043,79.5469)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -0.178,0.263 -0.209,0.534 -0.218,0.725 -0.154,3.38 5.656,9.884 8.013,13.772 4.557,7.517 4.682,10.084 5.442,10.063 0.809,-0.022 -0.958,-1.107 3.035,-3.004 0.71,-0.337 0.808,-3.239 9.453,1.335 7.754,4.102 9.867,6.222 11.302,5.341 C 38.915,27.074 38.301,21.546 35.858,17.55 34.952,16.066 34.346,15.697 25.725,9.538 20.497,5.803 18.742,4.525 15.591,3.052 13.058,1.868 11.287,1.335 9.354,0.763 6.203,-0.17 1.128,-1.672 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1182" />
                            </g>
                            <g id="g1184" transform="translate(743.8145,106.2529)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -2.518,1.195 -8.58,4.508 -12.083,11.445 -3.207,6.35 -2.608,12.449 -2.339,14.88 0.625,5.617 2.43,5.922 4.678,16.405 0.62,2.895 0.926,4.938 1.558,4.959 1.004,0.036 1.381,-5.062 3.508,-12.589 2.6,-9.198 3.957,-8.383 6.237,-17.168 1.171,-4.517 1.95,-6.7 3.507,-11.065 1.342,-3.76 2.22,-5.779 3.119,-5.722 1.762,0.11 1.129,8.061 5.066,9.538 1.357,0.508 3.207,0.229 4.288,-0.763 2.189,-2.01 -0.581,-5.28 0,-13.354 0.036,-0.508 0.222,-2.919 0,-6.104 -0.268,-3.842 -0.818,-4.372 -1.17,-4.578 -1.59,-0.932 -4.698,1.511 -6.626,3.052 C 7.133,-8.976 3.462,-5.511 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1186" />
                            </g>
                            <g id="g1188" transform="translate(703.6689,147.457)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -3.1,13.315 1.688,26.984 5.066,27.088 3.318,0.101 5.288,-12.874 8.965,-12.59 2.708,0.208 3.876,7.415 4.677,7.248 0.94,-0.194 -1.05,-10.058 -1.559,-20.601 -0.78,-16.143 2.438,-22.981 0,-24.037 C 13.804,-24.34 3.132,-13.454 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1190" />
                            </g>
                            <g id="g1192" transform="translate(685.7402,151.6533)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -6.079,-1.282 -14.593,11.38 -18.319,19.84 -2.21,5.015 -2.533,8.083 -6.626,16.786 -1.117,2.375 -2.504,5.325 -4.677,9.156 -4.277,7.544 -5.566,7.864 -7.016,11.827 -1.188,3.249 -3.344,9.141 -0.389,14.117 3.144,5.295 11.176,8.036 15.2,5.723 5.931,-3.41 -7.17,-23.642 -0.779,-28.996 1.223,-1.024 5.846,-3.815 5.846,-3.815 0,0 6.196,-3.203 11.303,-8.012 4.079,-3.84 3.244,-4.731 7.016,-7.63 3.602,-2.768 5.344,-2.71 6.626,-4.96 C 8.778,22.994 9.626,20.835 7.795,14.498 5.614,6.952 3.839,0.811 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1194" />
                            </g>
                            <g id="g1196" transform="translate(499.0449,74.9688)">
                                <path class="pulau_ku"
                                    d="m 0,0 c 0.766,0.504 1.849,1.247 3.092,2.213 1.713,1.331 8.199,6.555 13.278,15.718 8.359,15.08 2.516,22.079 10.133,29.377 5.328,5.104 7.998,1.503 15.98,6.867 9.557,6.423 8.228,13.264 20.268,27.088 1.845,2.118 10.883,12.495 13.252,11.064 2.956,-1.784 -5.286,-21.442 -10.913,-32.81 -2.966,-5.992 -5.935,-11.156 -5.457,-11.446 0.772,-0.468 7.638,13.498 22.217,25.562 8.302,6.871 16.095,10.632 21.826,13.353 16.786,7.972 21.945,5.741 35.858,14.117 8.294,4.993 11.63,8.898 13.642,7.629 3.479,-2.193 -1.705,-16.909 -7.016,-27.087 C 142.619,74.858 134.089,58.994 115.369,46.927 93.761,32.997 82.692,39.672 70.546,26.324 68.436,24.005 62.596,17.018 52.617,11.063 48.01,8.314 44.426,6.922 43.263,6.485 34.714,3.275 27.07,2.902 22.216,3.052"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1198" />
                            </g>
                            <g id="g1200" transform="translate(455.002,90.9922)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -3.241,-1.371 -8.533,9.342 -19.098,17.168 -7.461,5.527 -8.966,3.255 -20.657,9.157 -7.377,3.723 -20.548,10.371 -30.012,24.417 -5.954,8.836 -7.881,16.8 -9.355,22.891 -2.327,9.621 -5.41,22.367 1.559,31.285 1.584,2.025 4.14,5.297 7.016,4.96 5.908,-0.692 5.137,-15.667 17.54,-28.232 2.036,-2.065 6.894,-6.986 9.743,-5.724 2.455,1.088 2.085,6.173 1.559,20.984 -0.685,19.333 -0.44,21.541 0.391,21.746 2.496,0.617 9.162,-17.176 11.302,-22.89 3.784,-10.101 5.697,-15.206 7.406,-22.892 3.467,-15.594 1.775,-22.371 7.795,-27.088 4.143,-3.246 6.853,-1.531 10.523,-5.341 C -1.824,37.884 -2.38,36.423 0.39,22.892 1.585,17.052 2.973,11.051 1.559,3.434 1.148,1.219 0.771,0.326 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1202" />
                            </g>
                            <g id="g1204" transform="translate(358.4712,80.0557)">
                                <path class="pulau_ku"
                                    d="M 0,0 C -1.552,2.884 -3.037,5.642 -2.079,7.121 -0.5,9.56 6.14,6.099 7.795,8.139 9.644,10.417 3.833,17.78 -6.756,31.03 c -11.999,15.014 -14.62,18.236 -17.149,23.908 -2.96,6.638 -8.135,15.294 -4.677,19.331 2.035,2.377 6.048,2.085 6.755,2.035 C -12.67,75.641 -8.173,64.646 2.079,50.36 10.637,38.434 14.917,32.47 22.346,26.96 38.241,15.175 50.469,18.644 61.322,5.087 c 2.407,-3.007 7.15,-8.932 5.197,-13.227 -1.898,-4.174 -13.244,-4.026 -35.858,-3.56 0,0 -21.594,0.444 -27.543,7.121 C 2.718,-4.129 1.312,-2.438 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1206" />
                            </g>
                            <g id="g1208" transform="translate(244.9214,160.0693)">
                                <path class="pulau_ku"
                                    d="m 0,0 c 1.099,3.178 -5.489,-0.722 -4.417,-3.074 0.303,-0.667 -8.187,-11.742 -9.875,-26.452 -0.625,-5.454 -1.028,-9.481 1.56,-12.209 4.38,-4.619 12.287,-0.193 15.59,-4.07 4.359,-5.116 -6.912,-15.757 -2.598,-23.908 2.385,-4.508 8.157,-5.648 18.188,-7.631 8.783,-1.735 21.89,-4.325 25.985,1.527 2.126,3.039 0.898,7.283 -1.559,15.769 -3.145,10.862 -5.731,11.539 -6.756,17.296 -2.305,12.939 9.023,19.239 6.756,26.96 C 41.431,-10.88 30.99,-2.375 3.118,-0.468"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1210" />
                            </g>
                            <g id="g1212" transform="translate(250.8975,184.3369)">
                                <path class="pulau_ku"
                                    d="m 0,0 c 0.245,-0.065 1.176,4.149 2.079,4.069 1.545,-0.134 -1.767,-12.41 4.157,-20.347 5.142,-6.888 17.048,-10.241 25.465,-6.104 5.788,2.845 8.154,8.464 9.874,12.717 3.311,8.192 1.959,12.647 1.558,30.013 -0.372,16.165 -0.569,24.711 0,36.117 0.538,10.766 1.339,15.693 -1.039,16.787 C 38.415,74.945 30.292,66.003 25.984,59.518 20.481,51.232 23.763,46.014 17.669,36.117 16.17,33.683 14.771,31.948 13.512,28.487 11.48,22.905 12.73,20.859 10.394,17.296 8.183,13.924 6.42,14.775 3.638,11.191 -0.238,6.199 -0.287,0.078 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1214" />
                            </g>
                            <g id="g1216" transform="translate(465.0059,179.7588)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -5.162,7.75 -7.581,14.542 -8.834,19.33 -2.417,9.224 -0.799,12.094 -3.639,22.892 -2.522,9.589 -4.411,9.657 -6.235,17.803 -2.666,11.902 -1.308,23.699 0.519,23.91 2.016,0.232 3.968,-13.702 14.031,-35.609 6.26,-13.627 10.233,-18.529 14.032,-18.313 4.509,0.257 7.301,7.643 8.314,7.122 1.188,-0.612 -4.179,-9.957 -5.196,-22.892 -0.286,-3.638 -0.157,-6.654 0,-8.647"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1218" />
                            </g>
                            <g id="g1220" transform="translate(519.5723,166.5332)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -2.688,7.178 -5.076,16.634 -0.52,21.365 3.687,3.829 8.837,1.359 14.551,4.578 12.196,6.872 8.873,29.475 10.913,29.504 C 27.161,55.479 30.25,28.772 23.905,7.121 22.783,3.294 20.888,-2.01 16.11,-6.613 14.493,-8.171 9.655,-12.705 2.079,-13.735 c -2.573,-0.35 -4.75,-0.199 -6.237,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1222" />
                            </g>
                            <g id="g1224" transform="translate(499.3047,269.2891)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -6.899,1.095 -14.963,-6.048 -16.11,-13.227 -1.081,-6.764 4.905,-7.773 9.354,-20.856 3.799,-11.172 4.093,-24.138 4.157,-26.96 0.138,-6.062 -0.331,-8.95 0.52,-9.157 2.064,-0.5 7.988,15.692 11.433,28.996 3.993,15.417 3.107,20.972 2.599,23.399 C 11.277,-14.583 8.502,-1.35 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1226" />
                            </g>
                            <g id="g1228" transform="translate(559.5879,268.7803)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -4.076,3.744 -21.412,-7.959 -31.701,-17.805 -9.609,-9.193 -12.067,-15.805 -12.992,-20.347 -0.225,-1.106 -2.522,-12.961 2.598,-15.77 3.684,-2.019 9.327,1.672 12.992,4.07 4.52,2.956 12.486,9.262 21.827,27.978 C -1.052,-9.401 2.496,-2.294 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1230" />
                            </g>
                            <g id="g1232" transform="translate(572.5791,262.6758)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -13.109,-3.271 -18.202,-19.179 -19.228,-22.383 -2.677,-8.362 -4.317,-22.528 1.559,-25.434 4.28,-2.117 11.304,2.354 15.071,6.104 7.326,7.293 3.657,13.179 11.433,26.452 4.068,6.944 7.463,9.413 6.236,12.209 C 13.503,0.521 5.784,1.443 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1234" />
                            </g>
                            <g id="g1236" transform="translate(624.0273,269.2891)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -6.809,-2.477 -16.553,-9.445 -15.59,-16.278 0.657,-4.663 7.367,-7.518 20.787,-13.227 10.515,-4.472 15.821,-6.666 18.189,-4.578 3.477,3.064 -0.893,12.541 -5.197,21.874 C 13.061,-1.086 9.415,0.539 7.276,1.018 4.56,1.625 2.281,0.829 0,0"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1238" />
                            </g>
                            <g id="g1240" transform="translate(524.7451,280.4375)">
                                <path class="pulau_ku"
                                    d="m 0,0 c -2.854,-3.692 -2.825,-5.421 -2.315,-6.316 1.515,-2.66 9.194,-1.34 19.488,0.508 11.489,2.064 12.653,3.371 17.149,2.544 4.848,-0.892 4.743,-2.641 13.512,-6.104 5.737,-2.266 9.325,-3.683 14.292,-3.816 7.341,-0.196 13.005,2.537 15.07,3.561 7.1,3.523 6.409,6.318 13.512,9.411 5.817,2.533 10.039,2.295 10.394,4.324 0.307,1.762 -2.507,4.034 -5.198,5.087 C 89.501,11.706 85.438,6.663 74.598,4.366 69.824,3.354 71.249,4.468 50.692,4.112 42.355,3.968 38.188,3.896 34.063,3.604 25.799,3.019 21.511,2.207 14.055,2.586 10.067,2.789 6.817,3.248 4.701,3.604"
                                    style="fill:#344716;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path1242" />
                            </g>
                        </g>
                    </g>
                </g>
            </g>
        </svg>
    </div>
</body>

<div class="modal fade" id="modal_pulau">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close tidak" data-dismiss="modal">&times;</button>
                <h1 class="modal-title">Ingin pergi ke pulau tersebut?</h1>
                <div class="row">
                    <div class="col-sm-6" id="team_here">
                        <!-- DIISI get_team.php -->
                    </div>
                    <div class="col-sm-6">
                        <!-- LOKASI SAAT INI -->
                        <h3 id="modal_saat_ini">Pulau tersebut adalah lokasi anda saat ini.</h3>

                        <!-- JEMBATAN -->
                        <div id="modal_saat_jembatan">
                            <!-- pulau_ku on click -->
                        </div>

                        <!-- TIKET PESAWAT -->
                        <div id="modal_saat_tiket" class="row custom_row">
                            <h3>Pergi menggunakan <b>1 tiket pesawat</b>.</h3>
                            <div class="col-sm-4 text-right">
                                <h1 style="color: red;"><b>-1</b></h1>
                            </div>
                            <div class="col-sm-8 text-left" style="margin-bottom: 15px">
                                <img src="assets/image/Tiket.png" alt="" width="100%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <button id="ya" type="button" class="btn btn-success" style="width: 100%;">YA</button>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-danger tidak" style="width: 100%;">TIDAK</button>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default tidak" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_ban">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="modal-title">Tidak dapat berpindah pulau!</h1>
                    <p>Anda <b>di-BAN</b> untuk masuk ke pulau tersebut.</p>
                    <img src="assets\image\TBL (2).png" alt="" width="100%">
                    <!-- <div class="text-center">
                        <button type="button" class="btn btn-success" style="width: 75%; font-size: x-large;">
                            CLOSE
                        </button>
                    </div> -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_permanent">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center>
                    <h1 class="modal-title">Shield Permanen Pulau</h1>
                </center>
                <center>
                    <img src="assets\image\shield pulau.png" alt="" width="50%">
                </center>
                <div class="text-center">
                    <p>Pasang <b>Shield Pulau Permanen</b> untuk melindungi jembatan Anda yang terhubung pada pulau ini dari bencana dan serangan bom dari tim lawan</p>
                    <button id="shield_pulau" type="button" class="btn btn-success" style="width: 75%; font-size: x-large;">
                    50.000 <img src="assets\image\Bridge Coin.png" alt="" width="32px">
                    </button>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_tdk_bisa">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="modal-title">Tidak dapat berpindah pulau!</p>
                    <p>Anda tidak memiliki <b>jembatan</b> yang terhubung ke pulau tersebut ataupun <b>tiket
                            pesawat</b> untuk
                        terbang ke pulau tersebut.</p>
                    <p>Beli <b>tiket pesawat</b> / bahan untuk membangun <b>jembatan</b> di <b>SHOP</b></p>
                    <div class="text-center">
                        <a href="shop.php" type="button" class="btn btn-success" style="width: 75%; font-size: x-large;">SHOP</a>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_build">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="session_tipe">
                <input id="session_tipe_jembatan" name="session_tj" type="hidden" value="">
            </form>

            <!-- Modal Header -->
            <div class="modal-header" style='font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";'>
                <h1 class="modal-title"style ='margin-left: auto;'>Bangun Jembatan</h1>
                <button style="margin-top:-7px" type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body"
                style='font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";'>
                <div class="container">
                    <div class='row' style="width:40%; ">
                        <h4>Pilih tipe jembatan yang ingin dibangun:</h4>
                        <div class='col-sm-4'>
                            <img id="jmbkayu" onclick="on('jmbkayu')" class="card-img-top g_jembatan"
                                src="assets/image/jembatan Kayu.png" alt="Card image">
                        </div>

                        <div class='col-sm-4'>
                            <img id="jmbbaja" onclick="on('jmbbaja')" class="card-img-top g_jembatan"
                                src="assets/image/jembatan Baja.png" alt="Card image">
                        </div>

                        <div class='col-sm-4'>
                            <img id="jmbbeton" onclick="on('jmbbeton')" class="card-img-top g_jembatan"
                                src="assets/image/jembatan Beton.png" alt="Card image">
                        </div>
                    </div>
                    <div class="row" style="width:40%">

                        <!-- Jembatan Kayu -->
                        <div class="col-12 jembatan hidden" id="desckayu">
                            <br>
                            <center>
                                <h1>Jembatan Kayu</h1>
                            </center>
                            <h4>Bahan-bahan yang diperluhkan:</h4>
                            <p>
                                1x pekerja <br>
                                3x kayu
                            </p>
                        </div>

                        <!-- Jembatan Baja -->
                        <div class="col-12 jembatan hidden" id="descbaja">
                            <br>
                            <center>
                                <h1>Jembatan Baja</h1>
                            </center>
                            <h4>Bahan-bahan yang diperluhkan:</h4>
                            <p>
                                2x pekerja <br>
                                2x besi <br>
                                1x kayu<br>
                                1x semen<br>
                                1x pasir
                            </p>
                        </div>

                        <!-- Jembatan Beton -->
                        <div class="col-12 jembatan hidden" id="descbeton">
                            <br>
                            <center>
                                <h1>Jembatan Beton</h1>
                            </center>
                            <h4>Bahan-bahan yang diperluhkan:</h4>
                            <p>
                                2x pekerja<br>
                                3x besi<br>
                                3x semen<br>
                                2x pasir<br>
                                2x kayu
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button id="build" type="button" class="btn btn-success" data-dismiss="modal"
                        >BUILD</button>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="modal_upgrade">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" style='font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";'>
                    <h1 class="modal-title"style ='margin-left: auto;'>Upgrade Jembatan</h1>
                    <button style="margin-top: -7px;" type="button" class="close" data-dismiss="modal">&times;</button>
                    
                </div>

                <!-- Modal body -->
                <div class="modal-body"
                    style='font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";'>
                    <div class="container">
                        <div class="row" style="width:70%; margin-top:-2%; margin-left:-15px">

                            <!-- Jembatan Kayu -->
                            <div class="col-12 jembatan hidden" id="upkayu">
                                
                                <h3 >Jembatan Kayu</h3>
                                
                                <h4>Bahan yang diperlukan:</h4>
                                <p>
                                    1x Shield Jembatan Kayu
                                    <img src="assets/image/shield jembatan kayu-01.png" width="200px" height="200px">
                                </p>
                            </div>

                            <!-- Jembatan Baja -->
                            <div class="col-12 jembatan hidden" id="upbaja">
                            
                                <h1 >Jembatan Baja</h1>
                                
                                <h4>Bahan yang diperlukan:</h4>
                                <p>
                                    1x Shield Jembatan Baja
                                    <img src="assets/image/shield jembatan baja-01.png" width="200px" height="200px">
                                </p>
                            </div>

                            <!-- Jembatan Beton -->
                            <div class="col-12 jembatan hidden" id="upbeton">
                            
                                <h1 >Jembatan Beton</h1>
                                
                                <h4>Bahan yang diperluhkan:</h4>
                                <p>
                                    1x Shield Jembatan Beton
                                    <img src="assets/image/shield jembatan beton-01.png" width="200px" height="200px">
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <p>
                            <img src="assets/image/bridge coin.png" width="30px" height="30px">
                            <b id="harga">8500</b>

                            <button id="upgrade" type="button" class="btn btn-success" data-dismiss="modal">UPGRADE</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="modal_destroy">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style='font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";'>
                <h1 class="modal-title" style ='margin-left: auto;'>Hancurkan Jembatan</h1>
                <button style="margin-top:-7px" type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body"
                style='font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";'>
                <div class="container">
                    <div class="row" style="width:50%;">

                        <!-- Jembatan Kayu -->
                        <div class="col-12 jembatan hidden" id="destkayu">
                            
                            <h3 style=" margin-top: -15px">Jembatan Kayu</h3>
                            
                            <h4>Bom yang diperlukan:</h4>
                            <p>
                                1x Bom level 1
                                <img src="assets/image/BOMB LV 1.png" width="100px" height="100px">
                            </p>
                        </div>

                        <!-- Jembatan Kayu Proteksi -->
                        <div class="col-12 jembatan hidden" id="destkayup">
                            
                            <h3 style=" margin-top: -15px">Jembatan Kayu Proteksi</h3>
                            
                            <h4>Bom yang diperlukan:</h4>
                            <p>
                                1x Bom level 2
                                <img src="assets/image/BOMB LV 2.png" width="100px" height="100px">
                            </p>
                        </div>

                        <!-- Jembatan Baja -->
                        <div class="col-12 jembatan hidden" id="destbaja">
                            
                            <h3 style=" margin-top: -15px">Jembatan Baja</h3>
                            
                            <h4>Bom yang diperlukan:</h4>
                            <p>
                                1x Bom level 3
                                <img src="assets/image/BOMB LV 3.png" width="100px" height="100px">
                            </p>
                        </div>

                        <!-- Jembatan Baja Proteksi -->
                        <div class="col-12 jembatan hidden" id="destbajap">
                            
                            <h3 style=" margin-top: -15px">Jembatan Baja Proteksi</h3>
                            
                            <h4>Bom yang diperlukan:</h4>
                            <p>
                                1x Bom level 4
                                <img src="assets/image/BOMB LV 4.png" width="100px" height="100px">
                            </p>
                        </div>

                        <!-- Jembatan Beton -->
                        <div class="col-12 jembatan hidden" id="destbeton">
                            
                            <h3 style=" margin-top: -15px">Jembatan Beton</h3>
                        
                            <h4>Bom yang diperluhkan:</h4>
                            <p>
                                1x Bom level 5
                                <img src="assets/image/BOMB LV 5.png" width="100px" height="100px">
                            </p>
                        </div>

                        <!-- Jembatan Beton Proteksi -->
                        <div class="col-12 jembatan hidden" id="destbetonp">
                            
                            <h3 style=" margin-top: -15px">Jembatan Beton Proteksi</h3>
                            
                            <h4>Bom yang diperluhkan:</h4>
                            <p>
                                1x Bom level 6
                                <img src="assets/image/BOMB LV 6.png" width="100px" height="100px">
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button id="destroy" type="button" class="btn btn-success" data-dismiss="modal">DESTROY</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_treasure">
    <div class="modal-dialog">
        <div class="modal-content" style="text-align: center; font-size: large;">
            <div class="modal-header">
                <h4 class="modal-title">
                    <h1>TREASURE CLUE</h1>
                </h4>
            </div>
            <div class="modal-body">
                <img src="assets/1.png" alt="" style="width: 100%;">
                <i>Selamat! kamu berhasil menemukan treasure skill <b>Penggandaan</b>. Cara mendapatkan skill nya bisa
                    kamu tanyakan di <b><a href="https://youtu.be/dQw4w9WgXcQ"> Pos Penukaran Skill.</a></b> Tukarkan di
                    pos penukaran dan dapatkan hadiahnya segera sebelum kehabisan, karena hanya terbatas untuk beberapa
                    kelompok aja lho!</i>
                <br><br>Link Pos Pennukaran Skill: <a href="https://youtu.be/dQw4w9WgXcQ">https://meet.google.com</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_bencana">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style='font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";'>
                <h1 class="modal-title"style ='margin-left: auto;'>Terjadi Bencana!</h1>
                <button style="margin-top: -7px;" type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>

            <!-- Modal body -->
            <div class="modal-body"
                style='font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";'>
                <div class="container">
                    <div class="row" style="width:100%; margin-top:-2%; margin-left:-15px">

                        <!-- Jembatan Beton -->
                        
                        <div class="col-12 jembatan hidden" id="upbeton">

                            <p>Bencana akan menurunkan tingkatan dari jembatan anda bahkan sampai hancur </p>
                            <center><img src="assets/image/angin beliung.png" alt="" style="width: 50%;"></center>
                            <p>Untuk mempelajari lebih lanjut silakan ke :</p>
                            <a href="#" class="btn btn-info" role="button" style="width: inherit;">Info</a>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <p>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_info">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="session_tipe">
                <input id="session_tipe_jembatan" name="session_tj" type="hidden" value="">
            </form>

            <!-- Modal Header -->
            <div class="modal-header">
                <h1 class="modal-title"style ='margin-left: auto;'>Info Jembatan</h1>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>

            <!-- Modal body -->
            <div class="modal-body"
                style='font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";'>
                <div class="container">
                    <div id="info" class="row" style="width:50%">
                        
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button id="build" type="button" class="btn btn-success" data-dismiss="modal"
                        >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modal_skill">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="containerAll">
                <div class="content row px-5">

                </div>

                <div class="d-flex justify-content-center backbutton">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modal_konfirmasi">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="confirm-msg">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="test_map.js"></script>

<script>
function pindah() {
    document.body.style.animation = "1s ease-out 0s 1 slideInLeft";
    setTimeout(() => {
        document.location.href = "cobadestroyjembatan.html";
    }, 1000);
}
</script>

</html>