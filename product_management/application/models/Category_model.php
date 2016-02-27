<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model
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
	function add_category($category_data)
	{

		// Register time
		$category_data['c_dateadded'] = date('Y-m-d H:i:s');

		// Insert query builder. Build the insert query.
		$result = $this->db->insert('categories', $category_data);

		// Get Last Inserted id
		$insert_id = $this->db->insert_id();

		// Return that id to the controller from here this model method will be call
		return $insert_id;
	}

	/**
	 * Get the All category data. 
	 * Fetch the all the category list.
	 * Accept optional perameter of column list.
	 * Return the array.
	*/
	function get_category_list($column='*', $where=NULL)
	{   
		$this->db->select($column);
		$this->db->from('categories');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('c_name', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
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
		
		if ( ! $this->upload->do_upload('c_img'))
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	/**
	 * Update the User profile information
	 * Update the user profile's information like first name, last name, email, password, profile pic.
	 * Accept Two argument. 
	 *     1. array of the updated filed (key name as table column name and value as the input field value).
	 *     2. id of the user which record is update.   
	 * Return TRUE or FALUE.
	*/
	function update_category($category_data, $c_id)
	{
		// Update time
		$category_data['c_datemodify'] = date('Y-m-d H:i:s');

		$this->db->where('c_id', $c_id);
		return $this->db->update('categories', $category_data);
	}
 	
 	/**
	 * Get the selected id data. 
	 * Accept optional perameter of column list.
	 * Return the array.
	 */
	function get_category_where($column='*', $where=NULL)
	{   
		$this->db->select($column);
		$this->db->from('categories');
		if($where != NULL){
			$this->db->where_in('c_id', $where);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

}
?>

