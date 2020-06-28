<?php
require 'functions.php';


// ambil data di url
$id_materi = $_GET["id_materi"];


//query data akun berdasarkan akun
$materi = query("SELECT * FROM tb_materi WHERE id_materi = '$id_materi'")[0];


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
    <iframe class="embed-responsive-item" src="img/materi/<?php echo $materi["file"]; ?>"></iframe>
  </div>

</body>
</html>