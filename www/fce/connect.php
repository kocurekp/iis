<?php 

define('MYSQL_USER', 'xnacar00');
define('MYSQL_PASSWORD', '9etukita');
define('MYSQL_HOST', 'localhost');
define('MYSQL_DATABASE', 'xnacar00');

// define('MYSQL_USER', 'xkocur02'); 
// define('MYSQL_PASSWORD', 'ukejpa3o');
// define('MYSQL_HOST', 'localhost');
// define('MYSQL_DATABASE', 'xkocur02');

// define('MYSQL_USER', 'root');
// define('MYSQL_PASSWORD', '');
// define('MYSQL_HOST', 'localhost');
// define('MYSQL_DATABASE', 'xnacar00');

$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);
 
/**
 * Connect to MySQL and instantiate the PDO object.
 */
$pdo = new PDO(
    "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE, //DSN
    MYSQL_USER, //Username
    MYSQL_PASSWORD, //Password
    $pdoOptions //Options
);


function pdo()
{
	$pdoOptions = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_EMULATE_PREPARES => false);
	 
	
	  // Connect to MySQL and instantiate the PDO object.
	 
$pdo = new PDO("mysql:host=localhost;dbname=xnacar00","xnacar00","9etukita",$pdoOptions);
return $pdo;
}

 ?>