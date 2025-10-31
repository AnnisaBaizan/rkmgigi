<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Listing
                </h2>
            </div>
            <div class="body table-responsive">
                <table id="data-table-simple" class="responsive-table display" cellspacing="0">
					<thead>
                    <tr>
						<th>NIM</th>
						<th>Nama Mahasiswa</th>
						<th>JK</th>
						<th>HP</th>
						<th>Nilai</th>
                    </tr>
					</thead>
					<tbody>
                    <?php foreach($mahasiswa as $t){ ?>
                    <tr>
						
						<td><?php echo $t['nim']; ?></td>
						<td><?php echo $t['nama_mahasiswa']; ?></td>
						<td><?php echo $t['jk']; ?></td>
						<td><?php echo $t['hp']; ?></td>
						<td>
							<a href="<?php echo site_url('dosen_mahasiswa/nilai/'.$t['nim']); ?>" class="btn btn-primary btn-xs"><span class="fa fa-file"></span> Nilai</a>
                        </td>
                    </tr>
                    <?php } ?>
					</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
