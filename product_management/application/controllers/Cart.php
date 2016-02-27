<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{

	/**
	 *  Cart Page constructer.
	 *
	 *  Call Constructor for run default process
	 *  when Cart Class is initialize and 
	 *  overriding the parent controller 
	 *  contructor.
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('user_model');	/* Load the user information model */
		$this->load->library('form_validation');/* Load the form validation library to validate form */
	}

	/**
	 * This method of cart controller display cart.
	 * 
	 * Maps to the following URL
	 *      http://example.com/index.php/cart
	 *  - or -
	 *      http://example.com/index.php/cart/index
	 * It will display the cart item which you have added.
	 */
	public function index()
	{

		$this->breadcrumb->add('Cart');
		$result_data['title']='Home';

		$this->load->view('theme/header', !empty($result_data) ? $result_data : '' );
		$this->load->view('cart');
		$this->load->view('theme/footer');		
	}

	/**
	 * This method of cart controller add product in cart.
	 * 
	 * Maps to the following URL
	 *      http://example.com/index.php/cart
	 *  - or -
	 *      http://example.com/index.php/cart/add_cart
	 * It will add the new item in cart which you have select.
	 */
	public function add_item($p_id, $qty)
	{
		if($p_id !='' && $qty!='')
		{
			$product_data = $this->product_model->get_product_list('*', array('p_id' => $p_id));
		
			foreach ($product_data as $key => $value)
			{
				$data =array(
						'id' =>	'sku_product'.$value['p_id'],
						'qty' => 1,
						'price' => $value['p_price'],
						'name' => $value['p_name'],
						'option' => array('c_p_id' => $value['p_id'])
					);
			}
			
			// Insert the product to cart
			if ($this->input->get('id') != '')
			{
				$this->cart->insert($data['products'][$this->input->get('id')]);
			}
			$this->cart->insert($data);
		}
		redirect('cart/index');
	}

	/**
	 * This method of cart controller update product in cart.
	 * 
	 * Maps to the following URL
	 *      http://example.com/index.php/cart
	 *  - or -
	 *      http://example.com/index.php/cart/update_cart
	 * It will update the cart item which you have want.
	 */
	public function update_cart()
	{
		$update_data = $this->input->post(NULL, TRUE);

		if($update_data['rowid'] !='' && $update_data['qty'] !='')
		{
			$data= array(
					'rowid' =>	$update_data['rowid'],
					'qty' => $update_data['qty']
				);
			$this->cart->update($data);
			echo TRUE;
		}
	}

	/**
	 * This method of cart controller add remove the item from cart.
	 * 
	 * Maps to the following URL
	 *      http://example.com/index.php/cart
	 *  - or -
	 *      http://example.com/index.php/cart/delete_item
	 *      It will Accept the one perameter as post
	 *      rowid - int
	 * It will remove the cart item which you have select.
	 */
	public function delete_item()
	{
		$delete_data = $this->input->post(NULL, TRUE);

		if($delete_data['rowid'] !='')
		{
			$this->cart->remove($delete_data['rowid']);
			echo TRUE;
		}
	}

	/**
	 * This method of cart controller remove all product in cart and destroy cart.
	 * 
	 * Maps to the following URL
	 *      http://example.com/index.php/cart
	 *  - or -
	 *      http://example.com/index.php/cart/delete_all_item
	 * It will remove all item from the cart.
	 */
	public function delete_all_item()
	{
		$this->cart->destroy();
		redirect('cart/index');
	}

}