<?php
    require 'func_barang.php';
    $id = $_GET['id'];
    //var_dump($id);
    $query = mysqli_query($conn,"SELECT * from belanja JOIN akun on belanja.id_akun = akun.id_akun WHERE id_belanja= $id;");
    $arr = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <style>
    .navbar.bg-light {
        background-color: #f3e2b3 !important;
        .form-control {
            border-radius: 4.25rem;
        }
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
            <div class="container">
                <a class="navbar-brand" href="akun.php">Admin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="barang.php">Barang</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="akun.php">Akun</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
            </div>
        </nav>
        <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="text-center fw-bold text-uppercase">DATA TRANSAKSI</h3>
                <hr>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md">
            <p>
                <?php echo $arr['namaDep'], ' ',$arr['namaBel'];?><br>
                <?php echo $arr['email'];?><br>
                <?php echo $arr['alamat'];?><br>
            </p>
            <p>
                Tanggal Pembelian: <?php echo $arr['tanggal_transaksi'];?><br>
                Total : Rp.<?php echo number_format($arr['total_pembelian']);?>
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
                            <td>Rp.<?php echo number_format($row['harga']);?></td>
                            <td><?php echo $row['jumlah_barang_beli'];?></td>
                            <td>
                                Rp.<?php echo number_format($row['harga']*$row['jumlah_barang_beli']);?>
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
</body>
</html>