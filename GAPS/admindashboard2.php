<?php
include './connections/connection.php';

// Fetch the approved member list from the database
$memberQuery = "SELECT id, FullName, Email, MobileNo, status FROM user_details WHERE status = 'approved'";
$result = mysqli_query($con, $memberQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admindashboard.css">
</head>
<body>
    <div class="container">
        <div class="navigation">
            <!-- Your navigation code -->
            <ul>
                    <li>
                       <a href="#">
                        <span class="icon"><ion-icon name="eye-off-outline"></ion-icon></ion-icon></ion-icon></span>
                        <span class="title"><h2>ADMIN</h2></span>
                       </a> 
                    </li>
                    <li>
                        <a href="#">
                         <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                         <span class="title">Home</span>
                        </a> 
                     </li>
                     <li>
                        <a href="./donate/print.php">
                         <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                         <span class="title">Doners Details</span>
                        </a> 
                     </li>
                     <li>
                        <a href="http://localhost/GAPS/donate/admin%20approval.php">
                         <span class="icon"><ion-icon name="infinite-outline"></ion-icon></span>
                         <span class="title">Registration Approval</span>
                        </a> 
                     </li>
                     <li>
                        <a href="http://localhost/GAPS/donate/feedbackshow.php">
                         <span class="icon"><ion-icon name="chatbox-outline"></ion-icon></span>
                         <span class="title">Feedbacks</span>
                        </a> 
                     </li>
                     <li>
                        <a href="http://localhost/GAPS/donate/feedbackshow.php">
                         <span class="icon"><ion-icon name="chatbubbles-outline"></ion-icon></span>
                         <span class="title">User Feedbacks</span>
                        </a> 
                     </li>
                     <li>
                        <a href="index.html">
                         <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                         <span class="title">Sign Out</span>
                        </a> 
                     </li>
                </ul>
        </div>
        <div class="main">
            <div class="topbar">
                <!-- Your topbar code -->
                <div class="card">
                        <div>
                            <div class="numbers"><?php include './counter/member.php'?></div>
                            <div class="cardName">Members</div>
                        </div>
                        <div class="iconBox">
                            <ion-icon name="people-outline"></ion-icon>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers"><?php include './counter/donation.php'?></div>
                            <div class="cardName">Donations</div>
                        </div>
                        <div class="iconBox">
                            <ion-icon name="cash-outline"></ion-icon>
                        </div>
                    </div>
                <div class="toggle">
                        <ion-icon name="menu-outline"></ion-icon>
                    </div>
                    <div class="search">
                        <label>
                            <input type="text" placeholder="search here">
                            <ion-icon name="search-outline"></ion-icon>
                        </label>
                    </div>
                    <div class="user">
                        <img src="https://th.bing.com/th/id/OIP.puMo9ITfruXP8iQx9cYcqwHaGJ?w=232&h=192&c=7&r=0&o=5&dpr=1.3&pid=1.7">
                    </div>
            </div>
            <div class="cardBox">
                <!-- Your cardBox code -->
            </div>
            <div class="details">
                <div class="Members">
                    <div class="cardHeader">
                        <h2>Recent Members</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Mobile No</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['FullName']; ?></td>
                                    <td><?php echo $row['Email']; ?></td>
                                    <td><?php echo $row['MobileNo']; ?></td>
                                    <td><?php echo ucfirst($row['status']); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Your JavaScript code
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick = function() {
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }

        // Add hovered class in selected list item
        let list = document.querySelectorAll('.navigation li');
        function activeLink(){
            list.forEach((item)=>
            item.classList.remove('hovered'));
            this.classList.add('hovered');
        }
        list.forEach((item)=>
        item.addEventListener('mouseover',activeLink));
    </script>
</body>
</html>

</html>
