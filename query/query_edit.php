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
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $guru_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        // Menampilkan form untuk edit data guru
        $form .= '<h2 class="Judul">Edit Data Guru</h2>';
        $form .= '<form class="form_container" method="POST" action="update.php">';
        $form .= '<input class="input" type="hidden" name="id_guru"  readonly>';

        $form .= '<div class="wrapper">';
        $form .= '<input class="input" type="text" name="nama" value="'.$data['nama_guru_g'].'" required>';
        $form .= '<label class="info">Nama</label>';
        $form .= '</div>';



        $form .= '<div class="wrapper wrapper__select">';
        $form .= '<label class="info-select" for="jenis_kelamin">Jenis Kelamin: </label>';
        $form .= '<select class="select" id="jenis_kelamin" name="jenis_kelamin">';
        $form .= '<option class="option" value="L" '. ($data['jenis_kelamin'] == 'L' ? 'selected' : '').'>Laki Laki</option>';
        $form .= '<option class="option" value="P" '. ($data['jenis_kelamin'] == 'P' ? 'selected' : '').'>Perempuan</option>';
        $form .= '</select>';
        $form .= '</div>';

        $form .='<div class="wrapper wrapper__select">';
        $form .= '<label class="info-select" for="mapel">Mata Pelajaran: </label>';
        $form .= '<select class="select" id="mapel" name="mapel">';
        $sql_mapel = 'SELECT * FROM mapel ORDER BY id_mapel';
        $mapel_result = $conn->query($sql_mapel);
        while ($mapel= $mapel_result->fetch_assoc()){
            $selected = ($mapel['id_mapel'] == $data['id_mapel'] ? 'selected' : '');

            $form .= '<option class="option" value="'.$mapel['id_mapel'].'" '.$selected.'>'.$mapel['nama_mapel'].'</option>';

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
                $form .= '<input class="input" type="hidden" name="id_siswa"  readonly>';
                
                $form .= '<div class="wrapper">';
                $form .= '<input class="input" id="nama" type="text" name="nama" value="'.$data['nama'].'" required>';
                $form .= '<label for="nama" class="info">Nama</label>';            // Dropdown untuk jenis kelamin
                $form .= '</div>';

                $form .= '<div class="wrapper wrapper__select">';
                $form .= '<label class="info-select" for="jenis_kelamin">Jenis Kelamin:</label>';
                $form .= '<select class="select" name="jenis_kelamin" id="jenis_kelamin">';
                $form .= '<option class="option" value="L" ' . ($data['jenis_kelamin'] == 'L' ? 'selected' : '') . '>Laki-laki</option>';
                $form .= '<option class="option" value="P" ' . ($data['jenis_kelamin'] == 'P' ? 'selected' : '') . '>Perempuan</option>';
                $form .= '</select>';
                $form .= '</div>';
        
                $form .= '<div class="wrapper wrapper__select">';
                $form .= '<label class="info-select" for="id_kelas">Kelas:</label>';
                $form .= '<select class="select" name="id_kelas" id="id_kelas"   required>';

                $sql_kelas = "SELECT * FROM vKelas ORDER BY id_kelas";
                $kelas_result = $conn->query($sql_kelas);
                while ($kelas = $kelas_result->fetch_assoc()) {
                    $selected = ($kelas['id_kelas'] == $data['id_kelas']) ? 'selected' : '';
                    
                    $form .= "<option class='option' value='" . $kelas['id_kelas'] . "' $selected>".$kelas['nama_kelas']."</option>";
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
    
    default:
        $form = "Tabel tidak dikenal.";
        break;
}

echo $form;
$conn->close();
?>
