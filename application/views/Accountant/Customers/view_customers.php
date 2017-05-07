<section class="sec-content">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Customers</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                All customers
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Customer name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach($customers as $c): ?>
                        <tr>
                            <td><?=$c->CustomerName?></td>
                            <td><?=$c->Phone?></td>
                            <td><?=$c->Email?></td>
                            <td><?=$c->Address?></td>
                            <td>
                              <!--
                              <button type="button" class="btn btn-primary" onclick="editCustomer(<?=$c->CustomerID?>)">Edit</button>
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
                              -->
                              <a href="<?=base_url().'Accountant/edit_one_customer/'.$c->CustomerID?>"><button type="button" class="btn btn-primary">Edit</button></a>
                              <button type="button" class="btn btn-danger DeleteCustomer" data-id="<?=$c->CustomerID?>">Delete</button>
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
                text: "You will not be able to recover customer!",
                type: "warning",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false,
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo base_url();?>Accountant/delete_one_customer/",
                        data: {
                          customerID: id
                        },
                        success: function(data) {
                          swal({
                            title: "Deleted!",
                            text: "Customer has been deleted. Refreshing page...",
                            type: "success",
                            showCancelButton: false,
                            showConfirmButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, delete it!",
                            closeOnConfirm: false
                          });
                            setTimeout(function() {
                                window.location.replace("<?=base_url().'Accountant/view_customers'?>");
                            }, 2000);

                        }
                    });
                } else {}
            });
    });
});
</script>

<!--
<script>
function editCustomer(id)
{
event.preventDefault();
$.ajax({
  type: 'POST',
  url: "<?php echo base_url();?>Accountant/get_one_customer/",
  data: {
    customerID: id
  },
  success: function(data) {
    console.log(data);
    $('#myModalEditCustomer').modal('show');
    $('#customerid').val(data.customer[0].ann_id);
    $('#title').val(data.customer[0].ann_title);
    $('textarea#form-field-8').val(data.customer[0].ann_content);
  },
  dataType: "json"
});
}
</script>
-->

</body>

</html>
