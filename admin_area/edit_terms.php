<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo"<script>window.open('login.php','_self')</script>";
    }else{

?>

<?php 
        if(isset($_GET['edit_terms'])){
            
            $edit_terms_id = $_GET['edit_terms'];
            
            $edit_terms_query = "select * from terms where termsi_id='$edit_terms_id'";
            
            $run_edit = mysqli_query($con,$edit_terms_query);
            
            $row_edit = mysqli_fetch_array($run_edit);
            
            $terms_id = $row_edit['termsi_id'];
            
            $terms_title = $row_edit['terms_title'];
            
            $terms_desc = $row_edit['terms_desc'];
        }



?>
   
<div class="row"><!--row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <ol class="breadcrumb"><!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Painel / Editar termsegoria 
                
            </li>
        </ol><!--breadcrumb end-->
    </div><!--col-lg-12 end-->
</div><!--row end-->
 
<div class="row"><!--row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <div class="panel panel-default"><!--panel panel-default start-->
            <div class="panel-heading"><!--panel-heading start-->
                <h3 class="panel-title"><!--panel-title start-->
                    
                    <i class="fa fa-pencil fa-fw"></i>Editar Termos & Condições
                
                </h3><!--panel-title end-->
            </div><!--panel-heading end-->
            
            <div class="panel-body"><!--panel-body start-->
                <form action="" class="form-horizontal" method="post"><!--form-horizontal start-->
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                        
                            Titulo do Termo
                        
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->
                        
                            <input value="<?php echo $terms_title; ?>" name="terms_title" type="text" class="form-control">
                        
                        </div><!--col-md-6 end-->
                    
                    </div><!--form-group end--> 
                    
                    <div class="form-group"><!--form-group start-->
                    
                        <label for="" class="control-label col-md-3"><!--control-label col-md-3 start-->
                        
                            Descrição do Termo
                        
                        </label><!--control-label col-md-3 end-->
                        
                        <div class="col-md-6"><!--col-md-6 start-->
                        
                            <textarea type="text" name="terms_desc" id="" cols="75" rows="10" class="form-control"><?php echo $terms_desc;?>
                            </textarea>
                        
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
              
              $terms_title = $_POST['terms_title'];
              
              $terms_desc = $_POST['terms_desc'];
              
              $update_terms = "update terms set terms_title='$terms_title',terms_desc='$terms_desc' where termsi_id='$terms_id'";
              
              $run_terms = mysqli_query($con,$update_terms);
              
              if($run_terms){
                  
                  echo"<script>alert('O seu Termo foi edito com sucesso')</script>";
                
                  echo"<script>window.open('index.php?view_terms','_self')</script>";
              }
             
          } 


?>

<?php } ?>

