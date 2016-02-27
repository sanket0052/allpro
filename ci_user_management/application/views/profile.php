<!-- Start Content -->
<div class="col-xs-12 col-sm-8 col-md-10">
	<!-- Profile Update Heading -->    
	<?php echo heading('Profile', 2, array('class' => 'user-profile-heading text-center')); ?> 
	<!-- Left Column (Profile Picture) -->
	<div class="col-md-4 col-sm-12 col-xs-12">
		<div class="text-center">
			<?php 

				if($profile_pic=='')
				{
					$profile_pic_src = 'http://placehold.it/120x120';
				}
				else
				{  
					$profile_pic_src = $this->config->item('upload_image')."/".$profile_pic;
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

		</div>
	</div>
	
	<!-- Left Column (Profile Picture) -->

	<!-- Right Column (Profile Information) -->
	<div class="col-md-8 col-sm-8 col-xs-10">

		<!-- Display flashdata -->
		<?php if(!empty($this->session->flashdata('msg'))) { ?>

			<div class="col-md-12"><!-- col-md-12 -->
				<div class="<?php echo $this->session->flashdata('class'); ?>"  role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<?php echo $this->session->flashdata('msg'); ?>
				</div>
			</div><br/>

		<?php } ?>
		<!-- Display flashdata -->

		<div class="col-md-6 toppad pull-right col-md-offset-3 ">
			<p class=" text-info">Last Updated : <?php echo date('M d, Y, h:i A', strtotime($updated_at)); ?> </p>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12 toppad" >
			<div class="panel panel-info">
				<div class="panel-heading">
					<!-- Login Form Heading -->    
					<?php echo heading($first_name." ".$last_name, 3, array('class' => 'panel-title')); ?>
				</div>
				<div class="panel-body">
					<div class="row">                                    
						<div class=" col-md-12 col-lg-12">  
							<?php 
								$template = array( 'table_open' => '<table class="table table-user-information">' );

								$this->table->set_template($template);
							
								$data = array(
										array('', ''),
										array('Designation:', $this->user_info_model->get_designation_title($designation)),
										array('Register Since:', date('M d, Y, h:i A', strtotime($register_at))),
										array('User Name:', $user_name),
										array('Email', $email),
										array('Address:', $city.", ".$zip.", ".$this->user_info_model->get_country_title($country)),
										array('Full Name:', isset($full_name) ? $full_name : ''),
										array('Bank Name:', isset($bank_name) ? $bank_name : ''),
										array('Bank ID:', isset($bank_id) ? $bank_id : ''),
										array('Contact No.:', $contact_no)
									);

								echo $this->table->generate($data); 
							?>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<!-- <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a> -->
							<?php 
								echo anchor('home/profile_update', '<i class="glyphicon glyphicon-edit"></i>', array('title' => 'Edit Profile', 'class' => "btn btn-sm btn-warning",  'data-original-title' => 'Edit this user'));
								/* Edit Profile */
							?>
						<span class="pull-right">
							<!-- <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a> -->
							<!-- <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a> -->
						</span>
				</div>
					
			</div>
		</div>
	</div><!-- Right Column (Profile Information) -->
</div><!-- End Column -->
<!-- End Content -->

	   