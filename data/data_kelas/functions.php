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
	$id_kelas = htmlspecialchars($data["id_kelas"]);
	$id_walikelas = htmlspecialchars($data["nama_guruwali"]);
	$nama_kelas = htmlspecialchars($data["nama_kelas"]);
	$kapasitas = htmlspecialchars($data["kapasitas"]);
	 
	// query insert data
	$query = "INSERT INTO tb_kelas
				VALUES
			('$id_kelas','$id_walikelas',
			'$nama_kelas','$kapasitas')
			";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
}

function ubah($data) {
	global $conn;
	$id_kelas = htmlspecialchars($data["id_kelas"]);
	$id_walikelas = htmlspecialchars($data["nama_guruwali"]);
	$nama_kelas = htmlspecialchars($data["nama_kelas"]);
	$kapasitas = htmlspecialchars($data["kapasitas"]);
	
	// query insert data
			
	$query = "UPDATE tb_kelas SET
				id_walikelas = '$id_walikelas',
				nama_kelas = '$nama_kelas',
				kapasitas = '$kapasitas'
				WHERE id_kelas = '$id_kelas'
			";
			
	mysqli_query($conn, $query);
	  
	return mysqli_affected_rows($conn);
	
	
}

function hapus($id_kelas) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_kelas WHERE id_kelas = '$id_kelas'");
	return mysqli_affected_rows($conn);
}


?>