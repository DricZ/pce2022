<?php
include 'phps/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scaleable=no">
    <meta http-equiv="Cache-Control" content="no-store" />

    <meta name="description" content="Petra Civil Expo">
    <meta name="author" content="">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" /> -->


    <!-- CSS -->
    <!-- <link rel="stylesheet" href="style/style.css"> -->

    <link rel="icon" href="assets/pce_icon.ico" type="image/x-icon">

    <!-- CSS for fonts -->
    <link rel="stylesheet" href="style/style_timeline.css">
    <link rel="stylesheet" href="./assets/fonts/Industry/stylesheet.css" />
    <link href="http://fonts.cdnfonts.com/css/monument-extended" rel="stylesheet">


    <link rel="shortcut icon" type="image/png" href="assets/icons/32x32.ico" sizes="32x32" />
    <link rel="shortcut icon" type="image/png" href="assets/icons/16x16.ico" sizes="16x16" />

    <title>Hello!</title>
    <script type="text/javascript">
        message = "IT Division Petra Civil Expo 2021 🦊 ";

        function step() {
            message = message.substr(1) + message.substr(0, 1);
            document.title = message.substr(0, 15);
        }
    </script>

    <!-- chaffle -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/chaffle@2.1.0/src/chaffle.min.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/pixi.js/dist/pixi.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pixi-filters/dist/pixi-filters.js"></script>


    <!-- Bootstrap  -->
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> -->

    <!-- lib -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <!-- Normalize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <style type="text/css">
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
            overflow-x: hidden;
            -webkit-user-select: none;
            /* Safari */
            -ms-user-select: none;
            /* IE 10 and IE 11 */
            user-select: none;
            /* Standard syntax */

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

        nav {
            height: 100vh;
            position: fixed;
            width: 100%;
            line-height: 60px;
            z-index: 10 !important;
        }

        .navigation {
            height: 100vh;
            display: inline-block;
            overflow: hidden !important;
        }

        .menu {
            position: absolute;
            right: 0;
            /* background-color:rgba(0,0,0,0.5); */
            writing-mode: tb-rl;
            transform: rotate(-180deg);
            padding-top: 2rem;
            overflow: hidden !important;
        }

        /* width */
        ::-webkit-scrollbar {
            width: 5px;

        }

        ::-webkit-scrollbar:hover {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: white;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: black;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: black;
        }

        .divide {
            width: 1px;
            background: black;
            height: 92vh;
        }

        nav ul {
            line-height: 60px;
            list-style: none;
            overflow: hidden;
            padding: 0;
            text-align: right;
            margin: 0;
            padding-bottom: 30px;
            padding-right: -5px;
            transition: 1s;
        }

        nav ul hr {
            width: 10px;
        }

        nav ul li {
            display: inline-block;
            padding: 0 30px;
        }

        nav ul li a {
            color: black;
            font-size: 16px;
        }

        nav ul li a:hover {
            color: black;
            text-decoration: underline;
        }

        .menu-icon {
            line-height: 60px;
            width: 100%;
            padding: 15px 24px;
            cursor: pointer;
            color: #fff;
            display: none;
        }

        @media(max-width: 786px) {
            nav ul {
                max-height: 0px;
                background: #a29d99;
            }

            nav.black ul {
                background: #a29d99;
            }

            nav ul li {
                box-sizing: border-box;
                width: 100%;
                padding: 24px;
                text-align: left;
            }

            nav ul li a {
                color: #ededed;
            }

            .menu-icon {
                display: block;
            }

        }
    </style>
</head>

<body onload="setInterval(step,100)">

    <header>
        <nav>
            <div class="navigation">

                <div class="menu">
                    <!-- <div class="divide"></div> -->
                    <ul>
                        <li><a href="index.php">Petra Civil Expo 2021</a></li>
                        <li>
                            <hr>
                        </li>
                        <li><a href="#team-id">About</a></li>
                        <li>
                            <hr>
                        </li>
                        <li><a href="#" onClick="alert('please kindly dm us :)')">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <style>
        .main {
            width: 200vw;
            height: 100vh;
            position: absolute;
        }

        .wrap {
            display: inline-flex;
            position: absolute;
            left: 25%;
            padding-bottom: 40px;
        }

        .dea {
            top: 180%;
        }

        .calvert {
            top: 240%;
        }

        .hans {
            top: 300%;
        }

        .bagus {
            top: 360%;
        }

        .jimlee {
            top: 420%;
        }

        .second {
            width: 400px;
            height: 400px;
            padding-bottom: 25px;
            background: aqua;
            /* position:relative; */

        }

        .explain {
            padding-left: 50px;
        }

        .profile {
            top: 25px;
            left: -5%;
            max-width: 350px;
            max-height: 350px;
        }

        .background {
            position: absolute;
        }

        .front {
            position: absolute;
            z-index: 1000;
            transition: .5s;
        }

        .front:hover {
            transform: scale(1.1);
        }

        .it-division {
            margin-top: -4rem;
            width: 100%;
            left: 18%;
            text-align: left;
            position: relative;
            font-size: 300pt;
            line-height: 30rem;
        }

        .team-title {
            top: 125%;
            position: absolute;
            font-size: 250pt;
            z-index: 998;
            /* mix-blend-mode: exclusion; */
        }

        .negative {
            -webkit-backdrop-filter: invert();
            backdrop-filter: invert();
            top: 200px;
            left: 20%;
            width: 500px;
            height: 400px;
            z-index: 15;
            position: absolute;
        }

        .logo {
            line-height: 60px;
            position: fixed;
            float: left;
            top: 45%;
            left: 20%;
            letter-spacing: 2px;
        }

        .foot {
            background-color: black;
            position: absolute;
            top: 480%;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
            text-align: center;
            color: white;
        }

        @media (min-width: 1300px) and (max-width: 1400px) {
            .it-division {
                left: 12%;
            }
        }

        @media (min-width: 1210px) and (max-width: 1300px) {
            .wrap {
                left: 20%;
            }

            .it-division {
                left: 10%;
            }
        }

        @media (min-width: 1000px) and (max-width: 1210px) {
            .wrap {
                left: 18%;
            }

            .it-division {
                left: 10%;
            }
        }

        @media only screen and (max-width: 1210px) {
            .second {
                width: 350px;
                height: 350px;
            }

            .profile {
                max-width: 300px;
            }

            .iv {
                max-width: 300px;
                max-height: 300px;
            }

            .it-division {
                font-size: 250pt;
                left: 12%;
            }

            .team-title {
                font-size: 200pt;
            }
        }

        @media only screen and (max-width: 768px) {
            nav {}

            .it-contain {
                width: 139vw;
                height: 150%;
                overflow: hidden !important;
                position: relative;
            }

            .it-division {
                left: 0% !important;
                margin-left: -18px;
                font-size: 150pt;
                width: max-content;
            }

            .negative {
                left: 0%;
            }

            .team-title {
                font-size: 125pt;
            }

            .menu {
                display: none;
            }

            .wrap {
                display: table;
            }

            body {
                overflow-x: hidden;
            }

            .main {
                width: 0 !important;
            }

            .explain {
                padding-left: 0;
                padding-top: 25px;
                margin-left: -15%;
            }

            .calvert {
                top: 260%;
            }

            .hans {
                top: 340%;
            }

            .bagus {
                top: 420%;
            }

            .jimlee {
                top: 500%;
            }

            .foot {
                top: 580%;
                padding-top: 50px;
                max-width: 500px;
            }

            h2 {
                font-size: 1.5em;
            }

            h3 {
                font-size: 1.25em;
            }

            p {
                font-size: 1em;
            }

        }

        @media (min-width: 768px) and (max-width: 992px) {
            .wrap {
                left: 10%;
            }


        }
    </style>
    <div class="negative">
        <div class="logo">
            <a href="http://pce.petra.ac.id/">
                <img draggable="false" class="logo-head" src="assets\pce_logo monochrome.png" alt="PCE" style="width:250px; height:auto;" class="d-inline-block" loading="lazy">
            </a>
        </div>
    </div>
    <div class="main">
        <div class="it-contain">
            <div class="it-division">
                IT DI<a data-chaffle="en" class="vision" style="color:black;">V</a><br>ISIO<a data-chaffle="ja-hiragana" data-chaffle-speed="80" data-chaffle-delay="300" class="vision" style="color:black;">N</a>
            </div>
        </div>
        <div class="team-title" id="team-id">
            <a>MEET<br>THE<br>TEAM.</a>
        </div>
    </div>
    <div class="one">
        <div class="wrap dea">
            <div class="second dea">
                <img draggable="false" src="./foto/Dea.jpg" class="profile background" style="filter:invert();">
                <div class="profile iv" style="width:350px; height:350px;backdrop-filter:invert();z-index:999;position:absolute"></div>
                <img draggable="false" src="./foto/Dea.png" class="profile front">
            </div>
            <div class="explain dea" style="font-family:Consolas;color:black;z-index:1000;">
                <h2 style="color:black;font-weight:bolder;">&lt;<span style="color:red;">h2</span>&gt;<b>A<a data-chaffle="en" data-chaffle-speed="50" data-chaffle-delay="300" class="name" style="color:black;">U</a>DRICO</b>&lt;/<span style="color:red;">h2</span>&gt;</h2>
                <h3 style="cursor:pointer;">
                    <a href="https://www.instagram.com/dricz21_/" target="_blank">@dricz21_</a>
                </h3>
                <p>NANTI DIISI</p>
            </div>
        </div>
    </div>
    <div class="two">
        <div class="wrap calvert">
            <div class="second calvert">
                <img draggable="false" src="./foto/calvert.jpg" class="profile background" style="filter:invert();">
                <div class="profile iv" style="width:350px; height:350px;backdrop-filter:invert();z-index:999;position:absolute"></div>
                <img draggable="false" src="./foto/calvert.png" class="profile front">
            </div>
            <div class="explain calvert" style="font-family:Consolas;color:black;z-index:1000;">
                <h2 style="color:black;font-weight:bolder;">&lt;<span style="color:red;">h2</span>&gt;<b>AL<a data-chaffle="en" data-chaffle-speed="50" data-chaffle-delay="300" class="name2" style="color:black;">B</a>ERT VALENTINO</b>&lt;/<span style="color:red;">h2</span>&gt;</h2>
                <h3 style="cursor:pointer;">
                    <a href="https://www.instagram.com/#/" target="_blank">@NANTIDIISI</a>
                </h3>
                <p>NANTI DIISI</p>
            </div>
        </div>
    </div>
    <div class="three">
        <div class="wrap hans">
            <div class="second hans">
                <img draggable="false" src="./foto/hans.jpg" class="profile background">
                <img draggable="false" src="./foto/hanse.png" class="profile front">
            </div>
            <div class="explain hans" style="font-family:Consolas;color:black;z-index:1000;">
                <h2 style="color:black;font-weight:bolder;">&lt;<span style="color:red;">h2</span>&gt;<b>REINER J<a data-chaffle="en" data-chaffle-speed="50" data-chaffle-delay="300" class="name3" style="color:black;">U</a>LIO</b>&lt;/<span style="color:red;">h2</span>&gt;</h2>
                <h3 style="cursor:pointer;">
                    <a href="https://www.instagram.com/reinerjulio/" target="_blank">@reinerjulio</a>
                </h3>
                <p>tes.</p>
            </div>
        </div>
    </div>
    <div class="four">
        <div class="wrap bagus">
            <div class="second bagus">
                <img draggable="false" src="./foto/bagus.jpg" class="profile background">
                <img draggable="false" src="./foto/bagus.png" class="profile front">
            </div>
            <div class="explain bagus" style="font-family:Consolas;color:black;z-index:1000;">
                <h2 style="color:black;font-weight:bolder;">&lt;<span style="color:red;">h2</span>&gt;<b>AND<a data-chaffle="en" data-chaffle-speed="50" data-chaffle-delay="300" class="name4" style="color:black;">R</a>E</b>&lt;/<span style="color:red;">h2</span>&gt;</h2>
                <h3 style="cursor:pointer;">
                    <a href="https://www.instagram.com/#/" target="_blank">@NANTIDIISI</a>
                </h3>
                <p>NANTI DIISI</p>
            </div>
        </div>
    </div>
    <div class="five">
        <div class="wrap jimlee">
            <div class="second jimlee">
                <img draggable="false" src="./foto/jimlee.jpg" class="profile background">
                <img draggable="false" src="./foto/jimlee.png" class="profile front">
            </div>
            <div class="explain jimlee" style="font-family:Consolas;color:black;z-index:1000;">
                <h2 style="color:black;font-weight:bolder;">&lt;<span style="color:red;">h2</span>&gt;<b>TONI<a data-chaffle="en" data-chaffle-speed="50" data-chaffle-delay="300" class="name4" style="color:black;"> A</a>RIANTO PUTRA</b>&lt;/<span style="color:red;">h2</span>&gt;</h2>
                <h3 style="cursor:pointer;">
                    <a href="https://www.instagram.com/#/" target="_blank">@NANTIDIISI</a>
                </h3>
                <p>NANTI DIISI</p>
            </div>
        </div>
    </div>
    <div class="foot">
        <div class="yeboi" style="text-transform: uppercase;padding:40px 40px;">
            <h5>Isaiah 40:29-31(NIV):
                He gives strength to the weary and increases the power of the weak. Even youths grow tired and weary, and young men stumble and fall;
                but those who hope in the Lord will renew their strength. They will soar on wings like eagles; they will run and not grow weary,
                they will walk and not be faint.</h5>
        </div>
    </div>
    <script>
        ! function(n) {
            n.fn.flowtype = function(i) {
                var m = n.extend({
                        maximum: 9999,
                        minimum: 1,
                        maxFont: 9999,
                        minFont: 1,
                        fontRatio: 35
                    }, i),
                    t = function(i) {
                        var t = n(i),
                            o = t.width(),
                            u = o > m.maximum ? m.maximum : o < m.minimum ? m.minimum : o,
                            a = u / m.fontRatio,
                            f = a > m.maxFont ? m.maxFont : a < m.minFont ? m.minFont : a;
                        t.css("font-size", f + "px")
                    };
                return this.each(function() {
                    var i = this;
                    n(window).resize(function() {
                        t(i)
                    }), t(this)
                })
            }
        }(jQuery);
    </script>
    <script type="text/javascript">
        console.log("%c I'm sorry if it's broken on ur device, i'm still learning how to create these custom css -sikara", "text-align:center;font-size:25px;background: #222; color: white");
        $(".foot").css({
            'max-width': ($("nav").width() + 'px')
        });



        /*!
         * Chaffle
         * Shuffle Characters Randomly.
         * http://blivesta.github.io/chaffle
         * License : MIT
         * Author : blivesta (http://blivesta.com/)
         */
        (function(root, factory) {
            if (typeof define === 'function' && define.amd) {
                define([], factory)
            } else if (typeof exports === 'object') {
                module.exports = factory()
            } else {
                root.Chaffle = factory()
            }
        })(this, function() {
            'use strict'

            function extend() {
                var extended = {}
                var deep = false

                if (Object.prototype.toString.call(arguments[0]) === '[object Boolean]') {
                    deep = arguments[0]
                    i++
                }

                function merge(obj) {
                    for (var prop in obj) {
                        if (Object.prototype.hasOwnProperty.call(obj, prop)) {
                            if (deep && Object.prototype.toString.call(obj[prop]) === '[object Object]') {
                                extended[prop] = extend(true, extended[prop], obj[prop])
                            } else {
                                extended[prop] = obj[prop]
                            }
                        }
                    }
                }

                for (var i = 0; i < arguments.length; i++) {
                    var obj = arguments[i]
                    merge(obj)
                }

                return extended
            }

            function Chaffle(element, options) {
                var data = {}
                var dataLang = element.getAttribute('data-chaffle')
                var dataSpeed = element.getAttribute('data-chaffle-speed')
                var dataDelay = element.getAttribute('data-chaffle-delay')

                if (dataLang.length !== 0) data.lang = dataLang
                if (dataSpeed !== null) data.speed = Number(dataSpeed)
                if (dataDelay !== null) data.delay = Number(dataDelay)

                this.options = {
                    lang: 'en',
                    speed: 20,
                    delay: 100,
                }

                this.options = extend(this.options, options, data)
                this.element = element
                this.text = this.element.textContent
                this.substitution = ''
                this.state = false
                this.shuffleProps = []
                this.reinstateProps = []
            }

            Chaffle.prototype = {
                constructor: Chaffle,
                init: function() {
                    var self = this

                    if (self.state) return

                    self.clearShuffleTimer()
                    self.clearReinstateTimer()

                    self.state = true
                    self.substitution = ''
                    self.shuffleProps = []
                    self.reinstateProps = []

                    var shuffleTimer = setInterval(function() {
                        self.shuffle()
                    }, self.options.speed)

                    var reinstateTimer = setInterval(function() {
                        self.reinstate()
                    }, self.options.delay)

                    self.shuffleProps = shuffleTimer
                    self.reinstateProps = reinstateTimer
                },

                shuffle: function() {
                    this.element.textContent = this.substitution

                    var textLength = this.text.length
                    var substitutionLength = this.substitution.length

                    if ((textLength - substitutionLength) > 0) {
                        this.element.textContent = this.element.textContent + this.randomStr()
                    } else {
                        this.clearShuffleTimer()
                    }
                },

                reinstate: function() {
                    var textLength = this.text.length
                    var substitutionLength = this.substitution.length

                    if (substitutionLength < textLength) {
                        for (var i = 0; i < textLength - substitutionLength; i++) {
                            this.element.textContent = this.substitution = this.text.substr(0, substitutionLength + 1)
                        }
                    } else {
                        this.clearReinstateTimer()
                    }

                    this.state = false
                },

                clearShuffleTimer: function() {
                    return clearInterval(this.shuffleProps)
                },

                clearReinstateTimer: function() {
                    return clearInterval(this.reinstateProps)
                },

                randomStr: function() {
                    var str
                    switch (this.options.lang) {
                        case 'en':
                            str = String.fromCharCode(33 + Math.round(Math.random() * 99))
                            break

                        case 'ja':
                            str = String.fromCharCode(19968 + Math.round(Math.random() * 80))
                            break

                        case 'ja-hiragana':
                            str = String.fromCharCode(12353 + Math.round(Math.random() * 85))
                            break

                        case 'ja-katakana':
                            str = String.fromCharCode(12449 + Math.round(Math.random() * 85))
                            break

                        case 'ua':
                            str = String.fromCharCode(1040 + Math.round(Math.random() * 55))
                            break

                        case 'cn':
                            str = String.fromCharCode(19968 + Math.floor(Math.random() * 20901))
                            break
                    }
                    return str
                },
            }

            return Chaffle
        })



        var vision = ".vision";
        setRandom(1200, vision);

        var name = ".name";
        setRandom(20000, name);

        var name2 = ".name2";
        setRandom(15000, name2);

        var name2 = ".name3";
        setRandom(10000, name2);

        var name2 = ".name4";
        setRandom(13000, name2);

        function setRandom(duration, classcok) {
            setTimeout(() => {
                var elements_input = document.querySelectorAll(classcok);
                var nextDur = 1000 + Math.random() * 1000;
                elements_input.forEach(function(el) {
                    var chaffle = new Chaffle(el, {
                        lang: 'en', // default: 'en'
                        // 'en' || 'ja' || 'ja-hiragana' || 'ja-katakana' || 'ua'
                        speed: 80, // default: 20
                        delay: 300, // default: 100


                    });
                    chaffle.init();
                });
                setRandom(nextDur, classcok);
            }, duration);
        }
    </script>

</body>