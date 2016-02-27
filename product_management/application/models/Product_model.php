<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

		$this->load->model('user_model');	/* Load the user information model */
		$this->load->library('pagination');	/* Load the pagination library */
	}

	/**
	 * Insert data in table function. 
	 * Insert the form data into registration table
	 * Accept the one argument of data array().
	 * Which has the key name as table column name and value as the value of input field.
	 * Return inserted id.
	*/
	function add_product($product_data)
	{

		// Register time
		$product_data['p_dateadded'] = date('Y-m-d H:i:s');

		// Insert query builder. Build the insert query.
		$result = $this->db->insert('products', $product_data);

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
	function get_product_list($column='*', $where=NULL)
	{   
		$this->db->select($column);
		$this->db->from('products');
		if($where != NULL){
			$this->db->where($where);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	
	/**
	 * Upload product picture function. 
	 * Accept the one argument of file array().
	 * Which has the file name,size,tmp_path,type.
	 * Retuen TRUE if success or FALSE on failure to upload file.
	*/
	function upload_product_pic($files){
		
		$config = array(
			'upload_path' => "./assets/uploads/products",
			'allowed_types' => "gif|jpg|png|jpeg",
		);
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('p_image'))
		{
			$error = array('error' => $this->upload->display_errors());
			return FALSE;
		}
		else
		{
			$config = array(
				'image_library' => 'gd2',
				'source_image' => './assets/uploads/products/'.$files['p_image']['name'],
				'new_image' => './assets/uploads/products/thumb',
				'create_thumb' => TRUE,
				'maintain_ratio' => TRUE,
				'width' => 150,
				'height' => 150
			);
			$this->load->library('image_lib', $config);
			if( ! $this->image_lib->resize())
			{
				$thumb_result = $this->image_lib->display_errors();
				return FALSE;
			}
			else
			{
				$this->image_lib->clear();
				return TRUE;
			}
		}
	}

	/**
	 * Update the User product information
	 * Accept Two argument. 
	 *     1. array of the updated filed (key name as table column name and value as the input field value).
	 *     2. id of the user which record is update.   
	 * Return TRUE or FALUE.
	*/
	function update_product($product_data, $p_id)
	{
		// Update time
		$product_data['p_datemodify'] = date('Y-m-d H:i:s');

		$this->db->where('p_id', $p_id);
		return $this->db->update('products', $product_data);
	}

	/**
	 * Get the category data with complex where condition.
	 * Fetch the category list.
	 * Accept optional perameter of column list.
	 * 		1. Column list in array
	 * 		2. Where condition in array
	 * 		3. If use of join then array of join in two dimensional.
	 * Return the array.
	*/
	function get_products($column='*', $where=NULL, $join_array=NULL){
		$this->db->select($column);
		$this->db->from('products');
		if($where != NULL){
			if(count($where)>1){
				$this->db->where_in($where[0], $where[1]);
			}else{
				$this->db->where($where);
			}
		}
		foreach ($join_array as $key => $value) {
			$this->db->join($value[0], $value[1], $value[2]);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>

