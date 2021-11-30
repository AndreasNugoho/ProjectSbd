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

    $nama = $_FILES['gambar']['name'];
    $lokasi =$_FILES['gambar']['tmp_name'];
    move_uploaded_file($lokasi,"../img/".$nama);
    $nama_toko = $data['nama_toko'];
    $nama_barang = htmlspecialchars($data['nama_barang']);
    $jenis_barang = htmlspecialchars($data['jenis_barang']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $harga = htmlspecialchars($data['harga']);
    //$gambar = htmlspecialchars($data['gambar']);
    $kuantitas = htmlspecialchars($data['kuantitas']);

    $gambar = upload();
	if( !$gambar ) {
		return false;
	}

    $query = "INSERT INTO barang VALUES('','$nama_toko','$nama_barang','$jenis_barang','$deskripsi','$harga','$gambar','$kuantitas')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 10000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = $namaFile;
	//$namaFileBaru .= '.';
	//$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

	return $namaFileBaru;
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