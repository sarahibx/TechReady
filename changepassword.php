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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ChangePassword"])) {
    $username = $_POST["username"];
    $old_password = $_POST["old_password"];
    $new_password = $_POST["new_password"];
    $select_sql = "SELECT password FROM signup WHERE Username = ?";
    $select_stmt = $conn->prepare($select_sql);
    if ($select_stmt === false) {
        die('Error preparing select statement: ' . $conn->error);
    }

    $select_stmt->bind_param("s", $username);
    $select_stmt->execute();
    $select_stmt->bind_result($stored_password);
    $select_stmt->fetch();

    $select_stmt->close(); 

    if ($old_password === $stored_password) {
        $update_sql = "UPDATE signup SET password = ? WHERE Username = ?";
        $update_stmt = $conn->prepare($update_sql);

        if ($update_stmt === false) {
            die('Error preparing update statement: ' . $conn->error);
        }

        $update_stmt->bind_param("ss", $new_password, $username);
        if ($update_stmt->execute()) {
            $resultMessage = 'Password changed successfully!';
            $status = 'success';
            echo "<script>alert('{$resultMessage}'); window.location.href='index.php';</script>";
            exit;
        } else {
            $resultMessage = 'Error changing password. Please try again.';
            $status = 'error';
            echo "<script>alert('{$resultMessage}');</script>";
        }

        $update_stmt->close();
    } else {
        $resultMessage = 'Invalid username or old password';
        $status = 'error';
        echo "<script>alert('{$resultMessage}'); window.location.href='index.php';</script>";
        exit; 
    }
}

$conn->close();
?>
