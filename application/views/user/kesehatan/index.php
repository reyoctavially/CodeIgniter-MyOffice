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

	<div class="row mt-3 mb-3">
		<div class="col-md-11">
			<figure>
				<blockquote class="blockquote">
					<p>Data Kesehatan</p>
				</blockquote>
				<figcaption class="blockquote-footer">
					Menampilkan data <cite title="Source Title">kesehatan saya</cite>
				</figcaption>
			</figure>
			<div class="row mt-3 mb-3">
				<div class="col-md-6">
					<a href="<?= base_url(); ?>kesehatan/user_tambah" class="btn btn-success"> Tambah Data </a>
				</div>
			</div>
			<table id="kesehatan" class="table table-striped table-hover">
				<caption>Tabel kesehatan saya</caption>
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Nama Lengkap</th>
						<th class="text-center">Tanggal</th>
						<th class="text-center">Pekerjaan</th>
						<th class="text-center">Suhu Tubuh</th>
						<th class="text-center">Hasil Rapid/Swab</th>
						<th class="text-center">Status Vaksinasi</th>
						<th class="text-center">Opsi</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$nomor = 1;
					foreach ($kesehatan as $ks) :
						?>
						<tr>
							<td class="text-center"><?= $nomor++ ?></td>
							<td><?= $ks['nama_pegawai'] ?></td>
							<td><?= $ks['tgl_input_kesehatan'] ?></td>
							<td><?= $ks['jenis_pekerjaan'] ?></td>
							<td class="text-center"><?= $ks['suhu_tubuh_pegawai'] ?> C</td>
							<td class="text-center"><?= $ks['hasil_swab_pegawai'] ?></td>
							<td class="text-center"><?= $ks['status_vaksinasi_pegawai'] ?></td>
							<td class="text-center">
								<a class="btn btn-primary float-end" href="<?= base_url(); ?>kesehatan/user_detail/<?= $ks['kode_kesehatan']; ?>">Rincian</a>
							</td>
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
			$('#kesehatan').DataTable();
		} );
	</script>