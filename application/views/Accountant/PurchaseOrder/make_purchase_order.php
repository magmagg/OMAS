<section class="sec-content">
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">Purchase Order</h1>
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
                  <form role="form" method="POST" id="myformsubmit" action="<?=base_url().'Accountant/submit_make_purchase_order'?>">
                       <div class="form-group">
                        <label>Supplier</label>
                         <select class="suppliers" id="supplierselect" name="supplierid" style="width: 100%">
                           <option value=""></option>
                           <?php foreach($suppliers as $s):?>
                           <option value="<?=$s->SupplierID?>"><?=$s->SupplierName?></option>
                           <?php endforeach;?>
                         </select>
                         <p class="help-block" id="sname">Supplier name:</p>
                         <p class="help-block" id="saddress">Supplier Address:</p>
                         <p class="help-block" id="snum">Supplier #:</p>
                       </div>
                       <div id="append">
                         <div class="row" id="itemsrow">
                           <div class="form-group col-lg-3">
                             <label class="myformlabel">Item</label>
                             <input class="form-control itemfield" name="item[]" id="item" placeholder="Enter Item" required>
                           </div>
                           <div class="form-group col-lg-4">
                             <label class="myformlabel">Item description</label>
                             <input class="form-control itemfield" name="itemdesc[]" id="itemdesc" placeholder="Description" required>
                           </div>
                           <div class="form-group col-lg-1">
                             <label class="myformlabel">Quantity</label>
                             <input class="form-control quantityfield" name="quantity[]" id="quantity" min="1" type="number" placeholder="Qty" required>
                           </div>
                           <div class="form-group col-lg-1">
                             <label class="myformlabel">Unit price</label>
                             <input class="form-control unitpricefield" name="unitprice[]" id="unitprice" min="0.01" step="0.01" type="number" placeholder="Price" required>
                           </div>
                           <div class="form-group col-lg-2">
                             <label class="myformlabel">Total</label>
                             <input class="form-control totalfield" id="total" name="total[]" placeholder="Total" readonly>
                           </div>
                         </div>
                        </div>
                       <button type="button" class="btn btn-success" id="cloneme">Add more items</button>
                       <p> Prepared by: <?=$this->session->userdata['username']?> </p>
                       <button type="submit" class="btn btn-default">Submit Button</button>
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

    <!-- Select2 Javascript -->
    <script src="<?=base_url();?>assets/vendor/select2/select2.full.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <!-- <script src="<?=base_url();?>assets/dist/js/sb-admin-2.js"></script> -->
    <div class="form-group col-lg-1" id="deletebutton">
      <button type="button" class="btn btn-danger deleterow" id="" onclick="deleterow(this)">X</button>
    </div>

    <script>
    $("#deletebutton").hide();
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



    <script>
    var id = 1;
    $( "#cloneme" ).click(function() {
      var clone = $("#itemsrow").clone();
      clone.find('input').val('');
      clone.find(".myformlabel").remove();
      clone.attr("id","itemsrow"+id);
      clone.find("#item").attr("id","item"+id);
      clone.find("#itemdesc").attr("id","itemdesc"+id);
      clone.find("#quantity").attr("id","quantity"+id);
      clone.find("#unitprice").attr("id","unitprice"+id);
      clone.find("#total").attr("id","total"+id);
      var deletebutton = $("#deletebutton").clone().show();
      deletebutton.find(".deleterow").attr("id","deleterow"+id);
      id++;

      $(clone).append(deletebutton);
      $("#append").append(clone);

    });
    </script>

    <script>
    $("form").on('keyup change', '.unitpricefield', function (){
       var currentid =this.id.slice(-1);
       if(isNaN(currentid)){
       	currentid = '';
        }else{

        }
       var total = $('#quantity'+currentid).val() * this.value;
       $('#total'+currentid).val(total);
    });

    $("form").on('keyup change', '.quantityfield', function (){
       var currentid =this.id.slice(-1);
       if(isNaN(currentid)){
        currentid = '';
        }else{

        }
       var total = $('#unitprice'+currentid).val() * this.value;
       $('#total'+currentid).val(total);
    });
    </script>

    <script>
    function deleterow(sel)
    {

     var currentid =sel.id.slice(-1);
      if(isNaN(currentid)){
       currentid = '';
       }else{

       }
      $('#itemsrow'+currentid).remove();
    }
    </script>

    <script>
    $("#myformsubmit").submit(function(e){
    	if ( $('#append').children().length > 0 ) {

    }
    else {
    	alert("Please input atleast one service/Item");
    	e.preventDefault();
    }
    });
    </script>
</body>

</html>
