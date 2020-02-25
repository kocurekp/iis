<!-- ZOBRAZENÍ JEDNOHO TIKETU-->
<?php
ini_set("default_charset", "UTF-8");
require "../fce/make_admin_header.php";
make_admin_header("Tiket");
require '../fce/connect.php';

require "../fce/ticket.php";
require "../fce/ticket_comment.php";

$ID_user = $_SESSION['ID_user'];

$sql = 'SELECT ID_user,ID_ticket FROM Ticket WHERE ID_user = :ID_user AND ID_ticket = :ID_ticket';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':ID_user', $ID_user);
$stmt->bindValue(':ID_ticket', $ID_ticket);
//Execute.
$stmt->execute();
$edit_possible = false;

if ($row = $stmt->fetch())
{
    $edit_possible = true;
}
if (isZamestanec())
{
    $edit_possible = true;
}
?>
<!-- KONEC MENU-->
<!-- ČÁST ZOBRAZENÍ TIKETŮ-->
<!-- Page Content -->

<div class="container">
    <form action="new_task.php" method="post">
        <input type="hidden" name="ID_ticket" value="<?php echo $ID_ticket; ?>">
        <input type="hidden" name="name" value="<?php echo $name; ?>">

        <button type="submit" class="btn btn-outline-dark float-right">Vytvořit úkol</button>
    </form>
    <form action="edit_ticket.php" method="post">
        <input type="hidden" name="ID_ticket" value="<?php echo $ID_ticket; ?>">
        <input type="hidden" name="name" value="<?php echo $name; ?>">
        <input type="hidden" name="description" value="<?php echo $description; ?>">
        <?php
            if($edit_possible == true)
            {
                ?>
                     <button type="submit" class="btn btn-outline-dark float-right">Upravit</button>
                <?php
            }
        ?>

    </form>
</div>

<div class="container">
    <!-- Portfolio Item Heading -->

    <h1 class="my-4">Tiket: <small><?php echo $name; ?></small></h1><!-- Portfolio Item Row -->

    <div class="row">
        <div class="col-md-8"><img class="img-fluid" src="http://placehold.it/750x500" alt=""></div>

        <div class="col-md-4">
            <h3 class="my-3">Popis</h3>

            <div class="text-break"><?php echo $description; ?></div>

        </div>
    </div><!-- /.row -->

    <div class="detailBox">
        <div class="titleBox">
          <label>Komentáře</label>
      </div>

      <div class="commentBox">

      </div>
      <div class="actionBox">
        <ul class="commentList">
<!--             <li>
                <div class="commenterImage">
                  <img src="http://placekitten.com/50/50" />
                </div>
                <div class="commentText">
                    <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>

                </div>
            </li> -->



            <?php print_Comments(); ?>
<!--             <li>
                <div class="commenterImage">
                  <img src="http://placekitten.com/45/45" />
                </div>
                <div class="commentText">
                    <p class="">Hello this is a test comment and this comment is particularly very long and it goes on and on and on.</p> <span class="date sub-text">on March 5th, 2014</span>

                </div>
            </li>
            <li>
                <div class="commenterImage">
                  <img src="http://placekitten.com/40/40" />
                </div>
                <div class="commentText">
                    <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>

                </div>
            </li> -->
        </ul>
        <form class="form-inline" role="form" method="post" action="../fce/add_comment.php">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Odpověď" name="ticket_description" />
                <input type="hidden" name="name" value="<?php echo $name; ?>">
                <input type="hidden" name="ID_ticket" value="<?php echo $ID_ticket; ?>">
                <input type="hidden" name="description" value="<?php echo $description; ?>">


            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Přidat</button>
            </div>
        </form>
    </div>
</div>

</div>
</body>
</html>
