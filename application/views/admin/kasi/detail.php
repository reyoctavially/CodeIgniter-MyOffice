<div class="container" style="margin-top: 50px">

	<div class="row">
		<div class="card mb-3" style="max-width: 540px;">
			<div class="card-header">
				<figure>
					<blockquote class="blockquote">
						<p>Data Kepala Seksi</p>
					</blockquote>
					<figcaption class="blockquote-footer">
						Menampilkan rincian<cite title="Source Title"> data kepala seksi</cite>
					</figcaption>
				</figure>
			</div>
			<div class="row g-0">
				<div class="col-md-4">
					<img src="<?= base_url('assets/images/profile/').$kasi['foto_kasi']; ?>" class="card-img mt-3">
					<hr>
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<h5 class="card-title"><?= $kasi['nama_kasi'] ?></h5>
						<h6 class="card-subtitle mb-2 text-muted"><?= $kasi['nip_kasi']; ?></h6>
						<h6 class="card-subtitle mb-2 text-muted"><?= $kasi['jabatan_kasi'] ?></h6>
						<p class="card-text">
							<?= $kasi['email_kasi'] ?> | <?= $kasi['telp_kasi'] ?>
						</p>
						<p class="card-text">
							Alamat : 
							<br/>
							<?= $kasi['jalan_kasi'] ?>, RT<?= $kasi['rt_kasi'] ?> RW<?= $kasi['rw_kasi'] ?> No.<?= $kasi['no_rumah_kasi'] ?>, Kec.<?= $kasi['kec_kasi'] ?> Kab/kota.<?= $kasi['kota_kasi'] ?>, <?= $kasi['kode_pos_kasi'] ?>
						</p>
						<hr>
						<p class="card-text">
							<small class="text-muted">Status : <?= $kasi['status_kasi'] ?></small>
							<br/>
							<small class="text-muted">bergabung sejak : <?= date('d F Y', $kasi['date_created']); ?></small>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>