<?php
include './connections/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Approval</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"  crossorigin="anonymous">
</head>

<body>
    <h1>Members</h1>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
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
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM user_details WHERE status = 'approved' ORDER BY id ASC";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['FullName'] . "</td>";
                    echo "<td>" . $row['DOB'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td>" . $row['MobileNo'] . "</td>";
                    echo "<td>" . $row['Gender'] . "</td>";
                    echo "<td>" . $row['IDType'] . "</td>";
                    echo "<td>" . $row['IDNo'] . "</td>";
                    echo "<td>" . $row['IssueAuthority'] . "</td>";
                    echo "<td>" . $row['IssuedState'] . "</td>";
                    echo "<td>" . $row['AdressLine1'] . "</td>";
                    echo "<td>" . $row['AdressLine2'] . "</td>";
                    echo "<td>" . $row['State'] . "</td>";
                    echo "<td>" . $row['District'] . "</td>";
                    echo "<td>" . $row['Nationality'] . "</td>";
                    echo "<td>" . $row['Pincode'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
