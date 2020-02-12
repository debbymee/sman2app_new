<?php 
class Admin extends CI_Controller
{
	private $filename = "import_data";
	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('m_data');
		$this->load->library('upload');
		
		if ($this->session->userdata('role_id_fk')!='1')
		{
	 		redirect(base_url('loginbaru'));

	 	} 
	 	

	}
	

	public function index()
	{ 
		$data = array(

			'judul' => 'sman2'
		);
		$data['users'] = $this->m_data->countuser();
		$data['guru'] = $this->m_data->countguru();
		$data['wali_kelas'] = $this->m_data->countwali();
		$data['siswa'] = $this->m_data->countsiswa();
		$data['content']   =  'view_admin/home';
        $this->load->view('templates/templates',$data); 
	}

	
		public function daftar_user()
	{

		$data['user'] = $this->m_data->tampil_datauser();
	
		$data['content']   =  'view_admin/user_management/daftar_user';
        $this->load->view('templates/templates',$data); 
		
	}


		public function tambah_user()
	{
		$data['role'] = $this->m_data->tampil_roleuser();
		$data['siswa_admin'] = $this->m_data->tampil_siswa_admin();
		$data['guru'] = $this->m_data->tampil_guru();
		$this->form_validation->set_rules('username', 'username','required|trim|is_unique[users.username]', [
			'is_unique' => 'username ini sudah terdaftar!']);
		$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]');

		
		if ($this->form_validation->run() == false) 
		{
		$data['judul'] = 'Halaman Registrasi';

		$data['content']   =  'view_admin/user_management/form_user';
        $this->load->view('templates/templates',$data); 
	
		}
		// KONDISI JIKA SISWA ADMIN DAN GURU TIDAK DITAMBAHKAN VALUENYA
		elseif ($this->input->post('siswa_admin') == '' || $this->input->post('siswa_admin') == null || $this->form_validation->run() == false)
		{
			if($this->input->post('guru') == '' || $this->input->post('guru') == null)
		{

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$pass = md5($password);
		$role_id = $this->input->post('role');
	 
		$data = array(
			'username' => $this->input->post('username', true),
			'password' => $pass,
			'role_id_fk' => $this->input->post('role', true),
			'is_active' => 1

		);
		$this->m_data->input_user($data, 'users');
	

		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Akun Berhasil Dibuat! </div>');
		redirect('admin/daftar_user');
		}
		else{ // TIDAK ISI SISWA ADMIN SAJA, TAPI NGINPUT GURU

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$pass = md5($password);
		$role_id = $this->input->post('role');
		

		
	 
		$data = array(
			'username' => $this->input->post('username', true),
			'password' => $pass,
			'id_guru_fk' => $this->input->post('guru', true),
			'role_id_fk' => $this->input->post('role', true),
			'is_active' => 1

		);
		$this->m_data->input_user($data, 'users');
	

		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Akun Berhasil Dibuat! </div>');
		redirect('admin/daftar_user');
		}
	//	$id = $this->input->post('id');
		
		}
		else{ // TIDAK ISI GURU, TAPI NGINPUT SISWA ADMIN

		if($this->input->post('guru') == '' || $this->input->post('guru') == null){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$siswa_admin = $this->input->post('siswa_admin');
		$pass = md5($password);
		$role_id = $this->input->post('role');

		$data = array(
			'username'=> $this->input->post('username', true),
			'password'=> $pass,
			'siswa_admin'=> $siswa_admin,
			'role_id_fk' => $this->input->post('role', true),
			'is_active' => 1
			

			);
		$this->m_data->input_user($data, 'users');
	

		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Akun Berhasil Dibuat! </div>');
		redirect('admin/daftar_user');
         

        }
        else{ // NGINPUTKAN SEMUANYA
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$siswa_admin = $this->input->post('siswa_admin');
		$pass = md5($password);
		$role_id = $this->input->post('role');

		$data = array(
			'username'=> $this->input->post('username', true),
			'password'=> $pass,
			'id_guru_fk' => $this->input->post('guru', true),
			'siswa_admin'=> $siswa_admin,
			'role_id_fk' => $this->input->post('role', true),
			'is_active' => 1
			

			);
		$this->m_data->input_user($data, 'users');
	

		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Akun Berhasil Dibuat! </div>');
		redirect('admin/daftar_user');
         

         }

		}
	}
		public function edit_user($id)
	{
		$data['role'] = $this->m_data->tampil_roleuser();
		$data['users'] = $this->m_data->edit_user($id);
		$data['guru'] = $this->m_data->tampil_guru();
		$data['siswa_admin'] = $this->m_data->tampil_siswa_admin();
		$data['content']   =  'view_admin/user_management/edit_user';

		$this->load->view('templates/templates',$data); 

	}


	public function update_user()
	{
	

		if($this->input->post('password') == '' || $this->input->post('password') == null)
		{
			if($this->input->post('siswa_admin') == '' || $this->input->post('siswa_admin') == null)
				{

				if($this->input->post('guru') == '' || $this->input->post('guru') == null)
				{
					$id = $this->input->post('id');
					$username = $this->input->post('username');
					$role_id = $this->input->post('role');
					$siswa_admin = null;
					$id_guru = null;
					$data = array(
					'username' => $username,
					'role_id_fk' => $role_id,
					'siswa_admin' =>  $siswa_admin,
					'id_guru_fk' => $id_guru
					);

				$this->m_data->update_user($data, $id);
				$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data  Masuk </div>');
				redirect('admin/daftar_user');
				}

				else{
					$id = $this->input->post('id');
							$username = $this->input->post('username');
							$role_id = $this->input->post('role');
							$siswa_admin = null;
							$data = array(
								'username' => $username,
								'role_id_fk' => $role_id,
								'siswa_admin' =>  $siswa_admin,
								'id_guru_fk' => $this->input->post('guru', true),
							);

					$this->m_data->update_user($data, $id);
					$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data  Masuk </div>');
					redirect('admin/daftar_user');
					}
				}
				else {

					if($this->input->post('guru') == '' || $this->input->post('guru') == null)
					{

						$id = $this->input->post('id');
						$username = $this->input->post('username');
						$role_id = $this->input->post('role');
					    $siswa_admin = $this->input->post('siswa_admin');
					    $id_guru = null;
					    $data = array(
							'username' => $username,
							'siswa_admin' =>  $siswa_admin,
							'role_id_fk' => $role_id,
							'id_guru_fk' => $id_guru
						

						);
			   		$this->m_data->update_user($data, $id);
					$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data  Masuk </div>');
					redirect('admin/daftar_user');
					}

					else {

						$id = $this->input->post('id');
						$username = $this->input->post('username');
						$role_id = $this->input->post('role');
					    $siswa_admin = $this->input->post('siswa_admin');
					    $data = array(
							'username' => $username,
							'siswa_admin' =>  $siswa_admin,
							'role_id_fk' => $role_id,
							'id_guru_fk' => $this->input->post('guru', true),

						);
			    	$this->m_data->update_user($data, $id);
					$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data  Masuk </div>');
					redirect('admin/daftar_user');
					}
				 }
			
		}
		

		else{

			if($this->input->post('siswa_admin') == '' || $this->input->post('siswa_admin') == null)
			{
				if($this->input->post('guru') == '' || $this->input->post('guru') == null)
				{

					$id = $this->input->post('id');
					$username = $this->input->post('username');
					$role_id = $this->input->post('role');
					$password = $this->input->post('password');
					$siswa_admin = null;
					$id_guru = null;
			        $pass = md5($password);
				
					$data = array(
						'username' => $username,
						'role_id_fk' => $role_id,
						'siswa_admin' =>  $siswa_admin,
						'password' => $pass,
						'id_guru_fk' => $id_guru

					);

					$this->m_data->update_user($data, $id);
					$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data  Masuk </div>');
					redirect('admin/daftar_user');
				}

				else {

					$id = $this->input->post('id');
					$username = $this->input->post('username');
					$role_id = $this->input->post('role');
					$password = $this->input->post('password');
					$siswa_admin = null;
			        $pass = md5($password);
				
					$data = array(
						'username' => $username,
						'role_id_fk' => $role_id,
						'siswa_admin' =>  $siswa_admin,
						'id_guru_fk' => $this->input->post('guru', true),
						'password' => $pass

					);

					$this->m_data->update_user($data, $id);
					$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data  Masuk </div>');
					redirect('admin/daftar_user');
					}
			}


			else {

				if($this->input->post('guru') == '' || $this->input->post('guru') == null)
				{
					$id = $this->input->post('id');
					$username = $this->input->post('username');
					$role_id = $this->input->post('role');
				    $siswa_admin = $this->input->post('siswa_admin');
				    $password = $this->input->post('password');
			        $pass = md5($password);
			        $id_guru = null;
				   
				    $data = array(
						'username' => $username,
						'siswa_admin' =>  $siswa_admin,
						'role_id_fk' => $role_id,
						'password' => $pass,
						'id_guru_fk' => $id_guru
					

					);
			    	$this->m_data->update_user($data, $id);
					$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data  Masuk </div>');
					redirect('admin/daftar_user');
				}

			else{

            	$id = $this->input->post('id');
				$username = $this->input->post('username');
				$role_id = $this->input->post('role');
			    $siswa_admin = $this->input->post('siswa_admin');
			    $password = $this->input->post('password');
		        $pass = md5($password);
			   
			    $data = array(
					'username' => $username,
					'siswa_admin' =>  $siswa_admin,
					'role_id_fk' => $role_id,
					'id_guru_fk' => $this->input->post('guru', true),
					'password' => $pass
				

				);
			    $this->m_data->update_user($data, $id);
				$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data  Masuk </div>');
				redirect('admin/daftar_user');

			}
		}
	
		}
		
	}

	public function hapus_user()
	{

		try {
        $this->db->delete('users', array('id'=> $this->input->get('id')));

        // documentation at
        // https://www.codeigniter.com/userguide3/database/queries.html#handling-errors
        // says; "the error() method will return an array containing its code and message"
        $db_error = $this->db->error();
        if (!empty($db_error)) {
           if($db_error['code'] == 0){
           	$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data Berhasil Dihapus </div>');
    		redirect('admin/daftar_user');
			
           }
           else{
           	$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Tidak Bisa Di Hapus!!!! </div>');
    		redirect('admin/daftar_user');
           }
            return false; // unreachable retrun statement !!!
        }
        return TRUE;
    } catch (Exception $e) {
        // this will not catch DB related errors. But it will include them, because this is more general. 
        echo $e->getMessage();
        return;
    }


	}	
	


	// jadwal kelas 12

	public function daftar_jadwal12() 
	{


	$tahun_ajaran = $this->session->userdata('tahun_ajaran');
	$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

	$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester

	$data['tahun_rombel'] = $this->m_data->tampil_tahun_rombel($tahun_ajaran);
	$data['jadwalpelajaran'] = $this->m_data->tampil_jdwl12($tahun,$semester);
	
	
	//$data['rombel'] = $this->m_data->tampil_rombel();
	$data['content']   =  'view_admin/jadwal_pelajaran/jadwal_pelajaran12';

	$this->load->view('templates/templates',$data); 

	
	}
	public function form_jadwal12()
	{

		$data['kelas'] = $this->m_data->tampil_kelas();
		$data['guru'] = $this->m_data->tampil_guruu()->result();
		$data['mata_pelajaran'] = $this->m_data->tampil_detailj()->result();
		$data['tahun'] = $this->m_data->tampil_tahunajaran();
		$data['content']   =  'view_admin/jadwal_pelajaran/form_jadwal12';

		$this->load->view('templates/templates',$data);

	}


	public function tambah_jadwal12()
	{

		$this->form_validation->set_rules('jam_pelajaran', 'jam_pelajaran', 'required|trim');
		$this->form_validation->set_rules('kd_mapel', 'mata_pelajaran', 'required|trim');

		
		if ($this->form_validation->run() == false) {

		$data['kelas'] = $this->m_data->tampil_kelas();
		$data['guru'] = $this->m_data->tampil_guruu()->result();
		$data['mata_pelajaran'] = $this->m_data->tampil_detailj()->result();
		$data['tahun'] = $this->m_data->tampil_tahunajaran();
		$data['judul'] = 'Halaman Tambah Jadwal';

		$data['content']   =  'view_admin/jadwal_pelajaran/form_jadwal12';

		$this->load->view('templates/templates',$data);

	} else {
		
		$hari = $this->input->post('hari');
		$jam_pelajaran = $this->input->post('jam_pelajaran');
		$mata_pelajaran = $this->input->post('kd_mapel');
		$id_kelas = $this->input->post('id_kelas');
		$id_guru = $this->input->post('id_guru');
		$tahun = $this->input->post('id_tahun_ajaran');


		$data = array(
			'hari' => $hari,
			'jam_pelajaran' =>$jam_pelajaran,
			'kd_mapel_fk' => $mata_pelajaran,
			'id_kelas_fk' => $id_kelas,
			'id_guru_fk' => $id_guru,
			'id_tahun_ajaran_fk' => $tahun

			);
		$this->m_data->input_jadwal($data);

		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Jadwal Berhasil Dibuat! </div>');
		redirect('admin/daftar_jadwal12');
	}
		
	}
		public function edit_jadwal12($id)
	{
		
		
		$data['kelas'] = $this->m_data->tampil_kelas();
		$data['guru'] = $this->m_data->tampil_guruu()->result();
		$data['mata_pelajaran'] = $this->m_data->tampil_detailj()->result();
		$data['jadwal_pelajaran'] = $this->m_data->edit_jadwal($id)->row(1);
		$data['tahun'] = $this->m_data->tampil_tahunajaran();

		$data['content']   =  'view_admin/jadwal_pelajaran/edit_jadwal12';

		$this->load->view('templates/templates',$data);
		

	}
	public function update_jadwal12()
	{
		$id_jadwal = $this->input->post('id_jadwal');
		$hari = $this->input->post('hari');
		$jam_pelajaran = $this->input->post('jam_pelajaran');
		$mata_pelajaran = $this->input->post('kd_mapel');
		$id_kelas = $this->input->post('id_kelas');
		$id_guru = $this->input->post('id_guru');
		$tahun = $this->input->post('id_tahun_ajaran');
	
		$data = array(
			'id_jadwal' => $id_jadwal,
			'hari' => $hari,
			'jam_pelajaran' =>$jam_pelajaran,
			'kd_mapel_fk' => $mata_pelajaran,
			'id_kelas_fk' => $id_kelas,
			'id_guru_fk' => $id_guru,
			'id_tahun_ajaran_fk' => $tahun

			);
	 
		$this->m_data->update_jadwal($data, $id_jadwal);
		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Jadwal Berhasil Diubah! </div>');
		redirect('admin/daftar_jadwal12');
	
		
	}


	public function hapus_jadwal12()
	{

		$this->db->delete('jadwal_pelajaran', array('id_jadwal'=> $this->input->get('id_jadwal', FALSE)));
		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Jadwal Tidak Dapat Dihapus! </div>');
		redirect('admin/daftar_jadwal12');
	}


	public function lihat_presensi12() 
	{

	$tahun_ajaran = $this->session->userdata('tahun_ajaran');
	$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

	$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester
	
	$data['presensi'] = $this->m_data->tampil_presensi3($tahun,$semester);
	//$data['guru'] = $this->m_data->tampil_pguru()->result();

	$data['content']   =  'view_admin/presensi_kehadiran/detail_presensi3';
	$this->load->view('templates/templates',$data);
	
	}

	public function daftarkelas_presensi3()
	{
		$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

		$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester
	
	
		$data['rombel'] = $this->m_data->tampil_rombelpresensi3()->result();
		$data['lihat_presensi'] = $this->m_data->tampil_presensi3($tahun,$semester);
	
		// $data['guru'] = $this->m_data->tampil_guruu()->result();
		// $data['mata_pelajaran'] = $this->m_data->tampil_detailj()->result();
		$data['content']   =  'view_admin/presensi_kehadiran/daftarkelas_presensi3';
		$this->load->view('templates/templates',$data);


	}
	public function input_presensi12()
	{


		$hari = date ("D");
		$hariindonesia = "";
		 
		 if($hari == 'Sat'){

		 	$hariindonesia = "Sabtu";
		 }
		 elseif ($hari == 'Sun') {
		 	$hariindonesia = "Minggu";
		 }
		 elseif ($hari == 'Mon') {
		 	$hariindonesia = "Senin";
		 }
		 elseif ($hari == 'Tue') {
		 	$hariindonesia = "Selasa";
		 }
		 elseif ($hari == 'Wed' ) {
		 	$hariindonesia = "Rabu";
		 }
		 elseif ($hari == 'Thu') {
		 	$hariindonesia = "Kamis";
		 }elseif ($hari == 'Fri') {
		 	$hariindonesia = "Jumat";
		 }

		$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

		$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester

		$urikelas = $this->uri->segment(4);
		$id_kelas_fk = $this->uri->segment(3); // mengambil get url urutan slice ke 3
		$data['kelas'] = urldecode($urikelas); //untuk menghilangkan %
		$data['results'] = $this->m_data->tampil_siswa2($tahun, $semester,$id_kelas_fk);
		$data['jadwalll'] = $this->m_data->tampil_jadwalll($id_kelas_fk,$hariindonesia, $tahun,$semester)->result();
		$data['keterangan_presensi'] = $this->m_data->tampil_keterangan()->result();
		$data['content']   =  'view_admin/presensi_kehadiran/inputpresensi12';
		$this->load->view('templates/templates',$data);
	

	}

	public function tambah_presensi12()
	{
			$tanggal   = $this->input->post('tgl');
			$id_jadwal = $this->input->post('id_jadwal');
			$modul_pembahasan = $this->input->post('modul_pembahasan');
			$cekpresensi  = $this->m_data->cek_absens($id_jadwal,$tanggal);
				
			if($cekpresensi < 1){

			$nm = $this->input->post('id_siswa');
			$id_jadwal = $this->input->post('id_jadwal');
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
		
		$this->m_data->input_presensi12($result);
		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"> Berhasil Dibuat! </div>');
		redirect('admin/lihat_presensi12');
	}
	else{
		$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Data Presensi Sudah Ada </div>');
		redirect('admin/lihat_presensi12');
	}
    }
		

	public function edit_presensi12($id_presensi)
	{
		
		$id_prensensi = $this->uri->segment(3);
		$data['siswa'] = $this->m_data->eTampilPresensi($id_prensensi);
		$data['keterangan_presensi'] = $this->m_data->tampil_keterangan()->result();
	
		$data['content']   =  'view_admin/presensi_kehadiran/edit_presensi12';
		$this->load->view('templates/templates',$data);
		
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
	 
		
	 
		$this->m_data->update_presensi12( $id_presensi,$data);
		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data Presensi Berhasil Diubah! </div>');
		redirect('admin/lihat_presensi12');
	
		
	}




// controller guru

	

	public function daftar_guru()
	{
		//$data['login'] = $this->m_data->tampil_datauser();

		$data['guru'] = $this->m_data->tampil_guru();
		$data['content'] = 'view_admin/guru/daftar_guru';


		$this->load->view('templates/templates', $data);
	

	}
	public function form_data_guru(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->m_data->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		
		$data['guru'] = $this->m_data->tampil_guru();
		$data['content'] = 'view_admin/guru/daftar_guru';


		$this->load->view('templates/templates', $data);
	}

	public function import_data_guru(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = [];
		
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data, [
					'nama_guru'=>$row['A'], // Insert data nis dari kolom A di excel
					'email'=>$row['B'], // Insert data nama dari kolom B di excel
					'NUPTK'=>$row['C'], // Insert data jenis kelamin dari kolom C di
					'jk'=>$row['D'], // Insert data jenis kelamin dari kolom C di excel
					'tempat_lahir'=>$row['E'], // Insert data jenis kelamin dari kolom C di excel
					'tgl_lahir'=>$row['F'], // Insert data jenis kelamin dari kolom C di excel
					'nip'=>$row['G'], // Insert data jenis kelamin dari kolom C di excel
					'jenis_ptk'=>$row['H'], // Insert data jenis kelamin dari kolom C di excel
					'agama'=>$row['I'], // Insert data jenis kelamin dari kolom C di excel
					'alamat' =>$row['J'],
					'RT' =>$row['K'],
					'RW' =>$row['L'],
					'dusun' => $row['M'],
					'kelurahan'=> $row['N'],
					'kecamatan'=> $row['O'],
					'kode_pos'=> $row['P'],
					'no_hp'=>$row['Q'] // Insert data jenis kelamin dari kolom C di excel
					
						
				]);
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->m_data->insert_multiple_guru($data);
		
		redirect("admin/daftar_guru"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}


	public function form_guru()
	{
		$data['users'] = $this->m_data->tampil_username()->result();
		$data['content'] = 'view_admin/guru/form_guru';

		$this->load->view('templates/templates', $data);

	}

	public function tambah_guru()
	{
	
		// $this->form_validation->set_rules('nama_guru', 'nama_guru', 'required|trim|is_unique[guru.nama_guru]',[
		// 	'is_unique' => 'nama guru sudah terdaftar !']);

		// $this->form_validation->set_rules('nip', 'nip', 'required|trim|numeric|min_length[5]|max_length[5]|is_unique[guru.nip]',
		// 	[
		// 	'is_unique' => 'nip tidak boleh sama !'
		// 	]);

		$this->form_validation->set_rules('no_hp', 'no_hp', 'required|trim|numeric|min_length[10]|max_length[13]|is_unique[guru.no_hp]',[
			'is_unique' => 'nomer hp tidak boleh sama !'
			]);

		// $jkv = $this->input->post('jk');
		// $iduserv = $this->input->post('id_user');


		
		if ($this->form_validation->run() == false) 
		{
			$data['judul'] = 'Halaman Tambah Guru';
			$data['content'] = 'view_admin/guru/form_guru_validasi';
			//$data['users'] = $this->m_data->tampil_username()->result();

			$data['validasi_jk'] =$jkv; 
			$data['validasi_akun']=$iduserv;
			$this->load->view('templates/templates', $data);

			
		}else{
		
			// $config['upload_path']      = 'foto/guru/';
   //          $config['allowed_types']    = 'gif|jpg|png';
   //          $config['max_size']         = '2000';
   //          $config['max_width']        = '3000';
   //          $config['max_height']       = '3000';       
   //              $this->upload->initialize($config);
   //              if(!$this->upload->do_upload('gambar'))
   //              {
   //                  $gambar="";
   //                  $error = $this->upload->display_errors();
   //              }else{
   //                  $gambar=$this->upload->file_name;
   //              }

	
		// $tgl_lahir = $this->input->post('tgl_lahir');
		// $myTime = strtotime($tgl_lahir); 
  //       $dateconvert = date("Y-m-d", $myTime);
		
		$nama_guru = $this->input->post('nama_guru');
		$email = $this->input->post('email');
		$nuptk = $this->input->post('NUPTK');
		$jk = $this->input->post('jk');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $this->input->post('tgl_lahir');

		$myTime = strtotime($tgl_lahir); 
        $dateconvert = date("Y-m-d", $myTime);

		$nip = $this->input->post('nip');
		$jenis_ptk = $this->input->post('jenis_ptk');
		$agama = $this->input->post('agama');
		$alamat = $this->input->post('alamat');
		$rt = $this->input->post('RT');
		$rw = $this->input->post('RW');
		$dusun = $this->input->post('dusun');
		$kelurahan = $this->input->post('kelurahan');
		$kecamatan = $this->input->post('kecamatan');
		$kode_pos = $this->input->post('kode_pos');
		$no_hp = $this->input->post('no_hp');
		

		//$data = array(

			//'nama_guru'=> $this->input->post('nama_guru', true),
			//'tgl_lahir' => $dateconvert,


			// 'nama_guru' => $this->input->post('nama_guru', true),
			// 'emai' => $this->input->post('email', true),
			// 'NUPTK' => $this->input->post('NUPTK', true),
			// 'jk' => $this->input->post('jk', true),
			// 'tempat_lahir' => $this->input->post('tempat_lahir', true),
			// 'tgl_lahir' => $dateconvert,
			// 'nip' => $this->input->post('nip', true),
			// 'jenis_ptk' => $this->input->post('jenis_ptk', true),
			// 'agama' => $this->input->post('agama', true),
			// 'alamat' => $this->input->post('alamat', true),
			// 'RT' => $this->input->post('RT', true),
			// 'RW' => $this->input->post('RW', true),
			// 'dusun' => $this->input->post('dusun', true),
			// 'kelurahan' => $this->input->post('kelurahan', true),
			// 'kecamatan' => $this->input->post('kecamatan', true),
			// 'kode_pos' => $this->input->post('kode_pos', true),
			// 'no_hp' => $this->input->post('no_hp', true)
			
			$data = array(
			
			'nama_guru'=> $nama_guru,
			'email' =>$email,
			'NUPTK' => $nuptk,
			'jk' => $jk,
			'tempat_lahir' => $tempat_lahir,
			'tgl_lahir'=> $tgl_lahir,
			'nip' => $nip,
			'jenis_ptk' => $jenis_ptk,
			'agama' => $agama,
			'alamat'=> $alamat,
			'RT' => $rt,
			'RW' => $rw,
			'dusun' => $dusun,
			'kelurahan' => $kelurahan,
			'kecamatan' => $kecamatan,
			'kode_pos' => $kode_pos,
			'no_hp' => $no_hp
			


		);

		//	);
		$this->m_data->input_guru($data, 'guru');
		
		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data Guru Berhasil Ditambahkan! </div>');
		redirect('admin/daftar_guru');


		}
	}

	public function edit_guru($id_guru)
	{
		//$data['users'] = $this->m_data->tampil_username()->result();
		$data['guru'] = $this->m_data->edit_guru($id_guru);
		$data['content'] = 'view_admin/guru/edit_guru';


		$this->load->view('templates/templates', $data);

	}
	public function update_guru()
	{
	
		// $config['upload_path']      = 'foto/guru/';
  //           $config['allowed_types']    = 'gif|jpg|png';
  //           $config['max_size']         = '2000';
  //           $config['max_width']        = '3000';
  //           $config['max_height']       = '3000';       
  //               $this->upload->initialize($config);
  //               if(!$this->upload->do_upload('gambar')){
  //                   $gambar="";
  //                   $error = $this->upload->display_errors();
  //               }else{
  //                   $gambar=$this->upload->file_name;
  //               }

		$kode2 = $this->input->post('kode');
		$nama_guru = $this->input->post('nama_guru');
		$email = $this->input->post('email');
		$nuptk = $this->input->post('NUPTK');
		$jk = $this->input->post('jk');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$nip = $this->input->post('nip');
		$jenis_ptk = $this->input->post('jenis_ptk');
		$agama = $this->input->post('agama');
		$alamat = $this->input->post('alamat');
		$rt = $this->input->post('RT');
		$rw = $this->input->post('RW');
		$dusun = $this->input->post('dusun');
		$kelurahan = $this->input->post('kelurahan');
		$kecamatan = $this->input->post('kecamatan');
		$kode_pos = $this->input->post('kode_pos');
		$no_hp = $this->input->post('no_hp');
		

	 
		$data = array(
			
			'nama_guru'=> $nama_guru,
			'email' =>$email,
			'NUPTK' => $nuptk,
			'jk' => $jk,
			'tempat_lahir' => $tempat_lahir,
			'tgl_lahir'=> $tgl_lahir,
			'nip' => $nip,
			'jenis_ptk' => $jenis_ptk,
			'agama' => $agama,
			'alamat'=> $alamat,
			'RT' => $rt,
			'RW' => $rw,
			'dusun' => $dusun,
			'kelurahan' => $kelurahan,
			'kecamatan' => $kecamatan,
			'kode_pos' => $kode_pos,
			'no_hp' => $no_hp
			


		);
	 	$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data Berhasil Diubah </div>');
	
		$this->m_data->update_guru($kode2,$data);
		redirect('admin/daftar_guru');
	
		
	}
	public function hapus_guru()
	{



		try {
        $this->db->delete('guru', array('id_guru'=> $this->input->get('id')));
        $db_error = $this->db->error();
        if (!empty($db_error)) {
           if($db_error['code'] == 0){
           	$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data Berhasil Dihapus </div>');
           	    // $this->m_data->updatedeleteuserwali($rowid);
    		redirect('admin/daftar_guru');
			
           }
           else{
           	$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Tidak Bisa Di Hapus!!!! </div>');

    		redirect('admin/daftar_guru');
           }
            return false; // unreachable retrun statement !!!
        }
	        return TRUE;
	    } catch (Exception $e) {
	        // this will not catch DB related errors. But it will include them, because this is more general. 
	        echo $e->getMessage();
	        return;
	    	}
	}
// CONTROLLER WALI

	public function daftar_wali()
	{
		$data['wali_kelas'] = $this->m_data->tampil_walikelas();
		$data['content']   =  'view_admin/data_wali/daftar_wali';
        $this->load->view('templates/templates',$data); 
	
	}
	public function form_wali()
	{
		//$data['wali_kelas'] = $this->m_data->tampil_wali();
		$data['guru'] = $this->m_data->tampil_guru();
		$data['content']   =  'view_admin/data_wali/form_wali';

        $this->load->view('templates/templates',$data);

	

	}

	public function tambah_wali()
	{
	
		$this->form_validation->set_rules('id_guru', 'id_guru', 'required|trim');

		
		if ($this->form_validation->run() == false) 
		{
			$data['judul'] = 'Halaman Tambah Wali';

		$this->load->view('templates_admin/header');
		$this->load->view('view_admin/data_wali/form_wali', $data);
		$this->load->view('templates_admin/footer');

			
		}else{

		$id_guru = $this->input->post('id_guru');

		$row   = $this->m_data->get_iduser($id_guru);
		$rowid = $row->id; 

		$this->m_data->updateuserwali($rowid);



		$data = array(
			'id_guru_fk'=> $this->input->post('id_guru', true)
			);
		$this->m_data->input_wali($data, 'wali_kelas');
	
		
		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Wali kelas Berhasil Ditambah! </div>');
		redirect('admin/daftar_wali');


		}
	}

		public function hapus_wali()
	{

		try {
		$id = $this->input->get('id');

		$row   =$this->m_data->get_iduserwali($id);
		$rowid = $row->id; 


        $this->db->delete('wali_kelas', array('id_wali'=> $this->input->get('id')));
        $db_error = $this->db->error();
        if (!empty($db_error)) {
           if($db_error['code'] == 0){
           	$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data Berhasil Dihapus </div>');
               $this->m_data->updatedeleteuserwali($rowid);
    			redirect('admin/daftar_wali');
				
           }
           else{
           	$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Tidak Bisa Di Hapus!!!! </div>');
	    
    		redirect('admin/daftar_wali');
           }
            return false; // unreachable retrun statement !!!
        }
	        return TRUE;
	    } catch (Exception $e) {
	        // this will not catch DB related errors. But it will include them, because this is more general. 
	        echo $e->getMessage();
	        return;
	    	}


		

}


// CONTROLLER SISWA


	public function daftar_siswa()
	{
		
		$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

		$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester

		$data['siswa'] =  $this->m_data->tampil_siswa($tahun,$semester);
		$data['content'] = 'view_admin/data_siswa/daftar_siswa';


		$this->load->view('templates/templates', $data);

		
	}
	public function form(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->m_data->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		
		$data['siswa'] = $this->m_data->tampil_siswa($tahun_ajaran);
		$data['content'] = 'view_admin/data_siswa/daftar_siswa';


		$this->load->view('templates/templates', $data);
	}

	public function import(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = [];
		
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data, [
					'nama_siswa'=>$row['A'], // Insert data nis dari kolom A di excel
					'nipd'=>$row['B'], // Insert data nama dari kolom B di excel
					'jk'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
					'nisn'=>$row['D'], // Insert data jenis kelamin dari kolom C di excel
					'tempat_lahir'=>$row['E'], // Insert data jenis kelamin dari kolom C di excel
					'tgl_lahir'=>$row['F'], // Insert data jenis kelamin dari kolom C di excel
					'agama'=>$row['G'], // Insert data jenis kelamin dari kolom C di excel
					'alamat' =>$row['H'],
					'RT' =>$row['I'],
					'RW' =>$row['J'],
					'dusun' => $row['K'],
					'kelurahan'=> $row['L'],
					'kecamatan'=> $row['M'],
					'kode_pos'=> $row['N'],
					'no_hp_ortu'=>$row['O'], // Insert data jenis kelamin dari kolom C di excel
					
						
				]);
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->m_data->insert_multiple($data);
		
		redirect("admin/daftar_siswa"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}


	public function form_siswa()
	{

		$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

		$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester

		$data['kelas'] = $this->m_data->tampil_kelas();
		$data['siswa'] = $this->m_data->tampil_siswa($tahun,$semester);
		$data['content'] = 'view_admin/data_siswa/form_siswa';


		$this->load->view('templates/templates', $data);


	}
	public function tambah_siswa()
	{
	
		$this->form_validation->set_rules('nama_siswa', 'nama_siswa', 'required|trim');
		$this->form_validation->set_rules('nipd', 'nipd', 'required|trim|numeric|min_length[4]|max_length[4]');
		$this->form_validation->set_rules('nisn', 'nisn', 'required|trim|numeric|min_length[10]|max_length[10]');
		// $idkelasv = $this->input->post('id_kelas');
		// $jkv = $this->input->post('jk');
		// $agamav = $this->input->post('agama');

		
		if ($this->form_validation->run() == false) 
		{

			$tahun_ajaran = $this->session->userdata('tahun_ajaran');
			$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

			$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester


			$data['judul'] = 'Halaman Tambah Siswa';
			$data['content'] = 'view_admin/data_siswa/form_siswa_validasi';
			
			$data['validasi_kelas'] = $idkelasv;
            $data['kelas'] = $this->m_data->tampil_kelas();
		    $data['siswa'] = $this->m_data->tampil_siswa($tahun,$semester);
		    $data['validasi_jk'] =$jkv;
		    $data['validasi_agama']=$agamav;

			$this->load->view('templates/templates', $data);

			
		}else{

      

		$nama_siswa = $this->input->post('nama_siswa');
		$nipd = $this->input->post('nipd');
		$jk = $this->input->post('jk');
		$nisn = $this->input->post('nisn');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$myTime = strtotime($tgl_lahir); 
        $dateconvert = date("Y-m-d", $myTime);

		$agama = $this->input->post('agama');
		$alamat = $this->input->post('alamat');
		$rt = $this->input->post('RT');
		$rw = $this->input->post('RW');
		$dusun = $this->input->post('dusun');
		$kelurahan = $this->input->post('kelurahan');
		$kecamatan = $this->input->post('kecamatan');
		$kode_pos = $this->input->post('kode_pos');	
		$no_hp_ortu = $this->input->post('no_hp_ortu');
	

		// $data = array(

		// 	// 'nama_siswa'=> $this->input->post('nama_siswa', true),
		// 	// 'nipd' => $this->input->post('nipd', true),
		// 	// 'jk'=> $this->input->post('jk', true),
		// 	// 'nisn' => $this->input->post('nisn'),
		// 	// 'tempat_lahir' => $this->input->post('tempat_lahir'),
		// 	// 'tgl_lahir' => $dateconvert,
		// 	// 'agama' => $this->input->post('agama'),
		// 	// 'alamat'=> $this->input->post('alamat'),
		// 	// 'RT' => $this->input->post('RT'),
		// 	// 'RW' => $this->input->post('RW'),
		// 	// 'dusun' => $this->input->post('dusun'),
		// 	// 'kelurahan' => $this->input->post('kelurahan'),
		// 	// 'kecamatan' => $this->input->post('kecamatan'),
		// 	// 'kode_pos' => $this->input->post('kode_pos'),
		// 	// 'no_hp_ortu' => $this->input->post('no_hp_ortu')
						

		// 	);

		$data = array(
			
			'nama_siswa'=> $nama_siswa,
			'nipd' => $nipd,
			'jk'=> $jk,
			'nisn' => $nisn,
			'tempat_lahir' => $tempat_lahir,
			'tgl_lahir' =>$dateconvert,
			'agama'=>$agama,
			'alamat'=> $alamat,
			'RT' => $rt,
			'RW' => $rw,
			'dusun' => $dusun,
			'kelurahan' => $kelurahan,
			'kecamatan' => $kecamatan,
			'kode_pos' => $kode_pos,
			'no_hp_ortu' => $no_hp_ortu

		);

		$this->m_data->input_siswa($data, 'siswa');
		//$this->m_data->input_guru($this->input->post());
		
		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data Siswa Berhasil Ditambahkan! </div>');
		redirect('admin/daftar_siswa');

		}
	}
	public function edit_siswa($id_siswa)
	{
		$data['kelas'] = $this->m_data->tampil_kelas();
		//$data['presensi'] = $this->m_data->tampil_presensi()->result();
		$data['siswa'] = $this->m_data->edit_siswa($id_siswa);
		$data['content'] = 'view_admin/data_siswa/edit_siswa';


		$this->load->view('templates/templates', $data);


	}

	public function update_siswa()
	{
	//$data['pembelajaran'] = $this->m_data->update_angkatan();
		$kode2 = $this->input->post('kode');
		$nama_siswa = $this->input->post('nama_siswa');
		$nipd = $this->input->post('nipd');
		$jk = $this->input->post('jk');
		$nisn = $this->input->post('nisn');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$agama = $this->input->post('agama');
		$alamat = $this->input->post('alamat');
		$rt = $this->input->post('RT');
		$rw = $this->input->post('RW');
		$dusun = $this->input->post('dusun');
		$kelurahan = $this->input->post('kelurahan');
		$kecamatan = $this->input->post('kecamatan');
		$kode_pos = $this->input->post('kode_pos');
		$no_hp = $this->input->post('no_hp_ortu');
	
	 
		$data = array(
			
			'nama_siswa'=> $nama_siswa,
			'nipd' => $nipd,
			'jk'=> $jk,
			'nisn' => $nisn,
			'tempat_lahir' => $tempat_lahir,
			'tgl_lahir' =>$tgl_lahir,
			'agama'=>$agama,
			'alamat'=> $alamat,
			'RT' => $rt,
			'RW' => $rw,
			'dusun' => $dusun,
			'kelurahan' => $kelurahan,
			'kecamatan' => $kecamatan,
			'kode_pos' => $kode_pos,
			'no_hp_ortu' => $no_hp

		);
	 
	 
		$this->m_data->update_siswa( $kode2,$data);

    	$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data Berhasil diubah </div>');
		redirect('admin/daftar_siswa');
	
		
	}

	public function hapus_siswa()
	{

		try {
        $this->db->delete('siswa', array('id_siswa'=> $this->input->get('id')));
        $db_error = $this->db->error();
        if (!empty($db_error)) {
           if($db_error['code'] == 0){
           	$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data Berhasil Dihapus </div>');
           	    // $this->m_data->updatedeleteuserwali($rowid);
    		redirect('admin/daftar_siswa');
			
           }
           else{
           	$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data Tidak Bisa Di Hapus!!!! </div>');

    		redirect('admin/daftar_siswa');
           }
            return false; // unreachable retrun statement !!!
        }
	        return TRUE;
	    } catch (Exception $e) {
	        // this will not catch DB related errors. But it will include them, because this is more general. 
	        echo $e->getMessage();
	        return;
	    	}
								
	}
	function get_jadwalpresensi(){
        $id=$this->input->post('id');
        $data=$this->m_data->get_mjadwalpresensi($id);
        echo json_encode($data);
    }

    // CONTROLLER TAHUN AJARAN
    public function daftar_tahunajaran()
	{

		$data['tahun_ajaran'] = $this->m_data->tampil_tahunajaran();
	
		$data['content']   =  'view_admin/tahun_ajaran/daftar_tahunajaran';
        $this->load->view('templates/templates',$data); 
		
	}

		public function edit_tahun($id_tahun_ajaran)
	{
		
		$data['tahun_ajaran'] = $this->m_data->edit_tahun($id_tahun_ajaran);
		$data['semester'] = $this->m_data->tampil_semester();
		//$data['status'] = $this->m_data->tampil_status_tahun();
		$data['content']   =  'view_admin/tahun_ajaran/edit_tahun';

		$this->load->view('templates/templates',$data); 

	}
	public function update_tahun()
	{
		//$id_tahun_ajaran = $this->input->post('id_tahun_ajaran');
		$kode2 = $this->input->post('kode');
		$tahun_ajaran = $this->input->post('tahun_ajaran');
		$semester = $this->input->post('semester');
		$status = $this->input->post('status');

	
		$data = array(
			
			'tahun_ajaran' => $tahun_ajaran,
			'status' =>$status,
			'kd_semester' =>$semester
			

			);
	 
		$this->m_data->update_tahun($data, $kode2);
		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data Berhasil diubah </div>');
		redirect('admin/daftar_tahunajaran');
	
		
	}
	public function form_tahun()
	{
		$data['tahun_ajaran'] = $this->m_data->tampil_tahun()->result();
		$data['semester'] = $this->m_data->tampil_semester();
		$data['content'] = 'view_admin/tahun_ajaran/form_tahun';

		$this->load->view('templates/templates', $data);

	}
	public function tambah_tahun()
	{
	
	

		$this->form_validation->set_rules('tahun_ajaran', 'tahun_ajaran', 'required|trim');

		
		if ($this->form_validation->run() == false) 
		{
		$data['judul'] = 'Halaman Tambah Tahun Ajaran';

		$data['content']   =  'view_admin/tahun_ajaran/form_tahun';
        $this->load->view('templates/templates',$data);
			
		}else{

		$tahun_ajaran = $this->input->post('tahun_ajaran');
		$status = $this->input->post('status');
		$semester = $this->input->post('semester');
		

		$data = array(
			
			'tahun_ajaran' => $tahun_ajaran,
			'status' =>$status,
			'kd_semester' =>$semester
			

			);
	 
		$this->m_data->input_tahun($data, 'tahun_ajaran');
		
		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Tahun Ajaran Baru Berhasil Ditambah! </div>');
		redirect('admin/daftar_tahunajaran');


		}
	}

	// CONTROLLER KELAS SISWA
	public function daftar_kelas()
	{

		
		

		$data['kelas'] = $this->m_data->tampil_kelas();
		//$data['tahun_rombel'] = $this->m_data->tampil_tahun_rombel($tahun,$semester);
	
		$data['content']   =  'view_admin/data_kelas/daftar_kelas';
        $this->load->view('templates/templates',$data); 
		
	}
	public function form_kelas()
	{

		
		//$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		$data['kelas'] = $this->m_data->tampil_kelas();

		$data['content'] = 'view_admin/data_kelas/form_kelas';


		$this->load->view('templates/templates', $data);


	}
	public function tambah_kelas()
	{
		$this->form_validation->set_rules('nama_kelas', 'nama_kelas','required|trim|is_unique[kelas.nama_kelas]', [
			'is_unique' => 'Nama Kelas ini sudah terdaftar!']);
		
		
		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Halaman Tambah Rombel';
			$data['content'] = 'view_admin/data_kelas/form_kelas';


		$this->load->view('templates/templates', $data);

		

	} else {
		$this->m_data->input_kelas($this->input->post());
		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data Berhasil Ditambah! </div>');
		redirect('admin/daftar_kelas');
	}
		
	}
	public function edit_kelas($id_kelas)
	{
		$data['kelas'] = $this->m_data->edit_kelas($id_kelas)->row(1);

		$data['content']   =  'view_admin/data_kelas/edit_kelas';

		$this->load->view('templates/templates',$data);
		

	}
	public function update_kelas()
	{
	

		$id_kelas = $this->input->post('id_kelas');
		$nama_kelas = $this->input->post('nama_kelas');
		// $jumlah_siswa = $this->input->post('jumlah_siswa');
		// $jurusan = $this->input->post('jurusan');
		$tingkat_kelas = $this->input->post('tingkat_kelas');
		$ruangan = $this->input->post('ruangan');
		

	 
		$data = array(
			'id_kelas' => $id_kelas,
			'nama_kelas' => $nama_kelas,
			// 'jumlah_siswa' => $jumlah_siswa,
			// 'jurusan' => $jurusan,
			'tingkat_kelas' => $tingkat_kelas,
			'ruangan' => $ruangan,
		

			);
		
	 
		 $this->m_data->update_kelas($data, $id_kelas);

		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Kelas Baru Berhasil Ditambah! </div>');
		redirect('admin/daftar_kelas');
	
		
	}
	public function hapus_kelas()
	{

		$this->db->delete('kelas', array('id_kelas'=> $this->input->get('id_kelas', FALSE)));

		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data Berhasil Dihapus! </div>');
		redirect('admin/daftar_kelas');
	}	



	// CONTROLLER DETAIL KELAS SISWA

 	public function daftar_rombel()
	{

		
		$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

		$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester

		$data['rombel'] = $this->m_data->tampil_rombel($tahun,$semester);
		$data['tahun_rombel'] = $this->m_data->tampil_tahun_rombel($tahun,$semester);
	
		$data['content']   =  'view_admin/rombongan_belajar/daftar_rombel';
        $this->load->view('templates/templates',$data); 
		
	}

	public function form_rombel()
	{

		
		//$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		$data['siswa'] = $this->m_data->tampil_siswa_all();
		$data['kelas'] = $this->m_data->tampil_kelas();
		$data['wali'] = $this->m_data->tampil_wali();
		$data['tahun'] = $this->m_data->tampil_tahunajaran();

		$data['content'] = 'view_admin/rombongan_belajar/form_rombel';


		$this->load->view('templates/templates', $data);


	}
	public function tambah_rombel()
	{
	
			if($this->input->post('id_siswa') == '' || $this->input->post('id_siswa') == null)
			{
			//$siswa = $this->input->post('id_siswa');
			$kelas = $this->input->post('id_kelas');
			$wali = $this->input->post('nip');
			$tahun = $this->input->post('id_tahun_ajaran');

			$data = array(
				
			//	'id_siswa' => $siswa,
				'id_kelas' =>$kelas,
				'id_wali_fk' => $wali,
				'id_tahun_ajaran_fk' => $tahun


				

				);
		 
			$this->m_data->input_detail($data,'detail_kelas_siswa');
			
			$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Tahun Ajaran Baru Berhasil Ditambah! </div>');
			redirect('admin/daftar_rombel');	         

       		}
	        else{ // NGINPUTKAN SEMUANYA

			$siswa = $this->input->post('id_siswa');
			$kelas = $this->input->post('id_kelas');
			$wali = $this->input->post('nip');
			$tahun = $this->input->post('id_tahun_ajaran');

			$data = array(
				
				'id_siswa' => $siswa,
				'id_kelas' =>$kelas,
				'id_wali_fk' => $wali,
				'id_tahun_ajaran_fk' => $tahun


				

				);
		 
			$this->m_data->input_detail($data,'detail_kelas_siswa');
			
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Tahun Ajaran Baru Berhasil Ditambah! </div>');
			redirect('admin/daftar_rombel');
			}
		
	}
	public function edit_rombel($id_detail)
	{
		$data['siswa'] = $this->m_data->tampil_siswa_all();
		$data['kelas'] = $this->m_data->tampil_kelas();
		$data['wali'] = $this->m_data->tampil_wali();
		$data['tahun'] = $this->m_data->tampil_tahunajaran();
		
		$data['rombel'] = $this->m_data->edit_rombel($id_detail)->row(1);

		$data['content']   =  'view_admin/rombongan_belajar/edit_rombel';

		$this->load->view('templates/templates',$data);
		

	}
	
	public function update_rombel()
	{
		$id = $this->input->post('id');
		$siswa = $this->input->post('id_siswa');
		$kelas = $this->input->post('id_kelas');
		$wali  = $this->input->post('nip');
		$tahun = $this->input->post('id_tahun_ajaran');

	
		$data = array(
			
			'id_siswa' => $siswa,
			'id_kelas' => $kelas,
			'id_wali_fk' => $wali,
			'id_tahun_ajaran_fk' => $tahun,


			);
	 
		$this->m_data->update_rombel_siswa($id, $data);
		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Data Berhasil diubah </div>');
		redirect('admin/daftar_rombel');
	
		
	}


}




 ?>
