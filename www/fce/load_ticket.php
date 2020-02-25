<?php 


function print_Ticket($row)
{

	switch ($row['state']) {
		case 1:
			$state = '<div class="p-2 circle-new"></div>';
			break;
		case 2:
			$state = '<div class="p-2 circle-opened"></div>';
			break;
		case 3:
			$state = '<div class="p-2 circle-closed"></div>';
			break;
		default:
			# code...
			break;
	}

   	$print_ticket = '
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card h-100">
                <div class="d-flex p-3 justify-content-center">
                '.$state.'
                </div>
                    <div class="card-body">
					<form action="../obsah/ticket.php" method="post" accept-charset="utf-8">
                        <h3 class="card-title"><a>Tiket: #'.$row['ID_ticket'].'</a></h4>
                        <h4 class="card-title"><a>Name: '.$row['name'].'</a></h4>

                        <p class="card-text">'.$row['description'].'</p>

                    <input type="hidden" name="ID_ticket" value="'.$row['ID_ticket'].'">
                    
                        <button style="width:100%" class="btn btn-outline-info btn-block" type="submit" >Open</button>
                    </form>
                    </div>
                </div>
            </div>';
    echo $print_ticket;
}

function Load_Tickets()
{
	/**
 * Include our MySQL connection.
 */
require 'connect.php';


    $sql = 'SELECT ID_ticket, name, description, state, ID_product FROM Ticket ORDER BY ID_ticket DESC';
    $stmt = $pdo->prepare($sql);


    //Execute.
    $stmt->execute();
    

while ($row = $stmt->fetch())
{
	print_Ticket($row);
}

}
 ?>