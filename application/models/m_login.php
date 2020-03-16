<?php 

	/**
	 * 
	 */
	class M_login extends CI_Model
	{	
		function cek_login($username)
		{	
			
			$sql = "SELECT * FROM `users` 
					LEFT JOIN guru ON users.id_guru_fk = guru.id_guru 
					LEFT JOIN jadwal_pelajaran ON guru.id_guru = jadwal_pelajaran.id_guru_fk
					LEFT JOIN detail_kelas_siswa ON guru.nip = detail_kelas_siswa.id_wali_fk 
					-- LEFT JOIN tahun_ajaran ON detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran 
					-- LEFT JOIN keterangan_semester ON tahun_ajaran.kd_semester = keterangan_semester.kd_semester
					where users.username = '$username' 
					";
			$cek = $this->db->query($sql);
			return $cek->row_array();
		}
		function cek_login_siswa()
		{
			$sql = "SELECT * FROM `users` JOIN detail_kelas_siswa ON users.siswa_admin = detail_kelas_siswa.id_siswa LEFT JOIN siswa ON detail_kelas_siswa.id_siswa = siswa.id_siswa where users.username = '$username' and users.password='$password'";

			$cek = $this->db->query($sql);
			return $cek->row_array();
		}
		function cek_login_guru()
		{
			$sql = "SELECT * FROM `users` LEFT JOIN guru ON users.id_guru_fk = guru.id_guru LEFT JOIN detail_kelas_siswa on guru.nip = detail_kelas_siswa.id_wali_fk where users.username = '$username' and users.password='$password'";
			
			$cek = $this->db->query($sql);
			return $cek->row_array();
		}
		function get_tahun_ajaran()

		{
		$this->db->select('*');
		$this->db->from('tahun_ajaran');
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');
		$this->db->where('status', 'On');
		return $this->db->get()->row();

	}
		function get_wali()

		{
		$this->db->select('*');
		$this->db->from('guru');
		$this->db->join('detail_kelas_siswa', 'guru.nip = detail_kelas_siswa.id_wali_fk');
	
		return $this->db->get()->row();

	}

		public function tahun_ajaran()
		{
		$this->db->select('*');
		$this->db->from('tahun_ajaran');
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');
		$this->db->order_by('tahun_ajaran.id_tahun_ajaran', 'desc');
		
		$query = $this->db->get();
        return $query->result();

		}

		public function semester()
		{
			$this->db->select('*');
			$this->db->from('keterangan_semester');
			$query = $this->db->get();
       		return $query->result();

		}


	}

 