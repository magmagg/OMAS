<section class="sec-content">
	<div class="row">
		<div class="col-lg-12">
			<?=$this->session->flashdata('success'); ?>
			<h1 class="page-header">Balance sheet</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<form role="form" method="POST" id="myformsubmit" action="<?=base_url().'Accountant/submit_create_balance_sheet'?>">
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
											<input class="form-control" name="assetname[]" id="assetname" placeholder="Enter asset">
										</div>
										<div class="form-group col-lg-5">
											<label class="myformlabel">Value</label>
											<input class="form-control" name="assetvalue[]" min="0.01" step="0.01" id="assetvalue" type="number" placeholder="Enter Value">
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
								<input class="form-control" name="liabilityname[]" id="liabilityname" placeholder="Enter liability">
							</div>
							<div class="form-group col-lg-5">
								<label class="myformlabel">Value</label>
								<input class="form-control" name="liabilityvalue[]" min="0.01" step="0.01" id="liabilityvalue" type="number" placeholder="Enter Value">
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
									<input class="form-control" name="oequityname[]" id="oeqname" placeholder="Enter Owners equity">
								</div>
								<div class="form-group col-lg-5">
									<label class="myformlabel">Value</label>
									<input class="form-control" name="oequityvalue[]" min="0.01" step="0.01"  id="oeqvalue" type="number" placeholder="Enter Value">
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
$("#assetsrow").hide();
$("#liabilityrow").hide();
$("#oequityrow").hide();
var assid = 1;
var liaid = 1;
var oeqid = 1;
var clone = $("#assetsrow").clone().show();
clone.find('input').val('');
clone.find(".myformlabel").remove();
clone.find("#assetsdeleterow").attr("id","assetsdeleterow"+assid);
clone.find("#assetname").prop("required",true);
clone.find("#assetvalue").prop("required",true);
clone.attr("id","assetsrow"+assid);
assid++;
$("#assetsappend").append(clone);
var clone = $("#liabilityrow").clone().show();
clone.find('input').val('');
clone.find(".myformlabel").remove();
clone.find("#liadeleterow").attr("id","liadeleterow"+liaid);
clone.find("#liabilityname").prop("required",true);
clone.find("#liabilityvalue").prop("required",true);
clone.attr("id","liabilityrow"+liaid);
liaid++;
$("#liabilityappend").append(clone);
var clone = $("#oequityrow").clone().show();
clone.find('input').val('');
clone.find(".myformlabel").remove();
clone.find("#oeqdeleterow").attr("id","oeqdeleterow"+oeqid);
clone.find("#oeqname").prop("required",true);
clone.find("#oeqvalue").prop("required",true);
clone.attr("id","oequityrow"+oeqid);
oeqid++;
$("#oequityappend").append(clone);

var ascount = 1;
var liacount = 1;
var oeqcount = 1;

	$("#cloneasset").click(function() {
		var clone = $("#assetsrow").clone().show();
		clone.find('input').val('');
		clone.find(".myformlabel").remove();
		clone.find("#assetsdeleterow").attr("id","assetsdeleterow"+assid);
		clone.find("#assetname").prop("required",true);
		clone.find("#assetvalue").prop("required",true);
		clone.attr("id","assetsrow"+assid);
		assid++;
		ascount++;
		$("#assetsappend").append(clone);
	});

	$("#cloneliability").click(function() {
		var clone = $("#liabilityrow").clone().show();
		clone.find('input').val('');
		clone.find(".myformlabel").remove();
		clone.find("#liadeleterow").attr("id","liadeleterow"+liaid);
		clone.find("#liabilityname").prop("required",true);
		clone.find("#liabilityvalue").prop("required",true);
		clone.attr("id","liabilityrow"+liaid);
		liaid++;
		liacount++;
		$("#liabilityappend").append(clone);
	});

	$("#cloneoequity").click(function() {
		var clone = $("#oequityrow").clone().show();
		clone.find('input').val('');
		clone.find(".myformlabel").remove();
		clone.find("#oeqdeleterow").attr("id","oeqdeleterow"+oeqid);
		clone.find("#oeqname").prop("required",true);
		clone.find("#oeqvalue").prop("required",true);
		clone.attr("id","oequityrow"+oeqid);
		oeqid++;
		oeqcount++;
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
	ascount--;
}

function dellia(sel)
{
 var currentid =sel.id.slice(-1);
	if(isNaN(currentid)){
	 currentid = '';
	 }else{

	 }
	$('#liabilityrow'+currentid).remove();
	liacount--;
}

function deloeq(sel)
{
 var currentid =sel.id.slice(-1);
	if(isNaN(currentid)){
	 currentid = '';
	 }else{

	 }
	$('#oequityrow'+currentid).remove();
	oeqcount--;
}
</script>

<script>
$("#myformsubmit").submit(function(e){
	if ( ascount == 0) {
		alert("Please input atleast one Asset/Liability/Owners equity");
		e.preventDefault();
}
else if ( liacount == 0) {
	alert("Please input atleast one Asset/Liability/Owners equity");
	e.preventDefault();
}
else if ( oeqcount == 0) {
	alert("Please input atleast one Asset/Liability/Owners equity");
	e.preventDefault();
}
else {

}
});
</script>


</body>

</html>
