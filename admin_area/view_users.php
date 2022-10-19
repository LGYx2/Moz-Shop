<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo"<script>window.open('login.php','_self')</script>";
    }else{

?>

<div class="row"><!-- row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <ol class="breadcrumb"><!--breadcrumb start-->
            <li class="active"><!--active start-->
                
                <i class="fa fa-dashboard"></i> Painel / Ver Usuarios
                
            </li><!--active end-->
        </ol><!--breadcrumb end-->
    </div><!--col-lg-12 end-->
</div><!-- row end-->

<div class="row"><!--row 2 start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <div class="panel panel-default"><!--panel panel-default start-->
            <div class="panel-heading"><!--panel-heading start-->
                <h3 class="panel-title"><!--panel-title start-->
                    
                    <i class="fa fa-tags"></i> Ver Usuarios
                    
                </h3><!--panel-title end-->
            </div><!--panel-heading end-->
            
            <div class="panel-body"><!--panel-body start-->
                <div class="table-responsive"><!--table-responsive start-->
                    <table class="table table-striped table-bordered table-hover"><!--table table-striped table-bordered table-hover start-->
                        
                        <thead><!--thead start-->
                            <tr><!--tr start-->
                                <th> ID: </th>
                                <th> Nome: </th>
                                <th> Imagem: </th>
                                <th> Email: </th>
                                <th> Pais: </th>
                                <th> Contacto: </th>
                                <th> Trabalho: </th>
                                <!--<th> Deletar admin: </th>
                                <th> Editar admin: </th>-->
                            </tr><!--tr end-->
                        </thead><!--thead end-->
                        
                        <tbody><!--tbody start-->
                            
                            <?php
          
                                $i=0;
                            
                                $get_admin = "select * from admins";
          
                                $run_admin = mysqli_query($con,$get_admin);
                                
                                while($row_admin=mysqli_fetch_array($run_admin)){
                                    
                                    $admin_id = $row_admin['admin_id'];
                                    
                                    $admin_name = $row_admin['admin_name'];
                                    
                                    $admin_email = $row_admin['admin_email'];
                                    
                                    $admin_image = $row_admin['admin_image'];
                                    
                                    $admin_about = $row_admin['admin_about'];
                                    
                                    $admin_city = $row_admin['admin_country'];
                                    
                                    $admin_contact = $row_admin['admin_contact'];
                                    
                                    $admin_job = $row_admin['admin_job'];
                                    
                                    $i++;
                            ?>
                            
                            
                            <tr><!--tr start-->
                                <td><?php echo $i;?></td>
                                <td><?php echo $admin_name;?></td>
                                <td><img src="admin_images/<?php echo $admin_image;?>" width="70" height="60"></td>
                                <td><?php echo $admin_email;?></td>
                                <td><?php echo $admin_city;?></td>
                                <td><?php echo $admin_contact;?></td>
                                <td><?php echo $admin_job;?></td>
                                <!--<td>
                                    <!--<a href="index.php?delete_admin=">
                                        
                                       <i class="fa fa-trash-o"></i> Deletar
                                         
                                    </a>
                                </td>
                                <td>
                                    
                                    <a href="index.php?user_profile=">
                                        
                                       <i class="fa fa-pencil"></i> Editar
                                         
                                    </a>
                                </td>-->
                            </tr><!--tr end-->
                            
                            <?php } ?>
                            
                        </tbody><!--tbody end-->
                         
                    </table><!--table table-striped table-bordered table-hover end-->
                </div><!--table-responsive end-->
            </div><!--panel-body end-->
            
        </div><!--panel panel-default end-->
    </div><!--col-lg-12 end-->
</div><!--row 2 end-->






<?php  } ?>