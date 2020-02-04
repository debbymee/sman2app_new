<?php 


/**
 * 
 */
class M_siswa extends CI_model
{
	
	function get_kelas($id_siswa)
    {
      $this->db->select('*');    
      $this->db->from('siswa');
      $this->db->join('kelas', 'siswa.id_kelas_fk = kelas.id_kelas');
      $this->db->where('siswa.id_siswa', $id_siswa);
 
      $query=$this->db->get();
      return $query->row();
    }
    function tampil_jadwalll($id_kelas)
	{
		$this->db->select('*');
		$this->db->from('jadwal_pelajaran');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		$this->db->where(' jadwal_pelajaran.id_kelas_fk',$id_kelas);
		$this->db->group_by('jadwal_pelajaran.kd_mapel_fk');
		return $this->db->get();
	}
		function tampil_keterangan()
	{
		return $this->db->get('keterangan_presensi');
	
	}
		function get_mjadwalpresensi($id)
	{
        $this->db->select('*');
        $this->db->from('jadwal_pelajaran');
        $this->db->where('kd_mapel_fk', $id);

     	return $this->db->get()->result();
    }
    	function tampil_namasiswa($id_kelas)
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas', 'siswa.id_kelas_fk = kelas.id_kelas');
		$this->db->join('jadwal_pelajaran', 'kelas.id_kelas = jadwal_pelajaran.id_kelas_fk');
		$this->db->where('jadwal_pelajaran.id_kelas_fk', $id_kelas);
		$this->db->group_by('siswa.id_siswa');
		return $this->db->get();
	
	}
	function input_presensi12($result)
	{
		$this->db->insert_batch('presensi',$result);
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
	function counthadir()
	{
    $this->db->select('count(id_presensi) as totalhadir');
	$this->db->from('presensi');
	$array = array('kd_keterangan_fk' => 'H',
     					'tgl' => date("Y-m-d")
     					);
    	$this->db->where($array);
	
	return $this->db->get()->row();
    }
    function countsakit()
	{
    $this->db->select('count(id_presensi) as totalsakit');
	$this->db->from('presensi');
	$array = array('kd_keterangan_fk' => 'S',
     					'tgl' => date("Y-m-d")
     					);
    	$this->db->where($array);
	
	return $this->db->get()->row();
    }
    function countizin()
	{
    $this->db->select('count(id_presensi) as totalizin');
	$this->db->from('presensi');
	$array = array('kd_keterangan_fk' => 'I',
     					'tgl' => date("Y-m-d")
     					);
    	$this->db->where($array);
	
	return $this->db->get()->row();
    }
    function countabsen()
	{
    $this->db->select('count(id_presensi) as totalabsen');
	$this->db->from('presensi');
	$array = array('kd_keterangan_fk' => 'A',
     					'tgl' => date("Y-m-d")
     					);
    	$this->db->where($array);
	
	return $this->db->get()->row();
    }
    function countdispensasi()
	{
    $this->db->select('count(id_presensi) as totaldispensasi');
	$this->db->from('presensi');
	$array = array('kd_keterangan_fk' => 'D',
     					'tgl' => date("Y-m-d")
     					);
    	$this->db->where($array);
	
	return $this->db->get()->row();
    }
    function countAll()
    {
    $this->db->select('count(id_presensi) as total');
	$this->db->from('presensi');
    $this->db->where('tgl', date("Y-m-d"));
	
	return $this->db->get()->row();
	}

	function tampil_presensi()
	{
		$this->db->select('siswa.nama_siswa,kelas.nama_kelas,keterangan_presensi.nama_keterangan');
		$this->db->from('siswa');
		$this->db->join('detail_kelas_siswa', 'siswa.id_siswa = detail_kelas_siswa.id_siswa');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas');
		$this->db->join('presensi', 'detail_kelas_siswa.id_siswa = presensi.id_siswa_fk');
		//$this->db->join('');
		$this->db->join('keterangan_presensi', 'presensi.kd_keterangan_fk = keterangan_presensi.kd_keterangan');
		$tgl = date("Y-m-d");
		//$where = "kd_keterangan_fk='A' OR kd_keterangan_fk='D' AND tgl = '$tgl'";

		$where = "tgl = '$tgl' AND (kd_keterangan_fk = 'S' OR kd_keterangan_fk = 'A' OR kd_keterangan_fk = 'D' OR kd_keterangan_fk = 'I')";;
		$this->db->where($where);
		return $this->db->get()->result();
	}
}
 ?>