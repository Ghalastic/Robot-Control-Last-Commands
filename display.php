<?php
// Database configuration
$servername = "localhost";
$username = "root";  // Default username for XAMPP
$password = "";      // Default password for XAMPP
$dbname = "robot_control3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to get the last command
$sql = "SELECT command FROM commands ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

// Check if there is a result
if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();
    $lastCommand = $row['command'];
} else {
    $lastCommand = "No commands yet!";
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Last Command</title>
    <meta http-equiv="refresh" content="5"> <!-- Auto-refresh every 5 seconds -->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <style>
        body {
            font-family: 'Times New Roman';
            text-align: center;
            margin-top: 50px;
        }
        .container {
            display: inline-block;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .command {
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="command"><?php echo htmlspecialchars($lastCommand); ?></div>
    </div>
</body>
</html>
