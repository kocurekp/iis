<?php
ini_set("default_charset", "UTF-8");
require "../fce/make_admin_header.php";
make_admin_header("Uživatel");

?>
<div class="container">
    <form method="post" action="../fce/manage_user.php">
        <button type="submit" class="btn btn-outline-success float-right" name="save">Uložit</button>
        <button type="submit" class="btn btn-outline-danger float-right" name="cancel">Zrušit</button>

        <div class="form-group col-form-label-lg">
            <h1 class="my-4"><?php
            echo 'Uživatel:';
            echo '<small>'.$_POST['username'].'</small>';

            $level_print = -1;
            switch ($_POST['role']) {
                case 0:
                $level_print = 'Zákazník';
                break;
                case 1:
                $level_print = 'Pracovník';
                break;
                case 2:
                $level_print = 'Manažer';
                break;
                case 3:
                $level_print = 'Vedoucí';
                break;
                case 4:
                $level_print = 'Administrátor';
                break;
            }
            ?></h1>
            <select class="form-control" name="role">
                <option value="" disabled selected><?php echo $level_print; ?></option>
                <option value="0">Zákazník</option>
                <option value="1">Pracovník</option>
                <option value="2">Manažer</option>
                <option value="3">Vedoucí</option>
                <option value="4">Administrátor</option>
            </select>

            <input type="hidden" name="username" value="<?php echo $_POST['username']; ?>">
            <input type="hidden" name="ID_user" value="<?php echo $_POST['ID_user']; ?>">
        </div>
    </form>
    <form action="../fce/delete_user.php" method="POST">
        <input type="hidden" name="ID_user" value="<?php echo $_POST['ID_user']; ?>">
        <button class="btn btn-outline-danger" style="width:100%" type="submit" name="remove_levels" value="delete" onclick="return confirm('Jste si jistí?');"><span class="fa fa-times"></span>Odstranit</button>
    </form>
    <form action="../obsah/change_others_password.php" method="POST">
        <input type="hidden" name="ID_user" value="<?php echo $_POST['ID_user']; ?>">
        <button class="btn btn-outline-info btn-block" style="width:100%" type="submit" name="remove_levels" value="delete"><span class="fa fa-times"></span>Změnit heslo</button>
    </form>
</div>
</body>
</html>