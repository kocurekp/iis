<!-- ZOBRAZENÍ JEDNOHO PRODUKTU-->
<?php
ini_set("default_charset", "UTF-8");
require "../fce/make_admin_header.php";
make_admin_header("Produkt");
require "../fce/product.php";
?>
<!-- KONEC MENU-->
<!-- ČÁST ZOBRAZENÍ TIKETŮ-->
<!-- Page Content -->

<div class="container">
<form action="new_ticket.php" method="post">
  <input type="hidden" name="ID_product" value="<?php echo $ID_product; ?>">
  <input type="hidden" name="name" value="<?php echo $name; ?>">
  <button type="submit" class="btn btn-outline-dark float-right">Vytvořit ticket</button>
</form>
   <form method="post" action="edit_product.php">
    <input type="hidden" name="name" value="<?php echo $name; ?>">
    <input type="hidden" name="description" value="<?php echo $description; ?>">
    <input type="hidden" name="ID_product" value="<?php echo $ID_product; ?>">
    <button type="submit" class="btn btn-outline-dark float-right">Upravit produkt</button>
</form>
</div>

<div class="container">
    <!-- Portfolio Item Heading -->

    <h1 class="my-4">Produkt: <small><?php echo $name; ?> </small></h1><!-- Portfolio Item Row -->

    <div class="row">
        <!-- <div class="col-md-8"><img class="img-fluid" src="http://placehold.it/750x500" alt=""></div> -->

        <div class="col-md-4">
            <h3 class="my-3">Popis</h3>

            <div class="text-break"><?php echo $description; ?></div>

            <h3 class="my-3">Kontaktní osoba</h3>

            <div><?php echo $username; ?></div>
        </div>
    </div><!-- /.row -->
</div>
</body>
</html>
