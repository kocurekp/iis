<?php
ini_set("default_charset", "UTF-8");
require "../fce/make_admin_header.php";
make_admin_header("Administrace");
?>

<div class="container">

    <?php
    if (isset($_GET['Message'])) {
        if ($_GET['Message'] == "role_change_successful") {
            ?>
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Úspěch!</strong> Změna práv proběhla úspěšně.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            <?php
        }
        if ($_GET['Message'] == "user_deleted") {
            ?>
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Úspěch!</strong> Uživatel byl odstraněn.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            <?php
        }
    }
    if (isset($_GET['Error'])) {
        if ($_GET['Error'] == "deleting_myself") {
            ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Chyba!</strong> Nemůžete smazat sebe.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            <?php
        }
        if ($_GET['Error'] == "user_connections") {
            ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Chyba!</strong> Nemůžete smazat uživatele s historií.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            <?php
        }
        if ($_GET['Error'] == "editing_myself") {
            ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Chyba!</strong> Nemůžete měnit práva sobě.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            <?php
        }
    }
    ?>
    

</div>
<div class="container">
    <?php
    require "../obsah/preview_content.php";
    if (isAdmin()){
        print_UserPreview();
    }else {
        print_cannotPreview();
    }
    ?>
</div>
</body>
</html>
