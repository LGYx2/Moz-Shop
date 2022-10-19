<?php 

session_start();
$active='Shop';
include("includes/db.php");
include("functions/functions.php");
?>

<?php 

if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from products where product_id='$product_id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_product = mysqli_fetch_array($run_product);
    
    $p_cat_id = $row_product['p_cat_id'];
    
    $pro_title = $row_product['product_title'];
    
    $pro_price = $row_product['product_price'];
    
    $pro_desc = $row_product['product_desc'];
    
    $pro_img1 = $row_product['product_img1'];
    
    $pro_img2 = $row_product['product_img2'];
    
    $pro_img3 = $row_product['product_img3'];
    
    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
    
    $run_p_cat = mysqli_query($con,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $p_cat_title = $row_p_cat['p_cat_title'];
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Moz Shop</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div id="top"><!--Top begin-->
     
      <div class="container"><!--container begin-->
          <div class="col-md-6 offer"><!--col-md-6 begin-->
              <a href="#" class="btn btn-success btn-sm">
                  
                  <?php
                  
                  if(isset($_SESSION['customer_name'])){
                      
                      
                      echo"Bem-vindo: ".$_SESSION['customer_name']."";
                      
                      
                  }else{
                      
                      echo"Bem-vindo: Convidado";

                  }
                  
                  
                  ?>
                  
              </a>
              <a href="checkout.php"> <?php items(); ?> Itens no seu carrinho | Preço Total : <?php total_price(); ?> </a>
              
          </div><!--col-md-6 offer end-->
          
        <div class="col-md-6"><!--col-md-6 begin-->
           
            <ul class="menu"><!--menu begin-->
               <li>
                   <a href="customer_register.php">Registro</a>
               </li>
               <li>
                   <a href="customer/my_account.php?my_orders">Minha Conta</a>
               </li>
               <li>
                   <a href="cart.php">Vá para o Carrinho </a>
               </li>
               <li>
                  
                  <?php
                  
                  if(isset($_SESSION['customer_email'])){
                      
                      
                      echo "<a href='logout.php'> Log Out </a>";
                      
                      
                  }else{
                      
                      echo"<a href='checkout.php'> Login </a>";

                  }
                  
                  
                  ?>
                        
               </li>
                
            </ul><!--menu end-->
            
        </div><!--col-md-6 end-->
      </div><!--container end-->
      
      
  </div><!--Top End-->
   
    <div id="navbar" class="navbar navbar-default"><!--Navbar navbar default begin-->
       <div class="container"><!--container begin-->
           
           <div class="navbar-header"><!--navbar-head begin-->
              
              <a href="index.php" class="navbar-brand home"><!--navbar-brand home begin-->
                  
                  <img src="images/ecom-store-logo.png" alt="Moz Shop logo" class="hidden-xs">
                  <img src="images/ecom-store-logo-mobile.png" alt="Moz Shop logo mobile" class="visible-xs">
              </a><!--navbar-brand home end-->
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                  <span class="sr-only">Toggle Navigation</span>
                  
                  <i class="fa fa-align-justify"></i>
                   
               </button>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                  <span class="sr-only">Toggle Search</span>
                  
                  <i class="fa fa-search"></i>
                   
               </button>
           </div><!--navbar-head end-->
           <div class="navbar-collapse collapse" id="navigation"><!--navbar-collapse collapse begin-->
               
               <div class="padding-nav"><!--padding-nav begin-->
                   
                   <ul class="nav navbar-nav left"><!--nav navbar-nav left begin-->
                      <li class="<?php if($active=='Home') echo"active"; ?>">
                          <a href="index.php">Home</a>
                      </li>
                      <li class="<?php if($active=='Shop') echo"active"; ?>">
                          <a href="shop.php">Loja</a>
                      </li>
                      <li class="<?php if($active=='Account') echo"active"; ?>">
                          <?php
                          
                          if(!isset($_SESSION['customer_email'])){
                              
                              
                              echo"<a href='checkout.php'>Minha Conta</a>";
                              
                          }else{
                              
                              echo"<a href='customer/my_account.php?my_orders'>Minha Conta</a>";
                              
                          }
                          
                          ?>
                      </li>
                      <li class="<?php if($active=='Cart') echo"active"; ?>">
                          <a href="cart.php">Carrinho de compras</a>
                      </li>
                      <li class="<?php if($active=='Contact') echo"active"; ?>">
                          <a href="contact.php">Contate-nos</a>
                      </li>
                       
                   </ul><!--nav navbar-nav left end-->
                   
               </div><!--padding-nav end-->

                                          
               <a href="cart.php" class="btn navbar-btn btn-primary right"><!--btn navbar-btn btn-primary  begin-->
                  
                        <i class="fa fa-shopping-cart"></i>

                        <span><?php items(); ?> Itens no seu carrinho</span>

               </a><!--btn navbar-btn btn-primary  end-->
            
               <div class="navbar-collapse collapse right"><!--navbar-collapse collapse right begin-->
               
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!--btn btn-primary navbar-btn begin-->
                       <span class="sr-only">Toggle Search</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button><!--btn btn-primary navbar-btn end-->
               </div><!--navbar-collapse collapse right end-->

               
               <div class="collapse clearfix" id="search"><!--collapse clearfix begin-->
                  
                  <form method="get" action="result.php" class="navbar-form"><!--navbar-form begin-->
                      
                      <div class="input-group"><!--input-group begin-->
                          
                          <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                          
                          <span class="input-group-btn"><!--input-group-btn begin-->
                             
                              <button type="submit" name="search" value="search" class="btn btn-primary"><!--btn btn-primary begin-->

                                  <i class="fa fa-search"></i>

                              </button><!--btn btn-primary end-->
                              
                          </span><!--input-group-btn end-->
                          
                      </div><!--input-group end-->
                      
                  </form><!--navbar-form end-->
                   
               </div><!--collapse clearfix end-->
               
           </div><!--navbar-collapse collapse end-->
           
           
       </div><!--container end-->
       
   </div><!--Navbar navbar default end-->
   

   
   
   <div id="content"><!--content begin-->
       <div class="container"><!--container begin-->
           <div class="col-md-12"><!--col-md-12 begin-->
               
               <ul class="breadcrumb"><!--breadcrumb begin-->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Loja
                   </li>
                   
                   <li>
                       
                       <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
                   </li>
                   
                   <li> <?php echo $pro_title; ?> </li>
                   
               </ul><!--breadcrumb end-->
               
           </div><!--col-md-12 end-->
           
           <div class="col-md-3"><!--col-md-3 begin-->
              
               <?php
        
                        include("includes/sidebar.php");
        
                ?>
               
           </div><!--col-md-3 end-->
           
           <div class="col-md-9"><!--col-md-9 begin-->
               <div id="productMain" class="row"><!--row begin-->
                   <div class="col-sm-6"><!--col-sm-6 begin-->
                       <div id="mainImage"><!--#mainImage begin-->
                           <div id="myCarousel" class="carousel slide" data-ride="carousel"><!--carousel slide begin-->
                               <ol class="carousel-indicators"><!--carousel-indicators begin-->
                                   <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                   <li data-target="#myCarousel" data-slide-to="1"></li>
                                   <li data-target="#myCarousel" data-slide-to="2"></li>
                               </ol><!--carousel-indicators end-->
                               
                               
                               <div class="carousel-inner">
                                   <div class="item active">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 1a"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive"  src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 1b"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 1c"></center>
                                   </div>
                               </div>
                               
                               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!--left carousel-control begin-->
                                   <span class="glyphicon glyphicon-chevron-left"></span>
                                   <span class="sr-only">Previous</span>
                               </a><!--left carousel-control end-->
                                  
                               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!--right carousel-control begin-->
                                   <span class="glyphicon glyphicon-chevron-right"></span>
                                   <span class="sr-only">Next</span>
                               </a><!--right carousel-control end-->
                               
                               
                           </div><!--carousel slide end-->
                       </div><!--#mainImage end-->
                   </div><!--col-sm-6 end-->
                   
                   <div class="col-sm-6"><!--col-sm-6 begin-->
                       <div class="box"><!--box begin-->
                           <h2 class="text-center"><?php echo $pro_title; ?></h2>
                           
                           <?php add_cart(); ?>
                           
                           <form action="details.php?add_cart=<?php echo $product_id ; ?>" class="form-horizontal" method="post"><!--form-horizontal begin-->
                               <div class="form-group"><!--form-group begin-->
                               
                                   <label for="" class="col-md-5 control-label">Quantidade</label>
                                   
                                   <div class="col-md-7"><!--col-md-7 begin-->
                                           <select name="product_qty" id="" class="form-control"><!--select form-control begin-->
                                               <option>1</option>
                                               <option>2</option>
                                               <option>3</option>
                                               <option>4</option>
                                               <option>5</option>
                                           </select><!--select form-control end-->
                                   </div><!--col-md-7 end-->
                               
                               </div><!--form-group end-->
                               <?php getproshoes() ?>
                               
                               <p class="price"><?php echo $pro_price; ?>Mzn</p>
                               
                               <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Add ao Carrinho </button></p>
                               
                               
                           </form><!--form-horizontal end-->
                           
                           
                       </div><!--box end-->
                       
                       <div class="row" id="thumbs"><!--row begin-->
                           
                           <div class="col-xs-4"><!--col-xs-4 begin-->
                               <a data-target="#myCarousel" data-slide-to="0"  href="#" class="thumb"><!--thumb begin-->
                                   <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 1" class="img-responsive">
                               </a><!--thumb end-->
                           </div><!--col-xs-4 end-->
                           
                           <div class="col-xs-4"><!--col-xs-4 begin-->
                               <a data-target="#myCarousel" data-slide-to="1"  href="#" class="thumb"><!--thumb begin-->
                                   <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 1" class="img-responsive">
                               </a><!--thumb end-->
                           </div><!--col-xs-4 end-->
                           
                           <div class="col-xs-4"><!--col-xs-4 begin-->
                               <a data-target="#myCarousel" data-slide-to="2"  href="#" class="thumb"><!--thumb begin-->
                                   <img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 1" class="img-responsive">
                               </a><!--thumb end-->
                           </div><!--col-xs-4 end-->
 
                           
                       </div><!--row end-->
                       
                       
                       
                   </div><!--col-sm-6 end-->
                   
               </div><!--row end-->
                
               <div class="box" id="details"><!--Box begin-->
                   
                   <h4>Detalhes</h4>

                   <p>
                       <?php echo $pro_desc; ?>
                            
                   </p>
                   
         
                   <hr>
                   
                   
               </div><!--Box end-->
               
               <div id="rowsame-heigh-row"><!--#rowsame-heigh-row begin-->
                   <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 begin-->
                       <div class="box same-height headline"><!--box same-height headline begin-->
                           <h3 class="text-center">Products You May Like</h3>
                       </div><!--box same-height headline end-->
                   </div><!--col-md-3 col-sm-6 end-->
                   
                <?php 
                   
                $get_products = "select * from products order by rand() LIMIT 0,3";
                   
                $run_products = mysqli_query($con,$get_products);
                   
                while($row_products=mysqli_fetch_array($run_products)){
                    
                    $pro_id = $row_products['product_id'];
                    
                    $pro_title = $row_products['product_title'];
                    
                    $pro_img1 = $row_products['product_img1'];
                    
                    $pro_price = $row_products['product_price'];
                    
                    echo "
                    
                    <div class='col-md-3 col-sm-6 center-responsive'>
                    
                        <div class='product same-height'>
                        
                            <a href='details.php?pro_id=$pro_id'>
                            
                                <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                
                            </a>
                            
                            <div class='text'>
                            
                                <h3> <a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                                
                                <p class='price'> $pro_price Mzn </p>
                            
                            </div>
                    
                        </div>
                    
                    </div>
                    
                    ";
                }
                   
                   
                   ?>
                   
               </div><!--#rowsame-heigh-row end-->
               
           </div><!--col-md-9 end-->
           
       </div><!--container end-->
   </div><!--content end-->
   
   
    <?php
        
        include("includes/footer.php");
        
    ?>
      

      
      
      
   <script src="js/jquery-331.min.js"></script>
   <script src="js/bootstrap-337.min.js"></script>
   
    
</body>
</html>


