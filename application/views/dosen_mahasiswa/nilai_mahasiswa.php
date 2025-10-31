<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Filter Listing Nilai Mahasiswa
                </h2>
            </div>
			<div class="body">
			<?php 
					if(isset($_SESSION['error'])){
						echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
							<strong>'.$_SESSION['error'].'</strong>
						</div>';
					}else if(isset($_SESSION['success'])){
						echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
							<strong>'.$_SESSION['success'].'</strong>
						</div>';
					}
				?>
                <?php echo validation_errors(); ?>
                <?php echo form_open('dosen_mahasiswa/nilai_mahasiswa'); ?>
                    <div class="row clearfix">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="nim" class="control-label">Tahun Akademik</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="id_konf" class="form-control" data-live-search="true" required>
                                            <option value="">Pilih</option>
                                            <?php 
                                            foreach($all_konfigurasi as $konf)
                                            {
                                                $selected = ($konf['id_konf'] == $this->input->post('id_konf')) ? ' selected="selected"' : "";

                                                echo '<option value="'.$konf['id_konf'].'" '.$selected.'>'.$konf['thn_akademik'].' - '.$konf['kd_semester'].'</option>';
                                            } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                        </div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="nim" class="control-label">Nama Mahasiswa</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="nim" class="form-control" data-live-search="true">
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
                                <label for="semester" class="control-label">Semester</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="semester" class="form-control" data-live-search="true" >
                                            <option value="">Pilih</option>
                                            <?php 
                                            for($i=1; $i<=8; $i++)
                                            {
                                                $selected = ($i == $this->input->post('semester')) ? ' selected="selected"' : "";

                                                echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
                                            } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                        </div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="kd_sub_praktikum" class="control-label">Sub Praktikum</label>
							<div class="form-group">
								<div class="form-line">
									<select name="kd_sub_praktikum" class="form-control" data-live-search="true">
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
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nim" class="control-label">Nama Pasien</label>
                            <div class="form-group">
                                <div class="form-line">
									<select name="nik" class="form-control" data-live-search="true">
										<option value="">Pilih</option>
										<?php 
										foreach($all_pasien as $pasien)
										{
											$selected = ($pasien['nik_pasien'] == $this->input->post('nik')) ? ' selected="selected"' : "";

											echo '<option value="'.$pasien['nik_pasien'].'" '.$selected.'>'.$pasien['nik_pasien'].' - '.$pasien['nama_pasien'].'</option>';
										} 
										?>
									</select>
								</div>
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="tanggal_praktek" class="control-label">Tanggal Praktek</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="date" name="tanggal_praktek" value="<?php echo ($this->input->post('tanggal_praktek') ? $this->input->post('tanggal_praktek') : ''); ?>" class="form-control"  />
								</div>
                            </div>
						</div>
					</div>

                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <button type="submit" class="btn btn-warning m-t-15 waves-effect">
                                <i class="fa fa-search"></i> Cari
                            </button>
                        </div>
                    </div>
                <?php echo form_close(); ?> 
			</div>
		</div>
		<?php if($show_listing==true){ ?>
		<div class="card">
            <div class="header">
                <h2>
                    Listing Nilai Mahasiswa 
                </h2>
            </div>		
            <div class="body table-responsive">
                <table id="data-table-simple" class="responsive-table display" cellspacing="0">
					<thead>
                    <tr>
						<th>No</th>
						<th>Tahun Akademik</th>
						<th>Semester</th>
						<th>NIM</th>
						<th>Nama Mahasiswa</th>
						<th>Praktikum</th>
						<th>Sub Praktikum</th>
						<th>Nilai Rata-rata</th>
						<th>Status</th>
						<th>Aksi</th>
                    </tr>
					</thead>
					<tbody>
                    <?php $no=1; foreach($listing_mahasiswa as $t){ ?>
                    <tr>
						<td><?php echo $no; $no++ ?></td>
						<td><?php echo $t['thn_akademik']."-".$t['kd_semester']; ?></td>
						<td><?php echo $t['semester']; ?></td>
						<td><?php echo $t['nim']; ?></td>
						<td><?php echo $t['nama_mahasiswa']; ?></td>
						<td><?php echo $t['nama_praktikum']; ?></td>
						<td><?php echo $t['nama_sub_praktikum']; ?></td>
						<td><?php echo number_format(($t['nilai_rata']),2,",",".");?></td>
						<td><?php echo ($t['nilai_rata'] < 70 ? "<span class='alert alert-danger' style='padding:4px'>Tidak memenuhi</span>" : "<span class='alert alert-success' style='padding:4px'>Memenuhi</span>"); ?></td>
						<td>
							<a href="<?php echo site_url('dosen_mahasiswa/nilai_mahasiswa_detail/'.$t['nim'].'/'.$t['kd_konfigurasi'].'/'.$t['kd_sub_praktikum']); ?>" class="btn btn-primary btn-xs"><span class="fa fa-search"></span> Detail</a>
                        </td>
                    </tr>
                    <?php } ?>
					</tbody>
                </table>
            </div>
        </div>
		<?php } ?>
    </div>
</div>
