<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo"<script>window.open('login.php','_self')</script>";
    }else{

?>
   
<div class="row"><!--row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <ol class="breadcrumb"><!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Painel / Ver Caixa
                
            </li>
        </ol><!--breadcrumb end-->
    </div><!--col-lg-12 end-->
</div><!--row end-->

 
<div class="row"><!--row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <div class="panel panel-default"><!--panel panel-default start-->
            <div class="panel-heading"><!--panel-heading start-->
                <h3 class="panel-title"><!--panel-title start-->
                    
                    <i class="fa fa-tag fa-fw"></i>Ver Caixa
                
                </h3><!--panel-title end-->
            </div><!--panel-heading end-->
            
            <div class="panel-body"><!--panel-body start-->
                
                            
                             <?php
                            
                                $get_slide = "select * from home_box";
            
                                $run_slide = mysqli_query($con,$get_slide);
          
                                while($row_slide=mysqli_fetch_array($run_slide)){
                                    
                                    $box_id = $row_slide['box_id'];
                                    
                                    $box_title = $row_slide['box_title'];
                                    
                                    $box_desc = $row_slide['box_desc'];
                                
                            
                            ?>
                            
                            
                            <div class="col-lg-3 col-md-3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" align="center">
                                           
                                            <?php echo $box_title;?>
                                            
                                        </h3>
                                    </div>
                                    
                                    <div class="panel-body">
                                        
                                        <?php echo $box_desc;?>
                                        
                                    </div>
                                    
                                    <div class="panel-footer">
                                        <center>
                                            
                                            <a href="index.php?edit_box=<?php echo $box_id?>" class="pull-left">
                                            
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