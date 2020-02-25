<?php
ini_set("default_charset", "UTF-8");
require "../fce/make_admin_header.php";
make_admin_header("Administrace");
    require "../fce/admin_search.php";

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
    
                <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 p-2">
                <form class="card card-sm" method="post" action="admin_search.php">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto"></div><!--end of col-->

                        <div class="col">
                            <input class="form-control form-control-lg form-control-borderless" type="search" name="search" placeholder="Hledat podle jména">
                        </div><!--end of col-->

                        <div class="col-auto">
                            <button class="btn btn-lg btn-dark" type="submit">Hledat</button>
                        </div><!--end of col-->
                    </div>
                </form>
            </div><!--end of col-->
        </div>
    <!-- <div class="container"> -->
        <div class="row">
        <!-- Load_Users(); -->
    <?php
        // require "../obsah/preview_content.php";
        // print_UserPreview();
        // echo $_POST['search'];
        search();
    ?>
    <!-- </div> -->
    </div>
</body>
</html>
