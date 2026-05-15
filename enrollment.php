<?php
include 'config.php';

// DELETE
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM enrollments WHERE id=$id");
    header("Location: enrollment.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Enrollment Management</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:linear-gradient(135deg,#eef2f3,#8e9eab);
min-height:100vh;
padding:40px;
}

/* CONTAINER */

.container{
width:95%;
max-width:1100px;
margin:auto;
background:white;
padding:30px;
border-radius:15px;
box-shadow:0 15px 40px rgba(0,0,0,0.15);
}

/* HEADER */

.header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:25px;
}

.header h2{
color:#333;
}

/* BUTTONS */

.btn{
padding:10px 18px;
border-radius:8px;
text-decoration:none;
color:white;
font-size:14px;
font-weight:500;
transition:0.3s;
}

.add{
background:#28a745;
}

.add:hover{
background:#218838;
}

.back{
background:#6c757d;
}

.back:hover{
background:#545b62;
}

/* TABLE */

table{
width:100%;
border-collapse:collapse;
}

th{
background:#4facfe;
color:white;
padding:12px;
font-weight:500;
}

td{
padding:12px;
border-bottom:1px solid #eee;
text-align:center;
}

tr:hover{
background:#f9fbff;
}

/* ACTION BUTTONS */

.edit{
background:#ffc107;
color:black;
padding:6px 12px;
border-radius:6px;
text-decoration:none;
font-size:13px;
margin-right:5px;
}

.edit:hover{
background:#e0a800;
}

.delete{
background:#dc3545;
color:white;
padding:6px 12px;
border-radius:6px;
text-decoration:none;
font-size:13px;
}

.delete:hover{
background:#c82333;
}

/* EMPTY MESSAGE */

.no-data{
text-align:center;
padding:20px;
color:#777;
}

</style>

</head>

<body>

<div class="container">

<div class="header">
<h2>Enrollment Management</h2>

<div>
<a class="btn add" href="add_enrollment.php">+ Add Enrollment</a>
<a class="btn back" href="dashboard.php">Dashboard</a>
</div>
</div>

<table>

<tr>
<th>ID</th>
<th>Student Name</th>
<th>Course</th>
<th>Email</th>
<th>Enrollment Date</th>
<th>Actions</th>
</tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM enrollments");

if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_assoc($result)){
?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['student_name']; ?></td>
<td><?php echo $row['course']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['enrollment_date']; ?></td>

<td>
<a class="edit" href="edit_enrollment.php?id=<?php echo $row['id']; ?>">Edit</a>

<a class="delete" 
href="enrollment.php?delete=<?php echo $row['id']; ?>" 
onclick="return confirm('Are you sure you want to delete this enrollment?')">
Delete
</a>
</td>

</tr>

<?php
}
}else{
echo "<tr><td colspan='6' class='no-data'>No enrollments found</td></tr>";
}
?>

</table>

</div>

</body>
</html>