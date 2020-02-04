<?php 
class Wali_kelas extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('m_wali');
		$this->load->library('upload');
		$this->load->helper('date');
	
		if ($this->session->userdata('role_id_fk')!='3')
		{
	 		redirect(base_url('loginbaru'));
	 	} 
	}
	public function index()
	{ 
		$tgl = date('Y-m-d'); // harus dipakaiin load helper (date)
		$data['graph'] = $this->m_wali->graph();
		$data['users'] = $this->m_wali->countuser();
		$data['guru'] = $this->m_wali->countguru();
		$data['wali_kelas'] = $this->m_wali->countwali();
		$data['siswa'] = $this->m_wali->countsiswa();
        $id_wali = $this->session->userdata('id_wali');
		$data['siswa'] = $this->m_wali->siswa_wa($id_wali,$tgl);
		
		$data['content']   =  'view_wali/dashboard';
        $this->load->view('templates_wali/templates_wali',$data); 

	}
	public function bio_wali($id)
	{
		
	
		$data['wali'] = $this->m_wali->tampil_wali($id);
		
		$data['content']   =  'view_wali/bio_wali';
        $this->load->view('templates_wali/templates_wali',$data);

	}
	// 	public function edit_wali()
	// {
	// 	$id = $this->uri->segment(3);
	// 	$data['guru'] = $this->m_wali->tampil_guru($id)->result();
	// 	$data['wali'] = $this->m_wali->edit_wali($id);

	// 	$this->load->view('templates_wali/header_wali',$data);
	// 	$this->load->view('view_wali/edit_wali',$data);
	// 	$this->load->view('templates_wali/footer_wali', $data);
		
	// }
		
	public function update_wali()
	{
	
		$kode2 = $this->input->post('id_guru');
		$nama_guru = $this->input->post('nama_guru');
		$jk = $this->input->post('jk');
		$nip = $this->input->post('nip');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		

	 
		$data = array(
			
			'nama_guru'=> $nama_guru,
			'jk'=> $jk,
			'nip' => $nip,
			'alamat'=> $alamat,
			'no_hp' => $no_hp
		);
	 
		$this->m_wali->update_wali($kode2,$data);
		redirect('Wali_kelas/bio_wali/'.$this->session->userdata('id'));
	
		
	}
		public function edit_pass($id)
	{

			//$where = array('id' => $id );

		$data['login'] = $this->m_wali->edit_pass($id);
		$data['content']   =  'view_wali/edit_pass';
        $this->load->view('templates_wali/templates_wali',$data);

		

	}
		public function update_pass()
	{
	

		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		$password = md5($pass);
		
		$data = array(
			'username' => $username,
			'password' => $password,
			

		);

		$this->m_wali->update_pass($data, $id);
		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Password berhasil diubah, silahkan login kembali! </div>');
		redirect('loginbaru');
	
		
	}

	public function lihat_presensi() 
	{

    $id_wali = $this->session->userdata('id_wali');
	$data['presensi'] = $this->m_wali->tampil_presensi3($id_wali);

	$data['content']   =  'view_wali/lihat_presensi';
    $this->load->view('templates_wali/templates_wali',$data);

		
	}
		public function input_presensi12()
	{
		$id_guru = $this->session->userdata('id_guru');
		$row   = $this->m_wali->get_idkelas($id_guru);
		$id_kelas = $row->id_kelas; 
		$data['kelas'] = $row->nama_kelas; 
		$data['siswa'] = $this->m_wali->tampil_namasiswa($id_guru)->result();
		$data['jadwalll'] = $this->m_wali->tampil_jadwalll($id_guru)->result();
		$data['keterangan_presensi'] = $this->m_wali->tampil_keterangan()->result();
		$data['content']   =  'view_wali/inputpresensi12';
   		$this->load->view('templates_wali/templates_wali',$data);
	}
		

	function get_jadwalpresensi(){
        $id=$this->input->post('id');
        $data=$this->m_wali->get_mjadwalpresensi($id);
        echo json_encode($data);
    }

                                       
   
	public function edit_presensi12($id_presensi)
	{
		
		$id_prensensi = $this->uri->segment(3);
		$data['siswa'] = $this->m_wali->eTampilPresensi($id_prensensi);
		$data['keterangan_presensi'] = $this->m_wali->tampil_keterangan()->result();

		$data['content']   =  'view_wali/edit_presensi12';
   		$this->load->view('templates_wali/templates_wali',$data);

	

	}
		public function update_presensi12()
	{
	
		$config['upload_path']      = 'foto/presensi/';
            $config['allowed_types']    = 'gif|jpg|png';
            $config['max_size']         = '2000';
            $config['max_width']        = '3000';
            $config['max_height']       = '3000';       
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('gambar')){
                    $gambar="";
                    $error = $this->upload->display_errors();
                }else{
                    $gambar=$this->upload->file_name;
                }

		$kd_keterangan = $this->input->post('kd_keterangan');
		$id_presensi = $this->input->post('id_presensi');
	 
		$data = array(

			'kd_keterangan_fk' => $kd_keterangan,
			'foto' => $gambar

		);
	 
		
		
	 	$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"> Berhasil Diubah! </div>');
		$this->m_wali->update_presensi12( $id_presensi,$data);
		redirect('wali_kelas/lihat_presensi');
	
		
	}

// cetak pdf 
	 public function lihat_laporan() 
	{

	    $id_wali = $this->session->userdata('id_wali');
    	$data['jadwalll'] = $this->m_wali->tampil_jadwal_laporan($id_wali)->result();
    	$data['content']   =  'view_wali/formlaporan';
   		$this->load->view('templates_wali/templates_wali',$data);

		
	}


    function lihat_laporan_presensi(){

    	$this->load->library('Pdf');
		$data['nama'] = $this->session->userdata('nama_guru');
        $tgl = $this->input->post('tgl');
        $data['jadwal'] = $this->input->post('tgl');
        $id_jadwal = $this->input->post('id_jadwal');
        $id_wali = $this->session->userdata('id_wali');
        
        $row   = $this->m_wali->get_kelaswali($id_wali);
	    $id_kelas = $row->id_kelas; 
	    $data['kelas'] = $row->nama_kelas;

	    $rowjadwal   = $this->m_wali->get_jadwal($id_jadwal);
	    $data['jam_pelajaran'] = $rowjadwal->jam_pelajaran;
	    $data['nama_pelajaran'] = $rowjadwal->nama_pelajaran;



    	$data['siswa'] = $this->m_wali->tampil_presensi_laporan($id_jadwal,$tgl)->result();
    	$data['content']   =  'view_wali/lihat_laporan';


   		$html = $this->load->view('templates_wali/templates_wali',$data); 
	    $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('view_wali/lihat_laporan', $data);
    }

    // whatsapp gateway


	function wa_message(){
    	$nohp = $this->input->post('no_hp_ortu');
    	$pesan = $this->input->post('message');
    	$id_presensi = $this->input->post('id_presensi');
    	$tgl = date('Y-m-d'); // harus dipakaiin load helper (date)
    	$jam = date('H:i');

    	$cekwa = $this->m_wali->cek_wa($id_presensi,$tgl);

    	if ($cekwa < 1) {
    		$data = array(

			'id_wali_fk' => $this->session->userdata('id_wali'),
			'id_presensi_fk' => $id_presensi,
			'pesan' => $pesan,
			'tanggal_terkirim' => $tgl,
			'jam_terkirim' => $jam

		);

    	$this->m_wali->wa_message_send($data, 'history_message');
    	redirect('https://api.whatsapp.com/send?phone='.$nohp.'&text='.$pesan.''); 
    	}
    	else{

    		$this->session->set_flashdata('hehe', ' 
						<script>
		  				alert("Pesan Sudah Dikirim!");
						</script>');
			redirect('wali_kelas');
    	}

    	
    }

    function wa_siswa(){
    	$tgl = date('Y-m-d'); // harus dipakaiin load helper (date)
    	$id_wali = $this->session->userdata('id_wali');
		$data['siswa'] = $this->m_wali->siswa_wa($id_wali,$tgl);
		$this->load->view('view_wali/wa',$data);
		

    }
	
}
