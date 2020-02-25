<?php
session_start();
if ($_SESSION['loggedin'] == true) {
    if (time() - $_SESSION['timestamp'] > 900) { //subtract new timestamp from the old one
        header("location: ../fce/logout.php?Message=timeout");
        exit;
    } else {
        $_SESSION['timestamp'] = time(); //set new timestamp
    }
}
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
                        <a class="nav-link" href="home.php">Domů<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produkty</a>

                        <div class="dropdown-menu" aria-labelledby="dropdown05">
                            <a class="dropdown-item" href="product_preview.php">Zobrazit</a> 
                            <?php if (isVedouci()) { ?><a class="dropdown-item" href="new_product.php">Vytvořit</a><?php }?>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tikety</a>

                        <div class="dropdown-menu" aria-labelledby="dropdown05">
                            <a class="dropdown-item" href="ticket_preview.php">Zobrazit</a>
                            <?php if (isZamestanec()) { ?><a class="dropdown-item" href="new_ticket_no_product.php">Vytvořit</a><?php }?>
                        </div>
                    </li>

                    <?php if (isZamestanec()) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Úkoly</a>

                        <div class="dropdown-menu" aria-labelledby="dropdown05">
                            <a class="dropdown-item" href="task_preview.php">Zobrazit</a>
                            <?php if (isManager()) { ?><a class="dropdown-item" href="new_task_no_ticket.php">Vytvořit</a><?php }?>
                        </div>
                    </li><?php }?>
                    <?php if (isAdmin()) { ?>
                    <li class="nav-item">
                          <a class="nav-link" href="admin.php">Administrace</a>
                    </li>
                    <?php }?>
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
if(($_SESSION['loggedin']) == true){ ?>
    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
        <ul class="navbar-nav">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['username'];?></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown06">
                <a class="dropdown-item" href="../obsah/change_password.php">Změnit heslo</a>
                <a class="dropdown-item" href="../fce/logout.php">Odhlásit se</a>
            </div>
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
<?php } 


function isAdmin(){
    if ($_SESSION['loggedin'] == true){
       return ($_SESSION['role'] == 4);
    }else {return false;}
}
function isVedouci(){
    if ($_SESSION['loggedin'] == true){
    return ($_SESSION['role'] >= 3);
    }else {return false;}
}
function isManager(){
    if ($_SESSION['loggedin'] == true){
    return ($_SESSION['role'] >= 2);
    }else {return false;}
}
function isZamestanec(){
    if ($_SESSION['loggedin'] == true){
    return ($_SESSION['role'] >= 1);
    }else {return false;}
}
function isZakaznik(){
    if ($_SESSION['loggedin'] == true){
    return ($_SESSION['role'] >= 0);
    }else {return false;}
}


?>