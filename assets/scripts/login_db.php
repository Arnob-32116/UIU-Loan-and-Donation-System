<?php
  session_start();
  require 'dbconnection.php';

  $email = $_POST['emails'];
  $password = $_POST['password'];


if(isset($_POST['checkbox'])){
    $sql = "SELECT * FROM ClubInfo WHERE club_email = '$email'";
$result = $conn->query($sql);

if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if ($password === $user['password']) {
        $_SESSION['club_id'] = $user['club_id'];
        $_SESSION['club_name'] = $user['club_name'];
        $_SESSION['club_email'] = $user['club_email'];
        $_SESSION['type'] = "100";
        header("Location: ../../src/index.php");
        exit();
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "Email not found.";
}

$conn->close();

}
else{
$sql = "SELECT * FROM UserInfo WHERE email = '$email'";
$result = $conn->query($sql);

if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if ($password === $user['password']) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['uiu_id'] = $user['uiu_id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['type'] = "001";
        header("Location: ../../src/index.php");
        exit();
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "Email not found.";
}

$conn->close();
}
?>