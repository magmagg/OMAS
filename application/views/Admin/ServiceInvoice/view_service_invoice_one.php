<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Service Invoice</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
    <div class="col-lg-12">
     <div class="panel panel-default">
         <div class="panel-heading">
             View service invoice
         </div>
         <div class="panel-body">
             <div class="row">
                 <div class="col-lg-12">
                    <form role="form" method="POST" action="<?=base_url().'Accountant/submit_make_purchase_order'?>">
                         <div class="form-group">
                          <label>Customer</label>
                          <?php foreach($customer as $c): ?>
                           <p class="help-block" id="cname">Customer name:<?=$c->CustomerName?></p>
                           <p class="help-block" id="caddress">Customer Address:<?=$c->Address?></p>
                           <p class="help-block" id="cnum">Customer #:<?=$c->Phone?></p>
                          <?php endforeach;?>
                         </div>
                         <div id="append">
                           <?php $forlabel = 1; ?>
                           <?php foreach($items as $s): ?>
                           <div class="row" id="itemsrow">
                             <div class="form-group col-lg-3">
                               <?php if($forlabel == 1): ?>
                               <label>Item</label>
                                <?php endif;?>
                               <input class="form-control" value="<?=$s['ItemName']?>" readonly>
                             </div>
                             <div class="form-group col-lg-3">
                               <?php if($forlabel == 1): ?>
                               <label>Quantity</label>
                               <?php endif;?>
                               <input class="form-control" value="<?=$s['Quantity']?>" readonly>

                             </div>
                             <div class="form-group col-lg-3">
                               <?php if($forlabel == 1): ?>
                               <label>Unit price</label>
                               <?php endif;?>
                               <input class="form-control" value="<?=$s['UnitPrice']?>" readonly>
                             </div>
                             <?php $total = $s['Quantity'] * $s['UnitPrice'] ?>
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
                           <button type="button" class="btn btn-danger rejectbutton" id="<?=$SOID?>">Reject</button>
                           <button type="button" class="btn btn-success acceptbutton" id="<?=$SOID?>">Accept</button>
                         </div>
                          </div>
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
</div>
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
                text: "Accept this Service Invoice?",
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
                        url: "<?php echo base_url();?>Admin/accept_one_service_invoice/",
                        data: {
                          serviceinvoiceid: id
                        },
                        success: function(data) {
                          swal({
                            title: "Accepted!",
                            text: "Service Invoice accepted!! Refreshing page...",
                            type: "success",
                            showCancelButton: false,
                            showConfirmButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, delete it!",
                            closeOnConfirm: false
                          });
                            setTimeout(function() {
                                window.location.replace("<?=base_url().'Admin/view_service_invoices'?>");
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
                text: "Reject this Service Invoice?",
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
                        url: "<?php echo base_url();?>Admin/reject_one_service_invoice/",
                        data: {
                          serviceinvoiceid: id
                        },
                        success: function(data) {
                          swal({
                            title: "Rejected!",
                            text: "Service Invoice Rejected!! Refreshing page...",
                            type: "error",
                            showCancelButton: false,
                            showConfirmButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, delete it!",
                            closeOnConfirm: false
                          });
                            setTimeout(function() {
                                window.location.replace("<?=base_url().'Admin/view_service_invoices'?>");
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
