<?php
require 'functions.php';

$id = $_GET["id"];

$kr = query("SELECT * FROM karyawan WHERE id = $id")[0];

if( isset($_POST["save"]) ) {
    
    if( edit($_POST) > 0 ) {
        print "<script>
        alert('Data has been changed!');
        document.location.href = 'index.php';
        </script>";
    } else {
        print "<script>
        alert('Data failed to Changed!');
        document.location.href = 'index.php';
        </script>";
    }
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
    <h1>EDIT STAFF</h1>
    
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $kr["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $kr["gambar"]; ?>">
        <ul>
            <li>
                <label for="nik">Weapon: </label>
                <input type="text" name="nik" id="nik" required value="<?= $kr["nik"]; ?>">
            </li>
            <li>
                <label for="nama">Name: </label>
                <input type="text" name="nama" id="nama" required value="<?= $kr["nama"]; ?>">
            </li>
            <li>
                <label for="jabatan">Position: </label>
                <input type="text" name="jabatan" id="jabatan" required value="<?= $kr["jabatan"]; ?>">
            </li>
            <li>
                <label for="email">Type Horse: </label>
                <input type="text" name="email" id="email" required value="<?= $kr["email"]; ?>">
            </li>
            <li>
                <label for="gambar">Photo: </label> <br>
                <img src="img/<?= $kr['gambar']; ?>"> </br>
                <p>Input File Image:</p>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="save">SAVE</button>
            </li>
        </ul>

    </form>
</body>
</html>