<?php

$filterType = isset($_GET['filter']) ? $_GET['filter'] : 'all';

$ticketSrc = isset($_GET['search'])?$_GET['search']:'';

require_once ('../COMP2171-Group-3/storage/sql_connect.php');
$sql = "SELECT * FROM dorm, reservations WHERE dorm.username = reservations.user_name"; 

date_default_timezone_set('America/Jamaica');

$current_time = date("H:i:s");
$current_day =date('w');
$days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
$parts = explode(' ', $ticketSrc);

if (!empty($ticketSrc)){
  $sql .= " AND id = '$ticketSrc'";
}

if ($filterType == 'Sunday') {
    $sql .= " AND day = 0";
}elseif ($filterType == 'Monday') {
    $sql .= " AND day = 1";
} elseif ($filterType == 'Tuesday') {
  $sql .= " AND day = 2";
}elseif ($filterType == 'Wednesday') {
  $sql .= " AND day = 3";
}elseif ($filterType == 'Thursday') {
  $sql .= " AND day = 4";
}
elseif ($filterType == 'Friday') {
  $sql .= " AND day = 5";
}
elseif ($filterType == 'Saturday') {
  $sql .= " AND day = 6";
}



      
      echo '<table cellspacing="0">
        <thead>
          <tr>
            <th>Resident ID</th>
            <th>Name</th>
            <th>Ticket Number</th>
            <th>Assigned Machine</th>
            <th>Day</th>
            <th>Scheduled Time</th>
            
          </tr>
        </thead>
        <tbody>';

      if($result = mysqli_query($mysqli, $sql)){
        if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
          $day = $row['day'];
          // Example time in 24-hour format fetched from the database
          $time_24_hour = $row['timeslot'];
          // Convert 24-hour time to 12-hour format
          $time_12_hour = date("h:i A", strtotime($time_24_hour));
          

            echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>".$row['firstname'] . " " . $row['lastname'] . "</td>";
                echo "<td> A". $row['id']."</td>";
                echo "<td>" . $row['machine'] . "</td>";
                echo "<td>" . $days[$day] . "</td>";
                echo "<td>".$time_12_hour."</td>";                
            echo "</tr>";
          
          
        }
        mysqli_free_result($result);
      } else{
        echo "<tr><td colspan='4'>No residents found.</td></tr>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}

echo '</tbody></table>';


      
?>