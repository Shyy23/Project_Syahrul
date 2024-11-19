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
        'id_siswa' => ['label' => 'ID Siswa', 'type' => 'hidden'],
        'nisn' => ['label' => 'NISN', 'type' => 'text'],
        'nama_siswa' => ['label' => 'Nama Siswa', 'type' => 'text'],
        'jenis_kelamin' => ['label' => 'Jenis Kelamin', 'type' => 'select', 'options' => ['L' => 'Laki Laki', 'P' => 'Perempuan']],
        'alamat' => ['label' => 'Alamat', 'type' => 'text'],
        'kelas' => ['label' => 'kelas', 'type' => 'select', 'options' => $kelass_data],
        'no_telepon' => ['label' => 'no_telepon', 'type' => 'text', ],
        'password' => ['label' => 'password', 'type' => 'password']

    ];
    break;
 default:
 die('tabel tidak ditemukan.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 class="judul">Tambah Data <?= ucfirst($tabel)?> </h2>
    <form action="" method="POST" class="form_container">
        <?php foreach ($formFields as $name => $field):?>
            <?php if($field['type'] === 'select'):?>


            <div class="wrapper wrapper__select">
                <label for="<?= $name ?>" class="info=select stacked"><?= $field['label']?></label>
                <select name="<?= $name?>" id="<?= $name ?>" class="select" required>
                    <?php if(is_array(current($field['options']))):?>
                    <?php foreach ($field['options'] as $option):?>
                    <option value="<?= $option['value'] ?>" class="option"><?= $option['label'] ?></option>
                    <?php endforeach;?>
                    <?php else:?>
                        <?php foreach ($field['options'] as $key => $label):?>
                        <option value="<?= $key ?>" class="option"><?= $label?></option>
                        <?php endforeach;?>
                    <?php endif;?>
                </select>
            </div>
            <?php elseif($field['type'] === 'password'):?>
                <div class="wrapper">
                    <input type="password" class="input" name="<?= $name?>" id="<?= $name?>">
                    <label for="<?= $name?>" class="info"><?= $field['label']?></label>
                </div>
            <?php else:?>
                <div class="wrapper">
                    <input type="<?= $field['type'] ?>" class="input" id="<?= $name?>" name="<?= $name?>" required>
                    <label for="<?= $name?>" class="info"><?= $field['label']?></label>
                </div>
                <?php endif;?>
                <br><br>
        <?php endforeach;?>
        <button type="submit" class="btn">Submit</button>
    </form>
</body>
</html>