<?php 




session_start();

/**
 * Include our MySQL connection.
 */
    require 'connect.php';


header('Content-Type: text/html; charset=UTF-8');

mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');
mb_regex_encoding('UTF-8');

    $name = !empty($_POST['name']) ? trim($_POST['name']) : null;
    $description = !empty($_POST['description']) ? trim($_POST['description']) : null;

    if ($name == null || $description == null) {
        header("Location: ../obsah/ticket_preview.php?Error=name_description_not_filled");
        exit;
    }
    if($_POST['product'] == null){
        header("Location: ../obsah/ticket_preview.php?Error=product_not_filled");
        exit;
    }

    if ($_POST['product']) {
	    $sql = "SELECT ID_product FROM Product WHERE name = :name";
	    $stmt = $pdo->prepare($sql);
	    $stmt->bindValue(':name', $_POST['product']);
	    $row = $stmt->execute();
	    // echo $row['ID_user'];
	    while ($row = $stmt->fetch()) {
		    // echo $row['ID_user'];
		    $ID_product = $row['ID_product'];
		}
    }else{
	    $ID_product = $_POST['ID_product'];
    }    
 // $ID_ticket = $_POST['ID_product'];
 // echo $ID_ticket;
    // echo $name;
    // echo "<br>";
    // echo $description;

 		    //Construct the SQL statement and prepare it.
    $sql = "SELECT COUNT(name) AS num FROM Ticket WHERE name = :name";
    $stmt = $pdo->prepare($sql);
    
    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':name', $name);
    
    //Execute.
    $stmt->execute();
    
    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If the provided username already exists - display error.
    if($row['num'] > 0){
        header("Location: ../obsah/ticket_preview.php?Error=existing_ticket");
        exit;
    }

    $username = $_SESSION['username'];
        $sql = "SELECT ID_user FROM User WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':username', $username);
    $row = $stmt->execute();
    // echo $row['ID_user'];
    while ($row = $stmt->fetch()) {
	    // echo $row['ID_user'];
	    $ID_user = $row['ID_user'];
	}

        //Prepare our INSERT statement.
    $sql = "INSERT INTO Ticket (name, description, ID_user, ID_product) VALUES (:name, :description, :ID_user, :ID_product)";
    $stmt = $pdo->prepare($sql);

        //Bind our variables.
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':ID_user', $ID_user);
    $stmt->bindValue(':ID_product', $ID_product);
 	    //Execute the statement and insert the new account.
    $result = $stmt->execute();
    

if(isset($_FILES['files']['name'][0])){

  // Count total files
  $countfiles = count($_FILES['files']['name']);
 
  // Prepared statement
  $query = "INSERT INTO Image (name,image,ticket_name) VALUES(?,?,?)";


  $statement = $pdo->prepare($query);
  // $statement->bindValue(':ticket_name', $name);

  // Loop all files
  for($i=0;$i<$countfiles;$i++){

    // File name
    $filename = $_FILES['files']['name'][$i];

    // Get extension
    $ext = end((explode(".", $filename)));

    // Valid image extension
    $valid_ext = array("png","jpeg","jpg");

    if(in_array($ext, $valid_ext)){

      // Upload file
      if(move_uploaded_file($_FILES['files']['tmp_name'][$i],'../upload/'.$filename)){

        // Execute query
        $statement->execute(array($filename,'../upload/'.$filename,$name));

      }

    }
        // shell_exec('chmod 775 ../upload/' . $filename);
  }
  // echo "File upload successfully";
}















    //If the signup process is successful.
    if($result){
        //What you do here is up to you!
 		header('Location: ../obsah/ticket_preview.php?Message=create_ok');
 		exit;
		// echo "string";
	}

?>