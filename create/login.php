<?php
require 'functions.php';

if ( isset($_POST["submit"]) ) {


    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"]) ) {
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        body {
            background: #F8DA56;
        }

        .form-login {
            margin-top: 13%;
        }

        .outter-form-login {
            padding: 20px;
            background: #EEEEEE;
            position: relative;
            border-radius: 5px;
        }

        .logo-login {
            position: absolute;
            font-size: 35px;
            background: #21A957;
            color: #FFFFFF;
            padding: 10px 18px;
            top: -40px;
            border-radius: 50%;
            left: 40%;
            align-items: center;
        }

        .inner-login .form-control {
            background: #D3D3D3;
        }

        h3.title-login {
            font-size: 20px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .form-group {
            text-align: center;
        }

        .forget {
            color: #ADADAD;
            text-align: center;
            margin: 25px;
            margin-top: 50px;
        }

        .btn-custom-green {
            background: #21A957;
            color: #fff;
            position: absolute;
            top: 70%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <div class="col-md-4 col-md-offset-4 form-login">

        <div class="outter-form-login">
            <div class="logo-login">
                <em class="glyphicon glyphicon-user"></em>
            </div>
            <form action="" method="post" class="inner-login">
                <h3 class="text-center title-login">Login</h3>
                <?php if (isset($error)): ?>
                    <p style="color: red; font-style: italic;">Username/Password wrongs</p>
                <?php endif; ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <button type="submit" name="submit" class="btn btn-block btn-custom-green">SIGN IN</button>

                <div class="text-center forget">
                    <p>Forgot Password ?</p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>