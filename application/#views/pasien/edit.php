	<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Edit
                </h2>
            </div>
            <div class="body">
				<?php 
					
					
					if(isset($_SESSION['success'])){
						echo '<div class="alert alert-success"><strong>Informasi</strong><br />';
						echo $_SESSION['success'];
						echo '</div>';
					}
					
					if(validation_errors() <> false){
						echo '<div class="alert alert-danger"><strong>Peringatan!</strong><br />';
						echo validation_errors();
						echo '</div>';
					}
				?>
				<?php echo form_open('pasien/edit/'.$pasien['id_pasien']); ?>

					<div class="row clearfix">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nik_pasien" class="control-label">NIK Pasien</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="nik_pasien" value="<?php echo ($this->input->post('nik_pasien') ? $this->input->post('nik_pasien') : $pasien['nik_pasien']); ?>" class="form-control" id="nik_pasien" readonly />
								</div>
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nama_pasien" class="control-label">Nama Pasien</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="nama_pasien" value="<?php echo ($this->input->post('nama_pasien') ? $this->input->post('nama_pasien') : $pasien['nama_pasien']); ?>" class="form-control" id="nama_pasien" />
								</div>
                            </div>
						</div>
					</div>
					<div class="row clearfix">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        		<label for="jk_pasien" class="control-label">JK Pasien</label>
	                            <div class="form-group">
	                                <div class="form-line">
										<select name="jk_pasien" class="form-control">
											<option value="">select</option>
											<?php 
											$jk_pasien_values = array(
						'L'=>'Laki-laki',
						'P'=>'Perempuan',
					);

											foreach($jk_pasien_values as $value => $display_text)
											{
												$selected = ($value == $pasien['jk_pasien']) ? ' selected="selected"' : "";

												echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
											} 
											?>
										</select>
									</div>
								</div>
						</div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="tanggal_lahir_pasien" class="control-label">Tanggal Lahir Pasien</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="tanggal_lahir_pasien" value="<?php echo ($this->input->post('tanggal_lahir_pasien') ? $this->input->post('tanggal_lahir_pasien') : $pasien['tanggal_lahir_pasien']); ?>" class="form-control" id="tanggal_lahir_pasien" />
								</div>
                            </div>
						</div>
					</div>
					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="hp_pasien" class="control-label">Hp Pasien</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="hp_pasien" value="<?php echo ($this->input->post('hp_pasien') ? $this->input->post('hp_pasien') : $pasien['hp_pasien']); ?>" class="form-control" id="hp_pasien" />
								</div>
                            </div>
						</div>
                    
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        	<label for="alamat_pasien" class="control-label">Alamat Pasien</label>
                            <div class="form-group">
                                <div class="form-line">
									<textarea name="alamat_pasien" class="form-control" id="alamat_pasien"><?php echo ($this->input->post('alamat_pasien') ? $this->input->post('alamat_pasien') : $pasien['alamat_pasien']); ?></textarea>
								</div>
                            </div>
						</div>
					</div>
					
					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<button type="submit" class="btn btn-success m-t-15 waves-effect">
								<i class="fa fa-check"></i> Simpan
							</button>
							<a href="<?=base_url('pasien');?>">
							<button type="button" class="btn btn-primary m-t-15 waves-effect">
								<i class="fa fa-check"></i> Kembali
							</button>
							</a>
				        </div>
					</div>
					
				<?php echo form_close(); ?>
			</div>
        </div>
    </div>
</div>