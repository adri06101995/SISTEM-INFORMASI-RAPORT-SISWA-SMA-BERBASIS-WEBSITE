<?php
require 'functions.php';

$thnajar = query("SELECT * FROM tb_thn_ajar");
							
			
?>

<div class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			 <div class="box-header">
              <div class="text-center">
				<h1>DATA TAHUN AJARAN</h1>
				<hr>
            </div>
              <a href="?page=thnajar&aksi=tambah"><button type="button" class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah Data</button></a>
            </div>
            <!-- /.box-header -->
             <div class="table-responsive">
              <table id="dataTables-example" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col" class="text-center">NO</th>
      <th scope="col" class="text-center">Id Tahun Ajaran</th>
	  <th scope="col" class="text-center">Semester</th>
      <th scope="col" class="text-center">Tahun Ajaran</th>
	  <th scope="col" class="text-center">Aksi</th>
	  </tr>
  </thead>
  <tbody>
	<?php $i = 1; ?>
    <?php foreach ($thnajar as $row): ?>
	<tr>
      <td class="text-center"><?= $i; ?></td>
      <td class="text-center"><?= $row ["id_thn_ajar"]; ?></td>
	  <td class="text-center"><?= $row ["semester"]; ?></td>
	  <td class="text-center"><?= $row ["nama_thn_ajar"]; ?></td>
	   
	  <td class="text-center">
		<a href="?page=thnajar&aksi=ubah&id_thn_ajar=<?= $row ["id_thn_ajar"]; ?>" class="btn btn-success btn-xs">Ubah<a>
	    <a href="?page=thnajar&aksi=hapus&id_thn_ajar=<?= $row ["id_thn_ajar"]; ?>"  onclick=" return confirm('Yakin data ingin dihapus!!!');" class="btn btn-danger btn-xs">hapus<a>
	  </td>
	  
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
