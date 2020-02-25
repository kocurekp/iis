<?php
ini_set("default_charset", "UTF-8");
require "../fce/make_admin_header.php";
make_admin_header("New ticket");


?>
	<!--<div class="container">
		<button type="submit" name="ticket" class="btn btn-outline-success float-right" >Ulozit</button>
		<button type="button" class="btn btn-outline-danger float-right">Zrusit</button>
	</div>-->

	<div class="container">
		<form action="ticket_preview.php">
			<button type="submit" class="btn btn-outline-danger float-right" name="cancel">Zrušit</button>
		</form>
		<form method="post" action="../fce/new_ticket.php">
			<button type="submit" class="btn btn-outline-success float-right" name="save" value="ahoj">Vytvořit</button>
			
			<div class="form-group col-form-label-lg">
				<?php 
				
				echo "Produkt: ";
				echo $_POST['name']; 

				?>
				<input type="text" class="form-control" pattern=".{1,}" id="name" name="name" placeholder="Název tiketu">
				<input type="hidden" name="ID_product" value="<?php echo $_POST['ID_product']; ?>">
				<input type="hidden" name="ID_ticket" value="<?php echo $_POST['ID_ticket']; ?>">
				<input type="hidden" name="product" value="<?php echo $_POST['name']; ?>">
			</div>
			<div class="form-group">
				<textarea type="text" rows="5" class="form-control" pattern=".{1,}" placeholder="Popis" id="description" name="description"></textarea>
			</div>
			<input type='file' name='files[]' multiple />
		</form>
	</div>
</body>
</html>