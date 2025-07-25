<?php
$conn = new mysqli("localhost", "root", "", "users_project");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

if ($id > 0) {
    $stmt = $conn->prepare("UPDATE users SET status = 1 - status WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }
    $stmt->close();
} else {
    echo json_encode(["success" => false, "error" => "Invalid ID"]);
}

$conn->close();
?>
