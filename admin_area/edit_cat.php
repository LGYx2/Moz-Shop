<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo"<script>window.open('login.php','_self')</script>";
    }else{

?>

<?php 
        if(isset($_GET['edit_cat'])){
            
            $edit_cat_id = $_GET['edit_cat'];
            
            $edit_cat_query = "select * from categories where cat_id='$edit_cat_id'";
            
            $run_edit = mysqli_query($con,$edit_cat_query);
            
            $row_edit = mysqli_fetch_array($run_edit);
            
            $cat_id = $row_edit['cat_id'];
            
            $cat_title = $row_edit['cat_title'];
            
            $cat_top = $row_edit['cat_top'];

            $cat_img = $row_edit['cat_image'];
        }



?>
   
<div class="row"><!--row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <ol class="breadcrumb"><!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Painel / Editar Categoria 
                
            </li>
        </ol><!--breadcrumb end-->
    </div><!--col-lg-12 end-->
</div><!--row end-->
 
<div class="row"><!--row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <div class="panel panel-default"><!--panel panel-default start-->
            <div class="panel-heading"><!--panel-heading start-->
                <h3 class="panel-title"><!--panel-title start-->
                    
                    <i class="fa fa-pencil fa-fw"></i>Editar Categoria
                
                </h3><!--panel-title end-->
            </div><!--panel-heading end-->
            
            <div class="panel-body"><!--panel-body start-->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!--form-horizontal start-->
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                        
                            Titulo Categoria de Produto
                        
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->
                        
                            <input value="<?php echo $cat_title; ?>" name="cat_title" type="text" class="form-control">
                        
                        </div><!--col-md-6 end-->
                    
                    </div><!--form-group end--> 

                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                            Imagem da Categoria
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->

                            <img src="other_images/<?php echo $cat_img; ?>" alt="<?php echo $cat_title ; ?>" class="img-responsive">

                        
                           <input type="file" name="cat_image" class="form-control">
                        
                        </div><!--col-md-6 end-->
                    
                    </div><!--form-group end-->
                    
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                        
                            Categoria top 
                        
                        </label><!--control-label col-md-3 end-->
                        
                    <div class="col-md-6"><!--col-md-6 start-->
                    
                       <select name="cat_top" class="form-control"><!--form-control begin-->

                            
                            <option value="<?php echo $cat_top; ?>"> <?php echo $cat_top; ?> </option>
                                
                                <option disabled value="Selecione categoria"> Selecione Categoria Top</option>
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
              
              $cat_title = $_POST['cat_title'];

              $cat_top = $_POST['cat_top'];

              if(is_uploaded_file($_FILES['cat_image']['name'])){

              $cat_img = $_FILES['cat_image']['name'];

              $tmp_name = $_FILES['cat_image']['tmp_name'];

              move_uploaded_file($tmp_name,"other_images/$cat_img");
              
              $update_cat = "update categories set cat_title='$cat_title',cat_top='$cat_top',cat_image='$cat_img' where cat_id='$cat_id'";
              
              $run_cat = mysqli_query($con,$update_cat);
              
              if($run_cat){
                  
                  echo"<script>alert('A sua Categoria foi edita com sucesso')</script>";
                
                  echo"<script>window.open('index.php?view_cats ','_self')</script>";
              }
            }else{
                
              $update_cat = "update categories set cat_title='$cat_title',cat_top='$cat_top' where cat_id='$cat_id'";
              
              $run_cat = mysqli_query($con,$update_cat);
              
              if($run_cat){
                  
                  echo"<script>alert('A sua Categoria foi edita com sucesso')</script>";
                
                  echo"<script>window.open('index.php?view_cats ','_self')</script>";
              }
            }
          } 


?>

<?php } ?>

