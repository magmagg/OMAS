<section class="nav nav-page">
    <div class="container">
        <div class="row">
        <div class="span7">
            <header class="page-header">
                <h3>Service<br/>
                    <small>View, Create, Send your Service Invoice</small>
                </h3>
            </header>
        </div>
        <div class="page-nav-options">
           
            <ul class="nav nav-tabs pull-right">
                <li><a href="#" class="parent">Estimates</a></li>
                <li class="dropdown">
                  <a class="dropdown-toggle parent" data-toggle="dropdown" href="#">Invoices
                    <i class="caret"></i></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?=base_url();?>Accountant/view_service_invoices" class="child">View Invoice</a></li>
                      <li><a href="<?=base_url();?>Accountant/make_service_invoice" class="child">Create Invoice</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle parent" data-toggle="dropdown" href="#">Customers
                    <i class="caret"></i></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?=base_url();?>Accountant/view_customers" class="child">View Customers</a></li>
                      <li><a href="<?=base_url();?>Accountant/add_customer" class="child">Create Customers</a></li>
                    </ul>
                </li>

                  
            </ul>
               
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    add_class("menu_service");
</script>