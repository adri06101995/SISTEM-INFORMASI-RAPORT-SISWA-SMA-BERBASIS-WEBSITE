<?php
require 'functions.php';

$materi = query("SELECT * FROM tb_materi
		INNER JOIN tb_mapel ON tb_materi.id_mapel = tb_mapel.id_mapel	
		");
							
			
?>

<div class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			 <div class="box-header">
              <div class="text-center">
				<h1>MATERI PELAJARAN</h1>
				<hr>
            </div>
              
            </div>
            <!-- /.box-header -->
             <div class="table-responsive">
              <table id="dataTables-example" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col" class="text-center">NO</th>
      <th scope="col" class="text-center">Id materi</th>
      <th scope="col" class="text-center">Mata Pelajaran</th>
	  <th scope="col" class="text-center">File</th>
	  <th scope="col" class="text-center">Aksi</th>
	  </tr>
  </thead>
  <tbody>
	<?php $i = 1; ?>
    <?php foreach ($materi as $row): ?>
	<tr>
      <td class="text-center"><?= $i; ?></td>
      <td class="text-center"><?= $row ["id_materi"]; ?></td>
	  <td class="text-center"><?= $row ["nama_mapel"]; ?></td>
	  <td class="text-center"><?= $row ["file"]; ?></td>
	   
	  <td class="text-center">
		<a href="?page=materi&aksi=lihat&id_materi=<?= $row ["id_materi"]; ?>" class="btn btn-primary btn-xs">Download<a>

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
