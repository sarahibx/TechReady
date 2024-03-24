<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "techready";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);
$code = $data['code'];

$sql = "INSERT INTO code_review (code) VALUES ('$code')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}

$conn->close();
?>
