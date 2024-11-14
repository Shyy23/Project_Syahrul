<?php
// Query untuk data tabel siswa
$sql_siswa= "SELECT s.*, CONCAT(
    CASE k.tingkatan
    WHEN '10' THEN 'X'
    WHEN '11' THEN 'XI'
    WHEN '12' THEN 'XII'
    ELSE k.tingkatan
    END, ' ', k.jurusan, ' ', k.abc) AS nama_kelas_s
FROM siswa s
JOIN kelas k ON s.id_kelas = k.id_kelas
ORDER BY id_siswa
";

// Query untuk data tabel guru
$sql_guru="SELECT g.*, m.nama_mapel AS nama_mapel_g
FROM guru g
JOIN mapel m ON g.id_mapel = m.id_mapel
ORDER BY id_guru";

$sql_jadwal="SELECT j.*, 
h.nama_hari AS nama_hari_j , 
g.nama AS nama_guru_j,
CONCAT(
    CASE k.tingkatan
    WHEN '10' THEN 'X'
    WHEN '11' THEN 'XI'
    WHEN '12' THEN 'XII'
    ELSE k.tingkatan
    END, ' ', k.jurusan, ' ', k.abc) AS nama_kelas_j,
m.nama_mapel AS nama_mapel_j

FROM jadwal j

JOIN
    hari h ON j.id_hari = h.id_hari
JOIN
    guru g ON j.id_guru = g.id_guru
JOIN 
    kelas k ON j.id_kelas = k.id_kelas
JOIN
    mapel m ON j.id_mapel = m.id_mapel
ORDER BY id_jadwal    
";

// Query untuk tabel data absen
$sql_absen = "SELECT a.*,
            CASE a.keterangan
            WHEN 'H' THEN 'Hadir'
            WHEN 'A' THEN 'Alfa'
            WHEN 'I' THEN 'Izin'
            WHEN 'S' THEN 'Sakit'
            ELSE a.keterangan 
            END AS new_keterangan,
            s.nama AS nama_siswa_a,
            j.id_jadwal,
            m.nama_mapel AS nama_mapel_a

FROM absen a

JOIN 
    siswa s ON a.id_siswa = s.id_siswa
JOIN 
    jadwal j ON a.id_jadwal = j.id_jadwal
JOIN
    mapel m ON j.id_mapel = m.id_mapel
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