<?php
require 'functions.php';

$nik = $_GET["nik"];

if(hapus($nik) > 0 )  {
	echo"
		<script>
				alert('data berhasil di hapus!');
				document.location.href = 'index.php?page=staf';
			</script>
	";
}else {
	echo"
		<script>
				alert('data gagal di hapus!');
				document.location.href = 'index.php?page=staf';
			</script>
	
	";

}
?>