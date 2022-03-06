<?php
require_once 'phps/connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$_SESSION['page'] = 'shop';

require_once 'header.php';

$username = $_SESSION['username'];

$sqlTeam = "SELECT * FROM team WHERE username = ?";
$stmtTeam = $pdo->prepare($sqlTeam);
$stmtTeam->execute([$_SESSION['username']]);
$rowTeam = $stmtTeam->fetch();


?>

<head>
    <title>CRAFT</title>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
</head>


<style>
.mainshop {
    position: relative;
}

#containerPurchaseHistory {
    position: relative;
    padding: 2%;
    top: 100vh;
}

.history-item {
    position: relative;
    width: 100%;
    height: 8vh;
    border-style: double;
    margin-top: 1%;
    top: 100vh;
}

.history-item img {
    max-width: 5%;

}

.history-item p {
    flex-grow: 1;
    font-size: 2vw;
}

#history-header {
    border-bottom: solid;
    border-color: white;
}

#history-rowcol p {
    flex-grow: 1;
    font-size: 2vw;
}


.history-item-name {
    max-width: 20%;
}

.history-item-qty {
    position: relative;
    left: 8vw;
    width: 1vw;
}

.history-item-jambeli {
    margin-left: 15%;
}

.history-item-kota {
    /* margin-left: 5%; */
    position: relative;
    left: 8.5vw;
}

.history-item-harga {
    /* margin-left: 5%; */
    position: relative;
    left: 4.5vw;
}

.purchase-goback {
    cursor: pointer;
}

#p-history,
#p-goback {
    cursor: pointer;
    top: 6%;
    background-color: white;
    color: black;
    opacity: .8;
}

#p-history p,
#p-goback p {
    font-size: 15pt;
    margin-bottom: 0 !important;
}

@media screen and (max-width: 576px) {
    #p-history {
        top: 12%;
    }
}

@media screen and (max-width: 768px) and (min-width:576px) {
    #p-history {
        top: 11%;
    }
}

@media screen and (max-width: 1200px) and (min-width:768px) {
    #p-history {
        top: 9%;
    }
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
</style>

<body>
    <div id="containerAll">
        <div class="container my-5 pb-5 mainshop">
            <div class="row col-12 justify-content-center mt-5">
                <div id="decor-hidden-post">
                    <!-- svg logo -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 70px;"
                        transform="translate(15,17)">
                        <g class="" transform="translate(0,0)" style="">
                            <path
                                d="M256.18 21c-23.242 0-46.577 3.01-63.186 8.54-8.304 2.763-14.868 6.196-18.808 9.558-3.94 3.36-5.167 5.956-5.186 8.96L168.943 57H41v14h430V57H342.967l.033-9.033c.01-3.002-1.17-5.55-5.057-8.895-3.887-3.344-10.407-6.773-18.677-9.535C302.724 24.014 279.42 21 256.18 21zM38.277 89l-10.443 94h80.9l20.243-86.36L122.81 183h81.07l17.114-86.68-3.096 86.68h75.75l-4.634-86.518L307.694 183h81.497l-6.167-86.36L403.266 183h80.9l-10.443-94H38.277zM25.834 201l-.51 4.588C39.822 226.445 52.968 235 64 235c11.32 0 24.852-8.89 39.8-30.96l.714-3.04h-78.68zm95.687 0l-.32 4.498C135.753 226.495 148.935 235 160 235c11.293 0 24.788-8.85 39.693-30.803l.63-3.197h-78.802zm95.736 0l-.156 4.352C231.69 226.455 244.908 235 256 235c11.08 0 24.28-8.525 38.85-29.576l-.237-4.424h-77.357zm94.324 0l.674 3.12c15 22.192 28.503 31.044 39.773 31.013 11.03-.03 24.212-8.62 38.772-29.637l-.32-4.496h-78.9zm95.906 0l.713 3.04C423.147 226.11 436.68 235 448 235c11.032 0 24.178-8.555 38.676-29.412l-.51-4.588h-78.68zM112 223.31C97.313 242.11 81.492 253 64 253c-13.972 0-26.884-6.906-39-19.264V487h318V279h114v208h30V233.736C474.884 246.094 461.972 253 448 253c-17.49 0-33.31-10.888-47.996-29.684-14.664 18.808-30.432 29.77-47.926 29.817-17.508.048-33.352-10.87-48.092-29.807C289.303 242.116 273.486 253 256 253c-17.492 0-33.313-10.89-48-29.69-14.687 18.8-30.508 29.69-48 29.69s-33.313-10.89-48-29.69zM55 279h258v178H55V279zm18 18v142h222V297H73zm288 0v71.064l78 .573V297h-78zM88 312h128c-108.235 8-116.31 24-128 113.11V312zm273 74.066v13.998l78 .573v-14.002l-78-.57zm0 32V487h78v-68.365l-78-.57z"
                                fill="rgb(32,31,31)" fill-opacity="1"></path>
                        </g>
                    </svg>
                </div>
                <h1 id="title">Craft</h1>

                <div class="row wallet">
                    <img src="assets/image/bridge coin.png" width="35px" class="mx-2 pt-1">
                    <div class="uang pr-4"><?= number_format($rowTeam['money'],0,',','.'); ?></div>
                </div>
                <div class="container" style="margin-top: 2cm;">
                    <div class="row">
                        anda dapat membuat bom penghancur hubungan orang.....
                    </div>
                </div>
                <div class ='justify-content-start' style = 'width: inherit;'>
                    <select class="form-control" id="jenis_bom" name="jenis_bom"
                        style="margin-top:1cm; height:40px; width:50%; font-size: 12pt;margin-bottom:2cm;" required>
                        <option value="">Select bom...</option>
                        <option value="bom1">bom lv1</option>
                        <option value="bom2">bom lv2</option>
                        <option value="bom3">bom lv3</option>
                        <option value="bom4">bom lv4</option>
                        <option value="bom5">bom lv5</option>
                        <option value="bom6">bom lv6</option>
                    </select>
                </div>
                
                <div id="boom_1" hidden>
                    <div class="row">
                        <div class="col-6" style="margin-bottom: 3cm;">
                            <h1  style="text-align: center;margin-bottom: 1cm;">BOOM LVL 1</h1>
                            <div class="row">
                                <img src="assets/image/BOMB LV 1.png" alt=""
                                    style="width: 10cm; display: block; margin-left: auto;margin-right: auto;">
                            </div>
                        </div>
                        <div class='col-6'>
                            <div class='row'>
                                <div class="col-12" style=" margin-bottom: 2cm;">
                                    <h3>deskripsi :</h3>
                                    <p style="font-size:20;">ketika anda mengunakan bom ini anda dapat menghancurkan
                                        hubungan
                                        orang</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <img src="assets/image/Black powder.png" alt="" style="width: 100px;;">
                                    <b>1x</b>
                                </div>
                                <div class="col-4">
                                    <img src="assets/image/sulfur.png" alt="" style="width: 100px;;">
                                    <b>1x</b>
                                </div>
                                <div class="col-4">
                                    <img src="assets/image/hcl.png" alt="" style="width: 100px;;">
                                    <b>1x</b>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-4">
                                    <img src="assets/image/Styrofoam.png" alt="" style="width: 100px;;">
                                    <b>1x</b>
                                </div>
                                <div class="col-4">
                                    <img src="assets/image/korek api.png" alt="" style="width: 100px;;">
                                    <b>2x</b>
                                </div>
                                <div class='col-4' style = 'margin-top: auto; margin-bottom: auto;'>
                                    <img src="assets/image/bridge coin.png" width="10%"><span id='uangbom1'>6000</span>
                                    <a href="#" class="btn btn-primary craft" id = 'Bom Lvl 1' style="text-align:right;">buat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="boom_2" hidden>
                    <div class="row">
                        <div class="col-6" style="margin-bottom: 3cm;">
                            <h1  style="text-align: center;margin-bottom: 1cm;">BOOM LVL 2</h1>
                            <div class="row">
                                <img src="assets/image/BOMB LV 2.png" alt=""
                                    style="width: 10cm; display: block; margin-left: auto;margin-right: auto;">
                            </div>
                        </div>
                        <div class='col-6'>
                            <div class='row'>
                                <div class="col-12" style=" margin-bottom: 2cm;">
                                    <h3>deskripsi :</h3>
                                    <p style="font-size:20;">ketika anda mengunakan bom ini anda dapat menghancurkan
                                        hubungan
                                        orang</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <img src="assets/image/Black powder.png" alt="" style="width: 100px;;">
                                    <b>1x</b>
                                </div>
                                <div class="col-4">
                                    <img src="assets/image/sulfur.png" alt="" style="width: 100px;;">
                                    <b>1x</b>
                                </div>
                                <div class="col-4">
                                    <img src="assets/image/hcl.png" alt="" style="width: 100px;;">
                                    <b>2x</b>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-4">
                                    <img src="assets/image/Styrofoam.png" alt="" style="width: 100px;;">
                                    <b>2x</b>
                                </div>
                                <div class="col-4">
                                    <img src="assets/image/korek api.png" alt="" style="width: 100px;;">
                                    <b>3x</b>
                                </div>
                                <div class='col-4' style = 'margin-top: auto; margin-bottom: auto;'>
                                    <img src="assets/image/bridge coin.png" width="10%"><span id='uangbom1'>10000</span>
                                    <a href="#" class="btn btn-primary craft" id = 'Bom Lvl 2' style="text-align:right;">buat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="boom_3" hidden>
                    <div class="row">
                        <div class="col-6" style="margin-bottom: 3cm;">
                            <h1  style="text-align: center;margin-bottom: 1cm;">BOOM LVL 3</h1>
                            <div class="row">
                                <img src="assets/image/BOMB LV 3.png" alt=""
                                    style="width: 10cm; display: block; margin-left: auto;margin-right: auto;">
                            </div>
                        </div>
                        <div class='col-6'>
                            <div class='row'>
                                <div class="col-12" style=" margin-bottom: 2cm;">
                                    <h3>deskripsi :</h3>
                                    <p style="font-size:20;">ketika anda mengunakan bom ini anda dapat menghancurkan
                                        hubungan
                                        orang</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <img src="assets/image/Black powder.png" alt="" style="width: 100px;;">
                                    <b>2x</b>
                                </div>
                                <div class="col-4">
                                    <img src="assets/image/sulfur.png" alt="" style="width: 100px;;">
                                    <b>2x</b>
                                </div>
                                <div class="col-4">
                                    <img src="assets/image/hcl.png" alt="" style="width: 100px;;">
                                    <b>3x</b>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-4">
                                    <img src="assets/image/Styrofoam.png" alt="" style="width: 100px;;">
                                    <b>3x</b>
                                </div>
                                <div class="col-4">
                                    <img src="assets/image/korek api.png" alt="" style="width: 100px;;">
                                    <b>4x</b>
                                </div>
                                <div class='col-4' style = 'margin-top: auto; margin-bottom: auto;'>
                                    <img src="assets/image/bridge coin.png" width="10%"><span id='uangbom1'>14250</span>
                                    <a href="#" class="btn btn-primary craft" id = 'Bom Lvl 3' style="text-align:right;">buat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="boom_4" hidden>
                    <div class="row">
                        <div class="col-6" style="margin-bottom: 3cm;">
                            <h1  style="text-align: center;margin-bottom: 1cm;">BOOM LVL 4</h1>
                            <div class="row">
                                <img src="assets/image/BOMB LV 4.png" alt=""
                                    style="width: 10cm; display: block; margin-left: auto;margin-right: auto;">
                            </div>
                        </div>
                        <div class='col-6'>
                            <div class='row'>
                                <div class="col-12" style=" margin-bottom: 2cm;">
                                    <h3>deskripsi :</h3>
                                    <p style="font-size:20;">ketika anda mengunakan bom ini anda dapat menghancurkan
                                        hubungan
                                        orang</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <img src="assets/image/Black powder.png" alt="" style="width: 100px;;">
                                    <b>2x</b>
                                </div>
                                <div class="col-4">
                                    <img src="assets/image/sulfur.png" alt="" style="width: 100px;;">
                                    <b>3x</b>
                                </div>
                                <div class="col-4">
                                    <img src="assets/image/hcl.png" alt="" style="width: 100px;;">
                                    <b>3x</b>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-4">
                                    <img src="assets/image/Styrofoam.png" alt="" style="width: 100px;;">
                                    <b>4x</b>
                                </div>
                                <div class="col-4">
                                    <img src="assets/image/korek api.png" alt="" style="width: 100px;;">
                                    <b>4x</b>
                                </div>
                                <div class='col-4' style = 'margin-top: auto; margin-bottom: auto;'>
                                    <img src="assets/image/bridge coin.png" width="10%"><span id='uangbom1'>6000</span>
                                    <a href="#" class="btn btn-primary craft" id = 'Bom Lvl 4' style="text-align:right;">buat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="boom_5" hidden>
                    <div class="row">
                        <div class="col-6" style="margin-bottom: 3cm;">
                            <h1  style="text-align: center;margin-bottom: 1cm;">BOOM LVL 5</h1>
                            <div class="row">
                                <img src="assets/image/BOMB LV 5.png" alt=""
                                    style="width: 10cm; display: block; margin-left: auto;margin-right: auto;">
                            </div>
                        </div>
                        <div class='col-6'>
                            <div class='row'>
                                <div class="col-12" style=" margin-bottom: 2cm;">
                                    <h3>deskripsi :</h3>
                                    <p style="font-size:20;">ketika anda mengunakan bom ini anda dapat menghancurkan
                                        hubungan
                                        orang</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <img src="assets/image/Black powder.png" alt="" style="width: 100px;;">
                                    <b>3x</b>
                                </div>
                                <div class="col-4">
                                    <img src="assets/image/sulfur.png" alt="" style="width: 100px;;">
                                    <b>4x</b>
                                </div>
                                <div class="col-4">
                                    <img src="assets/image/hcl.png" alt="" style="width: 100px;;">
                                    <b>4x</b>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-4">
                                    <img src="assets/image/Styrofoam.png" alt="" style="width: 100px;;">
                                    <b>4x</b>
                                </div>
                                <div class="col-4">
                                    <img src="assets/image/korek api.png" alt="" style="width: 100px;;">
                                    <b>5x</b>
                                </div>
                                <div class='col-4' style = 'margin-top: auto; margin-bottom: auto;'>
                                    <img src="assets/image/bridge coin.png" width="10%"><span id='uangbom1'>6000</span>
                                    <a href="#" class="btn btn-primary craft" id = 'Bom Lvl 5' style="text-align:right;">buat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="boom_6" hidden>
                <div class="row">
                        <div class="col-6" style="margin-bottom: 3cm;">
                            <h1  style="text-align: center;margin-bottom: 1cm;">BOOM LVL 6</h1>
                            <div class="row">
                                <img src="assets/image/BOMB LV 6.png" alt=""
                                    style="width: 10cm; display: block; margin-left: auto;margin-right: auto;">
                            </div>
                        </div>
                        <div class='col-6'>
                            <div class='row'>
                                <div class="col-12" style=" margin-bottom: 2cm;">
                                    <h3>deskripsi :</h3>
                                    <p style="font-size:20;">ketika anda mengunakan bom ini anda dapat menghancurkan
                                        hubungan
                                        orang</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <img src="assets/image/Black powder.png" alt="" style="width: 100px;;">
                                    <b>3x</b>
                                </div>
                                <div class="col-4">
                                    <img src="assets/image/sulfur.png" alt="" style="width: 100px;;">
                                    <b>5x</b>
                                </div>
                                <div class="col-4">
                                    <img src="assets/image/hcl.png" alt="" style="width: 100px;;">
                                    <b>6x</b>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-4">
                                    <img src="assets/image/Styrofoam.png" alt="" style="width: 100px;;">
                                    <b>3x</b>
                                </div>
                                <div class="col-4">
                                    <img src="assets/image/korek api.png" alt="" style="width: 100px;;">
                                    <b>6x</b>
                                </div>
                                <div class='col-4' style = 'margin-top: auto; margin-bottom: auto;'>
                                    <img src="assets/image/bridge coin.png" width="10%"><span id='uangbom1'>6000</span>
                                    <a href="#" class="btn btn-primary craft" id = 'Bom Lvl 6' style="text-align:right;">buat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                
                                    
                <script>
                const shopSwal = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn-gradient btn-sweet py-3 px-4',
                        cancelButton: 'btn-gradient btn-sweet py-3 px-4 mr-5'
                    },
                    buttonsStyling: false,
                    allowOutsideClick: false,
                    background: 'rgb(68,63,63)'
                });

                $("#jenis_bom").change(function() {
                    if ($("#jenis_bom").val() == '') {
                        $('#boom_1').prop('hidden', true);
                        $('#boom_2').prop('hidden', true);
                        $('#boom_3').prop('hidden', true);
                        $('#boom_4').prop('hidden', true);
                        $('#boom_5').prop('hidden', true);
                        $('#boom_6').prop('hidden', true);
                    } else if ($("#jenis_bom").val() == 'bom1') {
                        $("#boom_1").removeAttr("hidden");
                        $('#boom_2').prop('hidden', true);
                        $('#boom_3').prop('hidden', true);
                        $('#boom_4').prop('hidden', true);
                        $('#boom_5').prop('hidden', true);
                        $('#boom_6').prop('hidden', true);
                    } else if ($("#jenis_bom").val() == 'bom2') {
                        $('#boom_1').prop('hidden', true);
                        $("#boom_2").removeAttr("hidden");
                        $('#boom_3').prop('hidden', true);
                        $('#boom_4').prop('hidden', true);
                        $('#boom_5').prop('hidden', true);
                        $('#boom_6').prop('hidden', true);
                    } else if ($("#jenis_bom").val() == 'bom3') {
                        $('#boom_1').prop('hidden', true);
                        $("#boom_2").prop("hidden", true);
                        $('#boom_3').removeAttr('hidden');
                        $('#boom_4').prop('hidden', true);
                        $('#boom_5').prop('hidden', true);
                        $('#boom_6').prop('hidden', true);
                    } else if ($("#jenis_bom").val() == 'bom4') {
                        $('#boom_1').prop('hidden', true);
                        $("#boom_2").prop("hidden", true);
                        $('#boom_3').prop('hidden', true);
                        $('#boom_4').removeAttr('hidden');
                        $('#boom_5').prop('hidden', true);
                        $('#boom_6').prop('hidden', true);
                    } else if ($("#jenis_bom").val() == 'bom5') {
                        $('#boom_1').prop('hidden', true);
                        $("#boom_2").prop("hidden", true);
                        $('#boom_3').prop('hidden', true);
                        $('#boom_4').prop('hidden', true);
                        $('#boom_5').removeAttr('hidden');
                        $('#boom_6').prop('hidden', true);
                    } else if ($("#jenis_bom").val() == 'bom6') {
                        $('#boom_1').prop('hidden', true);
                        $("#boom_2").prop("hidden", true);
                        $('#boom_3').prop('hidden', true);
                        $('#boom_4').prop('hidden', true);
                        $('#boom_5').prop('hidden', true);
                        $('#boom_6').removeAttr('hidden');
                    }
                });
                
                
                $('.craft').click(function() {
                var item = this.id,
                    cash = $('.uang').text();

                    shopSwal.fire({
                        title: '<h3 style="color:white;">Konfirmasi pembutan</h3>',
                        html: "<div style='color:white;'>Anda akan membuat<h5>" +item + "</b></div>",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'craft',
                        cancelButtonText: 'Batal',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "new_phps/boom.php",
                        method: "POST",
                        data: {
                            item: item,
                            cash: cash
                        },
                                success: function(res) {

                                    // load_data(1, total, qty, item);
                                    // showPurchaseHistory();
                                    
                                    console.log(res);
                                    if (res == 1){
                                        shopSwal.fire({
                                        title: '<h3 style="color:white;">Gagal Membuat Boom!</h3>',
                                        html: "<div style='color:white;'><b>"+ 'uang dan bahan tidak cukup' +"</b> .</div>",
                                        icon: 'error',confirmButtonText: 'Oke'
                                        
                                        }).then((result2)=>{
                                            if(result2.isConfirmed){
                                                location.reload();
                                            }
                                        })
                                    }
                                    else if (res == 2){
                                        shopSwal.fire({
                                        title: '<h3 style="color:white;">Gagal Membuat Boom!</h3>',
                                        html: "<div style='color:white;'><b>"+ 'uang tidak cukup' +"</b> .</div>",
                                        icon: 'error',confirmButtonText: 'Oke'
                                        
                                        }).then((result2)=>{
                                            if(result2.isConfirmed){
                                                location.reload();
                                            }
                                        })
                                    }
                                    else if (res == 3){
                                        shopSwal.fire({
                                        title: '<h3 style="color:white;">Gagal Membuat Boom!</h3>',
                                        html: "<div style='color:white;'><b>"+ 'bahan tidak cukup' +"</b> .</div>",
                                        icon: 'error',confirmButtonText: 'Oke'
                                        
                                        }).then((result2)=>{
                                            if(result2.isConfirmed){
                                                location.reload();
                                            }
                                        })
                                    }
                                    else {
                                        shopSwal.fire({
                                        title: '<h3 style="color:white;">Berhasil Membuat Boom!</h3>',
                                        html: "<div style='color:white;'><b>" + item + "</b> telah ditambahkan pada inventory Anda.</div>",
                                        icon: 'success',confirmButtonText: 'Oke'
                                        
                                        }).then((result2)=>{
                                            if(result2.isConfirmed){
                                                location.reload();
                                            }
                                        })
                                    }
                                    
                                },
                                error: function($xhr, textStatus,
                                    errorThrown) {
                                        console.log(errorThrown);
                                        console.warn($xhr.responseText);
                                    // load_data(0);
                                    // if ($xhr.responseJSON[
                                    //     'error'] ==
                                    //     'Uang tidak cukup') {
                                    //     shopSwal.fire({
                                    //         title: '<h3 style="color:white;">Pembelian Gagal!</h3>',
                                    //         html: '<div style="color:white;">Uang Anda tidak mencukupi!</div>',
                                    //         icon: 'error'
                                    //     })
                                    // } else {
                                    //     shopSwal.fire({
                                    //         title: '<h3 style="color:white;">Pembelian Gagal!</h3>',
                                    //         html: '<div style="color:white;">Terjadi Error di Server. Silakan ulangi kembali.</div>',
                                    //         icon: 'error'
                                    //     })
                                    // }
                                }
                            });
                            
                        } else if (result.dismiss === Swal.DismissReason
                            .cancel) {

                            // load_data(0);
                            shopSwal.fire({
                                title: '<h3 style="color:white;">Batal membuat Boom!</h3>',
                                html: '',
                                icon: 'error'
                            })
                        }
                    })
                    
                });
                </script>
                                        

</body>

</html>