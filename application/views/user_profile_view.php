<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>User Profile&middot; Travel Buddy</title>
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

    	<h1>Welcome <?php echo $user['first_name']; ?>!</h1>
      <form class="navbar-form pull-right" action="/users/logout">
        <button type="submit" class="btn btn-danger">Log Out</button>
      </form>  

      <h3>Your Trip Schedules</h3>
      <thead>
          <th>Destination</th>
          <th>Travel Start Date</th>
          <th>Travel End Date</th>
          <th>Plan</th>
      </thead>

<?php
      foreach ($trips as $trip)
      {
?>
      <tr>
        <!-- destination column -->
<?php
        if($user['id']== $travel['user_id'])
        {
?>
          <!-- destination -->
          <td>
            <a href="/travels/show_trips_by_user/<?=$user['user_id']?>">
              <?php echo $travel['destination']; ?>
            </a>
          </td>

          <!-- start date -->
          <td>
            <p><?php echo $trip['travel_start']; ?></p>
          </td>

          <!-- end date -->
          <td>
            <p><?php echo $trip['travel_end']; ?></p>
          </td>

          <!-- plan -->
          <td>
            <p><?php echo $trip['plan']; ?></p>.
          </td>
<?php
        }
?>
        </tr>
<?php
      }
?>
<!-- end of user trips -->

<!-- other user's trips -->
      <br>
      <h3>Other User's Travel Plans</h3>
      <thead>
        <th>Name</th>
        <th>Destination</th>
        <th>Travel Start Date</th>
        <th>Travel End Date</th>
        <th>Do You Want to Join?</th>
      </thead>

<?php       
      foreach ($trips as $trip)
      {
?>
      <tr>
<?php
        if($user['id']== $travel['user_id'])
        {
?>
        <!-- name -->
        <td>
          <p><?php echo $user['name']; ?></p>
        </td>

        <!-- destination column -->
        <td>
          <a href="/travels/show_trips_by_user/<?=$user['user_id']?>">
            <?php echo $user['name']; ?>
          </a>
        </td>

        <!-- start date -->
        <td>
          <p><?php echo $trip['travel_start']; ?></p>
        </td>

        <!-- end date -->
        <td>
          <p><?php echo $trip['travel_end']; ?></p>
        </td>

        <!-- Join the trip -->
        <td>
          <a href="/travels/show_trips_by_user/<?=$user['user_id']?>">Join</a>
        </td>
<?php
        }
?>
      </tr>
<?php
      }
?>

    <form class="navbar-form pull-right" action="/travels/add_new_trips">
        <button type="submit" class="btn btn-danger">Add Travel Plan</button>
    </form> 

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
