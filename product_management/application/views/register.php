<!-- Main Heading Starts -->
	<h2 class="main-heading text-center">
		Create New Account
	</h2>
<!-- Main Heading Ends -->

<!-- Registration Form Section Starts -->
	<section class="login-area">
		<div class="row">
			<div class="col-sm-6">
			<!-- Registration Panel Starts -->
				<div class="panel panel-smart">
					<div class="panel-heading">
						<h3 class="panel-title">Fill Form</h3>
					</div>
					<div class="panel-body">
						
						<!-- Login Form Starts -->
						<?php 
							echo form_open('authenticate/register', array('id' => 'register-form')); 
						?>
						
							<!-- Display flashdata -->
							<?php if(!empty($this->session->flashdata('msg'))) { ?>

								<div class="<?php echo $this->session->flashdata('class'); ?>"  role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<?php echo $this->session->flashdata('msg'); ?>
								</div>

							<?php } ?>
							<!-- Display flashdata -->

							<div class="form-group <?php echo form_error('u_username')==TRUE ? 'has-error has-feedback' : '' ?>">
								<?php 
									$u_username = array(
											'name'  =>  'u_username',
											'class' =>  'form-control',
											'placeholder' =>  'User Name',
											'id'    =>  'u_username',
											'value'	=>	set_value('u_username')
										);
									echo form_input($u_username);
									echo form_error('u_username');
									/* User Name input field  */
								?>
							</div>
							<div class="form-group <?php echo form_error('u_email')==TRUE ? 'has-error has-feedback' : '' ?>">
								<?php 
									$u_email = array(
											'name'  =>  'u_email',
											'class' =>  'form-control',
											'placeholder' =>  'Email Address',
											'id'    =>  'u_email',
											'value'	=>	set_value('u_email')
										);
									echo form_input($u_email);     
									/* Email Address input field  */
									echo form_error('u_email');
								?>
							</div>
							<div class="form-group <?php echo form_error('u_password')==TRUE ? 'has-error has-feedback' : '' ?>">
								<?php 
									$u_password = array(
											'name'  =>  'u_password',
											'class' =>  'form-control',
											'placeholder' =>  'Password',
											'id'    =>  'u_password'
										);
									echo form_password($u_password);
									/* Password input field  */
									echo form_error('u_password');
								?>
							</div>
							<div class="form-group <?php echo form_error('confirm_password')==TRUE ? 'has-error has-feedback' : '' ?>">
								<?php 
									$confirm_password = array(
											'name'  =>  'confirm_password',
											'class' =>  'form-control',
											'placeholder' =>  'Confirm Password',
											'id'    =>  'confirm_password'
										);
									echo form_password($confirm_password);     
									/* Confirm Password input field  */
									echo form_error('confirm_password');
								?>
							</div>
							<?php 
								$submit = array(
										'class' => 'btn btn-main', 
										'value' => 'Register Now'
									);
								echo form_submit($submit);      
								/* Submit button of sign in form */
							?>
						</form>
					<!-- Registration Form Ends -->
					</div>
				</div>
			<!-- Registration Panel Ends -->
			</div>
			<div class="col-sm-6">
				<!-- Guest Checkout Panel Starts -->
					<div class="panel panel-smart">
						<div class="panel-heading">
							<h3 class="panel-title">
								Checkout as Guest
							</h3>
						</div>
						<div class="panel-body">
							<p>
								Checkout as a guest instead!
							</p>
							<button class="btn btn-main">As Guest</button>
						</div>
					</div>
				<!-- Guest Checkout Panel Ends -->
			</div>
		</div>
	</section>
<!-- Login Form Section Ends -->