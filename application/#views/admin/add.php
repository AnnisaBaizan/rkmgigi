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
                <?php echo form_open('admin/add'); ?>
                    <div class="row clearfix">
                        
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="username" class="control-label">Username</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="username" value="<?php echo $this->input->post('username'); ?>" class="form-control" id="username" />
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

