<?php
require_once 'header.php';
$_SESSION['page'] = 'hidden_post';
?>

<head>
    <title>Higher or Lower?</title>
</head>

<style>
    html {
        background-color: rgb(32, 31, 31) !important;
    }

    .vs {
        background: #f72e2b;
        width: 98px;
        height: 100px;
        border-radius: 50%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .vs-text {
        margin-top: 13%;
        margin-left: 13%;
        font-size: 390%;
    }

    .bet-amount {
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;
        border: 0px;
        background-color: rgb(255, 254, 254);
        width: 20%;
        text-align: center;
        font-size: 18pt;
        position: relative;
    }

    .bet-amount img {
        position: absolute;
        left: 4%;
        top: 14%;
    }

    .bet-amount input {
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;
        border: 0px;
        caret-color: transparent;
        background-color: rgb(255, 254, 254);
        padding-left: 45px;
    }

    .bet-amount input:focus {
        outline: none;
    }

    .btn-bet {
        border: 0px;
        -webkit-border-radius: 30px;
        -moz-border-radius: 30px;
        border-radius: 30px;
        font-family: 'Spartan', sans-serif;
        font-weight: 500;
        color: rgb(32, 31, 31);
        text-transform: uppercase;
        letter-spacing: 1px;
        padding-top: 12px;
    }

    .img-bet {
        height: 50vh;
        width: 70vw;
        border-radius: 10px;
    }

    .text-overlay {
        position: absolute;
        text-align: center;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgb(0, 0, 0, 0.5);
        width: 100%;
        padding-top: 10px;
    }

    .jml-search {
        font-weight: bold;
        color: rgb(167, 232, 252);
    }

    .btn-tebak {
        border: 1px solid rgb(167, 232, 252);
        padding: 1px;
        text-transform: uppercase;
        color: rgb(167, 232, 252);
        font-weight: bold;
        border-radius: 15px;
        background-color: rgb(32, 31, 31, 0.5);
        margin: 0 20%;
    }

    .btn-tebak:hover {
        background-color: rgb(167, 232, 252);
        color: rgb(32, 31, 31);
        cursor: pointer;
    }

    .prepare {
        position: absolute;
        text-align: center;
        z-index: 10;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .bet-picture-section {
        position: relative;
        width: 100vw;
    }

    .timer {
        border: 2px solid white;
        padding: 5px 15px;
        padding-top: 8px;
        border-radius: 20px;
        margin-left: 30px;
    }

    .blurr {
        filter: blur(15px);
    }

    .containerSoal {
        position: relative;
    }

    #containerAll {
        max-width: 100vw;
    }

    .navbar {
        max-width: 100vw;
    }

    #round {
        font-family: 'Spartan', sans-serif;
        font-size: 20pt;
        font-weight: 500;
        color: #ffdca2;
        text-align: center;
    }
</style>
<div id="containerAll">
    <?php
    if (!isset($_GET['hidpost'])) {
        $timestamp = strtotime(date("H:i"));

        //ISI DI SINI
        $timestamp1 = strtotime('14:00');
        $timestamp1End = $timestamp1 + (60 * 5);
        $timestamp1End = strtotime(date("H:i", $timestamp1End));

        $timestamp2 = strtotime('14:50');
        $timestamp2End = $timestamp2 + (60 * 5);
        $timestamp2End = strtotime(date("H:i", $timestamp2End));

        $timestamp3 = strtotime('15:25');
        $timestamp3End = $timestamp3 + (60 * 5);
        $timestamp3End = strtotime(date("H:i", $timestamp3End));

        $play = false;
        if ($_GET['hidpost'] == 1) {
            if ($timestamp >= $timestamp1 && $timestamp < $timestamp1End) {
                $play = true;
            }
        }
        if ($_GET['hidpost'] == 2) {
            if ($timestamp >= $timestamp2 && $timestamp < $timestamp2End) {
                $play = true;
            }
        }
        if ($_GET['hidpost'] == 3) {
            if ($timestamp >= $timestamp3 && $timestamp < $timestamp3End) {
                $play = true;
            }
        }
        $play = true;
        if ($play) {
            if ($_GET['hidpost'] > $rowTeam['status']) {
    ?>
                <div class="justify-content-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                    <h1 style="text-align: center; font-weight: bold; letter-spacing: 5px; color: red; font-size: 72pt;">GAME OVER</h1>
                    <h4 style="text-align: center; font-weight: bold; letter-spacing: 5px;" class="blue">YOUR TEAM HAVE JUST PLAYED THIS ROUND OF HIDDEN POST GAME</h4>
                    <br>
                    <h4 style="text-align: center; font-weight: bold; letter-spacing: 5px;" class="blue">STAY TUNED FOR ANOTHER!</h4>
                </div>
            <?php
            } else {
            ?>
                <!-- containerSoal -->
                <div class="row col-12 justify-content-center mt-5">
                    <h1 id="title">WELCOME TO HIDDEN POST</h1>
                </div>
                <div class="row col-12 justify-content-center mb-2 mt-3">
                    <h3 id="sub-heading">Manakah yang paling banyak dicari di Google setiap bulannya?</h3>
                </div>
                <div class="row wallet" style="background-color: rgb(32, 31, 31,0.2);position:absolute;margin-top:-10px;">
                    <img src="assets/image/bridge dollar.png" width="55px" class="mx-2 pt-1">
                    <div class="uang pr-4"><?= number_format($rowTeam['money'], 0, ',', '.'); ?></div>
                </div>
                <?php
                for ($i = 1; $i <= 5; $i++) {
                    $soal1['value'] = 0;
                    $soal2['value'] = 0;
                    while ($soal1['value'] == $soal2['value']) {
                        $rand1 = rand(1, 36);
                        $rand2 = rand(1, 36);
                        while ($rand1 == $rand2) {
                            $rand2 = rand(1, 36);
                        }

                        $soal1sql = "SELECT * FROM hidden_post WHERE id = ?";
                        $soal1stmt = $pdo->prepare($soal1sql);
                        $soal1stmt->execute([$rand1]);
                        $soal1 = $soal1stmt->fetch();

                        $soal2sql = "SELECT * FROM hidden_post WHERE id = ?";
                        $soal2stmt = $pdo->prepare($soal2sql);
                        $soal2stmt->execute([$rand2]);
                        $soal2 = $soal2stmt->fetch();
                    }
                ?>
                    <div class="container pb-2 containerSoal">
                        <div class="row col-12 justify-content-center mb-3">
                            <h5 id="round" style="font-size: 36pt;">ROUND <?= $i ?></h5>
                        </div>
                        <div class="container row bet-picture-section mb-4">
                            <div class="prepare">
                                <h2>Please input the amount of Bridge Point that you want to bet!</h2>
                            </div>
                            <div class="col-5 img-bet blurr" style="background: url('assets/image/hidden_post/<?= $soal1['image_filepath'] ?>');
        background-size: cover;">
                                <div class="text-overlay">
                                    <h5 style="font-weight: bold;">"<?= $soal1['name'] ?>"</h5>
                                    <p>memiliki</p>
                                    <h5 class="jml-search" id="ans-<?= $i ?>1"><?= number_format($soal1['value'], 0, ',', '.') ?></h5>
                                    <p>rata-rata pencarian perbulan</p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="vs blurr">
                                    <h2 class="vs-text">VS</h2>
                                </div>
                            </div>
                            <div class="col-5 img-bet blurr" style="background: url('assets/image/hidden_post/<?= $soal2['image_filepath'] ?>');
        background-size: cover;">
                                <div class="text-overlay">
                                    <h5 style="font-weight: bold;">"<?= $soal2['name'] ?>"</h5>
                                    <p>memiliki rata-rata pencarian</p>
                                    <div class="btn-tebak unclickable" data-jenis='tinggi' style="color: #49f043;">lebih tinggi</div>
                                    <div class="btn-tebak mb-2 unclickable" data-jenis='rendah' style="color: red">lebih rendah</div>
                                    <p class="mt-1">daripada <b>"<?= $soal1['name'] ?>"</b></p>
                                    <p id="ans-<?= $i ?>2" hidden><?= $soal2['value'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

                <div class="bet-amount-section row justify-content-center">
                    <?php
                    $maxBet = $rowTeam['money'] / 1000 * 1000;
                    ?>
                    <h2>Your Bet:
                        <span class="bet-amount py-1">
                            <img src='assets/image/bridge dollar.png' width='30px' style="padding-top:6px;">
                            <input type="number" step="1000" value="1000" min="1000" max="<?= $maxBet ?>" id="your-bet">
                    </h2>
                    </span>
                    <span class="btn-gradient btn-bet px-4 ml-3" id="bet-btn">submit your bet</span>
                    <span class="timer">3:00</span>
                </div>
                <div class="footer my-5">
                    &nbsp
                </div>
            <?php
            }
        } else {
            ?>
            <div class="justify-content-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <h2 style="text-align: center; font-weight: bold; letter-spacing: 5px; color: red;">NOT IN THE TIME RANGE</h2>
            </div>
    <?php
        }
    }
    ?>

</div>
<script>
    function secondToString(seconds) {
        var minuteString = parseInt(seconds / 60);
        var secondString = parseInt(seconds % 60);
        var timeString = minuteString + ':';
        if (secondString < 10) {
            timeString += ('0' + secondString);
        } else {
            timeString += secondString;
        }
        return timeString;
    }

    var answerJSON = {
        bet: '',
        answer: ["", "", "", "", ""]
    }
    // if (localStorage.getItem('answerJSON') != null) {
    //     answerJSON = JSON.parse(localStorage.answerJSON);
    //     console.log(answerJSON);
    // }

    var timerInterval;
    var timeInSeconds = 180;

    function startInterval() {
        timerInterval = setInterval(() => {
            document.querySelector('.timer').innerHTML = secondToString(timeInSeconds--);
            if (timeInSeconds == -1) {
                clearInterval(timerInterval);

                var hidpost = <?= $_GET['hidpost'] ?>;
                $.ajax({
                    url: "phps/bonus_hidden_post.php",
                    type: "post",
                    data: {
                        answer: JSON.stringify(answerJSON),
                        hidpost: hidpost
                    },
                    success: function(result) {
                        var res = $.parseJSON(result);
                        if (result == false) {
                            window.location.href = 'hidden-post.php?stat=1';
                        } else {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "Game Over!",
                                showConfirmButton: false,
                                timer: 2000
                            })
                            setInterval(() => {
                                window.location.href = 'hidden-post.php?bet=' + res['bet'] + '&ans1=' + res['answer'][0] + '&ans2=' + res['answer'][1] + '&ans3=' + res['answer'][2] + '&ans4=' + res['answer'][3] + '&ans5=' + res['answer'][4];
                            }, 2000);
                        }
                    },
                    error: function(result) {
                        //Error handling
                        alert("ERROR!");
                    }
                });
            }
        }, 1000);
    }

    function hansHide(obj) {
        obj.style.transform = "scale(0)";
        obj.style.display = "none";
    }

    function hansShow(obj) {
        obj.style.transform = "scale(1)";
        obj.style.display = "block";
    }

    function yeetRight(obj) {
        obj.style.transform = "translate(100vw, 0)";
        //obj.style.display = "none";
        console.log("tes2")
    }

    $("#your-bet").keypress(function(e) {
        e.preventDefault();
    }).keydown(function(e) {
        if (e.keyCode === 8 || e.keyCode === 46) {
            return false;
        }
    });

    $(".btn-bet").on("click", function() {
        $(this).addClass("off");
        $("#your-bet").prop("disabled", true);
        //$(".img-bet").removeClass("blur");
        //$(".vs").removeClass("blur");
        $(".prepare").css("display", "none");
        $(".btn-tebak").removeClass("unclickable");

        //GSAP
        gsap.to(".blurr", {
            duration: 0.2,
            blur: 0,
            ease: "none",
        });

        answerJSON.bet = document.querySelector('#your-bet').value;
        startInterval();
    });

    //startupAnimation
    var containerSoal = document.querySelectorAll('.containerSoal');
    for (var i = 1; i < 5; i++) {
        hansHide(containerSoal[i]);
    }

    //sliding animation
    var index = 0;
    document.querySelectorAll('.btn-tebak').forEach(item =>
        item.addEventListener('click', function() {
            if (item.dataset.jenis == 'rendah') {
                if (parseInt(document.querySelector("#ans-" + (index + 1) + "1").innerHTML) > parseInt(document.querySelector("#ans-" + (index + 1) + "2").innerHTML)) {
                    answerJSON.answer[index] = 'true';
                } else if (parseInt(document.querySelector("#ans-" + (index + 1) + "1").innerHTML) < parseInt(document.querySelector("#ans-" + (index + 1) + "2").innerHTML)) {
                    answerJSON.answer[index] = 'false';
                }
            } else if (item.dataset.jenis == 'tinggi') {
                if (parseInt(document.querySelector("#ans-" + (index + 1) + "1").innerHTML) > parseInt(document.querySelector("#ans-" + (index + 1) + "2").innerHTML)) {
                    answerJSON.answer[index] = 'false';
                } else if (parseInt(document.querySelector("#ans-" + (index + 1) + "1").innerHTML) < parseInt(document.querySelector("#ans-" + (index + 1) + "2").innerHTML)) {
                    answerJSON.answer[index] = 'true';
                }
            }

            // console.log(document.querySelector("#ans-" + (index + 1) + "1").innerHTML);
            // console.log(document.querySelector("#ans-" + (index + 1) + "2").innerHTML);
            // console.log(answerJSON);

            // localStorage.answerJSON = JSON.stringify(answerJSON);

            if (index == 4) {
                var hidpost = <?= $_GET['hidpost'] ?>;
                $.ajax({
                    url: "phps/bonus_hidden_post.php",
                    type: "post",
                    data: {
                        answer: JSON.stringify(answerJSON),
                        hidpost: hidpost
                    },
                    success: function(result) {
                        var res = $.parseJSON(result);
                        if (res == false) {
                            window.location.href = 'hidden-post.php?stat=1';
                        } else {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "Game Over!",
                                showConfirmButton: false,
                                timer: 2000
                            })
                            setInterval(() => {
                                window.location.href = 'hidden-post.php?bet=' + res['bet'] + '&ans1=' + res['answer'][0] + '&ans2=' + res['answer'][1] + '&ans3=' + res['answer'][2] + '&ans4=' + res['answer'][3] + '&ans5=' + res['answer'][4];
                            }, 2000);
                        }
                    },
                    error: function(result) {
                        //Error handling
                        alert("ERROR!");
                    }
                });
            } else {
                hansHide(document.querySelectorAll('.containerSoal')[index++]);
                hansShow(document.querySelectorAll('.containerSoal')[index]);
                yeetRight(document.querySelectorAll('.containerSoal')[index]);
                gsap.to(document.querySelectorAll('.containerSoal')[index], {
                    x: "0vw",
                    duration: 0.3,
                })
                document.querySelectorAll('.blurr')[0].style.filter = "blur(15px)";

                console.log("in");
            }
        }));

    //animation

    (function() {
        const blurProperty = gsap.utils.checkPrefix("filter"),
            blurExp = /blur\((.+)?px\)/,
            getBlurMatch = target => (gsap.getProperty(target, blurProperty) || "").match(blurExp) || [];

        gsap.registerPlugin({
            name: "blur",
            get(target) {
                return +(getBlurMatch(target)[1]) || 0;
            },
            init(target, endValue) {
                let data = this,
                    filter = gsap.getProperty(target, blurProperty),
                    endBlur = "blur(" + endValue + "px)",
                    match = getBlurMatch(target)[0],
                    index;
                if (filter === "none") {
                    filter = "";
                }
                if (match) {
                    index = filter.indexOf(match);
                    endValue = filter.substr(0, index) + endBlur + filter.substr(index + match.length);
                } else {
                    endValue = filter + endBlur;
                    filter += filter ? " blur(0px)" : "blur(0px)";
                }
                data.target = target;
                data.interp = gsap.utils.interpolate(filter, endValue);
            },
            render(progress, data) {
                data.target.style[blurProperty] = data.interp(progress);
            }
        });
    })();
</script>
</body>

</html>