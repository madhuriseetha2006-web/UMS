<?php
session_start();
include 'config.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = mysqli_query($conn, 
        "SELECT * FROM userslogin 
         WHERE email='$email' 
         AND password='$password' 
         AND role='user'");

    if(mysqli_num_rows($query) > 0){
        $_SESSION['user'] = $email;
        header("Location: user_dashboard.php");
    } else {
        echo "<script>alert('Invalid User Credentials');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>User Login</title>
<style>
body{
    font-family: Arial;
    background: linear-gradient(135deg,#ff7e5f,#feb47b);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}
.box{
    background:white;
    padding:40px;
    border-radius:10px;
    width:300px;
}
input{
    width:100%;
    padding:10px;
    margin:10px 0;
}
button{
    width:100%;
    padding:10px;
    background:#ff7e5f;
    color:white;
    border:none;
}
</style>
</head>
<body>
<div class="box">
<h2>User Login</h2>
<form method="POST">
<input type="email" name="email" placeholder="Enter Email" required>
<input type="password" name="password" placeholder="Enter Password" required>
<button type="submit" name="login">Login</button>
</form>
</div>
</body>
</html>