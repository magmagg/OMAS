<section class="sec-content">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View Utility</h1>
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
                 <?php foreach($utility as $u):?>
                     <div class="form-group">
                         <label>Utility name</label>
                         <input class="form-control"  value="<?=$u->utility_name?>" readonly>
                     </div>
                     <div class="form-group">
                         <label>Description</label>
                         <input class="form-control" value="<?=$u->utility_desc?>" readonly>
                     </div>
                     <div class="form-group">
                         <label>Price</label>
                         <input class="form-control" value="<?=$u->utility_price?>" readonly>
                     </div>
                     <?php if($u->utility_doc == ''): ?>
                    <?php else: ?>
                        <div class="form-group">
                            <label>File</label>
                            <input class="form-control" value="<?=$u->utility_doc?>" readonly>
                        </div>
                    <?php endif; ?>
                     <form role="form" method="POST" action="<?=base_url()?>Accountant/submit_update_utility" enctype="multipart/form-data">
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
                     <?php if($u->Status == 1): ?>
                    <?php else: ?>
                        <input type="hidden" name="id" value="<?=$u->UtilitiesID?>">
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
                     <button type="submit" id="submitbutton" class="btn btn-default" disabled>Update</button>
                 </form>
                 <?php endif; ?>
                 <?php endforeach; ?>
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
            $("#submitbutton").prop('disabled',false);
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
            $("#submitbutton").prop('disabled',false);
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
