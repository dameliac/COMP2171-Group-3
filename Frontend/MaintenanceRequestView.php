<!DOCTYPE html>
<html lang="en">

<head>
  <!-- <script src="../js/request.js"></script> -->
  <link rel="stylesheet" href="../css/requestview.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>



<?php
require_once ('../storage/sql_connect.php');

// load data from sql
$sql = "SELECT * FROM requests ORDER BY submission_time DESC";

$data = $mysqli->query($sql);
$requests = [];
while ($row = $data->fetch_assoc()) {
  $requests[] = $row;
}

?>

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
    <tbody id="reportBody">
      <?php
      foreach ($requests as $request) {

        $contact = '8768209568';
        $typeofissue = $request['typeofissue'];
        switch ($typeofissue) {
          case 'WM':
          case 'DM':
            $contact = "8768209568";
            break;
          case 'Plumb':
            $contact = "8768209568";
            break;
          default:

            break;
        }


        ?>
        <tr>
          <td><?php echo $request['submission_time'] ?></td>
          <td><?php echo $request['machine']; ?></td>
          <td><?php echo $request['typeofissue']; ?></td>
          <td><?php echo $request['description']; ?></td>



          <td><a href="#" class="details-link" data-details='<?php echo json_encode($request) ?>'>View Details</a></td>
          <td>
            <a class="call-button" href="tel:<?= $contact ?>"><i class="fas fa-phone icon fa-flip-horizontal"
                style="font-size:24px;color:blue"></i></a>
          </td>
        </tr>
        <?php
      }
      ?>


    </tbody>
  </table>
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span id="closeModal" class="close">&times;</span>
      <div id="modalContent"></div>
    </div>
  </div>
  <div id="modalBackdrop" class="modal-backdrop"></div>
  <!-- load dyniamic js -->

  <footer class="footer">
    <div style="text-align: center;">
      <div class="col-xl-6 m-auto text-center">
        <div class="copyright">
          <p>&copy; UniFresh Laundry Xpress 2024. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>

</body>

</html>
