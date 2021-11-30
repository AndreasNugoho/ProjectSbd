<?php
session_start();
$conn = mysqli_connect("localhost","root","","marketplace_baru");
if( !isset($_SESSION["user"]) ) {
    echo"<script>alert('anda harus login!');</script>'";
	echo"<script>location='login.php';</script>'";
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
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
                        <td>Harga</td>
                        <td>Jumlah</td>
                        <td>Subharga</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    <?php $totalbelanja=0;?>
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
                    </tr>
                    <?php $i++;?>
                    <?php $totalbelanja+=$subharga;?>
                    <?php endforeach;?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja</th>
                        <th>Rp.<?php echo number_format($totalbelanja);?></th>
                    </tr>
                </tfoot>
            </table>
                
            <form action="" method="POST">
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <input type="text" readonly value="<?php echo $_SESSION["user"]['namaDep'],' ',$_SESSION["user"]['namaBel'];?>" class="form-control">
                                
                            </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" readonly name="total" value="<?php echo $_SESSION["user"]['alamat'];?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary" name="cek">checkout</button>
                            </div>
                        </div>      
                          
            </form>  
            <?php 
            if (isset($_POST["cek"]))
            {
                $id_akun = $_SESSION["user"]['id_akun'];
                $tanggal_transaksi = date("Y-m-d");
                $arr = "INSERT INTO belanja VALUES ('','$id_akun','$tanggal_transaksi','$totalbelanja')";
                $in = mysqli_query($conn,$arr);
                
                $id_pembelian = mysqli_insert_id($conn);

                foreach($_SESSION["keranjang"] as $id_barang => $jumlah)
                {
                    $query = "INSERT INTO item_belanja VALUES ('','$id_pembelian','$id_barang','$jumlah')";
                    $result = mysqli_query($conn,$query);
                    var_dump($result);
                    $baru = mysqli_query($conn,"UPDATE barang SET kuantitas=kuantitas-$jumlah WHERE id_barang='$id_barang'");
                }
                unset($_SESSION["keranjang"]);
                echo "<script>alert('pembelian sukses');</script>";
                echo "<script>location='invoice.php?id=$id_pembelian';</script>";
                
            }
            ?> 
            </div>
    </section>
</body>
</html>