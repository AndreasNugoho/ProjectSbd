<?php
    require 'func_barang.php';
    $id = $_GET['id'];

    unset($_SESSION["cart"][$id]);

    header("location:cart.php");

?>