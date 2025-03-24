<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connect.php';
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $data = json_decode(file_get_contents('php://input'), true);
        
        if (!$data) {
            throw new Exception("No data received");
        }

        $conn->begin_transaction();

        // Insert into pending_interviews
        $sql_insert = "INSERT INTO pending_interviews (
            applicant_no,
            last_name,
            first_name,
            middle_name,
            course,
            date,
            start_time,
            end_time,
            mode,
            location,
            panel1,
            panel2,
            panel3,
            status
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending_confirmation')";

        $stmt = $conn->prepare($sql_insert);
        $stmt->bind_param("sssssssssssss", 
            $data['applicantNo'],
            $data['lastName'],
            $data['firstName'],
            $data['middleName'],
            $data['course'],
            $data['scheduleDate'],
            $data['startTime'],
            $data['endTime'],
            $data['mode'],
            $data['location'],
            $data['panel1'],
            $data['panel2'],
            $data['panel3']
        );

        if (!$stmt->execute()) {
            throw new Exception("Failed to insert into pending_interviews");
        }

        // Delete from reschedule_requests
        $sql_delete = "DELETE FROM reschedule_requests WHERE applicant_no = ?";
        $stmt = $conn->prepare($sql_delete);
        $stmt->bind_param("s", $data['applicantNo']);
        
        if (!$stmt->execute()) {
            throw new Exception("Failed to delete from reschedule_requests");
        }

        $conn->commit();
        echo json_encode(["success" => true]);

    } catch (Exception $e) {
        if (isset($conn)) {
            $conn->rollback();
        }
        echo json_encode([
            "success" => false,
            "error" => $e->getMessage()
        ]);
    }

    if (isset($stmt)) {
        $stmt->close();
    }
    if (isset($conn)) {
        $conn->close();
    }
} else {
    echo json_encode(["error" => "Invalid request method"]);
}
?> 