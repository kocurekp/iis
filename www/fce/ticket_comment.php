

<?php 


/**
 * Include our MySQL connection.
 */

    function print_Comments()
    {
    	$pdoOptions = array(
	    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	    PDO::ATTR_EMULATE_PREPARES => false
		);
 
		$pdo = new PDO(
	    "mysql:host=" . "localhost" . ";dbname=" . "xnacar00", //DSN
	    "xnacar00", //Username
	    "9etukita", //Password
	    $pdoOptions //Options
		);
    	
	if (isset($_POST['ID_ticket'])) {
	    $ID_ticket = $_POST['ID_ticket'];
    }else{
    	$ID_ticket = $_SESSION['ID_ticket'];
    	unset($_SESSION['ID_ticket']);
    }

	    $sql = 'SELECT * FROM Comment WHERE ID_ticket = :ID_ticket ORDER BY ID_comment DESC';
	    $pdo1 = pdo();
	    $stmt = $pdo1->prepare($sql);

	    //Bind the provided username to our prepared statement.
	    $stmt->bindValue(':ID_ticket', $ID_ticket);
	    //Execute.
	    $stmt->execute();
	    
	    //Fetch row.
	    // $row = $stmt->fetch(PDO::FETCH_ASSOC);

	    // echo $user;

		    // echo $ID_user;//////////////////////////////////////////////////////////////////
		while ($row = $stmt->fetch())
		{
		    $ID_user = $row['ID_user'];

			$sql = 'SELECT ID_user, username FROM User WHERE ID_user = :ID_user';
			$pdo2 = pdo();
		    $stm = $pdo2->prepare($sql);
		    //Bind the provided username to our prepared statement.

		    $stm->bindValue(':ID_user', $ID_user);
		    //Execute.
		    $stm->execute();

		    while ($user = $stm->fetch()) {
		    	$username = $user['username'];
		    }



		    $comment = '         
		       <li>
	                <div class="commentText">
	                	<p>'.$username.'</p>
	                    <p class="">'.$row['description'].'</p> <span class="date sub-text">'.$row['ts_create'].'</span>
	                </div>
	            </li>';
		    echo $comment;
		} 	
    }
?>