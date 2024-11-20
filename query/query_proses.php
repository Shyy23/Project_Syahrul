<?php
include '../koneksi.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tabel = isset($_POST['tabel']) ? $_POST['tabel'] : '';

switch($tabel){
    case 'siswa':
        $nisn = $_POST['nisn'];
        $nama = $_POST['nama_siswa'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat'];
        $id_kelas = $_POST['kelas'];
        $no_telepon = $_POST['no_telepon'];
        $password = $_POST['password'];

        if($nisn && $nama && $jenis_kelamin && $alamat && $id_kelas && $no_telepon && $password){

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql_insert = "INSERT INTO siswa (nisn, nama, jenis_kelamin, alamat, id_kelas, no_telepon, `password`) VALUES
            (?,?,?,?,?,?,?)";

            $stmt = $conn->prepare($sql_insert);
            $stmt->bind_param("ssssiss", $nisn, $nama, $jenis_kelamin, $alamat, $id_kelas, $no_telepon, $hashed_password);

            if($stmt->execute()){
                echo "Data Berhasil Ditambahkan";
                header("Location: ../table.php");
            } else {
                echo "Gagal Menambahkan Data";
            }
        } else {
            echo "Harap isi semua field";
        }
        break;
    case 'guru':
        $nip = $_POST['nip'];
        $nama = $_POST['nama_guru'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $id_mapel = $_POST['mapel'];
        $alamat = $_POST['alamat'];
        $password = $_POST['password'];

        if($nip && $nama && $jenis_kelamin && $jenis_kelamin && $id_mapel && $alamat && $password){

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql_insert = "INSERT INTO guru (nip, nama, jenis_kelamin, id_mapel, alamat, `password` VALUES
            (?,?,?,?,?,?)";

            $stmt = $conn->prepare($sql_insert);
            $stmt->bind_param("sssiss", $nip, $nama, $jenis_kelamin, $id_mapel, $alamat, $hashed_password);

            if($stmt->execute()){
                echo "Data Berhasil Ditambahkan";
                header("Location:../table.php");
            } else {
                echo "Gagal Menambahkan Data";
            }
        } else {
            echo "Harap isi semua field";
        }
        break;
}
}
?>