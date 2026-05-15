<?php
session_start();
include("db.php");

$admin_error = "";
$user_error = "";

// ADMIN LOGIN
if(isset($_POST['admin_login'])){

    $username = mysqli_real_escape_string($conn, $_POST['admin_username']);
    $password = mysqli_real_escape_string($conn, $_POST['admin_password']);

    $query = "SELECT * FROM userslogin WHERE username='$username' AND password='$password' AND role='admin'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $admin_error = "Invalid Admin Login!";
    }
}


// USER LOGIN
if(isset($_POST['user_login'])){

    $username = mysqli_real_escape_string($conn, $_POST['user_username']);
    $password = mysqli_real_escape_string($conn, $_POST['user_password']);

    $query = "SELECT * FROM userslogin WHERE username='$username' AND password='$password' AND role='user'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['user'] = $username;
        header("Location: faculty.php");
        exit();
    } else {
        $user_error = "Invalid User Login!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>University Login</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>

body{
    margin:0;
    font-family:'Poppins',sans-serif;
    background:linear-gradient(135deg,#ff416c,#ff4b2b);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.container{
    display:flex;
    gap:40px;
}

.login-box{
    background:white;
    padding:35px;
    width:330px;
    border-radius:15px;
    box-shadow:0 15px 35px rgba(0,0,0,0.3);
}

.login-box h2{
    text-align:center;
    margin-bottom:20px;
    color:#ff416c;
}

input{
    width:100%;
    padding:12px;
    margin:8px 0;
    border-radius:25px;
    border:1px solid #ccc;
    outline:none;
}

button{
    width:100%;
    padding:12px;
    margin-top:15px;
    border:none;
    border-radius:25px;
    background:#ff416c;
    color:white;
    font-weight:600;
    cursor:pointer;
}

button:hover{
    background:#e63950;
}

.error{
    color:red;
    font-size:14px;
    text-align:center;
}

</style>
</head>

<body>

<div class="container">

    <!-- ADMIN LOGIN -->
    <div class="login-box">
        <h2>🔐 Admin Login</h2>
        <?php if($admin_error!="") echo "<div class='error'>$admin_error</div>"; ?>
        <form method="POST">
            <input type="text" name="admin_username" placeholder="Username" required>
            <input type="password" name="admin_password" placeholder="Password" required>
            <button type="submit" name="admin_login">Login</button>
        </form>
    </div>


    <!-- USER LOGIN -->
    <div class="login-box">
        <h2>👤 User Login</h2>
        <?php if($user_error!="") echo "<div class='error'>$user_error</div>"; ?>
        <form method="POST">
            <input type="text" name="user_username" placeholder="Username" required>
            <input type="password" name="user_password" placeholder="Password" required>
            <button type="submit" name="user_login">Login</button>
        </form>
    </div>

</div>

</body>
</html>