<?php foreach($balancer as $b)
{
	$total_assets = $b->total_assets;
	$total_liabilities = $b->total_liabilities;
	$total_equity = $b->total_equity;
}
?>
<section class="sec-content">
	 <div class="row">
			 <div class="col-lg-12">
					 <h1 class="page-header">Balance Sheet</h1>
			 </div>
			 <!-- /.col-lg-12 -->
	 </div>
	 <!-- /.row -->
	 <div class="row">
		 <div class="col-xs-3 col-md-3">
      </div>
      <div class="col-xs-6 col-md-6">
				<table style="width:100%">
			  <tr>
			    <td>Assets</td>
					<td></td>
					<td></td>
					<td></td>
			  </tr>
				<?php foreach($assets as $a): ?>
					<tr>
					<td style="text-indent:50px"><?=$a->asset_name?></td>
					<td></td>
					<td><?=number_format($a->asset_value)?></td>
					<td></td>
				</tr>
				<?php endforeach; ?>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><?=number_format($total_assets)?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Liabilities</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<?php foreach($liabilities as $l): ?>
					<tr>
					<td style="text-indent:50px"><?=$l->liability_name?></td>
					<td></td>
					<td><?=number_format($l->liability_value)?></td>
					<td></td>
				</tr>
				<?php endforeach; ?>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><?=number_format($total_liabilities)?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Owners Equity</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<?php foreach($oequity as $l): ?>
					<tr>
					<td style="text-indent:50px"><?=$l->owner_name?></td>
					<td></td>
					<td><?=number_format($l->owner_value)?></td>
					<td></td>
				</tr>
				<?php endforeach; ?>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><?=number_format($total_equity)?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Total liabilities</td>
					<td></td>
					<td><?=number_format($total_liabilities)?></td>
					<td></td>
				</tr>
				<tr>
					<td>Total Owners Equity</td>
					<td></td>
					<td><?=number_format($total_equity)?></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><?=number_format($total_equity+$total_liabilities)?></td>
				</tr>
				<tr>
					<td>Total Assets</td>
					<td></td>
					<td><?=number_format($total_assets)?></td>
					<td></td>
				</tr>
				<tr>
					<td>Liabilities + Owners Equity</td>
					<td></td>
					<td><?=number_format($total_equity+$total_liabilities)?></td>
					<td></td>
				</tr>

				<?php $total = $total_equity + $total_liabilities; ?>
				<tr>
					<td>Total</td>
					<td></td>
					<td></td>
					<td><?=$total - $total_assets?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<?php if($total == $total_assets):?>
							<td>Balanced</td>
					<?php elseif($total > $total_assets):?>
							<td>Greater liabilities</td>
					<?php elseif($total < $total_assets):?>
							<td>Greater Assets</td>
					<?php endif; ?>
				</tr>
			</table>
      </div>
			<div class="col-xs-3 col-md-3 text-right">

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
