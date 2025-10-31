<?php 
	function konversi($angka)
	{
		return strrev(implode('.',str_split(strrev(strval($angka)),3)));
	}
?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Biodata 
                </h2>
            </div>
            <div class="body">

					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nim" class="control-label">NIK Pasien</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="nik_pasien" value="<?php echo ($this->input->post('nik_pasien') ? $this->input->post('nik_pasien') : $info['nik_pasien']); ?>" class="form-control" id="nik_pasien" readonly />
								</div>
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nama_mahasiswa" class="control-label">Nama Mahasiswa</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="nama_mahasiswa" value="<?php echo ($this->input->post('nama_mahasiswa') ? $this->input->post('nama_mahasiswa') : $info['nama_mahasiswa']); ?>" class="form-control" id="nama_mahasiswa" readonly />
								</div>
                            </div>
						</div>
					</div>
					<div class="row clearfix">
                       
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nama_mahasiswa" class="control-label">Nama Pasien</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="nama_pasien" value="<?php echo ($this->input->post('nama_pasien') ? $this->input->post('nama_pasien') : $info['nama_pasien']); ?>" class="form-control" id="nama_pasien" readonly />
								</div>
                            </div>
						</div>
						 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nim" class="control-label">NIM</label>
                            <div class="form-group">
                                <div class="form-line">
									<input type="text" name="nim" value="<?php echo ($this->input->post('nim') ? $this->input->post('nim') : $info['nim']); ?>" class="form-control" id="nim" readonly />
								</div>
                            </div>
						</div>
					</div>
					<div class="row clearfix">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        		<label for="jk" class="control-label">Tanggal Lahir / Jenis Kelamin</label>
	                            <div class="form-group">
	                                <div class="form-line">
										<input type="text" name="jk_pasien" value="<?php echo ($this->input->post('jk_pasien') ? $this->input->post('jk_pasien') :   substr($info['tanggal_lahir_pasien'],8,2)."-".substr($info['tanggal_lahir_pasien'],5,2)."-".substr($info['tanggal_lahir_pasien'],0,4)." / ".$info['jk_pasien']); ?>" class="form-control" id="jk_pasien" readonly />
									</div>
								</div>
							</div>
                        	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        		<label for="kode_dosen" class="control-label">Dosen Pembimbing</label>
	                            <div class="form-group">
	                                <div class="form-line">
										<input type="text" name="nama_dosen" value="<?php echo ($this->input->post('nama_dosen') ? $this->input->post('nama_dosen') : $info['nama_dosen']); ?>" class="form-control" id="nama_dosen" readonly />
									</div>
								</div>
							</div>
					</div>
					<div class="row clearfix">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        		<label for="diagnosa" class="control-label">Diagnosa Pasien</label>
	                            <div class="form-group">
	                                <div class="form-line">
										<input type="text" name="diagnosa" value="<?php echo ($this->input->post('diagnosa') ? $this->input->post('diagnosa') :   $info['diagnosa']); ?>" class="form-control" id="diagnosa" readonly />
									</div>
								</div>
							</div>
					</div>
					<div class="row clearfix">
					<?php 
						echo "<p style='text-align:center; font-weight:bold'>PENILAIAN PRAKTEK<br />
						$info[nama_praktikum]<br />
						$info[nama_sub_praktikum]</p>";
					?>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<table class="table display" cellspacing="0">
							<thead>
								<tr>
									<th>NO</th>
									<th>ASPEK</th>
									<th>TAHAP PENGUKURAN</th>
									<th>RENTANG<br />SKOR</th>
									<th>ANGKA<br />PEROLEHAN</th>
									<th>BOBOT</th>
									<th>NILAI<br />AKHIR</th>
									<th>KET</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$no=1;
								$skor_maks=0; $angka_perolehan=0; $bobot=0; $nilaiakhir=0;
								foreach($detail_nilai as $nilai){
									echo "<tr>
										<td>$no</td>
										<td>$nilai[nama_aspek]</td>
										<td>$nilai[nama_sub_aspek]</td>
										<td>$nilai[rentang_skor_awal]-$nilai[rentang_skor_akhir]</td>
										<td>$nilai[angka_perolehan]</td>
										<td>$nilai[bobot]</td>
										<td>
										(($nilai[angka_perolehan] / $nilai[rentang_skor_akhir]) x $nilai[bobot]) = <br />
										".(($nilai['angka_perolehan']/$nilai['rentang_skor_akhir'])*$nilai['bobot'])."</td>
										<td></td>
									</tr>";
									$skor_maks+=$nilai['rentang_skor_akhir'];
									$angka_perolehan+=$nilai['angka_perolehan'];
									$bobot+=$nilai['bobot'];
									$nilaiakhir+=(($nilai['angka_perolehan']/$nilai['rentang_skor_akhir'])*$nilai['bobot']);
									$no++;
								}
								echo "<tr align='center'>
										<td></td>
										<td></td>
										<td></td>
										<td>$skor_maks</td>
										<td>$angka_perolehan</td>
										<td>$bobot</td>
										<td>".number_format($nilaiakhir,2)."</td>
										<td></td>
									</tr>";
								echo "<tr align='center'>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td><b>".number_format((($nilaiakhir/$bobot)*100),2)."</b></td>
										<td></td>
									</tr>";	
							?>
							</tbody>
						</div>
					</div>
			</div>
        </div>
    </div>
</div>