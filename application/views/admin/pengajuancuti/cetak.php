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
			<div class="col-md-11">
				<figure>
					<blockquote class="blockquote">
						<p>Data Pengajuan Cuti Pegawai</p>
					</blockquote>
					<figcaption class="blockquote-footer">
						Menampilkan data <cite title="Source Title">pengajuan cuti pegawai</cite>
					</figcaption>
				</figure>
				<table class="table table-striped table-hover">
					<caption>Tabel pengajuan cuti pegawai</caption>
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">Kode Pengajuan</th>
							<th class="text-center">Nama Lengkap</th>
							<th class="text-center">Tanggal Pengajuan</th>
							<th class="text-center">Tanggal Mulai Cuti</th>
							<th class="text-center">Tanggal Selesai Cuti</th>
							<th class="text-center">Alasan Pengajuan</th>
							<th class="text-center">Status Pengajuan</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$nomor = 1;
						foreach ($pengajuancuti as $ct) :
							?>
							<tr>
								<td class="text-center"><?= $nomor++ ?></td>
								<td class="text-center"><?= $ct['kode_pengajuan_cuti'] ?></td>
								<td><?= $ct['nama_pegawai'] ?></td>
								<td class="text-center"><?= $ct['tgl_pengajuan_cuti'] ?></td>
								<td class="text-center"><?= $ct['tgl_mulai_cuti'] ?></td>
								<td class="text-center"><?= $ct['tgl_selesai_cuti'] ?></td>
								<td><?= $ct['alasan_pengajuan_cuti'] ?></td>
								<td class="text-center"><?= $ct['status_pengajuan_cuti'] ?></td>
							</tr>
							<?php
						endforeach;
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>