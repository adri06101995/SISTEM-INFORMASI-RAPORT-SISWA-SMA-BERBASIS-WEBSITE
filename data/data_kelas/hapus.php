<?php
require 'functions.php';

$id_kelas = $_GET["id_kelas"];

if(hapus($id_kelas) > 0 )  {
	echo"
		<script>
				alert('data berhasil di hapus!');
				document.location.href = 'index.php?page=kelas';
			</script>
	";
}else {
	echo"
		<script>
				alert('data gagal di hapus!');
				document.location.href = 'index.php?page=kelas';
			</script>
	
	";

}
?>