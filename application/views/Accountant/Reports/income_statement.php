<section class="sec-content">
	 <div class="row">
			 <div class="col-lg-12">
					 <h1 class="page-header">Service Invoice</h1>
			 </div>
			 <!-- /.col-lg-12 -->
	 </div>
	 <!-- /.row -->
	 <div class="row">
		 <div class="col-lg-6">
			 <?=$this->session->flashdata('success'); ?>
			 <div class="panel panel-default">
					 <div class="panel-heading">
							 All service invoices
					 </div>
					 <!-- /.panel-heading -->
					 <div class="panel-body">
						 <form role="form" method="POST" action="<?=base_url();?>Accountant/submit_get_income_statement">
						 <div class="form-group">
							 <select name="duration" id="duration">
									<option value=""></option>
									<option value="monthly">Monthly</option>
									<option value="quarterly">Quarterly</option>
									<option value="semi">Semi Annual</option>
									<option value="annual">Annual</option>
								</select>
						 </div>

							 <div class="form-inline">
						 <div class="form-group">
							 <select name="yearpicker" id="yearpicker" required></select>
						 </div>
						 <div class="form-group" id="pickmonth">
							 <select id="monthspicker">
							 <option value="1">January</option>
							 <option value="2">February</option>
							 <option value="3">March</option>
							 <option value="4">April</option>
							 <option value="5">May</option>
							 <option value="6">June</option>
							 <option value="7">July</option>
							 <option value="8">August</option>
							 <option value="9">September</option>
							 <option value="10">October</option>
							 <option value="11">November</option>
							 <option value="12">December</option>
							 </select>
						 </div>

						 <div class="form-group" id="pickquarter">
							 <select id="quarterpicker">
							 <option value="1">1st Quarter</option>
							 <option value="2">2nd Quarter</option>
							 <option value="3">3rd Quarter</option>
							 <option value="4">4th Quarter</option>
							 </select>
						 </div>

						 <div class="form-group" id="picksemi">
							 <select id="semipicker">
							 <option value="1">1st half</option>
							 <option value="2">2nd half</option>
							 </select>
						 </div>

					 </div>
					 <br>
					 <div class="form-inline">
						 <div class="form-group">
							 <input class="form-control" name="other_income" id="other_income" type="number" placeholder="Other income(Optional)">
						 </div>
						 <div class="form-group">
							 <input class="form-control" name="interest_expense" id="interest_expense" type="number" placeholder="Interest expense" required>
						 </div>
					 </div>

<br>
					 <button type="submit" class="btn btn-default">Submit Button</button>
				 </form>
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
<!-- <script src="<?=base_url();?>assets/vendor/metisMenu/metisMenu.min.js"></script> -->


<!-- Custom Theme JavaScript -->
<!-- <script src="<?=base_url();?>assets/dist/js/sb-admin-2.js"></script> -->

<script src="<?=base_url();?>assets/vendor/select2/select2.full.min.js"></script>
<script>
$("#pickquarter").hide();
$("#picksemi").hide();
$("#pickmonth").hide();
$("#duration").select2({
	placeholder: "Select duration"
});
$("#yearpicker").select2({
	placeholder: "Select duration"
});
$("#monthspicker").select2({
	placeholder: "Select duration"
});
$("#quarterpicker").select2({
	placeholder: "Select duration"
});
$("#semipicker").select2({
	placeholder: "Select duration"
});

	$('#duration').change(function() {
		if(this.value == "monthly")
		{
			$("#pickmonth").show();
			$("#picksemi").hide();
			$("#pickquarter").hide();
      $('#monthspicker').prop('required',true);
      $('#quarterpicker').prop('required',false);
      $('#semipicker').prop('required',false);

			$('#monthspicker').attr('name', 'month');
			$('#quarterpicker').attr('name', '');
			$('#semipicker').attr('name', '');
		}
		else if(this.value == "quarterly")
		{
			$("#pickquarter").show();
			$("#picksemi").hide();
			$("#pickmonth").hide();
			$('#quarterpicker').prop('required',true);
			$('#monthspicker').prop('required',false);
			$('#semipicker').prop('required',false);

			$('#quarterpicker').attr('name', 'month');
			$('#monthspicker').attr('name', '');
			$('#semipicker').attr('name', '');
		}
		else if(this.value == "semi")
		{
			$("#picksemi").show();

			$("#pickquarter").hide();
			$("#pickmonth").hide();
			$('#semipicker').prop('required',true);
			$('#monthspicker').prop('required',false);
			$('#quarterpicker').prop('required',false);

			$('#semipicker').attr('name', 'month');
			$('#monthspicker').attr('name', '');
			$('#quarterpicker').attr('name', '');
		}
		else if(this.value == "annual")
		{
			$("#picksemi").hide();
			$("#pickquarter").hide();
			$("#pickmonth").hide();

			$('#semipicker').prop('required',false);
			$('#monthspicker').prop('required',false);
			$('#quarterpicker').prop('required',false);

			$('#quarterpicker').attr('name', '');
			$('#monthspicker').attr('name', '');
			$('#semipicker').attr('name', '');
		}
	});
</script>

<script>
for (i = new Date().getFullYear(); i > 1900; i--)
{
    $('#yearpicker').append($('<option />').val(i).html(i));
}
</script>
</body>

</html>
