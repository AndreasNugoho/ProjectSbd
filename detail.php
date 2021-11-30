<?php
session_start();
require 'func_barang.php';
$id_barang = $_GET["id"];
$result = mysqli_query($conn,"SELECT * from barang left join toko on toko.id_toko = barang.id_toko where id_barang = '$id_barang'");
$detail = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman User</title>
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
<section class="content">
    <div class="container">
        <div class="row">
                <div class="col-md-3">
                    <img src="img/<?php echo $detail['gambar'];?>" alt="" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <h2><?php echo $detail['nama_barang'];?></h2>
                    <h5>Stock: <?php echo $detail['kuantitas'];?></h5>
                    <h4>Rp. <?php echo number_format($detail['harga']);?></h4>
                    <p>Description:<br>
                    <?php echo $detail['deskripsi'];?>
                    <p>Penjual:&nbsp;<a href="detail_toko.php?id=<?=$detail['id_toko'];?>"><?php echo $detail['nama'];?></a></p>
                    <form method="POST">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" class="form-control" name="jumlah" min="1" max="<?php echo $detail['kuantitas'];?>">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" name="beli">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST["beli"]))
                    {
                          $jumlah = $_POST["jumlah"];
                          $_SESSION["keranjang"][$id_barang] = $jumlah;
                          echo "<script>alert('berhasil memasukkan ke keranjang');</script>";
                          echo "<script>location='cart.php';</script>";
                    }
                    ?>
                    </p>
                </div>
        </div>
    </div>
</section>
        
        
</body>
</html>
