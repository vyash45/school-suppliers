
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">

    <title>Your Website Title</title>
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
            </ul>
        </nav>
       
    </header>
 
    <div class="containerr">
        <!-- <img class="image" src="home_im.jpeg" alt="Image"> -->
        <div style="left:50%" class= "product" >
        <?php
        
    if (isset($_GET['name']) && isset($_GET['img']) && isset($_GET['price']) && isset($_GET['des'])) {
        $productName = $_GET['name'];
        $productDescription = $_GET['des'];
        $productPrice = $_GET['price'];
        $img = $_GET['img'];
        $pn =  array($productName,$productDescription, $productPrice, $img);
        
        $productNameJ=implode('~',$pn);
        $existingCookie = isset($_COOKIE['visitedProducts']) ? $_COOKIE['visitedProducts'] : '';
        $mostvisitedCookie = isset($_COOKIE['MostVisitedProducts']) ? $_COOKIE['MostVisitedProducts'] : '';
        $mostVisitedArray = explode('`', $mostvisitedCookie);

        $productsArray = explode('`', $existingCookie);
        $found=false;
        // removing already visited product and adding to the front
        foreach ($productsArray as $key=>$productt) {
            $product= explode('~',$productt);
            if(isset($product[0]) && isset($product[1]) && isset($product[2]) && isset($product[3]) ){
                if($product[0]== $productName){
                    unset($productsArray[$key]);
                }
            }
        }
        foreach ($mostVisitedArray as $key=>$mostproductt) {
            $product= explode('~',$mostproductt);
            if(isset($product[0]) && isset($product[1]) ){
                if($product[0]== $productName){
                    $found=true;
                    $product[1]= (int)$product[1]+1;
                    $mostVisitedArray[$key] = "$productName~$product[1]~$img~$productDescription~$productPrice";
                }
            }
        }
        if($found==false){
            array_push($mostVisitedArray, "$productName~1~$img~$productDescription~$productPrice");
        }
        $productsArray = array_values($productsArray);

        array_unshift($productsArray, $productNameJ);
        if (count($productsArray) > 5) {
            array_pop($productsArray);
        }
      
        

        // Set the cookie with the updated products array
        setcookie('visitedProducts', implode('`', $productsArray), strtotime('Fri, 31 Dec 9999 23:59:59 GMT'), '/');
        setcookie('MostVisitedProducts', implode('`', $mostVisitedArray), strtotime('Fri, 31 Dec 9999 23:59:59 GMT'), '/');




        echo '<div class="product">';
        echo '<img src="' . $img . '" alt="Product Image" width="150" height="150">';
        echo '<h2>' . $productName . '</h2>'; 
        echo '<p>Description: ' . urldecode($productDescription) . '</p>';
        echo '<p>Price: $' . $productPrice . '</p>';
      
        echo '</div>';
    } else {
        echo '<p>No product information found.</p>';
    }
    ?>
       
</div>
</div>
        
    </div>


    <!-- Rest of your webpage content goes here -->

</body>
</html>



