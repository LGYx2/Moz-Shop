<?php

session_start();

include("includes/db.php");
include("functions/functions.php");
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
   
