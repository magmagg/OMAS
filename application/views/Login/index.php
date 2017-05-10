<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Managerial Accounting System">
    <meta name="author" content="">

    <title>OMAS</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=base_url();?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url();?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

     <!-- Custom CSS -->
    <link href="<?=base_url();?>assets/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="<?=base_url();?>assets/css/bootstrap-combined.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="login-pg">

    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="row">

            <div class="col-sm-4 col-sm-offset-2">
                <img src="<?php base_url()?>images/logo.png" class="logo">
                <h5> Managerial Accounting </h5>
                <h5> For Small Business </h5>

            </div>

            <div class="col-sm-4">

                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Log In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" id="loginForm">
                            <fieldset>
                                <div class="form-group">

                                    <input
                                    data-msg-maxlength="Username must be a string with a minimum length of 8 and a maximum length of 15."
                                    data-msg-minlength="Username must be a string with a minimum length of 8 and a maximum length of 15."
                                    data-msg-required="Username is required."
                                    data-rule-maxlength="15"
                                    data-rule-minlength="8"
                                    data-rule-required="true"
                                    class="form-control"
                                    type="text"
                                    placeholder="Username"
                                    name="username"
                                    id="username"
                                    autofocus
                                    required>
                                </div>
                                <?php echo form_error('username'); ?>
                                <div class="form-group">
                                    <input data-msg-maxlength="Password must be a string with a minimum length of 8 and a maximum length of 15."
                                           data-msg-minlength="Password must be a string with a minimum length of 8 and a maximum length of 15."
                                           data-msg-required="Password is required."
                                           data-rule-maxlength="15"
                                           data-rule-minlength="8"
                                           data-rule-required="true"
                                           class="form-control"
                                           placeholder="Password"
                                           name="password"
                                           type="password"
                                           id="password"
                                           required>
                                </div>
                                <?php echo form_error('password'); ?>


                                <!-- Change this to a button or input when using this as a form -->
                                <div class="div-login-btn">
                                <a href="#">Forgot password?</a>
                                <br>
                                <button type="submit" class="btn btn-mg btn-success">Login</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer>
         Copyright 2017. Online Managerial Accounting System. ITSQ-OMAS
    </footer>


    <!-- jQuery -->
    <script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url();?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url();?>assets/dist/js/sb-admin-2.js"></script>

    <script src="<?=base_url();?>js/jquery/jquery.validate.js" type="text/javascript"></script>

    <script src="<?=base_url();?>js/bootstrap/bootstrap.min.js"></script>

    <script type="text/javascript">
    $("#loginForm").validate({

      showErrors: function(errorMap, errorList) {
          // Clean up any tooltips for valid elements
          $.each(this.validElements(), function (index, element) {
              var $element = $(element);
              $element.data("title", "") // Clear the title - there is no error associated anymore
                  .removeClass("error")
                  .tooltip("destroy");
          });
          // Create new tooltips for invalid elements
          $.each(errorList, function (index, error) {
              var $element = $(error.element);
              $element.tooltip("destroy") // Destroy any pre-existing tooltip so we can repopulate with new tooltip content
                  .data("title", error.message)
                  .addClass("error")
                  .tooltip(); // Create a new tooltip based on the error messsage we just set in the title
          });
      },

   });
  </script>

</body>

</html>
