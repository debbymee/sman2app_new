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
	 		redirect(base_url('loginuser'));
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
		
		$data['content']   =  'view_wali/dashboard';
        $this->load->view('templates_wali/templates_wali',$data); 

	}
	public function bio_wali($id)
	{
		
	
		$data['wali'] = $this->m_wali->tampil_wali($id);
		
		$data['content']   =  'view_wali/biodata/bio_wali';
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
		$data['content']   =  'view_wali/biodata/edit_pass';
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
		$this->session->set_flashdata('hehe','<div class="alert alert-info" role="alert">Password berhasil diubah, silahkan login kembali! </div>');
		redirect('loginuser');
	
		
	}

	public function lihat_presensi() 
	{
	// $tahun_ajaran = $this->session->userdata('tahun_ajaran');
	// 	$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

	// 	$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester
	$tahun = $this->session->userdata('tahun_ajaran');
	$semester = $this->session->userdata('semester');
  
    $id_wali = $this->session->userdata('nip');
    $id_guru = $this->session->userdata('id_guru');
	
	$data['presensi'] = $this->m_wali->tampil_presensi3($tahun,$semester,$id_guru);

	$data['content']   =  'view_wali/presensi/lihat_presensi';
    $this->load->view('templates_wali/templates_wali',$data);

		
	}
	public function lihat_presensi_kelas() 
	{
	// $tahun_ajaran = $this->session->userdata('tahun_ajaran');
	// 	$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

	// 	$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester
	$tahun = $this->session->userdata('tahun_ajaran');
	$semester = $this->session->userdata('semester');
  
    $id_wali = $this->session->userdata('nip');
    $id_guru = $this->session->userdata('id_guru');
	
	$data['presensi'] = $this->m_wali->tampil_presensi_kelas($tahun,$semester,$id_wali);

	$data['content']   =  'view_wali/presensi/lihat_presensi_kelas';
    $this->load->view('templates_wali/templates_wali',$data);

		
	}
	public function daftarkelas_presensi3()
	{
		$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

		$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester
		$id_guru = $this->session->userdata('id_guru');
	
		$data['rombel'] = $this->m_wali->tampil_rombelpresensi3($id_guru);
		$data['lihat_presensi'] = $this->m_wali->tampil_presensi3($tahun,$semester,$id_guru);
	
		// $data['guru'] = $this->m_data->tampil_guruu()->result();
		// $data['mata_pelajaran'] = $this->m_data->tampil_detailj()->result();
		$data['content']   =  'view_wali/presensi/daftarkelas_presensi3';
		$this->load->view('templates_wali/templates_wali',$data);

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

		$tahun = $this->session->userdata('tahun_ajaran');
		$semester = $this->session->userdata('semester');
		$id_wali = $this->session->userdata('nip');
		$id_guru = $this->session->userdata('id_guru');

		$urikelas = $this->uri->segment(4);
		$id_kelas_fk = $this->uri->segment(3); // mengambil get url urutan slice ke 3
		$data['kelas'] = urldecode($urikelas);
		$id_kelas = $id_kelas_fk;

		$data['siswa'] = $this->m_wali->tampil_namasiswa($id_kelas,$tahun,$semester)->result();
		$data['jadwalll'] = $this->m_wali->tampil_jadwalll($id_kelas,$id_guru,$tahun,$semester,$hariindonesia)->result();

		$data['keterangan_presensi'] = $this->m_wali->tampil_keterangan()->result();
		$data['content']   =  'view_wali/presensi/inputpresensi12';
   		$this->load->view('templates_wali/templates_wali',$data);
	}

		public function tambah_presensi12()
	{

	
			$tanggal   = $this->input->post('tgl');
			$id_jadwal = $this->input->post('id_jadwal');
			$modul_pembahasan = $this->input->post('modul_pembahasan');
			//$cekguru = $this->input->post('kd_keterangan_guru_fk');

			$cekpresensi  = $this->m_wali->cek_absens($id_jadwal,$tanggal);
				
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
				     "modul_pembahasan" => $modul_pembahasan,
				    "id_siswa_fk"  => $_POST['id_siswa'][$key]
			    );
			}
		
			$this->m_wali->input_presensi12($result);
			$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"> Berhasil Dibuat! </div>');
			redirect('Wali_kelas/lihat_presensi');
		}
		else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Data Presensi Sudah Ada </div>');
			redirect('Wali_kelas/lihat_presensi');
		}
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

		$data['content']   =  'view_wali/presensi/edit_presensi12';
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
	// Laporan per jadwal 

	 function view_laporan_perjadwal() 
	{
		$tahun = $this->session->userdata('tahun_ajaran');
		$semester = $this->session->userdata('semester');
		$data['nama'] = $this->session->userdata('nama_guru');
        // $tgl = $this->input->post('tgl');
        // $data['jadwal'] = $this->input->post('tgl');


        $id_jadwal = $this->input->post('id_jadwal');
        $id_wali = $this->session->userdata('nip');
        
        $row   = $this->m_wali->get_kelaswali($id_wali);
	    $id_kelas = $row->id_kelas; 
	    $data['kelas'] = $row->nama_kelas;
		$data['siswa'] =  $this->m_wali->tampil_siswa($tahun,$semester,$id_wali);


    	$data['jadwalll'] = $this->m_wali->tampil_jadwal_laporan($tahun, $semester,$id_kelas)->result();
    	$data['content']   =  'view_wali/laporan-perjadwal/formlaporan';
   		$this->load->view('templates_wali/templates_wali',$data);

		
	}

    function laporan_perjadwal(){


    	
    	$tahun = $this->session->userdata('tahun_ajaran');
		$semester = $this->session->userdata('semester');
		$data['nama'] = $this->session->userdata('nama_guru');
		
        $data['jadwal'] = $this->input->post('tgl');
		$id_kelas = $this->input->post('id_kelas');
	    $id_siswa = implode(",",$this->input->post('id'));
        $tgl_awal = $this->input->post('tgl_awal');//ini
		$tgl_akhir = $this->input->post('tgl_akhir');//ini
		
        $id_jadwal = $this->input->post('id_jadwal');
        $id_wali = $this->session->userdata('nip');
        
        
        $row   = $this->m_wali->get_kelaswali($id_wali);
	    $id_kelas = $row->id_kelas; 
	    $data['kelas'] = $row->nama_kelas;
	 

		
	    //foreach get tanggal presensi, nama_pelajaran,jam_pelajaran sesuai tanggal
    	$data['tgl'] = $this->m_wali->tampil_presensi_laporan($id_jadwal,$tgl_awal,$tgl_akhir,$id_siswa);//for atas

    	//foreach siswa keterangan
      	$data['detailsiswa'] = $this->m_wali->tampil_presensi_laporan2($id_siswa,$tgl_awal,$tgl_akhir,$id_jadwal);//for bawah
    	$data['content']   =  'view_wali/laporan-perjadwal/lihat_laporan';



   		 $this->load->library('Pdf');
    	$html = $this->load->view('templates_wali/templates_wali',$data); 
	    $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-perjadwal";
        $this->pdf->load_view('view_wali/laporan-perjadwal/lihat_laporan', $data); 
   
	 
    }

//ini home laporan 
	 public function view_laporan() 
	{
		
    	$data['content']   =  'view_wali/home-laporan/form_home_laporan';
   		$this->load->view('templates_wali/templates_wali',$data);

		
	}

// cetak per hari
     public function view_laporan_perhari() 
	{
		$tahun = $this->session->userdata('tahun_ajaran');
		$semester = $this->session->userdata('semester');
		$id_wali = $this->session->userdata('nip');
		$row   = $this->m_wali->get_kelaswali($id_wali);
	    $data['kelas'] = $row->nama_kelas;
		$data['siswa'] =  $this->m_wali->tampil_siswa($tahun,$semester,$id_wali);
    	$data['content']   =  'view_wali/laporan-perhari/formperhari';
   		$this->load->view('templates_wali/templates_wali',$data);

		
	}

    function laporan_perhari(){


		$id_kelas = $this->input->post('id_kelas');
		$id_siswa = implode(",",$this->input->post('id'));
		$tgl_awal = $this->input->post('tgl_awal');//ini
		$tgl_akhir = $this->input->post('tgl_akhir');//ini
		

		$data['detailsiswa'] = $this->m_wali->tampil_persiswa1($id_kelas,$id_siswa);
    
      	$data['detailsiswa2'] = $this->m_wali->tampil_persiswa2($id_siswa,$tgl_awal,$tgl_akhir);//ini


    	$data['content']   =  'view_wali/laporan-perhari/lihat_laporan_perhari';
    	 $this->load->library('Pdf');
    	$html = $this->load->view('templates_wali/templates_wali',$data); 
	    $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-perhari";
        $this->pdf->load_view('view_wali/laporan-perhari/lihat_laporan_perhari', $data); 
    }

// view laporan per bulan

	public function view_laporan_perbulan() 
	{
		$tahun = $this->session->userdata('tahun_ajaran');
		$semester = $this->session->userdata('semester');
		$id_wali = $this->session->userdata('nip');
		$row   = $this->m_wali->get_kelaswali($id_wali);
	    $data['kelas'] = $row->nama_kelas;
		$data['siswa'] =  $this->m_wali->tampil_siswa($tahun,$semester,$id_wali);
    	$data['content']   =  'view_wali/laporan-perbulan/formperbulan';
   		$this->load->view('templates_wali/templates_wali',$data);

		
	}

    function laporan_perbulan(){
		$bulan = $this->input->post('bulan');
    	$id_kelas = $this->session->userdata('id_kelas');
    	$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		$semester = $this->session->userdata('semester');
		$data['semestercek'] = $this->session->userdata('semester');
		$id_wali = $this->session->userdata('nip');
		 //$bulan = '02';
		$data['bulan'] = $bulan;
		$data['month'] = $bulan;
		$data['year'] = date("Y");

		$id_siswa = implode(",",$this->input->post('id'));
	    $data['data_siswa'] = $this->m_wali->get_siswa($id_kelas,$tahun_ajaran,$semester,$id_siswa);
		$data['pres'] = $this->m_wali->bulan($bulan,$id_kelas,$tahun_ajaran,$semester,$id_siswa);
		$data['ttd'] = $this->m_wali->tampil_ttd($id_wali);
   

    	$data['content']   =  'view_wali/laporan-perbulan/lihat_laporan_perbulan';
    	 $this->load->library('Pdf');
    	$html = $this->load->view('templates_wali/templates_wali',$data); 
	    $this->pdf->setPaper('Legal', 'landscape');
        $this->pdf->filename = "laporan-presensi";
        $this->pdf->load_view('view_wali/laporan-perbulan/lihat_laporan_perbulan', $data); 
    }

	function detail_cetak_siswa($id_siswa){

    	$data['siswa'] = $this->m_wali->tampil_detail_siswa($id_siswa);
    	$data['content']   =  'view_wali/laporan-persiswa/detail_cetak_siswa';


   		// $html = $this->load->view('templates_wali/templates_wali',$data); 
	    // $this->pdf->setPaper('A4', 'potrait');
     //    $this->pdf->filename = "laporan-presensi";
        $this->load->view('templates_wali/templates_wali',$data);
    }
   

// cetak laporan per semester
	function view_laporan_persemester(){


		$tahun = $this->session->userdata('tahun_ajaran');
		$semester = $this->session->userdata('semester');
		$id_wali = $this->session->userdata('nip');
		$row   = $this->m_wali->get_kelaswali($id_wali);
	    $data['kelas'] = $row->nama_kelas;
		$data['siswa'] =  $this->m_wali->tampil_siswa($tahun,$semester,$id_wali);
    	$data['content']   =  'view_wali/laporan-persemester/formpersemester';
   		$this->load->view('templates_wali/templates_wali',$data);
	}

	function laporan_persemester()
	{
		$data['id_siswa'] = implode(",",$this->input->post('id'));
		$data['semester'] = $this->input->post('semester');
		$data['content']   =  'view_wali/laporan-persemester/lihat_laporan_persemester';
    	$this->load->library('Pdf');
    	$html = $this->load->view('templates_wali/templates_wali',$data); 
	    $this->pdf->setPaper('Legal', 'landscape');
        $this->pdf->filename = "laporan-presensi";
        $this->pdf->load_view('view_wali/laporan-persemester/lihat_laporan_persemester', $data);
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

			'nip_wali' => $this->session->userdata('nip'),
			'id_presensi_fk' => $id_presensi,
			'pesan' => $pesan,
			'tanggal_terkirim' => $tgl,
			'jam_terkirim' => $jam

		);

    	$this->m_wali->wa_message_send($data);
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
    	$id_wali = $this->session->userdata('nip');
    	$tahun = $this->session->userdata('tahun_ajaran');
		$semester = $this->session->userdata('semester');
  
		$data['siswa'] = $this->m_wali->siswa_wa($id_wali,$tahun,$semester,$tgl);
		$this->load->view('view_wali/wa',$data);
		

    }

    function testingtemplate(){
    	$data['content']   =  'view_wali/lihat_laporan_persiswa';
    	 $this->load->library('Pdf');
    	$html = $this->load->view('templates_wali/templates_wali',$data); 
	    $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-presensi";
        $this->pdf->load_view('view_wali/lihat_laporan_persiswa', $data); 
    }

   
}
