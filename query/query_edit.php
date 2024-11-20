<?php
// Koneksi ke database
include '../koneksi.php';

echo '<link rel="stylesheet" href="../dist/css/crud.css?v='.time().'">';
// Ambil parameter tabel dan id dari URL
$tabel = $_GET['tabel'];

$form = '';

// Menyesuaikan form berdasarkan tabel yang dipilih
switch ($tabel) {
    case 'guru':
        // Query untuk mengambil data guru berdasarkan id
        $guru_id = $_GET['guru_id'];
        $sql = "SELECT *
            FROM vGuru
            WHERE id_guru = ?";
        if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("i", $guru_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        // Menampilkan form untuk edit data guru
        $form .= '<h2 class="Judul">Edit Data Guru</h2>';
        $form .= '<form class="form_container" method="POST" action="query_update.php">';
        // Id Guru
        $form .= '<input class="input" type="hidden" name="id_guru" value="'.$data['id_guru'].'" readonly>';

        // nama guru
        $form .= '<div class="wrapper">';
        $form .= '<input class="input" type="text" name="nama" value="'.$data['nama_guru_g'].'" required>';
        $form .= '<label class="info">Nama</label>';
        $form .= '</div>';

        //  Jenis Kelamin
        $form .= '<div class="wrapper wrapper__select">';
        $form .= '<label class="info-select stacked" for="jenis_kelamin">Jenis Kelamin: </label>';
        $form .= '<select class="select" id="jenis_kelamin" name="jenis_kelamin">';
        $form .= '<option class="option" value="L" '. ($data['jenis_kelamin'] == 'Laki-Laki' ? 'selected' : '').'>Laki Laki</option>';
        $form .= '<option class="option" value="P" '. ($data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '').'>Perempuan</option>';
        $form .= '</select>';
        $form .= '</div>';

        // Mapel
        $form .='<div class="wrapper wrapper__select">';
        $form .= '<label class="info-select stacked" for="mapel">Mata Pelajaran: </label>';
        $form .= '<select class="select" id="mapel" name="mapel">';
        $sql_mapel = 'SELECT * FROM mapel ORDER BY id_mapel';
        $mapel_result = $conn->query($sql_mapel);
        while ($mapel= $mapel_result->fetch_assoc()){
            $selected = ($mapel['id_mapel'] == $data['id_mapel'] ? 'selected' : '');

            $form .= '<option class="option" value="'.$mapel['id_mapel'].'" ' .$selected. '>'.$mapel['nama_mapel'].'</option>';

        }
        $form .= '</select>';
        $form .= '</div>';

        // Alamat
        $form .= '<div class="wrapper">';
        $form .= '<input class="input" type="text" name="alamat" value="'.$data['alamat_guru_g'].'" required>';
        $form .= '<label for ="alamat" class="info" >Alamat</label>';
        $form .= '</div>';
        $form .= '<input class="input  btn" type="submit" value="Update">';
        $form .= '</form>';
        break;
    } else{
        echo "Terjadi kesalahan dalam query guru";
    }
    break;
        case 'siswa':
            // Query untuk mengambil data siswa berdasarkan id
            $siswa_id = $_GET['siswa_id'];
        
            $sql = "SELECT * FROM vSiswa
                    WHERE id_siswa = ?";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("i", $siswa_id);  // bind id_siswa sebagai parameter integer
                $stmt->execute();
                $result = $stmt->get_result();
                $data = $result->fetch_assoc();
        
                
                // Menampilkan form untuk edit data siswa
                $form .= '<h2 class="Judul">Edit Data Siswa</h2>';
                $form .= '<form class="form_container" method="POST" action="query_update.php">';
                // Id Siswa
                $form .= '<input class="input" type="hidden" name="id_siswa" value="'.$data['id_siswa'].'" readonly>';
                
                // Nama
                $form .= '<div class="wrapper">';
                $form .= '<input class="input" id="nama" type="text" name="nama" value="'.$data['nama'].'" required>';
                $form .= '<label for="nama" class="info">Nama</label>';            // Dropdown untuk jenis kelamin
                $form .= '</div>';

                // Jenis Kelamin
                $form .= '<div class="wrapper wrapper__select">';
                $form .= '<label class="info-select stacked" for="jenis_kelamin">Jenis Kelamin:</label>';
                $form .= '<select class="select" name="jenis_kelamin" id="jenis_kelamin">';
                $form .= '<option class="option" value="L" ' . ($data['jenis_kelamin'] == 'Laki-Laki' ? 'selected' : '') . '>Laki-laki</option>';
                $form .= '<option class="option" value="P" ' . ($data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '') . '>Perempuan</option>';
                $form .= '</select>';
                $form .= '</div>';
        
                // Kelas
                $form .= '<div class="wrapper wrapper__select">';
                $form .= '<label class="info-select stacked" for="id_kelas">Kelas:</label>';
                $form .= '<select class="select" name="id_kelas" id="id_kelas"   required>';

                $sql_kelas = "SELECT * FROM vKelas ORDER BY id_kelas";
                $kelas_result = $conn->query($sql_kelas);
                while ($kelas = $kelas_result->fetch_assoc()) {
                    $selected = ($kelas['id_kelas'] == $data['id_kelas']) ? 'selected' : '';
                    
                    $form .= "<option class='option' value='" . $kelas['id_kelas'] . "' " .$selected. ">".$kelas['nama_kelas']."</option>";
                }
                $form .= '</select>';
                $form.= '</div>';
                
                // Alamat
                $form .= '<div class="wrapper">';
                $form .= '<input class="input i__alamat" id="alamat" type="text" name="alamat" value="'.$data['alamat'].'" required>';
                $form .= '<label for ="alamat" class="info">Alamat</label>';
                $form.= '</div>';

                $form .= '<input class="input btn" type="submit" value="Update">';

                $form .= '</form>';
                break;
                    } else {
                echo "Terjadi kesalahan dalam query untuk siswa.";
            }
            break;
            
        case 'jadwal':
            $jadwal_id = $_GET['jadwal_id'];
            $sql = "SELECT * FROM vJadwal WHERE id_jadwal = ?";

        if  ($stmt = $conn->prepare($sql)){
            $stmt->bind_param("i", $jadwal_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();

            $form .= '<h2 class="judul">Edit Data Jadwal</h2>';
            $form .= '<form class="form_container" method="POST" action="query_update.php">';
            // Id jadwal
            $form .= '<input class="input" type="hidden" name="id_jadwal" value="'.$data['id_jadwal'].'" readonly/>';

            // Hari
            $form .= '<div class="wrapper wrapper__select">';
            $form .= '<label for="nama_hari" class="info-select stacked">Hari</label>';
            $form .= '<select class ="select" name="hari" id="hari">';
            $sql_hari = "SELECT * FROM hari ORDER BY id_hari";
            $hari_result = $conn->query($sql_hari);
            while($hari = $hari_result->fetch_assoc()){
                $selected = ($hari['id_hari'] == $data['id_hari'] ? 'selected' : '');
                $form .= '<option class="option" name="hari" value="'.$hari['id_hari'].'" '.$selected.'>'.$hari['nama_hari'].'</option>';
            }
            $form .= '</select>';
            $form .= '</div>';

            // Nama guru
            $form .= '<div class="wrapper wrapper__select">';
            $form .= '<label for="nama_guru" class="info-select stacked">Nama</label>';
            $form .= '<select class="select" name="nama_guru" id="nama_guru">';
            $sql_guru = 'SELECT * FROM vGuru ORDER BY id_guru';
            $guru_result = $conn->query($sql_guru);
            while($guru=$guru_result->fetch_assoc()){
                $selected = ($guru['id_guru'] == $data['id_guru'] ? 'selected' : '');
                $form .= '<option class="option" name="nama_guru" value="'.$guru['id_guru'].'">'.$guru['nama_guru_g'].'</option>';
            }
            $form .= '</select>';
            $form .= '</div>';

            // Kelas
            $form .= '<div class="wrapper wrapper__select">';
            $form .= '<label class="info-select stacked" for="kelas">Kelas</label>';
            $form .= '<select class="select" name="kelas" id="kelas">';
            $sql_kelas = "SELECT * FROM vKelas ORDER BY id_kelas";
            $kelas_result = $conn->query($sql_kelas);
            while($kelas = $kelas_result->fetch_assoc()){
                $selected = ($kelas['id_kelas'] == $data['id_kelas'] ? 'selected' : '');
                $form .= "<option class='option' name='kelas' value='".$kelas['id_kelas']."' ".$selected." >".$kelas['nama_kelas']."</option>";
            }
                        
            $form .= '</select>';
            $form .= '</div>';
            
            // Mapel
            $form .= '<div class="wrapper wrapper__select">';
            $form .= '<label class="info-select stacked" for="mapel">Mata pelajaran</label>';
            $form .= '<select class="select" name="mapel" id="mapel">';
            $sql_mapel = "SELECT * FROM mapel ORDER BY id_mapel";
            $mapel_result = $conn->query( $sql_mapel);
            while($mapel = $mapel_result->fetch_assoc()){
                $selected = ($mapel['id_mapel'] == $data['id_mapel'] ? 'selected' : '');
                $form .= '<option class="option" name="mapel" value="'.$mapel['id_mapel'].'" '.$selected.'>'.$mapel['nama_mapel'].'</option>';
            }
            $form .= '</select>';
            $form .= '</div>';

            // Jam
            $form .= '<div class="wrapper wrapper__jam">';
            $form .= '<div class="content_jam">';
            $jam_mulai = date('H:i', strtotime($data['jam_mulai']));
            $form .= '<input class="input input-jam" type="time" name="jam_mulai" id="jam_mulai" value="'.$jam_mulai.'"  required/>';
            $form .= '<label class="info info-jam mulai stacked" for="jam_mulai">Jam Mulai</label>';
            $form .= '</div>';
            $form .= '<div class="content_jam">';
            $jam_selesai = date('H:i', strtotime($data['jam_selesai']));
            $form .= '<input class="input input-jam" type="time" name="jam_selesai" id="jam_selesai" value="'.$jam_selesai.'"  required/>';
            $form .= '<label class="info info-jam selesai stacked" for="jam_selesai">Jam Selesai</label>';
            $form .= '</div>';
            $form .= '</div>';

            $form .= '<input type="submit" class="input btn" value="update">';
            $form .= '</form>';
            break;
        } else {
            echo "Terjadi kesalahan dalam query untuk jadwal.";
        }
            break;
        case 'absen':
            $absen_id = $_GET['absen_id'];
            $sql = "SELECT *, vJ.id_mapel FROM vAbsen vA JOIN vJadwal vJ ON vA.id_jadwal = vJ.id_jadwal  WHERE id_absen = ?";

            if($stmt = $conn->prepare($sql)){
                $stmt->bind_param("i", $absen_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $data = $result->fetch_assoc();

                $form .= '<h2 class="judul">Edit Presensi Siswa</h2>';
                $form .= '<form class="form_container  center" method="POST" action="">';
                $form .= '<input type="hidden" class="input" name="id_absen" value="'.$data['id_absen'].'" readonly>';
                
                $form .= '<div class="wrapper acenter">';
                $form .= '<input class="input read" type="text" name="nama_siswa" id="nama_siswa" value="'.$data['nama_siswa_a'].'" readonly>';
                $form .= '<label class="info info-read stacked" for="nama_siswa">Nama Siswa</label>';
                $form .= '</div>';

                $form .= '<div class="wrapper wrapper__ginput">';
                $form .= '<div class="content__ginput">';
                $form .= '<input class="input read" type="text" name="mapel" id="mapel" value="'.$data['nama_mapel_a'].'" readonly>';
                $form .= '<label class="info info-read stacked" for="mapel">Mapel</label>';
                
                $form .= '</div>';
                $form .= '<div class="content__ginput">';
                $form .= '<label class="info info-select stacked" for="keterangan">Keterangan</label>';
                $form .= '<select class="select" name="keterangan" id="keterangan">';
                $sql_absen = 'SELECT DISTINCT keterangan from absen ORDER BY keterangan';
                $absen_result = $conn->query($sql_absen);
                while($absen = $absen_result->fetch_assoc()){
                    $deskripsi = '';
                    switch($absen['keterangan']){
                        case 'H': $deskripsi = 'Hadir'; break;
                        case 'I': $deskripsi = 'Izin'; break;
                        case 'S': $deskripsi = 'Sakit'; break;
                        case 'T': $deskripsi = 'Terlambat'; break; 
                        case 'A': $deskripsi = 'Alfa'; break;

                    }

                    $selected = ($data['keterangan_a'] == $deskripsi ? 'selected' : '');
                    $form .= '<option class="option" name="keterangan" value="'.$absen['keterangan'].'" '.$selected.'>'.$deskripsi.'</option>';
                }
                $form .= '</select>';
                $form .= '</div>';
                $form .= '</div>';

                $form .= '<div class="wrapper wrapper__jam">';
                $form .= '<div class="content_jam">';
                $waktu = date('H:i', strtotime($data['waktu']));
                $form .= '<input class="input input-jam" type="time" name="waktu" id="waktu" value="'.$waktu.'" readonly>';
                $form .= '<label class="info info-jam waktu stacked" for="waktu">Waktu</label>';
                $form .= '</div>';
                $form .= '<div class="content_jam">';
                $tanggal =  date('Y-m-d', strtotime($data['tanggal']));
                $form .= '<input class="input input-jam" type="date" name="tanggal" id="tanggal" value="'.$tanggal.'" readonly>';
                $form .= '<label class="info info-jam tanggal stacked" for="tanggal">Tanggal</label>';
                $form .= '</div>';
                $form .= '</div>';


                $form .= '<input class="input btn" type="submit" value="update">';
                $form .= '</form>';
                break;
            }else{
                echo "terjadi kesalah dalam query untuk absen";
            }
            break;
    default:
        $form = "Tabel tidak dikenal.";
        break;
}

echo $form;
$conn->close();
?>
