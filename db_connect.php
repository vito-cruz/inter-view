<?php
$servername = "localhost";  // Change if needed
$username = "root";         // Your MySQL username
$password = "";             // Your MySQL password (default is empty)
$dbname = "applicants_db";   // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM applicants WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2>Applicant Details</h2>";
        echo "Applicant No: " . $row['applicant_no'] . "<br>";
        echo "Name: " . $row['last_name'] . ", " . $row['first_name'] . " " . $row['middle_name'] . "<br>";
        echo "Course: " . $row['course'] . "<br>";
    } else {
        echo "Applicant not found.";
    }
}
?>
