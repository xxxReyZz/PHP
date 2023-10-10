<?php
require 'functions.php';

$karyawan = query('SELECT * FROM karyawan');

if( isset($_POST["search"]) ) {
    $karyawan = search($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. CINTA SEJATI</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>DAFTAR KARYAWAN</h1>

    <a href="add.php" class="add">+ Add Staff</a>
    <br></br>

    <form action="" method="post">

        <input type="text" name="keyword" size="20" autofocus placeholder="Input keyword searching.." autocomplete="off">
        <button type="submit" name="search">SEARCH</button>

    </form>

    <br></br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Photo</th>
            <th>Weapon</th>
            <th>Name</th>
            <th>Position</th>
            <th>Type Horse</th>
            <th>Action</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($karyawan as $kr) : ?>
        <tr>
            <th><?= $i; ?></th>
            <th><img src="./img/<?php echo $kr['gambar']; ?>" width="80"></th>
            <th><?= $kr["nik"] ?></th>
            <th><?= $kr["nama"] ?></th>
            <th><?= $kr["jabatan"] ?></th>
            <th><?= $kr["email"] ?></th>
            <th><a href="edit.php?id=<?= $kr["id"]; ?>" class="link">Edit</a> | <a href="delete.php?id=<?= $kr["id"]; ?>" onclick="return confirm('Yakin?');" class="link">Delete</a></th>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>