<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

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

		$this->load->model('user_model');	/* Load the user information model */
		$this->load->library('form_validation');/* Load the form validation library to validate form */
	}

	protected $login_id;

	/**
	 * Home Page for this controller.
	 *
	 * Maps to the following URL
	 *      http://example.com/index.php/home
	 *  - or -
	 *      http://example.com/index.php/home/index
	 * If user has login by default run this method and move to the home view. 
	 * If user has login than it gets the login user data value.
	 */
	public function index()
	{
		if(isset($this->session->userdata['user_id']) && $this->session->userdata['user_id']!='') 
		{
			$user_id = $this->session->userdata['user_id'];
			// Get the login user data
			$result_data = $this->user_model->get_user_info($user_id);
		}

		$result_data['title']='Home';

		$this->load->view('theme/header', !empty($result_data) ? $result_data : '' );
		$this->load->view('index');		
		$this->load->view('theme/footer');		
	}
	
	/**
	 * This method of home controller remove session array.
	 *
	 * Maps to the following URL
	 *      http://example.com/index.php/home
	 *  - or -
	 *      http://example.com/index.php/home/logout
	 */
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('authenticate/login');
	}

	/**
	 * This method of home controller display profile.
	 * 
	 * Maps to the following URL
	 *      http://example.com/index.php/home
	 *  - or -
	 *      http://example.com/index.php/home/profile
	 * If there is session available than it will display the profile.
	 */
	public function profile()
	{
		$user_id = $this->session->userdata['user_id'];
		$result_data = $this->user_info_model->get_user_info($user_id);
		$bank_data = $this->user_info_model->get_user_bnk_detail($user_id);

		$this->load->view('theme/header', $result_data);
		$this->load->view('profile', $bank_data);
		$this->load->view('theme/footer');
	}
}