<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Listing
                </h2>
                <div class="header-dropdown">
                    <a href="<?php echo site_url('dosen/add'); ?>" class="btn btn-success btn-sm">Tambah Dosen</a> 
					<a href="<?php echo site_url('dosen/import'); ?>" class="btn btn-info btn-sm">Import (.xls)</a> 
					<a href="<?php echo site_url('resources/upload_dosen.xls'); ?>" class="btn btn-warning btn-sm">File Import</a> 
                </div>
            </div>
            <div class="body table-responsive">
                <table id="data-table-simple" class="responsive-table display" cellspacing="0">
					<thead>
                    <tr>
						<th>No</th>
						<th>Kode Dosen</th>
						<th>Nama Dosen</th>
						<th>JK</th>
						<th>Level</th>
						<th>Diinput Oleh</th>
						<th>Diupdate Oleh</th>
						<th>Aksi</th>
                    </tr>
					</thead>
					<tbody>
                    <?php foreach($dosen as $t){ ?>
                    <tr>
						<td><?php echo $t['id_dosen']; ?></td>
						<td><?php echo $t['kode_dosen']; ?></td>
						<td><?php echo $t['nama_dosen']; ?></td>
						<td><?php echo $t['jk']; ?></td>
						<td><?php echo ($t['level']=1 ? 'Dosen' : 'Kaprodi'); ?></td>
						<td><?php echo $t['diinput_oleh']; ?></td>
						<td><?php echo $t['diupdate_oleh']; ?></td>
						<td>
                            <a href="<?php echo site_url('dosen/edit/'.$t['id_dosen']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Ubah</a> 
                            <a href="<?php echo site_url('dosen/remove/'.$t['id_dosen']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
					</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
