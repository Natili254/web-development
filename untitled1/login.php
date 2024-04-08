<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <script src="https://kit.fontawesome.com/c49ae48620.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="wrapper">
    <form method="post" action="login.php">
        <h1> Login</h1>
        <div class="input-box">
            <input type="text" placeholder="username" name="username" required>
            <i class="fa-solid fa-user"></i>
        </div>
        <div class="input-box">
            <input type="password" placeholder="Password" name="password" required>
            <i class="fa-solid fa-lock"></i>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox">Remember Me</label>
            <a href="#">Forgot Password?</a>
        </div>
        <button type="submit" class="loginbtn">Login</button>
        <div class="register-link">
            <p>Don't have an Account?<a href="register.html">Register</a> </p>
        </div>
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
$conn=mysqli_connect("localhost","root",""websitelogin);
if(!$conn){
    die("Connection failed" .mysqli_connect_error());
    }
if(isset($_POST['loginbtn'])){

    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $username=mysqli_real_escape_string($conn,$_POST['password']);
    $sql="SELECT * FROM logindetails WHERE username='$username'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $resultPassword = $row['password'];
        if(password_verify($password,$resultPassword)) {
            header('Location:home.html');
            exit;
        }else{
            echo"<script>alert('Incorrect Password');</script>";
        }
        }else{
        echo"<script>alert('User does not exist');</script>";
        echo"<script>alert('User does not exist');</script>";
        }
    }
mysqli_close($conn);

?>