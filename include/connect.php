<?php
session_start();

$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "hallticket";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection 
