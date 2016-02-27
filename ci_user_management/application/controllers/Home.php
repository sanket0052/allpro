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

		$this->load->helper('html');			/* Load the html Library */
		is_logged_in();
		$this->load->helper('security');		/* Load the Security Helper for password */
		$this->load->library('table');			/* Load the table Library */
		//$this->check_is_user_login();			/* Check that the session is exist or not */
		$this->load->model('user_info_model');	/* Load the user information model */
		$this->load->library('form_validation');/* Load the form validation library to validate form */
	}
	
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
	public function index(){
		// Get the login session user id
		$user_id = $this->session->userdata['user_id'];
		// Get the login user data
		$result_data = $this->user_info_model->get_user_info($user_id);

		$this->load->view('theme/header', $result_data);
		$this->load->view('home', $result_data);		
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
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
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
	public function profile(){
		$user_id = $this->session->userdata['user_id'];
		$result_data = $this->user_info_model->get_user_info($user_id);
		$bank_data = $this->user_info_model->get_user_bnk_detail($user_id);

		$this->load->view('theme/header', $result_data);
		$this->load->view('profile', $bank_data);
		$this->load->view('theme/footer');
	}

	/**
	 * This method of home controller is for bank detail.
	 * 
	 * Maps to the following URL
	 *      http://example.com/index.php/home
	 *  - or -
	 *      http://example.com/index.php/home/update_bnk_detail
	 * If there is session available than it will display the profile.
	 */
	public function update_bnk_detail(){
		$user_id = $this->session->userdata['user_id'];
		$result_data = $this->user_info_model->get_user_info($user_id);
		$bank_data = $this->user_info_model->get_user_bnk_detail($user_id);
		
		/**
		 * Set the validation rule for profile update form page
		 */
		$this->form_validation->set_rules('full_name', 'Full Name', 'trim|required|regex_match["[a-zA-Z\.]+"]');
		$this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required|regex_match["[a-zA-Z ]*$"]');
		$this->form_validation->set_rules('bank_id', 'Bank Id', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('theme/header', $result_data);
			$this->load->view('bnk_detail', $bank_data);
			$this->load->view('theme/footer');
		}
		else
		{
			/*  
			 *	On form success save the data in bank_detail tabel and move user to the home page  
			 */ 

			/*  Get The Form Post Data */
			$bank_detail = $this->input->post(NULL, TRUE);
			$bank_detail['uid'] = $user_id;

			$result = $this->user_info_model->update_user_bank_info($bank_detail);

			if($result!=0){
				$this->session->set_flashdata('class', $this->config->item('success'));
				$this->session->set_flashdata('msg', 'Updated Successfully.');
				redirect('home/profile');
			}
			else
			{
				$this->session->set_flashdata('class', $this->config->item('error'));
				$this->session->set_flashdata('msg', 'Error Accured While Updating. Please Try Again!');
				redirect('home/update_bnk_detail');
			}
		}
	}

	/**
	 * This method of home controller update the profile of current login user.
	 * 
	 * Maps to the following URL
	 *      http://example.com/index.php/home
	 *  - or -
	 *      http://example.com/index.php/home/profile_update
	 * If there is session available than it will display the current login information for update.
	 */
	public function profile_update(){
		$user_id = $this->session->userdata['user_id'];
		$result_data = $this->user_info_model->get_user_info($user_id);

		/**
		 * Set the validation rule for profile update form page
		 */
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha');
		$this->form_validation->set_rules('designation', 'Designation', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('city', 'City', 'trim|required|alpha');
		$this->form_validation->set_rules('zip', 'Zip', 'trim|required|numeric|exact_length[6]');
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('contact_no', 'Contact No.', 'required|numeric|exact_length[10]');
		$this->form_validation->set_rules('user_name', 'Username', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('theme/header', $result_data);
			$this->load->view('profile_update', $result_data);
			$this->load->view('theme/footer');
		}
		else
		{
			/*  
			 *	On form success save the data in registration tabel and move user to the home page  
			 */ 

			/*  Get The Form Post Data */
			$profile_data=$this->input->post(NULL, TRUE);

			/* Convert password filled data in MD5 */
			$profile_data['password'] = do_hash($profile_data['password'], 'md5');
			
			if($_FILES['profile_pic']['error']==0){

				/*load the signup model for upload profile pic */
				$this->load->model('signup_model');     

				$ext = explode('.', $_FILES['profile_pic']['name']);
				$_FILES['profile_pic']['name'] = strtotime("now")."_".$profile_data['user_name'].".".$ext[1];
				
				if($this->signup_model->upload_pic($_FILES)!=0)
				{
					if($profile_data['old_filename']!='')
					{
						$this->load->helper("file");
						// $path = base_url("assets/uploads/".$profile_data['old_filename']);
						
						$old_file_path = $this->config->item('upload_path')."/".$profile_data['old_filename'];

						if(file_exists($old_file_path))
						{
							// if( ! delete_files($new_path))
							// {
							// 	$profile_data['profile_pic'] = $_FILES['profile_pic']['name'];
							// 	unset($profile_data['old_filename']);
							// }
							
							unlink($old_file_path);
							$profile_data['profile_pic'] = $_FILES['profile_pic']['name'];
							unset($profile_data['old_filename']);
						}
					}
					else{
						$profile_data['profile_pic'] = $_FILES['profile_pic']['name'];
						unset($profile_data['old_filename']);
					}
				}
				else
				{
					$profile_data['profile_pic'] = $profile_data['old_filename'];
					unset($profile_data['old_filename']);
				}
			}
			else
			{
				unset($profile_data['old_filename']);
			}

			$result = $this->user_info_model->update_user_info($profile_data, $user_id);

			if($result!=0){
				$this->session->set_flashdata('class', $this->config->item('success'));
				$this->session->set_flashdata('msg', 'Profile Updated successfully.');
				redirect('home/profile');
			}
			else
			{
				$this->session->set_flashdata('class', $this->config->item('error'));
				$this->session->set_flashdata('msg', 'Error Accured While Updating Profile. Please Try Again!');
				redirect('home/profile_update');
			}
		}
	}

	/**
	 * Delete the user of given id if user has admin other wise redirect to home.
	 * Accept 1 perameter.
	 * 		1. ID of user.
	 * Maps to the following URL
	 *      http://example.com/index.php/home
	 *  - or -
	 *      http://example.com/index.php/home/delete_user/id
	 * @param  [int] $id [user id]
	 * @return [type]     [description]
	 */
	public function delete_user($id)
	{
		if($this->session->userdata['user_id']!=2)
		{
			redirect('home');
		}
		else
		{
			$result = $this->user_info_model->delete_user($id);

			if($result!=0){
				$this->session->set_flashdata('class', $this->config->item('success'));
				$this->session->set_flashdata('msg', 'Deleted Successfully.');
				redirect('home/index');
			}
			else
			{
				$this->session->set_flashdata('class', $this->config->item('error'));
				$this->session->set_flashdata('msg', 'Error Accured While Deleting Profile. Please Try Again!');
				redirect('home/index');
			}
		}
	}

	/**
	 * Edit the user information by the only admin.
	 * Accept 1 perameter.
	 * 		1. ID of user.
	 * Maps to the following URL
	 *      http://example.com/index.php/home
	 *  - or -
	 *      http://example.com/index.php/home/edit_user_info/id
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit_user_info($id)
	{
		if($this->session->userdata['user_id']!=2)
		{
			redirect('home');
		}
		else
		{
			$result_data = $this->user_info_model->get_user_info($id);
			$bank_data = $this->user_info_model->get_user_bnk_detail($id);
			if($result_data==FALSE)
			{
				$this->session->set_flashdata('error_msg', '<label class="form-control alert-danger">No such record found.</label>');
				$this->load->view('theme/header');
				$this->load->view('error');
				$this->load->view('theme/footer');
			}
			else
			{

				/**
				 * Set the validation rule for profile update form page
				 */
				$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha');
				$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha');
				$this->form_validation->set_rules('designation', 'Designation', 'required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('city', 'City', 'trim|required|alpha');
				$this->form_validation->set_rules('zip', 'Zip', 'trim|required|numeric|exact_length[6]');
				$this->form_validation->set_rules('country', 'Country', 'required');
				$this->form_validation->set_rules('contact_no', 'Contact No.', 'required|numeric|exact_length[10]');
				$this->form_validation->set_rules('user_name', 'Username', 'trim|required|min_length[5]');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

				if ($this->form_validation->run() == FALSE)
				{
					$this->load->view('theme/header', $result_data);
					$this->load->view('user_info_update', $bank_data, $id);
					$this->load->view('theme/footer');
				}
				else
				{
					/*  
					 *	On form success update the data in registration tabel
					 */ 

					/*  Get The Form Post Data */
					$profile_data=$this->input->post(NULL, TRUE);

					/* Convert password filled data in MD5 */
					$profile_data['password'] = do_hash($profile_data['password'], 'md5');

					if($_FILES['profile_pic']['error']==0){

						/*load the signup model for upload profile pic */
						$this->load->model('signup_model');

						$img_data = $_FILES;

						$ext = explode('.', $img_data['profile_pic']['name']);
						$img_data['profile_pic']['name'] = strtotime("now")."_".$profile_data['user_name'].".".$ext[1];

						if($this->signup_model->upload_pic($img_data)!=0)
						{
							if($profile_data['old_filename']!='')
							{
								$this->load->helper("file");
								// $path = base_url("assets/uploads/".$profile_data['old_filename']);
								
								$old_file_path = $this->config->item('upload_path')."/".$profile_data['old_filename'];

								if(file_exists($old_file_path))
								{
									// if( ! delete_files($new_path))
									// {
									// 	$profile_data['profile_pic'] = $img_data['profile_pic']['name'];
									// 	unset($profile_data['old_filename']);
									// }
									
									unlink($old_file_path);
									$profile_data['profile_pic'] = $img_data['profile_pic']['name'];
									unset($profile_data['old_filename']);
								}
							}
							else{
								$profile_data['profile_pic'] = $img_data['profile_pic']['name'];
								unset($profile_data['old_filename']);
							}
						}
						else
						{
							$profile_data['profile_pic'] = $profile_data['old_filename'];
							unset($profile_data['old_filename']);
						}
					}
					else
					{
						unset($profile_data['old_filename']);
					}

					$result = $this->user_info_model->update_user_info($profile_data, $id);

					if($result!=0){
						$this->session->set_flashdata('class', $this->config->item('success'));
						$this->session->set_flashdata('msg', 'Profile Updated successfully.');
						redirect('home/index');
					}
					else
					{
						$this->session->set_flashdata('class', $this->config->item('error'));
						$this->session->set_flashdata('msg', 'Error Accured While Updating Profile. Please Try Again!');
						redirect('home/user_info_update/'.$id);
					}
				}	
			}
		}
	}
}