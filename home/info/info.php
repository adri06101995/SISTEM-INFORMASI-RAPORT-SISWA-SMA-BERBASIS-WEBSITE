<?php
require 'functions.php';

$pengumuman = query("SELECT * FROM tb_pengumuman ORDER BY tgl_pengumuman DESC LIMIT 3");
							
			
?>

<div class="col-xs-8">
<div class="box box-primary">
    <div class="box-header with-border">
	<div class="well">
	<div class="text-center">
	<h2 style="color: lime;">INFORMASI SEKOLAH</h2>
	<hr>
	</div>
	
 <?php foreach ($pengumuman as $row): ?>
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">Di publikasikan pada tanggal. <?= $row ["tgl_pengumuman"]; ?></div>
      <div class="panel-body"><?= $row ["isi_pengumuman"]; ?></div>
    </div>
	</div>
	
	<?php endforeach; ?>
	</div>
	</div>
	</div>
	</div>
	
	    <div class="col-xs-4 text-center">
	   
	<!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">SMA NEGERI 2 DOGIYAI</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box" ><br>
              <li>
			  <img src="img/logo/image.jpeg" alt="logo" width="250" class="img-thumbnail">
			  </li>
			  
			   <li>
			  <img src="img/logo/Image2.jpeg" alt="logo" width="250" class="img-thumbnail">
			  </li><br>
			  
			   <li>
			  <img src="img/logo/Image3.jpeg" alt="logo" width="250" class="img-thumbnail">
			  </li>
                
                
                
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="javascript:void(0)" class="uppercase"></a>
            </div>
            <!-- /.box-footer -->
          </div>
        
  
	
	</div>