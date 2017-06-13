<section class="sec-content">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">View Expense</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Expense
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<?php foreach($expense as $e):?>
							<div class="form-group">
								<label>Utility name</label>
								<input class="form-control" value="<?=$e['name']?>" readonly>
							</div>
							<div class="form-group">
								<label>Description</label>
								<input class="form-control" value="<?=$e['desc']?>" readonly>
							</div>
							<div class="form-group">
								<label>Price</label>
								<input class="form-control" value="<?=$e['value']?>" readonly>
							</div>
							<div class="form-group">
								<label>Paid?</label>
								<?php if($e['Status'] == 1):?>
								<input class="form-control" value="Yes" readonly>
								<?php else: ?>
								<input class="form-control" value="No" readonly>
							<?php endif; ?>
							</div>
							<?php if($e['other_doc'] == ''): ?>
							<?php else: ?>
							<div class="form-group">
								<label>File</label>
								<input class="form-control" value="<?=$e['other_doc']?>" readonly>
							</div>
							<?php endif; ?>
							<?php if($table == 'depreciation'):?>
							<div class="form-group" id="fiscalyear">
								<label>Fiscal year</label>
								<input class="form-control" value="<?=$e['fiscal_year']?>" readonly />
							</div>
							<?php else: ?>
							<?php endif; ?>

							<?php if($e['Status'] == 1):?>
							<form role="form" method="POST" action="<?=base_url()?>Accountant/submit_update_expense" enctype="multipart/form-data">
								<input type="hidden" name="id" value="<?=$e[$idname]?>">
								<input type="hidden" name="table" value="<?=$table?>">
								<div class="form-group">
									<div class="checkbox">
										<label>
                         <input type="checkbox" id="filecheckbox" name="filecheckbox" value="1">With file?
                     </label>
									</div>
								</div>
								<div class="form-group" id="fileinput">
									<label>Choose file:</label>
									<input type="file" name="fileinput" id="userfile" />
								</div>
								<button type="submit" id="submitbutton" class="btn btn-default" disabled>Update</button>
							</form>
						<?php else: ?>

							<form role="form" method="POST" action="<?=base_url()?>Accountant/submit_update_expense" enctype="multipart/form-data">
								<input type="hidden" name="id" value="<?=$e[$idname]?>">
								<input type="hidden" name="table" value="<?=$table?>">
								<div class="form-group">
									<div class="checkbox">
										<label>
                         <input type="checkbox" id="filecheckbox" name="filecheckbox" value="1">With file?
                     </label>
									</div>
								</div>
								<div class="form-group" id="fileinput">
									<label>Choose file:</label>
									<input type="file" name="fileinput" id="userfile" />
								</div>
								<div class="form-group" id="checkboxdiv">
										<div class="checkbox">
												<label>
														<input type="checkbox" id="paidcheckbox" name="paidcheckbox" value="1">Paid already?
												</label>
										</div>
								</div>
								<div class="form-group" id="datepaid">
									<label>Date paid</label>
									<input name="expensedatepaid" type="date" id="datepicker">
								</div>
								<button type="submit" id="submitbutton" class="btn btn-default" disabled>Update</button>
							</form>
							<?php endif; ?>
							<?php endforeach; ?>
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

<!-- Custom Theme JavaScript -->
<script src="<?=base_url();?>assets/dist/js/sb-admin-2.js"></script>

<script>
	$(document).ready(function() {
		$('#datepaid').hide();
		$('#paidcheckbox').change(function() {
			if (this.checked) {
				$('#datepaid').show();
				$("#datepicker").prop('required', true);
				$("#submitbutton").prop('disabled', false);
			} else {
				$('#datepaid').hide();
				$("#datepicker").prop('required', false);
			}
		});
	});

	$(document).ready(function() {
		$('#fileinput').hide();
		$('#filecheckbox').change(function() {
			if (this.checked) {
				$('#fileinput').show();
				$("#userfile").prop('required', true);
				$("#submitbutton").prop('disabled', false);
			} else {
				$('#fileinput').hide();
				$("#userfile").prop('required', false);
			}
		});
	});

	$(function(){
	    var dtToday = new Date();

	    var month = dtToday.getMonth() + 1;
	    var day = dtToday.getDate();
	    var year = dtToday.getFullYear();
	    if(month < 10)
	        month = '0' + month.toString();
	    if(day < 10)
	        day = '0' + day.toString();

	    var maxDate = year + '-' + month + '-' + day;
	    $('#datepicker').attr('max', maxDate);
	});
</script>

</body>

</html>
