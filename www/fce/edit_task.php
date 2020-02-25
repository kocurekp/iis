<?php 

/**
 * Include our MySQL connection.
 */
require 'connect.php';


	// $name = $_POST['name'];
	$description = $_POST['description'];
	$ID_ticket = $_POST['ID_ticket'];
    $estm_time = $_POST['estm_time'];
    $real_time = $_POST['real_time'];
    $username = $_POST['username'];
    $ID_task = $_POST['ID_task'];
    $state = $_POST['state'];




    //         //Construct the SQL statement and prepare it.
    // $sql = "SELECT ID_ticket, ID_task FROM Task WHERE ID_task = :ID_task";
    // $pdo2 = pdo();
    // $st = $pdo2->prepare($sql);
    
    // //Bind the provided username to our prepared statement.
    // $st->bindValue(':ID_task', $ID_task);
    
    // //Execute.
    // $st->execute();
    
    // //Fetch the row.
    // $r = $st->fetch(PDO::FETCH_ASSOC);
    // $ID_ticket = $r['ID_ticket;'];



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

    if ($description == null) {
        if ($name == null || $description == null) {
            header("Location: ../obsah/task_preview.php?Error=name_description_not_filled");
            exit;
        }
    }
    if($_POST['ID_ticket'] == null){
        header("Location: ../obsah/task_preview.php?Error=ticket_not_filled");
        exit;
    }
    if($_POST['username'] == null){
        header("Location: ../obsah/task_preview.php?Error=worker_not_filled");
        exit;
    }
 		    //Construct the SQL statement and prepare it.
    // $sql = "UPDATE Task SET estm_time = :estm_time, description = :description, ID_user = :ID_user, ID_ticket = :ID_ticket WHERE ID_ticket = :ID_ticket";
    $sql = "UPDATE Task SET real_time = :real_time, estm_time = :estm_time, description = :description, ID_user = :ID_user, state = :state WHERE ID_task = :ID_task";
    




    // $sql = "INSERT INTO Task (description, estm_time, ID_user, ID_ticket) VALUES (:description, :estm_time, :ID_user, :ID_ticket)";
    $stmt = $pdo->prepare($sql);

        //Bind our variables.
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':estm_time', $estm_time);
    $stmt->bindValue(':real_time', $real_time);
    $stmt->bindValue(':ID_user', $ID_user);
    $stmt->bindValue(':state', $state);
    $stmt->bindValue(':ID_task', $ID_task);
    // print_r($stmt);
    //Execute.
    $result = $stmt->execute();

	update_ticket_state($ID_ticket, $state);
    
    //If the signup process is successful.
    if($result){
        //What you do here is up to you!
        // echo 'Thank you for adding product.';
        header("Location: ../obsah/task_preview.php?Message=edit_ok");
        exit;
    }
    

    function update_ticket_state($ID_ticket, $state)
    {

            if ($state == 1) {
	            $sql = "UPDATE Ticket SET state = 2 WHERE ID_ticket = :ID_ticket";
            }else{
	            $sql = "UPDATE Ticket SET state = 3 WHERE ID_ticket = :ID_ticket";
            }

            $pdo2 = pdo();
            $st = $pdo2->prepare($sql);

        //Bind our variables.
            $st->bindValue(':ID_ticket', $ID_ticket);

        //Execute the statement and insert the new account.
            $st->execute();
    }

/////////////////////not done at all
 ?>