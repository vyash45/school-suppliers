<?php

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
    $password = $_POST["password"];

    $stmt = $db->prepare("SELECT username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($dbUsername, $dbPassword);

    if ($stmt->fetch() && password_verify($password, $dbPassword)) {
        session_start();
        $_SESSION["username"] = $dbUsername;
        
        header("location: index.php");
    } else {
        echo "Login failed. Please check your credentials.";
    }

    $stmt->close();
}

$db->close();
?>
