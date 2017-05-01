<div id="page-wrapper">
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
                         <label>Username</label>
                         <input class="form-control" name="username" placeholder="Enter Username" value="<?=set_value('username');?>" required>
                         <?php echo form_error('username'); ?>
                     </div>
                     <div class="form-group">
                         <label>Email</label>
                         <input class="form-control" name="email" type="email" placeholder="Enter Email" value="<?=set_value('email');?>" required>
                         <?php echo form_error('email'); ?>
                     </div>
                     <div class="form-group">
                         <label>Password</label>
                         <input class="form-control" name="password" type="password" placeholder="Enter Password" value="<?=set_value('password');?>" required>
                         <?php echo form_error('phone'); ?>
                     </div>
                     <div class="form-group">
                         <label>Confirm Password</label>
                         <input class="form-control" name="confirmpassword" type="password" placeholder="Confirm password"  value="<?=set_value('confirmpassword');?>" required>
                         <?php echo form_error('confirmpassword'); ?>
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

<!-- Custom Theme JavaScript -->
<script src="<?=base_url();?>assets/dist/js/sb-admin-2.js"></script>

</body>

</html>
