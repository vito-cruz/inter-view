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

    $id = $data['id'];
    $schedule_date = $data['schedule_date'];
    $time = $data['time'];

    $sql_fetch = "SELECT * FROM first_table WHERE id = ?";
    $stmt = $conn->prepare($sql_fetch);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        echo json_encode(["error" => "No record found"]);
        exit;
    }

    $sql_insert = "INSERT INTO second_table (name, email, schedule_date, time) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bind_param("ssss", $row['name'], $row['email'], $schedule_date, $time);

    if ($stmt->execute()) {
        echo json_encode(["success" => "Record inserted successfully"]);
    } else {
        echo json_encode(["error" => "Insert failed"]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["error" => "Invalid request"]);
}
?>
