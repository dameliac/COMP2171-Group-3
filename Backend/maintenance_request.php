<?php 
session_start();
require_once ("../storage/sql_connect.php");

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $firstName = $_POST["fname"];
    $lastName = $_POST["lname"];
    $problem = $_POST["problem"];
    $machine = $_POST["machine"];
    $description = $_POST["txt"]; 
    $submissionTime = date('Y-m-d H:i:s');
    
    // Handling file upload
    $evidenceFile = $_FILES["evidence"];
    $evidenceFileName = $evidenceFile["name"];
    $evidenceFileTmp = $evidenceFile["tmp_name"];

    // Read file contents
    $evidenceData = file_get_contents($evidenceFileTmp);

    // Prepare SQL statement
    $sql = $mysqli->prepare("INSERT INTO maintenance_requests (submission_time, fname, lname, typeofissue, machine, description, filename, data) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $sql->bind_param("ssssssss", $submissionTime, $firstName, $lastName, $problem, $machine, $description, $evidenceFileName, $evidenceData);

    // Execute SQL statement
    if ($sql->execute()) {
        // Send email notification
        $email = "dameliacoleman@gmail.com";
        $subject = "UniFresh Laundry Xpress Maintenance Request";
        $message = "Name: $firstName $lastName\nProblem Type: $problem\nMachine Type: $machine\nDescription: $description\n";
        mail($email, $subject, $message);

        echo "Thank you for submitting your maintenance request. We will be in touch shortly.";
    } else {
        echo "There was an error processing your request.";
    }

    // Close prepared statement
    $sql->close();
}

// Close database connection
$mysqli->close();

?>
