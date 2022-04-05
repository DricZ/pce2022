<?php
require_once 'phps/connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
$_SESSION['page'] = 'build';

$sqlTeam = "SELECT * FROM team WHERE username = ?";
$stmtTeam = $pdo->prepare($sqlTeam);
$stmtTeam->execute([$_SESSION['username']]);
$rowTeam = $stmtTeam->fetch();

//CHECK SUDAH DAPAT LANDMARK BOROBUDUR ATAU TIDAK
$getLandmarksql = "SELECT * FROM `team_constructed_landmark` WHERE id_landmark = 2 AND id_team = ?";
$getLandmarkstmt = $pdo->prepare($getLandmarksql);
$getLandmarkstmt->execute([$rowTeam['id']]);

if ($getLandmarkstmt->rowCount() == 1) {
    header("Location: build_efek_jogja.php");
    exit();
}

//CEK PUNYA LANDMARK LAMPUNG TIDAK
$sqlCekLampung = "SELECT * FROM team_constructed_landmark WHERE id_landmark = 4 AND id_team = ?";
$stmtCekLampung = $pdo->prepare($sqlCekLampung);
$stmtCekLampung->execute([$rowTeam['id']]);
if ($stmtCekLampung->rowCount() > 0) {
    $efekLampung = true;
} else {
    $efekLampung = false;
}

require_once 'header.php';

$getCityNamesql = "SELECT * FROM city WHERE id = ?";
$getCityNamestmt = $pdo->prepare($getCityNamesql);
$getCityNamestmt->execute([$rowTeam['location_now_id_city']]);
$getCityNamerow = $getCityNamestmt->fetch();

$_SESSION['kota'] = $getCityNamerow['city_name'];
?>

<head>
    <title><?= $getCityNamerow['city_name'] ?> - Build Building</title>
</head>
<div class="container my-5 pb-5">
    <div class="row col-12 justify-content-center mt-5">
        <div id="decor">
            <!-- svg logo -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 70px;" transform="translate(15,17)">
                <g class="" transform="translate(0,0)" style="">
                    <path d="M409.28 19.313c-20.507.34-40.836 8.245-56.53 23.937-20.558 20.558-27.823 49.56-22.188 76.156l1.032 4.938-3.594 3.594-43.406 43.406c3.86 2.906 7.167 6.498 9.72 10.625 7.166 11.59 6.305 28.69-6.22 41.218l-11.97 11.968 30.438 30.47 79.563-79.563 3.563-3.594 4.968 1.06c26.44 5.525 55.136-1.98 75.75-22.593 23.596-23.595 29.518-57.696 18.688-87.093l-49.22 49.25c-13.71 13.708-36.3 15.01-50.093 1.22-13.79-13.793-13.07-36.618.814-50.5l49.22-49.25c-8.545-3.15-17.475-4.93-26.44-5.22-1.367-.045-2.726-.054-4.093-.032zM72.157 21.53c-13.533.162-25.857 6.134-34.937 15.69-18.163 19.108-23.575 51.08 4.56 79.218l86.126 86.124c30.25 2.733 53.004 26.662 53.906 57.532L182 266c.883 5.654 4.31 10.126 8.844 12.47 5.734 2.963 12.387 3.145 19.625-4.095l64.405-64.406c7.718-7.72 6.896-12.716 3.53-18.157-3.364-5.442-11.272-10.063-18.81-10.063h-.19l-.186-.03c-30.125-1.298-53.427-23.487-56.5-53l-86.595-86.595C100.84 26.84 85.69 21.37 72.155 21.53zm191.188 227.314l-14.03 14.03 136.5 136.532 3.31 3.313-.655 4.655-4.595 31.813 77.188 49.375L489 460.625l-49.375-77.22-31.78 4.595-4.658.688-3.312-3.313-136.53-136.53zm-27.72 26.812l-11.936 11.938c-12.238 12.24-29.134 13.86-41.438 7.5-4.515-2.334-8.513-5.66-11.656-9.72l-41.78 41.782-3.595 3.594-4.97-1.063c-26.596-5.632-55.6 1.632-76.156 22.188-23.598 23.596-29.52 57.697-18.688 87.094l49.25-49.25c13.883-13.877 36.71-14.605 50.5-.814 13.792 13.792 12.494 36.384-1.22 50.094l-49.25 49.25c29.398 10.83 63.498 4.906 87.095-18.688 20.613-20.615 28.114-49.342 22.595-75.78l-1.03-4.938 3.56-3.563 79.19-79.186-30.47-30.438z" fill="rgb(32,31,31)" fill-opacity="1"></path>
                </g>
            </svg>
        </div>
        <h1 id="title">BUILD</h1>

        <div class="row mini-inventory">
            <img src="assets/image/wood-beam.svg" width="20px">
            <span class="kayu pr-3"></span>

            <img src="assets/image/i-beam.svg" width="20px">
            <span class="baja pr-3"></span>

            <img src="assets/image/concrete-bag.svg" width="20px">
            <span class="semen pr-3"></span>

            <img src="assets/image/powder.svg" width="20px">
            <span class="pasir pr-3"></span>

            <img src="assets/image/miner.svg" width="20px">
            <span class="pekerja pr-3"></span>
        </div>
    </div>
    <div class="row col-12 justify-content-center mb-4">
        <h3 id="city"><?= $getCityNamerow['city_name'] ?></h3>
    </div>
    <div class="container col-md-10 mb-5">
        <!-- JIKA ADA EFEK LAMPUNG -->
        <?php if ($efekLampung == true) { ?>
            <div class="container text-center efek">
                <div class="row"><span class="badge badge-efek-lampung p-2">Efek Lampung</span><small class="py-1 pl-2">Mengurangi kebutuhan pekerja sebesar 1 (untuk bangunan dengan pekerja 2 atau lebih)</small></div>
            </div>
        <?php } ?>
        <div class="row row-cols-lg-3 row-cols-2" id="shop">
        </div>
    </div>
    <div class="footer my-5">
        &nbsp;
    </div>
</div>
<script>
    var kayu = 0;
    var baja = 0;
    var semen = 0;
    var pasir = 0;
    var pekerja = 0;

    const buildSwal = Swal.mixin({
        customClass: {
            confirmButton: 'btn-gradient btn-sweet py-3 px-4',
            cancelButton: 'btn-gradient btn-sweet py-3 px-4 mr-5'
        },
        buttonsStyling: false,
        allowOutsideClick: false,
        background: 'rgb(68,63,63)'
    });

    function getBahan() {
        var idkel = <?= $rowTeam['id'] ?>;
        $.ajax({
            url: "phps/build_getBahan.php",
            method: "POST",
            data: {
                idkel: idkel
            },
            success: function(data) {
                kayu = data.kayu;
                baja = data.baja;
                semen = data.semen;
                pasir = data.pasir;
                pekerja = data.pekerja;

                $(".kayu").html(kayu);
                $(".baja").html(baja);
                $(".semen").html(semen);
                $(".pasir").html(pasir);
                $(".pekerja").html(pekerja);
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

    function getBuilding() {
        var idkel = <?= $rowTeam['id'] ?>;
        var idkota = <?= $rowTeam['location_now_id_city']; ?>;
        $.ajax({
            url: "phps/build_getBuilding.php",
            method: "POST",
            data: {
                idkel: idkel,
                idkota: idkota
            },
            success: function(data) {
                $("#shop").html(data);
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
    $(document).ready(function() {
        getBahan();
        getBuilding();
    });
    $(function() {
        $(document).on('click', '.btn-beli', function() {
            getBahan();
            // alert(kayu + ' ' + baja + ' ' + semen + ' '  + pasir +  ' ' + pekerja);
            var building = $(this).closest('.card-item').find('.building').text();
            var jml_bhn = '';
            var cukup = true;
            var idkota = <?= $rowTeam['location_now_id_city']; ?>;
            var jml_pekerja = 1;
            var efek = false;

            <?php if ($efekLampung == true) { ?>
                efek = true;
            <?php } ?>

            if (building == 'Jembatan Kayu') {
                jml_bhn = '4 Kayu dan 1 Pekerja';
                if (kayu < 4 || pekerja < 1) {
                    cukup = false;
                }
            } else if (building == 'Jembatan Baja') {
                jml_bhn = '3 Baja, 1 Semen dan 2 Pekerja';
                if (baja < 3 || semen < 1 || pekerja < 2) {
                    cukup = false;
                    <?php if ($efekLampung == true) { ?>
                        if (pekerja == 1) {
                            cukup = true;
                        }
                    <?php } ?>
                }
            } else if (building == 'Jembatan Beton') {
                jml_bhn = '1 Baja, 3 Semen, 1 Pasir, dan 2 Pekerja';
                if (baja < 1 || semen < 3 || pasir < 1 || pekerja < 2) {
                    cukup = false;
                    <?php if ($efekLampung == true) { ?>
                        if (pekerja == 1) {
                            cukup = true;
                        }
                    <?php } ?>
                }
            } else if (building == 'Rumah Sakit') {
                jml_bhn = '1 Baja, 1 Semen, 2 Pasir, dan 2 Pekerja';
                if (baja < 1 || semen < 1 || pasir < 2 || pekerja < 2) {
                    cukup = false;
                    <?php if ($efekLampung == true) { ?>
                        if (pekerja == 1) {
                            cukup = true;
                        }
                    <?php } ?>
                }
            } else if (building == 'Mall') {
                jml_bhn = '2 Baja, 1 Semen, 1 pasir, dan 2 Pekerja';
                if (baja < 2 || semen < 1 || pasir < 1 || pekerja < 2) {
                    cukup = false;
                    <?php if ($efekLampung == true) { ?>
                        if (pekerja == 1) {
                            cukup = true;
                        }
                    <?php } ?>
                }
            } else if (building == 'Taman') {
                jml_bhn = '2 Kayu, 2 Pasir, dan 1 Pekerja';
                if (kayu < 2 || pasir < 2 || pekerja < 1) {
                    cukup = false;
                }
            } else if (building == 'Perumahan') {
                jml_bhn = '2 Kayu, 1 Semen, 1 Pasir, dan 1 Pekerja';
                if (kayu < 2 || semen < 1 || pasir < 1 || pekerja < 1) {
                    cukup = false;
                }
            } else if (building == 'Apartemen') {
                jml_bhn = '1 Kayu, 1 Baja, 2 Semen, 2 Pasir, dan 2 Pekerja';
                if (kayu < 1 || baja < 1 || semen < 2 || pasir < 2 || pekerja < 2) {
                    cukup = false;
                    <?php if ($efekLampung == true) { ?>
                        if (pekerja == 1) {
                            cukup = true;
                        }
                    <?php } ?>
                }
            } else if (building == 'Hotel') {
                jml_bhn = '1 Kayu, 2 Baja, 1 Semen, 1 Pasir, dan 2 Pekerja';
                if (kayu < 1 || baja < 2 || semen < 1 || pasir < 1 || pekerja < 2) {
                    cukup = false;
                    <?php if ($efekLampung == true) { ?>
                        if (pekerja == 1) {
                            cukup = true;
                        }
                    <?php } ?>
                }
            }

            if (cukup == true) {
                if (building != 'Taman' && building != 'Perumahan' && building != 'Jembatan Kayu' && efek == true) {
                    buildSwal.fire({
                        title: '<h3 style="color:white;">Konfirmasi Pembangunan</h3>',
                        html: '<div style="color:white;">Anda akan membangun <h5 class="pb-0 mb-0">' + building + '</h5> dengan menggunakan <h5 class="pb-0 mb-0">' + jml_bhn + '</h5><div class="container text-center efek-in-swal"><div class="row mt-1"><span class="badge badge-efek-lampung-in-swal p-2">Efek Lampung</span><small class="py-1 pl-2">Anda cukup menggunakan <b>' + jml_pekerja + ' Pekerja</b></small></div></div>',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Bangun',
                        cancelButtonText: 'Batal',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "phps/build_building.php",
                                method: "POST",
                                data: {
                                    building: building,
                                    idkota: idkota
                                },
                                success: function(res) {
                                    // alert(res);

                                    getBahan();
                                    getBuilding();
                                    buildSwal.fire({
                                        title: '<h3 style="color:white;">Pembangunan Berhasil!</h3>',
                                        html: "<div style='color:white;'><b>" + res['building'] + "</b> telah berhasil dibangun.</div>",
                                        icon: 'success'
                                    })
                                    if (res['jogja'] != undefined) {
                                        setInterval(() => {
                                            window.location.href = 'http://pce.petra.ac.id/bc/rally_games/build_efek_jogja.php';
                                        }, 1500);
                                    }
                                },
                                error: function($xhr, textStatus, errorThrown) {
                                    buildSwal.fire({
                                        title: '<h3 style="color:white;">Pembangunan Gagal!</h3>',
                                        html: '<div style="color:white;">' + $xhr.responseJSON['error'] + '</div>',
                                        icon: 'error'
                                    })
                                }
                            });
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            buildSwal.fire({
                                title: '<h3 style="color:white;">Pembangunan Telah Dibatalkan!</h3>',
                                html: '',
                                icon: 'error'
                            })
                        }
                    })
                } else {
                    buildSwal.fire({
                        title: '<h3 style="color:white;">Konfirmasi Pembangunan</h3>',
                        html: '<div style="color:white;">Anda akan membangun <h5 class="pb-0 mb-0">' + building + '</h5> dengan menggunakan <h5 class="pb-0 mb-0">' + jml_bhn + '</h5></div>',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Bangun',
                        cancelButtonText: 'Batal',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "phps/build_building.php",
                                method: "POST",
                                data: {
                                    building: building,
                                    idkota: idkota
                                },
                                success: function(res) {
                                    // alert(res);
                                    getBahan();
                                    getBuilding();
                                    buildSwal.fire({
                                        title: '<h3 style="color:white;">Pembangunan Berhasil!</h3>',
                                        html: "<div style='color:white;'><b>" + res['building'] + "</b> telah berhasil dibangun.</div>",
                                        icon: 'success'
                                    })
                                    if (res['jogja'] != undefined) {
                                        setInterval(() => {
                                            window.location.href = 'http://pce.petra.ac.id/bc/rally_games/build_efek_jogja.php';
                                        }, 1500);
                                    } else if (res['lampung'] != undefined) {
                                        setInterval(() => {
                                            location.reload();
                                        }, 1500);
                                    }
                                    getBahan();
                                    getBuilding();
                                    buildSwal.fire({
                                        title: '<h3 style="color:white;">Pembangunan Berhasil!</h3>',
                                        html: "<div style='color:white;'><b>" + res['building'] + "</b> telah berhasil dibangun.</div>",
                                        icon: 'success'
                                    })
                                },
                                error: function($xhr, textStatus, errorThrown) {
                                    buildSwal.fire({
                                        title: '<h3 style="color:white;">Pembangunan Gagal!</h3>',
                                        html: '<div style="color:white;">' + $xhr.responseJSON['error'] + '</div>',
                                        icon: 'error'
                                    })
                                }
                            });
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            buildSwal.fire({
                                title: '<h3 style="color:white;">Pembangunan Telah Dibatalkan!</h3>',
                                html: '',
                                icon: 'error'
                            })
                        }
                    })
                }

            } else {
                buildSwal.fire({
                    title: '<h3 style="color:white;">Pembangunan Gagal!</h3>',
                    html: '<div style="color:white;">Bahan Anda tidak mencukupi!</div>',
                    icon: 'error'
                })
            }
        });
    });
</script>
</body>

</html>