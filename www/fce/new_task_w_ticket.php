<?php 


     function print_Workers()
    {
        /**
         * Include our MySQL connection.
         */
        include 'connect.php';
        // pdo();
       /*???????????? $description = !empty($_POST['description']) ? trim($_POST['description']) : null;

        if ($description == null) {
            header("Location: ../obsah/task_preview.php?Error=name_description_not_filled");
            exit;
        }
        if($_POST['ticket'] == null){
            header("Location: ../obsah/task_preview.php?Error=ticket_not_filled");
            exit;
        }*/

        //1 - worker
        $sql = 'SELECT ID_user, username, role FROM User WHERE role = 1 ORDER BY ID_user DESC';
        $pdo = pdo();

        $stmt = $pdo->prepare($sql);


        //Execute.
        $stmt->execute();

        while ($row = $stmt->fetch())
        {
            $name = $row['username'];
            $item = '<option value="'.$name.'">'.$name.'</option>';
            echo $item;

        }   
    }
 
?>