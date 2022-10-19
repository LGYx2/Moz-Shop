<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo"<script>window.open('login.php','_self')</script>";
    }else{

?>
<?php 

        $file = "../styles/style.css";

        if(file_exists($file)){

            $data = file_get_contents($file);

        }


?>
<div class="row"><!-- row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <ol class="breadcrumb"><!--breadcrumb start-->
            <li class="active"><!--active start-->
                
                <i class="fa fa-dashboard"></i> Painel / Editor CSS
                
            </li><!--active end-->
        </ol><!--breadcrumb end-->
    </div><!--col-lg-12 end-->
</div><!-- row end-->

<div class="row"><!--row 2 start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <div class="panel panel-default"><!--panel panel-default start-->
            <div class="panel-heading"><!--panel-heading start-->
                <h3 class="panel-title"><!--panel-title start-->
                    
                    <i class="fa fa-pencil"></i> Editor CSS
                    
                </h3><!--panel-title end-->
            </div><!--panel-heading end-->
            
            <div class="panel-body"><!--panel-body start-->

                <form action="" class="form-horizontal" method="post">
                    <div class="form-group">

                        <div class="col-lg-12">
                            <textarea name="newdata" rows="20" class="form-control">

                                <?php echo $data;   ?>

                            </textarea>
                        </div>

                    </div>
                    <div class="form-group"><!--form-group begin-->
                          
                          <label  class="col-md-3 control-label"> </label>
                          
                          <div class="col-md-6"><!--col-md-6 begin-->
                              
                              <input name="update" value="Actualizar CSS" type="submit" class="btn btn-primary form-control">
                              
                          </div><!--col-md-6 end-->
                          
                      </div><!--form-group end-->
                      
                  </form><!--form end-->
            
            </div><!--panel-body end-->
            
        </div><!--panel panel-default end-->
    </div><!--col-lg-12 end-->
</div><!--row 2 end-->

<?php

if(isset($_POST['update'])){

    $newdata = $_POST['newdata'];

    $handle = fopen($file,'w');
    fwrite($handle,$newdata);
    fclose($handle);
    echo"<script>alert('Your CSS has been updated')</script>";
    echo"<script>window.open('index.php?edit_css')</script>";



}

?>




<?php  } ?>