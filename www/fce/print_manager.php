<?php 

/**
 * Include our MySQL connection.
 */
require 'connect.php';


function print_Manager()
{
            //2- manager
        $sql = 'SELECT ID_user, username, role FROM User WHERE role = 2 ORDER BY ID_user DESC';
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