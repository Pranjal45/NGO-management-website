<?php
session_start();
include './connections/connection.php';

// Get form data
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["Donername"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile-number"];
    $amount = $_POST["amount"];
    $date = $_POST["DOB"];
    $gender = $_POST["gendar"];
    $paymentMode = $_POST["pay"];
    $transactionId = $_POST["transaction-id"];
    
    // Process based on payment mode
    // ...

    $sql1 = "INSERT INTO donation(Name, Email, Mobile, Amount, Date, Gender, Type, TransactionId) VALUES ('$name', '$email', '$mobile', '$amount', '$date', '$gender', '$paymentMode', '$transactionId')";
    mysqli_query($con, $sql1);

    // Store receipt data in session
    $receipt = array(
        'name' => $name,
        'email' => $email,
        'mobile' => $mobile,
        'amount' => $amount,
        'date' => $date,
        'gender' => $gender,
        'paymentMode' => $paymentMode,
        'transactionId' => $transactionId
    );
    $_SESSION['receipt'] = $receipt;

    // Close connection
    mysqli_close($con);

    echo "<script>alert('Send successfully!'); window.location = 'receipt.php'</script>";
}
?>

