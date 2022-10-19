<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo"<script>window.open('login.php','_self')</script>";
    }else{

?>


<?php

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$raiz_customer = mysqli_fetch_array($run_customer);

$customer_id =  $raiz_customer['customer_id'];

$customer_name = $raiz_customer['customer_name'];

$customer_email = $raiz_customer['customer_email'];

$customer_city = $raiz_customer['customer_city'];

$customer_contact = $raiz_customer['customer_contact'];

$customer_address = $raiz_customer['customer_address'];

$customer_image = $raiz_customer['customer_image'];


?>



  <div class="row"><!--row begin--> 
      
      <div class="col-lg-12"><!--col-lg-12 begin-->
          
          <div class="panel panel-default"><!--panel panel-default begin-->
              
              <div class="panel-heading"><!--panel-heading begin-->
                  
                <h3 class="panel-title"><!--panel-title begin-->
                    
                    <i class="fa fa-money fa-fw"></i> Editar conta
                    
                </h3><!--panel-title end-->  
                  
              </div> <!--panel-heading end-->
            
              <div class="panel-body"> <!--panel-body begin-->



                    <form action="" method="post" enctype="multipart/form-data"><!-- form begin -->

                        <div class="form-group"><!-- form-group begin -->

                            <label> Nome:</label>

                            <input type="text" name="c_name" class="form-control" value="<?php echo $customer_name; ?>" required>

                        </div><!-- form-group end -->

                        <div class="form-group"><!-- form-group begin -->

                            <label> Email:</label>

                            <input type="text" name="c_email" class="form-control" value="<?php echo $customer_email; ?>"  required>

                        </div><!-- form-group end -->

                        <div class="form-group"><!-- form-group begin -->

                            <label> Cidade:</label>

                            <input type="text" name="c_city" class="form-control" value="<?php echo $customer_city; ?>"  required>

                        </div><!-- form-group end -->

                        <div class="form-group"><!-- form-group begin -->

                            <label> Contacto: </label>

                            <input type="text" name="c_contact" class="form-control" value="<?php echo $customer_contact; ?>"  required>

                        </div><!-- form-group end -->

                        <div class="form-group"><!-- form-group begin -->

                            <label> Endereço(ex: Av.Samora Machel, Maputo): </label>

                            <input type="text" name="c_address" class="form-control" value="<?php echo $customer_address; ?>"  required>

                        </div><!-- form-group end -->


                        <div class="form-group"><!-- form-group begin -->

                            <label> Imagem: </label>

                            <img class="img-responsive" src="../customer/customer_images/<?php echo $customer_image; ?> " alt="Costumer Image" >

                            <input type="file" name="c_image" class="form-control form-height-custom">

                        </div><!-- form-group end -->

                        <div class="text-center"><!-- text-center begin -->

                            <button name="update" class="btn btn-primary"><!-- btn btn-primary begin -->

                                <i class="fa fa-user-md"></i> Update now

                            </button><!-- btn btn-primary end -->

                        </div><!-- text-center end -->

                    </form><!-- form end -->
                    
              </div>
          </div>
      </div>
</div>
                    

<?php

    if(isset($_POST['update'])){

                        $update_id = $customer_id;

                        $c_name = $_POST['c_name'];

                        $c_email = $_POST['c_email'];

                        $c_city = $_POST['c_city'];

                        $c_address = $_POST['c_address'];

                        $c_contact = $_POST['c_contact'];

                        $c_image = $_FILES['c_image']['name'];

                        $c_image_tmp = $_FILES['c_image']['tmp_name'];

                        move_uploaded_file ($c_image_tmp,"../customer/customer_images/$c_image");

                        $update_customer_profile = "update customers set customer_name='$c_name',customer_email='$c_email',customer_city='$c_city',customer_address='$c_address',customer_contact='$c_contact',customer_image='$c_image' where customer_id='$update_id'";

                        $run_updated_customer = mysqli_query($con,$update_customer_profile);

                        if($run_updated_customer){

                            echo "<script>alert('A conta do cliente foi editada com sucesso')</script>";

                            echo "<script>window.open('index.php?view_customers','_self')</script>";
                        }


                    }


?>

<?php }?>


