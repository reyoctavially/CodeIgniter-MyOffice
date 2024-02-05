<div class="container">
	<div class="row mt-3">
		<div class="col-md-7">
			<div class="card">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<p>Data Pegawai</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan rincian<cite title="Source Title"> data pengajuan cuti pegawai</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<h5 class="card-title"><?= $pengajuancuti['nama_pegawai']; ?> | <?= $pengajuancuti['status_pengajuan_cuti']; ?></h5>
					<h6 class="card-subtitle mb-2 text-muted"><?= $pengajuancuti['ket_pengajuan_cuti']; ?></h6>
					<br />
					<p class="card-text">
						Rincian tanggal cuti :
						<br />
						Diajukan pada tanggal <?= $pengajuancuti['tgl_pengajuan_cuti'] ?>.
						<br />
						Dimulai pada tanggal <?= $pengajuancuti['tgl_mulai_cuti']; ?>, dan selesai pada tanggal <?= $pengajuancuti['tgl_selesai_cuti']; ?>.
					</p>
					<p class="card-text">
						Alasan pengajuan cuti :
						<br />
						<?= $pengajuancuti['alasan_pengajuan_cuti']; ?>.
					</p>
					<a href="<?= base_url(); ?>pengajuancuti/admin_index" class="btn btn-primary">Kembali</a>
				</div>
			</div>
		</div>
	</div>
</div>