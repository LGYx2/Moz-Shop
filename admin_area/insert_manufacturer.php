<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo"<script>window.open('login.php','_self')</script>";
    }else{

?>
   
<div class="row"><!--row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <ol class="breadcrumb"><!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Painel / Inserir Fabricante
                
            </li>
        </ol><!--breadcrumb end-->
    </div><!--col-lg-12 end-->
</div><!--row end-->
 
<div class="row"><!--row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <div class="panel panel-default"><!--panel panel-default start-->
            <div class="panel-heading"><!--panel-heading start-->
                <h3 class="panel-title"><!--panel-title start-->
                    
                    <i class="fa fa-money fa-fw"></i>Inserir Fabricante
                
                </h3><!--panel-title end-->
            </div><!--panel-heading end-->
            
            <div class="panel-body"><!--panel-body start-->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!--form-horizontal start-->
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                        
                            Nome do Fabricante
                        
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->
                        
                            <input name="manufacturer_title" type="text" class="form-control" maxlength="15">
                        
                        </div><!--col-md-6 end-->
                    
                    </div><!--form-group end--> 
                    
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                            Imagem do Fabricante
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->
                        
                           <input type="file" name="manufacturer_image" class="form-control">
                        
                        </div><!--col-md-6 end-->
                    
                    </div><!--form-group end--> 
                    
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                            Fabricante Top?
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->
                        
                           <select name="manufacturer_top" class="form-control" required><!--form-control begin-->

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
                        
                            <input type="submit" name="submit" value="Submeter" class="btn btn-primary form-control">
                        
                        </div><!--col-md-6 end-->
                    
                    </div><!--form-group end--> 
                </form><!--form-horizontal end-->
            </div><!--panel-body end-->
            
        </div><!--panel panel-default end-->
    </div><!--col-lg-12 end-->
</div><!--row end-->

<?php 

          if(isset($_POST['submit'])){
              
              $manufacturer_name = $_POST['manufacturer_title'];
              
              $manufacturer_image = $_FILES['manufacturer_image']['name'];
              
              $tmp_name = $_FILES['manufacturer_image']['tmp_name'];
              
              $manufacturer_top = $_POST['manufacturer_top'];
              
              $view_manufacturers = "select * from manufacturers";
              
              $view_run_manufacturer = mysqli_query($con,$view_manufacturers);
              
                  
              move_uploaded_file($tmp_name,"other_images/$manufacturer_image");
                  
              $insert_manufacturers = "insert into manufacturers (manufacturer_title,manufacturer_top,manufacturer_image) values ('$manufacturer_name','$manufacturer_top','$manufacturer_image')";
                  
              $run_manufacturer = mysqli_query($con,$insert_manufacturers);
              if($run_manufacturer){
                  
                  echo"<script>alert('Fabricante inserido')</script>";
                  
                  echo"<script>window.open('index.php?view_manufacturer','_self')</script>";
                }else{
                    
                  echo"<script>alert('sem sucesso')</script>";
                  
                }
          }


?>


<?php } ?>