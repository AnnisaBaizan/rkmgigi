<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    PENGINPUTAN PENDAFTARAN PRAKTIKUM
                </h2>
				<div class="header-dropdown">
				<?php if($_SESSION['level_admin']<>'pendaftaran'){ //su dan operator yang diizinkan ?>
                    <a href="<?php echo site_url('mahasiswa/add'); ?>" class="btn btn-success btn-sm">Tambah Mahasiswa</a> 
				<?php } ?>
					<a href="<?php echo site_url('pasien/add'); ?>" class="btn btn-info btn-sm">Tambah Pasien</a> 
                </div>
            </div>
            <div class="body">
				<?php 
					if(isset($_SESSION['error'])){
						echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
							<strong>'.$_SESSION['error'].'</strong>
						</div>';
					}else if(isset($_SESSION['success'])){
						echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
							<strong>'.$_SESSION['success'].'</strong>
						</div>';
					}
				?>
                <?php echo ($_cari==true ? "" : validation_errors()); ?>
                <?php echo form_open_multipart('pendaftaran_praktikum/add'); ?>
				<!-- <form method="POST" action="<?php echo base_url();?>pendaftaran_praktikum/add"  enctype="multipart/form-data"> -->
                    <div class="row clearfix">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="nim" class="control-label">Tahun Akademik*</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="id_konf" class="form-control" data-live-search="true" required>
                                            <option value="">Pilih</option>
                                            <?php 
                                            foreach($all_konfigurasi as $konf)
                                            {
                                                $selected = ($konf['id_konf'] == $this->input->post('id_konf')) ? ' selected="selected"' : "";

                                                echo '<option value="'.$konf['id_konf'].'" '.$selected.'>'.$konf['thn_akademik'].' - '.$konf['kd_semester'].'</option>';
                                            } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                        </div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="nim" class="control-label">Nama Mahasiswa*</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="nim" class="form-control" data-live-search="true" required>
                                            <option value="">Pilih</option>
                                            <?php 
                                            foreach($all_mahasiswa as $mahasiswa)
                                            {
                                                $selected = ($mahasiswa['nim'] == $this->input->post('nim')) ? ' selected="selected"' : "";

                                                echo '<option value="'.$mahasiswa['nim'].'" '.$selected.'>'.$mahasiswa['nim'].' - '.$mahasiswa['nama_mahasiswa'].'</option>';
                                            } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                        </div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="semester" class="control-label">Semester*</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="semester" class="form-control" data-live-search="true" required>
                                            <option value="">Pilih</option>
                                            <?php 
                                            for($i=1; $i<=8; $i++)
                                            {
                                                $selected = ($i == $this->input->post('semester')) ? ' selected="selected"' : "";

                                                echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
                                            } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                        </div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="kd_sub_praktikum" class="control-label">Sub Praktikum*</label>
							<div class="form-group">
								<div class="form-line">
									<select name="kd_sub_praktikum" class="form-control" data-live-search="true" required>
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
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nim" class="control-label">Nama Pasien*</label>
                            <div class="form-group">
                                <div class="form-line">
									<select name="nik" class="form-control" data-live-search="true" required>
										<option value="" >Pilih</option>
										<?php 
										foreach($all_pasien as $pasien)
										{
											$selected = ($pasien['nik_pasien'] == $this->input->post('nik')) ? ' selected="selected"' : "";

											echo '<option value="'.$pasien['nik_pasien'].'" '.$selected.'>'.$pasien['nik_pasien'].' - '.$pasien['nama_pasien'].'</option>';
										} 
										?>
									</select>
								</div>
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="kode_dosen" class="control-label">Dosen Pembimbing*</label>
							<div class="form-group">
								<div class="form-line">
									<select name="kode_dosen" class="form-control" data-live-search="true" required>
										<option value="">Pilih</option>
										<?php 
										foreach($all_dosen as $dosen)
										{
											$selected = ($dosen['kode_dosen'] == $this->input->post('kode_dosen')) ? ' selected="selected"' : "";

											echo '<option value="'.$dosen['kode_dosen'].'" '.$selected.'>'.$dosen['nama_dosen'].' - '.$dosen['kode_dosen'].'</option>';
										} 
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="tanggal_praktek" class="control-label">Tanggal Praktek*</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="date" name="tanggal_praktek" value="<?php echo ($this->input->post('tanggal_praktek') ? $this->input->post('tanggal_praktek') : ''); ?>" class="form-control" required />
								</div>
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="diagnosa_odontogram" class="control-label">Diagnosa Odontogram</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="file" name="diagnosa_odontogram" class="form-control" />
								</div>
                            </div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label for="diagnosa_pasien" class="control-label">Diagnosa pasien</label>
                            <div class="form-group">
                                <div class="form-line">
									<textarea id="editor1" name="diagnosa_pasien" class="form-control" ><?php echo ($this->input->post('diagnosa_pasien') ? $this->input->post('diagnosa_pasien') : ''); ?></textarea>
									
								</div>
                            </div>
						</div>
					</div>

                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <button type="submit" class="btn btn-success m-t-15 waves-effect">
                                <i class="fa fa-save"></i> Tambah Praktikum
                            </button>
                        </div>
                    </div>
                <?php echo form_close(); ?>  
				
				<div class="body table-responsive">
				
					<table id="table_pasien"  class="responsive-table display" cellspacing="0">
						<thead>
						<tr>
							<th>No</th>
							<th>Tanggal Praktek</th>
							<th>Tahun Akademik</th>
							<th>Semester</th>
							<th>NIM</th>
							<th>Nama Mahasiswa</th>
							<th>Praktikum</th>
							<th>Sub Praktikum</th>
							<th>Dosen Pembimbing</th>
							<th>Status Penilaian</th>
							<th>Actions</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace( 'editor1' );
</script>

<script src="<?php echo base_url('resources/js/jquery.min.js')?>"></script>
<script src="<?php echo base_url('resources/js/jquery.dataTables.min.js')?>"></script>
<script type="text/javascript">
    var table;
    $(document).ready(function() {

        //datatables
        table = $('#table_pasien').DataTable({ 

            "processing": true, 
            "serverSide": true, 
            "order": [], 
            
            "ajax": {
                "url": "<?php echo site_url('pendaftaran_praktikum/get_pendaftaran_praktikum')?>",
                "type": "POST"
            },

            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
        });
    });
</script>
