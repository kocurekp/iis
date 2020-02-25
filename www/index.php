<?php ini_set("default_charset", "UTF-8"); ?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <title>ITS</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    session_start();
    $_SESSION['loggedin'] = false;
    ?>
    <div class="jumbotron text-center">
        <h1>Issue tracking system</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-auto"></div>
                <div class="col-4"><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal">Vstoupit do systému</button></div>
                <div class="col-4">
                    <form method="post" action="obsah/home.php">
                        <button type="submit" class="btn btn-outline-secondary">Vstup bez registrace</button>
                    </form>
                </div>
                <div class="col-auto"></div>
            </div>
        </div>
    </div>

    <div class="container">
        <?php
        if (isset($_GET['Error'])) {
            if ($_GET['Error'] == "invalid_username") {
                ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>Chyba!</strong> Neexistující uživatel.
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
                <?php
            }
            if ($_GET['Error'] == "wrong_password") {
                ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>Chyba!</strong> Nesprávné heslo.
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
                <?php
            }
            if ($_GET['Error'] == "existing_user") {
                ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>Chyba!</strong> Uživatelské jméno již existuje.
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
                <?php
            }
            if ($_GET['Error'] == "different_password") {
                ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>Chyba!</strong> Hesla se neshodují.
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
                <?php
            }
            if ($_GET['Error'] == "wrong_username_format") {
                ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>Chyba!</strong> Uživatelské jméno musí mít 1-30 znaků.
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
                <?php
            }
            if ($_GET['Error'] == "wrong_password_format") {
                ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>Chyba!</strong> Heslo musí mít 5-60 znaků.
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
                <?php
            }
        }
        ?>

        <?php
        if (isset($_GET['Message'])) {
            if ($_GET['Message'] == "registration_successful") {
                ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <strong>Úspěch!</strong> Registrace proběhla úspěšně.
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
                <?php
            }
            if ($_GET['Message'] == "timeout") {
                ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>Chyba!</strong> Proběhlo automatické odhlášení po 15ti minutách neaktivity.
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
                <?php
            }
        }?>

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Přihlášení</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <ul class="nav nav-tabs" id="tabContent">
                        <li class="active"><a class="nav-link active" href="#login" data-toggle="tab">Přihlásit se</a></li>
                        <li><a href="#registration" class="nav-link" data-toggle="tab">Zaregistrovat se</a></li>
                    </ul>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="login">

                                <form method="post" action="fce/login.php">
                                    <div class="form-group">
                                        <label for="username">Přihlašovací jméno:</label>
                                        <input type="text" class="form-control" id="username" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Heslo:</label>
                                        <input type="password" class="form-control" id="pwd" name="password">
                                    </div>
                                    <button type="submit" name="login" class="btn btn-primary">Přihlásit se</button>
                                </form>
                            </div>
                            <div class="tab-pane" id="registration">
                                <form method="post" action="fce/register.php" class="was-validated">
                                    <div class="form-group">
                                        <label for="username">Přihlašovací jméno:</label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                        <div class="valid-feedback">Správně</div>
                                        <div class="invalid-feedback">Vyplňte uživatelské jméno</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Heslo:</label>
                                        <input type="password" class="form-control" id="pwd" name="password" pattern=".{6,}" required>
                                        <div class="valid-feedback">Správně</div>
                                        <div class="invalid-feedback">Vyplňte heslo</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Zopakujte heslo:</label>
                                        <input type="password" class="form-control" id="pwd_2" pattern=".{6,}" name="confirm_password" required>
                                        <div class="valid-feedback">Správně</div>
                                        <div class="invalid-feedback">Opakujte heslo</div>
                                    </div>
                                    <button type="submit" name="register" class="btn btn-primary">Zaregistrovat se</button>
                                </form>
                            </div>
                        </div>
                    </div> 
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Zavřít</button>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</body>
</html>