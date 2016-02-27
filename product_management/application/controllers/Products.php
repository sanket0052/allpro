<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{

	/**
	 *  Home Page constructer.
	 *
	 *  Call Constructor for run default process
	 *  when Home Class is initialize and 
	 *  overriding the parent controller 
	 *  contructor.
	*/
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('html');			/* Load the html Library */
		$this->load->helper('security');		/* Load the Security Helper for password */
		$this->load->library('table');			/* Load the table Library */
		//$this->check_is_user_login();			/* Check that the session is exist or not */
		$this->load->model('user_model');	/* Load the user information model */
		$this->load->library('form_validation');/* Load the form validation library to validate form */
	}

	protected $login_id;

	/**
	 * This method of home controller display product detail.
	 * 
	 * Maps to the following URL
	 *      http://example.com/index.php/home
	 *  - or -
	 *      http://example.com/index.php/home/product
	 * It will display the cart item which you have added.
	 */
	public function index($main_category_id, $sub_category_id){

		$result_data['title']='Prodcut';
		$product_data['main_category_id']=$main_category_id;
		$product_data['sub_category_id']=$sub_category_id;

		/* Bread crum */
		$this->breadcrumb->add('Product');

		$this->load->view('theme/header', $result_data);
		$this->load->view('theme/left_sidebar');
		$this->load->view('products', $product_data);
		$this->load->view('theme/footer');
	}

	
}