<?php
$conn = new mysqli("localhost", "root", "", "users_project");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$name = $_POST['name'] ?? '';
$age = $_POST['age'] ?? 0;

if ($name && $age) {
    $sql = "INSERT INTO users (name, age, status) VALUES (?, ?, 0)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $name, $age);
    if ($stmt->execute()) {
        echo "Inserted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Missing name or age.";
}

$conn->close();
?>
