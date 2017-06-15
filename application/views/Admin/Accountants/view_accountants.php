<section class="sec-content">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
          <?=$this->session->flashdata('success');?>
            <div class="panel-heading">
                All users
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Time created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach($accountants as $a): ?>
                        <tr>
                            <td><?=$a->username?></td>
                            <td><?=$a->email?></td>
                            <td><?=$a->create_time?></td>
                            <td>
                              <a href="<?=base_url().'Admin/edit_one_accountant/'.$a->UserID?>"><button type="button" class="btn btn-primary">Edit</button></a>
                              <?php if($a->Status == 1):?>
                                <button type="button" class="btn btn-danger DeleteAccountant" data-id="<?=$a->UserID?>">Deactivate</button>
                              <?php else:?>
                                <button type="button" class="btn btn-success ActivateAccountant" data-id="<?=$a->UserID?>">Activate</button>
                              <?php endif;?>
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
    $('.DeleteAccountant').click(function() {
        var id = $(this).data("id");
        swal({
                title: "Are you sure?",
                text: "Deactivate account?",
                type: "warning",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                showCancelButton: true,
                closeOnConfirm: false,
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo base_url();?>Admin/deactivate_user/",
                        data: {
                          'id': id
                        },
                        success: function(data) {
                          swal({
                            title: "Deleted!",
                            text: "Account deactivated. Refreshing page...",
                            type: "success",
                            showCancelButton: false,
                            showConfirmButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, Deactivate it!",
                            closeOnConfirm: false
                          });
                            setTimeout(function() {
                                window.location.replace("<?=base_url().'Admin/view_accountants'?>");
                            }, 2000);

                        }
                    });
                } else {}
            });
    });
});

$(document).ready(function() {
    $('.ActivateAccountant').click(function() {
        var id = $(this).data("id");
        swal({
                title: "Are you sure?",
                text: "Activate account?",
                type: "warning",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Activate it!",
                showCancelButton: true,
                closeOnConfirm: false,
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo base_url();?>Admin/activate_user/",
                        data: {
                          'id': id
                        },
                        success: function(data) {
                          swal({
                            title: "Deleted!",
                            text: "Account activated. Refreshing page...",
                            type: "success",
                            showCancelButton: false,
                            showConfirmButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, delete it!",
                            closeOnConfirm: false
                          });
                            setTimeout(function() {
                                window.location.replace("<?=base_url().'Admin/view_accountants'?>");
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
