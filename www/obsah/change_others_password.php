<?php
ini_set("default_charset", "UTF-8");
require "../fce/make_admin_header.php";
make_admin_header("Změna hesla");
?>
<?php
if (isset($_GET['Error'])) {
    if ($_GET['Error'] == "wrong_password") {
        ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Chyba!</strong> Nesprávné heslo.
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
    if ($_GET['Message'] == "password_change_successful") {
        ?>
        <div class="alert alert-success alert-dismissible fade show">
            <strong>Úspěch!</strong> Změna hesla proběhla úspěšně.
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php
    }
}?>

<div class="container">
    <form method="post" action="../fce/others_password_change.php">
        <button type="submit" class="btn btn-outline-success float-right" name="save">Uložit</button>

        <button type="submit" class="btn btn-outline-danger float-right" name="cancel">Zrušit</button>
        <div class="form-group col-form-label-lg">
            <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Nové heslo">
            <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Zopakuj nové heslo">
            <input type="hidden" name="username" value="<?php echo $_POST['ID_user']; ?>">
        </div>
    </form>
</div>
</body>
</html>
