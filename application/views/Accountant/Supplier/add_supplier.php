<section class="sec-content">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Supplier</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
<div class="col-lg-12">
 <div class="panel panel-default">
     <div class="panel-heading">
         Add another supplier
     </div>
     <div class="panel-body">
         <div class="row">
             <div class="col-lg-12">
             <?= $this->session->flashdata('success'); ?>
             <?php if(validation_errors()){echo $this->session->flashdata('error');}?>
                <form role="form" method="POST">
                     <div class="form-group">
                         <label>Name</label>
                         <input class="form-control" name="suppliername" placeholder="Enter Name" value="<?=set_value('suppliername');?>" required>
                         <?php echo form_error('suppliername'); ?>
                     </div>
                     <div class="form-group">
                         <label>Address</label>
                         <input class="form-control" name="address" placeholder="Enter Address"  value="<?=set_value('address');?>" required>
                         <?php echo form_error('address'); ?>
                     </div>
                     <div class="form-group">
                         <label>City</label>
                         <input class="form-control" name="city" placeholder="Enter City"  value="<?=set_value('city');?>" required>
                         <?php echo form_error('city'); ?>
                     </div>
                     <div class="form-group">
                         <label>Region</label>
                         <input class="form-control" name="region" placeholder="Enter Region" value="<?=set_value('region');?>" required>
                         <?php echo form_error('region'); ?>
                     </div>
                     <div class="form-group">
                         <label>Postal code</label>
                         <input class="form-control" name="postalcode" placeholder="Enter Postal code" value="<?=set_value('postalcode');?>" required>
                         <?php echo form_error('postalcode'); ?>
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
<!-- <script src="<?=base_url();?>assets/vendor/metisMenu/metisMenu.min.js"></script> -->

<!-- Morris Charts JavaScript -->
<!-- <script src="<?=base_url();?>assets/vendor/raphael/raphael.min.js"></script>
<script src="<?=base_url();?>assets/vendor/morrisjs/morris.min.js"></script>
<script src="<?=base_url();?>assets/data/morris-data.js"></script> -->

<!-- Custom Theme JavaScript -->
<script src="<?=base_url();?>assets/dist/js/sb-admin-2.js"></script>

</body>

</html>
