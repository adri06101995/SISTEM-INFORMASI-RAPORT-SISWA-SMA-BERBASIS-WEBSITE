<?php
require 'functions.php';

$id_materi = $_GET["id_materi"];

if(hapus($id_materi) > 0 )  {
	echo"
		<script>
				alert('data berhasil di hapus!');
				document.location.href = 'index.php?page=materi';
			</script>
	";
}else {
	echo"
		<script>
				alert('data gagal di hapus!');
				document.location.href = 'index.php?page=materi';
			</script>
	
	";

}
?>