<?php 
    /**
     * Start the session.
     */
    // session_start();


/**
 * Include our MySQL connection.
 */

	if (isset($_POST['ID_ticket'])) {
	    $ID_ticket = $_POST['ID_ticket'];
        $_SESSION['ID_ticket'] = $ID_ticket;
    }else{
    	$ID_ticket = $_SESSION['ID_ticket'];
    	// unset($_SESSION['ID_ticket']);
    }


    $sql = 'SELECT ID_product, name, description FROM Ticket WHERE ID_ticket = :ID_ticket';
    $st = $pdo->prepare($sql);
    
    //Bind the provided username to our prepared statement.
    $st->bindValue(':ID_ticket', $ID_ticket);
    
    //Execute.
    $st->execute();
    $row = $st->fetch();
    $name = $row['name'];
    $description = $row['description'];


 ?>