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
  $evidence = $_FILES ["fileToUpload"] ["evidence"];
  

  $data = file_get_contents($file_temp);

  $sql = $mysqli-> prepare ("INSERT INTO (submission_time, fname, lname, typeofissue, machine, description, filename, data) VALUES ($submissionTime, $firstName, $lastName, $problem, $machine, $description,$evidence, $data)");
  $sql -> bind_param ("sssssssb", $submissionTime, $firstName, $lastName, $problem, $machine, $description, $evidence, $data);


  // Send email notification
  $email = "recipient@example.com";
  $subject = "UniFresh Laundry Xpress Maintenance Request";
  $message = "
      Name: $firstName $lastName \n
      Problem Type: $problem \n
      Machine Type: $machine \n
      Description: $description \n
  ";
  mail($email, $subject, $message);

if ($sql->execute()){
  echo "Thank you for submitting your maintenance request. We will be in touch shortly.";

} else {
  // Display the form
  echo "There was an error processing your request.";
} 

$sql->close();
$mysqli->close();

}

?>
