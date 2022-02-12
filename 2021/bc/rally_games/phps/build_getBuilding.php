<?php
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idkel']) && isset($_POST['idkota'])) {
    $idkel = $_POST['idkel'];
    $idkota = $_POST['idkota'];

    $nama = '';
    $bahan = '';
    $img = '';
    $output = '';
    for ($i = 1; $i <= 9; $i++) {
        $sql = "SELECT * FROM `team_constructed_building` WHERE id_building_type = ? AND id_city = ? AND id_team = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$i, $idkota, $idkel]);

        if ($i == 1) {
            $nama = 'Jembatan Kayu';
            $img = '<img src="assets/image/b-kayu.svg" width="30%">';
            $bahan = '<div class="mx-2">
                        <img src="assets/image/wood-beam.svg" width="23rem"><span class="jml-bhn"> 4</span>
                    </div>
                    <div class="mx-2">
                        <img src="assets/image/miner.svg" width="23rem"><span class="jml-bhn"> 1</span>
                    </div>';
        }
        else if ($i == 2) {
            $nama = 'Jembatan Baja';
            $img = '<img src="assets/image/b-baja.svg" width="30%">';
            $bahan = '<div class="mx-2">
                        <img src="assets/image/baja.svg" width="23rem"><span class="jml-bhn"> 3</span>
                    </div>
                    <div class="mx-2">
                        <img src="assets/image/semen.svg" width="23rem"><span class="jml-bhn"> 1</span>
                    </div>
                    <div class="mx-2">
                        <img src="assets/image/pekerja.svg" width="23rem"><span class="jml-bhn"> 2</span>
                    </div>';
        }
        else if ($i == 3) {
            $nama = 'Jembatan Beton';
            $img = '<img src="assets/image/b-beton.svg" width="30%">';
            $bahan = '<div class="mx-2">
                        <img src="assets/image/baja.svg" width="23rem"><span class="jml-bhn"> 1</span>
                    </div>
                    <div class="mx-2">
                        <img src="assets/image/semen.svg" width="23rem"><span class="jml-bhn"> 3</span>
                    </div>
                    <div class="mx-2">
                        <img src="assets/image/pasir.svg" width="23rem"><span class="jml-bhn"> 1</span>
                    </div>
                    <div class="mx-2">
                        <img src="assets/image/pekerja.svg" width="23rem"><span class="jml-bhn"> 2</span>
                    </div>';
        }
        else if ($i == 4) {
            $nama = 'Rumah Sakit';
            $img = '<img src="assets/image/Rumah Sakit.png" width="30%">';
            $bahan = '<div class="mx-2">
                            <img src="assets/image/baja.svg" width="23rem"><span class="jml-bhn"> 1</span>
                        </div>
                        <div class="mx-2">
                            <img src="assets/image/semen.svg" width="23rem"><span class="jml-bhn"> 1</span>
                        </div>
                        <div class="mx-2">
                            <img src="assets/image/pasir.svg" width="23rem"><span class="jml-bhn"> 2</span>
                        </div>
                        <div class="mx-2">
                            <img src="assets/image/pekerja.svg" width="23rem"><span class="jml-bhn"> 2</span>
                        </div>';
        }
        else if ($i == 5) {
            $nama = 'Mall';
            $img = '<img src="assets/image/Mall.png" width="50%">';
            $bahan = '<div class="mx-2">
                        <img src="assets/image/baja.svg" width="23rem"><span class="jml-bhn"> 2</span>
                    </div>
                    <div class="mx-2">
                        <img src="assets/image/semen.svg" width="23rem"><span class="jml-bhn"> 1</span>
                    </div>
                    <div class="mx-2">
                        <img src="assets/image/pasir.svg" width="23rem"><span class="jml-bhn"> 1</span>
                    </div>
                    <div class="mx-2">
                        <img src="assets/image/pekerja.svg" width="23rem"><span class="jml-bhn"> 2</span>
                    </div>';
        }
        else if ($i == 6) {
            $nama = 'Taman';
            $img = '<img src="assets/image/Taman.png" width="30%">';
            $bahan = '<div class="mx-2">
                        <img src="assets/image/kayu.svg" width="23rem"><span class="jml-bhn"> 2</span>
                    </div>
                    <div class="mx-2">
                        <img src="assets/image/pasir.svg" width="23rem"><span class="jml-bhn"> 2</span>
                    </div>
                    <div class="mx-2">
                        <img src="assets/image/pekerja.svg" width="23rem"><span class="jml-bhn"> 1</span>
                    </div>';
        }
        else if ($i == 7) {
            $nama = 'Perumahan';
            $img = '<img src="assets/image/village.svg" width="30%">';
            $bahan = '<div class="mx-2">
                            <img src="assets/image/kayu.svg" width="23rem"><span class="jml-bhn"> 2</span>
                        </div>
                        <div class="mx-2">
                            <img src="assets/image/semen.svg" width="23rem"><span class="jml-bhn"> 1</span>
                        </div>
                        <div class="mx-2">
                            <img src="assets/image/pasir.svg" width="23rem"><span class="jml-bhn"> 1</span>
                        </div>
                        <div class="mx-2">
                            <img src="assets/image/pekerja.svg" width="23rem"><span class="jml-bhn"> 1</span>
                        </div>';
        }
        else if ($i == 8) {
            $nama = 'Apartemen';
            $img = '<img src="assets/image/Apartemen.png" width="21%">';
            $bahan = '<div class="mx-2">
                        <img src="assets/image/kayu.svg" width="23rem"><span class="jml-bhn">1</span>
                    </div>
                    <div class="mx-2">
                        <img src="assets/image/baja.svg" width="23rem"><span class="jml-bhn">1</span>
                    </div>
                    <div class="mx-2">
                        <img src="assets/image/semen.svg" width="23rem"><span class="jml-bhn">2</span>
                    </div>
                    <div class="mx-2">
                        <img src="assets/image/pasir.svg" width="23rem"><span class="jml-bhn">2</span>
                    </div>
                    <div class="mx-2">
                        <img src="assets/image/pekerja.svg" width="23rem"><span class="jml-bhn">2</span>
                    </div>';
        }
        else if ($i == 9) {
            $nama = 'Hotel';
            $img = '<img src="assets/image/family-house.svg" width="30%">';
            $bahan = '<div class="mx-2">
                        <img src="assets/image/kayu.svg" width="23rem"><span class="jml-bhn">1</span>
                    </div>
                    <div class="mx-2">
                        <img src="assets/image/baja.svg" width="23rem"><span class="jml-bhn">2</span>
                    </div>
                    <div class="mx-2">
                        <img src="assets/image/semen.svg" width="23rem"><span class="jml-bhn">1</span>
                    </div>
                    <div class="mx-2">
                        <img src="assets/image/pasir.svg" width="23rem"><span class="jml-bhn">1</span>
                    </div>
                    <div class="mx-2">
                        <img src="assets/image/pekerja.svg" width="23rem"><span class="jml-bhn">2</span>
                    </div>';
        }

        if ($stmt->rowCount() == 0) {
            $output.= '<div class="col py-3">
                        <div class="card-item shop-item">
                            <div class="container item">
                                <div class="row pt-3 justify-content-center">
                                    <h3 class="building">'.$nama.'</h3>
                                </div>
                                <div class="row justify-content-center">
                                    <!-- logo item -->'.$img.'
                                </div>
                                <div class="container justify-content-center mb-1 mt-2 jml-stok">
                                    <div class="col-12 text-center pb-3">Jumlah bahan:</div>
                                    <div class="row justify-content-center">'.$bahan.'</div>
                                </div>
                            </div>
                            <div class="container btn-beli btn-gradient py-2">
                                BANGUN
                            </div>
                        </div>
                    </div>';
        }
        else {
            $output.= '<div class="col py-3">
                        <!-- tambahan class "unavailable" untuk build card yg unavailable -->
                        <div class="card-item shop-item unavailable">
                            <div class="container item">
                                <div class="row pt-3 justify-content-center">
                                    <h3 class="building">'.$nama.'</h3>
                                </div>
                                <div class="row justify-content-center">
                                    <!-- logo item -->'.$img.'
                                </div>
                                <!-- div tambahan untuk build card yg unavailable -->
                                <div class="tag-unavailable" style="font-size:16pt;">SUDAH DIBANGUN</div>
                                <div class="container justify-content-center mb-1 mt-2 jml-stok">
                                    <div class="col-12 text-center pb-3">Jumlah bahan:</div>
                                    <div class="row justify-content-center">'.$bahan.'</div>
                                </div>
                            </div>
                            <div class="container btn-beli btn-gradient py-2">
                                BANGUN
                            </div>
                        </div>
                    </div>';
        }
    }
    echo $output;
} else {
    header("HTTP/1.1 400 Bad Request");
    $error = 'Method not Allowed';

    echo ($error);
}
?>