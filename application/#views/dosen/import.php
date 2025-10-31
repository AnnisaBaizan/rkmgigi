<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Import
                </h2>
            </div>
            <div class="body">

					<?php echo validation_errors(); ?>
					<form method="POST" action="<?php echo base_url();?>dosen/import"  enctype="multipart/form-data">

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="userfile" class="control-label">File Excel</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="file" name="userfile"  class="form-control" id="userfile" />
                                </div>
                            </div>
                        </div>
						<div class="row clearfix">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<button type="submit" class="btn btn-success m-t-15 waves-effect" name="submit">
									<i class="fa fa-check"></i> Save
								</button>
							</div>
						</div>
						
						
					</form>

					</div>
        </div>
    </div>
</div>