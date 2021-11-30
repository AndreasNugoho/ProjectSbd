<?php
session_start();
require 'func_barang.php';
if( isset($_SESSION["user"]) ) {
	header("Location: checkout.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link" href="index.php">Home</a>
            <a class="nav-link" href="cart.php">Keranjang</a>
            <?php if (isset($_SESSION['user'])):?>
                <a class="nav-link" href="logout.php">Logout</a>
            <?php else:?>
                <a class="nav-link" href="login.php">Login</a>
                <a class="nav-link" href="daftar.php">daftar</a>
            <?php endif;?>
        </div>
        </div>
    </div>
</nav>
<h1 class="kepala" align="center">Login User</h1>
    <form action=""method="POST">
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="email" id="email" class="form-control" placeholder="Username" required>
                <label for="email" class="form-label">Email </label>
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
    if (isset($_POST["login"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $ambil = mysqli_query($conn ,"SELECT * FROM akun where email='$email' and password='$password'");
        if(mysqli_num_rows($ambil) == 1){
            $akun = mysqli_fetch_assoc($ambil);
            $_SESSION['user'] = $akun;
            echo"<script>alert('anda sukses login');</script>'";
            echo"<script>location='checkout.php';</script>'";
        }
        else{
            echo"<script>alert('anda gagal login');</script>'";
            echo"<script>location='login.php';</script>'";
        }

    }
    ?>
</body>
</html>