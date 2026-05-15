<?php
$conn = mysqli_connect("localhost", "root", "", "university_management");

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course_id = $_POST['course_id'];

    mysqli_query($conn, "INSERT INTO students (course_id, name, email) 
    VALUES ('$course_id', '$name', '$email')");

    echo "<script>alert('Student Added Successfully');</script>";
}

$courses = mysqli_query($conn, "SELECT * FROM courses");
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Student</title>

<style>

body{
margin:0;
font-family:Arial, sans-serif;
background:linear-gradient(to right,#36d1dc,#5b86e5);
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.form-box{
background:white;
padding:40px;
width:400px;
border-radius:15px;
box-shadow:0 15px 30px rgba(0,0,0,0.3);
}

.form-box h2{
text-align:center;
margin-bottom:25px;
color:#5b86e5;
}

.input-group{
margin-bottom:20px;
}

.input-group label{
font-weight:bold;
}

.input-group input,
.input-group select{
width:100%;
padding:10px;
margin-top:5px;
border-radius:8px;
border:1px solid #ccc;
}

.btn{
width:100%;
padding:12px;
background:#5b86e5;
color:white;
border:none;
border-radius:25px;
font-size:16px;
cursor:pointer;
margin-top:10px;
}

.btn:hover{
background:#36d1dc;
}

/* BUTTON LINKS */

.link-btn{
display:block;
text-align:center;
margin-top:12px;
padding:10px;
border-radius:25px;
text-decoration:none;
font-weight:bold;
}

.dashboard{
background:#6c757d;
color:white;
}

.dashboard:hover{
background:#555;
}

.view{
background:#28a745;
color:white;
}

.view:hover{
background:#218838;
}

</style>
</head>

<body>

<div class="form-box">

<h2>🎓 Add New Student</h2>

<form method="POST">

<div class="input-group">
<label>Student Name</label>
<input type="text" name="name" required>
</div>

<div class="input-group">
<label>Email</label>
<input type="email" name="email" required>
</div>

<div class="input-group">
<label>Select Course</label>
<select name="course_id" required>
<option value="">-- Select Course --</option>

<?php while($row = mysqli_fetch_assoc($courses)) { ?>
<option value="<?php echo $row['id']; ?>">
<?php echo $row['course_name']; ?>
</option>
<?php } ?>

</select>
</div>

<button type="submit" name="submit" class="btn">Add Student</button>

</form>

<a href="view_students.php" class="link-btn view">📋 View Students</a>

<a href="dashboard.php" class="link-btn dashboard">⬅ Back to Dashboard</a>

</div>

</body>
</html>