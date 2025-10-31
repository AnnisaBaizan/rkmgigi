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
									<?php echo $data_mahasiswa['nim']; ?>
								</div>
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nama_mahasiswa" class="control-label">Nama Mahasiswa</label>
                            <div class="form-group">
                                <div class="form-line">
									<?php echo $data_mahasiswa['nama_mahasiswa']; ?>
								</div>
                            </div>
						</div>
					</div>
					<div class="row clearfix">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        		<label for="jk" class="control-label">Jenis Kelamin</label>
	                            <div class="form-group">
	                                <div class="form-line">
										<?php echo ($data_mahasiswa['jk']=="L" ? "Laki-laki" : "Perempuan"); ?>
									</div>
								</div>
							</div>
                        	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        		<label for="kode_dosen" class="control-label">HP</label>
	                            <div class="form-group">
	                                <div class="form-line">
										<?php echo $data_mahasiswa['hp']; ?>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        		<label for="kode_dosen" class="control-label">Tahun Akademik</label>
	                            <div class="form-group">
	                                <div class="form-line">
										<?php echo $data_mahasiswa['thn_akademik']."-".$data_mahasiswa['kd_semester']; ?>
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
									<th>Praktikum</th>
									<th>Sub<br />Praktikum</th>
									<th>Nilai Rata-rata</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$no=0;$sub_praktikum_memenuhi=0;$jumlah_nilai=0;
								foreach($all_nilai as $nilai){
									$no++;
									echo "<tr>
										<td>$nilai[thn_akademik]-$nilai[kd_semester]</td>
										<td>$nilai[nama_praktikum]</td>
										<td>$nilai[nama_sub_praktikum]</td>
										<td>".number_format($nilai['nilai_rata'],2)."</td>
										<td>".(number_format($nilai['nilai_rata'],2) >= 70 ? '<span class="alert alert-success" style="padding:4px">Memenuhi</span>' : '<span class="alert alert-danger" style="padding:4px">Tidak memenuhi</span>')."</td>
										<td>"; ?>
										<a href="<?php echo site_url('ringkasan_mahasiswa/detail/'.$nilai['nim'].'/'.$nilai['kd_sub_praktikum'].'/'.$nilai['kd_konfigurasi']); ?>" class="btn btn-primary btn-xs"><span class="fa fa-search"></span> Detail</a>
										<?php 
										echo "</td>
									</tr>";
									$jumlah_nilai += number_format($nilai['nilai_rata'],2);
									if(number_format($nilai['nilai_rata'],2) >= 70){
										$sub_praktikum_memenuhi+= 1;
									}
								}
								$total_sub_praktikum = 26;
								$nilai_rata_akhir = number_format(($jumlah_nilai/$total_sub_praktikum),2);
							?>
							</tbody>
							<tfoot>
								<td colspan="3">Total = <?php echo $sub_praktikum_memenuhi; ?> sub praktikum yang memenuhi dari <?php echo $total_sub_praktikum; ?> sub praktikum</td>
								<td>Nilai rata-rata</td>
								<td><?php echo $nilai_rata_akhir; ?></td>
								<td><?php echo ($nilai_rata_akhir >= 70 ? "Lulus" : "Tidak lulus"); ?></td>
								<td></td>
							</tfoot>
						</div>
					</div>
			</div>
        </div>
    </div>
</div>
