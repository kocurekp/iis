<?php
ini_set("default_charset", "UTF-8");
require "../fce/make_admin_header.php";
make_admin_header("New product");
require "../fce/print_manager.php";

?>
<div class="container">
	<form action="product_preview.php">
		<button type="submit" class="btn btn-outline-danger float-right">Zrušit</button>
	</form>
	<form method="post" action="../fce/new_product.php">
		<div class="form-group">
			<button type="submit" name="product" class="btn btn-outline-success float-right">Uložit</button>
		</div>
		<div class="container">
			<div class="form-group col-form-label-lg">
				<input type="text" class="form-control" id="name" pattern=".{1,}" name="name" placeholder="Název produktu">
			</div>
			<div class="form-group">
				<textarea type="text" rows="5" class="form-control" pattern=".{1,}" placeholder="Popis" id="description" name="description"></textarea>
			</div>
                    <h4>Vyberte manažera</h4>

			<select class="form-control" id="exampleFormControlSelect2" name="username">
				<?php print_Manager(); ?>
			</select>
		</form>
	</div>
</body>
</html>