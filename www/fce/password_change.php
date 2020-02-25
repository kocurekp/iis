<?php
session_start();
/**
 * Include our MySQL connection.
 */
require 'connect.php';

// *
//  * Include ircmaxell's password_compat library.
 
require '../lib/password.php';
 

$username = $_POST['username'];
if (isset($_POST['cancel']))
{
    header("Location: ../obsah/administrace.php");
    exit;
}
$pass = $_POST['pass'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

$sql = "SELECT ID_user, username, password FROM User WHERE username = :username";
$stmt = $pdo->prepare($sql);

//Bind value.
$stmt->bindValue(':username', $username);

//Execute.
$stmt->execute();

//Fetch row.
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$hash = $user['password'];
$validPassword = password_verify($pass, $hash);

//If $validPassword is TRUE, the login has been successful.
if(($validPassword)) {

    if (!($pass1 === $pass2)) {
        header("Location: ../obsah/change_password.php?Error=different_password");
        exit;
    }

    if ((strlen($pass1) > 60) || (strlen($pass1) < 5)) {
        header("Location: ../obsah/change_password.php?Error=wrong_password_format");
        exit;
    }

    $passwordHash = password_hash($pass1, PASSWORD_BCRYPT, array("cost" => 10));

    //Prepare our INSERT statement.
    $sql = 'UPDATE User SET password = :password WHERE username = :username';
    $stmt = $pdo->prepare($sql);

    //Bind our variables.
    $stmt->bindValue(':password', $passwordHash);
    $stmt->bindValue(':username', $username);

    //Execute the statement and insert the new account.
    $result = $stmt->execute();
    if (($pass1 === $pass2)) {
        header("Location: ../obsah/change_password.php?Message=password_change_successful");
        exit;
    }
}
else
{
    header("Location: ../obsah/change_password.php?Error=wrong_password");
    exit;
}
?>