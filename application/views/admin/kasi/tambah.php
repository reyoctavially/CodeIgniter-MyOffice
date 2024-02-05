<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card mb-3">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<p>Data Kepala Seksi</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan proses <cite title="Source Title">tambah data kepala seksi</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<form class="row g-3" action="" method="POST">
						<div class="row mt-4 mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nip Kasi</label>
							<div class="col">
								<input type="number" name="nip_kasi" class="form-control" id="colFormLabel" placeholder="Nomor induk pegawai" value="<?= set_value('nip_kasi'); ?>">
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama lengkap</label>
							<div class="col">
								<input type="text" name="nama_kasi" class="form-control" id="colFormLabel" placeholder="Nama kasi" value="<?= set_value('nama_kasi'); ?>">
								<small class="form-text text-danger"><?= form_error('nama_kasi'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nomor telepon</label>
							<div class="col">
								<input type="number" name="telp_kasi" class="form-control" id="colFormLabel" placeholder="Nomor telepon kasi" value="<?= set_value('telp_kasi'); ?>">
								<small class="form-text text-danger"><?= form_error('telp_kasi'); ?></small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Jabatan</label>
							<div class="col">
								<select class="form-select" aria-label="Default select example" id="colFormLabel" name="jabatan_kasi">
									<?php foreach($jabatan as $jbt) : ?>
										<option value="<?= $jbt; ?>"><?= $jbt; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Alamat</label>
							<div class="col">
								<input type="text" name="jalan_kasi" class="form-control" id="colFormLabel" placeholder="Jalan" value="<?= set_value('jalan_kasi'); ?>">
								<small class="form-text text-danger"><?= form_error('jalan_kasi'); ?></small>
							</div>
							<div class="col">
								<input type="text" name="no_rumah_kasi" class="form-control" id="colFormLabel" placeholder="Nomor rumah" value="<?= set_value('no_rumah_kasi'); ?>">
								<small class="form-text text-danger"><?= form_error('no_rumah_kasi'); ?></small>
							</div>
							<div class="col">
								<input type="number" name="rt_kasi" class="form-control" id="colFormLabel" placeholder="RT" value="<?= set_value('rt_kasi'); ?>">
								<small class="form-text text-danger"><?= form_error('rt_kasi'); ?></small>
							</div>
							<div class="col">
								<input type="number" name="rw_kasi" class="form-control" id="colFormLabel" placeholder="RW" value="<?= set_value('rw_kasi'); ?>">
								<small class="form-text text-danger"><?= form_error('rw_kasi'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label"></label>
							<div class="col">
								<input type="text" name="kec_kasi" class="form-control" id="colFormLabel" placeholder="Kecamatan" value="<?= set_value('kec_kasi'); ?>">
								<small class="form-text text-danger"><?= form_error('kec_kasi'); ?></small>
							</div>
							<div class="col">
								<input type="text" name="kota_kasi" class="form-control" id="colFormLabel" placeholder="Kab/kota" value="<?= set_value('kota_kasi'); ?>">
								<small class="form-text text-danger"><?= form_error('kota_kasi'); ?></small>
							</div>
							<div class="col">
								<input type="number" name="kode_pos_kasi" class="form-control" id="colFormLabel" placeholder="Kode pos" value="<?= set_value('kode_pos_kasi'); ?>">
								<small class="form-text text-danger"><?= form_error('kode_pos_kasi'); ?></small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Akun</label>
							<div class="col">
								<input type="email" name="email_kasi" class="form-control" id="colFormLabel" placeholder="Alamat email" value="<?= set_value('email_kasi'); ?>">
								<small class="form-text text-danger"><?= form_error('email_kasi'); ?></small>
							</div>
							<div class="col">
								<input type="password" name="pass_kasi" class="form-control" id="colFormLabel" placeholder="Kata sandi">
								<small class="form-text text-danger"><?= form_error('pass_kasi'); ?></small>
							</div>
							<div class="col">
								<input type="password" name="pass_kasi2" class="form-control" id="colFormLabel" placeholder="Ulangi kata sandi">
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Status</label>
							<div class="col">
								<select class="form-select" aria-label="Default select example" id="colFormLabel" name="status_kasi">
									<?php foreach($status as $st) : ?>
										<option value="<?= $st; ?>"><?= $st; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" name="tambah" class="btn btn-primary">Simpan Data Kasi</button>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>
</div>