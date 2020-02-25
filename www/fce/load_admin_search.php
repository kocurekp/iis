<?php


function print_user($row)
{
    $level = $row['role'];
    $level_print = 'Neregistrovaný zákazník';
    switch ($level) {
        case 0:
            $level_print = 'Zákazník';
            break;
        case 1:
            $level_print = 'Pracovník';
            break;
        case 2:
            $level_print = 'Manažer';
            break;
        case 3:
            $level_print = 'Vedoucí';
            break;
        case 4:
            $level_print = 'Administrátor';
            break;
    }

    $print = '
    <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card h-100">
            <div class="d-flex p-3 justify-content-center">
                <div class="p-2 circle-closed"></div>
            </div>
            <div class="card-body">
                <form action="../obsah/user_management.php" method="post" accept-charset="utf-8">
                    <h4 class="card-title"><a>Uživatel: '.$row['username'].'</a></h4>

                    <input type="hidden" name="ID_user" value="'.$row['ID_user'].'">
                    <input type="hidden" name="username" value="'.$row['username'].'">
                    <input type="hidden" name="role" value="'.$row['role'].'">
                    <p class="card-text">'.$level_print.'</p>
                    
                    <button style="width:100%" class="btn btn-outline-info btn-block" type="submit" >Upravit</button>
                    </form>
            </div>
        </div>
    </div>

                ';
    echo $print;
}

function Load_Users($array)
{
    /**
     * Include our MySQL connection.
     */
    // require 'connect.php';


    $sql = 'SELECT ID_user, username, role FROM User ORDER BY Role DESC';
    $pdo1 = pdo();
    $stmt = $pdo1->prepare($sql);


    //Execute.
    $stmt->execute();

    //Fetch row.
    // $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // echo $user;
    // print_r($array);

    while ($row = $stmt->fetch())
    {
        foreach ($array as $key => $value) {

                if ($value == $row['username']) {
                 print_user($row);
                        # code...
                }
                // elseif ($value == $row['role']) {
                //     # code...
                //  print_user($row);

                // }
            }
    }

}
?>