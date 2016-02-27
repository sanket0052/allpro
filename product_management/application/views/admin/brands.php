<?php 
	echo link_tag("https://cdn.datatables.net/responsive/2.0.0/css/responsive.bootstrap.min.css");
?>
		<div class="col-lg-12">
			<?php echo anchor('catalog/add_brand', '<i class="fa fa-plus-square"></i> Add Brand', array('title'=>'Add Brand', 'class' => 'btn btn-outline btn-primary')); 
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
									<th>Brand Logo</th>
									<th>Brand Name</th>
									<th>Category List</th>
									<th>Brand Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$brand_list = $this->brand_model->get_brand_list();
									foreach ($brand_list as $key => $value) {
										$brand_image = array(
											'src' => base_url().'/assets/uploads/brand_image/thumb/'.$value['b_thumb'],
											'alt' => $value['b_name'],
											'class' => 'img-responsive'
											);
								?>
								<tr class="odd gradeX" id="<?php echo $value['b_id']; ?>">
									<td><?php echo img($brand_image); ?></td>
									<td><?php echo $value['b_name']; ?></td>
									<td>
										<?php 
											$categoryids = explode(',', $value['b_c_list']);
											foreach ($categoryids as $val) {
												$column = array('c_id','c_name');
												$categorynames = $this->category_model->get_category_list($column, array('c_id' => $val));
												foreach ($categorynames as $k => $v)
												{
													echo '<span>';
													echo anchor('catalog/products/'.$v['c_id'].'/'.$value['b_id'], $v['c_name'], array('class' => 'label label-primary', 'data-toggle' => "tooltip", 'title' => 'See Product of This Category'));
													echo '</span> ';
												}
											}
										?>
									</td>
									<td><?php echo $value['b_status']==1 ? 'Enable' : 'Disable'; ?></td>
									<td>
										<?php 
											echo anchor('catalog/edit_brand/'.$value['b_id'], '<i class="fa fa-pencil"></i>', array('class' => 'btn btn-outline btn-primary', 'data-toggle' => "tooltip", 'title' => 'Edit Category'));
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