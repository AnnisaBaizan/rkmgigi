<script src="<?php echo site_url('resources/ckeditor/ckeditor.js');?>"></script>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Sub Aspek
                </h2>
            </div>
            <div class="body">
				<?php echo validation_errors(); ?>
				<?php echo form_open('sub_aspek/edit/'.$sub_aspek['id_sub_aspek']); ?>

					<div class="row clearfix">
                        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        		<label for="kd_aspek" class="control-label">Aspek</label>
	                            <div class="form-group">
	                                <div class="form-line">
										<select name="kd_aspek" class="form-control" data-live-search="true">
											<option value="">select aspek</option>
											<?php 
											foreach($all_aspek as $aspek)
											{
												$selected = ($aspek['id_aspek'] == $sub_aspek['kd_aspek']) ? ' selected="selected"' : "";

												echo '<option value="'.$aspek['id_aspek'].'" '.$selected.'>'.$aspek['nama_praktikum'].' - '.$aspek['nama_sub_praktikum'].' - '.$aspek['nama_aspek'].'</option>';
											} 
											?>
										</select>
									</div>
								</div>
							</div>
                    </div>
					<div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label for="nama_sub_aspek" class="control-label">Sub Aspek</label>
                            <div class="form-group">
                                <div class="form-line">
									<textarea name="nama_sub_aspek" class="form-control" id="editor1"><?php echo ($this->input->post('nama_sub_aspek') ? $this->input->post('nama_sub_aspek') : $sub_aspek['nama_sub_aspek']); ?></textarea>
									<script>
										// Replace the <textarea id="editor1"> with a CKEditor
										// instance, using default configuration.
										CKEDITOR.replace( 'editor1' );
									</script>
								</div>
                            </div>
						</div>
					</div>
					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="rentang_skor_awal" class="control-label">Rentang Skor Awal</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="rentang_skor_awal" value="<?php echo ($this->input->post('rentang_skor_awal') ? $this->input->post('rentang_skor_awal') : $sub_aspek['rentang_skor_awal']); ?>" class="form-control" id="rentang_skor_awal" />
								</div>
                            </div>
						</div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="rentang_skor_akhir" class="control-label">Rentang Skor Akhir</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="rentang_skor_akhir" value="<?php echo ($this->input->post('rentang_skor_akhir') ? $this->input->post('rentang_skor_akhir') : $sub_aspek['rentang_skor_akhir']); ?>" class="form-control" id="rentang_skor_akhir" />
								</div>
                            </div>
						</div>
					</div>
					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="bobot" class="control-label">Bobot</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="bobot" value="<?php echo ($this->input->post('bobot') ? $this->input->post('bobot') : $sub_aspek['bobot']); ?>" class="form-control" id="bobot" />
								</div>
                            </div>
						</div>
					</div>
					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<button type="submit" class="btn btn-success m-t-15 waves-effect">
								<i class="fa fa-check"></i> Save
							</button>
				        </div>
					</div>
					
				<?php echo form_close(); ?>
			</div>
        </div>
    </div>
</div>