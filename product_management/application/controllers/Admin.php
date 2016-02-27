<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

	/**
	 *  Admin Page constructer.
	 *
	 *  Call Constructor for run default process
	 *  when Admin Class is initialize and 
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
	 *      http://example.com/index.php/admin
	 *  - or -
	 *      http://example.com/index.php/admin/index
	 * If user has login by default run this method and move to the admin view. 
	 * If user has login than it gets the login user data value.
	 */
	public function index(){
		/* Check that the session is exist or not */
		is_admin_login();

		// Get the login session user id
		$this->login_id = $this->session->userdata['admin_user_id'];

		// Get the login user data
		$result_data = $this->user_model->get_user_info($this->login_id);

		$result_data['title']='Dashboard';

		$this->load->view('admin/theme/header', $result_data);
		$this->load->view('admin/dashboard', $result_data);		
		$this->load->view('admin/theme/footer');		
	}
	
	/**
	 * This method of admin controller remove session array.
	 *
	 * Maps to the following URL
	 *      http://example.com/index.php/admin
	 *  - or -
	 *      http://example.com/index.php/admin/logout
	 */
	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}

	/**
	 * This method of admin controller display profile.
	 * 
	 * Maps to the following URL
	 *      http://example.com/index.php/admin
	 *  - or -
	 *      http://example.com/index.php/admin/profile
	 * If there is session available than it will display the profile.
	 */
	public function profile(){
		$user_id = $this->session->userdata['admin_user_id'];
		$result_data = $this->user_info_model->get_user_info($user_id);
		$bank_data = $this->user_info_model->get_user_bnk_detail($user_id);

		$this->load->view('theme/header', $result_data);
		$this->load->view('profile', $bank_data);
		$this->load->view('theme/footer');
	}

	/**
	 * Login Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/login
	 *	- or -
	 * 		http://example.com/index.php/login/index
	 * This method is the used for login system.
	 * By default run this method.
	 */
	public function login()
	{
		$this->check_is_user_login();
		$data['title']='Login';

		//Get The POST values
		$username = $this->input->post("u_username");
		$password = $this->input->post("u_password");

		/* Set the validation rule for signup page */
		$this->form_validation->set_rules('u_username', 'Username', 'trim|required');
		$this->form_validation->set_rules('u_password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			//validation fails
			$this->load->view('admin/login', $data);
		}
		else
		{
			/**
			 * On form success if data is valid check that in database table
			 */
			
			/* Check if User name and password is correct */
			$user_result = $this->user_model->get_admin($username, $password);

			/* if username and password has correct */
			if (!empty($user_result)) 
			{	
				/* Create the session and set the user data and id in session array */
				$sessiondata = array(
					'admin_user_name' => $user_result->u_username, 
					'admin_user_id' => $user_result->u_id,
					'admin_user_email' => $user_result->u_email,
					'admin_logged_in' => TRUE
				);
				$this->session->set_userdata($sessiondata);

				/* Set the last login DATETIME */
				$update_data['u_lastlogin'] = date('Y-m-d H:i:s');

				$this->db->where('u_id', $user_result->u_id);
				$this->db->update('users', $update_data);

				/* Redirect to the default home page */
				redirect("admin");
			}
			else
			{
				/**
				 * If username and password does not match than it will redirect to login with error message
				 */
				$this->session->set_flashdata('class', $this->config->item('error'));
				$this->session->set_flashdata('msg', 'Invalid Username and Password!');
				redirect('admin/login');
			}
		}
	}

	/**
	 * This method id used to check that session is already set and 
	 * session array has the value or not.
	 * It not return anything but if the session is has the value it will
	 * redirect to home page.
	 */
	private function check_is_user_login()
	{
		if($this->session->userdata('admin_logged_in') != FALSE)
		{
			redirect('admin/index');
		}
	}
}