<script src="<?php echo site_url('resources/ckeditor/ckeditor.js');?>"></script>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Add
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
                <?php echo form_open('sub_aspek/add'); ?>
                    <div class="row clearfix"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="kd_aspek" class="control-label">Aspek</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="kd_aspek" class="form-control" data-live-search="true">
                                            <option value="">Pilih</option>
                                            <?php 
                                            foreach($all_aspek as $aspek)
                                            {
                                                $selected = ($aspek['id_aspek'] == $this->input->post('kd_aspek')) ? ' selected="selected"' : "";

                                                echo '<option value="'.$aspek['id_aspek'].'" '.$selected.'>'.$aspek['nama_praktikum'].' - '.$aspek['nama_sub_praktikum'].' - '.$aspek['nama_aspek'].'</option>';
                                            } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="nama_sub_aspek" class="control-label">Sub Aspek</label>
                            <div class="form-group">
                                <div class="form-line">
									<textarea name="nama_sub_aspek" class="ckeditor" id="editor1"><?php echo $this->input->post('nama_sub_aspek'); ?></textarea>
									<script>
										// Replace the <textarea id="editor1"> with a CKEditor
										// instance, using default configuration.
										CKEDITOR.replace( 'nama_sub_aspek' );
										CKEDITOR.add;
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
                                    <input type="text" name="rentang_skor_awal" value="<?php echo $this->input->post('rentang_skor_awal'); ?>" class="form-control" id="rentang_skor_awal" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="rentang_skor_akhir" class="control-label">Rentang Skor Akhir</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="rentang_skor_akhir" value="<?php echo $this->input->post('rentang_skor_akhir'); ?>" class="form-control" id="rentang_skor_akhir" />
                                </div>
                            </div>
                        </div>
					</div>
					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="bobot" class="control-label">Bobot</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="bobot" value="<?php echo $this->input->post('bobot'); ?>" class="form-control" id="bobot" />
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

