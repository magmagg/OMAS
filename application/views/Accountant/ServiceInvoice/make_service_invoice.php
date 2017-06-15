<section class="sec-content">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">New Service Invoice</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Make Service Invoice
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<?= $this->session->flashdata('success'); ?>
								<?php if(validation_errors()){echo $this->session->flashdata('error');}?>

								<form role="form" method="POST" id="myformsubmit" action="<?=base_url().'Accountant/submit_make_service_invoice'?>">
									<div class="form-group">
										<label>Customer</label>
										<select class="customers" id="customerselect" name="customerid" style="width: 100%" required>
				                        <option value=""></option>
				                        <?php foreach($customers as $c):?>
				                        <option value="<?=$c->CustomerID?>"><?=$c->CustomerName?></option>
				                        <?php endforeach;?>
                        				</select>
										<p class="help-block" id="cname">Customer name:</p>
										<p class="help-block" id="caddress">Customer Address:</p>
										<p class="help-block" id="cnum">Customer #:</p>
									</div>
									<div id="append">
										<div class="row" id="itemsrow">
											<div class="form-group col-lg-3" id="serviceform">
												<label class="myformlabel">Service</label>
												<input class="form-control servicefield" id="service" placeholder="Enter service">
											</div>
											<div class="form-group col-lg-3">
												<label class="myformlabel">Unit price</label>
												<input class="form-control unitpricefield" id="unitprice" type="number" placeholder="Price">
											</div>
											<div class="form-group col-lg-3">
												<label class="myformlabel">Quantity</label>
												<input class="form-control quantityfield"  id="quantity" type="number" placeholder="Enter Quantity">
											</div>
											<div class="form-group col-lg-2">
												<label class="myformlabel">Total</label>
												<input class="form-control totalfield" id="total" placeholder="Total" readonly>
											</div>
											<div class="form-group col-lg-1" id="firstdelete">
												<label class="myformlabel"> Delete </label>
												<button type="button" class="btn btn-danger deleterow" id="deleterow" onclick="delrow(this)">X</button>
											</div>
										</div>
										<div class="row" id="itemsrow1">
											<div class="form-group col-lg-3">
											<select class="form-control items" placeholder="Item" id="items1" name="items[]" style="width: 100%" onchange="changeminmax(this)">
												<option value="">Please select</option>
														<?php foreach($items as $i): ?>
															<option value="<?=$i['ItemID']?>"><?=$i['ItemName']?></option>
														<?php endforeach; ?>
												</select>
											</div>
											<div class="form-group col-lg-3">
												<input class="form-control unitpricefield" name="unitprice[]" id="unitprice1" type="number" placeholder="Price" readonly>
											</div>
											<div class="form-group col-lg-3">
												<input class="form-control quantityfield" name="quantity[]" id="quantity1" type="number" placeholder="Enter Quantity">
											</div>
											<div class="form-group col-lg-2">
												<input class="form-control totalfield" id="total1" name="total[]" placeholder="Total" readonly>
											</div>
											<div class="form-group col-lg-1" id="firstdelete">
												<button type="button" class="btn btn-danger deleterow" id="deleterow1" onclick="delrow(this)">X</button>
											</div>
										</div>
									</div>
								 <button type="button" class="btn btn-success" id="cloneme2">Add items used</button>
								 <button type="button" class="btn btn-success" id="addservice">Add more service</button>
									<p> Prepared by:
										<?=$this->session->userdata['username']?>
									</p>
									<button type="submit" class="btn btn-default">Submit Button</button>
								</form>
						</div>
					</div>
					<!-- /.row (nested) -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
</section>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<!-- <script src="<?=base_url();?>assets/vendor/metisMenu/metisMenu.min.js"></script> -->

<!-- Select2 Javascript -->
<!-- <script src="<?=base_url();?>assets/vendor/select2/select2.full.min.js"></script> -->


<script src="<?=base_url();?>assets/vendor/select2/select2.full.min.js"></script>
<div id="itemsdd">
	<div class="form-group col-lg-3" id="itemsddd">
	<select class="form-control items" placeholder="Item" id="" name="items[]" style="width: 100%" onchange="changeminmax(this)">
		<option value="">Please select</option>
				<?php foreach($items as $i): ?>
					<option value="<?=$i['ItemID']?>"><?=$i['ItemName']?></option>
				<?php endforeach; ?>
		</select>
	</div>
</div>
<div class="form-group col-lg-1" id="deletebutton">
	<button type="button" class="btn btn-danger deleterow" id="" onclick="delrow(this)">X</button>
</div>
<script>
var addcount = 0;
$("#deletebutton").hide();
$("#itemsrow").hide();
$("#itemsrow1").hide();
$("#itemsdd").hide();
	//var items = <?php echo json_encode($items); ?>;
	$("#customerselect").select2({
		placeholder: "Select a customer"
	});
	/*
	$(".items").select2({
		placeholder: "Item",
	});
	*/
</script>

<script>
	$('#customerselect').on('change', function() {
		$.ajax({
			type: 'POST',
			url: '<?=base_url().'Accountant/get_one_customer '?>',
			data: {
				customerid: this.value
			},
			success: function(data) {
				$("#cname").text('Customer name: ' + data.customer[0].CustomerName);
				$("#caddress").text('Customer address: ' + data.customer[0].Address);
				$("#cnum").text('Customer #: ' + data.customer[0].Phone);
			},
			dataType: 'json'
		});
	})
</script>

<script>
	var items = <?= json_encode($items); ?>;
	$("form").on('change', 'select', function() {
		var currentid = this.id.slice(-1);
		if (isNaN(currentid)) {
			$.each(items, function(key, value) {
				if ($("#items").val() == items[key].ItemID) {
					var unitprice = items[key].UnitPrice;
					$("#unitprice").val(unitprice);
					var total = unitprice * $('#quantity').val();
					$('#total').val(total);
				}
			});
		} else {
			$.each(items, function(key, value) {
				if ($("#items" + currentid).val() == items[key].ItemID) {
					var unitprice = items[key].UnitPrice;
					$("#unitprice" + currentid).val(unitprice);
					var total = unitprice * $('#quantity' + currentid).val();
					$('#total' + currentid).val(total);
				}
			});
		}
	})
</script>

<script>
	$("form").on('keyup change', '.quantityfield', function() {
		var currentid = this.id.slice(-1);
		if (isNaN(currentid)) {
			currentid = '';
		} else {

		}
		var total = $('#unitprice' + currentid).val() * this.value;
		$('#total' + currentid).val(total);
	});

	$("form").on('keyup change', '.unitpricefield', function() {
		var currentid = this.id.slice(-1);
		if (isNaN(currentid)) {
			currentid = '';
		} else {

		}
		var total = $('#quantity' + currentid).val() * this.value;
		$('#total' + currentid).val(total);
	});
</script>

<script>
	var id = 2;
	$("#addservice").click(function() {
		var clone = $("#itemsrow").clone(true).show();
		var deletebutton = $("#deletebutton").clone().show();

		clone.attr("id","itemsrow"+id);
		clone.find('input').val('');
		clone.find(".myformlabel").remove();
		clone.find("#firstdelete").remove();

		clone.find("#service").prop("required", true);
		clone.find("#quantity").prop("required", true);
		clone.find("#unitprice").prop("required", true);

		clone.find("#service").attr("id", "service" + id).attr("name", "service[]");
		clone.find("#quantity").attr("id", "quantity" + id).attr("name", "servicequantity[]");
		clone.find("#unitprice").attr("id", "unitprice" + id).attr("name", "serviceunitprice[]");

		clone.find("#total").attr("id", "total" + id).attr("name", "total[]");
		deletebutton.find(".deleterow").attr("id","deleterow"+id);
		id++;
		addcount++;
		$(clone).append(deletebutton);
		$("#append").append(clone);
	});


  $( "#cloneme2" ).click(function() {
    var clone = $("#itemsrow").clone(true).show();
		var orig = $("#itemsdd").find("#itemsddd");
		var cloned = $(orig).clone().show();
		var deletebutton = $("#deletebutton").clone().show();

		clone.attr("id","itemsrow"+id);
    clone.find('input').val('');
    clone.find(".myformlabel").remove();
    clone.find("#serviceform").remove();
		clone.find("#firstdelete").remove();

		clone.find("#unitprice").prop("readonly", true);


		clone.find("#items1").prop("required", true);
		clone.find("#unitprice").prop("required", true);


    clone.find("#quantity").attr("id","quantity"+id).attr("name", "quantity[]");
    clone.find("#unitprice").attr("id","unitprice"+id).attr("name", "unitprice[]");
    clone.find("#total").attr("id","total"+id);

		cloned.find('.items').attr("id","items"+id);
		deletebutton.find(".deleterow").attr("id","deleterow"+id);
    id++;
		addcount++;
		$(clone).append(deletebutton);
    $(clone).prepend(cloned);
    $("#append").append(clone);
  });
</script>
<script>
function delrow(sel)
{
 var currentid =sel.id.slice(-1);
	if(isNaN(currentid)){
	 currentid = '';
	 }else{

	 }
	$('#itemsrow'+currentid).remove();
	addcount--;
}
</script>
<script>
function changeminmax(sel)
{
	var itemid = sel.value;
	var selectid = sel.id;
	var selectidnumber = selectid[selectid.length -1];

	$("#quantity"+selectidnumber).attr({
       "max" : 10,        // substitute your own
       "min" : 1          // values (or variables) here
    });

	$.ajax({
		type: 'POST',
		url: '<?=base_url();?>Accountant/get_max_item_value',
		data: {
			'itemid': itemid
		},
		success: function(data) {
			var data1 = JSON.parse(data);
			$("#quantity"+selectidnumber).val(1);
			$("#quantity"+selectidnumber).attr({
					 "max" : data1[0].quantity,        // substitute your own
					 "min" : 1          // values (or variables) here
				});
		}
	});
}
</script>

<script>
$("#myformsubmit").submit(function(e){
	if ( addcount == 0 ) {
		alert("Please input atleast one service/Item");
		e.preventDefault();
}
else {

}
});
</script>


</body>

</html>
