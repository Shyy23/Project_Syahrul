<?php
include '../koneksi.php';


$sql_siswa = "SELECT * FROM siswa";
$sql_vSiswa = "SELECT * FROM vSiswa";
$sql_kelas = "SELECT * FROM kelas";

$kelass_data = [];
$sql_kelass = "SELECT * FROM vKelas ORDER BY id_kelas";
$stmt_kelass = $conn->prepare($sql_kelass);
$stmt_kelass->execute();
$result_kelass = $stmt_kelass->get_result();
if ($result_kelass->num_rows > 0) {
    while ($data = $result_kelass->fetch_assoc()) {
        $kelass_data[] = ['value' => $data['id_kelas'], 'label' => $data['nama_kelas']];
    }
}

$tabel = isset($_GET['tabel']) ? $_GET['tabel'] : '';
$formFields=[];


switch($tabel){
case 'siswa':
    $formFields = [
        'nisn' => ['label' => 'NISN', 'type' => 'text'],
        'nama_siswa' => ['label' => 'Nama Siswa', 'type' => 'text'],
        'jenis_kelamin' => ['label' => 'Jenis Kelamin', 'type' => 'select', 'options' => ['L' => 'Laki Laki', 'P' => 'Perempuan']],
        'alamat' => ['label' => 'Alamat', 'type' => 'text'],
        'kelas' => ['label' => 'Kelas', 'type' => 'select', 'options' => $kelass_data],
        'no_telepon' => ['label' => 'No Telepon', 'type' => 'text', ],
        'password' => ['label' => 'Password', 'type' => 'password']

    ];
    break;
 default:
 die('tabel tidak ditemukan.');


}
?>

