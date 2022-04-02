<?php
require_once 'header.php';
$_SESSION['page'] = 'mini_games';
?>

<head>
    <title>MINI GAMES</title>
</head>

<style>
    #title {
        /* height: 15vh; */
        font-size: 50pt;
        font-family: 'Spartan', sans-serif;
        font-weight: 800;
        text-transform: uppercase;
    }

    @media screen and (max-width: 1200px) and (min-width:992px) {
        #decor-hidden-post {
            left: 10% !important;
        }
    }

    @media screen and (max-width: 992px) {
        #decor-hidden-post {
            display: none;
        }
    }

    body {
        overflow: hidden;
    }

    #all {
        position: relative;
        top: 100vh;
    }

    .news-card {
        position: relative;
        top: 100vh;
    }
</style>
<div class="container my-5 pb-5" id="all">
    <div class="row col-12 justify-content-center mt-5">
        <div id="decor-hidden-post">
            <!-- svg logo -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 100px;">
                <g class="" transform="translate(0,0)">
                    <path d="M155.084 125.945c-.46 0-.926.01-1.397.034-5.646.285-12.097 2.464-20.707 8.204-21.824 14.55-51.912 60.395-67.834 110.005-15.92 49.61-18.046 102.25 5.936 132.966 4.142 5.306 13.387 8.93 23.756 8.846 10.216-.084 20.682-3.838 26.482-9.44 1.022-1.47 9.296-13.336 21.39-27.404 12.863-14.96 28.716-31.686 45.835-38.777 41.863-17.34 93.024-17.34 134.887 0 17.118 7.092 32.97 23.818 45.834 38.778 12.095 14.068 20.37 25.933 21.39 27.404 5.8 5.602 16.267 9.356 26.483 9.44 10.368.085 19.612-3.54 23.755-8.846 23.973-30.704 21.885-83.575 5.978-133.287-15.907-49.713-46.054-95.526-67.783-109.624-11.498-7.46-19.198-8.73-26.285-7.64-7.088 1.093-14.347 5.197-22.866 11.07-17.038 11.746-38.898 30.02-73.952 30.02-35.212 0-57.115-18.514-74.13-30.356-8.505-5.92-15.73-10.025-22.743-11.078-1.315-.198-2.65-.312-4.03-.317zm212.904 48.75a16 16 0 0 1 16 16 16 16 0 0 1-16 16 16 16 0 0 1-16-16 16 16 0 0 1 16-16zM135 183h18v32h32v18h-32v32h-18v-32h-32v-18h32v-32zm200.988 23.695a16 16 0 0 1 16 16 16 16 0 0 1-16 16 16 16 0 0 1-16-16 16 16 0 0 1 16-16zm64 0a16 16 0 0 1 16 16 16 16 0 0 1-16 16 16 16 0 0 1-16-16 16 16 0 0 1 16-16zm-32 32a16 16 0 0 1 16 16 16 16 0 0 1-16 16 16 16 0 0 1-16-16 16 16 0 0 1 16-16zm-160 7h32v18h-32v-18zm64 0h27.897v18h-27.897v-18z" fill="rgb(32,31,31)" fill-opacity="1"></path>
                </g>
            </svg>
        </div>
        <p class="text-center" id="title">Mini Games</p>

    </div>
    <div class="row col-12 justify-content-center mb-4">
        <h3 id="sub-heading">&nbsp</h3>
    </div>
    <div class="row-cols-1">

        <div class="card news-card mb-4">
            <div class="card-body">
                <h4 class="card-title">Main Room 01</h4>
                <p class="card-text">Click here to join the ZOOM: <a href='http://petra.id/RallyGames1' target="_blank">petra.id/RallyGames1</a></p>
                <p class="card-text">
                    Meeting ID: <b>819 5186 0445</b><br>
                    Passcode: <b>861498</b>
                </p>
                <p class="card-text">
                    Pos yang tersedia:<br>
                <ol type="a">
                    <li style="color: #635F5F;">Welcome to The Jungle</li>
                    <li style="color: #635F5F;">Bridge Language</li>
                    <li style="color: #635F5F;">Just Do It!</li>
                </ol>
                </p>
            </div>
        </div>

        <div class="card news-card mb-4">
            <div class="card-body">
                <h4 class="card-title">Main Room 02</h4>
                <p class="card-text">Click here to join the ZOOM: <a href='http://petra.id/RallyGames2' target="_blank">petra.id/RallyGames2</a></p>
                <p class="card-text">
                    Meeting ID: <b>893 0856 8368</b><br>
                    Passcode: <b>035297</b>
                </p>
                <p class="card-text">
                    Pos yang tersedia:<br>
                <ol type="a">
                    <li style="color: #635F5F;">The Collector</li>
                    <li style="color: #635F5F;">Who is The Undercover?</li>
                    <li style="color: #635F5F;">Four in a Row</li>
                </ol>
                </p>
            </div>
        </div>

        <div class="card news-card mb-4">
            <div class="card-body">
                <h4 class="card-title">Main Room 03</h4>
                <p class="card-text">Click here to join the ZOOM: <a href='http://petra.id/RallyGames3' target="_blank">petra.id/RallyGames3</a></p>
                <p class="card-text">
                    Meeting ID: <b>934 4702 6534</b><br>
                    Passcode: <b>629586</b>
                </p>
                <p class="card-text">
                    Pos yang tersedia:<br>
                <ol type="a">
                    <li style="color: #635F5F;">Super Hearing</li>
                    <li style="color: #635F5F;">The Third Eye</li>
                    <li style="color: #635F5F;">Who's in The Box?</li>
                </ol>
                </p>
            </div>
        </div>

    </div>

    <div class="footer my-5">
        &nbsp
    </div>

</div>
</body>
<script>
    $("#all").animate({
        top: '0'
    }, function() {
        /* ANIMATION */
        var time = 200;
        $(".news-card").each(function() {
            $(this).animate({
                top: '0'
            }, time);
            time += 100;
            //console.log(time);
        });
        /* ANIMATION */
    });
    console.log("in");
    setTimeout(function() {
        console.log("int");
        $('body').css({
            overflow: 'auto'
        });

    }, 1500);
</script>

</html>