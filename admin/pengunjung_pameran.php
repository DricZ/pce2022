<?php
require_once 'phps/connect.php';
$_SESSION['page'] = 'pameran';

include 'header.php';

$emojiTexts = ['༼ つ ◕_◕ ༽つ', 'ʕ•ᴥ•ʔ', '(ง ͠° ͟ل͜ ͡°)ง', '¯\_(ツ)_/¯', "(ง'̀-'́)ง", '(ᵔᴥᵔ)', '(¬‿¬)', '(~˘▾˘)~', '༼ʘ̚ل͜ʘ̚༽', 'ᕦ(ò_óˇ)ᕤ', '(｡◕‿‿◕｡)', '(>‿◠)✌'];
$randomIndex = array_rand($emojiTexts);
?>

<!DOCTYPE html>

<head>
    <title>Pengunjung Pameran</title>
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
table {
    border-collapse: collapse;
    width: 100%;
}

td,
th {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

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
}
</style>

<script type="text/javascript">
function show(dicari) {
    $.ajax({
        url: "phps/refresh_pameran.php",
        method: "POST",
        data: {
            cari: dicari
        },
        success: function(data) {
            var str = "";
            var num = 1;

            for (let i = 0; i < data.length; i++) {
                var d = data[i];
                str += "<tr style='font-weight: 100;'>";
                str += "<td>" + num + "</td>";
                str += "<td>" + d.nama + "</td>";
                str += "<td>" + d.email + "</td>";
                str += "<td>" + d.no_hp + "</td>";
                str += "<td>" + d.instansi + "</td>";
                str += "</tr>";
                num = num + 1;
            }

            document.getElementById("tabel_ku").innerHTML = str;
        },
        error: function($xhr, errorThrown) {
            console.log(errorThrown);
            console.warn($xhr.responseText);
        }
    });
}

function search() {
    var dicari = document.getElementById("input_ku").value;
    if (dicari == "") {
        show(1);
    } else {
        show(dicari);
    }
}

show(1);
</script>

<body>
    <div class="container-fluid" style="color: #412c27; margin-top: 30px;">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
                <div align="center">
                    <h2>LIST PENGUNJUNG PAMERAN</h2>
                    <h2><b>&#127982; PETRA CIVIL EXPO 2022 &#127982;</b></h2>
                    <h3><?php echo $emojiTexts[$randomIndex]; ?></h3><br>
                </div>
            </div>
        </div>

        <br>
        <div style="margin: 35px;">
            <input id="input_ku" type="text">
            <button class="btn btn-success" onclick="search()">Search</button>
            <button class="btn btn-primary" onclick="search(1)">Refresh</button>
        </div>
        <table>
            <thead style="text-align: center; font-weight: bold;">
                <tr>
                    <td style="width: 5%;">#</td>
                    <td>Nama Lengkap</td>
                    <td>Email Pengunjung</td>
                    <td>Nomor HP</td>
                    <td>Asal Instansi</td>
                </tr>
            </thead>
            <tbody id="tabel_ku">

            </tbody>
        </table>
    </div>
</body>

</html>