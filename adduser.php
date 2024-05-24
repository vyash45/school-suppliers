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
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $home = $_POST["home"];
    $cell = $_POST["cell"];

    $stmt = $db->prepare("INSERT INTO user (firstname, lastname, email, address, homephone, cellphone) VALUES (?, ?, ?, ?, ? ,?)");
    $stmt->bind_param("ssssss", $firstname, $lastname, $email,$address,$home,$cell);

    if ($stmt->execute()) {
        header("Location: " . "/schoolsupplies/user.php?success=true");
   
    } else {
        header("Location: " . "/schoolsupplies/user.php?success=false");

    }

    $stmt->close();
}

$db->close();
?>
