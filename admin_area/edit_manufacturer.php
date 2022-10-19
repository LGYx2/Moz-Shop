<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo"<script>window.open('login.php','_self')</script>";
    }else{

?>

<?php 
        if(isset($_GET['edit_manufacturer'])){
            
            $edit_id = $_GET['edit_manufacturer'];
            
            $edit_manufacturer = "select * from manufacturers where manufacturer_id='$edit_id'";
            
            $run_edit_manufacturer = mysqli_query($con,$edit_manufacturer);
            
            $row_manufacturer = mysqli_fetch_array($run_edit_manufacturer);
            
            $manufacturer_id = $row_manufacturer['manufacturer_id'];
            
            $manufacturer_title = $row_manufacturer['manufacturer_title'];
            
            $manufacturer_image= $row_manufacturer['manufacturer_image'];
            
            $manufacturer_top = $row_manufacturer['manufacturer_top'];
        }



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
                    
                    <i class="fa fa-pencil fa-fw"></i> Editar Fabricante
                
                </h3><!--panel-title end-->
            </div><!--panel-heading end-->
            
            <div class="panel-body"><!--panel-body start-->
                <form method="post" class="form-horizontal"  enctype="multipart/form-data"><!--form-horizontal start-->
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                        
                            Nome do Fabricante
                        
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->
                        
                            <input value="<?php echo $manufacturer_title;?>" name="manufacturer_title" type="text" class="form-control">
                        
                        </div><!--col-md-6 end-->
                    
                    </div><!--form-group end--> 
                    
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                            Imagem do Fabricante
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->
                            
                            <img src="other_images/<?php echo $manufacturer_image ; ?>" alt="<?php echo $manufacturer_title ; ?>" class="img-responsive">
                            
                           <input type="file" name="manufacturer_image" class="form-control" width="30">
                        
                        </div><!--col-md-6 end-->
                    
                    </div><!--form-group end-->
                    
                    <div class="form-group"><!--form-group start-->
                    
                    <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                        Fabricante Top?
                    </label><!--control-label col-md-3 end-->
                    
                    <div class="col-md-6"><!--col-md-6 start-->
                    
                       <select name="manufacturer_top" class="form-control"><!--form-control begin-->

                            
                            <option value="<?php echo $manufacturer_top; ?>"> <?php echo $manufacturer_top; ?> </option>
                                
                                <option disabled value="Selecione categoria"> Selecione Fabricante Top</option>
                                <option value="yes">yes</option>
                                <option value="no">no</option>
  
                          </select><!--form-control end-->
                    
                    </div><!--col-md-6 end-->
                
                </div><!--form-group end--> 
                     
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                        
                            
                        
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->
                        
                            <input type="submit" name="update" value="Submeter" class="btn btn-primary form-control">
                        
                        </div><!--col-md-6 end-->
                    
                    </div><!--form-group end--> 
                </form><!--form-horizontal end-->
            </div><!--panel-body end-->
            
        </div><!--panel panel-default end-->
    </div><!--col-lg-12 end-->
</div><!--row end-->
<?php 

          if(isset($_POST['update'])){
              
              $manufacturer_title = $_POST['manufacturer_title'];
            
              $manufacturer_top  = $_POST['manufacturer_top'];

              if(is_uploaded_file($_FILES['manufacturer_image']['name'])){
              
              $manufacturer_image = $_FILES['manufacturer_image']['name'];
              
              $tmp_name= $_FILES['manufacturer_image']['tmp_name'];
              
              move_uploaded_file($tmp_name,"other_images/$manufacturer_image");
              
              $update_manufacturer = "update manufacturers set manufacturer_title='$manufacturer_title',manufacturer_image='$manufacturer_image',manufacturer_top='$manufacturer_top' where manufacturer_id='$manufacturer_id'";
              
              $run_manufacturer = mysqli_query($con,$update_manufacturer);
    
              if($run_manufacturer){
                  
                  echo"<script>alert('Processo realizado com sucesso')</script>";
                
                  echo"<script>window.open('index.php?view_manufacturer','_self')</script>";
              }else{
                  
                  echo"<script>alert('Falha a editar o fabricante')</script>";
                
                  echo"<script>window.open('index.php?edit_manufacturer','_self')</script>";
                  
              }
             
          }else{
            $update_manufacturer = "update manufacturers set manufacturer_title='$manufacturer_title',manufacturer_top='$manufacturer_top' where manufacturer_id='$manufacturer_id'";
              
            $run_manufacturer = mysqli_query($con,$update_manufacturer);
  
            if($run_manufacturer){
                
                echo"<script>alert('Processo realizado com sucesso')</script>";
              
                echo"<script>window.open('index.php?view_manufacturer','_self')</script>";
            }else{
                
                echo"<script>alert('Falha a editar o fabricante')</script>";
              
                echo"<script>window.open('index.php?edit_manufacturer','_self')</script>";
                
            }
          }
        }


?>

<?php } ?>