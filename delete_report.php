<?php
include("db.php");

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM reports WHERE report_id=$id");

header("Location: reports.php");
?>