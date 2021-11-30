<?php
session_start();
if( !isset($_SESSION["admin"]) ) {
	header("Location: login.php");
	exit;
}
require 'func_toko.php';
$id_akun = $_GET["id"];
$q = "SELECT COUNT(1) FROM toko WHERE id_akun =$id_akun";
$r = mysqli_query($conn,$q);
$row = mysqli_fetch_array($r);
if (isset($_POST["submit"])){
    if($row[0] >= 1){
        echo "
            <script>
            alert('Sudah Memiliki Toko');
            document.location.href = 'akun.php';
            </script>
        ";
    }else{
        if(tambah($_POST) > 0){
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'akun.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal di tambahkan!');
                    document.location.href = 'akun.php';
                </script>
            ";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <h1 class="kepala" align="center">Tambah Toko</h1>
    <form action=""method="POST">
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Alamat" required>
                <label for="nama" class="form-label">Nama Toko </label>
            </div> 
            <div class="mx-auto w-50">
                <button type="submit" class="btn btn-primary" name="submit">Masukkan Data</button>
            </div>

    </form>
</body>
</html>