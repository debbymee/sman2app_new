<?php 
 
class M_data extends CI_Model
{

// model dashboard admin
	function countuser(){
    $this->db->select('count(id) as totalcount');
	$this->db->from('users');
	return $this->db->get()->result();
    }
	function countguru(){
    $this->db->select('count(id_guru) as totalcount');
	$this->db->from('guru');
	return $this->db->get()->result();
    }

     function countwali(){
    $this->db->select('count(nip) as totalcount');
    $this->db->from('guru');
	return $this->db->get()->result();
    }

    function countsiswa(){
    $this->db->select('count(id_siswa) as totalcount');
    $this->db->from('siswa');
	return $this->db->get()->result();
    }

    //model pemberitahuan
    function count_pemberitahuan(){
    $this->db->select('count(id_history_guru) as jumlah');
    $this->db->from('history_guru');
    $where = "status = '0' and (kd_keterangan_guru_fk = 1 or kd_keterangan_guru_fk = 3)";
    $this->db->where($where);
	return $this->db->get()->row();
    }
	//model cek unique tahun_ajaran
     function cek_tahun_semester($kd_semester, $tahun_ajaran){
    $this->db->select('count(tahun_ajaran) as cek');
    $this->db->from('tahun_ajaran');
    $where = "kd_semester = '$kd_semester' and tahun_ajaran = '$tahun_ajaran'";
    $this->db->where($where);
	return $this->db->get()->row();
    }
    //model cek unique ROMBEL
     function cek_wali_rombel($id_kelas, $id_tahun_ajaran_fk){
    $this->db->select('count(id_kelas) as cek');
    $this->db->from('detail_kelas_siswa');
    $where = "id_kelas = '$id_kelas' and id_tahun_ajaran_fk = '$id_tahun_ajaran_fk'";
    $this->db->where($where);
	return $this->db->get()->row();
    }


    function update_notif_model($id_history_guru){
    	  $this->db->set('status', 1);
        $this->db->where('id_history_guru', $id_history_guru);
		$this->db->update('history_guru');

    }

     function pemberitahuan(){
      $data = $this->db->query("SELECT history_guru.id_history_guru, guru.nama_guru, history_guru.tgl, mata_pelajaran.nama_pelajaran, keterangan_guru.keterangan_guru FROM `history_guru`
		JOIN presensi ON history_guru.tgl = presensi.tgl
		JOIN jadwal_pelajaran ON presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal
		JOIN mata_pelajaran ON jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel
		JOIN keterangan_guru ON history_guru.kd_keterangan_guru_fk = keterangan_guru.kd_keterangan_guru
		JOIN detail_kelas_siswa ON presensi.id_siswa_fk = detail_kelas_siswa.id_siswa
		JOIN guru ON detail_kelas_siswa.id_wali_fk = guru.nip

		WHERE STATUS = 0 AND (kd_keterangan_guru_fk = 1 or kd_keterangan_guru_fk = 3) AND history_guru.id_jadwal_fk=presensi.id_jadwal_fk
		GROUP BY history_guru.id_history_guru DESC");
		return $data->result();
    }

    function pemberitahuan_detail(){
    	$data = $this->db->query("SELECT history_guru.id_history_guru, guru.nama_guru, history_guru.tgl, mata_pelajaran.nama_pelajaran, keterangan_guru.keterangan_guru,kelas.nama_kelas, jadwal_pelajaran.jam_pelajaran FROM `history_guru`
		JOIN presensi ON history_guru.tgl = presensi.tgl
		JOIN jadwal_pelajaran ON presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal
		JOIN mata_pelajaran ON jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel
		JOIN keterangan_guru ON history_guru.kd_keterangan_guru_fk = keterangan_guru.kd_keterangan_guru
		JOIN detail_kelas_siswa ON presensi.id_siswa_fk = detail_kelas_siswa.id_siswa
		JOIN kelas ON detail_kelas_siswa.id_kelas = kelas.id_kelas
		JOIN guru ON detail_kelas_siswa.id_wali_fk = guru.nip
        AND history_guru.id_jadwal_fk=presensi.id_jadwal_fk WHERE (kd_keterangan_guru_fk = 1 or kd_keterangan_guru_fk = 3) 
		GROUP BY history_guru.id_history_guru DESC");
		return $data->result();
    }

	// validasi aktivasi user

	function cek_validasi($id_user,$nip, $tgl_lahir)
	{

	 	$this->db->select('*');    
     	$this->db->from('users');
     	$this->db->join('guru', 'users.id = guru.id_user_fk');
     	$array = array('id' => $id_user,
     					'nip' => $nip,
     					'tgl_lahir' => $tgl_lahir);
    	$this->db->where($array);
		return $this->db->get()->num_rows();
	}
	function cek_validasi_link($id_user,$nip, $tgl_lahir)
	{

	 	$this->db->select('*');    
     	$this->db->from('users');
     	$this->db->join('guru', 'users.id = guru.id_user_fk');
     	$array = array(
     				
     					'id' => $id_user,
     					'nip' => $nip,
     					'tgl_lahir' => $tgl_lahir);
    	$this->db->where($array);
		return $this->db->get()->num_rows();
	}
	function cek_username_link($username)
	{
	  $this->db->select('*');    
      $this->db->from('users');
      $this->db->where('username', $username);
      $query=$this->db->get();
      return $query->row();
	}
	function update_aktivasi($id_user)
	{

        $this->db->set('is_active', 1);
        $this->db->where('id', $id_user);
		$this->db->update('users');	

	}
// update role nya di login
     function get_iduser($id_guru)
    {
      $this->db->select('*');    
      $this->db->from('users');
      $this->db->join('guru', 'users.id = guru.id_user_fk');
      $this->db->where('guru.id_guru', $id_guru);
      $query=$this->db->get();
      return $query->row();
    }

    function updateuserwali($rowid){
	
        $this->db->set('role_id_fk', 3);
        $this->db->where('id', $rowid);
		$this->db->update('users');
		
	}

	 function updatedeleteuserwali($rowid){
	
        $this->db->set('role_id_fk', 2);
        $this->db->where('id', $rowid);
		$this->db->update('users');
		
	}


// ini model biasa tabel pembelajaran
	// function tampil_data(){
	// 	return $this->db->get('pembelajaran');
	// }

	// function input_data($data,$table){
	// 	$this->db->insert('pembelajaran',$data);
		
	// }
	// function tampil_pem()

	// {
	// 	return $this->db->get('pembelajaran');
	// }

	// function edit_angkatan($id){	


	// return $this->db->get_where('pembelajaran',array('id' => $id))->row();
		
	// }

	// function update_angkatan($kode2,$data){
	// 	$this->db->where('id', $kode2);
	// 	$this->db->update('pembelajaran',$data);
		
	// }
	// public function hapus_data($table,$where){

	// 	$this->db->where('id');
	// 	$this->db->delete($table);
	// 	// $query = $this->db->delete($table, $where);
	// 	// return $query;
	
	// }

	// model registrasi 
	// function registrasi($data){
	// 	//$this->db->insert($table,$data);
	// 	$this->db->insert('login', $data);
			
	// }

	//ini model user management

	function tampil_datauser()
	{
		$this->db->select('*');    
        $this->db->from('users');
        $this->db->join('user_role', 'users.role_id_fk = user_role.id_role','left');
        $this->db->where('id != 1');
        $query = $this->db->get();
        return $query->result();


	}
	function tampil_roleuser()
	{
		$this->db->select('*');
		$this->db->from('user_role');
		$query = $this->db->get();
        return $query->result();
			
	}

	function tampil_siswa_admin()
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('detail_kelas_siswa', 'siswa.id_siswa = detail_kelas_siswa.id_siswa');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas');
		$this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran' );
		$query = $this->db->get();
        return $query->result();
			
	}

	function input_user($data)
	{
		$this->db->insert('users',$data);
		
	}

	function edit_user($id)
	{
		return $this->db->get_where('users',array('id' => $id))->row();
	}

	function update_user($data,$id)
	{
		$this->db->where(['id' => $id]);
		return $this->db->update('users',$data);

	}



	// INI MODEL GURU

		
	function tampil_guru()
	{

		$this->db->select('*');
		$this->db->from('guru');
	//	$this->db->join('users', 'guru.id_user_fk = users.id');

		// $this->db->join('jadwal_pelajaran', 'guru.id_guru = jadwal_pelajaran.id_guru_fk');
		// $this->db->join('kelas', 'jadwal_pelajaran.id_kelas_fk = kelas.id_kelas');
		// $this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran = tahun_ajaran.id_tahun_ajaran');

		return $this->db->get()->result();

 		//return $this->db->query("call tampil_guru();");
	}
	
	function input_guru($data)
	{
		$this->db->insert('guru',$data);
		
	}
	function tampil_username()
	{
	return $this->db->get('users');
	}
	function edit_guru($id_guru)
	{
		return $this->db->get_where('guru',array('id_guru' => $id_guru))->row();
	}
	function update_guru($kode2,$data){
		$this->db->where('id_guru', $kode2);
		$this->db->update('guru',$data);

	
		
	}

	// ini model siswa

	public function upload_file($filename){
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
	public function insert_multiple($data){
		$this->db->insert_batch('siswa', $data);
	}
	public function insert_multiple_guru ($data){
		$this->db->insert_batch('guru', $data);
	}
	
	function tampil_siswa($tahun,$semester)
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('detail_kelas_siswa', 'siswa.id_siswa = detail_kelas_siswa.id_siswa','left');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas','left');
		$this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran','left');

 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );

		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('keterangan_semester.semester', $semester);
		
		
		return $this->db->get()->result();
		
	}
	function tampil_siswa2($tahun_ajaran,$semester,$id_kelas)
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('detail_kelas_siswa', 'siswa.id_siswa = detail_kelas_siswa.id_siswa','left');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas','left');
		$this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran','left');
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');
		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun_ajaran);
		$this->db->where('keterangan_semester.semester', $semester);
		$this->db->where('detail_kelas_siswa.id_kelas', $id_kelas);
		return $this->db->get()->result();
		
	}
	function tampil_siswa_all()
	{
		$current_year = date("Y");
		$this->db->select('*');
		$this->db->from('siswa');
		
		$where = "YEAR(CREATED_ADD) BETWEEN YEAR(DATE_SUB(CURRENT_DATE, INTERVAL 2 YEAR)) AND YEAR(CURRENT_DATE)";

		$this->db->where($where);
		return $this->db->get()->result();
		//return $this->db->get()->result();
		
	}
	function tampil_siswa_before()
	{

		$data = $this->db->query("SELECT siswa.id_siswa,siswa.nama_siswa,siswa.tgl_lahir,siswa.jk,siswa.nipd,siswa.nisn FROM siswa 
			left JOIN detail_kelas_siswa ON siswa.id_siswa = detail_kelas_siswa.id_siswa
			left JOIN tahun_ajaran ON detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran 
			left JOIN keterangan_semester ON tahun_ajaran.kd_semester = keterangan_semester.kd_semester 
			WHERE YEAR(CREATED_ADD) BETWEEN YEAR(DATE_SUB(CURRENT_DATE, INTERVAL 2 YEAR)) AND YEAR(CURRENT_DATE) AND detail_kelas_siswa.id_detail is null
		 ");
		return $data->result();


        
	}

	function get_idtahunajaran($tahun_ajaran,$semester){
		$this->db->select('*');
	$this->db->from('tahun_ajaran');
	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');

	$this->db->where('tahun_ajaran.tahun_ajaran', $tahun_ajaran);
	$this->db->where('keterangan_semester.semester', $semester);
	return $this->db->get()->row();
	}

		function input_siswa($data)
	{
		$this->db->insert('siswa',$data);
		
	}
		function edit_siswa($id_siswa)
	{
		// $this->db->select('*');
		// $this->db->from('siswa');
		// //$this->db->join('kelas', 'siswa.id_kelas_fk = kelas.id_kelas');
		return $this->db->get_where('siswa',array('id_siswa' => $id_siswa))->row();
	}
	function update_siswa($kode2,$data)
	{
		$this->db->where('id_siswa', $kode2);
		$this->db->update('siswa',$data);
	}

	// ini model wali



	// function tampil_wali()
	// {
	// 	return $this->db->query("call tampil_wali();");

	// }

	function tampil_walikelas()
	{

		$this->db->select('*');
		$this->db->from('guru');
	
		$this->db->join('detail_kelas_siswa', 'guru.nip = detail_kelas_siswa.id_wali_fk');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas');
		$this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');

		//$this->db->where('role_id_fk = 3');

		$query = $this->db->get();
		return $query->result();

	}

	function tampil_wali()
	{

		$this->db->select('*');
		$this->db->from('guru');	$query = $this->db->get();
		return $query->result();
	}
	function input_wali($data)
	{
	$this->db->insert('wali_kelas',$data);	
	}

	// ini model jadwalpelajaran

		function tampil_jdwl12($tahun,$semester)
	{
		$this->db->select('*');
		$this->db->from('jadwal_pelajaran');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel','left');
		$this->db->join('kelas', 'jadwal_pelajaran.id_kelas_fk = kelas.id_kelas','left');
		$this->db->join('guru', ' jadwal_pelajaran.id_guru_fk = guru.id_guru','left');
		$this->db->join('tahun_ajaran', ' jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran','left');
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );

		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('keterangan_semester.semester', $semester);
		$this->db->order_by('jadwal_pelajaran.id_jadwal', 'desc');


		

		return $this->db->get()->result();
		
	}
		function tampil_detailj()
	{
		return $this->db->get('mata_pelajaran');
	}
		function tampil_guruu()
	{
		return $this->db->get('guru');
	}
		function tampil_kelas()
	{
		$this->db->select('*');    
        $this->db->from('kelas');
        $query = $this->db->get();
        return $query->result();
	}
	function tampil_kelas1()
	{
		$this->db->select('*');    
        $this->db->from('kelas');
        $this->db->limit(1); 
        $query = $this->db->get();
        return $query->result();
	}
	function input_jadwal($data)
	{
		$this->db->insert('jadwal_pelajaran',$data);
		//$this->db->where('tingkat_kelas = 10');
		
	}
	// 	function cek_jadwal($cekhari,$cekjam_mulai, $cekjam_selesai, $cek_mapel)
	// {	
	// 	$sql = "SELECT * FROM jadwalpelajaran join mata_pelajaran on jadwalpelajaran.kd_mapel = mata_pelajaran.kd_mapel  WHERE jadwalpelajaran.hari='$cekhari' and mata_pelajaran.kd_mapel='$cek_mapel'";
 //        $cek = $this->db->query($sql);
 //        return $cek->row();
	// }
	function edit_jadwal($id)
	{
		return $this->db->get_where('jadwal_pelajaran',array('id_jadwal' => $id));
	}

	function update_jadwal($data,$id)
	{

	$this->db->where('id_jadwal', $id);
	$this->db->update('jadwal_pelajaran',$data);
	}

	// MODEL PRESENSI



	function eTampilPresensi($id_presensi)
	{
		$this->db->select('*');
		$this->db->from('presensi');
		$this->db->join('detail_kelas_siswa', 'presensi.id_siswa_fk = detail_kelas_siswa.id_siswa');
		$this->db->join('siswa','detail_kelas_siswa.id_siswa = siswa.id_siswa');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas');
		$this->db->join('jadwal_pelajaran', 'presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		$this->db->where('id_presensi', $id_presensi);
		return $this->db->get()->result();

	
	
	}

	function cek_absen($cektgl)
	{	
		$sql = "SELECT * FROM presensi where tgl = '$cektgl'";
        $cek = $this->db->query($sql);
        return $cek->row_array();
	}
	function cek_absens($id_jadwal,$cektgl)
	{

	 	$this->db->select('*');    
     	$this->db->from('presensi');
     	$this->db->join('jadwal_pelajaran', 'presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal');
     	$array = array('id_jadwal_fk' => $id_jadwal,
     					'tgl' => $cektgl
     					);
    	$this->db->where($array);
		return $this->db->get()->num_rows();
	}
	function get_mjadwalpresensi($id,$hariindonesia,$tahun,$semester)
	{
        $this->db->select('*');
        $this->db->from('jadwal_pelajaran');
        $this->db->where('kd_mapel_fk', $id);
        $this->db->where('jadwal_pelajaran.hari', $hariindonesia);


     	return $this->db->get()->result();
    }
    function getmapelpresensi($id)
    {
    	$this->db->select('*');
        $this->db->from('presensi');
        $this->db->join('jadwal_pelajaran', 'presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal');
        $this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
        $this->db->where('kd_mapel_fk', $id);

     	return $this->db->get()->result();

    	
    }
//
		function tampil_presensi3($tahun,$semester)
	{   

		$this->db->select('*');
		$this->db->from('presensi');
		$this->db->join('detail_kelas_siswa', 'presensi.id_siswa_fk = detail_kelas_siswa.id_siswa');
		$this->db->join('siswa', 'detail_kelas_siswa.id_siswa = siswa.id_siswa');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas');
		$this->db->join('keterangan_presensi', 'presensi.kd_keterangan_fk = keterangan_presensi.kd_keterangan');
		$this->db->join('jadwal_pelajaran', ' presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );

		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('keterangan_semester.semester', $semester);

		$this->db->order_by('presensi.id_presensi', 'desc');



		//$this->db->where('tingkat_kelas = 12');

		return $this->db->get()->result();

	//	$this->db->where('tingkat_kelas = 12');
	
	}

	function tampil_rombelpresensi3()
	{
		$this->db->select('*');
		$this->db->from('kelas');
		//$this->db->where('tingkat_kelas = 12');
		return $this->db->get();
	
	}
		function input_presensi12($result)
	{
		$this->db->insert_batch('presensi',$result);
	}
		function tampil_namasiswa($tahun_ajaran, $id_kelas)
	{
	
		$this->db->select('*');
		$this->db->from('detail_kelas_siswa');
		$this->db->join('siswa', 'detail_kelas_siswa.id_siswa = siswa.id_siswa');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas');
		$this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun_ajaran);
		$this->db->where('kelas.id_kelas', $id_kelas);
		return $this->db->get();

	}


		function tampil_jadwalll($id_kelas_fk,$hariindonesia,$tahun,$semester)
	{
		$this->db->select("TIMEDIFF (CURRENT_TIME,master_jam_pelajaran.waktu_mulai) as batas_input,
			jadwal_pelajaran.*,mata_pelajaran.*");
		$this->db->from('jadwal_pelajaran');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');
	$this->db->join('master_jam_pelajaran', 'jadwal_pelajaran.jam_pelajaran_dimulai = master_jam_pelajaran.jam_pelajaran_dimulai');
		$this->db->where('jadwal_pelajaran.id_kelas_fk', $id_kelas_fk);
		$this->db->where('jadwal_pelajaran.hari', $hariindonesia);
		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('keterangan_semester.semester', $semester);
		
		$this->db->order_by('jadwal_pelajaran.jam_pelajaran', 'asc');
		
		return $this->db->get();

		// $array = array('id_kelas_fk' => $id_kelas_fk,
  //    					'hari' => $hari
  //    					);
  //   	$this->db->where($array);
		// return $this->db->get()->num_rows();
	}

	function tampil_keterangan()
	{
		return $this->db->get('keterangan_presensi');
	
	}
		function update_presensi12($id_presensi,$data){
		$this->db->where('id_presensi', $id_presensi);
		$this->db->update('presensi',$data);
	}

	function get_iduserwali($id)
    {
      $this->db->select('users.id');    
      $this->db->from('users');
      $this->db->join('guru', 'users.id = guru.id_user_fk');
      $this->db->join('wali_kelas', 'guru.id_guru = wali_kelas.id_guru_fk');
      $this->db->where('wali_kelas.id_wali', $id);
      $query=$this->db->get();
      return $query->row();
    }
    // MODEL TAHUN AJARAN BARU
    function tampil_tahunajaran()
	{
		$this->db->select('*');
		$this->db->from('tahun_ajaran');
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');
		$this->db->order_by('tahun_ajaran.id_tahun_ajaran', 'desc');
		$query = $this->db->get();
        return $query->result();
			
	}
	function edit_tahun($id_tahun_ajaran)
	{
		return $this->db->get_where('tahun_ajaran',array('id_tahun_ajaran' => $id_tahun_ajaran))->row();
	}
		function tampil_semester()
	{
		$this->db->select('*');
		$this->db->from('keterangan_semester');
		$query = $this->db->get();
        return $query->result();
			
	}
	function update_tahun($data,$kode2)
	{

	$this->db->where('id_tahun_ajaran', $kode2);
	$this->db->update('tahun_ajaran',$data);
	}
	function tampil_tahun()
	{
	return $this->db->get('tahun_ajaran');
	}
	function input_tahun($data)
	{
		$this->db->insert('tahun_ajaran',$data);
		
	}

	//MODEL KELAS

	function tampil_data_kelas($tahun,$semester)
	{
	  	$this->db->select('*');
		$this->db->from('kelas');
		$this->db->join('detail_kelas_siswa', 'kelas.id_kelas = detail_kelas_siswa.id_kelas');
		$this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran' );
 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );
 		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
 		$this->db->where('keterangan_semester.semester', $semester);
 //		$this->db->group_by('detail_kelas_siswa.id_kelas'); // Order by
 		
		
		return $this->db->get()->result();
		
	}
	function input_kelas($data)
	{
		$this->db->insert('kelas',$data);
		
	}
	function edit_kelas($id_kelas)
	{
		return $this->db->get_where('kelas',array('id_kelas' => $id_kelas));
	}
	function update_kelas($data,$id_kelas)
	{

	$this->db->where('id_Kelas', $id_kelas);
	$this->db->update('kelas',$data);
	}


	// MODEL ROMBONGAN BELAJAR SISWA

	function tampil_rombel($tahun,$semester)
	{
	  	$this->db->select('*');
		$this->db->from('kelas');
		$this->db->join('detail_kelas_siswa', 'kelas.id_kelas = detail_kelas_siswa.id_kelas');
		$this->db->join('guru', 'detail_kelas_siswa.id_wali_fk = guru.nip
 	  		' );
		$this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran' );
 	  	
 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );
 		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
 		$this->db->where('keterangan_semester.semester', $semester);
 		$this->db->group_by('detail_kelas_siswa.id_kelas'); // Order by
 		$this->db->order_by('detail_kelas_siswa.id_kelas', 'desc');
 		
		
		return $this->db->get()->result();
		
	}


	function tampil_tahun_rombel($tahun_ajaran,$semester)
	{
	  $this->db->select('detail_kelas_siswa.id_detail,siswa.nama_siswa, kelas.nama_kelas, tahun_ajaran.tahun_ajaran, guru.nama_guru');
		$this->db->from('siswa');
		$this->db->join('detail_kelas_siswa', 'siswa.id_siswa = detail_kelas_siswa.id_siswa');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas');
		$this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran' );
 	  	$this->db->join('guru', 'detail_kelas_siswa.id_wali_fk = guru.nip
 	  		' );
 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );
 		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun_ajaran);
 		$this->db->where('keterangan_semester.semester', $semester);
 	    $this->db->order_by('tahun_ajaran.id_tahun_ajaran'); // Order by
        $this->db->limit(1); 
		
		return $this->db->get()->result();
		
	}
	function input_detail($data)
	{
		$this->db->insert('detail_kelas_siswa',$data);
		//$this->db->where('tingkat_kelas = 10');
		
	}
	function edit_rombel($id_detail)
	{
		return $this->db->get_where('detail_kelas_siswa',array('id_detail' => $id_detail));
	}

	public function update_rombel_siswa($id,$data)
	{

	// $this->db->where('id_detail', $kode2);
	// $this->db->update('detail_kelas_siswa',$data);
		$this->db->where('id_detail',$id);
        $this->db->update('detail_kelas_siswa',$data);
        if($this->db->affected_rows()>0)
        {
            return true;
        }
        else
        {
            return false;
        }
	}

	public function cek_insert_jadwal($hari,$jam_pelajaran,$kd_mapel_fk,$id_kelas_fk,$id_tahun_ajaran_fk){
		$this->db->select('count(jam_pelajaran) as cek');
    $this->db->from('jadwal_pelajaran');
    $where = "hari = '$hari' AND jam_pelajaran = '$jam_pelajaran' AND kd_mapel_fk = '$kd_mapel_fk' and id_kelas_fk = '$id_kelas_fk' and id_tahun_ajaran_fk = '$id_tahun_ajaran_fk'";
    $this->db->where($where);
	return $this->db->get()->row();
	}


}

