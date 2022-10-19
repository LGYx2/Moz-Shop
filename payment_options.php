<div class="box"><!-- box start  -->
   
   <?php
    
        $customer_email = $_SESSION['customer_email'];
        
        $select_customer = "select * from customers where customer_email = '$customer_email'";
        
        $corre_customer = mysqli_query($con,$select_customer);
        
        $raiz_customer = mysqli_fetch_array($corre_customer);
        
        $customer_id = $raiz_customer['customer_id'];
        
        
    
    ?>
    
    <h1 class="text-center">Opções de Pagamento</h1>
    
    <p class="lead text-center"><!-- lead text-center start  -->
        
        <a href="order.php?c_id=<?php echo $customer_id ?>">Proceder Pagamento por serviços movéis </a>
        
    </p><!-- lead text-center end  -->
    
    <center><!--center start  -->
        
        <p class="lead"><!--lead start  -->
            
            <a href="#">
                
                Proceder Pagamento Por Cartão de Credito ou Débito
                
                <img src="images/paypal_img.png" alt="img-paypall" class="img-responsive">
                
            </a>
            
        </p><!--lead end  -->
        
    </center><!--center end  -->
    
    
</div><!-- box end  --> 