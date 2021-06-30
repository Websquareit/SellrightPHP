<! DOCTYPE html>  
<html>  
<head>  
    <title> Shopping Cart Design teamplate Using Bootstrap </title>  
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">  
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"> </script>  
        <link href="<?php echo base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/custom.css'?>"> --> 
</head>  
<body>  
    <div class="container main-section">  
        <div class="row">  
            <div class="col-lg-12 pb-2">  
                <h2> Order Detail </h2>  
            </div>  
            <div class="col-lg-12 pl-3 pt-3">  
                <table class="table table-hover border bg-white">  
                    <thead>  
                        <tr>  
                            <th> <h4> <b>  Product Details </b> </h4> </th>  
                            <th> <h4> <b> Price </h4> <b> </th>  
                            <th style="width:10%;"> <h4> <b> Quantity <b> </h4> </th>  
                            
                            <th> <h4> <b> Status <b> </h4> </th>  
                        </tr>  
                    </thead>
                    
                    <tbody>  
                    <?php foreach($orderdetail as $orded)
                    { ?>
                          <tr> 
                            <div class="sp-quantity">
                            <td>  
                                <div class="row">  
                                    <div class="col-lg-2 Product-img">  
                                        <img src="<?php echo base_url() . 'images/' . $orded['image'];?>" alt="..." class="img-responsive"/>  
                                    </div>  
                                    <div class="col-lg-10">  
                                        <h5 class="nomargin"> <b>  <?php echo $orded['product']; ?></b> </h5>  
                                        <p> <?php echo $orded['description']; ?> </p>  
                                    </div>  
                                </div>  
                            </td>  
                            
                            <td> <div class="product-price"><strong><?php  echo $orded['price']; ?> </strong> </div></td> 
                            <td> <div class="product-price"><strong><?php  echo $orded['qty']; ?> </strong> </div></td>
                             <td> <div class="product-price"><strong><?php  echo $orded['order_status']; ?> </strong> </div></td> 
                        </tr>
                  <?php  }
                    ?>
                          
                    </tbody>        
                      </div>  
    </div>  
</body>  
</html>