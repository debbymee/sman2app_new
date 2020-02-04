<?php 

	/**
	 * 
	 */
	class M_login extends CI_Model
	{	
		function cek_login($username,$password)
		{	
			
			$sql = "SELECT * FROM `users` LEFT JOIN guru ON users.id_guru_fk = guru.id_guru LEFT JOIN detail_kelas_siswa ON guru.nip = detail_kelas_siswa.id_wali_fk where users.username = '$username' and users.password='$password'";
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
		public function tahun_ajaran()
		{
		$this->db->select('tahun_ajaran');
		$this->db->from('tahun_ajaran');
		// $this->db->join('pembelajaran', 'detail_kelas_siswa.id_pembelajaran = pembelajaran.id_pembelajaran');
		//$this->db->where('status = on');
		$query = $this->db->get();
        return $query->result();

		}


	}

 