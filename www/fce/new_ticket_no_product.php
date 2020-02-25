<?php 	

function print_Items()
 {

/**
 * Include our MySQL connection.
 */
require 'connect.php';

     // $name = !empty($_POST['name']) ? trim($_POST['name']) : null;
     // $description = !empty($_POST['description']) ? trim($_POST['description']) : null;
     // if($_POST['product'] == null){
     //     header("Location: ../obsah/ticket_preview.php?Error=product_not_filled");
     //     exit;
     // }

     // if ($name == null || $description == null) {
     //     header("Location: ../obsah/ticket_preview.php?Error=name_description_not_filled");
     //     exit;
     // }

     // $sql = "SELECT COUNT(name) AS num FROM Ticket WHERE name = :name";
     // $pdo1 = pdo();
     // $stmt = $pdo1->prepare($sql);

     // //Bind the provided username to our prepared statement.
     // $stmt->bindValue(':name', $name);

     // //Execute.
     // $stmt->execute();

     // //Fetch the row.
     // $row = $stmt->fetch(PDO::FETCH_ASSOC);

     // //If the provided username already exists - display error.
     // if($row['num'] > 0){
     //     header("Location: ../obsah/ticket_preview.php?Error=existing_ticket");
     //     exit;
     // }

    $sql = 'SELECT ID_product, name FROM Product ORDER BY ID_product DESC';
     $pdo2 = pdo();
    $stmt = $pdo2->prepare($sql);


    //Execute.
    $stmt->execute();
    
    //Fetch row.
    // $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // echo "fdsfdsf";

	while ($row = $stmt->fetch())
	{
	    $name = $row['name'];
        // echo $name;
	    $item = '<option value="'.$name.'">'.$name.'</option>';
	    echo $item;

	}
     // header('Location: ../obsah/ticket_preview.php?Message=create_ok');
	exit;
 } 




 ?>