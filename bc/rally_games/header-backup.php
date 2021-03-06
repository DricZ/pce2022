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
    html {
        background-color: rgb(32, 31, 31);
        font-family: "Industry";
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
</style>

<body>
    <nav class="navbar fixed-bottom justify-content-center" role="navigation">
        <ul>
            <a class="nav-link active" id="menu" href="menu.php">
                <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 64px; width: 64px;">
                        <use xlink:href="#home"></use>
                        <g class="" transform="translate(0,0)" style="">
                            <path d="M256 19.27L25.637 249.638 19.27 256 32 268.73l6.363-6.367L256 44.727l217.637 217.636L480 268.73 492.73 256l-6.367-6.363zM96 48v107.273l64-64.002V48zm160 20.727l-192 192V486h64V320h96v166h224V260.727zM288 320h96v80h-96z"></path>
                        </g>
                    </svg></li>
                <li>Home</li>
            </a>
        </ul>
        <ul>
            <a class="nav-link active" id="menu" href="shop.php">
                <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 64px; width: 64px;">
                        <g class="" transform="translate(0,0)" style="">
                            <path d="M256.18 21c-23.242 0-46.577 3.01-63.186 8.54-8.304 2.763-14.868 6.196-18.808 9.558-3.94 3.36-5.167 5.956-5.186 8.96L168.943 57H41v14h430V57H342.967l.033-9.033c.01-3.002-1.17-5.55-5.057-8.895-3.887-3.344-10.407-6.773-18.677-9.535C302.724 24.014 279.42 21 256.18 21zM38.277 89l-10.443 94h80.9l20.243-86.36L122.81 183h81.07l17.114-86.68-3.096 86.68h75.75l-4.634-86.518L307.694 183h81.497l-6.167-86.36L403.266 183h80.9l-10.443-94H38.277zM25.834 201l-.51 4.588C39.822 226.445 52.968 235 64 235c11.32 0 24.852-8.89 39.8-30.96l.714-3.04h-78.68zm95.687 0l-.32 4.498C135.753 226.495 148.935 235 160 235c11.293 0 24.788-8.85 39.693-30.803l.63-3.197h-78.802zm95.736 0l-.156 4.352C231.69 226.455 244.908 235 256 235c11.08 0 24.28-8.525 38.85-29.576l-.237-4.424h-77.357zm94.324 0l.674 3.12c15 22.192 28.503 31.044 39.773 31.013 11.03-.03 24.212-8.62 38.772-29.637l-.32-4.496h-78.9zm95.906 0l.713 3.04C423.147 226.11 436.68 235 448 235c11.032 0 24.178-8.555 38.676-29.412l-.51-4.588h-78.68zM112 223.31C97.313 242.11 81.492 253 64 253c-13.972 0-26.884-6.906-39-19.264V487h318V279h114v208h30V233.736C474.884 246.094 461.972 253 448 253c-17.49 0-33.31-10.888-47.996-29.684-14.664 18.808-30.432 29.77-47.926 29.817-17.508.048-33.352-10.87-48.092-29.807C289.303 242.116 273.486 253 256 253c-17.492 0-33.313-10.89-48-29.69-14.687 18.8-30.508 29.69-48 29.69s-33.313-10.89-48-29.69zM55 279h258v178H55V279zm18 18v142h222V297H73zm288 0v71.064l78 .573V297h-78zM88 312h128c-108.235 8-116.31 24-128 113.11V312zm273 74.066v13.998l78 .573v-14.002l-78-.57zm0 32V487h78v-68.365l-78-.57z"></path>
                        </g>
                    </svg></li>
                <li>Shop</li>
            </a>
        </ul>
        <ul>
            <a class="nav-link active" id="menu" href="craft.php">
                <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 64px; width: 64px;">
                        <g class="" transform="translate(0,0)" style="">
                            <path d="M256.18 21c-23.242 0-46.577 3.01-63.186 8.54-8.304 2.763-14.868 6.196-18.808 9.558-3.94 3.36-5.167 5.956-5.186 8.96L168.943 57H41v14h430V57H342.967l.033-9.033c.01-3.002-1.17-5.55-5.057-8.895-3.887-3.344-10.407-6.773-18.677-9.535C302.724 24.014 279.42 21 256.18 21zM38.277 89l-10.443 94h80.9l20.243-86.36L122.81 183h81.07l17.114-86.68-3.096 86.68h75.75l-4.634-86.518L307.694 183h81.497l-6.167-86.36L403.266 183h80.9l-10.443-94H38.277zM25.834 201l-.51 4.588C39.822 226.445 52.968 235 64 235c11.32 0 24.852-8.89 39.8-30.96l.714-3.04h-78.68zm95.687 0l-.32 4.498C135.753 226.495 148.935 235 160 235c11.293 0 24.788-8.85 39.693-30.803l.63-3.197h-78.802zm95.736 0l-.156 4.352C231.69 226.455 244.908 235 256 235c11.08 0 24.28-8.525 38.85-29.576l-.237-4.424h-77.357zm94.324 0l.674 3.12c15 22.192 28.503 31.044 39.773 31.013 11.03-.03 24.212-8.62 38.772-29.637l-.32-4.496h-78.9zm95.906 0l.713 3.04C423.147 226.11 436.68 235 448 235c11.032 0 24.178-8.555 38.676-29.412l-.51-4.588h-78.68zM112 223.31C97.313 242.11 81.492 253 64 253c-13.972 0-26.884-6.906-39-19.264V487h318V279h114v208h30V233.736C474.884 246.094 461.972 253 448 253c-17.49 0-33.31-10.888-47.996-29.684-14.664 18.808-30.432 29.77-47.926 29.817-17.508.048-33.352-10.87-48.092-29.807C289.303 242.116 273.486 253 256 253c-17.492 0-33.313-10.89-48-29.69-14.687 18.8-30.508 29.69-48 29.69s-33.313-10.89-48-29.69zM55 279h258v178H55V279zm18 18v142h222V297H73zm288 0v71.064l78 .573V297h-78zM88 312h128c-108.235 8-116.31 24-128 113.11V312zm273 74.066v13.998l78 .573v-14.002l-78-.57zm0 32V487h78v-68.365l-78-.57z"></path>
                        </g>
                    </svg></li>
                <li>Craft</li>
            </a>
        </ul>
        <ul>
            <a class="nav-link active" id="menu" href="info.php">
                <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 64px; width: 64px;">
                        <g class="" transform="translate(0,0)" style="">
                            <path d="M443.535 120.186l-112 64 8.93 15.628 112-64-8.93-15.628zM297 153v206h17.973V153H297zm-18 9.367L73 235.072v41.856l206 72.705V162.367zM39 240v32h18v-32H39zm297 7v18h128v-18H336zM99.332 300.89l-14.8 40.215L181.02 379.7l16.11-40.364-16.716-6.672-9.434 23.635-63.51-25.405 8.755-23.786-16.893-6.22zm241.133 11.296l-8.93 15.628 112 64 8.93-15.628-112-64z"></path>
                        </g>
                    </svg></li>
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
                    <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 64px; width: 64px;">
                            <g class="" transform="translate(0,0)" style="">
                                <path d="M256 32A224 224 0 0 0 99.596 95.68l11.12-2.66 38.24-13.41 44.198-8.44 17.383 17.38 27.81-15.892 32.778.498 5.96 7.946 48.17-10.43 73.005 22.35-33.77 13.904 8.442 34.763-16.885 10.925-10.43-52.144-22.844 1.987-3.476 25.824-23.838 9.933 2.48 33.77-14.897 2.484-10.926-19.37-5.463 15.397 12.416 22.844-39.73 40.725-3.973 12.414 6.457 17.878s-15.892 23.343-18.375 22.846c-2.484-.495-44.698-37.743-44.698-37.743l-26.32 15.395-20.86-31.288-18.375 1.49-24.83 69.032-17.88 4.967-38.454-52.088A224 224 0 0 0 256 480a224 224 0 0 0 224-224A224 224 0 0 0 256 32zm75.217 112.67l9.93 15.394-14.897 22.348-2.484 15.893-7.946-4.967h1.49l4.47-42.213 9.437-6.455zm-18.873 56.117l11.422 1.49-.993 11.422-29.796 5.462-.995-7.945 20.362-10.43zm-39.233 26.818l14.9 4.47-2.483 21.355-17.382-12.416 4.966-13.41zm-9.434 45.69l2.482 18.87H245.3l-.993-13.407 19.37-5.463zm39.728 3.476l33.772 8.94 16.885 20.858-45.193-11.918-11.918 4.965-19.866-21.85 26.32-.994zM198.12 289.685l27.316 8.443 33.77 17.38s-20.86 4.47-23.84 3.477c-2.98-.993-43.702-19.37-43.702-19.37l6.457-9.93zm116.21 10.43l10.43 24.83 22.347 13.906-4.966 34.763-25.326 23.342-26.322-21.355-27.314 8.94-19.367 13.903L230.9 369.64s8.442-26.82 10.428-27.812l19.37-5.96 8.443-19.366 7.448 12.912 25.326-6.457 12.416-22.844zm86.91 49.66l4.965 2.484-10.926 15.396-3.475-8.94 9.435-8.94zm-11.422 19.867s6.456 4.47 4.47 5.96c-1.987 1.49-27.81 19.367-27.81 19.367l-10.927-5.463 23.343-17.38 10.925-2.483zm-82.44 32.28l12.415.498-10.428 9.932-1.988-10.43z"></path>
                            </g>
                        </svg></li>
                    <li>Map</li>
                    </a>
        </ul>
        <ul>
            <a class="nav-link active" id="menu" href="skill.php">
                <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 64px; width: 64px;">
                        <g class="" transform="translate(0,0)" style="">
                            <path d="M498.03 15.125l-87.06 34.72-164.5 164.5-34.657-32.095 31.156-28.844-223-133.594L176.155 164.5l-31.094 28.813 63.563 58.875-70.03 70.03c2.932 3.53 5.915 7.01 8.968 10.438l9.656 9.656 71.5-71.5 13.718 12.688-72 72 9.843 9.844c3.502 3.116 7.044 6.19 10.657 9.187l72-72 40.782 37.75-29 26.876 223 133.594-158.69-146.97 29-26.842-67.217-62.282 162.5-162.5 34.718-87.03zM430.69 68.813l13.218 13.218L280.28 245.657l-13.717-12.687L430.688 68.812zm-341 216.875L61.874 313.5 199.22 450.875l27.81-27.844c-56.283-34.674-103.014-81.617-137.343-137.342zm18.75 100.812l-81 81 17.75 17.75 81-81-17.75-17.75z"></path>
                        </g>
                    </svg></li>
                <li>Skill</li>
            </a>
        </ul>
        <ul>
            <a class="nav-link active" id="menu" href="inventory.php">
                <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 64px; width: 64px;">
                        <g class="" transform="translate(0,0)" style="">
                            <path d="M186.438 20.56l-13.184 26.365c6.8-.26 13.626-.488 20.47-.686l3.84-7.68h116.874l3.77 7.54c6.838.187 13.658.408 20.456.66l-13.102-26.2H186.437zm69.56 42.742c-45.757.056-91.452 1.566-135.38 4.363-3.24 50.58-8.4 100.987-.786 145.824 89.297 12.395 180.102 12.985 272.764-.054 7.055-30.988 5.117-84.68-1.04-145.89-43.974-2.893-89.73-4.3-135.558-4.244zm153.783 5.54c6.42 64.12 9.113 119.825-1.135 155.22l-1.61 5.56-5.726.842c-98.8 14.528-195.613 13.81-290.605.002l-6.285-.914-1.246-6.23c-9.89-49.49-4.085-102.785-.664-154.42-4.89.354-9.765.72-14.602 1.107-8.596 58.568-9.39 116.957-.05 175.292 110.24 12.088 222.275 12.205 336.203-.01 8.502-57.83 8.29-116.25-.017-175.313-4.725-.4-9.485-.776-14.262-1.14zM255.966 92.3c32.526-.025 65.067 2.746 97.574 8.39l7.46 1.295v7.572c0 15.554 1.683 35.105-12.69 50.25-9.912 10.444-25.655 17.337-51.31 20.585v18.164h-82v-18.452c-23.992-3.37-39.352-10.175-49.363-20.185C150.807 145.093 151 125.56 151 109.56v-7.594l7.484-1.278c32.444-5.54 64.955-8.362 97.48-8.386zm.012 17.994c-28.96.022-57.913 2.444-86.858 6.996.265 12.28 1.635 22.296 9.243 29.904 5.914 5.914 16.952 11.416 36.637 14.582v-29.22h82v29.51c21.367-3.115 32.66-8.755 38.254-14.65 7.033-7.41 7.696-17.502 7.73-30.124-29-4.63-58.006-7.02-87.007-6.998zM233 150.56v30h46v-30h-46zm209.674 92.42c-.503 3.625-1.042 7.25-1.61 10.87.214 2.352.42 4.706.63 7.06L471 290.213v-22.24l-28.326-24.995zm-373.485.12L41 267.973v22.24l29.318-29.318c.205-2.327.406-4.655.616-6.982-.618-3.605-1.202-7.21-1.745-10.813zm354.634 20.397c-10.29 1.09-20.564 2.076-30.824 2.967v74.095h16v66h-16v80.615c10.318-.633 20.63-1.313 30.928-2.082 9.445-74.01 6.478-147.698-.104-221.596zm-335.576.03C81.725 338.09 78.58 412.1 88.06 485.1c10.324.79 20.638 1.504 30.94 2.145V406.56h-16v-66h16v-74.024c-10.266-.902-20.517-1.903-30.752-3.01zm286.752 4.4c-10.014.76-20.014 1.424-30 1.992v70.64h30v-72.632zm-238 .085v72.547h30v-70.55c-10.015-.568-20.014-1.237-30-1.997zm190 2.825c-47.65 2.173-94.984 2.19-142 .078v19.314c23.95-5.165 47.8-7.652 71.516-7.59 23.638.06 47.145 2.654 70.484 7.626v-19.43zM68.05 288.62L41 315.67v56.89h23.06c.376-27.987 1.88-55.975 3.99-83.94zm375.948.047c2.12 27.872 3.61 55.83 3.957 83.892H471v-56.89l-27.002-27.003zm-187.52 11.95c-23.68-.063-47.487 2.577-71.478 8.052v31.89h16v18.443c17.033 5.346 31.73 8.493 46 9.426v-2.87h18v2.868c14.27-.932 28.967-4.08 46-9.425V340.56h16v-31.866c-23.42-5.267-46.907-8.016-70.523-8.078zM121 358.558v30h22v-23h18v23h22v-30h-62zm208 0v30h22v-23h18v23h22v-30h-62zM201 377.8v28.76h-16v15.857c48.528 10.865 95.713 10.664 142 .045V406.56h-16V377.8c-16.332 4.747-31.283 7.52-46 8.326v11.433h-18v-11.434c-14.717-.806-29.668-3.58-46-8.326zM41 390.56v14h23.14c-.09-4.667-.143-9.334-.163-14H41zm407.012 0c-.027 4.663-.083 9.33-.18 14H471v-14h-22.988zM137 406.56v19.798c6.137 7.214 11.222 9.77 14.934 9.844 3.734.075 8.697-2.122 15.066-9.79V406.56h-6v7h-18v-7h-6zm208 0v19.798c6.137 7.214 11.222 9.77 14.934 9.844 3.734.075 8.697-2.122 15.066-9.79V406.56h-6v7h-18v-7h-6zm-304 16v35.154c5.596 5.51 8.677 8.25 11.846 9.306 2.454.818 7.713 1.15 15.045 1.317-1.544-15.25-2.586-30.51-3.204-45.778H41zm406.27 0c-.628 15.224-1.674 30.483-3.21 45.78 7.358-.168 12.635-.5 15.094-1.32 3.17-1.056 6.25-3.795 11.846-9.306V422.56h-23.73zM185 440.842v49.498c47.55 1.51 94.877 1.446 142-.074V440.9c-46.316 10.03-93.74 10.185-142-.057zm-48 9.123v38.318c10.01.54 20.01 1.008 30 1.408v-39.678c-4.86 2.786-10.01 4.293-15.43 4.184-5.192-.104-10.036-1.624-14.57-4.232zm208 0v39.654c10.01-.403 20.01-.878 30-1.412v-38.194c-4.86 2.786-10.01 4.293-15.43 4.184-5.192-.104-10.036-1.624-14.57-4.232z"></path>
                        </g>
                    </svg></li>
                <li>Inventory</li>
            </a>
        </ul>

        <!-- <ul>
            <a class="nav-link active" id="menu" href="achievements.php">
                <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 64px; width: 64px;">
                        <g class="" transform="translate(0,0)" style="">
                            <path d="M305.975 298.814l22.704 2.383V486l-62.712-66.965V312.499l18.214 8.895zm-99.95 0l-22.716 2.383V486l62.711-66.965V312.499l-18.213 8.895zm171.98-115.78l7.347 25.574-22.055 14.87-1.847 26.571-25.81 6.425-10.803 24.314-26.46-2.795-18.475 19.087L256 285.403l-23.902 11.677-18.475-19.15-26.46 2.795-10.803-24.313-25.81-6.363-1.847-26.534-22.118-14.92 7.348-25.573-15.594-21.544 15.644-21.52-7.398-25.523 22.068-14.87L150.5 73.03l25.86-6.362 10.803-24.313 26.46 2.794L232.098 26 256 37.677 279.902 26l18.475 19.149 26.46-2.794 10.803 24.313 25.81 6.425 1.847 26.534 22.055 14.87-7.347 25.574 15.656 21.407zm-49.214-21.556a72.242 72.242 0 1 0-72.242 72.242 72.355 72.355 0 0 0 72.242-72.242zm-72.242-52.283a52.282 52.282 0 1 0 52.282 52.283 52.395 52.395 0 0 0-52.282-52.245z"></path>
                        </g>
                    </svg></li>
                <li>Achievements</li>
            </a>
        </ul> -->
        <ul>
            <a class="nav-link active" id="menu" href="history.php">
                <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 64px; width: 64px;">
                        <g class="" transform="translate(0,0)" style="">
                            <path d="M311.9 47.95c-17.6 0-34.6.7-50.7 2.43L244.6 93.5l-4.9-40.04c-2.5.46-5 .94-7.5 1.47-9.1 1.94-15.1 7.22-20.3 14.87-5.2 7.65-8.9 17.5-12.1 26.6C191 121.5 184 148 178.4 175c6 5.1 12 10.3 17.9 15.4l30.7-17.6 33.8 26.1 51.9-19.7 61 24.5-6.8 16.7-54.4-21.8-54.7 20.7-32.2-24.9-14.9 8.5c19.6 17.3 38.6 34.4 56.5 51.2l14-6.4 33.9 16.1 31.2-13.1 24.2 23.3-12.4 13-15.8-15.1-27.6 11.7-33-15.8c6.9 6.7 13.6 13.2 20.1 19.7l1.7 1.8 19.5 76.3-7.8-5.7-53 .4-38.1-17.8-42.4 14.6-5.8-17 49.2-17 41.1 19.2 24.7-.2-70.7-51.7c-19.7 4.6-39.4 2.8-58.1-3.7-4.2 44.4-5.9 85.7-7 118.7-.4 10.7 2.7 23 7.5 32.5 4.9 9.5 11.7 15.4 15 16.1 5.2 1.2 19 3.2 37.7 5.1l12.4-39 19.1 41.7c16.7 1.2 35 2 53.5 2.2 28.2.3 57.1-.9 82-4.7 15.8-2.3 29.6-6 40.7-10.4-11.8-5.1-21.6-10.6-29.1-16.6-11.1-8.9-18.2-19.3-17.3-30.9v.2c5.4-96.4 10.8-188.8 30.3-286l.1-.4.1-.4c5.3-17.9 17.9-39.86 36.1-55.83-13.9-2.06-28.6-4-43.7-5.66l-22.3 25.3-2.2-27.7c-19-1.64-38.4-2.71-57.4-2.92h-5.7zm148.5 20.44c-4.7 3.69-9.2 8.03-13.3 12.73 12.1 8.18 21.4 23.38 21.8 36.98.3 7.8-1.9 14.9-7.7 21.4-5.8 6.4-15.6 12.4-31.6 15.8l3.8 17.6c18.6-4 32.3-11.5 41.2-21.4 9-9.9 12.7-22.2 12.3-34-.6-19.3-11.1-37.59-26.5-49.11zM25.44 71.91c-.24 1.61-.38 3.43-.38 5.62.1 7.69 2.03 18.17 5.83 30.17 3.41 10.7 8.27 22.5 14.35 34.8 10.63-5.3 20.59-11 28.41-18.1-4.42 12.5-10.15 24.7-18.6 36.5 4.14 7.2 8.63 14.4 13.45 21.5 10.64-5.3 20.72-13 29.52-26.1-3.3 16-8.47 30.6-18.27 41.8 6.53 8.5 13.5 16.8 20.75 24.5 8.7-9.3 15.6-21 20.7-34.9 3.8 18.5 2.6 35.3-5.7 49.4 8 7.2 16.3 13.7 24.8 19.1 6.1-14 8.9-30.6 8.5-49.7 9.2 23.7 11.3 42.9 9.6 59.5 20.2 9.2 40.8 12 61.3 6.1l4.2-1.3 69.3 50.6-5.9-22.8c-73-72.8-175.4-156.7-261.86-226.69zM312.8 123.9l33.2 13.8 31.3-9.9 5.4 17.2-37.5 11.9-33.6-14-28.8 8.1-4.8-17.4zm107.3 236.2c-.7 0-1.3.1-2 .1-3.5.1-7.2.5-11.1 1.3l3.4 17.6c12.2-2.3 20-.4 24.5 2.5 4.4 2.9 6.3 6.8 6.4 12.5.1 9.3-7 23-23.3 32.5 5.4 2.9 11.9 5.9 19.3 8.7 14.4-11.6 22.1-26.8 22-41.4-.1-10.7-5.2-21.2-14.6-27.4-6.7-4.3-15-6.5-24.6-6.4z"></path>
                        </g>
                    </svg></li>
                <li>History</li>
            </a>
        </ul>
        <ul>
            <a class="nav-link active" id="menu" href="minigames.php">
                <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 64px; width: 64px;">
                        <g class="" transform="translate(0,0)" style="">
                            <path d="M155.084 125.945c-.46 0-.926.01-1.397.034-5.646.285-12.097 2.464-20.707 8.204-21.824 14.55-51.912 60.395-67.834 110.005-15.92 49.61-18.046 102.25 5.936 132.966 4.142 5.306 13.387 8.93 23.756 8.846 10.216-.084 20.682-3.838 26.482-9.44 1.022-1.47 9.296-13.336 21.39-27.404 12.863-14.96 28.716-31.686 45.835-38.777 41.863-17.34 93.024-17.34 134.887 0 17.118 7.092 32.97 23.818 45.834 38.778 12.095 14.068 20.37 25.933 21.39 27.404 5.8 5.602 16.267 9.356 26.483 9.44 10.368.085 19.612-3.54 23.755-8.846 23.973-30.704 21.885-83.575 5.978-133.287-15.907-49.713-46.054-95.526-67.783-109.624-11.498-7.46-19.198-8.73-26.285-7.64-7.088 1.093-14.347 5.197-22.866 11.07-17.038 11.746-38.898 30.02-73.952 30.02-35.212 0-57.115-18.514-74.13-30.356-8.505-5.92-15.73-10.025-22.743-11.078-1.315-.198-2.65-.312-4.03-.317zm212.904 48.75a16 16 0 0 1 16 16 16 16 0 0 1-16 16 16 16 0 0 1-16-16 16 16 0 0 1 16-16zM135 183h18v32h32v18h-32v32h-18v-32h-32v-18h32v-32zm200.988 23.695a16 16 0 0 1 16 16 16 16 0 0 1-16 16 16 16 0 0 1-16-16 16 16 0 0 1 16-16zm64 0a16 16 0 0 1 16 16 16 16 0 0 1-16 16 16 16 0 0 1-16-16 16 16 0 0 1 16-16zm-32 32a16 16 0 0 1 16 16 16 16 0 0 1-16 16 16 16 0 0 1-16-16 16 16 0 0 1 16-16zm-160 7h32v18h-32v-18zm64 0h27.897v18h-27.897v-18z" fill-opacity="1"></path>
                        </g>
                    </svg></li>
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
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 64px; width: 64px;">
                        <g class="" transform="translate(0,0)" style="">
                            <path d="M255.76 44.764c-6.176 0-12.353 1.384-17.137 4.152L85.87 137.276c-9.57 5.536-9.57 14.29 0 19.826l152.753 88.36c9.57 5.536 24.703 5.536 34.272 0l152.753-88.36c9.57-5.535 9.57-14.29 0-19.825l-152.753-88.36c-4.785-2.77-10.96-4.153-17.135-4.153zm-.824 53.11c9.013.097 17.117 2.162 24.31 6.192 4.92 2.758 8.143 5.903 9.666 9.438 1.473 3.507 1.56 8.13.26 13.865l-1.6 5.706c-1.06 4.083-1.28 7.02-.66 8.81.57 1.764 1.983 3.278 4.242 4.544l3.39 1.898-33.235 18.62-3.693-2.067c-4.118-2.306-6.744-4.912-7.883-7.82-1.188-2.935-.99-7.603.594-14.005l1.524-5.748c.887-3.423.973-6.23.26-8.418-.653-2.224-2.134-3.983-4.444-5.277-3.515-1.97-7.726-2.676-12.63-2.123-4.956.526-10.072 2.268-15.35 5.225-4.972 2.785-9.487 6.272-13.55 10.46-4.112 4.162-7.64 8.924-10.587 14.288L171.9 138.21c5.318-5.34 10.543-10.01 15.676-14.013 5.134-4 10.554-7.6 16.262-10.8 14.976-8.39 28.903-13.38 41.78-14.967 3.208-.404 6.315-.59 9.32-.557zm50.757 56.7l26.815 15.024-33.235 18.62-26.816-15.023 33.236-18.62zM75.67 173.84c-5.753-.155-9.664 4.336-9.664 12.28v157.696c0 11.052 7.57 24.163 17.14 29.69l146.93 84.848c9.57 5.526 17.14 1.156 17.14-9.895V290.76c0-11.052-7.57-24.16-17.14-29.688l-146.93-84.847c-2.69-1.555-5.225-2.327-7.476-2.387zm360.773.002c-2.25.06-4.783.83-7.474 2.385l-146.935 84.847c-9.57 5.527-17.14 18.638-17.14 29.69v157.7c0 11.05 7.57 15.418 17.14 9.89L428.97 373.51c9.57-5.527 17.137-18.636 17.137-29.688v-157.7c0-7.942-3.91-12.432-9.664-12.278zm-321.545 63.752c6.553 1.366 12.538 3.038 17.954 5.013 5.415 1.976 10.643 4.417 15.68 7.325 13.213 7.63 23.286 16.324 30.218 26.082 6.932 9.7 10.398 20.046 10.398 31.04 0 5.64-1.055 10.094-3.168 13.364-2.112 3.212-5.714 5.91-10.804 8.094l-5.2 1.92c-3.682 1.442-6.093 2.928-7.23 4.46-1.137 1.472-1.705 3.502-1.705 6.092v3.885l-29.325-16.933v-4.23c0-4.72.892-8.376 2.68-10.97 1.787-2.652 5.552-5.14 11.292-7.467l5.2-2.006c3.087-1.21 5.334-2.732 6.742-4.567 1.46-1.803 2.192-4.028 2.192-6.676 0-4.027-1.3-7.915-3.9-11.66-2.6-3.804-6.227-7.05-10.885-9.74-4.387-2.532-9.126-4.29-14.217-5.272-5.09-1.04-10.398-1.254-15.922-.645v-27.11zm269.54 8.607c1.522 0 2.932.165 4.232.493 6.932 1.696 10.398 8.04 10.398 19.034 0 5.64-1.056 11.314-3.168 17.023-2.112 5.65-5.714 12.507-10.804 20.568l-5.2 7.924c-3.682 5.695-6.093 9.963-7.23 12.807-1.137 2.785-1.705 5.473-1.705 8.063v3.885l-29.325 16.932v-4.23c0-4.72.894-9.41 2.68-14.067 1.79-4.715 5.552-11.55 11.292-20.504l5.2-8.01c3.087-4.776 5.334-8.894 6.742-12.354 1.46-3.492 2.192-6.562 2.192-9.21 0-4.028-1.3-6.414-3.898-7.158-2.6-.8-6.23.142-10.887 2.83-4.387 2.533-9.124 6.25-14.215 11.145-5.09 4.84-10.398 10.752-15.922 17.74v-27.11c6.553-6.2 12.536-11.44 17.95-15.718 5.417-4.278 10.645-7.87 15.68-10.777 10.738-6.2 19.4-9.302 25.99-9.307zm-252.723 94.515l29.326 16.93v30.736l-29.325-16.93v-30.735zm239.246 8.06v30.735l-29.325 16.93v-30.733l29.326-16.932z"></path>
                        </g>
                    </svg>
                </li>
                <li>Hidden Post</li>
            </a>
        </ul>
        <ul>
            <!-- exit -->
            <a class="nav-link active exit" id="menu" href="phps/signout.php">
                <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 64px; width: 64px;">
                        <g class="" transform="translate(0,0)" style="">
                            <path d="M217 28.098v455.804l142-42.597V70.697zm159.938 26.88l.062 2.327V87h16V55zM119 55v117.27h18V73h62V55zm258 50v16h16v-16zm0 34v236h16V139zm-240 58.727V233H41v46h96v35.273L195.273 256zM244 232c6.627 0 12 10.745 12 24s-5.373 24-12 24-12-10.745-12-24 5.373-24 12-24zM137 339.73h-18V448h18zM377 393v14h16v-14zm0 32v23h16v-23zM32 471v18h167v-18zm290.652 0l-60 18H480v-18z"></path>
                        </g>
                    </svg></li>
                <li>Sign Out</li>
            </a>
        </ul>
    </nav>

</body>