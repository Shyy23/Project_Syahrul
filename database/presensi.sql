-- Membuat nama database
-- CREATE DATABASE presensi;

-- USE presensi;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

USE testing;
-- Table structure for table `siswa`
CREATE TABLE siswa (
    `id_siswa` INT PRIMARY KEY AUTO_INCREMENT,
    `nisn` VARCHAR(10) NOT NULL UNIQUE,
    `nama` VARCHAR(100) NOT NULL,
    `jenis_kelamin` ENUM('L', 'P') NOT NULL,
    `alamat` TEXT NOT NULL,
    `id_kelas` INT(5) NOT NULL,
    `no_telepon` varchar(20) NOT NULL,
    `password` VARCHAR(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO siswa (`id_siswa`, `nisn`, `nama`, `jenis_kelamin`, `alamat`, `id_kelas`, `no_telepon`, `password`) VALUES
(33, '00000', 'Syahrul Hidayatulloh', 'L', '-', '11', '-', 'abcdefghij');

-- Dumping data for table `siswa`



