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
	$id_materi = htmlspecialchars($data["id_materi"]);
	$id_mapel = htmlspecialchars($data["id_mapel"]);
	
	//upload file
	$file = upload();
	if( !$file){
		return false;
	}
	 
	// query insert data
	$query = "INSERT INTO tb_materi
				VALUES
			('$id_materi','$id_mapel','$file')
			";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
}

function upload() {
	
	$namaFile = $_FILES['file']['name'];
	$ukuranFile = $_FILES['file']['size'];
	$error = $_FILES['file']['error'];
	$tmpName = $_FILES['file']['tmp_name'];
	
	//cek apakah tidak ada gambar yang di upload
	if( $error === 4) {
		echo "<script>
				alert('pilih file  terlebih dahulu');
			  </script>";
		return false;
	}
	
	//cek apakah yang diupload adalah gambar
	$ekstensifileValid = ['pdf','doc','docx'];
	$ekstensifile = explode('.', $namaFile);
	$ekstensifile = strtolower(end($ekstensifile));
	if( !in_array($ekstensifile, $ekstensifileValid) ) {
		echo "<script>
				alert('yang anda upload bukan file pdf!');
			  </script>";
		return false;
	}
	
	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 5000000 ) {
		echo "<script>
				alert('ukuran file terlalu besar!');
			  </script>";
		return false;
	}	
	
	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensifile;
	
	
	move_uploaded_file($tmpName,'img/materi/'.$namaFileBaru);
	
	return $namaFileBaru;
			
	
}

function hapus($id_materi) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_materi WHERE id_materi = '$id_materi'");
	return mysqli_affected_rows($conn);
}


?>