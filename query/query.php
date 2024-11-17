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
ORDER BY id_jadwal    
";

// Query untuk tabel data absen
$sql_absen = "SELECT *
FROM vAbsen
ORDER BY id_absen
            ";
// Execution code untuk tabel siswa
$result_siswa= $conn->query($sql_siswa);

// Execution code untuk tabel guru
$result_guru= $conn->query($sql_guru);

// Execution code untuk tabel jadwal
$result_jadwal= $conn->query($sql_jadwal);

// Execution code untuk tabel absen
$result_absen= $conn->query($sql_absen);
?>