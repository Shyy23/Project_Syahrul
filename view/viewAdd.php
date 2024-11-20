<?php
include '../koneksi.php';
include '../query/query_add.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../dist/css/crud.css?v=<?php echo time();?>">
</head>
<body>
    <h2 class="judul">Tambah Data <?= ucfirst($tabel)?> </h2>
    <form action="../query/query_proses.php" method="POST" class="form_container form__add">
        <input type="hidden" name="tabel" value="<?= $tabel?>">
        <?php foreach ($formFields as $name => $field):?>
            <?php if($field['type'] === 'select'):?>


            <div class="wrapper wrapper_select">
                <label for="<?= $name ?>" class="info-select stacked"><?= $field['label']?></label>
                <select name="<?= $name?>" id="<?= $name ?>" class="select add__select" required>
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
                    <input type="password" class="input add" name="<?= $name?>" id="<?= $name?>" required>
                    <label for="<?= $name?>" class="info"><?= $field['label']?></label>
                </div>
            <?php elseif($field['type'] === 'time'):?>
                <div class="wrapper">
                    <input type="time" class="input input-jam" name="<?= $name?>" id="<?= $name?>" required>
                    <label for="<?= $name?>" class="info info-jam waktu stacked"><?= $field['label']?></label>
                </div>
            <?php else:?>
                <div class="wrapper">
                    <input type="<?= $field['type'] ?>" class="input add" id="<?= $name?>" name="<?= $name?>" required>
                    <label for="<?= $name?>" class="info"><?= $field['label']?></label>
                </div>
                <?php endif;?>
                
        <?php endforeach;?>
        <button type="submit" class="btn btn__add">Submit</button>
    </form>
</body>
</html>