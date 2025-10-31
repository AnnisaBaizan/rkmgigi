<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Edit
                </h2>
            </div>
            <div class="body">
				<?php echo validation_errors(); ?>
				<?php echo form_open('nilai_praktek/edit/'.$nilai_praktek['id_nilai_praktek']); ?>

					<div class="row clearfix">
                        	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        		<label for="nim" class="control-label">NIM</label>
	                            <div class="form-group">
	                                <div class="form-line">
										<select name="nim" class="form-control" data-live-search="true">
											<option value="">select mahasiswa</option>
											<?php 
											foreach($all_mahasiswa as $mahasiswa)
											{
												$selected = ($mahasiswa['nim'] == $nilai_praktek['nim']) ? ' selected="selected"' : "";

												echo '<option value="'.$mahasiswa['nim'].'" '.$selected.'>'.$mahasiswa['nim'].' - '.$mahasiswa['nama_mahasiswa'].'</option>';
											} 
											?>
										</select>
									</div>
								</div>
							</div>
                        	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        		<label for="nik" class="control-label">NIK Pasien</label>
	                            <div class="form-group">
	                                <div class="form-line">
										<select name="nik" class="form-control">
											<option value="">select pasien</option>
											<?php 
											foreach($all_pasien as $pasien)
											{
												$selected = ($pasien['nik_pasien'] == $nilai_praktek['nik']) ? ' selected="selected"' : "";

												echo '<option value="'.$pasien['nik_pasien'].'" '.$selected.'>'.$pasien['nik_pasien'].' - '.$pasien['nama_pasien'].'</option>';
											} 
											?>
										</select>
									</div>
								</div>
							</div></div>
					<div class="row clearfix">
                        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        		<label for="kd_sub_aspek" class="control-label">Sub Aspek</label>
	                            <div class="form-group">
	                                <div class="form-line">
										<select name="kd_sub_aspek" class="form-control">
											<option value="">Pilih</option>
											<?php 
											foreach($all_sub_aspek as $sub_aspek)
											{
												$selected = ($sub_aspek['id_sub_aspek'] == $nilai_praktek['kd_sub_aspek']) ? ' selected="selected"' : "";

												echo '<option value="'.$sub_aspek['id_sub_aspek'].'" '.$selected.'>'.$sub_aspek['nama_sub_praktikum'].' - '.$sub_aspek['nama_aspek'].' - '.$sub_aspek['nama_sub_aspek'].'</option>';
											} 
											?>
										</select>
									</div>
								</div>
							</div>
                        </div>
					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="tanggal_praktek" class="control-label">Tanggal Praktek</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="date" name="tanggal_praktek" value="<?php echo ($this->input->post('tanggal_praktek') ? $this->input->post('tanggal_praktek') : $nilai_praktek['tanggal_praktek']); ?>" class="form-control" id="tanggal_praktek" />
								</div>
                            </div>
						</div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="angka_perolehan" class="control-label">Angka Perolehan</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="angka_perolehan" value="<?php echo ($this->input->post('angka_perolehan') ? $this->input->post('angka_perolehan') : $nilai_praktek['angka_perolehan']); ?>" class="form-control" id="angka_perolehan" />
								</div>
                            </div>
						</div></div>
					<div class="row clearfix">
                        
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="kd_konfigurasi" class="control-label">Thn Akademik / Kode Semester</label>
                            <div class="form-group">
                                <div class="form-line">
									
									<select name="kd_konfigurasi" class="form-control" data-live-search="true">
										<option value="">Pilih</option>
										<?php 
										foreach($all_konfigurasi as $konf)
										{
											$selected = ($konf['id_konf'] == $nilai_praktek['kd_konfigurasi']) ? ' selected="selected"' : "";

											echo '<option value="'.$konf['id_konf'].'" '.$selected.'>'.$konf['thn_akademik'].' - '.$konf['kd_semester'].'</option>';
										} 
										?>
									</select>

								</div>
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="kode_dosen" class="control-label">Dosen Pembimbing</label>
							<div class="form-group">
								<div class="form-line">
									<select name="kode_dosen" class="form-control">
										<option value="">Pilih</option>
										<?php 
										foreach($all_dosen as $dosen)
										{
											$selected = ($dosen['kode_dosen'] == $nilai_praktek['kode_dosen']) ? ' selected="selected"' : "";

											echo '<option value="'.$dosen['kode_dosen'].'" '.$selected.'>'.$dosen['nama_dosen'].' - '.$dosen['kode_dosen'].'</option>';
										} 
										?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
                        <!--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        		<label for="validasi_dosen" class="control-label">Validasi Dosen</label>
	                            <div class="form-group">
	                                <div class="form-line">
										<select name="validasi_dosen" class="form-control">
											<option value="">select</option> -->
											<?php 
											/*
											$validasi_dosen_values = array(
																			'Y'=>'Ya',
																			'N'=>'Belum',
																		);

											foreach($validasi_dosen_values as $value => $display_text)
											{
												$selected = ($value == $nilai_praktek['validasi_dosen']) ? ' selected="selected"' : "";

												echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
											}
											*/											
											?>
										<!--</select>
									</div>
								</div>
						</div>
						-->
						<!--
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="tanggal_validasi" class="control-label">Tanggal Validasi</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="date" name="tanggal_validasi" value="<?php echo ($this->input->post('tanggal_validasi') ? $this->input->post('tanggal_validasi') : $nilai_praktek['tanggal_validasi']); ?>" class="form-control" id="tanggal_validasi" />
								</div>
                            </div>
						</div>
						-->
                    </div>
					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<button type="submit" class="btn btn-success m-t-15 waves-effect">
								<i class="fa fa-check"></i> Save
							</button>
				        </div>
					</div>
					
				<?php echo form_close(); ?>
			</div>
        </div>
    </div>
</div>