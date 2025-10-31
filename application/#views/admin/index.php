<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Listing
                </h2>
                <div class="header-dropdown">
                    <a href="<?php echo site_url('admin/add'); ?>" class="btn btn-success btn-sm">Tambah</a> 
                </div>
            </div>
            <div class="body table-responsive">
                <table id="data-table-simple" class="responsive-table display" cellspacing="0">
					<thead>
                    <tr>
						<th>ID</th>
						<th>Username</th>
						<th>Diinput Oleh</th>
						<th>Diupdate Oleh</th>
						<th>Aksi</th>
                    </tr>
					</thead>
					<tbody>
                    <?php foreach($admin as $t){ ?>
                    <tr>
						<td><?php echo $t['id_admin']; ?></td>
						<td><?php echo $t['username']; ?></td>
						<td><?php echo $t['diinput_oleh']; ?></td>
						<td><?php echo $t['diupdate_oleh']; ?></td>
						<td>
                            <a href="<?php echo site_url('admin/edit/'.$t['id_admin']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Ubah</a> 
                            <a href="<?php echo site_url('admin/remove/'.$t['id_admin']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
					</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
