<?php
session_start();
include "config.php";

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM courses");
?>

<!DOCTYPE html>
<html>
<head>
<title>View Courses</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
<div class="card shadow-lg">
<div class="card-header bg-primary text-white d-flex justify-content-between">
<h4>Courses List</h4>
<a href="dashboard.php" class="btn btn-light btn-sm">Back to Dashboard</a>
</div>

<div class="card-body">

<a href="add_course.php" class="btn btn-success mb-3">+ Add Course</a>

<table class="table table-bordered table-hover">
<thead class="table-dark">
<tr>
<th>ID</th>
<th>Name</th>
<th>Code</th>
<th>Duration</th>
<th>Fee</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php while($row = mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['course_name']; ?></td>
<td><?php echo $row['course_code']; ?></td>
<td><?php echo $row['duration']; ?></td>
<td><?php echo $row['fee']; ?></td>
<td>
<a href="edit_course.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
<a href="delete_course.php?id=<?php echo $row['id']; ?>" 
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this course?');">Delete</a>
</td>
</tr>
<?php } ?>

</tbody>
</table>

</div>
</div>
</div>

</body>
</html>