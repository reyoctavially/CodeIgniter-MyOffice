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
						<p>Data Cuti Pegawai</p>
					</blockquote>
					<figcaption class="blockquote-footer">
						Menampilkan data <cite title="Source Title">cuti pegawai</cite>
					</figcaption>
				</figure>
				<table class="table table-striped table-hover">
					<caption>Tabel cuti pegawai</caption>
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">Kode Cuti</th>
							<th class="text-center">Nama Lengkap</th>
							<th class="text-center">Jenis Cuti</th>
							<th class="text-center">Tanggal Mulai</th>
							<th class="text-center">Tanggal Selesai</th>
							<th class="text-center">Pemotongan Honor</th>
							<th class="text-center">Status Cuti</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$nomor = 1;
						foreach ($cuti as $ct) :
							?>
							<tr>
								<td class="text-center"><?= $nomor++ ?></td>
								<td class="text-center"><?= $ct['kode_cuti'] ?></td>
								<td><?= $ct['nama_pegawai'] ?></td>
								<td><?= $ct['jenis_cuti'] ?></td>
								<td class="text-center"><?= $ct['tglmulaicuti'] ?></td>
								<td class="text-center"><?= $ct['tglselesaicuti'] ?></td>
								<td><?= $ct['pemotongan_honor'] ?></td>
								<td class="text-center"><?= $ct['statuscuti'] ?></td>
							</tr>
							<?php
						endforeach;
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>