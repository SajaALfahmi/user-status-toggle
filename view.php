<?php
$conn = new mysqli("localhost", "root", "", "users_project");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM users ORDER BY id ASC");

echo "<table>";
echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Status</th><th>Action</th></tr>";

while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $name = htmlspecialchars($row['name']);
    $age = $row['age'];
    $status = $row['status'];
    $statusText = $status ? "1" : "0";
    $btnText = $status ? "Deactivate" : "Toggle";

    echo "<tr>
            <td>$id</td>
            <td>$name</td>
            <td>$age</td>
            <td>$statusText</td>
            <td><button onclick='toggleStatus($id)'>$btnText</button></td>
          </tr>";
}
echo "</table>";

$conn->close();
?>

