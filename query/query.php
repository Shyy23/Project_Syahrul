<?php
// Query untuk data tabel siswa
$sql_siswa= "SELECT *
FROM vSiswa 
ORDER BY id_siswa
";

// Query untuk data tabel guru
$sql_guru="SELECT *
FROM vGuru 
ORDER BY id_guru";

$sql_jadwal="SELECT *

FROM vJadwal 
ORDER BY id_hari































































































































































































































































































































";

// Query untuk tabel data absen
$sql_absen = "SELECT *
FROM vAbsen
ORDER BY id_absen
            ";

$sql_kelass = "SELECT * FROM vKelas ORDER BY id_kelas";
$stmt_kelass = $conn->prepare($sql_kelass);
$stmt_kelass->execute();
$result_kelass = $stmt_kelass->get_result();


$sql_kelas = "SELECT * FROM kelas ORDER BY id_kelas";
$stmt_kelas = $conn->prepare($sql_kelas);
$stmt_kelas->execute();
$result_kelas = $stmt_kelas->get_result();

$sql_siswaa = "SELECT * FROM siswa ORDER BY id_siswa";
$stmt_siswaa = $conn->prepare($sql_siswaa);
$stmt_siswaa->execute();
$result_siswaa = $stmt_siswaa->get_result();

$sql_mapel = "SELECT * FROM mapel ORDER BY id_mapel";
$stmt_mapel = $conn->prepare($sql_mapel);
$stmt_mapel->execute();
$result_mapel = $stmt_mapel->get_result();

$sql_guruu = "SELECT * FROM guru ORDER BY id_guru";
$stmt_guruu = $conn->prepare($sql_guruu);
$stmt_guruu->execute();
$result_guruu = $stmt_guruu->get_result();

$sql_hari = "SELECT * FROM hari ORDER BY id_hari";
$stmt_hari = $conn->prepare($sql_hari);
$stmt_hari->execute();
$result_hari = $stmt_hari->get_result();

$sql_absenn = "SELECT * FROM absen ORDER BY id_absen";
$stmt_absenn = $conn->prepare($sql_absenn);
$stmt_absenn->execute();
$result_absenn = $stmt_absenn->get_result();
// Execution code untuk tabel siswa
$result_siswa= $conn->query($sql_siswa);

// Execution code untuk tabel guru
$result_guru= $conn->query($sql_guru);

// Execution code untuk tabel jadwal
$result_jadwal= $conn->query($sql_jadwal);

// Execution code untuk tabel absen
$result_absen= $conn->query($sql_absen);



?>