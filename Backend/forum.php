<?php
// Establishing a database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "UniXpress";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission to add new threads
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $thread = $_POST['threadNew'];

    $sql = "INSERT INTO FORUM (Title, FirstName, LastName, Dayz, Body)
            VALUES ('$thread', 'Admin', '', NOW(), 'Message from admin etc...')";

    if ($conn->query($sql) === TRUE) {
        echo "New thread created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Construct the datetime for 24 hours ago
$twentyFourHoursAgo = date('Y-m-d H:i:s', strtotime('-24 hours'));

// Retrieving existing threads from the database created within the last 24 hours
$sql = "SELECT Title, Dayz FROM FORUM WHERE Dayz >= '$twentyFourHoursAgo' ORDER BY Dayz DESC LIMIT 5";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/forum.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<div class="container">
    <!-- Your HTML code here -->
    <div class="rightCenter">
        <div class="center">
            <!-- Form for adding new threads -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="formData">
                    <input type="text" id="thread" placeholder="Add a new thread..." name="threadNew">
                    <button type="submit" id="btn">&#43</button>
                </div>
            </form>

            <!-- Display existing threads within the last 24 hours -->
            <div class="messageSec">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='messages'>";
                        echo "<h4>" . $row['Title'] . "</h4>";
                        echo "<div class='admin'>";
                        echo "<img src='images/grayBox.png' alt='profile' class='grayProf'>";
                        echo "<p>Admin: " . $row['FirstName'] . " " . $row['LastName'] . "</p>";
                        echo "<p>" . $row['Dayz'] . "</p>"; // Display date/time below admin
                        echo "</div>";
                        echo "<p>" . $row['Body'] . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "No threads found within the last 24 hours";
                }
                ?>
            </div>
        </div>

        <!-- Display the last 5 thread titles with dates -->
        <div class="right">
            <h4>FORUM MESSAGES</h4>
            <ul>
                <?php
                $sql_last_threads = "SELECT Title, Dayz FROM FORUM ORDER BY Dayz DESC LIMIT 5";
                $result_last_threads = $conn->query($sql_last_threads);
                if ($result_last_threads->num_rows > 0) {
                    while ($row = $result_last_threads->fetch_assoc()) {
                        echo "<li>" . $row['Title'] . "<br>" . $row['Dayz'] . "</li>";
                    }
                } else {
                    echo "No forum messages found";
                }
                ?>
            </ul>
        </div> <!--end of right div-->
    </div>
</div>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
