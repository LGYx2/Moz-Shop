<?php 

    $active='Home';
    include("includes/header.php");

?>
   
    <div id="slider" class="container" ><!--container begin-->
       
       <div class="col-md-12"><!--col-md-12 begin-->
          
          <div class="carousel slide" id="myCarousel" data-ride="carousel"><!--carousel slide begin-->
             
              <ol class="carousel-indicators"><!--carousel-indicators begin-->
                  
                  <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                  <li data-target="#myCarousel" data-slide-to="3"></li>
                  
                  
                      
                      
                      
                  
                  
              </ol><!--carousel-indicators end-->
              
              <div class="carousel-inner"><!--carousel-inner begin-->
                 
                 <?php
                  
                  $get_slides = "select * from slider LIMIT 0,1";
                  
                  $run_slides = mysqli_query($con,$get_slides);
                  
                  while($row_slides=mysqli_fetch_array($run_slides)){
                      
                      $slide_name = $row_slides['slide_name'];
                      $slide_image = $row_slides['slide_image'];
                      $slide_url = $row_slides['slide_url'];
                      
                      echo "
                      
                      <div class='item active'>
                          <a href='$slide_url'>
                            <img src='admin_area/slides_images/$slide_image'>
                          </a>
                      </div>
                      
                      ";
                      
                  }
                  
                  $get_slides = "select * from slider LIMIT 1,3";
                  
                  $run_slides = mysqli_query($con,$get_slides);
                  
                  while($row_slides=mysqli_fetch_array($run_slides)){
                      
                      $slide_name = $row_slides['slide_name'];
                      $slide_image = $row_slides['slide_image'];
                      $slide_url = $row_slides['slide_url'];
                      
                      echo "
                      
                      <div class='item'>
                          <a href='$slide_url'>
                            <img src='admin_area/slides_images/$slide_image'>
                          </a>
                      </div>
                      
                      ";
                      
                  }
                  
                  
                  ?>
                  
                  <?php
                    
                    $get_box_1 = "select * from home_box where box_id = 1";
                    
                    $run_box_1 = mysqli_query($con,$get_box_1);
                        
                    $row_box_1 = mysqli_fetch_array($run_box_1);
                  
                    $box_title_1 = $row_box_1['box_title'];
                  
                    $box_desc_1 = $row_box_1['box_desc'];
                  
                    $get_box_2 = "select * from home_box where box_id = 2";
                    
                    $run_box_2 = mysqli_query($con,$get_box_2);
                        
                    $row_box_2 = mysqli_fetch_array($run_box_2);
                  
                    $box_title_2 = $row_box_2['box_title'];
                  
                    $box_desc_2 = $row_box_2['box_desc'];
                  
                    $get_box_3 = "select * from home_box where box_id = 3";
                    
                    $run_box_3 = mysqli_query($con,$get_box_3);
                        
                    $row_box_3 = mysqli_fetch_array($run_box_3);
                  
                    $box_title_3 = $row_box_3['box_title'];
                  
                    $box_desc_3 = $row_box_3['box_desc'];
                  
                  
                  
                  ?>
                  
              </div><!--carousel-inner end-->
              
              <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!--left carousel-control begin-->
                  
                  
                  <span class="glyphicon glyphicon-cevron-left"></span>
                  <span class="sr-only">Previous</span>
                  
                  
              </a><!--left carousel-control end-->
              <a href="#myCarousel" class="right carousel-control" data-slide="next"><!--left carousel-control begin-->
                  
                  
                  <span class="glyphicon glyphicon-cevron-right"></span>
                  <span class="sr-only">Next</span>
                  
                  
              </a><!--left carousel-control end-->
              
          </div><!--carousel slide end-->
           
       </div><!--col-md-12 end-->
       
   </div><!--container end-->
   
    <div id="advantages"><!--advantages begin-->
       
       <div class="container"><!--container begin-->
       
          <div class="same-height-row"><!--same-height-row begin-->
              
              <div class="col-sm-4"><!--col-sm-4 begin-->
                  
                  <div class="box same-height"><!--box same-height begin-->
                      
                      <div class="icon"><!--icon begin-->
                          
                          <i class="fa fa-home"></i>
                          
                      </div><!--icon end-->
                      
                      <h3><a href="#"><?php echo $box_title_1;?></a></h3>
                      
                      <p><?php echo $box_desc_1;?></p>
                      
                  </div><!--box same-height end-->
                  
                  
                  
              </div><!--col-sm-4 end-->
               <div class="col-sm-4"><!--col-sm-4 begin-->
                  
                  <div class="box same-height"><!--box same-height begin-->
                      
                      <div class="icon"><!--icon begin-->
                          
                          <i class="fa fa-tag"></i>
                          
                      </div><!--icon end-->
                      
                      <h3><a href="#"><?php echo $box_title_2;?></a></h3>
                      
                      <p><?php echo $box_desc_2;?></p>
                      
                  </div><!--box same-height end-->
                  
                  
                  
              </div><!--col-sm-4 end-->
               <div class="col-sm-4"><!--col-sm-4 begin-->
                  
                  <div class="box same-height"><!--box same-height begin-->
                      
                      <div class="icon"><!--icon begin-->
                          
                          <i class="fa fa-get-pocket"></i>
                          
                      </div><!--icon end-->
                      <h3><a href="#"><?php echo $box_title_3;?></a></h3>
                      
                      <p><?php echo $box_desc_3;?></p>
                      
                  </div><!--box same-height end-->
                  
                  
                  
              </div><!--col-sm-4 end-->
              
              
          </div><!--same-height-row end-->
        
               
       </div><!--container end-->
       
   </div><!--advantages end-->

    <div id="hot"><!--#hot begin-->
       
       <div class="box"><!--box begin-->
          
          <div class="container"><!--container begin-->
              
              <div class="col-md-12"><!--col-md-12 begin-->
                  
                  <h2>
                      Mais recentes Produtos
                  </h2>
                  
              </div><!--col-md-12 end-->
              
              
          </div><!--container end-->
           
       </div><!--box end-->
        
    </div><!--#hot end-->
     
    <div id="content" class="container"><!--container begin-->
         
         <div class="row"><!--row begin-->
           
           <?php  
            
             getPro();
             
             
            ?>
            
         </div><!--row end-->
         
     </div><!--container end-->
     
     <?php
        
        include("includes/footer.php");
        
      ?>
      
   <script src="js/jquery-331.min.js"></script>
   <script src="js/bootstrap-337.min.js"></script>
   
    
</body>
</html>




