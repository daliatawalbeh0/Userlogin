<?php
include 'config3.php';

$id = $_GET['id'];

if (isset($id)) {
    $sql = "SELECT * FROM userssss WHERE iduser=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No employee found";
        exit; 
    }
} else {
    echo "Invalid employee ID";
    exit; 
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];

    $update_sql = "UPDATE userssss SET name='$name', email='$email', mobile='$mobile' WHERE iduser=$id";
    if ($conn->query($update_sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
} else {
    echo '<form method="post" action="update3.php?id='.$id.'">
            <input type="hidden" name="id" value="'.$row["iduser"].'">
            Name: <input type="text" name="name" value="'.$row["name"].'"><br>
            Email: <input type="text" name="email" value="'.$row["email"].'"><br>
            Mobile: <input type="text" name="mobile" value="'.$row["mobile"].'"><br>
            <input type="submit" name="update" value="Update">
          </form>';
}
?>
