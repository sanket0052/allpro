<!-- Main Heading Starts -->
<h2 class="main-heading text-center">
	Cart
</h2>
<!-- Main Heading Ends -->
	
<?php 
	if($this->cart->contents())
	{
		/* Get all the cart item */
		$cart_data = $this->cart->contents();

		/* Total Item of cart */
		$total_item = count($cart_data);
		$final_subtotal = 0;

		foreach ($this->cart->contents() as $key => $items)
		{
			$ids = $items['option']['c_p_id'];
			$tot_ids[] = $ids;
		}
		/**
		 * Get the all cart item data
		 * @var array of column
		 * @var array of join table and column
		 */
		$column = array(
				'products.p_id', 'products.p_name', 'products.p_model', 'products.p_price', 'products.p_thumb', 'products.p_max_add',
				'brand_list.b_name as p_brand', 'categories.c_name as c_name' 
			);
		$join[] = array( 'brand_list', 'brand_list.b_id = products.p_brand', 'full');
		$join[] = array( 'categories', 'categories.c_id = products.p_c_id', 'left');

		$product_arr = $this->product_model->get_products($column, array('p_id', $tot_ids), $join);

		$new_arr=array();

		for($i=0; $i<count($product_arr); $i++)
		{
			foreach ($cart_data as $key => $val)
			{	
				if($product_arr[$i]['p_id'] == $val['option']['c_p_id']){
					$new_arr[$i] = array_merge($product_arr[$i], $val);
				}
			}
		}
	}
	?>
	<!-- Start the cart section -->
	<section class="cart-view">
		<div class="row">
			
			<div class="col-md-12">
				<!-- Alert block section start -->
				<div  id="alert-block">
					<div class="" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong></strong>
					</div>
				</div>
				<!-- Alert block section start -->
			</div>

			<div class="col-md-12">
				<table class="table table-hover cart-table">
					<thead>
						<tr>
							<th>Product</th>
							<th>Quantity</th>
							<th class="text-center">Price</th>
							<th class="text-center">Total</th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
					<?php 
						if($this->cart->contents())
						{	
							foreach ($new_arr as $key => $value)
							{ 
								?>
								<tr>
									<p id="rowid-<?php echo $value['p_id']; ?>" style="display:none;"><?php echo $value['rowid']; ?></p>
									<td class="col-sm-8 col-md-6">
										<div class="media">
											<a class="thumbnail pull-left" href="products/<?php echo $value['p_id'] ?>">
												<div class="media-object">
													<?php 
														$image_attr=array(
															'src' => base_url().'/assets/uploads/products/thumb/'.$value['p_thumb'],
															'width' => '86px',
															'height' => '86px',
															'class' => 'cart-image'
															);
														echo img($image_attr, FALSE);
													?>
												</div>
											</a>
											<div class="media-body">
												<h4 class="media-heading">
													<a href="#"><?php echo $value['p_name']; ?></a>
												</h4>
												<h5 class="media-heading"> by 
													<?php echo anchor('products/'.$value['p_id'], $value['p_brand']); ?>
												</h5>
												<span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
											</div>
										</div>
									</td>
									<td class="col-sm-2 col-md-2" style="text-align: center">
										<?php echo form_open('#', array('id' => 'item-edit-form')); 
												echo '<div class="col-md-8">';
													$item_data = array(
														'type' => 'number',
														'name' => 'item',
														'id' => 'input-item-'.$value['p_id'],
														'class' => 'item form-control',
														'type' => 'number',
														'maxlength' => '2',
														'min' => '1',
														'max' => $value['p_max_add'],
														'value' => $value['qty']
														); 
													echo form_input($item_data);

													$rowid_data = array(
														'name' => 'item',
														'id' => 'rowid-item-'.$value['p_id'],
														'value' => $value['rowid'],
														); 
													echo form_hidden($rowid_data);
												?>
												</div>
												<div class="col-md-4">
													<button type="button" class="btn btn-primary" id="item-<?php echo $value['p_id']; ?>" onclick="update_cart(id, <?php echo $value['p_id']; ?>, <?php echo $value['p_price']; ?>)" data-toggle="tooltip" title="Edit Item"><i class="fa fa-pencil"></i></button>
												</div>
										<?php echo form_close(); ?>
									</td>
									<!-- Prodcut Price Start-->
									<td class="col-sm-1 col-md-1 text-center">
										<strong>
											<i class="fa fa-inr"></i>
											<span id="price-item-<?php echo $value['p_id']; ?>"> <?php echo $value['price'] ?></span>
										</strong>
									</td>
									<!-- Prodcut Price End -->
									<!-- Total of item Start-->
									<td class="col-sm-1 col-md-1 text-center">
										<i class="fa fa-inr"></i> 
										<strong>
											<span id="subtotal-save-<?php echo $value['p_id']; ?>"> <?php echo $value['subtotal'] ?></span>
										</strong>
									</td>
									<!-- Total of item End-->
									<!-- Action Button Start-->
									<td class="col-sm-1 col-md-1">
										<button type="button" class="btn btn-danger">
											<span class="glyphicon glyphicon-remove"></span> Remove
										</button>
									</td>
									<!-- Action Button End-->
								</tr>
						<?php 
								/* Sub Total and total of all products  */
								$final_subtotal = $final_subtotal+$value['subtotal'];
							}
						?>
							<!-- <tr>
								<td class="col-sm-8 col-md-6">
								<div class="media">
									<a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
									<div class="media-body">
										<h4 class="media-heading"><a href="#">Product name</a></h4>
										<h5 class="media-heading"> by <a href="#">Brand name</a></h5>
										<span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
									</div>
								</div></td>
								<td class="col-sm-1 col-md-1" style="text-align: center">
									<input type="" class="form-control" id="exampleInputEmail1" value="3">
								</td>
								<td class="col-sm-1 col-md-1 text-center"><strong>$4.87</strong></td>
								<td class="col-sm-1 col-md-1 text-center"><strong>$14.61</strong></td>
								<td class="col-sm-1 col-md-1">
								<button type="button" class="btn btn-danger">
									<span class="glyphicon glyphicon-remove"></span> Remove
								</button></td>
							</tr>
							<tr>
								<td class="col-md-6">
								<div class="media">
									<a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
									<div class="media-body">
										<h4 class="media-heading"><a href="#">Product name</a></h4>
										<h5 class="media-heading"> by <a href="#">Brand name</a></h5>
										<span>Status: </span><span class="text-warning"><strong>Leaves warehouse in 2 - 3 weeks</strong></span>
									</div>
								</div></td>
								<td class="col-md-1" style="text-align: center">

									<input type="" class="form-control" id="exampleInputEmail1" value="2">
								</td>
								<td class="col-md-1 text-center"><strong>$4.99</strong></td>
								<td class="col-md-1 text-center"><strong>$9.98</strong></td>
								<td class="col-md-1">
								<button type="button" class="btn btn-danger">
									<span class="glyphicon glyphicon-remove"></span> Remove
								</button></td>
							</tr> -->
						<?php 
						} else { ?>
							<tr>
								<?php echo heading('No Item in this Cart', 1); ?>
							</tr>
						<?php } ?>
						<tr>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td><h5>Subtotal</h5></td>
							<td class="text-right">
								<h5>
									<strong>
										<i class="fa fa-inr"></i> 
										<span id="subtotal">
											<?php echo $final_subtotal; ?>
										</span>
									</strong>
								</h5>
							</td>
						</tr>
						<tr>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td><h5>Estimated shipping</h5></td>
							<td class="text-right">
								<h5>
									<strong>
										<span id="shipping-date">
											<?php echo date("M d, Y", strtotime("+2 Weeks")); ?>
										</span>
									</strong>
								</h5>
							</td>
						</tr>
						<tr>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td><h3>Total</h3></td>
							<td class="text-right">
								<h3>
									<strong>
										<i class="fa fa-inr"></i> 
										<span id="final-total">
											<?php echo $final_subtotal; ?>
										</span>
									</strong>
								</h3>
							</td>
						</tr>
						<tr>
							<td>   </td>
							<td>   </td>
							<td>   </td>
							<td>
							<button type="button" class="btn btn-default">
								<span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
							</button></td>
							<td>
							<button type="button" class="btn btn-success">
								Checkout <span class="glyphicon glyphicon-play"></span>
							</button></td>
						</tr>
					</tbody>
				</table>
			</div>
			<script type="text/javascript">
				$( document ).ready(function() {
					$('.item').prop('disabled', true);
					$('#alert-block').hide();
				});

				function update_cart(id, p_id, p_price)
				{
					if (id.indexOf("item") >= 0)
					{
						$('#input-item-'+p_id).prop('disabled', false);
						$('#input-item-'+p_id).focus();
						old_item = $('#input-item-'+p_id).val();
						rowid = $('#rowid-'+p_id).html();
						$('#'+id).removeClass('btn-primary').addClass('btn-success');
						$('#'+id+' i').removeClass('fa fa-pencil').addClass('fa fa-floppy-o');
						$('#'+id).attr('data-original-title', 'Update Cart');
						$('#'+id).prop('id', 'save-'+p_id);
					}
					else if(id.indexOf("save-") >= 0)
					{
						var inputbox = $('#input-item-'+p_id);
						var item_val = inputbox.val();
						var max_val = inputbox.attr('max');
						if($.isNumeric(item_val))
						{
							if(parseInt(item_val) > parseInt(max_val))
							{
								$('#alert-block').addClass('alert alert-danger alert-dismissable');
								$('#alert-block strong').html('You Can not enter more than '+max_val+' item.');
								$('#alert-block').show();
								inputbox.val(max_val);
								subtotal = (parseInt(max_val)*parseInt(p_price));
								$('#subtotal-'+id).html(subtotal);
								return false;
							}
							else if(parseInt(item_val) <= parseInt(max_val))
							{
								subtotal = (parseInt(item_val)*parseInt(p_price));
								old_subtotal = $('#subtotal-'+id).html();
								$('#subtotal-'+id).html(subtotal);
								update_cart_item(rowid, item_val, p_id, old_subtotal);
							}
						}
						else
						{
							$('#alert-block').addClass('alert alert-danger alert-dismissable');
							$('#alert-block strong').html('Only Numbers Can Input.');
							$('#alert-block').show();
							inputbox.val(1);
							return false;
						}

					}
				}

				function update_cart_item(rowid, qty, p_id, old_subtotal)
				{
					$.ajax({
						url: 'update_cart',
						data: {'rowid': rowid, 'qty':qty },
						type: "post",
						success: function(data)
						{
							if($.trim(data) != 0)
							{
								$('#save-'+p_id).removeClass('btn-success').addClass('btn-primary');
								$('#save-'+p_id+' i').removeClass('fa fa-floppy-o').addClass('fa fa-pencil');
								$('#save-'+p_id).attr('data-original-title', 'Edit Cart');
								$('#save-'+p_id).prop('id', 'item-'+p_id);
								$('#input-item-'+p_id).prop('disabled', true);
								price = $('#price-item-'+p_id).html();
								new_product_subtotal = (parseInt(price)*qty);

								final_subtotal = $('#subtotal').html();
								final_subtotal -= parseInt(old_subtotal);
								final_subtotal += parseInt(new_product_subtotal);
								$('#subtotal').html(final_subtotal);
								$('#final-total').html(final_subtotal);
								
							}
							else
							{
								
							}
						}
					});
				}
			</script>
		</div>
	</section>
