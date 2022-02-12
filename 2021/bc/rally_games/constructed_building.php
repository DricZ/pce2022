<?php
   require_once 'phps/connect.php';
   require_once 'header.php';
   
   $_SESSION['page'] = 'constructed_building';
   
   $username = $_SESSION['username'];
   
   $sqlTeam = "SELECT a.point, city_name, location_now_id_city FROM team a JOIN city b ON a.location_now_id_city = b.id WHERE username = ?";
   $stmtTeam = $pdo->prepare($sqlTeam);
   $stmtTeam->execute([$_SESSION['username']]);
   $rowTeam = $stmtTeam->fetch();
   
   $getCityIDsql = "SELECT * FROM city WHERE city_name = ?";
   $getCityIDstmt = $pdo->prepare($getCityIDsql);
   $getCityIDstmt->execute([$_GET['city']]);
   $getCityIDrow = $getCityIDstmt->fetch();
   ?>
<head>
   <title><?= $_GET['city'] ?> - Constructed Building</title>
</head>
<div class="container my-5 pb-5">
<div class="row col-12 justify-content-center mt-5">
   <div id="decor-hidden-post">
      <!-- svg logo -->
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 85px;" transform="translate(10,17)">
         <g class="" transform="translate(0,0)" style="">
            <path d="M217 25v30h30V25h-30zm48 0v30h30V25h-30zm48 0v30h30V25h-30zm-96 48v46h30V73h-30zm48 0v46h30V73h-30zm48 0v46h30V73h-30zm-96 64v46h30v-46h-30zm48 0v46h30v-46h-30zm48 0v46h30v-46h-30zm174 6.508l-94 53.715V215h94v-71.492zM217 201v46h30v-46h-30zm48 0v46h30v-46h-30zm48 0v46h30v-46h-30zm80 32v110h94V233h-94zM39 256v23h18v-23H39zm178 9v46h30v-46h-30zm48 0v46h30v-46h-30zm48 0v46h30v-46h-30zM37.562 297l-7 14h146.875l-7-14H37.563zM25 329v158h23v-23h32v23h48v-23h32v23h23V329H25zm192 0v46h30v-46h-30zm48 0v46h30v-46h-30zm48 0v46h30v-46h-30zM48 352h32v16H48v-16zm80 0h32v16h-32v-16zm265 9v126h31v-23h32v23h31V361h-94zM48 384h32v16H48v-16zm80 0h32v16h-32v-16zm89 9v46h30v-46h-30zm48 0v46h30v-46h-30zm48 0v46h30v-46h-30zM48 416h32v16H48v-16zm80 0h32v16h-32v-16zm89 41v30h30v-30h-30zm48 0v30h30v-30h-30zm48 0v30h30v-30h-30z" fill="rgb(32,31,31)" fill-opacity="1"></path>
         </g>
      </svg>
   </div>
   <h1 id="title" style="font-size: 40pt;">CONSTRUCTED<br>BUILDING</h1>
</div>
<div class="row col-12 justify-content-center">
   <h3 id="city"><?= $_GET['city']; ?></h3>
</div>
<div class="text-center tip mt-3">Construct all buildings in <?= $_GET['city']; ?> to get <img src="assets/image/Bridge Coin.png" width="20px" style="margin-top:-4px;">600
   <?php
      $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE username = ? AND c.id_city = ? AND d.name IN ('Jembatan Kayu', 'Jembatan Baja', 'Jembatan Beton', 'Rumah Sakit', 'Mall', 'Taman', 'Perumahan', 'Apartemen', 'Hotel')";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$_SESSION['username'], $getCityIDrow['id']]);
      
      if ($stmt->rowCount() == 9) {
      ?>
   <img src="assets/image/confirmed.svg" width="3.5%">
   <?php
      }
      ?>
</div>
<div class="container col-md-8 col-12 mb-5 mt-4">
<!-- JEMBATAN -->
<div class="col-12 py-2">
   <hr data-content="Jembatan" class="hr-text">
</div>
<?php
   $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE username = ? AND c.id_city = ? AND d.name IN ('Jembatan Kayu', 'Jembatan Baja', 'Jembatan Beton')";
   $stmt = $pdo->prepare($sql);
   $stmt->execute([$_SESSION['username'], $getCityIDrow['id']]);
   
   if ($stmt->rowCount() == 3) {
   ?>
<div class="progress-building col-12 py-2">
   completed
   <img src="assets/image/confirmed.svg" width="5%" style="top:0;position:absolute;">
</div>
<?php
   } else if ($stmt->rowCount() == 0) {
   ?>
<div class="progress-building col-12 py-2" style="font-weight:500;">
   nothing has been built yet
   <img src="assets/image/cancel.svg" width="5%" style="top:0;position:absolute;">
</div>
<?php
   } else {
   ?>
<div class="progress-building col-12 py-2" style="font-weight:500;">
   <?= $stmt->rowCount() ?> out of 3 types constructed
   <img src="assets/image/cycle.svg" width="5%" style="top:0;position:absolute;">
</div>
<?php
   }
   ?>
<div class="row row-cols-lg-3 row-cols-2 mb-2">
<!-- START OF 1 BUILDING TYPE CARD -->
<div class="col py-3">
<?php
   $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE username = ? AND c.id_city = ? AND d.name = ?";
   $stmt = $pdo->prepare($sql);
   $stmt->execute([$_SESSION['username'], $getCityIDrow['id'], 'Jembatan Kayu']);
   
   if ($stmt->rowCount() == 0) {
   ?>
<div class="card-building-type p-3 not-obtained">
<div class="container item">
   <!-- div tambahan untuk bangunan yg blm dibangun -->
   <div class="tag-not-obtained">not constructed yet</div>
   <?php
      } else {
          ?>
   <div class="card-building-type p-3">
      <div class="container item">
         <?php
            }
                ?>
         <div class="row pt-3 justify-content-center">
            <h3>Jembatan Kayu</h3>
         </div>
         <div class="row justify-content-center">
            <!-- logo item -->
            <img src="assets/image/b-kayu.svg" width="50%">
         </div>
         <div class="pb-3">
            <!-- logo poin -->
            <img src="assets/image/Bridge Coin.png" width="30px" style="margin-top:-4px;">
            175
         </div>
      </div>
   </div>
</div>
<!-- END OF 1 BUILDING TYPE CARD -->
<!-- START OF 1 BUILDING TYPE CARD -->
<div class="col py-3">
<?php
   $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE username = ? AND c.id_city = ? AND d.name = ?";
   $stmt = $pdo->prepare($sql);
   $stmt->execute([$_SESSION['username'], $getCityIDrow['id'], 'Jembatan Baja']);
   
   if ($stmt->rowCount() == 0) {
   ?>
<div class="card-building-type p-3 not-obtained">
<div class="container item">
   <!-- div tambahan untuk bangunan yg blm dibangun -->
   <div class="tag-not-obtained">not constructed yet</div>
   <?php
      } else {
          ?>
   <div class="card-building-type p-3">
      <div class="container item">
         <?php
            }
                ?>
         <div class="row pt-3 justify-content-center">
            <h3>Jembatan Baja</h3>
         </div>
         <div class="row justify-content-center">
            <!-- logo item -->
            <img src="assets/image/b-baja.svg" width="50%">
         </div>
         <p><img src="assets/image/Bridge Coin.png" width="30px" style="margin-top:-4px;" style="margin-top:-4px;">325</p>
      </div>
   </div>
</div>
<!-- END OF 1 BUILDING TYPE CARD -->
<!-- START OF 1 BUILDING TYPE CARD -->
<div class="col py-3">
<?php
   $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE username = ? AND c.id_city = ? AND d.name = ?";
   $stmt = $pdo->prepare($sql);
   $stmt->execute([$_SESSION['username'], $getCityIDrow['id'], 'Jembatan Beton']);
   
   if ($stmt->rowCount() == 0) {
   ?>
<div class="card-building-type p-3 not-obtained">
   <div class="container item">
      <!-- div tambahan untuk bangunan yg blm dibangun -->
      <div class="tag-not-obtained">not constructed yet</div>
      <?php
         } else {
             ?>
      <div class="card-building-type p-3">
         <div class="container item">
            <?php
               }
                   ?>
            <div class="row pt-3 justify-content-center">
               <h3>Jembatan Beton</h3>
            </div>
            <div class="row justify-content-center">
               <!-- logo item -->
               <img src="assets/image/b-beton.svg" width="50%">
            </div>
            <p><img src="assets/image/Bridge Coin.png" width="30px" style="margin-top:-4px;">350</p>
         </div>
      </div>
   </div>
   <!-- END OF 1 BUILDING TYPE CARD -->
</div>
<div class="total-points col-12 mb-4">
   <p>
      BUILD ALL TYPES OF JEMBATAN TO GET
      <!-- logo poin -->
      <img src="assets/image/Bridge Coin.png" width="20px" style="margin-top:-4px;">200
      <?php
         $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE username = ? AND c.id_city = ? AND d.name IN ('Jembatan Kayu', 'Jembatan Baja', 'Jembatan Beton')";
         $stmt = $pdo->prepare($sql);
         $stmt->execute([$_SESSION['username'], $getCityIDrow['id']]);
         if ($stmt->rowCount() == 3) {
         ?>
      <img src="assets/image/confirmed.svg" width="5%" style="top:-8px;position:absolute;">
      <?php
         }
         ?>
   </p>
   <!-- <p>total points:
      <img src="assets/image/Bridge Coin.png" width="20px">1125
      </p> -->
</div>
<!-- PUBLIC PLACES -->
<div class="col-12 py-2">
   <hr data-content="Public Places" class="hr-text">
</div>
<?php
   $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE username = ? AND c.id_city = ? AND d.name IN ('Rumah Sakit', 'Mall', 'Taman')";
   $stmt = $pdo->prepare($sql);
   $stmt->execute([$_SESSION['username'], $getCityIDrow['id']]);
   
   if ($stmt->rowCount() == 3) {
   ?>
<div class="progress-building col-12 py-2">
   completed
   <img src="assets/image/confirmed.svg" width="5%" style="top:0;position:absolute;">
</div>
<?php
   } else if ($stmt->rowCount() == 0) {
   ?>
<div class="progress-building col-12 py-2" style="font-weight:500;">
   nothing has been built yet
   <img src="assets/image/cancel.svg" width="5%" style="top:0;position:absolute;">
</div>
<?php
   } else {
   ?>
<div class="progress-building col-12 py-2" style="font-weight:500;">
   <?= $stmt->rowCount() ?> out of 3 types constructed
   <img src="assets/image/cycle.svg" width="5%" style="top:0;position:absolute;">
</div>
<?php
   }
   ?>
<div class="row row-cols-lg-3 row-cols-2 mb-2">
<!-- START OF 1 BUILDING TYPE CARD -->
<div class="col py-3">
<?php
   $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE username = ? AND c.id_city = ? AND d.name = ?";
   $stmt = $pdo->prepare($sql);
   $stmt->execute([$_SESSION['username'], $getCityIDrow['id'], 'Rumah Sakit']);
   
   if ($stmt->rowCount() == 0) {
   ?>
<div class="card-building-type p-3 not-obtained">
<div class="container item">
   <!-- div tambahan untuk bangunan yg blm dibangun -->
   <div class="tag-not-obtained">not constructed yet</div>
   <?php
      } else {
          ?>
   <div class="card-building-type p-3">
      <div class="container item">
         <?php
            }
                ?>
         <div class="row pt-3 justify-content-center">
            <h3>Rumah Sakit</h3>
         </div>
         <div class="row justify-content-center">
            <img src="assets/image/Rumah Sakit.png" width="50%">
         </div>
         <p><img src="assets/image/Bridge Coin.png" width="30px" style="margin-top:-4px;">350</p>
      </div>
   </div>
</div>
<!-- END OF 1 BUILDING TYPE CARD -->
<!-- START OF 1 BUILDING TYPE CARD -->
<div class="col py-3">
<?php
   $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE username = ? AND c.id_city = ? AND d.name = ?";
   $stmt = $pdo->prepare($sql);
   $stmt->execute([$_SESSION['username'], $getCityIDrow['id'], 'Mall']);
   
   if ($stmt->rowCount() == 0) {
   ?>
<div class="card-building-type p-3 not-obtained">
<div class="container item">
   <!-- div tambahan untuk bangunan yg blm dibangun -->
   <div class="tag-not-obtained">not constructed yet</div>
   <?php
      } else {
          ?>
   <div class="card-building-type p-3">
      <div class="container item">
         <?php
            }
                ?>
         <div class="row pt-3 justify-content-center">
            <h3>Mall</h3>
         </div>
         <div class="row justify-content-center">
            <img src="assets/image/Mall.png" width="83.4%">
         </div>
         <p><img src="assets/image/Bridge Coin.png" width="30px" style="margin-top:-4px;">325</p>
      </div>
   </div>
</div>
<!-- END OF 1 BUILDING TYPE CARD -->
<!-- START OF 1 BUILDING TYPE CARD -->
<div class="col py-3">
<?php
   $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE username = ? AND c.id_city = ? AND d.name = ?";
   $stmt = $pdo->prepare($sql);
   $stmt->execute([$_SESSION['username'], $getCityIDrow['id'], 'Taman']);
   
   if ($stmt->rowCount() == 0) {
   ?>
<div class="card-building-type p-3 not-obtained">
   <div class="container item">
      <!-- div tambahan untuk bangunan yg blm dibangun -->
      <div class="tag-not-obtained">not constructed yet</div>
      <?php
         } else {
             ?>
      <div class="card-building-type p-3">
         <div class="container item">
            <?php
               }
                   ?>
            <div class="row pt-3 justify-content-center">
               <h3>Taman</h3>
            </div>
            <div class="row justify-content-center">
               <img src="assets/image/Taman.png" width="50%">
            </div>
            <p><img src="assets/image/Bridge Coin.png" width="30px" style="margin-top:-4px;">200</p>
         </div>
      </div>
   </div>
   <!-- END OF 1 BUILDING TYPE CARD -->
</div>
<div class="total-points col-12 mb-4">
   <p>
      BUILD ALL TYPES OF PUBLIC PLACES TO GET
      <!-- logo poin -->
      <img src="assets/image/Bridge Coin.png" width="20px" style="margin-top:-4px;">275
      <?php
         $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE username = ? AND c.id_city = ? AND d.name IN ('Rumah Sakit', 'Mall', 'Taman')";
         $stmt = $pdo->prepare($sql);
         $stmt->execute([$_SESSION['username'], $getCityIDrow['id']]);
         if ($stmt->rowCount() == 3) {
         ?>
      <img src="assets/image/confirmed.svg" width="5%" style="top:-8px;position:absolute;">
      <?php
         }
         ?>
   </p>
   <!-- <p>total points:
      <img src="assets/image/Bridge Coin.png" width="20px">1125
      </p> -->
</div>
<!-- RESIDENCE -->
<div class="col-12 py-2">
   <hr data-content="Residence" class="hr-text">
</div>
<?php
   $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE username = ? AND c.id_city = ? AND d.name IN ('Perumahan', 'Apartemen', 'Hotel')";
   $stmt = $pdo->prepare($sql);
   $stmt->execute([$_SESSION['username'], $getCityIDrow['id']]);
   
   if ($stmt->rowCount() == 3) {
   ?>
<div class="progress-building col-12 py-2">
   completed
   <img src="assets/image/confirmed.svg" width="5%" style="top:0;position:absolute;">
</div>
<?php
   } else if ($stmt->rowCount() == 0) {
   ?>
<div class="progress-building col-12 py-2" style="font-weight:500;">
   nothing has been built yet
   <img src="assets/image/cancel.svg" width="5%" style="top:0;position:absolute;">
</div>
<?php
   } else {
   ?>
<div class="progress-building col-12 py-2" style="font-weight:500;">
   <?= $stmt->rowCount() ?> out of 3 types constructed
   <img src="assets/image/cycle.svg" width="5%" style="top:0;position:absolute;">
</div>
<?php
   }
   ?>
<div class="row row-cols-lg-3 row-cols-2 mb-2">
<!-- START OF 1 BUILDING TYPE CARD -->
<div class="col py-3">
<?php
   $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE username = ? AND c.id_city = ? AND d.name = ?";
   $stmt = $pdo->prepare($sql);
   $stmt->execute([$_SESSION['username'], $getCityIDrow['id'], 'Perumahan']);
   
   if ($stmt->rowCount() == 0) {
   ?>
<div class="card-building-type p-3 not-obtained">
<div class="container item">
   <!-- div tambahan untuk bangunan yg blm dibangun -->
   <div class="tag-not-obtained">not constructed yet</div>
   <?php
      } else {
          ?>
   <div class="card-building-type p-3">
      <div class="container item">
         <?php
            }
                ?>
         <div class="row pt-3 justify-content-center">
            <h3>Perumahan</h3>
         </div>
         <div class="row justify-content-center">
            <img src="assets/image/village.svg" width="50%">
         </div>
         <p><img src="assets/image/Bridge Coin.png" width="30px" style="margin-top:-4px;">200</p>
      </div>
   </div>
</div>
<!-- END OF 1 BUILDING TYPE CARD -->
<!-- START OF 1 BUILDING TYPE CARD -->
<div class="col py-3">
<?php
   $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE username = ? AND c.id_city = ? AND d.name = ?";
   $stmt = $pdo->prepare($sql);
   $stmt->execute([$_SESSION['username'], $getCityIDrow['id'], 'Apartemen']);
   
   if ($stmt->rowCount() == 0) {
   ?>
<div class="card-building-type p-3 not-obtained">
   <div class="container item">
      <!-- div tambahan untuk bangunan yg blm dibangun -->
      <div class="tag-not-obtained">not constructed yet</div>
      <?php
         } else {
             ?>
      <div class="card-building-type p-3">
         <div class="container item">
            <?php
               }
                   ?>
            <div class="row pt-3 justify-content-center">
               <h3>Apartemen</h3>
            </div>
            <div class="row justify-content-center">
               <img src="assets/image/Apartemen.png" width="35%">
            </div>
            <p><img src="assets/image/Bridge Coin.png" width="30px" style="margin-top:-4px;">400</p>
         </div>
      </div>
   </div>
   <!-- END OF 1 BUILDING TYPE CARD -->
   <!-- START OF 1 BUILDING TYPE CARD -->
   <div class="col py-3">
      <?php
         $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE username = ? AND c.id_city = ? AND d.name = ?";
         $stmt = $pdo->prepare($sql);
         $stmt->execute([$_SESSION['username'], $getCityIDrow['id'], 'Hotel']);
         
         if ($stmt->rowCount() == 0) {
         ?>
      <div class="card-building-type p-3 not-obtained">
         <div class="container item">
            <!-- div tambahan untuk bangunan yg blm dibangun -->
            <div class="tag-not-obtained">not constructed yet</div>
            <?php
               } else {
                   ?>
            <div class="card-building-type p-3">
               <div class="container item">
                  <?php
                     }
                         ?>
                  <div class="row pt-3 justify-content-center">
                     <h3>Hotel</h3>
                  </div>
                  <div class="row justify-content-center">
                     <img src="assets/image/family-house.svg" width="50%">
                  </div>
                  <p><img src="assets/image/Bridge Coin.png" width="30px" style="margin-top:-4px;">350</p>
               </div>
            </div>
         </div>
         <!-- END OF 1 BUILDING TYPE CARD -->
      </div>
      <div class="total-points col-12 mb-4">
         <p>
            BUILD ALL TYPES OF RESIDENCE TO GET
            <!-- logo poin -->
            <img src="assets/image/Bridge Coin.png" width="20px" style="margin-top:-4px;">350
            <?php
               $sql = "SELECT d.name FROM team a JOIN team_constructed_building c ON c.id_team = a.id JOIN building_type d ON d.id = c.id_building_type WHERE username = ? AND c.id_city = ? AND d.name IN ('Perumahan', 'Apartemen', 'Hotel')";
               $stmt = $pdo->prepare($sql);
               $stmt->execute([$_SESSION['username'], $getCityIDrow['id']]);
               if ($stmt->rowCount() == 3) {
               ?>
            <img src="assets/image/confirmed.svg" width="5%" style="top:-8px;position:absolute;">
            <?php
               }
               ?>
         </p>
         <!-- <p>total points:
            <img src="assets/image/Bridge Coin.png" width="20px">1125
            </p> -->
      </div>
   </div>
   <div class="footer my-5">
      &nbsp
   </div>
</div>
</body>
</html>