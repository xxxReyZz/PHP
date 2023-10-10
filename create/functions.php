<?php 
$user = 'root';
$password = '';
$db = 'testaja';

$conn = mysqli_connect("localhost", "$user", "$password", "$db");

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = []; 
    while( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}



function add($data) {
    global $conn;

    $nik = htmlspecialchars($data["nik"]);
    $nama = htmlspecialchars($data["nama"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    $email = htmlspecialchars($data["email"]);
    
    $gambar = upload();

    if( !$gambar) {
        return false;
    }

    $query = "INSERT INTO karyawan VALUES ('', '$nik', '$nama', '$jabatan', '$email', '$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    global $conn;

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    $extensi = ['png','jpg','jpeg'];
    $ext = explode('.', $namaFile);
    $ext = strtolower(end($ext));
    $rand = rand();

    if(!in_array($ext, $extensi) ) {
        print"<script>
                alert('Your file is not image!');
            </script>";

        return false;
    }
    
    if( $error === 4 ) {
        print"<script>
                alert('Please select image first!');
                document.location.href = 'index.php';
            </script>";
        
        return false;
    }

    if( $ukuranFile > 2000000 ) {
        echo "<script>
            alert('Your file to largest!');
        </script>";

        return false;
    }

    $target = 'kerajaan' .$rand. '_' . $namaFile;

    move_uploaded_file($tmpName, 'img/' . $target);


    return $target;

}


function delete($id) {
    global $conn;
    
    mysqli_query($conn, "DELETE FROM karyawan WHERE id='$id'");

    return mysqli_affected_rows($conn);
}


function edit($data) {
    global $conn;

    $id = $data["id"];
    $nik = htmlspecialchars($data["nik"]);
    $nama = htmlspecialchars($data["nama"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    $email = htmlspecialchars($data["email"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if( $_FILES['gambar']['error'] === 4 ) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE karyawan SET
        nik = '$nik',
        nama = '$nama',
        jabatan = '$jabatan',
        email = '$email',
        gambar = '$gambar' 
        WHERE id = '$id'
        ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function search($keyword) {
    $query = "SELECT * FROM karyawan WHERE
        nama LIKE '%$keyword%' OR 
        nik LIKE '%$keyword%' OR
        jabatan LIKE '%$keyword%' OR
        email LIKE '%$keyword%'
    ";
    return query($query);
}

function register($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $confirmPassword = mysqli_real_escape_string($conn, $data["confirmPassword"]);
    $email = $data["email"]; 

    $resultUsername = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    $resultEmail = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

    if( mysqli_fetch_assoc($resultUsername) ) {
        echo "<script>
                alert('Username has been registered!');
            </script>";
        return false;
    }

    if( mysqli_fetch_assoc($resultEmail) ) {
        echo "<script>
                alert('Email has been registered!');
            </script>";
        return false;
    }

    if ( $password !== $confirmPassword ) {
        echo "<script>
                alert('Your password is not accordance!');
            </script";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $user = "INSERT INTO users VALUES('', '$username', '$password', '$email')";

    mysqli_query($conn, $user);

    return mysqli_affected_rows($conn);

}
?>