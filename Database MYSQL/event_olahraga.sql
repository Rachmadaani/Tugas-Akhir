-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2025 at 12:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_olahraga`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `certificate_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_date` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `event_image` varchar(255) DEFAULT NULL,
  `nama_panitia` varchar(100) DEFAULT NULL,
  `nohp_panitia` varchar(20) DEFAULT NULL,
  `ttd_panitia` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_date`, `location`, `description`, `event_image`, `nama_panitia`, `nohp_panitia`, `ttd_panitia`, `created_at`, `updated_at`) VALUES
(1, 'Running 2024', '2026-08-17', 'Yogyakarta, Alun- Alun Kidul', 'Event Olahraga yang di selenggarakan di Kota Yogyakarta yang berlokasi di alun-alun kidul', 'Running 2024.jpg', 'Agung Hendrawan', '0873689266123', '1753272382_06a3afdfe469e57c6116.jpg', '2024-10-03 07:57:38', '2025-07-23 12:06:22'),
(2, 'Gunung Nglanggeran', '2026-08-17', 'Gunung Nglanggeran', 'Event lari Gunung Nglanggeran', 'Gunung Nglanggeran.jpg', 'Wawan Guntur', '08973349107480', NULL, '2024-10-07 03:21:57', '2025-07-23 11:14:13'),
(3, 'AQUA RUNNING 2.0 Yogyakarta', '2025-05-01', 'Alun-Alum Kidul, Yogyakarta', 'Event Lari AQUA RUNNING 2.0 Yogyakarta', 'RUNNING AQUA 2.0 Yogyakarta.jpg', NULL, NULL, NULL, '2024-10-07 03:27:54', '2025-07-12 08:07:01'),
(4, 'Prambanan Temple Run', '2025-06-22', 'Candi Prambanan', 'West Prambanan Temple', 'Prambanan Temple Run.png', NULL, NULL, NULL, '2024-10-14 23:35:23', '2025-05-28 02:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `nama_kabupaten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id`, `id_provinsi`, `nama_kabupaten`) VALUES
(1, 1, 'Kabupaten Aceh Barat'),
(2, 1, 'Kabupaten Aceh Besar'),
(3, 1, 'Kabupaten Aceh Jaya'),
(4, 1, 'Kabupaten Aceh Selatan'),
(5, 1, 'Kabupaten Aceh Singkil'),
(6, 2, 'Kabupaten Deli Serdang'),
(7, 2, 'Kabupaten Karo'),
(8, 2, 'Kabupaten Labuhanbatu'),
(9, 2, 'Kabupaten Mandailing Natal'),
(10, 2, 'Kabupaten Nias'),
(11, 3, 'Kabupaten Agam'),
(12, 3, 'Kabupaten Dharmasraya'),
(13, 3, 'Kabupaten Kepulauan Mentawai'),
(14, 3, 'Kabupaten Lima Puluh Kota'),
(15, 3, 'Kabupaten Padang Pariaman'),
(16, 4, 'Kabupaten Bengkalis'),
(17, 4, 'Kabupaten Indragiri Hilir'),
(18, 4, 'Kabupaten Indragiri Hulu'),
(19, 4, 'Kabupaten Kampar'),
(20, 4, 'Kabupaten Kuantan Singingi'),
(21, 5, 'Kabupaten Bintan'),
(22, 5, 'Kabupaten Karimun'),
(23, 5, 'Kabupaten Kepulauan Anambas'),
(24, 5, 'Kabupaten Lingga'),
(25, 5, 'Kabupaten Natuna'),
(26, 6, 'Kabupaten Batanghari'),
(27, 6, 'Kabupaten Bungo'),
(28, 6, 'Kabupaten Kerinci'),
(29, 6, 'Kabupaten Merangin'),
(30, 6, 'Kabupaten Muaro Jambi'),
(31, 7, 'Kabupaten Banyuasin'),
(32, 7, 'Kabupaten Empat Lawang'),
(33, 7, 'Kabupaten Lahat'),
(34, 7, 'Kabupaten Muara Enim'),
(35, 7, 'Kabupaten Musi Banyuasin'),
(36, 8, 'Kabupaten Bangka'),
(37, 8, 'Kabupaten Bangka Barat'),
(38, 8, 'Kabupaten Bangka Selatan'),
(39, 8, 'Kabupaten Bangka Tengah'),
(40, 8, 'Kabupaten Belitung'),
(41, 9, 'Kabupaten Bengkulu Selatan'),
(42, 9, 'Kabupaten Bengkulu Tengah'),
(43, 9, 'Kabupaten Bengkulu Utara'),
(44, 9, 'Kabupaten Kaur'),
(45, 9, 'Kabupaten Kepahiang'),
(46, 10, 'Kabupaten Lampung Barat'),
(47, 10, 'Kabupaten Lampung Selatan'),
(48, 10, 'Kabupaten Lampung Tengah'),
(49, 10, 'Kabupaten Lampung Timur'),
(50, 10, 'Kabupaten Lampung Utara'),
(51, 11, 'Kota Jakarta Pusat'),
(52, 11, 'Kota Jakarta Utara'),
(53, 11, 'Kota Jakarta Barat'),
(54, 11, 'Kota Jakarta Selatan'),
(55, 11, 'Kota Jakarta Timur'),
(56, 12, 'Kabupaten Bandung'),
(57, 12, 'Kabupaten Bogor'),
(58, 12, 'Kabupaten Garut'),
(59, 12, 'Kabupaten Tasikmalaya'),
(60, 12, 'Kabupaten Cirebon'),
(61, 13, 'Kabupaten Tangerang'),
(62, 13, 'Kabupaten Serang'),
(63, 13, 'Kabupaten Lebak'),
(64, 13, 'Kabupaten Pandeglang'),
(65, 13, 'Kabupaten Banten'),
(66, 14, 'Kabupaten Semarang'),
(67, 14, 'Kabupaten Kudus'),
(68, 14, 'Kabupaten Klaten'),
(69, 14, 'Kabupaten Banyumas'),
(70, 14, 'Kabupaten Pati'),
(71, 15, 'Kabupaten Sleman'),
(72, 15, 'Kabupaten Bantul'),
(73, 15, 'Kabupaten Gunungkidul'),
(74, 15, 'Kabupaten Kulon Progo'),
(75, 15, 'Kota Yogyakarta'),
(76, 16, 'Kabupaten Banyuwangi'),
(77, 16, 'Kabupaten Blitar'),
(78, 16, 'Kabupaten Bojonegoro'),
(79, 16, 'Kabupaten Jember'),
(80, 16, 'Kabupaten Malang'),
(81, 17, 'Kabupaten Badung'),
(82, 17, 'Kabupaten Gianyar'),
(83, 17, 'Kabupaten Tabanan'),
(84, 17, 'Kabupaten Bangli'),
(85, 17, 'Kabupaten Karangasem'),
(86, 18, 'Kabupaten Lombok Barat'),
(87, 18, 'Kabupaten Lombok Timur'),
(88, 18, 'Kabupaten Sumbawa'),
(89, 18, 'Kabupaten Dompu'),
(90, 18, 'Kabupaten Bima'),
(91, 19, 'Kabupaten Kupang'),
(92, 19, 'Kabupaten Timor Tengah Selatan'),
(93, 19, 'Kabupaten Timor Tengah Utara'),
(94, 19, 'Kabupaten Belu'),
(95, 19, 'Kabupaten Sikka'),
(96, 20, 'Kabupaten Pontianak'),
(97, 20, 'Kabupaten Sambas'),
(98, 20, 'Kabupaten Sanggau'),
(99, 20, 'Kabupaten Sintang'),
(100, 20, 'Kabupaten Kapuas Hulu'),
(101, 21, 'Kabupaten Kotawaringin Barat'),
(102, 21, 'Kabupaten Kotawaringin Timur'),
(103, 21, 'Kabupaten Barito Selatan'),
(104, 21, 'Kabupaten Barito Utara'),
(105, 21, 'Kabupaten Seruyan'),
(106, 22, 'Kabupaten Banjar'),
(107, 22, 'Kabupaten Barito Kuala'),
(108, 22, 'Kabupaten Hulu Sungai Selatan'),
(109, 22, 'Kabupaten Hulu Sungai Utara'),
(110, 22, 'Kabupaten Tanah Laut'),
(111, 23, 'Kabupaten Kutai Kartanegara'),
(112, 23, 'Kabupaten Balikpapan'),
(113, 23, 'Kabupaten Berau'),
(114, 23, 'Kabupaten Paser'),
(115, 23, 'Kabupaten Penajam Paser Utara'),
(116, 24, 'Kabupaten Bulungan'),
(117, 24, 'Kabupaten Malinau'),
(118, 24, 'Kabupaten Nunukan'),
(119, 24, 'Kabupaten Tana Tidung'),
(120, 24, 'Kabupaten Tarakan'),
(121, 25, 'Kabupaten Minahasa'),
(122, 25, 'Kabupaten Bolaang Mongondow'),
(123, 25, 'Kabupaten Sangihe'),
(124, 25, 'Kabupaten Talaud'),
(125, 25, 'Kabupaten Kepulauan Sangihe'),
(126, 26, 'Kabupaten Gorontalo'),
(127, 26, 'Kabupaten Bone Bolango'),
(128, 26, 'Kabupaten Pohuwato'),
(129, 26, 'Kabupaten Boalemo'),
(130, 26, 'Kabupaten Gorontalo Utara'),
(131, 27, 'Kabupaten Donggala'),
(132, 27, 'Kabupaten Sigi'),
(133, 27, 'Kabupaten Parigi Moutong'),
(134, 27, 'Kabupaten Poso'),
(135, 27, 'Kabupaten Tojo Una-Una'),
(136, 28, 'Kabupaten Makassar'),
(137, 28, 'Kabupaten Gowa'),
(138, 28, 'Kabupaten Sinjai'),
(139, 28, 'Kabupaten Bulukumba'),
(140, 28, 'Kabupaten Bantaeng'),
(141, 29, 'Kabupaten Majene'),
(142, 29, 'Kabupaten Polewali Mandar'),
(143, 29, 'Kabupaten Mamuju'),
(144, 29, 'Kabupaten Mamuju Utara'),
(145, 29, 'Kabupaten Mamuju Tengah'),
(146, 30, 'Kabupaten Konawe'),
(147, 30, 'Kabupaten Kolaka'),
(148, 30, 'Kabupaten Bombana'),
(149, 30, 'Kabupaten Wakatobi'),
(150, 30, 'Kabupaten Buton'),
(151, 31, 'Kabupaten Maluku Tengah'),
(152, 31, 'Kabupaten Maluku Utara'),
(153, 31, 'Kabupaten Buru'),
(154, 31, 'Kabupaten Seram Bagian Barat'),
(155, 31, 'Kabupaten Seram Bagian Timur'),
(156, 32, 'Kabupaten Halmahera Barat'),
(157, 32, 'Kabupaten Halmahera Utara'),
(158, 32, 'Kabupaten Halmahera Timur'),
(159, 32, 'Kabupaten Pulau Morotai'),
(160, 32, 'Kabupaten Kepulauan Sula'),
(161, 33, 'Kabupaten Jayapura'),
(162, 33, 'Kabupaten Mimika'),
(163, 33, 'Kabupaten Merauke'),
(164, 33, 'Kabupaten Biak Numfor'),
(165, 33, 'Kabupaten Puncak Jaya'),
(166, 34, 'Kabupaten Manokwari'),
(167, 34, 'Kabupaten Sorong'),
(168, 34, 'Kabupaten Raja Ampat'),
(169, 34, 'Kabupaten Teluk Bintuni'),
(170, 34, 'Kabupaten Teluk Wondama'),
(171, 35, 'Kabupaten Puncak'),
(172, 35, 'Kabupaten Dogiyai'),
(173, 35, 'Kabupaten Deiyai'),
(174, 35, 'Kabupaten Intan Jaya'),
(175, 35, 'Kabupaten Nduga'),
(176, 36, 'Kabupaten Lanny Jaya'),
(177, 36, 'Kabupaten Yalimo'),
(178, 36, 'Kabupaten Mamberamo Tengah'),
(179, 36, 'Kabupaten Mamberamo Raya'),
(180, 36, 'Kabupaten Puncak'),
(181, 37, 'Kabupaten Asmat'),
(182, 37, 'Kabupaten Mappi'),
(183, 37, 'Kabupaten Boven Digoel'),
(184, 37, 'Kabupaten Merauke'),
(185, 37, 'Kabupaten Sarmi'),
(186, 38, 'Kabupaten Fakfak'),
(187, 38, 'Kabupaten Kaimana'),
(188, 38, 'Kabupaten Teluk Wondama'),
(189, 38, 'Kabupaten Bintuni'),
(190, 38, 'Kabupaten Sorong Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_event`
--

CREATE TABLE `kategori_event` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi_kategori` text DEFAULT NULL,
  `biaya` decimal(10,2) NOT NULL,
  `rute` text DEFAULT NULL,
  `start_date` date NOT NULL,
  `start_jam` time NOT NULL,
  `cut_off_time` time DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_event`
--

INSERT INTO `kategori_event` (`id`, `id_event`, `nama_kategori`, `deskripsi_kategori`, `biaya`, `rute`, `start_date`, `start_jam`, `cut_off_time`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 1, 'Running 1', 'Event lari ', 50000.00, '5 KM', '2025-06-07', '07:00:00', '10:00:00', 'Waktu dapat berubah sesuai kondisi lapangan', '2024-10-06 19:33:47', '2025-06-26 06:08:07'),
(3, 1, 'Running 2', 'Event Lari', 100000.00, '10 KM', '2025-06-08', '07:00:00', '10:00:00', 'Jadwal waktu bisa berubah sesuai kondisi di lapangan', '2024-10-06 19:47:19', '2025-06-26 06:08:28'),
(4, 1, 'Running 3', 'Event Lari', 150000.00, '15 KM', '2025-06-07', '07:00:00', '10:00:00', 'Jadwal waktu bisa berubah sesuai kondisi di lapangan', '2024-10-06 19:50:22', '2025-06-26 06:08:51'),
(5, 1, 'Running 4', 'Event Lari', 200000.00, '20 KM', '2024-11-10', '07:00:00', '10:00:00', 'Jadwal waktu bisa berubah sesuai kondisi di lapangan', '2024-10-06 19:50:28', '2025-06-26 06:09:05'),
(6, 2, 'Down Hill', 'Event Lari Gunung Nglanggeran', 0.00, '5 KM', '2025-01-05', '07:00:00', '10:00:00', 'Jadwal dapat berubah sesuai kondisi di lapangan', '2024-10-06 19:52:32', '2024-12-02 11:11:31'),
(7, 3, 'Marathon', 'Event lari marathon', 60000.00, '20 KM', '2025-01-12', '07:00:00', '10:31:00', 'Event Lari marathon AQUA Running 2.0', '2024-11-14 04:31:47', '2024-12-02 11:12:24'),
(8, 4, 'Jalan Sehat', 'Jalan Sehat yang di selenggarakan di Candi Prambanan', 100000.00, '5 KM', '2025-01-19', '07:00:00', '10:00:00', 'Event yang berbayar dengan fasilitas snack, wifi, toilet, medali', '2024-11-25 03:10:15', '2024-12-02 11:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 'Aldo', 'aldo@gmail.com', '$2y$10$Ojtb.We6YRYEIHWWzQgu0eTVBBPBGBwXmeoqowENlt39JhEDTCZjK', '2024-12-08 22:14:50', '2024-12-08 22:14:50'),
(11, 'Amin', 'amin@gmail.com', '$2y$10$.gtTw.y9KZ2R/mRUjVU7a.wuRt0bHhrBrs4LDfpiCI.b.XE5PFpTy', '2025-05-06 20:55:31', '2025-05-06 20:55:31'),
(13, 'Rahmad', 'rahmad@gmail.com', '$2y$10$Kee/U0zSwuSP3BA1KWzGQO.DYf3tO4E7f/PJlioEYQTzsUhhqrL9K', '2025-06-24 20:22:35', '2025-06-24 20:22:35'),
(14, 'Ahmad', 'ahmad@gmail.com', '$2y$10$eySPAoT08Q05iBFnZjrr5uQmlllfSf4Qfz7/./fRLJATA5zBWP4sm', '2025-06-24 20:30:37', '2025-06-24 20:30:37'),
(15, 'Dani', 'dani@gmail.com', '$2y$10$SuIM6CVDH8PaO.b0E0kCKu7LSHIPGOLUB4g630PDNmd8dHKo7M9ii', '2025-06-25 20:27:18', '2025-06-25 20:27:18'),
(16, 'Rachmadaani', 'rachmadaani.riskha@gmail.com', '$2y$10$USWXXxjF2PPpvtmYL/NRAOKb9tQognp.PO5g46OcpOZvcepYPFx0.', '2025-07-12 19:59:54', '2025-07-12 19:59:54');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `type` enum('email','whatsapp') NOT NULL,
  `message` text NOT NULL,
  `status` enum('pending','sent','failed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `event_kategori` int(11) NOT NULL,
  `biaya` decimal(10,2) NOT NULL,
  `jumlah_pembayaran` decimal(10,2) DEFAULT NULL,
  `status_pembayaran` enum('lunas','belum lunas') DEFAULT 'belum lunas',
  `bukti_transfer` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_user`, `id_event`, `event_kategori`, `biaya`, `jumlah_pembayaran`, `status_pembayaran`, `bukti_transfer`, `created_at`, `updated_at`) VALUES
(15, 54, 1, 2, 50000.00, 50000.00, 'lunas', 'eror.PNG', '2025-07-12 08:02:33', '2025-07-12 08:02:33'),
(16, 55, 2, 6, 0.00, 0.00, 'lunas', 'eror.PNG', '2025-07-14 06:54:44', '2025-07-14 06:54:44'),
(17, 55, 2, 6, 0.00, 0.00, 'lunas', 'eror.PNG', '2025-07-14 06:58:31', '2025-07-14 06:58:31'),
(18, 55, 2, 6, 0.00, 0.00, 'lunas', 'eror.PNG', '2025-07-14 07:05:24', '2025-07-14 07:05:24'),
(19, 55, 2, 6, 0.00, 0.00, 'lunas', 'eror.PNG', '2025-07-14 07:12:08', '2025-07-14 07:12:08'),
(20, 55, 2, 6, 0.00, 0.00, 'lunas', 'eror.PNG', '2025-07-14 07:25:17', '2025-07-14 07:25:17'),
(21, 55, 2, 6, 0.00, 0.00, 'lunas', 'eror.PNG', '2025-07-14 07:57:53', '2025-07-14 07:57:53'),
(22, 55, 2, 6, 0.00, 0.00, 'lunas', 'eror.PNG', '2025-07-14 08:00:01', '2025-07-14 08:00:01'),
(23, 55, 2, 6, 0.00, 0.00, 'lunas', 'eror.PNG', '2025-07-14 08:02:29', '2025-07-14 08:02:29'),
(24, 55, 2, 6, 0.00, 0.00, 'lunas', 'eror.PNG', '2025-07-14 08:02:42', '2025-07-14 08:02:42'),
(25, 55, 2, 6, 0.00, 0.00, 'lunas', 'eror.PNG', '2025-07-14 08:12:50', '2025-07-14 08:12:50'),
(26, 57, 1, 2, 50000.00, 50000.00, 'lunas', 'eror.PNG', '2025-07-14 08:31:06', '2025-07-14 08:31:06'),
(27, 56, 2, 6, 0.00, 0.00, 'lunas', 'eror.PNG', '2025-07-14 08:31:58', '2025-07-14 08:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `kategori_event` int(11) NOT NULL,
  `rute` varchar(255) DEFAULT NULL,
  `biaya` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `kewarganegaraan` varchar(100) NOT NULL,
  `nama_bib` varchar(255) DEFAULT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `golongan_darah` varchar(5) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `riwayat_penyakit` text DEFAULT NULL,
  `ukuran_kaos` varchar(10) DEFAULT NULL,
  `kontak_darurat_nama_lengkap` varchar(255) DEFAULT NULL,
  `kontak_darurat_no_hp` varchar(20) DEFAULT NULL,
  `kontak_darurat_hubungan` varchar(100) DEFAULT NULL,
  `persetujuan_peserta` char(1) NOT NULL DEFAULT 'N',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jenis_pendaftaran` enum('berbayar','gratis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `id_event`, `kategori_event`, `rute`, `biaya`, `nama_lengkap`, `email`, `no_hp`, `alamat_lengkap`, `id_provinsi`, `id_kabupaten`, `kewarganegaraan`, `nama_bib`, `no_identitas`, `golongan_darah`, `jenis_kelamin`, `tanggal_lahir`, `riwayat_penyakit`, `ukuran_kaos`, `kontak_darurat_nama_lengkap`, `kontak_darurat_no_hp`, `kontak_darurat_hubungan`, `persetujuan_peserta`, `created_at`, `updated_at`, `jenis_pendaftaran`) VALUES
(2, 1, 2, '5 KM', '50000.00', 'Rachmadaani Indrianto', 'rachmadaani.riskha@gmail.com', '08895228029', 'Piyungan Rt/Rw : 009/000, Srimartani, Piyungan, Bantul, Yogyakarta', 15, 72, 'Indonesia', 'Rachmadaani', '3489294767299377892', 'A', 'L', '2002-05-01', 'Tidak ada', 'S', 'Bambang', '0846258295710', 'Ayah', 'o', '2024-10-31 06:15:43', '2024-11-06 07:49:50', 'berbayar'),
(3, 1, 2, '5 KM', '50000.00', 'Aldo Brawijaya', 'aldo@gmail.com', '087836289192', 'Jalan mawar', 14, 66, 'Indonesia', 'Aldo', '3489294767299447524', 'A', 'L', '2002-07-11', 'Tidak ada', 'L', 'Bambang', '0846258295710', 'Ayah', 'o', '2024-11-06 07:32:33', '2024-11-06 07:55:26', 'berbayar'),
(12, 2, 6, '5 KM', '0.00', 't', 'test@gamil.com', '8', 't', 3, 11, 'y', 't', '9', 'A', 'L', '2024-11-01', 't', 'S', 't', '8', 't', 'o', '2024-11-07 08:47:00', '2024-11-07 08:47:00', 'berbayar'),
(15, 2, 6, '5 KM', '0.00', 't', 'test@gamil.com', '8', 't', 11, 53, 'y', 't', '8', 'A', 'L', '2024-11-01', 't', 'S', 'y', '8', 't', 'o', '2024-11-08 03:00:27', '2024-11-08 03:00:27', 'berbayar'),
(17, 1, 2, '5 KM', '50000.00', 'Burhan', 'burhan@gmail.com', '0845712812346', 'Jalan Mawar', 11, 53, 'Indonesia', 'Burhan', '3489294767299376489', 'A', 'L', '2000-06-07', 'Tidak ada', 'S', 'Birul', '0862538163890', 'Ayah', 'o', '2024-11-08 03:06:57', '2024-11-11 07:56:54', 'berbayar'),
(32, 3, 7, '20 KM', '60000.00', 'Herman', 'herman@gmail.com', '0897352819456', 'Jalan Diponegoro', 11, 53, 'Indonesia', 'Herman', '3489294767299376489', 'B', 'L', '1999-07-10', 'Tidak ada', 'L', 'Bambang', '0875629836736', 'Ayah', 'o', '2024-11-14 07:10:45', '2024-11-14 07:10:45', 'berbayar'),
(35, 3, 7, '20 KM', '60000.00', 't', 'test@gamil.com', '9', 'j', 1, 1, 'i', 'h', '8', 'A', 'L', '1999-07-08', 'tidakl ada', 'S', 't', '8', 't', 'o', '2024-11-14 07:37:55', '2024-11-14 07:37:55', 'berbayar'),
(46, 3, 7, '20 KM', '60000.00', 'Rachmadaani Indrianto', 'rachmadaani.riskha@gmail.com', '08895228029', 'Piyungan Rt/Rw : 009/000, Srimartani, Piyungan, Bantul, Yogyakarta', 15, 72, 'Indonesia', 'Dani', '3489462437490003', 'A', 'L', '2002-05-01', 'Tidak Ada', 'L', 'Maman', '08895228029', 'Ayah', 'o', '2024-11-29 06:24:57', '2024-11-29 06:24:57', 'berbayar'),
(47, 2, 6, '5 KM', '0.00', 'Rachmadaani Indrianto', 'rachmadaani.riskha@gmail.com', '08895228029', 'Piyungan Rt/Rw : 009/000, Srimartani, Piyungan, Bantul, Yogyakarta', 15, 72, 'Indonesia', 'Dani', '3489462437490003', 'A', 'L', '2002-05-01', 'Tidak ada', 'L', 'Agus', '0895002927389', 'Ayah', 'o', '2024-11-29 08:13:17', '2024-11-29 08:13:17', 'berbayar'),
(48, 4, 8, '5 KM', '100000.00', 'Rachmadaani Indrianto', 'rachmadaani.riskha@gmail.com', '08895228029', 'Piyungan Rt/Rw : 009/000, Srimartani, Piyungan, Bantul, Yogyakarta', 15, 72, 'Indonesia', 'Rachmadaani', '34894645010990003', 'B', 'L', '2002-05-01', 'Tidak Ada', 'L', 'Bambang', '0856342345567', 'Ayah', 'o', '2024-12-09 04:00:28', '2024-12-09 04:00:28', 'berbayar'),
(49, 4, 8, '5 KM', '100000.00', 'Rachmadaani Indrianto', 'rachmadaani.riskha@gmail.com', '08895228029', 'Piyungan Rt/Rw : 009/000, Srimartani, Piyungan, Bantul, Yogyakarta', 15, 72, 'Indonesia', 'Dani', '34672882918730023', 'A', 'L', '2002-05-01', 'Tidak afda', 'L', 'Agung', '0867499273661', 'Saudara', 'o', '2024-12-12 02:56:54', '2024-12-12 02:56:54', 'berbayar'),
(50, 4, 8, '5 KM', '100000.00', 'Rachmadaani Indrianto', 'rachmadaani.riskha@gmail.com', '08895228029', 'Piyungan Rt/Rw : 009/000, Srimartani, Piyungan, Bantul, Yogyakarta', 15, 72, 'Indonesia', 'Dani', '3489294767299852957', 'A', 'L', '2002-05-01', 'Tidak ada', 'L', 'Agung', '08895228029', 'Saudara', 'o', '2024-12-12 03:47:49', '2024-12-12 03:47:49', 'berbayar'),
(51, 4, 8, '5 KM', '100000.00', 'Rachmadaani Indrianto Noor Wachyudin', 'rachmadaani.riskha@gmail.com', '08895228029', 'Piyungan', 15, 73, 'Indonesia', 'Dani', '3402140105020003', 'B', 'L', '2002-05-01', 'Tidak ada', 'L', 'Sumarni', '087739833015', 'Ibu', 'o', '2025-03-13 05:49:25', '2025-03-13 05:49:25', 'berbayar'),
(52, 1, 2, '5 KM', '50000.00', 'a', 'a@gmail.con', '89', 'sdg', 16, 76, 'in', 'gh', '78', 'A', 'L', '1972-10-02', '-', 'S', 'gj', '890', 'ad', 'o', '2025-06-25 03:35:08', '2025-06-25 03:35:08', 'berbayar'),
(54, 1, 2, '5 KM', '50000.00', 'Dani', 'dani@gmail.com', '+628895228029', 'Piyungan Rt/Rw : 009/000, Srimartani, Piyungan, Bantul, Yogyakarta', 15, 72, 'Indonesia', 'Dani', '3489294767299377892', 'A', 'L', '2002-05-01', 'Tidak ada', 'L', 'Rachmadaani Indrianto', '08895228029', 'Adik', 'o', '2025-07-12 06:56:27', '2025-07-12 06:56:27', 'berbayar'),
(55, 2, 6, '5 KM', '0.00', 'Rachmadaani', 'rachmadaani.riskha@gmail.com', '+628895228029', 'Piyungan Rt/Rw : 009/000, Srimartani, Piyungan, Bantul, Yogyakarta', 15, 72, 'Indonesia', 'Rachmadaani', '3489294767299377892', 'A', 'L', '2002-01-05', 'Tidak ada', 'L', 'Rachmadaani Indrianto', '08895228029', 'Adik', 'o', '2025-07-14 06:19:08', '2025-07-14 06:19:08', 'berbayar'),
(56, 2, 6, '5 KM', '0.00', 'Rachmadaani', 'rachmadaani.riskha@gmail.com', '+6208895228029', 'Piyungan Rt/Rw : 009/000, Srimartani, Piyungan, Bantul, Yogyakarta', 15, 72, 'Indonesia', 'Rachmadaani', '3489294767299377892', 'A', 'L', '2002-01-05', 'Tidak ada', 'L', 'Rachmadaani Indrianto', '08895228029', 'Adik', 'o', '2025-07-14 08:28:06', '2025-07-14 08:28:06', 'berbayar'),
(57, 1, 2, '5 KM', '50000.00', 'Rachmadaani', 'rachmadaani.riskha@gmail.com', '+6208895228029', 'Piyungan Rt/Rw : 009/000, Srimartani, Piyungan, Bantul, Yogyakarta', 15, 72, 'Indonesia', 'Rachmadaani', '3489294767299447524', 'A', 'L', '2002-01-05', 'Tidak ada', 'L', 'Rachmadaani Indrianto', '08895228029', 'Adik', 'o', '2025-07-14 08:30:07', '2025-07-14 08:30:07', 'berbayar');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id` int(11) NOT NULL,
  `nama_provinsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama_provinsi`) VALUES
(1, 'Aceh'),
(2, 'Sumatra Utara'),
(3, 'Sumatra Barat'),
(4, 'Riau'),
(5, 'Kepulauan Riau'),
(6, 'Jambi'),
(7, 'Sumatra Selatan'),
(8, 'Bangka Belitung'),
(9, 'Bengkulu'),
(10, 'Lampung'),
(11, 'DKI Jakarta'),
(12, 'Jawa Barat'),
(13, 'Banten'),
(14, 'Jawa Tengah'),
(15, 'DI Yogyakarta'),
(16, 'Jawa Timur'),
(17, 'Bali'),
(18, 'Nusa Tenggara Barat'),
(19, 'Nusa Tenggara Timur'),
(20, 'Kalimantan Barat'),
(21, 'Kalimantan Tengah'),
(22, 'Kalimantan Selatan'),
(23, 'Kalimantan Timur'),
(24, 'Kalimantan Utara'),
(25, 'Sulawesi Utara'),
(26, 'Gorontalo'),
(27, 'Sulawesi Tengah'),
(28, 'Sulawesi Selatan'),
(29, 'Sulawesi Barat'),
(30, 'Sulawesi Tenggara'),
(31, 'Maluku'),
(32, 'Maluku Utara'),
(33, 'Papua'),
(34, 'Papua Barat'),
(35, 'Papua Tengah'),
(36, 'Papua Pegunungan'),
(37, 'Papua Selatan'),
(38, 'Papua Barat Daya');

-- --------------------------------------------------------

--
-- Table structure for table `request_event`
--

CREATE TABLE `request_event` (
  `id` int(11) NOT NULL,
  `nama_pengusul` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nama_event` varchar(255) DEFAULT NULL,
  `tanggal_event` date DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `deskripsi_event` text DEFAULT NULL,
  `gambar_event` varchar(255) DEFAULT NULL,
  `nama_kategori` enum('lari','marathon') DEFAULT NULL,
  `deskripsi_kategori` text DEFAULT NULL,
  `biaya` decimal(10,2) DEFAULT NULL,
  `rute` text DEFAULT NULL,
  `tanggal_dimulai` date DEFAULT NULL,
  `jam_dimulai` time DEFAULT NULL,
  `cut_off_time` time DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_event`
--

INSERT INTO `request_event` (`id`, `nama_pengusul`, `no_hp`, `email`, `nama_event`, `tanggal_event`, `lokasi`, `deskripsi_event`, `gambar_event`, `nama_kategori`, `deskripsi_kategori`, `biaya`, `rute`, `tanggal_dimulai`, `jam_dimulai`, `cut_off_time`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'Dani', '8895228029', 'dani@gmail.com', 'Seturan Running', '2026-01-11', 'Seturan, Yogyakarta', ' Event lari', '1751001593_aacdeb2ee2c0a510b0a6.png', 'lari', 'Lari dengan jarak 5 KM', 0.00, '5 KM', '2026-01-11', '19:00:00', '23:00:00', 'Waktu dapat berubah sesuai kondisi di lapangan', '2025-06-27 12:19:53', '2025-06-27 12:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$cP40KeMcl8Nbkp5qNi8r4.8XfMPy/5fknWkhDEf4S7Nd55TSphaw2', '2024-09-23 07:09:03', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_provinsi` (`id_provinsi`);

--
-- Indexes for table `kategori_event`
--
ALTER TABLE `kategori_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_event` (`id_event`);

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_event` (`id_event`),
  ADD KEY `event_kategori` (`event_kategori`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_event_peserta` (`id_event`),
  ADD KEY `fk_kategori_event` (`kategori_event`),
  ADD KEY `fk_provinsi_peserta` (`id_provinsi`),
  ADD KEY `fk_kabupaten_peserta` (`id_kabupaten`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_event`
--
ALTER TABLE `request_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `kategori_event`
--
ALTER TABLE `kategori_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `request_event`
--
ALTER TABLE `request_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `certificates_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD CONSTRAINT `fk_provinsi` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kategori_event`
--
ALTER TABLE `kategori_event`
  ADD CONSTRAINT `fk_event` FOREIGN KEY (`id_event`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pendaftaran` (`id`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`event_kategori`) REFERENCES `kategori_event` (`id`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `fk_event_peserta` FOREIGN KEY (`id_event`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_kabupaten_peserta` FOREIGN KEY (`id_kabupaten`) REFERENCES `kabupaten` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_kategori_event` FOREIGN KEY (`kategori_event`) REFERENCES `kategori_event` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_provinsi_peserta` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
