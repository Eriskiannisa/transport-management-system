<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends CI_Controller {

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
		$this->load->model('m_purchase');
	}

	public function index()
	{
		$privileges = $this->m_setting->privileges($this->session->userdata('level'), 'po');
		if($privileges->read == 1){
			$header = array(
				'title' => 'Purchase Order',
				'notif' => $this->m_setting->get_notif($this->session->userdata('id')),
				'total_notif' => $this->m_setting->total_notif($this->session->userdata('id'))
			);

			// if($privileges->data == "all"){
			// 	$purchase_order = $this->m_purchase->get_po();
			// }else{
			// 	$purchase_order = $this->m_purchase->get_po_by_office($this->session->userdata('office'));
			// }
			$data = array(
				'privileges' => $privileges
			);
			$this->load->view('layout/header', $header);
			$this->load->view('purchase/purchase_data', $data);
			$this->load->view('layout/footer');
		}else{
			$this->session->set_flashdata('error','Sorry, You are not allowed to access this page.');
			redirect('login');
		}
	}

	public function getData()
	{
		$privileges = $this->m_setting->privileges($this->session->userdata('level'), 'po');
		if($privileges->read == 1){
			$columns = array(
				0 => 'po_id',
				1 => 'po_date',
				2 => 'company_name',
				3 => 'office_name',
				4 => 'po_barcode',
				5 => 'box_number',
				6 => 'functional_team',
				7 => 'po_storage',
				8 => 'trip_id',
				9 => 'po_id'
			);
			$limit = $this->input->post('length');
			$start = $this->input->post('start');
			$order = $columns[$this->input->post('order')[0]['column']];
			$dir = $this->input->post('order')[0]['dir'];

			$totalData = $this->m_purchase->get_po_count();
			$totalFiltered = $totalData;
			if(empty($this->input->post('search')['value'])){
				$purchase =$this->m_purchase->get_po($limit, $start, $order, $dir);
			}else{
				$search = $this->input->post('search')['value'];
				$purchase =  $this->m_purchase->search_po($limit, $start, $search, $order, $dir);
				$totalFiltered = $this->m_purchase->search_po_count($search);
			}

			$data = array();
			if(@$purchase){
				foreach($purchase as $row){
					$start++;

					if(@$row->trip_id){
						$manifest_status = '<span class="text-success">Release</span>';
					}else{
						$manifest_status = '<span class="text-danger">Not Release</span>';
					}

					if(@$privileges->update == 1){
						$action_edit = ' <a class="dropdown-item" href="'.site_url('purchase/edit/'.$row->po_id).'"><i class="mdi mdi-pencil"></i> Edit</a>';
					}
					if(@$privileges->delete == 1 AND $row->trip_id == ''){
						$action_delete = '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-delete" data-href="'.site_url('purchase/delete/'.$row->po_id).'"><i class="mdi mdi-delete"></i> Delete</a>';
					}
					$nestedData['number'] = $start;
					$nestedData['po_date'] = date('d-m-Y H:i', strtotime($row->po_date)).' WIB';
					$nestedData['company_name'] = $row->company_name;
					$nestedData['office_name'] = $row->office_name;
					$nestedData['po_barcode'] = $row->po_barcode;
					$nestedData['box_number'] = $row->box_number;
					$nestedData['functional_team'] = $row->functional_team;
					$nestedData['po_storage'] = $row->po_storage;
					$nestedData['manifest_status'] = $manifest_status;
					$nestedData['action'] = '<div class="btn-group"><button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button><div class="dropdown-menu"><a class="dropdown-item" href="'.site_url('purchase/detail/'.$row->po_id).'"><i class="mdi mdi-information"></i> Detail</a>'.@$action_edit.@$action_delete.'</div></div>';
					$data[] = $nestedData;
				}
			}

			$json_data = array(
				'draw' => intval($this->input->post('draw')),
				'recordsTotal' => intval($totalData),
				'recordsFiltered' => intval($totalFiltered),
				'data' => $data
			);
			echo json_encode($json_data);
		}else{
			echo json_encode(array());
		}
	}
}