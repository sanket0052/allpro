<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 *	Login Page constructer.
	 * 
	 *	Call Constructor for run default process
	 *	when Login Class is initialize and 
	 *	overriding the parent controller 
	 *	contructor.
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('security');            /* Load the Security Helper for password */
		$this->load->library('form_validation');	/* Load the Form Validation Library to do login form validation */
		$this->load->model('login_model'); 			/* Load the Login Model to do Database Transaction */

		$this->check_is_user_login();				/* Check that the session is exist or not */
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
	public function index()
	{
		//Get The POST values
		$user_name = $this->input->post("user_name");
		$password = $this->input->post("password");

		/* Set the validation rule for signup page */
		$this->form_validation->set_rules('user_name', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			//validation fails
			$this->load->view('theme/header');
			$this->load->view('login');
			$this->load->view('theme/footer');
			
		}
		else
		{
			/**
			 * On form success if data is valid check that in database table
			 */
			
			/* Check if User name and password is correct */
			$user_result = $this->login_model->get_user($user_name, $password);

			/* if username and password has correct */
			if (!empty($user_result)) 
			{	
				/* Create the session and set the user data and id in session array */
				$sessiondata = array(
					'user_name' => $user_result->user_name, 
					'user_id' => $user_result->id,
					'user_email' => $user_result->email,
					'logged_in' => TRUE
				);
				$this->session->set_userdata($sessiondata);
				/* Redirect to the default home page */
				redirect("home");
			}
			else
			{
				/**
				 * If username and password does not match than it will redirect to login with error message
				 */
				$this->session->set_flashdata('class', $this->config->item('error'));
				$this->session->set_flashdata('msg', 'Invalid Username and Password!');
				redirect('login/index');
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
		if($this->session->userdata('logged_in') != FALSE)
		{
			redirect('home');
		}
	}
}