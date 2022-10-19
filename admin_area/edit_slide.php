<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo"<script>window.open('login.php','_self')</script>";
    }else{

?>

<?php 
        if(isset($_GET['edit_slide'])){
            
            $edit_id = $_GET['edit_slide'];
            
            $edit_slide = "select * from slider where slide_id='$edit_id'";
            
            $run_edit_slide = mysqli_query($con,$edit_slide);
            
            $row_slide = mysqli_fetch_array($run_edit_slide);
            
            $slide_id = $row_slide['slide_id'];
            
            $slide_name = $row_slide['slide_name'];
            
            $slide_image= $row_slide['slide_image'];
            
            $slide_url = $row_slide['slide_url'];
        }



?>
   
            
<div class="row"><!--row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <ol class="breadcrumb"><!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Painel / Inserir Slide
                
            </li>
        </ol><!--breadcrumb end-->
    </div><!--col-lg-12 end-->
</div><!--row end-->
 
<div class="row"><!--row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <div class="panel panel-default"><!--panel panel-default start-->
            <div class="panel-heading"><!--panel-heading start-->
                <h3 class="panel-title"><!--panel-title start-->
                    
                    <i class="fa fa-pencil fa-fw"></i> Editar Slide
                
                </h3><!--panel-title end-->
            </div><!--panel-heading end-->
            
            <div class="panel-body"><!--panel-body start-->
                <form method="post" class="form-horizontal"  enctype="multipart/form-data"><!--form-horizontal start-->
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                        
                            Nome do Slide
                        
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->
                        
                            <input value="<?php echo $slide_name;?>" name="slide_name" type="text" class="form-control">
                        
                        </div><!--col-md-6 end-->
                    
                    </div><!--form-group end--> 
                    
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                            Imagem do Slide
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->
                            
                            <img src="slides_images/<?php echo $slide_image ; ?>" alt="<?php echo $slide_name ; ?>" class="img-responsive">
                            
                           <input type="file" name="slide_image" class="form-control" width="30" required>
                        
                        </div><!--col-md-6 end-->
                    
                    </div><!--form-group end-->
                    
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                        
                            Url do Slide
                        
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->
                        
                            <input value="<?php echo $slide_url;?>" name="slide_url" type="text" class="form-control">
                        
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
              
              $slide_name = $_POST['slide_name'];
            
              $slide_url  = $_POST['slide_url'];
              
              $slide_image = $_FILES['slide_image']['name'];
              
              $tmp_name = $_FILES['slide_image']['tmp_name'];
              
              move_uploaded_file($tmp_name,"slides_images/$slide_image");
              
              $update_slide = "update slider set slide_name='$slide_name',slide_image='$slide_image',slide_url='$slide_url' where slide_id='$slide_id'";
              
              $run_slide = mysqli_query($con,$update_slide);
    
              if($run_slide){
                  
                  echo"<script>alert('O seu Slide foi editado com sucesso')</script>";
                
                  echo"<script>window.open('index.php?view_slide','_self')</script>";
              }else{
                  
                  echo"<script>alert('Falha a editar o Slide')</script>";
                
                  echo"<script>window.open('index.php?edit_slide','_self')</script>";
                  
              }
             
          } 


?>

<?php } ?>