<?php
require 'functions.php';

$siswa = query("SELECT * FROM tb_siswa");
							
			
?>

<div class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			 <div class="box-header">
              <div class="text-center">
				<h1>DATA SISWA</h1>
				<hr>
            </div>
   
            </div>
            <!-- /.box-header -->
            <div class="table-responsive">
              <table id="dataTables-example" class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col" class="text-center">NO</th>
      <th scope="col" class="text-center">NIS</th>
      <th scope="col" class="text-center">Nama Siswa</th>
	  <th scope="col" class="text-center">Username</th>
	  <th scope="col" class="text-center">Password</th>
	  <th scope="col" class="text-center">No_Ortu</th>
	  <th scope="col" class="text-center">Alamat</th>
	  <th scope="col" class="text-center">Jk</th>
	  <th scope="col" class="text-center">Tempat_lahir</th>
	  <th scope="col" class="text-center">Tanggal_lahir</th>
	  <th scope="col" class="text-center">Agama</th>
	
	  </tr>
  </thead>
  <tbody>
	<?php $i = 1; ?>
    <?php foreach ($siswa as $row): ?>
	<tr>
      <td class="text-center"><?= $i; ?></td>
      <td class="text-center"><?= $row ["nis"]; ?></td>
	  <td class="text-center"><?= $row ["nama_siswa"]; ?></td>
	  <td class="text-center"><?= $row ["username"]; ?></td>
	  <td class="text-center"><?= $row ["password"]; ?></td>
	  <td class="text-center"><?= $row ["no_hp_ortu"]; ?></td>
	  <td class="text-center"><?= $row ["alamat"]; ?></td>
	  <td class="text-center"><?= $row ["jk"]; ?></td>
	  <td class="text-center"><?= $row ["tempat_lahir"]; ?></td>
	  <td class="text-center"><?= $row ["tanggal_lahir"]; ?></td>
	  <td class="text-center"><?= $row ["agama"]; ?></td>
	  
    </tr>
	<?php $i++; ?>
	<?php endforeach; ?>
  </tbody>
</table>
 
            <!-- /.box-body -->
          </div>
		   <a class="btn btn-default" data-toggle="modal" data-target="#cetaksiswa" style="margin-top: 8px;"><i class="fa fa-print"> </i> ExportToPDF</a>

		<?php
		include "modal_siswa.php";
		?>
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
