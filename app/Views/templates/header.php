<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
    <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  </style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url() ?>/home">Home</a></li>
        <li><a href="<?php echo base_url() ?>/product">Products</a></li>
        <li><a href="<?php echo base_url() ?>/category">Categories</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <?php if(!session('logged_in')){  ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url() ?>/login"><span class="glyphicon glyphicon-log-in"></span> Sign-up</a></li>
        <li><a href="<?php echo base_url() ?>/login/loginpage"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
      <?php }else{  ?>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url() ?>/login/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
        <?php } ?>
    </div>
  </div>
</nav>


