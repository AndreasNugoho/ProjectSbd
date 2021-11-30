<?php
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

    $id_akun = $_GET['id'];
    $nama = htmlspecialchars($data["nama"]);
    $query = "INSERT INTO toko VALUES ('','$id_akun','$nama')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
?>