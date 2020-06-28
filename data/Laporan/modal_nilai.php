<?php
include './database/koneksi.php';

?>


<div id="cetaknilai" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"> Cetak Data Nilai Siswa</h4>
			</div>
			<div class="modal-body">
				<form action="data/Laporan/laporan_nilai.php" method="post" target="_blank">
				<table>
				
					<tr>
						<td>
							<div class="form-group">Cetak Berdasarkan</div>
						</td>
						<td align="center" width="5%">
							<div class="form-group">:</div>
						</td>
						<td>
							<div class="form-group">
							<select class="form-control" id="kelas" name="kelas">
							 <option>-- Pilih Kelas--</option>
							 <?php
							
							$ambil = mysqli_query($conn, "select * from tb_kelas");
							while ($data = mysqli_fetch_assoc($ambil)){
							echo'<option value="'.$data['nama_kelas'].
							'">'.$data['nama_kelas'].'</option>';
							} 
							?>
							</select>
							</div>
						</td>
						<td>
						&nbsp;&nbsp;
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
			<div class="modal-footer">
				<a href="data/Laporan/laporan_nilai.php" target="_blank" class="btn btn-primary btn-sm">Cetak Semua Data</a>
			</div>
			</form>
		</div>
	</div>
</div>