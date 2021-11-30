<?php
session_start();
require 'func_login.php';
if( isset($_SESSION["admin"]) ) {
	header("Location: akun.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<h1 class="kepala" align="center">Login Admin</h1>
    <form action=""method="POST">
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                <label for="username" class="form-label">Username </label>
            </div>
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="password" name="password" id="password" class="form-control"placeholder="Password" required>
                <label for="password" class="form-label">Password </label>
            </div>
            <div class="mx-auto w-50">
                <button  type="submin" class="btn btn-primary" name="login">Login</button>
            </div>
    </form>
    <?php
    if (isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $ambil = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' and password='$password'");
        if (mysqli_num_rows($ambil) ===1){
            $_SESSION['admin'] = mysqli_fetch_assoc($ambil);
            echo '<div class="alert alert-info">Login Sukses</div>';
            echo "<meta http-equiv='refresh' content='1; url=akun.php'>";
        }
    }
    ?>
</body>
</html>