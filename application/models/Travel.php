<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('User.php');

class Travel extends User {

	public function get_all_travels(){
	    $query = $this->db->query("SELECT * FROM travels");
	    return $query->result_array();
	}

	public function get_travels_by_id($id)
	{
		$query = $this->db->get_where('travels', array('id' => $id));
		return $query->row_array(); 
	}
}
