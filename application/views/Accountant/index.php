        
           

            <section class="sec-content">
            <h1>Hi <?php echo  $this->session->userdata("username"); ?></h1>
            <h1>How would you like to start?</h1>
            <br>
            <div class="row">
                <div class="col-md-3 dashboard-start">
                    <a href=""><img src="<?php echo base_url()?>images/3-tile-accounting.png" class="img-responsive"></a>

                    <h5>ORGANIZE YOUR FINANCES</h5>
                    <p>Automate tracking your income <br> and expenses</p>
                </div>
                <div class="col-md-3 dashboard-start">
                    <a href=""><img src="<?php echo base_url()?>images/3-tile-invoicing.png" class="img-responsive"></a>

                    <h5>TRANSACTION PROCESSING</h5>
                    <p>Track transactions needed 
                        such as service invoice, purchase</p>
                </div>  
                <div class="col-md-3 dashboard-start">
                     <a href=""><img src="<?php echo base_url()?>images/3-tile-receipts.png" class="img-responsive"></a>

                    <h5>FINANCIAL REPORT</h5>
                    <p>See records of the financial activities
                    and position of a business, person,
                    or other entity</p>
                </div>    
            </div>
            </section>

        </div> <!-- body content -->
      </div> <!-- body container -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url();?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?=base_url();?>assets/vendor/raphael/raphael.min.js"></script>
    <script src="<?=base_url();?>assets/vendor/morrisjs/morris.min.js"></script>
    <script src="<?=base_url();?>assets/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url();?>assets/dist/js/sb-admin-2.js"></script>

    <script type="text/javascript">
    add_class("dashboard");
    </script>

</body>

</html>
