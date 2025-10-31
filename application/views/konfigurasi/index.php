<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Listing
                </h2>
                <div class="header-dropdown">
                    <a href="<?php echo site_url('konfigurasi/add'); ?>" class="btn btn-success btn-sm">Tambah</a> 
                </div>
            </div>
            <div class="body table-responsive">
                <table id="data-table-simple" class="responsive-table display" cellspacing="0">
					<thead>
                    <tr>
						<th>No</th>
						<th>Thn Akademik</th>
						<th>Kd Smt</th>
						<th>Status</th>
						<th>Diinput Oleh</th>
						<th>Diupdate Oleh</th>
						<th>Aksi</th>
                    </tr>
					</thead>
					<tbody>
                    <?php foreach($konfigurasi as $t){ ?>
                    <tr>
						<td><?php echo $t['id_konf']; ?></td>
						<td><?php echo $t['thn_akademik']; ?></td>
						<td><?php echo ($t['kd_semester']==1 ? 'Gasal' : 'Genap'); ?></td>
						<td><?php echo ($t['status']=='A' ? 'Aktif' : 'Tidak Aktif'); ?></td>
						<td><?php echo $t['diinput_oleh']; ?></td>
						<td><?php echo $t['diupdate_oleh']; ?></td>
						<td>
                            <a href="<?php echo site_url('konfigurasi/edit/'.$t['id_konf']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Ubah</a> 
                            <a href="<?php echo site_url('konfigurasi/remove/'.$t['id_konf']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
					</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
