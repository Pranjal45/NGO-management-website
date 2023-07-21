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
    // if ($paymentMode === "bc1") {
    //     $transactionId = $_POST["bank-transaction-id"];
    //     // Save to database using appropriate SQL query for bank transfer
    //     $sql = "INSERT INTO donation (Doner_Name, Email, Mobile, Amount, Donation_Date, Gender, Donation_Type, Transaction_Id) VALUES ('$name', '$email', '$mobile', '$amount', '$date', '$gender', '$paymentMode', '$transactionId')";
    // } elseif ($paymentMode === "bc2") {
    //     $transactionId = $_POST["upi-transaction-id"];
    //     // Save to database using appropriate SQL query for UPI
    //     $sql = "INSERT INTO donation (Doner_Name, Email, Mobile, Amount, Donation_Date, Gender, Donation_Type, Transaction_Id) VALUES ('$name', '$email', '$mobile', '$amount', '$date', '$gender', '$paymentMode', '$transactionId')";
    // } else {
    //     // Handle invalid payment mode
    //     echo "Invalid payment mode.";
    //     exit();
    // }

    // // Execute SQL query
    // if (mysqli_query($con, $sql)) {
    //     echo "Data inserted successfully.";
    // } else {
    //     echo "Error: " . $sql . "<br>" . mysqli_error($con);
    // }

    $sql1 = "INSERT INTO donation(Name, Email, Mobile, Amount, Date, Gender, Type, TransactionId) VALUES ('$name', '$email', '$mobile', '$amount', '$date', '$gender', '$paymentMode', '$transactionId')";
    mysqli_query($con, $sql1);

    // Close connection
    mysqli_close($con);

    echo "<script>alert('Send successfully!'); window.location = 'index.html'</script>";
}
?>