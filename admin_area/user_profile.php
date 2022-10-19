<?php

    if(!isset($_SESSION['admin_email'])){

            echo"<script>window.open('login.php','_self')</script>";
        }else{



?>
   
<?php
    
    $admin_session = $_SESSION["admin_email"];
        
        $get_admin = "select * from admins where admin_email='$admin_session'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $row_admin = mysqli_fetch_array($run_admin);
        
        $admin_id = $row_admin['admin_id'];
        
        $admin_name = $row_admin['admin_name'];
        
        $admin_email = $row_admin['admin_email'];
        
        $admin_image = $row_admin['admin_image'];
        
        $admin_country = $row_admin['admin_country'];
        
        $admin_about = $row_admin['admin_about'];
        
        $admin_contact = $row_admin['admin_contact'];
        
        $admin_job = $row_admin['admin_job'];
        
        $admin_pass = $row_admin['admin_pass'];

?>
    
  <div class="row"><!--row begin-->
      
      <div class="col-lg-12"><!--col-lg-12 begin-->
          
          <ol class="breadcrumb"><!--breadcrumb begin-->
              
              <li class="active"><!--active begin-->
                  
                  <i class="fa fa-dashboard"></i> Painel / Editar Usuario
                  
              </li><!--active end-->
              
          </ol><!--breadcrumb end-->
          
      </div><!--col-lg-12 end-->
      
      
  </div><!--row end-->  
    
  <div class="row"><!--row begin--> 
      
      <div class="col-lg-12"><!--col-lg-12 begin-->
          
          <div class="panel panel-default"><!--panel panel-default begin-->
              
              <div class="panel-heading"><!--panel-heading begin-->
                  
                <h3 class="panel-title"><!--panel-title begin-->
                    
                    <i class="fa fa-money fa-fw"></i> Editar Usuario
                    
                </h3><!--panel-title end-->  
                  
              </div> <!--panel-heading end-->
            
              <div class="panel-body"> <!--panel-body begin-->
              
                  <form method="post" class="form-horizontal" enctype="multipart/form-data"><!--form begin-->
                      
                      
                      <div class="form-group"><!--form-group begin-->
                          
                          <label  class="col-md-3 control-label"> Nome do Usuario</label>
                          
                          <div class="col-md-6"><!--col-md-6 begin-->
                              
                              <input name="admin_name" value="<?php echo $admin_name?>" maxlength="22" type="text" class="form-control" required>
                              
                          </div><!--col-md-6 end-->
                          
                      </div><!--form-group end-->
                      
                      
                      <div class="form-group"><!--form-group begin-->
                          
                          <label  class="col-md-3 control-label"> E-mail </label>
                          
                          <div class="col-md-6"><!--col-md-6 begin-->
                              
                              <input name="admin_email" type="text" value="<?php echo $admin_email?>" class="form-control" required>

                          </div><!--col-md-6 end-->
                          
                      </div><!--form-group end-->
                      
                      <div class="form-group"><!--form-group begin-->
                          
                          <label  class="col-md-3 control-label"> Password </label>
                          
                          <div class="col-md-6"><!--col-md-6 begin-->
                              
                              <input name="admin_pass" maxlength="8" type="text" value="<?php echo $admin_pass?>" class="form-control" required>

                          </div><!--col-md-6 end-->
                          
                      </div><!--form-group end-->
                      
                      <div class="form-group"><!--form-group begin-->
                          
                          <label  class="col-md-3 control-label">Pais </label>
                          
                          <div class="col-md-6"><!--col-md-6 begin-->
                              
                              <input name="admin_country" maxlength="22" type="text" value="<?php echo $admin_country?>" class="form-control" required>
                              
                          </div><!--col-md-6 end-->
                          
                      </div><!--form-group end-->
                      
                      <div class="form-group"><!--form-group begin-->
                          
                          <label  class="col-md-3 control-label"> Contacto </label>
                          
                          <div class="col-md-6"><!--col-md-6 begin-->
                              
                              <input name="admin_contact" maxlength="22" type="text" value="<?php echo $admin_contact?>" class="form-control" required>
                              
                          </div><!--col-md-6 end-->
                          
                      </div><!--form-group end-->
                      
                      <div class="form-group"><!--form-group begin-->
                          
                          <label  class="col-md-3 control-label"> Trabalho do Usuario </label>
                          
                          <div class="col-md-6"><!--col-md-6 begin-->
                              
                              <input name="admin_job" type="text" class="form-control" value="<?php echo $admin_job?>" required>
                              
                          </div><!--col-md-6 end-->
                          
                      </div><!--form-group end-->
                      
                      <div class="form-group"><!--form-group begin-->
                          
                          <label  class="col-md-3 control-label"> Imagem </label>
                          
                          <div class="col-md-6"><!--col-md-6 begin-->
                              
                              <input name="admin_image" type="file" class="form-control" required>
                              
                              <br>
                              
                              <img width="70" height="70" src="admin_images/<?php echo $admin_image; ?>" alt="<?php echo $admin_image; ?>">
                              
                          </div><!--col-md-6 end-->
                      </div><!--form-group end-->
                      
                      <div class="form-group"><!--form-group begin-->
                          
                          <label  class="col-md-3 control-label"> Sobre </label>
                          
                          <div class="col-md-6"><!--col-md-6 begin-->
                              
                              <textarea name="admin_about" class="form-control" rows="3"><?php echo $admin_about?></textarea>
                              
                          </div><!--col-md-6 end-->
                          
                      </div><!--form-group end-->
                      
                      <div class="form-group"><!--form-group begin-->
                          
                          <label  class="col-md-3 control-label"> </label>
                          
                          <div class="col-md-6"><!--col-md-6 begin-->
                              
                              <input name="update" value="Actualizar Usuario" type="submit" class="btn btn-primary form-control">
                              
                          </div><!--col-md-6 end-->
                          
                      </div><!--form-group end-->
                      
                  </form><!--form end-->
                  
                  

              </div> <!--panel-body end-->

           </div> <!--panel panel-default end-->
          
             
      </div><!--col-lg-12 end-->
      
  </div><!--row end-->
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>
    
</body>
</html>


<?php
    
if(isset($_POST['update'])){

    $user_name = $_POST['admin_name'];
    $user_email = $_POST['admin_email'];
    $user_pass = $_POST['admin_pass'];
    $user_country = $_POST['admin_country'];
    $user_contact = $_POST['admin_contact'];
    $user_job = $_POST['admin_job'];
    $user_about = $_POST['admin_about'];
      
    $user_image = $_FILES['admin_image']['name'];

    $temp_name = $_FILES['admin_image']['tmp_name'];
      
    move_uploaded_file($temp_name,"admin_images/$user_image");
    
        
    $update_user = "update admins set admin_name='$user_name',admin_email='$user_email',admin_pass='$user_pass',admin_image='$user_image',admin_country='$user_country',admin_about='$user_about',admin_contact='$user_contact',admin_job='$user_job' where admin_id='$admin_id'";

    $run_user = mysqli_query($con,$update_user);

    if($run_user){

        echo "<script>alert('Usuario editado com sucesso')</script>";
        echo "<script>window.open('index.php?view_users','_self')</script>";

    }else{

        echo "<script>alert('Falha ao editar usuario')</script>";
        echo "<script>window.open('index.php?user_profile','_self')</script>";

        }
    }
       
   
?>

<?php } ?>

