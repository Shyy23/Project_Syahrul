<?php
include '../koneksi.php';

if($_SERVER["REQUEST_METHOD"]== "POST"){
    if(isset($_POST['id_siswa'])){
        // Ambil data
        $id_siswa = $_POST['id_siswa'];
        $nama_siswa = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $id_kelas = $_POST['id_kelas'];
        $alamat = $_POST['alamat'];

        // Update data
        $query = "UPDATE siswa SET nama = ?, jenis_kelamin = ?, id_kelas = ?, alamat = ? WHERE id_siswa = ?";
        if($stmt = $conn->prepare($query)){
            $stmt->bind_param("ssisi", $nama_siswa, $jenis_kelamin, $id_kelas, $alamat, $id_siswa);
            if($stmt->execute()){
                echo "Data Berhasil Diperbarui!!";
                header("Location: ../table.php");
            } else {
                echo "Gagal Memperbarui Data";
            }
        }
    } else if(isset($_POST['id_guru'])){
        // Ambil Data
        $id_guru = $_POST['id_guru'];
        $nama_guru = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $id_mapel = $_POST['mapel'];
        $alamat = $_POST['alamat'];

        // Update data
        $query = "UPDATE guru SET nama = ?, jenis_kelamin = ?, id_mapel = ?, alamat = ? WHERE id_guru = ?";
        if($stmt = $conn->prepare($query)){
            $stmt->bind_param("ssisi", $nama_guru, $jenis_kelamin, $id_mapel, $alamat, $id_guru);
            if($stmt->execute()){
                echo "Data Berhasil Diperbarui!!";
                header("Location:../table.php");
            } else{
                echo "Gagal Memperbarui Data";
            }
    }
} else if(isset($_POST['id_jadwal'])){
    // Ambil data
    $id_jadwal = $_POST['id_jadwal'];
    $id_hari = $_POST['hari'];
    $id_guru = $_POST['nama_guru'];
    $id_kelas = $_POST['kelas'];
    $id_mapel = $_POST['mapel'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];

    $query = "UPDATE jadwal SET id_hari = ?, id_guru = ?, id_kelas = ?, id_mapel = ?, jam_mulai = ?, jam_selesai = ? WHERE id_jadwal = ?";
    if($stmt = $conn->prepare($query)){
        $stmt->bind_param("iiiissi", $id_hari, $id_guru, $id_kelas, $id_mapel, $jam_mulai, $jam_selesai, $id_jadwal);
        if($stmt->execute()){
            echo "Data Berhasil Diperbarui";
            header("Location:../table.php");
        } else {
            echo "Gagal Memperbarui Data";
        }
    }
} else if(isset($_POST['id_absen'])){
    // Ambil data
    $id_absen = $_POST['id_absen'];
    $keterangan = $_POST['keterangan'];
}  
} else {
    echo "Data Tidak terkirim";
}
?>