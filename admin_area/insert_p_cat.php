<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo"<script>window.open('login.php','_self')</script>";
    }else{

?>
   
<div class="row"><!--row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <ol class="breadcrumb"><!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Painel / Categoria de Produto
                
            </li>
        </ol><!--breadcrumb end-->
    </div><!--col-lg-12 end-->
</div><!--row end-->
 
<div class="row"><!--row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <div class="panel panel-default"><!--panel panel-default start-->
            <div class="panel-heading"><!--panel-heading start-->
                <h3 class="panel-title"><!--panel-title start-->
                    
                    <i class="fa fa-money fa-fw"></i>Inserir Categoria de Produto
                
                </h3><!--panel-title end-->
            </div><!--panel-heading end-->
            
            <div class="panel-body"><!--panel-body start-->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!--form-horizontal start-->
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                        
                            Titulo da Categoria.Pro
                        
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->
                        
                            <input name="p_cat_title" type="text" class="form-control">
                        
                        </div><!--col-md-6 end-->
                    
                    </div><!--form-group end-->
                    
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                            Imagem da Categoria.Pro
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->
                        
                           <input type="file" name="p_cat_image" class="form-control">
                        
                        </div><!--col-md-6 end-->
                    
                    </div><!--form-group end-->

                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                            Categoria.Pro Top?
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->
                        
                           <select name="p_cat_top" class="form-control" required><!--form-control begin-->

                                <option disabled value=""> Selecione uma opcao</option>
                                  
                                <option value="yes">yes</option>
                                <option value="no">no</option>
                                 
                                  
                              </select><!--form-control end-->
                        
                        </div><!--col-md-6 end-->
                    
                    </div><!--form-group end-->
                     
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                        
                            
                        
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->
                        
                            <input value="Submeter" name="submit" type="submit" class="form-control btn btn-primary">
                        
                        </div><!--col-md-6 end-->
                    
                    </div><!--form-group end--> 
                </form><!--form-horizontal end-->
            </div><!--panel-body end-->
            
        </div><!--panel panel-default end-->
    </div><!--col-lg-12 end-->
</div><!--row end-->

<?php 

          if(isset($_POST['submit'])){
              
              $p_cat_title = $_POST['p_cat_title'];
              
              $p_cat_img = $_FILES['p_cat_image']['name'];

              $tmp_name = $_FILES['p_cat_image']['tmp_name'];

              $p_cat_top = $_POST['p_cat_top'];


              move_uploaded_file($tmp_name,"other_images/$p_cat_img");
              
              $insert_p_cat = "insert into product_categories (p_cat_title,p_cat_top,p_cat_image) values ('$p_cat_title','$p_cat_top','$p_cat_img')";
              
              $run_p_cat = mysqli_query($con,$insert_p_cat);
              
              if($run_p_cat){
                  
                  echo "<script>alert('Uma nova Categoria de Produtos foi inserida')</script>";
                      
                  echo "<script>window.open('index.php?view_p_cats','_self')</script>";            
              }
          }


?>


<?php } ?>