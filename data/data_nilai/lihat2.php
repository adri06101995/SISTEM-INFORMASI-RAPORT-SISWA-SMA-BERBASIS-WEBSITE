<?php
require 'functions.php';



	
	
	$nilai = query("SELECT * FROM tb_nilai
			INNER JOIN tb_kelas ON tb_nilai.id_kelas = tb_kelas.id_kelas
			INNER JOIN tb_kelsis ON tb_nilai.nis = tb_kelsis.nis");
			

	

?>





<div class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			 <div class="box-header">
              <div class="text-center">
				<h1>NILAI SISWA</h1>
				<hr>
				
  
            </div>
           
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
	  <th scope="col" class="text-center">Nilai Rata-rata</th>
	  <th scope="col" class="text-center">Aksi</th>
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
	  <td class="text-center"><?= $row ["nama_kelas"]; ?></td>
	  <td class="text-center"><?= $row ["tahun_ajaran"]; ?></td>
	  <td class="text-center"><?= $row ["mapel"]; ?></td>
	  <td class="text-center"><?= $row ["tgs1"]; ?></td>
	  <td class="text-center"><?= $row ["tgs2"]; ?></td>
	  <td class="text-center"><?= $row ["tgs3"]; ?></td>
	  <td class="text-center"><?= $row ["uts"]; ?></td>
	  <td class="text-center"><?= $row ["uas"]; ?></td>
	  <td class="text-center"><?= $row ["rata"]; ?></td>
	  <td class="text-center">
		<a href="?page=nilai&aksi=ubah&id_nilai=<?= $row ["id_nilai"]; ?>" class="btn btn-success btn-xs">Ubah<a>
	    <a href="?page=nilai&aksi=hapus&id_nilai=<?= $row ["id_nilai"]; ?>"  onclick=" return confirm('Yakin data ingin dihapus!!!');" class="btn btn-danger btn-xs">hapus<a>
	  </td>
	 
	   
	  
    </tr>
	<?php $i++; ?>
	<?php endforeach; ?>
  </tbody>
</table>


 
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  <a class="btn btn-default" data-toggle="modal" data-target="#cetakpdf" style="margin-top: 8px;"><i class="fa fa-print"> </i> ExportToPDF</a>

		<?php
		include "modal_cetakpdf2.php";
		?>
        </div>
		
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.content -->
  </div>
 

<br>
<br>
