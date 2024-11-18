<?php
// Koneksi ke database
include '../koneksi.php';

echo '<link rel="stylesheet" href="../dist/css/edit.css?v='.time().'">';
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
        $form .= '<form class="form_container" method="POST" action="update.php">';
        $form .= '<input class="input" type="hidden" name="id_guru" value="'.$data['id_guru'].'" readonly>';

        $form .= '<div class="wrapper">';
        $form .= '<input class="input" type="text" name="nama" value="'.$data['nama_guru_g'].'" required>';
        $form .= '<label class="info">Nama</label>';
        $form .= '</div>';



        $form .= '<div class="wrapper wrapper__select">';
        $form .= '<label class="info-select stacked" for="jenis_kelamin">Jenis Kelamin: </label>';
        $form .= '<select class="select" id="jenis_kelamin" name="jenis_kelamin">';
        $form .= '<option class="option" value="Laki-Laki" '. ($data['jenis_kelamin'] == 'Laki-Laki' ? 'selected' : '').'>Laki Laki</option>';
        $form .= '<option class="option" value="Perempuan" '. ($data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '').'>Perempuan</option>';
        $form .= '</select>';
        $form .= '</div>';

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
                $form .= '<form class="form_container" method="POST" action="update.php">';
                $form .= '<input class="input" type="hidden" name="id_siswa" value="'.$data['id_siswa'].'" readonly>';
                
                $form .= '<div class="wrapper">';
                $form .= '<input class="input" id="nama" type="text" name="nama" value="'.$data['nama'].'" required>';
                $form .= '<label for="nama" class="info">Nama</label>';            // Dropdown untuk jenis kelamin
                $form .= '</div>';

                $form .= '<div class="wrapper wrapper__select">';
                $form .= '<label class="info-select stacked" for="jenis_kelamin">Jenis Kelamin:</label>';
                $form .= '<select class="select" name="jenis_kelamin" id="jenis_kelamin">';
                $form .= '<option class="option" value="Laki-Laki" ' . ($data['jenis_kelamin'] == 'Laki-Laki' ? 'selected' : '') . '>Laki-laki</option>';
                $form .= '<option class="option" value="Perempuan" ' . ($data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '') . '>Perempuan</option>';
                $form .= '</select>';
                $form .= '</div>';
        
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
            $form .= '<form class="form_container" method="POST" action="update.php">';
            $form .= '<input class="input" type="hidden" name="id_jadwal" value="'.$data['id_jadwal'].'" readonly/>';

            $form .= '<div class="wrapper">';
            $form .= '<input class="input" id="nama_hari" type="text" name="nama_hari" value="'.$data['nama_hari_j'].'" required/>';
            $form .= '<label for="nama_hari" class="info">hari</label>';
            $form .= '</div>';

            $form .= '<div class="wrapper">';
            $form .= '<input class="input" id="nama_guru" type="text" name="nama_guru" value="'.$data['nama_guru_j'].'" required/>';
            $form .= '<label for="nama_guru" class="info">Nama</label>';
            $form .= '</div>';

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

            $form .= '</form>';
            break;
        } else {
            echo "Terjadi kesalahan dalam query untuk jadwal.";
        }
            break;
        case 'absen':
            $absen_id = $_GET['absen_id'];
            $sql = "SELECT * FROM vAbsen WHERE id_absen = ?";

            if($stmt = $conn->prepare($sql)){
                $stmt->bind_param("i", $absen_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $data = $result->fetch_assoc();

                $form .= '<h2 class="judul">Edit Presensi Siswa</h2>';
                break;
            }else{
                echo "terjadi kesalah falam query untuk absen";
            }
            break;
    default:
        $form = "Tabel tidak dikenal.";
        break;
}

echo $form;
$conn->close();
?>
