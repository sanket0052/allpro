<?php 
	echo link_tag("https://cdn.datatables.net/responsive/2.0.0/css/responsive.bootstrap.min.css");
?>
		<div class="col-lg-12">
			<?php echo anchor('catalog/add_category', '<i class="fa fa-plus-square"></i> Add Category', array('title'=>'Add Category', 'class' => 'btn btn-outline btn-primary')); 
				echo br(2);
			?>
			<div class="panel panel-default">
				<div class="panel-heading">
					Categories List
				</div>
				<!-- /.panel-heading -->

				<!-- Display flashdata -->
				<?php if(!empty($this->session->flashdata('msg'))) { ?>

					<div class="<?php echo $this->session->flashdata('class'); ?>"  role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php echo $this->session->flashdata('msg'); ?>
					</div>

				<?php } ?>
				<!-- Display flashdata -->

				<div class="panel-body">
					<div class="dataTable_wrapper">
						<table class="table table-striped table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Category Name</th>
									<th>Category Url Name</th>
									<th>Parent Category</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$category_list = $this->category_model->get_category_list();
									foreach ($category_list as $key => $value) {
								?>
								<tr class="odd gradeX" id="<?php echo $value['c_id']; ?>">
									<td><?php echo $value['c_name']; ?></td>
									<td><?php echo $value['c_url_use_name']; ?></td>
									<td>
										<?php 
											if(!is_null($value['c_parent_id']) && $value['c_parent_id']!=0){
												$parent_name = $this->category_model->get_category_list('c_name', array('c_id' => $value['c_parent_id'])); 
												echo $parent_name[0]['c_name'];
											}
										?>
									</td>
									<td>
										<?php 
											echo anchor('catalog/edit_category/'.$value['c_id'], '<i class="fa fa-pencil"></i>', array('class' => 'btn btn-outline btn-primary', 'data-toggle' => "tooltip", 'title' => 'Edit Category'));
										?>
									</td>
								</tr>
								<?php 
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
</div>

<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js');?>"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.0.0/js/dataTables.responsive.min.js" ></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
	$(document).ready(function() {
		$('#dataTables-example').DataTable({
				responsive: true
		});
	});
	$(document).ready(function() {
		$('[data-toggle="tooltip"]').tooltip(); 
	});
</script>