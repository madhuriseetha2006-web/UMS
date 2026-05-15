<?php
session_start();
include "config.php";

// Protect page
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

// JOIN query
$result = mysqli_query($conn, "
SELECT students.id, students.name, students.email, courses.course_name
FROM students
JOIN courses ON students.course_id = courses.id
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Students List</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow-lg">
        
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Students List</h4>
            <a href="dashboard.php" class="btn btn-light btn-sm">
                ⬅ Back to Dashboard
            </a>
        </div>

        <div class="card-body">

            <a href="add_student.php" class="btn btn-success mb-3">
                + Add Student
            </a>

            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th width="170">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['course_name']; ?></td>
                        <td>
                            <a href="edit_student.php?id=<?php echo $row['id']; ?>" 
                               class="btn btn-warning btn-sm">
                               Edit
                            </a>

                            <a href="delete_student.php?id=<?php echo $row['id']; ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Are you sure you want to delete this student?');">
                               Delete
                            </a>
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