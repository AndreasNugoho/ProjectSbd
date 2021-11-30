<?php
$conn = mysqli_connect("localhost","root","","marketplace_baru");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
function tambah($data){
    global $conn;

    $username =htmlspecialchars($data["username"]);
    $password =htmlspecialchars($data["password"]);
    $namaDep =htmlspecialchars($data["namaDep"]);
    $namaBel =htmlspecialchars($data["namaBel"]);
    $email =htmlspecialchars($data["email"]);
    $noTelp =htmlspecialchars($data["noTelp"]);
    $alamat =htmlspecialchars($data["alamat"]);

    $query = "INSERT INTO akun VALUES ('','$username','$password','$namaDep','$namaBel','$email','$noTelp','$alamat')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
function hapus($id_akun){
    global $conn;
    mysqli_query($conn,"DELETE FROM akun WHERE id_akun=$id_akun");

    return mysqli_affected_rows($conn);
}
function edit($data){
    global $conn;

    $id_akun = $data["id"];
    $username =htmlspecialchars($data["username"]);
    $password =$data["password"];
    $namaDep =htmlspecialchars($data["namaDep"]);
    $namaBel =htmlspecialchars($data["namaBel"]);
    $email =htmlspecialchars($data["email"]);
    $noTelp =htmlspecialchars($data["noTelp"]);
    $alamat =htmlspecialchars($data["alamat"]);

    $query = "UPDATE akun SET username = '$username',namaDep = '$namaDep',namaBel = '$namaBel',email = '$email',noTelp = '$noTelp',alamat = '$alamat' WHERE id_akun = $id_akun";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}
?>