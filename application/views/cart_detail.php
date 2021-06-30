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
                <h2> Cart Detail </h2>  
            </div>  
            <div class="col-lg-12 pl-3 pt-3">  
                <table class="table table-hover border bg-white">  
                    <thead>  
                        <tr>  
                            <th> <h4> <b>  Product Details </b> </h4> </th>  
                            <th> <h4> <b> Price </h4> <b> </th>  
                            <th style="width:10%;"> <h4> <b> Quantity <b> </h4> </th>  
                            <th> <h4> <b> Subtotal <b> </h4> </th>  
                            <th> <h4> <b> Action <b> </h4> </th>  
                        </tr>  
                    </thead> 
                    <?php
                   
                        foreach($cart as $data)
                        { ?>
                    <tbody>  
                            <tr>  
                            <div class="sp-quantity">
                            <td>  
                                <div class="row">  
                                    <div class="col-lg-2 Product-img">  
                                        <img src="<?php echo base_url() . 'images/' . $data['image'];?>" alt="..." class="img-responsive"/>  
                                    </div>  
                                    <div class="col-lg-10">  
                                        <h5 class="nomargin"> <b>  <?php echo $data['product']; ?></b> </h5>  
                                        <p> <?php echo $data['description']; ?> </p>  
                                    </div>  
                                </div>  
                            </td>  
                            
                            <td> <div class="product-price"><strong><?php  echo $data['price']; ?> </strong> </div></td>  
                            <td data-th="Quantity">  
                                <b> <span class="input-group-btn">
              <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]" onclick="qtychng(<?php echo $data["cart_id"]; ?>)" min="1" >
                <span class="glyphicon glyphicon-minus"></span>
              </button>
          </span>
          <input type="text" class="form-control text-center quntity-input"  name="quantity"   value="<?php echo $data["qty"]; ?>" > 
          <span class="input-group-btn">
              <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]" onclick="qtychngplu(<?php echo $data["cart_id"]; ?>)"max="100">
                  <span class="glyphicon glyphicon-plus"></span>
              </button>
          </span>
          </b>  
                              
         
                            </td>  
                            <td> <strong><?php  $sub_tl= $data['price']*$data['qty']; echo $sub_tl;?> </strong> </td>  
                            <td class="actions" data-th="" style="width:10%;">  
                               <!-- <button class="btn btn-info btn-sm"> <span class="glyphicon glyphicon-shopping-cart"> </span> </button>  -->
                                <button class="btn btn-danger btn-sm" onclick="delete_addcart(<?php echo $data["cart_id"]; ?>)"> <i class="fa fa-trash-o"> </i> </button>   
                            </td>  
                            </div>
                        </tr>  
                      
                  
                        
                        
                    </tbody>  
                    <tfoot>  
                        <tr>  
                        


                            
                        </tr>  
                    </tfoot>  
                    <?php   }
                    ?>
                    <td> <a href="javascript:history.go(-1)" class="btn btn-success"><!--<a href="<?php  echo base_url('index.php/welcome/catlog?cid='.$data['cid'].'&vid=' . $data['vid'])?>" class="btn btn-success ">--> <i class="fa fa-angle-left"> </i> Continue Shopping </a> </td>  
                            <td colspan="2" class="hidden-xs"> </td>  
                           <!-- <td class="hidden-xs text-center" style="width:10%;"> <strong> Total Price : 1,30,000 </strong> </td>  -->
                            <td> <a href="<?php echo base_url();?>index.php/welcome/checkout" class="btn btn-success btn-block"> Checkout <i class="fa fa-angle-right"> </i> </a> </td>  
                </table>  
            </div>  
        </div>  
    </div>  
</body>  
</html>
<script>
    function delete_addcart(id)
{

   var xmlhttp=new XMLHttpRequest();
   xmlhttp.open("GET","<?php echo base_url();?>index.php/welcome/delete_cartdel?cart_id="+id,false);
   xmlhttp.send(null);
    var a=xmlhttp.responseText;
    
    if(a=='')
    {
         location.reload();
    }
   
}
</script>
<script src="myScript.js"></script>
<script type="text/javascript">

function qtychng(id)
{
    
  var xmlhttp=new XMLHttpRequest();
   xmlhttp.open("GET","<?php echo base_url();?>index.php/welcome/update_qty?cart_id="+id,false);
   xmlhttp.send(null);
    var a=xmlhttp.responseText;
      if(a=='')
    {
         location.reload();
    }
}
function qtychngplu(id)
{
     var xmlhttp=new XMLHttpRequest();
   xmlhttp.open("GET","<?php echo base_url();?>index.php/welcome/update_qtyplus?cart_id="+id,false);
   xmlhttp.send(null);
    var a=xmlhttp.responseText;
      if(a=='')
    {
         location.reload();
    }
}
</script>