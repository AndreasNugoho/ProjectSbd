<?php
session_start();
$id_barang = $_GET['id'];
//var_dump($id_barang);
if (isset($_SESSION['keranjang'][$id_barang])){
    $_SESSION['keranjang'][$id_barang] +=1;
}
else{
    $_SESSION['keranjang'][$id_barang]=1;
}
//echo "berhasil";
echo "<script>alert('Produk berhasil di tambahkan di keranjang');</script>";
echo "<script>location='cart.php';</script>";
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";


?>