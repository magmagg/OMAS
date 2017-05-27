<?php foreach($balancer as $b)
{
	$total_assets = $b->total_assets;
	$total_liabilities = $b->total_liabilities;
	$total_equity = $b->total_equity;
}
?>
	<section class="sec-content">
		<div class="row">
			<div class="col-lg-12">
				<?=$this->session->flashdata('success'); ?>
					<h1 class="page-header">Balance sheet</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Assets
					</div>
					<div class="panel-body">
						<?php $count = 1; ?>
						<?php foreach($assets as $a): ?>
						<div class="row">
								<div class="form-group col-lg-6">
									<?php if($count == 1): ?>
									<label class="myformlabel">Name</label>
									<?php endif; ?>
									<input class="form-control" value="<?=$a->asset_name?>" readonly>
								</div>
								<div class="form-group col-lg-6">
									<?php if($count == 1): ?>
									<label class="myformlabel">Value</label>
									<?php endif; ?>
									<input class="form-control" value="<?=$a->asset_value?>" readonly>
								</div>
						</div>
						<?php $count++; ?>
						<?php endforeach; ?>
						<div class="row">
								<div class="col-lg-6">
									Total
								</div>
								<div class="col-lg-6">
									<input class="form-control" value="<?=$total_assets?>" readonly>
								</div>
						</div>
						<!-- /.row (nested) -->
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>

			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Liabilities
					</div>
					<div class="panel-body">
						<?php $count = 1; ?>
						<?php foreach($liabilities as $l): ?>
						<div class="row">
								<div class="form-group col-lg-6">
									<?php if($count == 1): ?>
									<label class="myformlabel">Name</label>
									<?php endif; ?>
									<input class="form-control" value="<?=$l->liability_name?>" readonly>
								</div>
								<div class="form-group col-lg-6">
									<?php if($count == 1): ?>
									<label class="myformlabel">Value</label>
									<?php endif; ?>
									<input class="form-control" value="<?=$l->liability_value?>" readonly>
								</div>
						</div>
						<?php $count++; ?>
						<?php endforeach; ?>
						<div class="row">
								<div class="col-lg-6">
									Total
								</div>
								<div class="col-lg-6">
									<input class="form-control" value="<?=$total_liabilities?>" readonly>
								</div>
						</div>
						<!-- /.row (nested) -->
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
		</div>

		<!-- Next row -->
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Owner's Equity
					</div>
					<div class="panel-body">
						<?php $count = 1; ?>
						<?php foreach($oequity as $o): ?>
						<div class="row">
								<div class="form-group col-lg-6">
									<?php if($count == 1): ?>
									<label class="myformlabel">Name</label>
									<?php endif; ?>
									<input class="form-control" value="<?=$o->owner_name?>" readonly>
								</div>
								<div class="form-group col-lg-6">
									<?php if($count == 1): ?>
									<label class="myformlabel">Value</label>
									<?php endif; ?>
									<input class="form-control" value="<?=$o->owner_value?>" readonly>
								</div>
						</div>
						<?php $count++; ?>
						<?php endforeach; ?>
						<div class="row">
								<div class="col-lg-6">
									Total
								</div>
								<div class="col-lg-6">
									<input class="form-control" value="<?=$total_equity?>" readonly>
								</div>
						</div>
						<!-- /.row (nested) -->
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
				</div>
			</div>

			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Computation
					</div>
					<div class="panel-body">
						<div class="row">
								<div class="col-lg-4">
									Total liabilities
								</div>
								<div class="col-lg-4">
									Total Owner's Equity
								</div>
								<div class="col-lg-4">
									Total
								</div>
						</div>

						<div class="row">
							<div class="col-lg-4">
								<input class="form-control" value="<?=$total_liabilities?>" readonly>
							</div>
							<div class="col-lg-4">
								<input class="form-control" value="<?=$total_equity?>" readonly>
							</div>
							<div class="col-lg-4">
								<input class="form-control" value="<?=$total_equity+$total_liabilities?>.00" readonly>
							</div>
						</div>
<br>
						<div class"row">
							<div class="col-lg-4">
								Total assets
							</div>
							<div class="col-lg-4">
							</div>
							<div class="col-lg-4">
								<input class="form-control" value="<?=$total_assets?>" readonly>
							</div>
						</div>

						<br>
<br>
						<div class"row">
							<div class="col-lg-4">
								Total
							</div>
							<div class="col-lg-4">
							</div>
							<div class="col-lg-4">
								<?php $total = $total_equity + $total_liabilities; ?>
								<?php if($total == $total_assets):?>
										<input class="form-control" value="Balanced" readonly>
								<?php elseif($total > $total_assets):?>
										<input class="form-control" value="Greater liabilities" readonly>
								<?php elseif($total < $total_assets):?>
										<input class="form-control" value="Greater assets" readonly>
								<?php endif; ?>
							</div>
						</div>


					</div>
					<!-- /.panel -->
				</div>
			</div>


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

	<!-- Select2 Javascript -->
	<script src="<?=base_url();?>assets/vendor/select2/select2.full.min.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="<?=base_url();?>assets/dist/js/sb-admin-2.js"></script>


	</body>

	</html>
