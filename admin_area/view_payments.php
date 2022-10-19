<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo"<script>window.open('login.php','_self')</script>";
    }else{

?>

<div class="row"><!-- row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <ol class="breadcrumb"><!--breadcrumb start-->
            <li class="active"><!--active start-->
                
                <i class="fa fa-dashboard"></i> Painel / Ver Pagamentos
                
            </li><!--active end-->
        </ol><!--breadcrumb end-->
    </div><!--col-lg-12 end-->
</div><!-- row end-->

<div class="row"><!--row 2 start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <div class="panel panel-default"><!--panel panel-default start-->
            <div class="panel-heading"><!--panel-heading start-->
                <h3 class="panel-title"><!--panel-title start-->
                    
                    <i class="fa fa-tags"></i> Ver Pagamentos
                    
                </h3><!--panel-title end-->
            </div><!--panel-heading end-->
            
            <div class="panel-body"><!--panel-body start-->
                <div class="table-responsive"><!--table-responsive start-->
                    <table class="table table-striped table-bordered table-hover"><!--table table-striped table-bordered table-hover start-->
                        
                        <thead><!--thead start-->
                            <tr><!--tr start-->
                                <th> ID: </th>
                                <th> Titulo Produto: </th>
                                <th> Imagem Produto: </th>
                                <th> Valor Pago: </th>
                                <th> Qtd Vendida: </th>
                                <th> Serviço utilizado: </th>
                                <th> Factura No: </th>
                                <th> Cod. Referencia: </th>
                                <th> codigo Transferencia: </th>
                                <th> Nome Cliente: </th>
                                <th> Email: </th>
                                <th> Endereço: </th>
                                <th> Data do Pagamento: </th>
                                <th> Deletar: </th>
                            </tr><!--tr end-->
                        </thead><!--thead end-->
                        
                        <tbody><!--tbody start-->
                            
                            <?php
          
                                $i=0;
                            
                                $get_payments = "select * from payments";
          
                                $run_payments = mysqli_query($con,$get_payments);
                                
                                while($row_payments=mysqli_fetch_array($run_payments)){
                                    
                                    $payment_id= $row_payments['payment_id'];
                                    
                                    $payment_mode= $row_payments['payment_mode'];
                                    
                                    $payment_invoice= $row_payments['invoice_no'];
                                    
                                    $ref_no= $row_payments['ref_no'];
                                    
                                    $code= $row_payments['code'];
                                    
                                    $payment_date= $row_payments['payment_date'];
                                    
                                    $get_order = "select * from pending_orders where invoice_no='$payment_invoice'";
          
                                    $run_order = mysqli_query($con,$get_order);
                                    
                                    $row_order = mysqli_fetch_array($run_order);
                                    
                                    $c_id = $row_order['customer_id'];
                                    
                                    $pro_c_id =  $row_order['product_id'];
                                    
                                    $get_pro = "select * from products where product_id='$pro_c_id'";
          
                                    $run_pro = mysqli_query($con,$get_pro);
                                    
                                    $row_pro = mysqli_fetch_array($run_pro);
                                    
                                    $pro_title = $row_pro['product_title'];
                                   
                                    $pro_id = $row_pro['product_id'];
                                    
                                    $pro_img1 = $row_pro['product_img1'];
                                    
                                    $pro_price = $row_pro['product_price'];
                                    
                                    $get_customer = "select * from customers where customer_id='$c_id'";
          
                                    $run_customer = mysqli_query($con,$get_customer);
                                    
                                    $row_customer = mysqli_fetch_array($run_customer);
                                    
                                    $customer_name = $row_customer['customer_name'];
                                    
                                    $customer_addr = $row_customer['customer_address'];
                                    
                                    $customer_email = $row_customer['customer_email'];
                                    
                                    $i++;
                            ?>
                            
                            
                            <tr><!--tr start-->
                                <td><?php echo $i;?></td>
                                <td><?php echo $pro_title;?></td>
                                <td><img src="product_images/<?php echo $pro_img1;?>" width="60" height="60"></td>
                                <td><?php echo $pro_price;?>Mzn</td>
                                <td><?php 
                                    
                                        $get_sold = "select * from pending_orders where product_id='$pro_id' AND order_status='Pago'";
                                        
                                        $run_sold = mysqli_query($con,$get_sold);
                                            
                                        $count = mysqli_num_rows($run_sold);
                                    
                                        echo $count;
                                    
                                    ;?></td>
                                <td><?php echo $payment_mode;?></td>
                                <td><?php echo $payment_invoice;?></td>
                                <td><?php echo $ref_no;?></td>
                                <td><?php echo $code;?></td>
                                <td><?php echo $customer_name;?></td>
                                <td><?php echo $customer_email;?></td>
                                <td><?php echo $customer_addr;?></td>
                                <td><?php echo $payment_date;?></td>
                                <td> <a href="index.php?delete_payments=<?php echo $payment_id; ?>"><i class="fa fa-trash"></i></a></td>
                                
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