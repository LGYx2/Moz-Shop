<center><!--- center begin -->
    
    <h1>Encomendas </h1>
    <p class="text'muted">Suas encomendas em um só lugar</p>
    
    <p class="text-muted">
         
         Se você tiver alguma questão, Sinta-se livre para nos contactar <a href="../contact.php">Contactar</a>.
        
    </p>
    
</center><!--- center end -->


<hr>


<div class="table-responsive" style="max-height: 285px;"><!--- table-responsive begin -->
    
    <table class="table table-bordered table-hover"><!--- table table-bordered table-hover begin -->
        
        <thead><!--- thead begin -->
            
            <tr><!--- tr begin -->
                
                <th> ON: </th>
                <th> Valor em Devida: </th>
                <th> Fatura Nº: </th>
                <th> Qty: </th>
                <th> Size </th>
                <th> Data : </th>
                <th> Pago / Ñ Pago : </th>
                <th> Estado: </th>
                
            </tr><!--- tr end -->
            
        </thead><!--- thead end -->
        
        <tbody><!--- tbody begin-->
           
           <?php 
            
            $customer_session = $_SESSION['customer_email'];
            
            $get_customer = "select * from customers where customer_email='$customer_session'";
            
            $run_customer = mysqli_query($con,$get_customer);
            
            $row_customer = mysqli_fetch_array($run_customer);
                                               
            $customer_id = $row_customer['customer_id'];
            
            $get_orders = "select * from customer_orders where customer_id='$customer_id'";
                                               
            $run_orders = mysqli_query($con,$get_orders);
             
            $i = 0;
                                               
            while($row_orders = mysqli_fetch_array($run_orders)){
                
                $order_id = $row_orders['order_id'];
                
                $due_amount = $row_orders['due_amount'];
                
                $invoice_no = $row_orders['invoice_no'];
                
                $qty = $row_orders['qty'];
                
                $size = $row_orders['size'];
                
                $order_date = substr($row_orders['order_date'],0,11);
                
                $order_status = $row_orders['order_status'];
                
                $i++;
                
                if($order_status=='Pending'){
                    
                    $order_status = 'não pago';
                    
                }else{
                    
                    $order_status = 'Pago';
                }
                
                
                

            ?>
           
           
            
            <tr><!--- tr begin -->
                
                <th> <?php echo $i; ?> </th>
                <td> <?php echo $due_amount; ?>Mzn</td>
                <td> <?php echo $invoice_no; ?> </td>
                <td> <?php echo $qty; ?> </td>
                <td> <?php echo $size; ?> </td>
                <td> <?php echo $order_date; ?> </td>
                <td> <?php echo $order_status; ?> </td>
                
                <td>
                    <?php
                        
                    if($order_status=='Pago'){
                        
                        echo "<class='btn btn-primary btn-sm'> Confirmado </a>";
                        
                    }else{
                    ?>
                       
                       <a href="confirm.php?order_id=<?php echo $order_id; ?>" target="_blank" class="btn btn-primary btn-sm"> Confirmar Pagamento </a> <?php } ?>
                        
    
                    
                    
                    
                </td>
                
            </tr><!--- tr end -->
            
            <tr><!--- tr begin -->
            <?php } ?>
        </tbody><!--- tbody end -->
        
        
    </table><!--- table table-bordered table-hover end -->
    
</div><!--- table-responsive end -->