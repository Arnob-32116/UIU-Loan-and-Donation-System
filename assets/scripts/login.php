<?php

echo ini_get('open_basedir');

require __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(realpath('/home/arnob'));

///opt/lampp/htdocs/LoanProject/.env
print_r($_ENV); // Or: var_dump($_ENV);

$dotenv->load();
echo "HI";
print_r($_ENV); // Or: var_dump($_ENV);

$projectUrl = $_ENV['SUPABASE_URL'];
$apiKey     = $_ENV['SUPABASE_KEY'];
$tableName = "userinfo"; // Your table name

$email = $_POST['emails'];
$password = $_POST['passwords'];

// REST endpoint for your table
$url = "$projectUrl/rest/v1/$tableName?email=eq." .urlencode($email);

// Initialize cURL
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "apikey: $apiKey",
    "Authorization: Bearer $apiKey",
    "Content-Type: application/json"
]);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute GET request

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode === 200) {
    // Success! Decode JSON response

    $data = json_decode($response, true);
    if(count($data) > 0 ){
      echo "Exists";
    }else{
      echo "Doesn't Exists";
    }
} else {
    // Something went wrong
    echo "Error: HTTP status $httpCode\nResponse: $response";
}
?>