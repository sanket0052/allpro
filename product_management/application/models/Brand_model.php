<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_model extends CI_Model
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
	function add_brand($brand_data)
	{
		// Register time
		$brand_data['b_dateadded'] = date('Y-m-d H:i:s');

		// Insert query builder. Build the insert query.
		$result = $this->db->insert('brand_list', $brand_data);

		// Get Last Inserted id
		$insert_id = $this->db->insert_id();

		// Return that id to the controller from here this model method will be call
		return $insert_id;
	}

	/**
	 * Get the All brand data. 
	 * Fetch the all the brand list.
	 * Accept optional perameter of column list.
	 * Return the array.
	*/
	function get_brand_list($column='*', $where=NULL)
	{   
		$this->db->select($column);
		$this->db->from('brand_list');
		if($where != NULL)
		{
			$this->db->where($where);
		}
		$this->db->order_by('b_name', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	/**
	 * Upload brand logo function. 
	 * Accept the one argument of file array().
	 * Which has the file name,size,tmp_path,type.
	 * Retuen TRUE if success or FALSE on failure to upload file.
	*/
	function upload_brand_logo($files)
	{
		$config = array(
			'upload_path' => "./assets/uploads/brand_image",
			'allowed_types' => "gif|jpg|png|jpeg",
		);
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('b_logo'))
		{
			$error = array('error' => $this->upload->display_errors());
			return FALSE;
		}
		else
		{
			$config = array(
				'image_library' => 'gd2',
				'source_image' => './assets/uploads/brand_image/'.$files['b_logo']['name'],
				'new_image' => './assets/uploads/brand_image/thumb',
				'create_thumb' => TRUE,
				'maintain_ratio' => TRUE,
				'width' => 100,
				'height' => 100
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
	 * Update the Information.
	 * Accept Two argument. 
	 *     1. array of the updated filed (key name as table column name and value as the input field value).
	 *     2. id of the user which record is update.   
	 * Return TRUE or FALUE.
	*/
	function update_brand($brand_data, $p_id)
	{
		// Update time
		$brand_data['b_datemodify'] = date('Y-m-d H:i:s');

		$this->db->where('b_id', $p_id);
		return $this->db->update('brand_list', $brand_data);
	}

	/**
	 * Get the selected id data. 
	 * Accept optional perameter of column list.
	 * Return the array.
	 */
	function get_brand_where($column='*', $where=NULL)
	{   
		$this->db->select($column);
		$this->db->from('brand_list');
		if($where != NULL){
			$this->db->like('b_c_list', $where);
		}
		$query = $this->db->get();
		
		return $query->result_array();
	}
}
?>

