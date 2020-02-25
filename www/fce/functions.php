<?php

/*Funkce na zjištění role přihlášeného uživatele
    Vrací   -1 : Nepřihlášený uživatel
             0 : Zákazník
             1 : Pracovník
             2 : Manažer
             3 : Vedoucí
             4 : Administrátor
    Vyžaduje require '../fce/functions.php';
*/
function get_role()
{
    require 'connect.php';
    if (isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
    }
    else
    {
        return -1;
    }

    $sql = "SELECT ID_user, username, password, role FROM User WHERE username = :username";
    $stmt = $pdo->prepare($sql);

//Bind value.
    $stmt->bindValue(':username', $username);

//Execute.
    $stmt->execute();

//Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $role = $user['role'];
    return $role;
}

function make_header($page_title){
	
}


function make_ticket_for_preview(){
	
}

?>