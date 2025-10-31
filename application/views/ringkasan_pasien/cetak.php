<table width="100%">
	<tr>
		<td width="15%"><img src="<?=base_url('resources/img/logo_baru.png');?>" width="150px" /></td>
		<td width="70%" align="center">
			<font size="5px">KEMENTERIAN KESEHATAN RI</font><br />
			<font size="4px">BADAN PENGEMBANGAN DAN PEMBERDAYAAN</font><br />
			<font size="4px">SUMBER DAYA MANUSIA KESEHATAN</font><br />
			<font size="3px">POLITEKNIK KESEHATAN PALEMBANG</font><br />
			<font size="2px">Jalan Jenderal Sudirman KM 3,5 Nomor 1365 Samping Masjid Ash-Shofa<br />
			Komplek RS Moh. Hoesin Palembang 30126 Telepon/Faksimil (0711) 373104<br />
			Website : www.poltekkespalembang.ac.id Email : poltekkes_palembang@yahoo.com</font>
		</td>
		<td width="15%"><img src="<?=base_url('resources/img/logo.jpg');?>" width="100px" /></td>
	</tr>
	<tr>
		<td colspan="3" align="center">
		<font size="2px">Telepon: Jurusan Keperawatan Palembang (0711) 351081 Prodi Keperawatan Baturaja (0735) 320533 Prodi Keperawatan Lubuk Linggau <br />
		(0733) 451036 Jurusan Gizi (0711) 7064289 Jurusan Kebidanan (0711) 360952 Jurusan Farmasi (0711) 352071<br />
		Jurusan Keperawatan Gigi (0711) 440142 Jurusan Analis Kesehatan (0711) 419064</font>
		</td>
	</tr>
</table>
<hr />
					<?php 
						echo "<p style='text-align:center; font-weight:bold'>PENILAIAN PRAKTEK<br />
						$info[nama_praktikum]<br />
						$info[nama_sub_praktikum]</p>";
					?>
					<table width="100%">
						<tr>
							<td>NIK Pasien</td>
							<td><?=$info['nik_pasien'];?></td>
							<td>Nama Mahasiswa</td>
							<td><?=$info['nama_mahasiswa'];?></td>
						</tr>
						<tr>
							<td>Nama Pasien</td>
							<td><?=$info['nama_pasien'];?></td>
							<td>NIM</td>
							<td><?=$info['nim'];?></td>
						</tr>
						<tr>
							<td>Tanggal Lahir / JK</td>
							<td><?=substr($info['tanggal_lahir_pasien'],8,2)."-".substr($info['tanggal_lahir_pasien'],5,2)."-".substr($info['tanggal_lahir_pasien'],0,4)." / ".$info['jk_pasien'];?></td>
							<td>Dosen Pembimbing</td>
							<td><?=$info['nama_dosen'];?></td>
						</tr>
						<tr>
							<td>Diagnosa Pasien</td>
							<td colspan="3"><?=$info['diagnosa'];?></td>
						</tr>
					</table>
					<br />
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<table width="100%" border="1" class="table display" cellspacing="0"  style="border-collapse:collapse; font-size:10px">
							<thead>
								<tr>
									<th width="5%">NO</th>
									<th width="15%">ASPEK</th>
									<th width="40%">TAHAP PENGUKURAN</th>
									<th width="10%">RENTANG<br />SKOR</th>
									<th width="10%">ANGKA<br />PEROLEHAN</th>
									<th width="5%">BOBOT</th>
									<th width="15%">NILAI<br />AKHIR</th>
									
								</tr>
							</thead>
							<tbody>
							<?php 
								$no=1;
								$skor_maks=0; $angka_perolehan=0; $bobot=0; $nilaiakhir=0;
								foreach($detail_nilai as $nilai){
									echo "<tr align='center' valign='top'>
										<td>$no</td>
										<td>$nilai[nama_aspek]</td>
										<td align='left'>$nilai[nama_sub_aspek]</td>
										<td>$nilai[rentang_skor_awal]-$nilai[rentang_skor_akhir]</td>
										<td>$nilai[angka_perolehan]</td>
										<td>$nilai[bobot]</td>
										<td>
										(($nilai[angka_perolehan] / $nilai[rentang_skor_akhir]) x $nilai[bobot]) = <br />
										".number_format((($nilai['angka_perolehan']/$nilai['rentang_skor_akhir'])*$nilai['bobot']),2)."</td>
										
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
										
									</tr>";
								echo "<tr align='center'>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td><b>".number_format((($nilaiakhir/$bobot)*100),2)."</b></td>
										
									</tr>";	
							?>
							</tbody>
							</table>
<table width="100%">
	<tr>
		<td width="70%"></td>
		<td width="30%">Palembang,</td>
	</tr>
	<tr>
		<td width="70%"></td>
		<td width="30%">Pembimbing</td>
	</tr>
	<tr>
		<td width="70%"></td>
		<td width="30%">&nbsp;</td>
	</tr>
	<tr>
		<td width="70%"></td>
		<td width="30%">&nbsp;</td>
	</tr>
	<tr>
		<td width="70%"></td>
		<td width="30%">&nbsp;</td>
	</tr>
	<tr>
		<td width="70%"></td>
		<td width="30%"><b><?=$info['nama_dosen'];?></b></td>
	</tr>
	<tr>
		<td width="70%"></td>
		<td width="30%">NIP. <?=$info['kode_dosen'];?></td>
	</tr>
</table>	
	