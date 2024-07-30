-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Apr 2023 pada 21.50
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcepetra_rallygames_bc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `nrp` varchar(11) NOT NULL,
  `nama` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`nrp`, `nama`) VALUES
('c14200195', 'Audrico'),
('c14200179', 'Andre Cristian Leo'),
('c14200121', 'Toni Ariyanto Putra'),
('c14200136', 'Reiner Julio'),
('c14200135', 'Albert Valentino'),
('b11210089', 'Angellica Mathilda'),
('b11210066', 'Steven Christian'),
('b11210070', 'Steven Julian'),
('b11200049', 'Blazer Jason'),
('b11210007', 'Viktor Atanto'),
('b11210067', 'FRANSISCO FERNANDO'),
('b11210029', 'YOHANES WISNU'),
('b11210011', 'NATHANAEL KENNETH'),
('b11210017', 'ALEXANDRO DEVARA'),
('b11200137', 'JOSHUA GO'),
('b11210038', 'JONATHAN'),
('b11210036', 'GIORGIO CLIFTON'),
('b11210044', 'KENLEY WONGKAR'),
('b11210007', 'VIKTOR ATANTO'),
('b11210046', 'DANIEL KRISTIAN'),
('b11210016', 'MARIA ANASTASYA'),
('b11210003', 'RONY HARTONO'),
('b11210018', 'KRISTIAN ADI'),
('b11200092', 'PAMELA AUDREY'),
('b11210030', 'WINSTON SUJAYAPUTERA'),
('b11210002', 'VELLYCIA NOVIANI'),
('b11210032', 'VANESSA GUNAWAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `building`
--

CREATE TABLE `building` (
  `id` int(11) NOT NULL,
  `building_name` varchar(256) NOT NULL,
  `bonus_poin` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `building`
--

INSERT INTO `building` (`id`, `building_name`, `bonus_poin`) VALUES
(1, 'Jembatan', 275),
(2, 'Public Places', 375),
(3, 'Residence', 450);

-- --------------------------------------------------------

--
-- Struktur dari tabel `building_type`
--

CREATE TABLE `building_type` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `bonus_poin` int(11) NOT NULL,
  `id_building` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `building_type`
--

INSERT INTO `building_type` (`id`, `name`, `bonus_poin`, `id_building`, `image`) VALUES
(1, 'Jembatan Kayu', 175, 1, 'b-kayu.svg'),
(2, 'Jembatan Baja', 325, 1, 'b-baja.svg'),
(3, 'Jembatan Beton', 350, 1, 'b-beton.svg'),
(4, 'Rumah Sakit', 350, 2, 'hospital.svg'),
(5, 'Mall', 325, 2, 'saloon.svg'),
(6, 'Taman', 200, 2, 'greenhouse.svg'),
(7, 'Perumahan', 200, 3, 'village.svg'),
(8, 'Apartemen', 400, 3, 'modern-city.svg'),
(9, 'Hotel', 350, 3, 'family-house.svg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `city`
--

INSERT INTO `city` (`id`, `city_name`) VALUES
(1, 'Jakarta'),
(2, 'Yogyakarta'),
(3, 'Bali'),
(4, 'Lampung'),
(5, 'Banjarmasin'),
(6, 'Jayapura');

-- --------------------------------------------------------

--
-- Struktur dari tabel `city_resource`
--

CREATE TABLE `city_resource` (
  `id` int(11) NOT NULL,
  `id_resource` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `akses` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `city_resource`
--

INSERT INTO `city_resource` (`id`, `id_resource`, `id_city`, `price`, `stock`, `akses`) VALUES
(1, 1, 1, 1000, 862, 1),
(2, 2, 1, 1750, 915, 1),
(3, 3, 1, 1500, 937, 1),
(4, 4, 1, 750, 943, 1),
(5, 5, 1, 2000, 911, 1),
(6, 6, 1, 2000, 2000, 1),
(7, 1, 2, 1000, 999, 1),
(8, 2, 2, 1750, 999, 1),
(9, 3, 2, 1500, 999, 1),
(10, 4, 2, 750, 999, 1),
(11, 5, 2, 2000, 999, 1),
(12, 6, 2, 2000, 2000, 1),
(13, 1, 3, 1000, 999, 1),
(14, 2, 3, 1750, 999, 1),
(15, 3, 3, 1500, 999, 1),
(16, 4, 3, 750, 999, 1),
(17, 5, 3, 2000, 999, 1),
(18, 6, 3, 2000, 2000, 1),
(19, 1, 4, 1000, 999, 1),
(20, 2, 4, 1750, 999, 1),
(21, 3, 4, 1500, 999, 1),
(22, 4, 4, 750, 999, 1),
(23, 5, 4, 2000, 999, 1),
(24, 6, 4, 2000, 2000, 1),
(25, 1, 5, 1000, 999, 1),
(26, 2, 5, 1750, 999, 1),
(27, 3, 5, 1500, 999, 1),
(28, 4, 5, 750, 999, 1),
(29, 5, 5, 2000, 999, 1),
(30, 6, 5, 2000, 2000, 1),
(31, 1, 6, 1000, 999, 1),
(32, 2, 6, 1750, 999, 1),
(33, 3, 6, 1500, 999, 1),
(34, 4, 6, 750, 999, 1),
(35, 5, 6, 2000, 999, 1),
(36, 6, 6, 2000, 999, 1),
(73, 13, 1, 500, 970, 1),
(74, 13, 2, 500, 999, 1),
(75, 13, 3, 500, 999, 1),
(76, 13, 4, 500, 999, 1),
(77, 13, 5, 500, 999, 1),
(78, 13, 6, 500, 999, 1),
(79, 14, 1, 750, 965, 1),
(80, 14, 2, 750, 999, 1),
(81, 14, 3, 750, 999, 1),
(82, 14, 4, 750, 999, 1),
(83, 14, 5, 750, 999, 1),
(84, 14, 6, 750, 999, 1),
(85, 15, 1, 1000, 974, 1),
(86, 15, 2, 1000, 999, 1),
(87, 15, 3, 1000, 999, 1),
(88, 15, 4, 1000, 999, 1),
(89, 15, 5, 1000, 999, 1),
(90, 15, 6, 1000, 999, 1),
(91, 16, 1, 1500, 967, 1),
(92, 16, 2, 1500, 999, 1),
(93, 16, 3, 1500, 999, 1),
(94, 16, 4, 1500, 999, 1),
(95, 16, 5, 1500, 999, 1),
(96, 16, 6, 1500, 999, 1),
(97, 17, 1, 1750, 965, 1),
(98, 17, 2, 1750, 999, 1),
(99, 17, 3, 1750, 999, 1),
(100, 17, 4, 1750, 999, 1),
(101, 17, 5, 1750, 999, 1),
(102, 17, 6, 1750, 999, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hidden_post`
--

CREATE TABLE `hidden_post` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_filepath` text NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hidden_post`
--

INSERT INTO `hidden_post` (`id`, `name`, `image_filepath`, `value`) VALUES
(1, 'Guitar', 'Guitar.jpg', 1500000),
(2, 'Zinedine Zidane', 'Zinedine Zidane.jpg', 301000),
(3, 'Water Polo', 'Water Polo.jpg', 60500),
(4, 'Nike', 'Nike.jpg', 13600000),
(5, 'Pac-Man', 'Pac-Man.png', 5000000),
(6, 'PewDiePie', 'PewDiePie.jpg', 1830000),
(7, 'Looney Tunes', 'Looney Tunes.jpg', 450000),
(8, 'Ariana Grande', 'Ariana Grande.png', 7480000),
(9, 'Coca Cola', 'Coca Cola.jpg', 1500000),
(10, 'Gym', 'Gym.jpg', 2240000),
(11, 'Lamborghini', 'Lamborghini.jpg', 3350000),
(12, 'Mexico', 'Mexico.jpg', 2240000),
(13, 'Lionel Messi', 'Lionel Messi.jpg', 1830000),
(14, 'Restaurant', 'Restaurant.jpg', 45500000),
(15, 'Bill Gates', 'Bill Gates.jpg', 1500000),
(16, 'Taylor Swift', 'Taylor Swift.jpg', 6120000),
(17, 'Car Rental', 'Car Rental.jpg', 2240000),
(18, 'Tumblr', 'Tumblr.jpg', 13600000),
(19, 'Calculator', 'Calculator.jpg', 24900000),
(20, 'The Sims', 'The Sims.jpg', 1830000),
(21, 'Timer', 'Timer.jpg', 3350000),
(22, 'Rome', 'Rome.jpg', 673000),
(23, 'Snapchat', 'Snapchat.png', 45500000),
(24, 'Athletics', 'Athletics.jpg', 246000),
(25, 'Diabetes', 'Diabetes.jpeg', 1500000),
(26, 'Uranus', 'Uranus.jpg', 301000),
(27, 'Disneyland', 'Disneyland.jpg', 2240000),
(28, 'Emoji', 'Emoji.jpg', 5000000),
(29, 'Piano', 'Piano.jpg', 6120000),
(30, 'Tinder', 'Tinder.jpg', 13600000),
(31, 'Israel', 'Israel.jpg', 1830000),
(32, 'Nelson Mandela', 'Nelson Mandela.jpg', 1000000),
(33, 'Egypt', 'Egypt.jpg', 1000000),
(34, 'Italy', 'Italy.jpg', 823000),
(35, 'China', 'China.jpg', 1830000),
(36, 'H&M', 'H_M.jpg', 30400000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_add_money`
--

CREATE TABLE `history_add_money` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `money_value` int(11) NOT NULL,
  `added_on` varchar(256) NOT NULL,
  `added_by` varchar(256) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_add_skill`
--

CREATE TABLE `history_add_skill` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `nama_skill` text NOT NULL,
  `added_on` date NOT NULL,
  `added_by` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_point`
--

CREATE TABLE `history_point` (
  `id` int(11) NOT NULL,
  `id_team` int(11) NOT NULL,
  `point_value` float NOT NULL,
  `added_on` varchar(256) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `landmark`
--

CREATE TABLE `landmark` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `id_city` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `landmark`
--

INSERT INTO `landmark` (`id`, `name`, `id_city`) VALUES
(1, 'Monumen Nasional', 1),
(2, 'Candi Borobudur', 2),
(3, 'Tourism Paradise', 3),
(4, 'Menara Siger', 4),
(5, 'Hutan', 5),
(6, 'Jembatan Hotel Kamp', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `new_jembatan`
--

CREATE TABLE `new_jembatan` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `id_pulau1` int(11) NOT NULL,
  `id_pulau2` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `id_team` int(11) NOT NULL,
  `proteksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `new_jembatan`
--

INSERT INTO `new_jembatan` (`id`, `nama`, `id_pulau1`, `id_pulau2`, `id_tipe`, `id_team`, `proteksi`) VALUES
(1, 'path22', 1, 2, 0, 0, 0),
(2, 'path166', 2, 3, 0, 0, 0),
(3, 'path26', 1, 59, 0, 0, 0),
(4, 'path230', 1, 4, 0, 0, 0),
(5, 'path146', 2, 6, 0, 0, 0),
(6, 'path142', 59, 6, 0, 0, 0),
(7, 'path150', 6, 55, 0, 0, 0),
(8, 'path154', 6, 4, 0, 0, 0),
(9, 'path158', 4, 54, 0, 0, 0),
(10, 'path162', 54, 55, 0, 0, 0),
(11, 'path666', 55, 73, 0, 0, 0),
(12, 'path602', 55, 5, 0, 0, 0),
(13, 'path606', 54, 5, 0, 0, 0),
(14, 'path598', 4, 67, 0, 0, 0),
(15, 'path606', 54, 5, 0, 0, 0),
(16, 'path126', 5, 67, 0, 0, 0),
(17, 'path610', 5, 58, 0, 0, 0),
(18, 'path594', 54, 67, 0, 0, 0),
(19, 'path614', 58, 67, 0, 0, 0),
(20, 'path462', 58, 8, 0, 0, 0),
(21, 'path458', 8, 66, 0, 0, 0),
(22, 'path466', 66, 58, 0, 0, 0),
(23, 'path654', 19, 29, 0, 0, 0),
(24, 'path618', 67, 106, 0, 0, 0),
(25, 'path590', 67, 107, 0, 0, 0),
(26, 'path582', 67, 52, 0, 0, 0),
(27, 'path586', 67, 28, 0, 0, 0),
(28, 'path574', 28, 52, 0, 0, 0),
(29, 'path570', 28, 51, 0, 0, 0),
(30, 'path578', 52, 108, 0, 0, 0),
(31, 'path626', 27, 51, 0, 0, 0),
(32, 'path622', 27, 50, 0, 0, 0),
(33, 'path634', 50, 51, 0, 0, 0),
(34, 'path638', 30, 50, 0, 0, 0),
(35, 'path630', 50, 29, 0, 0, 0),
(36, 'path658', 50, 37, 0, 0, 0),
(37, 'path662', 50, 113, 0, 0, 0),
(38, 'path650', 37, 60, 0, 0, 0),
(39, 'path646', 19, 60, 0, 0, 0),
(40, 'path642', 30, 51, 0, 0, 0),
(41, 'path290', 45, 36, 0, 0, 0),
(42, 'path274', 45, 12, 0, 0, 0),
(43, 'path286', 45, 11, 0, 0, 0),
(44, 'path294', 11, 70, 0, 0, 0),
(45, 'path298', 36, 70, 0, 0, 0),
(46, 'path282', 45, 35, 0, 0, 0),
(47, 'path262', 35, 44, 0, 0, 0),
(48, 'path266', 44, 34, 0, 0, 0),
(49, 'path270', 34, 70, 0, 0, 0),
(50, 'path266', 44, 34, 0, 0, 0),
(51, 'path234', 44, 46, 0, 0, 0),
(52, 'path238', 44, 17, 0, 0, 0),
(53, 'path242', 44, 47, 0, 0, 0),
(54, 'path254', 47, 17, 0, 0, 0),
(55, 'path246', 17, 46, 0, 0, 0),
(56, 'path250', 17, 15, 0, 0, 0),
(57, 'path82', 71, 15, 0, 0, 0),
(58, 'path210', 15, 16, 0, 0, 0),
(59, 'path214', 15, 71, 0, 0, 0),
(60, 'path226', 70, 13, 0, 0, 0),
(61, 'path134', 74, 14, 0, 0, 0),
(62, 'path206', 71, 16, 0, 0, 0),
(63, 'path218', 14, 48, 0, 0, 0),
(64, 'path222', 13, 48, 0, 0, 0),
(65, 'path138', 14, 23, 0, 0, 0),
(66, 'path198', 71, 23, 0, 0, 0),
(67, 'path202', 71, 43, 0, 0, 0),
(68, 'path182', 22, 23, 0, 0, 0),
(69, 'path186', 23, 48, 0, 0, 0),
(70, 'path178', 71, 22, 0, 0, 0),
(71, 'path170', 71, 21, 0, 0, 0),
(72, 'path174', 21, 22, 0, 0, 0),
(73, 'path190', 22, 48, 0, 0, 0),
(74, 'path554', 52, 51, 0, 0, 0),
(75, 'path558', 51, 53, 0, 0, 0),
(76, 'path562', 52, 39, 0, 0, 0),
(77, 'path566', 52, 68, 0, 0, 0),
(78, 'path538', 68, 109, 0, 0, 0),
(79, 'path534', 68, 39, 0, 0, 0),
(80, 'path550', 53, 39, 0, 0, 0),
(81, 'path546', 53, 38, 0, 0, 0),
(82, 'path542', 38, 51, 0, 0, 0),
(83, 'path522', 38, 72, 0, 0, 0),
(84, 'path526', 53, 72, 0, 0, 0),
(85, 'path438', 3, 114, 0, 0, 0),
(86, 'path434', 114, 75, 0, 0, 0),
(87, 'path442', 114, 7, 0, 0, 0),
(88, 'path430', 76, 114, 0, 0, 0),
(89, 'path418', 114, 78, 0, 0, 0),
(90, 'path446', 74, 56, 0, 0, 0),
(91, 'path454', 56, 9, 0, 0, 0),
(92, 'path450', 7, 56, 0, 0, 0),
(93, 'path386', 10, 56, 0, 0, 0),
(94, 'path390', 56, 57, 0, 0, 0),
(95, 'path402', 9, 57, 0, 0, 0),
(96, 'path398', 66, 9, 0, 0, 0),
(97, 'path394', 57, 10, 0, 0, 0),
(98, 'path130', 57, 18, 0, 0, 0),
(99, 'path406', 57, 66, 0, 0, 0),
(100, 'path410', 18, 66, 0, 0, 0),
(101, 'path306', 84, 66, 0, 0, 0),
(102, 'path310', 85, 66, 0, 0, 0),
(103, 'path314', 86, 66, 0, 0, 0),
(104, 'path34', 81, 70, 0, 0, 0),
(105, 'path302', 82, 70, 0, 0, 0),
(106, 'path42', 114, 12, 0, 0, 0),
(107, 'path422', 12, 114, 0, 0, 0),
(108, 'path426', 114, 11, 0, 0, 0),
(109, 'path278', 45, 79, 0, 0, 0),
(110, 'path258', 80, 35, 0, 0, 0),
(111, 'path38', 70, 83, 0, 0, 0),
(112, 'path194', 48, 87, 0, 0, 0),
(113, 'path322', 88, 49, 0, 0, 0),
(114, 'path326', 49, 92, 0, 0, 0),
(115, 'path318', 91, 49, 0, 0, 0),
(116, 'path334', 49, 115, 0, 0, 0),
(117, 'path330', 49, 69, 0, 0, 0),
(118, 'path46', 93, 69, 0, 0, 0),
(119, 'path342', 69, 115, 0, 0, 0),
(120, 'path338', 95, 115, 0, 0, 0),
(121, 'path346', 69, 94, 0, 0, 0),
(122, 'path470', 58, 60, 0, 0, 0),
(123, 'path474', 60, 31, 0, 0, 0),
(124, 'path478', 66, 31, 0, 0, 0),
(125, 'path54', 60, 89, 0, 0, 0),
(126, 'path62', 89, 20, 0, 0, 0),
(127, 'path58', 20, 90, 0, 0, 0),
(128, 'path482', 90, 66, 0, 0, 0),
(129, 'path122', 96, 65, 0, 0, 0),
(130, 'path118', 97, 65, 0, 0, 0),
(131, 'path114', 98, 65, 0, 0, 0),
(132, 'path30', 32, 65, 0, 0, 0),
(133, 'path110', 65, 33, 0, 0, 0),
(134, 'path66', 32, 69, 0, 0, 0),
(135, 'path70', 69, 33, 0, 0, 0),
(136, 'path98', 69, 25, 0, 0, 0),
(137, 'path102', 69, 64, 0, 0, 0),
(138, 'path94', 24, 64, 0, 0, 0),
(139, 'path378', 62, 24, 0, 0, 0),
(140, 'path370', 25, 62, 0, 0, 0),
(141, 'path414', 77, 114, 0, 0, 0),
(142, 'path358', 99, 61, 0, 0, 0),
(143, 'path354', 100, 61, 0, 0, 0),
(144, 'path350', 41, 61, 0, 0, 0),
(145, 'path362', 25, 61, 0, 0, 0),
(146, 'path366', 61, 62, 0, 0, 0),
(147, 'path382', 62, 101, 0, 0, 0),
(148, 'path50', 102, 62, 0, 0, 0),
(149, 'path530', 39, 72, 0, 0, 0),
(150, 'path510', 72, 112, 0, 0, 0),
(151, 'path506', 112, 68, 0, 0, 0),
(152, 'path518', 68, 111, 0, 0, 0),
(153, 'path502', 68, 42, 0, 0, 0),
(154, 'path90', 68, 40, 0, 0, 0),
(155, 'path498', 40, 63, 0, 0, 0),
(156, 'path486', 105, 63, 0, 0, 0),
(157, 'path490', 103, 63, 0, 0, 0),
(158, 'path494', 63, 104, 0, 0, 0),
(159, 'path374', 41, 62, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `new_pulau`
--

CREATE TABLE `new_pulau` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `tipe` text NOT NULL,
  `path` text NOT NULL,
  `treasure` text NOT NULL,
  `kepemilikan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `new_pulau`
--

INSERT INTO `new_pulau` (`id`, `nama`, `tipe`, `path`, `treasure`, `kepemilikan`) VALUES
(1, 'pulau1', 'kecil', 'path1246', '0', 0),
(2, 'pulau2', 'kecil', 'path674', '0', 0),
(3, 'pulau3', 'kecil', 'path670', '0', 0),
(4, 'pulau4', 'kecil', 'path678', '0', 0),
(5, 'pulau5', 'kecil', 'path682', '0', 0),
(6, 'pulau6', 'kecil', 'path686', '0', 0),
(7, 'pulau7', 'kecil', 'path690', '0', 0),
(8, 'pulau8', 'kecil', 'path694', '0', 0),
(9, 'pulau9', 'kecil', 'path698', '0', 0),
(10, 'pulau10', 'kecil', 'path702', '0', 0),
(11, 'pulau11', 'kecil', 'path706', '0', 0),
(12, 'pulau12', 'kecil', 'path710', '0', 0),
(13, 'pulau13', 'kecil', 'path714', '0', 0),
(14, 'pulau14', 'kecil', 'path718', '0', 0),
(15, 'pulau15', 'kecil', 'path722', '0', 0),
(16, 'pulau16', 'kecil', 'path726', '0', 0),
(17, 'pulau17', 'kecil', 'path730', '0', 0),
(18, 'pulau18', 'kecil', 'path734', '0', 0),
(19, 'pulau19', 'kecil', 'path738', '0', 0),
(20, 'pulau20', 'kecil', 'path742', '0', 0),
(21, 'pulau21', 'kecil', 'path746', '0', 0),
(22, 'pulau22', 'kecil', 'path750', '0', 0),
(23, 'pulau23', 'kecil', 'path754', '0', 0),
(24, 'pulau24', 'kecil', 'path758', '0', 0),
(25, 'pulau25', 'kecil', 'path762', '0', 0),
(26, 'pulau26', 'kecil', 'path764', '0', 0),
(27, 'pulau27', 'kecil', 'path770', '21', 0),
(28, 'pulau28', 'kecil', 'path774', '0', 0),
(29, 'pulau29', 'kecil', 'path778', '0', 0),
(30, 'pulau30', 'kecil', 'path782', '0', 0),
(31, 'pulau31', 'kecil', 'path786', '0', 0),
(32, 'pulau32', 'kecil', 'path790', '0', 0),
(33, 'pulau33', 'kecil', 'path794', '0', 0),
(34, 'pulau34', 'kecil', 'path798', '0', 0),
(35, 'pulau35', 'kecil', 'path802', '21', 0),
(36, 'pulau36', 'kecil', 'path806', '0', 0),
(37, 'pulau37', 'kecil', 'path810', '0', 0),
(38, 'pulau38', 'kecil', 'path814', '0', 0),
(39, 'pulau39', 'kecil', 'path818', '0', 0),
(40, 'pulau40', 'kecil', 'path822', '0', 0),
(41, 'pulau41', 'kecil', 'path826', '0', 0),
(42, 'pulau42', 'kecil', 'path838', '0', 0),
(43, 'pulau43', 'sedang', 'path842', '0', 0),
(44, 'pulau44', 'sedang', 'path846', '0', 0),
(45, 'pulau45', 'sedang', 'path850', '0', 0),
(46, 'pulau46', 'sedang', 'path854', '0', 0),
(47, 'pulau47', 'sedang', 'path858', '0', 0),
(48, 'pulau48', 'sedang', 'path862', '0', 0),
(49, 'pulau49', 'sedang', 'path866', '0', 0),
(50, 'pulau50', 'sedang', 'path870', '0', 0),
(51, 'pulau51', 'sedang', 'path874', '0', 0),
(52, 'pulau52', 'sedang', 'path878', '0', 0),
(53, 'pulau53', 'sedang', 'path882', '0', 0),
(54, 'pulau54', 'sedang', 'path886', '0', 0),
(55, 'pulau55', 'sedang', 'path890', '0', 0),
(56, 'pulau56', 'sedang', 'path894', '0', 0),
(57, 'pulau57', 'sedang', 'path898', '0', 0),
(58, 'pulau58', 'sedang', 'path902', '0', 0),
(59, 'pulau59', 'sedang', 'path906', '0', 0),
(60, 'pulau60', 'sedang', 'path910', '0', 0),
(61, 'pulau61', 'sedang', 'path914', '0', 0),
(62, 'pulau62', 'sedang', 'path918', '0', 0),
(63, 'pulau63', 'sedang', 'path922', '0', 0),
(64, 'pulau64', 'sedang', 'path926', '0', 0),
(65, 'pulau65', 'sedang', 'path930', '0', 0),
(66, 'pulau66', 'besar', 'path938', '0', 0),
(67, 'pulau67', 'besar', 'path942', '0', 0),
(68, 'pulau68', 'besar', 'path946', '0', 0),
(69, 'pulau69', 'besar', 'path950', '0', 0),
(70, 'pulau70', 'besar', 'path954', '0', 0),
(71, 'pulau71', 'besar', 'path958', '0', 0),
(72, 'pulau72', 'sedang', 'path990', '0', 0),
(73, 'pulau73', 'dekorasi', 'path994', '0', 0),
(74, 'pulau74', 'dekorasi', 'path998', '0', 0),
(75, 'pulau75', 'dekorasi', 'path1002', '0', 0),
(76, 'pulau76', 'dekorasi', 'path1006', '0', 0),
(77, 'pulau77', 'dekorasi', 'path1010', '0', 0),
(78, 'pulau78', 'dekorasi', 'path1014', '0', 0),
(79, 'pulau79', 'dekorasi', 'path1022', '0', 0),
(80, 'pulau80', 'dekorasi', 'path1026', '0', 0),
(81, 'pulau81', 'dekorasi', 'path1018', '0', 0),
(82, 'pulau82', 'dekorasi', 'path1030', '0', 0),
(83, 'pulau83', 'dekorasi', 'path1034', '0', 0),
(84, 'pulau84', 'dekorasi', 'path1054', '0', 0),
(85, 'pulau85', 'dekorasi', 'path1050', '0', 0),
(86, 'pulau86', 'dekorasi', 'path1046', '0', 0),
(87, 'pulau87', 'dekorasi', 'path1210', '0', 0),
(88, 'pulau88', 'dekorasi', 'path1106', '0', 0),
(89, 'pulau89', 'dekorasi', 'path962', '0', 0),
(90, 'pulau90', 'dekorasi', 'path1070', '0', 0),
(91, 'pulau91', 'dekorasi', 'path1102', '0', 0),
(92, 'pulau92', 'dekorasi', 'path1242', '0', 0),
(93, 'pulau93', 'dekorasi', 'path1238', '0', 0),
(94, 'pulau94', 'dekorasi', 'path1194', '0', 0),
(95, 'pulau95', 'dekorasi', 'path1094', '0', 0),
(96, 'pulau96', 'dekorasi', 'path1186', '0', 0),
(97, 'pulau97', 'dekorasi', 'path1182', '0', 0),
(98, 'pulau98', 'dekorasi', 'path1178', '0', 0),
(99, 'pulau99', 'dekorasi', 'path1166', '0', 0),
(100, 'pulau100', 'dekorasi', 'path1162', '0', 0),
(101, 'pulau101', 'dekorasi', 'path1158', '0', 0),
(102, 'pulau102', 'dekorasi', 'path1154', '0', 0),
(103, 'pulau103', 'dekorasi', 'path1142', '0', 0),
(104, 'pulau104', 'dekorasi', 'path1146', '0', 0),
(105, 'pulau105', 'dekorasi', 'path1134', '0', 0),
(106, 'pulau106', 'dekorasi', 'path986', '0', 0),
(107, 'pulau107', 'dekorasi', 'path966', '0', 0),
(108, 'pulau108', 'dekorasi', 'path970', '0', 0),
(109, 'pulau109', 'dekorasi', 'path978', '0', 0),
(110, 'pulau110', 'dekorasi', 'path830', '0', 0),
(111, 'pulau111', 'dekorasi', 'path834', '0', 0),
(112, 'pulau112', 'dekorasi', 'path1130', '0', 0),
(113, 'pulau113', 'dekorasi', 'path1110', '0', 0),
(114, 'pulau114', 'besar', 'path934', '0', 0),
(115, 'pulau115', 'kecil', 'path766', '0', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `new_skill`
--

CREATE TABLE `new_skill` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `gambar` text NOT NULL,
  `target` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `new_skill`
--

INSERT INTO `new_skill` (`id`, `nama`, `gambar`, `target`) VALUES
(24, 'Inventory Ganda', 'penggandaan.png', 'user'),
(25, 'Boom Mega Boom', 'boom mega boom.png', 'pulau_kecil'),
(26, 'Divide Et Impera', 'devide et impera.png', 'jembatan'),
(27, 'X2 Social Credits', '2x social credit.png', 'user'),
(28, 'TBL TBL TBL', 'TBL.png', 'pulau'),
(29, 'Meteor', 'meteor.png', 'pulau_kecil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `new_timing`
--

CREATE TABLE `new_timing` (
  `id` int(11) NOT NULL,
  `nama` varchar(8) NOT NULL,
  `jam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `new_timing`
--

INSERT INTO `new_timing` (`id`, `nama`, `jam`) VALUES
(1, 'treasure', 0),
(2, 'bencana', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `new_tipe_jembatan`
--

CREATE TABLE `new_tipe_jembatan` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `gambar` text NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `new_tipe_jembatan`
--

INSERT INTO `new_tipe_jembatan` (`id`, `nama`, `gambar`, `poin`) VALUES
(1, 'kayu', 'jembatan kayu tampak atas-01.png', 0),
(2, 'baja', 'jembatan baja tampak atas-01.png', 0),
(3, 'beton', 'jembatan beton tampak atas-01.png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(11) NOT NULL,
  `tanggal_daftar` varchar(256) NOT NULL,
  `jenjang_pendidikan` varchar(256) NOT NULL,
  `nama_sekolah` varchar(256) NOT NULL,
  `alamat_sekolah` varchar(256) NOT NULL,
  `nama_kelompok` varchar(256) NOT NULL,
  `jumlah_anggota` varchar(256) NOT NULL,
  `pilihan_lomba_1` varchar(256) NOT NULL,
  `pilihan_lomba_2` varchar(256) NOT NULL,
  `pilihan_lomba_3` varchar(256) NOT NULL,
  `bukti_transfer_bc` text NOT NULL,
  `bukti_transfer_erdc` text NOT NULL,
  `bukti_transfer_lktb` text NOT NULL,
  `norek_pentransfer` varchar(256) NOT NULL,
  `nama_pentransfer` varchar(256) NOT NULL,
  `status` int(11) NOT NULL,
  `nama_peserta_1` varchar(256) NOT NULL,
  `hp_peserta_1` varchar(256) NOT NULL,
  `line_peserta_1` varchar(256) NOT NULL,
  `email_peserta_1` varchar(256) NOT NULL,
  `jurusan_peserta_1` varchar(256) NOT NULL,
  `3x4_peserta_1` text NOT NULL,
  `kartu_peserta_1` text NOT NULL,
  `nama_peserta_2` varchar(256) NOT NULL,
  `hp_peserta_2` varchar(256) NOT NULL,
  `line_peserta_2` varchar(256) NOT NULL,
  `email_peserta_2` varchar(256) NOT NULL,
  `jurusan_peserta_2` varchar(256) NOT NULL,
  `3x4_peserta_2` text NOT NULL,
  `kartu_peserta_2` text NOT NULL,
  `nama_peserta_3` varchar(256) NOT NULL,
  `hp_peserta_3` varchar(256) NOT NULL,
  `line_peserta_3` varchar(256) NOT NULL,
  `email_peserta_3` varchar(256) NOT NULL,
  `jurusan_peserta_3` varchar(256) NOT NULL,
  `3x4_peserta_3` text NOT NULL,
  `kartu_peserta_3` text NOT NULL,
  `confirmed_by` varchar(256) NOT NULL,
  `domisili_peserta_1` varchar(256) NOT NULL,
  `domisili_peserta_2` varchar(256) NOT NULL,
  `domisili_peserta_3` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `tanggal_daftar`, `jenjang_pendidikan`, `nama_sekolah`, `alamat_sekolah`, `nama_kelompok`, `jumlah_anggota`, `pilihan_lomba_1`, `pilihan_lomba_2`, `pilihan_lomba_3`, `bukti_transfer_bc`, `bukti_transfer_erdc`, `bukti_transfer_lktb`, `norek_pentransfer`, `nama_pentransfer`, `status`, `nama_peserta_1`, `hp_peserta_1`, `line_peserta_1`, `email_peserta_1`, `jurusan_peserta_1`, `3x4_peserta_1`, `kartu_peserta_1`, `nama_peserta_2`, `hp_peserta_2`, `line_peserta_2`, `email_peserta_2`, `jurusan_peserta_2`, `3x4_peserta_2`, `kartu_peserta_2`, `nama_peserta_3`, `hp_peserta_3`, `line_peserta_3`, `email_peserta_3`, `jurusan_peserta_3`, `3x4_peserta_3`, `kartu_peserta_3`, `confirmed_by`, `domisili_peserta_1`, `domisili_peserta_2`, `domisili_peserta_3`) VALUES
(14, '2022-01-20', 'Senior High School', 'SMAK Santo Hendrikus Surabaya', 'Jl. Arief Rahman Hakim No.40-44, Klampis Ngasem, Kec. Sukolilo', 'Hendz', '3', 'bc-sma', '', '', 'Hendz_bukti_transfer_bc_1SXTXMAs452022-01-20.jpg', '', '', '5060999700', 'Antin Kaswarini', 1, 'Peter Kristian  Santoso', '081357313002', 'nbxfans190', 'peterkristiansans@gmail.com', '', 'Hendz_Peter Kristian  Santoso_3x4_1SXTXMAs452022-01-20.jpg', 'Hendz_Peter Kristian  Santoso_student_id_1SXTXMAs452022-01-20.jpg', 'Clementine Aubrey Prajitno', '089605070500', 'cleaubrey05', 'clementineaubrey05@gmail.com', '', 'Hendz_Clementine Aubrey Prajitno_3x4_1SXTXMAs452022-01-20.jpg', 'Hendz_Clementine Aubrey Prajitno_student_id_1SXTXMAs452022-01-20.jpg', 'Axelyno Welson Djoenaedi', '0895338280674', '0895338280674', 'axelynowelson@gmail.com', '', 'Hendz_Axelyno Welson Djoenaedi_3x4_1SXTXMAs452022-01-20.jpg', 'Hendz_Axelyno Welson Djoenaedi_student_id_1SXTXMAs452022-01-20.jpg', 'Tifany Wira', 'Surabaya', 'Surabaya', 'Surabaya'),
(15, '2022-01-21', 'Senior High School', 'SMAK Petra 1 Surabaya', 'Jl. Raya Graha Famili Utara Jl. Lingkar Dalam', 'Treasure', '3', 'bc-sma', '', '', 'Treasure_bukti_transfer_bc_F5eoqyFDyn2022-01-21.jpg', '', '', '0881381043', 'Odelia Liem', 1, 'Odelia Liem', '081249266337', 'odelialiem', 'odelialie16@gmail.com', '', 'Treasure_Odelia Liem_3x4_F5eoqyFDyn2022-01-21.jpg', 'Treasure_Odelia Liem_student_id_F5eoqyFDyn2022-01-21.jpg', 'Welldone Setiawan', '081235788787', 'welldone1', 'setiawanwelldone@gmail.com', '', 'Treasure_Welldone Setiawan_3x4_F5eoqyFDyn2022-01-21.jpg', 'Treasure_Welldone Setiawan_student_id_F5eoqyFDyn2022-01-21.jpg', 'Oliver Kevin Onggowarsito', '0811322939', 'oliverkevin29', 'oliverkevin2005@gmail.com', '', 'Treasure_Oliver Kevin Onggowarsito_3x4_F5eoqyFDyn2022-01-21.jpg', 'Treasure_Oliver Kevin Onggowarsito_student_id_F5eoqyFDyn2022-01-21.jpg', 'Tifany Wira', 'Surabaya', 'Surabaya', 'Surabaya'),
(46, '2022-02-02', 'Senior High School', 'SMA Kristen Petra 1 Surabaya', 'Perum, Jl. Raya Graha Famili Utara Jl. Lingkar Dalam, Salam, Pradahkalikendal, Dukuhpakis, Surabaya City, East Java 60226', 'cuanciak', '3', 'bc-sma', '', '', 'cuanciak_bukti_transfer_bc_gv135dJDQv2022-02-02.jpg', '', '', '8620443868', 'AMANDA ANGELIA BILINDA', 1, 'Amanda Angelia Bilinda', '0895401603180', 'amandaangelia_', 'amanda.angeliab@gmail.com', '', 'cuanciak_Amanda Angelia Bilinda_3x4_gv135dJDQv2022-02-02.jpg', 'cuanciak_Amanda Angelia Bilinda_student_id_gv135dJDQv2022-02-02.jpg', 'Rodney Filbertlin', '0811330076', 'rodneylinz', 'rodneylin7@gmail.com', '', 'cuanciak_Rodney Filbertlin_3x4_gv135dJDQv2022-02-02.jpg', 'cuanciak_Rodney Filbertlin_student_id_gv135dJDQv2022-02-02.jpg', 'Reyhan Jason', '0811310383', 'reyhanjason', 'reyhanjason@gmail.com', '', 'cuanciak_Reyhan Jason_3x4_gv135dJDQv2022-02-02.jpeg', 'cuanciak_Reyhan Jason_student_id_gv135dJDQv2022-02-02.jpg', 'Tifany Wira', 'Surabaya', 'Surabaya', 'Surabaya'),
(49, '2022-02-02', 'Senior High School', 'SMK N 2 DEPOK SLEMAN', 'Jl. STM Pembangunan, Mrican, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta', 'Renjana Team', '3', 'bc-sma', '', '', 'Renjana Team_bukti_transfer_bc_q755U37a2l2022-02-02.jpg', '', '', '90260056729', 'WIDYA ARDIANTO', 1, 'Faza Nur Halisa', '089674368088', 'fazanh', 'fazanurh@gmail.com', '', 'Renjana Team_Faza Nur Halisa_3x4_q755U37a2l2022-02-02.png', 'Renjana Team_Faza Nur Halisa_student_id_q755U37a2l2022-02-02.jpg', 'Muhammad Zaid Rizky Ramadhan', '085719568413', '-', 'rizkyyrmdn13@gmail.com', '', 'Renjana Team_Muhammad Zaid Rizky Ramadhan_3x4_q755U37a2l2022-02-02.jpg', 'Renjana Team_Muhammad Zaid Rizky Ramadhan_student_id_q755U37a2l2022-02-02.jpg', 'Fadhilla Senja Wienanti', '08998800044', '-', 'fadhillasenja2@gmail.com', '', 'Renjana Team_Fadhilla Senja Wienanti_3x4_q755U37a2l2022-02-02.jpg', 'Renjana Team_Fadhilla Senja Wienanti_student_id_q755U37a2l2022-02-02.jpg', 'Tifany Wira', 'Daerah Istimewa Yogyakarta', 'Daerah Istimewa Yogyakarta', 'Daerah Istimewa Yogyakarta'),
(50, '2022-02-02', 'Senior High School', 'SMA Kristen Gloria 2', 'JL. KALISARI SELATAN 1 NO. 3 PAKUWON CITY SURABAYA, Kalisari, Kec. Mulyorejo, Kota Surabaya, Jawa Timur, 60112.', 'Nalpoint Built', '3', 'bc-sma', '', '', 'Nalpoint Built_bukti_transfer_bc_fmZAaFXbhL2022-02-02.jpg', '', '', '5620051821', 'Endang Indrawati', 1, 'Leon Benediktus', '0809676335803', 'leontime', 'leonbenediktus@gmail.com', '', 'Nalpoint Built_Leon Benediktus_3x4_fmZAaFXbhL2022-02-02.jpg', 'Nalpoint Built_Leon Benediktus_student_id_fmZAaFXbhL2022-02-02.jpg', 'Nikholai Kelvin Soenardjo ', '082132229323', 'nikholai250705', 'n1kh.soen@gmail.com', '', 'Nalpoint Built_Nikholai Kelvin Soenardjo _3x4_fmZAaFXbhL2022-02-02.jpg', 'Nalpoint Built_Nikholai Kelvin Soenardjo _student_id_fmZAaFXbhL2022-02-02.jpg', 'Carlinsia Hana Gunantara', '085259082605', 'carlinsia1310', 'carlinsia1310@gmail.com', '', 'Nalpoint Built_Carlinsia Hana Gunantara_3x4_fmZAaFXbhL2022-02-02.jpg', 'Nalpoint Built_Carlinsia Hana Gunantara_student_id_fmZAaFXbhL2022-02-02.jpg', 'Tifany Wira', 'Surabaya', 'Surabaya', 'Surabaya'),
(51, '2022-02-02', 'Senior High School', 'SMK N 2 Depok', 'Jl. STM Pembangunan, Mrican, Caturtunggal, Kec Depok', 'Aselabar', '3', 'bc-sma', '', '', 'Aselabar_bukti_transfer_bc_GWUJVqYH62022-02-02.jpg', '', '', '90260056729', 'Widya Ardianto', 1, 'Anas Bahari', '089659466926', '-', 'anashiyahiya@gmail.com', '', 'Aselabar_Anas Bahari_3x4_GWUJVqYH62022-02-02.jpg', 'Aselabar_Anas Bahari_student_id_GWUJVqYH62022-02-02.jpg', 'Mario Akhmad Alfariz', '088233537629', '-', 'rioakhmad11@gmail.com', '', 'Aselabar_Mario Akhmad Alfariz_3x4_GWUJVqYH62022-02-02.jpg', 'Aselabar_Mario Akhmad Alfariz_student_id_GWUJVqYH62022-02-02.jpg', 'Arga Dwi Septiawan', '088225466361', '-', 'argadwiseptiawan406@gmail.com', '', 'Aselabar_Arga Dwi Septiawan_3x4_GWUJVqYH62022-02-02.jpg', 'Aselabar_Arga Dwi Septiawan_student_id_GWUJVqYH62022-02-02.jpg', 'Tifany Wira', 'Daerah Istimewa Yogyakarta', 'Daerah Istimewa Yogyakarta', 'Daerah Istimewa Yogyakarta'),
(52, '2022-02-02', 'Senior High School', 'SMK Negeri 2 Depok Sleman', 'Jl. STM Pembangunan, Mrican, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', 'Lucky Priafus', '3', 'bc-sma', '', '', 'Lucky Priafus_bukti_transfer_bc_XdRG1fx2q2022-02-02.jpg', '', '', '1210011631', 'HAFID BAGASKARA', 1, 'Priyo Adi Wijaya', '08998838023', '-', 'priyoadiwijaya01@gmail.com', '', 'Lucky Priafus_Priyo Adi Wijaya_3x4_XdRG1fx2q2022-02-02.jpg', 'Lucky Priafus_Priyo Adi Wijaya_student_id_XdRG1fx2q2022-02-02.jpg', 'Muhammad Firdaus Putralis Wirayuda', '087775976048', '-', 'muhammadfirdaus356199@gmail.com', '', 'Lucky Priafus_Muhammad Firdaus Putralis Wirayuda_3x4_XdRG1fx2q2022-02-02.jpg', 'Lucky Priafus_Muhammad Firdaus Putralis Wirayuda_student_id_XdRG1fx2q2022-02-02.jpg', 'Dzaky Affan Udzri', '087749935882', '-', 'dzakyaffan76@gmail.com', '', 'Lucky Priafus_Dzaky Affan Udzri_3x4_XdRG1fx2q2022-02-02.jpg', 'Lucky Priafus_Dzaky Affan Udzri_student_id_XdRG1fx2q2022-02-02.jpg', 'Tifany Wira', 'Yogyakarta', 'Yogyakarta', 'Yogyakarta'),
(53, '2022-02-02', 'Senior High School', 'SMK N 2 DEPOK SLEMAN YOGYAKARTA', 'Jl. STM Pembangunan, Mrican, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', 'SRIKANDI TEAM', '3', 'bc-sma', '', '', 'SRIKANDI TEAM_bukti_transfer_bc_1lk0VX8jqc2022-02-02.jpg', '', '', '1210011631', 'HAFID BAGASKARA', 1, 'NURI AFIFAH RAMADHANI', '085943462811', '-', 'nuriafifahr@gmail.com', '', 'SRIKANDI TEAM_NURI AFIFAH RAMADHANI_3x4_1lk0VX8jqc2022-02-02.jpg', 'SRIKANDI TEAM_NURI AFIFAH RAMADHANI_student_id_1lk0VX8jqc2022-02-02.jpg', 'NOVI SETIYANINGSIH', '089671480600', '-', 'novinnn0987@gmail.com', '', 'SRIKANDI TEAM_NOVI SETIYANINGSIH_3x4_1lk0VX8jqc2022-02-02.jpg', 'SRIKANDI TEAM_NOVI SETIYANINGSIH_student_id_1lk0VX8jqc2022-02-02.jpg', 'SHAFA SEKAR PRABANINGRUM', '085714894414', '-', 'shafasekars130205@gmail.com', '', 'SRIKANDI TEAM_SHAFA SEKAR PRABANINGRUM_3x4_1lk0VX8jqc2022-02-02.jpg', 'SRIKANDI TEAM_SHAFA SEKAR PRABANINGRUM_student_id_1lk0VX8jqc2022-02-02.jpg', 'Tifany Wira', 'D.I.Yogyakarta', 'D.I.Yogyakarta', 'D.I.Yogyakarta'),
(55, '2022-02-02', 'Senior High School', 'SMK N 2 DEPOK SLEMAN YOGYAKARTA', 'Jl. STM Pembangunan, Mrican, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', 'BIMA TEAM', '3', 'bc-sma', '', '', 'BIMA TEAM_bukti_transfer_bc_IBPj2RZog72022-02-02.jpeg', '', '', '1210011631', 'HAFID BAGASKARA', 1, 'Muhammad Rasda Pramudita', '089652275377', 'rasdapramudita', 'rasdapramudita@gmail.com', '', 'BIMA TEAM_Muhammad Rasda Pramudita_3x4_IBPj2RZog72022-02-02.jpeg', 'BIMA TEAM_Muhammad Rasda Pramudita_student_id_IBPj2RZog72022-02-02.jpg', 'Mutsaqqof Zaki Rabbani', '081393610918', '-', 'cacicheo123@gmail.com', '', 'BIMA TEAM_Mutsaqqof Zaki Rabbani_3x4_IBPj2RZog72022-02-02.jpg', 'BIMA TEAM_Mutsaqqof Zaki Rabbani_student_id_IBPj2RZog72022-02-02.jpg', 'Yohanes Paskalis Anindito Jalu Adi', '083820985253', '-', 'paskalisdito05@gmail.com', '', 'BIMA TEAM_Yohanes Paskalis Anindito Jalu Adi_3x4_IBPj2RZog72022-02-02.jpeg', 'BIMA TEAM_Yohanes Paskalis Anindito Jalu Adi_student_id_IBPj2RZog72022-02-02.jpeg', 'Tifany Wira', 'Nglaban, Sinduharjo, Ngaglik, Sleman', 'Jetis, Donoasih, Donokerto, Turi, Sleman', 'Tegalrejo, Rejodadi, Bangunkerto, Turi, Sleman'),
(66, '2022-02-17', 'Senior High School', 'SMA NEGERI 1 SRESEH', 'JL. Raya Noreh, Sreseh, 69273, Labang, Noreh, Sampang, Kabupaten Sampang, Jawa Timur 69273', 'Survey corps', '3', 'bc-sma', '', '', 'Survey corps_bukti_transfer_bc_C8oeTbW2OQ2022-02-17.jpg', '', '', '0172192977', 'EDI SASMITO', 1, 'Sandika trio febrian', '085257256677', 'riansandika_3', 'sandikatriofebrian3@gmail.com', '', 'Survey corps_Sandika trio febrian_3x4_C8oeTbW2OQ2022-02-17.jpg', 'Survey corps_Sandika trio febrian_student_id_C8oeTbW2OQ2022-02-17.jpg', 'Adelia Tasya zulvani', '087779845128', 'AdeliaTZY', 'adeliatasya105@gmail.com', '', 'Survey corps_Adelia Tasya zulvani_3x4_C8oeTbW2OQ2022-02-17.jpg', 'Survey corps_Adelia Tasya zulvani_student_id_C8oeTbW2OQ2022-02-17.jpg', 'Moh. Rofiqi Afnan', '085259616291', 'Fiqi536', 'muhammadrofiqi789@gmail.com', '', 'Survey corps_Moh. Rofiqi Afnan_3x4_C8oeTbW2OQ2022-02-17.jpg', 'Survey corps_Moh. Rofiqi Afnan_student_id_C8oeTbW2OQ2022-02-17.jpg', 'Tifany Wira', 'Sampang', 'Sampang', 'Sampang'),
(82, '2022-02-24', 'Senior High School', 'SMA Kristen Petra 2', 'Jl. Manyar Tirtoasri Raya No. 1-3', 'TT', '1', 'bc-sma', '', '', 'TT_bukti_transfer_bc_XETZHjALPo2022-02-24.jpg', '', '', '5065080041', 'Takasya Angela Tanauw Khristantoq', 1, 'Takadho Michael Tanauw Khristanto', '081930391199', 'michaeltaka_', 'michaeltaka2004@gmail.com', '', 'TT_Takadho Michael Tanauw Khristanto_3x4_XETZHjALPo2022-02-24.png', 'TT_Takadho Michael Tanauw Khristanto_student_id_XETZHjALPo2022-02-24.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Tifany Wira', 'Surabaya', '', ''),
(83, '2022-02-24', 'Senior High School', 'SMA Nation Star Academy', 'Jl. Dharma Husada Indah Barat VI No.1, Surabaya', 'Three Musketeerz', '3', 'bc-sma', '', '', 'Three Musketeerz_bukti_transfer_bc_VKiGMrooBA2022-02-24.jpg', '', '', '085103319009', 'Dana atas nama Sulistyowati', 1, 'Jesslyn Valencia Rahardjo', '082232031883', 'jesslyn2321', 'jesslyn.valenciarahardjo@nationstaracademy.sch.id', '', 'Three Musketeerz_Jesslyn Valencia Rahardjo_3x4_VKiGMrooBA2022-02-24.jpg', 'Three Musketeerz_Jesslyn Valencia Rahardjo_student_id_VKiGMrooBA2022-02-24.jpg', 'Tiffany Natasya', '087717534368', 'pandabun03', 'tiffany.natasya@nationstaracademy.sch.id', '', 'Three Musketeerz_Tiffany Natasya_3x4_VKiGMrooBA2022-02-24.jpg', 'Three Musketeerz_Tiffany Natasya_student_id_VKiGMrooBA2022-02-24.jpg', 'Sachiko Catalina Budiono', '089616807888', 'sachikocatalina16', 'sachiko.catalinabudiono@nationstaracademy.sch.di', '', 'Three Musketeerz_Sachiko Catalina Budiono_3x4_VKiGMrooBA2022-02-24.jpg', 'Three Musketeerz_Sachiko Catalina Budiono_student_id_VKiGMrooBA2022-02-24.jpg', 'Tifany Wira', 'Surabaya', 'Surabaya', 'Surabaya'),
(87, '2022-02-24', 'Senior High School', 'SMAK STELLA MARIS', 'INDRAPURA 32 SURABAYA', 'STELMA 1 ', '3', 'bc-sma', '', '', 'STELMA 1 _bukti_transfer_bc_AzUXrqwVkM2022-02-24.jpeg', '', '', '1420018943828', 'KRESNA PRASETYA NUGROHO ', 1, 'Maria Vianney Jasmine Raharjo', '082244191159', 'vianninerhj', 'mariavianney225@gmail.com', '', 'STELMA 1 _Maria Vianney Jasmine Raharjo_3x4_AzUXrqwVkM2022-02-24.jpg', 'STELMA 1 _Maria Vianney Jasmine Raharjo_student_id_AzUXrqwVkM2022-02-24.jpg', 'Fransiska Natalia Hobang', '082141188085', '-', 'fransiskanataliahobang3105@gmail.com', '', 'STELMA 1 _Fransiska Natalia Hobang_3x4_AzUXrqwVkM2022-02-24.jpeg', 'STELMA 1 _Fransiska Natalia Hobang_student_id_AzUXrqwVkM2022-02-24.jpeg', 'Angelica Rosiana Tupamahu', '087861776552', '-', 'angelwijaya329@gmail.com', '', 'STELMA 1 _Angelica Rosiana Tupamahu_3x4_AzUXrqwVkM2022-02-24.jpeg', 'STELMA 1 _Angelica Rosiana Tupamahu_student_id_AzUXrqwVkM2022-02-24.jpeg', 'Tifany Wira', 'SURABAYA', 'SURABAYA', 'SURABAYA'),
(88, '2022-02-24', 'Senior High School', 'SMAK STELLA MARIS', 'INDRAPURA 32 SURABAYA', 'STELMA 2', '2', 'bc-sma', '', '', 'STELMA 2_bukti_transfer_bc_GK9mym5da42022-02-24.jpeg', '', '', '1420018943828', 'KRESNA PRASETYA NUGROHO ', 1, 'Sovia Anggi', '081217641326', '-', 'cyrillsoviaanggi27@gmail.com', '', 'STELMA 2_Sovia Anggi_3x4_GK9mym5da42022-02-24.jpeg', 'STELMA 2_Sovia Anggi_student_id_GK9mym5da42022-02-24.jpeg', 'Veronica Dhiva Aryaningtyas S.A', '082140883026', 'dhivavero2801', 'veronicadhiva280105@gmail.com', '', 'STELMA 2_Veronica Dhiva Aryaningtyas S.A_3x4_GK9mym5da42022-02-24.jpeg', 'STELMA 2_Veronica Dhiva Aryaningtyas S.A_student_id_GK9mym5da42022-02-24.jpeg', '', '', '', '', '', '', '', 'Tifany Wira', 'SURABAYA', 'SURABAYA', ''),
(89, '2022-02-24', 'Senior High School', 'SMAK STELLA MARIS', 'INDRAPURA 32 SURABAYA', 'STELMA 3', '2', 'bc-sma', '', '', 'STELMA 3_bukti_transfer_bc_OENaw3TrkJ2022-02-24.jpeg', '', '', '1420018943828', 'KRESNA PRASETYA NUGROHO ', 1, 'Devinta Fioling Kowe', '085339302203', 'fiolingkowe18', 'fiolingkowe@gmail.com', '', 'STELMA 3_Devinta Fioling Kowe_3x4_OENaw3TrkJ2022-02-24.jpeg', 'STELMA 3_Devinta Fioling Kowe_student_id_OENaw3TrkJ2022-02-24.jpeg', 'Stefany Jeanny Wijaya', '0881026542393', 'vercapio', 'stefanyagatha265@gmail.com', '', 'STELMA 3_Stefany Jeanny Wijaya_3x4_OENaw3TrkJ2022-02-24.jpeg', 'STELMA 3_Stefany Jeanny Wijaya_student_id_OENaw3TrkJ2022-02-24.jpeg', '', '', '', '', '', '', '', 'Tifany Wira', 'SURABAYA', 'SURABAYA', ''),
(98, '2022-02-26', 'Senior High School', 'SMA Nation Star Academy Surabaya', 'Jl. Dharma Husada Indah Barat VI No.1, Mojo, Kec. Gubeng, Kota SBY, Jawa Timur 60285', 'zio', '2', 'bc-sma', '', '', 'zio_bukti_transfer_bc_CFtyknlLQ52022-02-26.png', '', '', '085103319009', 'sulistyowati', 0, 'Vinsens Sandriawan', '08113060073', 'vinsens_vs', 'samdriawanvinsens@gmail.com', '', 'zio_Vinsens Sandriawan_3x4_CFtyknlLQ52022-02-26.png', 'zio_Vinsens Sandriawan_student_id_CFtyknlLQ52022-02-26.png', 'Moriczzio Cosmo Kenaya Wijaya', '08113450710', 'spectregamer', 'spectretre@gmail.com', '', 'zio_Moriczzio Cosmo Kenaya Wijaya_3x4_CFtyknlLQ52022-02-26.png', 'zio_Moriczzio Cosmo Kenaya Wijaya_student_id_CFtyknlLQ52022-02-26.png', '', '', '', '', '', '', '', '', 'Surabaya', 'Surabaya', ''),
(115, '2022-02-27', 'Senior High School', 'MAN 2 Ponorogo', 'Jl. Soekarno Hatta No. 381, Sablak, Keniten, Kec. Ponorogo, Kab. Ponorogo', 'PemudaGeorgopol MAN 2 PONOROGO', '3', 'bc-sma', '', '', 'PemudaGeorgopol MAN 2 PONOROGO_bukti_transfer_bc_nrT2I32Pzg2022-02-27.jpg', '', '', '1710003969311', 'JAMILATUN', 0, 'Hikmal Rajendra Zulfa', '082134259036', 'hikmalraz2178', 'hikmaljr15@gmail.com', '', 'PemudaGeorgopol MAN 2 PONOROGO_Hikmal Rajendra Zulfa_3x4_nrT2I32Pzg2022-02-27.jpg', 'PemudaGeorgopol MAN 2 PONOROGO_Hikmal Rajendra Zulfa_student_id_nrT2I32Pzg2022-02-27.jpg', 'Agung Subagyo', '081237824540', 'presidiumagung', 'subagyoagung777@gmail.com', '', 'PemudaGeorgopol MAN 2 PONOROGO_Agung Subagyo_3x4_nrT2I32Pzg2022-02-27.jpg', 'PemudaGeorgopol MAN 2 PONOROGO_Agung Subagyo_student_id_nrT2I32Pzg2022-02-27.jpg', 'Ahdi Firdaus Fanani', '089515024553', 'penukarsendal', 'firdausahdi@gmail.com', '', 'PemudaGeorgopol MAN 2 PONOROGO_Ahdi Firdaus Fanani_3x4_nrT2I32Pzg2022-02-27.jpg', 'PemudaGeorgopol MAN 2 PONOROGO_Ahdi Firdaus Fanani_student_id_nrT2I32Pzg2022-02-27.jpg', '', 'Pacitan', 'Ponorogo', 'Ponorogo'),
(145, '2022-02-28', 'Senior High School', 'SMK NEGERI 3 SURABAYA', 'JL.JEND. AHMAD YANI NO.319', 'Rek Tolong Rek', '3', 'bc-sma', '', '', 'Rek Tolong Rek_bukti_transfer_bc_3QZFIz4XZ2022-02-28.jpeg', '', '', '7625118395', 'Naufal Tristan Xavier', 0, 'MAHENDRA ADI SAPUTRA', '0882009687439', '-', 'mahendraadisaputra90@gmail.com', '', 'Rek Tolong Rek_MAHENDRA ADI SAPUTRA_3x4_3QZFIz4XZ2022-02-28.jpeg', 'Rek Tolong Rek_MAHENDRA ADI SAPUTRA_student_id_3QZFIz4XZ2022-02-28.jpeg', 'ADAM IHZA PRAMUDYA', '085891653565', '-', 'adamp8471@gmail.com', '', 'Rek Tolong Rek_ADAM IHZA PRAMUDYA_3x4_3QZFIz4XZ2022-02-28.jpeg', 'Rek Tolong Rek_ADAM IHZA PRAMUDYA_student_id_3QZFIz4XZ2022-02-28.jpeg', 'M.RIFKY ANDIKA PRATAMA', '0822445661725', '-', 'inirifkyyaaa@gmail.com', '', 'Rek Tolong Rek_M.RIFKY ANDIKA PRATAMA_3x4_3QZFIz4XZ2022-02-28.jpeg', 'Rek Tolong Rek_M.RIFKY ANDIKA PRATAMA_student_id_3QZFIz4XZ2022-02-28.jpeg', '', 'Sidoarjo', 'Sidoarjo', 'Sidoarjo'),
(148, '2022-03-04', 'Senior High School', 'SMA DIAN HARAPAN MAKASSAR', 'Tanjung Bunga, Jl. Gunung Agung', 'Schonest Team ', '1', 'bc-sma', '', '', 'Schonest Team _bukti_transfer_bc_Ui2g8aRZ9k2022-03-04.jpg', '', '', '082252235353', 'Gloria Victori Elizabeth', 0, 'Nicholas Tjahjadikarta', '082188399339', 'nichotja', 'hellonicho3@gmail.com', '', 'Schonest Team _Nicholas Tjahjadikarta_3x4_Ui2g8aRZ9k2022-03-04.jpeg', 'Schonest Team _Nicholas Tjahjadikarta_student_id_Ui2g8aRZ9k2022-03-04.jpeg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Makassar', '', ''),
(149, '2022-03-04', 'Senior High School', 'SMA Negri 3 Sidoarjo', 'Jl. DR. Wahidin No.130', 'Nuube', '1', 'bc-sma', '', '', 'Nuube_bukti_transfer_bc_zQ9tcD9RbR2022-03-04.jpg', '', '', '0181706022', 'Yogi Christian', 0, 'Yeheskiel Miracel Kaat', '081230667793', '-', 'yehesssskiel@gmail.com', '', 'Nuube_Yeheskiel Miracel Kaat_3x4_zQ9tcD9RbR2022-03-04.jpeg', 'Nuube_Yeheskiel Miracel Kaat_student_id_zQ9tcD9RbR2022-03-04.jpeg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sidoarjo', '', ''),
(150, '2022-03-04', 'Senior High School', 'SMA KATOLIK UNTUNG SUROPATI', 'JL. UNTUNG SUROPATI', 'GRAIN ', '1', 'bc-sma', '', '', 'GRAIN _bukti_transfer_bc_5RadA5Yjri2022-03-04.jpg', '', '', '0182424941', 'Lydya', 0, 'juven nathaniel', '081333114912', '-', 'juveennnliche@gmail.com', '', 'GRAIN _juven nathaniel_3x4_5RadA5Yjri2022-03-04.jpeg', 'GRAIN _juven nathaniel_student_id_5RadA5Yjri2022-03-04.jpeg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Surbaya', '', ''),
(151, '2022-03-04', 'Senior High School', 'SMA kolose de britto', 'jalan laksada adisucipto', 'The collosians', '1', 'bc-sma', '', '', 'The collosians_bukti_transfer_bc_473mYEHRNH2022-03-04.jpg', '', '', '0181480806', 'jeaneth ', 0, 'Michael Kresno Herprasetyo', '082252235353', '-', 'dm3774776@gmail.com', '', 'The collosians_Michael Kresno Herprasetyo_3x4_473mYEHRNH2022-03-04.jpeg', 'The collosians_Michael Kresno Herprasetyo_student_id_473mYEHRNH2022-03-04.jpeg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Surabaya', '', ''),
(155, '2022-03-04', 'Senior High School', 'SMA Zion', 'jl. Dr. Wahidin Sudirohusodo', 'AGES', '1', 'bc-sma', '', '', 'AGES_bukti_transfer_bc_x7FRnL4sXY2022-03-04.jpeg', '', '', '8735008010', 'Oei Tina Wijaya', 0, 'Justin Alexander Gosal', '085108221111', '-', 'justingo@gmail.com', '', 'AGES_Justin Alexander Gosal_3x4_x7FRnL4sXY2022-03-04.jpeg', 'AGES_Justin Alexander Gosal_student_id_x7FRnL4sXY2022-03-04.jpeg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Makassar', '', ''),
(159, '2022-03-04', 'Senior High School', 'SMA Zion', 'jl. Dr. wahidin sudirohusodo', 'Yebe', '1', 'bc-sma', '', '', 'Yebe_bukti_transfer_bc_h7SkwdfaBX2022-03-04.jpeg', '', '', '082187762975', 'Tifany', 0, 'Jonathan', '082273629272', '-', 'Jonathann34@gmail.com', '', 'Yebe_Jonathan_3x4_h7SkwdfaBX2022-03-04.jpeg', 'Yebe_Jonathan_student_id_h7SkwdfaBX2022-03-04.jpeg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Makassar', '', ''),
(171, '2022-03-04', 'Senior High School', 'SMAIT Al Kahfi', 'Jalan Desa Srogol Kecamatan Cigombong Kab. Bogor, Jawa Barat 16110', 'The Cave', '3', 'bc-sma', '', '', 'The Cave_bukti_transfer_bc_Y3K9hYOE02022-03-04.jpg', '', '', '1630003786', 'RIZQI YULIARTI', 0, 'AHMAD MIZAD', '085642904569', '-', 'ryscout31@gmail.com', '', 'The Cave_AHMAD MIZAD_3x4_Y3K9hYOE02022-03-04.jpg', 'The Cave_AHMAD MIZAD_student_id_Y3K9hYOE02022-03-04.jpeg', 'GHASSAN SHAQUILA BILHAZL RAFIF', '085642904569', '-', 'ryscout31@gmail.com', '', 'The Cave_GHASSAN SHAQUILA BILHAZL RAFIF_3x4_Y3K9hYOE02022-03-04.jpg', 'The Cave_GHASSAN SHAQUILA BILHAZL RAFIF_student_id_Y3K9hYOE02022-03-04.jpeg', 'ABDULLAH AZZAM AR ROYYAN', '085642904569', '-', 'ryscout31@gmail.com', '', 'The Cave_ABDULLAH AZZAM AR ROYYAN_3x4_Y3K9hYOE02022-03-04.jpg', 'The Cave_ABDULLAH AZZAM AR ROYYAN_student_id_Y3K9hYOE02022-03-04.jpeg', '', 'Bogor', 'Bogor', 'Bogor'),
(173, '2022-03-04', 'Senior High School', 'SMA Zion', '-', 'CHAMPS', '1', 'bc-sma', '', '', 'CHAMPS_bukti_transfer_bc_mLgV5kbSBT2022-03-04.jpg', '', '', '3880645471', 'Christopher Felix', 0, 'Meliana Cristine Dewi Winata', '081241403014', '-', 'Melia.Cristinedw@gmail.com', '', 'CHAMPS_Meliana Cristine Dewi Winata_3x4_mLgV5kbSBT2022-03-04.jpg', 'CHAMPS_Meliana Cristine Dewi Winata_student_id_mLgV5kbSBT2022-03-04.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Makassar', '', ''),
(175, '2022-03-04', 'Senior High School', 'SMAK Untung Suropati', 'Jl. Untung Suropati 33', 'CERA\'s', '1', 'bc-sma', '', '', 'CERAs_bukti_transfer_bc_mgLGWVOTN32022-03-04.jpg', '', '', '1302199579', 'Febriana', 0, 'Jessica Beatrice', '082245969279', '-', 'jessi.beatrice@gmail.com', '', 'CERA\'s_Jessica Beatrice_3x4_mgLGWVOTN32022-03-04.jpeg', 'CERA\'s_Jessica Beatrice_student_id_mgLGWVOTN32022-03-04.jpeg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sidoarjo', '', ''),
(176, '2022-03-04', 'Senior High School', 'SMA Katolik Untung Suropati', 'Jl. Untung Suropati 33', 'Shaker', '1', 'bc-sma', '', '', 'Shaker_bukti_transfer_bc_uCBvAKmxch2022-03-04.jpg', '', '', '1130844444', 'Mike Juliana', 0, 'Nathanael Moses Sutanto', '081217391902', '-', 'Mosesnathanaell@gmail.com', '', 'Shaker_Nathanael Moses Sutanto_3x4_uCBvAKmxch2022-03-04.jpeg', 'Shaker_Nathanael Moses Sutanto_student_id_uCBvAKmxch2022-03-04.jpeg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sidoarjo', '', ''),
(177, '2022-03-04', 'Senior High School', 'SMA Katolik Untung Suropati', 'Jl. Untung Suropati 33', 'UCHOL', '1', 'bc-sma', '', '', 'UCHOL_bukti_transfer_bc_keaoaJORf52022-03-04.jpg', '', '', '082332638429', 'Imannuel', 1, 'Anastasya Amilia Putri', '082191290069', '-', 'Anastasyaamilia@gmail.com', '', 'UCHOL_Anastasya Amilia Putri_3x4_keaoaJORf52022-03-04.jpeg', 'UCHOL_Anastasya Amilia Putri_student_id_keaoaJORf52022-03-04.jpeg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Tifany Wira', 'Sidoarjo', '', ''),
(178, '2022-03-04', 'Senior High School', 'SMA Katolik Untung Suropati ', 'Jl. Untung Suropari 33', 'Breaker', '1', 'bc-sma', '', '', 'Breaker_bukti_transfer_bc_CZyDugDIqX2022-03-04.jpg', '', '', '0881854472', 'Stephany', 1, 'Adra Olivia Vebiona', '089605891580', '-', 'Oliviaadraaa@gmail.com', '', 'Breaker_Adra Olivia Vebiona_3x4_CZyDugDIqX2022-03-04.jpeg', 'Breaker_Adra Olivia Vebiona_student_id_CZyDugDIqX2022-03-04.jpeg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Tifany Wira', 'Sidaorjo', '', ''),
(184, '2022-03-04', 'Senior High School', 'SMA Katolik Untung Suropati', 'Jl. Untung Suropati 33', 'SERBIA', '1', 'bc-sma', '', '', 'SERBIA_bukti_transfer_bc_ezCTdF85OQ2022-03-04.jpg', '', '', '0882145962', 'Audrico', 0, 'Rakapurbayu Tito', '085156633620', '-', 'Raka.purbayutito@gmail.com', '', 'SERBIA_Rakapurbayu Tito_3x4_ezCTdF85OQ2022-03-04.jpeg', 'SERBIA_Rakapurbayu Tito_student_id_ezCTdF85OQ2022-03-04.jpeg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sidoarjo', '', ''),
(185, '2022-03-04', 'Senior High School', 'SMA Katolik Rajawali Makassar', '-', 'Unbreakable', '1', 'bc-sma', '', '', 'Unbreakable_bukti_transfer_bc_pYUwF3GUj2022-03-04.jpg', '', '', '6710063468', 'Juan', 0, 'Claudia Eveline', '088242046775', '-', 'claudiaeve@gmail.com', '', 'Unbreakable_Claudia Eveline_3x4_pYUwF3GUj2022-03-04.jpg', 'Unbreakable_Claudia Eveline_student_id_pYUwF3GUj2022-03-04.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Makassar', '', ''),
(186, '2022-03-04', 'Senior High School', 'SMA Kristen Petra 4', 'Jl. Monginsidi 100', 'CAI', '1', 'bc-sma', '', '', 'CAI_bukti_transfer_bc_cOXIIDc7F22022-03-04.jpg', '', '', '2900335043', 'Cornelius', 0, 'Marcel Chrisjohan', '08123066779', '-', 'marcelchris.johan@gmail.com', '', 'CAI_Marcel Chrisjohan_3x4_cOXIIDc7F22022-03-04.jpg', 'CAI_Marcel Chrisjohan_student_id_cOXIIDc7F22022-03-04.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sidoarjo', '', ''),
(187, '2022-03-04', 'Senior High School', 'SMA Kristen Petra 4', 'Jl. Monginsidi 100', 'ASHOY', '1', 'bc-sma', '', '', 'ASHOY_bukti_transfer_bc_8d5CwTxw2t2022-03-04.jpg', '', '', '1580296366', 'Ariya', 0, 'Rendra Mahatma Putra', '08122576109', '-', 'rendramp@gmail.com', '', 'ASHOY_Rendra Mahatma Putra_3x4_8d5CwTxw2t2022-03-04.jpg', 'ASHOY_Rendra Mahatma Putra_student_id_8d5CwTxw2t2022-03-04.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sidaorjo', '', ''),
(190, '2022-03-04', 'Senior High School', 'SMA Kristen Petra 4', 'Jl. Monginsidi 100', 'HORE', '1', 'bc-sma', '', '', 'HORE_bukti_transfer_bc_DNBlfu2e22022-03-04.jpg', '', '', '0882066396', 'Nico', 0, 'Natanael Julius Adrias', '08571285430', '-', 'Juliu.natanael@gmail.com', '', 'HORE_Natanael Julius Adrias_3x4_DNBlfu2e22022-03-04.jpg', 'HORE_Natanael Julius Adrias_student_id_DNBlfu2e22022-03-04.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sidaorjo', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resource`
--

CREATE TABLE `resource` (
  `id` int(11) NOT NULL,
  `resource_name` varchar(256) NOT NULL,
  `normal_price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_skill` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `resource`
--

INSERT INTO `resource` (`id`, `resource_name`, `normal_price`, `image`, `image_skill`) VALUES
(1, 'Kayu', 1000, 'kayu.png', ''),
(2, 'Baja', 1750, 'baja.besi.png', ''),
(3, 'Semen', 1500, 'semen.png', ''),
(4, 'Pasir', 750, 'pasir.png', ''),
(5, 'Pekerja', 2000, 'pekerja.png', ''),
(6, 'Tiket Terbang', 2000, 'Tiket.png', ''),
(7, 'Bom Lvl 1', 6000, 'BOMB LV 1.png', ''),
(8, 'Bom Lvl 2', 10000, 'BOMB LV 2.png', ''),
(9, 'Bom Lvl 3', 14250, 'BOMB LV 3.png', ''),
(10, 'Bom Lvl 4', 16750, 'BOMB LV 3.png', ''),
(11, 'Bom Lvl 5', 18500, 'BOMB LV 5.png', ''),
(12, 'Bom Lvl 6', 22250, 'BOMB LV 6.png', ''),
(13, 'Korek api Kayu', 500, 'korek api.png', ''),
(14, 'HCI', 750, 'hcl.png', ''),
(15, 'Belerang', 1000, 'sulfur.png', ''),
(16, 'Styrofoam', 1500, 'Styrofoam.png', ''),
(17, 'Black Powder', 1750, 'Black powder.png', ''),
(18, 'Inventory Ganda', 18, 'penggandaan.png', '1.png'),
(19, 'Boom Mega Boom', 19, 'boom mega boom.png', '2.png'),
(20, 'Divide Et Impera', 20, 'devide et impera.png', '3.png'),
(21, 'X2 Social Credits', 21, '2x social credit.png', '4.png'),
(22, 'TBL TBL TBL', 22, 'TBL.png', '5.png'),
(23, 'Meteor', 23, 'meteor.png', '6.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `team_name` varchar(256) NOT NULL,
  `money` int(11) NOT NULL,
  `point` float NOT NULL,
  `location_now_id_city` int(11) NOT NULL,
  `cooldown` varchar(256) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `x2_earning` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `team`
--

INSERT INTO `team` (`id`, `username`, `password`, `team_name`, `money`, `point`, `location_now_id_city`, `cooldown`, `status`, `id_lokasi`, `x2_earning`) VALUES
(1, 'BC0001', '081357313002', 'Hendz', 58000, 0, 1, NULL, 1, 0, 0),
(2, 'BC0002', '081249266337', 'Treasure', 100000, 0, 1, NULL, 0, 0, 0),
(3, 'BC0003', '0895401603180', 'cuanciak', 100000, 0, 1, NULL, 0, 0, 0),
(4, 'BC0004', '089674368088', 'Renjana Team', 100000, 0, 1, NULL, 0, 0, 0),
(5, 'BC0005', '0809676335803', 'Nalpoint Built', 100000, 0, 1, NULL, 0, 0, 0),
(6, 'BC0006', '089659466926', 'Aselabar', 100000, 0, 1, NULL, 0, 0, 0),
(7, 'BC0007', '08998838023', 'Lucky Priafus', 100000, 0, 1, NULL, 0, 0, 0),
(8, 'BC0008', '085943462811', 'SRIKANDI TEAM', 100000, 0, 1, NULL, 0, 0, 0),
(9, 'BC0009', '089652275377', 'BIMA TEAM', 100000, 0, 1, NULL, 0, 0, 0),
(10, 'BC0010', '085257256677', 'Survey corps', 100000, 0, 1, NULL, 0, 0, 0),
(11, 'BC0011', '081930391199', 'TT', 100000, 0, 1, NULL, 0, 0, 0),
(12, 'BC0012', '082232031883', 'Three Musketeerz', 100000, 0, 1, NULL, 0, 0, 0),
(13, 'BC0013', '082244191159', 'STELMA 1 ', 100000, 0, 1, NULL, 0, 0, 0),
(14, 'BC0014', '081217641326', 'STELMA 2', 100000, 0, 1, NULL, 0, 0, 0),
(15, 'BC0015', '085339302203', 'STELMA 3', 100000, 0, 1, NULL, 0, 0, 0),
(16, 'BC0016', '08113060073', 'zio', 100000, 0, 1, '', 0, 0, 0),
(17, 'BC0017', '082134259036', 'PemudaGeorgopol MAN 2 PONOROGO', 100000, 0, 1, NULL, 0, 0, 0),
(18, 'BC0018', '0882009687439', 'Rek Tolong Rek', 100000, 0, 1, NULL, 0, 0, 0),
(19, 'BC0019', '082188399339', 'Schonest Team ', 100000, 0, 1, NULL, 0, 0, 0),
(20, 'BC0020', '081230667793', 'Nuube', 100000, 0, 1, NULL, 0, 0, 0),
(21, 'BC0021', '081333114912', 'GRAIN ', 100000, 0, 1, NULL, 0, 0, 0),
(22, 'BC0022', '082252235353', 'The collosians', 100000, 0, 1, NULL, 0, 0, 0),
(23, 'BC0023', '085108221111', 'AGES', 100000, 0, 1, NULL, 0, 0, 0),
(24, 'BC0024', '082273629272', 'Yebe', 100000, 0, 1, NULL, 0, 0, 0),
(25, 'BC0025', '085642904569', 'The Cave', 100000, 0, 1, NULL, 0, 0, 0),
(26, 'BC0026', '081241403014', 'CHAMPS', 100000, 0, 1, NULL, 0, 0, 0),
(27, 'BC0027', '082245969279', 'CERA\'s', 100000, 0, 1, NULL, 0, 0, 0),
(28, 'BC0028', '081217391902', 'Shaker', 100000, 0, 1, NULL, 0, 0, 0),
(29, 'BC0029', '082191290069', 'UCHOL', 100000, 0, 1, NULL, 0, 0, 0),
(30, 'BC0030', '089605891580', 'Breaker', 100000, 0, 1, NULL, 0, 0, 0),
(31, 'BC0031', '085156633620', 'SERBIA', 100000, 0, 1, NULL, 0, 0, 0),
(32, 'BC0032', '088242046775', 'Unbreakable', 100000, 0, 1, NULL, 0, 0, 0),
(33, 'BC0033', '08123066779', 'CAI', 100000, 0, 1, NULL, 0, 0, 0),
(34, 'BC0034', '08122576109', 'ASHOY', 100000, 0, 1, NULL, 0, 0, 0),
(35, 'BC0035', '08571285430', 'HORE', 100000, 0, 1, NULL, 0, 0, 0),
(36, 'adminpce', 'pce2121', 'ADMIN NIH BOS', 9945999, 0, 1, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `team_constructed_building`
--

CREATE TABLE `team_constructed_building` (
  `id` int(11) NOT NULL,
  `id_building_type` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `id_team` int(11) NOT NULL,
  `time` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `team_constructed_building`
--

INSERT INTO `team_constructed_building` (`id`, `id_building_type`, `id_city`, `id_team`, `time`) VALUES
(12, 7, 3, 9, '27-03-2021 13:16:41'),
(11, 8, 3, 9, '27-03-2021 13:16:38'),
(10, 9, 3, 9, '27-03-2021 13:16:37'),
(9, 6, 3, 9, '27-03-2021 13:16:35'),
(8, 5, 3, 9, '27-03-2021 13:16:33'),
(7, 4, 3, 9, '27-03-2021 13:16:31'),
(13, 4, 4, 11, '27-03-2021 13:16:45'),
(14, 9, 5, 8, '27-03-2021 13:16:58'),
(15, 8, 5, 8, '27-03-2021 13:17:00'),
(16, 7, 5, 8, '27-03-2021 13:17:02'),
(17, 6, 5, 8, '27-03-2021 13:17:05'),
(18, 5, 5, 8, '27-03-2021 13:17:07'),
(19, 4, 5, 8, '27-03-2021 13:17:10'),
(20, 1, 3, 14, '27-03-2021 13:17:15'),
(21, 2, 3, 14, '27-03-2021 13:17:18'),
(22, 1, 1, 26, '27-03-2021 13:17:20'),
(23, 3, 3, 14, '27-03-2021 13:17:21'),
(24, 2, 1, 26, '27-03-2021 13:17:24'),
(25, 4, 3, 14, '27-03-2021 13:17:26'),
(26, 1, 2, 27, '27-03-2021 13:17:27'),
(27, 3, 1, 26, '27-03-2021 13:17:27'),
(28, 4, 1, 26, '27-03-2021 13:17:30'),
(29, 5, 3, 14, '27-03-2021 13:17:30'),
(30, 6, 3, 14, '27-03-2021 13:17:33'),
(31, 6, 1, 26, '27-03-2021 13:17:41'),
(32, 1, 4, 1, '27-03-2021 13:17:42'),
(33, 2, 4, 1, '27-03-2021 13:17:45'),
(34, 3, 4, 1, '27-03-2021 13:17:47'),
(35, 4, 4, 1, '27-03-2021 13:17:51'),
(36, 6, 4, 1, '27-03-2021 13:17:55'),
(37, 5, 4, 11, '27-03-2021 13:18:03'),
(38, 7, 4, 1, '27-03-2021 13:18:12'),
(39, 1, 1, 25, '27-03-2021 13:18:14'),
(40, 8, 4, 1, '27-03-2021 13:18:14'),
(41, 9, 4, 1, '27-03-2021 13:18:16'),
(42, 1, 1, 29, '27-03-2021 13:18:20'),
(43, 2, 2, 27, '27-03-2021 13:18:20'),
(44, 2, 1, 29, '27-03-2021 13:18:22'),
(45, 3, 1, 29, '27-03-2021 13:18:24'),
(46, 7, 1, 26, '27-03-2021 13:18:26'),
(47, 4, 5, 9, '27-03-2021 13:18:29'),
(48, 5, 5, 9, '27-03-2021 13:18:31'),
(49, 6, 5, 9, '27-03-2021 13:18:33'),
(50, 6, 4, 11, '27-03-2021 13:18:33'),
(51, 8, 5, 9, '27-03-2021 13:18:35'),
(52, 9, 5, 9, '27-03-2021 13:18:36'),
(53, 7, 5, 9, '27-03-2021 13:18:38'),
(54, 9, 1, 26, '27-03-2021 13:18:40'),
(55, 8, 1, 26, '27-03-2021 13:18:46'),
(56, 2, 1, 25, '27-03-2021 13:18:51'),
(57, 3, 1, 25, '27-03-2021 13:18:59'),
(58, 5, 4, 1, '27-03-2021 13:19:00'),
(59, 6, 1, 29, '27-03-2021 13:19:03'),
(60, 5, 1, 29, '27-03-2021 13:19:05'),
(61, 6, 3, 21, '27-03-2021 13:19:07'),
(62, 5, 3, 21, '27-03-2021 13:19:09'),
(63, 5, 2, 27, '27-03-2021 13:19:11'),
(64, 4, 3, 21, '27-03-2021 13:19:11'),
(65, 1, 3, 21, '27-03-2021 13:19:14'),
(66, 2, 3, 21, '27-03-2021 13:19:16'),
(67, 4, 1, 29, '27-03-2021 13:19:21'),
(68, 1, 5, 30, '27-03-2021 13:19:27'),
(69, 1, 6, 15, '27-03-2021 13:19:31'),
(70, 2, 6, 15, '27-03-2021 13:19:33'),
(71, 2, 5, 30, '27-03-2021 13:19:35'),
(72, 3, 5, 30, '27-03-2021 13:19:39'),
(73, 5, 1, 26, '27-03-2021 13:19:40'),
(74, 7, 4, 11, '27-03-2021 13:19:47'),
(75, 3, 3, 21, '27-03-2021 13:19:47'),
(76, 6, 5, 30, '27-03-2021 13:19:49'),
(77, 4, 1, 25, '27-03-2021 13:19:51'),
(78, 5, 5, 30, '27-03-2021 13:19:53'),
(79, 5, 1, 25, '27-03-2021 13:19:53'),
(80, 4, 5, 30, '27-03-2021 13:19:57'),
(81, 6, 1, 25, '27-03-2021 13:19:58'),
(82, 3, 6, 15, '27-03-2021 13:20:04'),
(83, 1, 3, 20, '27-03-2021 13:20:24'),
(84, 2, 3, 20, '27-03-2021 13:20:26'),
(85, 8, 4, 11, '27-03-2021 13:20:54'),
(86, 7, 1, 25, '27-03-2021 13:21:01'),
(87, 8, 1, 25, '27-03-2021 13:21:04'),
(88, 1, 3, 28, '27-03-2021 13:21:07'),
(89, 2, 3, 28, '27-03-2021 13:21:14'),
(90, 1, 1, 2, '27-03-2021 13:21:15'),
(91, 9, 1, 25, '27-03-2021 13:21:18'),
(92, 2, 1, 2, '27-03-2021 13:21:18'),
(93, 3, 1, 2, '27-03-2021 13:21:21'),
(94, 4, 1, 2, '27-03-2021 13:21:24'),
(95, 5, 1, 2, '27-03-2021 13:21:26'),
(96, 6, 1, 2, '27-03-2021 13:21:29'),
(97, 3, 2, 27, '27-03-2021 13:21:29'),
(98, 6, 3, 6, '27-03-2021 13:21:32'),
(99, 9, 4, 11, '27-03-2021 13:21:35'),
(100, 3, 3, 28, '27-03-2021 13:21:37'),
(101, 5, 3, 6, '27-03-2021 13:21:44'),
(102, 4, 3, 6, '27-03-2021 13:21:47'),
(103, 1, 4, 11, '27-03-2021 13:22:01'),
(104, 3, 3, 6, '27-03-2021 13:22:03'),
(105, 2, 3, 6, '27-03-2021 13:22:16'),
(106, 1, 3, 6, '27-03-2021 13:22:16'),
(107, 1, 6, 25, '27-03-2021 13:22:22'),
(108, 2, 4, 11, '27-03-2021 13:22:30'),
(109, 3, 4, 11, '27-03-2021 13:22:32'),
(110, 4, 3, 28, '27-03-2021 13:22:43'),
(111, 1, 5, 23, '27-03-2021 13:22:43'),
(112, 2, 5, 23, '27-03-2021 13:22:45'),
(113, 3, 5, 23, '27-03-2021 13:22:48'),
(114, 3, 3, 20, '27-03-2021 13:22:49'),
(115, 4, 5, 23, '27-03-2021 13:22:53'),
(116, 5, 5, 23, '27-03-2021 13:22:55'),
(117, 6, 3, 28, '27-03-2021 13:22:56'),
(118, 6, 5, 23, '27-03-2021 13:22:58'),
(119, 2, 6, 25, '27-03-2021 13:23:00'),
(120, 3, 6, 25, '27-03-2021 13:23:03'),
(121, 7, 5, 23, '27-03-2021 13:23:03'),
(122, 8, 5, 23, '27-03-2021 13:23:05'),
(123, 9, 5, 23, '27-03-2021 13:23:08'),
(124, 9, 6, 15, '27-03-2021 13:23:25'),
(125, 4, 6, 25, '27-03-2021 13:23:50'),
(126, 5, 6, 25, '27-03-2021 13:23:52'),
(127, 1, 4, 29, '27-03-2021 13:23:55'),
(128, 6, 6, 25, '27-03-2021 13:23:55'),
(129, 2, 4, 29, '27-03-2021 13:23:57'),
(130, 3, 4, 29, '27-03-2021 13:23:59'),
(131, 4, 4, 29, '27-03-2021 13:24:02'),
(132, 7, 6, 25, '27-03-2021 13:24:02'),
(133, 5, 4, 29, '27-03-2021 13:24:03'),
(134, 6, 4, 29, '27-03-2021 13:24:05'),
(135, 8, 6, 25, '27-03-2021 13:24:21'),
(136, 9, 6, 25, '27-03-2021 13:24:23'),
(137, 1, 6, 2, '27-03-2021 13:24:37'),
(138, 2, 6, 2, '27-03-2021 13:24:38'),
(139, 3, 6, 2, '27-03-2021 13:24:40'),
(140, 4, 2, 27, '27-03-2021 13:25:21'),
(141, 8, 6, 15, '27-03-2021 13:25:30'),
(142, 7, 6, 15, '27-03-2021 13:25:32'),
(143, 7, 3, 19, '27-03-2021 13:25:49'),
(144, 7, 3, 21, '27-03-2021 13:25:51'),
(145, 4, 6, 2, '27-03-2021 13:25:56'),
(146, 5, 6, 2, '27-03-2021 13:25:58'),
(147, 6, 2, 27, '27-03-2021 13:26:00'),
(148, 8, 3, 19, '27-03-2021 13:26:06'),
(149, 9, 3, 19, '27-03-2021 13:26:09'),
(150, 5, 3, 19, '27-03-2021 13:27:06'),
(151, 6, 3, 19, '27-03-2021 13:27:09'),
(152, 4, 3, 19, '27-03-2021 13:27:19'),
(153, 6, 3, 19, '27-03-2021 13:27:21'),
(154, 4, 6, 15, '27-03-2021 13:28:37'),
(155, 5, 6, 15, '27-03-2021 13:28:39'),
(156, 6, 6, 15, '27-03-2021 13:28:41'),
(157, 1, 2, 20, '27-03-2021 13:28:55'),
(158, 2, 2, 20, '27-03-2021 13:28:58'),
(159, 3, 2, 20, '27-03-2021 13:29:00'),
(160, 4, 2, 9, '27-03-2021 13:33:53'),
(161, 5, 2, 9, '27-03-2021 13:33:55'),
(162, 6, 2, 9, '27-03-2021 13:33:58'),
(163, 8, 2, 9, '27-03-2021 13:34:00'),
(164, 9, 2, 9, '27-03-2021 13:34:02'),
(165, 7, 2, 9, '27-03-2021 13:34:03'),
(166, 1, 2, 18, '27-03-2021 13:48:49'),
(167, 6, 2, 20, '27-03-2021 13:49:00'),
(168, 5, 2, 20, '27-03-2021 13:49:04'),
(169, 1, 4, 14, '27-03-2021 13:49:38'),
(170, 2, 4, 14, '27-03-2021 13:49:41'),
(171, 3, 4, 14, '27-03-2021 13:49:44'),
(172, 4, 4, 14, '27-03-2021 13:49:51'),
(173, 5, 4, 14, '27-03-2021 13:49:54'),
(174, 6, 4, 14, '27-03-2021 13:49:58'),
(175, 1, 4, 15, '27-03-2021 13:51:39'),
(176, 2, 4, 15, '27-03-2021 13:51:42'),
(177, 3, 4, 15, '27-03-2021 13:51:44'),
(178, 8, 2, 18, '27-03-2021 13:53:09'),
(179, 4, 2, 18, '27-03-2021 13:54:56'),
(180, 7, 4, 15, '27-03-2021 13:55:08'),
(181, 8, 4, 15, '27-03-2021 13:55:10'),
(182, 9, 4, 15, '27-03-2021 13:55:12'),
(183, 1, 1, 8, '27-03-2021 13:56:50'),
(184, 2, 1, 8, '27-03-2021 13:56:52'),
(185, 3, 1, 8, '27-03-2021 13:56:55'),
(186, 4, 1, 8, '27-03-2021 13:56:57'),
(187, 5, 1, 8, '27-03-2021 13:57:00'),
(188, 6, 6, 2, '27-03-2021 13:57:04'),
(189, 6, 1, 8, '27-03-2021 13:57:53'),
(190, 7, 1, 8, '27-03-2021 13:57:56'),
(191, 8, 1, 8, '27-03-2021 13:57:57'),
(192, 9, 1, 8, '27-03-2021 13:57:59'),
(193, 3, 2, 18, '27-03-2021 13:58:05'),
(194, 7, 6, 2, '27-03-2021 13:59:31'),
(195, 8, 6, 2, '27-03-2021 13:59:33'),
(196, 9, 6, 2, '27-03-2021 14:00:13'),
(197, 9, 1, 2, '27-03-2021 14:05:47'),
(198, 8, 1, 2, '27-03-2021 14:05:49'),
(199, 7, 1, 2, '27-03-2021 14:05:51'),
(200, 7, 2, 27, '27-03-2021 14:06:12'),
(201, 6, 2, 18, '27-03-2021 14:07:40'),
(202, 8, 3, 1, '27-03-2021 14:22:39'),
(203, 1, 2, 2, '27-03-2021 14:23:25'),
(204, 2, 2, 2, '27-03-2021 14:23:26'),
(205, 3, 2, 2, '27-03-2021 14:23:28'),
(206, 4, 2, 20, '27-03-2021 14:24:00'),
(207, 4, 2, 2, '27-03-2021 14:24:37'),
(208, 5, 2, 2, '27-03-2021 14:24:49'),
(209, 6, 2, 2, '27-03-2021 14:24:51'),
(210, 1, 6, 14, '27-03-2021 14:24:52'),
(211, 2, 6, 14, '27-03-2021 14:24:55'),
(212, 3, 6, 14, '27-03-2021 14:24:58'),
(213, 4, 6, 14, '27-03-2021 14:25:02'),
(214, 5, 6, 14, '27-03-2021 14:25:04'),
(215, 6, 6, 14, '27-03-2021 14:25:07'),
(216, 8, 1, 9, '27-03-2021 14:25:56'),
(217, 1, 1, 30, '27-03-2021 14:29:15'),
(218, 8, 4, 6, '27-03-2021 14:30:00'),
(219, 1, 1, 21, '27-03-2021 14:30:01'),
(220, 6, 4, 6, '27-03-2021 14:30:19'),
(221, 7, 4, 6, '27-03-2021 14:30:26'),
(222, 6, 1, 21, '27-03-2021 14:30:44'),
(223, 1, 6, 26, '27-03-2021 14:31:04'),
(224, 2, 6, 26, '27-03-2021 14:31:09'),
(225, 3, 6, 26, '27-03-2021 14:31:13'),
(226, 4, 6, 26, '27-03-2021 14:31:18'),
(227, 6, 6, 26, '27-03-2021 14:32:50'),
(228, 5, 6, 26, '27-03-2021 14:34:00'),
(229, 7, 6, 26, '27-03-2021 14:37:24'),
(230, 8, 6, 26, '27-03-2021 14:38:41'),
(231, 9, 6, 26, '27-03-2021 14:38:44'),
(232, 1, 2, 29, '27-03-2021 14:40:43'),
(233, 2, 2, 29, '27-03-2021 14:40:45'),
(234, 3, 2, 29, '27-03-2021 14:40:48'),
(235, 4, 2, 29, '27-03-2021 14:40:51'),
(236, 5, 2, 29, '27-03-2021 14:40:53'),
(237, 6, 2, 29, '27-03-2021 14:40:55'),
(238, 4, 4, 15, '27-03-2021 14:49:47'),
(239, 3, 3, 1, '27-03-2021 14:49:48'),
(240, 5, 4, 15, '27-03-2021 14:49:49'),
(241, 1, 1, 14, '27-03-2021 14:49:49'),
(242, 2, 3, 1, '27-03-2021 14:49:50'),
(243, 6, 4, 15, '27-03-2021 14:49:51'),
(244, 2, 1, 14, '27-03-2021 14:49:51'),
(245, 1, 3, 1, '27-03-2021 14:49:53'),
(246, 3, 1, 14, '27-03-2021 14:49:55'),
(247, 7, 3, 1, '27-03-2021 14:49:55'),
(248, 9, 3, 1, '27-03-2021 14:49:57'),
(249, 4, 1, 14, '27-03-2021 14:49:59'),
(250, 5, 1, 14, '27-03-2021 14:50:01'),
(251, 1, 5, 8, '27-03-2021 14:50:05'),
(252, 6, 1, 14, '27-03-2021 14:50:06'),
(253, 2, 5, 8, '27-03-2021 14:50:08'),
(254, 4, 3, 11, '27-03-2021 14:50:09'),
(255, 3, 5, 8, '27-03-2021 14:50:10'),
(256, 5, 3, 11, '27-03-2021 14:50:12'),
(257, 9, 4, 6, '27-03-2021 14:50:29'),
(258, 8, 3, 11, '27-03-2021 14:50:48'),
(259, 5, 4, 6, '27-03-2021 14:51:25'),
(260, 4, 4, 6, '27-03-2021 14:51:27'),
(261, 7, 5, 21, '27-03-2021 14:52:28'),
(262, 8, 5, 21, '27-03-2021 14:52:32'),
(263, 9, 5, 21, '27-03-2021 14:52:34'),
(264, 2, 5, 20, '27-03-2021 14:52:41'),
(265, 1, 4, 6, '27-03-2021 14:52:53'),
(266, 2, 4, 6, '27-03-2021 14:52:56'),
(267, 1, 5, 15, '27-03-2021 14:52:58'),
(268, 2, 5, 15, '27-03-2021 14:53:00'),
(269, 3, 5, 20, '27-03-2021 14:53:02'),
(270, 3, 5, 15, '27-03-2021 14:53:02'),
(271, 9, 5, 15, '27-03-2021 14:53:07'),
(272, 8, 5, 15, '27-03-2021 14:53:09'),
(273, 1, 5, 20, '27-03-2021 14:53:09'),
(274, 1, 6, 1, '27-03-2021 14:53:10'),
(275, 7, 5, 15, '27-03-2021 14:53:12'),
(276, 2, 6, 1, '27-03-2021 14:53:12'),
(277, 3, 6, 1, '27-03-2021 14:53:14'),
(278, 9, 6, 1, '27-03-2021 14:53:17'),
(279, 1, 4, 24, '27-03-2021 14:53:33'),
(280, 2, 4, 24, '27-03-2021 14:53:36'),
(281, 3, 4, 6, '27-03-2021 14:53:37'),
(282, 3, 4, 24, '27-03-2021 14:53:40'),
(283, 3, 5, 21, '27-03-2021 14:53:41'),
(284, 2, 5, 21, '27-03-2021 14:53:43'),
(285, 1, 5, 21, '27-03-2021 14:53:45'),
(286, 4, 4, 24, '27-03-2021 14:53:47'),
(287, 7, 4, 24, '27-03-2021 14:54:01'),
(288, 4, 5, 15, '27-03-2021 14:54:11'),
(289, 5, 5, 15, '27-03-2021 14:54:13'),
(290, 6, 5, 15, '27-03-2021 14:54:15'),
(291, 6, 3, 11, '27-03-2021 14:55:42'),
(292, 9, 3, 11, '27-03-2021 14:55:43'),
(293, 7, 3, 11, '27-03-2021 14:56:02'),
(294, 6, 5, 20, '27-03-2021 14:56:26'),
(295, 8, 6, 1, '27-03-2021 14:56:30'),
(296, 4, 4, 9, '27-03-2021 14:57:18'),
(297, 5, 4, 9, '27-03-2021 14:57:21'),
(298, 6, 4, 9, '27-03-2021 14:57:50'),
(299, 3, 1, 6, '27-03-2021 14:57:57'),
(300, 2, 1, 6, '27-03-2021 14:58:00'),
(301, 1, 1, 6, '27-03-2021 14:58:02'),
(302, 7, 4, 9, '27-03-2021 14:58:07'),
(303, 6, 1, 6, '27-03-2021 14:58:09'),
(304, 5, 1, 6, '27-03-2021 14:58:11'),
(305, 4, 1, 6, '27-03-2021 14:58:12'),
(306, 7, 2, 18, '27-03-2021 14:58:28'),
(307, 1, 2, 25, '27-03-2021 14:58:43'),
(308, 2, 2, 25, '27-03-2021 14:58:47'),
(309, 4, 1, 30, '27-03-2021 14:59:10'),
(310, 6, 1, 30, '27-03-2021 14:59:13'),
(311, 3, 1, 30, '27-03-2021 14:59:31'),
(312, 9, 2, 18, '27-03-2021 14:59:51'),
(313, 3, 2, 25, '27-03-2021 14:59:53'),
(314, 3, 2, 25, '27-03-2021 14:59:54'),
(315, 4, 2, 25, '27-03-2021 14:59:59'),
(316, 8, 4, 9, '27-03-2021 15:00:04'),
(317, 9, 4, 9, '27-03-2021 15:00:07'),
(318, 5, 2, 25, '27-03-2021 15:00:27'),
(319, 6, 2, 25, '27-03-2021 15:00:28'),
(320, 6, 2, 25, '27-03-2021 15:00:32'),
(321, 5, 2, 18, '27-03-2021 15:01:43'),
(322, 7, 2, 25, '27-03-2021 15:01:46'),
(323, 8, 2, 25, '27-03-2021 15:01:57'),
(324, 8, 2, 27, '27-03-2021 15:02:03'),
(325, 9, 2, 25, '27-03-2021 15:02:03'),
(326, 9, 2, 27, '27-03-2021 15:02:38'),
(327, 1, 4, 27, '27-03-2021 15:04:19'),
(328, 2, 4, 27, '27-03-2021 15:04:23'),
(329, 1, 2, 14, '27-03-2021 15:04:32'),
(330, 3, 4, 27, '27-03-2021 15:04:33'),
(331, 2, 2, 14, '27-03-2021 15:04:34'),
(332, 3, 2, 14, '27-03-2021 15:04:38'),
(333, 4, 2, 14, '27-03-2021 15:04:42'),
(334, 5, 2, 14, '27-03-2021 15:04:44'),
(335, 6, 2, 14, '27-03-2021 15:04:48'),
(336, 4, 4, 27, '27-03-2021 15:05:09'),
(337, 5, 4, 27, '27-03-2021 15:05:17'),
(338, 6, 4, 27, '27-03-2021 15:05:25'),
(339, 1, 3, 11, '27-03-2021 15:05:43'),
(340, 7, 4, 27, '27-03-2021 15:06:26'),
(341, 8, 4, 27, '27-03-2021 15:06:37'),
(342, 9, 4, 27, '27-03-2021 15:06:49'),
(343, 9, 2, 2, '27-03-2021 15:14:00'),
(344, 5, 3, 28, '27-03-2021 15:14:15'),
(345, 7, 2, 2, '27-03-2021 15:14:15'),
(346, 7, 3, 28, '27-03-2021 15:14:19'),
(347, 8, 3, 28, '27-03-2021 15:14:22'),
(348, 1, 3, 15, '27-03-2021 15:14:24'),
(349, 9, 3, 28, '27-03-2021 15:14:25'),
(350, 2, 3, 15, '27-03-2021 15:14:26'),
(351, 3, 3, 15, '27-03-2021 15:14:29'),
(352, 7, 3, 15, '27-03-2021 15:14:36'),
(353, 8, 3, 15, '27-03-2021 15:15:10'),
(354, 9, 3, 15, '27-03-2021 15:15:13'),
(355, 1, 6, 6, '27-03-2021 15:15:18'),
(356, 9, 6, 6, '27-03-2021 15:15:18'),
(357, 2, 6, 6, '27-03-2021 15:15:20'),
(358, 1, 4, 28, '27-03-2021 15:15:33'),
(359, 8, 2, 2, '27-03-2021 15:15:35'),
(360, 2, 4, 28, '27-03-2021 15:15:37'),
(361, 3, 4, 28, '27-03-2021 15:15:42'),
(362, 7, 1, 21, '27-03-2021 15:15:52'),
(363, 8, 1, 21, '27-03-2021 15:15:54'),
(364, 9, 1, 21, '27-03-2021 15:15:57'),
(365, 4, 3, 15, '27-03-2021 15:16:08'),
(366, 6, 3, 15, '27-03-2021 15:16:26'),
(367, 4, 6, 9, '27-03-2021 15:16:28'),
(368, 5, 6, 9, '27-03-2021 15:16:33'),
(369, 3, 6, 6, '27-03-2021 15:16:50'),
(370, 4, 4, 28, '27-03-2021 15:16:58'),
(371, 8, 6, 9, '27-03-2021 15:17:02'),
(372, 6, 4, 28, '27-03-2021 15:17:06'),
(373, 8, 6, 6, '27-03-2021 15:17:07'),
(374, 2, 1, 21, '27-03-2021 15:17:17'),
(375, 3, 1, 21, '27-03-2021 15:17:20'),
(376, 8, 2, 19, '27-03-2021 15:17:23'),
(377, 7, 6, 6, '27-03-2021 15:17:26'),
(378, 9, 2, 19, '27-03-2021 15:17:26'),
(379, 7, 6, 9, '27-03-2021 15:17:33'),
(380, 9, 6, 9, '27-03-2021 15:17:37'),
(381, 5, 3, 15, '27-03-2021 15:18:01'),
(382, 7, 2, 19, '27-03-2021 15:18:11'),
(383, 1, 2, 19, '27-03-2021 15:19:18'),
(384, 2, 2, 18, '27-03-2021 15:19:53'),
(385, 1, 4, 26, '27-03-2021 15:21:20'),
(386, 2, 4, 26, '27-03-2021 15:21:25'),
(387, 3, 4, 26, '27-03-2021 15:21:30'),
(388, 4, 4, 26, '27-03-2021 15:22:13'),
(389, 4, 6, 8, '27-03-2021 15:22:41'),
(390, 5, 6, 8, '27-03-2021 15:22:44'),
(391, 6, 6, 8, '27-03-2021 15:22:46'),
(392, 6, 4, 26, '27-03-2021 15:22:46'),
(393, 5, 5, 20, '27-03-2021 15:25:29'),
(394, 4, 5, 20, '27-03-2021 15:25:40'),
(395, 4, 5, 2, '27-03-2021 15:25:51'),
(396, 5, 4, 24, '27-03-2021 15:27:42'),
(397, 6, 4, 24, '27-03-2021 15:28:53'),
(398, 8, 4, 24, '27-03-2021 15:35:42'),
(399, 9, 4, 24, '27-03-2021 15:36:23'),
(400, 2, 5, 29, '27-03-2021 15:37:15'),
(401, 3, 5, 29, '27-03-2021 15:37:18'),
(402, 4, 5, 29, '27-03-2021 15:37:24'),
(403, 5, 5, 29, '27-03-2021 15:37:27'),
(404, 6, 5, 29, '27-03-2021 15:37:48'),
(405, 9, 5, 20, '27-03-2021 15:37:50'),
(406, 1, 5, 29, '27-03-2021 15:37:52'),
(407, 1, 5, 24, '27-03-2021 15:38:18'),
(408, 8, 5, 20, '27-03-2021 15:38:52'),
(409, 7, 6, 1, '27-03-2021 15:39:31'),
(410, 4, 1, 11, '27-03-2021 15:39:46'),
(411, 7, 5, 20, '27-03-2021 15:39:47'),
(412, 5, 1, 11, '27-03-2021 15:41:09'),
(413, 6, 1, 11, '27-03-2021 15:41:21'),
(414, 7, 1, 11, '27-03-2021 15:41:44'),
(415, 1, 1, 1, '27-03-2021 15:42:11'),
(416, 8, 1, 11, '27-03-2021 15:42:22'),
(417, 2, 1, 1, '27-03-2021 15:42:32'),
(418, 3, 1, 1, '27-03-2021 15:42:34'),
(419, 9, 1, 11, '27-03-2021 15:42:47'),
(420, 1, 5, 14, '27-03-2021 15:43:03'),
(421, 1, 1, 15, '27-03-2021 15:43:32'),
(422, 1, 3, 25, '27-03-2021 15:43:51'),
(423, 2, 3, 25, '27-03-2021 15:43:55'),
(424, 3, 3, 25, '27-03-2021 15:44:00'),
(425, 2, 5, 14, '27-03-2021 15:44:10'),
(426, 6, 3, 25, '27-03-2021 15:44:47'),
(427, 5, 3, 25, '27-03-2021 15:45:00'),
(428, 4, 3, 25, '27-03-2021 15:45:05'),
(429, 3, 5, 14, '27-03-2021 15:45:05'),
(430, 1, 2, 6, '27-03-2021 15:45:18'),
(431, 2, 2, 6, '27-03-2021 15:45:21'),
(432, 3, 2, 6, '27-03-2021 15:45:23'),
(433, 5, 4, 26, '27-03-2021 15:45:26'),
(434, 7, 1, 1, '27-03-2021 15:45:34'),
(435, 2, 1, 15, '27-03-2021 15:46:00'),
(436, 7, 4, 26, '27-03-2021 15:46:01'),
(437, 1, 2, 23, '27-03-2021 15:46:15'),
(438, 3, 1, 15, '27-03-2021 15:46:16'),
(439, 2, 2, 23, '27-03-2021 15:46:17'),
(440, 3, 2, 23, '27-03-2021 15:46:20'),
(441, 4, 2, 23, '27-03-2021 15:46:26'),
(442, 5, 2, 23, '27-03-2021 15:46:29'),
(443, 6, 2, 23, '27-03-2021 15:46:32'),
(444, 7, 3, 25, '27-03-2021 15:46:52'),
(445, 7, 2, 23, '27-03-2021 15:47:04'),
(446, 9, 1, 1, '27-03-2021 15:47:13'),
(447, 9, 4, 26, '27-03-2021 15:47:17'),
(448, 8, 2, 23, '27-03-2021 15:47:20'),
(449, 6, 5, 14, '27-03-2021 15:47:32'),
(450, 9, 2, 23, '27-03-2021 15:47:35'),
(451, 1, 6, 21, '27-03-2021 15:47:44'),
(452, 2, 6, 21, '27-03-2021 15:47:46'),
(453, 3, 6, 21, '27-03-2021 15:47:49'),
(454, 5, 5, 14, '27-03-2021 15:48:56'),
(455, 9, 6, 21, '27-03-2021 15:49:01'),
(456, 8, 6, 21, '27-03-2021 15:49:03'),
(457, 7, 6, 21, '27-03-2021 15:49:05'),
(458, 9, 1, 9, '27-03-2021 15:49:12'),
(459, 4, 6, 11, '27-03-2021 15:49:24'),
(460, 1, 6, 8, '27-03-2021 15:49:33'),
(461, 2, 6, 8, '27-03-2021 15:49:38'),
(462, 7, 1, 9, '27-03-2021 15:49:47'),
(463, 4, 1, 9, '27-03-2021 15:50:30'),
(464, 5, 1, 9, '27-03-2021 15:51:00'),
(465, 3, 1, 18, '27-03-2021 15:51:14'),
(466, 4, 6, 21, '27-03-2021 15:51:39'),
(467, 5, 6, 21, '27-03-2021 15:51:41'),
(468, 6, 6, 21, '27-03-2021 15:51:43'),
(469, 6, 1, 9, '27-03-2021 15:54:59'),
(470, 7, 2, 20, '27-03-2021 15:55:03'),
(471, 3, 6, 8, '27-03-2021 15:55:11'),
(472, 3, 6, 29, '27-03-2021 15:55:18'),
(473, 7, 6, 8, '27-03-2021 15:55:26'),
(474, 1, 6, 29, '27-03-2021 15:55:27'),
(475, 8, 6, 8, '27-03-2021 15:55:28'),
(476, 9, 6, 8, '27-03-2021 15:55:32'),
(477, 2, 6, 29, '27-03-2021 15:55:37'),
(478, 2, 1, 30, '27-03-2021 15:55:58'),
(479, 6, 6, 9, '27-03-2021 15:56:34'),
(480, 5, 1, 30, '27-03-2021 15:56:35'),
(481, 6, 6, 29, '27-03-2021 15:56:40'),
(482, 5, 6, 29, '27-03-2021 15:57:06'),
(483, 4, 6, 29, '27-03-2021 15:57:30'),
(484, 1, 3, 8, '27-03-2021 15:58:32'),
(485, 2, 3, 8, '27-03-2021 15:58:34'),
(486, 3, 3, 8, '27-03-2021 15:58:36'),
(487, 4, 3, 8, '27-03-2021 15:58:39'),
(488, 5, 3, 8, '27-03-2021 15:58:41'),
(489, 6, 3, 8, '27-03-2021 15:58:42'),
(490, 7, 3, 8, '27-03-2021 15:58:44'),
(491, 8, 3, 8, '27-03-2021 15:58:46'),
(492, 9, 3, 8, '27-03-2021 15:58:49'),
(493, 8, 4, 26, '27-03-2021 16:00:40'),
(494, 2, 6, 9, '27-03-2021 16:02:26'),
(495, 3, 6, 9, '27-03-2021 16:02:29'),
(496, 1, 6, 9, '27-03-2021 16:03:06'),
(497, 1, 4, 21, '27-03-2021 16:03:22'),
(498, 2, 4, 21, '27-03-2021 16:03:23'),
(499, 3, 4, 21, '27-03-2021 16:03:25'),
(500, 9, 4, 21, '27-03-2021 16:03:28'),
(501, 8, 4, 21, '27-03-2021 16:03:30'),
(502, 7, 4, 21, '27-03-2021 16:03:32'),
(503, 1, 3, 22, '27-03-2021 16:03:35'),
(504, 5, 3, 22, '27-03-2021 16:03:40'),
(505, 4, 5, 14, '27-03-2021 16:03:45'),
(506, 3, 3, 22, '27-03-2021 16:03:50'),
(507, 4, 3, 22, '27-03-2021 16:03:54'),
(508, 5, 5, 2, '27-03-2021 16:04:18'),
(509, 1, 2, 15, '27-03-2021 16:04:28'),
(510, 2, 2, 15, '27-03-2021 16:04:31'),
(511, 3, 2, 15, '27-03-2021 16:04:34'),
(512, 6, 2, 15, '27-03-2021 16:04:43'),
(513, 4, 4, 21, '27-03-2021 16:04:49'),
(514, 5, 4, 21, '27-03-2021 16:04:52'),
(515, 6, 5, 2, '27-03-2021 16:05:08'),
(516, 8, 3, 25, '27-03-2021 16:05:17'),
(517, 9, 3, 25, '27-03-2021 16:05:24'),
(518, 5, 2, 15, '27-03-2021 16:05:35'),
(519, 2, 3, 22, '27-03-2021 16:05:59'),
(520, 2, 3, 22, '27-03-2021 16:05:59'),
(521, 4, 2, 15, '27-03-2021 16:06:28'),
(522, 9, 5, 2, '27-03-2021 16:07:04'),
(523, 8, 5, 2, '27-03-2021 16:07:48'),
(524, 9, 3, 22, '27-03-2021 16:08:13'),
(525, 4, 4, 25, '27-03-2021 16:08:16'),
(526, 8, 3, 22, '27-03-2021 16:08:16'),
(527, 7, 5, 2, '27-03-2021 16:08:24'),
(528, 1, 6, 23, '27-03-2021 16:08:31'),
(529, 1, 4, 25, '27-03-2021 16:08:45'),
(530, 2, 4, 25, '27-03-2021 16:08:53'),
(531, 1, 5, 2, '27-03-2021 16:09:13'),
(532, 7, 5, 14, '27-03-2021 16:09:21'),
(533, 8, 5, 14, '27-03-2021 16:09:31'),
(534, 8, 5, 22, '27-03-2021 16:09:40'),
(535, 9, 5, 14, '27-03-2021 16:09:53'),
(536, 2, 5, 2, '27-03-2021 16:09:59'),
(537, 3, 4, 25, '27-03-2021 16:10:02'),
(538, 9, 2, 20, '27-03-2021 16:10:43'),
(539, 1, 4, 30, '27-03-2021 16:10:50'),
(540, 3, 5, 22, '27-03-2021 16:10:54'),
(541, 8, 1, 1, '27-03-2021 16:11:00'),
(542, 3, 5, 2, '27-03-2021 16:11:14'),
(543, 8, 2, 20, '27-03-2021 16:11:22'),
(544, 6, 1, 1, '27-03-2021 16:11:37'),
(545, 5, 1, 1, '27-03-2021 16:11:40'),
(546, 2, 1, 9, '27-03-2021 16:11:53'),
(547, 4, 1, 1, '27-03-2021 16:11:57'),
(548, 4, 5, 22, '27-03-2021 16:11:58'),
(549, 3, 1, 9, '27-03-2021 16:11:58'),
(550, 1, 1, 9, '27-03-2021 16:12:17'),
(551, 6, 5, 22, '27-03-2021 16:12:33'),
(552, 1, 5, 1, '27-03-2021 16:13:07'),
(553, 8, 3, 14, '27-03-2021 16:13:07'),
(554, 9, 4, 8, '27-03-2021 16:13:16'),
(555, 8, 4, 8, '27-03-2021 16:13:17'),
(556, 7, 4, 8, '27-03-2021 16:13:19'),
(557, 6, 4, 8, '27-03-2021 16:13:21'),
(558, 5, 4, 8, '27-03-2021 16:13:23'),
(559, 4, 4, 8, '27-03-2021 16:13:26'),
(560, 3, 5, 1, '27-03-2021 16:13:33'),
(561, 2, 5, 1, '27-03-2021 16:13:34'),
(562, 4, 2, 11, '27-03-2021 16:13:45'),
(563, 2, 4, 8, '27-03-2021 16:14:02'),
(564, 1, 4, 8, '27-03-2021 16:14:04'),
(565, 1, 3, 26, '27-03-2021 16:14:19'),
(566, 1, 3, 29, '27-03-2021 16:14:29'),
(567, 2, 3, 29, '27-03-2021 16:14:31'),
(568, 3, 3, 29, '27-03-2021 16:14:34'),
(569, 4, 3, 29, '27-03-2021 16:14:37'),
(570, 5, 3, 29, '27-03-2021 16:14:40'),
(571, 7, 5, 19, '27-03-2021 16:14:42'),
(572, 2, 3, 26, '27-03-2021 16:14:42'),
(573, 6, 3, 29, '27-03-2021 16:14:44'),
(574, 3, 4, 8, '27-03-2021 16:14:55'),
(575, 7, 5, 22, '27-03-2021 16:14:56'),
(576, 2, 3, 27, '27-03-2021 16:15:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `team_constructed_landmark`
--

CREATE TABLE `team_constructed_landmark` (
  `id` int(11) NOT NULL,
  `id_landmark` int(11) NOT NULL,
  `id_team` int(11) NOT NULL,
  `time` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `team_constructed_landmark`
--

INSERT INTO `team_constructed_landmark` (`id`, `id_landmark`, `id_team`, `time`) VALUES
(3, 3, 9, '03-27-2021 13:16:41'),
(4, 5, 8, '03-27-2021 13:17:10'),
(5, 3, 14, '03-27-2021 13:17:33'),
(6, 4, 1, '03-27-2021 13:18:16'),
(7, 5, 9, '03-27-2021 13:18:38'),
(8, 1, 26, '03-27-2021 13:18:46'),
(9, 3, 21, '03-27-2021 13:19:47'),
(10, 5, 30, '03-27-2021 13:19:57'),
(11, 4, 11, '03-27-2021 13:21:35'),
(12, 3, 6, '03-27-2021 13:22:16'),
(13, 5, 23, '03-27-2021 13:22:58'),
(14, 6, 25, '03-27-2021 13:23:55'),
(15, 4, 29, '03-27-2021 13:24:05'),
(16, 2, 27, '03-27-2021 13:26:00'),
(17, 3, 19, '03-27-2021 13:27:19'),
(18, 2, 9, '03-27-2021 13:34:03'),
(19, 4, 14, '03-27-2021 13:49:58'),
(20, 4, 15, '03-27-2021 13:55:12'),
(21, 6, 2, '03-27-2021 13:57:04'),
(22, 1, 8, '03-27-2021 13:57:53'),
(23, 2, 20, '03-27-2021 14:24:00'),
(24, 2, 2, '03-27-2021 14:24:51'),
(25, 6, 14, '03-27-2021 14:25:07'),
(26, 6, 26, '03-27-2021 14:37:24'),
(27, 2, 29, '03-27-2021 14:40:55'),
(28, 3, 1, '03-27-2021 14:49:57'),
(29, 1, 14, '03-27-2021 14:50:06'),
(30, 4, 6, '03-27-2021 14:51:27'),
(31, 5, 15, '03-27-2021 14:53:12'),
(32, 5, 21, '03-27-2021 14:53:45'),
(33, 3, 11, '03-27-2021 14:56:02'),
(34, 1, 6, '03-27-2021 14:58:12'),
(35, 4, 9, '03-27-2021 15:00:07'),
(36, 2, 25, '03-27-2021 15:00:28'),
(37, 2, 18, '03-27-2021 15:01:43'),
(38, 2, 14, '03-27-2021 15:04:48'),
(39, 4, 27, '03-27-2021 15:05:25'),
(40, 3, 28, '03-27-2021 15:14:15'),
(41, 3, 15, '03-27-2021 15:15:13'),
(42, 1, 21, '03-27-2021 15:17:20'),
(43, 6, 6, '03-27-2021 15:17:26'),
(44, 5, 20, '03-27-2021 15:25:40'),
(45, 4, 24, '03-27-2021 15:28:53'),
(46, 5, 29, '03-27-2021 15:37:52'),
(47, 6, 1, '03-27-2021 15:39:31'),
(48, 1, 11, '03-27-2021 15:42:47'),
(49, 3, 25, '03-27-2021 15:45:05'),
(50, 4, 26, '03-27-2021 15:45:26'),
(51, 2, 23, '03-27-2021 15:46:32'),
(52, 3, 8, '03-27-2021 15:58:42'),
(53, 6, 8, '03-27-2021 15:56:41'),
(54, 4, 21, '03-27-2021 16:03:32'),
(55, 5, 14, '03-27-2021 16:03:45'),
(56, 2, 15, '03-27-2021 16:06:28'),
(57, 1, 9, '03-27-2021 15:55:41'),
(58, 5, 2, '03-27-2021 16:08:24'),
(59, 4, 8, '03-27-2021 16:13:26'),
(60, 3, 29, '03-27-2021 16:14:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `team_history_bought_resources`
--

CREATE TABLE `team_history_bought_resources` (
  `id` int(11) NOT NULL,
  `id_resource` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `id_team` int(11) NOT NULL,
  `time` varchar(256) NOT NULL,
  `id_city` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `team_history_bought_resources`
--

INSERT INTO `team_history_bought_resources` (`id`, `id_resource`, `count`, `id_team`, `time`, `id_city`, `price`) VALUES
(1, 6, 4, 1, '17-03-2022 19:47:32', 1, 8000),
(2, 6, 1, 10, '17-03-2022 20:03:53', 1, 2000),
(3, 6, 1, 3, '17-03-2022 20:06:10', 1, 2000),
(4, 5, 1, 5, '17-03-2022 20:06:53', 1, 2000),
(5, 17, 2, 5, '17-03-2022 20:07:42', 1, 3500),
(6, 14, 3, 5, '17-03-2022 20:07:54', 1, 2250),
(7, 15, 2, 5, '17-03-2022 20:08:19', 1, 2000),
(8, 6, 1, 5, '17-03-2022 20:08:33', 1, 2000),
(9, 6, 1, 4, '17-03-2022 20:08:33', 1, 2000),
(10, 16, 3, 5, '17-03-2022 20:10:02', 1, 4500),
(11, 13, 4, 5, '17-03-2022 20:10:12', 1, 2000),
(12, 6, 1, 7, '17-03-2022 20:11:54', 1, 2000),
(13, 1, 5, 7, '17-03-2022 20:12:49', 1, 5000),
(14, 2, 5, 7, '17-03-2022 20:12:53', 1, 8750),
(15, 3, 5, 7, '17-03-2022 20:12:57', 1, 7500),
(16, 4, 5, 7, '17-03-2022 20:13:02', 1, 3750),
(17, 1, 2, 5, '17-03-2022 20:14:05', 1, 2000),
(18, 2, 3, 5, '17-03-2022 20:14:12', 1, 5250),
(19, 4, 2, 5, '17-03-2022 20:14:18', 1, 1500),
(20, 3, 1, 5, '17-03-2022 20:14:33', 1, 1500),
(21, 5, 1, 5, '17-03-2022 20:14:35', 1, 2000),
(22, 1, 5, 7, '17-03-2022 20:15:35', 1, 5000),
(23, 2, 5, 7, '17-03-2022 20:15:39', 1, 8750),
(24, 3, 5, 7, '17-03-2022 20:15:44', 1, 7500),
(25, 4, 5, 7, '17-03-2022 20:15:49', 1, 3750),
(26, 5, 5, 7, '17-03-2022 20:15:53', 1, 10000),
(27, 1, 5, 1, '17-03-2022 20:36:28', 1, 5000),
(28, 2, 2, 1, '17-03-2022 20:36:46', 1, 3500),
(29, 3, 1, 1, '17-03-2022 20:36:49', 1, 1500),
(30, 4, 1, 1, '17-03-2022 20:36:52', 1, 750),
(31, 5, 1, 1, '17-03-2022 20:36:54', 1, 2000),
(32, 6, 1, 1, '17-03-2022 20:36:57', 1, 2000),
(33, 13, 1, 1, '17-03-2022 20:37:00', 1, 500),
(34, 14, 1, 1, '17-03-2022 20:37:02', 1, 750),
(35, 15, 1, 1, '17-03-2022 20:37:05', 1, 1000),
(36, 16, 1, 1, '17-03-2022 20:37:08', 1, 1500),
(37, 17, 1, 1, '17-03-2022 20:37:11', 1, 1750),
(38, 1, 4, 19, '17-03-2022 20:52:18', 1, 4000),
(39, 1, 16, 19, '17-03-2022 20:53:51', 1, 16000),
(40, 5, 5, 19, '17-03-2022 20:55:11', 1, 10000),
(41, 6, 1, 12, '17-03-2022 20:58:18', 1, 2000),
(42, 1, 5, 12, '17-03-2022 20:59:44', 1, 5000),
(43, 2, 5, 12, '17-03-2022 20:59:48', 1, 8750),
(44, 5, 3, 12, '17-03-2022 21:00:04', 1, 6000),
(45, 6, 3, 12, '17-03-2022 21:03:35', 1, 6000),
(46, 1, 1, 11, '17-03-2022 21:05:29', 1, 1000),
(47, 5, 3, 11, '17-03-2022 21:05:36', 1, 6000),
(48, 6, 2, 11, '17-03-2022 21:05:42', 1, 4000),
(49, 6, 5, 12, '17-03-2022 21:10:41', 1, 10000),
(50, 5, 18, 4, '17-03-2022 21:13:24', 1, 36000),
(51, 2, 27, 4, '17-03-2022 21:14:23', 1, 47250),
(52, 3, 27, 4, '17-03-2022 21:14:43', 1, 40500),
(53, 4, 18, 4, '17-03-2022 21:14:55', 1, 13500),
(54, 1, 18, 4, '17-03-2022 21:15:03', 1, 18000),
(55, 1, 20, 19, '17-03-2022 21:21:37', 1, 20000),
(56, 1, 1, 2, '17-03-2022 21:29:08', 1, 1000),
(57, 5, 3, 2, '17-03-2022 21:29:14', 1, 6000),
(58, 1, 1, 10, '17-03-2022 21:31:44', 1, 1000),
(59, 5, 3, 10, '17-03-2022 21:31:50', 1, 6000),
(60, 6, 5, 10, '17-03-2022 21:32:42', 1, 10000),
(61, 1, 1, 1, '17-03-2022 21:57:43', 1, 1000),
(62, 3, 2, 1, '17-03-2022 21:57:49', 1, 3000),
(63, 13, 4, 1, '17-03-2022 21:57:54', 1, 2000),
(64, 4, 2, 1, '17-03-2022 21:58:00', 1, 1500),
(65, 14, 2, 1, '17-03-2022 21:58:02', 1, 1500),
(66, 6, 2, 1, '17-03-2022 21:58:18', 1, 4000),
(67, 6, 1, 1, '17-03-2022 23:04:48', 1, 2000),
(68, 1, 5, 1, '17-03-2022 23:50:36', 1, 5000),
(69, 2, 7, 1, '17-03-2022 23:50:40', 1, 12250),
(70, 3, 5, 1, '17-03-2022 23:50:44', 1, 7500),
(71, 4, 7, 1, '17-03-2022 23:50:47', 1, 5250),
(72, 5, 6, 1, '17-03-2022 23:50:51', 1, 12000),
(73, 6, 5, 1, '17-03-2022 23:50:56', 1, 10000),
(74, 13, 6, 1, '17-03-2022 23:51:01', 1, 3000),
(75, 14, 7, 1, '17-03-2022 23:51:05', 1, 5250),
(76, 15, 7, 1, '17-03-2022 23:51:09', 1, 7000),
(77, 17, 8, 1, '17-03-2022 23:51:14', 1, 14000),
(78, 16, 8, 1, '17-03-2022 23:52:54', 1, 12000),
(79, 17, 3, 1, '17-03-2022 23:57:06', 1, 5250),
(80, 14, 5, 1, '17-03-2022 23:57:09', 1, 3750),
(81, 5, 4, 1, '17-03-2022 23:57:13', 1, 8000),
(82, 17, 5, 1, '18-03-2022 00:02:59', 1, 8750),
(83, 16, 4, 1, '18-03-2022 00:03:02', 1, 6000),
(84, 15, 5, 1, '18-03-2022 00:03:05', 1, 5000),
(85, 14, 4, 1, '18-03-2022 00:03:09', 1, 3000),
(86, 13, 4, 1, '18-03-2022 00:03:13', 1, 2000),
(87, 6, 4, 1, '18-03-2022 00:03:17', 1, 8000),
(88, 5, 5, 1, '18-03-2022 00:03:21', 1, 10000),
(89, 4, 5, 1, '18-03-2022 00:03:24', 1, 3750),
(90, 3, 4, 1, '18-03-2022 00:03:29', 1, 6000),
(91, 2, 4, 1, '18-03-2022 00:03:33', 1, 7000),
(92, 1, 6, 1, '18-03-2022 00:03:36', 1, 6000),
(93, 14, 2, 1, '18-03-2022 00:05:39', 1, 1500),
(94, 16, 4, 1, '18-03-2022 00:05:43', 1, 6000),
(95, 17, 5, 1, '18-03-2022 00:05:48', 1, 8750),
(96, 6, 4, 1, '18-03-2022 00:05:52', 1, 8000),
(97, 6, 10, 36, '18-03-2022 15:31:56', 1, 20000),
(98, 1, 9, 36, '18-03-2022 15:32:21', 1, 9000),
(99, 5, 8, 36, '18-03-2022 15:32:25', 1, 16000),
(100, 2, 1, 36, '18-03-2022 15:36:58', 1, 1750),
(101, 3, 1, 36, '18-03-2022 15:37:01', 1, 1500),
(102, 4, 1, 36, '18-03-2022 15:37:04', 1, 750),
(103, 1, 4, 1, '18-03-2022 15:42:23', 1, 4000),
(104, 5, 4, 1, '18-03-2022 15:42:26', 1, 8000),
(105, 6, 6, 1, '18-03-2022 15:42:52', 1, 12000),
(106, 1, 3, 1, '18-03-2022 15:55:20', 1, 3000),
(107, 5, 5, 1, '18-03-2022 15:55:24', 1, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `team_resources`
--

CREATE TABLE `team_resources` (
  `id` int(11) NOT NULL,
  `id_resource` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `id_team` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `team_resources`
--

INSERT INTO `team_resources` (`id`, `id_resource`, `count`, `id_team`) VALUES
(1, 1, 0, 1),
(2, 1, 0, 2),
(3, 1, 0, 3),
(4, 1, 0, 4),
(5, 1, 0, 5),
(6, 1, 0, 6),
(7, 1, 0, 7),
(8, 1, 0, 8),
(9, 1, 0, 9),
(10, 1, 0, 10),
(11, 1, 0, 11),
(12, 1, 0, 12),
(13, 1, 0, 13),
(14, 1, 0, 14),
(15, 1, 0, 15),
(16, 1, 0, 16),
(17, 1, 0, 17),
(18, 1, 0, 18),
(19, 1, 0, 19),
(20, 1, 0, 20),
(21, 1, 0, 21),
(22, 1, 0, 22),
(23, 1, 0, 23),
(24, 1, 0, 24),
(25, 1, 0, 25),
(26, 1, 0, 26),
(27, 1, 0, 27),
(28, 1, 0, 28),
(29, 1, 0, 29),
(30, 1, 0, 30),
(31, 1, 0, 31),
(32, 1, 0, 32),
(33, 1, 0, 33),
(34, 1, 0, 34),
(35, 1, 0, 35),
(36, 1, 0, 36),
(37, 2, 0, 1),
(38, 2, 0, 2),
(39, 2, 0, 3),
(40, 2, 0, 4),
(41, 2, 0, 5),
(42, 2, 0, 6),
(43, 2, 0, 7),
(44, 2, 0, 8),
(45, 2, 0, 9),
(46, 2, 0, 10),
(47, 2, 0, 11),
(48, 2, 0, 12),
(49, 2, 0, 13),
(50, 2, 0, 14),
(51, 2, 0, 15),
(52, 2, 0, 16),
(53, 2, 0, 17),
(54, 2, 0, 18),
(55, 2, 0, 19),
(56, 2, 0, 20),
(57, 2, 0, 21),
(58, 2, 0, 22),
(59, 2, 0, 23),
(60, 2, 0, 24),
(61, 2, 0, 25),
(62, 2, 0, 26),
(63, 2, 0, 27),
(64, 2, 0, 28),
(65, 2, 0, 29),
(66, 2, 0, 30),
(67, 2, 0, 31),
(68, 2, 0, 32),
(69, 2, 0, 33),
(70, 2, 0, 34),
(71, 2, 0, 35),
(72, 2, 0, 36),
(73, 3, 0, 1),
(74, 3, 0, 2),
(75, 3, 0, 3),
(76, 3, 0, 4),
(77, 3, 0, 5),
(78, 3, 0, 6),
(79, 3, 0, 7),
(80, 3, 0, 8),
(81, 3, 0, 9),
(82, 3, 0, 10),
(83, 3, 0, 11),
(84, 3, 0, 12),
(85, 3, 0, 13),
(86, 3, 0, 14),
(87, 3, 0, 15),
(88, 3, 0, 16),
(89, 3, 0, 17),
(90, 3, 0, 18),
(91, 3, 0, 19),
(92, 3, 0, 20),
(93, 3, 0, 21),
(94, 3, 0, 22),
(95, 3, 0, 23),
(96, 3, 0, 24),
(97, 3, 0, 25),
(98, 3, 0, 26),
(99, 3, 0, 27),
(100, 3, 0, 28),
(101, 3, 0, 29),
(102, 3, 0, 30),
(103, 3, 0, 31),
(104, 3, 0, 32),
(105, 3, 0, 33),
(106, 3, 0, 34),
(107, 3, 0, 35),
(108, 3, 0, 36),
(109, 4, 0, 1),
(110, 4, 0, 2),
(111, 4, 0, 3),
(112, 4, 0, 4),
(113, 4, 0, 5),
(114, 4, 0, 6),
(115, 4, 0, 7),
(116, 4, 0, 8),
(117, 4, 0, 9),
(118, 4, 0, 10),
(119, 4, 0, 11),
(120, 4, 0, 12),
(121, 4, 0, 13),
(122, 4, 0, 14),
(123, 4, 0, 15),
(124, 4, 0, 16),
(125, 4, 0, 17),
(126, 4, 0, 18),
(127, 4, 0, 19),
(128, 4, 0, 20),
(129, 4, 0, 21),
(130, 4, 0, 22),
(131, 4, 0, 23),
(132, 4, 0, 24),
(133, 4, 0, 25),
(134, 4, 0, 26),
(135, 4, 0, 27),
(136, 4, 0, 28),
(137, 4, 0, 29),
(138, 4, 0, 30),
(139, 4, 0, 31),
(140, 4, 0, 32),
(141, 4, 0, 33),
(142, 4, 0, 34),
(143, 4, 0, 35),
(144, 4, 0, 36),
(145, 5, 0, 1),
(146, 5, 0, 2),
(147, 5, 0, 3),
(148, 5, 0, 4),
(149, 5, 0, 5),
(150, 5, 0, 6),
(151, 5, 0, 7),
(152, 5, 0, 8),
(153, 5, 0, 9),
(154, 5, 0, 10),
(155, 5, 0, 11),
(156, 5, 0, 12),
(157, 5, 0, 13),
(158, 5, 0, 14),
(159, 5, 0, 15),
(160, 5, 0, 16),
(161, 5, 0, 17),
(162, 5, 0, 18),
(163, 5, 0, 19),
(164, 5, 0, 20),
(165, 5, 0, 21),
(166, 5, 0, 22),
(167, 5, 0, 23),
(168, 5, 0, 24),
(169, 5, 0, 25),
(170, 5, 0, 26),
(171, 5, 0, 27),
(172, 5, 0, 28),
(173, 5, 0, 29),
(174, 5, 0, 30),
(175, 5, 0, 31),
(176, 5, 0, 32),
(177, 5, 0, 33),
(178, 5, 0, 34),
(179, 5, 0, 35),
(180, 5, 0, 36),
(181, 6, 1, 1),
(182, 6, 1, 2),
(183, 6, 1, 3),
(184, 6, 1, 4),
(185, 6, 1, 5),
(186, 6, 1, 6),
(187, 6, 1, 7),
(188, 6, 1, 8),
(189, 6, 1, 9),
(190, 6, 1, 10),
(191, 6, 1, 11),
(192, 6, 1, 12),
(193, 6, 1, 13),
(194, 6, 1, 14),
(195, 6, 1, 15),
(196, 6, 1, 16),
(197, 6, 1, 17),
(198, 6, 1, 18),
(199, 6, 1, 19),
(200, 6, 1, 20),
(201, 6, 1, 21),
(202, 6, 1, 22),
(203, 6, 1, 23),
(204, 6, 1, 24),
(205, 6, 1, 25),
(206, 6, 1, 26),
(207, 6, 1, 27),
(208, 6, 1, 28),
(209, 6, 1, 29),
(210, 6, 1, 30),
(211, 6, 1, 31),
(212, 6, 1, 32),
(213, 6, 1, 33),
(214, 6, 1, 34),
(215, 6, 1, 35),
(216, 6, 1, 36),
(217, 7, 0, 1),
(218, 7, 0, 2),
(219, 7, 0, 3),
(220, 7, 0, 4),
(221, 7, 0, 5),
(222, 7, 0, 6),
(223, 7, 0, 7),
(224, 7, 0, 8),
(225, 7, 0, 9),
(226, 7, 0, 10),
(227, 7, 0, 11),
(228, 7, 0, 12),
(229, 7, 0, 13),
(230, 7, 0, 14),
(231, 7, 0, 15),
(232, 7, 0, 16),
(233, 7, 0, 17),
(234, 7, 0, 18),
(235, 7, 0, 19),
(236, 7, 0, 20),
(237, 7, 0, 21),
(238, 7, 0, 22),
(239, 7, 0, 23),
(240, 7, 0, 24),
(241, 7, 0, 25),
(242, 7, 0, 26),
(243, 7, 0, 27),
(244, 7, 0, 28),
(245, 7, 0, 29),
(246, 7, 0, 30),
(247, 7, 0, 31),
(248, 7, 0, 32),
(249, 7, 0, 33),
(250, 7, 0, 34),
(251, 7, 0, 35),
(252, 7, 0, 36),
(253, 8, 0, 1),
(254, 8, 0, 2),
(255, 8, 0, 3),
(256, 8, 0, 4),
(257, 8, 0, 5),
(258, 8, 0, 6),
(259, 8, 0, 7),
(260, 8, 0, 8),
(261, 8, 0, 9),
(262, 8, 0, 10),
(263, 8, 0, 11),
(264, 8, 0, 12),
(265, 8, 0, 13),
(266, 8, 0, 14),
(267, 8, 0, 15),
(268, 8, 0, 16),
(269, 8, 0, 17),
(270, 8, 0, 18),
(271, 8, 0, 19),
(272, 8, 0, 20),
(273, 8, 0, 21),
(274, 8, 0, 22),
(275, 8, 0, 23),
(276, 8, 0, 24),
(277, 8, 0, 25),
(278, 8, 0, 26),
(279, 8, 0, 27),
(280, 8, 0, 28),
(281, 8, 0, 29),
(282, 8, 0, 30),
(283, 8, 0, 31),
(284, 8, 0, 32),
(285, 8, 0, 33),
(286, 8, 0, 34),
(287, 8, 0, 35),
(288, 8, 0, 36),
(289, 9, 0, 1),
(290, 9, 0, 2),
(291, 9, 0, 3),
(292, 9, 0, 4),
(293, 9, 0, 5),
(294, 9, 0, 6),
(295, 9, 0, 7),
(296, 9, 0, 8),
(297, 9, 0, 9),
(298, 9, 0, 10),
(299, 9, 0, 11),
(300, 9, 0, 12),
(301, 9, 0, 13),
(302, 9, 0, 14),
(303, 9, 0, 15),
(304, 9, 0, 16),
(305, 9, 0, 17),
(306, 9, 0, 18),
(307, 9, 0, 19),
(308, 9, 0, 20),
(309, 9, 0, 21),
(310, 9, 0, 22),
(311, 9, 0, 23),
(312, 9, 0, 24),
(313, 9, 0, 25),
(314, 9, 0, 26),
(315, 9, 0, 27),
(316, 9, 0, 28),
(317, 9, 0, 29),
(318, 9, 0, 30),
(319, 9, 0, 31),
(320, 9, 0, 32),
(321, 9, 0, 33),
(322, 9, 0, 34),
(323, 9, 0, 35),
(324, 9, 0, 36),
(325, 10, 0, 1),
(326, 10, 0, 2),
(327, 10, 0, 3),
(328, 10, 0, 4),
(329, 10, 0, 5),
(330, 10, 0, 6),
(331, 10, 0, 7),
(332, 10, 0, 8),
(333, 10, 0, 9),
(334, 10, 0, 10),
(335, 10, 0, 11),
(336, 10, 0, 12),
(337, 10, 0, 13),
(338, 10, 0, 14),
(339, 10, 0, 15),
(340, 10, 0, 16),
(341, 10, 0, 17),
(342, 10, 0, 18),
(343, 10, 0, 19),
(344, 10, 0, 20),
(345, 10, 0, 21),
(346, 10, 0, 22),
(347, 10, 0, 23),
(348, 10, 0, 24),
(349, 10, 0, 25),
(350, 10, 0, 26),
(351, 10, 0, 27),
(352, 10, 0, 28),
(353, 10, 0, 29),
(354, 10, 0, 30),
(355, 10, 0, 31),
(356, 10, 0, 32),
(357, 10, 0, 33),
(358, 10, 0, 34),
(359, 10, 0, 35),
(360, 10, 0, 36),
(361, 11, 0, 1),
(362, 11, 0, 2),
(363, 11, 0, 3),
(364, 11, 0, 4),
(365, 11, 0, 5),
(366, 11, 0, 6),
(367, 11, 0, 7),
(368, 11, 0, 8),
(369, 11, 0, 9),
(370, 11, 0, 10),
(371, 11, 0, 11),
(372, 11, 0, 12),
(373, 11, 0, 13),
(374, 11, 0, 14),
(375, 11, 0, 15),
(376, 11, 0, 16),
(377, 11, 0, 17),
(378, 11, 0, 18),
(379, 11, 0, 19),
(380, 11, 0, 20),
(381, 11, 0, 21),
(382, 11, 0, 22),
(383, 11, 0, 23),
(384, 11, 0, 24),
(385, 11, 0, 25),
(386, 11, 0, 26),
(387, 11, 0, 27),
(388, 11, 0, 28),
(389, 11, 0, 29),
(390, 11, 0, 30),
(391, 11, 0, 31),
(392, 11, 0, 32),
(393, 11, 0, 33),
(394, 11, 0, 34),
(395, 11, 0, 35),
(396, 11, 0, 36),
(397, 12, 0, 1),
(398, 12, 0, 2),
(399, 12, 0, 3),
(400, 12, 0, 4),
(401, 12, 0, 5),
(402, 12, 0, 6),
(403, 12, 0, 7),
(404, 12, 0, 8),
(405, 12, 0, 9),
(406, 12, 0, 10),
(407, 12, 0, 11),
(408, 12, 0, 12),
(409, 12, 0, 13),
(410, 12, 0, 14),
(411, 12, 0, 15),
(412, 12, 0, 16),
(413, 12, 0, 17),
(414, 12, 0, 18),
(415, 12, 0, 19),
(416, 12, 0, 20),
(417, 12, 0, 21),
(418, 12, 0, 22),
(419, 12, 0, 23),
(420, 12, 0, 24),
(421, 12, 0, 25),
(422, 12, 0, 26),
(423, 12, 0, 27),
(424, 12, 0, 28),
(425, 12, 0, 29),
(426, 12, 0, 30),
(427, 12, 0, 31),
(428, 12, 0, 32),
(429, 12, 0, 33),
(430, 12, 0, 34),
(431, 12, 0, 35),
(432, 12, 0, 36),
(433, 13, 0, 1),
(434, 13, 0, 2),
(435, 13, 0, 3),
(436, 13, 0, 4),
(437, 13, 0, 5),
(438, 13, 0, 6),
(439, 13, 0, 7),
(440, 13, 0, 8),
(441, 13, 0, 9),
(442, 13, 0, 10),
(443, 13, 0, 11),
(444, 13, 0, 12),
(445, 13, 0, 13),
(446, 13, 0, 14),
(447, 13, 0, 15),
(448, 13, 0, 16),
(449, 13, 0, 17),
(450, 13, 0, 18),
(451, 13, 0, 19),
(452, 13, 0, 20),
(453, 13, 0, 21),
(454, 13, 0, 22),
(455, 13, 0, 23),
(456, 13, 0, 24),
(457, 13, 0, 25),
(458, 13, 0, 26),
(459, 13, 0, 27),
(460, 13, 0, 28),
(461, 13, 0, 29),
(462, 13, 0, 30),
(463, 13, 0, 31),
(464, 13, 0, 32),
(465, 13, 0, 33),
(466, 13, 0, 34),
(467, 13, 0, 35),
(468, 13, 0, 36),
(469, 14, 0, 1),
(470, 14, 0, 2),
(471, 14, 0, 3),
(472, 14, 0, 4),
(473, 14, 0, 5),
(474, 14, 0, 6),
(475, 14, 0, 7),
(476, 14, 0, 8),
(477, 14, 0, 9),
(478, 14, 0, 10),
(479, 14, 0, 11),
(480, 14, 0, 12),
(481, 14, 0, 13),
(482, 14, 0, 14),
(483, 14, 0, 15),
(484, 14, 0, 16),
(485, 14, 0, 17),
(486, 14, 0, 18),
(487, 14, 0, 19),
(488, 14, 0, 20),
(489, 14, 0, 21),
(490, 14, 0, 22),
(491, 14, 0, 23),
(492, 14, 0, 24),
(493, 14, 0, 25),
(494, 14, 0, 26),
(495, 14, 0, 27),
(496, 14, 0, 28),
(497, 14, 0, 29),
(498, 14, 0, 30),
(499, 14, 0, 31),
(500, 14, 0, 32),
(501, 14, 0, 33),
(502, 14, 0, 34),
(503, 14, 0, 35),
(504, 14, 0, 36),
(505, 15, 0, 1),
(506, 15, 0, 2),
(507, 15, 0, 3),
(508, 15, 0, 4),
(509, 15, 0, 5),
(510, 15, 0, 6),
(511, 15, 0, 7),
(512, 15, 0, 8),
(513, 15, 0, 9),
(514, 15, 0, 10),
(515, 15, 0, 11),
(516, 15, 0, 12),
(517, 15, 0, 13),
(518, 15, 0, 14),
(519, 15, 0, 15),
(520, 15, 0, 16),
(521, 15, 0, 17),
(522, 15, 0, 18),
(523, 15, 0, 19),
(524, 15, 0, 20),
(525, 15, 0, 21),
(526, 15, 0, 22),
(527, 15, 0, 23),
(528, 15, 0, 24),
(529, 15, 0, 25),
(530, 15, 0, 26),
(531, 15, 0, 27),
(532, 15, 0, 28),
(533, 15, 0, 29),
(534, 15, 0, 30),
(535, 15, 0, 31),
(536, 15, 0, 32),
(537, 15, 0, 33),
(538, 15, 0, 34),
(539, 15, 0, 35),
(540, 15, 0, 36),
(541, 16, 0, 1),
(542, 16, 0, 2),
(543, 16, 0, 3),
(544, 16, 0, 4),
(545, 16, 0, 5),
(546, 16, 0, 6),
(547, 16, 0, 7),
(548, 16, 0, 8),
(549, 16, 0, 9),
(550, 16, 0, 10),
(551, 16, 0, 11),
(552, 16, 0, 12),
(553, 16, 0, 13),
(554, 16, 0, 14),
(555, 16, 0, 15),
(556, 16, 0, 16),
(557, 16, 0, 17),
(558, 16, 0, 18),
(559, 16, 0, 19),
(560, 16, 0, 20),
(561, 16, 0, 21),
(562, 16, 0, 22),
(563, 16, 0, 23),
(564, 16, 0, 24),
(565, 16, 0, 25),
(566, 16, 0, 26),
(567, 16, 0, 27),
(568, 16, 0, 28),
(569, 16, 0, 29),
(570, 16, 0, 30),
(571, 16, 0, 31),
(572, 16, 0, 32),
(573, 16, 0, 33),
(574, 16, 0, 34),
(575, 16, 0, 35),
(576, 16, 0, 36),
(577, 17, 0, 1),
(578, 17, 0, 2),
(579, 17, 0, 3),
(580, 17, 0, 4),
(581, 17, 0, 5),
(582, 17, 0, 6),
(583, 17, 0, 7),
(584, 17, 0, 8),
(585, 17, 0, 9),
(586, 17, 0, 10),
(587, 17, 0, 11),
(588, 17, 0, 12),
(589, 17, 0, 13),
(590, 17, 0, 14),
(591, 17, 0, 15),
(592, 17, 0, 16),
(593, 17, 0, 17),
(594, 17, 0, 18),
(595, 17, 0, 19),
(596, 17, 0, 20),
(597, 17, 0, 21),
(598, 17, 0, 22),
(599, 17, 0, 23),
(600, 17, 0, 24),
(601, 17, 0, 25),
(602, 17, 0, 26),
(603, 17, 0, 27),
(604, 17, 0, 28),
(605, 17, 0, 29),
(606, 17, 0, 30),
(607, 17, 0, 31),
(608, 17, 0, 32),
(609, 17, 0, 33),
(610, 17, 0, 34),
(611, 17, 0, 35),
(612, 17, 0, 36),
(829, 18, 0, 36);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `building_type`
--
ALTER TABLE `building_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `city_resource`
--
ALTER TABLE `city_resource`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hidden_post`
--
ALTER TABLE `hidden_post`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history_add_money`
--
ALTER TABLE `history_add_money`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history_add_skill`
--
ALTER TABLE `history_add_skill`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history_point`
--
ALTER TABLE `history_point`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `landmark`
--
ALTER TABLE `landmark`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `new_jembatan`
--
ALTER TABLE `new_jembatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `new_pulau`
--
ALTER TABLE `new_pulau`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `new_timing`
--
ALTER TABLE `new_timing`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `new_tipe_jembatan`
--
ALTER TABLE `new_tipe_jembatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `resource`
--
ALTER TABLE `resource`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `team_constructed_building`
--
ALTER TABLE `team_constructed_building`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `team_constructed_landmark`
--
ALTER TABLE `team_constructed_landmark`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `team_history_bought_resources`
--
ALTER TABLE `team_history_bought_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `team_resources`
--
ALTER TABLE `team_resources`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `building`
--
ALTER TABLE `building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `building_type`
--
ALTER TABLE `building_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `city_resource`
--
ALTER TABLE `city_resource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=814;

--
-- AUTO_INCREMENT untuk tabel `hidden_post`
--
ALTER TABLE `hidden_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `history_add_money`
--
ALTER TABLE `history_add_money`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `history_add_skill`
--
ALTER TABLE `history_add_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `history_point`
--
ALTER TABLE `history_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `landmark`
--
ALTER TABLE `landmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `new_jembatan`
--
ALTER TABLE `new_jembatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT untuk tabel `new_pulau`
--
ALTER TABLE `new_pulau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT untuk tabel `new_timing`
--
ALTER TABLE `new_timing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `new_tipe_jembatan`
--
ALTER TABLE `new_tipe_jembatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT untuk tabel `resource`
--
ALTER TABLE `resource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `team_constructed_building`
--
ALTER TABLE `team_constructed_building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=577;

--
-- AUTO_INCREMENT untuk tabel `team_constructed_landmark`
--
ALTER TABLE `team_constructed_landmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `team_history_bought_resources`
--
ALTER TABLE `team_history_bought_resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT untuk tabel `team_resources`
--
ALTER TABLE `team_resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=830;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
