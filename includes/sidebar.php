<div class="panel panel-default sidebar-menu"><!--panel panel-default sidebar-menu begin-->
    <div class="panel-heading"><!--panel-heading begin-->
        <h3 class="panel-title">
            Fabricantes

            <div class="pull-right" id="manufacturer">
                <a href="JavaScript:Void(0);" style="color: black;text-decoration:none;">
                    <span class="nav-toggle hide-show" id="manufacturer_show"><i class="fa fa-eye-slash"></i></span>
                </a>
            </div>
        </h3>
    </div><!--panel-heading end-->
        <div class="panel-collapse collapse-data" id="manufacturer_bar">

            <div class="panel-body"><!--panel-body begin-->
                <div class="input-group">
                    <input type="text" class="form-control" id="myInput" onkeyup="Manufacturer()" data-filters="#manufacturer" data-action="filter" placeholder="Filtro Fabricante">
                
                    <a  class="input-group-addon">
                        <i class="fa fa-search"></i>
                    </a>
                
                </div>
                </div>
                <div class="panel-body scroll-menu">
                <ul class="nav nav-pills nav-stacked category-menu" id="myUL"><!--nav nav-pills nav-stacked category-menu begin-->

                    <?php getManufacturer() ?>

                </ul><!--nav nav-pills nav-stacked category-menu end-->
            </div><!--panel-body end-->
        </div>
    </div><!--panel panel-default sidebar-menu end-->

<div class="panel panel-default sidebar-menu"><!--panel panel-default sidebar-menu begin-->
        <div class="panel-heading"><!--panel-heading begin-->
            <h3 class="panel-title">
                Categorias

                <div class="pull-right" id="cat">
                    <a href="JavaScript:Void(0);" style="color: black;text-decoration:none;">
                        <span class="nav-toggle hide-show" id="cat_show"><i class="fa fa-eye-slash"></i></span>
                    </a>
                </div>
            </h3>
        </div><!--panel-heading end-->
            <div class="panel-collapse collapse-data" id="cat_bar"><!--panel-collapse collapse-data start-->

                <div class="panel-body"><!--panel-body begin-->
                    <div class="input-group">
                        <input type="text" class="form-control" id="myCat" onkeyup="Categories()" data-filters="#categories" data-action="filter" placeholder="Filtro Categorias" search>
                    
                        <a  class="input-group-addon">
                            <i class="fa fa-search"></i>
                        </a>
                    
                    </div>
                </div>
                <div class="panel-body scroll-menu">
                <ul class="nav nav-pills nav-stacked category-menu" id="myCatUl"><!--nav nav-pills nav-stacked category-menu begin-->
                    <?php getcats(); ?>
                
            </ul><!--nav nav-pills nav-stacked category-menu end-->
        </div><!--panel-body end-->
        
    </div><!--panel-collapse collapse-data end-->
</div><!--panel panel-default sidebar-menu end-->

<div class="panel panel-default sidebar-menu"><!--panel panel-default sidebar-menu begin-->
        <div class="panel-heading"><!--panel-heading begin-->
            <h3 class="panel-title">
                Categorias de Produtos

                <div class="pull-right" id="p_cat">
                    <a href="JavaScript:Void(0);" style="color: black;text-decoration:none;">
                        <span class="nav-toggle hide-show" id="p_cat_show"><i class="fa fa-eye-slash"></i></span>
                    </a>
                </div>
            </h3>
        </div><!--panel-heading end-->
        <div class="panel-collapse collapse-data" id="p_cat_bar"><!--panel-collapse collapse-data start-->

                <div class="panel-body"><!--panel-body begin-->
                    <div class="input-group">
                        <input type="text" class="form-control" id="myPcat" onkeyup="p_Categories()" data-filters="#product_categories" data-action="filter" placeholder="Filtro Categorias Produtos">
                    
                        <a  class="input-group-addon">
                            <i class="fa fa-search"></i>
                        </a>
                    
                    </div>
                    </div>
                    <div class="panel-body scroll-menu">
            <ul class="nav nav-pills nav-stacked category-menu" id="myPcatUl"><!--nav nav-pills nav-stacked category-menu begin-->
                <?php getPcats();?>
            </ul><!--nav nav-pills nav-stacked category-menu end-->
    </div><!--panel-body end-->
    </div>
</div><!--panel panel-default sidebar-menu end-->
<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>
<script>

//end Hide & Show sidebar toggle//
    //hide and show sidebar toggle manufacturer//
    $("#manufacturer").click(function(){

        $("#manufacturer_bar").slideToggle(700,function(){

            if($(this).css('display')=='none'){

                $("#manufacturer_show").html('<i class="fa fa-eye"></i>');

            }else{

                $("#manufacturer_show").html('<i class="fa fa-eye-slash"></i>');

                }
            });

        });
    

    //end Hide & Show sidebar toggle//

    //hide and show sidebar toggle categorie//
    $("#cat").click(function(){

        $("#cat_bar").slideToggle(700,function(){

            if($(this).css('display')=='none'){

                $("#cat_show").html('<i class="fa fa-eye"></i>');

            }else{

                $("#cat_show").html('<i class="fa fa-eye-slash"></i>');

                }
            });

        });
    

    //end Hide & Show sidebar toggle//

    //hide and show sidebar toggle product category//
    $("#p_cat").click(function(){

        $("#p_cat_bar").slideToggle(700,function(){

            if($(this).css('display')=='none'){

                $("#p_cat_show").html('<i class="fa fa-eye"></i>');

            }else{

                $("#p_cat_show").html('<i class="fa fa-eye-slash"></i>');

                }
            });

        });
    

    //end Hide & Show sidebar toggle//
    //filter bar start

// $(document).ready(function() {
//     $(function(){
//         $.fn.extend({
//             filterTable: function(){
//                 return this.each(function(){

//                     $(this).on('keyup',function(){

//                         var $this = $(this),
//                         search = $this.val().toLowerCase(),
//                         target = $this.attr('data-filters'),
//                         handle =$(target),
//                         rows = handle.find('li');

//                         if(search == ''){

//                             rows.show();
//                         }else{
//                             rows.each(function(){

//                                 var $this = $($this);

//                                 $this.text().toLowerCase().indexOf(search) === -1? $this.hide() : 
//                                 $this.show();

//                             });
//                         }
//                     });
//                 });
//             }
//         });
//         $('[data-action="filter"][id="table-filter"').filterTable();
        
//     });

   
// });

</script>
<script>
function Manufacturer() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
function Categories() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myCat');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myCatUl");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}

function p_Categories() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myPcat');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myPcatUl");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}



</script>



