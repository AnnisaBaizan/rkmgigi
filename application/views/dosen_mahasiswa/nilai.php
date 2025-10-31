<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Nilai 
                </h2>
            </div>
            <div class="body">

					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nim" class="control-label">NIM</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="nim" value="<?php echo ($this->input->post('nim') ? $this->input->post('nim') : $mahasiswa['nim']); ?>" class="form-control" id="nim" readonly />
								</div>
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nama_mahasiswa" class="control-label">Nama Mahasiswa</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="nama_mahasiswa" value="<?php echo ($this->input->post('nama_mahasiswa') ? $this->input->post('nama_mahasiswa') : $mahasiswa['nama_mahasiswa']); ?>" class="form-control" id="nama_mahasiswa" readonly />
								</div>
                            </div>
						</div>
					</div>
					<div class="row clearfix">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        		<label for="jk" class="control-label">Jenis Kelamin</label>
	                            <div class="form-group">
	                                <div class="form-line">
										<input type="text" name="jk" value="<?php echo ($this->input->post('jk') ? $this->input->post('jk') : ($mahasiswa['jk']='L' ? 'Laki-laki' : 'Perempuan') ); ?>" class="form-control" id="jk" readonly />
									</div>
								</div>
							</div>
                        	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        		<label for="kode_dosen" class="control-label">HP</label>
	                            <div class="form-group">
	                                <div class="form-line">
										<input type="text" name="hp" value="<?php echo ($this->input->post('hp') ? $this->input->post('hp') : $mahasiswa['hp']); ?>" class="form-control" id="hp" readonly />
									</div>
								</div>
							</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<table id="data-table-simple" class="responsive-table display" cellspacing="0">
							<thead>
								<tr>
									<th>Tahun<br />Akademik</th>
									<th>Kode<br />Semester</th>
									<th>Praktikum</th>
									<th>Sub<br />Praktikum</th>
									<th>Nilai</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								foreach($all_nilai as $nilai){
									echo "<tr>
										<td>$nilai[thn_akademik]</td>
										<td>$nilai[kd_semester]</td>
										<td>$nilai[nama_praktikum]</td>
										<td>$nilai[nama_sub_praktikum]</td>
										<td>".number_format($nilai['nilai'],2)."</td>
										<td>"; ?>
										<a href="<?php echo site_url('dosen_mahasiswa/detail/'.$nilai['nim'].'/'.$nilai['id_sub_praktikum'].'/'.$nilai['id_konf']); ?>" class="btn btn-primary btn-xs"><span class="fa fa-search"></span> Detail</a>
										<a href="<?php echo site_url('dosen_mahasiswa/prints/'.$nilai['nim'].'/'.$nilai['id_sub_praktikum'].'/'.$nilai['id_konf']); ?>" target="_blank" class="btn btn-danger btn-xs"><span class="fa fa-print"></span> Print</a>
										<?php 
										echo "</td>
									</tr>";
								}
							?>
							</tbody>
						</div>
					</div>
			</div>
        </div>
    </div>
</div>