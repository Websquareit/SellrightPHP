<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.80.0">
  <title>Sell Right</title>
  <!-- Bootstrap core CSS -->
  <link rel="icon" href="<?php echo base_url()?>images/sell_right_logo.png" type="image/icon type">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/lightbox.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/font-awesome.min.css">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
    <header>
      </nav>
      <nav class="navbar navbar-light bg-dark">
        <a class="navbar-brand header-top" href="#">
        <img src="<?php echo base_url()?>images/sell_right_logo.png" title="logo" alt="">
        </a>
        <form class="form-inline">
          
        </form>
      </nav>
    </header>
      <form method="post" action="<?php echo base_url('index.php/welcome/register'); ?>" enctype="multipart/form-data">
  <div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Please sign up</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="username" id="first_name" class="form-control input-sm" placeholder="User Name" required="">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" required="">
			    						 <input type="hidden" name="pid" value="<?php echo  $proID; ?>">
			    					</div>
			    				</div>
			    			</div>


                                <div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    				<textarea type="address" name="address" id="address" class="form-control input-sm" placeholder="Address" required=""></textarea>
			    			</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="tel" name="number" id="WhatApp Number" class="form-control input-sm" placeholder="WhatApp Number enter like  123-45-678" required="" pattern="[0-9]{10}">
			    					</div>
			    				</div>
			    			</div>
			    		

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password" required="">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="file" name="image" id="WhatApp Number" class="form-control input-sm" placeholder="Profile Image" required="">
			    					</div>
			    				</div>
			    			</div>
			    			
			    			<input type="submit" value="Register" class="btn btn-info btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
    </form>
<script src="<?php echo base_url();?>/assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/lightbox.min.js"></script>
</body>
</html>