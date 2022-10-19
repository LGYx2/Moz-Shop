<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo"<script>window.open('login.php','_self')</script>";
    }else{

?>
   
<div class="row"><!--row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <ol class="breadcrumb"><!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Painel / Ver Termos & Condições
                
            </li>
        </ol><!--breadcrumb end-->
    </div><!--col-lg-12 end-->
</div><!--row end-->

 
<div class="row"><!--row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <div class="panel panel-default"><!--panel panel-default start-->
            <div class="panel-heading"><!--panel-heading start-->
                <h3 class="panel-title"><!--panel-title start-->
                    
                    <i class="fa fa-tag fa-fw"></i>Ver Termos & Condições
                
                </h3><!--panel-title end-->
            </div><!--panel-heading end-->
            
            <div class="panel-body"><!--panel-body start-->
                
                            
                             <?php
                            
                                $get_terms = "select * from terms";
            
                                $run_terms = mysqli_query($con,$get_terms);
          
                                while($row_terms=mysqli_fetch_array($run_terms)){
                                    
                                    $terms_id = $row_terms['termsi_id'];
                                    
                                    $terms_title = $row_terms['terms_title'];
                                    
                                    $terms_desc = $row_terms['terms_desc'];
                                
                            
                            ?>
                            
                            
                            <div class="col-lg-3 col-md-3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" align="center">
                                           
                                            <?php echo $terms_title;?>
                                            
                                        </h3>
                                    </div>
                                    
                                    <div class="panel-body">
                                        
                                        <?php echo $terms_desc;?>
                                        
                                    </div>
                                    
                                    <div class="panel-footer">
                                        <center>
                                            
                                            <a href="index.php?edit_terms=<?php echo $terms_id?>" class="pull-left">
                                            
                                                <i class="fa fa-pencil"></i> Editar
                                            
                                            
                                            </a>
                                            
                                            <div class="clearfix"></div>
                                            
                                        </center>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <?php } ?>
                            
                              
                            
                        
                
            </div><!--panel-body end-->
            
        </div><!--panel panel-default end-->
    </div><!--col-lg-12 end-->
</div><!--row end-->
 




<?php } ?>