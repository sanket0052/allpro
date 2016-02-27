<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate extends CI_Controller {

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

		$this->load->library('form_validation');	/* Load the Form Validation Library to do login form validation */
		$this->load->model('user_model'); 			/* Load the Sign in Model to do Database Transaction */
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
	public function login()
	{
		$data['title']='Login';
		/* Bread crum */
		$this->breadcrumb->add('Authenticate', 'authenticate/login', FALSE);
		$this->breadcrumb->add('Login');

		//Get The POST values
		$username = $this->input->post("u_username");
		$password = $this->input->post("u_password");

		/* Set the validation rule for signup page */
		$this->form_validation->set_rules('u_username', 'Username', 'trim|required');
		$this->form_validation->set_rules('u_password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			//validation fails
			$this->load->view('theme/header', $data);
			$this->load->view('login');
			$this->load->view('theme/footer');
			
		}
		else
		{
			/**
			 * On form success if data is valid check that in database table
			 */
			
			/* Check if User name and password is correct */
			$user_result = $this->user_model->get_user($username, $password);

			/* if username and password has correct */
			if (!empty($user_result)) 
			{	
				/* Create the session and set the user data and id in session array */
				$sessiondata = array(
					'user_name' => $user_result->u_username, 
					'user_id' => $user_result->u_id,
					'user_email' => $user_result->u_email,
					'logged_in' => TRUE
				);
				$this->session->set_userdata($sessiondata);

				/* Set the last login DATETIME */
				$update_data['u_lastlogin'] = date('Y-m-d H:i:s');

				$this->db->where('u_id', $user_result->u_id);
				$this->db->update('users', $update_data);

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
				redirect('authenticate/login');
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

	/**
	 * Signup Page for this controller.
	 *
	 * Maps to the following URL
	 *      http://example.com/index.php/signup
	 *  - or -
	 *      http://example.com/index.php/signup/index
	 * This method is used for the signup system.
	 * By default run this method.
	 */
	public function register()
	{
		$data['title']='Register';
		/* Bread crum */
		$this->breadcrumb->add('Authenticate', 'authenticate/login', FALSE);
		$this->breadcrumb->add('Register');
		/**
		 * Set the validation rule for signup page 
		 */
		$this->form_validation->set_rules('u_username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.u_username]');
		$this->form_validation->set_rules('u_email', 'Email', 'trim|required|valid_email|is_unique[users.u_email]');
		$this->form_validation->set_rules('u_password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[u_password]');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('theme/header', $data);
			$this->load->view('register');
			$this->load->view('theme/footer');
		}
		else
		{
			/**
			 * On form success save the data in registration tabel and move user to the home page
			 */

			/* Getting Post Data  */
			$register_data=$this->input->post(NULL, TRUE);

			unset($register_data['confirm_password']);

			/* Convert password in MD5 */
			$register_data['u_password'] = do_hash($register_data['u_password'], 'md5');

			/* Insert form data in registration table using signup model's insert_user method though */
			$insert_id = $this->user_model->insert_user($register_data);

			if($insert_id!=0){// If inserted successfully

				/* Create the session and save the user data and id in session array */
				$this->session->set_userdata(array(
						'user_name' => $register_data['u_username'], 
						'user_id' => $insert_id,
						'user_email' => $register_data['u_email'],
						'logged_in' => TRUE
					));

				/* Set the last login DATETIME */
				$updatearr['u_lastlogin'] = date('Y-m-d H:i:s');

				$this->db->where('u_id', $insert_id);
				$this->db->update('users', $updatearr);

				/* Redirect to the default home page */
				redirect('home');
			}
			else
			{
				/* If data not added successfully then redirect to signup with error message */
				$this->session->set_flashdata('class', $this->config->item('error'));
				$this->session->set_flashdata('msg', 'Error Accured While Register Data. Please Try Again! ');
				redirect('authenticate/register');
			}
		}
	}

}
