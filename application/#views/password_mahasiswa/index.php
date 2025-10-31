<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Ubah Password 
                </h2>
            </div>
            <div class="body">
				<?php 
					if(isset($_SESSION['success'])){ 
						echo '<div class="alert alert-success" role="alert">
						  <strong>'.$_SESSION['success'].'
						</div>';
					}
					if(isset($_SESSION['error'])){ 
						echo '<div class="alert alert-danger" role="alert">
						  <strong>'.$_SESSION['error'].'
						</div>';
					}
				?>
				<?php echo validation_errors(); ?>
                <?php echo form_open('password_mahasiswa/edit'); ?>
					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nim" class="control-label">NIM</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="nim" value="<?php echo ($this->input->post('nim') ? $this->input->post('nim') : $_SESSION['nim_mhs']); ?>" class="form-control" id="nim" readonly />
								</div>
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nama_mahasiswa" class="control-label">Nama Mahasiswa</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="nama_mahasiswa" value="<?php echo ($this->input->post('nama_mahasiswa') ? $this->input->post('nama_mahasiswa') : $_SESSION['nama_mhs']); ?>" class="form-control" id="nama_mahasiswa" readonly />
								</div>
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nim" class="control-label">Password Lama</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="password" name="password_lama" class="form-control" id="password_lama"  />
								</div>
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nim" class="control-label">Password Baru</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="password" name="password_baru" class="form-control" id="password_baru" />
								</div>
                            </div>
						</div>
					</div>
					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <button type="submit" class="btn btn-success m-t-15 waves-effect">
                                <i class="fa fa-edit"></i> Ubah
                            </button>
                        </div>
                    </div>
                <?php echo form_close(); ?>  
			</div>
        </div>
    </div>
</div>