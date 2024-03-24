<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "techready";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $university = $_POST['university'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $meetingType = $_POST['meetingType'];
    
    
    $onlinePlatform = ($meetingType === 'inPerson') ? '' : $_POST['onlinePlatform'];

    
    $officeLocationLink = 'https://www.google.com/maps/place/Beirut,+Lebanon';
    $webexLink = 'https://meet339.webex.com/meet/pr26310008610'; 
    $zoomLink = 'https://us04web.zoom.us/j/7976232455?pwd=VVBYb2VucXBQVytUdW5jQncwbXJYUT09'; 
    $googleMeetLink = 'https://meet.google.com/grg-hnzs-vbr'; 

    
    $meetingLink = '';
    if ($meetingType === 'inPerson') {
        $meetingLink = $officeLocationLink;
    } elseif ($meetingType === 'online') {
       
        if ($onlinePlatform === 'webex') {
            $meetingLink = $webexLink;
        } elseif ($onlinePlatform === 'zoom') {
            $meetingLink = $zoomLink;
        } elseif ($onlinePlatform === 'googleMeet') {
            $meetingLink = $googleMeetLink;
        }
    }

    
    $sql = "INSERT INTO interviewData (username, email, university, date_of_interview, time_of_interview, meeting_type, online_platform)
            VALUES ('$username', '$email', '$university', '$date', '$time', '$meetingType', '$onlinePlatform')";

if ($conn->query($sql) === TRUE) {
    echo '<div class="success-message">';
    echo '<h2>Interview scheduled successfully!</h2>';
    echo '<div class="details">';
    echo '<p>Date of Interview: <span>' . $date . '</span></p>';
    echo '<p>Time of Interview: <span>' . $time . '</span></p>';
    echo '<p>Meeting Type: <span>' . $meetingType . '</span></p>';

    
    if ($meetingType === 'inPerson') {
        echo '<p><a href="' . $officeLocationLink . '" target="_blank">Location: Office (Google Maps)</a></p>';
    } elseif ($meetingType === 'online') {
        echo '<p><a href="' . $meetingLink . '" target="_blank">Meeting Platform: ' . ucfirst($onlinePlatform) . '</a></p>';
    }

    echo '</div>'; 


    echo '<div class="go-back-button">';
    echo '<a href="interviews.html"><button>Go Back</button></a>';
    echo '</div>'; 

    echo '</div>'; 
} else {
    echo '<div class="error-message">';
    echo 'Error: ' . $sql . '<br>' . $conn->error;
    echo '</div>'; 
}

}
?>
