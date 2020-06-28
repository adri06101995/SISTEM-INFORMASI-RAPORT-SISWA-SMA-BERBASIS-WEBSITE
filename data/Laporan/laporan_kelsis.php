<?php
require 'functions.php';

	
$content = '
<style>
.content{
    font-family: "Times New Roman", Times, serif;
}
.tabel { border-collapse:collapse; }
.tabel th { padding:8px 5px; font-size:18;}
.tabel td { padding:8px 5px; font-size:16;}

img {
  float : left;	
}

.judul {
 text-align: center;
 
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
		Laporan Data Kelas Siswa
	</div>

<table border="1px" class="tabel">
	
    <tr>
      <th scope="col" class="text-center">NO</th>
	  <th scope="col" class="text-center">Id </th>
      <th scope="col" class="text-center">NIS</th>
      <th scope="col" class="text-center">Nama Siswa</th>
	  <th scope="col" class="text-center">Kelas</th>
	  <th scope="col" class="text-center">Tahun Ajaran</th>
	</tr>';
	 
	  $i = 1;
	      
	   
	  if (@$_POST['cetak_data']){ 
			
			$kelas = $_POST['kelas'];
			$thn_ajar = $_POST['thn_ajar'];
		  
		$kelsis = query("select * from tb_kelsis
					INNER JOIN tb_kelas ON tb_kelsis.id_kelas = tb_kelas.id_kelas
					INNER JOIN tb_thn_ajar ON tb_kelsis.id_thn_ajar = tb_thn_ajar.id_thn_ajar
	        		 WHERE  
					 nama_kelas like '%$kelas%' AND
		             nama_thn_ajar like '%$thn_ajar%'");
			
		} else {
			
			$kelsis = query("select * from tb_kelsis
					INNER JOIN tb_kelas ON tb_kelsis.id_kelas = tb_kelas.id_kelas
					INNER JOIN tb_thn_ajar ON tb_kelsis.id_thn_ajar = tb_thn_ajar.id_thn_ajar
					");
	  
	  }
	  
	  
     foreach ($kelsis as $row):  
	$content .= '
	<tr>
	  
	   <td class="text-center">'. $i .'</td>
	  <td class="text-center">'. $row ["id_kelsis"] .'</td>
	  <td class="text-center">'. $row ["nis"] .'</td>
	  <td class="text-center">'. $row ["nama_siswa"] .'</td>
	  <td class="text-center">'. $row ["nama_kelas"] .'</td>
	  <td class="text-center">'. $row ["nama_thn_ajar"] .'</td>
	
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