<?php
include("db.php");

// Fetch reports
$result = mysqli_query($conn, "SELECT * FROM reports ORDER BY report_id DESC");

// Total Students
$total_students = mysqli_num_rows($result);

// Total Fees
$total_fees_query = mysqli_query($conn, "SELECT SUM(total_fees) as total FROM reports");
$total_fees_data = mysqli_fetch_assoc($total_fees_query);
$total_fees = $total_fees_data['total'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Reports</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background: linear-gradient(to right,#e0f2fe,#f0f9ff);
font-family: 'Segoe UI', sans-serif;
}

.card{
border-radius:15px;
}

.btn-custom{
padding:8px 18px;
border-radius:25px;
color:white;
text-decoration:none;
font-size:14px;
margin-right:6px;
}

.back-btn{ background:#475569; }
.add-btn{ background:#16a34a; }
.edit-btn{ background:#2563eb; }
.delete-btn{ background:#dc2626; }

.btn-custom:hover{
opacity:0.85;
color:white;
}

.summary-box{
background:white;
padding:15px;
border-radius:15px;
text-align:center;
box-shadow:0 4px 10px rgba(0,0,0,0.1);
}

</style>
</head>

<body>

<div class="container mt-5">

<div class="card shadow p-4">

<h2 class="mb-4 text-center">📊 Student Reports</h2>

<!-- Buttons -->
<div class="mb-4 text-center">
<a href="dashboard.php" class="btn-custom back-btn">← Back to Dashboard</a>
<a href="add_report.php" class="btn-custom add-btn">+ Add Report</a>
</div>

<!-- Summary Section -->
<div class="row mb-4">
<div class="col-md-6">
<div class="summary-box">
<h5>Total Students</h5>
<h3><?php echo $total_students; ?></h3>
</div>
</div>

<div class="col-md-6">
<div class="summary-box">
<h5>Total Fees Collected</h5>
<h3>₹ <?php echo $total_fees ? $total_fees : 0; ?></h3>
</div>
</div>
</div>

<!-- Table -->
<table class="table table-bordered table-striped text-center">
<tr class="table-primary">
<th>ID</th>
<th>Student Name</th>
<th>Course</th>
<th>Fees</th>
<th>Status</th>
<th>Actions</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?php echo $row['report_id']; ?></td>
<td><?php echo $row['student_name']; ?></td>
<td><?php echo $row['course']; ?></td>
<td>₹ <?php echo $row['total_fees']; ?></td>
<td>
<?php if($row['payment_status']=="Paid"){ ?>
<span class="badge bg-success">Paid</span>
<?php } elseif($row['payment_status']=="Partial"){ ?>
<span class="badge bg-info text-dark">Partial</span>
<?php } else { ?>
<span class="badge bg-warning text-dark">Pending</span>
<?php } ?>
</td>

<td>
<a href="edit_report.php?id=<?php echo $row['report_id']; ?>" class="btn-custom edit-btn">Edit</a>
<a href="delete_report.php?id=<?php echo $row['report_id']; ?>" 
class="btn-custom delete-btn"
onclick="return confirm('Are you sure you want to delete this report?')">
Delete
</a>
</td>

</tr>
<?php } ?>

</table>

</div>
</div>

</body>
</html>