<?php
require_once 'phps/connect.php';
$_SESSION['page'] = 'pendaftar';

// if (!isset($_SESSION['nrpAdmin'])) {
//     header("Location: index.php");
//     exit();
// }

// $nama = $_SESSION['namaAdmin'];
// $nrp = $_SESSION['nrpAdmin'];

include 'header.php';

$emojiTexts = ['༼ つ ◕_◕ ༽つ', 'ʕ•ᴥ•ʔ', '(ง ͠° ͟ل͜ ͡°)ง', '¯\_(ツ)_/¯', "(ง'̀-'́)ง", '(ᵔᴥᵔ)', '(¬‿¬)', '(~˘▾˘)~', '༼ʘ̚ل͜ʘ̚༽', 'ᕦ(ò_óˇ)ᕤ', '(｡◕‿‿◕｡)', '(>‿◠)✌'];
$randomIndex = array_rand($emojiTexts);
?>

<!DOCTYPE html>

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

    .updateStatus .jconfirm-title {
        padding-top: 20px !important;
    }

    .validasiBatal .jconfirm-title {
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
</style>

<script type="text/javascript">
    function updateStatus(data) {
        var id = data.getAttribute("data-id");
        var nama = data.getAttribute("data-nama");
        var sekolah = data.getAttribute("data-sekolah");
        $.confirm({
            title: 'Konfirmasi Validitas Bukti Pembayaran Team',
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
                            url: "phps/updatestatus.php",
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
                                    window.location.href = "list_pendaftar.php";
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
            content: "<div style='color: black; font-size: 12pt;'>Apakah Anda yakin akan mengkonfirmasi validitas bukti pembayaran untuk nama team <b>" + nama + "</b> dari <b>" + sekolah + "</b>?<br><b><br>Nama Anda akan tercantum</b> sebagai yang mengkonfirmasi bukti pembayaran team ini.</div><br>"
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
        var bukti_bc = data.getAttribute("data-bukti-bc");
        var bukti_erdc = data.getAttribute("data-bukti-erdc");
        var bukti_lktb = data.getAttribute("data-bukti-lktb");
        var namarek = data.getAttribute("data-namarek");
        var norek = data.getAttribute("data-norek");
        var namarek
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
                        NAMA TEAM<br>
                        <b>` + nama + `</b><hr>ASAL SEKOLAH/UNIVERSITAS<br>
                        <b>` + sekolah + `</b>
                        <hr>
                        <br>`;
                    if (bukti_bc != '') {
                        str += `<a type='button' onclick='displayBuktiBC(this)' data-bukti-bc='` + bukti_bc + `' class='btn btn-warning' >LIHAT BUKTI PEMBAYARAN<br><b>BRIDGE COMPETITION</b></a><br><br>`;
                    }
                    if (bukti_erdc != '') {
                        str += `<a type='button' onclick='displayBuktiERDC(this)' data-bukti-erdc='` + bukti_erdc + `' class='btn btn-warning' >LIHAT BUKTI PEMBAYARAN<br><b>EARTHQUAKE RESISTANCE DESIGN COMPETITION</b></a><br><br>`;
                    }
                    if (bukti_lktb != '') {
                        str += `<a type='button' onclick='displayBuktiLKTB(this)' data-bukti-lktb='` + bukti_lktb + `' class='btn btn-warning' >LIHAT BUKTI PEMBAYARAN<br><b>LOMBA KUAT TEKAN BETON</b></a><br><br>`;
                    }
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

    function displayBuktiBC(data) {
        var bukti = data.getAttribute("data-bukti-bc");
        $.confirm({
            title: '',
            type: 'green',
            typeAnimated: true,
            theme: 'modern',
            draggable: false,
            onOpen: function() {
                setTimeout(() => {
                    this.$content.html("<img src='../uploads/bukti_transfer_bc/" + bukti + "' style='max-width: 60%;'>")
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

    function displayBuktiERDC(data) {
        var bukti = data.getAttribute("data-bukti-erdc");
        $.confirm({
            title: '',
            type: 'green',
            typeAnimated: true,
            theme: 'modern',
            draggable: false,
            onOpen: function() {
                setTimeout(() => {
                    this.$content.html("<img src='../uploads/bukti_transfer_erdc/" + bukti + "' style='max-width: 60%;'>")
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

    function displayBuktiLKTB(data) {
        var bukti = data.getAttribute("data-bukti-lktb");
        $.confirm({
            title: '',
            type: 'green',
            typeAnimated: true,
            theme: 'modern',
            draggable: false,
            onOpen: function() {
                setTimeout(() => {
                    this.$content.html("<img src='../uploads/bukti_transfer_lktb/" + bukti + "' style='max-width: 60%;'>")
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
        $("#filterbidang").on("change", function() {
            table.columns(5).search(this.value).draw();
        });

        $("#filteranggota").on("change", function() {
            table.columns(4).search(this.value).draw();
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
            url: "phps/refresh_pendaftar.php",
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
                    str += "<td>" + d.tanggal_daftar + "</td>";
                    str += "<td>" + d.nama_sekolah + "</td>";
                    str += "<td>" + d.nama_kelompok + "</td>";
                    str += "<td>" + d.jumlah_anggota + "</td>";
                    str += "<td>";
                    if (d.pilihan_lomba_1 != '') {
                        str += d.pilihan_lomba_1 + " ";
                    }
                    if (d.pilihan_lomba_2 != '') {
                        str += d.pilihan_lomba_2 + " ";
                    }
                    if (d.pilihan_lomba_3 != '') {
                        str += d.pilihan_lomba_3 + " ";
                    }
                    str += "</td>";
                    str += "<td><a type='button' class='btn btn-warning' href='viewberkas.php?id=" + d.id + "'><b>View</b></a></td>";
                    str += "<td><button id='view_bukti' style='font-weight: bold; font-size: 12pt;' class='btn btn-success' data-sekolah='" + d.nama_sekolah + "' data-nama='" + d.nama_kelompok + "' data-norek='" + d.norek_pentransfer + "' data-namarek='" + d.nama_pentransfer + "' data-bukti-bc='" + d.bukti_transfer_bc + "' data-bukti-erdc='" + d.bukti_transfer_erdc + "' data-bukti-lktb='" + d.bukti_transfer_lktb + "' onclick='viewBukti(this)'>VIEW</button></td>";
                    if (d.status == 0) {
                        str += "<td><button id='confirm' style='font-size: 12pt;' class='btn btn-primary' data-sekolah='" + d.nama_sekolah + "' data-nama='" + d.nama_kelompok + "' data-id='" + d.id + "' onclick='updateStatus(this)'>KONFIRMASI</button></td>";
                    } else {
                        str += "<td>CONFIRMED BY<br><span style='font-weight: bold;'>" + d.confirmed_by + "</span><br><i class='fas fa-check' style='color: green;'></i></td>";
                    }
                    str += "</tr>";
                    num = num + 1;
                }
                $("#pendaftarTableBody").html(str);
                var table = $('#pendaftarTable').DataTable({
                    "oLanguage": {
                        "sEmptyTable": "Belum ada pendaftar"
                    }
                    ,
                    dom: "<'row'<'col-sm-12'B>>" + 
                        "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-6'i><'col-sm-6' p>>",
                    buttons: [
                        'copy', 'excel', 'csv','pdf', 'print'
                    ],
                    buttons: {
                        dom: {
                            button: {
                                tag: "button",
                                className: "btn btn-info my-4"
                            },
                            buttonLiner: {
                                tag: null                
                            }
                        }
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

    <div id="particles-js"></div>
    <img onclick="window.open('https://youtu.be/L1KEJzfsQEY')" src="../assets/image/santa_by_nicsv.gif" alt="HO HO HO" class="santa">

    <div class="container-fluid" style="color: #412c27; margin-top: 30px;">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
                <div align="center">
                    <h2>LIST PENDAFTAR LOMBA</h2>
                    <h2><b>&#127876; PETRA CIVIL EXPO 2022 &#127876;</b></h2>
                    <h3><?php echo $emojiTexts[$randomIndex]; ?></h3><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-10 offset-md-1" style="padding-top: 30px;">
                <select class="form-control" id="filterbidang" name="filterbidang" style="height:40px; font-size: 12pt;">
                    <option value="">Lihat berdasarkan pilihan bidang lomba...</option>
                    <option value="bc-sma">Bridge Competition (SMA)</option>
                    <option value="bc-univ">Bridge Competition (University)</option>
                    <option value="erdc">Earthquake Resistance Design Competition</option>
                    <option value="lktb">Lomba Kuat Tekan Beton</option>
                </select>
            </div>

        </div>

        <div class="row" style="margin-top: 30px;">
            <div class="col-12 col-md-10 offset-md-1">
                <select class="form-control" id="filteranggota" name="filteranggota" style="height:40px; font-size: 12pt;">
                    <option value="">Lihat berdasarkan jumlah anggota team...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
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

        <a type='button' class='btn btn-success' style="margin-top: 30px; z-index: 1000; position: relative;" data-toggle="modal" data-target="#myModal">Jumlah Pendaftar (click)</a>


        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h4 class="modal-title" id="exampleModalLabel" style="color: black; font-weight: bold;">&#127877; Jumlah Pendaftar &#127877;</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead style="text-align: center;">
                                <tr style="text-align: center;">
                                    <th>Nama Bidang Lomba</th>
                                    <th>Jumlah (team)</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                <?php
                                $getPil1sql = "SELECT pilihan_lomba_1, COUNT(*) as x FROM pendaftar WHERE pilihan_lomba_1 != ''";
                                $getPil1stmt = $pdo->prepare($getPil1sql);
                                $getPil1stmt->execute();
                                $getPil1 = $getPil1stmt->fetch();

                                $getPil2sql = "SELECT pilihan_lomba_2, COUNT(*) as x FROM pendaftar WHERE pilihan_lomba_2 != ''";
                                $getPil2stmt = $pdo->prepare($getPil2sql);
                                $getPil2stmt->execute();
                                $getPil2 = $getPil2stmt->fetch();

                                $getPil3sql = "SELECT pilihan_lomba_3, COUNT(*) as x FROM pendaftar WHERE pilihan_lomba_3 != ''";
                                $getPil3stmt = $pdo->prepare($getPil3sql);
                                $getPil3stmt->execute();
                                $getPil3 = $getPil3stmt->fetch();

                                echo '<tr><td>Bridge Competition</td><td>' . $getPil1['x'] . '</td></tr>';
                                echo '<tr><td>Earthquake Resistance Design Competition</td><td>' . $getPil2['x'] . '</td></tr>';
                                echo '<tr><td>Lomba Kuat Tekan Beton</td><td>' . $getPil3['x'] . '</td></tr>';
                                ?>
                            </tbody>
                        </table>
                        <?php
                        $pendaftarsql = "SELECT COUNT(*) as x FROM pendaftar";
                        $pendaftarstmt = $pdo->prepare($pendaftarsql);
                        $pendaftarstmt->execute();
                        $pendaftar = $pendaftarstmt->fetch();

                        echo '<br><p style="color: black; text-align: center;"><b>Jumlah total pendaftar</b></p><h3 style="color: black; text-align: center;"><b>&#9731;&#65039; ' . $pendaftar["x"] . ' TEAM &#9731;&#65039;</b></h3><br>';
                        ?>

                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 20px;overflow-x: auto;">
            <div class="col-12">
                <table class="table table-hovered table-striped" id="pendaftarTable" style="color: #412c27; width: 100%">
                    <thead style="text-align: center; font-weight: bold;">
                        <tr>
                            <td style="width: 5%;">#</td>
                            <td>Tanggal Daftar</td>
                            <td>Asal Sekolah/Universitas</td>
                            <td>Nama Team</td>
                            <td>Jumlah Anggota</td>
                            <td>Pilihan Lomba</td>
                            <td>Data Team</td>
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

    <script src="../assets/js/particles.js"></script>
    <script>
        /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
        particlesJS.load('particles-js', '../assets/js/particlesjs-config-admin.json', function() {
            console.log('callback - particles.js config loaded');
        });
    </script>

</body>

</html>