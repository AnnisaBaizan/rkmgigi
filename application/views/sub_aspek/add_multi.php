
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <button type="submit" class="btn btn-primary m-t-15 waves-effect" onclick="addMoreRows(this.form);">
					<i class="fa fa-plus"></i> Add Row
				</button>
            </div>
            <div class="body">
				<script type="text/javascript">
				var rowCount = 1;
				function addMoreRows(frm) {
				rowCount ++;
				document.getElementById("jumlah").value = rowCount;
				var recRow = '<div id="rowCount'+rowCount+'" class="row clearfix"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class="form-group"><div class="form-line"><input name="nama_sub_aspek'+rowCount+'" type="text" class="form-control" /></div></div></div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><div class="form-group"><div class="form-line"><input name="rentang_skor_awal'+rowCount+'" type="text" class="form-control" /></div></div></div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><div class="form-group"><div class="form-line"><input name="rentang_skor_akhir'+rowCount+'" type="text" class="form-control" /></div></div></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"><div class="form-group"><div class="form-line"><input name="bobot'+rowCount+'" type="text" class="form-control" /></div></div></div> <a href="javascript:void(0);" onclick="removeRow('+rowCount+');" class="btn btn-danger m-t-15 waves-effect">Delete</a></div>';
				jQuery('#addedRows').append(recRow);
				}

				function removeRow(removeNum) {
					jQuery('#rowCount'+removeNum).remove();
					rowCount = rowCount - 1;
					document.getElementById("jumlah").value = rowCount;
				}
				</script>
			
                <?php 
					if(validation_errors() <> false){
						echo '<div class="alert alert-danger"><strong>Peringatan!</strong><br />';
						echo validation_errors();
						echo '</div>';
					} 
				?>
                <?php echo form_open('sub_aspek/add_multi'); ?>
                    <div class="row clearfix">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="kd_aspek" class="control-label">Aspek</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="kd_aspek1" class="form-control" data-live-search="true">
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
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="nama_sub_aspek" class="control-label">Sub Aspek</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="nama_sub_aspek1" value="<?php echo $this->input->post('nama_sub_aspek'); ?>" class="form-control" id="nama_sub_aspek" />
									<!--<textarea name="nama_sub_aspek1" class="form-control" id="nama_sub_aspek"><?php echo $this->input->post('nama_sub_aspek'); ?></textarea>-->
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label for="rentang_skor_awal" class="control-label">Skor Awal</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="rentang_skor_awal1" value="<?php echo $this->input->post('rentang_skor_awal'); ?>" class="form-control" id="rentang_skor_awal" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label for="rentang_skor_akhir" class="control-label">Skor Akhir</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="rentang_skor_akhir1" value="<?php echo $this->input->post('rentang_skor_akhir'); ?>" class="form-control" id="rentang_skor_akhir" />
                                </div>
                            </div>
                        </div>
					
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                            <label for="bobot" class="control-label">Bobot</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="bobot1" value="<?php echo $this->input->post('bobot'); ?>" class="form-control" id="bobot" />
                                </div>
                            </div>
                        </div> 
						
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                            <input type="text" readonly name="jumlah" id="jumlah" value="1" class="form-control"/>
                        </div> 
					</div>
					
					<div id="addedRows"></div>
					
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


