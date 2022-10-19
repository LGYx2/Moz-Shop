<?php 
    session_start();

    if(!isset($_SESSION['customer_email'])){
        
        echo "<script>window.open('../checkout.php','_self')</script>";
        
 
    }else{
    include("includes/db.php");
    include("functions/functions.php");
        
    if(isset($_GET['order_id'])){
        
        $order_id = $_GET['order_id'];
        
         $currenttime = date('d/m/y H:i:s');

        $get_order="select * from customer_orders where order_id='$order_id'";
        
        $run_order=mysqli_query($con,$get_order);
        
        $raw_order=mysqli_fetch_array($run_order);
        
        $invoice_no=$raw_order['invoice_no'];
        
        $due_amount=$raw_order['due_amount'];
        
    }else{
        
        $invoice_no=null;
        
        $due_amount=null;
        
    }  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Moz_eStore</title>
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
              <a href="../checkout.php"><?php items(); ?> Itens no seu carrinho | Preço Total : <?php total_price(); ?></a>
              
          </div><!--col-md-6 offer end-->
          
        <div class="col-md-6"><!--col-md-6 begin-->
           
            <ul class="menu"><!--menu begin-->
               <li>
                   <a href="../customer_register.php">Registro</a>
               </li>
               <li>
                   <a href="my_account.php?my_orders">Minha Conta</a>
               </li>
               <li>
                   <a href="../cart.php">Vá para o Carrinho </a>
               </li>
               <li>
                  
                  <?php
                  
                  if(isset($_SESSION['customer_name'])){
                      
                      
                      echo "<a href='../logout.php'> Log Out </a>";
                      
                      
                  }else{
                      
                      echo"<a href='../checkout.php'> Login </a>";

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
              
              <a href="../index.php" class="navbar-brand home"><!--navbar-brand home begin-->
                  
                  <img src="images/ecom-store-logo.png" alt="Moz-eStore logo" class="hidden-xs">
                  <img src="images/ecom-store-logo-mobile.png" alt="Moz-eStore logo mobile" class="visible-xs">
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
                          <a href="../index.php">Home</a>
                      </li>
                      <li class="<?php if($active=='Shop') echo"active"; ?>">
                          <a href="../shop.php">Loja</a>
                      </li>
                      <li class="<?php if($active=='Account') echo"active"; ?>">
                          <?php
                          
                          if(!isset($_SESSION['customer_name'])){
                              
                              
                              echo"<a href='../checkout.php'>Minha Conta</a>";
                              
                          }else{
                              
                              echo"<a href='my_account.php?my_orders'>Minha Conta</a>";
                              
                          }
                          
                          ?>
                      </li>
                      <li class="<?php if($active=='Cart') echo"active"; ?>">
                          <a href="../cart.php">Carrinho de compras</a>
                      </li>
                      <li class="<?php if($active=='Contact') echo"active"; ?>">
                          <a href="../contact.php">Contate-nos</a>
                      </li>
                       
                   </ul><!--nav navbar-nav left end-->
                   
               </div><!--padding-nav end-->

                                          
               <a href="../cart.php" class="btn navbar-btn btn-primary right"><!--btn navbar-btn btn-primary  begin-->
                  
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
                       <a href="../index.php">Home</a>
                   </li>
                   <li>
                      Minha Conta
                   </li>
               </ul><!--breadcrumb end-->
               
           </div><!--col-md-12 end-->
           
           <div class="col-md-3"><!--col-md-3 begin-->
              
         <?php
        
            include("includes/sidebar.php");
        
          ?>
               
           </div><!--col-md-3 end-->
           
           <div class="col-md-9"><!--col-md-9 begin-->
               
               
               <div class="box"><!--box begin-->
                   
                 <h1  align="center">Por favor confirme seu pagamento</h1>
                  
                  <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data"><!--form begin-->
                      
                      <div class="form-group"><!--form-group begin-->
                          
                          
                          <label> Fatura Nº: </label>
                          
                          <input type="text" class="form-control" name="invoice_no" value="<?php echo $invoice_no;?>" required>
                          
                      </div><!--form-group end-->
                      
                      <div class="form-group"><!--form-group begin-->
                          
                          
                          <label> Montante enviado: </label>
                          
                          <input type="text" class="form-control" name="amount_sent" value="<?php echo $due_amount;?>Mzn"required>
                          
                      </div><!--form-group end-->
                      
                      <div class="form-group"><!--form-group begin-->
                          
                          <label> Selecione Metodo de pagamento </label>
                          
                          <select name="payment_mode" class="form-control" required><!--form-control begin-->
                              
                              <option disabled selected> Selecione Metodo de pagamento: </option>
                              <option> Mpesa </option>
                              <option> mKesh </option>
                              <option> eMola </option>
                              <option> Ponto 24 </option>
 
                          </select><!--form-control end-->
                          
                      </div><!--form-group end-->
                      
                      <div class="form-group"><!--form-group begin-->
                          
                          
                          <label> Numero de Referência: </label>
                          
                          <input type="text" class="form-control" name="ref_no" required>
                          
                      </div><!--form-group end-->
                      
                      <div class="form-group"><!--form-group begin-->
                          
                          <label> Código de Transação: </label>
                          
                          <input type="text" class="form-control" name="code" required>
                          
                      </div><!--form-group end-->
                      
                      <div class="form-group"><!--form-group begin-->

                          
                          <label> Data de Pagamento: </label>
                          
                          <input type="text" class="form-control" name="date" value="<?php echo $currenttime?>" required>
                          
                      </div><!--form-group end-->
                      
                      <div class="text-center"><!--text-center begin-->
                          
                          <button class="btn btn-primary btn-lg" name="confirm_payment"><!--btn btn-primary btn-lg begin-->
                              
                              <i class="fa fa-user-md"></i> Confirmar Pagamento
                              
                              
                          </button><!--btn btn-primary btn-lg end-->
                          
                          
                      </div><!--text-center end-->
                      
                      
                      
                  </form><!--form end-->
                  
                  <?php 
                   
                   if(isset($_POST['confirm_payment'])){
                       
                       $update_id = $_GET['update_id'];
                       
                       $invoice_no = $_POST['invoice_no'];
                       
                       $amount_sent = $_POST['amount_sent'];
                       
                       $payment_mode = $_POST['payment_mode'];
                       
                       $ref_no = $_POST['ref_no'];
                       
                       $code = $_POST['code'];
                       
                       $payment_date = $_POST['date'];
                       
                       $complete = "Pago";
                       
                       $select_order = "select * from customer_orders where due_amount='$amount_sent' AND invoice_no='$invoice_no' AND order_id='$update_id'";
                       
                       $run_order = mysqli_query($con,$select_order);
    
                       $check_order = mysqli_num_rows($run_order);
                       
                       
                       if($check_order>0){
                           
                           $complete = "Pago";
                           
                           $update_id = $_GET['update_id'];
                       
                           $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no','$amount_sent','$payment_mode','$ref_no','$code','$payment_date')";

                           $run_payment = mysqli_query($con,$insert_payment);

                           $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";

                           $run_customer_order = mysqli_query($con,$update_customer_order);

                           $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";

                           $run_pending_order = mysqli_query($con,$update_pending_order);

                           if($run_pending_order){

                               echo "<script>alert('Obrigado por comprar conosco, a sua Encomenda será entregue em breve.')</script>";

                               echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                           }
                           
                       
                       }else{
                           
                           echo "<script>alert('Os dados inseridos estao incorrectos')</script>";

                           echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                           
                       }
                       
                   }
                   
                   
                   ?>
                   
               </div><!--box end-->
               
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
<?php } ?>