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
	$nik = htmlspecialchars($data["nik"]);
	$nama_staf = htmlspecialchars($data["nama_staf"]);
	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);
	$level = htmlspecialchars($data["level"]);
	$tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
	$tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
	$jk = htmlspecialchars($data["jk"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$agama = htmlspecialchars($data["agama"]);
	$no_hp = htmlspecialchars($data["no_hp"]);
	//upload foto
	$foto = upload(); 
	if( !$foto){
		return false;
	}
	
	
	// query insert data
	$query = "INSERT INTO tb_staf
				VALUES
			('$nik','$nama_staf','$username',
			'$password','$level','$tempat_lahir',
			'$tanggal_lahir','$jk','$alamat',
			'$agama','$no_hp','$foto')
			";
			
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
}

function upload() {
	
	$namaFile = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpName = $_FILES['foto']['tmp_name'];
	
	//cek apakah tidak ada gambar yang di upload
	if( $error === 4) {
		echo "<script>
				alert('pilih foto terlebih dahulu');
			  </script>";
		return false;
	}
	
	//cek apakah yang diupload adalah gambar
	$ekstensifotoValid = ['jpg','jpeg','png'];
	$ekstensifoto = explode('.', $namaFile);
	$ekstensifoto = strtolower(end($ekstensifoto));
	if( !in_array($ekstensifoto, $ekstensifotoValid) ) {
		echo "<script>
				alert('yang anda upload bukan foto!');
			  </script>";
		return false;
	}
	
	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}	
	
	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensifoto;
	
	
	move_uploaded_file($tmpName,'img/foto/staf/'.$namaFileBaru);
	
	return $namaFileBaru;
		
}

function ubah($data) {
	global $conn;
	$nik = htmlspecialchars($data["nik"]);
	$nama_staf = htmlspecialchars($data["nama_staf"]);
	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);
	$level = htmlspecialchars($data["level"]);
	$tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
	$tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
	$jk = htmlspecialchars($data["jk"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$agama = htmlspecialchars($data["agama"]);
	$no_hp = htmlspecialchars($data["no_hp"]);
	$fotolama = htmlspecialchars($data["fotolama"]);
	
	
	// cek apakah user pilih foto baru atau tidak 
	if( $_FILES['foto']['error'] === 4 ) {
		$foto = $fotolama;
	} else {
		$foto = upload();
	}
	
	// query insert data
			
	$query = "UPDATE tb_staf SET
				nama_staf = '$nama_staf',
				username = '$username',
				password = '$password',
				level = '$level',
				tempat_lahir = '$tempat_lahir',
				tanggal_lahir = '$tanggal_lahir',
				jk = '$jk',
				alamat = '$alamat',
				agama = '$agama',
				no_hp = '$no_hp',
				foto = '$foto'
				WHERE nik = '$nik'
			";
			
	mysqli_query($conn, $query);
	  
	return mysqli_affected_rows($conn);
	
	
}

function hapus($nik) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_staf WHERE nik = '$nik'");
	return mysqli_affected_rows($conn);
}


?>