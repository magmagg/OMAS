<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Purchase orders</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
    <div class="col-lg-12">
        <?=$this->session->flashdata('success'); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                All purchase orders
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Purchase Order ID</th>
                            <th>Supplier</th>
                            <th>Transaction date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $num = 1; ?>
                      <?php foreach($purchaseorders as $p): ?>
                        <tr>
                            <td><?=$num?></td>
                            <td><?=$p->PurchaseID?></td>
                            <td>
                              <?php foreach($suppliers as $s)
                              {
                                if($s->SupplierID == $p->Supplier_SupplierID)
                                {
                                  echo $s->SupplierName;
                                }
                              }
                              ?>
                            </td>
                            <td><?=$p->TransactionDate?></td>
                            <td><?=$p->Status?></td>
                            <td>
                              <a href="<?=base_url().'Accountant/view_one_purchase_order/'.$p->PurchaseID?>"><button type="button" class="btn btn-primary">View</button></a>
                            </td>
                        </tr>
                      <?php $num++; ?>
                      <?php endforeach;?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
  </div>
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

<!-- DataTables JavaScript -->
<script src="<?=base_url();?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- SweetAlert -->
<script src="<?=base_url();?>assets/vendor/sweetalert/sweetalert.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?=base_url();?>assets/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>

<script>
$(document).ready(function() {
    $('.DeleteCustomer').click(function() {
        var id = $(this).data("id");
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover supplier!",
                type: "warning",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false,
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo base_url();?>Accountant/delete_one_supplier/",
                        data: {
                          supplierID: id
                        },
                        success: function(data) {
                          swal({
                            title: "Deleted!",
                            text: "Supplier has been deleted. Refreshing page...",
                            type: "success",
                            showCancelButton: false,
                            showConfirmButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, delete it!",
                            closeOnConfirm: false
                          });
                            setTimeout(function() {
                                window.location.replace("<?=base_url().'Accountant/view_suppliers'?>");
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
