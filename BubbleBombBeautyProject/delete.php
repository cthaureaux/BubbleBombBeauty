<html>
<head>
  <title>Bubble Bomb Beauty Delete Product</title>
  <style>
  div {
        text-align: center;
      }
  h1, h3, p  {
      text-align: center;
  }
  </style>
</head>
<body>
<h1>Bubble Bomb Beauty Delete Product</h1>
  <p><a href = "admin_homepage.php">Admin Homepage</a> |
  <a href = "search.html">Search Product</a> |
  <a href = "newproduct.html">Add Product</a> |
  <a href = "deleteproduct.html"> Delete Product</a> |
  <a href = "logout.php">Logout</a></p>
<?php
  // create short variable names
  $productID=$_POST['PID'];

  if (!$productID) {
     echo "You have not entered the required detail.<br />"
          ."Please go back and try again.";
     exit;
  }

    $productID = addslashes($productID);

$servername = "localhost";
$username = "bubble_bomb";
$password = "bubblebomb";

try {
  $db = new PDO("mysql:host=$servername;dbname=bubblebombbeauty1", $username, $password);
  // set the PDO error mode to exception
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

  $query = "delete from products where PID = ".$productID; 
  $result = $db->query($query);

  $num_results = $result->rowCount();

  if ($num_results == 0) {
      echo "That product doesn't exist.  Try Again.";
      echo "<br><a href = 'deleteproduct.html'>Back to Delete Product</a>";
  } 
  else {
    echo "<br><h3>Number of products deleted: ".$num_results."</h3>";
  }

  $db = null;
?>
</body>
</html>