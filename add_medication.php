<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $dosage = $_POST["dosage"];
    $scheduleTime = $_POST["schedule_time"];
    $startDate = $_POST["start_date"];
    $endDate = $_POST["end_date"];

    // Insert medication into the database
    $sql = "INSERT INTO medications (name, dosage, schedule_time, start_date, end_date) VALUES ('$name', '$dosage', '$scheduleTime', '$startDate', '$endDate')";

    if ($conn->query($sql) === TRUE) {
        echo "Medication added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<h2>Add Medication</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Name: <input type="text" name="name" required><br>
    Dosage: <input type="text" name="dosage" required><br>
    Schedule Time: <input type="time" name="schedule_time" required><br>
    Start Date: <input type="date" name="start_date" required><br>
    End Date: <input type="date" name="end_date"><br>
    <input type="submit" value="Add Medication">
</form>
