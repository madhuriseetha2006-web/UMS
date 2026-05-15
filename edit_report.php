<?php
include("db.php");

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM reports WHERE report_id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

$student_name = $_POST['student_name'];
$course = $_POST['course'];
$total_fees = $_POST['total_fees'];
$payment_status = $_POST['payment_status'];

$query = "UPDATE reports SET 
student_name='$student_name',
course='$course',
total_fees='$total_fees',
payment_status='$payment_status'
WHERE report_id=$id";

mysqli_query($conn,$query);

echo "<script>alert('Report Updated Successfully'); window.location='reports.php';</script>";

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Report</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
height:100vh;
background:linear-gradient(120deg,#84fab0,#8fd3f4);
display:flex;
align-items:center;
justify-content:center;
}

/* CARD */

.container{
width:480px;
background:white;
padding:35px;
border-radius:15px;
box-shadow:0 12px 30px rgba(0,0,0,0.15);
}

h2{
text-align:center;
margin-bottom:25px;
color:#333;
}

/* INPUTS */

input,select{
width:100%;
padding:12px;
margin:10px 0;
border-radius:8px;
border:1px solid #ccc;
font-size:14px;
transition:0.3s;
}

input:focus,select:focus{
border-color:#4facfe;
outline:none;
box-shadow:0 0 6px rgba(79,172,254,0.4);
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
margin-top:10px;
transition:0.3s;
}

button:hover{
background:#00c6ff;
}

/* BACK LINK */

.back{
display:block;
text-align:center;
margin-top:15px;
text-decoration:none;
color:#555;
font-weight:500;
}

.back:hover{
color:#000;
}

</style>

</head>

<body>

<div class="container">

<h2>Edit Student Report</h2>

<form method="post">

<input type="text" name="student_name" value="<?php echo $row['student_name']; ?>" required>

<select name="course" required>

<option value="BTech" <?php if($row['course']=="BTech") echo "selected"; ?>>BTech</option>

<option value="Degree" <?php if($row['course']=="Degree") echo "selected"; ?>>Degree</option>

<option value="MBBS" <?php if($row['course']=="MBBS") echo "selected"; ?>>MBBS</option>

<option value="BBA" <?php if($row['course']=="BBA") echo "selected"; ?>>BBA</option>

<option value="LLB" <?php if($row['course']=="LLB") echo "selected"; ?>>LLB</option>

<option value="BSc" <?php if($row['course']=="BSc") echo "selected"; ?>>BSc</option>

<option value="Digital Marketing" <?php if($row['course']=="Digital Marketing") echo "selected"; ?>>Digital Marketing</option>

</select>

<input type="number" name="total_fees" value="<?php echo $row['total_fees']; ?>" required>

<select name="payment_status">

<option value="Paid" <?php if($row['payment_status']=="Paid") echo "selected"; ?>>Paid</option>

<option value="Pending" <?php if($row['payment_status']=="Pending") echo "selected"; ?>>Pending</option>

<option value="Partial" <?php if($row['payment_status']=="Partial") echo "selected"; ?>>Partial</option>

</select>

<button type="submit" name="update">Update Report</button>

</form>

<a href="reports.php" class="back">← Back to Reports</a>

</div>

</body>
</html>