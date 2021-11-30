<?php
require 'func_barang.php';
$result = query("SELECT jenis_barang FROM barang");
$q = query("SELECT * from toko");
if (isset($_POST["submit"])){
    if (tambah($_POST) > 0){
        echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'barang.php';
			</script>
		";
    } else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'barang.php';
			</script>
		";
	}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>

     
       
    </style>
</head>
<body>
    
    <h1 class="kepala" align="center">Tambah Barang</h1>
    <form action=""method="POST" enctype="multipart/form-data">
            
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Username" required>
                <label for="nama_barang" class="form-label">Nama Barang </label>
            </div>
            
            <div class="form-floating mb-3 mx-auto w-50" >
                <label for="nama_toko" class="form-label"></label>
                <select class="form-control" name="nama_toko" id="nama_toko">
                    <option value="" selected="selected">- Pilih Nama Toko -</option>
                    <?php $i = 0; ?>
                    <?php foreach ($q as $row):?>
                        <option value="<?php echo $row['id_toko']?>"><?php echo $row['nama']?></option>
                    <?php $i++; ?>
                    <?php endforeach;?>        
                </select>
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
                <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Nama Depan" required>
                <label for="deskripsi" class="form-label">Deskripsi </label>
            </div>
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="harga" id="harga" class="form-control" placeholder="Nama Belakang" required>
                <label for="harga" class="form-label">Rp. Harga </label>
            </div>
            <div class="mb-3 mx-auto w-50" >
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-control" required>
            </div>
            <div class="form-floating mb-3 mx-auto w-50" >
                <input type="text" name="kuantitas" id="kuantitas" class="form-control" placeholder="noTelp" required>
                <label for="kuantitas" class="form-label">Kuantitas </label>
            </div>      
            <div class="mx-auto w-50">
                <button type="submit" class="btn btn-primary" name="submit">Masukkan Data</button>
            </div>

    </form>                
</body>
</html>