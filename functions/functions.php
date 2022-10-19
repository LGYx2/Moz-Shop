<?php

$con = mysqli_connect("127.0.0.1","root","yourpass","ecom_store");

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
        
        $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id' ";
        
        $run_check = mysqli_query($con,$check_product);
        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('Este Produto ja foi adicionado no carrinho')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }else{
            
            $query = "insert into cart (p_id,ip_add,qty,size) values ('$p_id','$ip_add','$product_qty','$product_size')";
            
            $run_query = mysqli_query($con,$query);
            
            echo "<script>window.open('cart.php','_self')</script>";
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
/// getPro functions end ///

/// getPcats_clothes functions begin ///

// function getPcats(){
    
//     global $con;
    
//     $get_p_cats = "select * from product_categories";
    
//     $run_p_cats = mysqli_query($con,$get_p_cats);
    
//     while($row_p_cats=mysqli_fetch_array($run_p_cats)){
        
//         $p_cat_id = $row_p_cats['p_cat_id'];
        
//         $p_cat_title = $row_p_cats['p_cat_title'];
        
//         echo "
        
//             <li>
            
//                 <a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a>
            
//             </li>
        
        
//         ";
//     }
    
// }

function getPcats(){
    
    global $con;


                        $get_p_cat = "select * from product_categories where p_cat_top='yes'";

                        $run_p_cat = mysqli_query($con,$get_p_cat);

                        while($row_p_cat=mysqli_fetch_array($run_p_cat)){

                            $p_cat_id = $row_p_cat['p_cat_id'];
                            $p_cat_title = $row_p_cat['p_cat_title'];
                            $p_cat_image = $row_p_cat['p_cat_image'];

                            if($p_cat_image == ""){

                            }else{

                                $p_cat_image = "<img src='admin_area/other_images/$p_cat_image' width='30px'>&nbsp;";
                                
                            }

                            echo"
                            <li style='background:#ddd' class='p_cat checkbox checkbox-primary'>
                            
                                <a id='p_cat'>
                                
                                    <label>
                                        <input value='$p_cat_id' type='checkbox' class='get_p_cat' name ='p_cat'>
                                        <span>
                                            $p_cat_image
                                            $p_cat_title
                                        </span>
                                    </label>

                                </a>
                            
                            </li>";

                        }

                        $get_p_cats = "select * from product_categories where p_cat_top='no'";

                        $run_p_cat = mysqli_query($con,$get_p_cats);

                        while($row_p_cat=mysqli_fetch_array($run_p_cat)){

                            $p_cat_id = $row_p_cat['p_cat_id'];
                            $p_cat_title = $row_p_cat['p_cat_title'];
                            $p_cat_image = $row_p_cat['p_cat_image'];

                            if($p_cat_image == ""){

                            }else{

                                $p_cat_image = "<img src='admin_area/other_images/$p_cat_image' width='30px'>&nbsp;";
                                
                            }

                            echo"
                            <li class='p_cat checkbox checkbox-primary'>
                            
                                <a id='p_cat'>
                                
                                    <label>
                                        <input value='$p_cat_id' type='checkbox' class='get_p_cat' name ='p_cat'>
                                        <span>
                                            $p_cat_image
                                            $p_cat_title
                                        </span>
                                    </label>

                                </a>
                            
                            </li>";

                        }
                    


}

/// getPcats_clothes functions end ///

/// getPcats functions begin ///

//function getPcats(){
//    
//    global $con;
//    
//    $get_p_cats = "select * from product_categories LIMIT 7,100";
//    
//    $run_p_cats = mysqli_query($con,$get_p_cats);
//    
//    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
//        
//        $p_cat_id = $row_p_cats['p_cat_id'];
//        
//        $p_cat_title = $row_p_cats['p_cat_title'];
//        
//        echo "
//        
//            <li>
//            
//                <a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a>
//            
//            </li>
//        
//        
//        ";
//    }
//    
//   
//}
/// getPcats functions end ///

/// getcats functions begin ///
// function getcats(){
    
//     global $con;
    
//     $get_cats = "select * from categories";
    
//     $run_cats = mysqli_query($con,$get_cats);
    
//     while($row_cats=mysqli_fetch_array($run_cats)){
        
//         $cat_id = $row_cats['cat_id'];
        
//         $cat_title = $row_cats['cat_title'];
        
//         echo "
        
//             <li>
            
//                 <a href='shop.php?cat=$cat_id'> $cat_title </a>
            
//             </li>
        
        
//         ";
//     }
    
    
// }
function getcats(){
    global $con;
                        
                        $get_categories = "select * from categories where cat_top='yes'";

                        $run_cat = mysqli_query($con,$get_categories);

                        while($row_cat=mysqli_fetch_array($run_cat)){

                            $cat_id = $row_cat['cat_id'];
                            $cat_title = $row_cat['cat_title'];
                            $cat_image = $row_cat['cat_image'];

                            if($cat_image == ""){

                            }else{

                                $cat_image = "<img src='admin_area/other_images/$cat_image' width='30px'>&nbsp;";
                                
                            }

                            echo"
                            <li style='background:#ddd' class='checkbox checkbox-primary'>
                            
                                <a id='cat'>
                                
                                    <label>
                                        <input value='$cat_id' type='checkbox' class='get_cat' name ='cat'>
                                        <span>
                                            $cat_image
                                            $cat_title
                                        </span>
                                    </label>

                                </a>
                            
                            </li>";

                        }
                        


    $get_categories = "select * from categories where cat_top='no'";

    $run_cat = mysqli_query($con,$get_categories);

   while($row_cat=mysqli_fetch_array($run_cat)){

            $cat_id = $row_cat['cat_id'];
            $cat_title = $row_cat['cat_title'];
            $cat_image = $row_cat['cat_image'];

            if($cat_image == ""){

            }else{

                $cat_image = "<img src='admin_area/other_images/$cat_image' width='30px'>&nbsp;";
                                
            }

                            echo"
                            <li class='cat checkbox checkbox-primary'>
                            
                                <a id='cat'>
                                
                                    <label>
                                        <input value='$cat_id' type='checkbox' class='get_cat' name ='cat'>
                                        <span>
                                            $cat_image
                                            $cat_title
                                        </span>
                                    </label>

                                </a>
                            
                            </li>";

                        }
                        
   


}

/// getcats functions end ///
/// getcats_other functions begin ///
//function getcats_other(){
//    
//     global $con;
//    
//    $get_cats = "select * from categories LIMIT 3,100";
//    
//    $run_cats = mysqli_query($con,$get_cats);
//    
//    while($row_cats=mysqli_fetch_array($run_cats)){
//        
//        $cat_id = $row_cats['cat_id'];
//        
//        $cat_title = $row_cats['cat_title'];
//        
//        echo "
//        
//            <li>
//            
//                <a href='shop.php?cat=$cat_id'> $cat_title </a>
//            
//            </li>
//        
//        
//        ";
//    }
//    
//    
//}
    

/// getcats_other functions end ///
/// getpcatpro functions begin ///

function getManufacturer(){
    global $con;
                        
    $get_manufacturers = "select * from manufacturers where manufacturer_top='yes'";

    $run_manufacturer = mysqli_query($con,$get_manufacturers);

    while($row_manufacturer=mysqli_fetch_array($run_manufacturer)){

        $manufacturer_id = $row_manufacturer['manufacturer_id'];
        $manufacturer_title = $row_manufacturer['manufacturer_title'];
        $manufacturer_image = $row_manufacturer['manufacturer_image'];

        if($manufacturer_image == ""){

        }else{

            $manufacturer_image = "<img src='admin_area/other_images/$manufacturer_image' width='30px'>&nbsp;";
            
        }

        echo"
        <li style='background:#ddd' class='checkbox checkbox-primary'>
        
            <a id='manufacturer'>
            
                <label>
                    <input value='$manufacturer_id' type='checkbox' class='get_manufacturer' name ='manufacturer'>
                    <span>
                        $manufacturer_image
                        $manufacturer_title
                    </span>
                </label>

            </a>
        
        </li>";

    }
    
    $get_manufacturers = "select * from manufacturers where manufacturer_top='no'";

    $run_manufacturer = mysqli_query($con,$get_manufacturers);

    while($row_manufacturer=mysqli_fetch_array($run_manufacturer)){

        $manufacturer_id = $row_manufacturer['manufacturer_id'];
        $manufacturer_title = $row_manufacturer['manufacturer_title'];
        $manufacturer_image = $row_manufacturer['manufacturer_image'];

        if($manufacturer_image == ""){

        }else{

            $manufacturer_image = "<img src='admin_area/other_images/$manufacturer_image' width='30px'>&nbsp;";
            
        }

        echo"
        <li class='checkbox checkbox-primary'>
        
            <a id='manufacturer'>
            
                <label>
                    <input value='$manufacturer_id' type='checkbox' class='get_manufacturer' name ='manufacturer'>
                    <span>
                        $manufacturer_image
                        $manufacturer_title
                    </span>
                </label>

            </a>
        
        </li>";

    }
    

}




/// getproshoes functions begin ///


//escrever funcao para quando a ordem for para shoes, os tamanhos serem em numeros
//    e quando for o contrario, serem em texto
function getproshoes(){
    
   global $con;
    
   if(isset($_GET['pro_id'])){
        
        $pro_id = $_GET['pro_id'];
       
        $enc_cat = "select * from products where product_id='$pro_id'";
       
        $enc_p_cat = "select * from product_categories where p_cat_title='Sapatilhas' OR p_cat_title='Sapatos'";
        
        $corre_cat_products = mysqli_query($con,$enc_p_cat);
       
        $raiz_cat_products=mysqli_fetch_array($corre_cat_products);
       
        $corre_products = mysqli_query($con,$enc_cat);
       
        $raiz_products=mysqli_fetch_array($corre_products);
        
        $p_cat_id = $raiz_cat_products['p_cat_id'];
    
        $p_id = $raiz_products['product_id'];

        if($p_cat_id==$p_id){
                
            
                echo "

                    <div class='form-group' ><!--form-group begin-->

                                       <label class='col-md-5 control-label'>Tamanho</label>

                                       <div class='col-md-7'><!--col-md-7 begin-->
                                               <select name='product_size' class='form-control' required>
                                                  <!--select form-control begin-->
                                                   <option value='' disabled selected >Selecione o Tamanho</option>
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
                                                   <option value='' disabled selected>Selecione o Tamanho</option>
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
/// getProducts() function begin ///

function getProducts(){
    global $con;

    $aWhere = array();

    ///begin for manufaturer///

    if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

        foreach($_REQUEST['man'] as $sKey=>$sVal){
            if((int)$sVal!=0){

                $aWhere[]='manufacturer_id='.(int)$sVal;

            }
        }

    }

    ///end for manufacturer///
    ///begin for product Categories///
    if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

        foreach($_REQUEST['p_cat'] as $sKey=>$sVal){
            if((int)$sVal!=0){

                $aWhere[]='p_cat_id='.(int)$sVal;

            }
        }

    }

    ///end for product Categories///
    ///begin for  Categories///
    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

        foreach($_REQUEST['cat'] as $sKey=>$sVal){
            if((int)$sVal!=0){

                $aWhere[]='cat_id='.(int)$sVal;

            }
        }

    }

    ///end for Categories///
    $per_page=6;
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }

    $start_from = ($page-1)* $per_page;
    $sLimit= "order by 1 DESC LIMIT $start_from,$per_page";
    $sWhere =(count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'').$sLimit;
    $get_products ="select * from products $sWhere";
    $run_products=mysqli_query($con,$get_products);
    while($row_products=mysqli_fetch_array($run_products)){
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_img1 = $row_products['product_img1'];

        echo"

            <div class='col-md-4 col-sm-6 center-responsive'>
            
                <div class='product'>

                    <a href='details.php?pro_id=$pro_id'>
                    
                        <img class='img-responsive' src='admin_area/product_images/$pro_img1'>

                    </a>

                    <div class='text'>
                    
                        <h3>$pro_title</h3>

                        <p class='price'>$pro_price Mzn</p>
                        <p class='button'>
                        
                            <a  class='btn btn-default' href='details.php?pro_id=$pro_id'>Detalhes</a>
                            <a  class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                            
                                <i class='fa fa-shopping-cart'> Carrinho</i>
                            
                            </a>
                        
                        </p>
                        
                    
                    </div>

                </div>
            
            </div>
        
        
        ";
    }

}

/// getProducts() function end ///
/// getPaginator() function begin ///

function getPaginator(){

    global $con;

    $per_page=6;
    $aWhere = array();
    $aPath='';

    ///begin for manufaturer///

    if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

        foreach($_REQUEST['man'] as $sKey=>$sVal){
            if((int)$sVal!=0){

                $aWhere[]='manufacturer_id='.(int)$sVal;
                $aPath .='man[]='.(int)$sVal.'&';

            }
        }

    }

    ///end for manufacturer///
    ///begin for product Categories///
    if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

        foreach($_REQUEST['p_cat'] as $sKey=>$sVal){
            if((int)$sVal!=0){

                $aWhere[]='p_cat_id='.(int)$sVal;
                $aPath .='p_cat[]='.(int)$sVal.'&';


            }
        }

    }

    ///end for product Categories///
    ///begin for  Categories///
    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

        foreach($_REQUEST['cat'] as $sKey=>$sVal){
            if((int)$sVal!=0){

                $aWhere[]='cat_id='.(int)$sVal;
                $aPath .='cat[]='.(int)$sVal.'&';


            }
        }

    }

    ///end for Categories///
    $sWhere=(count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'');
    $query ="select * from products $sWhere";
    $result=mysqli_query($con,$query);
    $total_records = mysqli_num_rows($result);
    $total_pages=ceil($total_records/$per_page);

    echo"<li><a href='shop.php?page=1";
    if(!empty($aPath)){
        echo"&".$aPath;
    }
    
    echo"'>"."Primeira"."</a></li>";

    for($i=1;$i<=$total_pages;$i++){
        
        echo"<li><a href='shop.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."'>".$i."</a></li>";

    };

    echo"<li><a href='shop.php?page=$total_pages";

    if(!empty($aPath)){
        echo"&".$aPath;
    }
    echo"'>"."Ultima"."</a></li>";
    


}

/// getPaginator() function end ///

 
?>

