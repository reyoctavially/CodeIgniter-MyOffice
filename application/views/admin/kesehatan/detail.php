<div class="container">
	<div class="row mt-3">
		<div class="col-md-7">
			<div class="card">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<p>Data Kesehatan Pegawai</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan rincian<cite title="Source Title"> data kesehatan pegawai</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<h5 class="card-title"><?= $kesehatan['nama_pegawai']; ?> | <?= $kesehatan['suhu_tubuh_pegawai']; ?> C</h5>
					<h6 class="card-subtitle mb-2 text-muted"><?= $kesehatan['tgl_input_kesehatan']; ?> | <?= $kesehatan['jenis_pekerjaan']; ?></h6>
					<br />
					<p class="card-text">
						Hasil rapid/swab 14 hari terakhir : <?= $kesehatan['hasil_swab_pegawai'] ?>.
						<br />
						Status vaksinasi : <?= $kesehatan['status_vaksinasi_pegawai']; ?> melakukan vaksin.
					</p>
					<a href="<?= base_url(); ?>kesehatan/admin_index" class="btn btn-primary">Kembali</a>
				</div>
			</div>
		</div>
	</div>
</div>