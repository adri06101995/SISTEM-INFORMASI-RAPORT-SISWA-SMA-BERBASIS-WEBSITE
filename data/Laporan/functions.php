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
	$nip = htmlspecialchars($data["nip"]);
	$nama_guru = htmlspecialchars($data["nama_guru"]);
	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);
	$no_tlp = htmlspecialchars($data["no_tlp"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$jk = htmlspecialchars($data["jk"]);
	$status_guru = htmlspecialchars($data["status_guru"]);
	$tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
	$tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
	$agama = htmlspecialchars($data["agama"]);
	 
	//upload foto
	$foto = upload(); 
	if( !$foto){
		return false;
	}
	
	// query insert data
	$query = "INSERT INTO tb_guru
				VALUES
			('$nip','$nama_guru','$username',
			'$password','$no_tlp','$alamat',
			'$jk','$status_guru','$tempat_lahir','$tanggal_lahir',
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
	
	
	move_uploaded_file($tmpName,'img/foto/guru/'.$namaFileBaru);
	
	return $namaFileBaru;
		
}

function ubah($data) {
	global $conn;
	$nip = htmlspecialchars($data["nip"]);
	$nama_guru = htmlspecialchars($data["nama_guru"]);
	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);
	$no_tlp = htmlspecialchars($data["no_tlp"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$jk = htmlspecialchars($data["jk"]);
	$status_guru = htmlspecialchars($data["status_guru"]);
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
	
	$query = "UPDATE tb_guru SET
				nama_guru = '$nama_guru',
				username = '$username',
				password = '$password',
				no_tlp = '$no_tlp',
				alamat = '$alamat',
				jk = '$jk',
				status_guru = '$status_guru',
				tempat_lahir = '$tempat_lahir',
				tanggal_lahir = '$tanggal_lahir',
				agama = '$agama',
				foto = '$foto'
				WHERE nip = '$nip'
			";
			
	mysqli_query($conn, $query);
	  
	return mysqli_affected_rows($conn);
	
	
}

function hapus($nip) {
	global $conn;
	$sql = mysqli_query($conn, "SELECT * FROM tb_guru WHERE nip = '$nip'");
	$row = mysqli_fetch_array($sql);
	unlink("img/foto/guru/$row[foto]");
	
	mysqli_query($conn, "DELETE FROM tb_guru WHERE nip = '$nip'");
	return mysqli_affected_rows($conn);
}


?>