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

        //DI SETIAP $BAHAN ADA TAMPILAN OPTION UNTUK EFEK BOROBUDUR
        if ($i == 1) {
            $nama = 'Jembatan Kayu';
            $img = '<img src="assets/image/b-kayu.svg" width="30%">';
            $worker= '<div class="row justify-content-center mb-2"><div class="mx-2">
            <img src="assets/image/miner.svg" width="23rem"><span class="jml-bhn" data-val="1"> 1</span>
        </div></div>';
            $bahan = '<div class="col-12 pb-1">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Jembatan Kayu" id="jembatankayu_kayu" value="kayu" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                                <label class="form-check-label" for="material1">
                                <img src="assets/image/wood-beam.svg" width="23rem"><span class="jml-bhn" data-val="4"> 4</span></label>
                            </div>
                        </div>';
        }
        else if ($i == 2) {
            $nama = 'Jembatan Baja';
            $img = '<img src="assets/image/b-baja.svg" width="30%">';
            $worker= '<div class="row justify-content-center mb-2"><div class="mx-2">
            <img src="assets/image/miner.svg" width="23rem"><span class="jml-bhn" data-val="2"> 2</span>
        </div></div>';
            $bahan = '<div class="col pb-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Jembatan Baja" id="jemabatanbaja_baja" value="baja" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                            <label class="form-check-label" for="material1">
                            <img src="assets/image/i-beam.svg" width="23rem"><span class="jml-bhn" data-val="3"> 3</span>
                        </div>
                    </div>
                    <div class="col pb-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Jembatan Baja" id="jembatanbaja_semen" value="semen" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                            <label class="form-check-label" for="material2">
                            <img src="assets/image/concrete-bag.svg" width="23rem"><span class="jml-bhn" data-val="1"> 1</span>
                        </div>
                    </div>';
        }
        else if ($i == 3) {
            $nama = 'Jembatan Beton';
            $img = '<img src="assets/image/b-beton.svg" width="30%">';
            $worker= '<div class="row justify-content-center mb-2"><div class="mx-2">
            <img src="assets/image/miner.svg" width="23rem"><span class="jml-bhn" data-val="2"> 2</span>
        </div></div>';
            $bahan = '<div class="col pb-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Jembatan Beton" id="jembatanbeton_baja" value="baja" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                            <label class="form-check-label" for="material4">
                            <img src="assets/image/i-beam.svg" width="23rem"><span class="jml-bhn" data-val="1"> 1</span>
                        </div>
                    </div>
                    <div class="col pb-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Jembatan Beton" id="jembatanbeton_semen" value="semen" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                            <label class="form-check-label" for="material1">
                            <img src="assets/image/concrete-bag.svg" width="23rem"><span class="jml-bhn" data-val="3"> 3</span>
                        </div>
                    </div>
                    <div class="col-12 pb-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Jembatan Beton" id="jembatanbeton_pasir" value="pasir" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                            <label class="form-check-label" for="material2">
                            <img src="assets/image/powder.svg" width="23rem"><span class="jml-bhn" data-val="1"> 1</span>
                        </div>
                    </div>';
        }
        else if ($i == 4) {
            $nama = 'Rumah Sakit';
            $img = '<img src="assets/image/Rumah Sakit.png" width="30%">';
            $worker= '<div class="row justify-content-center mb-2"><div class="mx-2">
            <img src="assets/image/miner.svg" width="23rem"><span class="jml-bhn" data-val="2"> 2</span>
        </div></div>';
            $bahan = '<div class="col pb-1">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Rumah Sakit" id="rumahsakit_baja" value="baja" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                                <label class="form-check-label" for="material1">
                                <img src="assets/image/i-beam.svg" width="23rem"><span class="jml-bhn" data-val="1"> 1</span>
                            </div>
                        </div>
                        <div class="col pb-1">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Rumah Sakit" id="rumahsakit_semen" value="semen" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                                <label class="form-check-label" for="material2">
                                <img src="assets/image/concrete-bag.svg" width="23rem"><span class="jml-bhn" data-val="1"> 1</span>
                            </div>
                        </div>
                        <div class="col-12 pb-1">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Rumah Sakit" id="rumahsakit_pasir" value="pasir" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                                <label class="form-check-label" for="material3">
                                <img src="assets/image/powder.svg" width="23rem"><span class="jml-bhn" data-val="2"> 2</span>
                            </div>
                        </div>';
        }
        else if ($i == 5) {
            $nama = 'Mall';
            $img = '<img src="assets/image/Mall.png" width="50%">';
            $worker= '<div class="row justify-content-center mb-2"><div class="mx-2">
            <img src="assets/image/miner.svg" width="23rem"><span class="jml-bhn" data-val="2"> 2</span>
        </div></div>';
            $bahan = '<div class="col pb-1">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Mall" id="mall_baja" value="baja" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                                <label class="form-check-label" for="material1">
                                <img src="assets/image/i-beam.svg" width="23rem"><span class="jml-bhn" data-val="2"> 2</span>
                            </div>
                        </div>
                        <div class="col pb-1">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Mall" id="mall_semen" value="semen" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                                <label class="form-check-label" for="material2">
                                <img src="assets/image/concrete-bag.svg" width="23rem"><span class="jml-bhn" data-val="1"> 1</span>
                            </div>
                        </div>
                        <div class="col-12 pb-1">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Mall" id="mall_pasir" value="pasir" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                                <label class="form-check-label" for="material4">
                                <img src="assets/image/powder.svg" width="23rem"><span class="jml-bhn" data-val="2"> 2</span>
                            </div>
                        </div>';
        }
        else if ($i == 6) {
            $nama = 'Taman';
            $img = '<img src="assets/image/Taman.png" width="30%">';
            $worker= '<div class="row justify-content-center mb-2"><div class="mx-2">
            <img src="assets/image/miner.svg" width="23rem"><span class="jml-bhn" data-val="1"> 1</span>
        </div></div>';
            $bahan = '<div class="col pb-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Taman" id="taman_kayu" value="kayu"'.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                            <label class="form-check-label" for="material1" >
                            <img src="assets/image/wood-beam.svg" width="23rem"><span class="jml-bhn" data-val="2"> 2</span>
                        </div>
                    </div>
                    <div class="col pb-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Taman" id="taman_pasir" value="pasir" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                            <label class="form-check-label" for="material3">
                            <img src="assets/image/powder.svg" width="23rem"><span class="jml-bhn" data-val="2"> 2</span>
                        </div>
                    </div>';
        }
        else if ($i == 7) {
            $nama = 'Perumahan';
            $img = '<img src="assets/image/village.svg" width="30%">';
            $worker= '<div class="row justify-content-center mb-2"><div class="mx-2">
            <img src="assets/image/miner.svg" width="23rem"><span class="jml-bhn" data-val="1"> 1</span>
        </div></div>';
            $bahan = '<div class="col pb-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Perumahan" id="perumahan_kayu" value="kayu"'.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                            <label class="form-check-label" for="material1" >
                            <img src="assets/image/wood-beam.svg" width="23rem"><span class="jml-bhn" data-val="2"> 2</span>
                        </div>
                    </div>
                    <div class="col pb-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Perumahan" id="perumahan_semen" value="semen" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                            <label class="form-check-label" for="material2">
                            <img src="assets/image/concrete-bag.svg" width="23rem"><span class="jml-bhn" data-val="1"> 1</span>
                        </div>
                    </div>
                    <div class="col-12 pb-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Perumahan" id="perumahan_pasir" value="pasir" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                            <label class="form-check-label" for="material3">
                            <img src="assets/image/powder.svg" width="23rem"><span class="jml-bhn" data-val="1"> 1</span>
                        </div>
                    </div>';
        }
        else if ($i == 8) {
            $nama = 'Apartemen';
            $img = '<img src="assets/image/Apartemen.png" width="21%">';
            $worker= '<div class="row justify-content-center mb-2"><div class="mx-2">
            <img src="assets/image/miner.svg" width="23rem"><span class="jml-bhn" data-val="2"> 2</span>
        </div></div>';
            $bahan = '<div class="col pb-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Apartemen" id="apartemen_kayu" value="kayu"'.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                            <label class="form-check-label" for="material5" >
                            <img src="assets/image/wood-beam.svg" width="23rem"><span class="jml-bhn" data-val="1"> 1</span>
                        </div>
                    </div>
                    <div class="col pb-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Apartemen" id="apartemen_baja" value="baja" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                            <label class="form-check-label" for="material1">
                            <img src="assets/image/i-beam.svg" width="23rem"><span class="jml-bhn" data-val="1"> 1</span>
                        </div>
                    </div>
                    <div class="col pb-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Apartemen" id="apartemen_semen" value="semen" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                            <label class="form-check-label" for="material2">
                            <img src="assets/image/concrete-bag.svg" width="23rem"><span class="jml-bhn" data-val="2"> 2</span>
                        </div>
                    </div>
                    <div class="col pb-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Apartemen" id="apartemen_pasir" value="pasir" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                            <label class="form-check-label" for="material3">
                            <img src="assets/image/powder.svg" width="23rem"><span class="jml-bhn" data-val="2"> 2</span>
                        </div>
                    </div>';
        }
        else if ($i == 9) {
            $nama = 'Hotel';
            $img = '<img src="assets/image/family-house.svg" width="30%">';
            $worker= '<div class="row justify-content-center mb-2"><div class="mx-2">
            <img src="assets/image/miner.svg" width="23rem"><span class="jml-bhn" data-val="2"> 2</span>
        </div></div>';
            $bahan = '<div class="col pb-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Hotel" id="hotel_kayu" value="kayu" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                            <label class="form-check-label" for="material1">
                            <img src="assets/image/wood-beam.svg" width="23rem">
                            <span class="jml-bhn" data-val="1"> 1</span>
                        </div>
                    </div>
                    <div class="col pb-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Hotel" id="hotel_baja" value="baja" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                            <label class="form-check-label" for="material2">
                            <img src="assets/image/i-beam.svg" width="23rem"><span class="jml-bhn" data-val="2"> 2</span>
                        </div>
                    </div>
                    <div class="col pb-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Hotel" id="hotel_semen" value="semen" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                            <label class="form-check-label" for="material3">
                            <img src="assets/image/concrete-bag.svg" width="23rem"><span class="jml-bhn" data-val="1"> 1</span>
                        </div>
                    </div>
                    <div class="col pb-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Hotel" id="hotel_pasir" value="pasir" '.($stmt->rowCount() > 0?"disabled style='opacity:0.2;pointer-events: none;'":"").'>
                            <label class="form-check-label" for="material4">
                            <img src="assets/image/powder.svg" width="23rem"><span class="jml-bhn" data-val="1"> 1</span>
                        </div>
                    </div>';
        }

        if ($stmt->rowCount() == 0) { 
            $output.= '<div class="col py-3">
                        <div class="card-item build-item">
                            <div class="container item">
                                <div class="row pt-3 justify-content-center">
                                    <h3 class="building">'.$nama.'</h3>
                                </div>
                                <div class="row justify-content-center">
                                    <!-- logo item -->'.$img.'
                                </div>
                                <div class="container-fluid mx-0 justify-content-center mb-1 mt-1 jml-stok">
                                    <div class="col-12 text-center my-2">Jumlah bahan:</div>'.$worker.'
                                    <!-- TAMPILAN UNTUK EFEK BOROBUDUR -->
                                    <div class="container text-center mb-1 efek pb-2"><div class="row"><span class="badge badge-efek mr-1">Efek Borobudur</span><small class="p-2">Pilih 1 bahan untuk dikurangi 1</small></div>
                                    <div class="row row-cols-2">'.$bahan.'</div></div>
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
                        <div class="card-item build-item unavailable">
                            <div class="container item">
                                <div class="row pt-3 justify-content-center">
                                    <h3 class="building">'.$nama.'</h3>
                                </div>
                                <div class="row justify-content-center">
                                    <!-- logo item -->'.$img.'
                                </div>
                                <!-- div tambahan untuk build card yg unavailable -->
                                <div class="tag-unavailable" style="font-size:16pt; text-align: center;">SUDAH DIBANGUN</div>
                                <div class="container justify-content-center mb-1 mt-2 jml-stok">
                                    <div class="col-12 text-center pb-3">Jumlah bahan:</div>'.$worker.
                                    '<!-- TAMPILAN UNTUK EFEK BOROBUDUR -->
                                    <div class="container text-center mb-1 efek pb-2" style="opacity:0.5;"><div class="row"><span class="badge badge-efek mr-1">Efek Borobudur</span><small class="p-2" style="opacity:0.2;">Pilih 1 bahan untuk dikurangi 1</small></div>
                                    <div class="row row-cols-2">'.$bahan.'</div></div>
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