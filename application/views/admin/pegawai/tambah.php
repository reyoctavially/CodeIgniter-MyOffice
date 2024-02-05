<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card mb-3">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<p>Data Pegawai</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan proses <cite title="Source Title">tambah data pegawai</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<form class="row g-3" action="" method="POST">
						<?php
						foreach ($pegawai as $pgw) :
							$split = explode('-', $pgw['kode_pegawai']);
							$number = str_pad($split[1]+1,3,0, STR_PAD_LEFT);
							$code = "PG-".$number;
						endforeach;
						?>
						<input type="hidden" name="kode_pegawai" value="<?= $code ?>">
						<div class="row mb-3 mt-4">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama lengkap</label>
							<div class="col">
								<input type="text" name="nama_pegawai" class="form-control" id="colFormLabel" placeholder="Nama pegawai" value="<?= set_value('nama_pegawai'); ?>">
								<small class="form-text text-danger"><?= form_error('nama_pegawai'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nomor telepon</label>
							<div class="col">
								<input type="number" name="telp_pegawai" class="form-control" id="colFormLabel" placeholder="Nomor telepon pegawai" value="<?= set_value('telp_pegawai'); ?>">
								<small class="form-text text-danger"><?= form_error('telp_pegawai'); ?></small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Jabatan</label>
							<div class="col">
								<select class="form-select" aria-label="Default select example" id="colFormLabel" name="jabatan_pegawai">
									<?php foreach($jabatan as $jbt) : ?>
										<option value="<?= $jbt; ?>"><?= $jbt; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Kepala seksi</label>
							<div class="col">
								<select class="form-select" aria-label="Default select example" id="colFormLabel" name="nip_kasi">
									<?php foreach($kasi as $ks) : ?>
										<option value="<?= $ks['nip_kasi']; ?>"><?= $ks['nama_kasi']; ?></option>
									<?php endforeach; ?>
								</select>
								<small class="form-text text-danger"><?= form_error('nip_kasi'); ?></small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Alamat</label>
							<div class="col">
								<input type="text" name="jalan_pegawai" class="form-control" id="colFormLabel" placeholder="Jalan" value="<?= set_value('jalan_pegawai'); ?>">
								<small class="form-text text-danger"><?= form_error('jalan_pegawai'); ?></small>
							</div>
							<div class="col">
								<input type="text" name="no_rumah_pegawai" class="form-control" id="colFormLabel" placeholder="Nomor rumah" value="<?= set_value('no_rumah_pegawai'); ?>">
								<small class="form-text text-danger"><?= form_error('no_rumah_pegawai'); ?></small>
							</div>
							<div class="col">
								<input type="number" name="rt_pegawai" class="form-control" id="colFormLabel" placeholder="RT" value="<?= set_value('rt_pegawai'); ?>">
								<small class="form-text text-danger"><?= form_error('rt_pegawai'); ?></small>
							</div>
							<div class="col">
								<input type="number" name="rw_pegawai" class="form-control" id="colFormLabel" placeholder="RW" value="<?= set_value('rw_pegawai'); ?>">
								<small class="form-text text-danger"><?= form_error('rw_pegawai'); ?></small>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label"></label>
							<div class="col">
								<input type="text" name="kec_pegawai" class="form-control" id="colFormLabel" placeholder="Kecamatan" value="<?= set_value('kec_pegawai'); ?>">
								<small class="form-text text-danger"><?= form_error('kec_pegawai'); ?></small>
							</div>
							<div class="col">
								<input type="text" name="kota_pegawai" class="form-control" id="colFormLabel" placeholder="Kab/kota" value="<?= set_value('kota_pegawai'); ?>">
								<small class="form-text text-danger"><?= form_error('kota_pegawai'); ?></small>
							</div>
							<div class="col">
								<input type="number" name="kode_pos_pegawai" class="form-control" id="colFormLabel" placeholder="Kode pos" value="<?= set_value('kode_pos_pegawai'); ?>">
								<small class="form-text text-danger"><?= form_error('kode_pos_pegawai'); ?></small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Akun pegawai</label>
							<div class="col">
								<input type="email" name="email_pegawai" class="form-control" id="colFormLabel" placeholder="Alamat email" value="<?= set_value('email_pegawai'); ?>">
								<small class="form-text text-danger"><?= form_error('email_pegawai'); ?></small>
							</div>
							<div class="col">
								<input type="password" name="pass_pegawai" class="form-control" id="colFormLabel" placeholder="Kata sandi">
								<small class="form-text text-danger"><?= form_error('pass_pegawai'); ?></small>
							</div>
							<div class="col">
								<input type="password" name="pass_pegawai2" class="form-control" id="colFormLabel" placeholder="Ulangi kata sandi">
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Status</label>
							<div class="col">
								<select class="form-select" aria-label="Default select example" id="colFormLabel" name="status_pegawai">
									<?php foreach($status as $st) : ?>
										<option value="<?= $st; ?>"><?= $st; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" name="tambah" class="btn btn-primary">Simpan Data Pegawai</button>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>
</div>