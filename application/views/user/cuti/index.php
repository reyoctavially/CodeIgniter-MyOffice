<div class="container">
	<?php
	if ($this->session->flashdata('flash') ) :
		?>
		<div class="row mt-3">
			<div class="col-md-6">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data cuti <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="row mt-3 mb-3">
		<div class="col-md-10">
			<figure>
				<blockquote class="blockquote">
					<p>Data Cuti Pegawai</p>
				</blockquote>
				<figcaption class="blockquote-footer">
					Menampilkan data <cite title="Source Title">cuti saya</cite>
				</figcaption>
			</figure>
			<table id="cuti" class="table table-striped table-hover">
				<caption>Tabel cuti saya</caption>
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Nama Lengkap</th>
						<th class="text-center">Tanggal Mulai</th>
						<th class="text-center">Tanggal Selesai</th>
						<th class="text-center">Status Cuti</th>
						<th class="text-center">Opsi</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$nomor = 1;
					foreach ($cuti as $ct) :
						?>
						<tr>
							<td class="text-center"><?= $nomor++ ?></td>
							<td><?= $ct['nama_pegawai'] ?></td>
							<td class="text-center"><?= $ct['tglmulaicuti'] ?></td>
							<td class="text-center"><?= $ct['tglselesaicuti'] ?></td>
							<td class="text-center"><?= $ct['statuscuti'] ?></td>
							<td class="text-center"><a class="btn btn-primary" href="<?= base_url(); ?>cuti/user_detail/<?= $ct['kode_cuti']; ?>">Rincian</a></td>
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
		$('#cuti').DataTable();
	} );
</script>