<?php 
    $active='Account';
    include("includes/header.php");

?>
   
   
   <div id="content"><!--content begin-->
       <div class="container"><!--container begin-->
           <div class="col-md-12"><!--col-md-12 begin-->
               
               <ul class="breadcrumb"><!--breadcrumb begin-->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Registrar
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
                  
                  <div class="box-header"><!--box-header begin-->
                      
                      <center><!--center begin-->
                          
                          <h2>Registre uma nova conta</h2>
                          
                      </center><!--center end-->
                      
                      <form action="customer_register.php" method="post" enctype="multipart/form-data"><!--form begin-->
                          
                          <div class="form-group"><!--form-group begin-->
                              
                              <label>Nome</label>
                              
                              <input type="text" class="form-control" name="c_name" maxlength="15" required>
                              
                              
                          </div><!--form-group end-->
                          
                          <div class="form-group"><!--form-group begin-->
                              
                              <label>Email</label>
                              
                              <input type="text" class="form-control" name="c_email" required>
                              
                              
                          </div><!--form-group end-->
                          
                          <div class="form-group"><!--form-group begin-->
                              
                              <label>Palavra-Passe</label>
                              
                              <input type="password" class="form-control" name="c_pass" required>
                              
                              
                          </div><!--form-group end-->

                          
                          <div class="form-group"><!--form-group begin-->
                              
                              <label>Cidade(Apenas Maputo, Matola, Boane)</label>
                              
                              <input type="text" class="form-control" name="c_city" required>
                              
                              
                          </div><!--form-group end-->
                          
                          <div class="form-group"><!--form-group begin-->
                              
                              <label>Contacto</label>
                              
                              <input type="text" class="form-control" name="c_contact" required>
                              
                              
                          </div><!--form-group end-->
                          
                          <div class="form-group"><!--form-group begin-->
                              
                              <label>Endereço(example: Av. 24 de Julho, Maputo)</label>
                              
                              <input type="text" class="form-control" name="c_address" required>
                              
                              
                          </div><!--form-group end-->
                          
                          <div class="form-group"><!--form-group begin-->
                              
                              <label>Foto de Perfil</label>
                              
                              <input type="file" class="form-control form-height-custom" name="c_image" required>
                              
                              
                          </div><!--form-group end-->
                          
                          <div class="text-center"><!--text-center begin-->
                              
                              <button type="submit" name="register" class="btn btn-primary">
                              
                              <i class="fa fa-sign-in"></i> Registrar
                              
                              </button>
                              
                          </div><!--text-center end-->
                          
                          
                      </form><!--form end-->
                      
                      
                      
                  </div><!--box-header end-->
                  
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


<?php 

if(isset($_POST['register'])){
    
    $c_name = $_POST['c_name'];
    
    $c_email = $_POST['c_email'];
    
    $c_pass = $_POST['c_pass'];
    
    $c_city = $_POST['c_city'];
    
    $c_contact = $_POST['c_contact'];
    
    $c_address = $_POST['c_address'];
    
    $c_image = $_FILES['c_image']['name'];
    
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    
    $c_ip = getRealIpUser();
    
    $select_customer = "select * from customers where customer_email='$c_email'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $check_customer = mysqli_num_rows($run_customer);
    
    if($check_customer>0){
        
        echo "<script>alert('Este e-mail já possui uma conta')</script>";
        
        exit();
        
    }else{
    
        move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

        $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_city,customer_contact,customer_address,customer_image,customer_ip) values ('$c_name','$c_email','$c_pass','$c_city','$c_contact','$c_address','$c_image','$c_ip')";

        $run_customer = mysqli_query($con,$insert_customer);

        $sel_cart = "select * from cart where ip_add='$c_ip'";

        $run_cart = mysqli_query($con,$sel_cart);

        $check_cart = mysqli_num_rows($run_cart);

        if($check_cart>0){

                $_SESSION['customer_email']=$c_email;

                $_SESSION['customer_name']=$c_name;

                echo "<script>alert('Você foi registrado com sucesso')</script>";

                echo "<script>window.open('checkout.php','_self')</script>";
            }else{

         /// if register without items in cart

        $_SESSION['customer_email']=$c_email;

        $_SESSION['customer_name']=$c_name;

        echo "<script>alert('Você foi registrado com sucesso')</script>";

        echo "<script>window.open('index.php','_self')</script>";

            }
     }
}



?>