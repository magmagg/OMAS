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
					Make purchase order
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<?= $this->session->flashdata('success'); ?>
								<?php if(validation_errors()){echo $this->session->flashdata('error');}?>
								<form role="form" method="POST" action="<?=base_url().'Accountant/submit_make_service_invoice'?>">
									<div class="form-group">
										<label>Customer</label>
										<select class="customers" id="customerselect" name="customerid" style="width: 100%">
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
												<input class="form-control servicefield" name="service[]" id="service" placeholder="Enter service">
											</div>
											<div class="form-group col-lg-3">
												<label class="myformlabel">Unit price</label>
												<input class="form-control unitpricefield" name="serviceunitprice[]" id="unitprice" type="number" placeholder="Price">
											</div>
											<div class="form-group col-lg-3">
												<label class="myformlabel">Quantity</label>
												<input class="form-control quantityfield" name="servicequantity[]" id="quantity" type="number" placeholder="Enter Quantity" required>
											</div>
											<div class="form-group col-lg-3">
												<label class="myformlabel">Total</label>
												<input class="form-control totalfield" id="total" name="total[]" placeholder="Total" readonly>
											</div>
										</div>
									</div>
								 <button type="button" class="btn btn-success" id="cloneme2">Add items used</button>
								 <button type="button" class="btn btn-success" id="addservice">Add more service</button>
									<p> Prepared by:
										<?=$this->session->userdata['username']?>
									</p>
									<button type="submit" class="btn btn-default">Submit Button</button>
									<button type="reset" class="btn btn-default">Reset Button</button>
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
<script src="<?=base_url();?>assets/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Select2 Javascript -->
<script src="<?=base_url();?>assets/vendor/select2/select2.full.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?=base_url();?>assets/dist/js/sb-admin-2.js"></script>

<script>
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

<div class="form-group col-lg-3" id="itemsdd">
	<select class="form-control items" placeholder="Item" id="" name="items[]" style="width: 100%">
		<option value="">Please select</option>
				<?php foreach($items as $i): ?>
					<option value="<?=$i['ItemID']?>"><?=$i['ItemName']?></option>
				<?php endforeach; ?>
		</select>
</div>

<script>
	var id = 1;
	$("#addservice").click(function() {
		var clone = $("#itemsrow").clone(true);
		clone.find('input').val('');
		clone.find(".myformlabel").remove();
		clone.find("#service").attr("id", "service" + id);
		clone.find("#quantity").attr("id", "quantity" + id);
		clone.find("#unitprice").attr("id", "unitprice" + id);
		clone.find("#total").attr("id", "total" + id);
		id++;
		$("#append").append(clone);
	});


  $( "#cloneme2" ).click(function() {
    var clone = $("#itemsrow").clone(true);
    clone.find('input').val('');
    clone.find(".myformlabel").remove();
    clone.find("#serviceform").remove();

		clone.find("#unitprice").prop("readonly", true);

    clone.find("#quantity").attr("id","quantity"+id).attr("name", "quantity[]");
    clone.find("#unitprice").attr("id","unitprice"+id).attr("name", "unitprice[]");
    clone.find("#total").attr("id","total"+id);
		var itemsclone = $('#itemsdd').clone(true);
		itemsclone.find('.items').attr("id","items"+id);
    id++;
    $(clone).prepend(itemsclone);
    $("#append").append(clone);
  });
</script>




</body>

</html>
