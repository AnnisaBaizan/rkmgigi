<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Pencarian
                </h2>
            </div>
			<div class="body">
			<?php echo form_open('nilai_praktek'); ?>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="nim" class="control-label">Nama Mahasiswa</label>
						<div class="form-group">
							<div class="form-line">
								<select name="nim" class="form-control" data-live-search="true" required>
									<option value="">Pilih</option>
									<?php 
									foreach($all_mahasiswa as $mahasiswa)
									{
										$selected = ($mahasiswa['nim'] == $this->input->post('nim')) ? ' selected="selected"' : "";

										echo '<option value="'.$mahasiswa['nim'].'" '.$selected.'>'.$mahasiswa['nim'].' - '.$mahasiswa['nama_mahasiswa'].'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="kd_sub_praktikum" class="control-label">Nama Sub Praktikum</label>
						<div class="form-group">
							<div class="form-line">
								<select name="kd_sub_praktikum" class="form-control" data-live-search="true" required>
									<option value="">Pilih</option>
									<?php 
									foreach($all_sub_praktikum as $sub_praktikum)
									{
										$selected = ($sub_praktikum['id_sub_praktikum'] == $this->input->post('kd_sub_praktikum')) ? ' selected="selected"' : "";

										echo '<option value="'.$sub_praktikum['id_sub_praktikum'].'" '.$selected.'>'.$sub_praktikum['nama_praktikum'].' - '.$sub_praktikum['nama_sub_praktikum'].'</option>';
									} 
									?>
								</select>
							</div>
						</div>
					</div>
				
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<button type="submit" class="btn btn-warning m-t-15 waves-effect">
							<i class="fa fa-search"></i> Cari
						</button>
					</div>
				</div>
			<?php echo form_close(); ?>  
			</div>
			
			<div class="header">
                <h2>
                    Listing
                </h2>
				<div class="header-dropdown">
                    <a href="<?php echo site_url('nilai/add'); ?>" class="btn btn-success btn-sm">Tambah Nilai</a> 
                </div>
            </div>
            <div class="body table-responsive">
			<?php if($tampil==TRUE){ ?>
                <table id="data-table-simple" class="responsive-table display" cellspacing="0">
					<thead>
                    <tr>
						<th>ID</th>
						<th>NIM</th>
						<th>Nama Mahasiswa</th>
						<th>NIK Pasien</th>
						<th>Nama Pasien</th>
						<th>Praktikum</th>
						<th>Sub Praktikum</th>
						<th>Sub Aspek</th>
						<th>Tanggal Praktek</th>
						<th>Angka Perolehan</th>
						<th>Tanggal Input</th>
						<th>Thn Akademik</th>
						<th>Kode Semester</th>
						<!--
						<th>Validasi Dosen</th>
						<th>Tanggal Validasi</th>
						-->
						<th>Actions</th>
                    </tr>
					</thead>
					<tbody>
                    <?php foreach($nilai_praktek as $t){ ?>
                    <tr>
						<td><?php echo $t['id_nilai_praktek']; ?></td>
						<td><?php echo $t['nim']; ?></td>
						<td><?php echo $t['nama_mahasiswa']; ?></td>
						<td><?php echo $t['nik']; ?></td>
						<td><?php echo $t['nama_pasien']; ?></td>
						<td><?php echo $t['nama_praktikum']; ?></td>
						<td><?php echo $t['nama_sub_praktikum']; ?></td>
						<td><?php echo $t['nama_sub_aspek']; ?></td>
						<td><?php echo $t['tanggal_praktek']; ?></td>
						<td><?php echo $t['angka_perolehan']; ?></td>
						<td><?php echo $t['tanggal_input']; ?></td>
						<td><?php echo $t['thn_akademik']; ?></td>
						<td><?php echo $t['kd_semester']; ?></td>
						<!--
						<td><?php echo $t['validasi_dosen']; ?></td>
						<td><?php echo $t['tanggal_validasi']; ?></td>
						-->
						<td>
                            <a href="<?php echo site_url('nilai_praktek/edit/'.$t['id_nilai_praktek']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('nilai_praktek/remove/'.$t['id_nilai_praktek']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
					</tbody>
                </table>
				<?php } ?>
            </div>
        </div>
    </div>
</div>
