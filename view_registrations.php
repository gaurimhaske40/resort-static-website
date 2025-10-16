<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Fetch registrations
$sql = "SELECT id, customer_name, checkin_date, total_person FROM registrations"; // Update table/column names as needed
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Registrations</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
    body {
      background-color: #f8f9fa;
      padding: 30px;
    }
    .container {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      padding: 30px;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }
    table {
      width: 100%;
      margin-top: 20px;
    }
    thead {
      background-color: #343a40;
      color: white;
    }
    tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    .no-data {
      text-align: center;
      color: #999;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>All Registrations</h2>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Customer Name</th>
          <th>Check-in Date</th>
          <th>Total Persons</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows > 0): ?>
          <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= htmlspecialchars($row["id"]) ?></td>
              <td><?= htmlspecialchars($row["customer_name"]) ?></td>
              <td><?= htmlspecialchars($row["checkin_date"]) ?></td>
              <td><?= htmlspecialchars($row["total_person"]) ?></td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="4" class="no-data">No registrations found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
<?php $conn->close(); ?>
