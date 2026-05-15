<?php
include "config.php";

$id = $_GET['id'];

// Fetch student
$student = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM students WHERE id=$id")
);

// Fetch courses
$courses = mysqli_query($conn, "SELECT * FROM courses");

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course_id = $_POST['course_id'];

    mysqli_query(
        $conn,
        "UPDATE students SET name='$name', email='$email', course_id='$course_id' WHERE id=$id"
    );

    header("Location: view_students.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif;}
        body{
            background: linear-gradient(135deg,#667eea,#764ba2);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:20px;
        }

        .edit-card{
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(15px);
            padding: 40px;
            border-radius: 20px;
            width: 450px;
            box-shadow: 0 10px 35px rgba(0,0,0,0.4);
            color:white;
        }

        .edit-card h2{
            text-align:center;
            margin-bottom:30px;
            font-size:28px;
        }

        form label{
            display:block;
            margin-bottom:8px;
            font-weight:600;
        }

        form input, form select{
            width:100%;
            padding:12px 15px;
            margin-bottom:20px;
            border-radius:10px;
            border:none;
            outline:none;
            font-size:15px;
            transition:0.3s;
        }

        form input:focus, form select:focus{
            box-shadow: 0 0 0 3px rgba(255,255,0,0.4);
        }

        button[type="submit"]{
            width:100%;
            padding:12px;
            border:none;
            border-radius:10px;
            background: #ffcc00;
            color:#0f2027;
            font-weight:700;
            cursor:pointer;
            font-size:16px;
            transition:0.3s;
        }

        button[type="submit"]:hover{
            background:#ffd633;
            transform:scale(1.03);
        }

        .back-link{
            display:block;
            text-align:center;
            margin-top:25px;
            color:white;
            text-decoration:none;
            font-weight:600;
        }

        .back-link:hover{
            text-decoration:underline;
            color:#ffcc00;
        }

        @media(max-width:500px){
            .edit-card{
                width:100%;
                padding:20px;
            }
        }
    </style>
</head>
<body>

<div class="edit-card">
    <h2>Edit Student</h2>
    <form method="post">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?php echo $student['name']; ?>" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo $student['email']; ?>" required>

        <label for="course">Course</label>
        <select name="course_id" id="course" required>
            <option value="">Select Course</option>
            <?php while ($c = mysqli_fetch_assoc($courses)) { ?>
                <option value="<?php echo $c['id']; ?>" 
                    <?php if ($c['id'] == $student['course_id']) echo "selected"; ?>>
                    <?php echo $c['course_name']; ?>
                </option>
            <?php } ?>
        </select>

        <button type="submit" name="update">Update Student</button>
    </form>

    <a href="view_students.php" class="back-link">← Back to Students</a>
</div>

</body>
</html>