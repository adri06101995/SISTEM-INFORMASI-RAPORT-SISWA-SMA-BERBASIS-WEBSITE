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

img {
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
		Laporan Data Siswa
	</div>

<table border="1px" class="tabel">
	
    <tr>
      <th scope="col" class="text-center">NO</th>
      <th scope="col" class="text-center">NIS</th>
	  <th scope="col" class="text-center">Nama Siswa</th>
	  <th scope="col" class="text-center">NO Ortu</th>
	  <th scope="col" class="text-center">Alamat</th>
	  <th scope="col" class="text-center">Jenis Kelamin</th>
	  <th scope="col" class="text-center">Tempat Lahir</th>
	  <th scope="col" class="text-center">Tanggal Lahir</th>
	  <th scope="col" class="text-center">Agama</th>
	</tr>';
	 
	  $i = 1;
	      
	   
	  if (@$_POST['cetak_data']){ 
			
			$kategori = $_POST['kategori'];
		  
		 $siswa = query("SELECT * FROM tb_siswa
					 WHERE  nama_siswa like '%$kategori%' OR
					 alamat like '%$kategori%' OR
					 jk like '%$kategori%' OR
					 tempat_lahir like '%$kategori%' OR
					 agama like '%$kategori%'");
			
		} else {
			
			$siswa = query("SELECT * FROM tb_siswa");
	  
	  }
	  
	  
     foreach ($siswa as $row):  
	$content .= '
	<tr>
	  
	   <td class="text-center">'. $i .'</td>
	  <td class="text-center">'. $row ["nis"] .'</td>
	  <td class="text-center">'. $row ["nama_siswa"] .'</td>
	  <td class="text-center">'. $row ["no_hp_ortu"] .'</td>
	  <td class="text-center">'. $row ["alamat"] .'</td>
	  <td class="text-center">'. $row ["jk"] .'</td>
	  <td class="text-center">'. $row ["tempat_lahir"] .'</td>
	  <td class="text-center">'. $row ["tanggal_lahir"] .'</td>
	  <td class="text-center">'. $row ["agama"] .'</td>
	  
	  
    </tr>';
	$i++;
	endforeach; 
	 
	
	
	
  
$content .='
</table>

</page>';

require_once('../../build/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('p','Legal','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('exemple.pdf');
?>