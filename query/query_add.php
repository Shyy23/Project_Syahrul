<?php
include '../koneksi.php';
include 'query.php';

$sql_siswa = "SELECT * FROM siswa";
$sql_vSiswa = "SELECT * FROM vSiswa";
$sql_kelas = "SELECT * FROM kelas";

$tabel = isset($_GET['tabel']) ? $_GET['tabel'] : '';
$formFields=[];


switch($tabel){
case 'siswa':
    $formFields = [
        'id_siswa' => ['label' => 'ID Siswa', 'type' => 'hidden'],
        'nisn' => ['label' => 'NISN', 'type' => 'text'],
        'nama_siswa' => ['label' => 'Nama Siswa', 'type' => 'text'],
        'jenis_kelamin' => ['label' => 'Jenis Kelamin', 'type' => 'select', 'options' => ['L' => 'Laki Laki', 'P' => 'Perempuan']],
        'alamat' => ['label' => 'Alamat', 'type' => 'text'],
        

    ];
    break;
}
?>