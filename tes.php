	public function edit_user($id)
	{

			//$where = array('id' => $id );

		$data['login'] = $this->m_data->edit_user($id);
			

	

		$this->load->view('templates_admin/header',$data);
		$this->load->view('view_admin/user_management/edit_user', $data);
		$this->load->view('templates_admin/footer', $data);

	}


		public function update_user()
	{
	//$data['pembelajaran'] = $this->m_data->update_angkatan();
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$role_id = $this->input->post('role_id');

		
	 
		$data = array(
			'username' => $username,
			'password' => $password,
			'role_id' => $role_id

		);
	 
		
	 
		$this->m_data->update_user($data, $id);
		redirect('home/daftar_user');
	
		
	}