<?php
session_start();

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'techready';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $data = date('Y-m-d H:i:s');

    $sql = "INSERT INTO signup (Username, email, password, data) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error in statement preparation: " . $conn->error);
    }

    $stmt->bind_param("ssss", $username, $email, $password, $data);

    if ($stmt->execute()) {
        $resultMessage = 'Signup successful!';
        $status = 'success';
    } else {
        $resultMessage = 'Error in signup. Please try again.';
        $status = 'error';
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
header("Location: index.php");
?>
