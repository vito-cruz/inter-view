<?php
include 'db_connect.php';
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    
    if (!$data) {
        echo json_encode(["error" => "No data received"]);
        exit;
    }

    $conn->begin_transaction();

    try {
        $applicantNo = $data['applicantNo'];
        $action = $data['action'];

        // Get interview details
        $sql_fetch = "SELECT * FROM pending_interviews WHERE applicant_no = ?";
        $stmt = $conn->prepare($sql_fetch);
        $stmt->bind_param("s", $applicantNo);
        $stmt->execute();
        $result = $stmt->get_result();
        $interview = $result->fetch_assoc();

        if ($action === 'confirm') {
            // Insert into ongoing_interviews
            $sql_insert = "INSERT INTO ongoing_interviews 
                (applicant_no, last_name, first_name, middle_name, course, 
                date, start_time, end_time, mode, location, panel1, panel2, panel3) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $conn->prepare($sql_insert);
            $stmt->bind_param("sssssssssssss", 
                $interview['applicant_no'],
                $interview['last_name'],
                $interview['first_name'],
                $interview['middle_name'],
                $interview['course'],
                $interview['date'],
                $interview['start_time'],
                $interview['end_time'],
                $interview['mode'],
                $interview['location'],
                $interview['panel1'],
                $interview['panel2'],
                $interview['panel3']
            );
            $stmt->execute();

        } else if ($action === 'reschedule') {
            // Insert into reschedule_requests
            $sql_insert = "INSERT INTO reschedule_requests 
                (applicant_no, last_name, first_name, middle_name, course) 
                VALUES (?, ?, ?, ?, ?)";
            
            $stmt = $conn->prepare($sql_insert);
            $stmt->bind_param("sssss", 
                $interview['applicant_no'],
                $interview['last_name'],
                $interview['first_name'],
                $interview['middle_name'],
                $interview['course']
            );
            $stmt->execute();
        }

        // Delete from pending_interviews
        $sql_delete = "DELETE FROM pending_interviews WHERE applicant_no = ?";
        $stmt = $conn->prepare($sql_delete);
        $stmt->bind_param("s", $applicantNo);
        $stmt->execute();

        $conn->commit();
        echo json_encode(["success" => true]);

    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(["error" => $e->getMessage()]);
    }

    $conn->close();
} else {
    echo json_encode(["error" => "Invalid request method"]);
}
?> 