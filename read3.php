<?php
include 'config3.php';

$id = $_GET['id'];

$sql = "SELECT * FROM userssss WHERE iduser=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "id: " . $row["iduser"]. "<br>";
    echo "name: " . $row["name"]. "<br>";
    echo "email: " . $row["email"]. "<br>";
    echo "mobile: " . $row["mobile"]. "<br>";
} else {
    echo "No employee found";
}

$conn->close();
?>
