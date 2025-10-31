<?php

class Praktikum_db_model extends CI_Model {

	var $table = "(select a.* , b.nama_mahasiswa, c.nama_dosen, d.nama_sub_praktikum, e.nama_praktikum, f.thn_akademik, f.kd_semester
    from tbl_praktikum_mahasiswa a 
    join tbl_mahasiswa b on a.nim=b.nim
    join tbl_dosen c on a.kode_dosen=c.kode_dosen
    join tbl_sub_praktikum d on a.kd_sub_praktikum=d.id_sub_praktikum
    join tbl_praktikum e on d.kd_praktikum=e.id_praktikum
    join tbl_konfigurasi f on a.kd_konfigurasi=f.id_konf) as daftar_praktikum"; //nama tabel dari database
	var $column_order = array(null, 'id_daftar_praktikum','tanggal_praktek','thn_akademik','kd_semester','semester','nim','nama_mahasiswa','nama_praktikum','nama_sub_praktikum','nama_dosen','status'); //field yang ada di table user
	var $column_search = array('tanggal_praktek','thn_akademik','kd_semester','semester','nim','nama_mahasiswa','nama_praktikum','nama_sub_praktikum','nama_dosen','status'); //field yang diizin untuk pencarian 
	var $order = array('tanggal_praktek' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

}