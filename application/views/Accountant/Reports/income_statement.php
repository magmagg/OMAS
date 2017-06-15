<section class="sec-content">
	 <div class="row">
			 <div class="col-lg-12">
					 <h1 class="page-header">Income Statement</h1>
			 </div>
			 <!-- /.col-lg-12 -->
	 </div>
	 <!-- /.row -->
	 <div class="row">
		 <div class="col-xs-2 col-md-2">
      </div>
      <div class="col-xs-8 col-md-8">
				<table style="width:100%">
			  <tr>
					<td colspan="5"><center>Income Statement<center></td>
			  </tr>
			  <tr>
			    <td>Total Revenue</td>
					<td></td>
					<td></td>
					<td></td>
					<td><?php echo number_format($income[0]['Total'])?></td>
			  </tr>
				<tr>
					<td>&nbsp;</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Cost of Services</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td style="text-indent:50px">Begin Inventory</td>
					<td></td>
					<td></td>
					<td><?php echo number_format($begin[0]['Total'])?></td>
					<td></td>
				</tr>
				<tr>
					<td style="text-indent:50px">End Inventory</td>
					<td></td>
					<td></td>
					<td><?php echo '-'.number_format($end[0]['Total'])?></td>
					<td></td>
				</tr>
				<tr>
					<td style="text-indent:50px">Total Cost</td>
					<td></td>
					<td></td>
					<td></td>
					<td>-<?php echo number_format($begin[0]['Total']-$end[0]['Total'])?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><?php echo number_format($income[0]['Total']-($begin[0]['Total']-$end[0]['Total']))?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Expenses</td>
					<td></td>
					<td></td>
					<td></td>
					<td>-<?php echo number_format($totalexpense)?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><?php echo number_format(($income[0]['Total']-($begin[0]['Total']-$end[0]['Total']))-$totalexpense)?></td>
				</tr>
				<?php if($other_income): ?>
					<tr>
						<td>&nbsp;</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Other income</td>
						<td></td>
						<td></td>
						<td></td>
						<td><?php echo number_format($other_income)?></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<?php $nibit = (($income[0]['Total']-($begin[0]['Total']-$end[0]['Total']))-$totalexpense)+$other_income; ?>
					<tr>
						<td>Net income Before Interest & Tax</td>
						<td></td>
						<td></td>
						<td></td>
						<td><?php echo number_format($nibit)?></td>
					</tr>
				<?php else:?>
					<tr>
						<td>Net income Before Interest & Tax</td>
						<td></td>
						<td></td>
						<td></td>
						<td><?php echo number_format(($income[0]['Total']-($begin[0]['Total']-$end[0]['Total']))-$totalexpense)?></td>
					</tr>
				<?php endif;?>

				<tr>
					<td>Interest Expense</td>
					<td></td>
					<td></td>
					<td></td>
					<td>-<?php echo number_format($interest_expense); ?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Net Income Before Tax</td>
					<td></td>
					<td></td>
					<td></td>
					<?php if(isset($nibit)):?>
						<td><?php echo number_format($nibit-$interest_expense)?></td>
					<?php else:?>
						<td><?php echo number_format((($income[0]['Total']-($begin[0]['Total']-$end[0]['Total']))-$totalexpense)-$interest_expense);?></td>
					<?php endif;?>
				</tr>

			</table>
      </div>
			<div class="col-xs-2 col-md-2 text-right">

</div>

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

</body>

</html>
