        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Purchase Order/Invoice</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <div class="col-lg-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     Make purchase order
                 </div>
                 <div class="panel-body">
                     <div class="row">
                         <div class="col-lg-12">
                         <?= $this->session->flashdata('success'); ?>
                         <?php if(validation_errors()){echo $this->session->flashdata('error');}?>
                            <form role="form" method="POST">
                                 <div class="form-group">
                                  <label>Supplier</label>
                                   <select class="suppliers" id="supplierselect" style="width: 100%">
                                     <option value=""></option>
                                     <?php foreach($suppliers as $s):?>
                                     <option value="<?=$s->SupplierID?>"><?=$s->SupplierName?></option>
                                     <?php endforeach;?>
                                   </select>
                                   <p class="help-block" id="sname">Supplier name:</p>
                                   <p class="help-block" id="saddress">Supplier Address:</p>
                                   <p class="help-block" id="snum">Supplier #:</p>
                                 </div>
                                 <div class="row">
                                   <div class="form-group col-lg-3">
                                     <label>Item</label>
                                     <input class="form-control" name="item[]" placeholder="Enter Item"  value="<?=set_value('address');?>" required>
                                     <?php echo form_error('address'); ?>
                                   </div>
                                   <div class="form-group col-lg-3">
                                     <label>Quantity</label>
                                     <input class="form-control" name="quantity[]" placeholder="Enter Quantity"  value="<?=set_value('address');?>" required>
                                     <?php echo form_error('address'); ?>
                                   </div>
                                   <div class="form-group col-lg-3">
                                     <label>Unit price</label>
                                     <input class="form-control" name="unitprice[]" placeholder="Enter Price"  value="<?=set_value('address');?>" required>
                                     <?php echo form_error('address'); ?>
                                   </div>
                                   <div class="form-group col-lg-3">
                                     <label>Total</label>
                                     <input class="form-control" placeholder="Total" readonly>
                                     <?php echo form_error('address'); ?>
                                   </div>
                                 </div>
                                 <p> Prepared by: <?=$this->session->userdata['username']?> </p>
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

    <!-- Select2 Javascript -->
    <script src="<?=base_url();?>assets/vendor/select2/select2.full.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url();?>assets/dist/js/sb-admin-2.js"></script>

    <script>
    $(".suppliers").select2({
        placeholder: "Select a supplier"
      });
    </script>

    <script>
    $('#supplierselect').on('change', function() {
      $.ajax({
          type: 'POST',
          url: '<?=base_url().'Accountant/get_one_supplier'?>',
          data: {
            supplierid: this.value
          },
          success: function(data) {
          console.log(data.supplier[0].SupplierID);
          $( "#sname" ).text('Supplier name: '+ data.supplier[0].SupplierName);
          $( "#saddress" ).text('Supplier address: '+ data.supplier[0].Address + ',' + data.supplier[0].City + ',' + data.supplier[0].Region + ',' + data.supplier[0].PostalCode);
          $( "#snum" ).text('Supplier #: '+ data.supplier[0].Phone);
          },
          dataType: 'json'
      });
    })
    </script>

</body>

</html>
