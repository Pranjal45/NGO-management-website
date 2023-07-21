<?php
/*$con = mysqli_connect("localhost","root","","gaps");

// Check connection
// if (mysqli_connect_errno()) {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   exit();
// }

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $Name = $_POST['fullname'];
    $Email = $_POST['email'];
    $Feedback = $_POST['feedback']; // Corrected assignment

    $sql1 = "INSERT INTO feedback_form(FULLNAME, EMAIL_ID, FEEDBACK) VALUES ('$Name', '$Email', '$Feedback')";
    mysqli_query($con, $sql1);

    mysqli_close($con);

    echo "<script>alert('Send successfully!'); window.location = 'index.html'</script>";
}
?>*/
$con = mysqli_connect("localhost", "root", "", "gaps");

// Check connection
if (!$con) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = sanitizeInput($_POST['fullname']);
    $email = sanitizeInput($_POST['email']);
    $feedback = sanitizeInput($_POST['feedback']);

    $sql = "INSERT INTO feedback_form (FULLNAME, EMAIL_ID, FEEDBACK) VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $feedback);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($con);
        echo "<script>alert('Send successfully!'); window.location = 'index.html'</script>";
        exit();
    } else {
        echo "<script>alert('Error inserting data into the database: " . mysqli_error($con) . "');</script>";
    }
}

mysqli_close($con);

// Function to sanitize input data
function sanitizeInput($input) {
    global $con;
    $input = mysqli_real_escape_string($con, $input);
    return $input;
}
?>

