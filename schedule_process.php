<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

    if (!$data) {
        echo json_encode(["error" => "No data received"]);
        exit;
    }

    $conn = new mysqli("localhost", "root", "", "applicants_db");
    if ($conn->connect_error) {
        echo json_encode(["error" => "Database connection failed"]);
        exit;
    }

    // Start transaction
    $conn->begin_transaction();

    try {
        // First, get the applicant details from the applicants table
        $sql_fetch = "SELECT last_name, first_name, middle_name, course FROM applicants WHERE applicant_no = ?";
        $stmt = $conn->prepare($sql_fetch);
        $stmt->bind_param("s", $data['applicantNo']);
        $stmt->execute();
        $result = $stmt->get_result();
        $applicant = $result->fetch_assoc();

        if (!$applicant) {
            throw new Exception("Applicant not found");
        }

        // Insert into pending_interviews table
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
            panel3
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql_insert);
        $stmt->bind_param("sssssssssssss", 
            $data['applicantNo'],
            $applicant['last_name'],
            $applicant['first_name'],
            $applicant['middle_name'],
            $applicant['course'],
            $data['scheduleDate'],
            $data['startTime'],
            $data['endTime'],
            $data['mode'],
            $data['location'],
            $data['panel1'],
            $data['panel2'],
            $data['panel3']
        );
        
        $stmt->execute();

        // Delete the applicant from the applicants table
        $sql_delete = "DELETE FROM applicants WHERE applicant_no = ?";
        $delete_stmt = $conn->prepare($sql_delete);
        $delete_stmt->bind_param("s", $data['applicantNo']);
        $delete_stmt->execute();

        // Commit the transaction
        $conn->commit();
        
        echo json_encode(["success" => true]);

    } catch (Exception $e) {
        // Rollback the transaction if any error occurs
        $conn->rollback();
        echo json_encode([
            "success" => false,
            "error" => $e->getMessage()
        ]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["error" => "Invalid request"]);
}
?> 