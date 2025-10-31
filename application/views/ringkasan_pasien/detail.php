<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    SUB PRAKTIKUM PASIEN
                </h2>
            </div>
            <div class="body">

					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nim" class="control-label">Tahun Akademik</label>
                            <div class="form-group">
                                <div class="form-line">
									<?php echo $data_pasien['thn_akademik']."-".$data_pasien['kd_semester']; ?>
								</div>
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nama_mahasiswa" class="control-label">Nama Pasien</label>
                            <div class="form-group">
                                <div class="form-line">
								<?php echo $data_pasien['nama_pasien']; ?>
								</div>
                            </div>
						</div>
					</div>
					<div class="row clearfix">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        		<label for="jk" class="control-label">Jenis Kelamin</label>
	                            <div class="form-group">
	                                <div class="form-line">
										<?php echo ($data_pasien['jk_pasien']=="L" ? "Laki-laki" : "Perempuan"); ?>
									</div>
								</div>
							</div>
                        	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        		<label for="kode_dosen" class="control-label">HP</label>
	                            <div class="form-group">
	                                <div class="form-line">
										<?php echo $data_pasien['hp_pasien']; ?>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        		<label for="kode_dosen" class="control-label">Nama Dosen</label>
	                            <div class="form-group">
	                                <div class="form-line">
										<?php echo $data_pasien['nama_dosen']; ?>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        		<label for="nama_sub_praktikum" class="control-label">Nama Sub Praktikum</label>
	                            <div class="form-group">
	                                <div class="form-line">
										<?php echo $data_pasien['nama_praktikum']." - ".$data_pasien['nama_sub_praktikum']; ?>
									</div>
								</div>
							</div>
					</div>
					<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<table id="data-table-simple" class="responsive-table display" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Tanggal Praktek</th>
									<th>NIM</th>
									<th>Nama Mahasiswa</th>
									<th>Semester</th>
									<th>Dosen Pembimbing</th>
									<th>Nilai</th>
									<th>Status Penilaian</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$no=0; $jumlah_nilai=0;
								foreach($all_praktikum as $praktikum){
									$no++;
									echo "<tr>
										<td>$no</td>
										<td>".konversi_tanggal($praktikum['tanggal_praktek'])."</td>
										<td>$praktikum[nim]</td>
										<td>$praktikum[nama_mahasiswa]</td>
										<td>$praktikum[semester]</td>
										<td>$praktikum[nama_dosen]</td>
										<td>$praktikum[nilai]</td>
										<td>".($praktikum['status']=="N" ? "<span class='alert alert-danger' style='padding:4px'>Belum</span>" : "<span class='alert alert-success' style='padding:4px'>Sudah</span>")."</td>
										<td>"; ?>
										<a href="<?php echo site_url('ringkasan_pasien/cetak/'.$praktikum['nim'].'/'.$praktikum['kd_konfigurasi'].'/'.$praktikum['kd_sub_praktikum'].'/'.$praktikum['id_daftar_praktikum']); ?>" target="_blank" class="btn btn-danger btn-xs"><span class="fa fa-print"></span> Cetak</a>
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
