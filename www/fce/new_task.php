<?php 

/**
 * Include our MySQL connection.
 */
require 'connect.php';


 		$description = !empty($_POST['description']) ? trim($_POST['description']) : null;
        $estm_time = $_POST['estm_time'];
        $username = $_POST['user'];
        $ticket = $_POST['ticket'];

        if ($description == null) {
            header("Location: ../obsah/task_preview.php?Error=name_description_not_filled");
            exit;
        }
        if($ticket == null){
            header("Location: ../obsah/task_preview.php?Error=ticket_not_filled");
            exit;
        }
        $worker = !empty($_POST['user']) ? trim($_POST['user']) : null;

        if ($worker == null) {
            header("Location: ../obsah/task_preview.php?Error=worker_not_filled");
            exit;
        }

        if (isset($_POST['ID_ticket'])) {
            $ID_ticket = $_POST['ID_ticket'];

        }elseif(isset($_POST['ticket'])){
            $ticket = $_POST['ticket'];

                // echo $ticket;

                    //Construct the SQL statement and prepare it.
            $sql = "SELECT ID_ticket, name FROM Ticket WHERE name = :name";
            $stmt = $pdo->prepare($sql);
            
            //Bind the provided username to our prepared statement.
            $stmt->bindValue(':name', $ticket);
            
            //Execute.
            $stmt->execute();
            
            //Fetch the row.
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $ID_ticket = $row['ID_ticket'];
        }else{
            $ID_ticket = $_SESSION['ID_ticket'];
        }








 		    //Construct the SQL statement and prepare it.
    $sql = "SELECT ID_user, username FROM User WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':username', $username);
    
    //Execute.
    $stmt->execute();
    
    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $ID_user = $row['ID_user'];
    if($row['num'] > 0){
        header("Location: ../obsah/task_preview.php?Error=existing_task");
        exit;
    }

        //Prepare our INSERT statement.
    $sql = "INSERT INTO Task (description, estm_time, ID_user, ID_ticket) VALUES (:description, :estm_time, :ID_user, :ID_ticket)";
    $stmt = $pdo->prepare($sql);

        //Bind our variables.
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':estm_time', $estm_time);
    $stmt->bindValue(':ID_user', $ID_user);
    $stmt->bindValue(':ID_ticket', $ID_ticket);
 
 	    //Execute the statement and insert the new account.
    $result = $stmt->execute();

    change_ticket_state($ID_ticket);
  
    //If the signup process is successful.
    if($result){
        //What you do here is up to you!
        // echo 'Thank you for sending your ticket.';
        header('Location: ../obsah/task_preview.php?Message=create_ok');
        exit;
    }


    function change_ticket_state($ID_ticket)
    {
            $sql = "UPDATE Ticket SET state = 2 WHERE ID_ticket = :ID_ticket";
            $pdo1 = pdo();
            $stm = $pdo1->prepare($sql);

        //Bind our variables.
            $stm->bindValue(':ID_ticket', $ID_ticket);

        //Execute the statement and insert the new account.
            $stm->execute();
    }

 ?>