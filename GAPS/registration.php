<?php
/*include './connections/connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fullname = $_POST['fullname'];
    $DateofBirth = $_POST['date'];
    $Email = $_POST['email'];
    $MobileNo = $_POST['no'];
    $Gender = $_POST['gender'];
    $Password = $_POST['Password'];
    $IdType = $_POST['ID'];
    $IdNo = $_POST['IDNO'];
    $IssuedAuthority = $_POST['Authority'];
    $IssuedState = $_POST['IssuedState'];
    $AdressLine1 = $_POST['Line1'];
    $AdressLine2 = $_POST['Line2'];
    $State = $_POST['state'];
    $District = $_POST['Dis'];
    $Nationality = $_POST['Nationality'];
    $PinCode = $_POST['Pin'];

    $select ="SELECT * FROM user_details WHERE Email = '$email'";
    $result = mysqli_query($con, $select);

    $sql1 = "INSERT INTO user_details(FullName, DOB, Email, MobileNo, Gender, password, IDType, IDNo, IssueAuthority, IssuedState, AdressLine1, AdressLine2, State, District, Nationality, Pincode, status) VALUES ('$fullname', '$DateofBirth', '$Email', '$MobileNo', '$Gender', '$Password', '$IdType', '$IdNo', '$IssuedAuthority', '$IssuedState','$AdressLine1', '$AdressLine2', '$State', '$District', '$Nationality', '$PinCode','pending')";
    mysqli_query($con, $sql1);
    mysqli_close($con);

    // Show success message
    echo "<script>alert('Pending Waiting for approval!'); window.location = 'index.html'</script>";
}
?>*/
include './connections/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data and sanitize inputs
    $fullname = sanitizeInput($_POST['fullname']);
    $dateOfBirth = sanitizeInput($_POST['date']);
    $email = sanitizeInput($_POST['email']);
    $mobileNo = sanitizeInput($_POST['no']);
    $gender = sanitizeInput($_POST['gender']);
    $password = sanitizeInput($_POST['Password']);
    $idType = sanitizeInput($_POST['ID']);
    $idNo = sanitizeInput($_POST['IDNO']);
    $issuedAuthority = sanitizeInput($_POST['Authority']);
    $issuedState = sanitizeInput($_POST['IssuedState']);
    $addressLine1 = sanitizeInput($_POST['Line1']);
    $addressLine2 = sanitizeInput($_POST['Line2']);
    $state = sanitizeInput($_POST['state']);
    $district = sanitizeInput($_POST['Dis']);
    $nationality = sanitizeInput($_POST['Nationality']);
    $pinCode = sanitizeInput($_POST['Pin']);

    // Check if user with the same email already exists
    $select = "SELECT * FROM user_details WHERE Email = '$email'";
    $result = mysqli_query($con, $select);

    if (mysqli_num_rows($result) > 0) {
        // User already exists, handle accordingly (e.g., display an error message)
        echo "<script>alert('User with the same email already exists!');</script>";
    } else {
        // Insert the form data into the database
        $sql = "INSERT INTO user_details (FullName, DOB, Email, MobileNo, Gender, password, IDType, IDNo, IssueAuthority, IssuedState, AdressLine1, AdressLine2, State, District, Nationality, Pincode, status) 
                VALUES ('$fullname', '$dateOfBirth', '$email', '$mobileNo', '$gender', '$password', '$idType', '$idNo', '$issuedAuthority', '$issuedState', '$addressLine1', '$addressLine2', '$state', '$district', '$nationality', '$pinCode', 'pending')";

        if (mysqli_query($con, $sql)) {
            // Show success message and redirect
            echo "<script>alert('Pending Waiting for approval!'); window.location = 'index.html'</script>";
        } else {
            // Handle database insertion error (e.g., display an error message)
            echo "<script>alert('Error inserting data into the database: " . mysqli_error($con) . "');</script>";
        }
    }

    mysqli_close($con);
}

// Function to sanitize input data
function sanitizeInput($input) {
    // Implement your desired sanitization logic here
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
?>

