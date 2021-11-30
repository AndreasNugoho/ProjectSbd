<?php
require 'func.php';
$id_akun = $_GET["id"];
if (hapus($id_akun)>0){
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'akun.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'akun.php';
		</script>
	";
}

?>