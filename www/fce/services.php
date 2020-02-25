<?php

    function connect_db()
    {
        $dsn = 'mysql:host=localhost;dbname=IIS;port=/var/run/mysql/mysql.sock';
        $db_user = 'xnacar00';
        $db_pass = '9etukita';
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        $pdo = new PDO($dsn, $db_user, $db_pass, $options);
        
        return $pdo;
    }

    function register(){
    	$login = $_POST['login'];
    	$password = $_POST['password'];

    	$sql = "INSERT INTO users (login, password)
    	VALUES ('".$login."','".$password."')";

	    if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

    }

	connect_db();
	register();
?>