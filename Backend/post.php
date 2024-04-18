<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST["title"];
    $message = $_POST["message"];
    $highPriority = isset($_POST["highPriority"]) ? "Yes" : "No"; // Check if the checkbox is checked

    // Perform database insertion (Assuming you have a database connection established)
    // Replace "your_database_hostname", "your_database_username", "your_database_password", and "your_database_name" with your actual database credentials
    $conn = new mysqli("your_database_hostname", "your_database_username", "your_database_password", "your_database_name");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO FORUM (Title, Body, Priority) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $message, $highPriority);

    // Execute SQL statement
    if ($stmt->execute() === TRUE) {
        echo "Post submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connection
    $stmt->close();
    $conn->close();
}
?>
