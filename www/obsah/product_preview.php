<!-- ZOBRAZENÍ LISTU PRODUKTŮ-->
<?php
ini_set("default_charset", "UTF-8");
require "../fce/make_admin_header.php";
make_admin_header("Produkty");
?>
<?php
if (isset($_GET['Message'])) {
    if ($_GET['Message'] == "create_ok") {
        ?>
        <div class="alert alert-success alert-dismissible fade show">
            <strong>Úspěch!</strong> Vytvoření produktu proběhlo úspěšně.
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php
    }
    if ($_GET['Message'] == "edit_ok") {
        ?>
        <div class="alert alert-success alert-dismissible fade show">
            <strong>Úspěch!</strong> Editace produktu proběhla úspěšně.
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php
    }
}
if (isset($_GET['Error'])) {
    if ($_GET['Error'] == "name_description_not_filled") {
        ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Chyba!</strong> Název nebo popis nebyl zadán.
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php
    }
    if ($_GET['Error'] == "existing_product") {
        ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Chyba!</strong> Produkt s tímto názvem už existuje.
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php
    }
}
?>

<div class="container">
    <!-- PAK ZMĚNIT ZA NĚCO INTERAKTIVNIHO-->

    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 p-2">
            <form class="card card-sm" method="post" action="product_search.php">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto"></div><!--end of col-->

                    <div class="col">
                        <input class="form-control form-control-lg form-control-borderless" type="search" name="search" placeholder="Hledat produkt podle jména">
                    </div><!--end of col-->

                    <div class="col-auto">
                        <button class="btn btn-lg btn-dark" type="submit">Hledat</button>
                    </div><!--end of col-->
                </div>
            </form>
        </div><!--end of col-->
    </div>
    
</div><!-- /.row -->
<div class="container">
    <?php
    require "../obsah/preview_content.php";
    print_ProductPreview();
    ?>
</div>
</body>
</html>
