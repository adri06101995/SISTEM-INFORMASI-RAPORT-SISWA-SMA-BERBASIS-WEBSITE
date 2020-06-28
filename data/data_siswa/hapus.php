<?php
require 'functions.php';

$nis = $_GET["nis"];

if(hapus($nis) > 0 )  {
	echo"
		<script>
				alert('data berhasil di hapus!');
				document.location.href = 'index.php?page=siswa';
			</script>
	";
}else {
	echo"
		<script>
				alert('data gagal di hapus!');
				document.location.href = 'index.php?page=siswa';
			</script>
	
	";

}
?>