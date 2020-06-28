<?php
require 'functions.php';

$mapel = query("SELECT * FROM tb_mapel
		INNER JOIN tb_guru ON tb_mapel.nip = tb_guru.nip
		");
							
			
?>

<div class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			 <div class="box-header">
              <div class="text-center">
				<h1>DATA MATA PELAJARAN</h1>
				<hr>
            </div>
              <a href="?page=mapel&aksi=tambah"><button type="button" class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah Data</button></a>
            </div>
            <!-- /.box-header -->
             <div class="table-responsive">
              <table id="dataTables-example" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col" class="text-center">NO</th>
      <th scope="col" class="text-center">Id Mapel</th>
      <th scope="col" class="text-center">Mata Pelajaran</th>
	  <th scope="col" class="text-center">Guru Pengajar</th>
	  <th scope="col" class="text-center">Aksi</th>
	  </tr>
  </thead>
  <tbody>
	<?php $i = 1; ?>
    <?php foreach ($mapel as $row): ?>
	<tr>
      <td class="text-center"><?= $i; ?></td>
      <td class="text-center"><?= $row ["id_mapel"]; ?></td>
	  <td class="text-center"><?= $row ["nama_mapel"]; ?></td>
	  <td class="text-center"><?= $row ["nama_guru"]; ?></td>
	   
	  <td class="text-center">
		<a href="?page=mapel&aksi=ubah&id_mapel=<?= $row ["id_mapel"]; ?>" class="btn btn-success btn-xs">Ubah<a>
	    <a href="?page=mapel&aksi=hapus&id_mapel=<?= $row ["id_mapel"]; ?>"  onclick=" return confirm('Yakin data ingin dihapus!!!');" class="btn btn-danger btn-xs">hapus<a>
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
