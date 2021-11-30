<?php
session_start();
if( !isset($_SESSION["admin"]) ) {
	header("Location: login.php");
	exit;
}
require 'func.php';
$result = mysqli_query($conn,"SELECT * from toko right join akun on akun.id_akun = toko.id_akun;");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
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
                    <a class="nav-link" href="transaksi.php">Transaksi</a>
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
                <h3 class="text-center fw-bold text-uppercase">DATA AKUN</h3>
                <hr>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <a href="tambah.php" type="button">
                <button type="submit" class="btn btn-primary" name="submit">Tambah Akun</button>
                </a>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md">
                <table id="data" class="table table-striped table-responsive table-hover text-center" style="width:100%">
                    <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>username</th>
                        <th>password</th>
                        <th>namaDep</th>
                        <th>namaBel</th>
                        <th>email</th>
                        <th>noTelp</th>
                        <th>alamat</th>
                        <th>Nama Toko</th>
                        <th width="170">edit</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i =1;?>
                        <?php foreach($result as $row):?>
                        
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row['username'];?></td>
                            <td><?php echo $row['password'];?></td>
                            <td><?php echo $row['namaDep'];?></td>
                            <td><?php echo $row['namaBel'];?></td>  
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['noTelp'];?></td>
                            <td><?php echo $row['alamat'];?></td>
                            <td><?php echo $row['nama'];?></td>
                            <td>
                                <a href="edit.php?id=<?= $row["id_akun"];?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i class="bi bi-pencil-square"></i>Edit</a> |
                                <a href="hapus.php?id=<?= $row["id_akun"];?>" onclick="return confirm('yakin?');"class="btn btn-danger btn-sm" style="font-weight: 600;"><i class="bi bi-trash-fill"></i>Hapus</a> |
                                <a href="toko.php?id=<?= $row["id_akun"];?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i class="bi bi-pencil-square"></i>Toko</a>
                            </td>  
                        </td>
                        <?php $i++; ?>
                        <?php endforeach;?>
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