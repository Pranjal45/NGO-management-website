<?php

session_start();
include './connections/connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if ($password === $user['password']) {
            $_SESSION['email'] = $email;
            echo "<script>alert('Successfully logged in'); window.location = 'admindashboard.php'</script>";
        } else {
            echo "Invalid password login credentials";
        }
    } else {
        echo "Invalid login credentials";
    }
}

mysqli_close($con);
?>
