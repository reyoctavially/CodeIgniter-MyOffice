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
							Menampilkan proses <cite title="Source Title">edit data kepala seksi</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<form class="row g-3" action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="nip_kasi" value="<?= $kasi['nip_kasi'] ?>">
						<div class="row mb-3 mt-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama</label>
							<div class="col">
								<input type="text" name="nama_kasi" class="form-control" id="colFormLabel" placeholder="Nama kasi" value="<?= $kasi['nama_kasi'] ?>" readonly>
								<small class="form-text text-danger"><?= form_error('nama_kasi'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nomor telepon</label>
							<div class="col">
								<input type="number" name="telp_kasi" class="form-control" id="colFormLabel" placeholder="Nomor telepon kasi" value="<?= $kasi['telp_kasi'] ?>" readonly>
								<small class="form-text text-danger"><?= form_error('telp_kasi'); ?></small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Jabatan</label>
							<div class="col">
								<select class="form-select" aria-label="Default select example" id="colFormLabel" name="jabatan_kasi">
									<?php foreach($jabatan as $jbt) : ?>
										<?php if($jbt == $kasi['jabatan_kasi']) : ?>
											<option value="<?= $jbt; ?>" selected><?= $jbt; ?></option>
											<?php else : ?>
												<option value="<?= $jbt; ?>"><?= $jbt; ?></option>
											<?php  endif; ?>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

							<div class="row mb-3">
								<label for="colFormLabel" class="col-sm-2 col-form-label">Alamat</label>
								<div class="col">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Jln</span>
										</div>
										<input type="text" name="jalan_kasi" class="form-control" id="colFormLabel" placeholder="Jalan" value="<?= $kasi['jalan_kasi'] ?>" readonly>
									</div>
									<small class="form-text text-danger"><?= form_error('jalan_kasi'); ?></small>
								</div>
								<div class="col">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">No</span>
										</div>
										<input type="text" name="no_rumah_kasi" class="form-control" id="colFormLabel" placeholder="Nomor rumah" value="<?= $kasi['no_rumah_kasi'] ?>" readonly>
									</div>
									<small class="form-text text-danger"><?= form_error('no_rumah_kasi'); ?></small>
								</div>
								<div class="col">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">RT</span>
										</div>
										<input type="text" name="rt_kasi" class="form-control" id="colFormLabel" placeholder="RT" value="<?= $kasi['rt_kasi'] ?>" readonly>
									</div>
									<small class="form-text text-danger"><?= form_error('rt_kasi'); ?></small>
								</div>
								<div class="col">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">RW</span>
										</div>
										<input type="text" name="rw_kasi" class="form-control" id="colFormLabel" placeholder="RW" value="<?= $kasi['rw_kasi'] ?>" readonly>
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
										<input type="text" name="kec_kasi" class="form-control" id="colFormLabel" placeholder="Kecamatan" value="<?= $kasi['kec_kasi'] ?>" readonly>
									</div>
									<small class="form-text text-danger"><?= form_error('kec_kasi'); ?></small>
								</div>
								<div class="col">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Kab/kota</span>
										</div>
										<input type="text" name="kota_kasi" class="form-control" id="colFormLabel" placeholder="Kota" value="<?= $kasi['kota_kasi'] ?>" readonly>
									</div>
									<small class="form-text text-danger"><?= form_error('kota_kasi'); ?></small>
								</div>
								<div class="col">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Kode pos</span>
										</div>
										<input type="number" name="kode_pos_kasi" class="form-control" id="colFormLabel" placeholder="Kode pos" value="<?= $kasi['kode_pos_kasi'] ?>" readonly>
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
										<input type="text" name="email_kasi" class="form-control" id="colFormLabel" placeholder="Email" value="<?= $kasi['email_kasi'] ?>" readonly>
									</div>
									<small class="form-text text-danger"><?= form_error('email_kasi'); ?></small>
								</div>
								<div class="col">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Password</span>
										</div>
										<input type="password" name="pass_kasi" class="form-control" id="colFormLabel" placeholder="Password" value="<?= $kasi['pass_kasi'] ?>" readonly>
									</div>
									<small class="form-text text-danger"><?= form_error('pass_kasi'); ?></small>
								</div>
							</div>

							<div class="row mb-3">
								<label for="colFormLabel" class="col-sm-2 col-form-label">Status</label>
								<div class="col">
									<select class="form-select" aria-label="Default select example" id="colFormLabel" name="status_kasi">
										<?php foreach($status as $st) : ?>
											<?php if($st == $kasi['status_kasi']) : ?>
												<option value="<?= $st; ?>" selected><?= $st; ?></option>
												<?php else : ?>
													<option value="<?= $st; ?>"><?= $st; ?></option>
												<?php  endif; ?>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="d-grid gap-2">
									<button type="submit" name="edit" class="btn btn-primary">Perbarui Data kasi</button>
								</div>
							</form>	
						</div>
					</div>
				</div>
			</div>