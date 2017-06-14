<section class="sec-content">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Purchase Order/Invoice</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
    <div class="col-lg-12">
     <div class="panel panel-default">
         <div class="panel-heading">
             Process purchase order
         </div>
         <div class="panel-body">
             <div class="row">
                 <div class="col-lg-12">
                         <div class="form-group">
                          <label>Supplier</label>
                          <?php foreach($supplier as $s): ?>
                           <p class="help-block" id="sname">Supplier name:<?=$s->SupplierName?></p>
                           <p class="help-block" id="saddress">Supplier Address:<?=$s->Address?>,<?=$s->City?>,<?=$s->Region?>,<?=$s->PostalCode?></p>
                           <p class="help-block" id="snum">Supplier #:<?=$s->Phone?></p>
                          <?php endforeach;?>
                         </div>
                           <?php $forlabel = 1; ?>
                           <?php foreach($purchaseorder as $p): ?>
                               <?php $status = $p->Status; ?>
                           <div class="row" id="itemsrow">
                             <div class="form-group col-lg-3">
                               <?php if($forlabel == 1): ?>
                               <label>Item</label>
                                <?php endif;?>
                               <input class="form-control" value="<?=$p->ItemName?>" readonly>
                             </div>
                             <div class="form-group col-lg-3">
                               <?php if($forlabel == 1): ?>
                               <label>Quantity</label>
                               <?php endif;?>
                               <input class="form-control" value="<?=$p->Quantity?>" readonly>
                             </div>
                             <div class="form-group col-lg-3">
                               <?php if($forlabel == 1): ?>
                               <label>Unit price</label>
                               <?php endif;?>
                               <input class="form-control" value="<?=$p->UnitPrice?>" readonly>
                             </div>
                             <?php $total = $p->Quantity * $p->UnitPrice ?>
                             <div class="form-group col-lg-3">
                               <?php if($forlabel == 1): ?>
                               <label>Total</label>
                               <?php endif;?>
                               <input class="form-control" value="<?=$total?>" readonly>
                             </div>
                           </div>
                           <?php $forlabel++; ?>
                         <?php endforeach; ?>
                         <div align="center">
                             <?php if($status == 1): ?>
                             <?php else: ?>
                               <button type="button" class="btn btn-danger rejectbutton" id="<?=$POID?>">Reject</button>
                               <button type="button" class="btn btn-success acceptbutton" id="<?=$POID?>">Accept</button>
                             <?php endif; ?>
                         </div>
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


<!-- SweetAlert -->
<script src="<?=base_url();?>assets/vendor/sweetalert/sweetalert.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?=base_url();?>assets/dist/js/sb-admin-2.js"></script>

<script>
$(document).ready(function() {
    $('.acceptbutton').click(function() {
        var id = $(this).attr("id");
        swal({
                title: "Are you sure?",
                text: "Accept this Purchase Order?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#5cb85c",
                confirmButtonText: "Yes!",
                closeOnConfirm: false,
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo base_url();?>Admin/accept_one_purchase_order/",
                        data: {
                          purchaseorderid: id
                        },
                        success: function(data) {
                          swal({
                            title: "Accepted!",
                            text: "Purchase order accepted!! Refreshing page...",
                            type: "success",
                            showCancelButton: false,
                            showConfirmButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, delete it!",
                            closeOnConfirm: false
                          });
                            setTimeout(function() {
                                window.location.replace("<?=base_url().'Admin/view_purchase_orders'?>");
                            }, 2000);

                        }
                    });
                } else {}
            });
    });
});
</script>

<script>
$(document).ready(function() {
    $('.rejectbutton').click(function() {
        var id = $(this).attr("id");
        swal({
                title: "Are you sure?",
                text: "Reject this Purchase Order?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d9534f",
                confirmButtonText: "Yes!",
                closeOnConfirm: false,
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo base_url();?>Admin/reject_one_purchase_order/",
                        data: {
                          purchaseorderid: id
                        },
                        success: function(data) {
                          swal({
                            title: "Rejected!",
                            text: "Purchase order Rejected!! Refreshing page...",
                            type: "error",
                            showCancelButton: false,
                            showConfirmButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, delete it!",
                            closeOnConfirm: false
                          });
                            setTimeout(function() {
                                window.location.replace("<?=base_url().'Admin/view_purchase_orders'?>");
                            }, 2000);

                        }
                    });
                } else {}
            });
    });
});
</script>


</body>

</html>
