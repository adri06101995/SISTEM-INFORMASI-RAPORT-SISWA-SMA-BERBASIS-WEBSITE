<?php
include './database/koneksi.php';

if ($_SESSION['siswa']){
		$user1 = $_SESSION['siswa'];
	}

$siswa = query("SELECT * FROM tb_kelsis
		INNER JOIN tb_kelas ON tb_kelsis.id_kelas = tb_kelas.id_kelas
		INNER JOIN tb_thn_ajar ON tb_kelsis.id_thn_ajar = tb_thn_ajar.id_thn_ajar
		WHERE nis = '$user1'")[0];
		
$user = $siswa['nis'];
$nama = $siswa['nama_siswa'];
$kelas = $siswa['nama_kelas'];
$tahun = $siswa['nama_thn_ajar'];	


?>


<div id="cetakpdf" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"> Cetak Data Nilai Raport</h4>
			</div>
			<div class="modal-body">
				<form action="data/data_raport/laporan_raport.php" method="post" target="_blank">
				<table>
				
				<input type="hidden" name="nis" value="<?= $user1; ?>" >
				<input type="hidden" name="nama" value="<?= $nama; ?>" >
				<input type="hidden" name="kelas" value="<?= $kelas; ?>" >
				<input type="hidden" name="tahun" value="<?= $tahun; ?>" >
				
					<tr>
						<td>
							<div class="form-group">Cetak Berdasarkan</div>
						</td>
						<td align="center" width="5%">
							<div class="form-group">:</div>
						</td>
						<td>
							<div class="form-group">
							<select class="form-control" id="thn_ajar" name="thn_ajar">
							 <option>-- Pilih Tahun Ajaran--</option>
							 <?php
							
							$ambil = mysqli_query($conn, "select * from tb_thn_ajar");
							while ($data = mysqli_fetch_assoc($ambil)){
							echo'<option value="'.$data['nama_thn_ajar'].
							'">'.$data['semester'].'   ||   '.$data['nama_thn_ajar'].'</option>';
							} 
							?>
							</select>
							</div>
						</td>
						<td>
							<div class="form-group">
							<input type="submit" name="cetak_data" class="btn btn-primary btn-sm" value="Cetak" style="margin-left: 8px;">
							</div>
						</td>
					</tr>
					
				</table>

			</div>
			
			</form>
		</div>
	</div>
</div>