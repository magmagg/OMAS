<section class="sec-content">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View reports</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
     <div class="col-lg-6">
      <div class="panel panel-default">
         <div class="panel-heading">
             View service invoice
         </div>
         <div class="panel-body">
           <ul class="nav nav-pills">
                 <li class="active"><a href="#monthly" data-toggle="tab">Monthly</a></li>
                 <li><a href="#quarter" data-toggle="tab">Quarterly</a></li>
                 <li><a href="#semianual" data-toggle="tab">Semi Annually</a></li>
                 <li><a href="#anual" data-toggle="tab">Annually</a></li>
           </ul>
           <div class="tab-content">
             <div class="tab-pane fade in active" id="monthly">
                  <div style="display:block;height:300px">
                      <div style="width:100%;height:100%;" id="flot-pie-chart"></div>
                  </div>
             </div>
             <div class="tab-pane fade" id="quarter">
               Quarter here
             </div>
             <div class="tab-pane fade" id="semianual">
               semianual here
             </div>
             <div class="tab-pane fade" id="anual">
               anual here
             </div>
           </div>

         </div>
         <!-- /.panel-body -->
     </div>
     <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->

    <div class="col-lg-6">
     <div class="panel panel-default">
        <div class="panel-heading">
            Services
        </div>
        <div class="panel-body">
          <ul class="nav nav-pills">
                <li class="active"><a href="#monthlyservice" data-toggle="tab">Monthly</a></li>
                <li><a href="#quarterservice" data-toggle="tab">Quarterly</a></li>
                <li><a href="#semianualservice" data-toggle="tab">Semi Annually</a></li>
                <li><a href="#anualservice" data-toggle="tab">Annually</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade in active" id="monthlyservice">
                 <div style="display:block;height:300px">
                     <div style="width:100%;height:100%;" id="flot-bar-chart"></div>
                 </div>
            </div>
            <div class="tab-pane fade" id="quarterservice">
              Quarter here
            </div>
            <div class="tab-pane fade" id="semianualservice">
              semianual here
            </div>
            <div class="tab-pane fade" id="anualservice">
              anual here
            </div>
          </div>

        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
   </div>
   <!-- /.col-lg-12 -->
   </div>
</div>
<!-- /.row -->
    <!-- /.col-lg-12 -->
  </div>
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

<!-- DataTables JavaScript -->
<script src="<?=base_url();?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>
<script src="<?=base_url();?>assets/vendor/flot/jquery.flot.js"></script>
<script src="<?=base_url();?>assets/vendor/flot/jquery.flot.pie.js"></script>
<script src="<?=base_url();?>assets/vendor/flot/jquery.flot.resize.js"></script>
<script src="<?=base_url();?>assets/vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
<script src="<?=base_url();?>assets/vendor/flot/jquery.flot.time.js"></script>
<!-- SweetAlert -->
<script src="<?=base_url();?>assets/vendor/sweetalert/sweetalert.min.js"></script>

<!-- Custom Theme JavaScript -->
<!-- <script src="<?=base_url();?>assets/dist/js/sb-admin-2.js"></script> -->

<script type="text/javascript">
//Flot Pie Chart
$(function() {

    var data = [{
        label: "Series 0:1",
        data: 1
    }, {
        label: "Series 1",
        data: 3
    }, {
        label: "Series 2",
        data: 9
    }, {
        label: "Series 3",
        data: 20
    }];

    var plotObj = $.plot($("#flot-pie-chart"), data, {
        series: {
            pie: {
                show: true
            }
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            defaultTheme: true
        }
    });

});
var d1 = [[3, 'January']];

$(document).ready(function () {
    $.plot($("#flot-bar-chart"), [
        {
            data: d1,
            bars: {
                show: true
            }
        }
    ]);
});

</script>


</body>

</html>
