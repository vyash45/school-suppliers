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
 
    <div class="container " style="background-image: url('ABOUT.jpg'); color:white; background-repeat: no-repeat;background-size: cover;">
        <!-- <img class="image" src="home_im.jpeg" alt="Image"> -->
        <section >
  <h2>Our Mission</h2>
  <p>At School Supplies, our mission is to support the pursuit of knowledge by offering a wide range of school supplies and educational materials. We understand that the right tools can inspire and empower both students and teachers to excel in their educational journey.</p>
</section>

<section >
  <h2>Our Commitment</h2>
  <ul>
    <li><strong>Quality:</strong> We take pride in offering only the finest school supplies. Our products are sourced from trusted manufacturers, ensuring durability and reliability.</li>
    <li><strong>Variety:</strong> We understand that each student's needs are unique. That's why we offer a diverse range of products, catering to all age groups and educational levels.</li>
    <li><strong>Affordability:</strong> Education should be accessible to all. We strive to keep our prices competitive and offer value for your investment.</li>
    <li><strong>Customer Satisfaction:</strong> Your satisfaction is our priority. Our customer service team is ready to assist you, and we're committed to addressing any concerns promptly.</li>
  </ul>
</section>
        
    </div>


    <!-- Rest of your webpage content goes here -->

</body>
</html>



