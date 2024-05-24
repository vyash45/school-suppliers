<?php
// Connect to the database
// Connect to the database
$servername = "localhost";
    $username = "id21353074_nandu";
    $password = "Nandu@123";
    $dbname = "id21353074_appdb";

    // Create connection
    $db = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        header("location: login.html");
    } else {
        echo "Registration failed. Please try again.";
    }

    $stmt->close();
}

$db->close();
?>
