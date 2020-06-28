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

//cari halaman akun
function cari($keyword) {
	$query = "SELECT * FROM akun
			WHERE
			username like '%$keyword%'
			";
	return query($query);
}

function tambah($data){
	global $conn;
	$id_japel = htmlspecialchars($data["id_japel"]);
	$id_kelas = htmlspecialchars($data["id_kelas"]);
	$id_thn_ajar = htmlspecialchars($data["id_thn_ajar"]);
	
	//upload file
	$file = upload();
	if( !$file){
		return false;
	}
	
	
	 
	// query insert data
	$query = "INSERT INTO tb_japel
				VALUES
			('$id_japel','$id_kelas','$id_thn_ajar','$file')
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
	
	
	move_uploaded_file($tmpName,'img/jadwal/'.$namaFileBaru);
	
	return $namaFileBaru;
		
}




function ubah($data) {
	global $conn;
	$id_sk = $data["id_sk"];
	$nama_sk = htmlspecialchars($data["nama_sk"]);
	$file = htmlspecialchars($data["file"]);
	$tgl_upload = htmlspecialchars($data["tgl_upload"]);
	
	// query insert data
	$query = "UPDATE sk_rektor SET
				nama_sk = '$nama_sk',
				file = '$file',
				tgl_upload = '$tgl_upload'
				WHERE id_sk = '$id_sk'
			";
	mysqli_query($conn, $query);
	  
	return mysqli_affected_rows($conn);
	
	
}

function hapus($id_japel) {
	global $conn;
	$sql = mysqli_query($conn, "SELECT * FROM tb_japel WHERE id_japel = '$id_japel'");
	$row = mysqli_fetch_array($sql);
	unlink("img/jadwal/$row[file]");
	
	mysqli_query($conn, "DELETE FROM tb_japel WHERE id_japel = '$id_japel'");
	return mysqli_affected_rows($conn);
}


?>