<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trip extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('app') != 'tms_100L01201')
		{
			$this->session->set_flashdata('error','Sorry, You are not allowed to access this page.');
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('m_setting');
		$this->load->model('m_trip');
		$this->load->model('m_user');
	}

	public function index()
	{
		if($this->input->get('status') == 'complete' OR $this->input->get('status') == 'payment'){
			$privileges = $this->m_setting->privileges($this->session->userdata('level'), 'complete_trip');
		}else{
			$privileges = $this->m_setting->privileges($this->session->userdata('level'), 'trip');
		}
		if($privileges->read == 1){
			$header = array(
				'title' => 'Manifest',
				'notif' => $this->m_setting->get_notif($this->session->userdata('id')),
				'total_notif' => $this->m_setting->total_notif($this->session->userdata('id'))
			);
			$data = array(
				'privileges' => $privileges
			);
			$this->load->view('layout/header', $header);
			$this->load->view('trip/trip_data', $data);
			$this->load->view('layout/footer');
		}else{
			$this->session->set_flashdata('error','Sorry, You are not allowed to access this page.');
			redirect('login');
		}
	}

}