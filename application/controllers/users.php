<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	protected $view_data = array();
	protected $user_session = NULL;

	public function __construct()
	{
		parent::__construct();
		$this->load->Model("User");
	}

	public function index()
	{
		$this->load->view('index_view');
	}

	public function register()
    {
    	$this->load->library("form_validation");

   		$this->form_validation->set_rules("first_name", "First Name", "trim|min_length[3]|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|min_length[3]|required");
		$this->form_validation->set_rules('username', 'username', 'trim|is_unique[users.username]|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|required|matches[confirm_password]|md5');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|md5');

		if($this->form_validation->run() === FALSE)
		{
		    $this->session->set_flashdata("registration_error", validation_errors());
		    redirect('/users/index');
		}
		else
		{
		    $first_name = $this->input->post('first_name');
		    $last_name = $this->input->post('last_name');
		    $username = $this->input->post('username');
        	$password = md5($this->input->post('password'));

        	$post = $this->input->post();
			$registered_user = $this->User->register_user($post);

			$this->session->set_flashdata("registered_user", $post);
			redirect('/users/profile');
		}
    }

    public function login()
    {
    	$this->load->library("form_validation");

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE)
		{
		    $this->session->set_flashdata("login_error", "Invalid Username or Password");
		    redirect('/users/index');
		}
		else
		{
		    $username = $this->input->post('username');
		    $user = $this->User->get_user_by_username($username);
        	$password = md5($this->input->post('password'));

        	if($user && $user['password'] == $password)
        	{
	            $user = array(
	            	'user_id' => $user['id'],
	            	'first_name' => $user['first_name'],
	            	'last_name' => $user['last_name'],
	            	'username' => $user['username'],
	               	'is_logged_in' => TRUE
	            );
	            $this->session->set_userdata($user);
	            redirect("/users/profile");
	        }
	        else 
	        {
		    	$this->session->set_flashdata("login_error", "Invalid Username or Password");
	        	redirect('/users/index');
	        }
		}
    }

    public function profile()
    {
    	$user = $this->User->get_user_by_username($this->session->userdata('username')); 	

    	$info['user'] = $user;
    	$this->load->view('user_profile_view', $info);
    }

    public function logout()
    {
    	$this->session->sess_destroy();
    	redirect('/users/index');
    }

}
