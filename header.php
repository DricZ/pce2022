<?php
require_once 'phps/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-Control" content="no-store" />

    <meta name="description" content="Petra Civil Expo">
    <meta name="author" content="">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" /> -->


    <!-- CSS -->
    <!-- <link rel="stylesheet" href="style/style.css"> -->

    <!-- CSS for fonts -->
    <link rel="stylesheet" href="style/style_timeline.css">
    <link rel="stylesheet" href="./assets/fonts/Industry/stylesheet.css" />
    <link href="https://fonts.cdnfonts.com/css/monument-extended" rel="stylesheet">

    <!-- ICON -->
    <link rel="icon" href="assets/pce_icon.ico" type="image/x-icon">

    <!-- For apple devices -->

    <!-- Bootstrap  -->
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- lib -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <!-- jquery confirm -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    <!-- data table -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    </script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    <!-- owl carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.12.5/dist/sweetalert2.all.min.js" integrity="sha256-vT8KVe2aOKsyiBKdiRX86DMsBQJnFvw3d4EEp/KRhUE=" crossorigin="anonymous"></script>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"crossorigin="anonymous"></script> -->

    <!-- Normalize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <style>
        * {
            -webkit-touch-callout: none;
            /* iOS Safari */
            -webkit-user-select: none;
            /* Safari */
            -khtml-user-select: none;
            /* Konqueror HTML */
            -moz-user-select: none;
            /* Old versions of Firefox */
            -ms-user-select: none;
            /* Internet Explorer/Edge */
            user-select: none;
            /* Non-prefixed version, currently
                                  supported by Chrome, Edge, Opera and Firefox */
        }

        :root {
            --whitebrown: #ece6da;
            --graybrown: #a29d99;
            --blackbrown: #171314;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            scroll-behavior: smooth !important;

        }

        body {
            font-family: "Industry";
            font-weight: lighter;
            text-decoration: none;
        }

        header {
            width: 100%;
            font-family: 'Industry';
        }

        .content {
            width: 94%;
            margin: 4em auto;
            font-size: 20px;
            line-height: 30px;
            text-align: justify;
        }

        .logo {
            line-height: 60px;
            position: fixed;
            float: left;
            margin: 16px 46px;
            color: black;
            font-weight: bold;
            font-size: 20px;
            letter-spacing: 2px;
        }

        nav {
            position: fixed;
            width: 100%;
            line-height: 60px;
            z-index: 10000;
        }

        nav ul {
            line-height: 60px;
            list-style: none;
            background: rgba(0, 0, 0, 0);
            overflow: hidden;
            color: #fff;
            padding: 0;
            text-align: right;
            margin: 0;
            padding-right: 20px;
            transition: 0.5s;
        }

        nav.black ul {
            background: #a29d99;
        }

        nav.black ul li a {
            color: white;
        }

        nav.black ul li a:hover {
            color: black;
        }

        nav ul li {
            display: inline-block;
            padding: 16px 40px;
        }

        nav ul li a {
            text-decoration: none;
            color: #00CED1;
            font-size: 16px;
        }

        nav ul li a:hover {
            text-decoration: none;
            color: black !important;
        }

        .menu-icon {
            width: 100%;
            background: #a29d99;
            text-align: right;
            box-sizing: border-box;
            padding: 23px 24px 12px 0px;
            cursor: pointer;
            color: #fff;
            display: none;
        }

        img {
            transition: 1s;
        }



        @media(max-width: 1024px) {

            .logo {
                position: fixed;
                top: 0;
                margin-top: 16px;
                color: #ededed;
            }

            nav ul {
                max-height: 0px;
                background: #a29d99;
            }

            nav.black ul {
                background: #a29d99;
            }

            .showing {
                max-height: 34em;
            }

            nav ul li {
                box-sizing: border-box;
                width: 100%;
                /* padding: 24px; */
                padding: 1px;
                margin-left: 5vw;
                text-align: left;
            }

            nav ul li a {
                color: #ededed;
            }

            .menu-icon {
                display: block;
            }
        }

        .jconfirm-title {
            line-height: 1.2;
        }

        /* .register {
            -webkit-animation: name 2s infinite;
        } */

        /* @-webkit-keyframes name {
            0% {
                color: white;
            }

            100% {
                color: yellow;
            }
        } */
    </style>
</head>

<body>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".menu-icon").on("click", function() {
                $("nav ul").toggleClass("showing");
            });
        });

        // Scrolling Effect

        $(window).on("scroll", function() {
            if ($(window).scrollTop()) {
                $('nav').addClass('black');
                $('.logo-head').attr("src", "assets/pce_logo monochrome.png");
            } else {
                $('nav').removeClass('black');
                $('.logo-head').attr("src", "assets/pce_logo color.png");
            }
        })
    </script>

    <header>
        <nav>
            <div class="menu-icon">
                <i class="fa fa-bars fa-2x"></i>
            </div>
            <div class="logo">
                <a href="http://pce.petra.ac.id/">
                    <img class="logo-head" src="assets\pce_logo color.png" alt="PCE" style="width:100px; height:29px;" class="d-inline-block" loading="lazy">
                </a>
            </div>
            <div class="menu">
                <ul>
                    <?php
                    if (isset($_SESSION['page'])) {
                        if ($_SESSION['page'] == 'home') {
                    ?>
                            <li><a href="../index.php" style="color: white;">Home</a></li>
                            <li><a href="../index.php#about" style="color: white;">About</a></li>
                            <li><a href="cap.php" style="color: white;">Civil Analysis & Photography</a></li>
                            <li><a href="#contactus" style="color: white;">Contact Us</a></li>
                        <?php
                        } else if ($_SESSION['page'] == 'cap') {
                        ?>
                            <li><a href="../index.php" style="color: black;">Home</a></li>
                            <li><a href="../index.php#about" style="color: black;">About</a></li>
                            <li><a href="#contactus" style="color: black;">Contact Us</a></li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </nav>
    </header>

    <script>
        function signOut() {
            $.confirm({
                title: 'SIGN OUT',
                type: 'orange',
                theme: 'modern',
                icon: "fas fa-question",
                backgroundDismissAnimation: 'random',
                closeAnimation: 'scale',
                columnClass: "logOut col-md-5",
                buttons: {
                    logoutUser: {
                        text: 'SIGN OUT',
                        btnClass: 'btn-green',
                        action: function() {
                            window.location.href = "phps/signout.php";
                        }
                    },
                    cancel: {
                        text: 'CANCEL',
                        btnClass: 'btn-red',
                        action: function() {}
                    }
                },
                content: "<div style='color: black; font-size: 12pt;'>Apakah Anda yakin akan keluar? Data yang belum tersimpan akan hilang!</div>"
            });
        }
    </script>