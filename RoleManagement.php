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
<img src="../COMP2171-Group-3/img/admin.png" alt="profile pic" id="profile">
<p><?=$userInfo['first'] . " " . $userInfo['last']?></p>
<?php if($userInfo['type']=="resident"): ?>
    <div class="sideLinks"><a href="../COMP2171-Group-3/MachineBooking.php">Reservation Schedule</a></div>
    <div class="sideLinks"><a href="../COMP2171-Group-3/WaitlistDisplay.php">Waitlist</a></div>
    <div class="sideLinks"><a href="TicketGenerator.php">Ticket View</a></div>
    <div class="sideLinks"><a href="MaintenanceRequest.php">Maintenance Request</a></div>
    <div class="sideLinks"><a href="BookingCancellation.php">Cancel Reservation</a></div>
    <div class="sideLinks"><a href="">Forum</a></div>
    <div class="sideLinks"><a href="../COMP2171-Group-3/profile.html">View Profile</a></div>
    <hr style="width:97%;text-align:left;margin-left:0; height:0.1px; background-color:#7e7e7e; margin-bottom:0">
    <a href="../COMP2171-Group-3/index.php"> <button> Sign Out</button></a>
<?php elseif($userInfo['type']=="staff"):?>
    <div class="sideLinks"><a href="../COMP2171-Group-3/base.html">Dashboard</a></div>
    <div class="sideLinks"><a href="../COMP2171-Group-3/profile.html">View Profile</a></div>
    <div class="sideLinks"><a href="">Forum</a></div>
    <div class="sideLinks"><a href="../COMP2171-Group-3/MachineStatusUpdate.php">Machine Status</a></div>
    <div class ="sideLinks"><a href="../COMP2171-Group-3/Ticket Database.php">Ticket Database</a></div>
    <div class="sideLinks"><a href="">Laundry Inventory</a></div>
    <div class="sideLinks"><a href="../COMP2171-Group-3/MaintenanceRequestView.php">Request Overview</a></div>
    <hr style="width:97%;text-align:left;margin-left:0; height:0.1px; background-color:#7e7e7e; margin-bottom:0">
    <a href="../COMP2171-Group-3/index.php"> <button> Sign Out</button></a>

<?php endif;?>
