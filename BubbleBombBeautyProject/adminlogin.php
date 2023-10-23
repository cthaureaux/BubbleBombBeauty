<?php
// Initialize the session
session_start();
 
// redirect to login page if user is logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: admin_homepage.php");
    exit;
}
 
// connect to database using PDO
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
 
$emailAddress = "";
$password = "";
$email_error = "";
$password_error = "";
$login_error = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["emailAddress"]))){
        $username_error = "Please enter email.";
    } else{
        $emailAddress = trim($_POST["emailAddress"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_error = "Please enter password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate username and password
    if(empty($email_error) && empty($password_error)){
        // query select statement to select adminID, email and password from administrators table where the email entered matches the email stored in the database
        $query = "SELECT adminID, emailAddress, password FROM administrators WHERE emailAddress = :emailAddress";
        
        if($result = $db->prepare($query)){
            $result->bindParam(":emailAddress", $param_emailAddress, PDO::PARAM_STR);
            $param_emailAddress = trim($_POST["emailAddress"]);
            
            if($result->execute()){
                
                // Check is email exists, then check is password matches with hashed password stored in the database
                if($result->rowCount() == 1){                    
                    if($row = $result->fetch(PDO::FETCH_ASSOC)){
                        $adminID = $row["adminID"];
                        $emailAddress = $row["emailAddress"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            //start session
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["adminID"] = $adminID;
                            $_SESSION["emailAddress"] = $emailAddress;                            
                            
                            // Redirect user admin homepage if passwords and username match
                            header("location: admin_homepage.php");
                        } else{
                            $login_error = "Invalid username or password.";
                        }
                    }
                } else{
                    $login_error = "Invalid email or password.";
                }
            } else{
                echo "Something went wrong, please try again.";
            }

            // Close statement
            $result = null;
        }
    }
    
    // Close connection
    $db = null;
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <title> Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { 
            font: 14px sans-serif; }
        .container { 
            width: 900px; padding: 10px;
        }
        #footer {
            position:fixed;
            bottom:10px;
            left: 50%;
        }
        h2 {
            margin-bottom: 15px;
            margin-top: 15px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="p-3 mb-2 bg-light text-dark" align="center"><h2>Bubble Bomb Beauty Admin Login</h2></div>
    <div class="container">
        <p>Please enter you're account information to login</p>

        <?php
        // if there is a login error, display error message
        if(!empty($login_error)){
            echo '<div class="alert alert-danger">' . $login_error . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group row">
                <label class = "col-form-label col-sm-2">Email</label>
               <div class = "col-sm-10"> <input type="text" name="emailAddress" class="form-control <?php echo (!empty($email_error)) ? 'is-invalid' : ''; ?>" value="<?php echo $emailAddress; ?>">
                <span class="invalid-feedback"><?php echo $email_error; ?></span></div>
            </div>    
            <div class="form-group row">
                <label class = "col-form-label col-sm-2 ">Password</label>
                <div class = "col-sm-10"><input type="password" name="password" class="form-control <?php echo (!empty($password_error)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_error; ?></span></div>
            </div>
            <div class="form-group">
                <div class= "offset-sm-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" value="Login">
                    <input type="reset" class="btn btn-success" value="Clear">
                </div>
            </div>
        </form>
    </div>
    <footer id ="footer"><a href = "mailto: bubblebombbeauty@gmail.com">&copy; 2022 Bubble Bomb Beauty</a></footer>
</body>
</html>