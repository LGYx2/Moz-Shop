<?php 

    $active='Cart';
    include("includes/header.php");

?>
   
   
   <div id="content"><!--content begin-->
       <div class="container"><!--container begin-->
           <div class="col-md-12"><!--col-md-12 begin-->
               
               <ul class="breadcrumb"><!--breadcrumb begin-->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Cart
                   </li>
               </ul><!--breadcrumb end-->
               
           </div><!--col-md-12 end-->
           
           <div id="cart" class="col-md-9"><!--col-md-9 begin-->
               
               <div class="box"><!--box begin-->
                   
                   <form action="cart.php" method="post" enctype="multipart/form-data"><!--form begin-->
                       
                       <h1>Carrinho de Compras</h1>
                       <?php 
                       
                       
                       $ip_add = getRealIpUser();
                       
                       $select_cart = "select * from cart where ip_add='$ip_add'";
                       
                       $run_cart = mysqli_query($con,$select_cart);
                       
                       $count = mysqli_num_rows($run_cart)
                       
                       ?>
                       
                       
                       <p class="text-muted">Você tem <?php echo $count; ?> item(s) no seu carrinho</p>
                       
                       <div class="table-responsive"><!--table-responsive begin-->
                           
                           <table class="table"><!--table begin-->
                               
                               <thead><!--thead begin-->
                                   
                                    <tr><!--tr begin-->
                                        
                                        <th colspan="2">Producto</th>
                                        <th>Quantidade</th>
                                        <th>Preço Un</th>
                                        <th>Tamanho</th>
                                        <th colspan="1">Delete</th>
                                        <th colspan="2">Sub-Total</th>
                                        
                                    </tr><!--tr end-->
                                   
                               </thead><!--thead end-->
                               
                               <tbody><!--tbody begin-->
                                   
                                   <?php 
                                   
                                   $total = 0;
                                   
                                   while($raiz_cart = mysqli_fetch_array($run_cart)){
                                       
                                       $pro_id = $raiz_cart['p_id'];
                                       
                                       $pro_size = $raiz_cart['size'];
                                       
                                       $pro_qty = $raiz_cart['qty'];
                                       
                                       $enco_products = "select * from products where product_id='$pro_id'";
                                       
                                       $run_product = mysqli_query($con,$enco_products);
                                       
                                       while($raiz_products=mysqli_fetch_array($run_product)){
                                           
                                           $product_title = $raiz_products['product_title'];
                                           
                                           $product_img1 = $raiz_products['product_img1'];
                                           
                                           $only_price = $raiz_products['product_price'];
                                           
                                           $sub_total = $raiz_products['product_price']*$pro_qty;
                                           
                                           $total += $sub_total;
                                           
                                   
                                   ?>
           
                                   <tr><!--tr begin-->
                                       
                                       
                                       <td><!--td begin-->
                                           
                                           <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product 1">
                                           
                                       </td><!--td end-->
                                       
                                       <td>
                                           
                                           <a href="details.php?pro_id=<?php echo $pro_id; ?>"><?php echo $product_title; ?></a>
                                           
                                       </td>
                                       
                                       <td>
                                          <?php echo $pro_qty; ?>
                                       </td>
                                       
                                       <td>
                                           
                                           <?php echo $only_price; ?>Mzn
                                       </td>
                                       
                                       <td>
                                           <?php echo $pro_size; ?>
                                       </td>
                                       <td>
                                           <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
                                       </td>
                                       <td>
                                           <?php echo $sub_total; ?>Mzn
                                       </td>
                                   </tr><!--tr end-->
                                   
                                   <?php } } ?>
                                   
                               </tbody><!--tbody end-->
                               
                               <tfoot><!--tfoot begin-->
                                   
                                   <tr><!--tr begin-->
                                       
                                       <th colspan="5">Total</th>
                                       <th colspan="2"><?php echo $total; ?>Mzn</th>
                                       
                                   </tr><!--tr end-->
                                   
                                   
                               </tfoot><!--tfoot end-->
                               
                           </table><!--table end-->
                           
                       </div><!--table-responsive end-->
                       
                       <div class="box-footer"><!--box-footer begin-->
                           
                           <div class="pull-left"><!--pull-left begin-->
                               
                               <a href="shop.php" class="btn btn-default"><!--btn btn-default begin-->
                                   
                                   <i class="fa fa-chevron-left"></i> Continuar na Loja
                                   
                               </a><!--btn btn-default end-->
                               
                               
                           </div><!--pull-left end-->
                           
                           <div class="pull-right"><!--pull-right begin-->
                               
                               <button type="submit" name="update" value="Update Cart" class="btn btn-default"><!--btn btn-default begin-->
                                   
                                   <i class="fa fa-refresh"></i> Actualizar Carrinho
                                   
                               </button><!--btn btn-default end-->
                               
                               <a href="checkout.php" class="btn btn-primary">
                                   
                                   Confirmar Pagamentos <i class="fa fa-chevron-right"></i>
                                   
                               </a>
                               
                               
                           </div><!--pull-right end-->
                           
                       </div><!--box-footer end-->
                       
                   </form><!--form end-->
                   
               </div><!--box end-->
               
               <?php  
               
               function update_cart(){
                   
                   global $con;
                   
                   if(isset($_POST['update'])){
                       
                       foreach($_POST['remove'] as $remove_id){
                           
                           $delete_product = "delete from cart where p_id='$remove_id'";
                           
                           $run_delete = mysqli_query($con,$delete_product);
                           
                           if($run_delete){
                               
                               echo "<script>window.open('cart.php','_self')</script>";
                               
                           }
                       }
                       
                   }
               }
               
               echo @$up_cart = update_cart()
               
               ?>
               
               <div id="rowsame-heigh-row"><!--#rowsame-heigh-row begin-->
                   <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 begin-->
                       <div class="box same-height headline"><!--box same-height headline begin-->
                           <h3 class="text-center">Escolha productos ao seu gosto</h3>
                       </div><!--box same-height headline end-->
                   </div><!--col-md-3 col-sm-6 end-->
                   
                   <?php
                   
                   $enc_products = "select * from products order by rand() LIMIT 0,3";
                   
                   $corre_products = mysqli_query($con,$enc_products);
               
                   while($row_products=mysqli_fetch_array($corre_products)){
                       
                       $pro_id = $row_products['product_id'];
                       
                       $pro_img1 = $row_products['product_img1'];
                       
                       $pro_title = $row_products['product_title'];
                       
                       $pro_price = $row_products['product_price'];
                       
                       echo "
                   
                           <div class='col-md-3 col-sm-6 center-responsive'><!--col-md-3 col-sm-6 center-responsive begin-->
                               <div class='product same-height active'><!--product same-height begin-->
                                   <a href='details.php?pro_id=$pro_id'>
                                       <img class='img-responsive' src='admin_area/product_images/$pro_img1' alt=''>
                                   </a>

                                   <div class='text'><!--text begin-->
                                       <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>


                                       <p class='price'>$pro_price Mzn</p>

                                   </div><!--text end-->

                               </div><!--product same-height end-->
                           </div><!--col-md-3 col-sm-6 center-responsive end-->
                   
                       
                       
                       ";
                   }
                   
                   
                   ?>
 
               </div><!--#rowsame-heigh-row end-->
               
           </div><!--col-md-9 end-->
           
           
           <div class="col-md-3"><!--col-md-3 begin-->
               
               <div id="order-summary" class="box"><!--box begin-->
                   
                   <div class="box-header">
                       
                       <h3>Resumo da Encomenda</h3>
                       
                       
                   </div>
                   
                   <p class="text-muted"><!--text-muted begin-->
                       
                       Compras e custos adicionais são calculados com base no valor que inseriu
                       
                   </p><!--text-muted end-->
                   
                   <div class="table-responsive"><!--table-responsive begin-->
                       
                       <table class="table"><!--table begin-->
                           
                           <tbody><!--tbody begin-->
                               
                               <tr><!--tr begin-->
                                   
                                   <td>Sub-Total</td>
                                   <th><?php echo $total; ?>Mzn</th>
                                   
                               </tr><!--tr end-->
                               
                               <tr><!--tr begin-->
                                   
                                   <td>Entrega</td>
                                   <td>$0</td>
                                   
                               </tr><!--tr end-->
                               <tr><!--tr begin-->
                                   
                                   <td> Tax </td>
                                   <th>$0</th>
                                   
                               </tr><!--tr end-->
                               <tr class="total"><!--tr begin-->
                                   
                                   <td>Total</td>
                                   <th><?php echo $total; ?>Mzn</th>
                                   
                               </tr><!--tr end-->
                           </tbody><!--tbody end-->
                           
                       </table><!--table end-->
                       
                   </div><!--table-responsive end-->
                   
               </div><!--box end-->
               
           </div><!--col-md-3 end-->
           
    
       </div><!--container end-->
   </div><!--content end-->
   
    <?php
        
        include("includes/footer.php");
        
    ?>
      
   <script src="js/jquery-331.min.js"></script>
   <script src="js/bootstrap-337.min.js"></script>
   
    
</body>
</html>