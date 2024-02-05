<div class="container">

	<?php
	if ($this->session->flashdata('flash') ) :
		?>
		<div class="row mt-3">
			<div class="col-md-6">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Selamat anda <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php
	if ($this->session->flashdata('flash2') ) :
		?>
		<div class="row mt-3">
			<div class="col-md-6">
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Maaf anda <strong>sudah</strong> <?= $this->session->flashdata('flash2'); ?>.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="row mt-3 mb-3">
		<div class="col-md-10">
			<figure>
				<blockquote class="blockquote">
					<p>Data Absensi Pegawai</p>
				</blockquote>
				<figcaption class="blockquote-footer">
					Menampilkan data <cite title="Source Title">absensi saya</cite>
				</figcaption>
			</figure>
			<div class="row mt-3 mb-3">
				<div class="col-md-6">
					<?php
					foreach ($kode as $abs) :
						$split = explode('-', $abs['kode_absensi']);
						$number = str_pad($split[1]+1,3,0, STR_PAD_LEFT);
						$code = "SN-".$number;
					endforeach;
					?>

					<?php
					if ($login['status_pegawai'] == "Cuti" OR $login['status_pegawai'] == "Nonaktif") {
						?>
						<a href="<?= base_url(); ?>absensi/absen_masuk/<?= $code; ?>" onclick="return confirm('Apakah anda yakin akan melakukan absen masuk?');" class="btn btn-primary disabled"> Absen Masuk </a>
						<a href="<?= base_url(); ?>absensi/absen_keluar/<?= $code; ?>" onclick="return confirm('Apakah anda yakin akan melakukan absen keluar?');" class="btn btn-success disabled"> Absen Keluar</a>
						<?php
					} else {
						?>
						<a href="<?= base_url(); ?>absensi/absen_masuk/<?= $code; ?>" onclick="return confirm('Apakah anda yakin akan melakukan absen masuk?');" class="btn btn-primary"> Absen Masuk </a>
						<a href="<?= base_url(); ?>absensi/absen_keluar/<?= $code; ?>" onclick="return confirm('Apakah anda yakin akan melakukan absen keluar?');" class="btn btn-success"> Absen Keluar</a>
						<?php
					} 
					?>
				</div>
			</div>
			<table id="absensi" class="table table-striped table-hover">
				<caption>Tabel absensi saya</caption>
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Nama Lengkap</th>
						<th class="text-center">Tanggal Absensi</th>
						<th class="text-center">Jam Masuk</th>
						<th class="text-center">Jam Keluar</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$nomor = 1;
					foreach ($absensi as $abs) :
						?>
						<tr>
							<td class="text-center"><?= $nomor++ ?></td>
							<td><?= $abs['nama_pegawai'] ?></td>
							<td class="text-center"><?= $abs['tanggal_absen'] ?></td>
							<td class="text-center"><?= $abs['jam_masuk'] ?></td>
							<td class="text-center"><?= $abs['jam_keluar'] ?></td>
						</tr>
						<?php
					endforeach;
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script>
	$(document).ready( function () {
		$('#absensi').DataTable();
	} );
</script>