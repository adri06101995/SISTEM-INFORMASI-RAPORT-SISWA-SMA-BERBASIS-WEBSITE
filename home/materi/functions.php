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
	$id_pengumuman = htmlspecialchars($data["id_pengumuman"]);
	$tgl_pengumuman = htmlspecialchars($data["tgl_pengumuman"]);
	$isi_pengumuman = htmlspecialchars($data["isi_pengumuman"]);
	 
	// query insert data
	$query = "INSERT INTO tb_pengumuman
				VALUES
			('$id_pengumuman','$tgl_pengumuman','$isi_pengumuman')
			";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
}

function ubah($data) {
	global $conn;
	$id_pengumuman = htmlspecialchars($data["id_pengumuman"]);
	$tgl_pengumuman = htmlspecialchars($data["tgl_pengumuman"]);
	$isi_pengumuman = htmlspecialchars($data["isi_pengumuman"]);
	
	// query insert data
			
	$query = "UPDATE tb_pengumuman SET
				tgl_pengumuman = '$tgl_pengumuman',
				isi_pengumuman = '$isi_pengumuman'
				WHERE id_pengumuman = '$id_pengumuman'
			";
			
	mysqli_query($conn, $query);
	  
	return mysqli_affected_rows($conn);
	
	
}

function hapus($id_pengumuman) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_pengumuman WHERE id_pengumuman = '$id_pengumuman'");
	return mysqli_affected_rows($conn);
}


?>