<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_purchase extends CI_Model {

	public function get_po($limit, $start, $col, $dir)
	{
		$this->db->order_by($col, $dir);
		$query=$this->db->from('purchase_order')
		->limit($limit, $start)
		->join('companies','purchase_order.company_id=companies.company_id')
		->join('offices','purchase_order.office_id=offices.office_id')
		->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
}
