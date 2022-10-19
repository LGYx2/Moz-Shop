
   <?php
        if(isset($_GET['refund_policy'])){

            $term_id = $_GET['refund_policy'];

            $get_term = "select * from terms where termsi_id='$term_id'";

            $run_term = mysqli_query($con,$get_term);

            $row_term = mysqli_fetch_array($run_term);

            $term_title = $row_term['terms_title'];

            $term_desc = $row_term['terms_desc'];

        }
   
   
   
   ?> 



    <h1><?php echo $term_title;?></h1>
    <p class="text-muted"><?php echo $term_title;?> da plataforma Moz eStore</p>
    
    <p>
        
        <?php echo $term_desc;?>

    </p>
    



<hr>