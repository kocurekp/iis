<?php
ini_set("default_charset", "UTF-8");
require "../fce/make_admin_header.php";
make_admin_header("Hlavní stránka");
?>

<div class="container">
	<?php
	if ($_SESSION['loggedin'] == true){
		require "../obsah/preview_content.php";
		switch ($_SESSION['role']) {
			case 0:
				print_ProductPreview();
				break;
			case 1:
				print_TaskPreview();
				break;
			case 2:
				print_TicketPreview();
				break;
			case 3:
				print_TicketPreview();
				break;
			case 4:
				print_UserPreview();
				break;
			default:
				break;
		}
	}
		?>
	</div>
</body>
</html>
