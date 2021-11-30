<?php
//session_start();
$conn = mysqli_connect("localhost","root","","marketplace_baru");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }
    return $rows;
}
function tambah($data){
    global $conn;

    $nama_toko = $data['nama_toko'];
    $nama_barang = htmlspecialchars($data['nama_barang']);
    $jenis_barang = htmlspecialchars($data['jenis_barang']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $harga = htmlspecialchars($data['harga']);
    $gambar = htmlspecialchars($data['gambar']);
    $kuantitas = htmlspecialchars($data['kuantitas']);

    $query = "INSERT INTO barang VALUES('','$nama_toko','$nama_barang','$jenis_barang','$deskripsi','$harga','$gambar','$kuantitas')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
function hapus($id_akun){
    global $conn;
    mysqli_query($conn,"DELETE FROM barang WHERE id_barang=$id_akun");

    return mysqli_affected_rows($conn);
}
function edit($data){
    global $conn;
    
    $id_barang=htmlspecialchars($data["id_barang"]);
    $id_toko=htmlspecialchars($data["id_toko"]);
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $jenis_barang= htmlspecialchars($data["jenis_barang"]);
    $deskripsi= htmlspecialchars($data["deskripsi"]);
    $harga= htmlspecialchars($data["harga"]);
    $gambar= htmlspecialchars($data["gambar"]);
    $kuantitas = htmlspecialchars($data["kuantitas"]);

    $query = "UPDATE barang SET nama_barang = '$nama_barang',jenis_barang = '$jenis_barang',deskripsi ='$deskripsi',harga ='$harga',gambar='$gambar',kuantitas='$kuantitas' WHERE id_barang = '$id_barang'";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
?>