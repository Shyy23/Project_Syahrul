-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 11:10 PM
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
/* 
CRUD -> C -> Create 
Create by Syahrul
Create Databases 
*/

Create DATABASE query_syahrul;
USE query_syahrul;

-- Create Table
CREATE TABLE `siswa` (
  `id_siswa` int(10) NOT NULL AUTO_INCREMENT,
  `nisn` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `kelas` ENUM ('10', '11', '12'),
  `no_telepon` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
  PRIMARY KEY (`id_siswa`),
  UNIQUE KEY (`nisn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Create Index
CREATE INDEX idx_nama ON siswa (nama);

-- Function hash password SHA-256
CREATE FUNCTION hash_password(input_password VARCHAR(255))
RETURNS VARCHAR(255)
DETERMINISTIC
BEGIN
RETURN SHA2(input_password, 256)
END;

-- Create Procedure
CREATE PROCEDURE tambah_siswa (
    IN nama_siswa VARCHAR(100), 
    IN nisn_siswa VARCHAR(10), 
    IN jenis_kelamin_siswa ENUM('L', 'P'),
    IN alamat_siswa TEXT, 
    IN kelas_siswa VARCHAR(10), 
    IN no_telepon_siswa VARCHAR(20), 
    IN password_siswa VARCHAR(255)
)
BEGIN
    IF kelas_siswa NOT IN ('10', '11', '12') THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Kelas hanya terdiri dari 10, 11, 12'
    END IF;

    INSERT INTO siswa (nama, nisn, jenis_kelamin, alamat, kelas, no_telepon, hash_password(password)) 
    VALUES (nama_siswa, nisn_siswa, jenis_kelamin_siswa, alamat_siswa, kelas_siswa, no_telepon_siswa, password_siswa);
END;

-- Create View
CREATE VIEW view_siswa AS
SELECT 
    id_siswa,
    nisn,
    nama,
    kelas
FROM 
    siswa;
    
-- Create Insert dumping siswa

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama`, `jenis_kelamin`, `alamat`, `kelas`, `no_telepon`, `password`) VALUES
(1, '909290187', 'syahrul', 'L', 'cempaka', '11', '083820103522', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'),
(2, '909290187', 'zidan', 'L', 'tegallaja', '11', '08959328903', '960b98f2767a8b4e417f747ad1adea6a438de622c5f46ed163b4d686d7e09c12'),
(3, '728372324', 'hangesa', 'L', 'lebaksari', '11', '0838216217', '49c43ea53c82b6a6950d99293e247ca477b52b7485df5daaca6282a0674ecf46'),
(4, '564738234', 'andy', 'L', 'jl kenanga', '11', '0845682193', '2937013f2181810606b2a799b05bda2849f3e369a20982a4138f0e0a55984ce4'),
(5, '456823902', 'budi', 'L', 'Kp.cina', '10', '0845409455', 'sadaisreihjijsd');

-- ADD Primary KEY
ALTER TABLE `siswa`
ADD PRIMARY KEY (`id_siswa`);

-- CRUD -> R -> READ
-- Mengambil Semua Data
SELECT * FROM siswa;

-- Mengambil dengan kriteria tertentu
SELECT * FROM siswa WHERE kelas = '11';

-- Mengambil data dengan filter beberapa kolom
SELECT nisn, nama, kelas FROM siswa;

-- Mengambil data dengan sorting
SELECT * FROM siswa ORDER BY nama DESC;

-- Mengambil data dengan 
SELECT * FROM siswa WHERE nama LIKE 'syahrul';

-- Mengambil data dengan LIMIT
SELECT * FROM siswa LIMIT 5;

-- CRUD -> U -> UPDATE
-- update with where
--update with beberapa kondisi
UPDATE siswa
SET kelas = '12'
WHERE kelas ='11' AND nama = 'andy';

-- update with like
UPDATE siswa
SET nama = 'aris'
WHERE nama LIKE '%andy%';

-- Update dengan function
UPDATE siswa 
SET `password` = hash_password('password_baru')
WHERE id_siswa = 5;

-- CRUD -> D -> DELETE
-- Menghapus semua data
DELETE FROM siswa
-- menghapus data berdasarkan id_siswa
DELETE FROM siswa
WHERE id_siswa = 5;

-- menghapus dengan drop
DROP DATABASE query_syahrul;
DROP TABLE siswa;

-- Menghapus dengan TRUNCATE
TRUNCATE TABLE siswa;

-- Menghapus Alter Drop
ALTER TABLE siswa
DROP COLUMN kp_cempaka RT03/03;

ALTER TABLE siswa
DROP INDEX idx_nama;

-- Menghapus dengan REVOKE
REVOKE privilege_type ON nama_database.* FROM 'username'@'host';

ALTER TABLE siswa
DROP CONSTRAINT fk_kelas;;




