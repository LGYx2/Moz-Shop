<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo"<script>window.open('login.php','_self')</script>";
    }else{

?>

<div class="row"><!-- row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <ol class="breadcrumb"><!--breadcrumb start-->
            <li class="active"><!--active start-->
                
                <i class="fa fa-dashboard"></i>Painel / Ver Clientes
                
            </li><!--active end-->
        </ol><!--breadcrumb end-->
    </div><!--col-lg-12 end-->
</div><!-- row end-->

<div class="row"><!--row 2 start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <div class="panel panel-default"><!--panel panel-default start-->
            <div class="panel-heading"><!--panel-heading start-->
                <h3 class="panel-title"><!--panel-title start-->
                    
                    <i class="fa fa-tags"></i> Ver Clientes
                    
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
                                <th> Password: </th>
                                <th> Cidade: </th>
                                <th> Contacto: </th>
                                <th> Endereço: </th>
                                <th> Deletar Cliente: </th>
                                <th> Editar Cliente: </th>
                            </tr><!--tr end-->
                        </thead><!--thead end-->
                        
                        <tbody><!--tbody start-->
                            
                            <?php
          
                                $i=0;
                            
                                $get_customers = "select * from customers";
          
                                $run_customers = mysqli_query($con,$get_customers);
                                
                                while($row_customers=mysqli_fetch_array($run_customers)){
                                    
                                    $customers_id = $row_customers['customer_id'];
                                    
                                    $customers_name = $row_customers['customer_name'];
                                    
                                    $customers_email = $row_customers['customer_email'];
                                    
                                    $customers_image = $row_customers['customer_image'];
                                    
                                    $customers_pass = $row_customers['customer_pass'];
                                    
                                    $customers_city = $row_customers['customer_city'];
                                    
                                    $customers_contact = $row_customers['customer_contact'];
                                    
                                    $customers_address = $row_customers['customer_address'];
                                    
                                    $i++;
                            ?>
                            
                            
                            <tr><!--tr start-->
                                <td><?php echo $i;?></td>
                                <td><?php echo $customers_name;?></td>
                                <td><img src="../customer/customer_images/<?php echo $customers_image;?>" width="70" height="60"></td>
                                <td><?php echo $customers_email;?></td>
                                <td><?php echo $customers_pass;?></td>
                                <td><?php echo $customers_city;?></td>
                                <td><?php echo $customers_contact;?></td>
                                <td><?php echo $customers_address;?></td>
                                <td>
                                    
                                    <a href="index.php?delete_customer=<?php echo  $customers_id; ?>">
                                        
                                       <i class="fa fa-trash-o"></i> Deletar
                                         
                                    </a>
                                </td>
                                <td>
                                    
                                    <a href="index.php?edit_customer=<?php echo  $customers_id; ?>">
                                        
                                       <i class="fa fa-pencil"></i> Editar
                                         
                                    </a>
                                </td>
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