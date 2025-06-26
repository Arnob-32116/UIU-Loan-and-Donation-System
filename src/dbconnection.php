<?php
$servername = "sql108.infinityfree.com";
$username = "if0_39231079";
$password = "0112310569"; // Never expose this publicly!
$database = "if0_39231079_db_loan_and_donation";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";
?>
