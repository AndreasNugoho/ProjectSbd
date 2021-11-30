<?php
    require 'func_barang.php';

    $sql = "INSERT INTO belanja ('id_akun','tanggal_transaksi') VALUES ('','".date("Y-m-d")."')";
    $query = mysqli_query($conn, $sql);
    $id_transaksi = mysqli_insert_id($conn);

    header("location:cart.php");

?>