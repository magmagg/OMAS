<section class="sec-content">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Utility</h1>
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
               <?= $this->session->flashdata('error1'); ?>
               <?php if(validation_errors()){echo $this->session->flashdata('error');}?>
                <form role="form" method="POST" enctype="multipart/form-data">
                     <div class="form-group">
                         <label>Utility name</label>
                         <input class="form-control" name="utilitiesname" placeholder="Enter Utility name" value="<?=set_value('utilitiesname');?>" required>
                         <?php echo form_error('utilitiesname'); ?>
                     </div>
                     <div class="form-group">
                         <label>Description</label>
                         <input class="form-control" name="utilitiesdesc" placeholder="Enter Description" value="<?=set_value('utilitiesdesc');?>" required>
                         <?php echo form_error('utilitiesdesc'); ?>
                     </div>
                     <div class="form-group">
                         <label>Price</label>
                         <input class="form-control" name="utilitiesprice" type="number" placeholder="Enter price" value="<?=set_value('utilitiesprice');?>" required>
                         <?php echo form_error('utilitiesprice'); ?>
                     </div>
                     <div class="form-group">
                         <div class="checkbox">
                             <label>
                                 <input type="checkbox" id="filecheckbox" name="filecheckbox" value="1">With file?
                             </label>
                         </div>
                     </div>
                     <div class="form-group" id="fileinput">
                         <label>Choose file:</label>
                         <input type="file" name="fileinput" id="userfile" />
                     </div>
                     <div class="form-group">
                         <div class="checkbox">
                             <label>
                                 <input type="checkbox" id="paidcheckbox" name="paidcheckbox" value="1">Paid already?
                             </label>
                         </div>
                     </div>
                     <div class="form-group" id="datepaid">
                         <label>Date paid</label>
                         <input name="utilitiesdatepaid" type="date" id="datepicker">
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

<script>
$(document).ready(function() {
    $('#datepaid').hide();
    $('#paidcheckbox').change(function() {
        if(this.checked) {
            $('#datepaid').show();
            $("#datepicker").prop('required',true);
        }
        else{
            $('#datepaid').hide();
            $("#datepicker").prop('required',false);
        }
    });
});

$(document).ready(function() {
    $('#fileinput').hide();
    $('#filecheckbox').change(function() {
        if(this.checked) {
            $('#fileinput').show();
            $("#userfile").prop('required',true);
        }
        else{
            $('#fileinput').hide();
            $("#userfile").prop('required',false);
        }
    });
});
</script>

</body>

</html>
