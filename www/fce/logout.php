<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
if (isset($_GET['Message'])) {
    if ($_GET['Message'] == "timeout") {
        header("location: ../index.php?Message=timeout");
        exit;
    }
}
 
// Redirect to login page
header("location: ../index.php");
exit;
?>