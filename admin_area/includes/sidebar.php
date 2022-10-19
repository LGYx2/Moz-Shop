<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo"<script>window.open('login.php','_self')</script>";
    }else{

?>
   

   
   <nav class="navbar navbar-inverse navbar-fixed-top"><!--navbar navbar-inverse navbar-fixed-top start-->
    <div class="navbar-header"><!--navbar-header start-->
        
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><!--navbar-toggle start-->
            
            <span class="sr-only">Toggle Navigation</span>
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
        </button><!--navbar-toggle end-->
        
        <a href="index.php?dashboard" class="navbar-brand">Área do Administrador</a>
               
    </div><!--navbar-header end-->
    
    <ul class="nav navbar-right top-nav"><!--nav navbar-right top-nav start-->
        
        <li class="dropdown"><!--dropdown start-->
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><!--dropdown-toggle start-->
                
                <i class="fa fa-user"></i> <?php echo $admin_name; ?><b class="caret"></b>
  
            </a><!--dropdown-toggle end-->
            
            <ul class="dropdown-menu"><!--dropdown-menu start-->
                <li><!--li start-->
                   <a href="index.php?user_profile=<?php echo $admin_id; ?>"><!--a href start-->
                       
                       <i class="fa fa-fw fa-user"></i> Perfil
                       
                   </a><!--a href end-->
                </li><!--li end-->
                <li><!--li start-->
                   <a href="index.php?view_product"><!--a href start-->
                       
                       <i class="fa fa-fw fa-envelope"></i> Productos
                       
                       <span class="badge"><?php echo $count_products; ?></span>
                       
                   </a><!--a href end-->
                </li><!--li end-->
                <li><!--li start-->
                   <a href="index.php?view_customers"><!--a href start-->
                       
                       <i class="fa fa-fw fa-users"></i> Clientes
                       
                       <span class="badge"><?php echo $count_customers; ?></span>
                       
                   </a><!--a href end-->
                </li><!--li end-->
                <li><!--li start-->
                   <a href="index.php?view_cats"><!--a href start-->
                       
                       <i class="fa fa-fw fa-gear"></i> Categoria de Produtos
                       
                       <span class="badge"><?php echo $count_p_categories; ?></span>
                       
                   </a><!--a href end-->
                </li><!--li end-->
                
                <li class="divider"></li>
                
                <li><!--li start-->
                   <a href="logout.php"><!--a href start-->
                       
                       <i class="fa fa-fw fa-power-off"></i> Logout
                       
                   </a><!--a href end-->
                </li><!--li end-->
            </ul><!--dropdown-menu end-->
            
        </li><!--dropdown end-->
        
    </ul><!--nav navbar-right top-nav end-->
    
    <div class="collapse navbar-collapse navbar-ex1-collapse"><!--collapse navbar-collapse navbar-ex1-collapse start-->
        <ul class="nav navbar-nav side-nav"><!--nav navbar-nav side-nav start-->
            <li><!--li start-->
                   <a href="index.php?dashboard"><!--a href start-->
                       
                       <i class="fa fa-fw fa-dashboard"></i> Painel De Movimentos
                       
                   </a><!--a href end-->
                   
            </li><!--li end-->
            <li><!--li start-->
                   <a href="#" data-toggle="collapse" data-target="#products"><!--a href start-->
                       
                       <i class="fa fa-fw fa-tag"></i> Productos
                       <i class="fa fa-fw fa-caret-down"></i> 
                       
                   </a><!--a href end-->
                   
                   <ul id="products" class="collapse"><!--collapse START-->
                       <li><!-- li begin -->
                           <a href="index.php?insert_product">Inserir Produtos</a>
                       </li>
                        <li>
                           <a href="index.php?view_product">Ver Produtos</a>
                       </li><!-- li end -->
                   </ul><!--collapse end-->
                   
            </li><!--li end--><li><!--li start-->
                   <a href="#" data-toggle="collapse" data-target="#manufacturer"><!--a href start-->
                       
                       <i class="fa fa-fw fa-star"></i> Fabricantes
                       <i class="fa fa-fw fa-caret-down"></i> 
                       
                   </a><!--a href end-->
                   
                   <ul id="manufacturer" class="collapse"><!--collapse START-->
                       <li><!-- li begin -->
                           <a href="index.php?insert_manufacturer">Inserir Fabricante</a>
                       </li>
                        <li>
                           <a href="index.php?view_manufacturer">Ver Fabricantes</a>
                       </li><!-- li end -->
                   </ul><!--collapse end-->
                   
            </li><!--li end-->
            <li><!--li start-->
                   <a href="#" data-toggle="collapse" data-target="#p_cat"><!--a href start-->
                       
                       <i class="fa fa-fw fa-edit"></i> Categorias de Productos
                       <i class="fa fa-fw fa-caret-down"></i> 
                       
                   </a><!--a href end-->
                   
                   <ul id="p_cat" class="collapse"><!--collapse START-->
                       <li><!-- li begin -->
                           <a href="index.php?insert_p_cat">Inserir Categorias de Productos</a>
                       </li>
                        <li>
                           <a href="index.php?view_p_cats">Ver Categorias de Productos</a>
                       </li><!-- li end -->
                   </ul><!--collapse end-->
                   
            </li><!--li end-->
            <li><!--li start-->
                   <a href="#" data-toggle="collapse" data-target="#cat"><!--a href start-->
                       
                       <i class="fa fa-fw fa-edit"></i> Categorias
                       <i class="fa fa-fw fa-caret-down"></i> 
                       
                   </a><!--a href end-->
                   
                   <ul id="cat" class="collapse"><!--collapse START-->
                       <li><!-- li begin -->
                           <a href="index.php?insert_cat">Inserir Categorias</a>
                       </li>
                        <li>
                           <a href="index.php?view_cats">Ver Categorias </a>
                       </li><!-- li end -->
                   </ul><!--collapse end-->
                   
            </li><!--li end-->
            <li><!--li start-->
                   <a href="#" data-toggle="collapse" data-target="#slides"><!--a href start-->
                       
                       <i class="fa fa-fw fa-gear"></i> Slides
                       <i class="fa fa-fw fa-caret-down"></i> 
                       
                   </a><!--a href end-->
                   
                   <ul id="slides" class="collapse"><!--collapse START-->
                       <li><!-- li begin -->
                           <a href="index.php?insert_slide">Inserir Slide</a>
                       </li>
                        <li>
                           <a href="index.php?view_slide">Ver Slides</a>
                       </li><!-- li end -->
                   </ul><!--collapse end-->
                   
            </li><!--li end-->
            
            <li><!--li start-->
                <a href="index.php?view_customers">
                    <i class="fa fa-fw fa-users"></i>Veja os Clintes
                </a>
            </li><!--li end-->
            
            <li><!--li start-->
                <a href="index.php?view_terms">
                    <i class="fa fa-fw fa-newspaper-o"></i> Veja os Termos & Condições
                </a>
            </li><!--li end-->
            
            <li><!--li start-->
                <a href="index.php?view_box">
                    <i class="fa fa-fw fa-cube"></i>Veja a Caixa
                </a>
            </li><!--li end-->
            
            <li><!--li start-->
                <a href="index.php?view_orders">
                    <i class="fa fa-fw fa-book"></i> Encomendas
                </a>
            </li><!--li end-->
            
            <li><!--li start-->
                <a href="index.php?view_payments">
                    <i class="fa fa-fw fa-money"></i> Pagamentos
                </a>
            </li><!--li end-->
            <li><!--li start-->
            <li><!--li start-->
                <a href="index.php?edit_css">
                    <i class="fa fa-fw fa-pencil"></i> Editor CSS
                </a>
            </li><!--li end-->
            <li><!--li start-->
                   <a href="#" data-toggle="collapse" data-target="#users"><!--a href start-->
                       
                       <i class="fa fa-fw fa-users"></i>Veja os Usuários
                       <i class="fa fa-fw fa-caret-down"></i> 
                       
                   </a><!--a href end-->
                   
                   <ul id="users" class="collapse"><!--collapse START-->
                       <li><!-- li begin -->
                           <a href="index.php?insert_user">Inserir User</a>
                       </li>
                        <li>
                           <a href="index.php?view_users">Ver Users</a>
                       </li><!-- li end -->
                        <li>
                           <a href="index.php?user_profile=<?php echo $admin_id; ?>">Editar Perfil</a>
                       </li><!-- li end -->
                   </ul><!--collapse end-->
                   
            </li><!--li end-->
            
            <li><!--li start-->
                <a href="logout.php">
                    <i class="fa fa-fw fa-power-off"></i> Log Out
                </a>
            </li><!--li end-->
            
        </ul><!--nav navbar-nav side-nav end-->
    </div><!--collapse navbar-collapse navbar-ex1-collapse end-->
    
</nav><!--navbar navbar-inverse navbar-fixed-top end-->
<?php } ?>