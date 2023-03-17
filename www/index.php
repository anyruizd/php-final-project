<?php
if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] == '/')
    header('Location: /login.php');
// Define database connection constants
define('DB_HOST', 'db');
define('DB_USER', 'FINAL_PROJ');
define('DB_PASSWORD', 'DBPassword@');
define('DB_NAME', 'FINAL_PROJ');

// Create MySQLi object
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Use the $mysqli object to execute queries and interact with the database

include('./pages/' . $_SERVER['REQUEST_URI']);

// Close connection
$mysqli->close();
?>
