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
                <?php echo form_open('password_dosen/edit'); ?>
					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="kode_dosen" class="control-label">kode_dosen</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="kode_dosen" value="<?php echo ($this->input->post('kode_dosen') ? $this->input->post('kode_dosen') : $_SESSION['kode_dosen']); ?>" class="form-control" id="kode_dosen" readonly />
								</div>
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nama_dosen" class="control-label">Nama dosen</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="nama_dosen" value="<?php echo ($this->input->post('nama_dosen') ? $this->input->post('nama_dosen') : $_SESSION['nama_dosen']); ?>" class="form-control" id="nama_dosen" readonly />
								</div>
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="kode_dosen" class="control-label">Password Lama</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="password" name="password_lama" class="form-control" id="password_lama"  />
								</div>
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="kode_dosen" class="control-label">Password Baru</label>
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