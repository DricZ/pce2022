<?php
require "connect.php";

//SHOUT OUT TO SPETRAKULER BOYS
function RandomString()
{
    $characters =
        '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 10; $i++) {
        $randchar = substr($characters, rand(0, strlen($characters)), 1);
        $randstring = $randstring . $randchar;
    }
    return $randstring;
}

$target_dir = "../uploads/";
$random_str = RandomString();
$allowed = array('png', 'jpg', 'jpeg');

define('TIMEZONE', 'Asia/Jakarta');
date_default_timezone_set(TIMEZONE);

if (isset($_POST)) {
    $tanggal_daftar = date("Y-m-d H:i:s");

    $country = $_POST['country'];
    $nama_sekolah = $_POST['nama_sekolah'];
    $alamat_sekolah = $_POST['alamat_sekolah'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $line = $_POST['line'];
    $email = $_POST['email'];
    $domisili = $_POST['domisili'];

    if (isset($_FILES['student_id']['name'])) {
        $student_id_name = basename($_FILES['student_id']['name']);
        $student_id_file_type = strtolower(pathinfo($student_id_name, PATHINFO_EXTENSION));
        $new_student_id_name = $nama . "_" . $nama_sekolah . "_student_id_" . $random_str . $tanggal_daftar . "." . $student_id_file_type;
        $target_file_student_id = $target_dir . "webinar_student_id/" . $new_student_id_name;

        if (in_array($student_id_file_type, $allowed)) {
            //file asli image
            //jika lebih besar dri 5 mb maka ditolak
            if ($_FILES["student_id"]["size"] > (1048576 * 5)) {
                header("Location: ../webinar_register.php?status=5");
                exit();
            }

            $upload = move_uploaded_file($_FILES["student_id"]["tmp_name"], $target_file_student_id);
            if ($upload) {
                // echo "Successfully Uploaded!";
            } else {
                // echo "Not Successfully Uploaded!";
                header("Location: ../webinar_register.php?status=6");
                exit();
            }
        } else {
            header("Location: ../webinar_register.php?status=7");
            exit();
        }
    }

    if ($country == 'Indonesian Student') {
        if (isset($_FILES['bukti_transfer']['name'])) {
            $bukti_transfer_name = basename($_FILES['bukti_transfer']['name']);
            $bukti_transfer_file_type = strtolower(pathinfo($bukti_transfer_name, PATHINFO_EXTENSION));
            $new_bukti_transfer_name = $nama . "_" . $nama_sekolah . "_bukti_transfer" . $random_str . $tanggal_daftar . "." . $bukti_transfer_file_type;
            $target_file_bukti_transfer = $target_dir . "webinar_bukti_transfer/" . $new_bukti_transfer_name;

            if (in_array($bukti_transfer_file_type, $allowed)) {
                //file asli image
                //jika lebih besar dri 5 mb maka ditolak
                if ($_FILES["bukti_transfer"]["size"] > (1048576 * 5)) {
                    header("Location: ../webinar_register.php?status=5");
                    exit();
                }

                $upload = move_uploaded_file($_FILES["bukti_transfer"]["tmp_name"], $target_file_bukti_transfer);
                if ($upload) {
                    // echo "Successfully Uploaded!";
                } else {
                    // echo "Not Successfully Uploaded!";
                    header("Location: ../webinar_register.php?status=6");
                    exit();
                }
            } else {
                header("Location: ../webinar_register.php?status=7");
                exit();
            }
        }

        $norek_pentransfer = $_POST['norek_pentransfer'];
        $nama_pentransfer = $_POST['nama_pentransfer'];
    } else if ($country == 'International Student') {
        $new_bukti_transfer_name = '';
        $nama_pentransfer = '';
        $norek_pentransfer = '';
    }

    function get_ip_detail($ip)
    {
        $ip_response = file_get_contents('http://ip-api.com/json/' . $ip);
        $ip_array = json_decode($ip_response);
        return  $ip_array;
    }

    $user_ip = $_SERVER['REMOTE_ADDR'];
    $ip_array = get_ip_detail($user_ip);
    $country_name = $ip_array->country;
    $city = $ip_array->city;
    $city_and_country = $city . ", " . $country_name;

    $sql = "INSERT INTO `webinar` (`id`, `country`, `nama_sekolah`, `alamat_sekolah`, `nama`, `no_hp`, `line`, `email`, `domisili`, `student_id`, `bukti_transfer`, `nama_pentransfer`, `norek_pentransfer`, `status`, `confirmed_by`, `submitted_on`, `city_and_country`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([NULL, $country, $nama_sekolah, $alamat_sekolah, $nama, $no_hp, $line, $email, $domisili, $new_student_id_name, $new_bukti_transfer_name, $nama_pentransfer, $norek_pentransfer, 0, '', $tanggal_daftar, $city_and_country]);

    header("Location: ../index.php?status=2");
    exit();
} else {
    header("Location: ../webinar_register.php?status=0");
    exit();
}
?>