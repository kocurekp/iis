<?php
ini_set("default_charset", "UTF-8");
require "../fce/make_admin_header.php";
make_admin_header("New task");

?>

	<div class="container">
		<form action="ticket_preview.php">
			<button type="submit" class="btn btn-outline-danger float-right">Zrušit</button>
		</form>
		<form method="post" action="../fce/new_task.php">
			<button type="submit" name="task" class="btn btn-outline-success float-right">Vytvořit úkol</button>
<!-- 			<div class="form-group col-form-label-lg">
				<input type="text" class="form-control" id="name" name="name" placeholder="Name">
			</div> -->
			<div class="form-group">
				<?php 							
					require "../fce/new_task_no_ticket.php";
				?>


				<textarea type="text" rows="5" class="form-control" placeholder="Popis" pattern=".{1,}" id="description" name="description"></textarea>
					<label for="exampleFormControlSelect2">Výbrat pracovníka</label>
				<select class="form-control" id="exampleFormControlSelect2" name="user">

					<?php 
						print_Workers();
					 ?>
				</select>
				<p>Odhadovaný čas:
				<select class="form-control" name="estm_time">
					<option value="5 min">5 min</option>
					<option value="15 min">15 min</option>
					<option value="30 min">30 min</option>
					<option value="1 hod">1 hod</option>
					<option value="2 hod">2 hod</option>
					<option value="4 hod">4 hod</option>
					<option value="8 hod">8 hod</option>
				</select>	
				</p>
				<!-- <textarea type="text" rows="1" class="form-control" placeholder="estimated time TODO" id="description" name="description"></textarea> -->



				
			</div>
		</form>
	</div>
</body>
</html>