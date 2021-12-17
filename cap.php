<?php
require_once 'phps/connect.php';
$_SESSION['page'] = 'cap';
require_once 'header.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Civil Analysis & Photography</title>
</head>

<body>
    <style>
        body {
            font-weight: normal;
            margin: 0px;
            padding: 0px;
        }

        /* width */
        html::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: var(--whitebrown);
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: var(--graybrown);
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        h2 {
            font-size: 7vh;
        }

        .info {
            min-height: 100vh;
            background: url(assets/image/bg.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            overflow-x: hidden;
        }

        .faq {
            background-color: #c7b299;
            min-height: 120vh;
        }

        .question {
            cursor: pointer;
            text-align: justify;
        }

        #lower-curve {
            display: none;
        }

        .first-btn {
            display: grid;
            place-items: end;
        }

        .second-btn {
            display: grid;
            place-items: start;
        }

        @media screen and (max-width: 893px) {
            #outline-gedung {
                display: none;
            }

            #upper-curve {
                display: none;
            }
        }

        @media screen and (max-width: 768px) {
            .first-btn,
            .second-btn {
                place-items: center;
            }

            .title {
                font-size: 37pt;
            }
        }

        .btn {
            letter-spacing: 0.1em;
            cursor: pointer;
            font-size: 12pt;
            font-weight: 400;
            max-width: 300px;
            position: relative;
            text-decoration: none;
            text-transform: uppercase;
            width: 100%;
            border-radius: 20px;
            -webkit-filter: drop-shadow(5px 5px 5px #222);
            filter: drop-shadow(5px 5px 5px #222);
            -webkit-appearance: none !important;
        }

        .btn:hover {
            text-decoration: none;
        }

        /*btn_background*/
        .effect01 {
            color: #FFF;
            border: 4px solid black;
            box-shadow: 0px 0px 0px 1px brown inset;
            background-color: #BF354D;
            overflow: hidden;
            position: relative;
            transition: all 0.3s ease-in-out;
        }

        .effect01:hover {
            border: 4px solid #666;
            background-color: #FFF;
            box-shadow: 0px 0px 0px 4px #EEE inset;
        }

        /*btn_text*/
        .effect01 span {
            transition: all 0.2s ease-out;
            z-index: 2;
        }

        .effect01:hover span {
            letter-spacing: 0.13em;
            color: #333;
        }

        /*highlight*/
        .effect01:after {
            background: #FFF;
            border: 0px solid brown;
            content: "";
            height: 155px;
            left: -75px;
            opacity: .8;
            position: absolute;
            top: -50px;
            -webkit-transform: rotate(35deg);
            transform: rotate(35deg);
            width: 50px;
            transition: all 1s cubic-bezier(0.075, 0.82, 0.165, 1);
            /*easeOutCirc*/
            z-index: 1;
        }

        .effect01:hover:after {
            background: #FFF;
            border: 20px solid brown;
            opacity: 0;
            left: 120%;
            -webkit-transform: rotate(40deg);
            transform: rotate(40deg);
        }

        .cap-logo {
            transition: 0.5s;
        }

        .cap-logo:hover {
            transform: scale(1.1);
            transition: 0.5s;
        }
    </style>

    <section class="info pb-5" id="info">
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

        <!-- logo cap -->
        <a href="https://www.instagram.com/cap_petra/" target="_blank">
            <img src="assets/image/cap.png" style="position:absolute; width:14vw; top:20vh; left:10vw;" class="cap-logo">
        </a>

        <!-- outline gedung erdc -->
        <img id="outline-gedung" src="assets/svg/outline_gedung_erdc.svg" style="position:absolute; width:30vw; bottom:-0.5vh; right:0;">

        <div class="col-md-6 col-sm-8 col-12 mx-auto" style="padding-top:15vh; padding-bottom:10px; position:relative;z-index:10;">
            <h2 style="text-align:right;font-weight:bold;" class="pt-5 pb-3 mx-5 title">Civil Analysis & Photography</h2>
            <p style="text-align:right; font-weight:bold; font-size: 14pt;" class="pb-3 mx-5">An International Online Structure Analysis Based On Photography Competition by HIMASITRA
            </p>

            <p style="text-align:justify;" class="mx-5">
                <b>Civil Analysis and Photography</b> is an international online photography and analysis competition between undergraduate students majoring in Civil Engineering. Due to Covid-19 pandemic, this year’s event will be held online. The competition will be held in 2 stages, where on the first stage, participants are required to submit their photo artwork and its analysis. Participants will also need to post their photo artwork on their Instagram account and use their analysis as the caption. The judges will assess the artworks submitted and choose the best 20 artwork to go on to the next stage. In the next stage, the participants are required to submit infographic description and analysis of their artwork, also an explanation video to provide better understanding for the judges to assess.
            </p>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 first-btn mb-4">
                <a type='button' href='http://himasitra.petra.ac.id/cap/winner.html' target='_blank' class='btn effect01' style="-webkit-appearance: none;">SEE THIS YEAR<br><b>CAP'S WINNERS</b></a>
            </div>
            <div class="col-12 col-md-6 second-btn">
                <a type='button' href='https://www.artsteps.com/view/608fff9b826b98be9ff46e2f' target='_blank' class='btn effect01' style="-webkit-appearance: none;">VISIT CAP'S 2021<br><b>ONLINE EXHIBITION</b></a>
            </div>
        </div>
    </section>

    <section>
        <?php include 'footer.php' ?>
    </section>
</body>

</html>