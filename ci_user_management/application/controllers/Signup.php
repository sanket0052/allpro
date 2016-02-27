<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	/**
	 *  Signup Page constructer.
	 *
	 *  Call Constructor for run default process
	 *  when Login Class is initialize and 
	 *  overriding the parent controller 
	 *  contructor.
	*/
	public function __construct() 
	{
		parent::__construct();

		$this->load->helper('security');            /* Load the Security Helper for password */
		$this->load->library('form_validation');    /* Load the Form Validation Library to do signup form validation */
		$this->load->model('signup_model');         /* Load the Signup Model to do Database Transaction */
		$this->load->model('user_info_model');      /* Load the Signup Model to do Database Transaction */

		$this->check_is_user_login();               /* Check that the session is exist or not */
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
	public function index()
	{
		$this->load->helper('file');    /* Load the file helper library */

		/**
		 * Set the validation rule for signup page 
		*/
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha');
		$this->form_validation->set_rules('user_name', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[registration.user_name]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[registration.email]');
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('contact_no', 'Contact No.', 'required|numeric|exact_length[10]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('terms_condition', 'Terms & Condition', 'required');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('theme/header');
			$this->load->view('signup');
			$this->load->view('theme/footer');
		}
		else
		{
			/**
			 * On form success save the data in registration tabel and move user to the home page
			 */

			/* Getting Post Data  */
			$sign_up_data=$this->input->post(NULL, TRUE);

			unset($sign_up_data['confirm_password']);
			unset($sign_up_data['terms_condition']);

			/* Convert password in MD5 */
			$sign_up_data['password'] = do_hash($sign_up_data['password'], 'md5');

				$img_data = $_FILES;

				/* File input has file and if it has no error than is goes to upload  */
				if($_FILES['profile_pic']['error']==0){

					$ext = explode('.', $_FILES['profile_pic']['name']);

					/* Rename the file */
					$_FILES['profile_pic']['name'] = strtotime("now")."_".$sign_up_data['user_name'].".".$ext[1];

					/* Uplaod the file in directory using signup model's upload_pic method though */
					if($this->signup_model->upload_pic($_FILES)!=0)
					{
						$sign_up_data['profile_pic'] = $_FILES['profile_pic']['name'];
					}
				}

			/* Insert form data in registration table using signup model's insert_user method though */
			$insert_id = $this->signup_model->insert_user($sign_up_data);

			if($insert_id!=0){// If inserted successfully

				/* Create the session and save the user data and id in session array */
				$this->session->set_userdata(array(
						'user_name' => $sign_up_data['user_name'], 
						'user_id' => $insert_id,
						'user_email' => $sign_up_data['email'],
						'logged_in' => TRUE
					));
				/* Redirect to the default home page */
				redirect('home');
			}
			else
			{
				/* If data not added successfully then redirect to signup with error message */
				$this->session->set_flashdata('class', $this->config->item('error'));
				$this->session->set_flashdata('msg', 'Error Accured While Register Data. Please Try Again! ');
				redirect('signup');
			}
		}
	}

	/**
	 * This method id used to check that session is already set and 
	 * session array has the value or not.
	 * It not return anything but if the session is has the value it will
	 * redirect to home page.
	 */
	private function check_is_user_login(){
		if($this->session->userdata('logged_in') != FALSE){
			redirect('home');
		}
	}
}