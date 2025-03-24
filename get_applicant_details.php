<?php
include 'db_connect.php';
header('Content-Type: application/json');

if (isset($_GET['applicantNo'])) {
    $applicantNo = $_GET['applicantNo'];
    
    $sql = "SELECT * FROM reschedule_requests WHERE applicant_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $applicantNo);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "Applicant not found"]);
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["error" => "No applicant number provided"]);
}
?> 