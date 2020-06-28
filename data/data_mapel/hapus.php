<?php
require 'functions.php';

$id_mapel = $_GET["id_mapel"];

if(hapus($id_mapel) > 0 )  {
	echo"
		<script>
				alert('data berhasil di hapus!');
				document.location.href = 'index.php?page=mapel';
			</script>
	";
}else {
	echo"
		<script>
				alert('data gagal di hapus!');
				document.location.href = 'index.php?page=mapel';
			</script>
	
	";

}
?>