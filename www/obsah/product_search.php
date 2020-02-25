<!-- ZOBRAZENÍ LISTU PRODUKTŮ-->
<?php
ini_set("default_charset", "UTF-8");
require "functions.php";
make_admin_header("Produkty");
    require "../fce/product_search.php";

?>


<div class="container">
    <!-- PAK ZMĚNIT ZA NĚCO INTERAKTIVNIHO-->

    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 p-2">
            <form class="card card-sm" method="post" action="product_search.php">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto"></div><!--end of col-->

                    <div class="col">
                        <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Hledat produkt podle jména" name="search">
                    </div><!--end of col-->

                    <div class="col-auto">
                        <button class="btn btn-lg btn-dark" type="submit">Hledat</button>
                    </div><!--end of col-->
                </div>
            </form>
        </div><!--end of col-->
    </div>

    <div class="row">
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="d-flex p-3 justify-content-center">
                    <div class="p-2 circle-add"></div>
                </div>
                <div class="card-body">
                    <h4 class="card-title"><a href="../obsah/new_product.php">Přidat Produkt</a></h4>
                </div>
            </div>
        </div>
        <?php 

            search(); 
        
        ?>

    </div><!-- /.row -->
</body>
</html>
