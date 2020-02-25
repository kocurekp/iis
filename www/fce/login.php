
<?php 
//login.php
 
/**
 * Start the session.
 */
session_start();
 
/**
 * Include ircmaxell's password_compat library.
 */
require '../lib/password.php';
 
/**
 * Include our MySQL connection.
 */
require 'connect.php';
 
 
//If the POST var "login" exists (our submit button), then we can
//assume that the user has submitted the login form.
if(isset($_POST['login'])){
    
    //Retrieve the field values from our login form.
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    //Retrieve the user account information for the given username.
    $sql = "SELECT ID_user, username, password, role FROM User WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    //Bind value.
    $stmt->bindValue(':username', $username);
    
    //Execute.
    $stmt->execute();
    
    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If $row is FALSE.
    if($user === false){
        //Could not find a user with that username!
        header("Location: ../index.php?Error=invalid_username");
        exit;
        //die('Incorrect username / password combination!');
    } else{
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.
        
        $hash = $user['password'];
        $validPassword = password_verify($passwordAttempt, $hash);

        //If $validPassword is TRUE, the login has been successful.
        if($validPassword){
            
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["ID_user"] = $user['ID_user'];
            $_SESSION["username"] = $username;
            $_SESSION["role"] = $user['role'];
            $_SESSION['timestamp'] = time();


            //Redirect to our protected page, which we called welcome.php
            // header('Location: welcome.php');
            header('Location: ../obsah/home.php');
            exit;
            
        } else{
            //$validPassword was FALSE. Passwords do not match.
            //die('Incorrect username / password combination!');
            header("Location: ../index.php?Error=wrong_password");
            exit;
        }
    }
    
}

 ?>