<?php
require 'functions.php';

if (isset($_POST["submit"])) {
    if (register($_POST) > 0) {
        echo "<script>
                alert('Your account has been created!');
            </script>";
    } else {
        echo mysqli_error($conn);
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body class="d-flex flex-column h-100">

    <div class="outter-form-login">
        <div class="logo-login">
            <em class="glyphicon glyphicon-user"></em>
        </div>

        <h1 class="text-center title-login">REGISTER ACCOUNT</h1>

        <form action="" method="post" class="inner-login">
            <ul>
                <li class="bar">
                    <label for="username" class="col-sm-2 col-form-label">Username: </label>
                    <input type="text" name="username" class="form-control" required>
                </li>
                <li>
                    <label for="email" class="col-sm-2 col-form-label">E-mail: </label>
                    <input type="text" name="email" class="form-control" required>
                </li>
                <li>
                    <label for="password" class="col-sm-2 col-form-label">Password: </label>
                    <input type="password" name="password" class="form-control" required>
                </li>
                <li>
                    <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password:</label>
                    <input type="password" name="confirmPassword" class="form-control" required>
                </li>
                <li>
                    <button type="submit" name="submit" class="btn btn-primary">REGISTER</button>
                </li>
            </ul>

        </form>
    </div>
    </div>



</body>

</html>