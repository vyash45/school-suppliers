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
        /* Style for the button */
        .clearCookies {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        /* Style for the button on hover */
        .clearCookies:hover {
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
        <h2>Top Five Most Visited Products</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <button type="submit" name="clearCookies" class="clearCookies">Clear All</button>
    </form>
        <?php
        if (isset($_POST['clearCookies'])) {
            setcookie('MostVisitedProducts', '', time() - 3600, '/'); // Expire the cookie
            header('Location: ' . $_SERVER['PHP_SELF']); // Reload the page
            exit();
        }

$mostVisitedProducts = isset($_COOKIE['MostVisitedProducts']) ? explode('`', $_COOKIE['MostVisitedProducts']) : [];
usort($mostVisitedProducts, function ($a, $b) {
    // Split the elements by ~ and extract the count part
    if(isset($a[0]) && isset($a[1])){
        $countA = (int)explode("~", $a)[1];
        $countB = (int)explode("~", $b)[1];
        return $countA < $countB;
    }
    

    // Compare the count values
    
});

for ($i = 0; $i <= 5 && $i < count($mostVisitedProducts); $i++) {
    $product= explode('~',$mostVisitedProducts[$i]);
    
    if(isset($product[0]) && isset($product[1]) ){
        echo '<a style="color:white" href="/schoolsupplies/product.php?name='. $product[0] .'&img='. $product[2] .'&des='. $product[3] .'&price='. $product[4] .'">';
        echo '<div class="product-card" >';
        echo '<img src="' . urldecode($product[2]) . '" alt="Product Image" width="150" height="150">';
        echo '<h2 class="product-title">' . $product[0] . '</h2>';
        echo '<p class="product-description">' . $product[3] . '</p>';
        echo '<p class="product-price">$' . $product[4] . '</p>';
        echo '</div>';
        echo '</a>';
    }
}
// Loop through the mocked product data and generate product cards
// foreach ($mostVisitedProducts as $productt) {
//     $product= explode('~',$productt);
    
//     if(isset($product[0]) && isset($product[1]) ){
//         echo '<a style="color:white" href="/schoolsupplies/product.php?name='. $product[0] .'&img='. $product[2] .'&des='. $product[3] .'&price='. $product[4] .'">';
//         echo '<div class="product-card" >';
//         echo '<img src="' . urldecode($product[2]) . '" alt="Product Image" width="150" height="150">';
//         echo '<h2 class="product-title">' . $product[0] . '</h2>';
//         echo '<p class="product-description">' . $product[3] . '</p>';
//         echo '<p class="product-price">$' . $product[4] . '</p>';
//         echo '</div>';
//         echo '</a>';
//     }
   
// }
?>

</div>
        
    </div>


    <!-- Rest of your webpage content goes here -->

</body>
</html>



