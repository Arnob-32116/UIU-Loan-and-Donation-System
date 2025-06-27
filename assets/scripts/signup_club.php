<?php
  require 'dbconnection.php';
  $supervisor_id = $_POST['supervisor_id'];
  $club_name = $_POST['club_name'];
  $club_email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "INSERT INTO ClubInfo ( supervisor_uiu_id , club_name, club_email, password)
        VALUES ('$supervisor_id', '$club_name', '$club_email', '$password')";

        echo $sql;

if ($conn->query($sql) === TRUE) {
    header("Location: ../../src/index.html");
        exit();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();

?>