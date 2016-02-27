<!-- Start Content -->
<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

	<!-- sign in form start -->
	<?php echo form_open('login'); ?>

		<!-- Login Form Heading -->    
		<?php echo heading('Sign In Form', 2, array('class' => 'user-signup-heading')); ?>

			<hr class="colorgraph">

			<!-- Validation Error Block Start -->
			<?php if(validation_errors() != FALSE) { ?>
					<?php echo validation_errors('<div class="'.$this->config->item('error').'" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
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

			<div class="form-group">
				<?php 
					echo form_label('User Name', 'user_name');  
					/*  Username Label  */

					$username = array(
							'name'  =>  'user_name',
							'class' =>  'form-control',
							'placeholder' =>  'User Name',
							'id'    =>  'user_name'
						);
					echo form_input($username);
				?>
				<!-- Username input field  -->
			</div>
			
			<div class="form-group">
				<?php 
					echo form_label('Password', 'password');  
					/*  Password Label  */

					$password = array(
							'name'  =>  'password',
							'class' =>  'form-control',
							'placeholder' =>  'Password',
							'id'    =>  'password'
						);
					echo form_password($password);     
				?>
				<!-- Password input field -->
			</div>
			
			<hr class="colorgraph">

			<div class="row"><!-- row -->
				<div class="col-md-6"><!-- column start -->
					<?php 
						$submit = array(
								'class' => 'btn btn-lg btn-primary btn-block', 
								'value' => 'Sign In'
							);
						echo form_submit($submit);      
					   /* Submit button of sign in form */
					?>
				</div>

				<div class="col-md-6"><!-- column start -->
					<?php 
						/* Signup Form link */
						echo anchor('signup/index', 'Sign Up', array('title' => 'Sign Up', 'class' => "btn btn-lg btn-success btn-block")); 
					?>
				</div>
			</div>
		
	<?php //echo from_close(); ?><!-- sign in form end -->
	</form>

</div> <!-- /Column -->
<!-- End Content -->

