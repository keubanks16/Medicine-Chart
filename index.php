<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicine_schedule";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch medications from the database
$sql = "SELECT * FROM medications";
$result = $conn->query($sql);

// Display medication schedule
echo "<h2>Medication Schedule</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Dosage</th><th>Schedule Time</th><th>Start Date</th><th>End Date</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["dosage"] . "</td>";
        echo "<td>" . $row["schedule_time"] . "</td>";
        echo "<td>" . $row["start_date"] . "</td>";
        echo "<td>" . $row["end_date"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No medications found.";
}

$conn->close();
?>
