	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Add New Brand Form
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

						<?php 
							echo form_open_multipart('catalog/add_brand', array('class' => 'form-horizontal'));
							$label_class_array = array('class' => 'col-md-2 control-label'); ?>

							<div class="form-group">
								<?php 
									echo form_label('Brand Name', '', $label_class_array);
									$brandname = array(
											'name'  =>  'b_name',
											'class' =>  'form-control',
											'placeholder' =>  'Add Brand Name here...',
											'id'    =>  'b_name',
											'value' =>  set_value('b_name')
										);
								?>
								<div class="col-md-8">
									<?php 
										echo form_input($brandname);
										echo form_error('b_name');
									?>
								</div>
							</div>

							<div class="form-group">
								<?php 
									echo form_label('Brand Description', '',$label_class_array);
									$branddesc = array(
											'name'  =>  'b_desc',
											'class' =>  'form-control',
											'placeholder' =>  'Add Brand Description here...',
											'id'    =>  'b_desc',
											'value' =>  set_value('b_desc'),
											'rows' => '5',
											'cols' => '25'
										);
								?>
								<div class="col-md-8">
									<?php
										echo form_textarea($branddesc);
										echo form_error('b_desc');
									?>
								</div>
							</div>

							<div class="form-group">

								<?php echo form_label('Categories', '', $label_class_array); ?>
								<div class="col-md-8">
									<?php

										$column = array('c_id','c_name');
										
										$category_list = $this->category_model->get_category_list($column);

										foreach ($category_list as $key => $value) {

											$brand_category  = array(
													'name'  =>  'b_c_list[]',
													'id'  =>  'b_c_list[]',
													'value' => $value['c_id']
												);
											echo '<label class="checkbox-inline">'.form_checkbox($brand_category).' '.$value['c_name'].'</label>';
										}
										echo form_error('b_c_list');
									?>
								</div>
							</div>

							<div class="form-group">
								<?php echo form_label('Brand Status', '', $label_class_array); ?>
								<div class="col-md-8">
									<div class="radio">
										<label>
											<?php 
												$c_status  = array(
														'name'  =>  'b_status',
														'id'  =>  'b_status',
														'value' =>  '1',
														'checked' => TRUE
													);
												echo form_radio($c_status);
											?>
											Active
										</label>
										<label>
											<?php 
												$c_status  = array(
													'name'  =>  'b_status',
													'id'  =>  'b_status',
													'value' =>  '0'
												);
												echo form_radio($c_status);
											?>
											Disable
										</label>
									</div>
									<?php echo form_error('b_status'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php 
									echo form_label('Brand Image', '', $label_class_array);
									$c_img  = array(
										'name'  =>  'b_logo',
										);
								?>
								<div class="col-md-8">
									<?php 
										echo form_upload($c_img);
										echo form_error('b_logo');
									?>
								</div>
							</div>
							<hr>
							<div class="col-md-offset-2">
								<?php
									$submit = array(
											'class' => 'btn btn-primary',
											'value' => 'Add Brand'
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
					<!-- /.col-lg-6 (nested) -->
				</div>
			</div>
		</div>
	</div>
</div>