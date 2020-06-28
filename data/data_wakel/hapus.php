<?php
require 'functions.php';

$id_walikelas = $_GET["id_walikelas"];

if(hapus($id_walikelas) > 0 )  {
	echo"
		<script>
				alert('data berhasil di hapus!');
				document.location.href = 'index.php?page=wakel';
			</script>
	";
}else {
	echo"
		<script>
				alert('data gagal di hapus!');
				document.location.href = 'index.php?page=wakel';
			</script>
	
	";

}
?>