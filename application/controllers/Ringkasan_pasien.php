<?php
 
class Ringkasan_pasien extends CI_Controller{
    function __construct()
    {
        parent::__construct();
		$session = isset($_SESSION['username_admin']) ? $_SESSION['username_admin']:'';
		if($session==""){
			redirect("login","refresh");
		}
	} 
	
    function index()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('id_konf','Thn Akademik & Semester','required');
		$this->form_validation->set_rules('nik','Nama Pasien','required');
		
		if($this->form_validation->run())     
        {   
			$data['show_listing'] = true;

			$pencarian = " ";
			$value = array();

			if($this->input->post('id_konf', TRUE) != null){
				$pencarian .= " a.kd_konfigurasi=? ";
				array_push($value, $this->input->post('id_konf', TRUE));
			}
			
			if($this->input->post('kd_sub_praktikum', TRUE)<>""){
				$pencarian .= " and a.kd_sub_praktikum=? ";
				array_push($value, $this->input->post('kd_sub_praktikum', TRUE));
			}

			if($this->input->post('nik', TRUE)<>""){
				$pencarian .= " and a.nik=? ";				
				array_push($value, $this->input->post('nik', TRUE));
			}
			
			if($this->input->post('nim', TRUE)<>""){
				$pencarian .= " and a.nim=? ";
				array_push($value, $this->input->post('nim', TRUE));
			}

			if($this->input->post('semester', TRUE)<>""){
				$pencarian .= " and a.semester=? ";
				array_push($value, $this->input->post('semester', TRUE));
			}

			// menampilkan listring ringkasan pasien
			$data['daftar_praktikum'] = $this->db->query("select a.tanggal_praktek, a.kd_sub_praktikum, d.nama_sub_praktikum, d.kd_praktikum, e.nama_praktikum, a.kd_konfigurasi, f.thn_akademik, f.kd_semester, a.nik, g.nama_pasien, count(*) as jumlah_praktikum
			from tbl_praktikum_mahasiswa a 
			join tbl_sub_praktikum d on a.kd_sub_praktikum=d.id_sub_praktikum
			join tbl_praktikum e on d.kd_praktikum=e.id_praktikum
			join tbl_konfigurasi f on a.kd_konfigurasi=f.id_konf
			join tbl_pasien g on a.nik=g.nik_pasien
			where $pencarian 
			group by a.nik, a.kd_sub_praktikum, a.kd_konfigurasi", $value)->result_array();
			
			$data['info_ta'] = $this->db->query("select * from tbl_konfigurasi where id_konf=?", array($this->input->post('id_konf', TRUE)))->row_array();
			
			$this->load->model('M_konfigurasi_model');
			$data['all_konfigurasi'] = $this->M_konfigurasi_model->get_all_tbl_konfigurasi();

			$this->load->model('Sub_praktikum_model');
			$data['all_sub_praktikum'] = $this->Sub_praktikum_model->get_all_sub_praktikum();

			$this->load->model('Pasien_model');
			$data['all_pasien'] = $this->Pasien_model->get_all_pasien();
			
			$this->load->model('Mahasiswa_model');
			$data['all_mahasiswa'] = $this->Mahasiswa_model->get_all_mahasiswa_gigi();
            
            $data['_view'] = 'ringkasan_pasien/index';
			$data['judulform'] = 'RINGKASAN PASIEN';
            $this->load->view('layouts/main',$data);
        }
        else
        {
			$data['show_listing'] = false;
			
			$this->load->model('M_konfigurasi_model');
			$data['all_konfigurasi'] = $this->M_konfigurasi_model->get_all_tbl_konfigurasi();

			$this->load->model('Sub_praktikum_model');
			$data['all_sub_praktikum'] = $this->Sub_praktikum_model->get_all_sub_praktikum();

			$this->load->model('Pasien_model');
			$data['all_pasien'] = $this->Pasien_model->get_all_pasien();
			
			$this->load->model('Mahasiswa_model');
			$data['all_mahasiswa'] = $this->Mahasiswa_model->get_all_mahasiswa_gigi();
            
            $data['_view'] = 'ringkasan_pasien/index';
			$data['judulform'] = 'RINGKASAN PASIEN';
            $this->load->view('layouts/main',$data);
        }
	}
	
	function daftar_sub_praktikum($nik=null, $ta=null, $kd_sub_praktikum=null){
		$data['data_pasien'] = $this->db->query("select a.kd_sub_praktikum, d.nama_sub_praktikum, d.kd_praktikum, e.nama_praktikum, a.kd_konfigurasi, f.thn_akademik, f.kd_semester, a.nik, g.nama_pasien, g.jk_pasien, g.hp_pasien
		from tbl_praktikum_mahasiswa a 
		join tbl_sub_praktikum d on a.kd_sub_praktikum=d.id_sub_praktikum
		join tbl_praktikum e on d.kd_praktikum=e.id_praktikum
		join tbl_konfigurasi f on a.kd_konfigurasi=f.id_konf
		join tbl_pasien g on a.nik=g.nik_pasien
		where a.nik=? and a.kd_konfigurasi=? and a.kd_sub_praktikum=?
		group by a.nik, a.kd_konfigurasi, a.kd_sub_praktikum", array($nik, $ta, $kd_sub_praktikum))->row_array();

		// menampilkan sub praktikum yang sudah dilakukan
		$data['all_praktikum'] = $this->db->query("select a.kd_sub_praktikum, b.nama_mahasiswa, d.nama_sub_praktikum, d.kd_praktikum, e.nama_praktikum, a.kd_konfigurasi, a.nik, a.kode_dosen, c.nama_dosen
		from tbl_praktikum_mahasiswa a 
		join tbl_mahasiswa b on a.nim=b.nim
		join tbl_dosen c on a.kode_dosen=c.kode_dosen
		join tbl_sub_praktikum d on a.kd_sub_praktikum=d.id_sub_praktikum
		join tbl_praktikum e on d.kd_praktikum=e.id_praktikum
		where a.nik=? and a.kd_konfigurasi=? and a.kd_sub_praktikum=?", array($nik, $ta, $kd_sub_praktikum))->result_array();

		$data['_view'] = 'ringkasan_pasien/sub_praktikum';
		$data['judulform'] = 'DAFTAR SUB PRAKTIKUM PASIEN';
		$this->load->view('layouts/main',$data);
	}

	function detail($kode_dosen=null, $kd_sub_praktikum=null, $ta=null, $nik=null){
		$data['data_pasien'] = $this->db->query("select a.kd_sub_praktikum, d.nama_sub_praktikum, d.kd_praktikum, e.nama_praktikum, a.kd_konfigurasi, f.thn_akademik, f.kd_semester, a.nik, g.nama_pasien, g.jk_pasien, g.hp_pasien, c.nama_dosen
		from tbl_praktikum_mahasiswa a 
		join tbl_dosen c on a.kode_dosen=c.kode_dosen
		join tbl_sub_praktikum d on a.kd_sub_praktikum=d.id_sub_praktikum
		join tbl_praktikum e on d.kd_praktikum=e.id_praktikum
		join tbl_konfigurasi f on a.kd_konfigurasi=f.id_konf
		join tbl_pasien g on a.nik=g.nik_pasien
		where a.nik=? and a.kd_konfigurasi=? and a.kd_sub_praktikum=? and a.kode_dosen=?
		group by a.nik, a.kd_konfigurasi, a.kd_sub_praktikum, a.kode_dosen", array($nik, $ta, $kd_sub_praktikum, $kode_dosen))->row_array();

		// menampilkan daftar mahasiswa yang praktikum
		$data['all_praktikum'] = $this->db->query("select a.id_daftar_praktikum, a.tanggal_praktek, a.nim, b.nama_mahasiswa, a.semester, c.nama_dosen, a.nilai, a.status, a.kd_sub_praktikum, d.nama_sub_praktikum, d.kd_praktikum, e.nama_praktikum, a.kd_konfigurasi, a.nik, a.kode_dosen, c.nama_dosen
		from tbl_praktikum_mahasiswa a 
		join tbl_mahasiswa b on a.nim=b.nim
        join tbl_dosen c on a.kode_dosen=c.kode_dosen
		join tbl_sub_praktikum d on a.kd_sub_praktikum=d.id_sub_praktikum
		join tbl_praktikum e on d.kd_praktikum=e.id_praktikum
		where a.nik=? and a.kd_konfigurasi=? and a.kd_sub_praktikum=? and a.kode_dosen=?", array($nik, $ta, $kd_sub_praktikum, $kode_dosen))->result_array();

		$data['_view'] = 'ringkasan_pasien/detail';
		$data['judulform'] = 'DAFTAR MAHASISWA';
		$this->load->view('layouts/main',$data);
	}

	function remove($id_daftar_praktikum)
    {
        $daftar_praktikum = $this->db->query("select * from tbl_praktikum_mahasiswa where id_daftar_praktikum=?", array($id_daftar_praktikum))->row_array();

        // check if the pasien exists before trying to delete it
        if(isset($daftar_praktikum['id_daftar_praktikum']))
        {
			$this->db->delete('tbl_praktikum_mahasiswa',array('id_daftar_praktikum'=>$id_daftar_praktikum));
			$this->session->set_flashdata('error', 'Daftar praktikum sudah dihapus.');
            redirect('pendaftaran_praktikum/add');
        }
        else
            show_error('The pasien you are trying to delete does not exist.');
	}
	
	function cetak($nim=null, $id_konf=null, $subpraktikum=null, $id_daftar_praktikum=null)
    {
        if(($nim<>'')and($subpraktikum<>'')and($id_konf<>'')and($id_daftar_praktikum<>'')){
			$this->load->model('Mahasiswa_model');
			$data['mahasiswa'] = $this->Mahasiswa_model->get_mahasiswa_nim($nim);
			if(isset($data['mahasiswa']['id_mahasiswa']))
			{
				//get detail info mahasiswa dan pasien
				$data['info'] = $this->db->query("select e.nama_praktikum, d.nama_sub_praktikum, h.nik_pasien, h.nama_pasien, h.tanggal_lahir_pasien, h.jk_pasien, g.nim, g.nama_mahasiswa, a.tanggal_praktek, i.kode_dosen, i.nama_dosen, j.diagnosa 
					from tbl_nilai_praktek a
						join tbl_sub_aspek b on a.kd_sub_aspek = b.id_sub_aspek
						join tbl_aspek c on b.kd_aspek = c.id_aspek
						join tbl_sub_praktikum d on c.kd_sub_praktikum = d.id_sub_praktikum
						join tbl_praktikum e on d.kd_praktikum = e.id_praktikum
						join tbl_konfigurasi f on a.kd_konfigurasi = f.id_konf
						join tbl_mahasiswa g on a.nim=g.nim
						join tbl_pasien h on a.nik=h.nik_pasien
						join tbl_dosen i on a.kode_dosen=i.kode_dosen
						left join tbl_diagnosa j on j.id_sub_praktikum=c.kd_sub_praktikum and j.nik_pasien=a.nik and j.nim=a.nim and a.kd_daftar_praktikum=j.kd_daftar_praktikum
						where a.nim=? and d.id_sub_praktikum=? and f.id_konf=? and a.kd_daftar_praktikum=?",array($nim,$subpraktikum,$id_konf,$id_daftar_praktikum))->row_array();
				
				//get detail nilai 
				$data['detail_nilai'] = $this->db->query("select * from tbl_nilai_praktek a
				join tbl_sub_aspek b on a.kd_sub_aspek = b.id_sub_aspek
				join tbl_aspek c on b.kd_aspek = c.id_aspek
				join tbl_sub_praktikum d on c.kd_sub_praktikum = d.id_sub_praktikum
				join tbl_praktikum e on d.kd_praktikum = e.id_praktikum
				join tbl_konfigurasi f on a.kd_konfigurasi = f.id_konf
				join tbl_mahasiswa g on a.nim=g.nim
				where a.nim=? and d.id_sub_praktikum=? and f.id_konf=? and a.kd_daftar_praktikum=?",array($nim,$subpraktikum,$id_konf,$id_daftar_praktikum))->result_array();

				//$data['_view'] = 'nilai/detail';
				$data['judulform'] = "Detail Nilai Praktek";
				$this->load->view('ringkasan_mahasiswa/cetak',$data);
			}else{
				redirect("ringkasan_mahasiswa","refresh");
			}	
		}else{
			redirect("ringkasan_mahasiswa","refresh");
		}
    }
}
