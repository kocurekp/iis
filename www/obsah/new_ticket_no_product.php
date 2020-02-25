<?php
ini_set("default_charset", "UTF-8");
require "../fce/make_admin_header.php";
make_admin_header("New ticket");
require "../fce/new_ticket_no_product.php";

?>
<div class="container">
	<form action="ticket_preview.php">
		<button type="submit" class="btn btn-outline-danger float-right" name="cancel">Zrušit</button>
	</form>
</div>
<div class="container">
	<form method="post" action="../fce/new_ticket.php">
		<button type="submit" name="ticket" class="btn btn-outline-success float-right" name="save" >Vytvořit</button>
		
		<div class="form-group col-form-label-lg">
			<input type="text" class="form-control" pattern=".{1,}" id="name" name="name" placeholder="Název tiketu">
			<input type="hidden" name="ID_product" value="<?php echo $_POST['ID_product']; ?>">
		</div>
		<div class="form-group">
			<p>
				
			<textarea type="text" rows="5" class="form-control" placeholder="Popis" pattern=".{1,}" id="description" name="description"></textarea>
			<!-- <textarea type="text" rows="1" class="form-control" placeholder="vybrat produkt"></textarea> -->
			</p>
		<p>
		<input type='file' name='files[]' multiple />

			
		</p>
			<h5>Vyberte produkt</h5>

			<select class="form-control" id="exampleFormControlSelect2" name="product" >
				<?php 
				print_Items();
				?>
			</select>
			
		</div>
	</form>
</div>
</body>
</html>