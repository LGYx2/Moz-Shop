<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo"<script>window.open('login.php','_self')</script>";
    }else{

?>
   
<div class="row"><!--row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <ol class="breadcrumb"><!--breadcrumb start-->
            <li>
                
                <i class="fa fa-dashboard"></i> Painel / Ver Categoria 
                
            </li>
        </ol><!--breadcrumb end-->
    </div><!--col-lg-12 end-->
</div><!--row end-->

 
<div class="row"><!--row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <div class="panel panel-default"><!--panel panel-default start-->
            <div class="panel-heading"><!--panel-heading start-->
                <h3 class="panel-title"><!--panel-title start-->
                    
                    <i class="fa fa-tag fa-fw"></i>Ver Categoria
                
                </h3><!--panel-title end-->
            </div><!--panel-heading end-->
            
            <div class="panel-body"><!--panel-body start-->
                
                <div class="table-responsive"><!--table-responsive start-->
                    <table class="table table-hover table-striped table-bordered"><!--table table-hover table-striped table-bordered start-->
                        <thead><!--thead start-->
                            <tr><!--tr start-->
                                <th> ID Categoria </th>
                                <th> Titulo da Categoria </th>
                                <th> Categoria Top </th>
                                <th> Editar Categoria  </th>
                                <th> Deletar Categoria  </th>
                            </tr><!--tr end-->
                        </thead><!--thead end-->
                        
                        <tbody><!--tbodystart-->
                            
                             <?php
                            
                                $i=0;
                            
                                $get_cats = "select * from categories";
            
                                $run_cats = mysqli_query($con,$get_cats);
          
                                while($row_cats=mysqli_fetch_array($run_cats)){
                                    
                                    $cat_id = $row_cats['cat_id'];
                                    
                                    $cat_title = $row_cats['cat_title'];
                                    
                                    $cat_top = $row_cats['cat_top'];
                                    
                                    $i++;
                            
                            ?>
                            
                            
                            <tr><!--tr start-->
                                <td><?php echo $i; ?></td>
                                <td><?php echo $cat_title; ?></td>
                                <td width="300"><?php echo $cat_top; ?></td>
                                <td>
                                    <a href="index.php?edit_cat=<?php echo $cat_id; ?>">
                                        <i class="fa fa-pencil"></i> Editar Categoria Produto
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?delete_cat=<?php echo $cat_id; ?>">
                                        <i class="fa fa-pencil"></i> Deletar Categoria
                                    </a>
                                </td>
                            </tr><!--tr end-->
                             
                             <?php } ?>
                        </tbody><!--tbody end-->
                        
                        
                    </table><!--table table-hover table-striped table-bordered end-->
                </div><!--table-responsive end-->
                
            </div><!--panel-body end-->
            
        </div><!--panel panel-default end-->
    </div><!--col-lg-12 end-->
</div><!--row end-->
 




<?php } ?>