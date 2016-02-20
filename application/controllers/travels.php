<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('users.php');

class Travels extends Users {

	public function __construct()
	{
		parent::__construct();
		$this->load->model->User;
		$this->load->model->Travel;
		$this->load->model->Trip;
	}

	public function destionation_view()
	{
		$this->load->view("/destionation_view");
	}

	public function destination()
	{
		$travels = $this->Travel->get_all_travels();
		$users = $this->User->get_all_users();
	}

	public function display_all_trips()
	{
		$trips = $this->Trip->get_all_trips();
		$tusers = $this->User->get_all_users();
		$ttravels = $this->Travel->get_all_travels();
		$this->load->view('user_profile_view', $info);
	}

	public function display_all_destinations()
	{
		$travels = $this->travel->get_all_travels();
		$this->load->view('user_profile_view', $info);
	}

	public function show_trips_by_user($user_id)
	{
		$trip = $this->Trip->get_travels_by_user_id($user_id);
		$info['trip'] = $trip;
    	$this->load->view('user_profile_view', $info);
	}

	public function add_new_trip_view()
	{
		$this->load->view('add_trip_view');
	}

	public function add_new_trip()
	{
		$this->load->library("form_validation");

   		$this->form_validation->set_rules("destination", "Destination", "trim|min_length[3]|required");
		$this->form_validation->set_rules("plan", "Plan", "trim|min_length[3]|required");
		$this->form_validation->set_rules('travel_start', 'Travel Date From', 'date|DOB|callback_checkDateFormat|required');
		$this->form_validation->set_rules('travel_end', 'Travel Date To', 'date|DOB|callback_checkDateFormat|required');

		if($this->form_validation->run() === FALSE)
		{
		    $this->session->set_flashdata("trip_error", validation_errors());
		    redirect('/travels/add_new_trip_view');
		}
		else
		{
		    $destination = $this->input->post('destination');
		    $plan = $this->input->post('plan');
		    $travel_start = $this->input->post('travel_start');
        	$travel_end = $this->input->post('travel_end');

        	$post = $this->input->post();
			$add_trip = $this->Trip->add_trip($post);

			$this->session->set_flashdata("add_trip", $post);
			redirect('/users/profile');
		}
	}

	public function join_travel()
	{

	}

}
