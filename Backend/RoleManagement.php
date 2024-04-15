<?php
session_start();
include "../COMP2171-Group-3/RoleManagementData.php";
require_once ("../COMP2171-Group-3/storage/sql_connect.php");

$username = $_SESSION['userName'];
//get the usertype as well as firstname and lastname of current user

$userInfo = getTyped($mysqli,$username);

$mysqli->close();
?>

<!--based on usertype the menu is loaded with different functions to be used by each user-->
<img src="img\closeButton.png" alt="Close Button" id="close">


<?php if($userInfo['type']=="resident"): ?>
    <img src="../COMP2171-Group-3/img/resident.png" alt="profile pic" id="profile">
    <p><?=$userInfo['first'] . " " . $userInfo['last']?></p>
    <div class="sideLinks"><a href="../Backend/MachineBooking.php">Reservation Schedule</a></div>
    <div class="sideLinks"><a href="../Frontend/WaitlistDisplay.php">Waitlist</a></div>
    <div class="sideLinks"><a href="../Backend/TicketGenerator.php">Ticket View</a></div>
    <div class="sideLinks"><a href="../Frontend/MaintenanceRequestForm.php">Maintenance Request</a></div>
    <div class="sideLinks"><a href="../Backend/bookingcancellation.php">Cancel Reservation</a></div>
    <div class="sideLinks"><a href="">Forum</a></div>
    <div class="sideLinks"><a href="../Frontend/profile.php">View Profile</a></div>
    <hr style="width:97%;text-align:left;margin-left:0; height:0.1px; background-color:#7e7e7e; margin-bottom:0">
    <a href="../COMP2171-Group-3/index.php"> <button> Sign Out</button></a>
<?php elseif($userInfo['type']=="staff"):?>
    <img src="../COMP2171-Group-3/img/admin.png" alt="profile pic" id="profile">
    <p><?=$userInfo['first'] . " " . $userInfo['last']?></p>
    <div class="sideLinks"><a href="../Frontend/base.html">Dashboard</a></div>
    <div class="sideLinks"><a href="../Frontend/profile.php">View Profile</a></div>
    <div class="sideLinks"><a href="">Forum</a></div>
    <div class="sideLinks"><a href="../Backend/MachineStatusUpdate.php">Machine Status</a></div>
    <div class ="sideLinks"><a href="../Frontend/Ticket Database.php">Ticket Database</a></div>
    <div class="sideLinks"><a href="../Frontend/inventory.html">Laundry Inventory</a></div>
    <div class="sideLinks"><a href="../Frontend/MaintenanceRequestView.php">Request Overview</a></div>
    <hr style="width:97%;text-align:left;margin-left:0; height:0.1px; background-color:#7e7e7e; margin-bottom:0">
    <a href="../Frontend/index.php"> <button> Sign Out</button></a>

<?php endif;?>
