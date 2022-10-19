<div class ="box"><!--box start-->
    
    <div class="box-header"><!--box-header start-->
        
        <center> <!--center start-->
            
            <h1> Login </h1>
            
            <p class="lead">Já tem a nossa conta?</p>
            
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam laboriosam veniam odit, qui, quo illo quis autem eos dolor a expedita commodi assumenda odio rem ipsa eaque fugit? Debitis, facere.</p>
            
        </center><!--center end-->
        
    </div><!--box-header end-->
    
    <form method="post" action="checkout.php"><!--form  start-->
       
       <div class="form-group"><!--form-group  start-->
            
            <label>Nome</label>
            
            <input name="c_name" type="text" class="form-control" required>
        </div><!--form-group  end-->
        
        <div class="form-group"><!--form-group  start-->
        
        <div class="form-group"><!--form-group  start-->
            
            <label>Email</label>
            
            <input name="c_email" type="text" class="form-control" required>
        </div><!--form-group  end-->
        
        <div class="form-group"><!--form-group  start-->
            
            <label>Palavra-passe</label>
            
            <input name="c_pass" type="password" class="form-control" required>
        </div><!--form-group  end-->
        
        <div class="text-center"><!--text-center  start-->
            
            <p>
              <button name ="login" value="Login" class="btn btn-primary">
               
               <i class="fa fa-user"></i> Login
               
              </button>
            
              <a class='btn btn-primary' href="customer_register.php">

                <i class='fa fa-sign-in'></i> Registar

              </a>
            </p>
            
        </div><!--text-center  end-->
        
        </div>      <!--form  end-->
    </form>
    
</div><!--box end-->


<?php

if(isset($_POST['login'])){
    
    $customer_email = $_POST['c_email'];
    
    $customer_pass = $_POST['c_pass'];
    
    $customer_name = $_POST['c_name'];

    $select_customer = "select * from customers where customer_email ='$customer_email' AND customer_pass='$customer_pass' AND customer_name='$customer_name'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $get_ip = getRealIpUser();
    
    $check_customer = mysqli_num_rows($run_customer);
    
    $select_cart = "select * from cart where ip_add='$get_ip'";
    
    $run_cart = mysqli_query($con,$select_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_customer==0){
        
        echo"<script>alert('O seu nome, email ou palavra passe estao errados')</script>";
        
        exit();
        
    }
    
    if($check_customer==1 AND $check_cart ==0){
        
        $_SESSION['customer_email']=$customer_email;
        
        $_SESSION['customer_name']=$customer_name;
        
        echo"<script>alert('voce esta logado')</script>";
        
        echo"<script>window.open('customer/my_account.php?my_orders','_self')</script>";
        
    }else{
        
       $_SESSION['customer_email']=$customer_email;
        
       $_SESSION['customer_name']=$customer_name;
        
        echo"<script>alert('voce esta logado')</script>";
        
        echo"<script>window.open('checkout.php','_self')</script>";
        
        
    }
    
}



?>