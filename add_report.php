<?php
include("db.php");

if(isset($_POST['submit'])){

$student_name = $_POST['student_name'];
$course = $_POST['course'];
$total_fees = $_POST['total_fees'];
$payment_status = $_POST['payment_status'];

$query = "INSERT INTO reports(student_name,course,total_fees,payment_status)
VALUES('$student_name','$course','$total_fees','$payment_status')";

mysqli_query($conn,$query);

echo "<script>alert('Report Added Successfully');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Report</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:linear-gradient(120deg,#89f7fe,#66a6ff);
height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

/* CARD */

.container{
background:white;
padding:40px;
width:450px;
border-radius:15px;
box-shadow:0 15px 40px rgba(0,0,0,0.2);
}

h2{
text-align:center;
margin-bottom:25px;
color:#333;
}

/* INPUT */

input,select{
width:100%;
padding:12px;
margin:10px 0;
border-radius:8px;
border:1px solid #ccc;
font-size:14px;
}

/* BUTTON */

button{
width:100%;
padding:12px;
border:none;
border-radius:8px;
background:#4facfe;
color:white;
font-size:16px;
cursor:pointer;
transition:0.3s;
margin-top:10px;
}

button:hover{
background:#00c6ff;
}

/* NAV BUTTONS */

.nav-buttons{
margin-top:15px;
display:flex;
justify-content:space-between;
gap:10px;
}

.nav-buttons a{
flex:1;
text-align:center;
padding:10px;
border-radius:8px;
text-decoration:none;
font-size:14px;
font-weight:500;
transition:0.3s;
}

/* Reports Button */

.reports-btn{
background:#28a745;
color:white;
}

.reports-btn:hover{
background:#218838;
}

/* Dashboard Button */

.dashboard-btn{
background:#6c757d;
color:white;
}

.dashboard-btn:hover{
background:#5a6268;
}

</style>

</head>

<body>

<div class="container">

<h2>Add Student Report</h2>

<form method="post">

<input type="text" name="student_name" placeholder="Student Name" required>

<select name="course" required>
<option value="">Select Course</option>
<option>BTech</option>
<option>Degree</option>
<option>MBBS</option>
<option>BBA</option>
<option>LLB</option>
<option>BSc</option>
<option>Digital Marketing</option>
</select>

<input type="number" name="total_fees" placeholder="Total Fees">

<select name="payment_status">
<option value="">Payment Status</option>
<option>Paid</option>
<option>Pending</option>
<option>Partial</option>
</select>

<button type="submit" name="submit">Add Report</button>

</form>

<div class="nav-buttons">

<a href="reports.php" class="reports-btn">📊 Back to Reports</a>

<a href="dashboard.php" class="dashboard-btn">🏠 Dashboard</a>

</div>

</div>

</body>
</html>