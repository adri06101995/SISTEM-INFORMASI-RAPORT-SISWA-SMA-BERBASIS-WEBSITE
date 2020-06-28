<?php
require 'functions.php';

$id_pengumuman = $_GET["id_pengumuman"];

if(hapus($id_pengumuman) > 0 )  {
	echo"
		<script>
				alert('data berhasil di hapus!');
				document.location.href = 'index.php?page=pengumuman';
			</script>
	";
}else {
	echo"
		<script>
				alert('data gagal di hapus!');
				document.location.href = 'index.php?page=pengumuman';
			</script>
	
	";

}
?>