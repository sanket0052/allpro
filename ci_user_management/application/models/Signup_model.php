<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_model extends CI_Model
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	/**
	 * Insert data in table function. 
	 * Insert the form data into registration table
	 * Accept the one argument of data array().
	 * Which has the key name as table column name and value as the value of input field.
	 * Return inserted id.
	*/
	function insert_user($sign_up_data)
	{

		// Register time
		$sign_up_data['register_at'] = date('Y-m-d H:i:s');

		// Insert query builder. Build the insert query.
		$result = $this->db->insert('registration', $sign_up_data);

		// Get Last Inserted id
		$insert_id = $this->db->insert_id();

		// Return that id to the controller from here this model method will be call
		return $insert_id;
	}

	/**
	 * Upload profile picture function. 
	 * Accept the one argument of file array().
	 * Which has the file name,size,tmp_path,type.
	 * Retuen TRUE if success or FALSE on failure to upload file.
	*/
	function upload_pic($files){

		$config = array(
			'upload_path' => "./assets/uploads",
			'allowed_types' => "gif|jpg|png|jpeg",
		);
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('profile_pic'))
		{
			$error = array('error' => $this->upload->display_errors());
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}
?>

