<?php
include '../connections/connection.php';
?>
<!--<!DOCTYPE html>
<html>
<head>
  <title>Admin Approval</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"/>
</head>
<body>

<div class="table-responsive">
  <div class="row">
    <div class="col-md-12">
      <h2>User Registration</h2>
      <table id ="user_details">
          <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>DOB</th>
            <th>Email</th>
            <th>Mobile No</th>
            <th>Gender</th>
            <th>Password</th>
            <th>Action</th>-->
 <!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Approval</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"  crossorigin="anonymous">
   <style>
        body {
            margin: 1%;
        }
        .button {
  background-color: #4CAF50;
  border-radius: 30px;
  border: none;
  color: white;
  padding: 10px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;
}
.button1{
  background-color: red;
  border-radius: 30px;
  border: none;
  color: white;
  padding: 10px 24px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>

<body>
    <h1>Registration Approval List</h1>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered">
            <th>SL.no</th>
                    <th>Full Name</th>
                    <th>DOB</th>
                    <th>Email</th>
                    <th>Mobile No.</th>
                    <th>Gender</th>
                    <th>ID Type</th>
                    <th>ID No.</th>
                    <th>Issue Authority</th>
                    <th>Issued State</th>
                    <th>Address line1</th>
                    <th>Address line2</th>
                    <th>State</th>
                    <th>District</th>
                    <th>Nationality</th>
                    <th>Pincode</th>
                    <th>Action</th>
          </tr>
          <?php
            $query = "SELECT * FROM user_details WHERE status = 'pending' ORDER BY id ASC";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)){
          ?>
          <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['FullName'];?></td>
            <td><?php echo $row['DOB'];?></td>
            <td><?php echo $row['Email'];?></td>
            <td><?php echo $row['MobileNo'];?></td>
            <td><?php echo $row['Gender'];?></td>  
            <td><?php echo $row['IDType'];?></td>
            <td><?php echo $row['IDNo'];?></td>
            <td><?php echo $row['IssueAuthority'];?></td>
            <td><?php echo $row['IssuedState'];?></td>
            <td><?php echo $row['AdressLine1'];?></td>
            <td><?php echo $row['AdressLine2'];?></td>
            <td><?php echo $row['State'];?></td>  
            <td><?php echo $row['District'];?></td> 
            <td><?php echo $row['Nationality'];?></td>
            <td><?php echo $row['Pincode'];?></td>
            <td>
                <form action ="admin approval.php" method = "POST">
                <input type= "hidden" name ="id" value ="<?php echo $row['id'];?>"/>
                <input type= "submit" name ="approve" value = "Approve"/>
                <input type= "submit" name ="deny" value ="Deny"/>
            </form>
            </td>
          </tr>
          </table>
         <?php
            }
        ?>
      
    </div>
  </div>
</div>
<?php
if(isset($_POST['approve'])){
    $id = $_POST['id'];

    $select ="UPDATE user_details SET status = 'approved' WHERE id = '$id'";
    $result = mysqli_query($con, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("User Approved!");';
    echo 'window.location.href = "admin approval.php"';
    echo '</script>';
}
if(isset($_POST['deny'])){
    $id = $_POST['id'];

    $select ="DELETE FROM user_details WHERE id = '$id'";
    $result = mysqli_query($con, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("User Denied!");';
    echo 'window.location.href = "admin approval.php"';
    echo '</script>';
}
?>
</body>
</html>

