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
					View service invoice
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

            <div class="tab-pane fade" id="quarter">
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

						<div class="tab-pane fade" id="semianual">
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
					Purchase
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
						View service invoice
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

							<div class="tab-pane fade" id="quarter">
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

							<div class="tab-pane fade" id="semianual">
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
						Purchase
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

		<!-- LAST ROW -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Purchase
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
									 </select>
								</div>
								<div class="ct-chart ct-golden-section" id="monthlyexchart"></div>
							</div>

							<div class="tab-pane fade" id="quarterex">
								<div class="form-group">
									<select id="selectexq" name="table" style="width:100%">
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
									 </select>
								</div>
								<div class="ct-chart ct-golden-section" id="quarterexchart"></div>
							</div>

							<div class="tab-pane fade" id="semianualex">
								<div class="form-group">
									<select id="selectexsemi" name="table" style="width:100%">
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
									 </select>
								</div>
								<div class="ct-chart ct-golden-section" id="semiexchart"></div>
							</div>

							<div class="tab-pane fade" id="anualp">
								<div class="form-group">
									<select id="selectexsemi" name="table" style="width:100%">
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


<!-- SweetAlert -->
<script src="<?=base_url();?>assets/vendor/sweetalert/sweetalert.min.js"></script>

<!-- Select2 Javascript -->
<script src="<?=base_url();?>assets/vendor/select2/select2.full.min.js"></script>

<!-- Custom Theme JavaScript -->
<!-- <script src="<?=base_url();?>assets/dist/js/sb-admin-2.js"></script> -->

<script>
	$("#yearselectmonthlyservice").select2({
		placeholder: "Select a supplier"
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
		labels: [labelanuals],
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
			 		height: 300
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
			 		height: 300
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
	<?php foreach($serviceyears as $sy): ?>
	labelanuals.push('<?=$sy->Annual?>');
	seriesanuals.push(<?=$sy->counted?>);
	<?php endforeach?>
	var danual = {
		labels: [labelanuals],
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
				$.each(data1, function(index, value) {
					seriesdata.splice(data1[index].Semi - 1, 1, data1[index].counted);
				});

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
			 		height: 300
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
	var labelanuals = [];
	var seriesanuals = [];
	<?php foreach($serviceyears as $sy): ?>
	labelanuals.push('<?=$sy->Annual?>');
	seriesanuals.push(<?=$sy->counted?>);
	<?php endforeach?>
	var danual = {
		labels: [labelanuals],
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

	var bcmonthlyex = new Chartist.Bar('#monthlyexchart', dmonthly, options);
  var bcquarterex = new Chartist.Bar('#quarterexchart', dquarter, options);
  var bcsemiex = new Chartist.Bar('#semiexchart', dsemi, options);
  var bcanualex = new Chartist.Bar('#anualexchart', danual, options);
</script>

<script>
$('#selectexm').change(function() {
	var table = this.value;
	$("#ysmonthex").html('');
	$.ajax({
		type: 'POST',
		url: '<?=base_url();?>Accountant/YearExpense',
		data: {
			'table': table
		},
		success: function(data) {
			var data1 = JSON.parse(data);
			$.each(data1, function(index, value) {
				$("#ysmonthlyex").attr("disabled", false);
				$('#ysmonthlyex').append('<option value="">'+'</option>');
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

			bcmonthlyex.detach();
			bcmonthlyex = new Chartist.Bar('#monthlyexchart', data, options);
			//Done new chart
		}
	});

});

//Quarter
$('#selectexq').change(function() {
	var table = this.value;
	$("#ysquarterex").html('');
	$.ajax({
		type: 'POST',
		url: '<?=base_url();?>Accountant/YearExpense',
		data: {
			'table': table
		},
		success: function(data) {
			var data1 = JSON.parse(data);
			$.each(data1, function(index, value) {
				$("#ysquarterex").attr("disabled", false);
				$('#ysquarterex').append('<option value="">'+'</option>');
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

			bcquarterex.detach();
			bcquarterex = new Chartist.Bar('#quarterexchart', data, options);
			//Done new chart
		}
	});

});

//Semi
$('#selectexsemi').change(function() {
	var table = this.value;
	$("#yssemiex").html('');
	$.ajax({
		type: 'POST',
		url: '<?=base_url();?>Accountant/YearExpense',
		data: {
			'table': table
		},
		success: function(data) {
			var data1 = JSON.parse(data);
			$.each(data1, function(index, value) {
				$("#yssemiex").attr("disabled", false);
				$('#yssemiex').append('<option value="">'+'</option>');
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
				seriesdata.splice(data1[index].Semi - 1, 1, data1[index].counted);
			});

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
				onlyInteger: true
			}

			bcsemiex.detach();
			bcsemiex = new Chartist.Bar('#semiexchart', data, options);
			//Done new chart
		}
	});

});
</script>


</body>

</html>
