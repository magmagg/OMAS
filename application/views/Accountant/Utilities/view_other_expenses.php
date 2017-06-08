<section class="sec-content">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Utilities</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<?=$this->session->flashdata('success'); ?>

				<div class="panel panel-default">
					<div class="panel-heading">
						Pill Tabs
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<!-- Nav tabs -->
						<ul class="nav nav-pills">
							<?php $count = 1; ?>
							<?php foreach($expenses as $e): ?>
								<?php if($count == 1): ?>
									<li class="active"><a href="#<?=$e?>" data-toggle="tab"><?=$e?></a>
									</li>
								<?php else: ?>
									<li><a href="#<?=$e?>" data-toggle="tab"><?=$e?></a>
									</li>
								<?php endif; ?>
								<?php $count++;?>
							<?php endforeach; ?>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<?php $count = 1; ?>
							<?php foreach($expenses as $key=>$value): ?>
								<?php if($count == 1): ?>
									<div class="tab-pane fade in active" id="<?=$value?>">
										<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
										    <thead>
										        <tr>
										            <th>#</th>
										            <th>Utility ID</th>
										            <th>Name</th>
										            <th>Date created</th>
										            <th>Status</th>
										            <th>Action</th>
										        </tr>
										    </thead>
										    <tbody>
										      <?php $num = 1; ?>
													<?php foreach($other_expenses as $e): ?>
														<tr>
														<td> <?=$num?> </td>
														<td> <?=$e->other_expenseID?> </td>
														<td> <?=$e->name?> </td>
														<td> <?=$e->date_created?> </td>
														<td>
														  <?php if($e->Status == 0): ?>
														    <span class="label label-info">Not yet paid</span>
														  <?php elseif($e->Status == 1): ?>
														    <span class="label label-success">Paid!</span>
														  <?php endif;?>
														</td>
														<td>
                              <a href="<?=base_url().'Accountant/view_one_expense/'.$value.'/'.$e->other_expenseID?>"><button type="button" class="btn btn-primary">View</button></a>
                            </td>
													</tr>
													<?php $num++ ;?>
													<?php endforeach; ?>
										    </tbody>
										</table>
									</div>
								<?php else: ?>
									<div class="tab-pane fade" id="<?=$value?>">
										<table width="100%" class="table table-striped table-bordered table-hover" id="table<?=$value?>">
										    <thead>
										        <tr>
										            <th>#</th>
										            <th>Utility ID</th>
										            <th>Name</th>
										            <th>Date created</th>
										            <th>Status</th>
										            <th>Action</th>
										        </tr>
										    </thead>
										    <tbody>
										      <?php if($key == 1): ?>
														<?php foreach($rent as $e):?>
															<tr>
																<td> <?=$num?> </td>
																<td> <?=$e->rentID?> </td>
																<td> <?=$e->name?> </td>
																<td> <?=$e->date_created?> </td>
																<td>
														  <?php if($e->Status == 0): ?>
														    <span class="label label-info">Not yet paid</span>
														  <?php elseif($e->Status == 1): ?>
														    <span class="label label-success">Paid!</span>
														  <?php endif;?>
														</td>
																<td>
		                              <a href="<?=base_url().'Accountant/view_one_expense/'.$value.'/'.$e->rentID?>"><button type="button" class="btn btn-primary">View</button></a>
		                            </td>
															</tr>
														<?php endforeach; ?>
													<?php elseif($key == 2): ?>
														<?php foreach($insurance as $e):?>
															<tr>
																<td> <?=$num?> </td>
																<td> <?=$e->insuranceID?> </td>
																<td> <?=$e->name?> </td>
																<td> <?=$e->date_created?> </td>
																<td>
														  <?php if($e->Status == 0): ?>
														    <span class="label label-info">Not yet paid</span>
														  <?php elseif($e->Status == 1): ?>
														    <span class="label label-success">Paid!</span>
														  <?php endif;?>
														</td>
																<td>
		                              <a href="<?=base_url().'Accountant/view_one_expense/'.$value.'/'.$e->insuranceID?>"><button type="button" class="btn btn-primary">View</button></a>
		                            </td>
															</tr>
														<?php endforeach; ?>
													<?php elseif($key == 3): ?>
														<?php foreach($fees as $e):?>
															<tr>
																<td> <?=$num?> </td>
																<td> <?=$e->feesID?> </td>
																<td> <?=$e->name?> </td>
																<td> <?=$e->date_created?> </td>
																<td>
														  <?php if($e->Status == 0): ?>
														    <span class="label label-info">Not yet paid</span>
														  <?php elseif($e->Status == 1): ?>
														    <span class="label label-success">Paid!</span>
														  <?php endif;?>
														</td>
																<td>
		                              <a href="<?=base_url().'Accountant/view_one_expense/'.$value.'/'.$e->feesID?>"><button type="button" class="btn btn-primary">View</button></a>
		                            </td>
															</tr>
														<?php endforeach; ?>
													<?php elseif($key == 4): ?>
														<?php foreach($wages as $e):?>
															<tr>
																<td> <?=$num?> </td>
																<td> <?=$e->wagesID?> </td>
																<td> <?=$e->name?> </td>
																<td> <?=$e->date_created?> </td>
																<td>
														  <?php if($e->Status == 0): ?>
														    <span class="label label-info">Not yet paid</span>
														  <?php elseif($e->Status == 1): ?>
														    <span class="label label-success">Paid!</span>
														  <?php endif;?>
														</td>
																<td>
		                              <a href="<?=base_url().'Accountant/view_one_expense/'.$value.'/'.$e->wagesID?>"><button type="button" class="btn btn-primary">View</button></a>
		                            </td>
															</tr>
														<?php endforeach; ?>
													<?php elseif($key == 5): ?>
														<?php foreach($interest as $e):?>
															<tr>
																<td> <?=$num?> </td>
																<td> <?=$e->interestID?> </td>
																<td> <?=$e->name?> </td>
																<td> <?=$e->date_created?> </td>
																<td>
														  <?php if($e->Status == 0): ?>
														    <span class="label label-info">Not yet paid</span>
														  <?php elseif($e->Status == 1): ?>
														    <span class="label label-success">Paid!</span>
														  <?php endif;?>
														</td>
																<td>
		                              <a href="<?=base_url().'Accountant/view_one_expense/'.$value.'/'.$e->interestID?>"><button type="button" class="btn btn-primary">View</button></a>
		                            </td>
															</tr>
														<?php endforeach; ?>
													<?php elseif($key == 6): ?>
														<?php foreach($supplies as $e):?>
															<tr>
																<td> <?=$num?> </td>
																<td> <?=$e->suppliesID?> </td>
																<td> <?=$e->name?> </td>
																<td> <?=$e->date_created?> </td>
																<td>
														  <?php if($e->Status == 0): ?>
														    <span class="label label-info">Not yet paid</span>
														  <?php elseif($e->Status == 1): ?>
														    <span class="label label-success">Paid!</span>
														  <?php endif;?>
														</td>
														<td>
															<a href="<?=base_url().'Accountant/view_one_expense/'.$value.'/'.$e->suppliesID?>"><button type="button" class="btn btn-primary">View</button></a>
														</td>
															</tr>
														<?php endforeach; ?>
													<?php elseif($key == 7): ?>
														<?php foreach($maintenance as $e):?>
															<tr>
																<td> <?=$num?> </td>
																<td> <?=$e->maintenanceID?> </td>
																<td> <?=$e->name?> </td>
																<td> <?=$e->date_created?> </td>
																<td>
														  <?php if($e->Status == 0): ?>
														    <span class="label label-info">Not yet paid</span>
														  <?php elseif($e->Status == 1): ?>
														    <span class="label label-success">Paid!</span>
														  <?php endif;?>
														</td>
																<td>
		                              <a href="<?=base_url().'Accountant/view_one_expense/'.$value.'/'.$e->maintenanceID?>"><button type="button" class="btn btn-primary">View</button></a>
		                            </td>
															</tr>
														<?php endforeach; ?>
													<?php elseif($key == 8): ?>
														<?php foreach($travel as $e):?>
															<tr>
																<td> <?=$num?> </td>
																<td> <?=$e->travelID?> </td>
																<td> <?=$e->name?> </td>
																<td> <?=$e->date_created?> </td>
																<td>
														  <?php if($e->Status == 0): ?>
														    <span class="label label-info">Not yet paid</span>
														  <?php elseif($e->Status == 1): ?>
														    <span class="label label-success">Paid!</span>
														  <?php endif;?>
														</td>
																<td>
		                              <a href="<?=base_url().'Accountant/view_one_expense/'.$value.'/'.$e->travelID?>"><button type="button" class="btn btn-primary">View</button></a>
		                            </td>
															</tr>
														<?php endforeach; ?>
													<?php elseif($key == 9): ?>
														<?php foreach($entertainment as $e):?>
															<tr>
																<td> <?=$num?> </td>
																<td> <?=$e->entertainmentID?> </td>
																<td> <?=$e->name?> </td>
																<td> <?=$e->date_created?> </td>
																<td>
														  <?php if($e->Status == 0): ?>
														    <span class="label label-info">Not yet paid</span>
														  <?php elseif($e->Status == 1): ?>
														    <span class="label label-success">Paid!</span>
														  <?php endif;?>
														</td>
																<td>
		                              <a href="<?=base_url().'Accountant/view_one_expense/'.$value.'/'.$e->entertainmentID?>"><button type="button" class="btn btn-primary">View</button></a>
		                            </td>
															</tr>
														<?php endforeach; ?>
													<?php elseif($key == 10): ?>
															<?php foreach($training as $e):?>
																<tr>
																	<td> <?=$num?> </td>
																	<td> <?=$e->trainingID?> </td>
																	<td> <?=$e->name?> </td>
																	<td> <?=$e->date_created?> </td>
																	<td>
														  <?php if($e->Status == 0): ?>
														    <span class="label label-info">Not yet paid</span>
														  <?php elseif($e->Status == 1): ?>
														    <span class="label label-success">Paid!</span>
														  <?php endif;?>
														</td>
																	<td>
			                              <a href="<?=base_url().'Accountant/view_one_expense/'.$value.'/'.$e->trainingID?>"><button type="button" class="btn btn-primary">View</button></a>
			                            </td>
																</tr>
															<?php endforeach; ?>
														<?php elseif($key == 11): ?>
																<?php foreach($utilities as $e):?>
																	<tr>
																		<td> <?=$num?> </td>
																		<td> <?=$e->UtilitiesID?> </td>
																		<td> <?=$e->name?> </td>
																		<td> <?=$e->date_created?> </td>
																		<td>
																<?php if($e->Status == 0): ?>
																	<span class="label label-info">Not yet paid</span>
																<?php elseif($e->Status == 1): ?>
																	<span class="label label-success">Paid!</span>
																<?php endif;?>
															</td>
																		<td>
																			<a href="<?=base_url().'Accountant/view_one_expense/'.$value.'/'.$e->UtilitiesID?>"><button type="button" class="btn btn-primary">View</button></a>
																		</td>
																	</tr>
																<?php endforeach; ?>
													<?php endif;?>

										    </tbody>
										</table>
									</div>
								<?php endif; ?>
								<?php $count++; ?>
							<?php endforeach; ?>
						</div>
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->

		</div>
		<!-- /.col-lg-12 -->
	</div>
</section>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?=base_url();?>assets/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?=base_url();?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?=base_url();?>assets/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
	$(document).ready(function() {
		$('#dataTables-example').DataTable({
			responsive: true
		});
	});
</script>

<script>
<?php foreach($expenses as $e): ?>
$(document).ready(function() {
	$('#table<?=$e?>').DataTable({
		responsive: true
	});
});
<?php endforeach; ?>
</script>


</body>

</html>
