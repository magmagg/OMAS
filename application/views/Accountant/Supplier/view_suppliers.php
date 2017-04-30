<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Suppliers</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                All Supplier
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Supplier name</th>
                            <th>Address(City, Region, Postal code)</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach($suppliers as $c): ?>
                        <tr>
                            <td><?=$c->SupplierName?></td>
                            <td><?=$c->Address?>,<?=$c->City?>,<?=$c->Region?>,<?=$c->PostalCode?></td>
                            <td><?=$c->Phone?></td>
                            <td><?=$c->Email?></td>
                            <td>
                              <a href="<?=base_url().'Accountant/edit_one_supplier/'.$c->SupplierID?>"><button type="button" class="btn btn-primary">Edit</button></a>
                              <button type="button" class="btn btn-danger DeleteCustomer" data-id="<?=$c->SupplierID?>">Delete</button>
                            </td>
                        </tr>
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
