<?php 

/**
 * 
 */
class M_wali extends CI_Model
{

	
 // model di dashboard

	function siswa_wa($id_wali,$tgl)
	{
		$data = $this->db->query("SELECT * FROM `presensi` JOIN siswa ON presensi.id_siswa_fk = siswa.id_siswa 
		JOIN jadwal_pelajaran ON presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal 
		JOIN kelas ON jadwal_pelajaran.id_kelas_fk = kelas.id_kelas
		JOIN keterangan_presensi ON presensi.kd_keterangan_fk = keterangan_presensi.kd_keterangan 
		LEFT JOIN history_message ON presensi.id_presensi = history_message.id_presensi_fk
		where kelas.id_wali_fk = '$id_wali'
		and presensi.kd_keterangan_fk = 'A' and presensi.tgl = '$tgl'
			GROUP BY siswa.id_siswa
		 ");
		return $data->result();
	}

	function wa_message_send($data)
	{
		$this->db->insert('history_message',$data);
	}

	function cek_wa($id_presensi,$tgl)
	{

	 	$this->db->select('*');    
     	$this->db->from('history_message');
     	$array = array('id_presensi_fk' => $id_presensi,
     					'tanggal_terkirim' => $tgl
     					);
    	$this->db->where($array);
		return $this->db->get()->num_rows();
	}
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
    $this->db->select('count(id_wali) as totalcount');
    $this->db->from('wali_kelas');
	return $this->db->get()->result();
    }

    function countsiswa(){
    $this->db->select('count(id_siswa) as totalcount');
    $this->db->from('siswa');
	return $this->db->get()->result();
    }


	// model biodata wali
	
 	function tampil_wali($id)
	{
	//return $this->db->get('guru');
	$this->db->select('*');
	$this->db->from('guru');
	$this->db->join('users', 'guru.id_user_fk = users.id');
	$this->db->join('wali_kelas', 'guru.id_guru = wali_kelas.id_guru_fk');
	$this->db->where('id_user_fk', $id);
	return $this->db->get()->result();

	}
	
	 function get_idkelas($id_guru)
    {
      $this->db->select(' kelas.nama_kelas, kelas.id_kelas,mata_pelajaran.nama_pelajaran');    
      $this->db->from('kelas');
      $this->db->join('jadwal_pelajaran', 'kelas.id_kelas = jadwal_pelajaran.id_kelas_fk');
      $this->db->join('mata_pelajaran', 'mata_pelajaran.kd_mapel = jadwal_pelajaran.kd_mapel_fk');
      $this->db->where('jadwal_pelajaran.id_guru_fk', $id_guru);
      $this->db->group_by('jadwal_pelajaran.kd_mapel_fk');
      $query=$this->db->get();
      return $query->row();
    }

    function get_kelaswali($id_wali){
      $this->db->select('*');    
      $this->db->from('kelas');
      $this->db->where('id_wali_fk', $id_wali);
      $query=$this->db->get();
      return $query->row();
    }

     function get_jadwal($id_jadwal){
      $this->db->select('*');    
      $this->db->from('jadwal_pelajaran');
      $this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
      $this->db->where('jadwal_pelajaran.id_jadwal', $id_jadwal);
      $query=$this->db->get();
      return $query->row();
    }
	
	
	
	 function tampil_guru($id)
	{
	//return $this->db->get('guru');
	$this->db->select('*');
	$this->db->from('guru');
	$this->db->join('login', 'guru.id_user = login.id');

	$this->db->where('id_guru', $id);
	return $this->db->get();

	}
	
	
	// function edit_wali($id)
	// {
	// 	return $this->db->get_where('guru',array('id_guru' => $id))->row();
	// }
	// 	function update_wali($kode2,$data)
	// {

	// 	$this->db->where('id_guru', $kode2);
	// 	$this->db->update('guru',$data);	

	// }
		function edit_pass($id)
	{
		return $this->db->get_where('users',array('id' => $id))->row();
	}
		function update_pass($data,$id)
	{
		$this->db->where(['id' => $id]);
		return $this->db->update('users',$data);

	}
	function get_mjadwalpresensi($id)
	{
        $this->db->select('*');
        $this->db->from('jadwal_pelajaran');
        $this->db->where('kd_mapel_fk', $id);

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
     	$array = array('id_jadwal_fk' => $id_jadwal,
     					'tgl' => $cektgl
     					);
    	$this->db->where($array);
		return $this->db->get()->num_rows();
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
    // model presensi
    function input_presensi12($result)
	{
		$this->db->insert_batch('presensi',$result);
	}
	
	function update_presensi12($id_presensi,$data){
		$this->db->where('id_presensi', $id_presensi);
		$this->db->update('presensi',$data);
	}

	function eTampilPresensi($id_presensi)
	{
		$this->db->select('*');
		$this->db->from('presensi');
		$this->db->join('siswa', 'presensi.id_siswa_fk = siswa.id_siswa');
		$this->db->join('kelas','siswa.id_kelas_fk = kelas.id_kelas');
		$this->db->join('jadwal_pelajaran', 'presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		$this->db->where('id_presensi', $id_presensi);
		return $this->db->get()->result();
	}
	function tampil_namasiswa($id_guru)
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas', 'siswa.id_kelas_fk = kelas.id_kelas');
		$this->db->join('jadwal_pelajaran', 'kelas.id_kelas = jadwal_pelajaran.id_kelas_fk');
		$this->db->where('jadwal_pelajaran.id_guru_fk', $id_guru);
		$this->db->group_by('siswa.id_siswa');
		return $this->db->get();
	
	}
	function tampil_keterangan()
	{
		return $this->db->get('keterangan_presensi');
	
	}
	function tampil_jadwalll($id_guru)
	{
		$this->db->select('*');
		$this->db->from('jadwal_pelajaran');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		$this->db->where(' jadwal_pelajaran.id_guru_fk',$id_guru);
		$this->db->group_by('jadwal_pelajaran.kd_mapel_fk');
		return $this->db->get();
	}
		function tampil_presensi3($id_wali)
	{   


		$this->db->select('*');
		$this->db->from('presensi');
		$this->db->join('siswa', 'presensi.id_siswa_fk = siswa.id_siswa');
		$this->db->join('kelas', 'siswa.id_kelas_fk = kelas.id_kelas');
		$this->db->join('keterangan_presensi', 'presensi.kd_keterangan_fk = keterangan_presensi.kd_keterangan');
		$this->db->join('jadwal_pelajaran', ' presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		$this->db->where('kelas.id_wali_fk',$id_wali);
		$this->db->order_by('presensi.id_presensi', 'desc');



		 return $this->db->get()->result();
		
	}

	// model laporan

	function tampil_jadwal_laporan($id_wali)
	{
		$this->db->select('*');
		$this->db->from('jadwal_pelajaran');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		$this->db->join('kelas', 'jadwal_pelajaran.id_kelas_fk = kelas.id_kelas');
		$this->db->where('kelas.id_wali_fk',$id_wali);
		return $this->db->get();
	}

	function graph(){
		$data = $this->db->query("SELECT keterangan_presensi.nama_keterangan,COUNT(presensi.kd_keterangan_fk) as jumlah FROM presensi right JOIN keterangan_presensi ON presensi.kd_keterangan_fk = keterangan_presensi.kd_keterangan GROUP BY keterangan_presensi.kd_keterangan");
		return $data->result();
	}
	function tampil_presensi_laporan($id_jadwal,$tgl)
	{
		$this->db->select('siswa.nama_siswa,keterangan_presensi.nama_keterangan');
		$this->db->from('presensi');
		$this->db->join('siswa', 'presensi.id_siswa_fk = siswa.id_siswa');
		$this->db->join('keterangan_presensi', 'presensi.kd_keterangan_fk = keterangan_presensi.kd_keterangan');
		$array = array('presensi.tgl' => $tgl, 'presensi.id_jadwal_fk' => $id_jadwal);
        $this->db->where($array);
		return $this->db->get();
	
	}


}


 ?>