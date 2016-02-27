<!-- Start Content -->
<div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">

	<!-- Form Block Start -->
	<?php echo form_open_multipart('signup'); ?>

		<!-- Login Form Heading -->    
		<?php echo heading('Sign Up Form', 2, array('class' => 'user-signup-heading')); ?>

		<hr class="colorgraph">

		<!-- Validation Error Block Start -->
		<?php if(validation_errors() != false) {  ?>

			<div class="<?php echo $this->config->item('error'); ?>" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><!-- error block start -->
					<?php echo validation_errors(); ?>
			</div>

		<?php } ?>
		<!-- Validation Error Block End -->
		
		<!-- Display flashdata -->
		<?php if(!empty($this->session->flashdata('msg'))) { ?>

			<div class="<?php echo $this->session->flashdata('class'); ?>"  role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<?php echo $this->session->flashdata('msg'); ?>
			</div>

		<?php } ?>
		<!-- Display flashdata -->

		<div class="row"><!-- Row -->
			<div class="col-xs-12 col-sm-6 col-md-6"><!-- col-md-6 -->
				<div class="form-group">
					<?php 	                            
						$firstname = array(
								'name'  =>  'first_name',
								'class' =>  'form-control',
								'placeholder' =>  'First Name',
								'id'    =>  'first_name',
								'value'	=>	set_value('first_name')
							);
						echo form_input($firstname);     
						/* First Name input field  */
					?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-6 col-md-6"><!-- col-md-6 -->
				<div class="form-group">
					<?php 
						$lastname = array(
								'name'  =>  'last_name',
								'class' =>  'form-control',
								'placeholder' =>  'Last Name',
								'id'    =>  'last_name',
								'value'	=>	set_value('last_name')
							);
						echo form_input($lastname);     
						/* Last Name input field  */
					?>
				</div>
			</div>
		</div>

		<div class="row"><!-- Row -->
			<div class="col-md-6"><!-- col-md-6 -->
				<div class="form-group">
					<?php 
						$username = array(
								'name'  =>  'user_name',
								'class' =>  'form-control',
								'placeholder' =>  'User Name',
								'id'    =>  'user_name',
								'value'	=>	set_value('user_name')
							);
						echo form_input($username);     
						/* User Name input field  */
					?>
				</div>
			</div>

			<div class="col-md-6"><!-- col-md-6 -->
				<div class="form-group">
					<?php 
						$email = array(
								'name'  =>  'email',
								'class' =>  'form-control',
								'placeholder' =>  'Email Address',
								'id'    =>  'email',
								'value'	=>	set_value('email')
							);
						echo form_input($email);     
						/* Email Address input field  */
					?>
				</div>
			</div>
		</div>

		<div class="row"><!-- Row -->
			<div class="col-md-6"><!-- col-md-6 -->
				<div class="form-group">
					<?php 
						$country_arr = array(
								'name'  =>  'country',
								'class' =>  'form-control',
								'id'    =>  'country',
								'value'	=>	set_value('country')
							);

						/* Get the country list and key */
						$countries = $this->user_info_model->get_country();
					?>
						<div class="ui-select">
							<?php echo form_dropdown($country_arr, $countries); ?>
						</div>
				</div>
			</div>
			<div class="col-md-6"><!-- col-md-6 -->
				<div class="form-group">
					<?php 
						$contact_no = array(
								'name'  =>  'contact_no',
								'class' =>  'form-control',
								'placeholder' =>  'Contact Number',
								'id'    =>  'contact_no',
								'value'	=>	set_value('contact_no')
							);
						echo form_input($contact_no);     
						/* Password input field  */
					?>
				</div>
			</div>
		</div>

		<div class="row"><!-- Row -->
			<div class="col-md-6"><!-- col-md-6 -->
				<div class="form-group">
					<?php 
						$password = array(
								'name'  =>  'password',
								'class' =>  'form-control',
								'placeholder' =>  'Password',
								'id'    =>  'password',
							);
						echo form_password($password);     
						/* Password input field  */
					?>
				</div>
			</div>
			<div class="col-md-6"><!-- col-md-6 -->
				<div class="form-group">
					<?php 
						$confirm_password = array(
								'name'  =>  'confirm_password',
								'class' =>  'form-control',
								'placeholder' =>  'Confirm Password',
								'id'    =>  'confirm_password',
							);
						echo form_password($confirm_password);     
						/* Password input field  */
					?>
				</div>
			</div>
		</div>

		<div class="row"><!-- Row -->
			<div class="col-md-5"><!-- col-md-5 -->
				<!-- File upload field -->
				<div class="form-group">
					<div class="fileupload fileupload-new" data-provides="fileupload">
						<?php echo form_label('Profile Picture : ', 'profile_pic');  ?>
						<span class="btn btn-primary btn-file"><span class="fileupload-new">Select file</span>
						<span class="fileupload-exists">Change</span>
						<?php
							$profile_pic = array(
								'name'  =>  'profile_pic',
								'id'    =>  'profile_pic',
								);

							echo form_upload($profile_pic);     
							/* File input field  */
						?>

						<span class="fileupload-preview"></span>
						<?php echo anchor('', 'x', array('title' => 'Sign In', 'class' => "close fileupload-exists", 'data-dismiss' => "fileupload", 'style' => "float: none")); ?>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<span class="button-checkbox">
					<?php echo form_checkbox('terms_condition', 'accept') ?>
				</span>By clicking <strong class="label label-primary">Register</strong>, you agree to the Terms and Conditions set out by this site, including our Cookie Use.
			</div>
		</div>
		
		<hr class="colorgraph">

		<div class="row"><!-- row -->

			<div class="col-md-6"><!-- col-md-6 -->
				<?php 
					$submit = array(
							'class' => 'btn btn-lg btn-primary btn-block', 
							'value' => 'Sign Up'
						);
					echo form_submit($submit);      
					/* Submit button of sign in form */
				?>
			</div><!-- /column -->

			<div class="col-md-6"><!-- col-md-6 -->
				<?php echo anchor('login/index', 'Sign In', array('title' => 'Sign In', 'class' => "btn btn-lg btn-success btn-block")); ?>
			</div><!-- /column -->

		</div><!-- /row -->

	<?php //echo from_close(); ?><!-- User Sign Up Form End -->
	</form>
</div>
<!-- End Content -->