<?php
ini_set("default_charset", "UTF-8");
require "../fce/make_admin_header.php";
make_admin_header("Úkol");
require "../fce/task.php";

$ID_user = $_SESSION['ID_user'];	
$sql = 'SELECT ID_user,ID_task FROM Task WHERE ID_user = :ID_user AND ID_task = :ID_task';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':ID_user', $ID_user);
$stmt->bindValue(':ID_task', $ID_task);
//Execute.
$stmt->execute();
$edit_possible = false;
$edit_possible_worker = false;
if ($row = $stmt->fetch() && ($_SESSION['role'] == 1))
{
    $edit_possible_worker = true;
}
if (($_SESSION['role'] == 3))
{
    $edit_possible = true;
}

if (($_SESSION['role'] == 2))
{
    $sql = 'SELECT ID_user,ID_product FROM Product WHERE ID_user = :ID_user';
    $pdo2 = pdo();
    $stmt = $pdo2->prepare($sql);
    $stmt->bindValue(':ID_user', $ID_user);
    //$stmt->bindValue(':ID_product', $ID_product);

    $stmt->execute();
    $array = array();

    while ($row = $stmt->fetch())
    {
        array_push($array,$row['ID_product']);
    }

    $sql = 'SELECT ID_ticket,ID_product FROM Ticket WHERE ID_ticket = :ID_ticket';
    $pdo3 = pdo();
    $stmt = $pdo3->prepare($sql);
    $stmt->bindValue(':ID_ticket', $ID_ticket);
    //$stmt->bindValue(':ID_product', $ID_product);

    $stmt->execute();

    $array2 = array();
    while ($row = $stmt->fetch())
    {
        array_push($array2,$row['ID_product']);
    }

    if (!(empty($array)) && !(empty($array2))) {
        $c = array_intersect($array, $array2);
        if (count($c) > 0) {
            $edit_possible = true;
        }
    }
}
if (($_SESSION['role'] == 4))
{
    $edit_possible = true;
}
?>
<!-- KONEC MENU-->
<!-- ČÁST ZOBRAZENÍ TIKETŮ-->
<!-- Page Content -->

<div class="container">
</div>

<div class="container">
	<form action="task_done.php" method="post">
		<input type="hidden" name="ID_ticket" value="<?php echo $ID_ticket; ?>">
		<input type="hidden" name="name" value="<?php echo $name; ?>">
		<input type="hidden" name="description" value="<?php echo $description; ?>">
		<input type="hidden" name="estm_time" value="<?php echo $estm_time; ?>">
		<input type="hidden" name="real_time" value="<?php echo $real_time; ?>">
		<input type="hidden" name="username" value="<?php echo $username; ?>">
		<input type="hidden" name="ID_task" value="<?php echo $ID_task; ?>">
		<?php
		if($edit_possible_worker == true)
		{
			?>
			<button type="submit" class="btn btn-outline-dark float-right">Splnit úkol</button>
			<?php
		}
		?>
	</form>
	<form action="edit_task.php" method="post">
		<input type="hidden" name="ID_ticket" value="<?php echo $ID_ticket; ?>">
		<input type="hidden" name="name" value="<?php echo $name; ?>">
		<input type="hidden" name="description" value="<?php echo $description; ?>">
		<input type="hidden" name="estm_time" value="<?php echo $estm_time; ?>">
		<input type="hidden" name="real_time" value="<?php echo $real_time; ?>">
		<input type="hidden" name="username" value="<?php echo $username; ?>">
		<input type="hidden" name="ID_task" value="<?php echo $ID_task; ?>">


		<?php
		if($edit_possible == true)
		{

			?>
			<button type="submit" class="btn btn-outline-dark float-right">Upravit</button>
			<?php
		}
		?>
	</form>

	<!-- Portfolio Item Heading -->
	<div class="row">
		<div class="col-md-4">
			<h2 class="my-2"><a href="#">Tiket #<?php echo $ID_ticket; ?></a></h2>
		</div> 
	</div><!-- /.row -->


	<div class="row">
		<div class="col-md-4">
			<h3 class="my-3">Popis úkolu</h3>

			<p><?php echo $description; ?> </p>

		</div>
	</div><!-- /.row -->
	<div class="row">
		<div class="col-md-4">
			<h3 class="my-3">Odhadovaný čas</h3>

			<p><?php echo $estm_time; ?></p>

		</div>
	</div><!-- /.row -->
	<div class="row">
		<div class="col-md-4">
			<h3 class="my-3">Odpracovaný čas</h3>

			<p><?php echo $real_time; ?></p>

		</div>
	</div><!-- /.row -->        
	<div class="row">
		<div class="col-md-4">
			<h3 class="my-3">Zodpovědný pracovník</h3>

			<p><?php echo $username; ?><p>

			</div>                        
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-md-4">
				<h3 class="my-3">Status</h3>
				
				<?php
				switch ($state) {
					case 1:
					echo '
					<p><div class="d-flex justify-content-left">
					<div class="p-2 circle-opened"></div>
					</div></p>
					<p>Otevřený</p>
					';
					break;
					case 2:
					echo '
					<p><div class="d-flex justify-content-left">
					<div class="p-2 circle-closed"></div>
					</div></p>
					<p>Uzavřený</p>
					';
					break;
					
					default:
					echo '
					<p><div class="d-flex justify-content-left">
					<div class="p-2 circle-add"></div>
					</div></p>
					<p>Neznámý</p>
					';
					break;
				}
				?>
				</div>                        
			</div>
			<!-- /.row -->	
		</div>

	</div>
</body>
</html>