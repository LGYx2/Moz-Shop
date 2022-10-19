<?php 

    $active='Home';
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
                       Termos & Condições
                   </li>
               </ul><!--breadcrumb end-->
               
           </div><!--col-md-12 end-->
           
                <div class="col-md-3"><!--col-md-3 begin-->

                    <div class="box">
                        <ul class="nav nav-pills nav-stacked">

                            <?php 
                            
                            $get_terms = "select * from terms LIMIT 0,1";

                            $run_terms = mysqli_query($con,$get_terms);

                            while($row_terms=mysqli_fetch_array($run_terms)){

                                $term_title = $row_terms['terms_title'];
                                $term_link = $row_terms['terms_link'];
                                $term_id = $row_terms['termsi_id'];
                                
                            
                            ?>
                            <li class="<?php if(isset($_GET[$term_link])){echo"active";}?>">
                
                                <a href="terms.php?<?php echo $term_link?>=<?php echo $term_id?>">
                                <?php echo $term_title?>
                                </a> 
                                
                            </li>

                            <?php  } ?>

                            <?php  
                            
                                $count_terms = "select * from terms";

                                $run_count_terms = mysqli_query($con,$count_terms);

                                $count = mysqli_num_rows($run_count_terms);

                                $get_terms = "select * from terms LIMIT 1,$count";

                                $run_terms = mysqli_query($con,$get_terms);

                                while($row_terms=mysqli_fetch_array($run_terms)){

                                    $term_title = $row_terms['terms_title'];
                                    $term_link = $row_terms['terms_link'];
                                    $term_id = $row_terms['termsi_id'];
                            
                            ?>
                            <li class="<?php if(isset($_GET[$term_link])){echo"active";}?>">
                
                                <a href="terms.php?<?php echo $term_link?>=<?php echo $term_id?>">
                                    <?php echo $term_title?>
                                </a> 
                                
                            </li>
                            <?php }?>
                        </ul>
                    </div>

                </div><!--col-md-3 end-->
                
                <div class="col-md-9"><!--col-md-9 begin-->
                    <div class="box">
                        <div class="tab-content">
                        <?php
                        
                        if(isset($_GET['terms_conditions'])){
                            include("terms_conditions.php");
                        }
                        
                        
                        ?>
                        
                        <?php
                        
                        if(isset($_GET['refund_policy'])){
                            include("refund_policy.php");
                        }
                        
                        
                        ?>
                        
                        <?php
                        
                        if(isset($_GET['promo_more'])){
                            include("promo_more.php");
                        }
                        
                        
                        ?>
                        
                            
                        </div>
                    </div>
                </div><!--col-md-9 end-->


       </div><!--container end-->
   </div><!--content end-->
   
    <?php
        
        include("includes/footer.php");
        
    ?>
      
   <script src="js/jquery-331.min.js"></script>
   <script src="js/bootstrap-337.min.js"></script>
   
    
</body>
</html>