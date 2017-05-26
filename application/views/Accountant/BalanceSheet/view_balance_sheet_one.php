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
								<div class="col-lg-12">
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
							</div>
							<?php $count++; ?>
						<?php endforeach; ?>
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
							<div class="col-lg-12">
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
						</div>
						<?php $count++; ?>
					<?php endforeach; ?>
					<!-- /.row (nested) -->
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->

		<!-- Next row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Owner's Equity
					</div>
					<div class="panel-body">
						<?php $count = 1; ?>
						<?php foreach($oequity as $o): ?>
							<div class="row">
								<div class="col-lg-12">
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
							</div>
							<?php $count++; ?>
						<?php endforeach; ?>
						<!-- /.row (nested) -->
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
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
