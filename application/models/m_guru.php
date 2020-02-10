<?php 
 /**
  * 
  */
 class M_guru extends CI_Model
 {
 // 	function tampil_nickname($id)
	// {
	// //return $this->db->get('guru');
	// $this->db->select('nama_guru');
	// $this->db->from('guru');
	// $this->db->join('login', 'guru.id_user = login.id');
	// $this->db->where('id_user', $id);
	// return $this->db->get()->result();

	// }
 	function tampil_guru($id)
	{
	//return $this->db->get('guru');
	$this->db->select('*');
	$this->db->from('guru');
	$this->db->join('users', 'guru.id_guru = users.id_guru_fk');
	$this->db->where('id', $id);
	return $this->db->get()->result();

	}
	function edit_guru($id)
	{
		return $this->db->get_where('guru',array('id_guru' => $id))->row();
	}
	function update_guru($kode2,$data)
	{

	$this->db->where('id_guru', $kode2);
	$this->db->update('guru',$data);	

	}
	function edit_pass($id)
	{
		return $this->db->get_where('users',array('id' => $id))->row();
	}

	function update_pass($data,$id)
	{
		$this->db->where(['id' => $id]);
		return $this->db->update('users',$data);

	}
	
	// 	function tampil_guruu()
	// {
	// 	return $this->db->get('guru');
	// }
	
// MODEL PRESENSI
	
	function tampil_namasiswa($id_kelas,$tahun,$semester)
	{
		$this->db->select('*');
		$this->db->from('siswa');
		 $this->db->join('detail_kelas_siswa', 'siswa.id_siswa = detail_kelas_siswa.id_siswa');
     	$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas');
		$this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');
		$this->db->where('detail_kelas_siswa.id_kelas', $id_kelas);
		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('keterangan_semester.semester', $semester);
		$this->db->group_by('siswa.id_siswa');
		return $this->db->get();
	
	
	}

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

	function tampil_keterangan()
	{
		return $this->db->get('keterangan_presensi');
	
	}
	 function tampil_jadwalll($id_kelas,$id_guru,$tahun,$semester,$hariindonesia)
	{
		$this->db->select('*');
		$this->db->from('jadwal_pelajaran');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');

		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');
		$this->db->where('jadwal_pelajaran.id_kelas_fk', $id_kelas);
		$this->db->where('jadwal_pelajaran.id_guru_fk', $id_guru);
		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('keterangan_semester.semester', $semester);
		$this->db->where('jadwal_pelajaran.hari', $hariindonesia);

	
		$this->db->group_by('jadwal_pelajaran.kd_mapel_fk');
		return $this->db->get();
	}

	function tampil_jadwal_laporan($id_guru)
	{
		$this->db->select('*');
		$this->db->from('jadwal_pelajaran');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		$this->db->where(' jadwal_pelajaran.id_guru_fk',$id_guru);
		return $this->db->get();
	}

	
//
		function tampil_presensi3($tahun, $semester,$id_guru)
	{   


		$this->db->select('*');
		$this->db->from('presensi');
		$this->db->join('detail_kelas_siswa', 'presensi.id_siswa_fk = detail_kelas_siswa.id_siswa');
		$this->db->join('siswa', 'detail_kelas_siswa.id_siswa = siswa.id_siswa');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas');
		$this->db->join('keterangan_presensi', 'presensi.kd_keterangan_fk = keterangan_presensi.kd_keterangan');
		$this->db->join('jadwal_pelajaran', ' presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal');
		$this->db->join('guru', 'jadwal_pelajaran.id_guru_fk = guru.id_guru');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );

		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('keterangan_semester.semester', $semester);
		$this->db->where('jadwal_pelajaran.id_guru_fk', $id_guru);

		$this->db->order_by('presensi.id_presensi', 'desc');



		//$this->db->where('tingkat_kelas = 12');

		return $this->db->get()->result();
		
	}

	function tampil_rombelpresensi3($id_guru)
	{
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->join('jadwal_pelajaran', 'kelas.id_kelas = jadwal_pelajaran.id_kelas_fk');
		$this->db->where('jadwal_pelajaran.id_guru_fk', $id_guru);
		$this->db->group_by('kelas.id_kelas');
		return $this->db->get()->result();
	
	}
	function input_presensi12($result)
	{
		$this->db->insert_batch('presensi',$result);
	}
	function update_presensi12($id_presensi,$data){
		$this->db->where('id_presensi', $id_presensi);
		$this->db->update('presensi',$data);

	
		
	}

	 function get_idkelas($id_guru,$tahun,$semester,$hariindonesia)
    {
     

    	
		$sql = "SELECT * FROM  kelas JOIN jadwal_pelajaran ON kelas.id_kelas = jadwal_pelajaran.id_kelas_fk 
JOIN tahun_ajaran ON jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran
JOIN keterangan_semester ON tahun_ajaran.kd_semester = keterangan_semester.kd_semester
JOIN guru ON jadwal_pelajaran.id_guru_fk = guru.id_guru WHERE guru.id_guru = '$id_guru' AND tahun_ajaran.tahun_ajaran = '$tahun' and keterangan_semester.semester = '$semester' AND jadwal_pelajaran.hari = '$hariindonesia'";

		
		$row = $this->db->query($sql);
		return $row->row_array();

    	   // $this->db->where('tahun_ajaran.tahun_ajaran', $tahun_ajaran);
 
     
    }
   
		function cek_absens($id_jadwal,$cektgl)
	{

	 	$this->db->select('*');    
     	$this->db->from('presensi');
     	$array = array('id_jadwal_fk' => $id_jadwal,
     					'tgl' => $cektgl
     					);
    	$this->db->where($array);
		return $this->db->get()->num_rows();
	}
	
	function get_mjadwalpresensi($id)
	{
        $this->db->select('*');
        $this->db->from('jadwal_pelajaran');
        $this->db->where('kd_mapel_fk', $id);

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

    function countguru(){
    $this->db->select('count(id_guru) as totalcount');
	$this->db->from('guru');
	return $this->db->get()->result();
    }

     function countwali(){
    $this->db->select('count(distinct(detail_kelas_siswa.id_wali_fk)) as totalcount');
    $this->db->from('detail_kelas_siswa');
    $this->db->join('guru', 'detail_kelas_siswa.id_wali_fk = guru.nip');
	return $this->db->get()->result();
    }

    function countsiswa(){
    $this->db->select('count(id_siswa) as totalcount');
    $this->db->from('siswa');
	return $this->db->get()->result();
    }

    function tampilhadir($id_guru,$tgl){
    $this->db->select('COUNT(kd_keterangan_fk) as jumlah,keterangan_presensi.nama_keterangan, COUNT(presensi.id_siswa_fk) as total');
    $this->db->from('presensi');
    $this->db->join('jadwal_pelajaran', 'presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal');
    $this->db->join('keterangan_presensi', 'presensi.kd_keterangan_fk = keterangan_presensi.kd_keterangan');
    $array = array('jadwal_pelajaran.id_guru_fk' => $id_guru);
    $this->db->where($array);
    $this->db->group_by('kd_keterangan_fk');
	return $this->db->get()->result();
    }

    function tampilhadirsemua($id_guru,$tgl){
    $this->db->select('COUNT(id_presensi) as total');
    $this->db->from('presensi');
    $this->db->join('jadwal_pelajaran', 'presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal');
    $this->db->join('keterangan_presensi', 'presensi.kd_keterangan_fk = keterangan_presensi.kd_keterangan');
    $array = array('jadwal_pelajaran.id_guru_fk' => $id_guru);
    $this->db->where($array);
	return $this->db->get()->row();
    }
    
    function graph(){
		$data = $this->db->query("SELECT keterangan_presensi.nama_keterangan,COUNT(presensi.kd_keterangan_fk) as jumlah FROM presensi right JOIN keterangan_presensi ON presensi.kd_keterangan_fk = keterangan_presensi.kd_keterangan GROUP BY keterangan_presensi.kd_keterangan");
		return $data->result();
	}


 }

 ?>