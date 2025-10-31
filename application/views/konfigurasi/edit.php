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
				<?php echo form_open('konfigurasi/edit/'.$konfigurasi['id_konf']); ?>

					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="thn_akademik" class="control-label">Thn Akademik</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="thn_akademik" value="<?php echo ($this->input->post('thn_akademik') ? $this->input->post('thn_akademik') : $konfigurasi['thn_akademik']); ?>" class="form-control" id="thn_akademik" />
								</div>
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="kd_semester" class="control-label">Kd Semester</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="kd_semester" value="<?php echo ($this->input->post('kd_semester') ? $this->input->post('kd_semester') : $konfigurasi['kd_semester']); ?>" class="form-control" id="kd_semester" />
								</div>
                            </div>
						</div>
					</div>
					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        		<label for="status" class="control-label">Status</label>
	                            <div class="form-group">
	                                <div class="form-line">
										<select name="status" class="form-control">
											<option value="">select</option>
											<?php 
											$status_values = array(
						'A'=>'Aktif',
						'T'=>'Tidak Aktif',
					);

											foreach($status_values as $value => $display_text)
											{
												$selected = ($value == $konfigurasi['status']) ? ' selected="selected"' : "";

												echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
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
								<i class="fa fa-check"></i> Simpan
							</button>
				        </div>
					</div>
					
				<?php echo form_close(); ?>
			</div>
        </div>
    </div>
</div>