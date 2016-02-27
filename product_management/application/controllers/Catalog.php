<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends CI_Controller{

	private $admin_info;

	/**
	 *  Catalog Page constructer.
	 *
	 *  Call Constructor for run default process
	 *  when Admin Class is initialize and 
	 *  overriding the parent controller 
	 *  contructor.
	*/
	public function __construct()
	{
		parent::__construct();

		is_admin_login();						/* Check that the session is exist or not */
		$this->load->model('user_model');		/* Load the user information model */
		$this->load->library('form_validation');/* Load the form validation library to validate form */
	}

	public function index(){
		// Get the login session user id
		$this->admin_info = $this->user_model->get_user_info($this->session->userdata['admin_user_id']);
		redirect('admin/index');
	}

	/**
	 * Category Page of this controller.
	 *
	 * Maps to the following URL
	 *      http://example.com/index.php/catalog
	 *  - or -
	 *      http://example.com/index.php/catalog/categories
	 */
	public function categories(){

		// Get the login session user id
		$this->admin_info = $this->user_model->get_user_info($this->session->userdata['admin_user_id']);

		$this->admin_info['title']='Categories';

		$this->breadcrumb->add('Dashboard', 'admin/index', FALSE);
		$this->breadcrumb->add($this->admin_info['title']);

		$this->load->view('admin/theme/header', $this->admin_info);
		$this->load->view('admin/category', $this->admin_info);		
		$this->load->view('admin/theme/footer');		
	}

	/**
	 * Category Add Page of this controller.
	 *
	 * Maps to the following URL
	 *      http://example.com/index.php/catalog
	 *  - or -
	 *      http://example.com/index.php/catalog/add_category
	 */
	public function add_category(){

		// Get the login session user id
		$this->admin_info = $this->user_model->get_user_info($this->session->userdata['admin_user_id']);

		$this->admin_info['title']='Add Category';

		$this->breadcrumb->add('Dashboard', 'admin/index', FALSE);
		$this->breadcrumb->add('Category List', 'catalog/categories', FALSE);
		$this->breadcrumb->add($this->admin_info['title']);

		/**
		 * Set the validation rule
		 */
		$this->form_validation->set_rules('c_name', 'Category Name', 'trim|required|is_unique[categories.c_name]');
		$this->form_validation->set_rules('c_description', 'Category Discription', 'trim|required');
		$this->form_validation->set_rules('c_url_use_name', 'Category URL Name', 'trim|required|alpha_dash|is_unique[categories.c_url_use_name]');
				
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/theme/header', $this->admin_info);
			$this->load->view('admin/add_category', $this->admin_info);
			$this->load->view('admin/theme/footer');
		}
		else
		{
			/* Getting Post Data  */
			$category_data = $this->input->post(NULL, TRUE);

			/* Uplaod the file in directory using Catalog_model upload_pic method though */
			$image_upload = $this->category_model->upload_pic($_FILES);
			if($image_upload!=0)
			{
				$category_data['c_image'] = $_FILES['c_img']['name'];
			}
			else
			{
				$this->session->set_flashdata('class', $this->config->item('error'));
				$this->session->set_flashdata('msg', 'Error accured while upload image. Try Again !');
				$this->load->view('admin/theme/header', $this->admin_info);
				$this->load->view('admin/add_category', $this->admin_info);
				$this->load->view('admin/theme/footer');
			}

			/* Insert form data in registration table using signup model's insert_user method though */
			$insert_category_id = $this->category_model->add_category($category_data);

			// If inserted successfully
			if($insert_category_id!=0)
			{
				/* If data added successfully then redirect to category with success message */
				$this->session->set_flashdata('class', $this->config->item('success'));
				$this->session->set_flashdata('msg', 'Category Added Successfully.');	
				redirect('catalog/categories');
			}
			else
			{
				/* If data not added successfully then redirect to add category page with error message */
				$this->session->set_flashdata('class', $this->config->item('error'));
				$this->session->set_flashdata('msg', 'Error Accured While Add Category. Please Try Again! ');
				$this->load->view('admin/theme/header', $this->admin_info);
				$this->load->view('admin/add_category', $this->admin_info);
				$this->load->view('admin/theme/footer');	
			}
		}		
	}

	/**
	 * Category Edit Page of this controller.
	 *
	 * Accept one perameter ID of the category
	 * 
	 * Maps to the following URL
	 *      http://example.com/index.php/catalog
	 *  - or -
	 *      http://example.com/index.php/catalog/edit_category
	 */
	public function edit_category($c_id){

		// Get the login session user id
		$this->admin_info = $this->user_model->get_user_info($this->session->userdata['admin_user_id']);
 
		$this->admin_info['title']='Edit Category';

		$this->breadcrumb->add('Dashboard', 'admin/index', FALSE);
		$this->breadcrumb->add('Category List', 'catalog/categories', FALSE);
		$this->breadcrumb->add($this->admin_info['title']);

		$where = array('c_id' => $c_id);
		$category_data = $this->category_model->get_category_list('*', $where);

		/**
		 * Set the validation rule
		 */
		$this->form_validation->set_rules('c_name', 'Category Name', 'trim|required');
		$this->form_validation->set_rules('c_description', 'Category Discription', 'trim|required');
		$this->form_validation->set_rules('c_url_use_name', 'Category URL Name', 'trim|required|alpha_dash');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/theme/header', $this->admin_info);
			$this->load->view('admin/edit_category', $category_data[0], $this->admin_info);
			$this->load->view('admin/theme/footer');
		}
		else
		{
			/* Getting Post Data  */
			$category_update_data = $this->input->post(NULL, TRUE);

			if($_FILES['c_img']['error'] == 0){

				/* Uplaod the file in directory using Catalog_model upload_pic method though */
				$image_upload = $this->category_model->upload_pic($_FILES);
				if($image_upload!=0)
				{
					$category_update_data['c_image'] = $_FILES['c_img']['name'];
				}
				else
				{
					$this->session->set_flashdata('class', $this->config->item('error'));
					$this->session->set_flashdata('msg', 'Error accured while upload image. Try Again !');
					redirect('catalog/edit_category');
				}
			}

			/* Insert form data in categories table using method though */
			$update_category = $this->category_model->update_category($category_update_data, $c_id);

			// If inserted successfully
			if($update_category !== FALSE)
			{
				/* If data added successfully then redirect to category with success message */
				$this->session->set_flashdata('class', $this->config->item('success'));
				$this->session->set_flashdata('msg', 'Category Updated Successfully.');	
				redirect('catalog/categories');
			}
			else
			{
				/* If data not added successfully then redirect to signup with error message */
				$this->session->set_flashdata('class', $this->config->item('error'));
				$this->session->set_flashdata('msg', 'Error Accured While Updating Data. Please Try Again! ');
				redirect('catalog/edit_category/'.$c_id);
			}
		}		
	}
	
	/**
	 * Prodcuts Page of this controller.
	 *
	 * Maps to the following URL
	 *      http://example.com/index.php/catalog
	 *  - or -
	 *      http://example.com/index.php/catalog/products
	 */
	public function products(){

		// Get the login session user id
		$this->admin_info = $this->user_model->get_user_info($this->session->userdata['admin_user_id']);

		$this->admin_info['title']='Products';

		$this->breadcrumb->add('Dashboard', 'admin/index', FALSE);
		$this->breadcrumb->add($this->admin_info['title']);

		$this->load->view('admin/theme/header', $this->admin_info);
		$this->load->view('admin/products', $this->admin_info);		
		$this->load->view('admin/theme/footer');		
	}

	/**
	 * Products Add Page of this controller.
	 *
	 * Maps to the following URL
	 *      http://example.com/index.php/catalog
	 *  - or -
	 *      http://example.com/index.php/catalog/add_product
	 */
	public function add_product(){

		// Get the login session user id
		$this->admin_info = $this->user_model->get_user_info($this->session->userdata['admin_user_id']);

		$this->admin_info['title']='Add Product';

		$this->breadcrumb->add('Dashboard', 'admin/index', FALSE);
		$this->breadcrumb->add('Product List', 'catalog/products', FALSE);
		$this->breadcrumb->add($this->admin_info['title']);

		/**
		 * Set the validation rule 
		 */
		$this->form_validation->set_rules('p_name', 'Product Name', 'trim|required|is_unique[products.p_name]');
		$this->form_validation->set_rules('p_desc', 'Product Discription', 'trim|required');
		$this->form_validation->set_rules('p_c_id', 'Product Category', 'required');
		$this->form_validation->set_rules('p_model', 'Product Model', 'required');
		$this->form_validation->set_rules('p_stock', 'Product Stock', 'required|numeric');
		$this->form_validation->set_rules('p_price', 'Product Price', 'required|numeric');
				
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/theme/header', $this->admin_info);
			$this->load->view('admin/add_product', $this->admin_info);
			$this->load->view('admin/theme/footer');
		}
		else
		{
			/* Getting Post Data  */
			$product_data = $this->input->post(NULL, TRUE);
			
			/* Uplaod the file in directory using Catalog_model upload_pic method though */
			$image_upload = $this->product_model->upload_product_pic($_FILES);

			if($image_upload!=0)
			{
				$product_data['p_image'] = $_FILES['p_image']['name'];

				$ext = explode('.', $_FILES['p_image']['name']);

				$product_data['p_thumb'] = $ext[0]."_thumb.".$ext[1];
			}
			else
			{
				$this->session->set_flashdata('class', $this->config->item('error'));
				$this->session->set_flashdata('msg', 'Error accured while upload image. Try Again !');
				$this->load->view('admin/theme/header', $this->admin_info);
				$this->load->view('admin/add_product', $this->admin_info);
				$this->load->view('admin/theme/footer');
			}

			/* Insert form data in registration table using signup model's insert_user method though */
			$insert_category_id = $this->product_model->add_product($product_data);

			// If inserted successfully
			if($insert_category_id!=0)
			{
				/* If data added successfully then redirect to category with success message */
				$this->session->set_flashdata('class', $this->config->item('success'));
				$this->session->set_flashdata('msg', 'Product Added Successfully.');	
				redirect('catalog/products');
			}
			else
			{
				/* If data not added successfully then redirect to signup with error message */
				$this->session->set_flashdata('class', $this->config->item('error'));
				$this->session->set_flashdata('msg', 'Error Accured While Register Data. Please Try Again! ');
				$this->load->view('admin/theme/header', $this->admin_info);
				$this->load->view('admin/add_product', $this->admin_info);
				$this->load->view('admin/theme/footer');
			}
		}		
	}

	/**
	 * Product Edit Page of this controller.
	 *
	 * Accept one perameter ID of the product
	 * 
	 * Maps to the following URL
	 *      http://example.com/index.php/catalog
	 *  - or -
	 *      http://example.com/index.php/catalog/edit_product
	 */
	public function edit_product($p_id){

		// Get the login session user id
		$this->admin_info = $this->user_model->get_user_info($this->session->userdata['admin_user_id']);
		
		$this->admin_info['title']='Edit Product';

		$this->breadcrumb->add('Dashboard', 'admin/index', FALSE);
		$this->breadcrumb->add('Product List', 'catalog/products', FALSE);
		$this->breadcrumb->add($this->admin_info['title']);

		$where = array('p_id' => $p_id);
		$product_data = $this->product_model->get_product_list('*', $where);
 
		/**
		 * Set the validation rule 
		 */
		$this->form_validation->set_rules('p_name', 'Product Name', 'trim|required');
		$this->form_validation->set_rules('p_desc', 'Product Discription', 'trim|required');
		$this->form_validation->set_rules('p_c_id', 'Product Category', 'required');
		$this->form_validation->set_rules('p_model', 'Product Model', 'required');
		$this->form_validation->set_rules('p_stock', 'Product Stock', 'required|numeric');
		$this->form_validation->set_rules('p_price', 'Product Price', 'required|numeric');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/theme/header', $this->admin_info);
			$this->load->view('admin/edit_product', $product_data[0], $this->admin_info);
			$this->load->view('admin/theme/footer');
		}
		else
		{
			/* Getting Post Data  */
			$product_update_data = $this->input->post(NULL, TRUE);

			if($_FILES['p_image']['error'] == 0){

				$old_image = $product_data[0]['p_image'];
				$old_thumb = $product_data[0]['p_thumb'];

				/* Uplaod the file in directory using Catalog_model upload_pic method though */
				$image_upload = $this->product_model->upload_product_pic($_FILES);

				if($image_upload!=0)
				{
					$this->load->helper("file");

					$old_img_path = $this->config->item('upload_path')."/products/".$old_image;
					$old_thumb_path = $this->config->item('upload_path')."/products/thumb/".$old_thumb;

					if(file_exists($old_img_path) OR file_exists($old_thumb_path))
					{
						unlink($old_img_path);
						unlink($old_thumb_path);

						$product_update_data['p_image'] = $_FILES['p_image']['name'];
						$ext = explode('.', $_FILES['p_image']['name']);
						$product_update_data['p_thumb'] = $ext[0]."_thumb.".$ext[1];
					}
					else
					{
						$product_update_data['p_image'] = $_FILES['p_image']['name'];
						$ext = explode('.', $_FILES['p_image']['name']);
						$product_update_data['p_thumb'] = $ext[0]."_thumb.".$ext[1];	
					}
				}
				else
				{
					$this->session->set_flashdata('class', $this->config->item('error'));
					$this->session->set_flashdata('msg', 'Error accured while upload image. Try Again !');
					redirect('catalog/edit_product/'.$p_id);
				}
			}


			/* Insert form data in categories table using method though */
			$update_product = $this->product_model->update_product($product_update_data, $p_id);

			// If inserted successfully
			if($update_product !== FALSE)
			{
				/* If data added successfully then redirect to category with success message */
				$this->session->set_flashdata('class', $this->config->item('success'));
				$this->session->set_flashdata('msg', 'Product Updated Successfully.');	
				redirect('catalog/products');
			}
			else
			{
				/* If data not added successfully then redirect to signup with error message */
				$this->session->set_flashdata('class', $this->config->item('error'));
				$this->session->set_flashdata('msg', 'Error Accured While Updating Data. Please Try Again! ');
				redirect('catalog/edit_product/'.$p_id);
			}
		}		
	}
	
	/**
	 * Brand Page of this controller.
	 *
	 * Maps to the following URL
	 *      http://example.com/index.php/brands
	 *  - or -
	 *      http://example.com/index.php/catalog/brands
	 */
	public function brands(){

		// Get the login session user id
		$this->admin_info = $this->user_model->get_user_info($this->session->userdata['admin_user_id']);

		$this->admin_info['title']='Brands';
		
		$this->breadcrumb->add('Dashboard', 'admin/index', FALSE);
		$this->breadcrumb->add($this->admin_info['title']);

		$this->load->view('admin/theme/header', $this->admin_info);
		$this->load->view('admin/brands', $this->admin_info);		
		$this->load->view('admin/theme/footer');		
	}

	/**
	 * Brand Add Page of this controller.
	 *
	 * Maps to the following URL
	 *      http://example.com/index.php/catalog
	 *  - or -
	 *      http://example.com/index.php/catalog/add_brand
	 */
	public function add_brand(){

		// Get the login session user id
		$this->admin_info = $this->user_model->get_user_info($this->session->userdata['admin_user_id']);

		$this->admin_info['title']='Add Brand';

		$this->breadcrumb->add('Dashboard', 'admin/index', FALSE);
		$this->breadcrumb->add('Brand List', 'catalog/brands', FALSE);
		$this->breadcrumb->add($this->admin_info['title']);

		/**
		 * Set the validation rule 
		 */
		$this->form_validation->set_rules('b_name', 'Brand Name', 'trim|required|is_unique[products.p_name]');
		$this->form_validation->set_rules('b_desc', 'Brand Discription', 'trim|required');
				
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/theme/header', $this->admin_info);
			$this->load->view('admin/add_brand', $this->admin_info);
			$this->load->view('admin/theme/footer');
		}
		else
		{
			/* Getting Post Data  */
			$brand_data = $this->input->post(NULL, TRUE);

			$brand_data['b_c_list'] = implode(",", $brand_data['b_c_list']);

			/* Uplaod the file in directory */
			$image_upload = $this->brand_model->upload_brand_logo($_FILES);

			if($image_upload!=0)
			{
				$brand_data['b_logo'] = $_FILES['b_logo']['name'];

				$ext = explode('.', $_FILES['b_logo']['name']);

				$brand_data['b_thumb'] = $ext[0]."_thumb.".$ext[1];
			}
			else
			{
				$this->session->set_flashdata('class', $this->config->item('error'));
				$this->session->set_flashdata('msg', 'Error accured while upload image. Try Again !');
				$this->load->view('admin/theme/header', $this->admin_info);
				$this->load->view('admin/add_brand', $this->admin_info);
				$this->load->view('admin/theme/footer');
			}

			/* Insert form data in registration table using signup model's insert_user method though */
			$insert_category_id = $this->brand_model->add_brand($brand_data);

			// If inserted successfully
			if($insert_category_id!=0)
			{
				/* If data added successfully then redirect to category with success message */
				$this->session->set_flashdata('class', $this->config->item('success'));
				$this->session->set_flashdata('msg', 'Brand Added Successfully.');	
				redirect('catalog/brands');
			}
			else
			{
				/* If data not added successfully then redirect to signup with error message */
				$this->session->set_flashdata('class', $this->config->item('error'));
				$this->session->set_flashdata('msg', 'Error Accured While Register Data. Please Try Again! ');
				$this->load->view('admin/theme/header', $this->admin_info);
				$this->load->view('admin/add_brand', $this->admin_info);
				$this->load->view('admin/theme/footer');
			}
		}		
	}

	/**
	 * Brand Edit Page of this controller.
	 *
	 * Accept one perameter ID of the brand
	 * 
	 * Maps to the following URL
	 *      http://example.com/index.php/catalog
	 *  - or -
	 *      http://example.com/index.php/catalog/edit_brand
	 */
	public function edit_brand($b_id){

		// Get the login session user id
		$this->admin_info = $this->user_model->get_user_info($this->session->userdata['admin_user_id']);
 
		$this->admin_info['title']='Edit Brand';

		$this->breadcrumb->add('Dashboard', 'admin/index', FALSE);
		$this->breadcrumb->add('Brand List', 'catalog/brands', FALSE);
		$this->breadcrumb->add($this->admin_info['title']);

		$where = array('b_id' => $b_id);
		$brand_data = $this->brand_model->get_brand_list('*', $where);

		/**
		 * Set the validation rule 
		 */
		$this->form_validation->set_rules('b_name', 'Brand Name', 'trim|required');
		$this->form_validation->set_rules('b_desc', 'Brand Discription', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/theme/header', $this->admin_info);
			$this->load->view('admin/edit_brand', $brand_data[0], $this->admin_info);
			$this->load->view('admin/theme/footer');
		}
		else
		{
			/* Getting Post Data  */
			$brand_update_data = $this->input->post(NULL, TRUE);

			$brand_update_data['b_c_list'] = implode(",", $brand_update_data['b_c_list']);

			if($_FILES['b_logo']['error'] == 0){

				$old_image = $brand_data[0]['b_logo'];
				$old_thumb = $brand_data[0]['b_thumb'];

				/* Uplaod the file in directory using Catalog_model upload_pic method though */
				$image_upload = $this->brand_model->upload_brand_logo($_FILES);

				if($image_upload!=0)
				{
					$this->load->helper("file");

					$old_img_path = $this->config->item('upload_path')."/brand_image/".$old_image;
					$old_thumb_path = $this->config->item('upload_path')."/brand_image/thumb/".$old_thumb;

					if(file_exists($old_img_path))
					{
						unlink($old_img_path);

						if(file_exists($old_thumb_path))
						{
							unlink($old_thumb_path);
						}

						$brand_update_data['b_logo'] = $_FILES['b_logo']['name'];
						$ext = explode('.', $_FILES['b_logo']['name']);
						$brand_update_data['b_thumb'] = $ext[0]."_thumb.".$ext[1];
					}
					else
					{
						$brand_update_data['b_logo'] = $_FILES['b_logo']['name'];
						$ext = explode('.', $_FILES['b_logo']['name']);
						$brand_update_data['b_thumb'] = $ext[0]."_thumb.".$ext[1];	
					}
				}
				else
				{
					$this->session->set_flashdata('class', $this->config->item('error'));
					$this->session->set_flashdata('msg', 'Error accured while upload image. Try Again !');
					redirect('catalog/edit_brand/'.$b_id);
				}
			}

			/* Insert form data in categories table using method though */
			$update_brand = $this->brand_model->update_brand($brand_update_data, $b_id);

			// If inserted successfully
			if($update_brand !== FALSE)
			{
				/* If data added successfully then redirect to category with success message */
				$this->session->set_flashdata('class', $this->config->item('success'));
				$this->session->set_flashdata('msg', 'Brand Updated Successfully.');	
				redirect('catalog/brands');
			}
			else
			{
				/* If data not added successfully then redirect to signup with error message */
				$this->session->set_flashdata('class', $this->config->item('error'));
				$this->session->set_flashdata('msg', 'Error Accured While Updating Data. Please Try Again! ');
				redirect('catalog/edit_brand/'.$b_id);
			}
		}		
	}

	/**
	 * Get the brand list which category you have select.
	 * @return [array] [the array of brand list id and name]
	 */
	public function get_brand_by_category()
	{
		$column = array( 'b_id', 'b_name');
		$post_data = $this->input->post();
		$c_id = $post_data['c_id'];

		$brand_array = $this->brand_model->get_brand_where($column, $c_id);
		if(!empty($brand_array))
		{
			foreach ($brand_array as $key => $value)
			{
				$finalarr[$value['b_id']] = $value['b_name'];
			}
			echo json_encode($finalarr);
		}
		else
		{
			echo 0;
		}
		
	}
	
}