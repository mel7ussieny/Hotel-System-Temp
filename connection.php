<?php
$host = "localhost";
$dbname = "hotel";
$user = "root";
$password = "";

// Establishing MySQLi connection
$con = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Set character set to UTF-8
$con->set_charset("utf8");
