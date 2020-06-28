<?php
// koneksi ke database
include "database/koneksi.php";



function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data){
	global $conn;
	$id_walikelas = htmlspecialchars($data["id_walikelas"]);
	$nama_guruwali = htmlspecialchars($data["nama_guruwali"]);
	 
	// query insert data
	$query = "INSERT INTO tb_wakel
				VALUES
			('$id_walikelas','$nama_guruwali')
			";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
}

function ubah($data) {
	global $conn;
	$id_walikelas = htmlspecialchars($data["id_walikelas"]);
	$nama_guruwali = htmlspecialchars($data["nama_guruwali"]);
	
	// query insert data
			
	$query = "UPDATE tb_wakel SET
				nama_guruwali = '$nama_guruwali'
				WHERE id_walikelas = '$id_walikelas'
			";
			
	mysqli_query($conn, $query);
	  
	return mysqli_affected_rows($conn);
	
	
}

function hapus($id_walikelas) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_wakel WHERE id_walikelas = '$id_walikelas'");
	return mysqli_affected_rows($conn);
}


?>