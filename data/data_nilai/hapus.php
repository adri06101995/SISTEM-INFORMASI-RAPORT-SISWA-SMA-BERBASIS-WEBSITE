<?php
require 'functions.php';

$id_nilai = $_GET["id_nilai"];

if(hapus($id_nilai) > 0 )  {
	echo"
		<script>
				alert('data berhasil di hapus!');
				document.location.href = 'index.php?page=nilai&aksi=lihat2';
			</script>
	";
}else {
	echo"
		<script>
				alert('data gagal di hapus!');
				document.location.href = 'index.php?page=nilai&aksi=lihat2';
			</script>
	
	";

}
?>