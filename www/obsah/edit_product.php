<?php
ini_set("default_charset", "UTF-8");
require "../fce/make_admin_header.php";
make_admin_header("Upravit produkt");
?>
<!-- KONEC MENU-->
<!-- ČÁST ZOBRAZENÍ TIKETŮ-->
<div class="container">
    <form method="post" action="product_preview.php">
        <button type="submit" class="btn btn-outline-danger float-right">Zrušit</button>
    </form>

    <form method="post" action="../fce/edit_product.php">
        <button type="submit" class="btn btn-outline-success float-right">Uložit</button>
    </div>
    
    <div class="container">

      <div class="form-group">
        <input type="hidden" name="ID_product" value="<?php echo $_POST['ID_product']; ?>">

        <textarea class="form-control col-form-label-lg" rows="1" pattern=".{1,}" id="exampleFormControlInput1" name="name"><?php echo $_POST['name']; ?></textarea>
    </div>
    <div class="form-group">

        <textarea class="form-control" rows="5" pattern=".{1,}" id="popis" name="description"><?php echo $_POST['description']; ?></textarea>
    </div>
</form>
</div>
</body>
</html>