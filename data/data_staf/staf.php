<?php
require 'functions.php';

$staf = query("SELECT * FROM tb_staf");
							
			
?>

<div class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			 <div class="box-header">
              <div class="text-center">
				<h1>DATA STAF</h1>
				<hr>
            </div>
              <a href="?page=staf&aksi=tambah"><button type="button" class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah Data</button></a>
            </div>
            <!-- /.box-header -->
            <div class="table-responsive">
              <table id="dataTables-example" class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col" class="text-center">NO</th>
      <th scope="col" class="text-center">NIK</th>
      <th scope="col" class="text-center">Nama Lengkap</th>
	  <th scope="col" class="text-center">Username</th>
	  <th scope="col" class="text-center">Password</th>
	  <th scope="col" class="text-center">Level</th>
	  <th scope="col" class="text-center">Tempat_lahir</th>
	  <th scope="col" class="text-center">Tanggal_lahir</th>
	  <th scope="col" class="text-center">Jenis kelamin</th>
	  <th scope="col" class="text-center">Alamat</th>
	  <th scope="col" class="text-center">Agama</th>
	  <th scope="col" class="text-center">No HP</th>
	  <th scope="col" class="text-center">Foto</th>
	  <th scope="col" class="text-center">Aksi</th>
	  </tr>
  </thead>
  <tbody>
	<?php $i = 1; ?>
    <?php foreach ($staf as $row): ?>
	<tr>
      <td class="text-center"><?= $i; ?></td>
      <td class="text-center"><?= $row ["nik"]; ?></td>
	  <td class="text-center"><?= $row ["nama_staf"]; ?></td>
	  <td class="text-center"><?= $row ["username"]; ?></td>
	  <td class="text-center"><?= $row ["password"]; ?></td>
	  <td class="text-center"><?= $row ["level"]; ?></td>
	  <td class="text-center"><?= $row ["tempat_lahir"]; ?></td>
	  <td class="text-center"><?= $row ["tanggal_lahir"]; ?></td>
	  <td class="text-center"><?= $row ["jk"]; ?></td>
	  <td class="text-center"><?= $row ["alamat"]; ?></td>
	  <td class="text-center"><?= $row ["agama"]; ?></td>
	  <td class="text-center"><?= $row ["no_hp"]; ?></td>
	   <td class="text-center"><?= $row ["foto"]; ?></td>
	 
	   
	  <td class="text-center">
		<a href="?page=staf&aksi=ubah&nik=<?= $row ["nik"]; ?>" class="btn btn-success btn-xs">Ubah<a>
	    <a href="?page=staf&aksi=hapus&nik=<?= $row ["nik"]; ?>"  onclick=" return confirm('Yakin data ingin dihapus!!!');" class="btn btn-danger btn-xs">hapus<a>
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
