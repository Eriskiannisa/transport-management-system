<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_trip extends CI_Model {

	public function get_trip($limit, $start, $col, $dir, $status)
	{
		$this->db->order_by($col, $dir);
		$query=$this->db->where_in('trip_status', $status)
		->from('trips')
		->limit($limit, $start)
		->join('fleets','trips.fleet_id=fleets.fleet_id')
		->join('users','trips.driver_id=users.user_id')
		->join('offices','trips.trip_origin=offices.office_id')
		->join('fleet_types','fleets.fleet_type_id=fleet_types.fleet_type_id')
		->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
}
