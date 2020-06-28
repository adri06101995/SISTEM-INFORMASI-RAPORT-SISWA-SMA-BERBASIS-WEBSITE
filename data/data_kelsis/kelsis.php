<?php
require 'functions.php';

$kelsis = query("select * from tb_kelsis
			INNER JOIN tb_kelas ON tb_kelsis.id_kelas = tb_kelas.id_kelas
			INNER JOIN tb_thn_ajar ON tb_kelsis.id_thn_ajar = tb_thn_ajar.id_thn_ajar
			");

?>

<div class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			 <div class="box-header">
              <div class="text-center">
				<h1>DATA KELAS SISWA</h1>
				<hr>
            </div>
              <a href="?page=kelsis&aksi=tambah"><button type="button" class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah Data</button></a>
            </div>
            <!-- /.box-header -->
             <div class="table-responsive">
              <table id="dataTables-example" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col" class="text-center">NO</th>
	  <th scope="col" class="text-center">Id </th>
      <th scope="col" class="text-center">NIS</th>
      <th scope="col" class="text-center">Nama Siswa</th>
	   <th scope="col" class="text-center">Kelas</th>
	  <th scope="col" class="text-center">Tahun Ajaran</th>
	  <th scope="col" class="text-center">Aksi</th>
	  </tr>
  </thead>
  <tbody>
	<?php $i = 1; ?>
    <?php foreach ($kelsis as $row): ?>
	<tr>
      <td class="text-center"><?= $i; ?></td>
      <td class="text-center"><?= $row ["id_kelsis"]; ?></td>
	  <td class="text-center"><?= $row ["nis"]; ?></td>
	  <td class="text-center"><?= $row ["nama_siswa"]; ?></td>
	  <td class="text-center"><?= $row ["nama_kelas"]; ?></td>
	  <td class="text-center"><?= $row ["nama_thn_ajar"]; ?></td>
	  <td class="text-center">
	  
		<a href="?page=kelsis&aksi=ubah&id_kelsis=<?= $row ["id_kelsis"]; ?>" class="btn btn-primary btn-xs" >Ubah<a>
		
		
		<a href="?page=kelsis&aksi=hapus&id_kelsis=<?= $row ["id_kelsis"]; ?>"  onclick=" return confirm('Yakin data ingin dihapus!!!');" class="btn btn-danger btn-xs">hapus<a>
	  </td>
    </tr>
	<?php $i++; ?>
	<?php endforeach; ?>
  </tbody>
</table>
</div>

