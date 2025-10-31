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
				<?php echo form_open('aspek/edit/'.$aspek['id_aspek']); ?>

					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nama_aspek" class="control-label">Nama Aspek</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="nama_aspek" value="<?php echo ($this->input->post('nama_aspek') ? $this->input->post('nama_aspek') : $aspek['nama_aspek']); ?>" class="form-control" id="nama_aspek" />
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
											$selected = ($sub_praktikum['id_sub_praktikum'] == $aspek['kd_sub_praktikum']) ? ' selected="selected"' : "";

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