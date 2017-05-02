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
                            <form role="form" method="POST" action="<?=base_url().'Accountant/submit_make_purchase_order'?>">
                                 <div class="form-group">
                                  <label>Customer</label>
                                   <select class="customers" id="customerselect" name="customerid" style="width: 100%">
                                     <option value=""></option>
                                     <?php foreach($customers as $c):?>
                                     <option value="<?=$c->CustomerID?>"><?=$c->CustomerName?></option>
                                     <?php endforeach;?>
                                   </select>
                                   <p class="help-block" id="cname">Customer name:</p>
                                   <p class="help-block" id="caddress">Customer Address:</p>
                                   <p class="help-block" id="cnum">Customer #:</p>
                                 </div>
                                 <div id="append">
                                   <div class="row" id="itemsrow">
                                     <div class="form-group col-lg-3">
                                       <label class="myformlabel">Item</label>
                                       <select class="items" id="items" name="items[]" style="width: 100%">
                                         <option value=""></option>
                                         <?php foreach($items as $i):?>
                                         <option value="<?=$i->ItemID?>"><?=$i->ItemName?></option>
                                         <?php endforeach;?>
                                       </select>
                                     </div>
                                     <div class="form-group col-lg-3">
                                       <label class="myformlabel">Unit price</label>
                                       <input class="form-control unitpricefield" name="unitprice[]" id="unitprice" type="number" placeholder="Enter Price"  value="<?=set_value('address');?>" required>
                                       <?php echo form_error('address'); ?>
                                     </div>
                                     <div class="form-group col-lg-3">
                                       <label class="myformlabel">Quantity</label>
                                       <input class="form-control quantityfield" name="quantity[]" id="quantity" type="number" placeholder="Enter Quantity"  value="<?=set_value('address');?>" required>
                                       <?php echo form_error('address'); ?>
                                     </div>
                                     <div class="form-group col-lg-3">
                                       <label class="myformlabel">Total</label>
                                       <input class="form-control totalfield" id="total" name="total[]" placeholder="Total" readonly>
                                       <?php echo form_error('address'); ?>
                                     </div>
                                   </div>
                                  </div>
                                 <button type="button" class="btn btn-success" id="cloneme">Add more items</button>
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
    $(".customers").select2({
        placeholder: "Select a customer"
      });
    $(".items").select2({
        placeholder: "Item"
      });
    </script>

    <script>
    $('#customerselect').on('change', function() {
      $.ajax({
          type: 'POST',
          url: '<?=base_url().'Accountant/get_one_customer'?>',
          data: {
            customerid: this.value
          },
          success: function(data) {
          $( "#cname" ).text('Customer name: '+ data.customer[0].CustomerName);
          $( "#caddress" ).text('Customer address: '+ data.customer[0].Address);
          $( "#cnum" ).text('Customer #: '+ data.customer[0].Phone);
          },
          dataType: 'json'
      });
    })
    </script>

    <script>
    var id = 1;
    $( "#cloneme" ).click(function() {
      var clone = $("#itemsrow").clone();
      clone.find('input').val('');
      clone.find(".myformlabel").remove();
      clone.find("#item").attr("id","item"+id);
      clone.find("#quantity").attr("id","quantity"+id);
      clone.find("#unitprice").attr("id","unitprice"+id);
      clone.find("#total").attr("id","total"+id);
      id++;
      $("#append").append(clone);
    });
    </script>

</body>

</html>
