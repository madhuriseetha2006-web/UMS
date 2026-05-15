<?php
include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Settings</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background: linear-gradient(to right,#f0f9ff,#e0f2fe);
font-family: 'Segoe UI', sans-serif;
}

.settings-card{
background:white;
border-radius:20px;
padding:30px;
box-shadow:0 8px 20px rgba(0,0,0,0.1);
}

.section-title{
font-weight:600;
margin-bottom:20px;
color:#334155;
}

.btn-custom{
padding:8px 20px;
border-radius:25px;
color:white;
text-decoration:none;
border:none;
}

.save-btn{
background:#2563eb;
}

.back-btn{
background:#475569;
}

.save-btn:hover,
.back-btn:hover{
opacity:0.85;
}

.form-control{
border-radius:10px;
}

.switch{
margin-top:10px;
}

</style>
</head>

<body>

<div class="container mt-5">

<div class="settings-card">

<h2 class="text-center mb-4">⚙ University Settings</h2>

<div class="text-center mb-4">
<a href="dashboard.php" class="btn-custom back-btn">← Back to Dashboard</a>
</div>

<!-- Admin Profile Section -->
<h5 class="section-title">👤 Admin Profile Settings</h5>

<form method="POST">

<div class="row mb-3">
<div class="col-md-6">
<label>Admin Name</label>
<input type="text" class="form-control" placeholder="Enter Admin Name">
</div>

<div class="col-md-6">
<label>Email</label>
<input type="email" class="form-control" placeholder="Enter Email">
</div>
</div>

<div class="mb-4">
<label>Contact Number</label>
<input type="text" class="form-control" placeholder="Enter Contact Number">
</div>

<hr>

<!-- Password Section -->
<h5 class="section-title">🔒 Change Password</h5>

<div class="row mb-3">
<div class="col-md-6">
<label>New Password</label>
<input type="password" class="form-control" placeholder="Enter New Password">
</div>

<div class="col-md-6">
<label>Confirm Password</label>
<input type="password" class="form-control" placeholder="Confirm Password">
</div>
</div>

<hr>

<!-- System Preferences -->
<h5 class="section-title">🖥 System Preferences</h5>

<div class="form-check form-switch switch">
<input class="form-check-input" type="checkbox">
<label class="form-check-label">Enable Email Notifications</label>
</div>

<div class="form-check form-switch switch">
<input class="form-check-input" type="checkbox">
<label class="form-check-label">Enable Dark Mode</label>
</div>

<div class="form-check form-switch switch">
<input class="form-check-input" type="checkbox">
<label class="form-check-label">Allow Student Self Enrollment</label>
</div>

<br>

<div class="text-center">
<button class="btn-custom save-btn">💾 Save Settings</button>
</div>

</form>

</div>
</div>

</body>
</html>