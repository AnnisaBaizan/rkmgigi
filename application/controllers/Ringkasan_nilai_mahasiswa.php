<?php
 
class Ringkasan_nilai_mahasiswa extends CI_Controller{
    function __construct()
    {
        parent::__construct();
		$session = isset($_SESSION['nim_mhs']) ? $_SESSION['nim_mhs']:'';
		if($session==""){
			redirect("login","refresh");
		}
	} 
	
    function index()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('id_konf','Thn Akademik & Semester','required');
		
		if($this->form_validation->run())     
        {   
			$data['show_listing'] = true;

			$pencarian = " ";
			$value = array();

			$pencarian .= " nim=? ";
			array_push($value, $_SESSION['nim_mhs']);
		
			if($this->input->post('id_konf', TRUE) != null){
				$pencarian .= " and kd_konfigurasi=? ";
				array_push($value, $this->input->post('id_konf', TRUE));
			}

			/*if($this->input->post('semester', TRUE)<>""){
				$pencarian .= " and semester=? ";
				array_push($value, $this->input->post('semester', TRUE));
			}*/

			// menampilkan total sub praktikum
			$data['total_sub_praktikum'] = $this->db->query("select * from tbl_sub_praktikum")->num_rows();

			// menampilkan listring ringkasan mahasiswa
			$data['daftar_praktikum'] = $this->db->query("SELECT nim, nama_mahasiswa, thn_akademik, kd_semester, semester, kd_konfigurasi, count(*) as jumlah_praktikum, count((case when (nilai_rata >= 70) then nilai_rata end)) as m,
			count((case when (nilai_rata < 70) then nilai_rata end)) as tm
			FROM v_tbl_praktikum_mahasiswa 
			where $pencarian 
			group by nim,  kd_konfigurasi", $value)->result_array();
			
			$data['info_ta'] = $this->db->query("select * from tbl_konfigurasi where id_konf=?", array($this->input->post('id_konf', TRUE)))->row_array();

			$this->load->model('Dosen_model');
			$data['all_dosen'] = $this->Dosen_model->get_all_dosen();
			
			$this->load->model('M_konfigurasi_model');
			$data['all_konfigurasi'] = $this->M_konfigurasi_model->get_all_tbl_konfigurasi();
			
			$this->load->model('Mahasiswa_model');
			$data['all_mahasiswa'] = $this->Mahasiswa_model->get_all_mahasiswa_gigi();

			$this->load->model('Sub_praktikum_model');
			$data['all_sub_praktikum'] = $this->Sub_praktikum_model->get_all_sub_praktikum();

			$this->load->model('Pasien_model');
			$data['all_pasien'] = $this->Pasien_model->get_all_pasien();
            
            $data['_view'] = 'ringkasan_nilai_mahasiswa/index';
			$data['judulform'] = 'RINGKASAN MAHASISWA';
            $this->load->view('layouts/main_mahasiswa',$data);
        }
        else
        {
			$data['show_listing'] = false;
			
			$this->load->model('Dosen_model');
			$data['all_dosen'] = $this->Dosen_model->get_all_dosen();
			
			$this->load->model('M_konfigurasi_model');
			$data['all_konfigurasi'] = $this->M_konfigurasi_model->get_all_tbl_konfigurasi();
			
			$this->load->model('Mahasiswa_model');
			$data['all_mahasiswa'] = $this->Mahasiswa_model->get_all_mahasiswa_gigi();

			$this->load->model('Sub_praktikum_model');
			$data['all_sub_praktikum'] = $this->Sub_praktikum_model->get_all_sub_praktikum();

			$this->load->model('Pasien_model');
			$data['all_pasien'] = $this->Pasien_model->get_all_pasien();
            
            $data['_view'] = 'ringkasan_nilai_mahasiswa/index';
			$data['judulform'] = 'RINGKASAN MAHASISWA';
            $this->load->view('layouts/main_mahasiswa',$data);
        }
	}
	
	function nilai($nim=null, $ta=null){
		$data['data_mahasiswa'] = $this->db->query("select a.nim, b.nama_mahasiswa, b.jk, b.hp, f.thn_akademik, f.kd_semester, a.kd_konfigurasi 
		from tbl_praktikum_mahasiswa a 
		join tbl_mahasiswa b on a.nim=b.nim
		join tbl_konfigurasi f on a.kd_konfigurasi=f.id_konf
		where a.nim=? and a.kd_konfigurasi=?", array($nim, $ta))->row_array();

		// menampilkan sub praktikum yang sudah dilakukan
		$data['all_nilai'] = $this->db->query("select * from v_tbl_praktikum_mahasiswa
		where nim=? and kd_konfigurasi=?
		order by nama_praktikum, nama_sub_praktikum asc", array($nim, $ta))->result_array();

		// menampilkan total sub praktikum
		$data['total_sub_praktikum'] = $this->db->query("select * from tbl_sub_praktikum")->num_rows();

		$data['_view'] = 'ringkasan_nilai_mahasiswa/nilai';
		$data['judulform'] = 'DETAIL NILAI MAHASISWA';
		$this->load->view('layouts/main_mahasiswa',$data);
	}

	function detail($nim=null, $kd_sub_praktikum=null, $ta=null){

		$data['x_nim'] = $nim;
		$data['x_kd_sub_praktikum'] = $kd_sub_praktikum;
		$data['x_ta'] = $ta;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_daftar_praktikum','ID daftar praktikum','required');

		if($this->form_validation->run())     
        {   	
			// uploads diagnosa odontogram
			$config['upload_path']          = './diagnosa/';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 250000;
            $config['remove_spaces']        = TRUE;
            
            $new_name = time().$_FILES['diagnosa_odontogram']['name'];
            $config['file_name'] = $new_name;
            $config['file_name'] = str_replace(' ', '_', $config['file_name']);

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('diagnosa_odontogram'))
            {		
				$params = array(
					'diagnosa_pasien' => $this->input->post('diagnosa_pasien', TRUE),
					'diagnosa_odontogram' => $config['file_name'],
					'diupdate_oleh' => $_SESSION['nim_mhs']
				);
				
				$this->db->where('id_daftar_praktikum', $this->input->post('id_daftar_praktikum', TRUE));
				$this->db->update('tbl_praktikum_mahasiswa', $params);
				$this->session->set_flashdata('success', 'Diagnosa pasien dan odontogram berhasil disimpan.');
			} else {
				$this->session->set_flashdata('error', 'File gagal diupload. <br>'.$this->upload->display_errors());
			}
		}

		$data['data_mahasiswa'] = $this->db->query("select a.id_daftar_praktikum, a.nim, b.nama_mahasiswa, b.jk, b.hp, d.nama_sub_praktikum, e.nama_praktikum, f.thn_akademik, f.kd_semester, a.kd_konfigurasi, a.diagnosa_pasien, a.diagnosa_odontogram 
		from tbl_praktikum_mahasiswa a 
		join tbl_mahasiswa b on a.nim=b.nim
		join tbl_sub_praktikum d on a.kd_sub_praktikum=d.id_sub_praktikum
		join tbl_praktikum e on d.kd_praktikum=e.id_praktikum
		join tbl_konfigurasi f on a.kd_konfigurasi=f.id_konf
		where a.nim=? and a.kd_konfigurasi=? and a.kd_sub_praktikum=?", array($nim, $ta, $kd_sub_praktikum))->row_array();

		// menampilkan sub praktikum yang sudah dilakukan
		$data['all_nilai'] = $this->db->query("select a.*,
		b.nama_mahasiswa, c.nama_dosen, d.nama_sub_praktikum, e.nama_praktikum, f.thn_akademik, f.kd_semester, g.nama_pasien
					from tbl_praktikum_mahasiswa a 
					join tbl_mahasiswa b on a.nim=b.nim
					join tbl_dosen c on a.kode_dosen=c.kode_dosen
					join tbl_sub_praktikum d on a.kd_sub_praktikum=d.id_sub_praktikum
					join tbl_praktikum e on d.kd_praktikum=e.id_praktikum
					join tbl_konfigurasi f on a.kd_konfigurasi=f.id_konf
					left join tbl_pasien g on a.nik=g.nik_pasien
		where a.nim=? and a.kd_konfigurasi=? and a.kd_sub_praktikum=? order by a.tanggal_praktek asc", array($nim, $ta, $kd_sub_praktikum))->result_array();

		// menampilkan total sub praktikum
		$data['total_sub_praktikum'] = $this->db->query("select * from tbl_sub_praktikum")->num_rows();

		$data['_view'] = 'ringkasan_nilai_mahasiswa/detail';
		$data['judulform'] = 'DETAIL NILAI MAHASISWA';
		$this->load->view('layouts/main_mahasiswa',$data);
	}

	// function remove($id_daftar_praktikum)
    // {
    //     $daftar_praktikum = $this->db->query("select * from tbl_praktikum_mahasiswa where id_daftar_praktikum=?", array($id_daftar_praktikum))->row_array();

    //     // check if the pasien exists before trying to delete it
    //     if(isset($daftar_praktikum['id_daftar_praktikum']))
    //     {
	// 		$this->db->delete('tbl_praktikum_mahasiswa',array('id_daftar_praktikum'=>$id_daftar_praktikum));
	// 		$this->session->set_flashdata('error', 'Daftar praktikum sudah dihapus.');
    //         redirect('pendaftaran_praktikum/add');
    //     }
    //     else
    //         show_error('The pasien you are trying to delete does not exist.');
	// }

	function upload($nim=null, $kd_sub_praktikum=null, $ta=null, $id_daftar_praktikum=null)
	{
		$data['x_nim'] = $nim;
		$data['x_kd_sub_praktikum'] = $kd_sub_praktikum;
		$data['x_ta'] = $ta;
		$data['x_id_daftar_praktikum'] = $id_daftar_praktikum;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_daftar_praktikum','ID daftar praktikum','required');

		if($this->form_validation->run())     
        {   	
			// uploads diagnosa odontogram
			$config['upload_path']          = './diagnosa/';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 250000;
            $config['remove_spaces']        = TRUE;
            
            $new_name = time().$_FILES['diagnosa_odontogram']['name'];
            $config['file_name'] = $new_name;
            $config['file_name'] = str_replace(' ', '_', $config['file_name']);

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('diagnosa_odontogram'))
            {		
				$params = array(
					'diagnosa_pasien' => $this->input->post('diagnosa_pasien', TRUE),
					'diagnosa_odontogram' => $config['file_name'],
					'diupdate_oleh' => $_SESSION['nim_mhs']
				);
				
				$this->db->where('id_daftar_praktikum', $this->input->post('id_daftar_praktikum', TRUE));
				$this->db->update('tbl_praktikum_mahasiswa', $params);
				$this->session->set_flashdata('success', 'Diagnosa pasien dan odontogram berhasil disimpan.');
			} else {
				$this->session->set_flashdata('error', 'File gagal diupload. <br>'.$this->upload->display_errors());
			}
		}

		$data['data_mahasiswa'] = $this->db->query("select a.id_daftar_praktikum, a.nim, b.nama_mahasiswa, b.jk, b.hp, d.nama_sub_praktikum, e.nama_praktikum, f.thn_akademik, f.kd_semester, a.kd_konfigurasi, a.diagnosa_pasien, a.diagnosa_odontogram 
		from tbl_praktikum_mahasiswa a 
		join tbl_mahasiswa b on a.nim=b.nim
		join tbl_sub_praktikum d on a.kd_sub_praktikum=d.id_sub_praktikum
		join tbl_praktikum e on d.kd_praktikum=e.id_praktikum
		join tbl_konfigurasi f on a.kd_konfigurasi=f.id_konf
		where a.nim=? and a.kd_konfigurasi=? and a.kd_sub_praktikum=? and a.id_daftar_praktikum=?", array($nim, $ta, $kd_sub_praktikum, $id_daftar_praktikum))->row_array();

		// menampilkan sub praktikum yang sudah dilakukan
		// $data['all_nilai'] = $this->db->query("select a.*,
		// b.nama_mahasiswa, c.nama_dosen, d.nama_sub_praktikum, e.nama_praktikum, f.thn_akademik, f.kd_semester, g.nama_pasien
		// 			from tbl_praktikum_mahasiswa a 
		// 			join tbl_mahasiswa b on a.nim=b.nim
		// 			join tbl_dosen c on a.kode_dosen=c.kode_dosen
		// 			join tbl_sub_praktikum d on a.kd_sub_praktikum=d.id_sub_praktikum
		// 			join tbl_praktikum e on d.kd_praktikum=e.id_praktikum
		// 			join tbl_konfigurasi f on a.kd_konfigurasi=f.id_konf
		// 			left join tbl_pasien g on a.nik=g.nik_pasien
		// where a.nim=? and a.kd_konfigurasi=? and a.kd_sub_praktikum=? order by a.tanggal_praktek asc", array($nim, $ta, $kd_sub_praktikum))->result_array();

		// menampilkan total sub praktikum
		// $data['total_sub_praktikum'] = $this->db->query("select * from tbl_sub_praktikum")->num_rows();

		$data['_view'] = 'ringkasan_nilai_mahasiswa/upload';
		$data['judulform'] = 'UPLOAD DIAGNOSA PRAKTIKUM';
		$this->load->view('layouts/main_mahasiswa',$data);
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
						left join tbl_pasien h on a.nik=h.nik_pasien
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
				$this->load->view('ringkasan_nilai_mahasiswa/cetak',$data);
			}else{
				redirect("ringkasan_nilai_mahasiswa","refresh");
			}	
		}else{
			redirect("ringkasan_nilai_mahasiswa","refresh");
		}
    }
}
