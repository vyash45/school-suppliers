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
 
    <div class="containerr-news">
        <!-- <img class="image" src="home_im.jpeg" alt="Image"> -->
        <div class="center-container" style="font-size :28px; color:white;">
        <?php
function curlRequest($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}
$urlA = 'https://abhinandu.000webhostapp.com/curl/userdata.php';
$dataA = curlRequest($urlA);
$urlB = 'https://maheedhar.000webhostapp.com/curl/userdata.php'; 
$dataB = curlRequest($urlB);
$urlC = 'https://praneethreddypenugonda.000webhostapp.com/curl/userdata.php'; 
$dataC = curlRequest($urlC);

echo '<p>Data From company A</p>';
print_r($dataA);
echo '<p>Data From company B</p>';
print_r($dataB);
echo '<p>Data From company C</p>';
print_r($dataC);

?>
    </div>

  
    </div>


    <!-- Rest of your webpage content goes here -->

</body>
</html>

