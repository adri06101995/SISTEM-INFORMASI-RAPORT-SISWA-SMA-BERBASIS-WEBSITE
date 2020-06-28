<?php
require 'functions.php';

$id_japel = $_GET["id_japel"];

if(hapus($id_japel) > 0 )  {
	echo"
		<script>
				alert('data berhasil di hapus!');
				document.location.href = 'index.php?page=japel';
			</script>
	";
}else {
	echo"
		<script>
				alert('data gagal di hapus!');
				document.location.href = 'index.php?page=japel';
			</script>
	
	";

}
?>