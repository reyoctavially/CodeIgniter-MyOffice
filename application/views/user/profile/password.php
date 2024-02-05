<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card mb-3" style="max-width: 540px;">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<p>Ganti Kata Sandi</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan proses <cite title="Source Title">ganti kata sandi</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<?php
					if ($this->session->flashdata('flash')) :
					?>
						<div class="row mt-3">
							<div class="col">
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong>kata sandi saat ini</strong> <?= $this->session->flashdata('flash'); ?>.
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<?php
					if ($this->session->flashdata('flash2')) :
					?>
						<div class="row mt-3">
							<div class="col">
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong>kata sandi baru</strong> tidak boleh sama dengan <strong>kata sandi saat ini</strong><?= $this->session->flashdata('flash'); ?>.
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<form method="POST" action="<?= base_url('profile/user_password'); ?>">
						<input type="hidden" name="kode_pegawai" value="">
						<div class="form-group">
							<label for="colFormLabel" class="col col-form-label">Kata sandi saat ini</label>
							<input type="password" name="sandi_sekarang" class="form-control" id="colFormLabel" placeholder="Masukkan kata sandi saat ini" value="">
							<small class="form-text text-danger"><?= form_error('sandi_sekarang'); ?></small>
						</div>
						<div class="form-group">
							<label for="colFormLabel" class="col col-form-label">Kata sandi baru</label>
							<input type="password" name="sandi_baru" class="form-control" id="colFormLabel" placeholder="Masukkan kata sandi baru" value="">
							<small class="form-text text-danger"><?= form_error('sandi_baru'); ?></small>
						</div>
						<div class="form-group">
							<label for="colFormLabel" class="col col-form-label">Ulangi kata sandi baru</label>
							<input type="password" name="sandi_baru_ulang" class="form-control" id="colFormLabel" placeholder="Ulangi kata sandi baru" value="">
							<small class="form-text text-danger"><?= form_error('sandi_baru_ulang'); ?></small>
						</div>
						<div class="row mb-3 mt-3">
							<div class="d-grid gap-2">
								<button type="submit" name="edit" class="btn btn-primary">Ganti Kata Sandi</button>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>