<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Listing
                </h2>
                <div class="header-dropdown">
                    <a href="<?php echo site_url('sub_aspek/add'); ?>" class="btn btn-primary btn-sm">Add Single</a> 
					<a href="<?php echo site_url('sub_aspek/add_multi'); ?>" class="btn btn-success btn-sm">Add Multi</a> 
                </div>
            </div>
            <div class="body table-responsive">
                <table id="data-table-simple" class="responsive-table display" cellspacing="0">
					<thead>
                    <tr>
						<th>ID</th>
						<th>Praktikum</th>
						<th>Sub Praktikum</th>
						<th>Aspek</th>
						<th>Sub Aspek</th>
						<th>Skor Awal</th>
						<th>Skor Akhir</th>
						<th>Bobot</th>
						<th>Diinput Oleh</th>
						<th>Diupdate Oleh</th>
						<th>Actions</th>
                    </tr>
					</thead>
					<tbody>
                    <?php foreach($sub_aspek as $t){ ?>
                    <tr>
						<td><?php echo $t['id_sub_aspek']; ?></td>
						<td><?php echo $t['nama_praktikum']; ?></td>
						<td><?php echo $t['nama_sub_praktikum']; ?></td>
						<td><?php echo $t['nama_aspek']; ?></td>
						<td><?php echo $t['nama_sub_aspek']; ?></td>
						<td><?php echo $t['rentang_skor_awal']; ?></td>
						<td><?php echo $t['rentang_skor_akhir']; ?></td>
						<td><?php echo $t['bobot']; ?></td>
						<td><?php echo $t['diinput_oleh']; ?></td>
						<td><?php echo $t['diupdate_oleh']; ?></td>
						
						<td>
                            <a href="<?php echo site_url('sub_aspek/edit/'.$t['id_sub_aspek']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('sub_aspek/remove/'.$t['id_sub_aspek']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
					</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
