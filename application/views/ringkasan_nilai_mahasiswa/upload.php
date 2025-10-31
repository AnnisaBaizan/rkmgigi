<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Nilai 
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
				<?php echo form_open_multipart("ringkasan_nilai_mahasiswa/upload/$x_nim/$x_kd_sub_praktikum/$x_ta/$data_mahasiswa[id_daftar_praktikum]"); ?>
					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nim" class="control-label">NIM</label>
                            <div class="form-group">
                                <div class="form-line">
									<?php echo $data_mahasiswa['nim']; ?>
								</div>
								<input type="hidden" name="id_daftar_praktikum" value="<?php echo ($this->input->post('id_daftar_praktikum') ? $this->input->post('id_daftar_praktikum') : $data_mahasiswa['id_daftar_praktikum']); ?>" class="form-control" required />
                                
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nama_mahasiswa" class="control-label">Nama Mahasiswa</label>
                            <div class="form-group">
                                <div class="form-line">
									<?php echo $data_mahasiswa['nama_mahasiswa']; ?>
								</div>
                            </div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<label for="jk" class="control-label">Jenis Kelamin</label>
							<div class="form-group">
								<div class="form-line">
									<?php echo ($data_mahasiswa['jk']=="L" ? "Laki-laki" : "Perempuan"); ?>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<label for="kode_dosen" class="control-label">HP</label>
							<div class="form-group">
								<div class="form-line">
									<?php echo $data_mahasiswa['hp']; ?>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="thn_akademik" class="control-label">Tahun Akademik</label>
							<div class="form-group">
								<div class="form-line">
									<?php echo $data_mahasiswa['thn_akademik']."-".$data_mahasiswa['kd_semester']; ?>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nama_sub_praktikum" class="control-label">Nama Sub Praktikum</label>
							<div class="form-group">
								<div class="form-line">
									<?php echo $data_mahasiswa['nama_praktikum']." - ".$data_mahasiswa['nama_sub_praktikum']; ?>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="diagnosa_odontogram" class="control-label">Diagnosa Odontogram 
							<?php echo ($data_mahasiswa['diagnosa_odontogram'] != "" ? " (<a href='".base_url("diagnosa/$data_mahasiswa[diagnosa_odontogram]")."' target='_blank'>Lampiran</a>)" : null);?>
							</label>
							<div class="form-group">
								<div class="form-line">
									<input type="file" name="diagnosa_odontogram" class="form-control" />
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label for="diagnosa_pasien" class="control-label">Diagnosa pasien</label>
							<div class="form-group">
								<div class="form-line">
									<textarea id="editor1" name="diagnosa_pasien" class="form-control" ><?php echo ($this->input->post('diagnosa_pasien') ? $this->input->post('diagnosa_pasien') : $data_mahasiswa['diagnosa_pasien']); ?></textarea>
									
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <button type="submit" class="btn btn-success m-t-15 waves-effect">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                        </div>
                    </div>
					<?php echo form_close(); ?>  
			</div>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace( 'editor1' );
</script>
