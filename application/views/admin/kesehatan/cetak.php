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
						<p>Data Kesehatan</p>
					</blockquote>
					<figcaption class="blockquote-footer">
						Menampilkan data <cite title="Source Title">kesehatan pegawai</cite>
					</figcaption>
				</figure>
				<table id="kesehatan" class="table table-striped table-hover">
					<caption>Tabel kesehatan pegawai</caption>
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">Nama Lengkap</th>
							<th class="text-center">Tanggal</th>
							<th class="text-center">Pekerjaan</th>
							<th class="text-center">Suhu Tubuh</th>
							<th class="text-center">Hasil Rapid/Swab</th>
							<th class="text-center">Status Vaksinasi</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$nomor = 1;
						foreach ($kesehatan as $ks) :
							?>
							<tr>
								<td class="text-center"><?= $nomor++ ?></td>
								<td><?= $ks['nama_pegawai'] ?></td>
								<td><?= $ks['tgl_input_kesehatan'] ?></td>
								<td><?= $ks['jenis_pekerjaan'] ?></td>
								<td class="text-center"><?= $ks['suhu_tubuh_pegawai'] ?> C</td>
								<td class="text-center"><?= $ks['hasil_swab_pegawai'] ?></td>
								<td class="text-center"><?= $ks['status_vaksinasi_pegawai'] ?></td>
								<?php
							endforeach;
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>