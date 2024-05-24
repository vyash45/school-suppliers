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
        .button-link {
    display: inline-block;
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

/* Style for the button on hover */
.button-link:hover {
    background-color: #2580b3;
}
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
 
    <div  >
        <!-- <img class="image" src="home_im.jpeg" alt="Image"> -->
        <div  >
        <h2>Our Products</h2>
        <a class="button-link" href='/schoolsupplies/visitedProducts.php'>Last Visited Products</a>
        <a class="button-link" href='/schoolsupplies/MostVisitedProducts.php'>Most Visited Products</a>

        <p>Explore our extensive product range, including:</p>
        <?php

$jsonFilePath = 'productsList.json';

if (file_exists($jsonFilePath) && is_readable($jsonFilePath)) {
    $jsonContent = file_get_contents($jsonFilePath);

    $products = json_decode($jsonContent, true);

    if ($products === null) {
        echo "Error decoding JSON.";
    } 
}


// Loop through the mocked product data and generate product cards
foreach ($products as $product) {
    echo '<a style="color:white" href="/schoolsupplies/product.php?name='. $product['product_name'] .'&img='. $product['img'] .'&des='. $product['product_description'] .'&price='. $product['product_price'] .'">';
    echo '<div class="product-card" >';
    echo '<img src="' . $product['img'] . '" alt="Product Image" width="150" height="150">';
    echo '<h2 class="product-title">' . $product['product_name'] . '</h2>';
    echo '<p class="product-description">' . $product['product_description'] . '</p>';
    echo '<p class="product-price">$' . $product['product_price'] . '</p>';
    echo '</div>';
    echo '</a>';
}
?>

</div>
        
    </div>


    <!-- Rest of your webpage content goes here -->

</body>
</html>



