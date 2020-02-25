<?php 

/**
 * Include our MySQL connection.
 */
require 'connect.php';


	$name = !empty($_POST['name']) ? trim($_POST['name']) : null;
	$description = !empty($_POST['description']) ? trim($_POST['description']) : null;
	$ID_product = $_POST['ID_product'];


    if ($name == null || $description == null) {
        header("Location: ../obsah/product_preview.php?Error=name_description_not_filled");
        exit;
    }
 		    //Construct the SQL statement and prepare it.
    $sql = "UPDATE Product SET name = :name, description = :description WHERE ID_product = :ID_product";
    $stmt = $pdo->prepare($sql);
    
    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':ID_product', $ID_product);

    //Execute.
    $result = $stmt->execute();
    
    //If the signup process is successful.
    if($result){
        //What you do here is up to you!
        // echo 'Thank you for adding product.';
        header("Location: ../obsah/product_preview.php?Message=edit_ok");
        exit;
    }
    

 ?>