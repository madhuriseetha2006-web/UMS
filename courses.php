<?php
include 'db.php';

$query = "SELECT * FROM courses ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow-lg p-4 border-0 rounded-4">
        
        <!-- Header + Buttons -->
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
            
            <h3 class="fw-bold text-primary">Courses List</h3>

            <div>
                <!-- Back to Departments -->
                <a href="departments.php" class="btn btn-outline-primary rounded-pill px-4 me-2">
                    ⬅ Back to Departments
                </a>

                <!-- Back to Dashboard -->
                <a href="dashboard.php" class="btn btn-secondary rounded-pill px-4">
                    ⬅ Back to Dashboard
                </a>
            </div>

        </div>

        <!-- Courses Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Course Name</th>
                        <th>Course Code</th>
                        <th>Duration</th>
                        <th>Fee</th>
                    </tr>
                </thead>

                <tbody class="text-center">
                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['course_name']; ?></td>
                        <td><?php echo $row['course_code']; ?></td>
                        <td><?php echo $row['duration']; ?></td>
                        <td>₹ <?php echo $row['fee']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>

    </div>

</div>

</body>
</html>