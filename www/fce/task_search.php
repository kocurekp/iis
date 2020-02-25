<?php 

	if (empty($_POST['search'])) {
		header('Location: ../obsah/task_preview.php');
	}


function search()
{


	if (!empty($_POST['search'])) {
	
		/**
		 * Include our MySQL connection.
		 */
		require 'connect.php';	
		require 'load_task_search.php';


		$search = $_POST['search'];

		# code...

		$sql = 'SELECT ID_ticket, name  FROM Ticket ORDER BY ID_ticket DESC';
		$stmt = $pdo->prepare($sql);


    //Execute.
		$stmt->execute();

		$array = new ArrayObject();
		$match = new ArrayObject();

		while ($row = $stmt->fetch())
		{

			$array->append($row['name']);

			$array->append($row['ID_ticket']);

		}
		foreach ($array as $key => $value) {
// Test if string contains the word 
			if(strpos($value, $search) !== false){
			// echo "Word Found!";
				$match->append($value);

			} else{
			// echo "Word Not Found!";
			}
		}



		load_Tasks($match);

		// print_r($match);
	}

}

?>