<?php
require 'func_barang.php';
$id_barang = $_GET["id"];
$barang = query("SELECT * FROM barang WHERE id_barang = '$id_barang'")[0];
$result = query("SELECT jenis_barang FROM barang");

if (isset($_POST["submit"])){
    if(edit($_POST) > 0){
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'barang.php';
            </script>
		";
    } else {
		echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'barang.php';
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
    <title>Edit data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<h1 class="kepala" align="center">Edit data</h1>
    <form action=""method="POST">
            <input type="hidden" name="id_barang" value="<?= $barang["id_barang"]; ?>">
            <input type="hidden" name="id_toko" value="<?= $barang["id_toko"]; ?>">
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="nama_barang" required value="<?= $barang["nama_barang"]; ?>">
                <label for="nama_barang" class="form-label">Nama Barang </label>
            </div>

            <div class="form-floating mb-3 mx-auto w-50" >
                <label for="jenis_barang" class="form-label"></label>
                <select class="form-control" name="jenis_barang" id="jenis_barang">
                    <option value="">- Pilih Jenis Barang -</option>
                    <option value="Aksesoris" <?php if ($result == "Aksesoris") echo "selected" ?>>Aksesoris</option>
                    <option value="Pakaian" <?php if ($result == "Pakaian") echo "selected" ?>>Pakaian</option>
                    <option value="Jam Tangan" <?php if ($result == "Jam Tangan") echo "selected" ?>>Jam Tangan</option>
                    <option value="Elektronik" <?php if ($result == "Elektronik") echo "selected" ?>>Elektronik</option>
                    <option value="Entertainment" <?php if ($result == "Entertainment") echo "selected" ?>>Entertainment</option>    
                </select>
            </div>
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="deskripsi" required value="<?= $barang["deskripsi"]; ?>">
                <label for="deskripsi" class="form-label">Deskripsi </label>
            </div>
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="harga" id="harga" class="form-control" placeholder="harga" required value="<?= $barang["harga"]; ?>">
                <label for="harga" class="form-label">Rp. Harga </label>
            </div>
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="gambar" id="gambar" class="form-control" placeholder="gambar" required value="<?= $barang["gambar"]; ?>">
                <label for="gambar" class="form-label">Gambar </label>
            </div> 
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="kuantitas" id="kuantitas" class="form-control" placeholder="kuantitas" required value="<?= $barang["kuantitas"]; ?>">
                <label for="kuantitas" class="form-label">Kuantitas </label>
            </div>
            <div class="mx-auto w-50">
                <button type="submit" class="btn btn-primary" name="submit">Masukkan Data</button>
            </div>

    </form>
</body>
</html>