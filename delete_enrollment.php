<?php
include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    mysqli_query($conn,"DELETE FROM enrollments WHERE enroll_id='$id'");
}

header("Location: enrollment.php");
?>