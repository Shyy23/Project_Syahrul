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

$hari_data = [];
$sql_hari = "SELECT * FROM hari ORDER BY id_hari";
$stmt_hari = $conn->prepare($sql_hari);
$stmt_hari->execute();
$result_hari = $stmt_hari->get_result();
if($result_hari->num_rows > 0){
    while ($data = $result_hari->fetch_assoc()) {
        $hari_data[] = ['value' => $data['id_hari'], 'label' => $data['nama_hari']];
    }
}

$mapel_data = [];
$sql_mapel = "SELECT * FROM mapel ORDER BY id_mapel";
$stmt_mapel = $conn->prepare($sql_mapel);
$stmt_mapel->execute();
$result_mapel = $stmt_mapel->get_result();
if ($result_mapel->num_rows > 0){
    while ($data = $result_mapel->fetch_assoc()){
        $mapel_data[] = ['value' => $data['id_mapel'], 'label' => $data['nama_mapel']];
    }
}

$guru_data = [];
$sql_guruu="SELECT * FROM vGuru ORDER BY id_guru";
$stmt_guruu = $conn->prepare($sql_guruu);
$stmt_guruu->execute();
$result_guruu = $stmt_guruu->get_result();
if($result_guruu->num_rows > 0){
    while ($data = $result_guruu->fetch_assoc()){
        $guru_data[] = ['value' => $data['id_guru'], 'label'=> $data['nama_guru_g']];
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
case 'guru':
    $formFields = [
        'nip' => ['label' => 'NIP', 'type' => 'text'],
        'nama_guru' => ['label' => 'Nama Siswa', 'type' => 'text'],
        'jenis_kelamin' => ['label' => 'Jenis Kelamin', 'type' => 'select', 'options' => ['L' => 'Laki Laki', 'P' => 'Perempuan']],
        'mapel' => ['label' => 'Mapel', 'type' => 'select', 'options' => $mapel_data],
        'alamat' => ['label' => 'Alamat', 'type' => 'text'],
        'password' => ['label' => 'Password', 'type' => 'password']
    ];
    break;
case 'jadwal':
    $formFields = [
        'hari' => ['label' => 'Hari', 'type' => 'select', 'options' => $hari_data],
        'guru' => ['label' => 'Guru', 'type' => 'select', 'options' => $guru_data],
        'kelas' => ['label' => 'Kelas', 'type' => 'select', 'options' => $kelass_data],
        'mapel' => ['label' => 'Mata Pelajaran', 'type' => 'select', 'options' => $mapel_data],
        'jam_mulai' => ['label' => 'Jam Mulai', 'type' => 'time'],
        'jam_selesai' => ['label' => 'Jam Selesai', 'type' => 'time']
    ];
    break;
 default:
 die('tabel tidak ditemukan.');


}
?>

