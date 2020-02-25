<?php 

// session_start();

/**
 * Include our MySQL connection.
 */
require 'connect.php';

// header('Content-Type: text/html; charset=UTF-8');

// mb_internal_encoding('UTF-8');
// mb_http_output('UTF-8');
// mb_http_input('UTF-8');
// mb_regex_encoding('UTF-8');



 		 //    //Construct the SQL statement and prepare it.
    // $sql = 'SELECT name, description FROM Product WHERE name = :name';

    // $stmt = $pdo->prepare($sql);
    
    // //Bind the provided username to our prepared statement.
    // $stmt->bindValue(':name', $name);
    // $stmt->bindValue(':description', $description);
    
    // //Execute.
    // $stmt->execute();

// echo "fsdf";
// echo $_POST['ID_product'];
// 
// 

	$ID_product = $_POST['ID_product'];

	// $text = '<input type="hidden" name="ID_product" value="'.$ID_product.'">';


 		    //Construct the SQL statement and prepare it.
    $sql = 'SELECT ID_product, name, description, ID_user FROM Product WHERE ID_product = :ID_product';
    $stmt = $pdo->prepare($sql);
    
    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':ID_product', $ID_product);
    
    //Execute.
    $stmt->execute();
    $row = $stmt->fetch();
    $name = $row['name'];
    $description = $row['description'];
    $ID_user = $row['ID_user'];

            //Construct the SQL statement and prepare it.
    $sql = 'SELECT username, ID_user FROM User WHERE ID_user = :ID_user';
    $pdo2 = pdo();
    $stmt = $pdo2->prepare($sql);
    
    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':ID_user', $ID_user);
    
    //Execute.
    $stmt->execute();
    $row = $stmt->fetch();
    $username = $row['username'];




    // echo $name;
    // echo $description;
// while ($row = $stmt->fetch())
// {
// 	print_Product($row);
// }


// function print_Name()
// {
//  		echo $name;
// }

// function print_Description(){
//  		echo $description;
// } 

 ?>
