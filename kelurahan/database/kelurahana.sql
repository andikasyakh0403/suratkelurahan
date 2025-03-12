-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2025 at 01:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelurahana`
--

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `idcarousel` int(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `keterangan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`idcarousel`, `foto`, `keterangan`) VALUES
(3, 'f.jpg', 'jikasnjansansaknssams'),
(4, 'f.jpg', 'jikajsiii'),
(5, 'f.jpg', 'kita'),
(6, 'f.jpg', 'kita'),
(7, 'lembang.jpg', 'suka bermain');

-- --------------------------------------------------------

--
-- Table structure for table `downloadsurat`
--

CREATE TABLE `downloadsurat` (
  `idsurat` int(180) NOT NULL,
  `namasurat` varchar(200) NOT NULL,
  `surat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `downloadsurat`
--

INSERT INTO `downloadsurat` (`idsurat`, `namasurat`, `surat`) VALUES
(3, 'surat keterangan', '5_6327904441093588389.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `kematian`
--

CREATE TABLE `kematian` (
  `nosurat` int(90) NOT NULL,
  `nik` varchar(90) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `jam` time NOT NULL,
  `tglkematian` date NOT NULL,
  `alasan` varchar(300) NOT NULL,
  `suratketerangan` varchar(400) NOT NULL,
  `tempatkubur` varchar(500) NOT NULL,
  `tglinput` date NOT NULL,
  `status` enum('belum disetujui','disetujui','ditolak','') NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kematian`
--

INSERT INTO `kematian` (`nosurat`, `nik`, `hari`, `jam`, `tglkematian`, `alasan`, `suratketerangan`, `tempatkubur`, `tglinput`, `status`, `keterangan`, `user`) VALUES
(2, '3122222212121212', 'sabtu', '23:13:00', '2024-05-29', 'kurang tidur    ', '003.jpg', 'jawa', '2024-05-28', 'belum disetujui', '-', ''),
(3, '1234567890123456', 'sabtu', '01:37:00', '2025-01-30', 'kurang sakit', 'fotobesar.jpg', 'bandung', '0000-00-00', 'belum disetujui', '-', 'andikasyakh21@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `q&a`
--

CREATE TABLE `q&a` (
  `no` int(11) NOT NULL,
  `pertanyaan` varchar(1000) NOT NULL,
  `jawaban` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `q&a`
--

INSERT INTO `q&a` (`no`, `pertanyaan`, `jawaban`) VALUES
(9, 'siapa kah nama aku?', 'boleh saja'),
(10, 'berpa jumlah siswa yang ada di indonesia', 'kita adalah pemain'),
(13, 'siapa ubay?', 'ganteng'),
(15, 'apakah kepengurusan surat dapat di urus secara online', 'bisa karena dapat membuat kita menjadi lebih mudah dalam hal mengurus surat ');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `idrole` int(5) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`idrole`, `role`) VALUES
(1, 'administrator'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `sktm`
--

CREATE TABLE `sktm` (
  `nosurat` int(90) NOT NULL,
  `nik` varchar(160) NOT NULL,
  `notelepon` varchar(180) NOT NULL,
  `email` varchar(160) NOT NULL,
  `keperluan` varchar(400) NOT NULL,
  `tglinput` date NOT NULL,
  `status` enum('disetujui','ditolak','belum disetujui') NOT NULL,
  `alasan` varchar(300) NOT NULL,
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sktm`
--

INSERT INTO `sktm` (`nosurat`, `nik`, `notelepon`, `email`, `keperluan`, `tglinput`, `status`, `alasan`, `user`) VALUES
(5, '1234567890123456', '0895365294219', 'andikasyakh21@gmail.com  ', 'membuat ribut', '2024-05-24', 'ditolak', '', ''),
(8, '3233333333333333', '0895365294219', 'andikasyakh21@gmail.com  ', 'serius ', '2024-05-24', 'belum disetujui', 'karena surat tidak sesuai', ''),
(9, '1234567890123456', '0895365294219', 'andikasyakh21@gmail.com ', 'bermain', '0000-00-00', 'belum disetujui', '-', 'andikasyakh21@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `suratkelahiran`
--

CREATE TABLE `suratkelahiran` (
  `nosurat` int(90) NOT NULL,
  `nik` varchar(160) NOT NULL,
  `namaanak` varchar(400) NOT NULL,
  `harilahir` varchar(50) NOT NULL,
  `tgllahir` date NOT NULL,
  `jamlahir` time NOT NULL,
  `tempatlahir` varchar(100) NOT NULL,
  `anakke` varchar(40) NOT NULL,
  `namaibu` varchar(200) NOT NULL,
  `namaayah` varchar(180) NOT NULL,
  `tglinput` date NOT NULL,
  `status` enum('belum disetujui','disetujui','ditolak','') NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `jeniskelamin` enum('laki-laki','perempuan') NOT NULL,
  `suratketerangan` varchar(300) NOT NULL,
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `suratkelahiran`
--

INSERT INTO `suratkelahiran` (`nosurat`, `nik`, `namaanak`, `harilahir`, `tgllahir`, `jamlahir`, `tempatlahir`, `anakke`, `namaibu`, `namaayah`, `tglinput`, `status`, `keterangan`, `jeniskelamin`, `suratketerangan`, `user`) VALUES
(1, '3122222212121212', 'andika', 'jumat', '2024-05-31', '22:01:00', 'bandung', '2', 'sumarni', 'kolar', '2024-05-23', 'belum disetujui', '', 'laki-laki', '001.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `suratramai`
--

CREATE TABLE `suratramai` (
  `nosurat` int(90) NOT NULL,
  `nik` varchar(300) NOT NULL,
  `notelepon` varchar(180) NOT NULL,
  `email` varchar(300) NOT NULL,
  `hari` varchar(200) NOT NULL,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `selesai` time NOT NULL,
  `acara` varchar(300) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `tglinput` date NOT NULL,
  `status` enum('disetujui','ditolak','belum disetujui') NOT NULL,
  `alasan` varchar(500) NOT NULL,
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `suratramai`
--

INSERT INTO `suratramai` (`nosurat`, `nik`, `notelepon`, `email`, `hari`, `tgl`, `jam`, `selesai`, `acara`, `alamat`, `tglinput`, `status`, `alasan`, `user`) VALUES
(1, '1234567890123456', '0895365294219', 'andikasyakh21@gmail.com ', 'sabtu', '2024-05-09', '17:52:00', '00:05:00', 'kita suka bermain', 'mana', '2024-05-20', 'disetujui', '', ''),
(5, '1234567890123456', '0895365294219', 'andikasyakh21@gmail.com ', 'jumat', '2024-05-29', '23:37:00', '20:41:00', 'peringatan hari baru', 'jl baru no 5', '2024-05-28', 'disetujui', 'surat dapat diambil', ''),
(6, '1111111111111111', '1111111111111111', 'riyan@gmail.com ', 'sabtu', '2024-05-29', '04:34:00', '01:34:00', 'peringatan hari baru', 'jl.joko no 9', '2024-05-31', 'disetujui', '', ''),
(17, '1234567890123456', '0895365294219', 'andikasyakh21@gmail.com ', 'sabtu', '2025-02-19', '22:37:00', '22:37:00', 'peringatan tahun baru islam', 'Neng Xccyxyppxhufuccyf', '2025-02-20', 'disetujui', '', 'andikasyakh21@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(50) NOT NULL,
  `nip` varchar(150) DEFAULT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `idrole` varchar(10) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `notelepon` varchar(100) NOT NULL,
  `status` enum('verfikasi','belum verfikasi') NOT NULL,
  `foto` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `nip`, `namalengkap`, `idrole`, `password`, `nik`, `alamat`, `notelepon`, `status`, `foto`) VALUES
('19220141@bsi.ac.id', '-', '21212121212', '2', '$2y$10$6cwNrh3empAmoj/Ove6Zp..HUDS9jh4GGCJ/.pOyZI5M0O52lI496', '5845454545645645', 'kibar', '78425121514312315212312', 'belum verfikasi', NULL),
('92781728@gmail.com', '-', 'kiu', '2', '$2y$10$aJfXJsnp9zP99ZvpwDlaIODOPDV3Y7fVy9HabMpuW6QLw1VNPG.YW', '8778754564564564', 'ubir', '415645645615315', 'belum verfikasi', NULL),
('andikasyakh21@gmail.com', NULL, 'andika', '2', '$2y$10$okwKyKM9Sy7aCT.CLu8Q/OLwlI13Rq70hhPBUJbGClDcqXY8Y0Oaq', '1234567890123456', 'andika', '0895365294219', 'verfikasi', NULL),
('andikasyakh@gmail.com', '123456789012345', 'achmad baidillah', '1', '$2y$10$URDmup9EggxU8GxK6.lzrO5Rr6Gbp0l1jTwo6L8xjkIVsTiu.Bktm', '3173030403010004', 'andika', '0895365294219', 'verfikasi', 'pro1650363132.png'),
('andikasyakhrahaman@gmail.com', NULL, 'andika syakh rohman', '2', '$2y$10$Ak8Hdf7uDSKQrH5ZzU91kuQYe61ZlLkEYc/MlV4g3fs8APkNJ4bLC', '8989898989899898', 'jskjaksjas', '0895365294219', 'belum verfikasi', NULL),
('andreas@gmail.com', '-', 'andreas', '2', '$2y$10$R06RdSKM7fMZiLMWetA4u.cqU/yM0kW4AqbKwAzGe/DnmRS07fKre', '8782562721212121', 'nisualbsjahsajsh', '02398129029291029102902909', 'belum verfikasi', NULL),
('andreis@gmail.com', '-', 'andreas', '2', '$2y$10$S1oHUYwM0ns/6hOjqHnIYuyUPqhFM7zyL2ISgBgH53c5OrZMicN5W', '2132423434535343', 'nisualbsjahsajsh', '02398129029291029102902909', 'belum verfikasi', NULL),
('ykocul@gmail.com', '-', 'yanto', '2', '$2y$10$G2qdt1jfss6tE/7OZkbjN.h6chNfPo.sU8BTYAKCeLGV3qNRWAY4y', '8888888888888888', 'kajskjaksjaksjkasj', '21212221212121212121', 'belum verfikasi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `nik` varchar(150) NOT NULL,
  `namalengkap` varchar(200) NOT NULL,
  `tempatlahir` varchar(100) NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `kelurahan` varchar(70) NOT NULL,
  `kecamatan` varchar(70) NOT NULL,
  `agama` varchar(70) NOT NULL,
  `status` varchar(80) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `foto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`nik`, `namalengkap`, `tempatlahir`, `tgllahir`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `agama`, `status`, `pekerjaan`, `foto`) VALUES
('1234567890123456', 'andika syakh rohman', 'bandung', '2021-07-12', 'jl.kesederhanaan', 4, 5, 'keagungan', 'tamansari', 'islam', 'belum menikah', 'pelajar', 'warga-1234567890123456-1740119288.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`idcarousel`);

--
-- Indexes for table `downloadsurat`
--
ALTER TABLE `downloadsurat`
  ADD PRIMARY KEY (`idsurat`);

--
-- Indexes for table `kematian`
--
ALTER TABLE `kematian`
  ADD PRIMARY KEY (`nosurat`);

--
-- Indexes for table `q&a`
--
ALTER TABLE `q&a`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);

--
-- Indexes for table `sktm`
--
ALTER TABLE `sktm`
  ADD PRIMARY KEY (`nosurat`);

--
-- Indexes for table `suratkelahiran`
--
ALTER TABLE `suratkelahiran`
  ADD PRIMARY KEY (`nosurat`);

--
-- Indexes for table `suratramai`
--
ALTER TABLE `suratramai`
  ADD PRIMARY KEY (`nosurat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `idcarousel` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `downloadsurat`
--
ALTER TABLE `downloadsurat`
  MODIFY `idsurat` int(180) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kematian`
--
ALTER TABLE `kematian`
  MODIFY `nosurat` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `q&a`
--
ALTER TABLE `q&a`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `idrole` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sktm`
--
ALTER TABLE `sktm`
  MODIFY `nosurat` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `suratkelahiran`
--
ALTER TABLE `suratkelahiran`
  MODIFY `nosurat` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suratramai`
--
ALTER TABLE `suratramai`
  MODIFY `nosurat` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
