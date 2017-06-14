<section class="sec-content">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">View reports</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					Service invoice, Sales Count
				</div>
				<div class="panel-body">
					<ul class="nav nav-pills">
						<li class="active"><a href="#monthly" data-toggle="tab">Monthly</a></li>
						<li><a href="#quarter" data-toggle="tab">Quarterly</a></li>
						<li><a href="#semianual" data-toggle="tab">Semi Annually</a></li>
						<li><a href="#anual" data-toggle="tab">Annually</a></li>
					</ul>
					<div class="tab-content">

						<div class="tab-pane fade in active" id="monthly">
							<div class="form-group">
								<select id="yearselectmonthlyservice" style="width: 100%">
                   <option value=""></option>
                   <?php foreach($serviceyears as $sy): ?>
                     <option value="<?=$sy->Annual?>"><?=$sy->Annual?></option>
                   <?php endforeach; ?>
                 </select>
							</div>
							<div class="ct-chart ct-golden-section" id="monthlyservices"></div>
						</div>

            <div class="tab-pane" id="quarter">
              <div class="form-group">
                <select id="yearselectquarterservice" style="width: 100%">
                   <option value=""></option>
                   <?php foreach($serviceyears as $sy): ?>
                     <option value="<?=$sy->Annual?>"><?=$sy->Annual?></option>
                   <?php endforeach; ?>
                 </select>
              </div>
              <div class="ct-chart ct-golden-section" id="quarterservices"></div>
            </div>

						<div class="tab-pane" id="semianual">
              <div class="form-group">
                <select id="yearselectsemiservice" style="width: 100%">
                   <option value=""></option>
                   <?php foreach($serviceyears as $sy): ?>
                     <option value="<?=$sy->Annual?>"><?=$sy->Annual?></option>
                   <?php endforeach; ?>
                 </select>
              </div>
							<div class="ct-chart ct-golden-section" id="semiservices"></div>
						</div>

						<div class="tab-pane fade" id="anual">
							<div class="ct-chart ct-golden-section" id="anualservices"></div>
						</div>

					</div>

				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->

		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					Purchase reports, Procurement count
				</div>
				<div class="panel-body">
					<ul class="nav nav-pills">
						<li class="active"><a href="#monthlyp" data-toggle="tab">Monthly</a></li>
						<li><a href="#quarterp" data-toggle="tab">Quarterly</a></li>
						<li><a href="#semianualp" data-toggle="tab">Semi Annually</a></li>
						<li><a href="#anualp" data-toggle="tab">Annually</a></li>
					</ul>
					<div class="tab-content">

						<div class="tab-pane fade in active" id="monthlyp">
							<div class="form-group">
								<select id="ysmonthlyp" style="width: 100%">
                   <option value=""></option>
                   <?php foreach($purchaseyears as $sy): ?>
                     <option value="<?=$sy->Annual?>"><?=$sy->Annual?></option>
                   <?php endforeach; ?>
                 </select>
							</div>
							<div class="ct-chart ct-golden-section" id="monthlypchart"></div>
						</div>

            <div class="tab-pane fade" id="quarterp">
              <div class="form-group">
                <select id="ysquarterp" style="width: 100%">
                   <option value=""></option>
                   <?php foreach($purchaseyears as $sy): ?>
                     <option value="<?=$sy->Annual?>"><?=$sy->Annual?></option>
                   <?php endforeach; ?>
                 </select>
              </div>
              <div class="ct-chart ct-golden-section" id="quarterpchart"></div>
            </div>

						<div class="tab-pane fade" id="semianualp">
              <div class="form-group">
                <select id="yssemip" style="width: 100%">
                   <option value=""></option>
                   <?php foreach($purchaseyears as $sy): ?>
                     <option value="<?=$sy->Annual?>"><?=$sy->Annual?></option>
                   <?php endforeach; ?>
                 </select>
              </div>
							<div class="ct-chart ct-golden-section" id="semipchart"></div>
						</div>

						<div class="tab-pane fade" id="anualp">
							<div class="ct-chart ct-golden-section" id="anualpchart"></div>
						</div>

					</div>

				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>




		<!-- NEXT ROW -->
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Inventory, Used items from inventory
					</div>
					<div class="panel-body">
						<ul class="nav nav-pills">
							<li class="active"><a href="#monthlyi" data-toggle="tab">Monthly</a></li>
							<li><a href="#quarteri" data-toggle="tab">Quarterly</a></li>
							<li><a href="#semianuali" data-toggle="tab">Semi Annually</a></li>
							<li><a href="#anuali" data-toggle="tab">Annually</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="monthlyi">
								<div class="form-group">
									<select id="ysmonthlyi" style="width: 100%">
										 <option value=""></option>
										 <?php foreach($inventoryyears as $sy): ?>
											 <option value="<?=$sy->year?>"><?=$sy->year?></option>
										 <?php endforeach; ?>
									 </select>
								</div>
								<div class="ct-chart ct-golden-section" id="monthlyichart"></div>
							</div>

							<div class="tab-pane fade" id="quarteri">
								<div class="form-group">
									<select id="ysquarteri" style="width: 100%">
										 <option value=""></option>
										 <?php foreach($inventoryyears as $sy): ?>
											 <option value="<?=$sy->year?>"><?=$sy->year?></option>
										 <?php endforeach; ?>
									 </select>
								</div>
								<div class="ct-chart ct-golden-section" id="quarterichart"></div>
							</div>

							<div class="tab-pane fade" id="semianuali">
								<div class="form-group">
									<select id="yssemii" style="width: 100%">
										 <option value=""></option>
										 <?php foreach($inventoryyears as $sy): ?>
											 <option value="<?=$sy->year?>"><?=$sy->year?></option>
										 <?php endforeach; ?>
									 </select>
								</div>
								<div class="ct-chart ct-golden-section" id="semiichart"></div>
							</div>

							<div class="tab-pane fade" id="anuali">
								<div class="ct-chart ct-golden-section" id="anualichart"></div>
							</div>

						</div>

					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->

			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Revenue
					</div>
					<div class="panel-body">
						<ul class="nav nav-pills">
							<li class="active"><a href="#monthlypie" data-toggle="tab">Monthly</a></li>
							<li><a href="#semianualpie" data-toggle="tab">Semi Annually</a></li>
							<li><a href="#quarterpie" data-toggle="tab">Quarterly</a></li>
							<li><a href="#anualpie" data-toggle="tab">Annual</a></li>
						</ul>
						<div class="tab-content">

							<div class="tab-pane fade in active" id="monthlypie">
								<div class="form-group">
									<select id="ysmonthlypie" style="width: 100%">
										 <option value=""></option>
										 <?php foreach($serviceyears as $sy): ?>
											 <option value="<?=$sy->Annual?>"><?=$sy->Annual?></option>
										 <?php endforeach; ?>
									 </select>
								</div>
								<div class="ct-chart ct-golden-section" id="monthlypiechart"></div>
							</div>

							<div class="tab-pane" id="quarterpie">
								<div class="form-group">
									<select id="ysquarterpie" style="width: 100%">
										 <option value=""></option>
										 <?php foreach($serviceyears as $sy): ?>
											 <option value="<?=$sy->Annual?>"><?=$sy->Annual?></option>
										 <?php endforeach; ?>
									 </select>
								</div>
								<div class="ct-chart ct-golden-section" id="quarterpiechart"></div>
							</div>

							<div class="tab-pane fade" id="semianualpie">
								<div class="form-group">
									<select id="yssemipie" style="width: 100%">
										 <option value=""></option>
										 <?php foreach($serviceyears as $sy): ?>
											 <option value="<?=$sy->Annual?>"><?=$sy->Annual?></option>
										 <?php endforeach; ?>
									 </select>
								</div>
								<div class="ct-chart ct-golden-section" id="semipiechart"></div>
							</div>

							<div class="tab-pane fade" id="anualpie">
								<div class="ct-chart ct-golden-section" id="anualpiechart"></div>
							</div>

						</div>

					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- NEXT ROW -->

		<!-- LAST ROW -->
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Expenses
					</div>
					<div class="panel-body">
						<ul class="nav nav-pills">
							<li class="active"><a href="#monthlyex" data-toggle="tab">Monthly</a></li>
							<li><a href="#quarterex" data-toggle="tab">Quarterly</a></li>
							<li><a href="#semianualex" data-toggle="tab">Semi Annually</a></li>
							<li><a href="#anualex" data-toggle="tab">Annually</a></li>
						</ul>
						<div class="tab-content">

							<div class="tab-pane fade in active" id="monthlyex">
								<div class="form-group">
									<select id="selectexm" name="table" style="width:100%">
											<option value=""></option>
											<option value="other_expenses">Other expenses</option>
											<option value="rent">Rent</option>
											<option value="insurance">Insurance</option>
											<option value="fees">Fees</option>
											<option value="wages">Wages</option>
											<option value="interest">Interest</option>
											<option value="supplies">Supplies</option>
											<option value="maintenance">Maintenance</option>
											<option value="travel">Travel</option>
											<option value="entertainment">Media & Entertainment</option>
											<option value="training">Training</option>
											<option value="utilities">Utilitiy</option>
									</select>
									<select id="ysmonthlyex" style="width: 100%" disabled>
										<option value=""></option>
									 </select>
								</div>
								<div class="ct-chart ct-golden-section" id="monthlyexchart"></div>
							</div>

							<div class="tab-pane fade" id="quarterex">
								<div class="form-group">
									<select id="selectexq" name="table" style="width:100%">
											<option value=""></option>
											<option value="other_expenses">Other expenses</option>
											<option value="rent">Rent</option>
											<option value="insurance">Insurance</option>
											<option value="fees">Fees</option>
											<option value="wages">Wages</option>
											<option value="interest">Interest</option>
											<option value="supplies">Supplies</option>
											<option value="maintenance">Maintenance</option>
											<option value="travel">Travel</option>
											<option value="entertainment">Media & Entertainment</option>
											<option value="training">Training</option>
											<option value="utilities">Utilitiy</option>
									</select>
									<select id="ysquarterex" style="width: 100%" disabled>
										<option value=""></option>
									 </select>
								</div>
								<div class="ct-chart ct-golden-section" id="quarterexchart"></div>
							</div>

							<div class="tab-pane fade" id="semianualex">
								<div class="form-group">
									<select id="selectexsemi" name="table" style="width:100%">
											<option value=""></option>
											<option value="other_expenses">Other expenses</option>
											<option value="rent">Rent</option>
											<option value="insurance">Insurance</option>
											<option value="fees">Fees</option>
											<option value="wages">Wages</option>
											<option value="interest">Interest</option>
											<option value="supplies">Supplies</option>
											<option value="maintenance">Maintenance</option>
											<option value="travel">Travel</option>
											<option value="entertainment">Media & Entertainment</option>
											<option value="training">Training</option>
											<option value="utilities">Utilitiy</option>
									</select>
									<select id="yssemiex" style="width: 100%" disabled>
										<option value=""></option>
									 </select>
								</div>
								<div class="ct-chart ct-golden-section" id="semiexchart"></div>
							</div>

							<div class="tab-pane fade" id="anualex">
								<div class="form-group">
									<select id="selectexannual" name="table" style="width:100%">
											<option value=""></option>
											<option value="other_expenses">Other expenses</option>
											<option value="rent">Rent</option>
											<option value="insurance">Insurance</option>
											<option value="fees">Fees</option>
											<option value="wages">Wages</option>
											<option value="interest">Interest</option>
											<option value="supplies">Supplies</option>
											<option value="maintenance">Maintenance</option>
											<option value="travel">Travel</option>
											<option value="entertainment">Media & Entertainment</option>
											<option value="training">Training</option>
											<option value="utilities">Utilitiy</option>
									</select>

								</div>
								<div class="ct-chart ct-golden-section" id="anualexchart"></div>
							</div>

						</div>

					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>

			<div class="col-lg-6">
				<?=$this->session->flashdata('success'); ?>
				<div class="panel panel-default">
						<div class="panel-heading">
								Income Statement
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

		</div>
		<!-- LAST ROW -->
	</div>
	<!-- /.row -->
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

<script src="<?=base_url();?>assets/vendor/chartist/chartist.min.js"></script>

<script src="<?=base_url();?>assets/vendor/flot/jquery.flot.js"></script>
<script src="<?=base_url();?>assets/vendor/flot/jquery.flot.pie.js"></script>

<script src="<?=base_url();?>assets/vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
<!-- SweetAlert -->
<script src="<?=base_url();?>assets/vendor/sweetalert/sweetalert.min.js"></script>

<!-- Select2 Javascript -->
<script src="<?=base_url();?>assets/vendor/select2/select2.full.min.js"></script>

<!-- Custom Theme JavaScript -->
<!-- <script src="<?=base_url();?>assets/dist/js/sb-admin-2.js"></script> -->
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

<script>
$("#yearselectmonthlyservice").select2({
	placeholder: "Select year"
});
$("#yearselectquarterservice").select2({
	placeholder: "Select year"
});
$("#yearselectsemiservice").select2({
	placeholder: "Select year"
});
$("#ysmonthlyp").select2({
	placeholder: "Select year"
});
$("#ysquarterp").select2({
	placeholder: "Select year"
});
$("#yssemip").select2({
	placeholder: "Select year"
});
$("#ysmonthlyi").select2({
	placeholder: "Select year"
});
$("#ysquarteri").select2({
	placeholder: "Select year"
});
$("#yssemii").select2({
	placeholder: "Select year"
});
$("#ysquarterpie").select2({
	placeholder: "Select year"
});
$("#yssemipie").select2({
	placeholder: "Select year"
});
$("#ysmonthlypie").select2({
	placeholder: "Select year"
});

$("#selectexm").select2({
	placeholder: "Select Expense"
});
$("#selectexq").select2({
	placeholder: "Select Expense"
});
$("#selectexsemi").select2({
	placeholder: "Select Expense"
});
$("#selectexannual").select2({
	placeholder: "Select Expense"
});

$("#ysmonthlyex").select2({
	placeholder: "Select expense first, then year"
});
$("#ysquarterex").select2({
	placeholder: "Select expense first, then year"
});
$("#yssemiex").select2({
	placeholder: "Select expense first, then year"
});

</script>

<!-- Services -->
<script>
//Datas
	var dmonthly = {
		labels: [],
		series: [[]]
	};
  var dquarter = {
    labels: [],
    series: [[]]
  };
	var dsemi = {
		labels: [],
		series: [[]]
	};
	//Datas
	//AnualData
	var labelanuals = [];
	var seriesanuals = [];
	<?php foreach($serviceyears as $sy): ?>
	labelanuals.push('<?=$sy->Annual?>');
	seriesanuals.push(<?=$sy->counted?>);
	<?php endforeach?>
	var danual = {
		labels: labelanuals,
		series: [seriesanuals]
	};
	var options = {
		seriesBarDistance: 10,
		reverseData: true,
		horizontalBars: true,
		axisY: {
			offset: 70
		},
		width:600,
		height:300
	}

	var bcmonthlyservices = new Chartist.Bar('#monthlyservices', dmonthly, options);
  var bcquarterservices = new Chartist.Bar('#quarterservices', dquarter, options);
  var bcsemiservices = new Chartist.Bar('#semiservices', dsemi, options);
  var bcanualservices = new Chartist.Bar('#anualservices', danual, options);
</script>

<script>
	$('#yearselectmonthlyservice').change(function() {
		var year = this.value;
		var seriesdata = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
		//alert(id);
		$.ajax({
			type: 'POST',
			url: '<?=base_url();?>Accountant/MonthlyService',
			data: {
				'year': year
			},
			success: function(data) {
				var data1 = JSON.parse(data);
				$.each(data1, function(index, value) {
					seriesdata.splice(data1[index].month - 1, 1, data1[index].counted);
				});

				//New chart
				var data = {
					labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
					series: [
						seriesdata
					]
				};

				var maxValueInArray = Math.max.apply(Math, seriesdata);
				console.log(seriesdata);
				var options = {
					seriesBarDistance: 10,
					reverseData: true,
					horizontalBars: true,
					axisY: {
						offset: 70
					},
					width:600,
					height:300,
					high: maxValueInArray,
					low: 0,
				 scaleMinSpace: 20,
				 onlyInteger: true
				}

				bcmonthlyservices.detach();
				bcmonthlyservices = new Chartist.Bar('#monthlyservices', data, options);
				//Done new chart
			}
		});

	});

	$('#yearselectquarterservice').change(function() {
		var year = this.value;
		var seriesdata = [0, 0, 0, 0];
		//alert(id);
		$.ajax({
			type: 'POST',
			url: '<?=base_url();?>Accountant/QuarterlyService',
			data: {
				'year': year
			},
			success: function(data) {
				var data1 = JSON.parse(data);
				$.each(data1, function(index, value) {
					seriesdata.splice(data1[index].Quarter - 1, 1, data1[index].counted);
				});

				var maxValueInArray = Math.max.apply(Math, seriesdata);
				//New chart
				var data = {
					labels: ['Q1', 'Q2', 'Q3', 'Q4'],
					series: [
						seriesdata
					]
				};
				var options = {
					seriesBarDistance: 10,
					reverseData: true,
					horizontalBars: true,
					axisY: {
						offset: 70
					},
					width: 600,
			 		height: 300,
					high: maxValueInArray,
					low: 0,
				 scaleMinSpace: 20,
				 onlyInteger: true
				}

				bcquarterservices.detach();
				bcquarterservices = new Chartist.Bar('#quarterservices', data, options);
				//Done new chart
			}
		});

	});

	$('#yearselectsemiservice').change(function() {
		var year = this.value;
		var seriesdata = [0, 0];
		//alert(id);
		$.ajax({
			type: 'POST',
			url: '<?=base_url();?>Accountant/SemiService',
			data: {
				'year': year
			},
			success: function(data) {
				var data1 = JSON.parse(data);
				$.each(data1, function(index, value) {
					seriesdata.splice(data1[index].Semi - 1, 1, data1[index].counted);
				});

				var maxValueInArray = Math.max.apply(Math, seriesdata);
				//New chart
				var data = {
					labels: ['Jan - June', 'Jul - Dec'],
					series: [
						seriesdata
					]
				};
				var options = {
					seriesBarDistance: 10,
					reverseData: true,
					horizontalBars: true,
					axisY: {
						offset: 70
					},
					width: 600,
			 		height: 300,
					high: maxValueInArray,
					low: 0,
				 scaleMinSpace: 20,
				 onlyInteger: true
				}

				bcsemiservices.detach();
				bcsemiservices = new Chartist.Bar('#semiservices', data, options);
				//Done new chart
			}
		});

	});
</script>
<!-- Services -->

<!-- Purchase -->
<script>
//Datas
	var dmonthly = {
		labels: [],
		series: [[]]
	};
  var dquarter = {
    labels: [],
    series: [[]]
  };
	var dsemi = {
		labels: [],
		series: [[]]
	};
	//Datas
	//AnualData
	var labelanuals = [];
	var seriesanuals = [];
	<?php foreach($purchaseyears as $sy): ?>
	labelanuals.push(<?=$sy->Annual?>);
	seriesanuals.push(<?=$sy->counted?>);
	<?php endforeach?>
	var danual = {
		labels: labelanuals,
		series: [seriesanuals]
	};
	var options = {
		seriesBarDistance: 10,
		reverseData: true,
		horizontalBars: true,
		axisY: {
			offset: 70
		},
		width: 600,
 		height: 300,
		low: 0,
	 scaleMinSpace: 20,
	 onlyInteger: true
	}

	var bcmonthlyp = new Chartist.Bar('#monthlypchart', dmonthly, options);
  var bcquarterp = new Chartist.Bar('#quarterpchart', dquarter, options);
  var bcsemip = new Chartist.Bar('#semipchart', dsemi, options);
  var bcanualp = new Chartist.Bar('#anualpchart', danual, options);
</script>

<script>
	$('#ysmonthlyp').change(function() {
		var year = this.value;
		var seriesdata = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
		//alert(id);
		$.ajax({
			type: 'POST',
			url: '<?=base_url();?>Accountant/MonthlyPurchase',
			data: {
				'year': year
			},
			success: function(data) {
				var data1 = JSON.parse(data);
				$.each(data1, function(index, value) {
					seriesdata.splice(data1[index].month - 1, 1, data1[index].counted);
				});

				//New chart
				var data = {
					labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
					series: [
						seriesdata
					]
				};
				var maxValueInArray = Math.max.apply(Math, seriesdata);
				var options = {
					seriesBarDistance: 10,
					reverseData: true,
					horizontalBars: true,
					axisY: {
						offset: 70
					},
					width: 600,
			 		height: 300,
					high: maxValueInArray,
					low: 0,
				 scaleMinSpace: 20,
				 onlyInteger: true
				}

				bcmonthlyservices.detach();
				bcmonthlyservices = new Chartist.Bar('#monthlypchart', data, options);
				//Done new chart
			}
		});

	});

	$('#ysquarterp').change(function() {
		var year = this.value;
		var seriesdata = [0, 0, 0, 0];
		//alert(id);
		$.ajax({
			type: 'POST',
			url: '<?=base_url();?>Accountant/QuarterlyPurchase',
			data: {
				'year': year
			},
			success: function(data) {
				var data1 = JSON.parse(data);
				$.each(data1, function(index, value) {
					seriesdata.splice(data1[index].Quarter - 1, 1, data1[index].counted);
				});

				//New chart
				var data = {
					labels: ['Q1', 'Q2', 'Q3', 'Q4'],
					series: [
						seriesdata
					]
				};
				var maxValueInArray = Math.max.apply(Math, seriesdata);
				var options = {
					seriesBarDistance: 10,
					reverseData: true,
					horizontalBars: true,
					axisY: {
						offset: 70
					},
					width: 600,
			 		height: 300,
					high: maxValueInArray,
					low: 0,
				 scaleMinSpace: 20,
				 onlyInteger: true
				}

				bcquarterservices.detach();
				bcquarterservices = new Chartist.Bar('#quarterpchart', data, options);
				//Done new chart
			}
		});

	});

	$('#yssemip').change(function() {
		var year = this.value;
		var seriesdata = [0, 0];
		//alert(id);
		$.ajax({
			type: 'POST',
			url: '<?=base_url();?>Accountant/SemiPurchase',
			data: {
				'year': year
			},
			success: function(data) {
				var data1 = JSON.parse(data);
				console.log(data1);
				$.each(data1, function(index, value) {
					seriesdata.splice(data1[index].Semi, 1, data1[index].counted);
				});

				//New chart
				var data = {
					labels: ['Jan - June', 'Jul - Dec'],
					series: [
						seriesdata
					]
				};
				var maxValueInArray = Math.max.apply(Math, seriesdata);
				var options = {
					seriesBarDistance: 10,
					reverseData: true,
					horizontalBars: true,
					axisY: {
						offset: 70
					},
					width: 600,
			 		height: 300,
					high: maxValueInArray,
					low: 0,
				 scaleMinSpace: 20,
				 onlyInteger: true
				}

				bcsemiservices.detach();
				bcsemiservices = new Chartist.Bar('#semipchart', data, options);
				//Done new chart
			}
		});

	});
</script>
<!-- Purchase -->

<!-- Expenses -->
<script>
//Datas
	var dmonthly = {
		labels: [],
		series: [[]]
	};
  var dquarter = {
    labels: [],
    series: [[]]
  };
	var dsemi = {
		labels: [],
		series: [[]]
	};
	//Datas
	//AnualData

	var danual = {
		labels: [],
		series: [[]]
	};
	var options = {
		seriesBarDistance: 10,
		reverseData: true,
		horizontalBars: true,
		axisY: {
			offset: 70
		},
		width: 600,
 		height: 300,
		high: 5,
		low: 0,
	 scaleMinSpace: 20,
	 onlyInteger: true
	}

	var bcmonthlyex = new Chartist.Bar('#monthlyexchart', dmonthly, options);
  var bcquarterex = new Chartist.Bar('#quarterexchart', dquarter, options);
  var bcsemiex = new Chartist.Bar('#semiexchart', dsemi, options);
  var bcanualex = new Chartist.Bar('#anualexchart', danual, options);
</script>

<script>
$('#selectexm').change(function() {
	var table = this.value;
	$('#ysmonthlyex').empty();
	$.ajax({
		type: 'POST',
		url: '<?=base_url();?>Accountant/YearExpense',
		data: {
			'table': table
		},
		success: function(data) {
			var data1 = JSON.parse(data);
			$('#ysmonthlyex').append('<option value="">'+'</option>');
			$.each(data1, function(index, value) {
				$("#ysmonthlyex").attr("disabled", false);
				$('#ysmonthlyex').append('<option value="' + data1[index].Annual + '">' + data1[index].Annual + '</option>');
			});
		}
	});

});

$('#ysmonthlyex').change(function() {
	var table = $("#selectexm").val();
	var year = this.value;
	var seriesdata = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
	//alert(id);
	$.ajax({
		type: 'POST',
		url: '<?=base_url();?>Accountant/MonthlyExpense',
		data: {
			'year': year,
			'table': table
		},
		success: function(data) {
			var data1 = JSON.parse(data);
			$.each(data1, function(index, value) {
				seriesdata.splice(data1[index].month - 1, 1, data1[index].counted);
			});
			console.log(seriesdata);
			//New chart
			var data = {
				labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
				series: [
					seriesdata
				]
			};
			var maxValueInArray = Math.max.apply(Math, seriesdata);
			var options = {
				seriesBarDistance: 10,
				reverseData: true,
				horizontalBars: true,
				axisY: {
					offset: 70
				},
				width: 600,
				height: 300,
				high: maxValueInArray,
				low: 0,
			 scaleMinSpace: 20,
			 onlyInteger: true
			}

			bcmonthlyex.detach();
			bcmonthlyex = new Chartist.Bar('#monthlyexchart', data, options);
			//Done new chart
		}
	});

});

//Quarter
$('#selectexq').change(function() {
	var table = this.value;
	$('#ysquarterex').empty();
	$.ajax({
		type: 'POST',
		url: '<?=base_url();?>Accountant/YearExpense',
		data: {
			'table': table
		},
		success: function(data) {
			var data1 = JSON.parse(data);
			$('#ysquarterex').append('<option value="">'+'</option>');
			$.each(data1, function(index, value) {
				$("#ysquarterex").attr("disabled", false);
				$('#ysquarterex').append('<option value="' + data1[index].Annual + '">' + data1[index].Annual + '</option>');
			});
		}
	});

});

$('#ysquarterex').change(function() {
	var year = this.value;
	var table = $("#selectexq").val();
	var seriesdata = [0, 0, 0, 0];
	//alert(id);
	$.ajax({
		type: 'POST',
		url: '<?=base_url();?>Accountant/QuarterlyExpense',
		data: {
			'year': year,
			'table':table
		},
		success: function(data) {
			var data1 = JSON.parse(data);
			$.each(data1, function(index, value) {
				seriesdata.splice(data1[index].Quarter - 1, 1, data1[index].counted);
			});

			//New chart
			var data = {
				labels: ['Q1', 'Q2', 'Q3', 'Q4'],
				series: [
					seriesdata
				]
			};
			var maxValueInArray = Math.max.apply(Math, seriesdata);
			var options = {
				seriesBarDistance: 10,
				reverseData: true,
				horizontalBars: true,
				axisY: {
					offset: 70
				},
				width: 600,
				height: 300,
				high: maxValueInArray,
				low: 0,
			 scaleMinSpace: 20,
			 onlyInteger: true
			}

			bcquarterex.detach();
			bcquarterex = new Chartist.Bar('#quarterexchart', data, options);
			//Done new chart
		}
	});

});

//Semi
$('#selectexsemi').change(function() {
	var table = this.value;
	$('#yssemiex').empty();
	$.ajax({
		type: 'POST',
		url: '<?=base_url();?>Accountant/YearExpense',
		data: {
			'table': table
		},
		success: function(data) {
			var data1 = JSON.parse(data);
			$('#yssemiex').append('<option value="">'+'</option>');
			$.each(data1, function(index, value) {
				$("#yssemiex").attr("disabled", false);
				$('#yssemiex').append('<option value="' + data1[index].Annual + '">' + data1[index].Annual + '</option>');
			});
		}
	});
});

$('#yssemiex').change(function() {
	var year = this.value;
	var table = $("#selectexsemi").val();
	var seriesdata = [0, 0];
	//alert(id);
	$.ajax({
		type: 'POST',
		url: '<?=base_url();?>Accountant/SemiExpense',
		data: {
			'year': year,
			'table': table
		},
		success: function(data) {
			var data1 = JSON.parse(data);
			$.each(data1, function(index, value) {
				seriesdata.splice(data1[index].Semi, 1, data1[index].counted);
			});

			//New chart
			var data = {
				labels: ['Jan - June', 'Jul - Dec'],
				series: [
					seriesdata
				]
			};
			var maxValueInArray = Math.max.apply(Math, seriesdata);
			var options = {
				seriesBarDistance: 10,
				reverseData: true,
				horizontalBars: true,
				axisY: {
					offset: 70
				},
				width: 600,
				height: 300,
				high: maxValueInArray,
				low: 0,
			 scaleMinSpace: 20,
			 onlyInteger: true
			}

			bcsemiex.detach();
			bcsemiex = new Chartist.Bar('#semiexchart', data, options);
			//Done new chart
		}
	});

});

$('#selectexannual').change(function() {
	var table = this.value;
	$.ajax({
		type: 'POST',
		url: '<?=base_url();?>Accountant/AnnualExpense',
		data: {
			'table': table
		},
		success: function(data) {
			var data1 = JSON.parse(data);
			var labelanuals = [];
			var seriesanuals = [];
			$.each(data1, function(index, value) {
				labelanuals.push(data1[index].Annual);
				seriesanuals.push(data1[index].counted);
			});
			var danual = {
				labels: labelanuals,
				series: [seriesanuals]
			};

			var maxValueInArray = Math.max.apply(Math, seriesanuals);
			var options = {
				seriesBarDistance: 10,
				reverseData: true,
				horizontalBars: true,
				axisY: {
					offset: 70
				},
				width: 600,
				height: 300,
				high: maxValueInArray,
				low: 0,
			 scaleMinSpace: 20,
			 onlyInteger: true
			}

			bcanualex.detach();
			bcanualex = new Chartist.Bar('#anualexchart', danual, options);
			//Done new chart
		}
	});

});
</script>

<!-- Inventory -->
<script>
//Datas
	var dmonthly = {
		labels: [],
		series: [[]]
	};
  var dquarter = {
    labels: [],
    series: [[]]
  };
	var dsemi = {
		labels: [],
		series: [[]]
	};
	//Datas
	//AnualData
	var labelanuals = [];
	var seriesanuals = [];
	<?php foreach($inventoryyears as $sy): ?>
	labelanuals.push(<?=$sy->year?>);
	seriesanuals.push(<?=$sy->Quantity?>);
	<?php endforeach?>
	var danual = {
		labels: labelanuals,
		series: [seriesanuals]
	};
	var options = {
		seriesBarDistance: 10,
		reverseData: true,
		horizontalBars: true,
		axisY: {
			offset: 70
		},
		width: 600,
 		height: 300,
		low: 0,
	 scaleMinSpace: 20,
	 onlyInteger: true
	}

	var bcmonthlyi = new Chartist.Bar('#monthlyichart', dmonthly, options);
  var bcquarteri = new Chartist.Bar('#quarterichart', dquarter, options);
  var bcsemii = new Chartist.Bar('#semiichart', dsemi, options);
  var bcanuali = new Chartist.Bar('#anualichart', danual, options);
</script>
<script>
$('#ysmonthlyi').change(function() {
	var year = this.value;
	var seriesdata = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
	//alert(id);
	$.ajax({
		type: 'POST',
		url: '<?=base_url();?>Accountant/MonthlyInventory',
		data: {
			'year': year
		},
		success: function(data) {
			var data1 = JSON.parse(data);
			$.each(data1, function(index, value) {
				seriesdata.splice(data1[index].month - 1, 1, data1[index].Quantity);
			});

			//New chart
			var data = {
				labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
				series: [
					seriesdata
				]
			};
			console.log(seriesdata);
			var maxValueInArray = Math.max.apply(Math, seriesdata);
			var options = {
				seriesBarDistance: 10,
				reverseData: true,
				horizontalBars: true,
				axisY: {
					offset: 70
				},
				width: 600,
				height: 300,
				high: maxValueInArray,
				low: 0,
			 scaleMinSpace: 20,
			 onlyInteger: true
			}
			bcmonthlyi.detach();
			bcmonthlyi = new Chartist.Bar('#monthlyichart', data, options);
			//Done new chart
		}
	});

});

$('#ysquarteri').change(function() {
	var year = this.value;
	var seriesdata = [0, 0, 0, 0];
	//alert(id);
	$.ajax({
		type: 'POST',
		url: '<?=base_url();?>Accountant/QuarterlyInventory',
		data: {
			'year': year
		},
		success: function(data) {
			var data1 = JSON.parse(data);
			$.each(data1, function(index, value) {
				seriesdata.splice(data1[index].month - 1, 1, data1[index].Quantity);

			});
			//New chart
			var data = {
				labels: ['Q1', 'Q2', 'Q3', 'Q4'],
				series: [
					seriesdata
				]
			};
			var maxValueInArray = Math.max.apply(Math, seriesdata);
			var options = {
				seriesBarDistance: 10,
				reverseData: true,
				horizontalBars: true,
				axisY: {
					offset: 70
				},
				width: 600,
				height: 300,
				high: maxValueInArray,
				low: 0,
			 scaleMinSpace: 20,
			 onlyInteger: true
			}

			bcquarteri.detach();
			bcquarteri = new Chartist.Bar('#quarterichart', data, options);
			//Done new chart
		}
	});

});

$('#yssemii').change(function() {
	var year = this.value;
	var seriesdata = [0, 0];
	//alert(id);
	$.ajax({
		type: 'POST',
		url: '<?=base_url();?>Accountant/SemiInventory',
		data: {
			'year': year
		},
		success: function(data) {
			var data1 = JSON.parse(data);
			$.each(data1, function(index, value) {
				seriesdata.splice(data1[index].month, 1, data1[index].Quantity);
			});

			//New chart
			var data = {
				labels: ['Jan - June', 'Jul - Dec'],
				series: [
					seriesdata
				]
			};
			var maxValueInArray = Math.max.apply(Math, seriesdata);
			var options = {
				seriesBarDistance: 10,
				reverseData: true,
				horizontalBars: true,
				axisY: {
					offset: 70
				},
				width: 600,
				height: 300,
				high: maxValueInArray,
				low: 0,
			 scaleMinSpace: 20,
			 onlyInteger: true
			}

			bcsemii.detach();
			bcsemii = new Chartist.Bar('#semiichart', data, options);
			//Done new chart
		}
	});

});
</script>
<!--Inventory-->

<!-- pie chart revenue -->
<script>
var dmonthly = {
	labels: [],
	series: [[]]
};
var dsemi = {
	labels: [],
	series: [[]]
};
//Datas
//AnualData
var labelanuals = [];
var seriesanuals = [];
<?php foreach($yearlyrevenue as $sy): ?>
labelanuals.push('<?=$sy->Annual?>');
seriesanuals.push(<?=$sy->counted?>);
<?php endforeach?>
var danual = {
	labels: labelanuals,
	series: [seriesanuals]
};
var options = {
	seriesBarDistance: 10,
	reverseData: true,
	horizontalBars: true,
	axisY: {
		offset: 70
	},
	width: 600,
	height: 300
}
console.log(seriesanuals);

var maxValueInArray = Math.max.apply(Math, seriesanuals);
var optionsa = {
	seriesBarDistance: 10,
	reverseData: true,
	horizontalBars: true,
	axisY: {
		offset: 70
	},
	width: 600,
	height: 300,
	high: maxValueInArray,
	low: 0,
 scaleMinSpace: 20,
 onlyInteger: true
}
var bcmonthlypie = new Chartist.Bar('#monthlypiechart', dmonthly, options);
var bcanualpie = new Chartist.Bar('#anualpiechart', danual, options);
</script>
<script>
$('#ysmonthlypie').change(function() {
	var year = this.value;
	var seriesdata = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
	//alert(id);
	$.ajax({
		type: 'POST',
		url: '<?=base_url();?>Accountant/MonthlyRevenue',
		data: {
			'year': year
		},
		success: function(data) {
			var data1 = JSON.parse(data);
			$.each(data1, function(index, value) {
				seriesdata.splice(data1[index].month - 1, 1, data1[index].total);
			});

			//New chart
			var data = {
				labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
				series: [
					seriesdata
				]
			};
			console.log(seriesdata);
			var maxValueInArray = Math.max.apply(Math, seriesdata);
			var options = {
				seriesBarDistance: 10,
				reverseData: true,
				horizontalBars: true,
				axisY: {
					offset: 70
				},
				width: 600,
				height: 300,
				high: maxValueInArray,
				low: 0,
			 scaleMinSpace: 20,
			 onlyInteger: true
			}
			bcmonthlypie.detach();
			bcmonthlypie = new Chartist.Bar('#monthlypiechart', data, options);
			//Done new chart
		}
	});

});
</script>
<script>
var data = {
  series: [1,1,1]
};

var sum = function(a, b) { return a + b };

var quarterpiechart = new Chartist.Pie('#quarterpiechart', data, {
  labelInterpolationFnc: function(value) {
    return Math.round(value / data.series.reduce(sum) * 100) + '%';
  },width: 600,height: 300
});
//Anual
var data = {
  series: [1,1,1]
};

var sum = function(a, b) { return a + b };

var semipiechart = new Chartist.Pie('#semipiechart', data, {
  labelInterpolationFnc: function(value) {
    return Math.round(value / data.series.reduce(sum) * 100) + '%';
  },width:600,height: 300
});
</script>

<script>
$('#ysquarterpie').change(function() {
		var year = this.value;
		var seriesdata = [];
		var labeldata = [];
		var newdata = [];
		//alert(id);
		$.ajax({
			type: 'POST',
			url: '<?=base_url();?>Accountant/QuarterlyRevenue',
			data: {
				'year': year
			},
			success: function(data) {
				var data1 = JSON.parse(data);
				$.each(data1, function(index, value) {
					seriesdata.push(data1[index].sum);
					labeldata.push('Quarter '+data1[index].Quarter+":"+data1[index].sum);
				});
				console.log(labeldata);
				var data = {
					labels: labeldata,
				  series: seriesdata
				};
				var options = {
				  labelInterpolationFnc: function(value) {
				    return value[0]
				  },width:600,height: 300

				};
				var responsiveOptions = [
				  ['screen and (min-width: 640px)', {
				    chartPadding: 30,
				    labelOffset: 100,
				    labelDirection: 'explode',
				    labelInterpolationFnc: function(value) {
				      return value;
				    }
				  }],
				  ['screen and (min-width: 1024px)', {
				    labelOffset: 80,
				    chartPadding: 20
				  }]
				];
				console.log(data);
				var sum = function(a, b) { return a + b };
				quarterpiechart.detach();
				quarterpiechart = new Chartist.Pie('#quarterpiechart', data, options, responsiveOptions);
			}
		});
});

$('#yssemipie').change(function() {
		var year = this.value;
		var seriesdata = [];
		var labeldata = [];
		var newdata = [];
		//alert(id);
		$.ajax({
			type: 'POST',
			url: '<?=base_url();?>Accountant/SemiRevenue',
			data: {
				'year': year
			},
			success: function(data) {
				var data1 = JSON.parse(data);
				$.each(data1, function(index, value) {
					seriesdata.push(data1[index].sum);
					var quarter = parseInt(data1[index].Semi);
					var final = quarter+1;
					labeldata.push('Quarter '+final+":"+data1[index].sum);
				});
				var data = {
					labels: labeldata,
				  series: seriesdata
				};
				var options = {
				  labelInterpolationFnc: function(value) {
				    return value[0]
				  },width:600,height: 300
				};
				var responsiveOptions = [
				  ['screen and (min-width: 640px)', {
				    chartPadding: 30,
				    labelOffset: 100,
				    labelDirection: 'explode',
				    labelInterpolationFnc: function(value) {
				      return value;
				    }
				  }],
				  ['screen and (min-width: 1024px)', {
				    labelOffset: 80,
				    chartPadding: 20
				  }]
				];
				semipiechart.detach();
				semipiechart = new Chartist.Pie('#semipiechart', data, options, responsiveOptions);

			}
		});
});
</script>
<!-- pie chart -->

</body>

</html>
