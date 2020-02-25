<?php 


// session_start();

/**
 * Include our MySQL connection.
 */
require 'connect.php';



	$name = !empty($_POST['name']) ? trim($_POST['name']) : null;
	$description = !empty($_POST['description']) ? trim($_POST['description']) : null;
    $username = $_POST['username'];

    if ($name == null || $description == null) {
        header("Location: ../obsah/product_preview.php?Error=name_description_not_filled");
        exit;
    }

    // echo $name;
    // echo $description;
    // echo $username;

 		    //Construct the SQL statement and prepare it.
    $sql = "SELECT COUNT(name) AS num FROM Product WHERE name = :name";
    $stmt = $pdo->prepare($sql);
    
    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':name', $name);
    
    //Execute.
    $stmt->execute();
    
    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //If the provided username already exists - display error.
    if($row['num'] > 0){
        header("Location: ../obsah/product_preview.php?Error=existing_product");
        exit;
    }


        // $username = $_SESSION['username'];
        $sql = "SELECT ID_user FROM User WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':username', $username);
    $row = $stmt->execute();
    // echo $row['ID_user'];
    while ($row = $stmt->fetch()) {
        // echo $row['ID_user'];
        $ID_user = $row['ID_user'];
    }
    // echo $ID_user;

        //Prepare our INSERT statement.
    $sql = "INSERT INTO Product (name, description, ID_user) VALUES (:name, :description, :ID_user)";
    $stmt = $pdo->prepare($sql);

        //Bind our variables.
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':ID_user', $ID_user);

 
 	    //Execute the statement and insert the new account.
    $result = $stmt->execute();
    




    //If the signup process is successful.
    if($result){
        //What you do here is up to you!
        // echo 'Thank you for adding product.';
        header("Location: ../obsah/product_preview.php?Message=create_ok");
        exit;
    }
    



 ?>