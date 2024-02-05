<div class="container">

	<?php
	if ($this->session->flashdata('flash') ) :
		?>
		<div class="row mt-3">
			<div class="col-md-6">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data pegawai <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?> silahkan lakukan <strong>aktivasi akun</strong> melalui email pegawai.
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
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data pegawai <strong>berhasil</strong> <?= $this->session->flashdata('flash2'); ?>.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="row mt-3 mb-3">
		<div class="col-md-11">
			<figure>
				<blockquote class="blockquote">
					<p>Data Pegawai</p>
				</blockquote>
				<figcaption class="blockquote-footer">
					Menampilkan data <cite title="Source Title">pegawai</cite>
				</figcaption>
			</figure>
			<div class="row mt-3 mb-3">
				<div class="col-md-6">
					<a href="<?= base_url(); ?>pegawai/tambah" class="btn btn-primary"> Tambah </a>
					<a href="<?= base_url(); ?>pegawai/cetak" class="btn btn-success"> Cetak</a>
				</div>
			</div>
			<table id="pegawai" class="table table-striped table-hover">
				<caption>Tabel pegawai</caption>
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Kode Pegawai</th>
						<th class="text-center">Nama Lengkap</th>
						<th class="text-center">Jabatan</th>
						<th class="text-center">Status</th>
						<th class="text-center">Opsi</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$nomor = 1;
					foreach ($pegawai as $pgw) :
						?>
						<tr>
							<td class="text-center"><?= $nomor++ ?></td>
							<td class="text-center"><?= $pgw['kode_pegawai'] ?></td>
							<td><?= $pgw['nama_pegawai'] ?></td>
							<td><?= $pgw['jabatan_pegawai'] ?></td>
							<td class="text-center"><?= $pgw['status_pegawai'] ?></td>
							<td>
								<a class="btn btn-danger float-end disabled" onclick="return confirm('Apakah anda yakin akan mengahapus data pegawai?');" href="<?= base_url(); ?>pegawai/hapus/<?= $pgw['kode_pegawai']; ?>">Hapus</a>
								<a class="btn btn-success float-end" href="<?= base_url(); ?>pegawai/edit/<?= $pgw['kode_pegawai']; ?>">Edit</a>
								<a class="btn btn-primary float-end" href="<?= base_url(); ?>pegawai/detail/<?= $pgw['kode_pegawai']; ?>">Rincian</a>
							</td>
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
		$('#pegawai').DataTable();
	} );
</script>