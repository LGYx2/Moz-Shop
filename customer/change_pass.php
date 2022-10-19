<h1 align="center"> Mudar Palavra passe </h1>


<form action="" method="post"><!-- form begin -->
    
    <div class="form-group"><!-- form-group begin -->
        
        <label> Palavra-passe Actual</label>
        
        <input type="text" name="old_pass" class="form-control" required>
        
    </div><!-- form-group end -->
    
    <div class="form-group"><!-- form-group begin -->
        
        <label> Nova Palavra-passe: </label>
        
        <input type="text" name="new_pass" class="form-control" required>
        
    </div><!-- form-group end -->
    
    <div class="form-group"><!-- form-group begin -->
        
        <label> Confirmar nova Palavra-passe: </label>
        
        <input type="text" name="new_pass_again" class="form-control" required>
        
    </div><!-- form-group end -->
    
    <div class="text-center"><!-- text-center begin -->
        
        <button type="submit" name="submit" class="btn btn-primary"><!-- btn btn-primary begin -->
            
            <i class="fa fa-user-md"></i> Actualizar
            
        </button><!-- btn btn-primary end -->
        
    </div><!-- text-center end -->
    
</form><!-- form end -->


<?php

if(isset($_POST['submit'])){

    $c_email = $_SESSION['customer_email'];
    
    $c_old_pass = $_POST['old_pass'];
    
    $c_new_pass = $_POST['new_pass'];
    
    $c_new_pass_again = $_POST['new_pass_again'];
    
    $sel_c_old_pass = "select * from customers where customer_pass='$c_old_pass'";
    
    $run_c_old_pass = mysqli_query($con,$sel_c_old_pass);
    
    $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);
    
    if($check_c_old_pass==0){
        
        echo "<script>alert('Desculpe, a palavra-passe é invalida. Por favor, tente de novo.'</script>";
        
        exit();
        
    }
    
    if($c_new_pass!=$c_new_pass_again){
        
        echo "<script>alert('Desculpe, a sua nova plavra-passe nao conscide')</script>";
        
        exit();
    }
    
    $update_c_pass = "update customers set customer_pass='$c_new_pass' where customer_email='$c_email'";
    
    $run_c_pass = mysqli_query($con,$update_c_pass);
    
    if($run_c_pass){
        
        echo "<script>alert('A sua palavra-passe foi actualizada')</script>";
        
        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    }
}


?>