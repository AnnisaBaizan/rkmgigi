<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Listing
                </h2>
                <div class="header-dropdown">
                    <a href="<?php echo site_url('pasien/add'); ?>" class="btn btn-success btn-sm">Tambah</a> 
                </div>
            </div>
            <div class="body table-responsive">
                
                <table id="table_pasien"  class="responsive-table display" cellspacing="0">
					<thead>
                    <tr>
						<th>No</th>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('resources/js/jquery.min.js')?>"></script>
<script src="<?php echo base_url('resources/js/jquery.dataTables.min.js')?>"></script>
<script type="text/javascript">
    var table;
    $(document).ready(function() {

        //datatables
        table = $('#table_pasien').DataTable({ 

            "processing": true, 
            "serverSide": true, 
            "order": [], 
            
            "ajax": {
                "url": "<?php echo site_url('pasien/get_data_pasien')?>",
                "type": "POST"
            },

            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
        });
    });
</script>
