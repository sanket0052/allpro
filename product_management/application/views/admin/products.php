<?php 
	echo link_tag("https://cdn.datatables.net/responsive/2.0.0/css/responsive.bootstrap.min.css");
?>
		<div class="col-lg-12">
			<?php echo anchor('catalog/add_product', '<i class="fa fa-plus-square"></i> Add Product', array('title'=>'Add Product', 'class' => 'btn btn-outline btn-primary')); 
				echo br(2);
			?>
			<div class="panel panel-default">
				<div class="panel-heading">
					Products List
				</div>
				<!-- /.panel-heading -->

				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<!-- Display flashdata -->
							<?php if(!empty($this->session->flashdata('msg'))) { ?>

								<div class="<?php echo $this->session->flashdata('class'); ?>"  role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<?php echo $this->session->flashdata('msg'); ?>
								</div>

							<?php } ?>
							<!-- Display flashdata -->

							<div class="dataTable_wrapper">
								<table class="table table-striped table-hover" id="dataTables-example">
									<thead>
										<tr>
											<th>Image</th>
											<th>Name</th>
											<th>Model</th>
											<th>Category</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 

											$arr = array(
												$this->uri->segment(3) === FALSE ? '' : 'p_c_id' => $this->uri->segment(3), 
												$this->uri->segment(4) === FALSE ? '' : 'p_brand' => $this->uri->segment(4) 
											);

											foreach ($arr as $key => $value) {
												if($value == ''){
													unset($arr[$key]);
												}
											}

											$product_list = $this->product_model->get_product_list('*', array_filter($arr) ? $arr : '');
											
											foreach ($product_list as $key => $value) {
												$product_image = array( 
														'src' => base_url()."assets/uploads/products/thumb/".$value['p_thumb'],
														'alt' => $value['p_name'],
														'class' => 'img-responsive',
													);
										?>
										<tr class="odd gradeX" id="<?php echo $value['p_id']; ?>">
											<td><?php echo img($product_image); ?></td>
											<td><?php echo $value['p_name']; ?></td>
											<td><?php echo $value['p_model']; ?></td>
											<td>
												<?php 
													$category_name = $this->category_model->get_category_list('c_name', array('c_id' => $value['p_c_id'])); 
														echo $category_name[0]['c_name'];
												 ?>
											</td>
											<td><?php echo $value['p_price']; ?></td>
											<td><?php echo $value['p_stock']; ?></td>
											<td><?php echo $value['p_status']==1 ? 'Enable' : 'Disable'; ?></td>
											<td>
												<?php 
													echo anchor('catalog/edit_product/'.$value['p_id'], '<i class="fa fa-pencil"></i>', 
														array(
															'class' => 'btn btn-outline btn-primary', 
															'data-toggle' => "tooltip", 
															'title' => 'Edit '.$value['p_name']
														)
													);
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