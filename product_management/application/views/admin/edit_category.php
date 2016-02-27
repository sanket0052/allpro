	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				Edit Category Form
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">

						<!-- Display flashdata -->
						<?php if(!empty($this->session->flashdata('msg'))) { ?>

							<div class="<?php echo $this->session->flashdata('class'); ?>"  role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<?php echo $this->session->flashdata('msg'); ?>
							</div>

						<?php } ?>
						<!-- Display flashdata -->

						<?php echo form_open_multipart('catalog/edit_category/'.$c_id, array('id' => 'register-form')); ?>
							<div class="form-group">
								<?php 
									echo form_label('Category Name');
									$category_name = array(
											'name'  =>  'c_name',
											'class' =>  'form-control',
											'placeholder' =>  'Add Category Name here...',
											'id'    =>  'c_name',
											'value' =>  $c_name
										);
									/* Category Name input field  */
									echo form_input($category_name);
									echo form_error('c_name');
								?>
							</div>

							<div class="form-group">
								<?php 
									echo form_label('Category Description');
									$category_description = array(
											'name'  =>  'c_description',
											'class' =>  'form-control',
											'placeholder' =>  'Add Category Description here...',
											'id'    =>  'c_description',
											'value' =>  $c_description,
											'rows' => '5',
											'cols' => '25'
										);
									echo form_textarea($category_description);
									echo form_error('c_description');
								?>
							</div>

							<div class="form-group">
								<?php echo form_label('Parent Category'); ?>
								<?php 

									$option[''] = 'Select Parent Category';

									$column = array('c_id','c_name');
									$category_list = $this->category_model->get_category_list($column);

									foreach ($category_list as $key => $value)
									{
										$option[$value['c_id']] = $value['c_name'];
									}
									$category_parent_id  = array(
											'name'  =>  'c_parent_id',
											'class' =>  'form-control',
										);
									echo form_dropdown($category_parent_id, $option, $c_parent_id);
									echo form_error('c_parent_id');
								?>
							</div>

							<div class="form-group">
								<?php echo form_label('Category Status'); ?>
								<div class="radio">
									<label>
										<?php 
											$c_status  = array(
													'name'  =>  'c_status',
													'id'  =>  'c_status',
													'value' =>  '1',
													'checked' => $c_status!=0 ? TRUE : ''
												);
											echo form_radio($c_status);
										?>
										Active
									</label>
									<label>
										<?php 
											$c_status  = array(
												'name'  =>  'c_status',
												'id'  =>  'c_status',
												'value' =>  '0',
												'checked' =>  $c_status!=1 ? TRUE : ''
											);
											echo form_radio($c_status);
										?>
										Disable
									</label>
								</div>
								<?php echo form_error('c_status'); ?>
							</div>

							<div class="form-group">
								<?php 
									echo form_label('Category URL Name');
									$categoryurlname = array(
											'name'  =>  'c_url_use_name',
											'class' =>  'form-control',
											'placeholder' =>  'Add Category URL Name here...',
											'id'    =>  'c_url_use_name',
											'value' =>  $c_url_use_name
										);
									echo form_input($categoryurlname);
									echo form_error('c_url_use_name');
								?>
							</div>

							<div class="form-group">
								<?php 
									echo form_label('Category Image');
									$c_img  = array(
										'name'  =>  'c_img',
										);
									echo form_upload($c_img);
									echo form_error('c_img');
								?>
							</div>
							
							<?php
								$submit = array(
										'class' => 'btn btn-primary',
										'value' => 'Edit Category'
									);
								echo form_submit($submit);

								$reset = array(
										'class' => 'btn btn-default',
										'value' => 'Cancel'
									);
								echo form_reset($reset);
							?>
						<?php echo form_close(); ?>
					</div>
					<!-- /.col-lg-6 (nested) -->
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				Old Image
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">						
						<?php 
							$image_path = base_url().'/assets/uploads/'.$c_image;
							$img_attrib = array(
								'src' 	=> 	$image_path,
								'alt'	=>	$c_name,
								'class'	=>	'img-responsive',
							);
							echo img($img_attrib);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>