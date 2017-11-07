<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Webadmin extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		$this->load->view('login');	
	}



	public function login() {
		$username = $this -> input -> post('username');
		$password = $this -> input -> post('password');

		/* Valid form */
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login');
		}
		else
		{
			$query = $this->mmaster->cekUser($username, $password);

            //jika user ditemukan
			if ($query -> num_rows() >= 1) {
				$arryauser=$query->row();
				$unit = $this->mmaster->cekUnit($arryauser->unit)->row();

				$param = array(
					'user_id' => $arryauser->user_id,
					'nama' => $arryauser->nama,
					'username' => $arryauser->username,
					'email' => $arryauser->email,
					'role' => $arryauser->role,
					'unit' => $arryauser->unit,
					'unit_nama' => $unit->nama,
					);
				
                //simpan data user ke session
				$this->session->set_userdata($param);
				$this->session->set_flashdata('message', 'Login Berhasil');
				redirect('dashboard');

			} else {
				$this->data['message'] = '<span class="text-danger">Username / Password anda tidak ditemukan</span>';
				$this->load->view('login', $this->data);	
			}
		}

	} 
	// end function loginproses

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('webadmin'));
	}

}
