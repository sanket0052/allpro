<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	/**
	 * Check the username and password and fetch the data. 
	 * Check that passed username nad password are true or not.
	 * Accept the two argument. 1. Username  2. Password.
	 * Return the object of matched record if the username and password is true.
	*/
	function get_user($username, $password)
	{
		$password = do_hash($password, 'md5');
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where( array('u_username' => $username, 'u_password' => $password, 'u_status' => '1') );
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	/**
	 * Insert data in table function. 
	 * Insert the form data into registration table
	 * Accept the one argument of data array().
	 * Which has the key name as table column name and value as the value of input field.
	 * Return inserted id.
	*/
	function insert_user($register_data)
	{

		// Register time
		$register_data['u_regdate'] = date('Y-m-d H:i:s');

		// Insert query builder. Build the insert query.
		$result = $this->db->insert('users', $register_data);

		// Get Last Inserted id
		$insert_id = $this->db->insert_id();

		// Return that id to the controller from here this model method will be call
		return $insert_id;
	}

	/**
	 * Get the user information from the user_id which is pass as argument. 
	 * Fetch the data line which id is passed in argument.
	 * Accept only one argument. 1. id.
	 * Return the object of matched id.
	*/
	function get_user_info($user_id)
	{   
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('u_id', $user_id);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			$data = $query->result_array();
			return $data[0];
		}else{
			return FALSE;
		}
	}
	
	/**
	 * Get the user authentication. 
	 * Fetch the data line which authkey is valid.
	 * Accept only one argument. 1. authentication string.
	 * Return the TRUE or FALSE.
	*/
	function is_user_auth($authentication)
	{   
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('u_auth', $authentication);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	/**
	 * Check the username and password of admin and fetch the data. 
	 * Check that passed username nad password are true or not.
	 * Accept the two argument. 1. Username  2. Password.
	 * Return the object of matched record if the username and password is true.
	*/
	function get_admin($username, $password)
	{
		$password = do_hash($password, 'md5');
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where( array('u_username' => $username, 'u_password' => $password, 'u_status' => '1', 'u_id' => '2'));
		$query = $this->db->get();
		return $query->row();
	}
}
?>

