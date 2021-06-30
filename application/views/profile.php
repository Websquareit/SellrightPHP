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
  <link href="<?php echo base_url()?>assets/jquery.bxslider.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<body>
    <header>
      </nav>
      <nav class="navbar navbar-light bg-dark">
        <a class="navbar-brand header-top" href="#">
        <img src="<?php echo base_url()?>images/sell_right_logo.png" title="logo" alt="" >
        </a>
        <form class="form-inline">
          
        </form>
      </nav>
    </header>
      <form method="post" action="<?php echo base_url('index.php/welcome/update_user_profile'); ?>" enctype="multipart/form-data">
          <?php
          foreach($profile as $prd)
          { ?><center>
               <div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Profile</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="username" id="first_name" class="form-control input-sm" placeholder="User Name" value="<?php echo $prd['username'];?>" required="">
			                <input type="hidden" name="uid" value="<?php echo $prd['uid'];?>">
			                <input type="hidden" name="cid" value="<?php echo $cid;?>">
			                <input type="hidden" name="vid" value="<?php echo $vid;?>">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="email" name="email" id="email" class="form-control input-sm"  value="<?php echo $prd['email'];?>" placeholder="Email Address" required="">
			    						 
			    					</div>
			    				</div>
			    			</div>


                                <div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    				<textarea type="address" name="address" id="address" class="form-control input-sm"  value="<?php echo $prd['address'];?>" placeholder="Address" required=""><?php echo $prd['address'];?></textarea>
			    			</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="tel" name="number" id="WhatApp Number" class="form-control input-sm"  value="<?php echo $prd['number'];?>" placeholder="WhatApp Number enter like  123-45-678" required="" pattern="[0-9]{10}">
			    					</div>
			    				</div>
			    			</div>
			    		

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" value="<?php echo $prd['password'];?>" placeholder="Password" required="">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    					    <img src="<?php echo base_url('images/').$prd['image'];?>" name="img" value="<?php echo $prd['image'];?>" hright="200px" width="200px">
			    						<input type="file" name="image" id="WhatApp Number" class="form-control input-sm" placeholder="Profile Image" >
			    					</div>
			    				</div>
			    			</div>
			    			
			    			<input type="submit" value="Update" class="btn btn-info btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div></center>
         <?php }
          ?>
 
    </form>
<script src="<?php echo base_url();?>/assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/lightbox.min.js"></script>
</body>
</html>