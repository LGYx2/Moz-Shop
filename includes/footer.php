<div id="footer"><!--footer begin-->
    <div class="container"><!--container begin-->
        <div class="row"><!--row begin-->
            <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 begin-->
              
              <h4>Paginas</h4>
               
               <ul><!--ul begin-->
                   <li><a href="cart.php">Carrinho de Compras</a></li>
                   <li><a href="contact.php">Contate-nos</a></li>
                   <li><a href="shop.php">Loja</a></li>
                   <li><a href="customer/my_account.php?my_orders">Minha Conta</a></li>
               </ul><!--ul end-->
               
               <hr>
               
               <h4>Seccao do Usuario</h4>
               
               <ul><!--ul begin-->
                   <?php
                          
                          if(!isset($_SESSION['customer_email'])){
                              
                              
                              echo"<a href='checkout.php'>Login</a>";
                              
                          }else{
                              
                              echo"<a href='customer/my_account.php?my_orders'>Minha Conta</a>";
                              
                          }
                          
                          ?>
                   <li><a href="customer_register.php">Registro</a></li>
                   <li><a href="terms.php?terms_conditions=1">Termos & Condições</a></li>
               </ul><!--ul end-->
               
               <hr class="hidden-md hidden-lg hidden-sm">
                
            </div><!--col-sm-6 col-md-3 end-->
            
            <div class="com-sm-6 col-md-3"><!--col-sm-6 col-md-3 begin-->
                
                <h4>Top Categorias de Produtos</h4>
                
                <ul><!--ul begin-->
                    
                    <?php
                    
                        $get_p_cats = "select * from product_categories order by rand() LIMIT 0,7";
                        
                        $run_p_cats = mysqli_query($con,$get_p_cats);
                    
                        while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                            
                            $p_cat_id = $row_p_cats['p_cat_id'];
                            
                            $p_cat_title = $row_p_cats['p_cat_title'];
                            
                            echo "
                            
                                <li>
                                    <a href='shop.php?p_cat=$p_cat_id'>
                                    
                                        $p_cat_title
                                        
                                    </a>                                
                                </li>
                            
                            
                            ";
                            
                            
                        }
                    
                    
                    ?>
                    
                </ul><!--ul end-->
                
                <hr class="hidden-md hidden-lg">
                
            </div><!--col-sm-6 col-md-3 end-->
            
            <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 begin-->
                
                <h4>Encontre-nos</h4>
                
                <p><!--p begin-->
                    
                    <strong>Fenix Organization.</strong>
                    <br/>Maputo
                    <br/>Matola
                    <br/>+258842025446
                    <br/>wodashwalker@gmail.com
                    <br/><strong>Sr. Ismael</strong>
                    
                </p><!--p end-->
                
                <a href="contact.php">Contacte-nos</a>
                
                <hr class="hidden-md hidden-lg">
                
                
            </div><!--col-sm-6 col-md-3 end-->
            
            <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 begin-->
                
                <h4>Receba as Novidades</h4>
                
                <p class="text-muted">
                    
                  Mantenha-se actualizado de todas novidades no mercado.
                    
                </p>
                <form action="get" method="post"><!--form begin-->
                    <div class="input-group"><!--input-group end-->
                        
                        <input type="text" class="form-control" name="email" required placeholder="Email">
                        
                        <span class="input-group-btn"><!--input-group-btn begin-->
                            
                            <input type="submit" value="subscrever" class="btn btn-default">
                            
                        </span><!--input-group-btn end-->
                        
                    </div><!--input-group end-->
                </form><!--form end-->
                
                <hr>
                
                <h3>Keep in touch</h3>
                
                <p class="social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-google-plus"></a>
                    <a href="#" class="fa fa-envelope"></a>
                </p>
            </div><!--col-sm-6 col-md-3 end-->
            
        </div><!--row end-->
    </div><!--container end-->
</div><!--footer end-->


<div id="copyright"><!--#copyright begin-->
    <div class="container"><!--container begin-->
        <div class="col-md-6"><!--col-md-6 begin-->
            
            <p class="pull-left">&copy; Moz eStore 2021 All Rights Reserved</p>
            
        </div><!--col-md-6 end-->
        <div class="col-md-6"><!--col-md-6 begin-->
            
            <p class="pull-right">Theme by: <a href="#">MrLGYx2</a></p>
            
        </div><!--col-md-6 end-->
    </div><!--container end-->
</div><!--#copyright end-->