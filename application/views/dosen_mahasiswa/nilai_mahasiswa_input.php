<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Mahasiswa
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
                    <div class="row clearfix">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label for="nim" class="control-label">NIM</label>
                                <div class="form-group">
                                    <div class="form-line">
										<?php echo $data_mahasiswa['nim'];?>
                                    </div>
                                </div>
                        </div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label for="nim" class="control-label">Nama Mahasiswa</label>
                                <div class="form-group">
                                    <div class="form-line">
										<?php echo $data_mahasiswa['nama_mahasiswa'];?>
                                    </div>
                                </div>
                        </div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label for="nim" class="control-label">Jenis Kelamin</label>
                                <div class="form-group">
                                    <div class="form-line">
										<?php echo ($data_mahasiswa['jk'] == "L" ? "Laki-laki" : "Perempuan");?>
                                    </div>
                                </div>
                        </div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label for="hp" class="control-label">HP</label>
                                <div class="form-group">
                                    <div class="form-line">
										<?php echo $data_mahasiswa['hp'];?>
                                    </div>
                                </div>
                        </div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label for="tahun_akademik" class="control-label">Tahun Akademik</label>
                                <div class="form-group">
                                    <div class="form-line">
										<?php echo $data_mahasiswa['thn_akademik']."-".$data_mahasiswa['kd_semester'];?>
                                    </div>
                                </div>
                        </div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label for="nama_pasien" class="control-label">Nama Pasien</label>
                                <div class="form-group">
                                    <div class="form-line">
										<?php echo $data_mahasiswa['nama_pasien'];?>
                                    </div>
                                </div>
                        </div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="tahun_akademik" class="control-label">Nama Sub Praktikum</label>
                                <div class="form-group">
                                    <div class="form-line">
										<?php echo $data_mahasiswa['nama_praktikum']."-".$data_mahasiswa['nama_sub_praktikum'];?>
                                    </div>
                                </div>
                        </div>
					</div>
			</div>
		</div>
		<?php if($show_form==false){ ?>
		<div class="card">
            <div class="header">
                <h2>
                    Form Input Nilai Mahasiswa <span class="alert alert-warning" style="padding:4px"><?php echo $data_mahasiswa['thn_akademik']."-".$data_mahasiswa['kd_semester'];?></span>
                </h2>
            </div>		
            <div class="body">
			<?php echo form_open("dosen_mahasiswa/nilai_mahasiswa_simpan"); ?>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<label for="diagnosa" class="control-label">Diagnosa Pasien (Mhs)</label>
						<div class="form-group">
							<div class="form-line">
								<!-- <input type="text" name="diagnosa" value="<?php echo ($data_mahasiswa['diagnosa_pasien'] ? $data_mahasiswa['diagnosa_pasien'] : $this->input->post('diagnosa')); ?>" class="form-control" required  /> -->
								<textarea id="editor1" name="diagnosa_pasien" class="form-control" required ><?php echo ($data_mahasiswa['diagnosa_pasien'] ? $data_mahasiswa['diagnosa_pasien'] : $this->input->post('diagnosa')); ?></textarea>
							</div>
							<div class="form-line">
								<label for="diagnosa" class="control-label">Diagnosa Pasien (Dosen)</label>
								<textarea id="editor2" name="diagnosa" class="form-control" required ></textarea>
							</div>
						</div>
						<?php 
							if($data_mahasiswa['diagnosa_odontogram'] != null){
								echo "<b>File </b>: <a href='".base_url('diagnosa/'.$data_mahasiswa['diagnosa_odontogram'])."' target='_blank'>Diagnosa Odontogram</a>";
							}
						?>
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
							<input type='hidden' name='kd_sub_praktikum' value='<?=$data_mahasiswa['kd_sub_praktikum'];?>' class='form-control' id='kd_sub_praktikum' readonly />
							<input type='hidden' name='id_konf' value='<?=$data_mahasiswa['kd_konfigurasi'];?>' class='form-control' id='id_konf' readonly />
							<input type='hidden' name='nim' value='<?=$data_mahasiswa['nim'];?>' class='form-control' id='nim' readonly />
							<input type='hidden' name='nik' value='<?=$data_mahasiswa['nik'];?>' class='form-control' id='nik' readonly />
							<input type='hidden' name='tanggal_praktek' value='<?=$data_mahasiswa['tanggal_praktek'];?>' class='form-control' id='tanggal_praktek' readonly />
							<input type='hidden' name='kd_daftar_praktikum' value='<?=$data_mahasiswa['id_daftar_praktikum'];?>' class='form-control' id='kd_daftar_praktikum' readonly />
							
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
        </div>
		<?php } ?>
    </div>
</div>
<script>
    CKEDITOR.replace( 'editor1' );
	CKEDITOR.replace( 'editor2' );
</script>