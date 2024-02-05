<div class="container">
	<div class="row mt-3">
		<div class="col-md-7">
			<div class="card">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<p>Data Cuti Pegawai</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan rincian<cite title="Source Title"> data cuti saya</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<h5 class="card-title"><?= $cuti['nama_pegawai']; ?> | <?= $cuti['statuscuti']; ?></h5>
					<h6 class="card-subtitle mb-2 text-muted"><?= $cuti['jenis_cuti']; ?></h6>
					<br />
					<p class="card-text">
						Rincian tanggal cuti :
						<br />
						Dimulai pada tanggal <?= $cuti['tglmulaicuti']; ?>, dan selesai pada tanggal <?= $cuti['tglselesaicuti']; ?>.
					</p>
					<p class="card-text">
						Pemotongan honor :
						<br />
						<?= $cuti['pemotongan_honor']; ?>.
					</p>
					<a href="<?= base_url(); ?>cuti/user_index" class="btn btn-primary">Kembali</a>
				</div>
			</div>
		</div>
	</div>
</div>