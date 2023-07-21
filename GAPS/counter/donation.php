<?php
include './connections/connection.php';
$sql = " SELECT Amount FROM donation ";
$query = mysqli_query($con, $sql);
$empcount = mysqli_num_rows($query);

echo htmlentities($empcount);

mysqli_close($con);
?>