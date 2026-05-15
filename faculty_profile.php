<?php
session_start();
include("db.php");

/* LOGIN CHECK */

if(!isset($_SESSION['user']))
{
header("Location: login.php");
exit();
}

/* GET FACULTY DATA */

$id = $_GET['id'];
$result = mysqli_query($conn,"SELECT * FROM faculty WHERE id=$id");
$row = mysqli_fetch_assoc($result);

/* RANDOM PROFILE IMAGES */

$randomImages = array(

"https://images.unsplash.com/photo-1573496359142-b8d87734a5a2",
"https://images.unsplash.com/photo-1607746882042-944635dfe10e",
"https://images.unsplash.com/photo-1582750433449-648ed127bb54",
"https://images.unsplash.com/photo-1544005313-94ddf0286df2",
"https://images.unsplash.com/photo-1502767089025-6572583495b4",
"https://images.unsplash.com/photo-1603415526960-f7e0328c63b1",
"https://images.unsplash.com/photo-1595152772835-219674b2a8a6",
"https://images.unsplash.com/photo-1527980965255-d3b416303d12",
"https://images.unsplash.com/photo-1547425260-76bcadfb4f2c",
"https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d",
"https://images.unsplash.com/photo-1494790108377-be9c29b29330",
"https://images.unsplash.com/photo-1534528741775-53994a69daeb",
"https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e",
"https://images.unsplash.com/photo-1535713875002-d1d0cf377fde",
"https://images.unsplash.com/photo-1522075469751-3a6694fb2f61",
"https://images.unsplash.com/photo-1517841905240-472988babdf9",
"https://images.unsplash.com/photo-1542909168-82c3e7fdca5c"

);

/* PICK RANDOM IMAGE */

$profilePic = $randomImages[array_rand($randomImages)];

?>

<!DOCTYPE html>
<html>
<head>
<title>Faculty Profile</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:linear-gradient(120deg,#dfe9f3,#ffffff);
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

/* CARD */

.profile-card{
width:600px;
background:white;
border-radius:20px;
box-shadow:0 15px 40px rgba(0,0,0,0.15);
padding:40px;
text-align:center;
transition:0.3s;
}

.profile-card:hover{
transform:translateY(-5px);
}

/* IMAGE */

.profile-img{
width:160px;
height:160px;
border-radius:50%;
object-fit:cover;
border:6px solid #4facfe;
margin-bottom:20px;
}

/* NAME */

.profile-card h2{
font-size:28px;
color:#333;
margin-bottom:10px;
}

/* DETAILS */

.details{
text-align:left;
margin-top:25px;
}

.details p{
padding:10px 0;
border-bottom:1px solid #eee;
font-size:16px;
}

.details strong{
color:#4facfe;
}

/* BUTTONS */

.buttons{
margin-top:30px;
display:flex;
justify-content:space-between;
}

.btn{
text-decoration:none;
padding:10px 25px;
border-radius:25px;
font-weight:600;
transition:0.3s;
}

.back{
background:#6c757d;
color:white;
}

.back:hover{
background:#545b62;
}

.dashboard{
background:#4facfe;
color:white;
}

.dashboard:hover{
background:#2a8df5;
}

</style>

</head>

<body>

<div class="profile-card">

<img src="<?php echo $profilePic; ?>" class="profile-img">

<h2><?php echo $row['name']; ?></h2>

<div class="details">

<p><strong>Course :</strong> <?php echo $row['course']; ?></p>

<p><strong>Department :</strong> <?php echo $row['department']; ?></p>

<p><strong>Email :</strong> <?php echo $row['email']; ?></p>

<p><strong>Phone :</strong> <?php echo $row['phone']; ?></p>

<p><strong>Designation :</strong> <?php echo $row['designation']; ?></p>

<p><strong>Experience :</strong> <?php echo $row['experience']; ?></p>

</div>

<div class="buttons">

<a href="faculty.php" class="btn back">← Back to Faculty</a>

<a href="dashboard.php" class="btn dashboard">Dashboard</a>

</div>

</div>

</body>
</html>