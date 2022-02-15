<?php
require_once 'header.php';
$_SESSION['page'] = 'history';
?>

<head>
    <title>HISTORY</title>
</head>

<style>
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

.history {
    position: relative;
    top: 100vh;
}

.news-card {
    top: 100vh;
}

#containerAll {
    position: relative;
    top: 100vh;
}
</style>
<div class="container my-5 pb-5" id="containerAll">
    <div class="row col-12 justify-content-center mt-5">
        <div id="decor-hidden-post">
            <!-- svg logo -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="11 15 523 527" style="width:80px;">
                <g class="" transform="translate(48,80)" style="">
                    <path
                        d="M311.9 47.95c-17.6 0-34.6.7-50.7 2.43L244.6 93.5l-4.9-40.04c-2.5.46-5 .94-7.5 1.47-9.1 1.94-15.1 7.22-20.3 14.87-5.2 7.65-8.9 17.5-12.1 26.6C191 121.5 184 148 178.4 175c6 5.1 12 10.3 17.9 15.4l30.7-17.6 33.8 26.1 51.9-19.7 61 24.5-6.8 16.7-54.4-21.8-54.7 20.7-32.2-24.9-14.9 8.5c19.6 17.3 38.6 34.4 56.5 51.2l14-6.4 33.9 16.1 31.2-13.1 24.2 23.3-12.4 13-15.8-15.1-27.6 11.7-33-15.8c6.9 6.7 13.6 13.2 20.1 19.7l1.7 1.8 19.5 76.3-7.8-5.7-53 .4-38.1-17.8-42.4 14.6-5.8-17 49.2-17 41.1 19.2 24.7-.2-70.7-51.7c-19.7 4.6-39.4 2.8-58.1-3.7-4.2 44.4-5.9 85.7-7 118.7-.4 10.7 2.7 23 7.5 32.5 4.9 9.5 11.7 15.4 15 16.1 5.2 1.2 19 3.2 37.7 5.1l12.4-39 19.1 41.7c16.7 1.2 35 2 53.5 2.2 28.2.3 57.1-.9 82-4.7 15.8-2.3 29.6-6 40.7-10.4-11.8-5.1-21.6-10.6-29.1-16.6-11.1-8.9-18.2-19.3-17.3-30.9v.2c5.4-96.4 10.8-188.8 30.3-286l.1-.4.1-.4c5.3-17.9 17.9-39.86 36.1-55.83-13.9-2.06-28.6-4-43.7-5.66l-22.3 25.3-2.2-27.7c-19-1.64-38.4-2.71-57.4-2.92h-5.7zm148.5 20.44c-4.7 3.69-9.2 8.03-13.3 12.73 12.1 8.18 21.4 23.38 21.8 36.98.3 7.8-1.9 14.9-7.7 21.4-5.8 6.4-15.6 12.4-31.6 15.8l3.8 17.6c18.6-4 32.3-11.5 41.2-21.4 9-9.9 12.7-22.2 12.3-34-.6-19.3-11.1-37.59-26.5-49.11zM25.44 71.91c-.24 1.61-.38 3.43-.38 5.62.1 7.69 2.03 18.17 5.83 30.17 3.41 10.7 8.27 22.5 14.35 34.8 10.63-5.3 20.59-11 28.41-18.1-4.42 12.5-10.15 24.7-18.6 36.5 4.14 7.2 8.63 14.4 13.45 21.5 10.64-5.3 20.72-13 29.52-26.1-3.3 16-8.47 30.6-18.27 41.8 6.53 8.5 13.5 16.8 20.75 24.5 8.7-9.3 15.6-21 20.7-34.9 3.8 18.5 2.6 35.3-5.7 49.4 8 7.2 16.3 13.7 24.8 19.1 6.1-14 8.9-30.6 8.5-49.7 9.2 23.7 11.3 42.9 9.6 59.5 20.2 9.2 40.8 12 61.3 6.1l4.2-1.3 69.3 50.6-5.9-22.8c-73-72.8-175.4-156.7-261.86-226.69zM312.8 123.9l33.2 13.8 31.3-9.9 5.4 17.2-37.5 11.9-33.6-14-28.8 8.1-4.8-17.4zm107.3 236.2c-.7 0-1.3.1-2 .1-3.5.1-7.2.5-11.1 1.3l3.4 17.6c12.2-2.3 20-.4 24.5 2.5 4.4 2.9 6.3 6.8 6.4 12.5.1 9.3-7 23-23.3 32.5 5.4 2.9 11.9 5.9 19.3 8.7 14.4-11.6 22.1-26.8 22-41.4-.1-10.7-5.2-21.2-14.6-27.4-6.7-4.3-15-6.5-24.6-6.4z"
                        fill="rgb(32,31,31)" fill-opacity="1"></path>
                </g>
            </svg>
        </div>
        <h1 id="title">HISTORY</h1>

    </div>
    <div class="row col-12 justify-content-center mb-4">
        <h3 id="sub-heading">Bridge Money Income History</h3>
    </div>
    <div class="container col-md-8 col-12">
        <div class="history row-cols-1">

        </div>
    </div>

    <div class="footer my-5">
        &nbsp
    </div>

</div>
</body>

<script>
function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
}
$('.history').hide();

function show() {
    $(".history").html("<span>Harap tunggu...</span>");

    $.ajax({
        url: "phps/refresh_history_money.php",
        type: "get",
        dataType: "json",
        success: function(result) {
            var data = result;
            var str = "";
            //loop dari data
            if (data.length == 0) {
                str += `
                        <div id="no-content-msg-info" style="margin-top: 20vh;width: 380px;">
                            <img src="assets/image/nothing-to-say.svg" width="35%">
                            <h3>You have never received Bridge Money.<br> Go play some Mini Games!</h3>
                        </div>
                    `;
            } else {
                for (var i = 0; i < data.length; i++) {
                    var d = data[i];
                    str += `
                        <div class="card news-card mb-4">
                            <div class="card-body p-2">
                                <div class="row col-12">
                                    <div class="col-8 pt-3 pl-5">
                                        <h4>` + d.name +
                        `</h4>
                                    </div>
                                    <div class="col-4 pt-3 text-right">
                                        <h4><img src="assets/image/bridge dollar.png" width="20%" style="border-radius:0;margin-top:-4px;">` + `</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                }
            }
            $(".history").html(str);
        },
        error: function(result) {
            //Error handling
            alert("ERROR!");
            // console.log();
        },
        complete: function() {
            /* ANIMATION */
            $('.history').show();
            $('.history').animate({
                top: '0'
            }, function() {
                var time = 200;
                $(".news-card").each(function() {
                    $(this).animate({
                        top: '0'
                    }, time);
                    time += 100;
                    console.log(time);
                });
            });
            /* ANIMATION */
        }
    });
}

$(document).ready(function() {
    show();
    $('#containerAll').animate({
        top: '0'
    });
    setTimeout(function() {
        console.log("int");
        $('body').css({
            overflow: 'auto'
        });

    }, 1500);
});
</script>

</html>