<?php
include 'db_connection.php';

$currentQuestionID = isset($_GET['currentQuestionID']) ? $_GET['currentQuestionID'] : 0;

// Retrieve the previous unsolved technical question from the database
$query = "SELECT * FROM `hr-flashcards` WHERE `Solved`='No' AND `ID` < $currentQuestionID ORDER BY `ID` DESC LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
} else {
    echo json_encode(null);
}
?>