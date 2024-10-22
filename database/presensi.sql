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

-- Dumping data for table `siswa`
INSERT INTO siswa (`id_siswa`, `nisn`, `nama`, `jenis_kelamin`, `alamat`, `id_kelas`, `no_telepon`, `password`) VALUES
(33, '00000', 'Syahrul Hidayatulloh', 'L', '-', '11', '-', 'abcdefghij');

-- Table structure for table `user`
CREATE TABLE user (
    `id_user` INT PRIMARY KEY AUTO_INCREMENT,
    `nama` VARCHAR(100) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `level` ENUM('admin', 'user') NOT NULL, -- Misalnya level dapat berupa 'admin' atau 'user'
    `id` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `user`
INSERT INTO user(`id_user`, `nama`, `password`, `level`, `id`) VALUES
(1, 'Shyy', 'abcdefg', 'admin', 2);

-- Table structure for table `guru`
CREATE TABLE guru (
    `id_guru` INT PRIMARY KEY AUTO_INCREMENT,
    `nip` VARCHAR(20) NOT NULL UNIQUE,
    `nama` VARCHAR(100) NOT NULL,
    `jenis_kelamin` ENUM('L', 'P') NOT NULL,
    `alamat` TEXT NOT NULL,
    `password` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `Guru`
INSERT INTO guru(`id_guru`, `nip`, `nama`, `jenis_kelamin`, `alamat`, `password`) VALUES
(1, '22334455', 'Fulan', 'L', '-', '12345');



