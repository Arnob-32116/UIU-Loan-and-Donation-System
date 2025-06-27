<?php
$servername = "localhost";
$username = "root";
$password = ""; // default XAMPP password is empty
$dbname = "LoanAndDonation"; // replace with your database name
$port = 3312; // specify the port number

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>