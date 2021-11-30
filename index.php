<?php
session_start();
require 'func_barang.php';
$result = mysqli_query($conn,"SELECT * FROM barang");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/styles_barang.css">
    <html>
    <!--web-icon------------------->
    <link href="images/logo.png" rel="shortcut icon"/>
    <!--stylesheet-------------------->
    <link href="css/styles_barang.css" rel="stylesheet" type="text/css"/>
    <!--FontAwesome-------->
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/70a642cd7c.js"></script>
</head>
<body>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
            </div>
        </div>
        </div>
        <section class="main">
        <!--logo------------->
            <div class="logo">
                <a href="#"><font>MASKOH</font>STORE</a>
            </div>
            <div class="side-box">
                <a href="cart.php">Cart  </a>
                <a>&nbsp;&nbsp;|&nbsp;&nbsp; </a>
                <?php if (isset($_SESSION['user'])):?>
                    <a href="logout.php">Logout</a>
                <?php else:?>
                    <a href="login.php">Login</a>
                <?php endif;?>
            </div>
        <!--img--------->
        <div class="m-img">
        <img alt="" src="img/cover-01.png" />    
        </div>
        <!--text------------>
            <div class="m-text">
        <h1>Sel<font>a</font>mat</h1>
        <h2>Da<font>tang</font></h2>
        </div>
        </section>
   
        
        <section class="product">
        <div class="p-heading">
            <h3>Pro<font>duk</font> Kami</h3>
        </div>
        <div class="product-container">
        <?php $i = 1;?>
        <?php foreach ($result as $row):?>
            <div class="p-box">
                <img alt="1" src="img/<?= $row["gambar"]; ?>" />
                <p><?= $row['nama_barang'];?></p>
                <p class="price">Rp.<?= number_format($row['harga']);?></p>
                <a class="buy-btn1" href="detail.php?id=<?= $row['id_barang'];?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Detail</a><br>
                <a class="buy-btn" href="tambah_cart.php?id=<?= $row["id_barang"];?>">Add To Cart</a>
            </div>
        
        <?php $i++;?>
        <?php endforeach;?>
        </div>
        </section>
        
</body>
</html>
