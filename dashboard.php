<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard - UMS</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body{
    margin:0;
    font-family:'Segoe UI', sans-serif;
    background:#f4f6f9;
}

.container{
    display:flex;
}

/* SIDEBAR */
.sidebar{
    width:240px;
    height:100vh;
    background:#1e293b;
    color:white;
    position:fixed;
    padding-top:30px;
}

.sidebar h2{
    text-align:center;
    margin-bottom:40px;
}

.sidebar a{
    display:block;
    padding:15px 30px;
    color:#cbd5e1;
    text-decoration:none;
    transition:0.3s;
}

.sidebar a:hover{
    background:#334155;
    color:white;
}

/* MAIN */
.main{
    margin-left:240px;
    width:100%;
}

/* TOPBAR */
.topbar{
    background:white;
    padding:15px 30px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 2px 8px rgba(0,0,0,0.05);
}

.logout-btn{
    background:#ef4444;
    padding:8px 18px;
    border-radius:20px;
    color:white;
    text-decoration:none;
}

.logout-btn:hover{
    background:#dc2626;
}

/* CONTENT */
.content{
    padding:30px;
}

.cards{
    display:flex;
    gap:20px;
    flex-wrap:wrap;
    margin-bottom:30px;
}

.card{
    background:white;
    padding:20px;
    width:220px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.05);
}

.card h3{
    margin:0;
    font-size:16px;
    color:#64748b;
}

.card p{
    font-size:28px;
    font-weight:bold;
    margin:10px 0 0;
    color:#2563eb;
}

/* TABLE */
.table-container{
    background:white;
    padding:20px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.05);
}

table{
    width:100%;
    border-collapse:collapse;
}

th, td{
    padding:12px;
    text-align:left;
    border-bottom:1px solid #e2e8f0;
}

th{
    background:#f1f5f9;
}

.status{
    padding:4px 10px;
    border-radius:15px;
    font-size:12px;
    color:white;
}

.active{
    background:#22c55e;
}

.inactive{
    background:#ef4444;
}

/* RIGHT PANEL */
.side-panel{
    background:white;
    padding:20px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.05);
    margin-bottom:20px;
}

.quick-btn{
    display:block;
    margin-bottom:10px;
    text-decoration:none;
    color:white;
    padding:8px;
    border-radius:20px;
    text-align:center;
}

.blue{ background:#2563eb; }
.green{ background:#16a34a; }
.orange{ background:#f59e0b; }

.quick-btn:hover{
    opacity:0.85;
}

/* Notification */
.notification{
    position:relative;
    cursor:pointer;
    font-size:20px;
}

.badge{
    position:absolute;
    top:-6px;
    right:-10px;
    background:red;
    color:white;
    font-size:12px;
    padding:2px 6px;
    border-radius:50%;
}

.notification-box{
    display:none;
    position:absolute;
    right:0;
    top:35px;
    width:250px;
    background:white;
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
    padding:10px;
}

.notification-box p{
    font-size:14px;
    padding:8px;
    border-bottom:1px solid #eee;
    margin:0;
}
.notification-box p:last-child{
    border:none;
}
</style>
</head>

<body>

<div class="container">

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>🎓 UMS Admin</h2>

    <a href="index.php">🏠 Dashboard</a>
    <a href="view_students.php">👨‍🎓 Students</a>
    <a href="view_courses.php">📚 Courses</a>
    <a href="faculty.php">👩‍🏫 Faculty</a>
    <a href="task.php">📋 Tasks</a>
    <a href="departments.php">🏢 Departments</a>
    <a href="enrollment.php">📝 Enrollments</a>
    <a href="academics.php">📅 Academics</a>
    <a href="reports.php">📊 Reports</a>
    <a href="settings.php">⚙️ Settings</a>
    <a href="logout.php">🚪 Logout</a>
</div>

<!-- MAIN -->
<div class="main">

    <!-- TOPBAR -->
    <div class="topbar">
        <h3>Admin Dashboard</h3>

        <div style="display:flex; align-items:center; gap:20px; position:relative;">
            
            <div class="notification" onclick="toggleNotifications()">
                🔔
                <span class="badge">3</span>

                <div class="notification-box" id="notificationBox">
                    <p>New student registered</p>
                    <p>Fee payment received</p>
                    <p>New faculty added</p>
                </div>
            </div>

            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <div style="display:flex; gap:25px; align-items:flex-start;">

            <!-- LEFT -->
            <div style="flex:3;">

                <div class="cards">
                    <div class="card">
                        <h3>Total Students</h3>
                        <p>120</p>
                    </div>

                    <div class="card">
                        <h3>Total Courses</h3>
                        <p>35</p>
                    </div>

                    <div class="card">
                        <h3>Total Faculty</h3>
                        <p>18</p>
                    </div>

                    <div class="card">
                        <h3>Departments</h3>
                        <p>6</p>
                    </div>
                </div>

                <div class="table-container">
                    <h3>Recent Activities</h3>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td>F101</td>
                            <td>Dr. Sharma</td>
                            <td>CSE</td>
                            <td><span class="status active">Active</span></td>
                        </tr>
                        <tr>
                            <td>F102</td>
                            <td>Dr. Reddy</td>
                            <td>ECE</td>
                            <td><span class="status active">Active</span></td>
                        </tr>
                        <tr>
                            <td>F103</td>
                            <td>Dr. Kumar</td>
                            <td>MECH</td>
                            <td><span class="status inactive">Inactive</span></td>
                        </tr>
                    </table>
                </div>

            </div>

            <!-- RIGHT -->
            <div style="flex:1;">

                <div class="side-panel">
                    <h3>⚡ Quick Actions</h3>
                    <a href="add_student.php" class="quick-btn blue">+ Add Student</a>
                    <a href="add_course.php" class="quick-btn green">+ Add Course</a>
                    <a href="add_enrollment.php" class="quick-btn orange">+ Add Enrollment</a>
                </div>

                <div class="side-panel">
                    <h3>📊 Student Growth</h3>
                    <canvas id="studentChart"></canvas>
                </div>

                <div class="side-panel">
                    <h3>🖥 System Status</h3>
                    <p><strong>Server:</strong> <span style="color:green;">Online</span></p>
                    <p><strong>Database:</strong> <span style="color:green;">Connected</span></p>
                    <p><strong>Today:</strong> <span id="datetime"></span></p>
                </div>

            </div>

        </div>

    </div>

</div>

</div>

<script>
function toggleNotifications(){
    var box = document.getElementById("notificationBox");
    box.style.display = box.style.display === "block" ? "none" : "block";
}

// Live Date & Time
function updateDateTime(){
    const now = new Date();
    document.getElementById("datetime").innerHTML = now.toLocaleString();
}
setInterval(updateDateTime,1000);
updateDateTime();

// Chart
const ctx = document.getElementById('studentChart');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['CSE', 'ECE', 'MECH', 'CIVIL', 'MBA'],
        datasets: [{
            label: 'Students',
            data: [45, 30, 25, 15, 20],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display:false } }
    }
});
</script>

</body>
</html>