	<div class="col-md-9 col-sm-8 col-xs-6 products">
		<?php 
			$column = array(
					'products.p_id', 'products.p_name', 'products.p_model', 'products.p_price', 'products.p_thumb',
					'brand_list.b_name as p_brand', 'categories.c_name as c_name' 
				);
			$join[] = array( 'brand_list', 'brand_list.b_id = products.p_brand', 'left');
			$join[] = array( 'categories', 'categories.c_id = products.p_c_id', 'left');
			
			$products_array = $this->product_model->get_products($column, array('p_c_id' => $sub_category_id), $join);
			$total_product = count($products_array);
			
			$config['total_rows'] = $total_product;
			$config['per_page'] = 9;
			$counter = 1;

			$this->pagination->initialize($config);
		?>
		<!-- Page Features -->

		<?php 
			foreach ($products_array as $key => $value) 
			{
				if($counter==1){
					echo '<div class="row text-center">';
				}
			?>
				<div class="col-md-4 col-sm-8 item">
					<div class="thumbnail">
						<?php echo img(base_url().'assets/uploads/products/thumb/'.$value['p_thumb'], FALSE, array('alt' => $value['p_name'], 'class' => 'img-responsive', 'style' => 'max-height:200px;min-height:200px')); ?>
						<div class="product-title">
						<?php 
							echo anchor('product/product_detail/'.$value['p_id'], $value['p_name']);
						?>
						</div>
						<div class="caption">
							<div class="model-sort-desc"> 
								<div class="row">
									<div class="col-md-6">
										<span class="spec-name">Brand </span><br/>
										<span class="spec-value"><?php echo $value['p_brand']; ?></span>
									</div>
									<div class="col-md-6">
										<span class="spec-name">Model </span><br/>
										<span class="spec-value"><?php echo $value['p_model']; ?></span>
									</div>
								</div>
							</div>
							<div class="model-footer">
								<ul>
									<li> 
										<?php echo heading('<i class="fa fa-inr"></i> '.$value['p_price'], 4, array('class' => 'price-tag')); ?>
										<?php 
											$product['qyt']=1;
											echo anchor('cart/add_item/'.$value['p_id']."/".$product['qyt'], '<i class="fa fa-plus-square"></i><div class="hover-text"><i class="fa fa-cart-plus icon"></i><span class="showmeonhover">&nbsp;&nbsp;Add To Cart</span></div>');
										?>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			<?php 
				if($counter==3)
				{ 
					echo '</div>';
					$counter==1;
				} 
				$counter++;
			}
			if($total_product<3){
				echo '</div>';
			}
		?>

		<div class="row">
		<?php 
			echo $this->pagination->create_links();
		?>
		</div>
	</div>
</div>