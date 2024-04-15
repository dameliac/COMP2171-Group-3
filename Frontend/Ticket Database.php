<link rel="stylesheet" href='../COMP2171-Group-3/css/TicketDatabase.css'>
<head><link rel="icon" type="image/png" href="../COMP2171-Group-3/img/laundry logo.png"><title>Ticket Database</title></head>
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
<div id="residentsTable">
      <!-- The residents table will be loaded here -->
      
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
<script type="text/javascript" src="../js/getResidents.js">
</script>
