-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 10:20 PM
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
-- Database: `presensi_syahrull`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(10) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `waktu` time NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` enum('H','S','I','A') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `id_siswa`, `id_jadwal`, `waktu`, `tanggal`, `keterangan`) VALUES
(1, 33, 4, '08:10:33', '2024-10-28', 'H'),
(2, 19, 4, '08:10:00', '2024-10-28', 'H'),
(3, 29, 4, '08:10:29', '2024-10-28', 'H'),
(4, 26, 4, '08:10:26', '2024-10-28', 'H'),
(5, 33, 2, '12:31:38', '2024-10-28', 'H'),
(6, 19, 2, '12:31:38', '2024-10-28', 'H'),
(7, 29, 2, '12:31:38', '2024-10-28', 'H'),
(8, 26, 2, '12:31:38', '2024-10-28', 'H'),
(9, 33, 3, '07:07:07', '2024-10-29', 'S'),
(10, 19, 3, '07:07:00', '2024-10-29', 'H'),
(11, 29, 3, '07:07:00', '2024-10-29', 'H'),
(12, 19, 4, '09:54:21', '2024-10-29', 'H'),
(13, 33, 4, '09:31:11', '2024-10-29', 'S'),
(14, 29, 4, '09:31:21', '2024-10-29', 'H'),
(15, 33, 5, '12:30:50', '2024-10-29', 'S'),
(16, 19, 5, '12:30:38', '2024-10-29', 'I'),
(17, 29, 5, '12:30:48', '2024-10-29', 'H'),
(18, 33, 6, '07:05:47', '2024-10-30', 'H'),
(19, 19, 6, '07:05:12', '2024-10-30', 'H'),
(20, 29, 6, '07:05:47', '2024-10-30', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(10) NOT NULL,
  `nip` varchar(35) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama`, `jenis_kelamin`, `id_mapel`, `alamat`, `password`) VALUES
(1, '123456', 'Asep', 'L', 1, 'Jl.Kenangan', '$2y$10$6XFB9vQgOqGj/CRs.p/JE.bj1LxhlKnLqQNW9m8OpGwUPQddrmwle'),
(2, '0085746289', 'Haris', 'L', 2, 'Jl Merdeka No. 12, Kelurahan Kencana, Kota Bandung', '$2y$10$JaTn/CUYyaS5d1Nmdlke8ulFR3J7DFYJekEipA4WL5ZVNwwHmREVy'),
(3, '0087465963', 'Budi Santoso', 'L', 3, 'Jl. Raya Lembang No. 7, Kecamatan Lembang, Kabupaten Bandung Barat', '$2y$10$PAEzSnTI1zpYpYV/mb3o1eRflAVQsyiYho7x..rao3Za7gpw2p1YK'),
(4, '19720515 199512 2 00', 'Ratna Dewi', 'P', 4, 'Jl. Cipaganti No. 23, Kecamatan Coblong, Kota Bandung', '$2y$10$/wnS6Bep4VQ0cy4Slwacs.yImu9lsRUpu9pzkgoEdTjEzOPOW6LN6'),
(5, '19740605 200201 2 01', 'Nur Aisyah', 'P', 5, 'Jl. Cisarua No. 22, Kecamatan Cisarua, Kabupaten Bandung Barat', '$2y$10$lWsY.7/izIlDijqCS/r6a.HKWpv97nHJRBym6LlRF6k06DqMdVgKm'),
(6, '19801012 200101 1 003', 'Andi Wijaya', 'L', 6, 'Jl. Cihampelas No. 45, Kecamatan Cidadap, Kota Bandung', '$2y$10$sC.g34dwgDcneR2PeKNT3uoCKYyiH3bfg9GtyZditbjc2Jvvzw8t6');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id_hari` int(11) NOT NULL,
  `nama_hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id_hari`, `nama_hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `aktif` enum('aktif','tidak aktif') DEFAULT 'tidak aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_hari`, `id_guru`, `id_kelas`, `id_mapel`, `jam_mulai`, `jam_selesai`, `aktif`) VALUES
(1, 1, 1, 16, 2, '08:00:00', '11:00:00', 'tidak aktif'),
(2, 1, 5, 16, 5, '12:30:00', '16:15:00', 'tidak aktif'),
(3, 2, 1, 16, 2, '07:00:00', '09:30:00', 'tidak aktif'),
(4, 2, 2, 16, 1, '10:00:00', '13:00:00', 'tidak aktif'),
(5, 2, 3, 16, 4, '13:00:00', '16:15:00', 'tidak aktif'),
(6, 3, 3, 16, 4, '07:00:00', '09:30:00', 'tidak aktif'),
(7, 3, 4, 16, 3, '11:00:00', '16:15:00', 'tidak aktif'),
(8, 4, 2, 16, 1, '07:00:00', '09:30:00', 'tidak aktif'),
(9, 4, 4, 16, 3, '11:15:00', '16:15:00', 'tidak aktif'),
(10, 5, 6, 16, 6, '07:00:00', '09:00:00', 'tidak aktif'),
(11, 5, 5, 16, 5, '09:00:00', '11:30:00', 'tidak aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(10) NOT NULL,
  `tingkatan` enum('10','11','12') NOT NULL,
  `jurusan` enum('RPL','TKJ','AT','TEI','BR','TKI','AXIOO','ORACLE','GAMELAB') NOT NULL,
  `char` enum('A','B','C') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `tingkatan`, `jurusan`, `char`) VALUES
(1, '10', 'RPL', 'A'),
(2, '10', 'RPL', 'B'),
(3, '10', 'TKJ', 'A'),
(4, '10', 'TKJ', 'B'),
(5, '10', 'AT', 'A'),
(6, '10', 'AT', 'B'),
(7, '10', 'TEI', 'A'),
(8, '10', 'TEI', 'B'),
(9, '10', 'BR', 'A'),
(10, '10', 'BR', 'B'),
(11, '10', 'TKI', 'A'),
(12, '10', 'TKI', 'B'),
(13, '10', 'TKI', 'C'),
(14, '10', 'AXIOO', 'A'),
(15, '10', 'GAMELAB', 'A'),
(16, '11', 'RPL', 'A'),
(17, '11', 'RPL', 'B'),
(18, '11', 'TKJ', 'A'),
(19, '11', 'TKJ', 'B'),
(20, '11', 'AT', 'A'),
(21, '11', 'AT', 'B'),
(22, '11', 'AT', 'C'),
(23, '11', 'TEI', 'A'),
(24, '11', 'BR', 'A'),
(25, '11', 'BR', 'B'),
(26, '11', 'TKI', 'A'),
(27, '11', 'TKI', 'B'),
(28, '11', 'AXIOO', 'A'),
(29, '11', 'ORACLE', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'Database'),
(2, 'PBO'),
(3, 'Web Development'),
(4, 'Mobile Development'),
(5, 'Game Development'),
(6, 'P5'),
(7, 'IPAS'),
(8, 'PKK'),
(9, 'Matematika'),
(10, 'PAI'),
(11, 'Bahasa Indonesia'),
(12, 'Bahasa Sunda'),
(13, 'Bahasa Inggris'),
(14, 'PENJAS'),
(15, 'Sejarah'),
(16, 'Seni Budaya'),
(17, 'PKN'),
(18, 'BK');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id_permission` int(11) NOT NULL,
  `action` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id_permission`, `action`) VALUES
(3, 'delete_user'),
(2, 'edit_profile'),
(1, 'view_dashboard'),
(4, 'view_users');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_name` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_name`) VALUES
('admin'),
('user');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_name` enum('admin','user') NOT NULL,
  `id_permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_name`, `id_permission`) VALUES
('admin', 1),
('admin', 2),
('admin', 3),
('admin', 4),
('user', 1),
('user', 2);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(10) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama`, `jenis_kelamin`, `alamat`, `id_kelas`, `no_telepon`, `password`) VALUES
(1, '0087973618', 'Achmad Andhika Natanegara', 'L', 'Batujajar', 16, '082144673981', '$2y$10$JvTkYV/Yu0BCM6yOC70R5.wEhiOOCD6tB7KY0afxukVddqtxNtAjC'),
(2, '3080796611', 'Agil Lucky Wijaya', 'L', 'Kp.Rancabali RT05/04', 16, '081572251601', '$2y$10$u2z6.Mc3vcaDOu8V8vM3CuJbUjEg60CKOPYhpaqI7KMLu5tCqwgYe'),
(3, '0077301269', 'Ahmad Zakaria Masyur', 'L', 'Kp Ciburial RT05/06', 16, '089656160353', '$2y$10$yFHEAGpk/VtU9IIZPdznweM/LW4KXEzqWwuyAAYBvBtNm6ujDTB8q'),
(6, '0085126248', 'Anditha Daiyah', 'P', 'Kp Tegallaja RT01/09', 16, '083168571090', '$2y$10$LyvHV9zgOjmq07gEtML/ceotq0Etsxjy9iv8Q9x8/9buhw99IEp5C'),
(9, '0081072427', 'Avka Saval Susanto', 'L', 'Perumahan KPAD Sejahtera', 16, '088321395667', '$2y$10$Ie7pIpj6DsaYwQmj1e8LQODqa7RGeXnlSGe7doaxrcz.IY6rxXxLS'),
(10, '0074849562', 'Bunga Saylani', 'P', 'Kp Cibuana RT01/02', 16, '085861018241', '$2y$10$wlFJ.SwBbQb8EmUT.j7s6O.KDoWmrVF1gec89r5KAB8MtaT15/uri'),
(17, '0086319870', 'Gensa Muhammad Arumi', 'L', 'Perumahan Cimareme Indah', 16, '083615369215', '$2y$10$KhrRsfr2fLXKeIANuMkqpeL11tlUfa5Yju8W53jnIGxHHYFt9CoRy'),
(19, '0089558937', 'Hangesa Maulana Saputra', 'L', 'Kp.Ciloa RT02/02', 16, '085524596612', '$2y$10$smHVUMbFLbiOrYUHp1qgx.egEKtdMg0jSPRVwk.oXu2da9.xTv4O6'),
(22, '0085492139', 'Mochammad Ryan Nuril pratama', 'L', 'Kp.Bantar Gedang RT03/09', 16, '081223404818', '$2y$10$JsUrXtHDuQuOHR5Pm81zXOT0B7sX3rExC42NhJ1imqlpX2GZueIfS'),
(23, '3072081858', 'Muhammad Akbar Rizqullah', 'L', 'Bojongkoneng', 16, '085723611370', '$2y$10$YqJJU0gRzfJomXLXMRdnOuFQPf/G9nrI0/aDTK5YhP.P8RsPJIHqq'),
(24, '0082206618', 'Muhammad Nur Afriansyah Idris', 'L', 'Perumahan Cimareme Indah', 16, '0895365232815', '$2y$10$AeIWxKYwQ7Rt6IpUgneyXOSHNt9UhoyOGNjwiSyqPTn3o070P3.je'),
(26, '0074670066', 'Muhammad Zidan Hikayatulloh', 'L', 'Tegallaja', 16, '083829549232', '$2y$10$fI8DlSGy3sLzOGf33roEGueuBwcB5BGSRWDRYVIEVXP0/0Qu.D176'),
(29, '0084567854', 'Reno Alwy Alifian', 'L', 'Kp Selacau RT02/05', 16, '089515656397', '$2y$10$cBw13AWtDcJetnDY/YLb6eRuzS0E6xsMlgeLAb9Rvxm.rk8i1OjJK'),
(33, '0074095293', 'Syahrul Hidayatulloh', 'L', 'Kp Cempaka RT01/03', 16, '083820103522', '$2y$10$3dNAagmT.OPQritIApgoIOdLV5Bx/0/4u3m/9qBMFNeF1Pjkj7DSm'),
(34, '0071774203', 'Taufik Hidayat', 'L', 'Kp Cileeur RT01/07', 16, '081564998125', '$2y$10$B69/36TAROw6yotgFzhWU.VF3c.yqCjkpNcKlI.jOJlgbF2LHsCkm'),
(37, '123456', 'test', 'L', 'testing', 16, '1222333444', '$2y$10$iZKEF8MRy7ULJ9bAEsU29ednt8wII1yZVtZbDOTLVa77/QMN9Huq.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `id_user_guru` int(11) DEFAULT NULL,
  `id_user_siswa` int(11) DEFAULT NULL,
  `user_type` enum('siswa','guru') NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_user_guru`, `id_user_siswa`, `user_type`, `username`, `password`, `role`) VALUES
(1, NULL, 33, 'siswa', '0074095293', '$2y$10$3dNAagmT.OPQritIApgoIOdLV5Bx/0/4u3m/9qBMFNeF1Pjkj7DSm', 'user'),
(3, NULL, 19, 'siswa', '0089558937', '$2y$10$smHVUMbFLbiOrYUHp1qgx.egEKtdMg0jSPRVwk.oXu2da9.xTv4O6', 'user'),
(4, NULL, 24, 'siswa', '0082206618', '$2y$10$AeIWxKYwQ7Rt6IpUgneyXOSHNt9UhoyOGNjwiSyqPTn3o070P3.je', 'user'),
(5, NULL, 23, 'siswa', '3072081858', '$2y$10$YqJJU0gRzfJomXLXMRdnOuFQPf/G9nrI0/aDTK5YhP.P8RsPJIHqq', 'user'),
(6, NULL, 26, 'siswa', '0074670066', '$2y$10$fI8DlSGy3sLzOGf33roEGueuBwcB5BGSRWDRYVIEVXP0/0Qu.D176', 'user'),
(7, NULL, 1, 'siswa', '0087973618', '$2y$10$JvTkYV/Yu0BCM6yOC70R5.wEhiOOCD6tB7KY0afxukVddqtxNtAjC', 'user'),
(8, NULL, 2, 'siswa', '3080796611', '$2y$10$u2z6.Mc3vcaDOu8V8vM3CuJbUjEg60CKOPYhpaqI7KMLu5tCqwgYe', 'user'),
(9, NULL, 22, 'siswa', '0085492139', '$2y$10$JsUrXtHDuQuOHR5Pm81zXOT0B7sX3rExC42NhJ1imqlpX2GZueIfS', 'user'),
(10, NULL, 9, 'siswa', '0081072427', '$2y$10$Ie7pIpj6DsaYwQmj1e8LQODqa7RGeXnlSGe7doaxrcz.IY6rxXxLS', 'user'),
(11, NULL, 29, 'siswa', '0084567854', '$2y$10$cBw13AWtDcJetnDY/YLb6eRuzS0E6xsMlgeLAb9Rvxm.rk8i1OjJK', 'user'),
(12, NULL, 17, 'siswa', '0086319870', '$2y$10$KhrRsfr2fLXKeIANuMkqpeL11tlUfa5Yju8W53jnIGxHHYFt9CoRy', 'user'),
(13, NULL, 10, 'siswa', '0074849562', '$2y$10$wlFJ.SwBbQb8EmUT.j7s6O.KDoWmrVF1gec89r5KAB8MtaT15/uri', 'user'),
(14, NULL, 6, 'siswa', '0085126248', '$2y$10$LyvHV9zgOjmq07gEtML/ceotq0Etsxjy9iv8Q9x8/9buhw99IEp5C', 'user'),
(15, NULL, 3, 'siswa', '0077301269', '$2y$10$yFHEAGpk/VtU9IIZPdznweM/LW4KXEzqWwuyAAYBvBtNm6ujDTB8q', 'user'),
(16, NULL, 34, 'siswa', '0071774203', '$2y$10$B69/36TAROw6yotgFzhWU.VF3c.yqCjkpNcKlI.jOJlgbF2LHsCkm', 'user'),
(17, NULL, 37, 'siswa', '123456', '$2y$10$iZKEF8MRy7ULJ9bAEsU29ednt8wII1yZVtZbDOTLVa77/QMN9Huq.', 'user');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `before_insert_username` BEFORE INSERT ON `user` FOR EACH ROW BEGIN
    -- Memeriksa tipe pengguna baru
    IF NEW.user_type = 'siswa' THEN
        -- Ambil nisn dan password dari tabel siswa
        SET NEW.username = (SELECT nisn FROM siswa WHERE siswa.id_siswa = NEW.id_user_siswa);
        SET NEW.password = (SELECT password FROM siswa WHERE siswa.id_siswa = NEW.id_user_siswa);
        SET NEW.id_user_guru = NULL; -- Mengatur id_user_guru menjadi NULL jika pengguna adalah siswa
    ELSEIF NEW.user_type = 'guru' THEN
        -- Ambil nip dan password dari tabel guru
        SET NEW.username = (SELECT nip FROM guru WHERE guru.id_guru = NEW.id_user_guru);
        SET NEW.password = (SELECT password FROM guru WHERE guru.id_guru = NEW.id_user_guru);
        SET NEW.id_user_siswa = NULL; -- Mengatur id_user_siswa menjadi NULL jika pengguna adalah guru
    END IF;

    -- Tambahkan pemeriksaan untuk mencegah NULL
    IF NEW.username IS NULL THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Username tidak ditemukan!';
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `fk_siswa` (`id_siswa`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `fk_nama` (`nama`),
  ADD KEY `fk_password` (`password`),
  ADD KEY `id_mapel` (`id_mapel`) USING BTREE;

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `fk_hari` (`id_hari`),
  ADD KEY `fk_guru` (`id_guru`),
  ADD KEY `fk_kelas` (`id_kelas`),
  ADD KEY `fk_mapel` (`id_mapel`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id_permission`),
  ADD UNIQUE KEY `action` (`action`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_name`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`role_name`,`id_permission`),
  ADD KEY `fk_permission` (`id_permission`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD KEY `fk_nama` (`nama`),
  ADD KEY `fk_password` (`password`),
  ADD KEY `fk_kelas` (`id_kelas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_password` (`password`),
  ADD KEY `fk_username` (`username`) USING BTREE,
  ADD KEY `role` (`role`),
  ADD KEY `siswa` (`id_user_siswa`) USING BTREE,
  ADD KEY `guru` (`id_user_guru`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id_permission` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `fk_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `fk_mapell` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `fk_guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hari` FOREIGN KEY (`id_hari`) REFERENCES `hari` (`id_hari`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `fk_permission` FOREIGN KEY (`id_permission`) REFERENCES `permissions` (`id_permission`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_role_name` FOREIGN KEY (`role_name`) REFERENCES `roles` (`role_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_kelas_siswa` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_id_guru` FOREIGN KEY (`id_user_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_siswa` FOREIGN KEY (`id_user_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`role`) REFERENCES `roles` (`role_name`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `update_jadwal_aktif` ON SCHEDULE EVERY 1 MINUTE STARTS '2024-10-29 03:55:58' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE jadwal
    SET aktif = CASE
        WHEN TIME(CURRENT_TIME) BETWEEN jam_mulai AND jam_selesai
             AND id_hari = (
                SELECT id_hari 
                FROM hari 
                WHERE nama_hari = CASE LOWER(DAYNAME(CURRENT_DATE))
                    WHEN 'monday' THEN 'senin'
                    WHEN 'tuesday' THEN 'selasa'
                    WHEN 'wednesday' THEN 'rabu'
                    WHEN 'thursday' THEN 'kamis'
                    WHEN 'friday' THEN 'jumat'
                    WHEN 'saturday' THEN 'sabtu'
                    WHEN 'sunday' THEN 'minggu'
                END
             ) THEN 'aktif'
        ELSE 'tidak aktif'
    END;
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
