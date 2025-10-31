<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Mahasiswa
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
                    <div class="row clearfix">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label for="nim" class="control-label">NIM</label>
                                <div class="form-group">
                                    <div class="form-line">
										<?php echo $data_mahasiswa['nim'];?>
                                    </div>
                                </div>
                        </div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label for="nim" class="control-label">Nama Mahasiswa</label>
                                <div class="form-group">
                                    <div class="form-line">
										<?php echo $data_mahasiswa['nama_mahasiswa'];?>
                                    </div>
                                </div>
                        </div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label for="nim" class="control-label">Jenis Kelamin</label>
                                <div class="form-group">
                                    <div class="form-line">
										<?php echo ($data_mahasiswa['jk'] == "L" ? "Laki-laki" : "Perempuan");?>
                                    </div>
                                </div>
                        </div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label for="hp" class="control-label">HP</label>
                                <div class="form-group">
                                    <div class="form-line">
										<?php echo $data_mahasiswa['hp'];?>
                                    </div>
                                </div>
                        </div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label for="tahun_akademik" class="control-label">Tahun Akademik</label>
                                <div class="form-group">
                                    <div class="form-line">
										<?php echo $data_mahasiswa['thn_akademik']."-".$data_mahasiswa['kd_semester'];?>
                                    </div>
                                </div>
                        </div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="tahun_akademik" class="control-label">Nama Sub Praktikum</label>
                                <div class="form-group">
                                    <div class="form-line">
										<?php echo $data_mahasiswa['nama_praktikum']."-".$data_mahasiswa['nama_sub_praktikum'];?>
                                    </div>
                                </div>
                        </div>
					</div>
			</div>
		</div>
		
		<div class="card">
            <div class="header">
                <h2>
                    Listing Detail Nilai Mahasiswa <span class="alert alert-warning" style="padding:4px"><?php echo $data_mahasiswa['thn_akademik']."-".$data_mahasiswa['kd_semester'];?></span>
                </h2>
            </div>		
            <div class="body table-responsive">
                <table id="data-table-simple" class="responsive-table display" cellspacing="0">
					<thead>
                    <tr>
						<th>No</th>
						<th>Tanggal Praktek</th>
						<th>Pasien</th>
						<th>Dosen Pembimbing</th>
						<th>Nilai</th>
						<th>Status Penilaian</th>
						<th>Aksi</th>
                    </tr>
					</thead>
					<tbody>
                    <?php $no=0; $totalnilai=0; foreach($listing_mahasiswa as $t){ ?>
                    <tr>
						<td><?php $no++; echo $no;  ?></td>
						<td><?php echo konversi_tanggal($t['tanggal_praktek']); ?></td>
						<td><?php echo $t['nama_pasien']; ?></td>
						<td><?php echo $t['nama_dosen']; ?></td>
						<td><?php echo number_format(($t['nilai']),2,",","."); $totalnilai+=$t['nilai']; ?></td>
						<td><?php echo ($t['status']=="N" ? "<span class='alert alert-danger' style='padding:4px'>Belum dinilai</span>" : "<span class='alert alert-success' style='padding:4px'>Sudah dinilai</span>"); ?></td>
						<td>
							<?php 
							if(($t['kd_konfigurasi'] == $data_mahasiswa['kd_konfigurasi'])and($t['status']=="N")and($t['kode_dosen']==$_SESSION['kode_dosen'])){ ?>
							<a href="<?php echo site_url('dosen_mahasiswa/nilai_mahasiswa_input/'.$t['nim'].'/'.$t['kd_konfigurasi'].'/'.$t['kd_sub_praktikum'].'/'.$t['id_daftar_praktikum']); ?>" class="btn btn-primary btn-xs"><span class="fa fa-search"></span> Input Nilai</a>
							<?php } ?>
							<?php if(($t['kd_konfigurasi'] == $data_mahasiswa['kd_konfigurasi'])and($t['status']=="Y")and($t['kode_dosen']==$_SESSION['kode_dosen'])){ ?>
							<a href="<?php echo site_url('dosen_mahasiswa/nilai_mahasiswa_ubah/'.$t['nim'].'/'.$t['kd_konfigurasi'].'/'.$t['kd_sub_praktikum'].'/'.$t['id_daftar_praktikum']); ?>" class="btn btn-primary btn-xs"><span class="fa fa-search"></span> Ubah Nilai</a>
							<?php } ?>
							<a href="<?php echo site_url('dosen_mahasiswa/nilai_mahasiswa_cetak/'.$t['nim'].'/'.$t['kd_konfigurasi'].'/'.$t['kd_sub_praktikum'].'/'.$t['id_daftar_praktikum']); ?>" target="_blank" class="btn btn-danger btn-xs"><span class="fa fa-print"></span> Cetak</a>
                        </td>
                    </tr>
                    <?php } ?>	
					</tbody>
					<tfoot>
						<tr>
							<td colspan="3">Total = <?php echo $no; ?> kali praktikum</td>
							<td>Nilai rata-rata</td>
							<td><?php echo number_format(($totalnilai/$no),2,",",".");?></td>
							<td colspan="2"></td>
						</tr>
					</tfoot>
                </table>
            </div>
        </div>
		
    </div>
</div>
