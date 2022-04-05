<?php
if (!isset($_SESSION['usernameAdmin'])) {
    header("Location: index.php");
    exit();
}

require_once 'phps/connect.php';
require_once 'phps/include.php';
require_once '../assets/protection/ie.php';
?>

<head>
    <link rel="icon" href="../../assets/pce_icon.ico" type="image/x-icon">
</head>

<style>
    html {
        background-color: rgb(32, 31, 31);
        font-family: "Industry";
    }

    ::-webkit-scrollbar {
        width: 12px;
    }

    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
    }

    nav li {
        text-decoration: none;
        list-style-type: none;
        font-size: 12pt;
    }

    nav ul {
        justify-content: center;
        text-align: center;
        display: contents;
    }

    li {
        color: white;
    }

    #menu:hover li {
        color: gray;
    }

    #menu {
        transition: 0.3s;
    }

    .exit:hover svg {
        fill: red !important;
    }

    #menu:hover {
        transform: scale(1.2);
        transition: 0.3s;
    }

    #menu:hover svg {
        fill: #30d1c9;
    }

    nav svg {
        fill: #fff;
    }

    nav {
        background-color: rgb(32, 31, 31, 0.2);
    }

    @media screen and (min-width:992px) and (max-width: 1200px) {
        nav svg {
            height: 60px !important;
            width: 60px !important;
        }

        nav li {
            font-size: 10pt !important;
        }
    }

    @media screen and (max-width: 992px) and (min-width: 768px) {
        nav svg {
            height: 56px !important;
            width: 56px !important;
        }
    }

    @media screen and (max-width: 768px) and (min-width: 576px) {
        nav svg {
            height: 48px !important;
            width: 48px !important;
        }

    }

    @media screen and (max-width: 576px) {
        nav svg {
            height: 40px !important;
            width: 40px !important;
        }

    }
</style>

<body>
    <nav class="navbar fixed-bottom justify-content-center" role="navigation">
        <ul>
            <!-- exit -->
            <a class="nav-link active exit" id="menu" href="phps/signout.php">
                <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 64px; width: 64px;">
                        <g class="" transform="translate(0,0)" style="">
                            <path d="M217 28.098v455.804l142-42.597V70.697zm159.938 26.88l.062 2.327V87h16V55zM119 55v117.27h18V73h62V55zm258 50v16h16v-16zm0 34v236h16V139zm-240 58.727V233H41v46h96v35.273L195.273 256zM244 232c6.627 0 12 10.745 12 24s-5.373 24-12 24-12-10.745-12-24 5.373-24 12-24zM137 339.73h-18V448h18zM377 393v14h16v-14zm0 32v23h16v-23zM32 471v18h167v-18zm290.652 0l-60 18H480v-18z"></path>
                        </g>
                    </svg></li>
                <li>Sign Out</li>
            </a>
        </ul>
    </nav>

</body>