<!-- Start Content -->
<div class="col-xs-12 col-sm-8 col-md-12">
	<!-- Profile Update Heading -->    
	<?php echo heading('Edit Profile', 2, array('class' => 'user-signup-heading text-center')); ?>

	<!-- Profile Update Form Block Start -->
	<?php echo form_open_multipart('home/profile_update', array('class' => 'form-horizontal', 'role' => 'form')); ?>    
		<!-- Left Column (Profile Picture) -->
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="text-center">
				<?php 

					if($profile_pic=='')
					{
						$profile_pic_src = 'http://placehold.it/120x120';
					}
					else
					{  
						$profile_pic_src = base_url('assets/uploads/'.$profile_pic);
					}

					$image_properties = array(
							'src'   => $profile_pic_src,
							'alt'   => 'Profile Picture',
							'class' => 'avatar img-circle img-thumbnail',
							'width' => '200',
							'height'=> '200'
						);
					echo img($image_properties);
				?>

				<h6>Upload a photo...</h6>

				<!-- File upload field -->
				<?php 
					echo form_label('Profile Picture', 'profile_pic');  
					/*  File Input Label  */
				?>
				<div class="fileupload fileupload-new" data-provides="fileupload">
					<span class="btn btn-primary btn-file"><span class="fileupload-new">Select file</span>
					<span class="fileupload-exists">Change</span>

					<?php
						$new_profile_pic = array(
								'name'  =>  'profile_pic',
								'id'    =>  'profile_pic',
								'class' =>  'text-center center-block well well-sm',
							);

						echo form_upload($new_profile_pic);     
						/* File input field  */
					?>

					<span class="fileupload-preview"></span>
					<?php echo anchor('', 'x', array('title' => 'Delete', 'class' => "close fileupload-exists", 'data-dismiss' => "fileupload", 'style' => "float: none")); ?>
				</div>
			</div>
		</div>
		<!-- Left Column (Profile Picture) -->

		<!-- Edit Form Column -->
		<div class="col-md-9 col-sm-12 col-xs-12 personal-info">

			<!-- Validation Error Block Start -->
			<?php if(validation_errors() != FALSE) { ?>
				<div class="<?php echo $this->config->item('error'); ?>" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><!-- error block start -->
					<?php echo validation_errors(); ?>
				</div>

			<?php } ?>
			<!-- Validation Error Block End -->

			<!-- Display flashdata -->
			<?php if(!empty($this->session->flashdata('msg'))) { ?>

				<div class="col-md-12"><!-- col-md-12 -->
					<div class="<?php echo $this->session->flashdata('class'); ?>"  role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<?php echo $this->session->flashdata('msg'); ?>
					</div>
				</div>
				<br/>

			<?php } ?>
			<!-- Display flashdata -->

			<!-- Profile Update Form Heading -->    
			<?php echo heading('Personal Info', 3); ?>

			<?php 
				// Create a common array for label class
				$label_class_array = array('class' => 'col-lg-5 control-label');
			?>

			<hr class="colorgraph">

			<div class="row"><!-- Row -->
				<div class="col-xs-12 col-sm-6 col-md-6"><!-- col-md-6 -->
					<!-- First Name field  -->
					<div class="form-group">
						<?php 
							echo form_label('First Name:', 'first_name', $label_class_array); /*  First Name Label  */

							$firstname = array(
									'name'  =>  'first_name',
									'class' =>  'form-control',
									'placeholder' =>  'First Name',
									'id'    =>  'first_name',
									'value' =>  $first_name,
								);
						?>
							<div class="col-lg-7">
								<?php echo form_input($firstname); ?>
							</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-6"><!-- col-md-6 -->
					<!-- Last Name field  -->
					<div class="form-group">
						<?php 
							echo form_label('Last Name:', 'last_name', $label_class_array); /*  Last Name Label  */

							$lastname = array(
									'name'  =>  'last_name',
									'class' =>  'form-control',
									'placeholder' =>  'Last Name',
									'id'    =>  'last_name',
									'value' =>  $last_name
								);
						?>
							<div class="col-lg-7">
								<?php echo form_input($lastname); ?>
							</div>
					</div>
				</div>
			</div>
			
			<div class="row"><!-- Row -->
				<div class="col-xs-12 col-sm-6 col-md-6"><!-- col-md-6 -->
					<!-- Designation field  -->
					<div class="form-group">
						<?php 
							echo form_label('Designation:', 'designation', $label_class_array); /*  Designation Name Label  */

							$designation_arr = array(
									'name'  =>  'designation',
									'class' =>  'form-control',
									'placeholder' =>  'Designation',
									'id'    =>  'designation',
									'value' =>  $designation
								);
							/* Get the Designation Type list */
							$designation_type = $this->user_info_model->get_designation();
						?>
							<div class="col-lg-7">
								<div class="ui-select">
									<?php echo form_dropdown($designation_arr, $designation_type, $designation); ?>
								</div>
							</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-6"><!-- col-md-6 -->
					<!-- User Name field -->
					<div class="form-group">
						<?php 
							echo form_label('User Name:', 'user_name', $label_class_array); /*  User Name Label  */

							$username = array(
									'name'  =>  'user_name',
									'class' =>  'form-control',
									'placeholder' =>  'User Name',
									'id'    =>  'user_name',
									'value' =>  $user_name
								);
						?>
							<div class="col-lg-7">
								<?php echo form_input($username); ?>
							</div>
					</div>
				</div>
			</div>

			<div class="row"><!-- Row -->
				<div class="col-xs-12 col-sm-6 col-md-6"><!-- col-md-6 -->
					<!-- City, Zip field  -->
					<div class="form-group">
						<?php 
							echo form_label('City:', 'city', $label_class_array); /*  Country Label  */

							$city = array(
									'name'  =>  'city',
									'class' =>  'form-control',
									'placeholder'    =>  'City',
									'id'    =>  'city',
									'value' =>  $city,
								);
						?>
							<div class="col-lg-7">
									<?php echo form_input($city); ?>
							</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-6"><!-- col-md-6 -->
					<div class="form-group">
						<?php 
							echo form_label('Zip:', 'zip', $label_class_array); /*  Country Label  */

							$zip = array(
									'name'  =>  'zip',
									'class' =>  'form-control',
									'placeholder'    =>  'Zip',
									'id'    =>  'zip',
									'value' =>  $zip,
								);
						?>
							<div class="col-lg-7">
									<?php echo form_input($zip); ?>
							</div>
					</div>
				</div>
			</div>
			
			<div class="row"><!-- Row -->
				<div class="col-xs-12 col-sm-6 col-md-6"><!-- col-md-6 -->
					<!-- Country field  -->
					<div class="form-group">
						<?php 
							echo form_label('Country:', 'country', $label_class_array); /*  Country Label  */

							$country_arr = array(
									'name'  =>  'country',
									'class' =>  'form-control',
									'id'    =>  'country',
								);
							/* Get the country list and key */
							$countries = $this->user_info_model->get_country();
						?>
							<div class="col-lg-7">
								<div class="ui-select">
									<?php echo form_dropdown($country_arr, $countries, $country); ?>
								</div>
							</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-6"><!-- col-md-6 -->
					<!-- Contact Number field -->
					<div class="form-group">
						<?php 
							echo form_label('Contact Number:', 'contact_no', $label_class_array); /*  Contact Number Label  */

							$contact_no = array(
									'name'  =>  'contact_no',
									'class' =>  'form-control',
									'placeholder' =>  'Contact Number',
									'id'    =>  'contact_no',
									'value' =>  $contact_no
								);
						?>
							<div class="col-lg-7">
								<?php echo form_input($contact_no); ?>
							</div>
					</div>
				</div>
			</div>

			<div class="row"><!-- Row -->
				<div class="col-xs-12 col-sm-6 col-md-6"><!-- col-md-6 -->
					<!-- Email Address field -->
					<div class="form-group">
						<?php 
							echo form_label('Email Address:', 'email', $label_class_array); /*  Email Address Label  */

							$email = array(
									'name'  =>  'email',
									'class' =>  'form-control',
									'placeholder' =>  'Email Address',
									'id'    =>  'email',
									'value' =>  $email
								);
						?>
							<div class="col-lg-7">
								<?php echo form_input($email); ?>
							</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-6"><!-- col-md-6 -->
					<!-- Password field -->
					<div class="form-group">
						<?php 
							echo form_label('Password:', 'password', $label_class_array); /*  Password Label  */

							$password = array(
									'name'  =>  'password',
									'class' =>  'form-control',
									'placeholder' =>  'Password',
									'id'    =>  'password',
								);
						?>
							<div class="col-lg-7">  
								<?php echo form_password($password); ?>
							</div>
					</div>
				</div>

			</div>

			<?php 
				echo form_hidden('old_filename', $profile_pic); 
			?>
			<!-- Form's Hidden filled -->

			<hr class="colorgraph">

			<div class="row"><!-- row -->
			
				<div class="col-md-4"><!-- col-md-4 -->                        
					<?php 
						$submit = array(
								'class' => 'btn btn-success btn-block', 
								'value' => 'Save Changes'
							);
						echo form_submit($submit);      
						/* Submit button of sign in form */
					?>
				</div>

				<div class="col-md-4"><!-- col-md-4 -->
					<?php 
						$submit = array(
								'class' => 'btn btn-default btn-block', 
								'value' => 'Cancel'
							);
						echo form_reset($submit);      
						/* Submit button of sign in form */
					?>
				</div>
				<div class="col-md-4"><!-- col-md-4 -->
					<span></span>
					<?php 
						echo anchor('home/profile', 'View Profile', array('title' => 'View Profile', 'class' => "btn btn-primary btn-block"));
						/* View Profile */
					?>
				</div>
			</div>
		</div>
	<?php //echo from_close(); ?><!-- User Sign Up Form End -->
	</form>
	<!-- Profile Update Form Block End -->
</div><!-- End Column -->
<!-- End Content -->

