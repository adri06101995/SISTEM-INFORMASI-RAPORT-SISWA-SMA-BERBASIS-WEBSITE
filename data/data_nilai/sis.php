<?php

require_once "/../../database/koneksi.php";

$id_kelas = $_POST['id_kelas'];

$kategori = mysqli_query($conn,"SELECT * FROM tb_kelsis WHERE id_kelas = '$id_kelas'");


echo '<option>Nama Siswa</option>';
while($row_nabar = mysqli_fetch_array($kategori)){
	echo '<option value="'.$row_nabar['nis'].'">'.$row_nabar['nama_siswa'].'</option>';

}

