<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registered Students</title>
</head>
<body>
    <div class="container">
        <h2>Registered Students</h2>

        <?php
        // Database connection
        $servername = "sql307.infinityfree.com";
        $username = "if0_35594764";
        $password = "MDbnVtqBtjdlm6";
        $dbname = "if0_35594764_displaystudents";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to get the list of registered students
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Project Title</th><th>Time Slot</th></tr>";
            
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td><td>{$row['firstName']}</td><td>{$row['lastName']}</td><td>{$row['email']}</td><td>{$row['phone']}</td><td>{$row['projectTitle']}</td><td>{$row['timeSlot']}</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No students registered.";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
