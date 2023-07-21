<?php
include '../connections/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>PHP Print</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>Donation Details</h2>
      <table class="table table-bordered print">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>TransactionId</th>
            <th>Amount</th>
            <th>Gender</th>
            <th>Type</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sn=1;
          $user_qry="SELECT * from donation";
          $user_res=mysqli_query($con,$user_qry);
          while($user_data=mysqli_fetch_assoc($user_res))
          {
          ?>
          <tr>
            <td><?php echo $sn; ?></td>
            <td><?php echo $user_data['Name']; ?></td>
            <td><?php echo $user_data['Mobile']; ?></td>
            <td><?php echo $user_data['Email']; ?></td>
            <td><?php echo $user_data['TransactionId']; ?></td>
            <td><?php echo $user_data['Amount']; ?></td>
            <td><?php echo $user_data['Gender']; ?></td>
            <td><?php echo $user_data['Type']; ?></td>
            <td><?php echo $user_data['Date']; ?></td>
          </tr>
          <?php
          $sn++;
          }
          ?>
        </tbody>
      </table>

      <div class="text-center">
        <a href="user_data_print.php" class="btn btn-primary">Print</a>
      </div>
    </div>
  </div>
</div>
</body>
</html>














