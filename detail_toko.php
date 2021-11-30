<?php
session_start();
require 'func_barang.php';
$id_toko = $_GET["id"];
$result = mysqli_query($conn,"SELECT * from barang inner join toko on toko.id_toko = barang.id_toko  where toko.id_toko = '$id_toko'");
$detail = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Toko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <!-- Link Bootstrap JS and JQuery -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
            <a class="nav-link" href="checkout.php">Checkout</a>
        </div>
        </div>
    </div>
</nav>
<section class="konten">
        <div class="container">
            <h3><?php echo $detail['nama'];?></h3>
        
        <div class="row">
        <?php foreach ($result as $row):?>
            <div class="col-md-3">
                <div class="thumbnail">
                    <img alt="1" src="img/<?= $row["gambar"]; ?>" class="img-responsive"/>
                    <div class="caption">
                        <p><?= $row['nama_barang'];?></p>
                        <p class="price">Rp.<?= number_format($row['harga']);?></p>
                        <a class="btn btn-primary" href="detail.php?id=<?= $row['id_barang'];?>">Detail</a>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-primary" href="tambah_cart.php?id=<?= $row["id_barang"];?>">Add To Cart</a>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        
        
        </div>
        </section>
</body>
</html>