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
                <?php echo form_open('dosen/add'); ?>
                    <div class="row clearfix">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="kode_dosen" class="control-label">Kode Dosen</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="kode_dosen" value="<?php echo $this->input->post('kode_dosen'); ?>" class="form-control" id="kode_dosen" />
                                </div>
                            </div>
                        </div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="nama_dosen" class="control-label">Nama Dosen</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="nama_dosen" value="<?php echo $this->input->post('nama_dosen'); ?>" class="form-control" id="nama_dosen" />
                                </div>
                            </div>
                        </div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="jk" class="control-label">Jenis Kelamin</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="jk" class="form-control">
                                            <option value="">select</option>
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
                            </div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="level" class="control-label">Level Pengguna</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="level" class="form-control">
                                            <option value="">select</option>
                                            <?php 
                                            $level_values = array(
						'1'=>'Dosen',
						'2'=>'Kaprodi',
					);

                                            foreach($level_values as $value => $display_text)
                                            {
                                                $selected = ($value == $this->input->post('level')) ? ' selected="selected"' : "";

                                                echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                                            } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
					</div>
					<div class="row clearfix">
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

