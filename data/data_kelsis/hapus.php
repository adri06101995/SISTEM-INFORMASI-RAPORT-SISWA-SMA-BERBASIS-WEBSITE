<?php
require 'functions.php';

$id_kelsis = $_GET["id_kelsis"];

if(hapus($id_kelsis) > 0 )  {
	echo"
		<script>
				alert('data berhasil di hapus!');
				document.location.href = 'index.php?page=kelsis';
			</script>
	";
}else {
	echo"
		<script>
				alert('data gagal di hapus!');
				document.location.href = 'index.php?page=kelsis';
			</script>
	
	";

}
?>