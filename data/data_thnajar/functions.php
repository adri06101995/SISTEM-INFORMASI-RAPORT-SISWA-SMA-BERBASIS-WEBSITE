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
	$id_thn_ajar = htmlspecialchars($data["id_thn_ajar"]);
	$semester = htmlspecialchars($data["semester"]);
	$nama_thn_ajar = htmlspecialchars($data["nama_thn_ajar"]);
	 
	// query insert data
	$query = "INSERT INTO tb_thn_ajar
				VALUES
			('$id_thn_ajar','$semester','$nama_thn_ajar')
			";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
}

function ubah($data) {
	global $conn;
	$id_thn_ajar = htmlspecialchars($data["id_thn_ajar"]);
	$semester = htmlspecialchars($data["semester"]);
	$nama_thn_ajar = htmlspecialchars($data["nama_thn_ajar"]);
	
	// query insert data
			
	$query = "UPDATE tb_thn_ajar SET
				nama_thn_ajar = '$nama_thn_ajar',
				semester = '$semester'
				WHERE id_thn_ajar = '$id_thn_ajar'
			";
			
	mysqli_query($conn, $query);
	  
	return mysqli_affected_rows($conn);
	
	
}

function hapus($id_thn_ajar) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_thn_ajar WHERE id_thn_ajar = '$id_thn_ajar'");
	return mysqli_affected_rows($conn);
}


?>