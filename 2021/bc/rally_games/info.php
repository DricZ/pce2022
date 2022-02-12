<?php
require_once 'header.php';
$_SESSION['page'] = 'info';
?>

<head>
    <title>INFO</title>
</head>
<div class="container my-5 pb-5">
    <div class="row col-12 justify-content-center mt-5">
        <div id="decor-hidden-post">
            <!-- svg logo -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 100px;">
                <g class="" transform="translate(0,0)" style="">
                    <path d="M443.535 120.186l-112 64 8.93 15.628 112-64-8.93-15.628zM297 153v206h17.973V153H297zm-18 9.367L73 235.072v41.856l206 72.705V162.367zM39 240v32h18v-32H39zm297 7v18h128v-18H336zM99.332 300.89l-14.8 40.215L181.02 379.7l16.11-40.364-16.716-6.672-9.434 23.635-63.51-25.405 8.755-23.786-16.893-6.22zm241.133 11.296l-8.93 15.628 112 64 8.93-15.628-112-64z" fill="rgb(32,31,31)" transform="rotate(-30) translate(-190 100)" fill-opacity="1"></path>
                </g>
            </svg>
        </div>
        <h1 id="title">INFO</h1>
    </div>
    <div class="row col-12 justify-content-center mb-4">
        <h3 id="sub-heading">Check for any latest news!</h3>
    </div>

    <div class="card-columns">

        <?php
        $timestamp = date("H:i");

        if ($timestamp < '13:35') {
        ?>
            <!-- Tampilan jika tidak ada info (kosong) -->
            <div id="no-content-msg-info">
                <img src="assets/image/nothing-to-say.svg" width="55%">
                <h3>There is no info yet.<br> Stay tuned!</h3>
            </div>

            <!-- Mulai Tampilan jika ada info -->
        <?php
        }
        ?>

        <?php
        if ($timestamp >= '15:55') {
        ?>
            <!-- Mulai Tampilan untuk satu info -->
            <div class="card news-card latest news-8" id="info-card">
                <div class="card-body">
                    <div class="card-title" id="latest-eight">
                        <h4 class="d-inline">Latest News!</h4>
                        <span style="float:right;"><span class="badge badge-danger">New</span></span>
                    </div>
                    <img src="assets/image/vaksin.jpg" width="100%" class="mb-3">
                    <p class="card-text">Virus COVID-19 akhirnya menemukan lawan! Ditemukannya vaksin dan seluruh kota di Indonesia telah divaksinasi. Membuat seluruh bahan bangunan di seluruh kota di Indonesia mengalami penurunan harga sebesar 30%. Harga para pekerjapun mengalami penurunan sebesar 25% dari harga semula.
                    </p>
                    <p class="card-text"><small class="text-muted"><?= intval((strtotime($timestamp) - strtotime('15:55')) / 60) ?> mins ago</small></p>
                </div>
            </div>
            <!-- Akhir dari Tampilan untuk satu info -->
        <?php
        }
        ?>

        <?php
        if ($timestamp >= '15:35') {
        ?>
            <!-- Mulai Tampilan untuk satu info -->
            <div class="card news-card news-7" id="info-card">
                <div class="card-body">
                    <div class="card-title" id="latest-seventh" hidden>
                        <h4 class="d-inline">Latest News!</h4>
                        <span style="float:right;"><span class="badge badge-danger">New</span></span>
                    </div>
                    <div class="card-title" id="num-7">
                        <p class="text-right">SUB-SESI 8
                        <p>
                    </div>
                    <img src="assets/image/factory.jpg" width="100%" class="mb-3">
                    <p class="card-text">Dikarenakan adanya pembangunan yang pesat di Yogyakarta, dibangunlah pabrik semen diareal hutan di Yogyakarta. Membuat harga semen menurun sebesar 20%, harga pekerja menurun sebesar 15%, dan harga kayu menurun drastis sebesar 30%. Sementara itu, angin topan terjadi di selat Bali. Menjadikan pelabuhan Gilimanuk rusak parah. Membuat mobilisasi bahan bangunan antara pulau Jawa dan Bali terhenti sementara. Harga semen, pasir, dan baja mengalami peningkatan 15% dari harga semula di Bali. Namun para pekerja dikerahkan oleh pemerintah untuk pembenahan di Bali. Menjadikan harga para pekerja lebih murah atau menurun sebesar 20%. Kalimantan, terutama di kota Banjarmasin. Mengerahkan sebagian besar para pekerjanya serta membawa sejumlah bahan bangunan yang diperlukan, yakni semen dan pasir guna membantu proses pembenahan di Bali. Maka, harga pekerja meningkat menjadi 15% dari harga semula. Sebagai gantinya, pemerintah menurunkan harga dari sejumlah bahan bangunan. Harga kayu menurun 10% dari harga semula. Harga baja menurun 20% dari harga semula.
                    </p>
                    <p class="card-text"><small class="text-muted"><?= intval((strtotime($timestamp) - strtotime('15:35')) / 60) ?> mins ago</small></p>
                </div>
            </div>
            <!-- Akhir dari Tampilan untuk satu info -->
        <?php
        }
        ?>

        <?php
        if ($timestamp >= '15:15') {
        ?>
            <!-- Mulai Tampilan untuk satu info -->
            <div class="card news-card news-6" id="info-card">
                <div class="card-body">
                    <div class="card-title" id="latest-sixth" hidden>
                        <h4 class="d-inline">Latest News!</h4>
                        <span style="float:right;"><span class="badge badge-danger">New</span></span>
                    </div>
                    <div class="card-title" id="num-6">
                        <p class="text-right">SUB-SESI 7
                        <p>
                    </div>
                    <img src="assets/image/longsor.jpg" width="100%" class="mb-3">
                    <p class="card-text">Di pertambangan bijih besi Gunung Tegak kota Lampung, terjadi kecelakaan kerja yang diakibatkan oleh tanah longsor. Hal ini menyebabkan penambangan bijih besi sebagai bahan baku utama pembuatan baja menjadi terhambat. Karena itu, harga baja meningkat sebesar 25%. Harga pekerja meningkat sebesar 10%. Melihat hal tersebut, Jakarta membuat harga para pekerjanya menjadi menurun sebesar 20%. Serta harga kayu, baja, dan pasir menurun sebesar 10% dari harga semula. Sementara itu, terjadi badai besar di Jayapura. Menyebabkan seluruh harga bahan bangunan mengalami peningkatan sebesar 5%, dikarenakan proses mobilisasi terganggu oleh badai.
                    </p>
                    <p class="card-text"><small class="text-muted"><?= intval((strtotime($timestamp) - strtotime('15:15')) / 60) ?> mins ago</small></p>
                </div>
            </div>
            <!-- Akhir dari Tampilan untuk satu info -->
        <?php
        }
        ?>

        <?php
        if ($timestamp >= '14:55') {
        ?>
            <!-- Mulai Tampilan untuk satu info -->
            <div class="card news-card news-5" id="info-card">
                <div class="card-body">
                    <div class="card-title" id="latest-fifth" hidden>
                        <h4 class="d-inline">Latest News!</h4>
                        <span style="float:right;"><span class="badge badge-danger">New</span></span>
                    </div>
                    <div class="card-title" id="num-5">
                        <p class="text-right">SUB-SESI 6
                        <p>
                    </div>
                    <img src="assets/image/demo.jpg" width="100%" class="mb-3">
                    <p class="card-text">Di kota Jakarta terjadi demo besar-besaran yang menyebabkan adanya kerusuhan didalam kota. Karena Jakarta adalah kota terbesar di pulau Jawa, maka seluruh bahan bangunan di kota yang berada di pulau Jawa yaitu Jakarta dan Yogyakarta menjadi terdampak. Bahan bangunan di pulau Jawa menjadi meningkat 20% lebih mahal dari harga semula. Namun kota lainnya melihat ini merupakan sebuah kesempatan berbisnis, sehingga seluruh bahan bangunan menjadi 10% dan pekerja 20% menjadi lebih murah.
                    </p>
                    <p class="card-text"><small class="text-muted"><?= intval((strtotime($timestamp) - strtotime('14:55')) / 60) ?> mins ago</small></p>
                </div>
            </div>
            <!-- Akhir dari Tampilan untuk satu info -->
        <?php
        }
        ?>

        <?php
        if ($timestamp >= '14:35') {
        ?>
            <!-- Mulai Tampilan untuk satu info -->
            <div class="card news-card news-4" id="info-card">
                <div class="card-body">
                    <div class="card-title" id="latest-fourth" hidden>
                        <h4 class="d-inline">Latest News!</h4>
                        <span style="float:right;"><span class="badge badge-danger">New</span></span>
                    </div>
                    <div class="card-title" id="num-4">
                        <p class="text-right">SUB-SESI 5
                        <p>
                    </div>
                    <img src="assets/image/eruption.jpg" width="100%" class="mb-3">
                    <p class="card-text">Terjadi erupsi Gunung Anak Krakatau di Lampung dimana erupsi ini membawa banyak material bahan bangunan. Hal ini membuat harga semen dan pasir di Lampung menurun drastis sebesar 40%. Namun kayu menjadi susah untuk didapatkan karena tertimbun oleh material erupsi gunung ini. Harga kayu di Lampung meningkat sebesar 35%. Karena hal tersebut, Banjarmasin menurunkan harga kayu sebesar 20% serta harga pekerja sebesar 30% dari harga semula. Setelah hal itu dilakukan, Banjarmasin mengalami peningkatan pembangunan. Namun pasokan bijih besi menurun membuat harga baja meningkat menjadi 20% dari harga semua.
                    </p>
                    <p class="card-text"><small class="text-muted"><?= intval((strtotime($timestamp) - strtotime('14:35')) / 60) ?> mins ago</small></p>
                </div>
            </div>
            <!-- Akhir dari Tampilan untuk satu info -->
        <?php
        }
        ?>

        <?php
        if ($timestamp >= '14:15') {
        ?>
            <!-- Mulai Tampilan untuk satu info -->
            <div class="card news-card news-3" id="info-card">
                <div class="card-body">
                    <div class="card-title" id="latest-third" hidden>
                        <h4 class="d-inline">Latest News!</h4>
                        <span style="float:right;"><span class="badge badge-danger">New</span></span>
                    </div>
                    <div class="card-title" id="num-3">
                        <p class="text-right">SUB-SESI 4
                        <p>
                    </div>
                    <img src="assets/image/lockdown.jpg" width="100%" class="mb-3">
                    <p class="card-text">Jakarta menjadi salah satu kota yang sangat terdampak akibat pandemi ini. Jakarta mengambil keputusan untuk lockdown, menjadikan warga Jakarta tidak bisa keluar dan warga luar Jakarta tidak bisa masuk ke Jakarta. Bali menghiraukan arahan pemerintah dengan melanggar protokol kesehatan yang diterapkan. Menjadikan para pekerja di Bali banyak terinfeksi COVID-19 sehingga harga pekerja naik 30%. Harga bahan bangunan juga terdampak dengan harga sebagai berikut; harga pasir mengalami peningkatan sebesar 15%, harga semen mengalami peningkatan sebesar 10%, sementara harga lainnya tetap. Lain halnya dengan Bali, Jayapura sangat menaati protokol kesehatan yang menyebabkan penyebaran virus COVID-19 dapat diminimalisir, sehingga pembangunan dapat tetap berjalan. Harga seluruh bahan bangunan mengalami penurunan sebesar 5% lebih murah. Ditengah pandemi yang masih berlangsung, cuaca buruk sering kali terjadi. Hujan deras yang mengguyur kota Lampung menyebabkan jalan-jalan di kota Lampung yang biasanya dilalui oleh mobil pengangkut bahan bangunan menjadi licin, sehingga menyusahkan mobilisasi bahan bangunan. Harga setiap bahan bangunan di kota Lampung meningkat 10% dikarenakan adanya biaya transportasi tambahan.
                    </p>
                    <p class="card-text"><small class="text-muted"><?= intval((strtotime($timestamp) - strtotime('14:15')) / 60) ?> mins ago</small></p>
                </div>
            </div>
            <!-- Akhir dari Tampilan untuk satu info -->
        <?php
        }
        ?>

        <?php
        if ($timestamp >= '13:55') {
        ?>
            <!-- Mulai Tampilan untuk satu info -->
            <div class="card news-card news-2" id="info-card">
                <div class="card-body">
                    <div class="card-title" id="latest-second" hidden>
                        <h4 class="d-inline">Latest News!</h4>
                        <span style="float:right;"><span class="badge badge-danger">New</span></span>
                    </div>
                    <div class="card-title" id="num-2">
                        <p class="text-right">SUB-SESI 3
                        <p>
                    </div>
                    <img src="assets/image/corona-pandemic.jpeg" width="100%" class="mb-3">
                    <p class="card-text">Terjadinya pandemi virus corona! Seluruh harga bahan bangunan serta harga pekerja menjadi meningkat 20% lebih mahal.
                    </p>
                    <p class="card-text"><small class="text-muted"><?= intval((strtotime($timestamp) - strtotime('13:55')) / 60) ?> mins ago</small></p>
                </div>
            </div>
            <!-- Akhir dari Tampilan untuk satu info -->
        <?php
        }
        ?>

        <?php
        if ($timestamp >= '13:35') {
        ?>
            <!-- Mulai Tampilan untuk satu info -->
            <div class="card news-card news-1" id="info-card">
                <div class="card-body">
                    <div class="card-title" id="latest-first" hidden>
                        <h4 class="d-inline">Latest News!</h4>
                        <span style="float:right;"><span class="badge badge-danger">New</span></span>
                    </div>
                    <div class="card-title" id="num-1">
                        <p class="text-right">SUB-SESI 2
                        <p>
                    </div>
                    <img src="assets/image/forest-on-fire.jpg" width="100%" class="mb-3">
                    <p class="card-text">Terjadi kebakaran hutan di Kalimantan! Membuat harga kayu di Banjarmasin meningkat 40% dan harga pekerja meningkat 15% lebih mahal dari harga semula. Disisi lain, Bali mengalami peningkatan jumlah turis yang datang dari mancanegara. Membuat pembangunan di Bali berkembang pesat. Harga kayu, baja, semen, dan pasir mengalami penurunan sebanyak 10% dari harga semula. Namun harga pekerja meningkat menjadi 10% lebih mahal. Sementara itu, di Yogyakarta terjadi gempa bumi yang menjadikan seluruh harga bahan bangunan meningkat 15% lebih mahal.
                    </p>
                    <p class="card-text"><small class="text-muted"><?= intval((strtotime($timestamp) - strtotime('13:35')) / 60) ?> mins ago</small></p>
                </div>
            </div>
            <!-- Akhir dari Tampilan untuk satu info -->
        <?php
        }
        ?>

        <!-- Mulai Tampilan untuk satu info -->
        <div class="card news-card" id="info-card">
            <div class="card-body">
                <div class="card-title" id="num-1">
                    <p class="text-right">
                        <b>HIDDEN POST</b>
                    <p>
                </div>
                <img src="assets/image/higher_or_lower.png" width="100%" class="mb-3">
                <p class="card-text">
                    1. Hidden post akan muncul sebanyak 3 kali selama jalannya sesi 2. Dapat dimainkan oleh
                    seluruh tim, namun ada batasan waktu
                    untuk mengakses (5 menit sejak hidden post di-publish) dan waktu bermain (3 menit).
                </p>
                <p class="card-text">
                    2. Masing-masing tim akan memasang ‘bet’ terlebih dahulu (dengan kelipatan 1000)
                    sebelum memulai permainan.
                </p>
                <p class="card-text">
                    3. 1 sesi hidden post terdiri dari 5 round (5 pertanyaan). Pada setiap round akan diberikan
                    pertanyaan berupa Higher or Lower dari tokoh/tempat/brand merk/lainnya yang terkenal.
                </p>
                <p class="card-text">
                    4. Perhitungan poin (dikalikan dengan jumlah ‘bet’):
                    <br>
                    ● 5 jawaban benar x3<br>
                    ● 4 jawaban benar x2<br>
                    ● 3 jawaban benar x1.25<br>
                    ● 2 jawaban benar x0.5<br>
                    ● 1 dan 0 jawaban benar x0<br>
                </p>
            </div>
        </div>
        <!-- Akhir dari Tampilan untuk satu info -->

        <!-- Mulai Tampilan untuk satu info -->
        <div class="card news-card" id="info-card">
            <div class="card-body">
                <div class="card-title" id="num-1">
                    <p class="text-right">
                        <b>RALLY GAMES</b>
                    <p>
                </div>
                <img src="assets/image/bc-info.png" width="100%" class="mb-3">
                <p class="card-text">
                    Berikut kami lampirkan Penjelasan Rally Games secara keseluruhan. Tim dapat membacanya <a href='assets/Rally Games Bridge Competition - Petra Civil Expo 2021.pdf'>di sini</a>. Jika ada hal yang tidak dimengerti mengenai Mini Games dapat ditanyakan di pos breakout room masing-masing. Jika ada hal yang tidak dimengerti mengenai game besar dapat join ke ZOOM utama kembali dengan link: <a href='http://petra.id/RallyBCWorkshopSMA' target="_blank">petra.id/RallyBCWorkshopSMA</a>
                </p>
                <p class="card-text">
                    Meeting ID: <b>832 3416 9742</b><br>
                    Passcode: <b>659120</b>
                </p>
            </div>
        </div>
        <!-- Akhir dari Tampilan untuk satu info -->

        <!-- Akhir dari Tampilan jika ada info -->

    </div>

</div>

<!-- Info Detail Modal -->
<!-- <div class="modal fade" id="info-detail-modal" tabindex="-1" role="dialog" aria-labelledby="infoDetailModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="info-modal-title">News 01</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="assets/image/forest-on-fire.jpg" width="100%" class="mb-3">
                <p class="card-text">Terjadi kebakaran hutan di Kalimantan! Membuat harga kayu di Banjarmasin meningkat 100% dan harga pekerja meningkat 30% lebih mahal dari harga semula. Disisi lain, Bali mengalami peningkatan jumlah turis yang datang dari mancanegara. Membuat pembangunan di Bali berkembang pesat. Harga kayu, baja, semen, dan pasir mengalami penurunan sebanyak 10% dari harga semula. Namun harga pekerja meningkat menjadi 20% lebih mahal. Sementara itu, di Yogyakarta terjadi gempa bumi yang menjadikan seluruh harga bahan bangunan meningkat 30% lebih mahal. Adanya bencana tersebut menjadikan para pekerja di Yogyakarta sementara ini tidak bisa diakses. Terpengaruh dari banyaknya bencana alam yang terjadi, Jakarta sebagai Ibu kota menjadi terdampak dengan penyesuaian harga sebagai berikut; harga kayu mengalami penurunan 10%, harga semen mengalami peningkatan 15%, harga baja mengalami penurunan 20%, harga pasir mengalami peningkatan 10%, dan harga pekerja mengalami peningkatan 20%.</p>
                <p class="card-text"><small class="text-muted">Just now</small></p>
            </div>
        </div>
    </div>
</div> -->
<!-- End of Info Detail Modal -->

<script>
    // $(".news-card").click(function() {
    //     $("#info-detail-modal").modal();
    // });

    <?php
    $firstNews = false;
    $secondNews = false;
    $thirdNews = false;
    $fourthNews = false;
    $fifthNews = false;
    $sixthNews = false;
    $seventhNews = false;
    $eightNews = false;

    if ($timestamp >= '13:35') {
        $firstNews = true;
    }
    if ($timestamp >= '13:55') {
        if ($firstNews) {
            $firstNews = false;
            $secondNews = true;
        }
    }
    if ($timestamp >= '14:15') {
        if ($secondNews) {
            $secondNews = false;
            $thirdNews = true;
        }
    }
    if ($timestamp >= '14:35') {
        if ($thirdNews) {
            $thirdNews = false;
            $fourthNews = true;
        }
    }
    if ($timestamp >= '14:55') {
        if ($fourthNews) {
            $fourthNews = false;
            $fifthNews = true;
        }
    }
    if ($timestamp >= '15:15') {
        if ($fifthNews) {
            $fifthNews = false;
            $sixthNews = true;
        }
    }
    if ($timestamp >= '15:35') {
        if ($sixthNews) {
            $sixthNews = false;
            $seventhNews = true;
        }
    }
    if ($timestamp >= '15:55') {
        if ($seventhNews) {
            $seventhNews = false;
            $eightNews = true;
        }
    }
    ?>

    <?php
    if ($firstNews) {
    ?>
        $("#latest-first").removeAttr('hidden');
        $(".news-1").addClass('latest');
        $("#num-1").prop('hidden', true);
    <?php
    }
    ?>

    <?php
    if ($secondNews) {
    ?>
        $("#latest-first").prop('hidden', true);
        $(".news-1").removeClass('latest');
        $("#num-1").removeAttr('hidden');

        $("#latest-second").removeAttr('hidden');
        $(".news-2").addClass('latest');
        $("#num-2").prop('hidden', true);
    <?php
    }
    ?>

    <?php
    if ($thirdNews) {
    ?>
        $("#latest-second").prop('hidden', true);
        $(".news-2").removeClass('latest');
        $("#num-2").removeAttr('hidden');

        $("#latest-third").removeAttr('hidden');
        $(".news-3").addClass('latest');
        $("#num-3").prop('hidden', true);
    <?php
    }
    ?>

    <?php
    if ($fourthNews) {
    ?>
        $("#latest-third").prop('hidden', true);
        $(".news-3").removeClass('latest');
        $("#num-3").removeAttr('hidden');

        $("#latest-fourth").removeAttr('hidden');
        $(".news-4").addClass('latest');
        $("#num-4").prop('hidden', true);
    <?php
    }
    ?>

    <?php
    if ($fifthNews) {
    ?>
        $("#latest-fourth").prop('hidden', true);
        $(".news-4").removeClass('latest');
        $("#num-4").removeAttr('hidden');

        $("#latest-fifth").removeAttr('hidden');
        $(".news-5").addClass('latest');
        $("#num-5").prop('hidden', true);
    <?php
    }
    ?>

    <?php
    if ($sixthNews) {
    ?>
        $("#latest-fifth").prop('hidden', true);
        $(".news-5").removeClass('latest');
        $("#num-5").removeAttr('hidden');

        $("#latest-sixth").removeAttr('hidden');
        $(".news-6").addClass('latest');
        $("#num-6").prop('hidden', true);
    <?php
    }
    ?>

    <?php
    if ($seventhNews) {
    ?>
        $("#latest-sixth").prop('hidden', true);
        $(".news-6").removeClass('latest');
        $("#num-6").removeAttr('hidden');

        $("#latest-seventh").removeAttr('hidden');
        $(".news-7").addClass('latest');
        $("#num-7").prop('hidden', true);
    <?php
    }
    ?>

    <?php
    if ($eightNews) {
    ?>
        $("#latest-seventh").prop('hidden', true);
        $(".news-7").removeClass('latest');
        $("#num-7").removeAttr('hidden');
    <?php
    }
    ?>
</script>
</body>

</html>