<?php
include("db.php");

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM courses WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

$course_name = $_POST['course_name'];
$course_code = $_POST['course_code'];
$duration = $_POST['duration'];
$fee = $_POST['fee'];

$query = "UPDATE courses 
SET course_name='$course_name',
course_code='$course_code',
duration='$duration',
fee='$fee'
WHERE id=$id";

mysqli_query($conn,$query);

header("Location: view_courses.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Course</title>

<style>

body{
font-family:Arial;
background:#f4f6f9;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.container{
background:white;
padding:30px;
width:400px;
border-radius:10px;
box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

h2{
text-align:center;
margin-bottom:20px;
}

input{
width:100%;
padding:10px;
margin:8px 0;
border:1px solid #ccc;
border-radius:6px;
}

button{
width:100%;
padding:10px;
background:#1e90ff;
color:white;
border:none;
border-radius:6px;
cursor:pointer;
}

button:hover{
background:#187bcd;
}

.back{
display:block;
text-align:center;
margin-top:15px;
text-decoration:none;
}

</style>
</head>

<body>

<div class="container">

<h2>Edit Course</h2>

<form method="post">

<input type="text" name="course_name" value="<?php echo $row['course_name']; ?>" required>

<input type="text" name="course_code" value="<?php echo $row['course_code']; ?>" required>

<input type="text" name="duration" value="<?php echo $row['duration']; ?>" required>

<input type="number" name="fee" value="<?php echo $row['fee']; ?>" required>

<button type="submit" name="update">Update Course</button>

</form>

<a href="view_courses.php" class="back">← Back</a>

</div>

</body>
</html>