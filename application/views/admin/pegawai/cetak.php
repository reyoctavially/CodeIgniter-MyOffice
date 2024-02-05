<?php
echo "<script language=javascript>
function printWindow() {
	bV = parseInt(navigator.appVersion);
	if (bV >= 4) window.print();}
	printWindow();
	</script>";	
	?>

	<div class="container">
		<div class="row mt-3">
			<div class="col-md-11">
				<figure>
					<blockquote class="blockquote">
						<p>Data Pegawai</p>
					</blockquote>
					<figcaption class="blockquote-footer">
						Menampilkan data <cite title="Source Title">pegawai</cite>
					</figcaption>
				</figure>
				<table class="table table-striped table-hover">
					<caption>Tabel pegawai</caption>
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">Kode Pegawai</th>
							<th class="text-center">Nama Lengkap</th>
							<th class="text-center">Jabatan</th>
							<th class="text-center">Email</th>
							<th class="text-center">Nomor Telepon</th>
							<th class="text-center">Alamat Lengkap</th>
							<th class="text-center">Status</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$nomor = 1;
						foreach ($pegawai as $pgw) :
							?>
							<tr>
								<td class="text-center"><?= $nomor++ ?></td>
								<td class="text-center"><?= $pgw['kode_pegawai'] ?></td>
								<td><?= $pgw['nama_pegawai'] ?></td>
								<td><?= $pgw['jabatan_pegawai'] ?></td>
								<td><?= $pgw['email_pegawai'] ?></td>
								<td><?= $pgw['telp_pegawai'] ?></td>
								<td><?= $pgw['jalan_pegawai'] ?>, RT<?= $pgw['rt_pegawai'] ?> RW<?= $pgw['rw_pegawai'] ?> No.<?= $pgw['no_rumah_pegawai'] ?>, Kec.<?= $pgw['kec_pegawai'] ?> Kab/kota.<?= $pgw['kota_pegawai'] ?>, <?= $pgw['kode_pos_pegawai'] ?></td>
								<td class="text-center"><?= $pgw['status_pegawai'] ?></td>
							</tr>
							<?php
						endforeach;
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>