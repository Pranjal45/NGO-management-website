<?php
/*session_start();
include './connections/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // Prepare the statement
    $stmt = mysqli_prepare($con, "SELECT * FROM user_details WHERE Email = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);

    $status = $row['status'];

    // Check the number of rows
    $check_user = mysqli_num_rows($result);

    if ($check_user == 1) {
        $_SESSION["status"] = $row["status"];
        $_SESSION["email"] = $row["Email"];
        $_SESSION["pass"] = $row["password"];

        if ($status == "approved") {
            echo '<script type="text/javascript">';
            echo 'alert("Login Successful!");';
            echo 'window.location.href = "dashboard.html"';
            echo '</script>';
        } else if ($status == "pending") {
            echo '<script type="text/javascript">';
            echo 'alert("Your account is still pending!");';
            echo 'window.location.href = "log.html"';
            echo '</script>';
        }
    } else {
        echo "Invalid login credentials";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($con);*/
session_start();
include './connections/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // Prepare the statement
    $stmt = mysqli_prepare($con, "SELECT * FROM user_details WHERE Email = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);

    if ($row) {
        $status = $row['status'];

        $_SESSION["status"] = $status;
        $_SESSION["email"] = $row["Email"];
        $_SESSION["pass"] = $row["password"];

        if ($status == "approved") {
            echo '<script type="text/javascript">';
            echo 'alert("Login Successful!");';
            echo 'window.location.href = "donation.html"';
            echo '</script>';
        } else if ($status == "pending") {
            echo '<script type="text/javascript">';
            echo 'alert("Your account is still pending!");';
            echo 'window.location.href = "log.html"';
            echo '</script>';
        }
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Invalid Credentials!");';
        echo 'window.location.href = "log.html"';
        echo '</script>';
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($con);

?>
