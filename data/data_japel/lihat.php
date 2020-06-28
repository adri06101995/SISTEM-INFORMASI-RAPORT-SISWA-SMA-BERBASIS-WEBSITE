<?php
require 'functions.php';


// ambil data di url
$id_japel = $_GET["id_japel"];


//query data akun berdasarkan akun
$japel = query("SELECT * FROM tb_japel WHERE id_japel = '$id_japel'")[0];


	//$file = $sk_rektor["file"];
	//var_dump($file); die;
	//$filename = "img/sk/$file";
	//$file = "../../img/sk/5b7705341858a.pdf";
	//$filename = "../../img/sk/5b7705341858a.pdf";
	
	//header('Content-type: application/pdf');
	//header('Content-Disposotion: inline; filename="'. $filename . '"');
	//header('Content-Transfer-Encoding: binary');
	//header('Accept-Ranges: byte');
	//@readfile($file);
	
?>

<html>
<body>


 <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="img/jadwal/<?php echo $japel ["file"]; ?>"></iframe>
  </div>

</body>
</html>