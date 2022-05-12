<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
    table {
        font-family: arial, sans-serif;
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
    </style>
</head>

<body>
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
</body>

<script>
$.ajax({
    url: "phps/refresh_pameran.php",
    method: "GET",
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
</script>

</html>