<?php
session_start();
require 'dbconnection.php';
$imageurl ;
$title = $_POST['title'];
$description = $_POST['description'];
$amount = $_POST['amount'];
$interest = $_POST['interest'];
$type = $_SESSION['type'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $bucket = 'crowdfunding'; // Supabase bucket name
    $filename = $_FILES['file']['name'];
    $tmpPath = $_FILES['file']['tmp_name'];
  // Get file extension
    $ext = pathinfo($originalName, PATHINFO_EXTENSION);

    // Create unique filename: timestamp + random string
    $uniqueName = uniqid('img_', true) . '.' . $ext;
    $projectUrl = 'https://pzxvpgtlyuofzluxhjlm.supabase.co';
    $apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InB6eHZwZ3RseXVvZnpsdXhoamxtIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc0ODU5MDAwMiwiZXhwIjoyMDY0MTY2MDAyfQ.qnazFugPQjHjxtcH1NREsNwP1Bsy_iQVR07eYgADe3M'; // Replace with your actual Supabase service role key

    $uploadUrl = "$projectUrl/storage/v1/object/$bucket/Uploaded/$uniqueName";
    $imageurl = $uploadUrl;

    $ch = curl_init($uploadUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, file_get_contents($tmpPath));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $apiKey",
        "Content-Type: application/octet-stream",
        "x-upsert: true"
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 200 || $httpCode === 201) {
        if($type === "001"){
             $user_id = $_SESSION['user_id'];
             $uiu_id = $_SESSION['uiu_id'];

             $sql = "INSERT INTO Loan ( loan_taker_user_id , loan_taker_uiu_id, amount, description_title , description , loan_photo , interest)

             VALUES ('$user_id','$uiu_id', '$amount', '$title', '$description' , '$imageurl' , $interest)";


            if ($conn->query($sql) === TRUE) {
            header("Location: ../../src/index.php");
            exit();
            } else {
           echo "Error: " . $conn->error;
           }

           $conn->close();
        }else{
             $user_id = $_SESSION['club_id'];

             $sql = "INSERT INTO Donation ( donation_taker_club_id , total_amount, description_title , description , photo )

             VALUES ('$user_id', '$amount', '$title', '$description' , '$imageurl')";

            echo $sql;
            if ($conn->query($sql) === TRUE) {
            header("Location: ../../src/index.php");
            exit();
            } else {
           echo "Error: " . $conn->error;
           }

           $conn->close();


        }
        //echo "✅ File uploaded successfully to Supabase Storage.";
    } else {
        echo "❌ Upload failed. Server responded with: $response";
    }
} else {
    echo "No file was uploaded.";
}


?>
