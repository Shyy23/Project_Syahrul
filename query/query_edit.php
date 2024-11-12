<?php

// ====================================== SISWA =============================================

$siswa_id = $_GET['siswa_id'];
// Query Tabel Siswa
$sql_siswa = "SELECT s.*, CONCAT(
    CASE k.tingkatan
    WHEN '10' THEN 'X'
    WHEN '11' THEN 'XI'
    WHEN '12' THEN 'XII'
    ELSE k.tingkatan
    END, ' ', k.jurusan, ' ',k.char) AS nama_kelas_s
    FROM siswa s
    JOIN kelas k ON s.id_kelas = k.id_kelas
    WHERE s.id_siswa = '$siswa_id'
    ";

// Execution code untuk tabel siswa
    $result_siswa = $conn->query($sql_siswa);

// Validasi Data Tabel Siswa
    if($result_siswa->num_rows>0){
        $row = $result_siswa->fetch_assoc();

        $nama = $row['nama'];
        $jenis_kelamin= $row['jenis_kelamin'];
        $nama_kelas_s = $row['nama_kelas_s'];
        $id_kelas = $row['id_kelas'];
        $alamat = $row['alamat'];
    } else {
        echo "Data Tidak Ditemukan";
    }

    // ====================================== GURU =============================================
$guru_id = $_GET['guru_id'];

$sql_guru = "SELECT g.*, 
    m.nama_mapel AS nama_mapel_g
    FROM guru g
    JOIN mapel m ON g.id_mapel = m.id_mapel
    WHERE g.id_guru = '$guru_id'
    ";

$result_guru = $conn->query($sql_guru);

if($result_guru -> num_rows>0){
    $row = $result_guru->fetch_assoc();
}

?>