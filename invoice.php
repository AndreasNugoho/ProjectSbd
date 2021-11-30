<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","marketplace_baru");
    $id = $_GET['id'];
    $query = mysqli_query($conn,"SELECT * from belanja JOIN akun on belanja.id_akun = akun.id_akun WHERE id_belanja= $id;");
    $arr = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
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
    <div class="row my-2">
            <div class="col-md">
                <h3 class="text-center fw-bold text-uppercase">Invoice Transaksi</h3>
                <hr>
            </div>
        </div>
        <div class="row">
                <div class="col-md-3">
                    <h3 class="text-left fw-bold text-uppercase">Pembelian</h3><br>
                    <strong>No.Pesanan: <?php echo $arr['id_belanja'];?></strong><br>
                    Tanggal Pembelian: <?php echo $arr['tanggal_transaksi']?><br>
                    Total : Rp.<?php echo number_format($arr['total_pembelian']);?>
                </div>
                <div class="col-md-3">
                    <h3 class="text-left fw-bold text-uppercase">Pelanggan</h3><br>
                    <strong><?php echo $arr['namaDep'], ' ',$arr['namaBel'];?></strong><br>
                    <p>
                        <?php echo $arr['email'];?><br>
                        <?php echo $arr['alamat'];?><br>
                    </p>
                </div>
        </div>
        <div class="row my-3">
            <div class="col-md">
                <table id="data" class="table table-striped table-responsive table-hover text-center" style="width:100%">
                    <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah Barang</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $sql = mysqli_query($conn,"SELECT * from item_belanja join barang on item_belanja.id_barang = barang.id_barang where item_belanja.id_belanja = $id");?>
                        
                        <?php $i =1;?>
                        <?php while($row=$sql->fetch_assoc()){?>
                        
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row['nama_barang'];?></td>
                            <td><?php echo $row['harga'];?></td>
                            <td><?php echo $row['jumlah_barang_beli'];?></td>
                            <td>
                                <?php echo $row['harga']*$row['jumlah_barang_beli'];?>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php } ?>
                        
                        
        </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

        <!-- Data Tables -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
        <script>
        $(document).ready(function() {
                // Fungsi Table
                $('#data').DataTable();
                // Fungsi Table

                // Fungsi Detail
                $('.detail').click(function() {
                    var dataAkun = $(this).attr("data-id");
                    $.ajax({
                        url: "detail.php",
                        method: "post",
                        data: {
                            dataAkun,
                            dataAkun
                        },
                        success: function(data) {
                            $('#detail-akun').html(data);
                            $('#detail').modal("show");
                        }
                    });
                });
                // Fungsi Detail
            });
        </script>                        
    </div>
</section>
</nav>
</body>
</html>