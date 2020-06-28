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
	$id_mapel = htmlspecialchars($data["id_mapel"]);
	$nama_mapel = htmlspecialchars($data["nama_mapel"]);
	$nip = htmlspecialchars($data["nama_guru"]);
	 
	// query insert data
	$query = "INSERT INTO tb_mapel
				VALUES
			('$id_mapel','$nama_mapel','$nip ')
			";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
}

function ubah($data) {
	global $conn;
	$id_mapel = htmlspecialchars($data["id_mapel"]);
	$nama_mapel = htmlspecialchars($data["nama_mapel"]);
	$nip = htmlspecialchars($data["nama_guru"]);
	
	// query insert data
			
	$query = "UPDATE tb_mapel SET
				nama_mapel = '$nama_mapel',
				nip = '$nip'
				WHERE id_mapel = '$id_mapel'
			";
			
	mysqli_query($conn, $query);
	  
	return mysqli_affected_rows($conn);
	
	
}

function hapus($id_mapel) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_mapel WHERE id_mapel = '$id_mapel'");
	return mysqli_affected_rows($conn);
}


?>