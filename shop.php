<?php 

    $active='Shop';
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
                       Loja
                   </li>
               </ul><!--breadcrumb end-->
               
           </div><!--col-md-12 end-->
           
           <div class="col-md-3"><!--col-md-3 begin-->
              
               <?php
        
                        include("includes/sidebar.php");
        
                ?>
               
           </div><!--col-md-3 end-->
           
           <div class="col-md-9"><!--col-md-9 begin-->
           
                       <div class='box'><!--Box Begin-->
                           <h1>Loja</h1>

                           <p>
                               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, vitae, eum, totam voluptates molestias impedit delectus tempore ullam iste molestiae quidem fugit officiis. Velit sint itaque deserunt accusamus porro adipisci.

                           </p>
                        </div><!--box end-->
               
               <div id="products" class="row"><!--Row Begin-->
                    <?php getProducts(); ?>
               </div><!--Row end-->
               
               <center>
                   <ul class="pagination"><!--pagination begin-->
                   <?php getPaginator(); ?>
                        
                   </ul><!--pagination end-->
               </center>

           </div><!--col-md-9 end-->

            <div id="wait" class="wait" style="position:absolute;top:40%;left:42%;padding: 200px 100px 100px 100px;"></div>

       </div><!--container end-->
   </div><!--content end-->
   
    <?php
        
        include("includes/footer.php");
        
    ?>
      
   <script src="js/jquery-331.min.js"></script>
   <script src="js/bootstrap-337.min.js"></script>
    
</body>
</html>