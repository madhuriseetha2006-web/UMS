<?php
session_start();
include("db.php");

// ADMIN LOGIN
if(isset($_POST['admin_login'])){

    $username = $_POST['admin_username'];
    $password = $_POST['admin_password'];

    $query = "SELECT * FROM userslogin 
              WHERE username='$username' 
              AND password='$password' 
              AND role='admin'";

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid Admin Credentials');</script>";
    }
}

// USER LOGIN
if(isset($_POST['user_login'])){

    $username = $_POST['user_username'];
    $password = $_POST['user_password'];

    $query = "SELECT * FROM userslogin 
              WHERE username='$username' 
              AND password='$password' 
              AND role='user'";

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'user';
        header("Location: faculty.php");
        exit();
    } else {
        echo "<script>alert('Invalid User Credentials');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>University Login</title>
<style>
body{
    margin:0;
    font-family:Arial;
    background:linear-gradient(135deg,#667eea,#764ba2);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}
.container{
    display:flex;
    gap:40px;
}
.box{
    background:white;
    padding:35px;
    width:320px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.3);
}
h2{text-align:center;color:#764ba2;}
input{
    width:100%;
    padding:10px;
    margin:8px 0;
    border-radius:20px;
    border:1px solid #ccc;
}
button{
    width:100%;
    padding:10px;
    margin-top:10px;
    border:none;
    border-radius:20px;
    background:#764ba2;
    color:white;
    cursor:pointer;
}
button:hover{background:#5a3d91;}
</style>
</head>
<body>

<div class="container">

<div class="box">
<h2>Admin Login</h2>
<form method="POST">
<input type="text" name="admin_username" placeholder="Username" required>
<input type="password" name="admin_password" placeholder="Password" required>
<button type="submit" name="admin_login">Login</button>
</form>
</div>

<div class="box">
<h2>User Login</h2>
<form method="POST">
<input type="text" name="user_username" placeholder="Username" required>
<input type="password" name="user_password" placeholder="Password" required>
<button type="submit" name="user_login">Login</button>
</form>
</div>

</div>
</body>
</html>