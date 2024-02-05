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
						<p>Data Kepala Seksi</p>
					</blockquote>
					<figcaption class="blockquote-footer">
						Menampilkan data <cite title="Source Title">kepala seksi</cite>
					</figcaption>
				</figure>
				<table class="table table-striped table-hover">
					<caption>Tabel kepala seksi</caption>
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">Nip kasi</th>
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
						foreach ($kasi as $ks) :
							?>
							<tr>
								<td class="text-center"><?= $nomor++ ?></td>
								<td class="text-center"><?= $ks['nip_kasi'] ?></td>
								<td><?= $ks['nama_kasi'] ?></td>
								<td><?= $ks['jabatan_kasi'] ?></td>
								<td><?= $ks['email_kasi'] ?></td>
								<td><?= $ks['telp_kasi'] ?></td>
								<td><?= $ks['jalan_kasi'] ?>, RT<?= $ks['rt_kasi'] ?> RW<?= $ks['rw_kasi'] ?> No.<?= $ks['no_rumah_kasi'] ?>, Kec.<?= $ks['kec_kasi'] ?> Kab/kota.<?= $ks['kota_kasi'] ?>, <?= $ks['kode_pos_kasi'] ?></td>
								<td class="text-center"><?= $ks['status_kasi'] ?></td>
							</tr>
							<?php
						endforeach;
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>