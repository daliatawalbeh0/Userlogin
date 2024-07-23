<?php
include 'config3.php';
$id = $_GET['id'];
$sql = "DELETE FROM userssss WHERE iduser=$id";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>