<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        body {
            font-family: "Open Sans", sans-serif;
      
            background : #00204a;
            overflow-x: hidden;
        }

        .user-list-box {
            background-color:white;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
            box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.15);
        }

        h1 {
            color:white ;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ffffff;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #00204a;
            color: #ffffff;
        }

        td {
            background-color: #ffffff;
            color : black;
        }

        button {
            background-color: black ;
            color: #ffffff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            margin-right: 5px;
        }

        button:hover {
            background-color: #007fa4;
        }
    </style>
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="dashboard-container">
        <h1>Admin Dashboard</h1>

        <?php
        session_start();

        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'techready';

        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['activate_user']) || isset($_POST['deactivate_user'])) {
                $userId = isset($_POST['username']) ? $_POST['username'] : '';
                $status = isset($_POST['activate_user']) ? 'yes' : 'No';
                $conn->query("UPDATE signup SET status = '$status' WHERE username = '$userId'");
            }
        }

        $result = $conn->query("SELECT * FROM signup");

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='user-list-box'>";
                echo "<h2>" . $row['username'] . "</h2>";
                echo "<table>";
                echo "<tr>";
                echo "<th>Email</th>";
                echo "<th>Signup Date</th>";
                echo "<th>Last Login</th>";
                echo "<th>Actions</th>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . (isset($row['email']) ? $row['email'] : 'N/A') . "</td>";
                echo "<td>" . (isset($row['data']) ? $row['data'] : 'N/A') . "</td>";
                echo "<td>" . (isset($row['logindate']) ? $row['logindate'] : 'N/A') . "</td>";
                echo "<td>" . (isset($row['status']) ? ($row['status'] == 'yes' ? 'Active' : 'Inactive') : 'N/A') . "</td>";
                echo "<td>";
                echo "<form method='post'>";
                echo "<input type='hidden' name='username' value='" . $row['username'] . "'>";
                echo "<button type='submit' name='activate_user'>Activate</button>";
                echo "<button type='submit' name='deactivate_user'>Deactivate</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
                echo "</table>";
                echo "</div>";
            }
        } else {
            echo "<p>No users found</p>";
        }
        ?>
    </div>
</body>

</html>
