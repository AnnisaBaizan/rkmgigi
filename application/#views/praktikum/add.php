<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Add
                </h2>
            </div>
            <div class="body">
                <?php echo validation_errors(); ?>
                <?php echo form_open('praktikum/add'); ?>
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="nama_praktikum" class="control-label">Nama Praktikum</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="nama_praktikum" value="<?php echo $this->input->post('nama_praktikum'); ?>" class="form-control" id="nama_praktikum" />
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

