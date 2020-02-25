<?php
session_start();
/**
 * Include our MySQL connection.
 */
require 'connect.php';

if (isset($_POST['ID_user'])) {
    $ID_user = $_POST['ID_user'];
}

if ($ID_user == $_SESSION['ID_user'])
{
    header("Location: ../obsah/admin.php?Error=deleting_myself");
    exit;
}
$sql = 'SELECT ID_user FROM Comment WHERE ID_user = :ID_user';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':ID_user', $ID_user);
//Execute.
$stmt->execute();

while ($row = $stmt->fetch())
{
    header("Location: ../obsah/admin.php?Error=user_connections");
    exit;
}
$sql = 'SELECT ID_user FROM Task WHERE ID_user = :ID_user';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':ID_user', $ID_user);
//Execute.
$stmt->execute();

while ($row = $stmt->fetch())
{
    header("Location: ../obsah/admin.php?Error=user_connections");
    exit;
}
$sql = 'SELECT ID_user FROM Product WHERE ID_user = :ID_user';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':ID_user', $ID_user);
//Execute.
$stmt->execute();

while ($row = $stmt->fetch())
{
    header("Location: ../obsah/admin.php?Error=user_connections");
    exit;
}
$sql = 'SELECT ID_user FROM Ticket WHERE ID_user = :ID_user';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':ID_user', $ID_user);
//Execute.
$stmt->execute();

while ($row = $stmt->fetch())
{
    header("Location: ../obsah/admin.php?Error=user_connections");
    exit;
}


$sql = 'DELETE FROM User WHERE ID_user = :ID_user';
$stmt = $pdo->prepare($sql);

//Bind the provided username to our prepared statement.
$stmt->bindValue(':ID_user', $ID_user);

//Execute.
$stmt->execute();

header("Location: ../obsah/admin.php?Message=user_deleted");
exit;
?>
