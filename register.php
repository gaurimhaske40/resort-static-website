<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

// Create DB connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Get form data
$customer_name = $_POST['customer_name'];
$checkin_date = $_POST['checkin_date'];
$total_person = $_POST['total_person'];
$total_days = $_POST['total_days'];
$room_type = $_POST['room_type'];
$eminities = isset($_POST['eminities']) ? (is_array($_POST['eminities']) ? implode(", ", $_POST['eminities']) : $_POST['eminities']) : "";
$advance_amount = $_POST['advance_amount'];
$total_amount = $_POST['total_amount'];

// Insert into DB
$sql = "INSERT INTO registrations 
(customer_name, checkin_date, total_person, total_days, room_type, eminities, advance_amount, total_amount) 
VALUES ('$customer_name', '$checkin_date', $total_person, $total_days, '$room_type', '$eminities', $advance_amount, $total_amount)";

if ($conn->query($sql) === TRUE) {
    echo "<h2>✅ Registration Successful!</h2><a href='index.html'>Back to Form</a>";
} else {
    echo "❌ Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
