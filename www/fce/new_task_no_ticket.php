<?php 


// function pdo()
// {
//  // $pdoOptions = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_EMULATE_PREPARES => false);
     
    
//    // Connect to MySQL and instantiate the PDO object.
     
//  $pdo = new PDO("mysql:host=localhost;dbname=xnacar00", 'xnacar00', '9etukita', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_EMULATE_PREPARES => false));
//  return $pdo;
// }


    // function print_Tickets()
    // {
        /**
         * Include our MySQL connection.
         */
        include 'connect.php';
     // pdo();




        $sql = 'SELECT ID_ticket, name FROM Ticket ORDER BY ID_product DESC';
        $stmt = $pdo->prepare($sql);


        //Execute.
        $stmt->execute();

        $item = '';
        while ($row = $stmt->fetch())
        {
            $name = $row['name'];
            // echo $name;
            $item = $item . '<option value="'.$name.'">'.$name.'</option>';
            // echo $item;
        // echo "<br>";

        }   
        // echo $item;
    // } 
        echo "<label>Ticket:</label>";
        echo '<select class="form-control" name="ticket" >
                                 '.$item.'
                    </select>';



     function print_Workers()
    {
        /**
         * Include our MySQL connection.
         */
        // include 'connect.php';
        // pdo();

// $pdoOptions = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_EMULATE_PREPARES => false);
//         $pdo = new PDO("mysql:host=localhost;dbname=xnacar00","xnacar00"," 9etukita"," $pdoOptions");


        //1 - worker
        $sql = 'SELECT ID_user, username, role FROM User WHERE role = 1 ORDER BY ID_user DESC';
        $pdo2 = pdo();

        $stm = $pdo2->prepare($sql);


        //Execute.
        $stm->execute();

        while ($rw = $stm->fetch())
        {
            $name = $rw['username'];
            $item = '<option value="'.$name.'">'.$name.'</option>';
            echo $item;

        }   
    }
 
?>