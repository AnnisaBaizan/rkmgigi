<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Ubah
                </h2>
            </div>
            <div class="body">
				<?php echo validation_errors(); ?>
				<?php echo form_open('admin/edit/'.$admin['id_admin']); ?>

					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="username" class="control-label">Username</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="username" value="<?php echo ($this->input->post('username') ? $this->input->post('username') : $admin['username']); ?>" class="form-control" id="username" readonly />
								</div>
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        	<label for="password" class="control-label">Password</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="password" name="password" class="form-control" id="password" />
								</div>
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nama" class="control-label">Nama Lengkap</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="nama" value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $admin['nama']); ?>" class="form-control" id="nama" />
								</div>
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="level" class="control-label">Status</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="level" class="form-control" data-live-search="true" required>
                                            <option value="">Pilih</option>
											<option value="operator" <?php echo ($admin['level']=='operator' ? 'selected' : null); ?> >Operator Full</option>
											<option value="pendaftaran" <?php echo ($admin['level']=='pendaftaran' ? 'selected' : null); ?> >Operator Pendaftaran</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
					</div>
					
					
					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<button type="submit" class="btn btn-success m-t-15 waves-effect">
								<i class="fa fa-check"></i> Simpan
							</button>
				        </div>
					</div>
					
				<?php echo form_close(); ?>
			</div>
        </div>
    </div>
</div>