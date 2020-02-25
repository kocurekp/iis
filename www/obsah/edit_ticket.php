<?php
	ini_set("default_charset", "UTF-8");
require "../fce/make_admin_header.php";
	make_admin_header("Tiket");
	?>
<!-- KONEC MENU-->
    <!-- ČÁST ZOBRAZENÍ TIKETŮ-->
    <div class="container">
    <form action="ticket_preview.php">
      <button type="submit" class="btn btn-outline-danger float-right">Zrušit</button>
      </form>
    <form method="post" action="../fce/edit_ticket.php">
      <button type="submit" class="btn btn-outline-success float-right">Uložit</button>
    </div>
    
    <div class="container">
    
      <div class="form-group">
        <input type="hidden" name="ID_ticket" value="<?php echo $_POST['ID_ticket']; ?>">
    
    <textarea class="form-control col-form-label-lg" rows="1" id="exampleFormControlInput1" pattern=".{1,}" name="name"><?php echo $_POST['name']; ?></textarea>
  </div>
        <div class="form-group">

    <textarea class="form-control" rows="5" id="popis" pattern=".{1,}" name="description"><?php echo $_POST['description']; ?></textarea>
  </div>
    </form>
    </div>
</body>
</html>