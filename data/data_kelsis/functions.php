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
	$id_kelsis = htmlspecialchars($data["id_kelsis"]);
	$nis = htmlspecialchars($data["nis"]);
	$nama_siswa = htmlspecialchars($data["nama_siswa"]);
	$id_kelas = htmlspecialchars($data["id_kelas"]);
	$id_thn_ajar = htmlspecialchars($data["id_thn_ajar"]);
	 
	// query insert data
	$query = "INSERT INTO tb_kelsis
				VALUES
			('$id_kelsis','$nis','$nama_siswa',
			'$id_kelas','$id_thn_ajar')
			";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
}

function ubah($data) {
	global $conn;
	$id_kelsis = htmlspecialchars($data["id_kelsis"]);
	$nis = htmlspecialchars($data["nis"]);
	$nama_siswa = htmlspecialchars($data["nama_siswa"]);
	$id_kelas = htmlspecialchars($data["id_kelas"]);
	$id_thn_ajar = htmlspecialchars($data["id_thn_ajar"]);
	
	// query insert data
			
	$query = "UPDATE tb_kelsis SET
				nis = '$nis',
				nama_siswa = '$nama_siswa',
				id_kelas = '$id_kelas',
				id_thn_ajar = '$id_thn_ajar'
				WHERE id_kelsis = '$id_kelsis'
			";
			
	mysqli_query($conn, $query);
	  
	return mysqli_affected_rows($conn);
	
	
}

function hapus($id_kelsis) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_kelsis WHERE id_kelsis = '$id_kelsis'");
	return mysqli_affected_rows($conn);
}


?>