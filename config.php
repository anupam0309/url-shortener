<?php
// config.php
$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'shortner';

$con = new mysqli($host, $user, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
