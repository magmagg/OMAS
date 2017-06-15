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
							<div class="row" id="assetsrow">
								<div class="col-lg-12">
										<div class="form-group col-lg-6">
											<label class="myformlabel">Name</label>
											<input class="form-control" name="assetname[]" placeholder="Enter asset" required>
										</div>
										<div class="form-group col-lg-5">
											<label class="myformlabel">Value</label>
											<input class="form-control" name="assetvalue[]" type="number" placeholder="Enter Value" required>
										</div>
										<div class="form-group col-lg-1" id="assetsdelete">
											<label class="myformlabel"> Delete </label>
											<button type="button" class="btn btn-danger deleterow" id="assetsdeleterow" onclick="delas(this)">X</button>
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
							<div class="form-group col-lg-5">
								<label class="myformlabel">Value</label>
								<input class="form-control" name="liabilityvalue[]" type="number" placeholder="Enter Value" required>
							</div>
							<div class="form-group col-lg-1" id="liadelete">
								<label class="myformlabel"> Delete </label>
								<button type="button" class="btn btn-danger deleterow" id="liadeleterow" onclick="dellia(this)">X</button>
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
								<div class="form-group col-lg-5">
									<label class="myformlabel">Value</label>
									<input class="form-control" name="oequityvalue[]" type="number" placeholder="Enter Value" required>
								</div>
								<div class="form-group col-lg-1" id="oeqdelete">
									<label class="myformlabel"> Delete </label>
									<button type="button" class="btn btn-danger deleterow" id="oeqdeleterow" onclick="deloeq(this)">X</button>
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
var assid = 1;
var liaid = 1;
var oeqid = 1;
	$("#cloneasset").click(function() {
		var clone = $("#assetsrow").clone();
		clone.find('input').val('');
		clone.find(".myformlabel").remove();
		clone.find("#assetsdeleterow").attr("id","assetsdeleterow"+assid);
		clone.attr("id","assetsrow"+assid);
		assid++;
		$("#assetsappend").append(clone);
	});

	$("#cloneliability").click(function() {
		var clone = $("#liabilityrow").clone();
		clone.find('input').val('');
		clone.find(".myformlabel").remove();
		clone.find("#liadeleterow").attr("id","liadeleterow"+liaid);
		clone.attr("id","liabilityrow"+liaid);
		liaid++;
		$("#liabilityappend").append(clone);
	});

	$("#cloneoequity").click(function() {
		var clone = $("#oequityrow").clone();
		clone.find('input').val('');
		clone.find(".myformlabel").remove();
		clone.find("#oeqdeleterow").attr("id","oeqdeleterow"+oeqid);
		clone.attr("id","oequityrow"+oeqid);
		oeqid++;
		$("#oequityappend").append(clone);
	});
</script>

<script>
function delas(sel)
{
 var currentid =sel.id.slice(-1);
	if(isNaN(currentid)){
	 currentid = '';
	 }else{

	 }
	$('#assetsrow'+currentid).remove();
}

function dellia(sel)
{
 var currentid =sel.id.slice(-1);
	if(isNaN(currentid)){
	 currentid = '';
	 }else{

	 }
	$('#liabilityrow'+currentid).remove();
}

function deloeq(sel)
{
 var currentid =sel.id.slice(-1);
	if(isNaN(currentid)){
	 currentid = '';
	 }else{

	 }
	$('#oequityrow'+currentid).remove();
}
</script>


</body>

</html>
