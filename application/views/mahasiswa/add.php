<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Tambah
                </h2>
            </div>
            <div class="body">
                <?php echo validation_errors(); ?>
                <?php echo form_open('mahasiswa/add'); ?>
                    <div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="nim" class="control-label">NIM</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="nim" value="<?php echo $this->input->post('nim'); ?>" class="form-control" id="nim" />
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="nama_mahasiswa" class="control-label">Nama Mahasiswa</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="nama_mahasiswa" value="<?php echo $this->input->post('nama_mahasiswa'); ?>" class="form-control" id="nama_mahasiswa" />
							</div>
						</div>
					</div>
					</div>
					<div class="row clearfix">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label for="jk" class="control-label">Jenis Kelamin</label>
							<div class="form-group">
								<div class="form-line">
									<select name="jk" class="form-control">
										<option value="">Pilih </option>
										<?php 
										$jk_values = array(
																'L'=>'Laki-laki',
																'P'=>'Perempuan',
															);

										foreach($jk_values as $value => $display_text)
										{
											$selected = ($value == $this->input->post('jk')) ? ' selected="selected"' : "";

											echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
										} 
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label for="password" class="control-label">HP</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="hp" value="<?php echo $this->input->post('hp'); ?>" class="form-control" id="hp" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="password" class="control-label">Password</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="row clearfix">
                        
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

