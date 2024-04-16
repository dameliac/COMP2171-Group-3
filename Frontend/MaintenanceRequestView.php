<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="../COMP2171-Group-3/css/maint.css">
</head>
<body>
  <h2 style="color: black; text-align:center">Admin Panel - Submitted Issues</h2>

  <?php
  // Read and display submitted issues from the file
  $file = 'storage/submitted_issues.txt';

  if (file_exists($file)) {
    $submittedIssues = file_get_contents($file);
    echo "<p>Submitted Issues</p>";
    echo "<pre>$submittedIssues</pre>";
  } else {
    echo "<p style='text-align:center'>No submitted issues yet.</p>";
  }
  ?>

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
