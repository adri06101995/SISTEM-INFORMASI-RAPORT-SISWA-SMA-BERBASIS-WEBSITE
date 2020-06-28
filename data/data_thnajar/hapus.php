<?php
require 'functions.php';

$id_thn_ajar = $_GET["id_thn_ajar"];

if(hapus($id_thn_ajar) > 0 )  {
	echo"
		<script>
				alert('data berhasil di hapus!');
				document.location.href = 'index.php?page=thnajar';
			</script>
	";
}else {
	echo"
		<script>
				alert('data gagal di hapus!');
				document.location.href = 'index.php?page=thnajar';
			</script>
	
	";

}
?>