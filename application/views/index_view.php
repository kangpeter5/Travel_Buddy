<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>&middot; Travel Buddy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="/assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

    <div class="container">

      <h1>Welcome to Travel Buddy!</h1>

		  <div class="row">
		 	<!-- registration -->
		    <div class="span4">
<?php
	    	if ($this->session->flashdata('registration_error')) 
	    	{
	    		echo "<p>" . $this->session->flashdata('registration_error') . "</p>";
	    	}
?>
			    <form class="form-signin" action="/users/register" method="post">
			        <h2 class="form-signin-heading">Register</h2>
			        <input type="text" class="input-block-level" placeholder="First Name" name="first_name">
			        <input type="text" class="input-block-level" placeholder="Last Name" name="last_name">
			        <input type="text" class="input-block-level" placeholder="Username" name="username">
			        <input type="password" class="input-block-level" placeholder="Password" name="password">
			        <input type="password" class="input-block-level" placeholder="Confirm Password" name="confirm_password">
			        <button class="btn btn-large btn-primary" type="submit">Register</button>
			    </form>
		    </div>

		    <!-- login -->
		    <div class="span4">
<?php
	    	if ($this->session->flashdata('login_error')) 
	    	{
	    		echo "<p>" . $this->session->flashdata('login_error') . "</p>";
	    	}
?>
		        <form class="form-signin" action="/users/login" method="post">
			        <h2 class="form-signin-heading">Login</h2>
			        <input type="text" class="input-block-level" placeholder="Username" name="username">
			        <input type="password" class="input-block-level" placeholder="Password" name="password">
			        <button class="btn btn-large btn-primary" type="submit">Login</button>
			    </form>
		    </div>
		</div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
