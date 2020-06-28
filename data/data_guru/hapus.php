<?php
require 'functions.php';

$nip = $_GET["nip"];

if(hapus($nip) > 0 )  {
	echo"
		<script>
				alert('data berhasil di hapus!');
				document.location.href = 'index.php?page=guru';
			</script>
	";
}else {
	echo"
		<script>
				alert('data gagal di hapus!');
				document.location.href = 'index.php?page=guru';
			</script>
	
	";

}
?>