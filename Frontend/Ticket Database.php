<link rel="stylesheet" href='../css/TicketDatabase.css'>
<head><link rel="icon" type="image/png" href="../img/laundry logo.png"><title>Ticket Database</title></head>
<div class="dash-top"> 
  <h2>Ticket Database</h2>
  <button class="add-button" onclick="Search()">Search Tickets</button>
</div>
<div class="content">
  <div class="filters">
    <ul class="list-items">
        <li class="label-f"><strong>Filter By:</strong></li>
        <li onclick="filterContacts('all')">All</li>
        <li onclick="filterContacts('Sunday')">Sunday</li>
        <li onclick="filterContacts('Monday')">Monday</li>
        <li onclick="filterContacts('Tuesday')">Tuesday</li>
        <li onclick="filterContacts('Wednesday')">Wednesday</li>
        <li onclick="filterContacts('Thursday')">Thursday</li>
        <li onclick="filterContacts('Friday')">Friday</li>
        <li onclick="filterContacts('Saturday')">Saturday</li>
        
    </ul>
  </div>
  <div id="residentsTable" >
      <!-- The residents table will be loaded here -->
      <?php
      require_once ('../storage/sql_connect.php');

      $sql = "SELECT * FROM dorm, reservations WHERE dorm.username = reservations.user_name"; 

      date_default_timezone_set('America/Jamaica');
      
      $current_time = date("H:i:s");
      $current_day =date('w');
      $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

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



      
  </div>
  
 
  </div>
  <div id="overlay" class="overlay">
  <!-- The search container will be loaded here -->
    <div id="searchContainer" class="search-container">
      <input id="search-ipt" type="text" placeholder="Ticket Number...">
      <button id="resident" onclick ="LookupResident()">OK</button>
      <button id="closeBtn" onclick="CloseSearch()">Close</button>
      <div id="results"></div>
    </div>
  </div>

</div>

<script type="text/javascript" src="../js/getResidents.js">
</script>
