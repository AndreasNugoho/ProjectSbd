<?php
session_start();
$id_barang = $_GET['id'];
unset($_SESSION['keranjang'][$id_barang]);
echo "<script>alert('barang berhasil di hapus');</script>";
echo "<script>location='cart.php';</script>";
?>