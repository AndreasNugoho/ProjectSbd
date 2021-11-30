<?php
require 'func.php';
$id_akun = $_GET["id"];
$akun = query("SELECT * FROM akun WHERE id_akun = '$id_akun'")[0];
//var_dump($akun);

if (isset($_POST["submit"])){
    if(edit($_POST) > 0){
        echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'akun.php';
			</script>
		";
    } else {
		echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'akun.php';
            </script>
		";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit data akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<h1 class="kepala" align="center">Edit data</h1>
    <form action=""method="POST">
            <input type="hidden" name="id" value="<?= $akun["id_akun"]; ?>">
            <input type="hidden" name="password" value="<?= $akun["password"]; ?>">
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required value="<?= $akun["username"]; ?>">
                <label for="username" class="form-label">Username </label>
            </div>
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="namaDep" id="namaDep" class="form-control" placeholder="Nama Depan" required value="<?= $akun["namaDep"]; ?>">
                <label for="namaDep" class="form-label">Nama Depan </label>
            </div>
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="namaBel" id="namaBel" class="form-control" placeholder="Nama Belakang" required value="<?= $akun["namaBel"]; ?>">
                <label for="namaBel" class="form-label">Nama Belakang </label>
            </div>
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="email" id="email" class="form-control" placeholder="Email" required value="<?= $akun["email"]; ?>">
                <label for="email" class="form-label">Email </label>
                
            </div>
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="noTelp" id="noTelp" class="form-control" placeholder="noTelp" required value="<?= $akun["noTelp"]; ?>">
                <label for="noTelp" class="form-label">No Telp </label>
                
            </div>      
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" required value="<?= $akun["alamat"]; ?>">
                <label for="alamat" class="form-label">Alamat </label>
            </div> 
            <div class="mx-auto w-50">
                <button type="submit" class="btn btn-primary" name="submit">Masukkan Data</button>
            </div>

    </form>
</body>
</html>