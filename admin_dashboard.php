<?php
include 'config3.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
</head>
<body>
    <h2>Employee List</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mpbile</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM userssss";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["iduser"]."</td>";
                echo "<td>".$row["name"]."</td>";
                echo "<td>".$row["email"]."</td>";
                echo "<td>".$row["mobile"]."</td>";
                echo '<td><a href="read3.php?id='.$row["iduser"].'">View</a> | <a href="update3.php?id='.$row["iduser"].'">Update</a> | <a href="delete3.php?id='.$row["iduser"].'">Delete</a></td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No employees found</td></tr>";
        }
        $conn->close();
        ?>
        </tbody>
    </table>

</body>
</html>
