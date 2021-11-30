<?php
require 'func.php';
if (isset($_POST["submit"])){
    if (tambah($_POST) > 0){
        echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'akun.php';
			</script>
		";
    } else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'akun.php';
			</script>
		";
	}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>

     
       
    </style>
</head>
<body>
    
    <h1 class="kepala" align="center">Daftar Akun</h1>
    <form action=""method="POST">
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                <label for="username" class="form-label">Username </label>
            </div>
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="password" name="password" id="password" class="form-control"placeholder="Password" required>
                <label for="password" class="form-label">Password </label>
            </div>
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="namaDep" id="namaDep" class="form-control" placeholder="Nama Depan" required>
                <label for="namaDep" class="form-label">Nama Depan </label>
            </div>
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="namaBel" id="namaBel" class="form-control" placeholder="Nama Belakang" required>
                <label for="namaBel" class="form-label">Nama Belakang </label>
            </div>
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
                <label for="email" class="form-label">Email </label>
                
            </div>
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="noTelp" id="noTelp" class="form-control" placeholder="noTelp" required>
                <label for="noTelp" class="form-label">No Telp </label>
                
            </div>      
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" required>
                <label for="alamat" class="form-label">Alamat </label>
            </div> 
            <div class="mx-auto w-50">
                <button type="submit" class="btn btn-primary" name="submit">Masukkan Data</button>
            </div>

    </form>
</body>
</html>