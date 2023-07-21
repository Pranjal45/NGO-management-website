<?php
session_start();
include './connections/connection.php';
$sql = " SELECT id FROM user_details ";
$query = mysqli_query($con, $sql);
$empcount = mysqli_num_rows($query);

echo htmlentities($empcount);

mysqli_close($con);
?>