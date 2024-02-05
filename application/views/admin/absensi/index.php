<div class="container">
	<div class="row mt-3 mb-3">
		<div class="col-md-10">
			<figure>
				<blockquote class="blockquote">
					<p>Data Absensi Pegawai</p>
				</blockquote>
				<figcaption class="blockquote-footer">
					Menampilkan data <cite title="Source Title">absensi pegawai</cite>
				</figcaption>
			</figure>
			<table class="table table-striped table-hover">
				<tr>
					<td colspan="6">
						<form  class="row g-2" method="POST" action="<?= base_url('absensi/cetak') ?>">
							<div class="col md-4">
								<label for="namaPegawai" class="form-label">Nama pegawai</label>
								<select class="form-select" aria-label="namaPegawai" id="colFormLabel" name="kode_pegawai">
									<?php foreach($pegawai as $pgw) : ?>
										<option value="<?= $pgw['kode_pegawai']; ?>"><?= $pgw['nama_pegawai']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="col md-4">
								<label for="inputAwal" class="form-label">Dari tanggal</label>
								<input type="date" class="form-control" id="inputAwal" name="awal">
							</div>
							<div class="col md-4">
								<label for="inputAkhir" class="form-label">Sampai tanggal</label>
								<input type="date" class="form-control" id="inputAkhir" name="akhir">
							</div>
							<div class="col-12">
								<button type="submit" name="cetak" class="btn btn-primary" style="width: 100%;">Cetak Data Absensi</button>
							</div>
						</form>
					</td>
				</tr>
			</table>
			<table id="absensi" class="table table-striped table-hover">
				<caption>Tabel absensi pegawai</caption>
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Kode Absensi</th>
						<th class="text-center">Nama Lengkap</th>
						<th class="text-center">Tanggal Absensi</th>
						<th class="text-center">Jam Masuk</th>
						<th class="text-center">Jam Keluar</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$nomor = 1;
					foreach ($absensi as $abs) :
						?>
						<tr>
							<td class="text-center"><?= $nomor++ ?></td>
							<td class="text-center"><?= $abs['kode_absensi'] ?></td>
							<td><?= $abs['nama_pegawai'] ?></td>
							<td class="text-center"><?= $abs['tanggal_absen'] ?></td>
							<td class="text-center"><?= $abs['jam_masuk'] ?></td>
							<td class="text-center"><?= $abs['jam_keluar'] ?></td>
						</tr>
						<?php
					endforeach;
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script>
	$(document).ready( function () {
		$('#absensi').DataTable();
	} );
</script>