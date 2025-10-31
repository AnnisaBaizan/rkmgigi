<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Listing
                </h2>
                <div class="header-dropdown">
                    <a href="<?php echo site_url('pasien_mahasiswa/add'); ?>" class="btn btn-success btn-sm">Tambah</a> 
                </div>
            </div>
            <div class="body table-responsive">
                <table id="data-table-simple" class="responsive-table display" cellspacing="0">
					<thead>
                    <tr>
						
						<th>NIK</th>
						<th>Nama </th>
						<th>JK</th>
						<th>Tanggal Lahir</th>
						<th>Hp </th>
						<th>Alamat </th>
						<th>Aksi</th>
                    </tr>
					</thead>
					<tbody>
                    <?php foreach($pasien as $t){ ?>
                    <tr>
						
						<td><?php echo $t['nik_pasien']; ?></td>
						<td><?php echo $t['nama_pasien']; ?></td>
						<td><?php echo $t['jk_pasien']; ?></td>
						<td><?php echo $t['tanggal_lahir_pasien']; ?></td>
						<td><?php echo $t['hp_pasien']; ?></td>
						<td><?php echo $t['alamat_pasien']; ?></td>
						<td>
                            <a href="<?php echo site_url('pasien_mahasiswa/edit/'.$t['id_pasien']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                        </td>
                    </tr>
                    <?php } ?>
					</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
