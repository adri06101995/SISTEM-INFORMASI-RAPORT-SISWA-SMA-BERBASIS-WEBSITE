<?php
require 'functions.php';

// ambil data di url
$nis = $_GET["nis"];

$siswa = query("SELECT * FROM tb_siswa 
		WHERE nis = '$nis'")[0];
							

$nilai = query("SELECT * FROM tb_nilai WHERE nis like '%$nis%'");

			
?>

<div class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			 <div class="box-header">
              <div class="text-center">
				<h1>INPUT NILAI SISWA</h1>
				<hr>
				
<table>
	<tr>
		<th >NIS</th><td>&nbsp: &nbsp </td><td><?= $nis ?></td>
	</tr>
	<tr>
		<th>Nama Siswa</th><td>&nbsp: &nbsp </td><td><?= $siswa["nama_siswa"]; ?></td>
	</tr>
	
</table><br>
  
            </div>
              <a href="?page=nilai&aksi=tambah"><button type="button" class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah Data</button></a>
            </div>
			

            <!-- /.box-header -->
            <div class="table-responsive">
              <table id="dataTables-example" class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col" class="text-center">NO</th>
      <th scope="col" class="text-center">Id Nilai</th>
      <th scope="col" class="text-center">NIS</th>
	  <th scope="col" class="text-center">Nama Siswa</th>
	  <th scope="col" class="text-center">Kelas</th>
	  <th scope="col" class="text-center">Tahun Ajaran</th>
	  <th scope="col" class="text-center">Mapel</th>
	  <th scope="col" class="text-center">Tgs 1</th>
	  <th scope="col" class="text-center">Tgs 2</th>
	  <th scope="col" class="text-center">Tgs 3</th>
	  <th scope="col" class="text-center">UTS</th>
	  <th scope="col" class="text-center">UAS</th>
	  </tr>
  </thead>
  <tbody>
	<?php $i = 1; ?>
    <?php foreach ($nilai as $row): ?>
	<tr>
      <td class="text-center"><?= $i; ?></td>
      <td class="text-center"><?= $row ["id_nilai"]; ?></td>
	  <td class="text-center"><?= $row ["nis"]; ?></td>
	  <td class="text-center"><?= $row ["nama_siswa"]; ?></td>
	  <td class="text-center"><?= $row ["kelas"]; ?></td>
	  <td class="text-center"><?= $row ["tahun_ajaran"]; ?></td>
	  <td class="text-center"><?= $row ["mapel"]; ?></td>
	  <td class="text-center"><?= $row ["tgs1"]; ?></td>
	  <td class="text-center"><?= $row ["tgs2"]; ?></td>
	  <td class="text-center"><?= $row ["tgs3"]; ?></td>
	  <td class="text-center"><?= $row ["uts"]; ?></td>
	  <td class="text-center"><?= $row ["uas"]; ?></td>
	 
	   
	  
    </tr>
	<?php $i++; ?>
	<?php endforeach; ?>
  </tbody>
</table>
 
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.content -->
  </div>

<br>
<br>
