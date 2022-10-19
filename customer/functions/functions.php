<?php

$con = mysqli_connect("localhost","root","","ecom_store");

/// getRealIpUser functions begin ///

function getRealIpUser(){
    
    switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
    }
}

/// getRealIpUser functions end///
/// add_cart functions begin///

function add_cart(){
    
    global $con;
    
    if(isset($_GET['add_cart'])){
        
        $ip_add = getRealIpUser();
        
        $p_id = $_GET['add_cart'];
        
        $product_qty = $_POST['product_qty'];
        
        $product_size = $_POST['product_size'];
        
        $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
        
        $run_check = mysqli_query($con,$check_product);
        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('Este Produto ja foi adicionado no carrinho')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }else{
            
            $query = "insert into cart (p_id,ip_add,qty,size) values ('$p_id','$ip_add','$product_qty','$product_size')";
            
            $run_query = mysqli_query($con,$query);
            
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
        }
        
    }
    
}
/// add_cart functions end///



/// getPro functions begin ///
function getPro(){
    
    global $con;
    
    $get_products = "select * from products order by 1 DESC LIMIT 0,8";
    
    $run_products = mysqli_query($con,$get_products);
    
    while($row_products=mysqli_fetch_array($run_products)){
        
        $pro_id = $row_products['product_id'];
        
        $pro_title = $row_products['product_title'];
        
        $pro_price = $row_products['product_price'];
        
        $pro_img1 = $row_products['product_img1'];
        
        echo "
        
        <div class='col-md-4 col-sm-6 single'>
        
            <div class='product'>
            
                <a href='details.php?pro_id=$pro_id''>
                
                    <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                
                </a>
                
                <div class='text'>
                
                    <h3>
            
                        <a href='details.php?pro_id=$pro_id'>

                            $pro_title

                        </a>
                    
                    
                    </h3>
                    
                    <p class='price'>
                    
                        $pro_price Mzn
                    
                    </p>
                    
                    <p class='button'>
                    
                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                            View Details

                        </a>
                    
                        <a class='btn btn-primary' href='cart.php?pro_id=$pro_id'>

                            <i class='fa fa-shopping-cart'></i> Add to cart

                        </a>
                    
                    
                    </p>
                
                </div>
            
            </div>
        
        </div>
        
        ";
    }
}
/// getPro functions end ///

/// getPcats_clothes functions begin ///

function getPcats_clothes(){
    
    global $con;
    
    $get_p_cats = "select * from product_categories LIMIT 0,7";
    
    $run_p_cats = mysqli_query($con,$get_p_cats);
    
    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
        
        $p_cat_id = $row_p_cats['p_cat_id'];
        
        $p_cat_title = $row_p_cats['p_cat_title'];
        
        echo "
        
            <li>
            
                <a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a>
            
            </li>
        
        
        ";
    }
    
}
/// getPcats_clothes functions end ///

/// getPcats functions begin ///

function getPcats(){
    
    global $con;
    
    $get_p_cats = "select * from product_categories LIMIT 7,100";
    
    $run_p_cats = mysqli_query($con,$get_p_cats);
    
    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
        
        $p_cat_id = $row_p_cats['p_cat_id'];
        
        $p_cat_title = $row_p_cats['p_cat_title'];
        
        echo "
        
            <li>
            
                <a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a>
            
            </li>
        
        
        ";
    }
    
   
}
/// getPcats functions end ///

/// getcats functions begin ///
function getcats(){
    
    global $con;
    
    $get_cats = "select * from categories LIMIT 0,3";
    
    $run_cats = mysqli_query($con,$get_cats);
    
    while($row_cats=mysqli_fetch_array($run_cats)){
        
        $cat_id = $row_cats['cat_id'];
        
        $cat_title = $row_cats['cat_title'];
        
        echo "
        
            <li>
            
                <a href='shop.php?cat=$cat_id'> $cat_title </a>
            
            </li>
        
        
        ";
    }
    
    
}
/// getcats functions end ///
/// getcats_other functions begin ///
function getcats_other(){
    
     global $con;
    
    $get_cats = "select * from categories LIMIT 3,100";
    
    $run_cats = mysqli_query($con,$get_cats);
    
    while($row_cats=mysqli_fetch_array($run_cats)){
        
        $cat_id = $row_cats['cat_id'];
        
        $cat_title = $row_cats['cat_title'];
        
        echo "
        
            <li>
            
                <a href='shop.php?cat=$cat_id'> $cat_title </a>
            
            </li>
        
        
        ";
    }
    
    
}
    

/// getcats_other functions end ///
/// getpcatpro functions begin ///

function getpcatpro(){
    
    global $con;
    
    if(isset($_GET['p_cat'])){
        
        $p_cat_id = $_GET['p_cat'];
        
        $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
        
        $run_p_cat = mysqli_query($con,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_title = $row_p_cat['p_cat_title'];
        
        $p_cat_desc = $row_p_cat['p_cat_desc'];
        
        $get_products = "select * from products where p_cat_id='$p_cat_id'";
        
        $run_products = mysqli_query($con,$get_products);
        
        $count = mysqli_num_rows($run_products);
        
        if($count==0){
            
            echo"
            
                <div class='box'>
                    
                    <h1> $p_cat_title </h1>
                
                    <h3> Nenhum Produto encontrado nesta categoria </h3>
                
                </div>
            
            
            ";
            
        }else{
            
            echo"
            
                <div class='box'>
                
                    <h1> $p_cat_title </h1>
                    
                    <p> $p_cat_desc </p>
                
                </div>
            
                
            
            ";
        }
       
        while($raiz_produts=mysqli_fetch_array($run_products)){
        
            $pro_id = $raiz_produts['product_id'];

            $pro_title = $raiz_produts['product_title'];

            $pro_price = $raiz_produts['product_price'];

            $pro_img1 = $raiz_produts['product_img1'];
            
            echo"
        
                <div class='col-md-4 col-sm-6 center-responsive'>

                    <div class='product'>

                        <a href='details.php?pro_id=$pro_id''>

                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>

                        </a>

                        <div class='text'>

                            <h3>

                                <a href='details.php?pro_id=$pro_id'>

                                    $pro_title

                                </a>


                            </h3>

                            <p class='price'>

                                $pro_price Mzn

                            </p>

                            <p class='button'>

                                <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                                   Detalhe

                                </a>

                                <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                                    <i class='fa fa-shopping-cart'></i> Carrinho

                                </a>


                            </p>

                        </div>

                    </div>

                </div>

            
            ";
        

            
        }
    }
}



/// getpcatpro functions end ///

/// getcatpro functions begin ///


function getcatpro(){
    
    global $con;
    
    if(isset($_GET['cat'])){
        
        $cat_id = $_GET['cat'];
        
        $get_cat = "select * from categories where cat_id='$cat_id'";
        
        $run_cat = mysqli_query($con,$get_cat);
        
        $row_cat = mysqli_fetch_array($run_cat);
        
        $cat_title = $row_cat['cat_title'];
        
        $cat_desc = $row_cat['cat_desc'];
        
        $enc_cat = "select * from products where cat_id='$cat_id' LIMIT 0,6";
        
        $corre_products = mysqli_query($con,$enc_cat);
        
        $count = mysqli_num_rows($corre_products);
        
        if($count==0){
            
            echo "
            
                <div class='box'>
                    
                    <h1> $cat_title </h1>
                    
                    <h3> Nenhum produto encontrado nesta categoria </h3>

                </div>
            
            ";
        }else{
            
            echo "
            
                <div class='box'>
                
                
                   <h1> $cat_title </h1>
                   
                   <p> $cat_desc </p>
                    

                </div>
            
            ";
        }
        
        while($raiz_products=mysqli_fetch_array($corre_products)){
            
            $pro_id = $raiz_products['product_id'];
            
            $pro_title = $raiz_products['product_title'];
            
            $pro_price = $raiz_products['product_price'];
            
            $pro_desc = $raiz_products['product_desc'];
            
            $pro_img1 = $raiz_products['product_img1'];
            
            echo "
            
                <div id='resize' class='col-md-4 col-sm-6 center-responsive'>
                    <div class='product'>
                        <a href='details.php?pro_id=$pro_id'>
                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                        </a>
                        <div class='text'>
                            <h3>
                                <a href='details.php?pro_id=$pro_id'> $pro_title </a>
                                                    
                            </h3>
                            <p class='price'>
                                $pro_price Mzn
                            </p>
                            <p class='button'>
                                <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                                    Detalhes
           
                                </a>
                                <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                    <i class='fa fa-shopping-cart'></i> Carrinho

                                </a>
                                                    
                           </p>
                                                
                       </div>
                                            
                    </div>
                 
              </div>

            ";
            
            
        }
    }
    
}
/// getcatpro functions end ///
/// getproshoes functions begin ///


//escrever funcao para quando a ordem for para shoes, os tamanhos serem em numeros
//    e quando for o contrario, serem em texto
function getproshoes(){
    
   global $con;
    
   if(isset($_GET['pro_id'])){
        
        $pro_id = $_GET['pro_id'];
       
        $enc_cat = "select * from products where product_id='$pro_id'";
       
        $corre_products = mysqli_query($con,$enc_cat);
       
        $raiz_products=mysqli_fetch_array($corre_products);
        
        $p_cat_id = $raiz_products['p_cat_id'];

        if($p_cat_id==6){

                echo "

                    <div class='form-group' ><!--form-group begin-->

                                       <label class='col-md-5 control-label'>Tamanho</label>

                                       <div class='col-md-7'><!--col-md-7 begin-->
                                               <select  name='product_size' class='form-control' required>
                                                  <!--select form-control begin-->
                                                   <option disabled selected>Selecione o Tamanho</option>
                                                   <option value='38'>38</option>
                                                   <option value='39'>39</option>
                                                   <option value='40'>40</option>
                                                   <option value='41'>41</option>
                                               </select><!--select form-control end-->
                                       </div><!--col-md-7 end-->


                   </div><!--form-group end-->

            ";


            }
        else{

                echo"

                 <div class='form-group' ><!--form-group begin-->

                                       <label class='col-md-5 control-label'>Tamanho</label>

                                       <div class='col-md-7'><!--col-md-7 begin-->
                                               <select  name='product_size' class='form-control' required>
                                                  <!--select form-control begin-->
                                                   <option disabled selected>Selecione o Tamanho</option>
                                                   <option value='Small'>Small</option>
                                                   <option value='Medium'>Medium</option>
                                                   <option value='Large'>Large</option>
                                               </select><!--select form-control end-->
                                       </div><!--col-md-7 end-->


                   </div><!--form-group end-->


            ";



            }


        }
}
    


/// getproshoes functions end ///

/// items functions begin/


function items(){
    
    global $con;
    
    $ip_add = getRealIpUser();
    
    $get_items = "select * from cart where ip_add='$ip_add'";
    
    $run_items = mysqli_query($con,$get_items);
    
    $count_items = mysqli_num_rows($run_items);
    
    echo $count_items;
    
}



/// total_price functions begin ///

function total_price(){
    
    global $con;
    
    $ip_add = getRealIpUser();
    
    $total = 0;
    
    $select_cart = "select * from cart where ip_add='$ip_add'";
    
    $run_cart = mysqli_query($con,$select_cart);
    
    while($record=mysqli_fetch_array($run_cart)){
        
        $pro_id = $record['p_id'];
        
        $pro_qty = $record['qty'];
        
        $get_price = "select * from products where product_id='$pro_id'";
        
        $run_price = mysqli_query($con,$get_price);
        
        while($row_price=mysqli_fetch_array($run_price)){
            
            $sub_total = $row_price['product_price']*$pro_qty;
            
            $total += $sub_total;
            
            
        }
    }
    
    echo $total . "Mzn";
    
}



/// total_price  functions end ///




/// items functions end ///


 
?>

