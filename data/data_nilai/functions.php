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
	
	$jumlah = $tgs1 + $tgs2 + $tgs3 + $uts + $uas;
	$rata = $jumlah / 5;
	  
	// query insert data
	$query = "INSERT INTO tb_nilai
				VALUES
			('$id_nilai','$nis','$id_kelas',
			'$tahun_ajaran','$mapel','$tgs1',
			'$tgs2','$tgs3','$uts','$uas','$rata')
			";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
	
}

function ubah($data) {
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
	
	$jumlah = $tgs1 + $tgs2 + $tgs3 + $uts + $uas;
	$rata = $jumlah / 5;
	  
	
	// query insert data
			
	$query = "UPDATE tb_nilai SET
				id_nilai = '$id_nilai',
				id_kelas = '$id_kelas',
				tahun_ajaran = '$tahun_ajaran',
				mapel = '$mapel',
				tgs1 = '$tgs1',
				tgs2 = '$tgs2',
				tgs3 = '$tgs3',
				uts = '$uts',
				uas = '$uas',
				rata = '$rata'
				WHERE id_nilai = '$id_nilai'
			";
			
	mysqli_query($conn, $query);
	  
	return mysqli_affected_rows($conn);
	
	
}

function hapus($id_nilai) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_nilai WHERE id_nilai = '$id_nilai'");
	return mysqli_affected_rows($conn);
}


?>