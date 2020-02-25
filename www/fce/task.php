<?php 
	/**
 * Include our MySQL connection.
 */
	require 'connect.php';

	$name = $_POST['name'];
	$description = $_POST['description'];
	$estm_time = $_POST['estm_time'];
	$real_time = $_POST['real_time'];
	$username = $_POST['username'];
	$ID_ticket = $_POST['ID_ticket'];
	$ID_task = $_POST['ID_task'];

	$sql = "SELECT state FROM Task WHERE ID_task = :ID_task";


    $stmt = $pdo->prepare($sql);

        //Bind our variables.
    $stmt->bindValue(':ID_task', $ID_task);
    // print_r($stmt);
    //Execute.

        $row = $stmt->execute();
    // echo $row['ID_user'];
    while ($row = $stmt->fetch()) {
	    // echo $row['ID_user'];
	    $state = $row['state'];
	}

 ?>