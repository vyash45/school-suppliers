<?php
session_start();

// Check if$_SESSION["username"] the user is logged in (you can modify this logic based on your authentication system)
if (isset($_SESSION['username'])) {
    // User is logged in
    $welcomeMessage = "Welcome, " . $_SESSION['username'] . "!";
    $loginButton = '<a href="logout.php">Logout</a>';
} else {
    // User is not logged in
    $welcomeMessage = "";
    $loginButton = '<a href="login.html">Login</a>';
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">

    <title>School Supplies</title>
    <style>
        
    </style>
</head>
<body>
    <header>
        <div class="logo"><img src="icon.png"></img> </div>
        <nav>
            <ul>
            <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="news.php">News</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="companyUsers.php">CompanyUsers</a></li>

    <?php
    if (isset($_SESSION['username']) && $_SESSION['username'] === 'admin') {
        // Display the "Users" link only if the user is logged in as admin
        echo '<li><a href="users.php">Users</a></li>';
        echo '<li><a href="user.php">UsersInfo</a></li>';
    }
    ?>


                <li id="login-button">
         <?php echo $welcomeMessage, $loginButton; ?>
    </li>
            </ul>
        </nav>

    </header>
    <div class="containerr-contact"
        >
        <div class="center-container" style="color:white">
            <h1>Contacts</h1>
            <?php
            //read contacts from text files
            $contacts = file("contacts.txt", FILE_IGNORE_NEW_LINES);
            if ($contacts === false) {
                echo "Error reading file.";
            } else {
                echo "<ul>";
                foreach ($contacts as $contact) {
                    list($name, $email, $role) = explode(", ", $contact);
                    echo "<li><strong>Name:</strong> $name<br><strong>Email:</strong> $email<br><strong>Role:</strong> $role </li>";
                }
                echo "</ul>";
            }
            ?>
        </div>
    </div>


    </div>



    <!-- Rest of your webpage content goes here -->

</body>

</html>