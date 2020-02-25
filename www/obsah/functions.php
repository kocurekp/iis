<?php
function make_admin_header($title){
	?>
	<!DOCTYPE html>
    <html lang="cs">
    <head>
        <title><?php echo $title?></title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"><!-- jQuery library -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
        </script><!-- Popper JS -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
        </script><!-- Latest compiled JavaScript -->

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
        </script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand logo-width" href="#"><?php echo $title?></a>

            <div class="navbar-collapse collapse show" id="navbarsExample05" style="">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="ticket_preview.php">Home<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produkty</a>

                        <div class="dropdown-menu" aria-labelledby="dropdown05">
                            <a class="dropdown-item" href="product_preview.php">Zobrazit</a> <a class="dropdown-item" href="new_product.php">Vytvořit</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tikety</a>

                        <div class="dropdown-menu" aria-labelledby="dropdown05">
                            <a class="dropdown-item" href="ticket_preview.php">Zobrazit</a> <a class="dropdown-item" href="new_ticket_no_product.php">Vytvořit</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Úkoly</a>

                        <div class="dropdown-menu" aria-labelledby="dropdown05">
                            <a class="dropdown-item" href="task_preview.php">Zobrazit</a> <a class="dropdown-item" href="new_task_no_ticket.php">Vytvořit</a>
                        </div>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="admin.php">Administrace</a>
                  </li>
              </ul>
          </div>
          <div class="dropdown-menu" aria-labelledby="dropdown05">
            <a class="dropdown-item" href="task_preview.php">Zobrazit</a> <a class="dropdown-item" href="new_task_no_ticket.php">Vytvořit</a>
        </div>
    </li>
</ul>
</ul>
</div>



</div>

<?php
session_start();
if(isset($_SESSION['loggedin'])){ ?>
    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../obsah/change_password.php">Změnit heslo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../fce/logout.php">Odhlásit se</a>
            </li>
        </ul>
    </div>
<?php }else{ ?>
    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Přihlásit se</a>

            </li>
        </ul>
    </div>
    <?php 
} 
?>

</nav><!-- KONEC MENU-->
<?php } ?>