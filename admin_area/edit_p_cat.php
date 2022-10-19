<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo"<script>window.open('login.php','_self')</script>";
    }else{

?>

<?php 
        if(isset($_GET['edit_p_cat'])){
            
            $edit_p_cat_id = $_GET['edit_p_cat'];
            
            $edit_p_cat_query = "select * from product_categories where p_cat_id='$edit_p_cat_id'";
            
            $run_edit = mysqli_query($con,$edit_p_cat_query);
            
            $row_edit = mysqli_fetch_array($run_edit);
            
            $p_cat_id = $row_edit['p_cat_id'];
            
            $p_cat_title = $row_edit['p_cat_title'];
            
            $p_cat_top = $row_edit['p_cat_top'];

            $p_cat_img = $row_edit['p_cat_image'];
        }



?>
   
<div class="row"><!--row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <ol class="breadcrumb"><!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Painel / Editar Categoria de Produtos 
                
            </li>
        </ol><!--breadcrumb end-->
    </div><!--col-lg-12 end-->
</div><!--row end-->
 
<div class="row"><!--row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <div class="panel panel-default"><!--panel panel-default start-->
            <div class="panel-heading"><!--panel-heading start-->
                <h3 class="panel-title"><!--panel-title start-->
                    
                    <i class="fa fa-pencil fa-fw"></i>Editar Categoria de Produtos
                
                </h3><!--panel-title end-->
            </div><!--panel-heading end-->
            
            <div class="panel-body"><!--panel-body start-->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!--form-horizontal start-->
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                        
                            Titulo Categoria.Prod
                        
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->
                        
                            <input value="<?php echo $p_cat_title; ?>" name="p_cat_title" type="text" class="form-control">
                        
                        </div><!--col-md-6 end-->
                    
                    </div><!--form-group end--> 

                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                            Imagem da Categoria.Prod
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->

                            <img src="other_images/<?php echo $p_cat_img; ?>" alt="<?php echo $p_cat_title ; ?>" class="img-responsive">

                        
                           <input type="file" name="p_cat_image" class="form-control">
                        
                        </div><!--col-md-6 end-->
                    
                    </div><!--form-group end-->
                    
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                        
                            Categoria de Produtos top 
                        
                        </label><!--control-label col-md-3 end-->
                        
                    <div class="col-md-6"><!--col-md-6 start-->
                    
                       <select name="p_cat_top" class="form-control"><!--form-control begin-->

                            
                            <option value="<?php echo $p_cat_top; ?>"> <?php echo $p_cat_top; ?> </option>
                                
                                <option disabled value="Selecione Categoria de Produtos"> Selecione Categoria de Produtos Top</option>
                                <option value="yes">yes</option>
                                <option value="no">no</option>
  
                          </select><!--form-control end-->
                    
                    </div><!--col-md-6 end-->
                    
                    </div><!--form-group end-->
                     
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                        
                            
                        
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->
                        
                            <input value="Actualizar" name="update" type="submit" class="form-control btn btn-primary">
                        
                        </div><!--col-md-6 end-->
                    
                    </div><!--form-group end--> 
                </form><!--form-horizontal end-->
            </div><!--panel-body end-->
            
        </div><!--panel panel-default end-->
    </div><!--col-lg-12 end-->
</div><!--row end-->

<?php 

          if(isset($_POST['update'])){
              
              $p_cat_title = $_POST['p_cat_title'];

              $p_cat_top = $_POST['p_cat_top'];

              if(is_uploaded_file($_FILES['p_cat_image']['name'])){

              $p_cat_img = $_FILES['p_cat_image']['name'];

              $tmp_name = $_FILES['p_cat_image']['tmp_name'];

              move_uploaded_file($tmp_name,"other_images/$p_cat_img");
              
              $update_p_cat = "update product_categories set p_cat_title='$p_cat_title',p_cat_top='$p_cat_top',p_cat_image='$p_cat_img' where p_cat_id='$p_cat_id'";
              
              $run_p_cat = mysqli_query($con,$update_p_cat);
              
              if($run_p_cat){
                  
                  echo"<script>alert('A sua Categoria de Produtos foi edita com sucesso')</script>";
                
                  echo"<script>window.open('index.php?view_p_cats ','_self')</script>";
              }
            }else{
                
              $update_p_cat = "update product_categories set p_cat_title='$p_cat_title',p_cat_top='$p_cat_top' where p_cat_id='$p_cat_id'";
              
              $run_p_cat = mysqli_query($con,$update_p_cat);
              
              if($run_p_cat){
                  
                  echo"<script>alert('A sua Categoria de Produtos foi edita com sucesso')</script>";
                
                  echo"<script>window.open('index.php?view_p_cats ','_self')</script>";
              }
            }
          } 


?>

<?php } ?>

