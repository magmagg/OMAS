<section class="sec-content">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View balance sheets</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
     <div class="col-lg-12">
        <?=$this->session->flashdata('success'); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Balance sheets
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Balance ID</th>
                            <th>Created by</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $num = 1; ?>
                      <?php foreach($ids as $i): ?>
                        <tr>
                            <td><?=$num?></td>
                            <td><?=$i->balance_id?></td>
                            <td><?=$i->created_by?></td>
                            <td><?=$i->date_created?></td>
                            <td>
                              <a href="<?=base_url().'Accountant/view_balance_sheet_one/'.$i->balance_id?>"><button type="button" class="btn btn-primary">View</button></a>
                              <a href="<?=base_url().'Accountant/edit_one_balance_sheet/'.$i->balance_id?>"><button type="button" class="btn btn-primary">Edit</button></a>

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

<!-- DataTables JavaScript -->
<script src="<?=base_url();?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- SweetAlert -->
<script src="<?=base_url();?>assets/vendor/sweetalert/sweetalert.min.js"></script>

<!-- Custom Theme JavaScript -->
<!-- <script src="<?=base_url();?>assets/dist/js/sb-admin-2.js"></script> -->

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>


</body>

</html>
