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

.tabel1 td { font-size:12;}


</style>
';	

$content .= '
<page>
	<div style="padding:4mm; border:0px solid;" align="center">
		<span style="font-size:25px;">SMA NEGERI 2 DOGIYAI</span><br/>
		<span style="font-size:15px;">Kecamatan Mapia, Kabupaten Dogiyai, Provinsi Papua</span><br/>
		<span style="font-size:12px;">Jln. Trans Papua Nabire-Enarotali Km. 184</span>
	</div>
	<hr>
	<div style="padding:4mm; border:0px solid;" align="center">
	<h1> RAPORT SISWA </h1>
	</div>
	<table class="tabel1">
	<tr>
		<td><b>NIS</b></td><td>:</td><td>'.$_POST["nis"].'</td>
	</tr>
	<tr>
		<td><b>Nama</b></td><td>:</td><td>'.$_POST["nama"].'</td>
	</tr>
	<tr>
		<td><b>Kelas</b></td><td>:</td><td>'.$_POST["kelas"].'</td>
	</tr>
	<tr>
		<td><b>Tahun Ajaran</b></td><td>:</td><td>'.$_POST["tahun"].'</td>
	</tr>
</table><br>

<table border="1px" class="tabel">
	
    <tr>
      <th scope="col" class="text-center">NO</th>
      <th scope="col" class="text-center">ID_Nilai</th>
      <th scope="col" class="text-center">Nis</th>
	  <th scope="col" class="text-center">Nama Siswa</th>
	  <th scope="col" class="text-center">Kelas</th>
	  <th scope="col" class="text-center">Tahun Ajaran</th>
	  <th scope="col" class="text-center">Mata Pelajaran</th>
	  <th scope="col" class="text-center">Tgs 1</th>
	  <th scope="col" class="text-center">Tgs 2</th>
	  <th scope="col" class="text-center">Tgs 3</th>
	  <th scope="col" class="text-center">UTS</th>
	  <th scope="col" class="text-center">UAS</th>
	  <th scope="col" class="text-center">Nilai Rata-rata</th>
	</tr>';
	 
	 $i = 1;	
		
		 $nama = $_POST['nama'];
		 $thn_ajar = $_POST['thn_ajar'];

         $nilai = mysqli_query($conn, "SELECT * FROM tb_nilai
			INNER JOIN tb_siswa ON tb_nilai.nis = tb_siswa.nis
			INNER JOIN tb_kelas ON tb_nilai.id_kelas = tb_kelas.id_kelas
			WHERE
			nama_siswa like '%$nama%' AND
			tahun_ajaran like '%$thn_ajar%'");
			
			while ($tampil = mysqli_fetch_assoc($nilai)) {
		$jumlah = mysqli_num_rows($nilai);
		}
	 
	$total = 0; 
    foreach ($nilai as $row):
	$content .= '
	<tr>
	  
	<td>'.$i.'</td>
	<td align="center" width="5">'.$row ["id_nilai"].'</td>
	<td align="center" width="35">'.$row ["nis"].'</td>
	<td align="left" width="5">'.$row ["nama_siswa"].'</td>
	<td align="center" width="15">'.$row ["nama_kelas"].'</td>
	<td align="center" width="5">'.$row ["tahun_ajaran"].'</td>
	<td align="center" width="55">'.$row ["mapel"].'</td>
	<td align="center" width="5">'.$row ["tgs1"].'</td>
	<td align="center" width="5">'.$row ["tgs2"].'</td>
	<td align="center" width="5">'.$row ["tgs3"].'</td>
	<td align="center" width="5">'.$row ["uts"].'</td>
	<td align="center" width="5">'.$row ["uas"].'</td>
	<td align="center" width="5">'.number_format($row ["rata"], 0, ',', '.').'</td>
	
	
	
    </tr>';
	$i++;
	$total += $row["rata"];
	endforeach;
	

	
	$rat = number_format($total, 0, ',', '.');
	$rata = $rat / $jumlah;

$content .='
<tr>
		<td align="center" colspan="12">Nilai Rata-rata</td>
		<td align="center">' . $rata . '</td>
	 </tr>
</table><br><br><br>

<table class="tabel">
	<tr>
		<td align="center" width="350">Dogiyai, .... ........... '.date("Y").'<br>Walikelas</td><td align="center" width="350">Mengetahui: <br>Orang Tua/Wali</td>
	</tr>
</table><br><br>

<table class="tabel">
	<tr>
		<td align="center" width="350"><u>........................................</u></td>
		<td align="center" width="350"><u>........................................</u></td>
	</tr>
</table>


</page>';

require_once('../../build/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('p','A4','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('exemple.pdf');
?>