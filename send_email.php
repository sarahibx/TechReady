<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $to = $_POST['email'];

  $subject = 'Interview Scheduled Successfully';
  $message = "
    <p>Dear ".$_POST['username'].",</p>
    <p>Your interview has been scheduled for ".$_POST['date']." at ".$_POST['time'].".</p>
    <p>Meeting Type: ".$_POST['meetingType']."</p>
    <p>Platform: ".$_POST['onlinePlatform']."</p>
    <p>Thank you!</p>
  ";

  $headers = [
    'MIME-Version: 1.0',
    'Content-type: text/html; charset=utf-8',
    'From: Robeel Mili <robeelmili147@gmail.com>' 
  ];

  if (mail($to, $subject, $message, implode("\r\n", $headers))) {
    http_response_code(200);
  } else {
    http_response_code(500);
  }
} else {
  http_response_code(405);
}
?>
