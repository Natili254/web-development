<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <script src="https://kit.fontawesome.com/c49ae48620.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="wrapper">
    <form action="">
        <h1> Register</h1>
        <div class="input-box">
            <input type="email" placeholder="Email" required>
            <i class="fa-regular fa-envelope"></i>
        </div>
        <div class="input-box">
            <input type="password" placeholder="Enter Password" required>
            <i class="fa-solid fa-lock"></i>
        </div>
        <div class="input-box">
            <input type="password" placeholder=" Confirm Password" required>
            <i class="fa-solid fa-lock"></i>
        </div>
        <div class="input-box">
            <input type="text" placeholder=" UserName" required>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox">Remember Me</label>
        </div>
        <button type="submit" class="butn">Register</button>
        <a href="Login.html">Back</a>

        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: poppins,sans-serif;
            }
            body{
                display: flex;justify-content: center;
                align-items: center;
                min-height: 100vh;
                background: url("lgnb.jpeg");
                background-size: cover;
                background-position: center;
            }
            .wrapper{
                width: 450px;
                background: transparent;
                border: 2px solid rgba(255, 255,255, .2);
                backdrop-filter: blur(20px);
                box-shadow: 0 0 10px rgba(0,0,0,.2);
                color: white;
                border-radius: 15px;
                padding: 30px 40px;

            }
            .wrapper h1{
                font-size: 40px;
                text-align: center;
            }
            .wrapper .input-box{
                width: 100%;
                height: 50px;
                margin: 30px 0;
                position: relative;
            }
            .input-box input{
                width: 100%;
                height: 50px;
                background: transparent;
                border: none;
                outline: none;
                border: 2px solid rgba(255, 255, 255, .2);
                border-radius: 40px;
                font-size: 16px;
                color: white;
                padding: 20px 45px 20px 20px;
            }
            .input-box input::placeholder{
                color: #e6e1e5;
            }
            .input-box i{
                position: absolute;
                right: 20px;
                top: 30px;
                transform: translateY(-50%);
                font-size: 20px;
            }
            .wrapper .remember-forgot{
                display: flex;
                justify-content: space-between;
                font-size: 15px;
            }
            .remember-forgot label input{
                accent-color: white;
                margin-right: 3px;
            }
            .remember-forgot a{
                color: white;
                text-decoration: none;
            }
            .remember-forgot a:hover{
                text-decoration: underline;
            }
            .wrapper .butn{
                width: 100%;
                height: 100%;
                background: white;
                border: none;
                outline: none;
                border-radius: 40px;
                box-shadow: 0 0 10px rgba(0,0,0,.1);
                cursor: pointer;
                font-size: 16px;
                color: gray;
                font-weight: 600;
            }
            .wrapper .register-link{
                font-size: 14px;
                text-align: center;
                margin: 20px 0 15px;
            }
            .register-link p a{
                color: white;
                text-decoration: none;
                font-weight: 600;
            }
            .register-link p a:hover{
                text-decoration: underline;
            }

        </style>
    </form>
</div>

</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm_password'];
$username = $_POST['username'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$password = trim($password);
$username = htmlspecialchars($username);

// Check if passwords match
if ($password !== $confirmPassword) {
echo "Passwords do not match.";
exit;
}

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Database connection (you need to fill in your database credentials)
$servername = "MySQL:3306";
$username = "root";
$password = "Natili.65";
$dbname = "websitelogin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO users (email, password, username) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $email, $hashedPassword, $username);

// Execute the statement
if ($stmt->execute()) {
echo "Registration successful!";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$stmt->close();
$conn->close();
}
?>
