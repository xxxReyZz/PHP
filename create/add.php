<?php
require 'functions.php';

if( isset($_POST["submit"]) ) {
    
    if( add($_POST) > 0 ) {
        echo "The data successfully to add!";
    } else {
        echo "Data failed to be added to the list!";
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
    <h1>ADD STAFF</h1>
    
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nik">Weapon: </label>
                <input type="text" name="nik" id="nik" required>
            </li>
            <li>
                <label for="nama">Name: </label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="jabatan">Position: </label>
                <input type="text" name="jabatan" id="jabatan" required>
            </li>
            <li>
                <label for="email">Type Horse: </label>
                <input type="text" name="email" id="email" required>
            </li>
            <li>
                <label for="gambar">Photo: </label>
                <input type="file" name="gambar" id="gambar">
                <p style="color: red">.png, .jpg, and .jpeg</p>
            </li>
            <li>
                <button type="submit" name="submit">Submit</button>
                <button onclick="location.href='index.php'">Back to Home</button>
            </li>
        </ul>

    </form>
</body>
</html>