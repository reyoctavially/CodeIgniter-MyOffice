<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card mb-3">
				<div class="card-header">
					<figure>
						<blockquote class="blockquote">
							<p>Data Pengajuan Cuti</p>
						</blockquote>
						<figcaption class="blockquote-footer">
							Menampilkan proses <cite title="Source Title">menyimpan data pengajuan cuti</cite>
						</figcaption>
					</figure>
				</div>
				<div class="card-body">
					<form class="row g-3" action="" method="POST">
						<?php
						foreach ($cuti as $ct) :
							$split = explode('-', $ct['kode_cuti']);
							$number = str_pad($split[1]+1,3,0, STR_PAD_LEFT);
							$code = "CT-".$number;
						endforeach;
						?>
						<input type="hidden" name="kode_cuti" value="<?= $code ?>">
						<input type="hidden" name="kode_pengajuan_cuti" value="<?= $pengajuancuti['kode_pengajuan_cuti'] ?>">
						<input type="hidden" name="nip_kasi" value="<?= $pengajuancuti['nip_kasi'] ?>">
						<input type="hidden" name="kode_pegawai" value="<?= $pengajuancuti['kode_pegawai'] ?>">
						<input type="hidden" name="tglmulaicuti" value="<?= $pengajuancuti['tgl_mulai_cuti'] ?>">
						<input type="hidden" name="tglselesaicuti" value="<?= $pengajuancuti['tgl_selesai_cuti'] ?>">
						
						<div class="row mb-3 mt-4">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Nama</label>
							<div class="col">
								<input type="text" class="form-control" id="colFormLabel" value="<?= $pengajuancuti['nama_pegawai'] ?>" disabled>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Alasan pengajuan</label>
							<div class="col">
								<input type="text" class="form-control" id="colFormLabel" value="<?= $pengajuancuti['alasan_pengajuan_cuti'] ?>" disabled>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
							<div class="col">
								<input type="text" class="form-control" id="colFormLabel" value="<?= $pengajuancuti['tgl_pengajuan_cuti'] ?>" disabled>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Status pengajuan</label>
							<div class="col">
								<input type="text" class="form-control" id="colFormLabel" value="<?= $pengajuancuti['status_pengajuan_cuti'] ?>" disabled>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Tanggal mulai</label>
							<div class="col">
								<input type="text" class="form-control" id="colFormLabel" value="<?= $pengajuancuti['tgl_mulai_cuti'] ?>" disabled>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Keterangan</label>
							<div class="col">
								<input type="text" class="form-control" id="colFormLabel" value="<?= $pengajuancuti['ket_pengajuan_cuti'] ?>" disabled>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Tanggal selesai</label>
							<div class="col">
								<input type="text" class="form-control" id="colFormLabel" value="<?= $pengajuancuti['tgl_selesai_cuti'] ?>" disabled>
							</div>
							<label for="colFormLabel" class="col-sm-2 col-form-label">Jenis cuti</label>
							<div class="col">
								<select class="form-select" aria-label="Default select example" id="colFormLabel" name="jenis_cuti">
									<?php foreach($jeniscuti as $pc) : ?>
										<option value="<?= $pc; ?>"><?= $pc; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="row mb-3">
							<label for="colFormLabel" class="col-sm-2 col-form-label">Pemotongan Honor</label>
							<div class="col">
								<input type="number" class="form-control" name="pemotongan_honor" id="colFormLabel" value="<?= set_value('pemotongan_honor'); ?>">
								<small class="form-text text-danger"><?= form_error('pemotongan_honor'); ?></small>
							</div>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" name="edit" class="btn btn-primary">Simpan Cuti Pegawai</button>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>