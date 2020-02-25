<?php
ini_set("default_charset", "UTF-8");
require "../fce/make_admin_header.php";
make_admin_header("Upravit úkol");
require "../fce/new_task_w_ticket.php";



?>
<link rel="stylesheet" type="text/css" href="../css/bootstrap-datetimepicker.min">
<div class="container">
  <form action="task_preview.php">
    <button type="submit" class="btn btn-outline-danger float-right">Zrušit</button>
  </form>
  <form method="post" action="../fce/edit_task.php">
    <input type="hidden" name="ID_ticket" value="<?php echo $_POST['ID_ticket']; ?>">
    <input type="hidden" name="username" value="<?php echo $_POST['username']; ?>">
    <input type="hidden" name="ID_task" value="<?php echo $_POST['ID_task']; ?>">
    <button type="submit" name="task" class="btn btn-outline-success float-right">Uložit</button>
<!--      <div class="form-group col-form-label-lg">
        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
      </div> -->






<!--      <div class="form-group col-form-label-lg">
        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
      </div> -->


<!-- KONEC MENU-->
    <!-- ČÁST ZOBRAZENÍ TIKETŮ-->
    

    
  <p>
          <textarea type="text" rows="5" class="form-control" placeholder="Popis" pattern=".{1,}" id="description" name="description"><?php echo $_POST['description']; ?></textarea>
          <!-- bude potreba vybrat usera podle username where role=pracovnik -->
  </p>
           <p> 
          <label for="exampleFormControlSelect2">Vybrat pracovníka</label>
          <!-- TY <OPTIONS> SE BUDOU GENEROVAT PODLE DATABÁZE >-->
          <select class="form-control" id="exampleFormControlSelect2" name="user">
<!--              <option>Petr Nebojsa</option>
              <option>Karel Spackatiket</option>
              <option>Filip Neobhájil</option>
              <option>David Zápočet</option>
              <option>Michaela Opakůvková</option> -->

              <?php print_Workers(); ?>
            </select>
</p>
<!--             <div id="datetimepicker1" class="input-append date">
              <input data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>
              <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                </i>
              </span>
            </div>
            <script type="text/javascript">
              $(function() {
                $('#datetimepicker1').datetimepicker({
                  language: 'pt-BR'
                });
              });
            </script> -->

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

            <p>Odpracovaný čas:
              <select class="form-control" name="real_time">
                  <option value="5 min">5 min</option>
                  <option value="15 min">15 min</option>
                  <option value="30 min">30 min</option>
                  <option value="1 hod">1 hod</option>
                  <option value="2 hod">2 hod</option>
                  <option value="4 hod">4 hod</option>
                  <option value="8 hod">8 hod</option>
              </select> 
            </p>

            <p>Status
              <select class="form-control" name="state">
                  <option value="1">Aktivní</option>
                  <option value="2">Uzavřený</option>
              </select> 
            </p>

<!-- 
Dokumentace: (více na https://tarruda.github.io/bootstrap-datetimepicker/)
// Considering you are on a GMT-3 timezone and the input contains '2000-01-17 10:00'
var localDate = picker.getLocalDate(); // localDate === 2000-01-17 07:00
var utcDate = picker.getDate(); // utcDate === 2000-01-17 10:00
//
picker.setLocalDate(new Date(1998, 10, 11, 4, 30)); // input === 1998-10-11 07:30
picker.setDate(new Date(Date.UTC(1998, 10, 11, 4, 30))); // input === 1998-10-11 04:30
-->
</form>
</div>
</body>
</html>

</form>
</div>
</body>
</html>