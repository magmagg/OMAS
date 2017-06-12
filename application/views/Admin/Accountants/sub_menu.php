<section class="nav nav-page">
    <div class="container">
        <div class="row">
        <div class="span7">
            <header class="page-header">
                <h3>Users<br/>
                    <small>View, Create, Update Users</small>
                </h3>
            </header>
        </div>
        <div class="page-nav-options">
           
            <ul class="nav nav-tabs pull-right">
              <!--   <li><a href="#" class="parent">Estimates</a></li> -->
                <li class="dropdown">
                  <a class="dropdown-toggle parent" data-toggle="dropdown" href="#">Users
                    <i class="caret"></i></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?=base_url();?>Admin/view_accountants">View Users</a></li>
                      <li><a href="<?=base_url();?>Admin/add_accountant">Create Users</a></li>
                    </ul>
                </li>
                  
            </ul>
               
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    add_class("menu_users");
</script>