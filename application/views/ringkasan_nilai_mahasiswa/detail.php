<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Nilai 
                </h2>
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
				<?php //echo form_open_multipart("ringkasan_nilai_mahasiswa/detail/$x_nim/$x_kd_sub_praktikum/$x_ta"); ?>
					<div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nim" class="control-label">NIM</label>
                            <div class="form-group">
                                <div class="form-line">
									<?php echo $data_mahasiswa['nim']; ?>
								</div>
								<input type="hidden" name="id_daftar_praktikum" value="<?php echo ($this->input->post('id_daftar_praktikum') ? $this->input->post('id_daftar_praktikum') : $data_mahasiswa['id_daftar_praktikum']); ?>" class="form-control" required />
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
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<label for="jk" class="control-label">Jenis Kelamin</label>
							<div class="form-group">
								<div class="form-line">
									<?php echo ($data_mahasiswa['jk']=="L" ? "Laki-laki" : "Perempuan"); ?>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<label for="kode_dosen" class="control-label">HP</label>
							<div class="form-group">
								<div class="form-line">
									<?php echo $data_mahasiswa['hp']; ?>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="thn_akademik" class="control-label">Tahun Akademik</label>
							<div class="form-group">
								<div class="form-line">
									<?php echo $data_mahasiswa['thn_akademik']."-".$data_mahasiswa['kd_semester']; ?>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="nama_sub_praktikum" class="control-label">Nama Sub Praktikum</label>
							<div class="form-group">
								<div class="form-line">
									<?php echo $data_mahasiswa['nama_praktikum']." - ".$data_mahasiswa['nama_sub_praktikum']; ?>
								</div>
							</div>
						</div>
						<!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="diagnosa_odontogram" class="control-label">Diagnosa Odontogram 
							<?php echo ($data_mahasiswa['diagnosa_odontogram'] != "" ? " (<a href='".base_url("diagnosa/$data_mahasiswa[diagnosa_odontogram]")."' target='_blank'>Lampiran</a>)" : null);?>
							</label>
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
									<textarea id="editor1" name="diagnosa_pasien" class="form-control" ><?php echo ($this->input->post('diagnosa_pasien') ? $this->input->post('diagnosa_pasien') : $data_mahasiswa['diagnosa_pasien']); ?></textarea>
									
								</div>
							</div>
						</div> -->
					</div>
					<!-- <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <button type="submit" class="btn btn-success m-t-15 waves-effect">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                        </div>
                    </div> -->
					<?php //echo form_close(); ?>  

					<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<table id="data-table-simple" class="responsive-table display" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Tanggal Praktek</th>
									<th>Dosen Pembimbing</th>
									<th>Nilai</th>
									<th>Status Input Nilai</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$no=0; $jumlah_nilai=0;
								foreach($all_nilai as $nilai){
									$no++;
									echo "<tr>
										<td>$no</td>
										<td>".konversi_tanggal($nilai['tanggal_praktek'])."</td>
										<td>$nilai[nama_dosen]</td>
										<td>".number_format($nilai['nilai'],2)."</td>
										<td>".($nilai['nilai'] <> NULL ? '<span class="alert alert-success" style="padding:4px">Sudah dinilai</span>' : '<span class="alert alert-danger" style="padding:4px">Belum dinilai</span>')."</td>
										<td>
										<a href='".base_url("ringkasan_nilai_mahasiswa/upload/$x_nim/$x_kd_sub_praktikum/$x_ta/$nilai[id_daftar_praktikum]")."' class='btn btn-primary'>Upload</a>
										"; 
										if($nilai['nilai'] <> NULL){ ?>
										<a href="<?php echo site_url('ringkasan_nilai_mahasiswa/cetak/'.$nilai['nim'].'/'.$nilai['kd_konfigurasi'].'/'.$nilai['kd_sub_praktikum'].'/'.$nilai['id_daftar_praktikum']); ?>" target="_blank" class="btn btn-danger btn-xs"><span class="fa fa-print"></span> Cetak</a>
										<?php 
										}
										echo "</td>
									</tr>";
									$jumlah_nilai += number_format($nilai['nilai'],2);
								}
								$nilai_rata_akhir = number_format(($jumlah_nilai/$no),2);
								//echo "tes".$no;
							?>
							</tbody>
							<tfoot>
								<tr style="background-color:#DDDDDD">
									<td colspan="2">Total = <?php echo $no;?> kali praktikum</td>
									<td>Nilai rata-rata sub praktikum =</td>
									<td><?php echo $nilai_rata_akhir;?></td>
									<td><?php echo ($nilai_rata_akhir >= 70 ? "<span class='alert alert-success' style='padding:4px'>Memenuhi</span>":"<span class='alert alert-danger' style='padding:4px'>Tidak Memenuhi</span>");?></td>
									<td></td>
								</tr>
							</tfoot>
							</table>
						</div>
					</div>
			</div>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace( 'editor1' );
</script>
