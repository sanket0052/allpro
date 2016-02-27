<?php 
	if($this->session->userdata('user_id') == '2'){
?>
	<?php echo heading('User Info Table', 2, array('class' => 'user-table-heading text-center')); ?> 

		<!-- Display flashdata -->
		<?php if(!empty($this->session->flashdata('msg'))) { ?>

			<div class="col-md-12"><!-- col-md-12 -->
				<div class="<?php echo $this->session->flashdata('class'); ?>"  role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<?php echo $this->session->flashdata('msg'); ?>
				</div>
			</div>
			
		<br/><br/>

		<?php } ?>
		<!-- Display flashdata -->

		<!-- Simpal Join Query Data -->
		<?php echo heading('Simple Join Data', 4, array('class' => 'user-table-sub-heading')); ?> 

		<table id="example" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>User Name</th>
					<th>Position</th>
					<th>E-mail</th>
					<th>Contact No.</th>
					<th>Bank Name</th>
					<th>Bank ID</th>
					<th>Full Name</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Address</th>
					<th>Registration Date</th>
					<th>Update Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$all_data = $this->user_info_model->get_all_user();
				foreach ($all_data as $row) { ?>
				<tr>
					<td><?php echo $row->user_name; ?></td>
					<td><?php echo $this->user_info_model->get_designation_title($row->designation); ?></td>
					<td><?php echo $row->email; ?></td>
					<td><?php echo $row->contact_no; ?></td>
					<td><?php echo $row->bank_name; ?></td>
					<td><?php echo $row->bank_id; ?></td>
					<td><?php echo $row->full_name; ?></td>
					<td><?php echo $row->first_name; ?></td>
					<td><?php echo $row->last_name; ?></td>
					<td><?php echo $row->city.", ".$row->zip.", ".$this->user_info_model->get_country_title($row->country); ?></td>
					<td><?php echo date('d M Y, h:i A', strtotime($row->register_at)); ?></td>
					<td><?php echo date('d M Y, h:i A', strtotime($row->updated_at)); ?></td>
					<td>
						<?php 
							echo anchor('home/edit_user_info/'.$row->id, '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', array('title' =>'Edit', 'class' => 'btn btn-default')); 

							echo anchor('home/delete_user/'.$row->id, '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', array('title' =>'Delete', 'class' => 'btn btn-danger')); 
						?>
					</td>
				</tr>
			<?php 
				}
			?>
			</tbody>
		</table>

		<!-- Left Join Query Data -->
		<?php echo heading('Left Join Data', 4, array('class' => 'user-table-sub-heading')); ?> 

		<table id="example1" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>User Name</th>
					<th>Position</th>
					<th>E-mail</th>
					<th>Contact No.</th>
					<th>Bank Name</th>
					<th>Bank ID</th>
					<th>Full Name</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Address</th>
					<th>Registration Date</th>
					<th>Update Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$all_data_left = $this->user_info_model->get_all_user('left');
				foreach ($all_data_left as $row) { ?>
				<tr>
					<td><?php echo $row->user_name; ?></td>
					<td><?php echo $this->user_info_model->get_designation_title($row->designation); ?></td>
					<td><?php echo $row->email; ?></td>
					<td><?php echo $row->contact_no; ?></td>
					<td><?php echo $row->bank_name; ?></td>
					<td><?php echo $row->bank_id; ?></td>
					<td><?php echo $row->full_name; ?></td>
					<td><?php echo $row->first_name; ?></td>
					<td><?php echo $row->last_name; ?></td>
					<td><?php echo $row->city.", ".$row->zip.", ".$this->user_info_model->get_country_title($row->country); ?></td>
					<td><?php echo date('d M Y, h:i A', strtotime($row->register_at)); ?></td>
					<td><?php echo date('d M Y, h:i A', strtotime($row->updated_at)); ?></td>
					<td>
						<?php 
							echo anchor('home/edit_user_info/'.$row->id, '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', array('title' =>'Edit', 'class' => 'btn btn-default')); 

							echo anchor('home/delete_user/'.$row->id, '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', array('title' =>'Delete', 'class' => 'btn btn-danger')); 
						?>
					</td>
				</tr>
			<?php 
				}
			?>
			</tbody>
		</table>

		<!-- Right Join Query Data -->
		<?php echo heading('Right Join Data', 4, array('class' => 'user-table-sub-heading')); ?> 

		<table id="example2" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>User Name</th>
					<th>Position</th>
					<th>E-mail</th>
					<th>Contact No.</th>
					<th>Bank Name</th>
					<th>Bank ID</th>
					<th>Full Name</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Address</th>
					<th>Registration Date</th>
					<th>Update Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$all_data_right = $this->user_info_model->get_all_user('right');
				foreach ($all_data_right as $row) { ?>
				<tr>
					<td><?php echo $row->user_name; ?></td>
					<td><?php echo $this->user_info_model->get_designation_title($row->designation); ?></td>
					<td><?php echo $row->email; ?></td>
					<td><?php echo $row->contact_no; ?></td>
					<td><?php echo $row->bank_name; ?></td>
					<td><?php echo $row->bank_id; ?></td>
					<td><?php echo $row->full_name; ?></td>
					<td><?php echo $row->first_name; ?></td>
					<td><?php echo $row->last_name; ?></td>
					<td><?php echo $row->city.", ".$row->zip.", ".$this->user_info_model->get_country_title($row->country); ?></td>
					<td><?php echo date('d M Y, h:i A', strtotime($row->register_at)); ?></td>
					<td><?php echo date('d M Y, h:i A', strtotime($row->updated_at)); ?></td>
					<td>
						<?php 
							echo anchor('home/edit_user_info/'.$row->id, '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', array('title' =>'Edit', 'class' => 'btn btn-default')); 

							echo anchor('home/delete_user/'.$row->id, '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', array('title' =>'Delete', 'class' => 'btn btn-danger')); 
						?>
					</td>
				</tr>
			<?php 
				}
			?>
			</tbody>
		</table>
<?php } ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('.table').DataTable();
	} );
</script>
<?php 
	//print_r($this->session->userdata);

?>