<?php
require_once 'header.php';
$_SESSION['page'] = 'inventory';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVENTORY</title>
</head>

<style>
    #containerAll {
        max-height: 100vh;
        height: 100vh;
        width: 100%;
        top: 5000px;
        /* padding: 2%; */
    }

    #containerAll p {
        color: white;
    }

    .content {
        margin: 0;
    }

    .inventory-item {
        position: relative;
        height: 15vw;
        width: 100%;
        margin-top: 5%;
        padding: 5%;
        top: 100vh;
        border-radius: 15px 15px;
        box-shadow: 0 0 2em rgba(255, 255, 255, 0.1);
        background-color: rgb(0, 0, 0, 0.3);
        font-family: 'Spartan', sans-serif;
        font-weight: 500;
    }

    .inventory-item i {
        width: 100%;
    }

    .resource-name {
        font-size: 2vw;
        margin: 0;
    }

    .resource-quantity {
        font-size: 3vw;
    }

    .inventory-header {
        font-size: 50pt;
        font-family: 'Spartan', sans-serif;
        font-weight: 800;
        text-transform: uppercase;
    }

    #decor-inventory {
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


    @media screen and (max-width: 1200px) and (min-width:992px) {
        #decor-inventory {
            left: 10% !important;
        }
    }

    @media screen and (max-width: 992px) {
        #decor-inventory {
            display: none;
        }
    }

    .icons {
        border-radius: 25px;
        width: 10vw;
    }

    body {
        overflow: hidden;
    }
</style>

<body>
    <div class="container mb-2">
        <div class="inventory-header mt-5">
            <div id="decor-inventory">
                <!-- svg logo -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 622 512" style="width: 90px;">
                    <g class="" transform="translate(80,0)" style="">
                        <path d="M186.438 20.56l-13.184 26.365c6.8-.26 13.626-.488 20.47-.686l3.84-7.68h116.874l3.77 7.54c6.838.187 13.658.408 20.456.66l-13.102-26.2H186.437zm69.56 42.742c-45.757.056-91.452 1.566-135.38 4.363-3.24 50.58-8.4 100.987-.786 145.824 89.297 12.395 180.102 12.985 272.764-.054 7.055-30.988 5.117-84.68-1.04-145.89-43.974-2.893-89.73-4.3-135.558-4.244zm153.783 5.54c6.42 64.12 9.113 119.825-1.135 155.22l-1.61 5.56-5.726.842c-98.8 14.528-195.613 13.81-290.605.002l-6.285-.914-1.246-6.23c-9.89-49.49-4.085-102.785-.664-154.42-4.89.354-9.765.72-14.602 1.107-8.596 58.568-9.39 116.957-.05 175.292 110.24 12.088 222.275 12.205 336.203-.01 8.502-57.83 8.29-116.25-.017-175.313-4.725-.4-9.485-.776-14.262-1.14zM255.966 92.3c32.526-.025 65.067 2.746 97.574 8.39l7.46 1.295v7.572c0 15.554 1.683 35.105-12.69 50.25-9.912 10.444-25.655 17.337-51.31 20.585v18.164h-82v-18.452c-23.992-3.37-39.352-10.175-49.363-20.185C150.807 145.093 151 125.56 151 109.56v-7.594l7.484-1.278c32.444-5.54 64.955-8.362 97.48-8.386zm.012 17.994c-28.96.022-57.913 2.444-86.858 6.996.265 12.28 1.635 22.296 9.243 29.904 5.914 5.914 16.952 11.416 36.637 14.582v-29.22h82v29.51c21.367-3.115 32.66-8.755 38.254-14.65 7.033-7.41 7.696-17.502 7.73-30.124-29-4.63-58.006-7.02-87.007-6.998zM233 150.56v30h46v-30h-46zm209.674 92.42c-.503 3.625-1.042 7.25-1.61 10.87.214 2.352.42 4.706.63 7.06L471 290.213v-22.24l-28.326-24.995zm-373.485.12L41 267.973v22.24l29.318-29.318c.205-2.327.406-4.655.616-6.982-.618-3.605-1.202-7.21-1.745-10.813zm354.634 20.397c-10.29 1.09-20.564 2.076-30.824 2.967v74.095h16v66h-16v80.615c10.318-.633 20.63-1.313 30.928-2.082 9.445-74.01 6.478-147.698-.104-221.596zm-335.576.03C81.725 338.09 78.58 412.1 88.06 485.1c10.324.79 20.638 1.504 30.94 2.145V406.56h-16v-66h16v-74.024c-10.266-.902-20.517-1.903-30.752-3.01zm286.752 4.4c-10.014.76-20.014 1.424-30 1.992v70.64h30v-72.632zm-238 .085v72.547h30v-70.55c-10.015-.568-20.014-1.237-30-1.997zm190 2.825c-47.65 2.173-94.984 2.19-142 .078v19.314c23.95-5.165 47.8-7.652 71.516-7.59 23.638.06 47.145 2.654 70.484 7.626v-19.43zM68.05 288.62L41 315.67v56.89h23.06c.376-27.987 1.88-55.975 3.99-83.94zm375.948.047c2.12 27.872 3.61 55.83 3.957 83.892H471v-56.89l-27.002-27.003zm-187.52 11.95c-23.68-.063-47.487 2.577-71.478 8.052v31.89h16v18.443c17.033 5.346 31.73 8.493 46 9.426v-2.87h18v2.868c14.27-.932 28.967-4.08 46-9.425V340.56h16v-31.866c-23.42-5.267-46.907-8.016-70.523-8.078zM121 358.558v30h22v-23h18v23h22v-30h-62zm208 0v30h22v-23h18v23h22v-30h-62zM201 377.8v28.76h-16v15.857c48.528 10.865 95.713 10.664 142 .045V406.56h-16V377.8c-16.332 4.747-31.283 7.52-46 8.326v11.433h-18v-11.434c-14.717-.806-29.668-3.58-46-8.326zM41 390.56v14h23.14c-.09-4.667-.143-9.334-.163-14H41zm407.012 0c-.027 4.663-.083 9.33-.18 14H471v-14h-22.988zM137 406.56v19.798c6.137 7.214 11.222 9.77 14.934 9.844 3.734.075 8.697-2.122 15.066-9.79V406.56h-6v7h-18v-7h-6zm208 0v19.798c6.137 7.214 11.222 9.77 14.934 9.844 3.734.075 8.697-2.122 15.066-9.79V406.56h-6v7h-18v-7h-6zm-304 16v35.154c5.596 5.51 8.677 8.25 11.846 9.306 2.454.818 7.713 1.15 15.045 1.317-1.544-15.25-2.586-30.51-3.204-45.778H41zm406.27 0c-.628 15.224-1.674 30.483-3.21 45.78 7.358-.168 12.635-.5 15.094-1.32 3.17-1.056 6.25-3.795 11.846-9.306V422.56h-23.73zM185 440.842v49.498c47.55 1.51 94.877 1.446 142-.074V440.9c-46.316 10.03-93.74 10.185-142-.057zm-48 9.123v38.318c10.01.54 20.01 1.008 30 1.408v-39.678c-4.86 2.786-10.01 4.293-15.43 4.184-5.192-.104-10.036-1.624-14.57-4.232zm208 0v39.654c10.01-.403 20.01-.878 30-1.412v-38.194c-4.86 2.786-10.01 4.293-15.43 4.184-5.192-.104-10.036-1.624-14.57-4.232z" fill="rgb(32,31,31)" fill-opacity="1"></path>
                    </g>
                </svg>
            </div>
            <p class="text-center">Inventory</p>
        </div>

    </div>
    <div id="containerAll">

        <div class="content row px-5">

        </div>

        <div class="d-flex justify-content-center backbutton">
            <!-- <i class="fa fa-angle-double-down" style="font-size: 4vw;"></i> -->
        </div>
    </div>
</body>
<script>
    var ajaxcall;
    var time = 100;

    function show() {
        $(".content").html("<span>Harap tunggu...</span>");

        if (ajaxcall != null) {
            ajaxcall.abort();
        }

        $.ajax({
            url: "phps/refresh_inventory.php",
            type: "get",
            dataType: "json",
            success: function(result) {
                var data = result;
                var str = "";
                if (data.length == 0) {
                    str += `
                        <div id="no-content-msg-skill">
                            <img src="assets/image/nothing-to-say.svg" width="35%">
                            <h3>You have nothing in your inventory...</h3>
                        </div>
                        `;
                } else {
                    //loop dari data
                    for (var i = 0; i < data.length; i++) {
                        var d = data[i];
                        str += `
                        <div class="col-12 col-md-4">
                            <div class="` + d.resource_name + ` inventory-item d-flex top-item">
                                <i class="mr-5"> <img src="assets/image/` + d.image + `" class="icons"> </i>
                                <div class="inventory-info">
                                    <p class="resource-name">` + d.resource_name + `</p>
                                    <p class="resource-quantity"> x` + d.count + `</p>
                                </div>
                            </div>
                        </div>
                    `;
                    }
                }

                $(".content").html(str);

                $(".inventory-item").hide();
                $(".inventory-item").toggleClass("d-flex");
            },
            error: function(result) {
                //Error handling
                alert("ERROR!");
                // console.log();
            },
            complete: function() {

                $("#containerAll").hide();
                $(".inventory-item").hide();
                $("#containerAll").show();
                $("#containerAll").animate({
                    top: '0'
                }, 500, function() {

                    /* STARTUP ANIMATION */

                    $(".inventory-item").each(function() {
                        //console.log("tes");
                        $(this).show();
                        $(this).toggleClass("d-flex");
                        $(this).animate({
                            top: '0'
                        }, time += 70);

                    }, function() {
                        $('body').css({
                            overflow: 'auto'
                        });
                    });
                });
            }
        });
    }

    $(".backbutton").hide();
    $(".backbutton").toggleClass("d-flex");

    $(document).ready(function() {
        show();
    });
</script>

</html>