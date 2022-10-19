<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo"<script>window.open('login.php','_self')</script>";
    }else{

?>
   

   

   <div class="row"><!-- row num: 1 start -->
    <div class="col-lg-12"><!-- col-lg-12 start -->
        <h1 class="page-header">Painel de Movimentos</h1>
        
        <ol class="breadcrumb"><!-- breadcrumb start -->
            <li class="active"><!-- active start -->
            
                <i class="fa fa-dashboard"></i> Painel de Movimentos
                
            </li><!-- active end -->
        </ol><!-- breadcrumb end -->
        
    </div><!-- col-lg-12 end -->
</div><!-- row end -->


<div class="row"><!-- row num: 2 start -->
   
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 start -->
        <div class="panel panel-primary"><!-- panel panel-primary start -->
                
            <div class="panel-heading"><!--panel-heading row start -->
                <div class="row"><!--row start -->
                    <div class="col-xs-3"><!--col-xs-3 start -->
                       
                        <i class="fa fa-tasks fa-5x"></i>
                        
                    </div><!--col-xs-3 end -->
                    
                    
                    <div class="col-xs-9 text-right"><!--col-xs-9 text-right start -->
                        <div class="huge"><?php echo $count_products;?></div>
                            <div> Produtos </div>
                    </div><!--col-xs-9 text-right end-->
                    
                    
                </div><!--row end -->
            </div><!--panel-heading row end -->
            
            <a href="index.php?view_product"><!--a href start -->
                <div class="panel-footer"><!--panel-footer start -->
                   
                    <span class="pull-left"><!--pull-left start -->
                        Detalhes
                    </span><!--pull-left end -->
                    
                    <span class="pull-right"><!--pull-right start -->
                        <i class="fa fa-arrow-circle-right"></i>
                    </span><!--pull-right end -->
                    
                    <div class="clearfix"></div>
                    
                </div><!--panel-footer end-->
            </a><!--a href end -->
        
        </div><!-- panel panel-primary end-->
    </div><!-- col-lg-3 col-md-6 end -->
    
   
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 start -->
        <div class="panel panel-green"><!-- panel panel-green start -->
                
            <div class="panel-heading"><!--panel-heading row start -->
                <div class="row"><!--row start -->
                    <div class="col-xs-3"><!--col-xs-3 start -->
                       
                        <i class="fa fa-users fa-5x"></i>
                        
                    </div><!--col-xs-3 end -->
                    
                    
                    <div class="col-xs-9 text-right"><!--col-xs-9 text-right start -->
                        <div class="huge"> <?php echo $count_customers;?> </div>
                            <div> Clientes  </div>
                        
                    </div><!--col-xs-9 text-right end-->
                    
                    
                </div><!--row end -->
            </div><!--panel-heading row end -->
            
            <a href="index.php?view_customers"><!--a href start -->
                <div class="panel-footer"><!--panel-footer start -->
                   
                    <span class="pull-left"><!--pull-left start -->
                        Detalhes
                    </span><!--pull-left end -->
                    
                    <span class="pull-right"><!--pull-right start -->
                        <i class="fa fa-arrow-circle-right"></i>
                    </span><!--pull-right end -->
                    
                    <div class="clearfix"></div>
                    
                </div><!--panel-footer end-->
            </a><!--a href end -->
        
        </div><!-- panel panel-green end-->
    </div><!-- col-lg-3 col-md-6 end -->
    
  
    
   
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 start -->
        <div class="panel panel-yellow"><!-- panel panel-yellow start -->
                
            <div class="panel-heading"><!--panel-heading row start -->
                <div class="row"><!--row start -->
                    <div class="col-xs-3"><!--col-xs-3 start -->
                       
                        <i class="fa fa-tags fa-5x"></i>
                        
                    </div><!--col-xs-3 end -->
                    
                    
                    <div class="col-xs-9 text-right"><!--col-xs-9 text-right start -->
                        <div class="huge"> <?php echo $count_p_categories;?> </div>
                            <div> Categoria Produtos </div>
                        
                    </div><!--col-xs-9 text-right end-->
                    
                    
                </div><!--row end -->
            </div><!--panel-heading row end -->
            
            <a href="index.php?view_p_cats"><!--a href start -->
                <div class="panel-footer"><!--panel-footer start -->
                   
                    <span class="pull-left"><!--pull-left start -->
                        Detalhes
                    </span><!--pull-left end -->
                    
                    <span class="pull-right"><!--pull-right start -->
                        <i class="fa fa-arrow-circle-right"></i>
                    </span><!--pull-right end -->
                    
                    <div class="clearfix"></div>
                    
                </div><!--panel-footer end-->
            </a><!--a href end -->
        
        </div><!-- panel panel-yellow end-->
    </div><!-- col-lg-3 col-md-6 end -->
    
      
    
   
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 start -->
        <div class="panel panel-red"><!-- panel panel-redstart -->
                
            <div class="panel-heading"><!--panel-heading row start -->
                <div class="row"><!--row start -->
                    <div class="col-xs-3"><!--col-xs-3 start -->
                       
                        <i class="fa fa-shopping-cart fa-5x"></i>
                        
                    </div><!--col-xs-3 end -->
                    
                    
                    <div class="col-xs-9 text-right"><!--col-xs-9 text-right start -->
                        <div class="huge"> <?php echo $count_pending_orders; ?> </div>
                            <div> Encomendas </div>
                        
                    </div><!--col-xs-9 text-right end-->
                    
                    
                </div><!--row end -->
            </div><!--panel-heading row end -->
            
            <a href="index.php?view_orders"><!--a href start -->
                <div class="panel-footer"><!--panel-footer start -->
                   
                    <span class="pull-left"><!--pull-left start -->
                        Detalhes
                    </span><!--pull-left end -->
                    
                    <span class="pull-right"><!--pull-right start -->
                        <i class="fa fa-arrow-circle-right"></i>
                    </span><!--pull-right end -->
                    
                    <div class="clearfix"></div>
                    
                </div><!--panel-footer end-->
            </a><!--a href end -->
        
        </div><!-- panel panel-red  end-->
    </div><!-- col-lg-3 col-md-6 end -->
    
  
       
</div><!-- row num 2 end -->

<div class="row"><!---row: num 3 start -->
    <div class="col-lg-8"><!---col-lg-8 start -->
        <div class="panel panel-primary"><!---panel panel-primary start -->
            <div class="panel-heading"><!---panel-heading start -->
                <h3 class="panel-title"><!---panel-title start -->
                    <i class="fa fa-money fa-fw"></i> Novas encomendas
                </h3><!---panel-title end -->
            </div><!---panel-heading end -->
            
            <div class="panel-body"><!---panel-body start -->
                <div class="table-responsive"><!---table-responsive start -->
                    <table class="table table-hover table-striped table-bordered"><!---table table-hover table-striped table-bordered start -->
                        
                        <thead><!---thead start -->
                           <tr><!---tr start -->
                                <th> ON: </th>
                                <th> Contacto Cliente: </th>
                                <th> Factura no: </th>
                                <th> Pro ID : </th>
                                <th> Qtd: </th>
                                <th> Size: </th>
                                <th> Estado: </th>
                           </tr><!---tr end -->
                        </thead><!---thead end -->
                        
                        <tbody><!---tbody start -->
                           
                           <?php
                            
                                $i=0;
                                
                                $get_order = "select * from pending_orders order by 1  LIMIT 0,4";
                                
                                $run_order = mysqli_query($con,$get_order);
          
                                while($row_order=mysqli_fetch_array($run_order)){
                                     
                                    $order_id = $row_order['order_id'];
                                     
                                    $c_id = $row_order['customer_id'];
                                     
                                    $invoice_no = $row_order['invoice_no'];
                                     
                                    $product_id = $row_order['product_id'];
                                     
                                    $qty = $row_order['qty'];
                                     
                                    $size = $row_order['size'];
                                     
                                    $order_status = $row_order['order_status'];
                                    
                                    $i++;
                            
                            ?>
                                <?php  
                                    
                                    $get_customer = "select * from customers where customer_id='$c_id'";
                                    
                                    $run_customer = mysqli_query($con,$get_customer);
                                    
                                    $row_customer = mysqli_fetch_array($run_customer);
                                    
                                    $customer_contact = $row_customer['customer_contact'];
                                    
                                  ?> 
                            
                           
                            <tr><!---tr start -->
                                <td> <?php echo $order_id; ?> </td>
                                <td> <?php echo $customer_contact; ?></td>
                                <td> <?php echo $invoice_no; ?> </td>
                                <td> <?php echo $product_id; ?> </td>
                                <td> <?php echo $qty; ?> </td>
                                <td> <?php echo $size; ?> </td>
                                <td> 
                                
                                    <?php
                                        
                                        if($order_status!='Pago'){
                                            
                                            echo $order_status='não pago';
                                        }else{
                                            echo $order_status='Pago';
                                        }
                                    
                                    ?>
                                
                                </td>
                                
                            </tr><!---tr end -->
                            
                            <?php } ?>
                            
                        </tbody><!---tbody end --> 
                        
                    </table><!---table table-hover table-striped table-bordered start -->
                </div><!---table-responsive end -->
                
                <div class="text-right"><!---text-right start -->
                    <a href="index.php?view_orders" style="text-decoration: none;"><!---a href start -->
                        
                        Veja todas encomendas <i class="fa fa-arrow-circle-right"></i>
                        
                    </a><!---a href end -->
                    
                </div><!---text-right end -->
            </div><!---panel-body end -->
            
        </div><!---panel panel-primary end -->
    </div><!---col-lg-8 end -->
    <div class="col-md-4"><!---col-md-4 start -->
    <div class="panel"><!---panel start -->
        <div class="panel-body"><!---panel-body start -->
            <div class="mb-md thumb-info"><!---mb-md thumb-info start -->
                <img src="admin_images/<?php echo $admin_image; ?>" alt="admin-thumb-info" class="rounded img-responsive">
                
                <div class="thumb-info-title"><!---thumb-info-title start -->
                   
                    <span class="thumb-info-inner"><?php echo $admin_name; ?></span>
                    <span class="thumb-info-type"> <?php echo $admin_job; ?></span>
                </div><!---thumb-info-title end -->
            </div><!---mb-md thumb-info end-->
            <br/>
            <div class="mb-md"><!---mb-md start -->
                <div class="widget-content-expanded"><!---widget-content-expanded start -->
                    <i class="fa fa-envelope"></i> <span> Email: </span><?php echo $admin_email; ?><br/>
                    <i class="fa fa-home"></i> <span> Pais: </span>  <?php echo $admin_country; ?><br/>
                    <i class="fa fa-phone"></i> <span> Contacto: </span><?php echo $admin_contact; ?><br/>
                </div><!---widget-content-expanded end -->
                
                <hr class="dotted short">
                
                <h5 class="text-muted">Sobre mim</h5>
                <div class="text-align"><?php echo $admin_about; ?></div>
                <p><!---p start-->
                    
                    Esta aplicacao foi criada por Fenix.org<br/>
                    <a href="#">Fenix.org</a>
                </p><!---p end -->
                
            </div><!---mb-md end -->
            
        </div><!---panel-body end-->
    </div><!---panel end -->
    </div><!---col-md-4 end -->
    
</div><!---row: num 3 end-->

<?php }?>




