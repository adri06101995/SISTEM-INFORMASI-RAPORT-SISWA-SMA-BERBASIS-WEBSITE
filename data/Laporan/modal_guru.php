<?php
include './database/koneksi.php';

?>


<div id="cetakguru" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"> Cetak Data Guru</h4>
			</div>
			<div class="modal-body">
				<form action="data/Laporan/laporan_guru.php" method="post" target="_blank">
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
							<input type="text" class="form-control" name="kategori" autocomplete="off">
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
				<a href="data/Laporan/laporan_guru.php" target="_blank" class="btn btn-primary btn-sm">Cetak Semua Data</a>
			</div>
			</form>
		</div>
	</div>
</div>