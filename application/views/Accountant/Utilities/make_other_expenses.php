<section class="sec-content">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Expenses</h1>
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
                        <label>Expense type</label>
                        <select name="table" id="select" required>
                            <option value="other_expenses">Other expenses</option>
                            <option value="rent">Rent</option>
                            <option value="insurance">Insurance</option>
                            <option value="fees">Fees</option>
                            <option value="wages">Wages</option>
                            <option value="interest">Interest</option>
                            <option value="supplies">Supplies</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="travel">Travel</option>
                            <option value="entertainment">Media & Entertainment</option>
                            <option value="training">Training</option>
                            <option value="utilities">Utility</option>
                            <option value="depreciation">Depreciation</option>
                        </select>
                    </div>
                     <div class="form-group">
                         <label>Name</label>
                         <input class="form-control" name="name" placeholder="Enter Name" value="<?=set_value('name');?>" required>
                         <?php echo form_error('name'); ?>
                     </div>
                     <div class="form-group">
                         <label>Description</label>
                         <input class="form-control" name="desc" placeholder="Enter Description" value="<?=set_value('desc');?>" required>
                         <?php echo form_error('desc'); ?>
                     </div>
                     <div class="form-group">
                         <label>Price</label>
                         <input class="form-control" name="price" type="number" placeholder="Enter price" value="<?=set_value('price');?>" required>
                         <?php echo form_error('price'); ?>
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
                     <div class="form-group" id="checkboxdiv">
                         <div class="checkbox">
                             <label>
                                 <input type="checkbox" id="paidcheckbox" name="paidcheckbox" value="1">Paid already?
                             </label>
                         </div>
                     </div>
                     <div class="form-group" id="datepaid">
                         <label>Date paid</label>
                         <input name="datepaid" type="date" id="datepicker">
                     </div>
                     <div class="form-group" id="fiscalyear">
                       <label> Fiscal year</label>
                       <select name="yearpicker" id="yearpicker"></select>
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
  $( "#fiscalyear" ).hide();
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
<script>
for (i = new Date().getFullYear(); i > 1900; i--)
{
    $('#yearpicker').append($('<option />').val(i).html(i));
}
</script>
<script>
$('#select').change(function() {
  if(this.value == 'depreciation'){
    $.ajax({
			type: 'POST',
			url: '<?=base_url();?>Accountant/get_fiscal_years_used',
			data: {
				'table': this.value
			},
			success: function(data) {
  			var data1 = JSON.parse(data);
        $.each(data1, function(index, value) {
          $("#yearpicker option[value='"+data1[index].fiscal_year+"']").remove();
        });
			}
		});
      $( "#fiscalyear" ).show();
      $( "#datepaid" ).hide();
      $( "#checkboxdiv" ).hide();
      $("#fiscalyear").prop('required',true);
  }
  else{
      $( "#fiscalyear" ).hide();
      $( "#checkboxdiv" ).show();
      $("#fiscalyear").prop('required',false);
}
});

$(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    $('#datepicker').attr('max', maxDate);
});
</script>
</body>

</html>
