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
    <div class="card1"><h3>Requests</h3><p>NUMBER INSERT HERE</p></div>
    <div class="separator"></div>
    <div class="card2"><h3>Tickets</h3><svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="40px" height="40px"><path d="M21,15V3a3,3,0,0,0-3-3H14V1a2,2,0,0,1-4,0V0H6A3,3,0,0,0,3,3V15H7v2H3v7h7V23a2,2,0,0,1,4,0v1h7V17H17V15Zm-7,2H10V15h4Z"/></svg><p><?php echo count($ticketArray); ?></p></div>
    <div class="separator"></div>
    <div class="card3"><h3>Inventory</h3><p>NUMBER INSERT HERE</p></div>
    <div class="separator"></div>
    <div class="card4"><h3>Forum</h3><p>NUMBER INSERT HERE</p></div>
</div>

</body>
</html>
