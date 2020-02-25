<?php

/**
 * Include our MySQL connection.
 */
require 'connect.php';
session_start();

if (isset($_POST['ID_user'])) {
    $ID_user = $_POST['ID_user'];
}else{
    $ID_user = $_SESSION['username'];
}

if (isset($_POST['cancel']))
{
    header("Location: ../obsah/admin.php");
    exit;
}

if ($ID_user == $_SESSION['ID_user'])
{
    header("Location: ../obsah/admin.php?Error=editing_myself");
    exit;
}

$role = $_POST['role'];
$sql = 'UPDATE User SET role = :role WHERE ID_user = :ID_user';
$stmt = $pdo->prepare($sql);

//Bind the provided username to our prepared statement.
$stmt->bindValue(':role', $role);
$stmt->bindValue(':ID_user', $ID_user);

//Execute.
$stmt->execute();

header("Location: ../obsah/admin.php?Message=role_change_successful");
exit;
?>