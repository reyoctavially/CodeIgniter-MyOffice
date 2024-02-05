<div class="container">

	<?php
	if ($this->session->flashdata('flash') ) :
		?>
		<div class="row mt-3">
			<div class="col-md-6">
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Maaf, tanggal mulai cuti <strong>tidak boleh melebihi</strong> tanggal selesai <?= $this->session->flashdata('flash'); ?>.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php
	if ($this->session->flashdata('flash2') ) :
		?>
		<div class="row mt-3">
			<div class="col-md-6">
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Maaf, tanggal mulai cuti <strong>sudah terlewat</strong>..
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="row mt-3">
		<div class="col">
			<div class="card mb-3">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<p>Data Pengajuan Cuti</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan proses <cite title="Source Title">pengajuan cuti saya</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<form class="row g-3" action="" method="POST">
						<?php
						foreach ($kode as $pc) :
							$split = explode('-', $pc['kode_pengajuan_cuti']);
							$number = str_pad($split[1]+1,3,0, STR_PAD_LEFT);
							$code = "PC-".$number;
						endforeach;
						?>
						<input type="hidden" name="kode_pengajuan_cuti" value="<?= $code ?>">
						<input type="hidden" name="kode_pegawai" value="<?= $pengajuancuti['kode_pegawai']; ?>">
						<input type="hidden" name="nip_kasi" value="<?= $pengajuancuti['nip_kasi']; ?>">
						<div class="row mb-3 mt-4">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama pegawai</label>
							<div class="col">
								<input type="rext" name="tgl_mulai" class="form-control" id="colFormLabel" value="<?= $pengajuancuti['nama_pegawai']; ?>" readonly>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama kepala seksi</label>
							<div class="col">
								<input type="text" name="tgl_selesai" class="form-control" id="colFormLabel" value="<?= $pengajuancuti['nama_kasi']; ?>" readonly>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Tanggal mulai</label>
							<div class="col">
								<input type="date" name="tgl_mulai_cuti" class="form-control" id="colFormLabel" placeholder="Tanggal mulai cuti" value="<?= set_value('tgl_mulai_cuti'); ?>">
								<small class="form-text text-danger"><?= form_error('tgl_mulai_cuti'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Tanggal selesai</label>
							<div class="col">
								<input type="date" name="tgl_selesai_cuti" class="form-control" id="colFormLabel" placeholder="Tanggal selesai cuti" value="<?= set_value('tgl_selesai_cuti'); ?>">
								<small class="form-text text-danger"><?= form_error('tgl_selesai_cuti'); ?></small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Alasan pengajuan</label>
							<div class="col">
								<input type="text" name="alasan_pengajuan_cuti" class="form-control" id="colFormLabel" placeholder="Alasan pengajuan cuti" value="<?= set_value('alasan_pengajuan'); ?>">
								<small class="form-text text-danger"><?= form_error('alasan_pengajuan_cuti'); ?></small>
							</div>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" name="tambah" class="btn btn-primary">Ajukan Cuti</button>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>
</div>