<!-- Main Heading Starts -->
	<h2 class="main-heading text-center">
		Login or Create New Account
	</h2>
<!-- Main Heading Ends -->

<!-- Login Form Section Starts -->
	<section class="login-area">
		<div class="row">
			<div class="col-sm-6">
			<!-- Login Panel Starts -->
				<div class="panel panel-smart">
					<div class="panel-heading">
						<h3 class="panel-title">Login</h3>
					</div>
					<div class="panel-body">
						<p>
							Please login using your existing account
						</p>

						<!-- Display flashdata -->
						<?php if(!empty($this->session->flashdata('msg'))) { ?>

							<div class="<?php echo $this->session->flashdata('class'); ?>"  role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<?php echo $this->session->flashdata('msg'); ?>
							</div>
							
						<?php } ?>
						<!-- Display flashdata -->

						<!-- Login Form Starts -->
						<?php 
							echo form_open('authenticate/login', array('id' => 'login-form')); 
						?>

						<div class="form-group">
							<?php 
								$u_username = array(
										'name'  =>  'u_username',
										'class' =>  'form-control',
										'placeholder' =>  'User Name',
										'id'    =>  'u_username',
										'tabindex' => '1'
									);
								echo form_input($u_username);
								echo form_error('u_username');
							?>
							<!-- Username input field  -->
						</div>
						<div class="form-group">
							<?php 
								$u_password = array(
										'name'  =>  'u_password',
										'class' =>  'form-control',
										'placeholder' =>  'Password',
										'id'    =>  'u_password',
										'tabindex' => '2'
									);
								echo form_password($u_password);
								echo form_error('u_password');
							?>
						</div>
						<div class="form-group">
							<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
							<label for="remember"> Remember Me</label>
						</div>
						<div class="row">
							<div class="col-md-6">
								<?php 
									$submit = array(
											'class' => 'btn btn-main', 
											'value' => 'Login'
										);
									echo form_submit($submit);      
								   /* Submit button of sign in form */
								?>
							</div>
							<div class="col-md-6">
								<div class="form-group pull-right">
									<a href="http://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
								</div>
							</div>
						</div>

						</form>
					<!-- Login Form Ends -->
					</div>
				</div>
			<!-- Login Panel Ends -->
			</div>
			<div class="col-sm-6">
			<!-- Account Panel Starts -->
				<div class="panel panel-smart">
					<div class="panel-heading">
						<h3 class="panel-title">
							Create new account
						</h3>
					</div>
					<div class="panel-body">
						<p>
							Registration allows you to avoid filling in billing and shipping forms every time you checkout on this website
						</p>
						<?php 
							/* Register Form link */
							echo anchor('authenticate/register', 'Register', array('title' => 'Register', 'class' => 'btn btn-main')); 
						?>
					</div>
				</div>
			<!-- Account Panel Ends -->
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