<?php 


function print_Task($row)
{

    $sql = 'SELECT ID_user, username FROM User WHERE ID_user = :ID_user';
    $pdo1 = pdo();
    $stm = $pdo1->prepare($sql);

    //Bind value.
    $stm->bindValue(':ID_user', $row['ID_user']);

    //Execute.
    $stm->execute();
    
    //Fetch row.
    // $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // echo $user;

    while ($rw = $stm->fetch())
    {
        $username = $rw['username'];
        // echo $username;
    }

    $sql = 'SELECT name, ID_ticket FROM Ticket WHERE ID_ticket = :ID_ticket';
    $pdo2 = pdo();
    $st = $pdo2->prepare($sql);

    //Bind value.
    // $st->bindValue(':ID_user', $row['ID_user']);
    $st->bindValue(':ID_ticket', $row['ID_ticket']);

    //Execute.
    $st->execute();
    
    //Fetch row.
    // $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // echo $user;

    while ($r = $st->fetch())
    {
        $name = $r['name'];
        // echo $name;
    }



	switch ($row['state']) {
		case 1:
			$state = '<div class="p-2 circle-opened"></div>';
			break;
		case 2:
			$state = '<div class="p-2 circle-closed"></div>';;
			break;
		default:
			# code...
			break;
	}


    $print = '
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card h-100">
                <div class="d-flex p-3 justify-content-center">
                '.$state.'
                </div>
                    <div class="card-body">
                    <form action="../obsah/task.php" method="post" accept-charset="utf-8">
                        <h4 class="card-title"><a>Úkol pro tiket: #'.$row['ID_ticket'].'</a></h4>

                        <p class="card-text">Popis: '.$row['description'].'</p>                        <p class="card-text">Pracovník: '.$username.'</p>
                        <p class="card-text">Odhadovaný čas: '.$row['estm_time'].'</p>

                        <input type="hidden" name="name" value="'.$name.'">
                        <input type="hidden" name="description" value="'.$row['description'].'">
                        <input type="hidden" name="estm_time" value="'.$row['estm_time'].'">
                        <input type="hidden" name="real_time" value="'.$row['real_time'].'">
                        <input type="hidden" name="username" value="'.$username.'">
                        <input type="hidden" name="ID_ticket" value="'.$row['ID_ticket'].'">
                        <input type="hidden" name="ID_task" value="'.$row['ID_task'].'">
                        <button style="width:100%" class="btn btn-outline-info btn-block" type="submit" >Open</button>
                    </form>
                    </div>
                </div>
            </div>';
    echo $print;
}

function Load_Tasks()
{
	/**
 * Include our MySQL connection.
 */
require 'connect.php';


    $sql = 'SELECT ID_task, description, estm_time, real_time, state, ID_user, ID_ticket FROM Task ORDER BY ID_task DESC';
    $stmt = $pdo->prepare($sql);


    //Execute.
    $stmt->execute();
    
    //Fetch row.
    // $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // echo $user;

while ($row = $stmt->fetch())
{


	print_Task($row);



}

}
 ?>