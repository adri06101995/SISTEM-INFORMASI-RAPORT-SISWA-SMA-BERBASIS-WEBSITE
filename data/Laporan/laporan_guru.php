<?php
require 'functions.php';

	
$content = '
<style>
.content{
    font-family: "Times New Roman", Times, serif;
}
.tabel { border-collapse:collapse; }
.tabel th { padding:8px 5px; font-size:12;}
.tabel td { padding:8px 5px; font-size:10;}

img{
	float : left;
}

</style>
';	

$content .= '
<page>
	<img src="logo.jpg" alt="logo" width="90">
	<div style="padding:4mm; border:0px solid;">
		<span style="font-size:25px;">SMA NEGERI 2 DOGIYAI</span><br/>
		<span style="font-size:15px;">Kecamatan Mapia, Kabupaten Dogiyai, Provinsi Papua</span><br/>
		<span style="font-size:12px;">Jln. Trans Papua Nabire-Enarotali Km. 184</span>
	</div>
	<hr>
	<div style="padding:20px 0 10px 0; font-size:15;">
		Laporan Data Guru
	</div>
	
<div class="table-responsive">
<table border="1px" class="tabel" id="dataTables-example">
	
    <tr>
      <th scope="col" class="text-center">NO</th>
      <th scope="col" class="text-center">NIP</th>
	  <th scope="col" class="text-center">Nama Lengkap</th>
	  <th scope="col" class="text-center">NO HP</th>
	  <th scope="col" class="text-center">Alamat</th>
	  <th scope="col" class="text-center">Jenis Kelamin</th>
	  <th scope="col" class="text-center">Status Guru</th>
	  <th scope="col" class="text-center">Tempat Lahir</th>
	  <th scope="col" class="text-center">Tanggal Lahir</th>
	  <th scope="col" class="text-center">Agama</th>
	</tr>';
	 
	  $i = 1;
	      
	   
	  if (@$_POST['cetak_data']){ 
			
			$kategori = $_POST['kategori'];
		  
		 $siswa = query("SELECT * FROM tb_guru
					 WHERE  nama_guru like '%$kategori%' OR
					 alamat like '%$kategori%' OR
					 jk like '%$kategori%' OR
					 status_guru like '%$kategori%' OR
					 tempat_lahir like '%$kategori%' OR
					 agama like '%$kategori%'");
			
		} else {
			
			$siswa = query("SELECT * FROM tb_guru");
	  
	  }
	  
	  
     foreach ($siswa as $row):  
	$content .= '
	<tr>
	  
	   <td class="text-center">'. $i .'</td>
	  <td class="text-center">'. $row ["nip"] .'</td>
	  <td class="text-center">'. $row ["nama_guru"] .'</td>
	  <td class="text-center">'. $row ["no_tlp"] .'</td>
	  <td class="text-center">'. $row ["alamat"] .'</td>
	  <td class="text-center">'. $row ["jk"] .'</td>
	  <td class="text-center">'. $row ["status_guru"] .'</td>
	  <td class="text-center">'. $row ["tempat_lahir"] .'</td>
	  <td class="text-center">'. $row ["tanggal_lahir"] .'</td>
	  <td class="text-center">'. $row ["agama"] .'</td>
	  
	  
    </tr>';
	$i++;
	endforeach; 
	 
	

	
  
$content .='
</table>
</div>	

</page>';

require_once('../../build/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('p','Legal','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('exemple.pdf');
?>