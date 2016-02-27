<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
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
	function get_user($user_name, $password)
	{
		$password = do_hash($password, 'md5');
		$this->db->select('*');
		$this->db->from('registration');
		$this->db->where( array('user_name' => $user_name, 'password' => $password, 'status' => '1') );
		$query = $this->db->get();
		return $query->row();
	}
}
?>

