<?php
require_once 'phps/connect.php';
$_SESSION['page'] = 'webinar';

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
    <title>List Pendaftar Webinar</title>
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
    function updateStatus(data) {
        var id = data.getAttribute("data-id");
        var nama = data.getAttribute("data-nama");
        var sekolah = data.getAttribute("data-sekolah");
        $.confirm({
            title: 'Konfirmasi Validitas Bukti Pembayaran Pendaftar',
            type: 'orange',
            typeAnimated: true,
            theme: 'modern',
            icon: 'fas fa-question',
            draggable: false,
            animation: 'zoom',
            backgroundDismissAnimation: 'random',
            autoClose: 'cancel|10000',
            closeAnimation: 'scale',
            columnClass: "updateStatus col-md-9",
            buttons: {
                confirm: {
                    text: 'KONFIRMASI',
                    btnClass: 'btn-green',
                    action: function() {
                        $.ajax({
                            url: "phps/updatestatuswebinar.php",
                            method: "POST",
                            data: {
                                id: id
                            },
                            success: function(res) {
                                Swal.fire({
                                    position: "top-end",
                                    icon: "success",
                                    title: "Validasi Berhasil!",
                                    showConfirmButton: false,
                                    timer: 3000
                                })
                                setTimeout(function() {
                                    window.location.href = "list_pendaftar_webinar.php";
                                }, 3000);
                            }
                        });
                    }
                },
                cancel: {
                    text: 'BATAL',
                    btnClass: 'btn-red',
                    action: function() {
                        validasiBatal();
                    }
                }
            },
            content: "<div style='color: black; font-size: 12pt;'>Apakah Anda yakin akan mengkonfirmasi validitas bukti pembayaran untuk nama pendaftar <b>" +
                nama + "</b> dari <b>" + sekolah +
                "</b>?<br><b><br>Nama Anda akan tercantum</b> sebagai yang mengkonfirmasi bukti pembayaran team ini.</div><br>"
        });
    }

    function validasiBatal() {
        $.confirm({
            title: 'Validasi Batal!',
            type: 'red',
            typeAnimated: true,
            theme: 'modern',
            icon: 'far fa-times-circle',
            draggable: false,
            backgroundDismissAnimation: 'random',
            closeAnimation: 'scale',
            columnClass: "validasiBatal col-md-3",
            buttons: {
                cancel: {
                    text: 'OK',
                    btnClass: 'btn-red'
                }
            },
            content: ""
        });
    }

    function viewBukti(data) {
        var nama = data.getAttribute("data-nama");
        var sekolah = data.getAttribute("data-sekolah");
        var bukti = data.getAttribute("data-bukti");
        var namarek = data.getAttribute("data-namarek");
        var norek = data.getAttribute("data-norek");
        $.confirm({
            title: 'VIEW BUKTI PEMBAYARAN',
            type: 'green',
            theme: 'modern',
            backgroundDismissAnimation: 'random',
            animation: 'Rotate',
            closeAnimation: 'scale',
            onOpen: function() {
                setTimeout(() => {
                    var str = `
                    <div style='color: black; font-size: 12pt; max-height: 300px;'>
                        <hr>
                        NAMA PENDAFTAR<br>
                        <b>` + nama + `</b><hr>ASAL SEKOLAH/UNIVERSITAS<br>
                        <b>` + sekolah + `</b>
                        <hr>
                        <br>`;
                    str +=
                        `<a type='button' onclick='displayBukti(this)' data-bukti='` +
                        bukti +
                        `' class='btn btn-warning' style='-webkit-appearance: none;'>LIHAT BUKTI PEMBAYARAN<br><b>WEBINAR INTERNASIONAL</b></a><br><br>`;
                    str += `
                        <hr>NOMOR REKENING<br>
                        <b>` + norek + `</b>
                        <br>
                        <hr>NAMA PEMILIK REKENING<br>
                        <b>` + namarek + `</b>
                        <br><hr>
                    </div>`;
                    this.$content.html(str);
                }, 100);
            },
            draggable: false,
            columnClass: "col-md-6",
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
    }

    function displayBukti(data) {
        var bukti = data.getAttribute("data-bukti");
        $.confirm({
            title: '',
            type: 'green',
            typeAnimated: true,
            theme: 'modern',
            draggable: false,
            onOpen: function() {
                setTimeout(() => {
                    this.$content.html("<a href='../uploads/webinar_bukti_transfer/" + bukti +
                        "' target='_blank'><img src='../uploads/webinar_bukti_transfer/" + bukti +
                        "' style='max-width: 60%;'></a><p class='mt-3' style='color: red; font-weight: bold;'>(CLICK ON IMAGE TO ENLARGE)</p>")
                }, 100);
            },
            backgroundDismissAnimation: 'random',
            closeAnimation: 'scale',
            columnClass: "col-md-6",
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
    }

    $(document).ready(function() {
        show();
    });

    function Search(table) {
        $("#filter_kategori").on("change", function() {
            table.columns(3).search(this.value).draw();
        });

        $("#filterstatus").on("change", function() {
            table.columns(8).search(this.value).draw();
        });
    }

    function Search2(table) {
        $("#filter_kategori").on("change", function() {
            table.columns(3).search(this.value).draw();
        });

        $("#filterstatus").on("change", function() {
            table.columns(8).search(this.value).draw();
        });
    }

    var ajaxcall;

    function show() {
        $("#pendaftarTableBody").html("<span>Harap tunggu...</span>");

        if (ajaxcall != null) {
            ajaxcall.abort();
        }

        $.ajax({
            url: "phps/refresh_webinar.php",
            type: "get",
            dataType: "json",
            success: function(result) {
                $("#pendaftarTable").dataTable().fnDestroy();
                var data = result;
                var str = "";
                var str2 = "";
                var num = 1;
                //loop dari data
                for (var i = 0; i < data.length; i++) {
                    var d = data[i];
                    str += "<tr style='font-weight: 100;'>";
                    str += "<td>" + num + "</td>";
                    str += "<td>" + d.submitted_on + " WIB</td>";
                    str += "<td>" + d.nama + "</td>";
                    str += "<td>" + d.country + "</td>";
                    str += "<td>" + d.nama_sekolah + "</td>";
                    str += "<td>" + d.city_and_country + "</td>";
                    str += "<td><a type='button' style='-webkit-appearance: none;' class='btn btn-warning' href='viewberkaswebinar.php?id=" + d.id +
                        "'><b>View</b></a></td>";
                    if (d.country == 'International Student') {
                        str += "<td style='color: green; font-weight: bold;'>FREE OF CHARGE</td>";
                    } else {
                        str +=
                            "<td><button id='view_bukti' style='font-weight: bold; font-size: 12pt;' class='btn btn-success' data-sekolah='" +
                            d.nama_sekolah + "' data-nama='" + d.nama + "' data-norek='" + d
                            .norek_pentransfer + "' data-namarek='" + d.nama_pentransfer + "' data-bukti='" +
                            d.bukti_transfer + "' onclick='viewBukti(this)'>VIEW</button></td>";
                    }

                    if (d.status == 0 && d.country != 'International Student') {
                        str +=
                            "<td><button id='confirm' style='font-size: 12pt;' class='btn btn-danger' data-sekolah='" +
                            d.nama_sekolah + "' data-nama='" + d.nama + "' data-id='" + d.id +
                            "' onclick='updateStatus(this)'>KONFIRMASI</button></td>";
                    } else if (d.country == 'International Student') {
                        str += "<td style='color: green; font-weight: bold;'>FREE OF CHARGE</td>";
                    } else {
                        str += "<td>CONFIRMED BY<br><span style='font-weight: bold;'>" + d.confirmed_by +
                            "</span><br><i class='fas fa-check' style='color: green;'></i></td>";
                    }
                    str += "</tr>";

                    //DEK KENE YO JIMM HEHE
                    str2 += "<tr style='font-weight: 100;'>";
                    str2 += "<td>" + num + "</td>";
                    str2 += "<td>" + d.submitted_on + " WIB</td>";
                    str2 += "<td>" + d.nama + "</td>";
                    str2 += "<td>" + d.country + "</td>";
                    str2 += "<td>" + d.nama_sekolah + "</td>";
                    str2 += "<td>" + d.city_and_country + "</td>";
                    str2 += "<td>" + d.email + "</td>";
                    str2 += "<td>" + d.no_hp + "</td>";
                    str2 += "<td>" + d.line + "</td>";
                    str2 += "</tr>";
                    num = num + 1;
                }
                $("#pendaftarTableBody").html(str);
                var table = $('#pendaftarTable').DataTable({
                    "oLanguage": {
                        "sEmptyTable": "Belum Ada Pendaftar Webinar"
                    }
                });

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
                Search(table);
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

<?php
if (isset($_GET['stat'])) {
    if ($_GET['stat'] == 1) {
        echo '<script>',
        '	Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Validasi Berhasil! ",
                showConfirmButton: false,
                timer: 3000
                })',
        '</script>';
    }
}
?>

<body>

    <!-- <div id="particles-js"></div>
    <img onclick="window.open('https://youtu.be/L1KEJzfsQEY')" src="../assets/image/santa_by_nicsv.gif" alt="HO HO HO" class="santa"> -->

    <div class="container-fluid" style="color: #412c27; margin-top: 30px;">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
                <div align="center">
                    <h2>LIST PENDAFTAR</h2>
                    <h2><b>&#127982; WEBINAR &#127982;</b></h2>
                    <h3><?php echo $emojiTexts[$randomIndex]; ?></h3><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-10 offset-md-1" style="padding-top: 30px;">
                <select class="form-control" id="filter_kategori" name="filter_kategori" style="height:40px; font-size: 12pt;">
                    <option value="">Lihat berdasarkan kategori...</option>
                    <option value="Indonesian Student">Indonesian Student</option>
                    <option value="International Student">International Student</option>
                </select>
            </div>
        </div>

        <div class="row" style="margin-top: 30px;">
            <div class="col-12 col-md-10 offset-md-1">
                <select class="form-control" id="filterstatus" name="filterstatus" style="height:40px; font-size: 12pt;">
                    <option value="">Lihat berdasarkan status validasi pembayaran...</option>
                    <option value="CONFIRMED BY">Terkonfirmasi</option>
                    <option value="KONFIRMASI">Belum Terkonfirmasi</option>
                </select>
            </div>
        </div>

        <br>

        <a type='button' class='btn btn-danger' style="-webkit-appearance: none; margin-top: 30px; z-index: 1000; position: relative;" data-toggle="modal" data-target="#myModal">Jumlah Pendaftar (click)</a>


        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h4 class="modal-title" id="exampleModalLabel" style="color: black; font-weight: bold;">
                            &#129512; Jumlah Pendaftar &#129512;</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead style="text-align: center;">
                                <tr style="text-align: center;">
                                    <th>Kategori</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                <?php
                                $getIndoStudentsql = "SELECT COUNT(*) as x FROM webinar WHERE country = 'Indonesian Student'";
                                $getIndoStudentstmt = $pdo->prepare($getIndoStudentsql);
                                $getIndoStudentstmt->execute([]);
                                $getIndoStudent = $getIndoStudentstmt->fetch();

                                $getInterStudentsql = "SELECT COUNT(*) as x FROM webinar WHERE country = 'International Student'";
                                $getInterStudentstmt = $pdo->prepare($getInterStudentsql);
                                $getInterStudentstmt->execute([]);
                                $getInterStudent = $getInterStudentstmt->fetch();

                                echo '<tr><td>Indonesian Student</td><td>' . $getIndoStudent['x'] . '</td></tr>';
                                echo '<tr><td>International Student</td><td>' . $getInterStudent['x'] . '</td></tr>';
                                ?>
                            </tbody>
                        </table>
                        <?php
                        $pendaftarsql = "SELECT COUNT(*) as x FROM webinar";
                        $pendaftarstmt = $pdo->prepare($pendaftarsql);
                        $pendaftarstmt->execute();
                        $pendaftar = $pendaftarstmt->fetch();

                        echo '<br><p style="color: black; text-align: center;"><b>Jumlah total pendaftar</b></p><h3 style="color: black; text-align: center;"><b>&#129511; ' . $pendaftar["x"] . ' ORANG &#129511;</b></h3><br>';
                        ?>

                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>

        <br><br>
        <p style="font-weight: bold;">kalo butuh excel dengan format judul kolom tertentu bisa contact it yah guys</p>
        <p style="font-weight: bold;">
            <a href="https://www.bible.com/id/bible/306/PHP.4.6.TB" style="text-decoration: none; color: green;" target="_blank">
                SEMANGAT JOHAN KONFIRMASINYA KM PASTI BISA
            </a>
        </p>

        <div class="row" style="margin-top: 20px;overflow-x: auto;">
            <div class="col-12" style="overflow-x:auto;">
                <table class="table table-hovered table-striped" id="pendaftarTable2" style="color: #412c27; width: 100%" hidden>
                    <thead style="text-align: center; font-weight: bold;">
                        <tr>
                            <td style="width: 5%;">#</td>
                            <td>Tanggal dan Waktu Daftar</td>
                            <td>Nama Pendaftar</td>
                            <td>Kategori</td>
                            <td>Asal Sekolah/Universitas</td>
                            <td>Kota IP Address Pendaftar</td>
                            <td>Email</td>
                            <td>Nomor HP</td>
                            <td>ID Line</td>
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
                            <td>Tanggal dan Waktu Daftar</td>
                            <td>Nama Pendaftar</td>
                            <td>Kategori</td>
                            <td>Asal Sekolah/Universitas</td>
                            <td>Kota IP Address Pendaftar</td>
                            <td>Data Pendaftar</td>
                            <td>Bukti Pembayaran</td>
                            <td>Validasi Pembayaran</td>
                        </tr>
                    </thead>
                    <tbody id="pendaftarTableBody" style="text-align: center;">

                    </tbody>
                </table><br>
            </div>
        </div>
    </div>

    <!-- <script src="../assets/js/particles.js"></script>
    <script>
        /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
        particlesJS.load('particles-js', '../assets/js/particlesjs-config-admin.json', function() {
            console.log('callback - particles.js config loaded');
        });
    </script> -->

</body>

</html>