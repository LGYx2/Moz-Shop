<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo"<script>window.open('login.php','_self')</script>";
    }else{

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
                    
                    <i class="fa fa-money fa-fw"></i>Inserir Slide
                
                </h3><!--panel-title end-->
            </div><!--panel-heading end-->
            
            <div class="panel-body"><!--panel-body start-->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!--form-horizontal start-->
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                        
                            Nome do Slide
                        
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->
                        
                            <input name="slide_name" type="text" class="form-control">
                        
                        </div><!--col-md-6 end-->
                    
                    </div><!--form-group end--> 
                    
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                            Imagem do Slide
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->
                        
                           <input type="file" name="slide_image" class="form-control">
                        
                        </div><!--col-md-6 end-->
                    
                    </div><!--form-group end--> 
                    
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                            Url do Slide
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->
                        
                           <input type="text" name="slide_url" class="form-control">
                        
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
              
              $slide_name = $_POST['slide_name'];
              
              $slide_image = $_FILES['slide_image']['name'];
              
              $tmp_name = $_FILES['slide_image']['tmp_name'];
              
              $slide_url = $_POST['slide_url'];
              
              $view_slides = "select * from slider";
              
              $view_run_slide = mysqli_query($con,$view_slides);
              
              $count = mysqli_num_rows($view_run_slide);
              
              if($count<4){
                  
                  move_uploaded_file($tmp_name,"slides_images/$slide_image");
                  
                  $insert_slides = "insert into slider (slide_name,slide_image,slide_url) values ('$slide_name','$slide_image','$slide_url')";
                  
                  $run_slide = mysqli_query($con,$insert_slides);
                  
                  echo"<script>alert('A sua nova foto do slide foi inserida')</script>";
                  
                  echo"<script>window.open('index.php?view_slide','_self')</script>";
              }else{
                  
                  echo"<script>alert('voce ja inseriu 4 slides')</script>";
                  
                  echo"<script>window.open('index.php?view_slide','_self')</script>";
                  
              }
          }


?>


<?php } ?>