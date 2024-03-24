<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you are using POST method to send the question ID
    $questionID = $_POST['questionID'];

    // Update the "Solved" status in the database
    $updateQuery = "UPDATE `flashcards` SET `Solved`='Yes' WHERE `ID`='$questionID'";
    
    if (mysqli_query($conn, $updateQuery)) {
        // The update was successful
        echo 'success';
    } else {
        // Failed to update the database
        echo 'failure';
    }
}
?>
