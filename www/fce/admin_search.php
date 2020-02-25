<?php 

	if (empty($_POST['search'])) {
		header('Location: ../obsah/admin.php');
	}


function search()
{


	if (!empty($_POST['search'])) {
	
		/**
		 * Include our MySQL connection.
		 */
		require 'connect.php';	
		require 'load_admin_search.php';


		$search = $_POST['search'];
		// echo $search;
		# code...

		$sql = 'SELECT ID_user, username, role  FROM User ORDER BY role DESC';
		$stmt = $pdo->prepare($sql);


    //Execute.
		$stmt->execute();

		$array = new ArrayObject();
		$match = new ArrayObject();

		while ($row = $stmt->fetch())
		{

			$array->append($row['username']);

			// $array->append($row['role']);

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



		load_Users($match);

		// print_r($match);
	}

}

?>