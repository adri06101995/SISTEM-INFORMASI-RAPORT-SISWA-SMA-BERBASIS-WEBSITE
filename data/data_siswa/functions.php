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
	$nis = htmlspecialchars($data["nis"]);
	$nama_siswa = htmlspecialchars($data["nama_siswa"]);
	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);
	$no_hp_ortu = htmlspecialchars($data["no_hp_ortu"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$jk = htmlspecialchars($data["jk"]);
	$tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
	$tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
	$agama = htmlspecialchars($data["agama"]);
	 
	//upload foto
	$foto = upload(); 
	if( !$foto){
		return false;
	}
	
	// query insert data
	$query = "INSERT INTO tb_siswa
				VALUES
			('$nis','$nama_siswa','$username',
			'$password','siswa','$no_hp_ortu','$alamat',
			'$jk','$tempat_lahir','$tanggal_lahir',
			'$agama','$foto')
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
	
	
	move_uploaded_file($tmpName,'img/foto/siswa/'.$namaFileBaru);
	
	return $namaFileBaru;
		
}

function ubah($data) {
	global $conn;
	$nis = htmlspecialchars($data["nis"]);
	$nama_siswa = htmlspecialchars($data["nama_siswa"]);
	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);
	$no_hp_ortu = htmlspecialchars($data["no_hp_ortu"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$jk = htmlspecialchars($data["jk"]);
	$tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
	$tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
	$agama = htmlspecialchars($data["agama"]);
	$fotolama = htmlspecialchars($data["fotolama"]);
	
	
	// cek apakah user pilih foto baru atau tidak 
	if( $_FILES['foto']['error'] === 4 ) {
		$foto = $fotolama;
	} else {
		$foto = upload();
	}
	
	
	// query insert data
	
	$query = "UPDATE tb_siswa SET
				nama_siswa = '$nama_siswa',
				username = '$username',
				password = '$password',
				level = 'siswa',
				no_hp_ortu = '$no_hp_ortu',
				alamat = '$alamat',
				jk = '$jk',
				tempat_lahir = '$tempat_lahir',
				tanggal_lahir = '$tanggal_lahir',
				agama = '$agama',
				foto = '$foto'
				WHERE nis = '$nis'
			";
			
	mysqli_query($conn, $query);
	  
	return mysqli_affected_rows($conn);
	
	
}

function hapus($nis) {
	global $conn;
	$sql = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE nis = '$nis'");
	$row = mysqli_fetch_array($sql);
	unlink("img/foto/siswa/$row[foto]");
	
	mysqli_query($conn, "DELETE FROM tb_siswa WHERE nis = '$nis'");
	return mysqli_affected_rows($conn);
}


?>