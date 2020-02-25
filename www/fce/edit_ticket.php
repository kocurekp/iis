<?php 

/**
 * Include our MySQL connection.
 */
require 'connect.php';


	$name = $_POST['name'];
	$description = $_POST['description'];
	$ID_ticket = $_POST['ID_ticket'];


    if ($name == null || $description == null) {
        header("Location: ../obsah/ticket_preview.php?Error=name_description_not_filled");
        exit;
    }
 		    //Construct the SQL statement and prepare it.
    $sql = "UPDATE Ticket SET name = :name, description = :description WHERE ID_ticket = :ID_ticket";
    $stmt = $pdo->prepare($sql);
    
    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':ID_ticket', $ID_ticket);

    //Execute.
    $result = $stmt->execute();
    
    //If the signup process is successful.
    if($result){
        //What you do here is up to you!
        // echo 'Thank you for adding product.';
        header("Location: ../obsah/ticket_preview.php?Message=edit_ok");
        exit;
    }
    

 ?>