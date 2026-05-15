<?php
session_start();
include "config.php";

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

if(isset($_POST['submit'])){
    $name = $_POST['course_name'];
    $code = $_POST['course_code'];
    $duration = $_POST['duration'];
    $fee = $_POST['fee'];

    mysqli_query($conn, "INSERT INTO courses(course_name, course_code, duration, fee)
    VALUES('$name','$code','$duration','$fee')");

    header("Location: view_courses.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Course</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
<div class="card shadow-lg">
<div class="card-header bg-success text-white">
<h4>Add Course</h4>
</div>
<div class="card-body">

<form method="POST">
<div class="mb-3">
<label>Course Name</label>
<input type="text" name="course_name" class="form-control" required>
</div>

<div class="mb-3">
<label>Course Code</label>
<input type="text" name="course_code" class="form-control" required>
</div>

<div class="mb-3">
<label>Duration</label>
<input type="text" name="duration" class="form-control" required>
</div>

<div class="mb-3">
<label>Fee</label>
<input type="number" name="fee" class="form-control" required>
</div>

<button type="submit" name="submit" class="btn btn-success">Add Course</button>
<a href="dashboard.php" class="btn btn-secondary">Back</a>
<a href="view_courses.php" class="btn btn-secondary">view_courses</a>

</form>

</div>
</div>
</div>

</body>
</html>