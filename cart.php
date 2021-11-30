<?php
session_start();
require 'func_barang.php';
//echo "<pre>";
//print_r($_SESSION['keranjang']);
//echo "</pre>";
if(empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])){
    echo "<script>alert('keranjang kosong,silahkan belanja dulu');</script>";
    echo "<script>location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
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
    <section class="konten">
        <div class="container">
            <h3 align="center">
                Keranjang Belanja
            </h3>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Barang</td>
                        <td>Nama Toko</td>
                        <td>Harga</td>
                        <td>Jumlah</td>
                        <td>Subharga</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    <?php foreach ($_SESSION["keranjang"] as $id_barang => $jumlah):?>
                    <?php
                    $ambil = mysqli_query($conn,"SELECT * FROM barang WHERE id_barang ='$id_barang'");
                    $pecah = mysqli_fetch_assoc($ambil);
                    $subharga = $pecah["harga"]*$jumlah;
                    //echo "<pre>";
                    //print_r($pecah);
                    //echo "</pre>";
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $pecah["nama_barang"];?></td>
                        <td>Rp.<?php echo number_format($pecah["harga"]);?></td>
                        <td><?php echo $jumlah;?></td>
                        <td>Rp. <?php echo number_format($subharga);?></td>
                        <td>
                            <a href="hapuskeranjang.php?id=<?php echo $id_barang;?>" class="btn btn-danger btn-xs">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++;?>
                    <?php endforeach;?>
                </tbody>
            </table>
            <a href="index.php" class="btn btn-secondary ">Lanjutkan Belanja</a>
            <a href="checkout.php" class="btn btn-primary">Checkout</a>
        </div>
    </section>
</body>
</html>