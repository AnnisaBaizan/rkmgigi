<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Tambah
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
                <?php echo form_open('nilai/add'); ?>
                    <div class="row clearfix">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="nim" class="control-label">Tahun Akademik</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="id_konf" class="form-control" data-live-search="true">
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
							<label for="kd_sub_praktikum" class="control-label">Nama Sub Praktikum</label>
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
							<label for="kode_dosen" class="control-label">Dosen Pembimbing</label>
							<div class="form-group">
								<div class="form-line">
									<select name="kode_dosen" class="form-control">
										<option value="">Pilih</option>
										<?php 
										foreach($all_dosen as $dosen)
										{
											$selected = ($dosen['kode_dosen'] == $this->input->post('kode_dosen')) ? ' selected="selected"' : "";

											echo '<option value="'.$dosen['kode_dosen'].'" '.$selected.'>'.$dosen['nama_dosen'].' - '.$dosen['kode_dosen'].'</option>';
										} 
										?>
									</select>
								</div>
							</div>
						</div>
					</div>
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <button type="submit" class="btn btn-success m-t-15 waves-effect">
                                <i class="fa fa-search"></i> Cari
                            </button>
                        </div>
                    </div>
                <?php echo form_close(); ?>  
			</div>
			<?php 
			if($form_nilai==1){
			if(isset($info['nim'])){ ?>
			<div class="header">
                <h2>
                    Add
                </h2>
            </div>
            <div class="body">			
				<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nim" class="control-label">NIK Pasien</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="nik_pasien" value="<?php echo ($this->input->post('nik_pasien') ? $this->input->post('nik_pasien') : $info['nik_pasien']); ?>" class="form-control" id="nik_pasien" readonly />
								</div>
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nama_mahasiswa" class="control-label">Nama Mahasiswa</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="nama_mahasiswa" value="<?php echo ($this->input->post('nama_mahasiswa') ? $this->input->post('nama_mahasiswa') : $info['nama_mahasiswa']); ?>" class="form-control" id="nama_mahasiswa" readonly />
								</div>
                            </div>
						</div>
					</div>
					<div class="row clearfix">
                       
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nama_mahasiswa" class="control-label">Nama Pasien</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="nama_pasien" value="<?php echo ($this->input->post('nama_pasien') ? $this->input->post('nama_pasien') : $info['nama_pasien']); ?>" class="form-control" id="nama_pasien" readonly />
								</div>
                            </div>
						</div>
						 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nim" class="control-label">NIM</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="nim" value="<?php echo ($this->input->post('nim') ? $this->input->post('nim') : $info['nim']); ?>" class="form-control" id="nim" readonly />
								</div>
                            </div>
						</div>
					</div>
					<div class="row clearfix">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        		<label for="jk" class="control-label">Tanggal Lahir / Jenis Kelamin</label>
	                            <div class="form-group">
	                                <div class="form-line">
										<input type="text" name="jk_pasien" value="<?php echo ($this->input->post('jk_pasien') ? $this->input->post('jk_pasien') :   substr($info['tanggal_lahir_pasien'],8,2)."-".substr($info['tanggal_lahir_pasien'],5,2)."-".substr($info['tanggal_lahir_pasien'],0,4)." / ".$info['jk_pasien']); ?>" class="form-control" id="jk_pasien" readonly />
									</div>
								</div>
							</div>
                        	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        		<label for="kode_dosen" class="control-label">Dosen Pembimbing</label>
	                            <div class="form-group">
	                                <div class="form-line">
										<input type="text" name="nama_dosen" value="<?php echo ($this->input->post('nama_dosen') ? $this->input->post('nama_dosen') : $info['nama_dosen']); ?>" class="form-control" id="nama_dosen" readonly />
									</div>
								</div>
							</div>
					</div>
					<div class="row clearfix">
					<?php 
						echo "<p style='text-align:center; font-weight:bold'>PENILAIAN PRAKTEK<br />
						$info[nama_praktikum]<br />
						$info[nama_sub_praktikum]</p>";
					?>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<table class="table display" cellspacing="0">
							<thead>
								<tr>
									<th>NO</th>
									<th>KATEGORI</th>
									<th>ASPEK YANG DINILAI</th>
									<th>RENTANG<br />SKOR</th>
									<th>ANGKA<br />PEROLEHAN</th>
									<th>BOBOT</th>
									<th>NILAI<br />AKHIR</th>
									
								</tr>
							</thead>
							<tbody>
							<?php 
								$no=1;
								foreach($detail_nilai as $nilai){
									echo "<tr>
										<td>$no</td>
										<td>$nilai[nama_aspek]</td>
										<td>$nilai[nama_sub_aspek]</td>
										<td>$nilai[rentang_skor_awal]-$nilai[rentang_skor_akhir]</td>
										<td>$nilai[angka_perolehan]</td>
										<td>$nilai[bobot]</td>
										<td>
										(($nilai[angka_perolehan] / $nilai[rentang_skor_akhir]) x $nilai[bobot]) = <br />
										".(($nilai['angka_perolehan']/$nilai['rentang_skor_akhir'])*$nilai['bobot'])."</td>
										
									</tr>";
									$no++;
								}
							?>
							</tbody>
						</div>
					</div>
            </div>
			<?php } else {
				echo '
				<div class="alert alert-danger" role="alert">
				  <strong>Tidak ada data nilai praktikum</strong> 
				</div>
				';
				?>
				<div class="header">
                <h2>
                    Add
                </h2>
            </div>
            <div class="body">			
				<?php echo form_open('nilai/addpraktikum'); ?>
				<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nim" class="control-label">Nama Pasien</label>
                            <div class="form-group">
                                <div class="form-line">
									<select name="nik" class="form-control" data-live-search="true" required>
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
							<label for="nama_mahasiswa" class="control-label">Nama Mahasiswa</label>
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
							<label for="tanggal_praktek" class="control-label">Tanggal Praktek</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="date" name="tanggal_praktek" value="<?php echo ($this->input->post('tanggal_praktek') ? $this->input->post('tanggal_praktek') : ''); ?>" class="form-control"  />
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
											$selected = ($dosen['kode_dosen'] == $this->input->post('kode_dosen')) ? ' selected="selected"' : "";

											echo '<option value="'.$dosen['kode_dosen'].'" '.$selected.'>'.$dosen['nama_dosen'].' - '.$dosen['kode_dosen'].'</option>';
										} 
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label for="diagnosa" class="control-label">Diagnosa Pasien</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="diagnosa" value="<?php echo ($this->input->post('diagnosa') ? $this->input->post('diagnosa') : ''); ?>" class="form-control"  />
								</div>
                            </div>
						</div>
					</div>
					<div class="row clearfix">
					<?php 
						echo "<p style='text-align:center; font-weight:bold'>PENILAIAN PRAKTEK</p>";
					?>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						
							<table class="table display" cellspacing="0">
							<thead>
								<tr>
									<th>NO</th>
									<th>KATEGORI</th>
									<th>ASPEK YANG DINILAI</th>
									<th>RENTANG<br />SKOR</th>
									<th>ANGKA<br />PEROLEHAN</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$no=1;
								foreach($sub_aspek as $nilai){
									echo "<tr>
										<td>$no</td>
										<td>$nilai[nama_aspek]</td>
										<td>$nilai[nama_sub_aspek]
										<input type='hidden' name='kd_sub_aspek$no' value='$nilai[id_sub_aspek]' class='form-control' id='id_sub_aspek' readonly /></td>
										<td>$nilai[rentang_skor_awal]-$nilai[rentang_skor_akhir]</td>
										<td>
										<input type='text' name='angka_perolehan$no' class='form-control' id='angka_perolehan' required /></td>
										</td>
									</tr>";
									$no++;
								}
							?>
							
							</tbody>
							</table>
							<input type='hidden' name='jumlah' value='<?=$no;?>' class='form-control' id='jumlah' readonly />
							<input type='hidden' name='kd_sub_praktikum' value='<?=$this->input->post('kd_sub_praktikum');?>' class='form-control' id='kd_sub_praktikum' readonly />
							<input type='hidden' name='id_konf' value='<?=$this->input->post('id_konf');?>' class='form-control' id='id_konf' readonly />
							
						</div>
					</div>
					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                        </div>
                    </div>
				<?php echo form_close(); ?>  
            </div>
				<?php
			}
			}
			?>
        </div>
    </div>
</div>