
<center><!-- Center begin -->
    
   <h1> Deseja realmente deletar a sua conta?</h1>
   
    <form action="" method="post"><!-- form begin -->
        
        <input type="submit" name="Yes" value="Sim, quero deletar" class="btn btn-danger">
        <input type="submit" name="No" value="Não, não quero deletar" class="btn btn-primary">

    </form><!-- form end -->
    
</center><!-- Center end -->

<?php

$c_email = $_SESSION['customer_email'];

if(isset($_POST['Yes'])){
    
    $delete_customer = "delete from customers where customer_email='$c_email'";
    
    $run_delete_customer = mysqli_query($con,$delete_customer);
    
    if($run_delete_customer){
        
        session_destroy();
        
        echo "<script>alert('A sua conta foi deletada com sucesso')</script>";
        
        echo "<script>window.open('../index.php','_self')</script>";
    }
    
    
}

if(isset($_POST['No'])){
    
    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
}
?>
