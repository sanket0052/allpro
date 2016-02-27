	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Add New Category Form
			</div>
			<div class="panel-body">
				<div class="row">
					<!-- Display flashdata -->
					<?php if(!empty($this->session->flashdata('msg'))) { ?>

						<div class="<?php echo $this->session->flashdata('class'); ?>"  role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<?php echo $this->session->flashdata('msg'); ?>
						</div>

					<?php } ?>
					<!-- Display flashdata -->

					<?php echo form_open_multipart('catalog/add_category', array('id' => 'register-form')); ?>

						<div class="col-md-6">
							<div class="form-group">
								<?php 
									echo form_label('Category Name');
									$c_name = array(
											'name'  =>  'c_name',
											'class' =>  'form-control',
											'placeholder' =>  'Add Category Name here...',
											'id'    =>  'c_name',
											'value' =>  set_value('c_name'),
										);
									/* Category Name input field  */
									echo form_input($c_name);
									echo form_error('c_name');
								?>
							</div>

							<div class="form-group">
								<?php echo form_label('Parent Category'); ?>
								<?php 
									$column = array('c_id','c_name');
									$option[''] = 'Select Parent Category';
									$category_list = $this->category_model->get_category_list($column);

									foreach ($category_list as $key => $value) {
										$option[$value['c_id']] = $value['c_name'];
									}
									$c_parent_id  = array(
											'name'  =>  'c_parent_id',
											'class' =>  'form-control',
										);
									echo form_dropdown($c_parent_id, $option);
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
													'checked' => TRUE,
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
												'value' =>  '0'
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
									echo form_label('Category Image');
									$c_img  = array(
										'name'  =>  'c_img',
										);
									echo form_upload($c_img);
									echo form_error('c_img');
								?>
							</div>

						</div>

						<div class="col-md-6">
							<div class="form-group">
								<?php 
									echo form_label('Category Description');
									$c_description = array(
											'name'  =>  'c_description',
											'class' =>  'form-control',
											'placeholder' =>  'Add Category Description here...',
											'id'    =>  'c_description',
											'value' =>  set_value('c_description'),
											'rows' => '5',
											'cols' => '25'
										);
									echo form_textarea($c_description);
									echo form_error('c_description');
									/* Category Name input field  */
								?>
							</div>

							<div class="form-group">
								<?php 
									echo form_label('Category URL Name');
									$c_url_use_name = array(
											'name'  =>  'c_url_use_name',
											'class' =>  'form-control',
											'placeholder' =>  'Add Category URL Name here...',
											'id'    =>  'c_url_use_name',
											'value' =>  set_value('c_url_use_name')
										);
									/* Category Name input field  */
									echo form_input($c_url_use_name);
									echo form_error('c_url_use_name');
								?>
							</div>
						</div>
						<div class="clearfix"></div>
						<hr>
						<div class="col-md-6 form-footer">
							<?php
								$submit = array(
										'class' => 'btn btn-primary',
										'value' => 'Add Category'
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
					<!-- /.col-lg-6 (nested) -->
				</div>
			</div>
		</div>
	</div>
</div>