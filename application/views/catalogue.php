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
<style>
.lightbox-gallery .bx-viewport {
    height: 275px !important;
}
.slider-wrapper {
    display: flex;
    justify-content: center;
    align-content: center;
}
.slider_1 {
    margin: 0 15px;
}
.slider_2 {
    margin: 0 15px;
}
.lightbox-gallery .bx-viewport img {
    height: 100%;
}
.lightbox-gallery .bx-wrapper {
    margin-bottom: 10px;
}
.lightbox-gallery .product-details {
    padding: 20px 10px 20px 0;
}
</style>
<body>
    <header>
      </nav>
      <nav class="navbar navbar-light bg-dark">
        <a class="navbar-brand header-top" href="#">
        <img src="<?php echo base_url()?>images/sell_right_logo.png" title="logo" alt="" >
        </a>
        <form class="form-inline">
 <div class="dropdown">
  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Profile
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="<?php echo base_url('index.php/welcome/profile?cid='.$_GET["cid"].'&vid='.$_GET["vid"])?>">Profile</a>
    <a class="dropdown-item" href="<?php echo base_url('index.php/welcome/order_view')?>">My Order</a>
   
  </div>
</div>
          <a class="btn btn-outline-light" href='<?php echo base_url('index.php/welcome/getcartdtl')?>'><i class="fa fa-shopping-cart"></i></a>
        </form>
         
          
        
      </nav>
    </header>
    <section>
    <div class="lightbox-gallery">
      <div class="container-fluid">
        <div class="intro">
          <h2 class="text-center">Sell Right</h2>
          <p class="text-center"><?php echo $count;?> items</p>
        </div>
        
            <div class="slider-wrapper">
                
                <?php  $i=0; foreach($cat_prdct as $data)
        { $i++;
            ?>
          <div class="slider_<?php echo $i;?>">
    <ul class="bxslider">    
  
  <li class="bxslider-image"><img src="<?php echo  base_url(). 'images/' .$data['image_1'] ?>" /></li>
   <li class="bxslider-image"><img src="<?php echo  base_url(). 'images/' .$data['image_2'] ?>" /></li>
  <li class="bxslider-image"><img src="<?php echo  base_url(). 'images/' .$data['image_3'] ?>" /></li>
  <li class="bxslider-image"><img src="<?php echo  base_url(). 'images/' .$data['image_4'] ?>" /></li>
   <li class="bxslider-image"><img src="<?php echo  base_url(). 'images/' .$data['image_5'] ?>" /></li>
</ul>
   
             
              <div class="product-details">
                <h5 class="product-name"><?php echo $data['product_name']?></h5>
                <p class="product-price"><?php echo $data['price']?></p>
                <a href="<?php echo base_url('index.php/welcome/addToCart/'.$data['pid']); ?>" class="btn btn-warning">Add to Cart</a>
              </div>
           </div>
          
            <?php    }
        ?>
        </div></div>
  
        
      </div>
    </div>
    </section>
<script src="<?php echo base_url();?>/assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/lightbox.min.js"></script>
<script src="<?php echo base_url()?>assets/jquery-3.1.1.min.js"></script>
<!-- bxSlider Javascript file -->
<script src="<?php echo base_url();?>assets/jquery.bxslider.js"></script>
<script>
	$(document).ready(function(){
		$('.bxslider').bxSlider({
			mode: 'horizontal',
			moveSlides: 1,
			slideMargin: 40,
			infiniteLoop: true,
			slideWidth: 500,
			minSlides: 1,
			maxSlides: 1,
			speed: 50,
			pager:false,
			auto:true,
		});
	});
	

</script>

</body>
</html>