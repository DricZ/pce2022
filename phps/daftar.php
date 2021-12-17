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

    if (isset($_POST)) {
        $tanggal_daftar = date("Y-m-d");

        $jenjang_pendidikan = $_POST['jenjang_pendidikan'];
        $nama_sekolah = $_POST['nama_sekolah'];
        $alamat_sekolah = $_POST['alamat_sekolah'];

        $nama_kelompok = $_POST['nama_kelompok'];
        $jumlah_anggota = $_POST['jumlah_anggota'];

        $kode_bc_sma_satuan = 'S00';
        $kode_bc_sma_puluhan = 'S0';
        $kode_bc_sma_ratusan = 'S';
        $kode_bc_univ_satuan = 'B00';
        $kode_bc_univ_puluhan = 'B0';
        $kode_bc_univ_ratusan = 'B';

        $kode_erdc_satuan = 'E00';
        $kode_erdc_puluhan = 'E0';
        $kode_erdc_ratusan = 'E';

        $kode_lktb_satuan = 'L00';
        $kode_lktb_puluhan = 'L0';
        $kode_lktb_ratusan = 'L';

        if (isset($_POST['pilihan_lomba_1']) || $jenjang_pendidikan == 'Senior High School') {
            $maxbcsql = "SELECT COUNT(*) + 1 as x FROM `pendaftar` WHERE pilihan_lomba_1 != '' AND jenjang_pendidikan = ?";
            $maxbcstmt = $pdo->prepare($maxbcsql);
            $maxbcstmt->execute(['Senior High School']);
            $maxbcsma = $maxbcstmt->fetch();
            if ($jenjang_pendidikan == 'Senior High School') {
                $pilihan_lomba_1 = 'bc-sma';
            } else {
                $pilihan_lomba_1 = 'bc-univ';
            }
            if ($jenjang_pendidikan == 'Senior High School') {
                if ($maxbcsma['x'] < 10) {
                    $bc_sma_1 = $kode_bc_sma_satuan . $maxbcsma['x'] . "001";
                    if ($_POST['nama_peserta_2'] != '') {
                        $bc_sma_2 = $kode_bc_sma_satuan . $maxbcsma['x'] . "002";
                    } else {
                        $bc_sma_2 = '';
                    }
                    if ($_POST['nama_peserta_3'] != '') {
                        $bc_sma_3 = $kode_bc_sma_satuan . $maxbcsma['x'] . "003";
                    } else {
                        $bc_sma_3 = '';
                    }
                } else if ($maxbcsma['x'] < 100 && $maxbcsma['x'] >= 10) {
                    $bc_sma_1 = $kode_bc_sma_puluhan . $maxbcsma['x'] . "001";
                    if ($_POST['nama_peserta_2'] != '') {
                        $bc_sma_2 = $kode_bc_sma_puluhan . $maxbcsma['x'] . "002";
                    } else {
                        $bc_sma_2 = '';
                    }
                    if ($_POST['nama_peserta_3'] != '') {
                        $bc_sma_3 = $kode_bc_sma_puluhan . $maxbcsma['x'] . "003";
                    } else {
                        $bc_sma_3 = '';
                    }
                } else if ($maxbcsma['x'] < 1000 && $maxbcsma['x'] >= 100) {
                    $bc_sma_1 = $kode_bc_sma_ratusan . $maxbcsma['x'] . "001";
                    if ($_POST['nama_peserta_2'] != '') {
                        $bc_sma_2 = $kode_bc_sma_ratusan . $maxbcsma['x'] . "002";
                    } else {
                        $bc_sma_2 = '';
                    }
                    if ($_POST['nama_peserta_3'] != '') {
                        $bc_sma_3 = $kode_bc_sma_ratusan . $maxbcsma['x'] . "003";
                    } else {
                        $bc_sma_3 = '';
                    }
                }
                $bc_univ_1 = '';
                $bc_univ_2 = '';
                $bc_univ_3 = '';
            } else if ($jenjang_pendidikan == 'College') {
                $maxbcsql = "SELECT COUNT(*) + 1 as x FROM `pendaftar` WHERE pilihan_lomba_1 != '' AND jenjang_pendidikan = ?";
                $maxbcstmt = $pdo->prepare($maxbcsql);
                $maxbcstmt->execute(['College']);
                $maxbcuniv = $maxbcstmt->fetch();
                if ($maxbcuniv['x'] < 10) {
                    $bc_univ_1 = $kode_bc_univ_satuan . $maxbcuniv['x'] . "001";
                    if ($_POST['nama_peserta_2'] != '') {
                        $bc_univ_2 = $kode_bc_univ_satuan . $maxbcuniv['x'] . "002";
                    } else {
                        $bc_univ_2 = '';
                    }
                    if ($_POST['nama_peserta_3'] != '') {
                        $bc_univ_3 = $kode_bc_univ_satuan . $maxbcuniv['x'] . "003";
                    } else {
                        $bc_univ_3 = '';
                    }
                } else if ($maxbcuniv['x'] < 100 && $maxbcuniv['x'] >= 10) {
                    $bc_univ_1 = $kode_bc_univ_puluhan . $maxbcuniv['x'] . "001";
                    if ($_POST['nama_peserta_2'] != '') {
                        $bc_univ_2 = $kode_bc_univ_puluhan . $maxbcuniv['x'] . "002";
                    } else {
                        $bc_univ_2 = '';
                    }
                    if ($_POST['nama_peserta_3'] != '') {
                        $bc_univ_3 = $kode_bc_univ_puluhan . $maxbcuniv['x'] . "003";
                    } else {
                        $bc_univ_3 = '';
                    }
                } else if ($maxbcuniv['x'] < 1000 && $maxbcuniv['x'] >= 100) {
                    $bc_univ_1 = $kode_bc_univ_ratusan . $maxbcuniv['x'] . "001";
                    if ($_POST['nama_peserta_2'] != '') {
                        $bc_univ_2 = $kode_bc_univ_ratusan . $maxbcuniv['x'] . "002";
                    } else {
                        $bc_univ_2 = '';
                    }
                    if ($_POST['nama_peserta_3'] != '') {
                        $bc_univ_3 = $kode_bc_univ_ratusan . $maxbcuniv['x'] . "003";
                    } else {
                        $bc_univ_3 = '';
                    }
                }
                $bc_sma_1 = '';
                $bc_sma_2 = '';
                $bc_sma_3 = '';
            }
        } else {
            $pilihan_lomba_1 = '';
            $bc_sma_1 = '';
            $bc_univ_1 = '';
            $bc_sma_2 = '';
            $bc_univ_2 = '';
            $bc_sma_3 = '';
            $bc_univ_3 = '';
            $new_bukti_transfer_bc_name = '';
        }

        if (isset($_POST['pilihan_lomba_2'])) {
            $maxerdcsql = "SELECT COUNT(*) + 1 as x FROM `pendaftar` WHERE pilihan_lomba_2 != ''";
            $maxerdcstmt = $pdo->prepare($maxerdcsql);
            $maxerdcstmt->execute();
            $maxerdc = $maxerdcstmt->fetch();
            $pilihan_lomba_2 = $_POST['pilihan_lomba_2'];
            if ($maxerdc['x'] < 10) {
                $erdc_1 = $kode_erdc_satuan . $maxerdc['x'] . "001";
                if ($_POST['nama_peserta_2'] != '') {
                    $erdc_2 = $kode_erdc_satuan . $maxerdc['x'] . "002";
                } else {
                    $erdc_2 = '';
                }
                if ($_POST['nama_peserta_3'] != '') {
                    $erdc_3 = $kode_erdc_satuan . $maxerdc['x'] . "003";
                } else {
                    $erdc_3 = '';
                }
            } else if ($maxerdc['x'] < 100 && $maxerdc['x'] >= 10) {
                $erdc_1 = $kode_erdc_puluhan . $maxerdc['x'] . "001";
                if ($_POST['nama_peserta_2'] != '') {
                    $erdc_2 = $kode_erdc_puluhan . $maxerdc['x'] . "002";
                } else {
                    $erdc_2 = '';
                }
                if ($_POST['nama_peserta_3'] != '') {
                    $erdc_3 = $kode_erdc_puluhan . $maxerdc['x'] . "003";
                } else {
                    $erdc_3 = '';
                }
            } else if ($maxerdc['x'] < 1000 && $maxerdc['x'] >= 100) {
                $erdc_1 = $kode_erdc_ratusan . $maxerdc['x'] . "001";
                if ($_POST['nama_peserta_2'] != '') {
                    $erdc_2 = $kode_erdc_ratusan . $maxerdc['x'] . "002";
                } else {
                    $erdc_2 = '';
                }
                if ($_POST['nama_peserta_3'] != '') {
                    $erdc_3 = $kode_erdc_ratusan . $maxerdc['x'] . "003";
                } else {
                    $erdc_3 = '';
                }
            }
        } else {
            $pilihan_lomba_2 = '';
            $erdc_1 = '';
            $erdc_2 = '';
            $erdc_3 = '';
            $new_bukti_transfer_erdc_name = '';
        }

        if (isset($_POST['pilihan_lomba_3'])) {
            $maxlktbsql = "SELECT COUNT(*) + 1 as x FROM `pendaftar` WHERE pilihan_lomba_3 != ''";
            $maxlktbstmt = $pdo->prepare($maxlktbsql);
            $maxlktbstmt->execute();
            $maxlktb = $maxlktbstmt->fetch();
            $pilihan_lomba_3 = $_POST['pilihan_lomba_3'];
            if ($maxlktb['x'] < 10) {
                $lktb_1 = $kode_lktb_satuan . $maxlktb['x'] . "001";
                if ($_POST['nama_peserta_2'] != '') {
                    $lktb_2 = $kode_lktb_satuan . $maxlktb['x'] . "002";
                } else {
                    $lktb_2 = '';
                }
                if ($_POST['nama_peserta_3'] != '') {
                    $lktb_3 = $kode_lktb_satuan . $maxlktb['x'] . "003";
                } else {
                    $lktb_3 = '';
                }
            } else if ($maxlktb['x'] < 100 && $maxlktb['x'] >= 10) {
                $lktb_1 = $kode_lktb_puluhan . $maxlktb['x'] . "001";
                if ($_POST['nama_peserta_2'] != '') {
                    $lktb_2 = $kode_lktb_puluhan . $maxlktb['x'] . "002";
                } else {
                    $lktb_2 = '';
                }
                if ($_POST['nama_peserta_3'] != '') {
                    $lktb_3 = $kode_lktb_puluhan . $maxlktb['x'] . "003";
                } else {
                    $lktb_3 = '';
                }
            } else if ($maxlktb['x'] < 1000 && $maxlktb['x'] >= 100) {
                $lktb_1 = $kode_lktb_ratusan . $maxlktb['x'] . "001";
                if ($_POST['nama_peserta_2'] != '') {
                    $lktb_2 = $kode_lktb_ratusan . $maxlktb['x'] . "002";
                } else {
                    $lktb_2 = '';
                }
                if ($_POST['nama_peserta_3'] != '') {
                    $lktb_3 = $kode_lktb_ratusan . $maxlktb['x'] . "003";
                } else {
                    $lktb_3 = '';
                }
            }
        } else {
            $pilihan_lomba_3 = '';
            $lktb_1 = '';
            $lktb_2 = '';
            $lktb_3 = '';
            $new_bukti_transfer_lktb_name = '';
        }

        $nama_peserta_1 = $_POST['nama_peserta_1'];
        $hp_peserta_1 = $_POST['hp_peserta_1'];
        $line_peserta_1 = $_POST['line_peserta_1'];
        $email_peserta_1 = $_POST['email_peserta_1'];
        if (isset($_POST['jurusan_peserta_1'])) {
            $jurusan_peserta_1 = $_POST['jurusan_peserta_1'];
        } else {
            $jurusan_peserta_1 = '';
        }
        $domisili_peserta_1 = $_POST['domisili_peserta_1'];

        if (isset($_FILES['3x4_peserta_1']['name'])) {
            $foto_peserta_1_name = basename($_FILES['3x4_peserta_1']['name']);
            $foto_peserta_1_file_type = strtolower(pathinfo($foto_peserta_1_name, PATHINFO_EXTENSION));
            $new_foto_peserta_1_name = $nama_kelompok . "_" . $nama_peserta_1 . "_3x4_" . $random_str . $tanggal_daftar . "." . $foto_peserta_1_file_type;
            $target_file_foto_peserta_1 = $target_dir . "3x4/" . $new_foto_peserta_1_name;

            if (in_array($foto_peserta_1_file_type, $allowed)) {
                //file asli image
                //jika lebih besar dri 5 mb maka ditolak
                if ($_FILES["3x4_peserta_1"]["size"] > (1048576 * 5)) {
                    header("Location: ../form_daftar.php?status=5");
                    exit();
                }

                $upload = move_uploaded_file($_FILES["3x4_peserta_1"]["tmp_name"], $target_file_foto_peserta_1);
                if ($upload) {
                    // echo "Successfully Uploaded!";
                } else {
                    // echo "Not Successfully Uploaded!";
                    header("Location: ../form_daftar.php?status=6");
                    exit();
                }
            }
        }
        else {
            header("Location: ../form_pendaftar.php");
            exit();
        }

        if (isset($_FILES['kartu_peserta_1']['name'])) {
            $kartu_peserta_1_name = basename($_FILES['kartu_peserta_1']['name']);
            $kartu_peserta_1_file_type = strtolower(pathinfo($kartu_peserta_1_name, PATHINFO_EXTENSION));
            $new_kartu_peserta_1_name = $nama_kelompok . "_" . $nama_peserta_1 . "_student_id_" . $random_str . $tanggal_daftar . "." . $kartu_peserta_1_file_type;
            $target_file_kartu_peserta_1 = $target_dir . "student_id/" . $new_kartu_peserta_1_name;

            if (in_array($kartu_peserta_1_file_type, $allowed)) {
                //file asli image
                //jika lebih besar dri 5 mb maka ditolak
                if ($_FILES["kartu_peserta_1"]["size"] > (1048576 * 5)) {
                    header("Location: ../form_daftar.php?status=5");
                    exit();
                }

                $upload = move_uploaded_file($_FILES["kartu_peserta_1"]["tmp_name"], $target_file_kartu_peserta_1);
                if ($upload) {
                    // echo "Successfully Uploaded!";
                } else {
                    // echo "Not Successfully Uploaded!";
                    header("Location: ../form_daftar.php?status=6");
                    exit();
                }
            } else {
                header("Location: ../form_daftar.php?status=7");
                exit();
            }
        }

        $nama_peserta_2 = $_POST['nama_peserta_2'];
        $hp_peserta_2 = $_POST['hp_peserta_2'];
        $line_peserta_2 = $_POST['line_peserta_2'];
        $email_peserta_2 = $_POST['email_peserta_2'];
        if (isset($_POST['jurusan_peserta_2'])) {
            $jurusan_peserta_2 = $_POST['jurusan_peserta_2'];
        } else {
            $jurusan_peserta_2 = '';
        }
        $domisili_peserta_2 = $_POST['domisili_peserta_2'];

        if (intval($jumlah_anggota) >= 2) {
            if (isset($_FILES['3x4_peserta_2']['name'])) {
                $foto_peserta_2_name = basename($_FILES['3x4_peserta_2']['name']);
                $foto_peserta_2_file_type = strtolower(pathinfo($foto_peserta_2_name, PATHINFO_EXTENSION));
                $new_foto_peserta_2_name = $nama_kelompok . "_" . $nama_peserta_2 . "_3x4_" . $random_str . $tanggal_daftar . "." . $foto_peserta_2_file_type;
                $target_file_foto_peserta_2 = $target_dir . "3x4/" . $new_foto_peserta_2_name;

                if (in_array($foto_peserta_2_file_type, $allowed)) {
                    //file asli image
                    //jika lebih besar dri 5 mb maka ditolak
                    if ($_FILES["3x4_peserta_2"]["size"] > (1048576 * 5)) {
                        header("Location: ../form_daftar.php?status=5");
                        exit();
                    }

                    $upload = move_uploaded_file($_FILES["3x4_peserta_2"]["tmp_name"], $target_file_foto_peserta_2);
                    if ($upload) {
                        // echo "Successfully Uploaded!";
                    } else {
                        // echo "Not Successfully Uploaded!";
                        header("Location: ../form_daftar.php?status=6");
                        exit();
                    }
                } else {
                    header("Location: ../form_daftar.php?status=7");
                    exit();
                }
            }

            if (isset($_FILES['kartu_peserta_2']['name'])) {
                $kartu_peserta_2_name = basename($_FILES['kartu_peserta_2']['name']);
                $kartu_peserta_2_file_type = strtolower(pathinfo($kartu_peserta_2_name, PATHINFO_EXTENSION));
                $new_kartu_peserta_2_name = $nama_kelompok . "_" . $nama_peserta_2 . "_student_id_" . $random_str . $tanggal_daftar . "." . $kartu_peserta_2_file_type;
                $target_file_kartu_peserta_2 = $target_dir . "student_id/" . $new_kartu_peserta_2_name;

                if (in_array($kartu_peserta_2_file_type, $allowed)) {
                    //file asli image
                    //jika lebih besar dri 5 mb maka ditolak
                    if ($_FILES["kartu_peserta_2"]["size"] > (1048576 * 5)) {
                        header("Location: ../form_daftar.php?status=5");
                        exit();
                    }

                    $upload = move_uploaded_file($_FILES["kartu_peserta_2"]["tmp_name"], $target_file_kartu_peserta_2);
                    if ($upload) {
                        // echo "Successfully Uploaded!";
                    } else {
                        // echo "Not Successfully Uploaded!";
                        header("Location: ../form_daftar.php?status=6");
                        exit();
                    }
                } else {
                    header("Location: ../form_daftar.php?status=7");
                    exit();
                }
            }
        }

        $nama_peserta_3 = $_POST['nama_peserta_3'];
        $hp_peserta_3 = $_POST['hp_peserta_3'];
        $line_peserta_3 = $_POST['line_peserta_3'];
        $email_peserta_3 = $_POST['email_peserta_3'];
        if (isset($_POST['jurusan_peserta_3'])) {
            $jurusan_peserta_3 = $_POST['jurusan_peserta_3'];
        } else {
            $jurusan_peserta_3 = '';
        }
        $domisili_peserta_3 = $_POST['domisili_peserta_3'];

        if (intval($jumlah_anggota) >= 3) {
            if (isset($_FILES['3x4_peserta_3']['name'])) {
                $foto_peserta_3_name = basename($_FILES['3x4_peserta_3']['name']);
                $foto_peserta_3_file_type = strtolower(pathinfo($foto_peserta_3_name, PATHINFO_EXTENSION));
                $new_foto_peserta_3_name = $nama_kelompok . "_" . $nama_peserta_3 . "_3x4_" . $random_str . $tanggal_daftar . "." . $foto_peserta_3_file_type;
                $target_file_foto_peserta_3 = $target_dir . "3x4/" . $new_foto_peserta_3_name;

                if (in_array($foto_peserta_3_file_type, $allowed)) {
                    //file asli image
                    //jika lebih besar dri 5 mb maka ditolak
                    if ($_FILES["3x4_peserta_3"]["size"] > (1048576 * 5)) {
                        header("Location: ../form_daftar.php?status=5");
                        exit();
                    }

                    $upload = move_uploaded_file($_FILES["3x4_peserta_3"]["tmp_name"], $target_file_foto_peserta_3);
                    if ($upload) {
                        // echo "Successfully Uploaded!";
                    } else {
                        // echo "Not Successfully Uploaded!";
                        header("Location: ../form_daftar.php?status=6");
                        exit();
                    }
                } else {
                    header("Location: ../form_daftar.php?status=7");
                    exit();
                }
            }

            if (isset($_FILES['kartu_peserta_3']['name'])) {
                $kartu_peserta_3_name = basename($_FILES['kartu_peserta_3']['name']);
                $kartu_peserta_3_file_type = strtolower(pathinfo($kartu_peserta_3_name, PATHINFO_EXTENSION));
                $new_kartu_peserta_3_name = $nama_kelompok . "_" . $nama_peserta_3 . "_student_id_" . $random_str . $tanggal_daftar . "." . $kartu_peserta_3_file_type;
                $target_file_kartu_peserta_3 = $target_dir . "student_id/" . $new_kartu_peserta_3_name;

                if (in_array($kartu_peserta_3_file_type, $allowed)) {
                    //file asli image
                    //jika lebih besar dri 5 mb maka ditolak
                    if ($_FILES["kartu_peserta_3"]["size"] > (1048576 * 5)) {
                        header("Location: ../form_daftar.php?status=5");
                        exit();
                    }

                    $upload = move_uploaded_file($_FILES["kartu_peserta_3"]["tmp_name"], $target_file_kartu_peserta_3);
                    if ($upload) {
                        // echo "Successfully Uploaded!";
                    } else {
                        // echo "Not Successfully Uploaded!";
                        header("Location: ../form_daftar.php?status=6");
                        exit();
                    }
                } else {
                    header("Location: ../form_daftar.php?status=7");
                    exit();
                }
            }
        }

        if ($pilihan_lomba_1 != '') {
            if (isset($_FILES['bukti_transfer_bc']['name'])) {
                $bukti_transfer_bc_name = basename($_FILES['bukti_transfer_bc']['name']);
                $bukti_transfer_bc_file_type = strtolower(pathinfo($bukti_transfer_bc_name, PATHINFO_EXTENSION));
                $new_bukti_transfer_bc_name = str_replace("'", "", $nama_kelompok) . "_bukti_transfer_bc_" . $random_str . $tanggal_daftar . "." . $bukti_transfer_bc_file_type;
                $target_file_bukti_transfer_bc = $target_dir . "bukti_transfer_bc/" . $new_bukti_transfer_bc_name;

                if (in_array($bukti_transfer_bc_file_type, $allowed)) {
                    //file asli image
                    //jika lebih besar dri 5 mb maka ditolak
                    if ($_FILES["bukti_transfer_bc"]["size"] > (1048576 * 5)) {
                        header("Location: ../form_daftar.php?status=5");
                        exit();
                    }

                    $upload = move_uploaded_file($_FILES["bukti_transfer_bc"]["tmp_name"], $target_file_bukti_transfer_bc);
                    if ($upload) {
                        // echo "Successfully Uploaded!";
                    } else {
                        // echo "Not Successfully Uploaded!";
                        header("Location: ../form_daftar.php?status=6");
                        exit();
                    }
                } else {
                    header("Location: ../form_daftar.php?status=7");
                    exit();
                }
            }
        }

        if ($pilihan_lomba_2 != '') {
            if (isset($_FILES['bukti_transfer_erdc']['name'])) {
                $bukti_transfer_erdc_name = basename($_FILES['bukti_transfer_erdc']['name']);
                $bukti_transfer_erdc_file_type = strtolower(pathinfo($bukti_transfer_erdc_name, PATHINFO_EXTENSION));
                $new_bukti_transfer_erdc_name = str_replace("'", "", $nama_kelompok) . "_bukti_transfer_erdc_" . $random_str . $tanggal_daftar . "." . $bukti_transfer_erdc_file_type;
                $target_file_bukti_transfer_erdc = $target_dir . "bukti_transfer_erdc/" . $new_bukti_transfer_erdc_name;

                if (in_array($bukti_transfer_erdc_file_type, $allowed)) {
                    //file asli image
                    //jika lebih besar dri 5 mb maka ditolak
                    if ($_FILES["bukti_transfer_erdc"]["size"] > (1048576 * 5)) {
                        header("Location: ../form_daftar.php?status=5");
                        exit();
                    }

                    $upload = move_uploaded_file($_FILES["bukti_transfer_erdc"]["tmp_name"], $target_file_bukti_transfer_erdc);
                    if ($upload) {
                        // echo "Successfully Uploaded!";
                    } else {
                        // echo "Not Successfully Uploaded!";
                        header("Location: ../form_daftar.php?status=6");
                        exit();
                    }
                } else {
                    header("Location: ../form_daftar.php?status=7");
                    exit();
                }
            }
        }

        if ($pilihan_lomba_3 != '') {
            if (isset($_FILES['bukti_transfer_lktb']['name'])) {
                $bukti_transfer_lktb_name = basename($_FILES['bukti_transfer_lktb']['name']);
                $bukti_transfer_lktb_file_type = strtolower(pathinfo($bukti_transfer_lktb_name, PATHINFO_EXTENSION));
                $new_bukti_transfer_lktb_name = str_replace("'", "", $nama_kelompok) . "_bukti_transfer_lktb_" . $random_str . $tanggal_daftar . "." . $bukti_transfer_lktb_file_type;
                $target_file_bukti_transfer_lktb = $target_dir . "bukti_transfer_lktb/" . $new_bukti_transfer_lktb_name;

                if (in_array($bukti_transfer_lktb_file_type, $allowed)) {
                    //file asli image
                    //jika lebih besar dri 5 mb maka ditolak
                    if ($_FILES["bukti_transfer_lktb"]["size"] > (1048576 * 5)) {
                        header("Location: ../form_daftar.php?status=5");
                        exit();
                    }

                    $upload = move_uploaded_file($_FILES["bukti_transfer_lktb"]["tmp_name"], $target_file_bukti_transfer_lktb);
                    if ($upload) {
                        // echo "Successfully Uploaded!";
                    } else {
                        // echo "Not Successfully Uploaded!";
                        header("Location: ../form_daftar.php?status=6");
                        exit();
                    }
                } else {
                    header("Location: ../form_daftar.php?status=7");
                    exit();
                }
            }
        }

        $norek_pentransfer = $_POST['norek_pentransfer'];
        $nama_pentransfer = $_POST['nama_pentransfer'];

        if ($jumlah_anggota == '1') {
            $new_foto_peserta_2_name = '';
            $new_kartu_peserta_2_name = '';
            $new_foto_peserta_3_name = '';
            $new_kartu_peserta_3_name = '';
        } else if ($jumlah_anggota == '2') {
            $new_foto_peserta_3_name = '';
            $new_kartu_peserta_3_name = '';
        }

        // $idmaxsql = "SELECT COUNT(id) + 1 as x FROM `pendaftar`";
        // $idmaxstmt = $pdo->prepare($idmaxsql);
        // $idmaxstmt->execute();
        // $idmax = $idmaxstmt->fetch();

        $jurusansql = "INSERT INTO `pendaftar`(`id`, `tanggal_daftar`, `jenjang_pendidikan`, `nama_sekolah`, `alamat_sekolah`, `nama_kelompok`, `jumlah_anggota`, `pilihan_lomba_1`, `pilihan_lomba_2`, `pilihan_lomba_3`, `norek_pentransfer`, `nama_pentransfer`, `bukti_transfer_bc`, `bukti_transfer_erdc`, `bukti_transfer_lktb`, `status`, `nama_peserta_1`, `hp_peserta_1`, `line_peserta_1`, `email_peserta_1`, `3x4_peserta_1`, `kartu_peserta_1`, `nama_peserta_2`, `hp_peserta_2`, `line_peserta_2`, `email_peserta_2`, `3x4_peserta_2`, `kartu_peserta_2`, `nama_peserta_3`, `hp_peserta_3`, `line_peserta_3`, `email_peserta_3`, `3x4_peserta_3`, `kartu_peserta_3`, `jurusan_peserta_1`, `jurusan_peserta_2`, `jurusan_peserta_3`, `confirmed_by`, `domisili_peserta_1`, `domisili_peserta_2`, `domisili_peserta_3`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $jurusanstmt = $pdo->prepare($jurusansql);
        $jurusanstmt->execute([NULL, $tanggal_daftar, $jenjang_pendidikan, $nama_sekolah, $alamat_sekolah, $nama_kelompok, $jumlah_anggota, $pilihan_lomba_1, $pilihan_lomba_2, $pilihan_lomba_3, $norek_pentransfer, $nama_pentransfer, $new_bukti_transfer_bc_name,$new_bukti_transfer_erdc_name, $new_bukti_transfer_lktb_name, 0, $nama_peserta_1, $hp_peserta_1, $line_peserta_1, $email_peserta_1, $new_foto_peserta_1_name, $new_kartu_peserta_1_name, $nama_peserta_2, $hp_peserta_2, $line_peserta_2, $email_peserta_2, $new_foto_peserta_2_name, $new_kartu_peserta_2_name, $nama_peserta_3, $hp_peserta_3, $line_peserta_3, $email_peserta_3, $new_foto_peserta_3_name, $new_kartu_peserta_3_name, $jurusan_peserta_1, $jurusan_peserta_2, $jurusan_peserta_3, '', $domisili_peserta_1, $domisili_peserta_2, $domisili_peserta_3]);

        $idmaxsql = "SELECT * FROM `pendaftar` WHERE nama_kelompok = ? AND jenjang_pendidikan = ? AND nama_sekolah = ? AND pilihan_lomba_1 = ? AND pilihan_lomba_2 = ? AND pilihan_lomba_3 = ?";
        $idmaxstmt = $pdo->prepare($idmaxsql);
        $idmaxstmt->execute([$nama_kelompok, $jenjang_pendidikan, $nama_sekolah, $pilihan_lomba_1, $pilihan_lomba_2, $pilihan_lomba_3]);
        $idmax = $idmaxstmt->fetch();

        $kodesql = "INSERT INTO `kode_peserta` (`id`, `lktb_1`, `bc_sma_1`, `bc_univ_1`, `erdc_1`, `lktb_2`, `bc_sma_2`, `bc_univ_2`, `erdc_2`, `lktb_3`, `bc_sma_3`, `bc_univ_3`, `erdc_3`, `id_pendaftar`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $kodestmt = $pdo->prepare($kodesql);
        $kodestmt->execute([NULL, $lktb_1, $bc_sma_1, $bc_univ_1, $erdc_1, $lktb_2, $bc_sma_2, $bc_univ_2, $erdc_2, $lktb_3, $bc_sma_3, $bc_univ_3, $erdc_3, $idmax['id']]);

        $_SESSION['id'] = $idmax['id']; 
        header("Location: ../index.php?status=1");
        exit();
    } else {
        header("Location: ../form_daftar.php?status=0");
        exit();
    }
?>