<section class="sec-content">
	<div class="row">
		<div class="col-lg-12">
			<?=$this->session->flashdata('success'); ?>
			<h1 class="page-header">Balance sheet</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<form role="form" method="POST" action="<?=base_url().'Accountant/submit_create_balance_sheet'?>">
	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					Assets
				</div>
					<div class="panel-body">
						<div id="assetsappend">
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
										<input class="form-control" value="₱ <?=number_format($a->asset_value)?>" readonly>
									</div>
							</div>
							<div class="row" id="assetsrow">
								<div class="col-lg-12">
										<div class="form-group col-lg-6">
											<label class="myformlabel">Name</label>
											<input class="form-control" name="assetname[]" placeholder="Enter asset" required>
										</div>
										<div class="form-group col-lg-6">
											<label class="myformlabel">Value</label>
											<input class="form-control" name="assetvalue[]" type="number" placeholder="Enter Value" required>
										</div>
									</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-lg-12">
									<label class="radio-inline">
											<input type="radio" name="assetcurrent" value="1">Current
									</label>
									<label class="radio-inline">
											<input type="radio" name="assetcurrent" value="2">Non-Current
									</label>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-lg-6">
								<button type="button" class="btn btn-success" id="cloneasset">Add more assets</button>
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
					<div id="liabilityappend">
					<div class="row" id="liabilityrow">
						<div class="col-lg-12">
							<div class="form-group col-lg-6">
								<label class="myformlabel">Name</label>
								<input class="form-control" name="liabilityname[]" placeholder="Enter liability" required>
							</div>
							<div class="form-group col-lg-6">
								<label class="myformlabel">Value</label>
								<input class="form-control" name="liabilityvalue[]" type="number" placeholder="Enter Value" required>
							</div>
						</div>
					</div>
					</div>
					<div class="row">
						<div class="form-group col-lg-12">
								<label class="radio-inline">
										<input type="radio" name="liabilitycurrent" value="1">Current
								</label>
								<label class="radio-inline">
										<input type="radio" name="liabilitycurrent" value="2">Non-Current
								</label>
						</div>
					</div>
					<!-- /.row (nested) -->
					<div class="row">
						<div class="form-group col-lg-6">
							<button type="button" class="btn btn-success" id="cloneliability">Add more Liabilities</button>
						</div>
					</div>
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
						<div id="oequityappend">
						<div class="row" id="oequityrow">
							<div class="col-lg-12">
								<div class="form-group col-lg-6">
									<label class="myformlabel">Name</label>
									<input class="form-control" name="oequityname[]" placeholder="Enter Owners equity" required>
								</div>
								<div class="form-group col-lg-6">
									<label class="myformlabel">Value</label>
									<input class="form-control" name="oequityvalue[]" type="number" placeholder="Enter Value" required>
								</div>
							</div>
						</div>
						</div>
						<!-- /.row (nested) -->
						<div class="row">
							<div class="form-group col-lg-6">
								<button type="button" class="btn btn-success" id="cloneoequity">Add more Owner's Equity</button>
							</div>
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
				</div>

				<button type="submit" class="btn btn-default">Submit Button</button>
			</form>
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

<script>
	$("#cloneasset").click(function() {
		var clone = $("#assetsrow").clone();
		clone.find('input').val('');
		clone.find(".myformlabel").remove();
		$("#assetsappend").append(clone);
	});

	$("#cloneliability").click(function() {
		var clone = $("#liabilityrow").clone();
		clone.find('input').val('');
		clone.find(".myformlabel").remove();
		$("#liabilityappend").append(clone);
	});

	$("#cloneoequity").click(function() {
		var clone = $("#oequityrow").clone();
		clone.find('input').val('');
		clone.find(".myformlabel").remove();
		$("#oequityappend").append(clone);
	});
</script>


</body>

</html>
