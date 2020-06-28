<?php
require 'functions.php';

$kelas = query("SELECT * FROM tb_kelas
			INNER JOIN tb_wakel ON tb_kelas.id_walikelas = tb_wakel.id_walikelas");
							
			
?>

<div class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			 <div class="box-header">
              <div class="text-center">
				<h1>DATA KELAS</h1>
				<hr>
            </div>
              <a href="?page=kelas&aksi=tambah"><button type="button" class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah Data</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTables-example" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col" class="text-center">NO</th>
      <th scope="col" class="text-center">Id Kelas</th>
      <th scope="col" class="text-center">Walikelas</th>
	  <th scope="col" class="text-center">Nama Kelas</th>
	  <th scope="col" class="text-center">Kapasitas</th>
	  <th scope="col" class="text-center">Aksi</th>
	  </tr>
  </thead>
  <tbody>
	<?php $i = 1; ?>
    <?php foreach ($kelas as $row): ?>
	<tr>
      <td class="text-center"><?= $i; ?></td>
      <td class="text-center"><?= $row ["id_kelas"]; ?></td>
	  <td class="text-center"><?= $row ["nama_guruwali"]; ?></td>
	  <td class="text-center"><?= $row ["nama_kelas"]; ?></td>
	  <td class="text-center"><?= $row ["kapasitas"]; ?></td>
	   
	  <td class="text-center">
		<a href="?page=kelas&aksi=ubah&id_kelas=<?= $row ["id_kelas"]; ?>" class="btn btn-success btn-xs">Ubah<a>
	    <a href="?page=kelas&aksi=hapus&id_kelas=<?= $row ["id_kelas"]; ?>"  onclick=" return confirm('Yakin data ingin dihapus!!!');" class="btn btn-danger btn-xs">hapus<a>
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
