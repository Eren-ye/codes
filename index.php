<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css1.css">
</head>

<body>
    <div class="container">
        <div class="title">
            Registration
        </div>
        <form action="index.php" method="post">
            <div class="user-details">
                <div class="inputbox">
                    <span class="details">Full Name</span>
                    <input type="text" name="name" placeholder="Enter your name" required>
                </div>
                <div class="inputbox">
                    <span class="details">Username</span>
                    <input type="text" name="username" placeholder="Enter your username" required>
                </div>
                <div class="inputbox">
                    <span class="details">Email</span>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="inputbox">
                    <span class="details">Phone Number</span>
                    <input type="number" name="phone" placeholder="Enter your number" required>
                </div>
                <div class="inputbox">
                    <span class="details">Password</span>
                    <input type="password" name="pass" placeholder="Enter your password" required>
                </div>
                <div class="inputbox">
                    <span class="details">Confirm Password</span>
                    <input type="password" name="confirmpass" placeholder="Confirm your password" required>
                </div>
            </div>
            <div class="gender-details">
                <h2>Gender</h2>
                <label><input type="radio" name="gender" value="male"> Male</label>
                <label><input type="radio" name="gender" value="female"> Female</label>
                <label><input type="radio" name="gender" value="others"> Prefer not to say</label>
            </div>

            <div class="button">
                <input type="submit" value="Register">
            </div>
        </form>
        <div class="login">
        Already have an account ?&nbsp;<a href="sign.html">Login </a>
        </div>
    </div>
   
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ser = "localhost";
    $user = "root";
    $pass = "";
    $db = "back";
    
    
    $con = new mysqli($ser, $user, $pass, $db);
    
    
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    
    
    $fullname = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['pass'];
    
    
    $check_email_query = "SELECT * FROM `reg` WHERE `Email` = '$email'";
    $check_result = $con->query($check_email_query);
    
    if ($check_result->num_rows > 0) {
        
        echo "Email '$email' is already registered. Please use a different email.";
    } else {
       
        $sql = "INSERT INTO `reg` (`Full Name`, `Username`, `Email`, `Phone Number`, `Password`) VALUES ('$fullname', '$username', '$email', '$phone', '$password')";
        
        if ($con->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
    
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<body>
   
</body>
</html>
