<?php 
    
    $active ='Contact';
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
                       Contact Us
                   </li>
               </ul><!--breadcrumb end-->
               
           </div><!--col-md-12 end-->
           
           <div class="col-md-3"><!--col-md-3 begin-->
    
              
            <?php

            include("includes/sidebar.php");

            ?>
               
           </div><!--col-md-3 end-->
           
           <div class="col-md-9"><!--col-md-9 begin-->
               
              <div class="box"><!--box begin-->
                  
                  <div class="box-header"><!--box-header begin-->
                      
                      <center><!--center begin-->
                          
                          <h2>Feel free to contact Us</h2>
                          
                          <p class="text-muted"><!--text-muted begin-->
                              
                              If you have any questions, feel free to contact us. 
                              
                          </p><!--text-muted end-->
                          
                      </center><!--center end-->
                      
                      <form action="contact.php" method="post"><!--form begin-->
                          
                          <div class="form-group"><!--form-group begin-->
                              
                              <label>Name</label>
                              
                              <input type="text" class="form-control" name="name" required>
                              
                              
                          </div><!--form-group end-->
                          
                          <div class="form-group"><!--form-group begin-->
                              
                              <label>Email</label>
                              
                              <input type="text" class="form-control" name="email" required>
                              
                              
                          </div><!--form-group end-->
                          
                          <div class="form-group"><!--form-group begin-->
                              
                              <label>Subject</label>
                              
                              <input type="text" class="form-control" name="subject" required>
                              
                              
                          </div><!--form-group end-->
                          
                          <div class="form-group"><!--form-group begin-->
                              
                              <label>Message</label>
                              
                              <textarea name="message" cols="30" rows="5" class="form-control"></textarea>
                              
                              
                          </div><!--form-group end-->
                          
                          <div class="text-center"><!--text-center begin-->
                              
                              <button type="submit" name="submit" class="btn btn-primary">
                              
                              <i class="fa fa-user-md"></i> Send Message
                              
                              </button>
                              
                          </div><!--text-center end-->
                          
                          
                      </form><!--form end-->
                      
                      
                      <?php 
                      
                      if(isset($_POST['submit'])){
                          
                          ///admin receives message with this condition///
                          
                          $sender_name = $_POST['name'];
                          
                          $sender_email = $_POST['email'];
                          
                          $sender_subject = $_POST['subject'];
                          
                          $sender_message = $_POST['message'];
                          
                          $receiver_message = "wodashwalker@gmail.com";
                          
                          mail($receiver_message,$sender_name,$sender_subject,$sender_message,$sender_email);
                          
                          /// auto reply to sender with this ///
                          
                          $email = $_POST['email'];
                          
                          $subject = "Bem Vindo ao Moz eStore";
                          
                          $msg = "Obrigado por nos contactar, logo receberás a sua resposta";
                              
                          $from = "wodashwalker@gmail.com";
                          
                          mail($email,$subject,$msg,$from);
                          
                          echo "<script>alert('A mensagem foi enviada com sucesso')</script>";
                      }
                      
                      
                      ?>
                      
                      
                  </div><!--box-header end-->
                  
              </div><!--box end--> 
               
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