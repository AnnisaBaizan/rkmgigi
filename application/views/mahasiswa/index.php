<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Listing
                </h2>
                <div class="header-dropdown">
                    <a href="<?php echo site_url('mahasiswa/add'); ?>" class="btn btn-success btn-sm">Tambah Mahasiswa</a> 
					<a href="<?php echo site_url('mahasiswa/import'); ?>" class="btn btn-info btn-sm">Import Mahasiswa (.xls | .xlsx)</a> 
					<a href="<?php echo site_url('resources/upload_mahasiswa.xls'); ?>" class="btn btn-warning btn-sm">File Import</a> 
                </div>
            </div>
            <div class="body table-responsive">
                <table id="data-table-simple" class="responsive-table display" cellspacing="0">
					<thead>
                    <tr>
						<th>No</th>
						<th>NIM</th>
						<th>Nama Mahasiswa</th>
						<th>JK</th>
						<th>HP</th>
						<th>Diinput Oleh</th>
						<th>Diupdate Oleh</th>
						<th>Aksi</th>
                    </tr>
					</thead>
					<tbody>
                    <?php foreach($mahasiswa as $t){ ?>
                    <tr>
						<td><?php echo $t['id_mahasiswa']; ?></td>
						<td><?php echo $t['nim']; ?></td>
						<td><?php echo $t['nama_mahasiswa']; ?></td>
						<td><?php echo $t['jk']; ?></td>
						<td><?php echo $t['hp']; ?></td>
						<td><?php echo $t['diinput_oleh']; ?></td>
						<td><?php echo $t['diupdate_oleh']; ?></td>
						<td>
                            <a href="<?php echo site_url('mahasiswa/edit/'.$t['id_mahasiswa']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Ubah</a> 
                            <a href="<?php echo site_url('mahasiswa/remove/'.$t['id_mahasiswa']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Hapus</a>
						</td>
                    </tr>
                    <?php } ?>
					</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
