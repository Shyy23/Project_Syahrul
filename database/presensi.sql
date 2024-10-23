-- Membuat nama database
-- CREATE DATABASE presensi;

-- USE presensi;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- USE testing;


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

-- Table structure for table `absen`
CREATE TABLE absen (
    `id_absen` INT PRIMARY KEY AUTO_INCREMENT,
    `id_siswa` INT NOT NULL,
    `id_jadwal` INT NOT NULL,
    `waktu` TIME DEFAULT CURRENT_TIMESTAMP,
    `tanggal` DATE DEFAULT CURRENT_TIMESTAMP,
    `keterangan` ENUM('H', 'S', 'I', 'A') NOT NULL,
    CONSTRAINT fk_siswa FOREIGN KEY (`id_siswa`) REFERENCES siswa(`id_siswa`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- INSERT INTO absen (`id_absen`, `id_siswa`, `id_jadwal`, `waktu`, `jadwal`, `keterangan`) VALUES
-- ();

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

-- Table structure for table `hari`
CREATE TABLE hari (
    `id_hari` INT PRIMARY KEY AUTO_INCREMENT,
    `hari` ENUM('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `hari`
-- INSERT INTO hari (hari) VALUES 
-- ('Kamis');



-- Table structure for table `kelas`
CREATE TABLE kelas (
    `id_kelas` INT PRIMARY KEY AUTO_INCREMENT,
    `tingkatan` ENUM('10', '11', '12') NOT NULL,
    `jurusan` ENUM('RPL', 'TKJ', 'AT', 'TEI', 'BR', 'TKI', 'AXIOO', 'ORACLE') NOT NULL,
    `char` ENUM('A', 'B', 'C') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `kelas`
-- INSERT INTO kelas (`id_kelas`, `tingkatan` ,`jurusan`, 'char') VALUES 
-- (1, '11','RPL', 'A');

-- Table structure for table `mapel`
CREATE TABLE mapel (
    `id_mapel` INT PRIMARY KEY AUTO_INCREMENT,
    `nama_mapel` VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `mapel`
-- INSERT INTO mapel (`id_mapel`, `nama_mapel`) VALUES
-- (1, 'Database');

-- Table structure for table `jadwal`
CREATE TABLE jadwal (
    `id_jadwal` INT PRIMARY KEY AUTO_INCREMENT,
    `id_hari` INT NOT NULL,
    `id_guru` INT NOT NULL,
    `id_kelas` INT NOT NULL,
    `id_mapel` INT NOT NULL,
    `jam_mulai` TIME NOT NULL,
    `jam_selesai` TIME NOT NULL,
    `tanggal` DATE DEFAULT CURRENT_TIMESTAMP,
    `aktif` INT NOT NULL,
    CONSTRAINT fk_hari FOREIGN KEY (`id_hari`) REFERENCES hari(`id_hari`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    CONSTRAINT fk_guru FOREIGN KEY (`id_guru`) REFERENCES guru(`id_guru`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    CONSTRAINT fk_kelas FOREIGN KEY (`id_kelas`) REFERENCES kelas(`id_kelas`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    CONSTRAINT fk_mapel FOREIGN KEY (`id_mapel`) REFERENCES mapel(`id_mapel`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `jadwal`
-- INSERT INTO jadwal (`id_jadwal`, `id_hari`, `id_kelas`, `id_mapel`, `jam_mulai`, `jam_selesai`, `tanggal`, `aktif`) VALUES
-- (1, 1, 11, 2, '07:00:00', '09:00:00', '2024-10-24' ,0);

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

