<?php
require 'func_barang.php';
$id_barang = $_GET["id"];
if (hapus($id_barang)>0){
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'barang.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'barang.php';
		</script>
	";
}

?>