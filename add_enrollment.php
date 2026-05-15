<?php
include 'config.php';

if(isset($_POST['save'])){
    $student_name = $_POST['student_name'];
    $course = $_POST['course'];
    $email = $_POST['email'];
    $enrollment_date = $_POST['enrollment_date'];

    mysqli_query($conn, "INSERT INTO enrollments 
        (student_name, course, email, enrollment_date) 
        VALUES 
        ('$student_name', '$course', '$email', '$enrollment_date')");

    header("Location: enrollment.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Enrollment</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:linear-gradient(135deg,#6dd5ed,#2193b0);
height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

/* CARD */

.container{
width:450px;
background:white;
padding:40px;
border-radius:15px;
box-shadow:0 15px 40px rgba(0,0,0,0.2);
}

.container h2{
text-align:center;
margin-bottom:25px;
color:#333;
}

/* FORM */

.form-group{
margin-bottom:18px;
}

label{
font-weight:500;
display:block;
margin-bottom:6px;
}

input{
width:100%;
padding:10px;
border-radius:8px;
border:1px solid #ccc;
outline:none;
transition:0.3s;
}

input:focus{
border-color:#2193b0;
box-shadow:0 0 5px rgba(33,147,176,0.4);
}

/* BUTTONS */

.btn{
width:100%;
padding:12px;
background:#2193b0;
border:none;
color:white;
font-size:16px;
border-radius:8px;
cursor:pointer;
transition:0.3s;
}

.btn:hover{
background:#176f85;
}

.back{
display:block;
text-align:center;
margin-top:15px;
text-decoration:none;
color:#2193b0;
font-weight:500;
}

.back:hover{
text-decoration:underline;
}

</style>

</head>

<body>

<div class="container">

<h2>Add Enrollment</h2>

<form method="POST">

<div class="form-group">
<label>Student Name</label>
<input type="text" name="student_name" required>
</div>

<div class="form-group">
<label>Course</label>
<input type="text" name="course" required>
</div>

<div class="form-group">
<label>Email</label>
<input type="email" name="email" required>
</div>

<div class="form-group">
<label>Enrollment Date</label>
<input type="date" name="enrollment_date" required>
</div>

<button type="submit" name="save" class="btn">Save Enrollment</button>

</form>

<a href="enrollment.php" class="back">← Back to Enrollments</a>

</div>

</body>
</html>