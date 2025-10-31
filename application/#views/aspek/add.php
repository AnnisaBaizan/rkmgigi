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
						echo '<div class="alert alert-danger">
							<strong>'.$_SESSION['error'].'</strong>
						</div>';
					}else if(isset($_SESSION['success'])){
						echo '<div class="alert alert-success">
							<strong>'.$_SESSION['success'].'</strong>
						</div>';
					}
					if(validation_errors() <> false){
						echo '<div class="alert alert-danger"><strong>Peringatan!</strong><br />';
						echo validation_errors();
						echo '</div>';
					} 
				?>
                <?php echo form_open('aspek/add'); ?>
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="nama_aspek" class="control-label">Nama Aspek</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="nama_aspek" value="<?php echo $this->input->post('nama_aspek'); ?>" class="form-control" id="nama_aspek" />
                                </div>
                            </div>
                        </div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="kd_praktikum" class="control-label">Nama Sub Praktikum</label>
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

