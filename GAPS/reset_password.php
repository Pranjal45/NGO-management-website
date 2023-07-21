<?php
// Check if the form is submitted
/*if(isset($_POST['reset_password'])) {
    // Retrieve form data
    $email = $_POST['email'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate the form data (e.g., check if the email is valid, password length requirements, etc.)

    // If the form data is valid, update the password in the database
    // Connect to your database (replace 'db_host', 'db_user', 'db_password', and 'db_name' with your actual database credentials)
    $con = mysqli_connect('localhost', 'root', '', 'gaps');
    if(!$con) {
        die("Database connection error");
    }

    // Update the password in the database for the given email
    $query = "UPDATE user_details SET password = '$newPassword' WHERE email = '$email'";
    $result = mysqli_query($con, $query);

    // Check if the password update was successful
    if($result) {
        echo "Password updated successfully!";
        header("Location: log2.html");
        exit();

        // Redirect the user to the login page or any other desired page
        // header("Location: login.php");
        // exit();
    } else {
        echo "Password update failed!";
    }

    // Close the database connection
    mysqli_close($con);
}
?>*/
// Check if the form is submitted
// Check if the form is submitted
if(isset($_POST['reset_password'])) {
    // Retrieve form data
    $email = $_POST['email'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate the form data (e.g., check if the email is valid, password length requirements, etc.)
    if($newPassword !== $confirmPassword) {
        $errorMessage = "Passwords do not match!";
    } else {
        // If the form data is valid, update the password in the database
        // Connect to your database (replace 'db_host', 'db_user', 'db_password', and 'db_name' with your actual database credentials)
        $con = mysqli_connect('localhost', 'root', '', 'gaps');
        if(!$con) {
            die("Database connection error");
        }

        // Update the password in the database for the given email
        $query = "UPDATE user_details SET password = '$newPassword' WHERE email = '$email'";
        $result = mysqli_query($con, $query);

        // Check if the password update was successful
        if($result) {
            $successMessage = "Password updated successfully!";
            header("refresh:3; url=log2.html");
        } else {
            $errorMessage = "Password update failed!";
        }

        // Close the database connection
        mysqli_close($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Update</title>
</head>
<body>
    <?php if(isset($successMessage)): ?>
        <p><?php echo $successMessage; ?></p>
    <?php elseif(isset($errorMessage)): ?>
        <p><?php echo $errorMessage; ?></p>
    <?php endif; ?>
</body>
</html>


