<!-- Start Content -->
<div class="col-xs-12 col-sm-8 col-md-12">
	<!-- Profile Update Heading -->

	<!-- Display flashdata -->
	<?php if(!empty($this->session->flashdata('error_msg'))) { ?>

		<div class="col-md-12"><!-- col-md-12 -->
			<div class="<?php echo $this->session->flashdata('class'); ?>"  role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<?php echo $this->session->flashdata('error_msg'); ?>
			</div>
		<br/>

		<?php echo anchor('home/index', 'Go To Home', array('title' => 'Go To Home', 'class' => "btn btn-md btn-primary")); ?>
		
		</div>

	<?php } ?>
	<!-- Display flashdata -->

</div><!-- End Column -->
<!-- End Content -->

