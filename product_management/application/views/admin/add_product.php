	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Add New Product Form
			</div>
			<div class="panel-body">
			
				<!-- Display flashdata -->
				<?php if(!empty($this->session->flashdata('msg'))) { ?>

					<div class="<?php echo $this->session->flashdata('class'); ?>"  role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<?php echo $this->session->flashdata('msg'); ?>
					</div>

				<?php } ?>
				<!-- Display flashdata -->

				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#general" data-toggle="tab">General</a>
					</li>
					<li>
						<a href="#data" data-toggle="tab">Data</a>
					</li>
				</ul>
				<?php 
					echo form_open_multipart('catalog/add_product', array('id' => 'register-form', 'class' => 'form-horizontal')); 
					$label_class_array = array('class' => 'col-md-2 control-label');
				?>
					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane fade in active" id="general">
							<?php echo br(1); ?>
							<div class="form-group">
								<?php 
									echo form_label('Product Name', '', $label_class_array);
									$productname = array(
											'name'  =>  'p_name',
											'class' =>  'form-control',
											'placeholder' =>  'Add Product Name here...',
											'id'    =>  'p_name',
											'value' =>  set_value('p_name')
										);
								?>
								<div class="col-md-8">
									<?php 
										echo form_input($productname);
										echo form_error('p_name');
									?>
								</div>
							</div>
						
							<div class="form-group">
								<?php 
									echo form_label('Category', '', $label_class_array);
									$column = array('c_id','c_name');
									$option[''] = 'Select Category';
									$category_list = $this->category_model->get_category_list($column);

									foreach ($category_list as $key => $value) {
										$option[$value['c_id']] = $value['c_name'];
									}
									$categorycolumn  = array(
											'name'  =>  'p_c_id',
											'id'  =>  'p_c_id',
											'class' =>  'form-control',
											'required' => 'required'
										);
								?>
								<div class="col-md-8">
									<?php
										echo form_dropdown($categorycolumn, $option);
										echo form_error('p_c_id');
									?>
									<div role="alert" class="alert alert-danger alert-dismissable" id="error" style="display:none;">
										<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
										<p></p>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<?php 
									echo form_label('Brand', '', $label_class_array);
								?>
								<div class="col-md-8">
									<select class="form-control" name="p_brand" id="brandlist">
									</select>
									<?php
										echo form_error('p_brand');
									?>
								</div>
							</div>
							
							<div class="form-group">
								<?php 
									echo form_label('Product Description', '', $label_class_array);
									$productdescription = array(
											'name'  =>  'p_desc',
											'class' =>  'form-control',
											'placeholder' =>  'Add Product Description here...',
											'id'    =>  'p_desc',
											'value' =>  set_value('p_desc'),
											'rows' => '5',
											'cols' => '25'
										);
								?>
								<div class="col-md-8">
									<?php
										echo form_textarea($productdescription);
										echo form_error('p_desc');
									?>
								</div>
							</div>

						</div>

						<div class="tab-pane fade" id="data">
							<?php echo br(1); ?>
							<div class="form-group">
								<?php 
									echo form_label('Product Model', '', $label_class_array); 
									$productmodel = array(
											'name'  =>  'p_model',
											'class' =>  'form-control',
											'placeholder' =>  'Add Product Model here...',
											'id'    =>  'p_model',
											'value' =>  set_value('p_model')
										);
								?>
								<div class="col-md-8">
									<?php echo form_input($productmodel); ?>
									<?php echo form_error('p_model'); ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<?php 
											echo form_label('Product Stock', '', array('class' => 'col-md-4 control-label')); 
											$productstock = array(
													'name'  =>  'p_stock',
													'class' =>  'form-control',
													'placeholder' =>  'Add Product Stock here...',
													'id'    =>  'p_stock',
													'value' =>  set_value('p_stock')
												);
										?>
										<div class="col-md-8">
											<div class="col-md-12">
												<div class="form-group input-group">
													<span class="input-group-addon"><i class="fa fa-shopping-cart"></i></span>
														<?php echo form_input($productstock); ?>
												</div>
											</div>
											<?php echo form_error('p_stock'); ?>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<?php echo form_label('Product Status', '', array('class' => 'col-md-4 control-label')); ?>
										<div class="col-md-8">
											<div class="radio">
												<label>
													<?php 
														$productstatus  = array(
																'name'  =>  'p_status',
																'id'  =>  'p_status',
																'value' =>  '1',
																'checked' => TRUE
															);
														echo form_radio($productstatus);
													?>
													Active
												</label>
												<label>
													<?php 
														$productstatus  = array(
															'name'  =>  'p_status',
															'id'  =>  'p_status',
															'value' =>  '0'
														);
														echo form_radio($productstatus);
													?>
													Disable
												</label>
											</div>
											<?php echo form_error('p_status'); ?>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<?php 
											echo form_label('Product Price', '', array('class' => 'col-md-4 control-label')); 
											$productprice = array(
													'name'  =>  'p_price',
													'class' =>  'form-control',
													'placeholder' =>  'Add Product Price here...',
													'id'    =>  'p_price',
													'value' =>  set_value('p_price')
												);
										?>
										<div class="col-md-8">
											<div class="col-md-12">
												<div class="form-group input-group">
													<span class="input-group-addon"><i class="fa fa-inr"></i></span>
														<?php echo form_input($productprice); ?>
													<span class="input-group-addon">.00</span>
												</div>
											</div>
											<?php echo form_error('p_price'); ?>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<?php 
									echo form_label('Product Image', '', $label_class_array);
									$productimage  = array(
										'name'  =>  'p_image[]',
										'multiple' => ""
										);
								?>
								<div class="col-md-8">
									<?php
										echo form_upload($productimage);
										echo form_error('p_image');
									?>
								</div>
							</div>
						</div>
					</div>

					<hr>
					<div class="col-md-offset-2">
						<?php
							$submit = array(
									'class' => 'btn btn-primary',
									'value' => 'Add Product'
								);
							echo form_submit($submit);

							$reset = array(
									'class' => 'btn btn-default',
									'value' => 'Cancel'
								);
							echo form_reset($reset);
						?>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
		<script src="<?php echo base_url('assets/admin/js/custom-js/brand_list.js');?>"></script>
	</div>
</div>