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
        <article class="news-article">
            <h2>Exciting New Products Now Available!</h2>
            <p>We are thrilled to announce the arrival of our latest product line, featuring innovative school supplies that will make learning even more engaging. Explore our new arrivals today!</p>
        </article>

        <article class="news-article">
            <h2>Back-to-School Sale Event</h2>
            <p>Get ready for the new school year with our amazing Back-to-School Sale. Enjoy significant discounts on a wide range of school supplies and backpacks. Don't miss out!</p>
        </article>

        <article class="news-article">
            <h2>Supporting Education Initiatives</h2>
            <p>School Supplies Co. is proud to announce its partnership with local educational initiatives. We're committed to providing resources and support to schools and students in need.</p>
        </article>
    </div>

  
    </div>


    <!-- Rest of your webpage content goes here -->

</body>
</html>

