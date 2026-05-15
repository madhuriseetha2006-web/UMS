<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "university_management");

$id = $_GET['id'];

$sql = "DELETE FROM students WHERE id='$id'";
mysqli_query($conn, $sql);

header("Location: view_students.php");
exit();
?>