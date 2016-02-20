<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function get_all_users()
    {
        return $this->db->query("SELECT * FROM users")->result_array();
    }

	public function get_user_by_username($username)
    {
        $query = "SELECT * FROM users WHERE username = ?";
        $value = array($username);
        return $this->db->query($query, $value)->row_array();
    }

    public function register_user($post)
    {
        $query = "INSERT INTO users (first_name, last_name, username, password, created_at) VALUES (?,?,?,?,?)";
        $values = array($post['first_name'], $post['last_name'], $post['username'], $post['password'], date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }
}
