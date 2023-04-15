<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('m_user');
	}

	public function index()
	{
		$this->form_validation->set_rules('username','Username','trim|required|alpha_numeric|min_length[3]');
		$this->form_validation->set_rules('password','Password','trim|required');
		if($this->form_validation->run() == FALSE){
			$this->load->view('form_login');
		}else{
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$valid_user = $this->m_user->login($username, $password);
			if($valid_user == false){
				$this->session->set_flashdata('error','Invalid username or password');
				redirect('login');
			}else{
				$session_data = array(
					'id' => $valid_user->user_id,
					'fullname' => $valid_user->full_name,
					'username' => $valid_user->username,
					'office' => $valid_user->office_id,
					'level' => $valid_user->level_id,
					'app' => 'tms_100L01201'
				);
				$this->session->set_userdata($session_data);

				$user_data = array (
					'last_login' => date('Y-m-d H:i:s')
				);
				$this->m_user->update_user($valid_user->user_id, $user_data);
				
				redirect('welcome');
			}
		}
	}

}
