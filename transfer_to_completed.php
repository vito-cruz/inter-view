<?php
include 'db_connect.php';

// Get the POST data
$data = json_decode(file_get_contents('php://input'), true);

try {
    // Start transaction
    $conn->begin_transaction();

    // Insert into completed_interviews table
    $sql = "INSERT INTO completed_interviews (
        applicant_no, 
        last_name, 
        first_name, 
        middle_name, 
        course, 
        interview_score
    ) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssi",
        $data['applicantNo'],
        $data['lastName'],
        $data['firstName'],
        $data['middleName'],
        $data['course'],
        $data['score']
    );
    $stmt->execute();

    // Delete from ongoing_interviews table
    $sql = "DELETE FROM ongoing_interviews WHERE applicant_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $data['applicantNo']);
    $stmt->execute();

    // Commit transaction
    $conn->commit();

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    // Rollback transaction on error
    $conn->rollback();
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}

$conn->close();
?> 