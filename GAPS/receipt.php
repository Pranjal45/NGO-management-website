<?php
session_start();

// Check if the receipt variables are set
if (isset($_SESSION['receipt'])) {
    $receipt = $_SESSION['receipt'];
    $receiptName = $receipt['name'];
    $receiptEmail = $receipt['email'];
    $receiptMobile = $receipt['mobile'];
    $receiptAmount = $receipt['amount'];
    $receiptDate = $receipt['date'];
    $receiptGender = $receipt['gender'];
    $receiptPaymentMode = $receipt['paymentMode'];
    $receiptTransactionId = $receipt['transactionId'];
} else {
    // Handle the case where receipt data is not available
    echo "Receipt data not found.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"  crossorigin="anonymous">
<style>
    @media print {
.hide-in-pdf {
    display: none;
}

}
</style>
</head>
</head>
<body>
    <div class="receipt-container">
        <h2 class="receipt-heading">Donation Receipt</h2>
        <div class="receipt-details">
            <span class="receipt-label">Name:</span> <?php echo $receiptName; ?><br>
            <span class="receipt-label">Email:</span> <?php echo $receiptEmail; ?><br>
            <span class="receipt-label">Mobile:</span> <?php echo $receiptMobile; ?><br>
            <span class="receipt-label">Amount:</span> <?php echo $receiptAmount; ?><br>
            <span class="receipt-label">Date:</span> <?php echo $receiptDate; ?><br>
            <span class="receipt-label">Gender:</span> <?php echo $receiptGender; ?><br>
            <span class="receipt-label">Payment Mode:</span> <?php echo $receiptPaymentMode; ?><br>
            <span class="receipt-label">Transaction ID:</span> <?php echo $receiptTransactionId; ?><br>
            <tr>Organisation:GAPS</tr>
        </div>
        <!--<button class="print-button" onclick="window.print()">Print Receipt</button>-->
        <button onclick="window.print();" class="btn btn-primary hide-in-pdf">Print</button>
        <a href="index.html" class="btn btn-secondary hide-in-pdf">Go Back</a>
    </div>
</body>
</html>
