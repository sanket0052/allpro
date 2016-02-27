<!-- Start Content -->
<div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">

	<!-- Form Block Start -->
	<?php echo form_open('home/update_bnk_detail', array('class' => 'form-horizontal', 'role' => 'form')); ?>

		<!-- Login Form Heading -->    
		<?php echo heading('Bank Detail', 2, array('class' => 'user-signup-heading')); ?>

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

			<div class="col-md-12"><!-- col-md-12 -->
				<div class="<?php echo $this->session->flashdata('class'); ?>"  role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<?php echo $this->session->flashdata('msg'); ?>
				</div>
			</div>

		<?php } ?>
		<!-- Display flashdata -->

		<?php 
			// Create a common array for label class
			$label_class_array = array('class' => 'col-lg-4 control-label');
		?>

		<div class="form-group">
			<?php         
				echo form_label('Full Name :', 'full_name', $label_class_array); /*  Full Name Label  */

				$full_name = array(
						'name'  =>  'full_name',
						'class' =>  'form-control',
						'placeholder' =>  'Full Name (As Per in Bank Book)',
						'id'    =>  'full_name',
						'value' =>  isset($full_name) ? $full_name : set_value('full_name')
					);
			?>

				<div class="col-lg-7">
					<?php echo form_input($full_name); ?>
				</div>
				<!-- Full Name input field -->
		</div>

		<div class="form-group">
			<?php         
				echo form_label('Bank Name :', 'bank_name', $label_class_array); /*  Full Name Label  */                      
				$bank_name = array(
						'name'  =>  'bank_name',
						'class' =>  'form-control',
						'placeholder' =>  'Bank Name',
						'id'    =>  'bank_name',
						'value' =>  isset($bank_name) ? $bank_name : set_value('bank_name')
					);
			?>

				<div class="col-lg-7">
					<?php echo form_input($bank_name); ?>
				</div>
				<!-- Full Name input field -->
		</div>
			
		<div class="form-group">
			<?php 
				echo form_label('Bank Account Number :', 'bank_id', $label_class_array); /*  First Name Label  */

				$bank_id = array(
						'name'  =>  'bank_id',
						'class' =>  'form-control',
						'placeholder' =>  'Bank Account Number',
						'id'    =>  'bank_id',
						'value'	=>	isset($bank_id) ? $bank_id : set_value('bank_id')
					);
			?>
				<div class="col-lg-7">
					<?php 
						echo form_input($bank_id);     
						/* Bank Account Number input field  */
					?>
				</div>
		</div>

		<hr class="colorgraph">

		<div class="row"><!-- row -->

			<div class="col-md-6"><!-- col-md-6 -->                        
				<?php 
					$submit = array(
							'class' => 'btn btn-lg btn btn-success btn-block', 
							'value' => 'Save Changes'
						);
					echo form_submit($submit);      
					/* Submit button of sign in form */
				?>
			</div>

			<div class="col-md-6"><!-- col-md-6 -->
				<?php 
					$submit = array(
							'class' => 'btn btn-lg btn btn-default btn-block', 
							'value' => 'Cancel'
						);
					echo form_reset($submit);      
					/* Submit button of sign in form */
				?>
			</div>

		</div><!-- /row -->

	<?php //echo from_close(); ?><!-- User Sign Up Form End -->
	</form>
</div>
<!-- End Content -->