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
							Menampilkan proses <cite title="Source Title">edit data pegawai</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<form class="row g-3" action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="kode_pegawai" value="<?= $pegawai['kode_pegawai'] ?>">
						<div class="row mb-3 mt-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama</label>
							<div class="col">
								<input type="text" name="nama_pegawai" class="form-control" id="colFormLabel" placeholder="Nama pegawai" value="<?= $pegawai['nama_pegawai'] ?>" readonly>
								<small class="form-text text-danger"><?= form_error('nama_pegawai'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nomor telepon</label>
							<div class="col">
								<input type="number" name="telp_pegawai" class="form-control" id="colFormLabel" placeholder="Nomor telepon pegawai" value="<?= $pegawai['telp_pegawai'] ?>" readonly>
								<small class="form-text text-danger"><?= form_error('telp_pegawai'); ?></small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Jabatan</label>
							<div class="col">
								<select class="form-select" aria-label="Default select example" id="colFormLabel" name="jabatan_pegawai">
									<?php foreach($jabatan as $jbt) : ?>
										<?php if($jbt == $pegawai['jabatan_pegawai']) : ?>
											<option value="<?= $jbt; ?>" selected><?= $jbt; ?></option>
											<?php else : ?>
												<option value="<?= $jbt; ?>"><?= $jbt; ?></option>
											<?php  endif; ?>
										<?php endforeach; ?>
									</select>
								</div>
								<label for="colFormLabel" class="col-sm-2 col-form-label">Kepala seksi</label>
								<div class="col">
									<select class="form-select" aria-label="Default select example" id="colFormLabel" name="nip_kasi">
										<?php foreach($kasi as $ks) : ?>
											<?php if($ks['nip_kasi'] == $pegawai['nip_kasi']) : ?>
												<option value="<?= $ks['nip_kasi']; ?>" selected><?= $ks['nama_kasi']; ?></option>
												<?php else : ?>
													<option value="<?= $ks['nip_kasi']; ?>"><?= $ks['nama_kasi']; ?></option>
												<?php  endif; ?>
											<?php endforeach; ?>
										</select>
										<small class="form-text text-danger"><?= form_error('nip_kasi'); ?></small>
									</div>
								</div>

								<div class="row mb-3">
									<label for="colFormLabel" class="col-sm-2 col-form-label">Alamat</label>
									<div class="col">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">Jln</span>
											</div>
											<input type="text" name="jalan_pegawai" class="form-control" id="colFormLabel" placeholder="Jalan" value="<?= $pegawai['jalan_pegawai'] ?>" readonly>
										</div>
										<small class="form-text text-danger"><?= form_error('jalan_pegawai'); ?></small>
									</div>
									<div class="col">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">No</span>
											</div>
											<input type="text" name="no_rumah_pegawai" class="form-control" id="colFormLabel" placeholder="Nomor rumah" value="<?= $pegawai['no_rumah_pegawai'] ?>" readonly>
										</div>
										<small class="form-text text-danger"><?= form_error('no_rumah_pegawai'); ?></small>
									</div>
									<div class="col">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">RT</span>
											</div>
											<input type="text" name="rt_pegawai" class="form-control" id="colFormLabel" placeholder="RT" value="<?= $pegawai['rt_pegawai'] ?>" readonly>
										</div>
										<small class="form-text text-danger"><?= form_error('rt_pegawai'); ?></small>
									</div>
									<div class="col">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">RW</span>
											</div>
											<input type="text" name="rw_pegawai" class="form-control" id="colFormLabel" placeholder="RW" value="<?= $pegawai['rw_pegawai'] ?>" readonly>
										</div>
										<small class="form-text text-danger"><?= form_error('rw_pegawai'); ?></small>
									</div>
								</div>
								<div class="row mb-3">
									<label for="colFormLabel" class="col-sm-2 col-form-label"></label>
									<div class="col">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">Kec</span>
											</div>
											<input type="text" name="kec_pegawai" class="form-control" id="colFormLabel" placeholder="Kecamatan" value="<?= $pegawai['kec_pegawai'] ?>" readonly>
										</div>
										<small class="form-text text-danger"><?= form_error('kec_pegawai'); ?></small>
									</div>
									<div class="col">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">Kab/kota</span>
											</div>
											<input type="text" name="kota_pegawai" class="form-control" id="colFormLabel" placeholder="Kota" value="<?= $pegawai['kota_pegawai'] ?>" readonly>
										</div>
										<small class="form-text text-danger"><?= form_error('kota_pegawai'); ?></small>
									</div>
									<div class="col">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">Kode pos</span>
											</div>
											<input type="number" name="kode_pos_pegawai" class="form-control" id="colFormLabel" placeholder="Kode pos" value="<?= $pegawai['kode_pos_pegawai'] ?>" readonly>
										</div>
										<small class="form-text text-danger"><?= form_error('kode_pos_pegawai'); ?></small>
									</div>
								</div>
								<div class="row mb-3">
									<label for="colFormLabel" class="col-sm-2 col-form-label">Akun pegawai</label>
									<div class="col">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">Email</span>
											</div>
											<input type="text" name="email_pegawai" class="form-control" id="colFormLabel" placeholder="Email" value="<?= $pegawai['email_pegawai'] ?>" readonly>
										</div>
										<small class="form-text text-danger"><?= form_error('email_pegawai'); ?></small>
									</div>
									<div class="col">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">Password</span>
											</div>
											<input type="password" name="pass_pegawai" class="form-control" id="colFormLabel" placeholder="Password" value="<?= $pegawai['pass_pegawai'] ?>" readonly>
										</div>
										<small class="form-text text-danger"><?= form_error('pass_pegawai'); ?></small>
									</div>
								</div>

								<div class="row mb-3">
									<label for="colFormLabel" class="col-sm-2 col-form-label">Status</label>
									<div class="col">
										<select class="form-select" aria-label="Default select example" id="colFormLabel" name="status_pegawai">
											<?php foreach($status as $st) : ?>
												<?php if($st == $pegawai['status_pegawai']) : ?>
													<option value="<?= $st; ?>" selected><?= $st; ?></option>
													<?php else : ?>
														<option value="<?= $st; ?>"><?= $st; ?></option>
													<?php  endif; ?>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="d-grid gap-2">
										<button type="submit" name="edit" class="btn btn-primary">Perbarui Data pegawai</button>
									</div>
									</form>	
								</div>
							</div>
						</div>
					</div>