<?php
  require 'dbconnection.php';
  $student_id = $_POST['student_id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "INSERT INTO UserInfo (uiu_id, name, email, password)
        VALUES ('$student_id', '$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();

?>