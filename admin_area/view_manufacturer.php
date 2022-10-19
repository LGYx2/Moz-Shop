<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo"<script>window.open('login.php','_self')</script>";
    }else{

?>
   
<div class="row"><!--row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <ol class="breadcrumb"><!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Painel / Ver Fabricantes
                
            </li>
        </ol><!--breadcrumb end-->
    </div><!--col-lg-12 end-->
</div><!--row end-->

 
<div class="row"><!--row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <div class="panel panel-default"><!--panel panel-default start-->
            <div class="panel-heading"><!--panel-heading start-->
                <h3 class="panel-title"><!--panel-title start-->
                    
                    <i class="fa fa-tag fa-fw"></i>Ver Fabricantes
                
                </h3><!--panel-title end-->
            </div><!--panel-heading end-->
            
            <div class="panel-body"><!--panel-body start-->
                
                            
                             <?php
                            
                                $get_manufacturer = "select * from manufacturers";
            
                                $run_manufacturer = mysqli_query($con,$get_manufacturer);
          
                                while($row_manufacturer=mysqli_fetch_array($run_manufacturer)){
                                    
                                    $manufacturer_id = $row_manufacturer['manufacturer_id'];
                                    
                                    $manufacturer_title = $row_manufacturer['manufacturer_title'];
                                    
                                    $manufacturer_image= $row_manufacturer['manufacturer_image'];
                                
                            
                            ?>
                            
                            
                            <div class="col-lg-3 col-md-3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" align="center">
                                           
                                            <?php echo $manufacturer_title;?>
                                            
                                        </h3>
                                    </div>
                                    
                                    <div class="panel-body" style="width: 100%;">
                                        
                                        <img style="max-height: 100px;width: 100%;" src="other_images/<?php echo $manufacturer_image;?>" alt="<?php echo $manufacturer_title; ?>" class="img-responsive" >
                                        
                                    </div>
                                    
                                    <div class="panel-footer">
                                        <center>
                                            
                                            <a href="index.php?delete_manufacturer=<?php echo $manufacturer_id?>" class="pull-right">
                                            
                                                <i class="fa fa-trash"></i> Delete
                                            
                                            
                                            </a>
                                            
                                            <a href="index.php?edit_manufacturer=<?php echo $manufacturer_id?>" class="pull-left">
                                            
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