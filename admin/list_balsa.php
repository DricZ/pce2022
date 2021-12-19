<?php
require_once 'phps/connect.php';
$_SESSION['page'] = 'balsa';

if (!isset($_SESSION['nrpAdmin'])) {
    header("Location: index.php");
    exit();
}

$nama = $_SESSION['namaAdmin'];
$nrp = $_SESSION['nrpAdmin'];

include 'header.php';

$emojiTexts = ['༼ つ ◕_◕ ༽つ', 'ʕ•ᴥ•ʔ', '(ง ͠° ͟ل͜ ͡°)ง', '¯\_(ツ)_/¯', "(ง'̀-'́)ง", '(ᵔᴥᵔ)', '(¬‿¬)', '(~˘▾˘)~', '༼ʘ̚ل͜ʘ̚༽', 'ᕦ(ò_óˇ)ᕤ', '(｡◕‿‿◕｡)', '(>‿◠)✌'];
$randomIndex = array_rand($emojiTexts);
?>

<!DOCTYPE html>

<head>
    <title>Penerima Kayu Balsa</title>
</head>

<script src="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>

<style>
    .jconfirm .jconfirm-box.hilight.jconfirm-hilight-random {
        /*the animation name is bob*/
        transform: translate3d(0, 0, 0);
        animation: random 2s;
    }

    @keyframes random {

        10%,
        90% {
            transform: rotate(-2deg);
        }

        20%,
        80% {
            transform: rotate(4deg);
        }

        30%,
        50%,
        70% {
            transform: rotate(-8deg);
        }

        40%,
        60% {
            transform: rotate(8deg);
        }
    }

    .jconfirm-title {
        padding-top: 20px !important;
    }

    .validasiBatal .jconfirm-content-pane {
        height: 0 !important;
    }

    #particles-js {
        /*margin-top:100px;*/
        height: 100%;
        width: 100%;
        position: fixed;
        z-index: 0;
        top: 0px;
        left: 0px;

    }

    @keyframes santaAnimationByNicSV {
        0% {
            transform: translate(100vw, 10vh);
        }

        14% {
            transform: translate(-20vw, 10vh);
        }

        100% {
            transform: translate(-20vw, 10vh);
        }
    }

    .santa {
        animation-name: santaAnimationByNicSV;
        animation-duration: 35s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
        animation-delay: 1s;
        animation-fill-mode: both;

        position: absolute;
        width: 15%;
        cursor: pointer;
    }

    .buttons-html5 {
        border-radius: 5px;
        padding: 2px 15px;
        font-size: 18px;
        background-color: #33cccc;
        border-color: #33cccc;
        /* text-decoration: none;
        position: relative;
        display: inline-block; */
    }

    /* .buttons-html5 :hover {
        background-color: #88cccc;
        border-color: #88cccc;
    } */
</style>

<script type="text/javascript">
    $(document).ready(function() {
        show();
    });

    function Search(table) {
        $("#filter_jenjang").on("change", function() {
            table.columns(3).search(this.value).draw();
        });

        $("#filter_status").on("change", function() {
            table.columns(4).search(this.value).draw();
        });
    }

    function Search2(table) {
        $("#filter_jenjang").on("change", function() {
            table.columns(3).search(this.value).draw();
        });

        $("#filter_status").on("change", function() {
            table.columns(4).search(this.value).draw();
        });
    }

    var ajaxcall;

    function show() {
        $("#pendaftarTableBody").html("<span>Harap tunggu...</span>");

        if (ajaxcall != null) {
            ajaxcall.abort();
        }

        $.ajax({
            url: "phps/refresh_balsa.php",
            type: "get",
            dataType: "json",
            success: function(result) {
                $("#pendaftarTable").dataTable().fnDestroy();
                var data = result;
                var str = "";
                var num = 1;
                //loop dari data
                for (var i = 0; i < data.length; i++) {
                    var d = data[i];
                    str += "<tr style='font-weight: 100;'>";
                    str += "<td>" + num + "</td>";
                    str += "<td>" + d.nama_kelompok + "</td>";
                    str += "<td>" + d.nama_sekolah + "</td>";
                    if (d.jenjang_pendidikan == 'College') {
                        str += "<td>University</td>";
                    } else {
                        str += "<td>" + d.jenjang_pendidikan + "</td>";
                    }
                    if (d.status < 2) {
                        str += `<td><b style="color: red;"><i class="fas fa-times">&nbsp;</i></b></td>`;
                    } else if (d.status >= 2) {
                        str += "<td><a type='button' style='-webkit-appearance: none;' class='btn btn-warning' data-id='" + d.id + "' data-team='" + d.nama_kelompok + "' onclick='viewPenerimaBalsa(this)'><b>View</b></a></td>";
                    }
                    str += "</tr>";
                    num = num + 1;
                }
                $("#pendaftarTableBody").html(str);
                var table = $('#pendaftarTable').DataTable({
                    "oLanguage": {
                        "sEmptyTable": "Belum Ada Pendaftar Webinar"
                    }
                });
                Search(table);
            },
            error: function(result) {
                //Error handling
                alert("ERROR!");
                // console.log();

            }
        });

        $.ajax({
            url: "phps/refresh_balsa_excel.php",
            type: "get",
            dataType: "json",
            success: function(result) {
                $("#pendaftarTable2").dataTable().fnDestroy();
                var data = result;
                var str2 = "";
                var num = 1;
                //loop dari data
                for (var i = 0; i < data.length; i++) {
                    var d = data[i];
                    //DEK KENE YO JIMM HEHE
                    str2 += "<tr style='font-weight: 100;'>";
                    str2 += "<td>" + num + "</td>";
                    str2 += "<td>" + d.nama_kelompok + "</td>";
                    str2 += "<td>" + d.nama_sekolah + "</td>";
                    if (d.jenjang_pendidikan == 'College') {
                        str2 += "<td>University</td>";
                    } else {
                        str2 += "<td>" + d.jenjang_pendidikan + "</td>";
                    }
                    // if (d.status == 1 || d.status == 0) {
                    //     str2 += `<td><b style="color: red;"><i class="fas fa-times">&nbsp;</i></b></td>`;
                    // } else if (d.status == 2) {
                    //     str2 += "<td><a type='button' style='-webkit-appearance: none;' class='btn btn-warning' data-id='" + d.id + "' data-team='" + d.nama_kelompok + "' onclick='viewPenerimaBalsa(this)'><b>View</b></a></td>";
                    // }
                    str2 += "<td>" + d.nama + "</td>";
                    str2 += "<td>" + d.no_hp + "</td>";
                    str2 += "<td>" + d.email + "</td>";
                    str2 += "<td>" + d.alamat + "</td>";

                    str2 += "</tr>";
                    num = num + 1;
                }

                $("#pendaftarTableBody2").html(str2);
                var table2 = $('#pendaftarTable2').DataTable({
                    "oLanguage": {
                        "sEmptyTable": "Belum Ada Pendaftar Webinar"
                    },
                    dom: "<'row mb-3'<'col-sm-12'B>>",
                    //"<'row'<'col-sm-12'B>>" + 
                    // "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                    // "<'row'<'col-sm-12'tr>>" +
                    // "<'row'<'col-sm-6'i><'col-sm-6' p>>",
                    buttons: [
                        'copy', 'excel', 'csv'
                    ]
                });
                Search2(table2);
            },
            error: function(result) {
                //Error handling
                alert("ERROR!");
                // console.log();

            }
        });
    }

    function viewPenerimaBalsa(data) {
        var id = data.getAttribute("data-id");
        var team = data.getAttribute("data-team");
        var str = '';
        $.ajax({
            url: "phps/get_penerima_balsa.php",
            type: "POST",
            data: {
                id: id
            },
            success: function(result) {
                var values = $.parseJSON(result);
                str += `
                    <div style='color: black; max-height: 360px;' class='view_hima'>
                        <h5 style="font-size: 12pt;">Nama Lengkap</h5>
                        <h5 style="font-size: 14pt; font-weight: bold;">` + values.nama + `</h5>
                        <h5 style="font-size: 12pt;" class="mt-4">Nomor HP</h5>
                        <h5 style="font-size: 14pt; font-weight: bold;">` + values.no_hp + `</h5>
                        <h5 style="font-size: 12pt;" class="mt-4">E-mail</h5>
                        <h5 style="font-size: 14pt; font-weight: bold;">` + values.email + `</h5>
                        <h5 style="font-size: 12pt;" class="mt-4">Alamat</h5>
                        <h5 style="font-size: 14pt; font-weight: bold; word-break: break-all;">` + values.alamat + `</h5>
                    </div>
                `;
                $.confirm({
                    title: 'PENERIMA KAYU BALSA<br>' + team,
                    theme: 'modern',
                    backgroundDismissAnimation: 'random',
                    animation: 'Rotate',
                    closeAnimation: 'scale',
                    onOpen: function() {
                        setTimeout(() => {
                            this.$content.html(str);
                        }, 100);
                    },
                    draggable: false,
                    columnClass: "col-md-5",
                    buttons: {
                        cancel: {
                            text: 'Close',
                            btnClass: 'btn-red',
                            action: function() {}
                        }
                    },
                    content: `
                        <div style="height: 100px; display: grid; place-items: center;">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    `
                });
            },
            error: function(result) {
                //Error handling
                alert("ERROR!");
                // console.log();
            }
        });
    }
</script>

<style>
    td {
        vertical-align: middle !important;
    }
</style>

<body>

    <!-- <div id="particles-js"></div>
    <img onclick="window.open('https://youtu.be/L1KEJzfsQEY')" src="../assets/image/santa_by_nicsv.gif" alt="HO HO HO" class="santa"> -->

    <div class="container-fluid" style="color: #412c27; margin-top: 30px;">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
                <div align="center">
                    <h2>LIST PENERIMA KAYU BALSA</h2>
                    <h2><b>&#127982; BRIDGE COMPETITION 2022 &#127982;</b></h2>
                    <h3><?php echo $emojiTexts[$randomIndex]; ?></h3><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-10 offset-md-1" style="padding-top: 30px;">
                <select class="form-control" id="filter_jenjang" name="filter_jenjang" style="height:40px; font-size: 12pt;">
                    <option value="">Lihat berdasarkan jenjang pendidikan...</option>
                    <option value="Senior High School">Senior High School</option>
                    <option value="University">University</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1" style="padding-top: 30px;">
                <select class="form-control" id="filter_status" name="filter_status" style="height:40px; font-size: 12pt;">
                    <option value="">Lihat berdasarkan status...</option>
                    <option value="VIEW">Sudah Memberikan Penerima Kayu Balsa</option>
                    <option value='&nbsp;'>Belum Memberikan Penerima Kayu Balsa</option>
                </select>
            </div>
        </div>

        <br>

        <br><br>
        <p style="font-weight: bold;">kalo butuh excel dengan format judul kolom tertentu bisa contact it yah guys</p>

        <div class="row" style="margin-top: 20px;overflow-x: auto;">
            <div class="col-12" style="overflow-x:auto;">
                <table class="table table-hovered table-striped" id="pendaftarTable2" style="color: #412c27; width: 100%" hidden>
                    <thead style="text-align: center; font-weight: bold;">
                        <tr>
                            <td style="width: 5%;">#</td>
                            <td>Nama Team</td>
                            <td>Asal Sekolah/Universitas</td>
                            <td>Jenjang Pendidikan</td>
                            <!-- <td>Penerima Kayu Balsa</td> -->
                            <td>Nama Lengkap Penerima Kayu Balsa</td>
                            <td>Nomor HP Penerima Kayu Balsa</td>
                            <td>E-mail Penerima Kayu Balsa</td>
                            <td>Alamat Penerima Kayu Balsa</td>
                        </tr>
                    </thead>
                    <tbody id="pendaftarTableBody2" style="text-align: center;">

                    </tbody>
                </table>
            </div>

            <div class="col-12">
                <table class="table table-hovered table-striped" id="pendaftarTable" style="color: #412c27; width: 100%">
                    <thead style="text-align: center; font-weight: bold;">
                        <tr>
                            <td style="width: 5%;">#</td>
                            <td>Nama Team</td>
                            <td>Asal Sekolah/Universitas</td>
                            <td>Jenjang Pendidikan</td>
                            <td>Penerima Kayu Balsa</td>
                        </tr>
                    </thead>
                    <tbody id="pendaftarTableBody" style="text-align: center;">

                    </tbody>
                </table><br>
            </div>
        </div>
    </div>

</body>

</html>