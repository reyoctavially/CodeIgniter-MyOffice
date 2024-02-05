<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card mb-3">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<p>Edit Profil</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan proses <cite title="Source Title">edit profil</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<?= form_open_multipart('profile/admin_edit'); ?>
					<input type="hidden" name="nip_kasi" value="">
					<div class="row mb-3 mt-3">
						<label for="formFile" class="col-sm-2 col-form-label">Foto</label>
						<div class="col-sm-2">
							<img src="<?= base_url('assets/images/profile/').$login['foto_kasi']; ?>" class="img-thumbnail">
						</div>
						<div class="col">
							<input class="form-control" type="file" id="formFile" name="foto_kasi">
						</div>
					</div>
					<div class="row mb-3 mt-3">
						<label for="colFormLabel" class="col-sm-2 col-form-label">Nama</label>
						<div class="col">
							<input type="text" name="nama_kasi" class="form-control" id="colFormLabel" placeholder="Nama kasi" value="<?= $login['nama_kasi'] ?>">
							<small class="form-text text-danger"><?= form_error('nama_kasi'); ?></small>
						</div>
						<label for="colFormLabel" class="col-sm-2 col-form-label">Nomor telepon</label>
						<div class="col">
							<input type="number" name="telp_kasi" class="form-control" id="colFormLabel" placeholder="Nomor telepon kasi" value="<?= $login['telp_kasi'] ?>">
							<small class="form-text text-danger"><?= form_error('telp_kasi'); ?></small>
						</div>
					</div>
					<div class="row mb-3">
						<label for="colFormLabel" class="col-sm-2 col-form-label">Alamat</label>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Jln</span>
								</div>
								<input type="text" name="jalan_kasi" class="form-control" id="colFormLabel" placeholder="Jalan" value="<?= $login['jalan_kasi'] ?>">
							</div>
							<small class="form-text text-danger"><?= form_error('jalan_kasi'); ?></small>
						</div>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">No</span>
								</div>
								<input type="text" name="no_rumah_kasi" class="form-control" id="colFormLabel" placeholder="Nomor rumah" value="<?= $login['no_rumah_kasi'] ?>">
							</div>
							<small class="form-text text-danger"><?= form_error('no_rumah_kasi'); ?></small>
						</div>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">RT</span>
								</div>
								<input type="text" name="rt_kasi" class="form-control" id="colFormLabel" placeholder="RT" value="<?= $login['rt_kasi'] ?>">
							</div>
							<small class="form-text text-danger"><?= form_error('rt_kasi'); ?></small>
						</div>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">RW</span>
								</div>
								<input type="text" name="rw_kasi" class="form-control" id="colFormLabel" placeholder="RW" value="<?= $login['rw_kasi'] ?>">
							</div>
							<small class="form-text text-danger"><?= form_error('rw_kasi'); ?></small>
						</div>
					</div>
					<div class="row mb-3">
						<label for="colFormLabel" class="col-sm-2 col-form-label"></label>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Kec</span>
								</div>
								<input type="text" name="kec_kasi" class="form-control" id="colFormLabel" placeholder="Kecamatan" value="<?= $login['kec_kasi'] ?>">
							</div>
							<small class="form-text text-danger"><?= form_error('kec_kasi'); ?></small>
						</div>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Kab/kota</span>
								</div>
								<input type="text" name="kota_kasi" class="form-control" id="colFormLabel" placeholder="Kota" value="<?= $login['kota_kasi'] ?>">
							</div>
							<small class="form-text text-danger"><?= form_error('kota_kasi'); ?></small>
						</div>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Kode pos</span>
								</div>
								<input type="number" name="kode_pos_kasi" class="form-control" id="colFormLabel" placeholder="Kode pos" value="<?= $login['kode_pos_kasi'] ?>">
							</div>
							<small class="form-text text-danger"><?= form_error('kode_pos_kasi'); ?></small>
						</div>
					</div>
					<div class="row mb-3">
						<label for="colFormLabel" class="col-sm-2 col-form-label">Akun kasi</label>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Email</span>
								</div>
								<input type="text" name="email_kasi" class="form-control" id="colFormLabel" placeholder="Email" value="<?= $login['email_kasi'] ?>" readonly>
							</div>
							<small class="form-text text-danger"><?= form_error('email_kasi'); ?></small>
						</div>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Password</span>
								</div>
								<input type="password" name="pass_kasi" class="form-control" id="colFormLabel" placeholder="Password" value="<?= $login['pass_kasi'] ?>" readonly>
							</div>
							<small class="form-text text-danger"><?= form_error('pass_kasi'); ?></small>
						</div>
					</div>
					<div class="d-grid gap-2">
						<button type="submit" name="edit" class="btn btn-primary">Perbarui Profil Saya</button>
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>