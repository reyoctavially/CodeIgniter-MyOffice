<?php
echo "<script language=javascript>
function printWindow() {
	bV = parseInt(navigator.appVersion);
	if (bV >= 4) window.print();}
	printWindow();
	</script>";	
	?>

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