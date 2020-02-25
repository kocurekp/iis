<?php 
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'its');
   $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS its;";
if ($conn->query($sql) === TRUE) {
    // echo "Database created or exists";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


// Create database
$sql = "CREATE TABLE IF NOT EXISTS users (
         id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
         username VARCHAR(50) NOT NULL UNIQUE,
         password VARCHAR(255) NOT NULL,
         created_at DATETIME DEFAULT CURRENT_TIMESTAMP);";
if ($conn->query($sql) === TRUE) {
    // echo "table created or exists";
} else {
    echo "Error creating table: ". $conn->error;
}

$conn->close();

?>