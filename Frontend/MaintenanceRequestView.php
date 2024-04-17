<!DOCTYPE html>
<html lang="en">
<head>
  <script src="../js/request.js"></script>
    <link rel="stylesheet" href="../css/requestview.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>


<body>
  <h1>MAINTENANCE REPORTS</h1>
      <table id="reportTable">
          <thead>
              <tr>
                  <th>Date</th>
                  <th>Machine</th>
                  <th>Problem Type</th>
                  <th>Description</th>
                  <th>Details</th>
                  <th>Call</th>
              </tr>
          </thead>
          <tbody id="reportBody"></tbody>
      </table> 
      <div id="myModal" class="modal">
          <div class="modal-content">
              <span id="closeModal" class="close">&times;</span>
              <div id="modalContent"></div>
          </div>
      </div>
      <div id="modalBackdrop" class="modal-backdrop"></div>    
<footer class="footer">
    <div style="text-align: center;">
      <div class="col-xl-6 m-auto text-center">
        <div class="copyright">
          <p>&copy; UniFresh Laundry Xpress 2024. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>
  <script type="text/javascript" src="../js/request.js"></script>
</body>
</html>
