<?php
// koneksi ke database
$conn = mysqli_connect("localhost","root","","sekolah");



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

	$id_nilai = htmlspecialchars($data["id_nilai"]);
	$nis = htmlspecialchars($data["siswa1"]);
	$id_kelas = htmlspecialchars($data["kelas1"]);
	$tahun_ajaran = htmlspecialchars($data["thn_ajar"]);
	$mapel = htmlspecialchars($data["mapel"]);
	$tgs1 = htmlspecialchars($data["tgs1"]);
	$tgs2 = htmlspecialchars($data["tgs2"]);
	$tgs3 = htmlspecialchars($data["tgs3"]);
	$uts = htmlspecialchars($data["uts"]);
	$uas = htmlspecialchars($data["uas"]);
	  
	// query insert data
	$query = "INSERT INTO tb_nilai
				VALUES
			('$id_nilai','$nis','$id_kelas',
			'$tahun_ajaran','$mapel','$tgs1',
			'$tgs2','$tgs3','$uts','$uas')
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