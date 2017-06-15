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
                  <form role="form" method="POST" action="<?=base_url().'Accountant/submit_edit_purchase_order'?>">
                    <?php foreach($purchaseorder as $p):?>
                    <input type="hidden" name="purchaseid" value="<?=$p->PurchaseID?>">
                    <input type="hidden" name="pastitems[]" value="<?=$p->ItemID?>">
                  <?php endforeach; ?>
                       <div class="form-group">
                        <label>Supplier</label>
                        <?php $count = 1; ?>
                        <?php foreach($supplier as $s):?>
                          <?php if($count == 1):?>
                         <select class="suppliers" id="supplierselect" name="supplierid" style="width: 100%">
                           <option value="<?=$s->SupplierID?>"><?=$s->SupplierName?></option>
                         </select>
                         <p class="help-block" id="sname">Supplier name:<?=$s->SupplierName?></p>
                         <p class="help-block" id="saddress">Supplier Address:<?=$s->Address?> <?=$s->City?> <?=$s->Region?> <?=$s->PostalCode?></p>
                         <p class="help-block" id="snum">Supplier #:<?=$s->Phone?></p>
                                              <?php $count++;?>
                       <?php else:?>
                       <?php endif;?>

                        <?php endforeach;?>
                       </div>
                       <?php $piid = 1;?>
                       <div class="row">
                       <?php foreach($purchaseorder as $p): ?>
                         <div id="pirow<?=$piid?>">
                         <?php $count = 1; ?>
                           <div class="form-group col-lg-3">
                             <input class="form-control iitemfield" name="item[]" id="iitem<?=$count?>" value="<?=$p->ItemName?>" required>
                           </div>
                           <div class="form-group col-lg-4">
                             <input class="form-control iitemfield" name="itemdesc[]" id="iitemdesc<?=$count?>" value="<?=$p->ItemDesc?>" required>
                           </div>
                           <div class="form-group col-lg-1">
                             <input class="form-control qquantityfield" name="quantity[]" id="qquantity<?=$count?>" value="<?=$p->Quantity?>" type="number" required>
                           </div>
                           <div class="form-group col-lg-1">
                             <input class="form-control uunitpricefield" name="unitprice[]" id="uunitprice<?=$count?>" type="number" value="<?=$p->UnitPrice?>" required>
                           </div>
                           <div class="form-group col-lg-2">
                             <input class="form-control ttotalfield" id="ttotal<?=$count?>" name="total[]" placeholder="Total" value="<?=$p->Quantity*$p->UnitPrice?>" readonly>
                           </div>
                           <div class="form-group col-lg-1">
                             <button type="button" class="btn btn-danger deleterow" id="bpirow<?=$piid?>" onclick="deleterowpiid(this)">X</button>
                           </div>
                         </div>
                           <?php $piid++; ?>
                         <?php endforeach; ?>
                       </div>
                       <div id="append">
                         <div class="row" id="itemsrow">
                           <div class="form-group col-lg-3">
                             <input class="form-control itemfield" name="item[]" id="item" placeholder="Enter Item" required>
                           </div>
                           <div class="form-group col-lg-4">
                             <input class="form-control itemfield" name="itemdesc[]" id="itemdesc" placeholder="Description" required>
                           </div>
                           <div class="form-group col-lg-1">
                             <input class="form-control quantityfield" name="quantity[]" id="quantity" type="number" placeholder="Qty" required>
                           </div>
                           <div class="form-group col-lg-1">
                             <input class="form-control unitpricefield" name="unitprice[]" id="unitprice" type="number" placeholder="Price" required>
                           </div>
                           <div class="form-group col-lg-2">
                             <input class="form-control totalfield" id="total" name="total[]" placeholder="Total" readonly>
                           </div>
                           <div class="form-group col-lg-1" id="deletebutton">
                             <button type="button" class="btn btn-danger deleterow" id="" onclick="deleterow(this)">X</button>
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


    <script>
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
      clone.find(".deleterow").attr("id","deleterow"+id);
      id++;

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

    $("form").on('keyup change', '.uunitpricefield', function (){
       var currentid =this.id.slice(-1);
       if(isNaN(currentid)){
        currentid = '';
        }else{

        }
       var total = $('#qquantity'+currentid).val() * this.value;
       $('#ttotal'+currentid).val(total);
    });

    $("form").on('keyup change', '.qquantityfield', function (){
       var currentid =this.id.slice(-1);
       if(isNaN(currentid)){
        currentid = '';
        }else{

        }
       var total = $('#uunitprice'+currentid).val() * this.value;
       $('#ttotal'+currentid).val(total);
    });
    </script>

    <script>
    function deleterow(sel)
    {
      if ( $('#append').children().length == 1 ) {
        alert("Please leave atleast one input");
    }
    else {

       var currentid =sel.id.slice(-1);
        if(isNaN(currentid)){
         currentid = '';
         }else{

         }
        $('#itemsrow'+currentid).remove();
    }
    }
    function deleterowpiid(sel)
    {
      var currentid =sel.id.slice(-1);
       if(isNaN(currentid)){
        currentid = '';
        }else{

        }
       $('#pirow'+currentid).remove();
    }
    </script>
</body>

</html>
