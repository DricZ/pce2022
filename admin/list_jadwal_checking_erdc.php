<?php
require_once 'phps/connect.php';
$_SESSION['page'] = 'jadwal_checking_erdc';

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
    <title>Jadwal Checking ERDC</title>
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
        $("#filter_status").on("change", function() {
            table.columns(5).search(this.value).draw();
        });
        $("#filter_tanggal").on("change", function() {
            table.columns(3).search(this.value).draw();
        });
        $("#filter_jam").on("change", function() {
            table.columns(4).search(this.value).draw();
        });
    }

    function Search2(table) {
        $("#filter_tanggal").on("change", function() {
            table.columns(3).search(this.value).draw();
        });
        $("#filter_jam").on("change", function() {
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
            url: "phps/refresh_jadwal_checking_erdc.php",
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
                    if (d.status > 0) {
                        str += "<td>" + d.tanggal + "</td>";
                        str += "<td>" + d.jam + " WIB</td>";
                        str += "<td hidden>done</td>";
                    } else {
                        str += `<td><b style="color: red;"><i class="fas fa-times">&nbsp;</i></b></td>`;
                        str += `<td><b style="color: red;"><i class="fas fa-times">&nbsp;</i></b></td>`;
                        str += "<td hidden>not yet</td>";
                    }

                    str += "</tr>";
                    num = num + 1;
                }
                $("#pendaftarTableBody").html(str);
                var table = $('#pendaftarTable').DataTable({
                    "oLanguage": {
                        "sEmptyTable": "Belum Ada Team Yang Memilih Jadwal"
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
            url: "phps/refresh_jadwal_checking_erdc.php",
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
                    if (d.status > 0) {
                        str2 += "<td>" + d.tanggal + "</td>";
                        str2 += "<td>" + d.jam + " WIB</td>";
                    } else {
                        str2 += `<td><b style="color: red;"><i class="fas fa-times">&nbsp;</i></b></td>`;
                        str2 += `<td><b style="color: red;"><i class="fas fa-times">&nbsp;</i></b></td>`;
                    }

                    str2 += "</tr>";
                    num = num + 1;
                }

                $("#pendaftarTableBody2").html(str2);
                var table2 = $('#pendaftarTable2').DataTable({
                    "oLanguage": {
                        "sEmptyTable": "Belum Ada Team Yang Memilih Jadwal"
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
                    <h2>LIST JADWAL CHECKING</h2>
                    <h2><b>&#127982; EARTHQUAKE RESISTANT DESIGN COMPETITION 2021 &#127982;</b></h2>
                    <h3><?php echo $emojiTexts[$randomIndex]; ?></h3><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-10 offset-md-1" style="padding-top: 30px;">
                <select class="form-control" id="filter_tanggal" name="filter_tanggal" style="height:40px; font-size: 12pt;">
                    <option value="">Lihat berdasarkan tanggal...</option>
                    <option value="06-05-2021">06-05-2021</option>
                    <option value="07-05-2021">07-05-2021</option>
                    <option value="08-05-2021">08-05-2021</option>
                </select>
            </div>
            <div class="col-12 col-md-10 offset-md-1" style="padding-top: 30px;">
                <select class="form-control" id="filter_jam" name="filter_jam" style="height:40px; font-size: 12pt;">
                    <option value="">Lihat berdasarkan jam...</option>
                    <?php
                    $getJamsql = "SELECT DISTINCT jam FROM jadwal_checking_erdc ORDER BY jam ASC";
                    $getJamstmt = $pdo->prepare($getJamsql);
                    $getJamstmt->execute();
                    while ($getJam = $getJamstmt->fetch()) {
                    ?>
                        <option value="<?= $getJam['jam'] ?>"><?= $getJam['jam'] ?> WIB</option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-12 col-md-10 offset-md-1" style="padding-top: 30px;">
                <select class="form-control" id="filter_status" name="filter_status" style="height:40px; font-size: 12pt;">
                    <option value="">Lihat berdasarkan status...</option>
                    <option value='done'>Sudah Memilih Jadwal</option>
                    <option value='not yet'>Belum Memilih Jadwal</option>
                </select>
            </div>
        </div>
        <br>
        <br>
        <br>
        <p style="font-weight: bold;">kalo butuh excel dengan format judul kolom tertentu bisa contact it yah guys</p>

        <div class="row" style="margin-top: 20px;overflow-x: auto;">
            <div class="col-12" style="overflow-x:auto;">
                <table class="table table-hovered table-striped" id="pendaftarTable2" style="color: #412c27; width: 100%" hidden>
                    <thead style="text-align: center; font-weight: bold;">
                        <tr>
                            <td style="width: 5%;">#</td>
                            <td>Nama Team</td>
                            <td>Asal Universitas</td>
                            <td>Tanggal Checking</td>
                            <td>Jam Checking</td>
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
                            <td>Asal Universitas</td>
                            <td>Tanggal Checking</td>
                            <td>Jam Checking</td>
                            <td hidden>Abaikan Kolom Ini</td>
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