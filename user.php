<?php
// Connect to the database

    
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
       
    </header>
 
        <!-- <img class="image" src="home_im.jpeg" alt="Image"> -->
    <div style="display:flex;justify-content: space-between;
    align-items: center;">
         <div style="position: relative;padding-left:70px; color:white; font-size: large;">
        <form action="adduser.php" method="post">
            <h2>Add User</h2>
            First Name: <input type="text" name="firstname" required><br><br>

            Last Name: <input type="text" name="lastname" required><br><br>
            Email: <input type="text" name="email" required><br><br>
            Address: <input type="text" name="address" required><br><br>
            Home Phone Number: <input type="text" name="home" required><br><br>
            Cell Phone Number: <input type="text" name="cell" required><br><br>
            <input type="submit" value="Add User"><br>
        </form>
             
    <?php        
     if(isset($_GET['success']) && $_GET['success']==='true'){
         echo '<p style="color:green">User Added Successfully</p>';
     }
     if(isset($_GET['success']) && $_GET['success']==='false'){
         echo '<p style="color:red">User Added Failed</p>';
     }
     
     ?>
     </div>  

        <!-- <img class="image" src="home_im.jpeg" alt="Image"> -->
     <div style="position: relative; color:white;padding-right:270px;  font-size: large;">
        <form action="" method="post">
            <h2>Search Users</h2>
            Search Text: <input type="text" name="search" required><br><br>
            <input type="submit" value="Search"><br>
        </form>
         <?php
// Establish a database connection (assuming $db holds your connection)

if(isset($_POST['search'])) {
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
    $search = $_POST['search'];

    // Search query for name, email, and phone
    $sql = "SELECT * FROM user WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%' OR email LIKE '%$search%' OR cellphone LIKE '%$search%' OR homephone LIKE '%$search%' ";
    
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        
        echo "<table style='border-collapse: collapse; width: 100%;'>";
        echo "<tr style='border: 1px solid #000;'>";
        echo "<th style='border: 1px solid #000; padding: 8px;'>First Name</th>";
        echo "<th style='border: 1px solid #000; padding: 8px;'>Last Name</th>";
        echo "<th style='border: 1px solid #000; padding: 8px;'>Email</th>";
        echo "<th style='border: 1px solid #000; padding: 8px;'>Home Phone</th>";
        echo "<th style='border: 1px solid #000; padding: 8px;'>Cell Phone</th>";
        echo "</tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr style='border: 1px solid #000;'>";
            echo "<td style='border: 1px solid #000; padding: 8px;'>" . $row["firstname"] . "</td>";
            echo "<td style='border: 1px solid #000; padding: 8px;'>" . $row["lastname"] . "</td>";
            echo "<td style='border: 1px solid #000; padding: 8px;'>" . $row["email"] . "</td>";
            echo "<td style='border: 1px solid #000; padding: 8px;'>" . $row["homephone"] . "</td>";
            echo "<td style='border: 1px solid #000; padding: 8px;'>" . $row["cellphone"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        // // Output data of each row
        // while($row = $result->fetch_assoc()) {
        //     echo "FirstName: " . $row["firstname"]. " - LastName: ".$row["lastname"]." - Email: " . $row["email"]. " - Home Phone: " . $row["homephone"]. " Cell Phone: " . $row["cellphone"]. "<br>";
        // }
    } else {
        echo "No results found";
    }
}
?>
     </div>  
    </div>
   

    
    


    <!-- Rest of your webpage content goes here -->

</body>
</html>

