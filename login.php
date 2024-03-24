<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'techready';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM signup WHERE username=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($username === "admin" && $password === "admin") {
        header("Location: Admin.php");
    }

    if ($result === false) {
        die("Error: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $userRow = $result->fetch_assoc();
        $status = $userRow['status'];
        $data = $userRow['data'];

        if ($status == "No") {
            echo '<script>alert("Your Account is deactivated. Please contact the administrator.");</script>';
            exit;
        }

        if ($data != 0) {
            $loginDate = date("Y-m-d H:i:s");
            $updateLoginDateSql = "UPDATE signup SET logindate='$loginDate' WHERE username='$username'";
            $conn->query($updateLoginDateSql);

            echo "Login successful. Welcome, $username!";
        } else {
            echo '<script>alert("Your Account has no data. Please contact the administrator.");</script>';
        }
    } else {
        echo '<script>alert("Invalid username or password.");</script>';
    }

    $stmt->close();
}

$conn->close();
?>
