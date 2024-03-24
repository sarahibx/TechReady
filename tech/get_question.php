<?php
include 'db_connection.php';

// Retrieve the next unsolved technical question from the database
$query = "SELECT * FROM `flashcards` WHERE `Solved`='No'  LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
} else {
    echo json_encode(null);
}
?>
