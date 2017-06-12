<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OMAS</title>

    <link rel="shortcut icon" href="<?php echo base_url();?>images/favicon.png" />

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <!--   <link href="<?=base_url();?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet"> -->

    <!-- DataTables CSS -->
    <link href="<?=base_url();?>assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?=base_url();?>assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Sweetalert CSS -->
    <link href="<?=base_url();?>assets/vendor/sweetalert/sweetalert.css" rel="stylesheet">


    <!-- Custom CSS -->
  <!--   <link href="<?=base_url();?>assets/dist/css/sb-admin-2.css" rel="stylesheet"> -->
    <link href="<?=base_url();?>assets/css/customize-template.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url();?>assets/vendor/chartist/chartist.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url();?>assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url();?>assets/vendor/select2/select2.min.css" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="<?=base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="<?=base_url();?>assets/js/style.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div id="wrapper">

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button class="btn btn-navbar" data-toggle="collapse" data-target="#app-nav-top-bar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="dashboard.html" class="brand">
                    <img src="<?php echo base_url()?>images/logo.png" class="img-reponsive" width="35">
                    Managerial Accounting
                    <br>
                    For Small Business
                    </a>

                    <div id="app-nav-top-bar" class="nav-collapse">
                        <ul class="nav pull-right">
                            <li>
                                <a href="<?=base_url().'Login/logout'?>">Logout</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="body-container">
            <div id="body-content">

                    <div class="body-nav body-nav-horizontal body-nav-fixed">
                        <div class="container">
                            <ul class="sidebar">
                                <li>
                                    <a href="<?=base_url();?>Accountant/" id="dashboard">
                                        <i class="icon-dashboard icon-large"></i> Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>Accountant/Inventory" id="menu_inventory">
                                        <i class="icon-hdd icon-large"></i> Inventory
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>Accountant/view_service_invoices" id="menu_service">
                                        <i class="icon-book icon-large"></i> Service
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>Accountant/view_purchase_orders" id="menu_purchase">
                                        <i class="icon-shopping-cart icon-large"></i> Purchase
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>Accountant/balance_sheet"  id="menu_balancesheet">
                                        <i class="icon-file icon-large"></i> Balance sheet
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>Accountant/reports" id="menu_reports">
                                        <i class="icon-bar-chart icon-large"></i> Reports
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>Accountant/view_other_expenses" id="menu_utilities">
                                        <i class="icon-money icon-large"></i> Expenses
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-cogs icon-large"></i> Settings
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
