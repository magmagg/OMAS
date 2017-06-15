<section class="nav nav-page">
    <div class="container">
        <div class="row">
        <div class="span7">
            <header class="page-header">
                <h3>Purchase<br/>
                    <small>View, Order, Send your Purchase</small>
                </h3>
            </header>
        </div>
        <div class="page-nav-options">

            <ul class="nav nav-tabs pull-right">

                <li class="dropdown">
                  <a class="dropdown-toggle parent" data-toggle="dropdown" href="#">Order
                    <i class="caret"></i></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?=base_url();?>Accountant/view_purchase_orders" class="child">View Orders</a></li>
                      <li><a href="<?=base_url();?>Accountant/make_purchase_order" class="child">Create Order</a></li>
                    </ul>
                </li>
                <!--
                <li><a href="#" class="parent">Bills</a></li>
                <li><a href="#" class="parent">Receipts</a></li>
              -->
                <li class="dropdown">
                  <a class="dropdown-toggle parent" data-toggle="dropdown" href="#">Suppliers
                    <i class="caret"></i></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?=base_url();?>Accountant/view_suppliers" class="child">View Suppliers</a></li>
                      <li><a href="<?=base_url();?>Accountant/add_supplier" class="child">Create Suppliers</a></li>
                    </ul>
                </li>

            </ul>

            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    add_class("menu_purchase");
</script>
