<?php 
require_once("../storage/sql_connect.php");

$ticketArray = []; // Initialize an empty array to store tickets

// Fetch tickets from the database
$result = $mysqli->query("SELECT * FROM reservations");

if ($result) {
    // Iterate over the result set
    while ($row = $result->fetch_assoc()) {
        // Add each ticket to the array
        $ticketArray[] = $row;
    }
    // Free the result set
    $result->free();
} else {
    // Handle error if query fails
    echo "Error fetching tickets: " . $mysqli->error;
}


$requestArray = []; // Initialize an empty array to store tickets

// Fetch tickets from the database
$requests = $mysqli->query("SELECT * FROM requests");

if ($result) {
    // Iterate over the result set
    while ($row = $requests->fetch_assoc()) {
        // Add each ticket to the array
        $requestArray[] = $row;
    }
    // Free the result set
    $requests->free();
} else {
    // Handle error if query fails
    echo "Error fetching tickets: " . $mysqli->error;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>

<div class ="over">


    <div class="top">
        <p></p>
        <a href = "aboutus.html" ><button>About Us</button></a>
    </div>

    <!-- New content -->
    <div class="mid-text">
        <p>UniFresh Laundry Xpress</p>
        <div class="innermid-text"><i>"Where Cleanliness is Our Success!"</i></div>
    </div>

    <!-- Four cards with longitudinal separators -->
    <div class="cards-container">
        <div class="card1"><h3>Requests</h3><img width="35" height="35" src="https://img.icons8.com/ios-filled/50/FFFFFF/request-service.png" alt="request-service"/><p> <?php echo count($requestArray) ?></p></div>
        <div class="separator"></div>
        <div class="card2"><h3>Tickets</h3><img width="40" height="40" src="https://img.icons8.com/ios-filled/50/FFFFFF/two-tickets.png" alt="two-tickets"/><p><?php echo count($ticketArray); ?></p></div>
        <div class="separator"></div>
        <div class="card3"><h3>Inventory</h3><img width="40" height="40" src="https://img.icons8.com/glyph-neue/64/move-by-trolley.png" alt="move-by-trolley"/><p>NUMBER INSERT HERE</p></div>
        <div class="separator"></div>
        <div class="card4"><h3>Forum</h3><img width="40" height="40" src="https://img.icons8.com/glyph-neue/64/communication.png" alt="communication" /><p>NUMBER INSERT HERE</p></div>
    </div>

    <span class = "masked"></span>
<footer class="footer">
    <div style="text-align: center;">
      <div class="col-xl-6 m-auto text-center">
        <div class="copyright">
          <p>&copy; UniFresh Laundry Xpress 2024. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>

</div>
</body>
</html>
