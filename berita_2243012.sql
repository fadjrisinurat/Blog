-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2024 at 07:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita_2243012`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(99) NOT NULL,
  `deskripsi` text NOT NULL,
  `isi` text NOT NULL,
  `tanggal_publikasi` date DEFAULT NULL,
  `penulis` int(11) DEFAULT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `deskripsi`, `isi`, `tanggal_publikasi`, `penulis`, `gambar`) VALUES
(2, 'Berserk ', 'Guts: Seorang pendekar berbalut pakaian serba hitam yang membawa pedang sejenis Claymore', 'Berserk adalah sebuah seri manga Jepang yang ditulis dan diilustrasikan oleh Kentaro Miura. Manga ini berlatar di dunia fantasi gelap yang terinspirasi dari Eropa abad pertengahan dan mengikuti perjalanan karakter Guts, seorang pengguna pedang yang sendirian, dan Griffith, pemimpin dari sebuah kelompok tentara bayaran yang disebut “Kelompok Hawk”.', '2024-07-05', 1, 'guts.jpg'),
(3, 'Navi dota 2', 'Team Navi adalah tim eSports yang pertama kali dibentuk sebagai komunitas pada Desember 2009 di Kiev, Ukraina. Nama “Natus Vincere” (Na’Vi) terinspirasi dari film “Avatar”.', 'Team Navi adalah tim eSports yang pertama kali dibentuk sebagai komunitas pada Desember 2009 di Kiev, Ukraina. Nama “Natus Vincere” (Na’Vi) terinspirasi dari film “Avatar”. Tim ini memiliki divisi untuk berbagai permainan, termasuk Counter Strike: Global Offensive, Dota 2, FIFA, World of Tanks, dan League of Legends. Divisi Counter Strike berhasil memenangkan tiga turnamen besar dalam satu tahun, sementara divisi Dota 2 meraih kejuaraan bergengsi The International dengan hadiah $1.000.000. ', '2024-01-01', 1, 'navi.png'),
(4, 'Daniel chua', 'Asli keturunan orang banjar dan sunda', 'kisah seorang remaja yang mempertaruhkan hidupnya melawan iblis dari umur 3 tahun hingga remaja', '2024-07-02', 11, 'wallpaper3_large.jpg'),
(5, 'Counter strike 2', 'Counter-Strike 2 adalah evolusi dari game sebelumnya, CS:GO, dan menandai lompatan teknis terbesar dalam sejarah Counter-Strike. Game ini dibangun di atas mesin Source 2, yang memodernisasi game dengan rendering fisik yang realistis, jaringan canggih, dan alat Workshop Komunitas yang ditingkatkan', 'Game ini dirilis secara resmi pada 27 September 2023 setelah fase pengujian awal2. Untuk pemain yang telah mengumpulkan inventaris skin di CS:GO, berita baiknya adalah Anda dapat membawa seluruh inventaris CS:GO Anda ke Counter-Strike 2. Setiap skin akan terlihat lebih baik berkat mesin Source 2, memberikan polesan generasi terkini.\r\n\r\nCounter-Strike 2 menawarkan pengalaman kompetitif elit yang telah dibentuk oleh jutaan pemain dari seluruh dunia. Dengan teknologi baru seperti pembaruan sub-tick, game ini bertujuan untuk menciptakan lingkungan yang adil untuk kompetisi online, di mana “tick rate tidak lagi penting untuk bergerak, menembak, atau melempar” dan setiap aksi akan hampir instan saat Anda melakukan tindakan', '2024-07-05', 1, 'images.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id` int(11) NOT NULL,
  `nama` varchar(99) DEFAULT NULL,
  `email` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id`, `nama`, `email`) VALUES
(1, 'Fabian ', 'faitha@gmail.com'),
(11, 'Andi kanaeru', 'Gaesang@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penulis` (`penulis`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`penulis`) REFERENCES `penulis` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
