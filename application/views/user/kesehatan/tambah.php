<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card mb-3">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<p>Data Kesehatan</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan proses <cite title="Source Title">input data kesehatan</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<form class="row g-3" action="" method="POST">
						<?php
						foreach ($kode as $ks) :
							$split = explode('-', $ks['kode_kesehatan']);
							$number = str_pad($split[1]+1,3,0, STR_PAD_LEFT);
							$code = "KS-".$number;
						endforeach;
						?>
						<input type="hidden" name="kode_kesehatan" value="<?= $code ?>">
						<input type="hidden" name="kode_pegawai" value="<?= $kesehatan['kode_pegawai']; ?>">
						<input type="hidden" name="nip_kasi" value="<?= $kesehatan['nip_kasi']; ?>">
						<div class="row mb-3 mt-4">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama pegawai</label>
							<div class="col">
								<input type="rext" name="nama_pegawai" class="form-control" id="colFormLabel" value="<?= $kesehatan['nama_pegawai']; ?>" readonly>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama kepala seksi</label>
							<div class="col">
								<input type="text" name="nama_kasi" class="form-control" id="colFormLabel" value="<?= $kesehatan['nama_kasi']; ?>" readonly>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Jenis pekerjaan</label>
							<div class="col">
								<select class="form-select" aria-label="Default select example" id="colFormLabel" name="jenis_pekerjaan">
									<?php foreach($jenis_pekerjaan as $jp) : ?>
										<option value="<?= $jp; ?>"><?= $jp; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Hasil rapid/swab</label>
							<div class="col">
								<select class="form-select" aria-label="Default select example" id="colFormLabel" name="hasil_swab_pegawai">
									<?php foreach($swab as $sw) : ?>
										<option value="<?= $sw; ?>"><?= $sw; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Suhu Tubuh</label>
							<div class="col">
								<input type="number" name="suhu_tubuh_pegawai" class="form-control" id="colFormLabel" value="<?= set_value('suhu_tubuh_pegawai'); ?>">
								<small class="form-text text-danger"><?= form_error('suhu_tubuh_pegawai'); ?></small>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Status Vaksinasi</label>
							<div class="col">
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status_vaksinasi_pegawai" id="inlineRadio1" value="Belum" checked>
									<label class="form-check-label" for="inlineRadio1">Belum</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status_vaksinasi_pegawai" id="inlineRadio1" value="Sudah">
									<label class="form-check-label" for="inlineRadio1">Sudah</label>
								</div>
							</div>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" name="tambah" class="btn btn-primary">Simpan Data Kesehatan</button>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>
</div>