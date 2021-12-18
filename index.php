<?php
require_once 'phps/connect.php';

$_SESSION['page'] = 'home';

require_once 'header.php';

// $_SESSION['id'] = 89;
if (isset($_SESSION['id'])) {
   $sql = "SELECT * FROM pendaftar WHERE id = ?";
   $stmt = $pdo->prepare($sql);
   $stmt->execute([$_SESSION['id']]);
   $pendaftar = $stmt->fetch();
}
?>


<style>
   .jconfirm .jconfirm-box.hilight.jconfirm-hilight-random {
      /*the animation name is bob*/
      transform: translate3d(0, 0, 0);
      animation: random 2s;
   }

   video-container {
      position: relative;
      background-color: black;
      height: 75vh;
      min-height: 25rem;
      width: 100%;
      overflow: hidden;
   }

   video-container video {
      object-fit: cover;
      position: relative;
      top: 50%;
      left: 50%;
      min-width: 100%;
      min-height: 100%;
      width: auto;
      height: auto;
      z-index: 0;
      -ms-transform: translateX(-50%) translateY(-50%);
      -moz-transform: translateX(-50%) translateY(-50%);
      -webkit-transform: translateX(-50%) translateY(-50%);
      transform: translateX(-50%) translateY(-50%);
   }

   video-container .container {
      position: relative;
      z-index: 2;
   }

   video-container .overlay {
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      background-color: black;
      opacity: 0.5;
      z-index: 1;
   }

   /* scroll hidden */
   html {
      overflow-y: scroll;
      overflow-x: hidden;
      /* -ms-overflow-style: none; */
      /* IE and Edge */
      /* scrollbar-width: none; */
      /* Firefox */
   }

   /* width */
   html::-webkit-scrollbar {
      width: 5px;
   }

   /* Track */
   ::-webkit-scrollbar-track {
      background: var(--whitebrown);
   }

   /* Handle */
   ::-webkit-scrollbar-thumb {
      background: var(--graybrown);
   }

   /* Handle on hover */
   ::-webkit-scrollbar-thumb:hover {
      background: #555;
   }

   /* html::-webkit-scrollbar {
      display: none;
   } */

   @media (pointer: coarse) and (hover: none) {
      video-container {
         background: url('assets/alt.jpg') black no-repeat center center scroll;
      }

      video-container video {
         display: none;
      }
   }

   header {
      background-size: cover;
   }

   #scholarship {
      font-size: 1.3em;
   }

   #reward {
      font-size: 4em;
      padding: 50px;
   }

   #reward-prize h1 {
      transition: 0.5s;
   }

   #reward-prize:hover h1 {
      /* transition: 0.5s;
      color: #49d431 !important;
      -webkit-text-stroke: 2px black; */
      /* width and color */
      /* transform: scale(1.1); */
      /* border: 2px solid black !important; */

      /* background-color: #FFEEB5; */
      /* For WebKit (Safari, Chrome, etc) */
      /* background: #FFEEB5 -webkit-gradient(linear, left top, left bottom, from(#AE8913), to(#FFEEB5)) no-repeat; */
      /* Mozilla,Firefox/Gecko */
      /* background: #FFEEB5 -moz-linear-gradient(top, #AE8913, #FFEEB5) no-repeat; */
      /* IE 5.5 - 7 */
      /* filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#AE8913, endColorstr=#FFEEB5) no-repeat; */
      /* IE 8 */
      /* -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#AE8913, endColorstr=#AE8913)"no-repeat; */

      /* -webkit-filter: drop-shadow(5px 5px 5px #222); */
      /* filter: drop-shadow(5px 5px 5px #222); */

   }

   #video-bumper,
   #video-bumper-pce {
      width: 60%;
   }

   @media(max-width: 1024px) {
      #reward {
         font-size: 3em;
         padding: 10px;
      }

      #reward-prize:hover h1 {
         /* text-shadow: 2px 2px black; */
      }
   }

   @media(max-width: 786px) {
      /* .back-to-top {
         display: block !important;
         outline: none !important;
         box-shadow: none !important;
      } */

      #reward-prize:hover h1 {
         /* text-shadow: 1px 1px black; */
      }

      #header-video {
         display: none;
      }
      .video-container {
         height: auto !important;
      }
      #video-bumper {
         width: 85%;
      }

      #video-bumper-pce {
         width: 92%;
      }

      .pce {
         margin-top: 0.5rem !important;
         padding-bottom: 3.5rem !important;
      }

      header {
         height: 10vh;
      }

      #PCE-vid {
         display: none;
      }

      #explain {
         min-height: 90vh;
      }

      h1 {
         font-size: 1.4em;
      }

      body {
         overflow-x: hidden;
      }

      #scholarship {
         font-size: 1em;
      }

      #reward {
         font-size: 1.4em;
         margin-left: 5vw;
         margin-right: 5vw;
         padding: 10px;
      }

      .jconfirm-box {
         max-width: 90vw;
      }
   }

   @media(min-width: 786px) {
      #logoPCE {
         display: none;
      }

      #explain {
         max-height: 80vh !important;
      }

      #a {
         margin-top: 0 !important;
      }
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

   #logo-bc,
   #logo-erdc,
   #logo-lktb {
      transition: 1s;
      -webkit-filter: drop-shadow(7px 7px 7px #222);
      filter: drop-shadow(7px 7px 7px #222);
   }

   /* #logo-bc:hover {
      transform: scale(1.1);
      transition: 1s;
   }

   #logo-erdc:hover {
      transform: scale(1.1);
      transition: 1s;
   }

   #logo-lktb:hover {
      transform: scale(1.1);
      transition: 1s;
   } */

   .btn {
      letter-spacing: 0.1em;
      cursor: pointer;
      font-size: 12pt;
      font-weight: 400;
      max-width: 300px;
      position: relative;
      text-decoration: none;
      text-transform: uppercase;
      width: 100%;
      border-radius: 20px;
      -webkit-filter: drop-shadow(5px 5px 5px #222);
      filter: drop-shadow(5px 5px 5px #222);
      -webkit-appearance: none !important;
   }

   .btn:hover {
      text-decoration: none;
   }

   /*btn_background*/
   .effect01 {
      color: #FFF;
      border: 4px solid black;
      box-shadow: 0px 0px 0px 1px brown inset;
      background-color: brown;
      overflow: hidden;
      position: relative;
      transition: all 0.3s ease-in-out;
   }

   .effect01:hover {
      border: 4px solid #666;
      background-color: #FFF;
      box-shadow: 0px 0px 0px 4px #EEE inset;
   }

   /*btn_text*/
   .effect01 span {
      transition: all 0.2s ease-out;
      z-index: 2;
   }

   .effect01:hover span {
      letter-spacing: 0.13em;
      color: #333;
   }

   /*highlight*/
   .effect01:after {
      background: #FFF;
      border: 0px solid brown;
      content: "";
      height: 155px;
      left: -75px;
      opacity: .8;
      position: absolute;
      top: -50px;
      -webkit-transform: rotate(35deg);
      transform: rotate(35deg);
      width: 50px;
      transition: all 1s cubic-bezier(0.075, 0.82, 0.165, 1);
      /*easeOutCirc*/
      z-index: 1;
   }

   .effect01:hover:after {
      background: #FFF;
      border: 20px solid brown;
      opacity: 0;
      left: 120%;
      -webkit-transform: rotate(40deg);
      transform: rotate(40deg);
   }

   .back-to-top {
      position: fixed;
      bottom: 25px;
      right: 25px;
      display: none;
      z-index: 1000;
      width: 50px !important;
      -webkit-filter: drop-shadow(0px 0px 0px) !important;
      filter: drop-shadow(0px 0px 0px) !important;
      background: #A52A2A;
      border: 3px solid black;
      padding-right: 30px;
   }
</style>

<script>
   $(document).ready(function() {
      $(window).scroll(function() {
         if ($(this).scrollTop() > 250) {
            $('#back-to-top').fadeIn();
         } else {
            $('#back-to-top').fadeOut();
         }
      });
      // scroll body to 0px on click
      $('#back-to-top').click(function() {
         $('body,html').animate({
            scrollTop: 0
         }, 400);
         return false;
      });
   });

   function successCheckingBC() {
      $.confirm({
         title: 'SUKSES MEMILIH JADWAL CHECKING JEMBATAN',
         type: 'green',
         typeAnimated: true,
         icon: 'far fa-check-circle',
         theme: 'modern',
         draggable: false,
         backgroundDismissAnimation: 'random',
         onOpen: function() {
            setTimeout(() => {
               var str = `
                  <div style="color: black; font-weight: 500; max-height: 360px;">
                     <p style="font-size: 14pt;">Terima kasih sudah memilih jadwal untuk <b>Checking Jembatan</b>! Data Anda akan divalidasi lebih lanjut oleh panitia Petra Civil Expo 2021.</p>
                     `;

               str += `
                     <p class="mt-3" style="font-size: 14pt;"><b>Stay safe and God bless you!</b></p>
                  </div>
               `;
               this.$content.html(str);
            }, 100);
         },
         closeAnimation: 'scale',
         columnClass: "col-md-7",
         buttons: {
            cancel: {
               text: 'OK',
               btnClass: 'btn-red',
               action: function() {}
            }
         },
         content: ""
      });
   }

   function successBalsa() {
      $.confirm({
         title: 'SUKSES MENGISI DATA PENERIMA KAYU BALSA',
         type: 'green',
         typeAnimated: true,
         icon: 'far fa-check-circle',
         theme: 'modern',
         draggable: false,
         backgroundDismissAnimation: 'random',
         onOpen: function() {
            setTimeout(() => {
               var str = `
                  <div style="color: black; font-weight: 500; max-height: 360px;">
                     <p style="font-size: 14pt;">Terima kasih sudah mengisi informasi untuk <b>penerima Kayu Balsa</b> di kota/daerah Anda! Data Anda akan divalidasi lebih lanjut oleh panitia Petra Civil Expo 2021.</p>
                     `;

               str += `
                     <p class="mt-3" style="font-size: 14pt;"><b>Stay safe and God bless you!</b></p>
                  </div>
               `;
               this.$content.html(str);
            }, 100);
         },
         closeAnimation: 'scale',
         columnClass: "col-md-7",
         buttons: {
            cancel: {
               text: 'OK',
               btnClass: 'btn-red',
               action: function() {}
            }
         },
         content: ""
      });
   }

   function successRegister() {
      $.confirm({
         title: 'REGISTRATION SUCCESSFUL',
         type: 'green',
         typeAnimated: true,
         icon: 'far fa-check-circle',
         theme: 'modern',
         draggable: false,
         backgroundDismissAnimation: 'random',
         onOpen: function() {
            setTimeout(() => {
               var str = `
               <div style="color: black; font-weight: 500;">
                  <p style="font-size: 14pt;">Terima kasih sudah melakukan pendaftaran Petra Civil Expo 2021!<br>Bukti pembayaran dan data tim Anda akan dilakukan pengecekan dan validasi lebih lanjut oleh panitia Petra Civil Expo 2021.</p>
                  <hr>
                  <h5 style="font-weight: bold; color: red;">MOHON DIPERHATIKAN BAIK-BAIK!</h5>
                  <hr>
                  <p style="font-size: 14pt;"><b style="font-size: 16pt;">STEP 1</b><br>Berikut adalah <b>nomor peserta</b> untuk masing-masing anggota dari tim Anda untuk bidang lomba yang sudah dipilih. Silakan lakukan <i><b>copy</b></i> atau <i><b>capture</b></i> untuk disimpan dan akan dipakai untuk keperluan lomba yang akan datang.</p>
                  <hr>
                  <p style="font-size: 14pt;">Nama Tim<br><b>` + "<?php echo $pendaftar['nama_kelompok']; ?>" + `</b></p>
                  <p style="font-size: 14pt;">Asal Sekolah/Universitas<br><b>` + "<?php echo $pendaftar['nama_sekolah']; ?>" + `</b></p>
                  `;
               <?php
               $kodesql = "SELECT * FROM kode_peserta WHERE id_pendaftar = ?";
               $kodestmt = $pdo->prepare($kodesql);
               $kodestmt->execute([$pendaftar['id']]);
               $kode = $kodestmt->fetch();
               ?>
               <?php
               if (isset($_SESSION['id'])) {
                  if ($pendaftar['pilihan_lomba_1'] != '') {
               ?>
                     str += `<hr><p style="font-size: 14pt;"><b>NOMOR PESERTA<br>BRIDGE COMPETITION<br>PETRA CIVIL EXPO 2021</b></p><hr>`;
                     <?php
                     if ($pendaftar['nama_peserta_1'] != '') {
                     ?>
                        str += `<p style="font-size: 14pt;">` + "<?php echo $pendaftar['nama_peserta_1']; ?>";
                        <?php
                        if ($pendaftar['jenjang_pendidikan'] == 'Senior High School') {
                        ?>
                           str += `<br><b style="color: red;">` + "<?php echo $kode['bc_sma_1']; ?>" + `</b></p>`;
                        <?php
                        } else if ($pendaftar['jenjang_pendidikan'] == 'College') {
                        ?>
                           str += `<br><b style="color: red;">` + "<?php echo $kode['bc_univ_1']; ?>" + `</b></p>`;
                        <?php
                        }
                        ?>
                     <?php
                     }
                     ?>
                     <?php
                     if ($pendaftar['nama_peserta_2'] != '') {
                     ?>
                        str += `<p style="font-size: 14pt;">` + "<?php echo $pendaftar['nama_peserta_2']; ?>";
                        <?php
                        if ($pendaftar['jenjang_pendidikan'] == 'Senior High School') {
                        ?>
                           str += `<br><b style="color: red;">` + "<?php echo $kode['bc_sma_2']; ?>" + `</b></p>`;
                        <?php
                        } else if ($pendaftar['jenjang_pendidikan'] == 'College') {
                        ?>
                           str += `<br><b style="color: red;">` + "<?php echo $kode['bc_univ_2']; ?>" + `</b></p>`;
                        <?php
                        }
                        ?>
                     <?php
                     }
                     ?>
                     <?php
                     if ($pendaftar['nama_peserta_3'] != '') {
                     ?>
                        str += `<p style="font-size: 14pt;">` + "<?php echo $pendaftar['nama_peserta_3']; ?>";
                        <?php
                        if ($pendaftar['jenjang_pendidikan'] == 'Senior High School') {
                        ?>
                           str += `<br><b style="color: red;">` + "<?php echo $kode['bc_sma_3']; ?>" + `</b></p>`;
                        <?php
                        } else if ($pendaftar['jenjang_pendidikan'] == 'College') {
                        ?>
                           str += `<br><b style="color: red;">` + "<?php echo $kode['bc_univ_3']; ?>" + `</b></p>`;
                        <?php
                        }
                        ?>
                     <?php
                     }
                     ?>
                  <?php
                  }
                  ?>
                  <?php
                  if ($pendaftar['pilihan_lomba_2'] != '') {
                  ?>
                     str += `<hr><p style="font-size: 14pt;"><b>NOMOR PESERTA<br>EARTHQUAKE RESISTANT DESIGN COMPETITION<br>PETRA CIVIL EXPO 2021</b></p><hr>`;
                     <?php
                     if ($pendaftar['nama_peserta_1'] != '') {
                     ?>
                        str += `<p style="font-size: 14pt;">` + "<?php echo $pendaftar['nama_peserta_1']; ?>";
                        str += `<br><b style="color: red;">` + "<?php echo $kode['erdc_1']; ?>" + `</b></p>`;
                     <?php
                     }
                     ?>
                     <?php
                     if ($pendaftar['nama_peserta_2'] != '') {
                     ?>
                        str += `<p style="font-size: 14pt;">` + "<?php echo $pendaftar['nama_peserta_2']; ?>";
                        str += `<br><b style="color: red;">` + "<?php echo $kode['erdc_2']; ?>" + `</b></p>`;
                     <?php
                     }
                     ?>
                     <?php
                     if ($pendaftar['nama_peserta_3'] != '') {
                     ?>
                        str += `<p style="font-size: 14pt;">` + "<?php echo $pendaftar['nama_peserta_3']; ?>";
                        str += `<br><b style="color: red;">` + "<?php echo $kode['erdc_3']; ?>" + `</b></p>`;
                     <?php
                     }
                     ?>
                  <?php
                  }
                  ?>
                  <?php
                  if ($pendaftar['pilihan_lomba_3'] != '') {
                  ?>
                     str += `<hr><p style="font-size: 14pt;"><b>NOMOR PESERTA<br>LOMBA KUAT TEKAN BETON<br>PETRA CIVIL EXPO 2021</b></p><hr>`;
                     <?php
                     if ($pendaftar['nama_peserta_1'] != '') {
                     ?>
                        str += `<p style="font-size: 14pt;">` + "<?php echo $pendaftar['nama_peserta_1']; ?>";
                        str += `<br><b style="color: red;">` + "<?php echo $kode['lktb_1']; ?>" + `</b></p>`;
                     <?php
                     }
                     ?>
                     <?php
                     if ($pendaftar['nama_peserta_2'] != '') {
                     ?>
                        str += `<p style="font-size: 14pt;">` + "<?php echo $pendaftar['nama_peserta_2']; ?>";
                        str += `<br><b style="color: red;">` + "<?php echo $kode['lktb_2']; ?>" + `</b></p>`;
                     <?php
                     }
                     ?>
                     <?php
                     if ($pendaftar['nama_peserta_3'] != '') {
                     ?>
                        str += `<p style="font-size: 14pt;">` + "<?php echo $pendaftar['nama_peserta_3']; ?>";
                        str += `<br><b style="color: red;">` + "<?php echo $kode['lktb_3']; ?>" + `</b></p>`;
                     <?php
                     }
                     ?>
               <?php
                  }
               }
               ?>
               str += `
                  <hr>
                  <p style="font-size: 14pt;"><b style="font-size: 16pt;">STEP 2</b><br>Silakan <b>bergabung</b> pada grup <b>WhatsApp</b> sesuai bidang lomba yang sudah dipilih untuk mendapatkan informasi lebih lanjut tentang bidang lomba yang sudah dipilih.
                  `
               <?php
               if ($pendaftar['pilihan_lomba_1'] != '') {
                  if ($pendaftar['jenjang_pendidikan'] == 'Senior High School') {
               ?>
                     str += `
                     <br><br><a type='button' target="_blank" href='http://petra.id/GroupBCSMA' class='btn btn-success' style='-webkit-appearance: none;'><i class="fab fa-whatsapp"></i> JOIN WHATSAPP GROUP<br><b>BRIDGE COMPETITION (SMA)</b></a>
                     `
                  <?php
                  } else if ($pendaftar['jenjang_pendidikan'] == 'College') {
                  ?>
                     str += `
                     <br><br><a type='button' target="_blank" href='http://petra.id/GroupBCUNIV' class='btn btn-success' style='-webkit-appearance: none;'><i class="fab fa-whatsapp"></i> JOIN WHATSAPP GROUP<br><b>BRIDGE COMPETITION (UNIVERSITY)</b></a>
                     `
               <?php
                  }
               }
               ?>
               <?php
               if ($pendaftar['pilihan_lomba_2'] != '') {
               ?>
                  str += `
                     <br><br><a type='button' target="_blank" href='http://petra.id/GroupERDC' class='btn btn-success' style='-webkit-appearance: none;'><i class="fab fa-whatsapp"></i> JOIN WHATSAPP GROUP<br><b>EARTHQUAKE RESISTANT<br>DESIGN COMPETITION</b></a>
                     `
               <?php
               }
               ?>
               <?php
               if ($pendaftar['pilihan_lomba_3'] != '') {
               ?>
                  str += `
                     <br><br><a type='button' target="_blank"href='http://petra.id/GroupLKTB' class='btn btn-success' style='-webkit-appearance: none;'><i class="fab fa-whatsapp"></i> JOIN WHATSAPP GROUP<br><b>LOMBA KUAT TEKAN BETON</b></a>
                     `
               <?php
               }
               ?>
               str += `</p></div>`;
               this.$content.html(str);
            }, 100);
         },
         closeAnimation: 'scale',
         columnClass: "col-md-8",
         buttons: {
            cancel: {
               text: 'CLOSE',
               btnClass: 'btn effect01',
               action: function() {}
            }
         },
         content: ""
      });
   }

   function successWebinar() {
      $.confirm({
         title: 'REGISTRATION SUCCESSFUL',
         type: 'green',
         typeAnimated: true,
         icon: 'far fa-check-circle',
         theme: 'modern',
         draggable: false,
         backgroundDismissAnimation: 'random',
         onOpen: function() {
            setTimeout(() => {
               var str = `
               <div style="color: black; font-weight: 500;">
                  <p style="font-size: 14pt;">Thank you for registering for the Petra Civil Expo 2021's <b>"Into the Industry 4.0 Advancements of Tall Building Constructions"</b> International Webinar!
                  Your proof of payment (for Indonesian students) and your data will be checked and validated further by the Petra Civil Expo 2021's committee. <br><br> We will give you a payment receipt and the International Webinar's link via <b>e-mail</b> after your data has been confirmed. <br><br> Stay safe and God bless you!</p>
               </div>
               `;
               this.$content.html(str);
            }, 100);
         },
         closeAnimation: 'scale',
         columnClass: "col-md-7",
         buttons: {
            cancel: {
               text: 'OK',
               btnClass: 'btn effect01',
               action: function() {}
            }
         },
         content: ""
      });
   }
</script>

<?php
if (isset($_GET['status'])) {
   if ($_GET['status'] == 1) {
      echo "<script>",
      "successRegister()",
      "</script>";
   } else if ($_GET['status'] == 2) {
      echo "<script>",
      "successWebinar()",
      "</script>";
   } else if ($_GET['status'] == 3) {
      echo "<script>",
      "successBalsa()",
      "</script>";
   } else if ($_GET['status'] == 5) {
      echo "<script>",
      "successCheckingBC()",
      "</script>";
   } else if ($_GET['status'] == 4) {
      echo '<script>',
      '	Swal.fire({
               position: "center",
               icon: "error",
               title: "Terjadi Error di Server! <br>Silakan Coba Lagi.",
               showConfirmButton: false,
               timer: 3000
               })',
      '</script>';
   }
}
?>

<head>
   <title>Petra Civil Expo 2021</title>
</head>

<div id="particles-js" style="background-color:rgb(36,34,34);"></div>
<div class="wrapper">
   <div class="video-container" style="
         display: grid;
         width:  100vw;
         place-items: center;
         height: 100vh;
         position: relative;">
      <div class="overlay" style="
      position: absolute;"></div>
      <div class="pce-logo" style="height: 50px;position: absolute;top: 50%; right: 0; bottom: 0; left: 0;display: flex;align-items: center;justify-content: center;">
         <a href="https://www.instagram.com/petracivilexpo/" target="_blank"><img id="PCE-vid" src="assets/pce_logo monochrome.png" style="max-width:60vw; z-index:2; position:relative;"></a>
      </div>
      <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop"id="header-video" style="
         width: 100%;
         height: 100%;
         position: absolute;
         top:  0;
         left: 0;
         object-fit: cover;
      ">
         <source src="assets\Loop2.mp4" type="video/mp4">
      </video>
   </div>
   <div class="contain" style="margin-top:-4rem;" id="about">
      <!--Deskripsi PCE-->
      <div class="pce wrap pb-4" id="explain">
         <div class="container pt-4 pb-5 px-3">
            <span class="row row-cols-1 pt-5">
               <div class="col text-center mt-5" id="a">
                  <img id="logoPCE" src="assets/pce_logo monochrome.png" style="max-width:60vw; z-index:2; position:relative;">
               </div>
               <div class="col-md-8 col-12 mx-auto mt-5" style="z-index:10;">
                  <p style="color:white; text-align: center; font-size: 14pt;">
                     <b>Petra Civil Expo</b> merupakan ajang perlombaan terbesar yang diadakan oleh Himpunan Mahasiswa Teknik Sipil Universitas Kristen Petra. <b>Petra Civil Expo</b> menaungi <b>3 lomba nasional</b> yang biasa diadakan setiap tahunnya, yaitu <b>Bridge Competition</b>, <b>Earthquake Resistant Design Competition</b>, dan <b>Lomba Kuat Tekan Beton</b>. Untuk <b>Petra Civil Expo 2021</b> selain menaungi ketiga lomba tersebut, juga akan diadakan <b>webinar</b> yang berskala internasional.
                  </p>
                  <!-- <center><a type='button' href='form_daftar.php' class='btn effect01' style="      -webkit-appearance: none; z-index: 100; height: 70px; line-height: 50px;"><i class="far fa-edit"></i> REGISTER HERE</a></center> -->
               </div>
            </span>
         </div>
      </div>
      <div class="pce-theme wrap p-4" style="background-image: url('assets/image/erdc/erdc_5.JPG');background-size:cover;">
         <div class="container p-4">
            <span class="row row-cols-1">
               <div class="col-md-8 col-12 mx-auto mt-4 mb-5" style="z-index:10;">
                  <h1 style="color:white; font-family: 'Monument Extended', sans-serif;letter-spacing: 2px; text-align: center;">
                     REDIFINING FUTURE THROUGH VISIONARY INNOVATIONS
                  </h1>
                  <p style="color:white; text-align: center; font-size: 14pt;">
                     <b>Petra Civil Expo 2022</b> akan menangkat tema "Redifining Future Through Visionary Innovations". Tema ini memiliki arti bahwa manusia harus peduli akan kebutuhan masa depan dengan cara berinovasi dengan kreatif. Melihat kondisi Negara Indonesia yang pembangunan infrastrukturnya masih belum merata, generasi muda Indonesia memiliki tugas besar untuk memastikan seluruh daerah di Indonesia dapat merasakan kemajuan infrastruktur. Dengan tema ini, diharapkan para peserta <b>Petra Civil Expo 2022</b> sebagai generasi penerus bangsa dapat memberikan inovasi-inovasi baru dan merealisasikannya agar dapat memajukan pembangunan infrastruktur di Indonesia ke depannya.</p>
               </div>
            </span>
         </div>
      </div>
      <style>
         /* .pce,
         .pce-theme,
         .bc,
         .erdc,
         .lktb {
            box-shadow: 0px 0px 50px rgba(0, 0, 0, 5);
            z-index: 100;
         } */

         /* .bc,
         .erdc,
         .lktb,
         .pce-theme {
            border-radius: 25px 25px 0 0;
         } */
      </style>
      <div class="bc wrap pb-4" style="background-color:var(--graybrown);">
         <!--BC section-->
         <div class="container pt-5">
            <span class="row">
               <div class="col-md-4 col-12 my-auto text-center">
                  <a href="https://www.instagram.com/bcukp/" target="_blank"><img src="assets/image/pce_bridge_brown.png" style="width:200px; z-index:2; position:relative;" id="logo-bc"></a>
               </div>
               <div class="col-md-8 col-12 mt-3" style="z-index:10;">
                  <style>
                     .bc-shadow {
                        color: white;
                        font-family: 'Monument Extended', sans-serif;
                        letter-spacing: 2px;
                     }
                  </style>
                  <h1 class="bc-shadow">
                     Unifying The Sleeping Tiger
                  </h1>
                  <p style="color:white; text-align: center; font-size: 14pt;" id="tes">
                     <b>Bridge Competition 2022</b> mengangkat tema “Unifying The Sleeping Tiger” karena Indonesia terkenal dengan julukan The Sleeping Tiger of Southeast Asia. Tema ini memiliki makna bahwa perkembangan infrastruktur di Indonesia dapat berdampak besar pada kemajuan negara Indonesia. Salah satu perkembangan infrastruktur yang dapat dikembangkan adalah infrastruktur jembatan. Infrastruktur jembatan ini ditujukan untuk dapat mempermudah akses mobilitas masyarakat.
                  </p>
               </div>
            </span>
         </div>
         <div class="container bg-full">
            <div class="row justify-content-center">
               <span class="mt-4">
                  <h1 class="bc-shadow">
                     <i class="far fa-images"></i> GALLERY
                  </h1>
               </span>
            </div>
            <!-- <div style="filter:blur(5px) brightness(0.5);"></div> -->
            <div class="owl-carousel">
               <div><img src="assets/image/bc/bc_1.jpg" alt=""></div>
               <div><img src="assets/image/bc/bc_2.jpg" alt=""></div>
               <div><img src="assets/image/bc/bc_3.jpg" alt=""></div>
               <div><img src="assets/image/bc/bc_4.jpg" alt=""></div>
               <div><img src="assets/image/bc/bc_5.jpg" alt=""></div>
               <div><img src="assets/image/bc/bc_6.jpg" alt=""></div>
            </div>
            <div class="row justify-content-center">
               <span class="mt-4">
                  <h1 class="bc-shadow">
                     TERMS OF REFERENCE
                  </h1>
               </span>
            </div>
            <div class="row justify-content-center">
               <a type='button' href='assets/tor/PERATURAN LOMBA BC 2021 (SMA).pdf' class='btn effect01' style="z-index: 100; -webkit-appearance: none;"><i class="fas fa-download"></i> TERMS OF REFERENCE<br><b>BRIDGE COMPETITION<br>(SMA)</b></a>
            </div><br>
            <div class="row justify-content-center">
               <a type='button' href='assets/tor/PERATURAN LOMBA BC 2021 (UNIVERSITAS).pdf' class='btn effect01' style="z-index: 100; -webkit-appearance: none;"><i class="fas fa-download"></i> TERMS OF REFERENCE<br><b>BRIDGE COMPETITION<br>(UNIVERSITY)</b></a>
            </div>
            <!--timeline BC section-->
            <div class="container-fluid pt-5">
               <span class="mt-5">
                  <h1 class="bc-shadow">
                     TIMELINE<br>BRIDGE COMPETITION<br>2021</h1>
               </span>
               <div class="timeline-container">
                  <div class="timeline-block timeline-block-left">
                     <div class="marker"></div>
                     <div class="timeline-content">
                        <h3 style="color:white;text-align: right;">March 7<sup>th</sup>, 2022</h3>
                        <h4 style="font-weight:bold;text-align: right;">Briefing Day</h4>
                     </div>
                  </div>
                  <div class="timeline-block timeline-block-right">
                     <div class="marker"></div>
                     <div class="timeline-content">
                        <h3 style="color:white;">March 8<sup>th</sup>, 2022</h3>
                        <h4 style="font-weight:bold;">Pembagian Balsa</h4>
                     </div>
                  </div>
                  <div class="timeline-block timeline-block-left">
                     <div class="marker"></div>
                     <div class="timeline-content">
                        <h3 style="color:white;text-align: right;">March 12<sup>th</sup>, 2022</h3>
                        <h4 style="font-weight:bold;text-align: right;">Workshop Universitas</h4>
                     </div>
                  </div>
                  <div class="timeline-block timeline-block-right">
                     <div class="marker"></div>
                     <div class="timeline-content">
                        <h3 style="color:white;">March 19<sup>th</sup>, 2022</h3>
                        <h4 style="font-weight:bold;">Workshop SMA dan Rally Games</h4>
                     </div>
                  </div>
                  <div class="timeline-block timeline-block-left">
                     <div class="marker"></div>
                     <div class="timeline-content">
                        <h3 style="color:white;text-align: right;">April 11<sup>th</sup>, 2022</h3>
                        <h4 style="font-weight:bold;text-align: right;">Checking Day</h4>
                     </div>
                  </div>
                  <div class="timeline-block timeline-block-right">
                     <div class="marker"></div>
                     <div class="timeline-content">
                        <h3 style="color:white;">April 21<sup>st</sup>, 2022</h3>
                        <h4 style="font-weight:bold;">Batas Pengumpulan Jembatan SMA</h4>
                     </div>
                  </div>
                  <div class="timeline-block timeline-block-left">
                     <div class="marker"></div>
                     <div class="timeline-content">
                        <h3 style="color:white;text-align: right;">April 23<sup>rd</sup>, 2022</h3>
                        <h4 style="font-weight:bold;text-align: right;">Elimination Day SMA</h4>
                     </div>
                  </div>
                  <div class="timeline-block timeline-block-right">
                     <div class="marker"></div>
                     <div class="timeline-content">
                        <h3 style="color:white;">April 25<sup>th</sup>, 2022</h3>
                        <h4 style="font-weight:bold;">Batas Pengumpulan Jembatan Universitas</h4>
                     </div>
                  </div>
                  <div class="timeline-block timeline-block-left">
                     <div class="marker"></div>
                     <div class="timeline-content">
                        <h3 style="color:white;">April 27<sup>th</sup>, 2022</h3>
                        <h4 style="font-weight:bold;">Elimination Day Universitas</h4>
                     </div>
                  </div>
                  <div class="timeline-block timeline-block-right">
                     <div class="marker"></div>
                     <div class="timeline-content">
                        <h3 style="color:white;">April 28<sup>th</sup>, 2022</h3>
                        <h4 style="font-weight:bold;">Finalist Briefing</h4>
                     </div>
                  </div>
                  <div class="timeline-block timeline-block-left">
                     <div class="marker"></div>
                     <div class="timeline-content">
                        <h3 style="color:white;">May 12<sup>nd</sup>, 2022</h3>
                        <h4 style="font-weight:bold;">Batas Pengumpulan Jembatan, Proposal + PPT Universitas dan SMA untuk Final Day</h4>
                     </div>
                  </div>
                  <div class="timeline-block timeline-block-right">
                     <div class="marker"></div>
                     <div class="timeline-content">
                        <h3 style="color:white;text-align: left;">May 14<sup>th</sup>, 2022</h3>
                        <h4 style="font-weight:bold;text-align: left;"><i class="fas fa-trophy"></i> Final Day</h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row justify-content-center px-3" style="margin-bottom: 50px;">
            <span class="mt-3">
               <h1 class="bc-shadow">
                  <i class="fas fa-award"></i> TOTAL PRIZE <i class="fas fa-award"></i>
               </h1>
               <div id="reward-prize">
                  <h1 style="border: 2px solid white; font-family: 'Monument Extended', sans-serif; letter-spacing: 2px; text-align: center; color: white; margin-bottom: 30px;" id="reward">
                     <i class="fas fa-money-bill-wave"></i> 30.000.000 IDR <i class="fas fa-money-bill-wave"></i>
                  </h1>
               </div>
               <h1 style="font-family: 'Monument Extended', sans-serif; letter-spacing: 2px; text-align: center; font-size: 36pt; color: white; margin: 2px;">
                  +
               </h1>
               <a href="http://sipil.petra.ac.id/" style="text-decoration: none;" target="_blank">
                  <h1 style="font-family: 'Monument Extended', sans-serif; letter-spacing: 2px; text-align: center; padding-top: 10px; color: white;" id="scholarship">
                     <span style="font-size: 70pt; color: black;"><i class="fas fa-graduation-cap"></i></span><br>CIVIL ENGINEERING<br>PETRA CHRISTIAN UNIVERSITY SCHOLARSHIP<br>(FOR SENIOR HIGH SCHOOL STUDENTS)
                  </h1>
               </a>
            </span>
         </div>
         <div class="row justify-content-center px-3" style="margin-bottom: 70px;">
            <span class="mt-3">
               <h1 class="bc-shadow">
                  <i class="fas fa-video"></i> WATCH THE VIDEO
               </h1>
               <center>
                  <video controls id="video-bumper" controlsList="nodownload">
                     <source src="assets/bc.mp4" type="video/mp4">
                  </video>
               </center>
            </span>
         </div>
      </div>
      <div class="erdc wrap pb-4" style="background-color:#ece6da;">
         <!--ERDC section-->
         <div class="container pt-5">
            <span class="row">
               <div class="col-md-4 col-12 my-auto text-center">
                  <a href="https://www.instagram.com/erdcpetra/" target="_blank"><img src="assets\image\pce_erdc_brown.png" style="width:230px; z-index:2; position:relative;" id="logo-erdc"></a>
               </div>
               <div class="col-md-8 col-12 mt-3" style="z-index:10;">
                  <style>
                     .erdc-shadow {
                        color: #123958;
                        font-family: 'Monument Extended', sans-serif;
                        letter-spacing: 2px;
                     }
                  </style>
                  <h1 class="erdc-shadow">
                     OVERCOME THE CERTAIN UNCERTAINTY</h1>
                  <p style="color:#123958; text-align: center; font-size: 14pt;" id="tes">
                     <b>Earthquake Resistant Design Competition (ERDC)</b> adalah lomba desain bangunan bertingkat tahan gempa
                     bertaraf nasional. Pada lomba ini, peserta diajak untuk berpikir secara inovatif untuk membuat desain
                     bangunan bertingkat tahan gempa yang efektif dan kuat menahan beban lateral gempa bumi. Peserta akan
                     membuat maket bangunan bertingkat tahan gempa yang akan diuji menggunakan mesin penggetaran (<i>shaking
                        table</i>). Diharapkan dengan mengikuti lomba ini, peserta tertarik untuk mempelajari bangunan tahan gempa
                     dan memanfaatkan ilmu yang mereka dapatkan untuk membantu memajukan Negara Indonesia di masa mendatang.
                  </p>
               </div>
            </span>
         </div>
         <div class="container pt-4 bg-full">
            <div class="row justify-content-center">
               <span class="mt-4">
                  <h1 class="erdc-shadow">
                     <i class="far fa-images"></i> GALLERY
                  </h1>
               </span>
            </div>
            <!-- <div style="filter:blur(5px) brightness(0.5);"></div> -->
            <div class="owl-carousel">
               <div><img src="assets/image/erdc/erdc_1.jpg" alt=""></div>
               <div><img src="assets/image/erdc/erdc_2.jpg" alt=""></div>
               <div><img src="assets/image/erdc/erdc_3.jpg" alt=""></div>
               <div><img src="assets/image/erdc/erdc_4.jpg" alt=""></div>
               <div><img src="assets/image/erdc/erdc_elim.jpg" alt=""></div>
               <div><img src="assets/image/erdc/erdc_final.jpg" alt=""></div>
            </div>
         </div>
         <div class="row justify-content-center">
            <span class="mt-4">
               <h1 class="erdc-shadow">
                  TERMS OF REFERENCE
               </h1>
            </span>
         </div>
         <div class="row justify-content-center 1">
            <a type='button' href='assets/tor/TOR ERDC 2021.pdf' class='btn effect01' style="z-index: 100; -webkit-appearance: none;"><i class="fas fa-download"></i> TERMS OF REFERENCE<br><b>EARTHQUAKE RESISTANT<br>DESIGN COMPETITION</b></a>
         </div>
         <!--timeline ERDC section-->
         <div class="container-fluid pt-5">
            <!--<span class="mt-5 px-5">-->
            <h1 class="erdc-shadow">
               TIMELINE<br>EARTHQUAKE RESISTANT DESIGN COMPETITION<br>2021</h1>
            <!--</span>-->
            <div class="timeline-container">
               <div class="timeline-block timeline-block-right">
                  <div class="marker"></div>
                  <div class="timeline-content">
                     <h3 style="color:#1C545E; text-shadow: 1px 1px #f0ebce;">March 12<sup>th</sup>, 2021</h3>
                     <h4 style="font-weight:bold;color: #123958; text-shadow: 1px 1px #f0ebce;">Proposal Submission Deadline</h4>
                  </div>
               </div>

               <div class="timeline-block timeline-block-left">
                  <div class="marker"></div>
                  <div class="timeline-content">
                     <h3 style="text-align: right;color:#1C545E; text-shadow: 1px 1px #f0ebce;">March 26<sup>th</sup>, 2021</h3>
                     <h4 style="font-weight:bold;text-align: right;color: #123958; text-shadow: 1px 1px #f0ebce;">Workshop</h4>
                  </div>
               </div>

               <div class="timeline-block timeline-block-right">
                  <div class="marker"></div>
                  <div class="timeline-content">
                     <h3 style="color:#1C545E; text-shadow: 1px 1px #f0ebce;">March 27<sup>th</sup>, 2021</h3>
                     <h4 style="font-weight:bold;color: #123958; text-shadow: 1px 1px #f0ebce;">Distribution of Balsa</h4>
                  </div>
               </div>

               <div class="timeline-block timeline-block-left">
                  <div class="marker"></div>
                  <div class="timeline-content">
                     <h3 style="text-align: right;color:#1C545E; text-shadow: 1px 1px #f0ebce;">May 6<sup>th</sup> - May 8<sup>th</sup>, 2021</h3>
                     <h4 style="font-weight:bold;text-align: right;color: #123958; text-shadow: 1px 1px #f0ebce;">Checking Session</h4>
                  </div>
               </div>
               <div class="timeline-block timeline-block-right">
                  <div class="marker"></div>
                  <div class="timeline-content">
                     <h3 style="color:#1C545E; text-shadow: 1px 1px #f0ebce;">May 20<sup>th</sup>, 2021</h3>
                     <h4 style="font-weight:bold;color: #123958; text-shadow: 1px 1px #f0ebce;">Maket Submission Deadline</h4>
                  </div>
               </div>

               <div class="timeline-block timeline-block-left">
                  <div class="marker"></div>
                  <div class="timeline-content">
                     <h3 style="text-align: right;color:#1C545E; text-shadow: 1px 1px #f0ebce;">May 21<sup>st</sup> - May 23<sup>rd</sup>, 2021</h3>
                     <h4 style="text-align: right;font-weight:bold;color: #123958; text-shadow: 1px 1px #f0ebce;">Final Day <i class="fas fa-trophy"></i></h4>
                  </div>
               </div>
            </div>
         </div>
         <div class="row justify-content-center px-3" style="margin-bottom: 50px;">
            <span class="mt-2">
               <h1 class="erdc-shadow">
                  <i class="fas fa-award"></i> TOTAL PRIZE <i class="fas fa-award"></i>
               </h1>
               <div id="reward-prize">
                  <h1 style="border: 2px solid #1C545E; font-family: 'Monument Extended', sans-serif; letter-spacing: 2px; text-align: center; color:#1C545E; margin-bottom: 30px;" id="reward">
                     <i class="fas fa-money-bill-wave"></i> 20.000.000 IDR <i class="fas fa-money-bill-wave"></i>
                  </h1>
               </div>
            </span>
         </div>
         <div class="row justify-content-center px-3 mt-4" style="margin-bottom: 64px;">
            <span class="mt-3">
               <h1 class="erdc-shadow">
                  <i class="fas fa-video"></i> WATCH THE VIDEO
               </h1>
               <center>
                  <video controls id="video-bumper" controlsList="nodownload">
                     <source src="assets/erdc.mp4" type="video/mp4">
                  </video>
               </center>
            </span>
         </div>
      </div>
      <div class="lktb wrap pb-4" style="background-color:var(--graybrown);">
         <!--LKTB section-->
         <div class="container pt-5">
            <span class="row">
               <div class="col-md-4 col-12 my-auto text-center">
                  <a href="https://www.instagram.com/lktbpetra/" target="_blank"><img src="assets\image\pce_lktb_brown.png" style="width:200px; z-index:2; position:relative;" id="logo-lktb"></a>
               </div>
               <div class="col-md-8 col-12 mt-3" style="z-index:10;">
                  <style>
                     .lktb-shadow {
                        color: white;
                        font-family: 'Monument Extended', sans-serif;
                        letter-spacing: 2px;
                     }
                  </style>
                  <h1 class="lktb-shadow">
                  Road TO SKILLED CONCRETE TECHNOLOGIST</h1>
                  <p style="color:white; text-align: center; font-size: 14pt;" id="tes">
                     <b>Lomba Kuat Tekan Beton 2022 </b> mengangkat tema "Road to Skilled Concrete Technologist". 
                     Tema ini diangkat dengan mengingat bahwa beton adalah salah satu bahan yang paling banyak 
                     digunakan dalam pekerjaan konstruksi di Indonesia. Sebelum dibentuk, beton harus direncanakan 
                     terlebih dahulu karena beton merupakan campuran dari berbagai macam material. Proses pencampuran 
                     inilah yang menjadi masalah terbesar dalam pembentukan beton. Permasalahan sering terjadi 
                     akibat pemahaman engineer mengenai beton yang masih kurang sehingga membuat kualitas beton 
                     menjadi berkurang pada saat pembangunan. Hal ini menyebabkan bangunan tidak sesuai dengan rencana.
                      Maka dari itu, peserta perlu memiliki pemahaman mengenai kondisi konstruksi beton yang sedang 
                      berlangsung di sekitar mereka. Dengan harapan setelah memahami permasalahan yang sedang terjadi, 
                     peserta dapat memberi solusi melalui rencana beton yang mereka buat di Lomba Kuat Tekan Beton 2022.
                  </p>
               </div>
            </span>
         </div>
         <div class="container pt-4 bg-full">
            <div class="row justify-content-center">
               <span class="mt-4">
                  <h1 class="lktb-shadow">
                     <i class="far fa-images"></i> GALLERY
                  </h1>
               </span>
            </div>
            <!-- <div style="filter:blur(5px) brightness(0.5);"></div> -->
            <div class="owl-carousel">
               <div><img src="assets/image/lktb/lktb_mixing_1.jpg" alt=""></div>
               <div><img src="assets/image/lktb/lktb_mixing_2.jpg" alt=""></div>
               <div><img src="assets/image/lktb/lktb_stage_1.jpg" alt=""></div>
               <div><img src="assets/image/lktb/lktb_stage_2.jpg" alt=""></div>
               <div><img src="assets/image/lktb/lktb_3.jpg" alt=""></div>
               <div><img src="assets/image/lktb/lktb_4.jpg" alt=""></div>
            </div>
         </div>
         <div class="container-fluid pt-4">
            <div class="row justify-content-center" style="color: white;">
               <span class="mt-4">
                  <h1 class="lktb-shadow">
                     TERMS OF REFERENCE
                  </h1>
               </span>
            </div>
            <div class="row justify-content-center mt-1">
               <a type='button' href='assets/tor/TOR LKTB 2021.pdf' class='btn effect01' style="-webkit-appearance: none; z-index: 100;"><i class="fas fa-download"></i> TERMS OF REFERENCE<br><b>LOMBA KUAT TEKAN BETON</b></a>
            </div>
         </div>
         <!--timeline LKTB section-->
         <div class="container-fluid pt-5">
            <span class="mt-5">
               <h1 class="lktb-shadow">
                  TIMELINE<br>LOMBA KUAT TEKAN BETON<br>2021</h1>
            </span>
            <div class="timeline-container">
               <div class="timeline-block timeline-block-right">
                  <div class="marker"></div>
                  <div class="timeline-content">
                     <h3 style="color:white;">March 12<sup>th</sup>, 2022</h3>
                     <h4 style="font-weight:bold;">Briefing Day</h4>
                  </div>
               </div>

               <div class="timeline-block timeline-block-left">
                  <div class="marker"></div>
                  <div class="timeline-content">
                     <h3 style="color:white; text-align: right;">March 19<sup>th</sup>, 2022</h3>
                     <h4 style="font-weight:bold;text-align: right;">Distribution of Materials</h4>
                  </div>
               </div>

               <div class="timeline-block timeline-block-right">
                  <div class="marker"></div>
                  <div class="timeline-content">
                     <h3 style="color:white;">March 26<sup>th</sup>, 2022</h3>
                     <h4 style="font-weight:bold;">Proposal and Mix Design Submission Deadline</h4>
                  </div>
               </div>

               <div class="timeline-block timeline-block-left">
                  <div class="marker"></div>
                  <div class="timeline-content">
                     <h3 style="color:white;text-align: right;">April 9<sup>th</sup>, 2022</h3>
                     <h4 style="font-weight:bold;text-align: right;">Mixing Day</h4>
                  </div>
               </div>

               <div class="timeline-block timeline-block-right">
                  <div class="marker"></div>
                  <div class="timeline-content">
                     <h3 style="color:white;">April 16<sup>th</sup>, 2022</h3>
                     <h4 style="font-weight:bold;">Day 7 Testing</h4>
                  </div>
               </div>
               <div class="timeline-block timeline-block-left">
                  <div class="marker"></div>
                  <div class="timeline-content">
                     <h3 style="color:white;text-align: right;">April 25<sup>th</sup> - April 30<sup>th</sup>, 2022</h3>
                     <h4 style="font-weight:bold;text-align: right;">Concrete Submission</h4>
                  </div>
               </div>
               <div class="timeline-block timeline-block-right">
                  <div class="marker"></div>
                  <div class="timeline-content">
                     <h3 style="color:white;">May 7<sup>th</sup>, 2022</h3>
                     <h4 style="font-weight:bold;">Final Testing</h4>
                  </div>
               </div>
               <div class="timeline-block timeline-block-left">
                  <div class="marker"></div>
                  <div class="timeline-content">
                     <h3 style="color:white;text-align: right;">May 14<sup>st</sup>, 2022</h3>
                     <h4 style="font-weight:bold;text-align: right;"><i class="fas fa-trophy"></i> Presentation Day</h4>
                  </div>
               </div>
            </div>
         </div>
         <div class="row justify-content-center px-3" style="margin-bottom: 50px;">
            <span class="mt-2">
               <h1 class="lktb-shadow">
                  <i class="fas fa-award"></i> TOTAL PRIZE <i class="fas fa-award"></i>
               </h1>
               <div id="reward-prize">
                  <h1 style="border: 2px solid white; font-family: 'Monument Extended', sans-serif; letter-spacing: 2px; text-align: center; color: white; margin-bottom: 30px;" id="reward">
                     <i class="fas fa-money-bill-wave"></i> 19.500.000 IDR <i class="fas fa-money-bill-wave"></i>
                  </h1>
               </div>
            </span>
         </div>
         <div class="row justify-content-center px-3 mt-4" style="margin-bottom: 50px;">
            <span class="mt-3">
               <h1 class="lktb-shadow">
                  <i class="fas fa-video"></i> WATCH THE VIDEO
               </h1>
               <center>
                  <video controls id="video-bumper" controlsList="nodownload">
                     <source src="assets/lktb.mp4" type="video/mp4">
                  </video>
               </center>
            </span>
         </div>
      </div>
      <!--timeline section-->
      <div class="pce-timeline container-fluid mt-5">
         <span class="mt-5">
            <h1 style="color:white;font-family: 'Monument Extended', sans-serif;letter-spacing: 2px;z-index:1500; text-shadow: 3px 3px black, 4px 4px black, 5px 5px black;">
               TIMELINE<br>PETRA CIVIL EXPO<br>2021</h1>
         </span>
         <div class="timeline-container" style="z-index:1500;">
            <div class="timeline-block timeline-block-right">
               <div class="marker"></div>
               <div class="timeline-content">
                  <h3 style="color:white;">December 28<sup>th</sup>, 2020 - January 28<sup>th</sup>, 2021</h3>
                  <h4 style="font-weight:bold; color:white;">Early Bird Registration</h4>
               </div>
            </div>

            <div class="timeline-block timeline-block-left">
               <div class="marker"></div>
               <div class="timeline-content">
                  <h3 style="color:white; text-align: right;">January 29<sup>th</sup> - March 4<sup>th</sup>, 2021</h3>
                  <h4 style="font-weight:bold; color:white;text-align: right;">Normal Price Registration</h4>
               </div>
            </div>

            <div class="timeline-block timeline-block-right">
               <div class="marker"></div>
               <div class="timeline-content">
                  <h3 style="color:white;">March 5<sup>th</sup>, 2021</h3>
                  <h4 style="font-weight:bold; color:white;">Opening Ceremony and International Webinar</h4>
               </div>
            </div>

            <div class="timeline-block timeline-block-left">
               <div class="marker"></div>
               <div class="timeline-content">
                  <h3 style="color:white; text-align: right;">March 12<sup>th</sup> - May 23<sup>rd</sup>, 2021</h3>
                  <h4 style="font-weight:bold; color:white;text-align: right;">Earthquake Resistant Design Competition</h4>
               </div>
            </div>

            <div class="timeline-block timeline-block-right">
               <div class="marker"></div>
               <div class="timeline-content">
                  <h3 style="color:white;">March 26<sup>th</sup> - May 17<sup>th</sup>, 2021</h3>
                  <h4 style="font-weight:bold; color:white;">Bridge Competition</h4>
               </div>
            </div>

            <div class="timeline-block timeline-block-left">
               <div class="marker"></div>
               <div class="timeline-content">
                  <h3 style="color:white; text-align: right;">March 27<sup>th</sup> - May 8<sup>th</sup>, 2021</h3>
                  <h4 style="font-weight:bold; color:white;text-align: right;">Lomba Kuat Tekan Beton</h4>
               </div>
            </div>

            <div class="timeline-block timeline-block-right">
               <div class="marker"></div>
               <div class="timeline-content">
                  <h3 style="color:white;">May 21<sup>st</sup> - May 23<sup>rd</sup>, 2021</h3>
                  <h4 style="font-weight:bold; color:white;">Final Day <i class="fas fa-trophy"></i></h4>
               </div>
            </div>

         </div>

         <div class="row justify-content-center px-3 mt-4" style="margin-bottom: 70px;">
            <span class="mt-3">
               <h1 style="font-family: 'Monument Extended', sans-serif;letter-spacing: 2px; text-align: center; color: white">
                  <i class="fas fa-video"></i> WATCH THE VIDEO
               </h1>
               <center>
                  <video controls id="video-bumper-pce" controlsList="nodownload">
                     <source src="assets/pce.mp4" type="video/mp4">
                  </video>
               </center>
            </span>
         </div>

         <!-- <span class="mt-5">
            <h1 style="color: white;font-family: 'Monument Extended', sans-serif;letter-spacing: 2px;z-index:1500; text-shadow: 3px 3px gray, 4px 4px gray, 5px 5px gray;">
               ARE YOU THE NEXT CHAMPION?<br>MAKE IT HAPPEN!
            </h1>
         </span> -->

         <!-- <center><a type='button' href='form_daftar.php' class='btn effect01' style="z-index: 100; height: 70px; line-height: 50px; -webkit-appearance: none;"><i class="far fa-edit"></i> REGISTER HERE</a></center> -->
      </div>
   </div>

   <a id="back-to-top" href="#" class="btn btn-danger btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>

   <?php include 'footer.php' ?>
</div>
<script type="text/javascript" src="assets/js/particles.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script src="assets/js/script.js"></script>
<script>
   /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
   particlesJS.load('particles-js', 'assets/js/particlesjs-config-timeline.json', function() {
      //console.log('callback - particles.js config loaded');
   });
</script>
</body>

</html>