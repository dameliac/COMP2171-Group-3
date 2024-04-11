<?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $issueDescription = $_POST["issue"];
        $submissionTime = date('Y-m-d H:i:s'); // Get the current date and time

        // Store the submitted issue along with the timestamp in a file
        $file = 'storage/submitted_issues.txt';
        file_put_contents($file, "[$submissionTime]  $issueDescription" . PHP_EOL, FILE_APPEND);

        // Set a variable to indicate successful submission
        echo "success";
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Request</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="../COMP2171-Group-3/css/maint.css"/>
    <script src="../COMP2171-Group-3/js/maint.js"></script>
</head>
<body>
    <div id="maintenanceBody">
    <h1>UniFresh Laundry Xpress</h1>
    <h2>Maintenance Request Form</h2>
    <!-- Form for users to submit issues -->
    <div id="requestForm">
      <p>Describe the issue:</p>
      <textarea id="issue_description" name="issue_description" rows="4" cols="50" required></textarea><br>
      <button type="submit" onclick="submitForm()">Submit</button>
    </div>
    <!-- Display confirmation message using JavaScript if the form was submitted -->
    <p id="confirmationMessage" style="display: none;">Request was submitted!</p>
  </div>
</body>
</html>
