<?php
Class M_login extends CI_Model
{
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	
	function loginmahasiswa($user,$pass)
	{
		$query=$this->db->query("select * from tbl_mahasiswa a 
								where a.nim=? and a.password=?", array($user, md5(sha1($pass))));
		return $query;
	}
	
	function logindosen($user,$pass)
	{
		$query=$this->db->query("select * from tbl_dosen
								where kode_dosen=? and password=?", array($user, md5(sha1($pass))));
		return $query;
	}
	
	function loginadmin($user,$pass)
	{
		$query=$this->db->query("select * from tbl_admin	
								where username=? and password=?", array($user, md5(sha1($pass))));
		return $query;
	}
}