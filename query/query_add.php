<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');


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

$siswa_data= [];
$sql_siswaa = "SELECT * FROM siswa ORDER BY id_siswa";
$stmt_siswaa = $conn->prepare($sql_siswaa);
$stmt_siswaa->execute();
$result_siswaa = $stmt_siswaa->get_result();
if($result_siswaa->num_rows > 0){
    while($data = $result_siswaa->fetch_assoc()){
        $siswa_data[] = ['value' => $data['id_siswa'], 'label'=>$data['nama']];
    }
}

$mapelPresensi_data = [];
$sql_mapelPresensi = "SELECT DISTINCT nama_mapel_a, id_jadwal FROM vAbsen ORDER BY nama_mapel_a";
$stmt_mapelP = $conn->prepare($sql_mapelPresensi);
$stmt_mapelP->execute();
$result_mapelP = $stmt_mapelP->get_result();
if($result_mapelP->num_rows > 0){
    while($data = $result_mapelP->fetch_assoc()){
        $mapelPresensi_data[] = ['value' => $data['id_jadwal'], 'label'=> $data['nama_mapel_a']];
    } 
} else {
    echo 'Data tidak ditemukan';
}

$jadAbsen_data = [];
$sql_jadAbsen = "SELECT * FROM vJadAbsen ORDER BY id_jadwal";
$stmt_jadAbsen = $conn->prepare($sql_jadAbsen);
if($stmt_jadAbsen->execute()){
    $result_jadAbsen = $stmt_jadAbsen->get_result();
    if($result_jadAbsen->num_rows > 0){
        while($data = $result_jadAbsen->fetch_assoc()){
            $jadAbsen_data[] = ['value' => $data['id_jadwal'], 'label' => $data['nama_mapel']];
        }
    }else{
        echo 'Data jadwal absensi tidak ditemukan';
    }
}else{
    echo 'Gagal menjalankan query';
}

$keterangan_data = [];
$sql_keterangan = "SELECT DISTINCT keterangan_a, keterangan FROM vAbsen ORDER BY keterangan";
$stmtKeterangan = $conn->prepare($sql_keterangan);
if($stmtKeterangan->execute()){
    $result_keterangan = $stmtKeterangan->get_result();
    if($result_keterangan->num_rows > 0){
        while($data = $result_keterangan->fetch_assoc()){
            $keterangan_data[] = ['value' => $data['keterangan'], 'label' => $data['keterangan_a']];
        }
    } else {
        echo 'Data keterangan tidak ditemukan';
    }
} else {
    echo 'Gagal menjalankan query';
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
        'nama_guru' => ['label' => 'Nama Guru', 'type' => 'text'],
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
        'jam_mulai' => ['label' => 'Jam Mulai', 'type' => 'time', 'auto' => 'false'],
        'jam_selesai' => ['label' => 'Jam Selesai', 'type' => 'time', 'auto' => 'false']
    ];
    break;
case 'presensi':
    $formFields = [
        'siswa' => ['label' => 'Nama Siswa', 'type' => 'select', 'options' => $siswa_data],
        'jadwal' => ['label' => 'Mapel', 'type'=> 'select', 'options'=> $jadAbsen_data],
        'waktu' => ['label' => 'Waktu', 'type'=> 'time', 'auto'=>'true'],
        'tanggal' => ['label'=> 'Tanggal', 'type'=>'date', 'auto'=>'true'],
        'keterangan' => ['label'=> 'Keterangan', 'type'=> 'select', 'options'=>$keterangan_data],

    ];
    break;
 default:
 die('tabel tidak ditemukan.');
 


}
?>

