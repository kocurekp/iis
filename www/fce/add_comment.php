<?php 
	
	/**
	 * Start the session.
	 */
	session_start();

	/**
	 * Include our MySQL connection.
	 */
	require 'connect.php';	

	$name = $_POST['name'];
	$description = $_POST['description'];
	$ticket_description = $_POST['ticket_description'];
	// $ID_ticket = $_POST['ID_ticket'];//////////////////////////////////////////////
	$ID_user = $_SESSION['username'];

	if (isset($_POST['ID_ticket'])) {
	    $ID_ticket = $_POST['ID_ticket'];
        $_SESSION['ID_ticket'] = $ID_ticket;
    }else{
    	$ID_ticket = $_SESSION['ID_ticket'];
    	// unset($_SESSION['ID_ticket']);
    }

    $username = $_SESSION['username'];



            //Construct the SQL statement and prepare it.
    $sql = "SELECT ID_user, username FROM User WHERE username = :username";
    $pdo1 = pdo();
    $stm = $pdo1->prepare($sql);
    
    //Bind the provided username to our prepared statement.
    $stm->bindValue(':username', $username);
    
    //Execute.
    $stm->execute();
    
    //Fetch the row.
    $rw = $stm->fetch(PDO::FETCH_ASSOC);
    $ID_user = $rw['ID_user'];
    // echo $ID_user;

    //Prepare our INSERT statement.
    $sql = "INSERT INTO Comment (description, ID_ticket, ID_user) VALUES (:description, :ID_ticket, :ID_user)";
    $stmt = $pdo->prepare($sql);
    
    //Bind our variables.
    $stmt->bindValue(':description', $ticket_description);
    $stmt->bindValue(':ID_ticket', $ID_ticket);
	$stmt->bindValue(':ID_user', $ID_user);
 
    //Execute the statement and insert the new account.
    $result = $stmt->execute();
    
    //If the signup process is successful.
    if($result){
        //What you do here is up to you!
            header('Location: ../obsah/ticket.php');
    }

 ?>