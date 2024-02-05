<div class="container" style="margin-top: 50px">
	<div class="row justify-content-md-center">
		<div class="col-md-auto">
			<div class="card border-danger" style="width: 18rem; margin: 10px;">
				<img src="<?= base_url(); ?>assets/images/absen.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Absensi Saya</h5>
					<p class="card-text">Mencatat kehadiran dan melihat riwayat absensi.</p>
					<a href="<?= base_url(); ?>absensi/user_index" class="btn btn-outline-danger float-end">Lanjutkan</a>
				</div>
			</div>
		</div>
		<div class="col-md-auto">
			<div class="card border-success" style="width: 18rem; margin: 10px;">
				<img src="<?= base_url(); ?>assets/images/cuti.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Cuti Saya</h5>
					<p class="card-text">Melihat data cuti apakah masih berlaku atau tidak.</p>
					<a href="<?= base_url(); ?>cuti/user_index" class="btn btn-outline-success float-end">Lanjutkan</a>
				</div>
			</div>
		</div>
		<div class="col-md-auto">
			<div class="card border-primary" style="width: 18rem; margin: 10px;">
				<img src="<?= base_url(); ?>assets/images/pengajuancuti.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Pengajuan Cuti Saya</h5>
					<p class="card-text">Mengajukan dan melihat riwayat pengajuan cuti.</p>
					<a href="<?= base_url(); ?>pengajuancuti/user_index" class="btn btn-outline-primary float-end">Lanjutkan</a>
				</div>
			</div>
		</div>
	</div>