<?php
include 'db_connection.php';

$sql = "UPDATE `flashcards` SET `Solved` = 'No'";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "success"; // Send a success message
} else {
    echo "error: " . mysqli_error($conn); // Send an error message with details
}

mysqli_close($conn); // Close the database connection
?>
