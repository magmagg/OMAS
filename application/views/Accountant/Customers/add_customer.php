<section class="sec-content">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Customer</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
<div class="col-lg-12">
 <div class="panel panel-default">
     <div class="panel-heading">
         Basic Form Elements
     </div>
     <div class="panel-body">
         <div class="row">
             <div class="col-lg-12">
               <?= $this->session->flashdata('success'); ?>
               <?php if(validation_errors()){echo $this->session->flashdata('error');}?>
                <form role="form" method="POST">
                     <div class="form-group">
                         <label>Name</label>
                         <input class="form-control" name="customername" placeholder="Enter Name" value="<?=set_value('customername');?>" required>
                         <?php echo form_error('customername'); ?>
                     </div>
                     <div class="form-group">
                         <label>Phone</label>
                         <input class="form-control" name="phone" placeholder="Enter Phone" value="<?=set_value('phone');?>" required>
                         <?php echo form_error('phone'); ?>
                     </div>
                     <div class="form-group">
                         <label>Email</label>
                         <input class="form-control" name="email" type="email" placeholder="Enter Email" value="<?=set_value('email');?>" required>
                         <?php echo form_error('email'); ?>
                     </div>
                     <div class="form-group">
                         <label>Address</label>
                         <input class="form-control" name="address" placeholder="Enter Address"  value="<?=set_value('address');?>" required>
                         <?php echo form_error('address'); ?>
                     </div>
                     <button type="submit" class="btn btn-default">Submit Button</button>
                     <button type="reset" class="btn btn-default">Reset Button</button>
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

</body>

</html>
