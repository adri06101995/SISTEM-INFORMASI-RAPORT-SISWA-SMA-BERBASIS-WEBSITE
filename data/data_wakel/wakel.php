<?php
require 'functions.php';

$wakel = query("SELECT * FROM tb_wakel");
							
			
?>

<div class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			 <div class="box-header">
              <div class="text-center">
				<h1>DATA WALI KELAS</h1>
				<hr>
            </div>
              <a href="?page=wakel&aksi=tambah"><button type="button" class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah Data</button></a>
            </div>
            <!-- /.box-header -->
            <div class="table-responsive">
              <table id="dataTables-example" class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col" class="text-center">NO</th>
      <th scope="col" class="text-center">Id Walikelas</th>
      <th scope="col" class="text-center">Nama Guruwali</th>
	  <th scope="col" class="text-center">Aksi</th>
	  </tr>
  </thead>
  <tbody>
	<?php $i = 1; ?>
    <?php foreach ($wakel as $row): ?>
	<tr>
      <td class="text-center"><?= $i; ?></td>
      <td class="text-center"><?= $row ["id_walikelas"]; ?></td>
	  <td class="text-center"><?= $row ["nama_guruwali"]; ?></td>
	 
	  <td class="text-center">
		<a href="?page=wakel&aksi=ubah&id_walikelas=<?= $row ["id_walikelas"]; ?>" class="btn btn-success btn-xs">Ubah<a>
	    <a href="?page=wakel&aksi=hapus&id_walikelas=<?= $row ["id_walikelas"]; ?>"  onclick=" return confirm('Yakin data ingin dihapus!!!');" class="btn btn-danger btn-xs">hapus<a>
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
