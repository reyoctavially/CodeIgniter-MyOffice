<main class="form-signin">
	<form method="POST" action="<?= base_url('auth') ?>">
		<img class="mb-4" src="<?= base_url(); ?>assets/images/office.png" alt="" width="72" height="57">
		<h1 class="h3 mb-3 fw-normal">Halaman Login</h1>

		<?= $this->session->flashdata('message'); ?>

		<div class="form-group">
			<label for="inputUsername" class="visually-hidden">Email</label>
			<input type="email" id="inputUsername" name="email_pegawai" class="form-control" placeholder="Email" value="<?= set_value('email_pegawai') ?>" required>
			<small class="form-text text-danger"><?= form_error('email_pegawai'); ?></small>
		</div>

		<div class="form-group">
			<label for="inputPassword" class="visually-hidden">Password</label>
			<input type="password" id="inputPassword" name="pass_pegawai" class="form-control" placeholder="Password" required="">
			<small class="form-text text-danger"><?= form_error('pass_pegawai'); ?></small>
		</div>
		<button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
	</form>

	<hr>
	<a class="small" style="text-decoration: none;" href="<?= base_url('auth/forgotPassword') ?>">Lupa kata sandi?</a>
	<p class="mt-3 mb-3 text-muted">&copy My Office | 2021</p>
</main>
</body>
</html>