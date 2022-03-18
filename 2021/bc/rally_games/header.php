<?php
require_once 'phps/connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

define('TIMEZONE', 'Asia/Jakarta');
date_default_timezone_set(TIMEZONE);
$currTime = date("H:i");
$timestamp = strtotime(date("H:i"));

// if ($currTime >= '16:15') {
//     header("Location: thankyou.php");
//     exit();
// }

require_once 'phps/include.php';

// require_once 'assets/protection/ie.php';


$sqlTeam = "SELECT * FROM team WHERE username = ?";
$stmtTeam = $pdo->prepare($sqlTeam);
$stmtTeam->execute([$_SESSION['username']]);
$rowTeam = $stmtTeam->fetch();

if ($rowTeam['location_now_id_city'] != 0) {
    $getCityNamesql = "SELECT * FROM city WHERE id = ?";
    $getCityNamestmt = $pdo->prepare($getCityNamesql);
    $getCityNamestmt->execute([$rowTeam['location_now_id_city']]);
    $getCityNamerow = $getCityNamestmt->fetch();

    $_SESSION['kota'] = $getCityNamerow['city_name'];
}
?>

<style>
    .navbar{
        position: fixed !important;
    }
    html {
        /* background-color: rgb(32, 31, 31); */
        font-family: "Industry";
    }
    
    body{
        background-image: linear-gradient(rgba(0, 0, 0, 0.527),rgba(0, 0, 0, 0.5)) , url('./assets/Design Web/background web-01.png');
        background-size: 100vw 100vh;
        background-attachment: fixed;
    }

    ::-webkit-scrollbar {
        width: 12px;
    }

    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
    }

    nav li {
        text-decoration: none;
        list-style-type: none;
        font-size: 12pt;
    }

    nav ul {
        justify-content: center;
        text-align: center;
        display: contents;
    }

    li {
        color: white;
    }

    #menu:hover li {
        color: gray;
    }

    #menu {
        transition: 0.3s;
    }

    .exit:hover svg {
        fill: red !important;
    }

    #menu:hover {
        transform: scale(1.2);
        transition: 0.3s;
    }

    #menu:hover svg {
        fill: #30d1c9;
    }

    nav svg {
        fill: #fff;
    }

    nav {
        background-color: rgb(32, 31, 31, 0.2);
    }

    @media screen and (min-width:992px) and (max-width: 1200px) {
        nav svg {
            height: 60px !important;
            width: 60px !important;
        }

        nav li {
            font-size: 10pt !important;
        }
    }

    @media screen and (max-width: 992px) and (min-width: 768px) {
        nav svg {
            height: 56px !important;
            width: 56px !important;
        }
    }

    @media screen and (max-width: 768px) and (min-width: 576px) {
        nav svg {
            height: 48px !important;
            width: 48px !important;
        }

    }

    @media screen and (max-width: 576px) {
        nav svg {
            height: 40px !important;
            width: 40px !important;
        }

    }
    .icon-navBar {
            margin-top: 15px;
            width: 55px;
            cursor: pointer;
            transition: all 0.25s ease-in-out;
            text-align: center;
            font-size: small;
        }

    .icon-navBar:hover {
        transition: all 0.25s ease-in-out;
        filter: drop-shadow(0 0 10px white);
        width: 80px;
        font-size: large;
    }

</style>

<body>
    <nav class="navbar fixed-bottom justify-content-center" role="navigation">
        <ul>
            <a class="nav-link active" id="menu" href="menu.php">
                <li>
                    <img class="icon-navBar" src="assets/Design Web/rumah-01.png" alt="">
                </li>
                <li>HOME</li>
            </a>
        </ul>
        <ul>
            <a class="nav-link active" id="menu" href="shop.php">
                <li>
                    <img class="icon-navBar" src="assets/Design Web/pasar.png" alt="">
                </li>
                <li>Shop</li>
            </a>
        </ul>
        <ul>
            <a class="nav-link active" id="menu" href="craft.php">
                <li>
                    <img class="icon-navBar" src="assets/Design Web/crafting-01.png" alt="">
                </li>
                <li>Craft</li>
            </a>
        </ul>
        <ul>
            <a class="nav-link active" id="menu" href="info.php">
                <li>
                    <img class="icon-navBar" src="assets/Design Web/Info.png" alt="">
                </li>
                <li>Info</li>
            </a>
        </ul>
        <ul>
            <?php
            $checkLocationsql = "SELECT * FROM team WHERE username = ?";
            $checkLocationstmt = $pdo->prepare($checkLocationsql);
            $checkLocationstmt->execute([$_SESSION['username']]);
            $checkLocationrow = $checkLocationstmt->fetch();

            if ($checkLocationrow['location_now_id_city'] == 0) {
            ?>
                <a class="nav-link active" id="menu" href="map.php?stat=0">
            <?php
            } else {
            ?>
                <a class="nav-link active" id="menu" href="map.php">
            <?php
            }
            ?>
                    <li>
                        <img class="icon-navBar" src="assets/Design Web/Map-01.png" alt="">
                    </li>
                    <li>Map</li>
                </a>
        </ul>
        <ul>
            <a class="nav-link active" id="menu" href="skill.php">
                <li>
                    <img class="icon-navBar" src="assets/Design Web/treasure-01.png" alt="">
                </li>
                <li>Treasure</li>
            </a>
        </ul>
        <ul>
            <a class="nav-link active" id="menu" href="inventory.php">
                <li>
                    <img class="icon-navBar" src="assets/Design Web/tas.png" alt="">
                </li>
                <li>Inventory</li>
            </a>
        </ul>

        <!-- <ul>
            <a class="nav-link active" id="menu" href="achievements.php">
                <li>
                    <img class="icon-navBar" src="assets/Design Web/achievement.png" alt="">
                </li>
                <li>Achievements</li>
            </a>
        </ul> -->
        <ul>
            <a class="nav-link active" id="menu" href="history.php">
                <li>
                    <img class="icon-navBar" src="assets/Design Web/Info.png" alt="">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <g class="" transform="translate(0,0)" style="">
                            <path d="M311.9 47.95c-17.6 0-34.6.7-50.7 2.43L244.6 93.5l-4.9-40.04c-2.5.46-5 .94-7.5 1.47-9.1 1.94-15.1 7.22-20.3 14.87-5.2 7.65-8.9 17.5-12.1 26.6C191 121.5 184 148 178.4 175c6 5.1 12 10.3 17.9 15.4l30.7-17.6 33.8 26.1 51.9-19.7 61 24.5-6.8 16.7-54.4-21.8-54.7 20.7-32.2-24.9-14.9 8.5c19.6 17.3 38.6 34.4 56.5 51.2l14-6.4 33.9 16.1 31.2-13.1 24.2 23.3-12.4 13-15.8-15.1-27.6 11.7-33-15.8c6.9 6.7 13.6 13.2 20.1 19.7l1.7 1.8 19.5 76.3-7.8-5.7-53 .4-38.1-17.8-42.4 14.6-5.8-17 49.2-17 41.1 19.2 24.7-.2-70.7-51.7c-19.7 4.6-39.4 2.8-58.1-3.7-4.2 44.4-5.9 85.7-7 118.7-.4 10.7 2.7 23 7.5 32.5 4.9 9.5 11.7 15.4 15 16.1 5.2 1.2 19 3.2 37.7 5.1l12.4-39 19.1 41.7c16.7 1.2 35 2 53.5 2.2 28.2.3 57.1-.9 82-4.7 15.8-2.3 29.6-6 40.7-10.4-11.8-5.1-21.6-10.6-29.1-16.6-11.1-8.9-18.2-19.3-17.3-30.9v.2c5.4-96.4 10.8-188.8 30.3-286l.1-.4.1-.4c5.3-17.9 17.9-39.86 36.1-55.83-13.9-2.06-28.6-4-43.7-5.66l-22.3 25.3-2.2-27.7c-19-1.64-38.4-2.71-57.4-2.92h-5.7zm148.5 20.44c-4.7 3.69-9.2 8.03-13.3 12.73 12.1 8.18 21.4 23.38 21.8 36.98.3 7.8-1.9 14.9-7.7 21.4-5.8 6.4-15.6 12.4-31.6 15.8l3.8 17.6c18.6-4 32.3-11.5 41.2-21.4 9-9.9 12.7-22.2 12.3-34-.6-19.3-11.1-37.59-26.5-49.11zM25.44 71.91c-.24 1.61-.38 3.43-.38 5.62.1 7.69 2.03 18.17 5.83 30.17 3.41 10.7 8.27 22.5 14.35 34.8 10.63-5.3 20.59-11 28.41-18.1-4.42 12.5-10.15 24.7-18.6 36.5 4.14 7.2 8.63 14.4 13.45 21.5 10.64-5.3 20.72-13 29.52-26.1-3.3 16-8.47 30.6-18.27 41.8 6.53 8.5 13.5 16.8 20.75 24.5 8.7-9.3 15.6-21 20.7-34.9 3.8 18.5 2.6 35.3-5.7 49.4 8 7.2 16.3 13.7 24.8 19.1 6.1-14 8.9-30.6 8.5-49.7 9.2 23.7 11.3 42.9 9.6 59.5 20.2 9.2 40.8 12 61.3 6.1l4.2-1.3 69.3 50.6-5.9-22.8c-73-72.8-175.4-156.7-261.86-226.69zM312.8 123.9l33.2 13.8 31.3-9.9 5.4 17.2-37.5 11.9-33.6-14-28.8 8.1-4.8-17.4zm107.3 236.2c-.7 0-1.3.1-2 .1-3.5.1-7.2.5-11.1 1.3l3.4 17.6c12.2-2.3 20-.4 24.5 2.5 4.4 2.9 6.3 6.8 6.4 12.5.1 9.3-7 23-23.3 32.5 5.4 2.9 11.9 5.9 19.3 8.7 14.4-11.6 22.1-26.8 22-41.4-.1-10.7-5.2-21.2-14.6-27.4-6.7-4.3-15-6.5-24.6-6.4z"></path>
                        </g>
                    </svg> -->
                </li>
                <li>History</li>
            </a>
        </ul>
        <ul>
            <a class="nav-link active" id="menu" href="minigames.php">
                <li>
                    <img class="icon-navBar" src="assets/Design Web/mini games-01.png" alt="">
                </li>
                <li>Mini Games</li>
            </a>
        </ul>
        <ul>
            <a class="nav-link active" id="menu" href="hidden-post.php">
                <li>
                    <?php
                    //ISI DI SINI
                    $timestamp1 = strtotime('14:00');
                    $timestamp1End = $timestamp1 + (60 * 5);
                    $timestamp1End = strtotime(date("H:i", $timestamp1End));

                    $timestamp2 = strtotime('14.50');
                    $timestamp2End = $timestamp2 + (60 * 5);
                    $timestamp2End = strtotime(date("H:i", $timestamp2End));

                    $timestamp3 = strtotime('15:25');
                    $timestamp3End = $timestamp3 + (60 * 5);
                    $timestamp3End = strtotime(date("H:i", $timestamp3End));

                    $hiddenPost = false;
                    if ($timestamp >= $timestamp1 && $timestamp < $timestamp1End || $timestamp >= $timestamp2 && $timestamp < $timestamp2End || $timestamp >= $timestamp3 && $timestamp < $timestamp3End) {
                        $hiddenPost = true;
                    ?>
                        <!-- tag new for alert -->
                        <span class="badge badge-danger" style="position:fixed; transform:translateX(39px);">New</span>
                    <?php
                    }
                    ?>

                    <!-- svg logo menu hidden post -->

                    <img class="icon-navBar" src="assets/Design Web/Info.png" alt="">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <g class="" transform="translate(0,0)" style="">
                            <path d="M255.76 44.764c-6.176 0-12.353 1.384-17.137 4.152L85.87 137.276c-9.57 5.536-9.57 14.29 0 19.826l152.753 88.36c9.57 5.536 24.703 5.536 34.272 0l152.753-88.36c9.57-5.535 9.57-14.29 0-19.825l-152.753-88.36c-4.785-2.77-10.96-4.153-17.135-4.153zm-.824 53.11c9.013.097 17.117 2.162 24.31 6.192 4.92 2.758 8.143 5.903 9.666 9.438 1.473 3.507 1.56 8.13.26 13.865l-1.6 5.706c-1.06 4.083-1.28 7.02-.66 8.81.57 1.764 1.983 3.278 4.242 4.544l3.39 1.898-33.235 18.62-3.693-2.067c-4.118-2.306-6.744-4.912-7.883-7.82-1.188-2.935-.99-7.603.594-14.005l1.524-5.748c.887-3.423.973-6.23.26-8.418-.653-2.224-2.134-3.983-4.444-5.277-3.515-1.97-7.726-2.676-12.63-2.123-4.956.526-10.072 2.268-15.35 5.225-4.972 2.785-9.487 6.272-13.55 10.46-4.112 4.162-7.64 8.924-10.587 14.288L171.9 138.21c5.318-5.34 10.543-10.01 15.676-14.013 5.134-4 10.554-7.6 16.262-10.8 14.976-8.39 28.903-13.38 41.78-14.967 3.208-.404 6.315-.59 9.32-.557zm50.757 56.7l26.815 15.024-33.235 18.62-26.816-15.023 33.236-18.62zM75.67 173.84c-5.753-.155-9.664 4.336-9.664 12.28v157.696c0 11.052 7.57 24.163 17.14 29.69l146.93 84.848c9.57 5.526 17.14 1.156 17.14-9.895V290.76c0-11.052-7.57-24.16-17.14-29.688l-146.93-84.847c-2.69-1.555-5.225-2.327-7.476-2.387zm360.773.002c-2.25.06-4.783.83-7.474 2.385l-146.935 84.847c-9.57 5.527-17.14 18.638-17.14 29.69v157.7c0 11.05 7.57 15.418 17.14 9.89L428.97 373.51c9.57-5.527 17.137-18.636 17.137-29.688v-157.7c0-7.942-3.91-12.432-9.664-12.278zm-321.545 63.752c6.553 1.366 12.538 3.038 17.954 5.013 5.415 1.976 10.643 4.417 15.68 7.325 13.213 7.63 23.286 16.324 30.218 26.082 6.932 9.7 10.398 20.046 10.398 31.04 0 5.64-1.055 10.094-3.168 13.364-2.112 3.212-5.714 5.91-10.804 8.094l-5.2 1.92c-3.682 1.442-6.093 2.928-7.23 4.46-1.137 1.472-1.705 3.502-1.705 6.092v3.885l-29.325-16.933v-4.23c0-4.72.892-8.376 2.68-10.97 1.787-2.652 5.552-5.14 11.292-7.467l5.2-2.006c3.087-1.21 5.334-2.732 6.742-4.567 1.46-1.803 2.192-4.028 2.192-6.676 0-4.027-1.3-7.915-3.9-11.66-2.6-3.804-6.227-7.05-10.885-9.74-4.387-2.532-9.126-4.29-14.217-5.272-5.09-1.04-10.398-1.254-15.922-.645v-27.11zm269.54 8.607c1.522 0 2.932.165 4.232.493 6.932 1.696 10.398 8.04 10.398 19.034 0 5.64-1.056 11.314-3.168 17.023-2.112 5.65-5.714 12.507-10.804 20.568l-5.2 7.924c-3.682 5.695-6.093 9.963-7.23 12.807-1.137 2.785-1.705 5.473-1.705 8.063v3.885l-29.325 16.932v-4.23c0-4.72.894-9.41 2.68-14.067 1.79-4.715 5.552-11.55 11.292-20.504l5.2-8.01c3.087-4.776 5.334-8.894 6.742-12.354 1.46-3.492 2.192-6.562 2.192-9.21 0-4.028-1.3-6.414-3.898-7.158-2.6-.8-6.23.142-10.887 2.83-4.387 2.533-9.124 6.25-14.215 11.145-5.09 4.84-10.398 10.752-15.922 17.74v-27.11c6.553-6.2 12.536-11.44 17.95-15.718 5.417-4.278 10.645-7.87 15.68-10.777 10.738-6.2 19.4-9.302 25.99-9.307zm-252.723 94.515l29.326 16.93v30.736l-29.325-16.93v-30.735zm239.246 8.06v30.735l-29.325 16.93v-30.733l29.326-16.932z"></path>
                        </g>
                    </svg> -->
                </li>
                <li>Hidden Post</li>
            </a>
        </ul>
        <ul>
            <!-- exit -->
            <a class="nav-link active exit" id="menu" href="phps/signout.php">
                <li>
                    <img class="icon-navBar" src="assets/Design Web/log out-01.png" alt="">
                </li>
                <li>Sign Out</li>
            </a>
        </ul>
    </nav>

</body>