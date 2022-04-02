<?php
require_once 'header.php';
$_SESSION['page'] = 'achievements';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACHIEVEMENTS</title>
</head>

<style>
    #containerAll {
        padding: 3%;
        height: 100vh;
        width: 100%;
        overflow: hidden;
    }

    /*U*/
    .achievement-item {
        margin: 0.5%;
        height: calc(600px - (24vw));
        width: 20%;
        position: relative;
        top: 100vh;
        max-width: 32%;
        border-radius: 15px 15px;
        box-shadow: 0 0 2em rgba(255, 255, 255, 0.2);
        background-color: rgb(32, 31, 31);
        /* background-color: black;
        border-color: white;
        border-style:double;
        border-width:7px;   */
    }

    @media screen and (min-width: 1920px) {
        .achievement-item {
            margin: 0.5%;
            height: 20vh;
            width: 20%;
            position: relative;
            top: 100vh;
            max-width: 32%;
            border-radius: 15px 15px;
            box-shadow: 0 0 2em rgba(255, 255, 255, 0.2);
            background-color: rgb(32, 31, 31);
            /* background-color: black;
        border-color: white;
        border-style:double;
        border-width:7px;   */
        }
    }

    .achievement-item img {
        max-width: 50%;
    }

    .achievement-item hr {
        border: none;
        height: 1px;
        background: linear-gradient(to right, #5b86e5, #36d1dc, #ff9190, #ffdca2);
        margin: 7px 0;
    }

    #achievement-header p {
        /* height: 15vh; */
        font-size: 50pt;
        font-family: 'Spartan', sans-serif;
        font-weight: 800;
        text-transform: uppercase;
    }

    #decor-achievement {
        background-image: linear-gradient(to right, #ffdca2, #ff9190, #36d1dc, #5b86e5);
        background-size: 300% 100%;
        animation: changeColor 10s infinite;
        width: 98px;
        height: 100px;
        border-radius: 50%;
        position: absolute;
        left: 20%;
        display: block;
    }

    @media screen and (max-width: 1298px) and (min-width:992px) {
        #decor-achievement {
            left: 10% !important;
        }
    }

    @media screen and (max-width: 992px) {
        #decor-achievement {
            display: none;
        }
    }

    .cardImage {
        max-width: 10%;
    }

    .cardText {
        max-width: 50%;
        font-size: 0.9vw;
        overflow: auto;
        font-family: 'Spartan', sans-serif;
        font-weight: 500;
        overflow: hidden;
    }

    .cardText h2 {
        font-size: 13pt;
        text-transform: uppercase;
        margin-bottom: 0;
        /* color:#ffdca2; */
    }
</style>

<?php
$timestampNew = date("m-d-Y H:i:s");
$timeArray = array(
    '03-27-2021 13:15:00',
    '03-27-2021 13:35:00',
    '03-27-2021 13:55:00',
    '03-27-2021 14:15:00',
    '03-27-2021 14:35:00',
    '03-27-2021 14:55:00',
    '03-27-2021 15:15:00',
    '03-27-2021 15:35:00',
    '03-27-2021 15:55:00',
    '03-27-2021 16:15:00'
);

for ($i = 0; $i < 8; $i++) {
    if ($timestampNew >= $timeArray[$i] && $timestampNew < $timeArray[$i + 1]) {
        $sesi = $i + 1;
        break;
    }
}
?>

<script>
    console.log(<?= $sesi; ?>);
</script>

<body>
    <div id="containerAll">

        <div id="achievement-header">
            <div id="decor-achievement">
                <!-- svg logo -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 100px;">
                    <g class="" transform="translate(0,0)" style="">
                        <path d="M305.975 298.814l22.704 2.383V486l-62.712-66.965V312.499l18.214 8.895zm-99.95 0l-22.716 2.383V486l62.711-66.965V312.499l-18.213 8.895zm171.98-115.78l7.347 25.574-22.055 14.87-1.847 26.571-25.81 6.425-10.803 24.314-26.46-2.795-18.475 19.087L256 285.403l-23.902 11.677-18.475-19.15-26.46 2.795-10.803-24.313-25.81-6.363-1.847-26.534-22.118-14.92 7.348-25.573-15.594-21.544 15.644-21.52-7.398-25.523 22.068-14.87L150.5 73.03l25.86-6.362 10.803-24.313 26.46 2.794L232.098 26 256 37.677 279.902 26l18.475 19.149 26.46-2.794 10.803 24.313 25.81 6.425 1.847 26.534 22.055 14.87-7.347 25.574 15.656 21.407zm-49.214-21.556a72.242 72.242 0 1 0-72.242 72.242 72.355 72.355 0 0 0 72.242-72.242zm-72.242-52.283a52.282 52.282 0 1 0 52.282 52.283 52.395 52.395 0 0 0-52.282-52.245z" fill="rgb(32,31,31)" fill-opacity="1"></path>
                    </g>
                </svg>
                <!-- <img src="image/info.svg" id="info-decor"> -->
            </div>
            <p class="text-center">Achievements</p>
            <h4 style="text-align: center; color: yellow; margin-top: -20px;" class="mb-3">SUB SESI TERAKHIR - LET'S GO ALL IN!</h4>
        </div>
        <div id="achievement-content">


            <!-- <div id="achievement-row-body" class="row"> -->

            <!-- <div class="card col achievement-item row p-1">
                <div class="card-body col cardText">
                    <h2>` + d.team_name + `</h2>
                    <hr>
                    <p class="mt-3">telah mendapatkan ` + d.landmark + ` di ` + d.city_name + `!</p>
                </div>
                <img src="assets/image/congress.svg" class="achievements-img card-body">
            </div> -->

            <!-- </div> -->

        </div>

    </div>
</body>
<script>
    function show() {
        // $("#achievement-row-body").html("<span>Harap tunggu...</span>");

        $.ajax({
            url: "phps/refresh_achievements.php",
            type: "get",
            dataType: "json",
            success: function(result) {
                console.log("in");
                var data = result;
                var masterString = "";
                var str = "";
                //loop dari data
                //console.log(data[0].team_name);
                if (data.length == 0) {
                    str += `
                        <div id="no-content-msg-info">
                            <img src="assets/image/nothing-to-say.svg" width="35%">
                            <h3>There is no unlocked achievement... yet.</h3>
                        </div>
                    `;
                } else {
                    str = `<div id="achievement-row-body" class="row">`;
                    var i;

                    var timeArray = new Array();
                    var startTime = new Date('03-27-2021 13:15:00');
                    timeArray.push(startTime);
                    for (let i = 0; i < 9; i++) {
                        startTime = new Date(startTime);
                        startTime.setMinutes(startTime.getMinutes() + 20);
                        timeArray.push(startTime);
                    }
                    // console.log(timeArray);
                    for (i = 0; i < data.length; i++) {
                        var d = data[i];
                        var time = new Date(d.time);
                        var sesi = '';
                        for (let i = 0; i < timeArray.length; i++) {
                            if (time >= timeArray[i] && time < timeArray[i + 1]) {
                                sesi = (i + 1);
                                break;
                            }
                        }

                        str += `
                        <div class="card col achievement-item row p-1">
                            <div class="card-body col cardText">
                                <h2 style="text-transform: none;"><b>` + d.team_name + `</b></h2>
                                <hr>
                                <p class="mt-3">Telah berhasil mendapatkan ` + d.landmark + ` di ` + d.city_name + ` pada sub-sesi ` + sesi + `!</p>
                            </div>
                        `;

                        if (d.landmark == 'Monumen Nasional') {
                            str += `
                            <img src="assets/image/monas.svg" class="achievements-img card-body">
                            `;
                        } else if (d.landmark == 'Jembatan Hotel Kamp') {
                            str += `
                            <img src="assets/image/tall-bridge.svg" class="achievements-img card-body">
                            `;
                        }
                        str += `</div>`;

                        if ((i + 1) % 3 == 0) {
                            str += '</div>';
                            masterString += str;
                            str = `<div id="achievement-row-body" class="row">`;
                        }
                    }
                }
                if (i % 3 != 0) {
                    str += '</div>';
                    masterString += str;
                }
                $("#achievement-content").html(masterString);

            },
            error: function(result) {
                //Error handling
                alert("ERROR!");
                // console.log();
            },
            complete: function() {
                /* Startup */
                var time = 200;
                $(".achievement-item").hide();
                $(".card-body").hide();
                disableColFlex();

                $(".achievement-item").each(function() {
                    $(this).show();
                    $(this).animate({
                        top: '0'
                    }, time, function() {
                        $(this).animate({
                            "flex-grow": '1'
                        }, function() {
                            $(this).children(".card-body").fadeIn();
                        });
                    });
                    time += 150;

                });
                $("#containerAll").delay(500).css({
                    overflow: 'auto'
                });


                /* Startup */
            }
        });
    }

    $(document).ready(function() {
        show();
    });

    function disableColFlex() {
        $(".achievement-item").css({
            "flex-grow": '0'
        });
        $(".achievement-item").css({
            "flex-basis": '10%'
        });
    }

    function enableColFlex() {
        $(".achievement-item").css({
            "flex-grow": '1'
        });
    }
</script>

</html>