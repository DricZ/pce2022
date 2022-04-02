<?php
require_once 'phps/connect.php';

$_SESSION['page'] = 'add_money_history';

include 'header.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin BC 2022 - Bridge Coin History</title>
</head>

<style>
    #historyTable_length,
    #historyTable_length select,
    #historyTable_filter,
    #historyTable_info,
    #historyTable_previous,
    #historyTable_next {
        color: white;
    }

    #historyTable_filter input {
        background-color: #F8F9FA;
    }

    #historyTable_length select option {
        color: white;
    }

    #historyTable_length select:hover {
        background-color: rgb(32, 31, 31);
    }

    #historyTable_length select {
        background-color: rgb(32, 31, 31);
    }

    #historyTableBody td {
        background-color: rgb(32, 31, 31);
    }

    #historyTable_next,
    #historyTable_previous {
        color: white !important;
    }

    #historyTable_paginate .paginate_button {
        color: white !important;
    }

    #historyTable_paginate .paginate_button.current {
        color: black !important;
    }

    #historyTable_next.disabled,
    #historyTable_previous.disabled {
        color: grey !important;
    }
</style>

<script>
    var ajaxcall;

    function show() {
        $("#historyTableBody").html("<span>Harap tunggu...</span>");

        if (ajaxcall != null) {
            ajaxcall.abort();
        }

        $.ajax({
            url: "phps/refresh_history_money.php",
            type: "get",
            dataType: "json",
            success: function(result) {
                $("#historyTable").dataTable().fnDestroy();
                var data = result;
                var str = "";
                var num = 1;
                //loop dari data
                for (var i = 0; i < data.length; i++) {
                    var d = data[i];
                    str += "<tr style='font-weight: 100;'>";
                    str += "<td>" + num + "</td>";
                    str += "<td>" + d.team_name + "</td>";
                    str += "<td>" + d.money_value + "</td>";
                    str += "<td>" + d.keterangan + "</td>";
                    str += "<td>" + d.added_on + " WIB</td>";
                    str += "<td>" + d.added_by + "</td>";
                    str += "</tr>";
                    num += 1;
                }
                $("#historyTableBody").html(str);
                var table = $('#historyTable').DataTable({
                    "oLanguage": {
                        "sEmptyTable": "Belum Ada Team Yang Pernah Diberikan Bridge Money"
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

    function Search(table) {
        $("#filter_team").on("change", function() {
            table.columns(1).search(this.value).draw();
        });
    }

    $(document).ready(function() {
        show();
    });
</script>

<body>
    <div class="container-fluid" style="margin-top: 30px;">
        <div class="title-row row mx-4">
            <h1 class="title"><i class="fas fa-history"></i> ADD BRIDGE COIN HISTORY</h1>
        </div>
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2" style="padding-top: 30px;">
                <select class="selectpicker form-control" id="filter_team" name="filter_team" style="height:40px; font-size: 12pt;" data-live-search="true" data-size="10">
                    <option value="">Lihat berdasarkan nama team...</option>
                    <?php
                    $sqlTeam = "SELECT * FROM team";
                    $stmtTeam = $pdo->prepare($sqlTeam);
                    $stmtTeam->execute([]);
                    while ($rowTeam = $stmtTeam->fetch()) { ?>
                        <option value="<?php echo $rowTeam['team_name']; ?>"><?php echo $rowTeam['team_name']; ?></option>
                    <?php  } ?>
                </select>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;overflow-x: auto;">
            <div class="col-12" style="overflow-x: auto;">
                <table class="table table-hovered" id="historyTable" style="color: white;width: 100%">
                    <thead style="text-align: center; font-weight: bold;">
                        <tr>
                            <td style="width: 5%;">#</td>
                            <td>Nama Team</td>
                            <td>Bridge Coin yang Ditambahkan</td>
                            <td>Keterangan</td>
                            <td>Added On</td>
                            <td>Added By</td>
                        </tr>
                    </thead>
                    <tbody id="historyTableBody" style="text-align: center;">

                    </tbody>
                </table><br>
            </div>
        </div>
        <center><a href="give_money.php" class="btn btn-warning container-fluid mb-5" style="width: 200px;"><b>Back</b></a></center>
        <div style="margin-top: 100px;">
            &nbsp;
        </div>
    </div>
</body>

</html>