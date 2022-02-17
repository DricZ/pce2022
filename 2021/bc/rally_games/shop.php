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
<?php
if ($rowTeam['location_now_id_city'] != 0) {
?>

    <head>
        <title>SHOP - <?= $_SESSION['kota'] ?></title>
    </head>
<?php
} else {
?>

    <head>
        <title>SHOP</title>
    </head>
<?php
}
?>

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
<div id="containerAll">
    <div class="container my-5 pb-5 mainshop">
        <div class="row col-12 justify-content-center mt-5">
            <div id="decor-hidden-post">
                <!-- svg logo -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 70px;" transform="translate(15,17)">
                    <g class="" transform="translate(0,0)" style="">
                        <path d="M256.18 21c-23.242 0-46.577 3.01-63.186 8.54-8.304 2.763-14.868 6.196-18.808 9.558-3.94 3.36-5.167 5.956-5.186 8.96L168.943 57H41v14h430V57H342.967l.033-9.033c.01-3.002-1.17-5.55-5.057-8.895-3.887-3.344-10.407-6.773-18.677-9.535C302.724 24.014 279.42 21 256.18 21zM38.277 89l-10.443 94h80.9l20.243-86.36L122.81 183h81.07l17.114-86.68-3.096 86.68h75.75l-4.634-86.518L307.694 183h81.497l-6.167-86.36L403.266 183h80.9l-10.443-94H38.277zM25.834 201l-.51 4.588C39.822 226.445 52.968 235 64 235c11.32 0 24.852-8.89 39.8-30.96l.714-3.04h-78.68zm95.687 0l-.32 4.498C135.753 226.495 148.935 235 160 235c11.293 0 24.788-8.85 39.693-30.803l.63-3.197h-78.802zm95.736 0l-.156 4.352C231.69 226.455 244.908 235 256 235c11.08 0 24.28-8.525 38.85-29.576l-.237-4.424h-77.357zm94.324 0l.674 3.12c15 22.192 28.503 31.044 39.773 31.013 11.03-.03 24.212-8.62 38.772-29.637l-.32-4.496h-78.9zm95.906 0l.713 3.04C423.147 226.11 436.68 235 448 235c11.032 0 24.178-8.555 38.676-29.412l-.51-4.588h-78.68zM112 223.31C97.313 242.11 81.492 253 64 253c-13.972 0-26.884-6.906-39-19.264V487h318V279h114v208h30V233.736C474.884 246.094 461.972 253 448 253c-17.49 0-33.31-10.888-47.996-29.684-14.664 18.808-30.432 29.77-47.926 29.817-17.508.048-33.352-10.87-48.092-29.807C289.303 242.116 273.486 253 256 253c-17.492 0-33.313-10.89-48-29.69-14.687 18.8-30.508 29.69-48 29.69s-33.313-10.89-48-29.69zM55 279h258v178H55V279zm18 18v142h222V297H73zm288 0v71.064l78 .573V297h-78zM88 312h128c-108.235 8-116.31 24-128 113.11V312zm273 74.066v13.998l78 .573v-14.002l-78-.57zm0 32V487h78v-68.365l-78-.57z" fill="rgb(32,31,31)" fill-opacity="1"></path>
                    </g>
                </svg>
            </div>
            <h1 id="title">SHOP</h1>

            <div class="row wallet">
                <img src="assets/image/bridge coin.png" width="35px" class="mx-2 pt-1">
                <div class="uang pr-4"><?= number_format($rowTeam['money'],0,',','.'); ?></div>
            </div>

            <?php
            if ($rowTeam['location_now_id_city'] != 0) {
            ?>
                <div class="row wallet" style="margin-top: 5%; z-index:100;" id="p-history">
                    <div class="purchase-history">
                        <p>Purchase History</p>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>

        <?php
        if ($rowTeam['location_now_id_city'] == 0) {
        ?>
            <div class="container col-md-8 col-12" style="margin-top: 15vh;">
                <div class="row row-cols-lg-3 row-cols-2">
                    <!-- Tampilan jika tidak ada info (kosong) -->
                    <div id="no-content-msg-shop">
                        <img src="assets/image/nothing-to-say.svg" width="55%">
                        <h3>Please visit a city to see the shop!</h3>
                    </div>
                    <!-- END -->
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="row col-12 justify-content-center mb-4">
                <h3 id="city"><?= $getCityNamerow['city_name']; ?></h3>
            </div>
            <div class="container col-md-8 col-12">
                <div class="row row-cols-lg-3 row-cols-2" id="shop">

                </div>
            </div>
        <?php
        }
        ?>

        <div class="footer my-5">
            &nbsp
        </div>
    </div>
    <div id="containerPurchaseHistory">
        <div id="history-header" class="text-left mb-3">
            <h1> Your Purchase History </h1>
        </div>

        <div id="history-rowcol" class="d-flex">
            <p>Nama Barang</p>
            <p>Jumlah Pembelian</p>
            <p>Kota Beli</p>
            <p>Total Harga</p>
        </div>

        <div class="purchaseHistory">

        </div>

        <div class="goback" style="margin-top: 5%;" id="p-goback">
            <div class="purchase-goback">
                <p>Go Back To Shop <--</p>
            </div>
        </div>
        <div class="footer my-5">
            &nbsp
        </div>

    </div>

    <?php
    if ($rowTeam['location_now_id_city'] != 0) {
    ?>
        <script>
            function showPurchaseHistory() {
                $(".purchaseHistory").html("<span>Harap tunggu...</span>");

                $.ajax({
                    url: "phps/refresh_purchase_history.php",
                    type: "get",
                    dataType: "json",
                    success: function(result) {
                        var data = result;
                        var str = "";
                        //loop dari data
                        if (data.length == 0) {
                            str += `
                        <div style="margin-top: 20vh;" id="no-content-msg-info">
                            <img src="assets/image/nothing-to-say.svg" width="55%">
                            <h3>You have never purchased anything.<br> Go buy some resources from Shop!</h3>
                        </div>
                    `;
                        } else {
                            for (var i = 0; i < data.length; i++) {
                                var d = data[i];
                                str += `
                        <div class="history-item d-flex">
                            <img src="assets/image/` + d.image + `" class="history-picture mr-3">
                            <p class="history-item-name">` + d.resource_name + `</p>
                            <p class="history-item-qty">` + d.count + `</p>
                            <p class="history-item-kota">` + d.city_name + `</p>
                            <p class="history-item-harga">` + d.price + `</p>
                        </div>
                    `;
                            }
                        }
                        $(".purchaseHistory").html(str);
                    },
                    error: function(result) {
                        //Error handling
                        alert("ERROR!");
                    }
                });
            }

            const shopSwal = Swal.mixin({
                customClass: {
                    confirmButton: 'btn-gradient btn-sweet py-3 px-4',
                    cancelButton: 'btn-gradient btn-sweet py-3 px-4 mr-5'
                },
                buttonsStyling: false,
                allowOutsideClick: false,
                background: 'rgb(68,63,63)'
            });

            function formatNumber(num) {
                return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
            }

            function load_data(status, total = 0, qty = 0, barang = 0) {
                $.ajax({
                    url: "phps/get_shop.php",
                    method: "GET",
                    success: function(data) {
                        $("#shop").html('');
                        var cash = 0;
                        data.forEach(function(item) {
                            cash = item['uang'];
                            var part1 = `
                        <div class="col py-3">
                            <div class="card-item shop-item`,
                                part2 = `
                        ">
                                <div class="container item">
                                    <div class="row pt-3 justify-content-center">
                                        <h3 class="bahan">` + item['nama'] + `</h3>
                                    </div>
                                    <div class="row justify-content-center`,
                                part2_1 = `">
                                        <img src="assets/image/` + item['image'] + `" width="`,
                                part2_5 = `">
                                    </div>
                                    <div class="hitung">
                                        <div class="tag-sold-out`,
                                part3 = `">SOLD OUT</div>
                                        <div class="row justify-content-center mb-1`,
                                part3_5 = ` jml-stok">`,
                                part4 = `</div>
                                        <div class="row justify-content-center`,
                                part4_5 = ` pb-1 tes">
                                            <div class="btn-min circle-btn unclickable circle-btns" id="btn-min">-</div>
                                            <input class="qty mx-1" disabled value="0">
                                            <div class="btn-plus circle-btns circle-btn" id="btn-plus">+</div>
                                        </div>
                                        <div class="row justify-content-center my-1 no-event" style="font-size:18pt;">
                                            <img src="assets/image/bridge coin.png" width="10%" height="5%" style="padding-top:4px;">
                                            <div id="harga">` + item['harga'] + `</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="off container btn-beli btn-gradient py-2 off" id="btn-beli">
                                    BELI
                                </div>
                            </div>
                        </div>`;

                           var itemCard = ``;

                            if (item['nama'] != 'Tiket Terbang') { //jika bukan tiket terbang
                                if (item['stok'] > 1) {
                                    itemCard = part1 + part2 + part2_1 + '30%' + part2_5 + ' hidden' + part3 + ' mt-2' + part3_5 + `Jumlah stok:&nbsp
                                            <div class="stok">` + item['stok'] + `</div>` + part4 + ' pt-2' + part4_5;
                                } else if (item['stok'] == 1) {
                                    itemCard = part1 + part2 + part2_1 + '30%' + part2_5 + ' hidden' + part3 + ' mt-2' + part3_5 + 'Stok terakhir' + `<div class="stok hidden">` + item['stok'] + `</div>` + part4 + ' pt-2' + part4_5;
                                } else {
                                    itemCard = part1 + ' sold-out' + part2 + part2_1 + '30%' + part2_5 + part3 + ' mt-2' + part3_5 + `Jumlah stok:&nbsp
                                            <div class="stok">` + item['stok'] + `</div>` + part4 + ' pt-2' + part4_5;
                                }
                            } else { //jika tiket terbang
                            //ini tiket terbang
                                //itemCard = part1 + part2 + ' mt-2' + part2_1 + '35%' + part2_5 + ' hidden' + part3 + ' mt-2' + part3_5 + `<div class="stok hidden">` + item['stok'] + `</div>` + part4 + ' pt-3' + part4_5;
                            }
                            $("#shop").append(itemCard);
                        });
                        $(".uang").text(formatNumber(cash));
                        if (status == 1) {
                            shopSwal.fire({
                                title: '<h3 style="color:white;">Pembelian Berhasil!</h3>',
                                html: "<div style='color:white;'><b>" + qty + " " + barang + "</b> telah ditambahkan pada inventory Anda.</div>",
                                icon: 'success'
                            })
                        }
                    },
                    error: function(data) {
                        shopSwal.fire({
                            title: '<h3 style="color:white;">Error</h3>',
                            html: '<div style="color:white;">Terjadi Error di Server. Silakan ulangi kembali.</div>',
                            icon: 'error'
                        })
                    }
                });
            }
            $(function() {
                load_data(0);
                showPurchaseHistory();
                $("#shop").on("click", "[id='btn-plus'],[id='btn-min']", function() {
                    var $qty = $(this).closest('.hitung').find('.qty'),
                        currentVal = parseInt($qty.val()),
                        isAdd = $(this).hasClass('btn-plus'),
                        cost = parseInt($(this).closest('.hitung').find('#harga').text()),
                        $jmlStok = $(this).closest('.hitung').find('.stok'),
                        jmlStok = parseInt($jmlStok.text());

                    if (isAdd) {

                        if ($(this).closest('.card-item').find('.btn-beli').hasClass('off'))
                            $(this).closest('.card-item').find('.btn-beli').removeClass('off');
                        $jmlStok.text(--jmlStok);
                        $qty.val(++currentVal);
                        if (currentVal > 0) {

                            if (currentVal > 2) {
                                cost /= (currentVal - 1);
                            }
                            $(this).closest('.hitung').find('#harga').text(cost * currentVal);
                        }
                    } else {

                        $jmlStok.text(++jmlStok);
                        $qty.val((currentVal > 0 ? --currentVal : currentVal));
                        if (currentVal == 0) {
                            $(this).closest('.card-item').find('.btn-beli').addClass('off');
                        }
                        if (currentVal > 0) {
                            t = cost / (currentVal + 1);
                            $(this).closest('.hitung').find('#harga').text(cost - t);
                        }
                    }
                    if (jmlStok == 0 && $(this).closest('.card-item').find('.bahan').text() != 'Tiket Terbang') {
                        $(this).removeClass('circle-btns');
                        $(this).addClass('unclickable');
                    }
                    if (currentVal == 0) {
                        $(this).removeClass('circle-btns');
                        $(this).addClass('unclickable');
                    }
                });
                $("#shop").on("click", "[id='btn-plus']", function() {
                    if ($(this).closest('.hitung').find('.btn-min').hasClass('unclickable')) {
                        $(this).closest('.hitung').find('.btn-min').removeClass('unclickable');
                        $(this).closest('.hitung').find('.btn-min').addClass('circle-btns');
                    }
                });
                $("#shop").on("click", "[id='btn-min']", function() {
                    if ($(this).closest('.hitung').find('.btn-plus').hasClass('unclickable')) {
                        $(this).closest('.hitung').find('.btn-plus').removeClass('unclickable');
                        $(this).closest('.hitung').find('.btn-plus').addClass('circle-btns');
                    }
                });
                $("#shop").on('click', "[id='btn-beli']", function() {
                    var total = $(this).closest('.card-item').find('#harga').text(),
                        item = $(this).closest('.card-item').find('.bahan').text(),
                        qty = $(this).closest('.card-item').find('.qty').val(),
                        stok = $(this).closest('.card-item').find('.stok').text(),
                        cash = $('.uang').text();

                    shopSwal.fire({
                        title: '<h3 style="color:white;">Konfirmasi Pembelian</h3>',
                        html: "<div style='color:white;'>Anda akan membayar <h5><img src='assets/image/bridge coin.png' width='30px'>" + total + "</h5> untuk membeli <b>" + qty + " " + item + "</b></div>",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Bayar',
                        cancelButtonText: 'Batal',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "phps/buy_shop.php",
                                method: "POST",
                                data: {
                                    item: item,
                                    stok: stok,
                                    qty: qty,
                                    total: total,
                                    cash: cash
                                },
                                success: function(res) {
                                
                                    load_data(1, total, qty, item);
                                    showPurchaseHistory();
                                },
                                error: function($xhr, textStatus, errorThrown) {
                                    
                                    load_data(0);
                                    if ($xhr.responseJSON['error'] == 'Uang tidak cukup') {
                                        shopSwal.fire({
                                            title: '<h3 style="color:white;">Pembelian Gagal!</h3>',
                                            html: '<div style="color:white;">Uang Anda tidak mencukupi!</div>',
                                            icon: 'error'
                                        })
                                    } else {
                                        shopSwal.fire({
                                            title: '<h3 style="color:white;">Pembelian Gagal!</h3>',
                                            html: '<div style="color:white;">Terjadi Error di Server. Silakan ulangi kembali.</div>',
                                            icon: 'error'
                                        })
                                    }
                                }
                            });
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            
                            load_data(0);
                            shopSwal.fire({
                                title: '<h3 style="color:white;">Pembelian Telah Dibatalkan!</h3>',
                                html: '',
                                icon: 'error'
                            })
                        }
                    })
                });


                $('#containerPurchaseHistory').hide();
                $('.purchase-history').click(function() {
                    $('#containerPurchaseHistory').show();
                    $('.mainshop').animate({
                        top: '-100vh'
                    });

                    $('#containerPurchaseHistory').animate({
                        top: '0'
                    }, function() {
                        var time = 200;
                        $(".history-item").each(function() {
                            $(this).animate({
                                top: '0'
                            }, time);
                            time += 100;
                        });

                        $('.mainshop').hide();
                        $('.goback').show();
                    });
                });

                $('.goback').click(function() {
                    $('.mainshop').show();
                    $('.mainshop').animate({
                        top: '0'
                    });

                    $('#containerPurchaseHistory').animate({
                        top: '100vh'
                    }, function() {
                        $('#containerPurchaseHistory').hide();
                        $(".history-item").css({
                            top: '100vh'
                        });
                    });
                });
            });
        </script>
    <?php
    }
    ?>

    </body>

    </html>