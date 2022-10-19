<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu begin-->
    
    <?php
    
    $customer_n_session = $_SESSION['customer_name'];
    
    $customer_session = $_SESSION['customer_email'];
    
    $get_customer = "select * from customers where customer_email = '$customer_session' AND customer_name='$customer_n_session'";
    
    $run_customer = mysqli_query($con,$get_customer);
    
    $row_customer = mysqli_fetch_array($run_customer);
    
    $customer_image = $row_customer['customer_image'];
    
    $customer_name = $row_customer['customer_name'];
    
    
    if(!isset($_SESSION['customer_email'])){
        
    }else{
        
        echo"
        
            <center> <img src='customer_images/$customer_image' class='img-responsive'> </center>
            
            <br>
            
            <h3 class='panel-title' align='center'> Nome: $customer_name </h3>
        
        
        ";
    }
    
    
    ?>
    
    <div class="panel-body"><!-- panel-body begin-->
        
        <nav class="nav-pills nav-stacked nav"><!-- nav-pills nav-stacked-nav begin-->
            
            <li class="<?php if(isset($_GET['my_orders'])){echo"active";}?>">
                
                <a href="my_account.php?my_orders">
                   <i class="fa fa-list"></i> Encomendas
                </a>
                    
                
                
            </li>
            
            <li class="<?php if(isset($_GET['pay_offline'])){echo"active";}?>">
                
                <a href="my_account.php?pay_offline">
                   <i class="fa fa-bolt"></i> Serviços Moveis
                </a>
                    
                
                
            </li>
            
            <li class="<?php if(isset($_GET['edit_account'])){echo"active";}?>">
                
                <a href="my_account.php?edit_account">
                   <i class="fa fa-pencil"></i> Editar Conta
                </a>
                    
                
                
            </li>
            
            <li class="<?php if(isset($_GET['change_pass'])){echo"active";}?>">
                
                <a href="my_account.php?change_pass">
                   <i class="fa fa-user"></i> Mudar Palavra-passe
                </a>
                    
                
                
            </li>
            
            <li class="<?php if(isset($_GET['delete_account'])){echo"active";}?>">
                
                <a href="my_account.php?delete_account">
                   <i class="fa fa-trash-o"></i> Deletar conta
                </a>
                    
                
                
            </li>
            
            <li>
                
                <a href="../logout.php">
                   <i class="fa fa-sign-out"></i> Log out
                </a>
                    

            </li>
            
        </nav><!-- nav-pills nav-stacked-nav end-->
        
    </div><!-- panel-body end-->
    
</div><!-- panel panel-default sidebar-menu end-->