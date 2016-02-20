<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('User.php');

class Trip extends User {

	public function add_trip($post)
	{
	  $query = "INSERT INTO users (destination, plan, travel_start, travel_end) VALUES (?,?,?,?)";
    $values = array($post['destination'], $post['plan'], $post['travel_start'], $post['travel_end']);
    return $this->db->query($query, $values);
	}

  public function get_all_trips(){
    $query = $this->db->query("SELECT * FROM trips");
    return $query->result_array();
  }

// returns trip data
	public function get_trips_by_user_id($user_id)
  {
    $query = "SELECT * FROM trips
              JOIN travels ON travels.id = trips.travel_id
              JOIN users ON users.id = trips.user_id
              WHERE users.id = ? "; 
    return ($this->db->query($query, $user_id)->result_array()); 
  }

  // returns travel destination
  public function get_travels_by_user_id($user_id)
  {
    $query = "SELECT distinct(travels.id), travels.destination
              FROM travels
              JOIN trips ON travels.id = trips.travel_id
              JOIN users ON users.id = trips.user_id
              WHERE users.id = ?" 
    return ($this->db->query($query, $user_id)->result_array()); 
  }
}
