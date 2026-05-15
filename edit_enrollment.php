<?php
include 'config.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM enrollments WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $student_name = $_POST['student_name'];
    $course = $_POST['course'];
    $email = $_POST['email'];
    $enrollment_date = $_POST['enrollment_date'];

    mysqli_query($conn, "UPDATE enrollments SET 
        student_name='$student_name',
        course='$course',
        email='$email',
        enrollment_date='$enrollment_date'
        WHERE id=$id");

    header("Location: enrollment.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Enrollment</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:linear-gradient(135deg,#ffecd2,#fcb69f);
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
border-color:#ff7e5f;
box-shadow:0 0 5px rgba(255,126,95,0.4);
}

/* BUTTON */

.btn{
width:100%;
padding:12px;
background:#ff7e5f;
border:none;
color:white;
font-size:16px;
border-radius:8px;
cursor:pointer;
transition:0.3s;
}

.btn:hover{
background:#e96443;
}

/* BACK */

.back{
display:block;
text-align:center;
margin-top:15px;
text-decoration:none;
color:#ff7e5f;
font-weight:500;
}

.back:hover{
text-decoration:underline;
}

</style>

</head>

<body>

<div class="container">

<h2>Edit Enrollment</h2>

<form method="POST">

<div class="form-group">
<label>Student Name</label>
<input type="text" name="student_name" value="<?php echo $row['student_name']; ?>" required>
</div>

<div class="form-group">
<label>Course</label>
<input type="text" name="course" value="<?php echo $row['course']; ?>" required>
</div>

<div class="form-group">
<label>Email</label>
<input type="email" name="email" value="<?php echo $row['email']; ?>" required>
</div>

<div class="form-group">
<label>Enrollment Date</label>
<input type="date" name="enrollment_date" value="<?php echo $row['enrollment_date']; ?>" required>
</div>

<button type="submit" name="update" class="btn">Update Enrollment</button>

</form>

<a href="enrollment.php" class="back">← Back to Enrollments</a>

</div>

</body>
</html>