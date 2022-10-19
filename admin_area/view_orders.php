<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo"<script>window.open('login.php','_self')</script>";
    }else{

?>

<div class="row"><!-- row start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <ol class="breadcrumb"><!--breadcrumb start-->
            <li class="active"><!--active start-->
                
                <i class="fa fa-dashboard"></i> Painel / Ver encomendas
                
            </li><!--active end-->
        </ol><!--breadcrumb end-->
    </div><!--col-lg-12 end-->
</div><!-- row end-->

<div class="row"><!--row 2 start-->
    <div class="col-lg-12"><!--col-lg-12 start-->
        <div class="panel panel-default"><!--panel panel-default start-->
            <div class="panel-heading"><!--panel-heading start-->
                <h3 class="panel-title"><!--panel-title start-->
                    
                    <i class="fa fa-tags"></i> Ver encomendas
                    
                </h3><!--panel-title end-->
            </div><!--panel-heading end-->
                <div class="panel-body"><!---panel-body start -->
                    <div class="table-responsive"><!---table-responsive start -->
                        <table class="table table-hover table-striped table-bordered"><!---table table-hover table-striped table-bordered start-->

                            <thead><!---thead start -->
                               <tr><!---tr start -->
                                    <th> ID: </th>
                                    <th> Nome do Pro: </th>
                                    <th> Imagem Produto: </th>
                                    <th> Valor enviado: </th>
                                    <th> Factura numero: </th>
                                    <th> Qtd: </th>
                                    <th> Size: </th>
                                    <th> Estado: </th>
                                    <th> Data Encomenda: </th>
                                    <th> Nome Cliente: </th>
                                    <th> Endereço: </th>
                                    <th> Contacto: </th>
                                    <th> Delete: </th>
                                    
                               </tr><!---tr end -->
                            </thead><!---thead end -->

                            <tbody><!---tbody start -->

                               <?php
        
                                    $i=0;
        
                                    $get_order="select * from pending_orders";
                    
                                    $run_order= mysqli_query($con,$get_order);
        
                                    while($row_order=mysqli_fetch_array($run_order)){
                                        
                                        $order_id = $row_order['order_id'];

                                        $c_id = $row_order['customer_id'];

                                        $invoice_no = $row_order['invoice_no'];

                                        $product_id = $row_order['product_id'];

                                        $qty = $row_order['qty'];

                                        $size = $row_order['size'];

                                        $order_status = $row_order['order_status'];

                                        $get_customer = "select * from customers where customer_id='$c_id'";

                                        $run_customer = mysqli_query($con,$get_customer);

                                        $row_customer = mysqli_fetch_array($run_customer);

                                        $customer_name = $row_customer['customer_name'];

                                        $customer_email = $row_customer['customer_email'];

                                        $customer_addr = $row_customer['customer_address'];

                                        $customer_contact = $row_customer['customer_contact'];
                                
                                        $get_pro = "select * from products where product_id='$product_id'";
                                            
                                        $run_pro = mysqli_query($con,$get_pro);
                                        
                                        $raw_pro = mysqli_fetch_array($run_pro);
                                        
                                        $pro_title = $raw_pro['product_title'];
                                        
                                        $pro_img1 = $raw_pro['product_img1'];
                                        
                                        $get_c_orders = "select * from customer_orders where order_id='$order_id'";
                                        
                                        $run_c_orders = mysqli_query($con,$get_c_orders);
                                        
                                        $raw_c_orders = mysqli_fetch_array($run_c_orders);
                                        
                                        $due_amount = $raw_c_orders['due_amount'];
                                        
                                        $order_date = $raw_c_orders['order_date'];

                                        $i++;

                                    ?> 


                                <tr><!---tr start -->
                                    <td> <?php echo $i;?> </td>
                                    <td> <?php echo $pro_title;?> </td>
                                    <td><img src="product_images/<?php echo $pro_img1; ?>" alt="<?php echo $pro_name;?>" width="60" height="60"></td>
                                    <td> <?php echo $due_amount;?>Mzn </td>
                                    <td> <?php echo $invoice_no; ?> </td>
                                    <td> <?php echo $qty; ?></td>
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
                                    <td> <?php echo $order_date;?> </td>
                                    <td> <?php echo $customer_name;?> </td>
                                    <td> <?php echo $customer_addr;?> </td>
                                    <td> <?php echo $customer_contact;?> </td>
                                    <td> <a href="index.php?delete_order=<?php echo $order_id; ?>"><i class="fa fa-trash"></i></a></td>

                                </tr><!---tr end -->

                                <?php } ?>

                            </tbody><!---tbody end --> 

                        </table><!---table table-hover table-striped table-bordered start -->
                    </div><!---table-responsive end -->

                </div><!---panel-body end -->
            
        </div>
    </div>
</div>


<?php } ?>