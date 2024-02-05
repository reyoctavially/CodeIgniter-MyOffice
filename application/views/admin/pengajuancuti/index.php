<div class="container">
	<?php
	if ($this->session->flashdata('flash') ) :
		?>
		<div class="row mt-3">
			<div class="col-md-6">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data pengajuan cuti <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="row mt-3 mb-3">
		<div class="col-md-11">
			<figure>
				<blockquote class="blockquote">
					<p>Data Pengajuan Cuti Pegawai</p>
				</blockquote>
				<figcaption class="blockquote-footer">
					Menampilkan data <cite title="Source Title">pengajuan cuti pegawai</cite>
				</figcaption>
			</figure>
			<table class="table table-striped table-hover">
				<tr>
					<td colspan="6">
						<form  class="row g-2" method="POST" action="<?= base_url('pengajuancuti/cetak') ?>">
							<div class="col-12">
								<label for="namaPegawai" class="form-label">Nama pegawai</label>
								<select class="form-select" aria-label="namaPegawai" id="colFormLabel" name="kode_pegawai">
									<?php foreach($pegawai as $pgw) : ?>
										<option value="<?= $pgw['kode_pegawai']; ?>"><?= $pgw['nama_pegawai']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="col-12">
								<button type="submit" name="cetak" class="btn btn-primary" style="width: 100%;">Cetak Data Pengajuan Cuti</button>
							</div>
						</form>
					</td>
				</tr>
			</table>
			<table id="pengajuancuti" class="table table-striped table-hover">
				<caption>Tabel pengajuan cuti pegawai</caption>
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Kode Pengajuan</th>
						<th class="text-center">Nama Lengkap</th>
						<th class="text-center">Tanggal Pengajuan</th>
						<th class="text-center">Status Pengajuan</th>
						<th class="text-center">Opsi</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$nomor = 1;
					foreach ($pengajuancuti as $ct) :
						?>
						<tr>
							<td class="text-center"><?= $nomor++ ?></td>
							<td class="text-center"><?= $ct['kode_pengajuan_cuti'] ?></td>
							<td><?= $ct['nama_pegawai'] ?></td>
							<td class="text-center"><?= $ct['tgl_pengajuan_cuti'] ?></td>
							<td class="text-center"><?= $ct['status_pengajuan_cuti'] ?></td>
							<?php 
							$status = $ct['status_pengajuan_cuti'];
							if ($status == "Disetujui" OR $status == "Ditolak") {
								?>
								<td class="text-center">
									<a class="btn btn-danger float-end disabled" onclick="return confirm('Apakah anda yakin akan menolak pengajuan cuti?');" href="<?= base_url(); ?>pengajuancuti/admin_tolak/<?= $ct['kode_pengajuan_cuti']; ?>">Tolak</a>
									<a class="btn btn-success float-end disabled" href="<?= base_url(); ?>pengajuancuti/admin_simpan/<?= $ct['kode_pengajuan_cuti']; ?>">Setujui</a>
									<a class="btn btn-primary float-end" href="<?= base_url(); ?>pengajuancuti/admin_detail/<?= $ct['kode_pengajuan_cuti']; ?>">Rincian</a>
								</td>
								<?php
							} else {
								?>
								<td class="text-center">
									<a class="btn btn-danger float-end" onclick="return confirm('Apakah anda yakin akan menolak pengajuan cuti?');" href="<?= base_url(); ?>pengajuancuti/admin_tolak/<?= $ct['kode_pengajuan_cuti']; ?>">Tolak</a>
									<a class="btn btn-success float-end" href="<?= base_url(); ?>pengajuancuti/admin_simpan/<?= $ct['kode_pengajuan_cuti']; ?>">Setujui</a>
									<a class="btn btn-primary float-end" href="<?= base_url(); ?>pengajuancuti/admin_detail/<?= $ct['kode_pengajuan_cuti']; ?>">Rincian</a>
								</td>
							</tr>
							<?php
						}
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
		$('#pengajuancuti').DataTable();
	} );
</script>