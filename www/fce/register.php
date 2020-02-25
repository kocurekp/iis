<?php 

session_start();
 
// *
//  * Include ircmaxell's password_compat library.
 
require '../lib/password.php';
 
/**
 * Include our MySQL connection.
 */
require 'connect.php';
 
 
//If the POST var "register" exists (our submit button), then we can
//assume that the user has submitted the registration form.
if(isset($_POST['register'])){
    
    //Retrieve the field values from our registration form.
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $confirm_pass = !empty($_POST['confirm_password']) ? trim($_POST['confirm_password']) : null;

    if (!($pass === $confirm_pass)) {
        //die('Passwords does not match!');
        header("Location: ../index.php?Error=different_password");
        exit;
    }

    if (strlen($username) > 30 || strlen($username) < 1) {
        header("Location: ../index.php?Error=wrong_username_format");
        exit;
    }

    if (strlen($pass) > 60 || strlen($pass) < 5) {
        header("Location: ../index.php?Error=wrong_password_format");
        exit;
    }
    
    //Construct the SQL statement and prepare it.
    $sql = "SELECT COUNT(username) AS num FROM User WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':username', $username);
    
    //Execute.
    $stmt->execute();
    
    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If the provided username already exists - display error.
    if($row['num'] > 0){
        //die('That username already exists!');
        header("Location: ../index.php?Error=existing_user");
        exit;
    }
    
    //Hash the password as we do NOT want to store our passwords in plain text.
    $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 10));
    
    //Prepare our INSERT statement.
    $sql = "INSERT INTO User (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);
    
    //Bind our variables.
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $passwordHash);
 
    //Execute the statement and insert the new account.
    $result = $stmt->execute();
    
    //If the signup process is successful.
    if($result){
        //What you do here is up to you!
        header("Location: ../index.php?Message=registration_successful");
        exit;
    }
    
}

?>




