<!DOCTYPE html>
<html>
<head>
	<title><?php echo $judul; ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
	<!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/style.css">
</head>
<body>
	<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand mb-0 h1" href="#">
				<img src="<?= base_url(); ?>assets/images/office.png" alt="" width="30" height="24" class="d-inline-block align-top">
				My Office
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url(); ?>home/admin_index">Beranda</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url(); ?>kasi">Data Kasi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url(); ?>pegawai">Data Pegawai</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url(); ?>absensi/admin_index">Absensi Pegawai</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url(); ?>cuti/admin_index">Cuti Pegawai</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url(); ?>pengajuancuti/admin_index">Pengajuan Cuti Pegawai</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url(); ?>kesehatan/admin_index">Data Kesehatan Pegawai</a>
					</li>
				</ul>
				<span class="navbar-text">
					<a href="<?=base_url(); ?>profile/admin_index" style="text-decoration: none;"><?= $login['nama_kasi'] ?>
					<img src="<?= base_url('assets/images/profile/').$login['foto_kasi']; ?>" alt="" width="25" height="25" class="d-inline-block align-top" style="border-radius: 100%;"></a>
				</span>
			</div>
		</div>
	</nav>