<div class="container" style="margin-top: 50px">
	<div class="row">
		<div class="card mb-3" style="max-width: 540px;">
			<div class="card-header">
				<figure>
					<blockquote class="blockquote">
						<p>Data Pegawai</p>
					</blockquote>
					<figcaption class="blockquote-footer">
						Menampilkan rincian<cite title="Source Title"> data pegawai</cite>
					</figcaption>
				</figure>
			</div>
			<div class="row g-0">
				<div class="col-md-4">
					<img src="<?= base_url('assets/images/profile/').$pegawai['foto_pegawai']; ?>" class="card-img mt-3">
					<hr>
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<h5 class="card-title"><?= $pegawai['nama_pegawai'] ?></h5>
						<h6 class="card-subtitle mb-2 text-muted"><?= $pegawai['jabatan_pegawai']; ?></h6>
						<p class="card-text">
							<?= $pegawai['email_pegawai'] ?> | <?= $pegawai['telp_pegawai'] ?>
						</p>
						<p class="card-text">
							Alamat : 
							<br/>
							<?= $pegawai['jalan_pegawai'] ?>, RT<?= $pegawai['rt_pegawai'] ?> RW<?= $pegawai['rw_pegawai'] ?> No.<?= $pegawai['no_rumah_pegawai'] ?>, Kec.<?= $pegawai['kec_pegawai'] ?> Kab/kota.<?= $pegawai['kota_pegawai'] ?>, <?= $pegawai['kode_pos_pegawai'] ?>
						</p>
						<hr>
						<p class="card-text">
							<small class="text-muted">Status : <?= $pegawai['status_pegawai'] ?></small>
							<br/>
							<small class="text-muted">bergabung sejak : <?= date('d F Y', $pegawai['date_created']); ?></small>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>