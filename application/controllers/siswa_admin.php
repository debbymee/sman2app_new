<?php 

class Siswa_Admin extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('m_siswa');
		// $this->load->library('upload');
		// $this->load->helper('date');
	
		if ($this->session->userdata('role_id_fk')!='4')
		{
	 		redirect(base_url('loginbaru'));
	 	} 

	}
	public function index()
	{ 
		$id_siswa = $this->session->userdata('siswa_admin');
		$row   = $this->m_siswa->get_kelas($id_siswa);
		$id_kelas = $row->id_kelas; 
		$data['kelas'] = $row->nama_kelas; 
		$data['siswa'] = $this->m_siswa->tampil_namasiswa($id_kelas)->result();
		$data['jadwalll'] = $this->m_siswa->tampil_jadwalll($id_kelas)->result();
		$data['keterangan_presensi'] = $this->m_siswa->tampil_keterangan()->result();
		$data['content']   =  'view_siswa/input_presensi_siswa';
        $this->load->view('templates_siswaadmin/templates_siswaadmin',$data); 
	}
	public function tambah_presensi12()
	{

			$tanggal   = $this->input->post('tgl');
			$id_jadwal = $this->input->post('id_jadwal_fk');
			$modul_pembahasan = $this->input->post('modul_pembahasan');
			$cekpresensi  = $this->m_siswa->cek_absens($id_jadwal,$tanggal);
				
			if($cekpresensi < 1){

			$nm = $this->input->post('id_siswa');
			$id_jadwal = $this->input->post('id_jadwal_fk');
			$tanggal = $this->input->post('tgl');

		    $result = array();
		    foreach($nm AS $key => $val){
			    $result[] = array(
				    "tgl"  => $tanggal,
				    "kd_keterangan_fk"  => $_POST['kd_keterangan'][$key],
				    "id_jadwal_fk"  => $id_jadwal,
				    "modul_pembahasan" => $_POST['modul_pembahasan'][$key],
				    "id_siswa_fk"  => $_POST['id_siswa'][$key]
			    );
			}
		
			$this->m_siswa->input_presensi12($result);
			$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"> Berhasil Dibuat! </div>');
			redirect('siswa_admin/index');
		}
		else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Data Presensi Sudah Ada </div>');
			redirect('siswa_admin/index');
		}
    }



	function get_jadwalpresensi(){
        $id=$this->input->post('id');
        $data=$this->m_siswa->get_mjadwalpresensi($id);
        echo json_encode($data);
    }


}
 ?>